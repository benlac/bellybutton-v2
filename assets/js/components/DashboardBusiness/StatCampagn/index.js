import React from 'react';
import { useParams } from 'react-router-dom';

import { getRecipeBySlug } from '../../../utils/selectors';

import './stat_campagn.scss';
import Title from '../Title';
import Sort from '../../../containers/DashboardBusiness/StatCampagn/Sort';
import Stats from './Stats';

// TODO créer une fonction qui récupère la campagne en fonction du slug 

const StatCampagn = ({ campaigns }) => {
  const { slug } = useParams();
  console.log(slug);
  const campaign = getRecipeBySlug(campaigns, slug);
  console.log(campaign);
  return (
    <div className="dashboard__campagn-stat">
      <Title name={campaign.name} />
      <div className="stats__container">
        <Sort />
        <Stats {...campaign}/>
      </div>
    </div>
  );
}

export default StatCampagn;
