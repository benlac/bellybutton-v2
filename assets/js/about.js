import React from 'react';
import { render } from 'react-dom';

import App from './components/About/App';
import '../scss/app.scss';

const target = document.getElementById('root_about');
render(
  <App />,
  target
);
