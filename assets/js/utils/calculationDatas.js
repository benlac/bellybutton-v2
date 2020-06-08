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

// Array.isArray(dataNumber) && dataNumber.length == 0 