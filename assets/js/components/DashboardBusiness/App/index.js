import React, { useEffect } from 'react';
import { Route } from 'react-router-dom';
import PropTypes from 'prop-types';

import Title from '../Title';
import Management from '../Management';
import Campagns from '../Campagns';
import StatCampagn from '../StatCampagn';

import './app.scss';

const App = ({ fetchDatas }) => {
  useEffect(() => {
    console.log('useEffect');
    fetchDatas();
  }, []);

  return (
    <>
      <Route path="/business/dashboard" exact>
        <Title name="Campagnes"/>
        <div className="dashboard__content">
          <Management />
          <Campagns />
        </div>
      </Route>
      <Route path="/business/dashboard/:slug">
        <StatCampagn />
      </Route>
    </>
  );
}

App.propTypes = {
  fetchDatas: PropTypes.func.isRequired,
};

export default App;
