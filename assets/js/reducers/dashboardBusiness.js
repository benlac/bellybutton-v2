import { SAVE_DATA, SAVE_USER } from "../actions/dashboardBusiness";

const initialState = {
  datas: [],
  userId: '',
  loading: true,
};

const nameForTheReducer = (state = initialState, action = {}) => {
  switch (action.type) {
    case SAVE_USER:
      return {
        ...state,
        userId: action.user.id
      }
    case SAVE_DATA:
      return {
        ...state,
        datas: action.campaigns,
        loading: false,
      }
    default: return state;
  }
};

export default nameForTheReducer;
