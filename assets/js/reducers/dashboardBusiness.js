import {
  SAVE_DATA,
  SAVE_USER,
  SAVE_SORT_VALUE,
  RESET_SORT_VALUE,
  HANDLE_CHANGE_SEARCH,
  SEARCH_CAMPAIGN,
} from "../actions/dashboardBusiness";

const initialState = {
  datas: [],
  userId: '',
  loading: true,
  sortValue: 'total',
  valueSearch: '',
  searchDatasResult: [],
};

const dashboardBusinessReducer = (state = initialState, action = {}) => {
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
        searchDatasResult: action.campaigns,
        loading: false,
      }
    case SAVE_SORT_VALUE:
      return {
        ...state,
        sortValue: action.value,
      }
    case RESET_SORT_VALUE:
      return {
        ...state,
        sortValue: 'total',
      }
    case HANDLE_CHANGE_SEARCH:
      return {
        ...state,
        valueSearch: action.data,
      }
    case SEARCH_CAMPAIGN: {
      const sortDatas = 
        state.datas.filter(data => data.name.toLowerCase().includes(state.valueSearch.toLowerCase()));

      return {
        ...state,
        searchDatasResult: sortDatas,
        valueSearch: '',
      }
    }
    default: return state;
  }
};

export default dashboardBusinessReducer;
