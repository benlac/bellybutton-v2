import React from 'react';
import { render } from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';

import App from './components/DashboardBusiness/App';

import '../scss/app.scss';

const target = document.getElementById('root');

render(
  <Router >
    <App />
  </Router>,
  target
);
