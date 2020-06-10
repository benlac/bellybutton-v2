import React from 'react';

import Header from '../Header';
import Solutions from '../Solutions';
import Contact from '../Contact';

import './app.scss';
import Teams from '../Teams';

const App = () => (
  <div className="container">
    <Header />
    <div>Banner</div>
    <div>Affecting</div>
    <Solutions />
    <Teams />
    <Contact />
  </div>
);

export default App;
