import { SAVE_DATA, SAVE_USER, SAVE_SORT_VALUE } from "../actions/dashboardBusiness";

const initialState = {
  datas: [],
  userId: '',
  loading: true,
  sortValue: 'total'
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
    case SAVE_SORT_VALUE:
      return {
        ...state,
        sortValue: action.value,
      }

    default: return state;
  }
};

export default nameForTheReducer;
