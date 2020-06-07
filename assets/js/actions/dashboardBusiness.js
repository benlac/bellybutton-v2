export const FETCH_USER_ID = 'FETCH_USER_ID';
export const SAVE_USER = 'SAVE_USER';
export const FETCH_DATAS = 'FETCH_DATAS';
export const SAVE_DATA = 'SAVE_DATA';
export const SAVE_SORT_VALUE = 'SAVE_SORT_VALUE';

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
