import React from 'react';
import { render } from 'react-dom';

import App from './components/HomepageInfluencer/App';
import '../scss/app.scss';

const target = document.getElementById('root_influencer');
render(
  <App />,
  target
);
