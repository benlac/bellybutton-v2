import { FETCH_USER_ID } from "../actions/dashboardBusiness";

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
    default: return state;
  }
};

export default nameForTheReducer;