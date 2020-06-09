export const sumDatas = (datas) => {
  const reducer = (accumulator, currentValue) => accumulator + currentValue;
  const dataNumber = datas.map((data) => data.number )
  const sumComment = Array.isArray(dataNumber) && dataNumber.length !== 0 ? dataNumber.reduce(reducer) : 0;

  return sumComment;
};

export const engagementRate = (comments, likes, views) => {
  // Taux d'engagemnt = Nombre de comments + likes divisé par le nombre de vue
  const sumComments = sumDatas(comments);
  const sumLikes = sumDatas(likes);
  const sumViews = sumDatas(views);
  const calcul = (sumComments + sumLikes) / sumViews;
  const resultat = Math.round( calcul * 100) / 100;
  return Number.isNaN(Math.round( calcul * 100) / 100) ? 0 : resultat;
};

export const totalImpression = (comments, likes, views) => {
  // Total impressions : Additions des nombres de vues + like + comment
  const sumComments = sumDatas(comments);
  const sumLikes = sumDatas(likes);
  const sumViews = sumDatas(views);

  return sumComments + sumLikes + sumViews;

};

export const addNumbWithSameDate = (views) => {
  const counts = views.reduce((prev, curr) => {
    const count = prev.get(curr.createdAt) || 0;
    prev.set(curr.createdAt, curr.number + count);
    return prev;
  }, new Map());
  
  const reducedObjArr = [...counts].map(([createdAt, number]) => {
    return {createdAt, number}
  })
  return reducedObjArr;
}

export const addNumbAndSortEveryFive = (datas) => {
  let sum = 0;
  const arraySumNumber = datas.map((item) => {
    sum += item.number;
    const newArray = {createdAt: item.createdAt, number: sum};
    return newArray;
  })

  const sortEveryFiveDay = arraySumNumber.map((item, key) => {
    if ( key % 5 === 0 ) {
      const newArray = {createdAt: item.createdAt, number: item.number};
      return newArray
    }
  })

  const viewEveryFive = sortEveryFiveDay.filter((item) => item !== undefined);
  
  return viewEveryFive;
}