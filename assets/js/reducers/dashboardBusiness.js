import { FETCH_USER_ID, SAVE_DATA } from "../actions/dashboardBusiness";

const initialState = {
  datas: [],
  userId: '',
};

const nameForTheReducer = (state = initialState, action = {}) => {
  switch (action.type) {
    case FETCH_USER_ID:
      return {
        ...state,
        userId: action.userId,
      }
    case SAVE_DATA:
      return {
        ...state,
        datas: action.campaigns,
      }
    default: return state;
  }
};

export default nameForTheReducer;