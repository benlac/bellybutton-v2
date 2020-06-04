import React from 'react';
import { useParams } from 'react-router-dom';

import './stat_campagn.scss';
import Title from '../Title';
import Sort from './Sort';
import Stats from './Stats';

// TODO créer une fonction qui récupère la campagne en fonction du slug 

const StatCampagn = () => {
  const { slug } = useParams();
  return (
    <div className="dashboard__campagn-stat">
      <Title name="Reporting : Campagnes 18-35 ans" />
      <div className="stats__container">
        <Sort />
        <Stats />
      </div>
    </div>
  );
}

export default StatCampagn;
