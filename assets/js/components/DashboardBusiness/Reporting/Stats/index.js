import React from 'react';
import { Line } from 'react-chartjs-2';
import PropTypes from 'prop-types';

import { sumDatas, engagementRate, totalImpression, addNumbWithSameDate, addNumbAndSortEveryFive } from '../../../../utils/calculationDatas';

import Card from './Card';
import './stats.scss';

const Stats = ({ likes, comments, views, name }) => {
  const reducedObjArr = addNumbWithSameDate(views); 
  const viewEveryFive = addNumbAndSortEveryFive(reducedObjArr);
  const viewsByDay = reducedObjArr.map((view) => view.number );
  const viewsByDate = reducedObjArr.map((view) => view.createdAt );
  const viewFiveNum = viewEveryFive.map((view) => view.number);
  const viewFiveDate = viewEveryFive.map((view) => view.createdAt);

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
    labels: viewFiveDate,
    datasets: [
      {
        label: 'Vues totales',
        fill: false,
        lineTension: 0.1,
        borderColor: 'rgba(0,37,188,1)',
        pointBackgroundColor: 'rgba(1,71,251,1)',
        pointHoverBackgroundColor: 'rgba(75,192,192,1)',
        data: viewFiveNum
      }
    ]
  };
  return (
    <div className="stats">
      <h2>{name}</h2>
      <div className="stats__section">
        <div className="stats-card stats-card--chart">
          <h3 className="stats-card__title">Vues par jours</h3>
          <div>
            <Line 
              data={dataByDays}
              width={700}
              height={250}
              options={{ maintainAspectRatio: false }}
            />
          </div>
        </div>
        <div className="stats__container__end">
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
      </div>
      <div className="stats__section">
        <div className="stats-card stats-card--chart">
          <h3 className="stats-card__title">Vues totales</h3>
          <div>
            <Line 
              data={dataTotal}
              width={700}
              height={250}
              options={{ maintainAspectRatio: false }}
            />
          </div>
        </div>
        <div className="stats__container__end">
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
    </div>
  );
}

Stats.propTypes = {
  likes: PropTypes.array,
  comments: PropTypes.array,
  views: PropTypes.array,
};

export default Stats;
