import axios from 'axios';

import { FETCH_DATAS } from "../actions/dashboardBusiness";

const businessMiddleware = (store) => (next) => (action) => {
  switch (action.type) {
    case FETCH_DATAS:
      const userId = store.getState().dashboardBusiness.userId;
      axios.get(`http://localhost:8000/api/campaign/${userId}`)
      .then((response) => {
        console.log(response.data);
      })
    default:
      next(action);
  }
};
export default businessMiddleware;