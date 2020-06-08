export const sumDatas = (datas) => {
  const reducer = (accumulator, currentValue) => accumulator + currentValue;
  const dataNumber = datas.map((data) => data.number )
  const sumComment = dataNumber.reduce(reducer);

  return sumComment;
};

export const engagementRate = (comments, likes, views) => {
  // Taux d'engagemnt = Nombre de comments + likes divisé par le nombre de vue
  const sumComments = sumDatas(comments);
  const sumLikes = sumDatas(likes);
  const sumViews = sumDatas(views);
  const result = (sumComments + sumLikes) / sumViews;

  return Math.round( result * 100) / 100;
};

export const totalImpression = (comments, likes, views) => {
  // Total impressions : Additions des nombres de vues + like + comment
  const sumComments = sumDatas(comments);
  const sumLikes = sumDatas(likes);
  const sumViews = sumDatas(views);

  return sumComments + sumLikes + sumViews;

};

// Array.isArray(datas) && datas.length == 0 