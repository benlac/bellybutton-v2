import axios from 'axios';

import {saveData, FETCH_USER_ID, saveUser, FETCH_DATAS, fetchDatas } from "../actions/dashboardBusiness";

const businessMiddleware = (store) => (next) => (action) => {
  switch (action.type) {
    case FETCH_USER_ID:
      axios.get('http://localhost:8000/api/user')
        .then((response) => {
          store.dispatch(saveUser(response.data));
          store.dispatch(fetchDatas());
        })
        .catch((error) => {
          console.warn(error.response.data);
          // @TODO afficher le message venant de l'API
        });
      next(action);
      break;
    case FETCH_DATAS:
      const userId = store.getState().dashboardBusiness.userId;
      axios.get(`http://localhost:8000/api/campaign/${userId}`)
      .then((response) => {
        store.dispatch(saveData(response.data));
      })
      .catch((error) => {
        console.warn(error);
        // @TODO : Gerer les messages d'erreur
      });
      next(action);
      break;
    default:
      next(action);
  }
};
export default businessMiddleware;