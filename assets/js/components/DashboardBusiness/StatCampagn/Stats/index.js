import React from 'react';
import { Line } from 'react-chartjs-2';

import Card from './Card';
import './stats.scss';

const Stats = () => {
  const dataByDays = {
    labels: ['01/06/20', '02/06/20', '03/06/20', '04/06/20', '05/06/20', '06/06/20', '07/06/20', '08/06/20', '09/06/20', '10/06/20', '11/06/20', '12/06/20', '13/06/20', '14/06/20', '15/06/20', '16/06/20'],
    datasets: [
      {
        label: 'Vues par jours',
        fill: false,
        lineTension: 0.1,
        borderColor: 'rgba(1,71,251,1)',
        pointBackgroundColor: 'rgba(0,37,188,1)',
        pointHoverBackgroundColor: 'rgba(75,192,192,1)',
        data: [100, 59, 806, 811, 556, 55, 440, 100, 200, 300, 1000, 499, 799, 100, 654, 1000]
      }
    ]
  };
  const dataTotal = {
    labels: ['01/06/20', '02/06/20', '03/06/20', '04/06/20', '05/06/20', '06/06/20', '07/06/20', '08/06/20', '09/06/20', '10/06/20', '11/06/20', '12/06/20', '13/06/20', '14/06/20', '15/06/20', '16/06/20'],
    datasets: [
      {
        label: 'Vues totales',
        fill: false,
        lineTension: 0.1,
        borderColor: 'rgba(0,37,188,1)',
        pointBackgroundColor: 'rgba(1,71,251,1)',
        pointHoverBackgroundColor: 'rgba(75,192,192,1)',
        data: [65, 59, 80, 81, 56, 55, 40, 100, 203, 300, 444, 500, 600, 760, 888, 1000]
      }
    ]
  };
  return (
    <div className="stats">
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
          stat="374 000"
          percent="+24%"
        />
        <Card
          nameClass="stats-card stats-card--engagement"
          title="Engagement"
          stat="4,2%"
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
          stat="19000"
          percent="+12%"
        />
        <Card
          nameClass="stats-card stats-card--likes"
          title="Likes"
          stat="31402"
          percent="+110%"
        />
      </div>
    </div>
  );
}

export default Stats;
