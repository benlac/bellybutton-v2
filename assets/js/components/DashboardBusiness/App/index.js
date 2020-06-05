import React, { useEffect } from 'react';
import { Route } from 'react-router-dom';
import PropTypes from 'prop-types';

import Title from '../Title';
import Management from '../Management';
import Campagns from '../Campagns';
import StatCampagn from '../StatCampagn';

import './app.scss';

const App = ({ fetchDatas, fetchUserId }) => {
  useEffect(() => {
    const userId = window.location.pathname.substr(20);
    console.log(userId);
    fetchUserId(userId);
    fetchDatas();
  }, []);

  return (
    <>
      <Route path={window.location.pathname} exact>
        <Title name="Campagnes"/>
        <div className="dashboard__content">
          <Management />
          <Campagns />
        </div>
      </Route>
      <Route path={window.location.pathname + '/:slug'}>
        <StatCampagn />
      </Route>
    </>
  );
}

App.propTypes = {
  fetchDatas: PropTypes.func.isRequired,
};

export default App;
