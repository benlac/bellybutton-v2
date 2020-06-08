import React from 'react';
import { Line } from 'react-chartjs-2';
import PropTypes from 'prop-types';

import { sumDatas, engagementRate, totalImpression } from '../../../../utils/calculationDatas';

import Card from './Card';
import './stats.scss';
// TODO : gerer pour les vues si state sortValue = total
// fusioner les dates et les valeurs
const Stats = ({ likes, comments, views, name }) => {
   console.log(views);

  // Addtion des nombres qui ont la meme date de création
  const counts = views.reduce((prev, curr) => {
    const count = prev.get(curr.createdAt) || 0;
    prev.set(curr.createdAt, curr.number + count);
    return prev;
  }, new Map());
  
  const reducedObjArr = [...counts].map(([createdAt, number]) => {
    return {createdAt, number}
  })
  
  console.log(reducedObjArr);

  const viewsByDay = reducedObjArr.map((view) => view.number );
  const viewsByDate = reducedObjArr.map((view) => view.createdAt );

  const dataByDays = {
    labels: viewsByDate,
    datasets: [
      {
        label: 'Vues par jours',
        fill: false,
        lineTension: 0.1,
        borderColor: 'rgba(1,71,251,1)',
        pointBackgroundColor: 'rgba(0,37,188,1)',
        pointHoverBackgroundColor: 'rgba(75,192,192,1)',
        data: viewsByDay
      }
    ]
  };
  const dataTotal = {
    labels: ['01/06/20', '07/06/20','14/06/20'],
    datasets: [
      {
        label: 'Vues totales',
        fill: false,
        lineTension: 0.1,
        borderColor: 'rgba(0,37,188,1)',
        pointBackgroundColor: 'rgba(1,71,251,1)',
        pointHoverBackgroundColor: 'rgba(75,192,192,1)',
        data: [0, 500, 1000]
      }
    ]
  };
  return (
    <div className="stats">
      <h2>{name}</h2>
      <div className="stats__section1">
        <div className="stats-card stats-card--view-by-day">
          <h3>Vues par jours</h3>
          <div>
            <Line 
              data={dataByDays}
              width={700}
              height={250}
              options={{ maintainAspectRatio: false }}
            />
          </div>
        </div>
        <Card
          nameClass="stats-card stats-card--impressions"
          title="Impressions"
          stat={totalImpression(comments, likes, views)}
          percent="+24%"
        />
        <Card
          nameClass="stats-card stats-card--engagement"
          title="Engagement"
          stat={`${engagementRate(comments, likes, views)} %`}
          percent="-1%"
        />
      </div>
      <div className="stats__section2">
        <div className="stats-card stats-card--view-total">
          <h3>Vues totales</h3>
          <div>
            <Line 
              data={dataTotal}
              width={700}
              height={250}
              options={{ maintainAspectRatio: false }}
            />
          </div>
        </div>
        <Card
          nameClass="stats-card stats-card--comments"
          title="Commentaires"
          stat={sumDatas(comments)}
          percent="+12%"
        />
        <Card
          nameClass="stats-card stats-card--likes"
          title="Likes"
          stat={sumDatas(likes)}
          percent="+110%"
        />
      </div>
    </div>
  );
}

Stats.propTypes = {
  likes: PropTypes.array,
  comments: PropTypes.array,
  views: PropTypes.array,
};

export default Stats;
