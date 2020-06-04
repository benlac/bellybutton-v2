import React from 'react';
import { Route } from 'react-router-dom';

import Title from '../Title';
import Management from '../Management';
import Campagns from '../Campagns';
import StatCampagn from '../StatCampagn';

import './app.scss';

const App = () => (
  <>
    <Route path="/business/dashboard" exact>
      <Title />
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

export default App;
