import React from 'react';
import { Line } from 'react-chartjs-2';
import PropTypes from 'prop-types';

import { sumDatas, engagementRate, totalImpression } from '../../../../utils/calculationDatas';

import Card from './Card';
import './stats.scss';

const Stats = ({ likes, comments, views, name }) => {
  const viewsByDay = views.map((view) => view.number );
  const viewsByDate = views.map((view) => view.createdAt );

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

  console.log(viewsByDay, viewsByDate);
  // TODO calcul pour tous les supports
  // @TODO enlever le state en dur sortValue pour remplacer par total et donc la somme de tous les supports
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
  likes: PropTypes.array.isRequired,
  comments: PropTypes.array.isRequired,
  views: PropTypes.array.isRequired,
};

export default Stats;
