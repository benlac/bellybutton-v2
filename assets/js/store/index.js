import { createStore, applyMiddleware } from 'redux';
import { composeWithDevTools } from 'redux-devtools-extension';

import reducer from '../reducers';
import businessMiddleware from '../middleware/businessMiddleware';

const enhancers = composeWithDevTools(
  applyMiddleware(
    businessMiddleware,
  ),
);

const store = createStore(
  // reducer
  reducer,
  // enhancer
  enhancers,
);

export default store;
