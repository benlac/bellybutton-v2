import React from 'react';
import { render } from 'react-dom';
import { BrowserRouter as Router } from 'react-router-dom';
import { Provider } from 'react-redux';

import App from './containers/DashboardBusiness/App';

import store from './store';

import '../scss/app.scss';

const target = document.getElementById('root');

render(
  <Provider store={store}>
    <Router >
      <App />
    </Router>
  </Provider>,
  target
);
