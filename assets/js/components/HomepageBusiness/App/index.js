import React from 'react';

import Header from '../Header';
import Solutions from '../Solutions';
import Contact from '../Contact';

import './app.scss';
import Teams from '../Teams';
import Banner from '../Banner';
import Affecting from '../Affecting';

const App = () => (
  <>
      <Header />
    <div className="container">
      <Banner />
    </div>
      <Affecting />
      <Solutions />
      <Teams />
    <div className="container">
      <Contact />
    </div>
  </>
);

export default App;
