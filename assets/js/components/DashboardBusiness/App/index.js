import React, { useEffect } from 'react';
import { Route, Switch } from 'react-router-dom';
import PropTypes from 'prop-types';

import Title from '../Title';
import Management from '../../../containers/DashboardBusiness/Management';
import Campagns from '../../../containers/DashboardBusiness/Campagns';
import Reporting from '../../../containers/DashboardBusiness/Reporting';

import './app.scss';
import Loader from '../Loader';

const App = ({ fetchUserId, loading, user }) => {
  useEffect(() => {
    fetchUserId();
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
        <Reporting />
      )}
      </Route>
    </Switch>
    </>
  );
}

App.propTypes = {
  fetchUserId: PropTypes.func.isRequired,
  loading: PropTypes.bool.isRequired,
  user: PropTypes.oneOfType([
    PropTypes.number.isRequired,
    PropTypes.string.isRequired,
  ]).isRequired,
};

export default App;
