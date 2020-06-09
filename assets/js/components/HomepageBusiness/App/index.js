import React from 'react';

import Header from '../Header';
import Solutions from '../Solutions';

import './app.scss';

const App = () => (
  <div className="container">
    <Header />
    <div>Banner</div>
    <div>Affecting</div>
    <Solutions />
    <div>Teams</div>
    <div>Contact</div>
  </div>
);

export default App;
