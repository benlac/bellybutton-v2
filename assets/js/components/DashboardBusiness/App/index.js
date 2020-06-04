import React from 'react';

import Title from '../Title';
import Management from '../Management';
import Campagns from '../Campagns';

import './app.scss';

const App = () => (
  <>
    <Title />
    <div className="dashboard__content">
      <Management />
      <Campagns progression="80%" />
    </div>
  </>
);

export default App;
