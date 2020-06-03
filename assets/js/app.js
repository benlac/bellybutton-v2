import React from 'react';
import { render } from 'react-dom';

import App from './components/DashboardBusiness/App';

import '../scss/app.scss';

const target = document.getElementById('root');

render(
  <App />,
  target
);
