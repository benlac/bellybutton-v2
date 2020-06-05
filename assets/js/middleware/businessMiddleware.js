import axios from 'axios';

import { FETCH_DATAS } from "../actions/dashboardBusiness";

const businessMiddleware = (store) => (next) => (action) => {
  switch (action.type) {
    case FETCH_DATAS:
      axios.get('http://localhost:8000/api/campaign/14')
      .then((response) => {
        console.log(response.data);
      })
    default:
      next(action);
  }
};
export default businessMiddleware;