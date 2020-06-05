import { combineReducers } from 'redux';

import dashboardBusiness from './dashboardBusiness';

const rootReducer = combineReducers({
  dashboardBusiness: dashboardBusiness,
});

export default rootReducer;
