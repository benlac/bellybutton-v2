import React from 'react';
import { render } from 'react-dom';

import App from '../components/HomepageBusiness/App';
import '../../scss/app.scss';

const target = document.getElementById('root_business');
render(
  <App />,
  target
);
