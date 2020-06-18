export const FETCH_USER_ID = 'FETCH_USER_ID';
export const SAVE_USER = 'SAVE_USER';
export const FETCH_DATAS = 'FETCH_DATAS';
export const SAVE_DATA = 'SAVE_DATA';
export const SAVE_SORT_VALUE = 'SAVE_SORT_VALUE';
export const RESET_SORT_VALUE = 'RESET_SORT_VALUE';
export const HANDLE_CHANGE_SEARCH = 'HANDLE_CHANGE_SEARCH';
export const SEARCH_CAMPAIGN = 'SEARCH_CAMPAIGN';

export const fetchUserId = () => ({
  type: FETCH_USER_ID,
});

export const saveUser = (user) => ({
  type: SAVE_USER,
  user,
});

export const fetchDatas = () => ({
  type: FETCH_DATAS,
});

export const saveData = (data) => ({
  type: SAVE_DATA,
  campaigns: data,
});

export const sortValue = (value) => ({
  type: SAVE_SORT_VALUE,
  value,
});

export const resetSortValue = () => ({
  type: RESET_SORT_VALUE,
});

export const handleChangeSearch = (e) => ({
  type: HANDLE_CHANGE_SEARCH,
  data: e,
});

export const searchCampaign = () => ({
  type: SEARCH_CAMPAIGN,
});
