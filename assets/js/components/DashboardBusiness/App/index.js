import React, { useEffect } from 'react';
import { Route, Switch } from 'react-router-dom';
import PropTypes from 'prop-types';

import Title from '../Title';
import Management from '../Management';
import Campagns from '../../../containers/DashboardBusiness/Campagns';
import StatCampagn from '../../../containers/DashboardBusiness/StatCampagn';

import './app.scss';
import Loader from '../Loader';

const App = ({ fetchDatas, fetchUserId, loading, user }) => {
  useEffect(() => {
    // @TODO recuperer l'id dans l'url via une regex car si id superieur a 2 === appli hs
    const userId = window.location.pathname.substring(20, 22);
    fetchUserId(userId);
    fetchDatas();
  }, []);

  return (
    <>
    <Switch>
      <Route exact path={`/business/dashboard/${user}`} >
      {loading &&<Loader />}
      {!loading && (
        <>
          <Title name="Campagnes"/>
          <div className="dashboard__content">
            <Management />
            <Campagns />
          </div>
        </>
      )}
      </Route>
      <Route path={`/business/dashboard/${user}/:slug`}>
      {loading &&<Loader />}
      {!loading && (
        <StatCampagn />
      )}
      </Route>
    </Switch>
    </>
  );
}

App.propTypes = {
  fetchDatas: PropTypes.func.isRequired,
  fetchUserId: PropTypes.func.isRequired,
  loading: PropTypes.bool.isRequired,
  user: PropTypes.string.isRequired,
};

export default App;
