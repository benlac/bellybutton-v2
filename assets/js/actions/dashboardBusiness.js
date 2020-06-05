export const FETCH_DATAS = 'FETCH_DATAS';
export const FETCH_USER_ID = 'FETCH_USER_ID';
export const SAVE_DATA = 'SAVE_DATA';

export const fetchDatas = () => ({
  type: FETCH_DATAS,
});

export const fetchUserId = (id) => ({
  type: FETCH_USER_ID,
  userId: id,
});

export const saveData = (data) => ({
  type: SAVE_DATA,
  campaigns: data,
});
