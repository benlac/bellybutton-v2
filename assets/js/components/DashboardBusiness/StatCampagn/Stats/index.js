import React from 'react';
import { Line } from 'react-chartjs-2';

import './stats.scss';

const Stats = () => (
  <div className="stats">
    <div className="stats__section1">
      <div className="stats-card stats-card--view-by-day">
        <h3>Vues par jours</h3>
        <div>
          <Line />
        </div>
      </div>
      <div className="stats-card stats-card--impressions">
        <h3>Impressions</h3>
        <p>374 000</p>
        <p>+24%</p>
        <p>par rapport aux stats habituelles de l'influencer</p>
      </div>
      <div className="stats-card stats-card--engagement">
        <h3>Engagement</h3>
        <p>4,2%</p>
        <p>-1%</p>
        <p>par rapport aux stats habituelles de l'influencer</p>
      </div>
    </div>
    <div className="stats__section2">
      <div className="stats-card stats-card--view-total">
        <h3>Vues totales</h3>
        <div>
          <Line 
            height={50}
            width={100}
          />
        </div>
      </div>
      <div className="stats-card stats-card--comments">
        <h3>Commentaires</h3>
        <p>19000</p>
      </div>
      <div className="stats-card stats-card--likes">
      <h3>Likes</h3>
        <p>31402</p>
        <p>+110%</p>
        <p>vs dislike</p>
      </div>
    </div>
  </div>
);

export default Stats;
