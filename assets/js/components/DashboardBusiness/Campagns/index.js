import React from 'react';

import Campagn from './Campagn';

import './campagns.scss';

const Campagns = ({ campaigns }) => {
  console.log(campaigns);
  return (
    <div className="dashboard__campagns">
      <div className="campagns__headers">
        <div className="campagns__headers__child">Nom de la campagne</div>
        <div className="campagns__headers__child">Influenceurs</div>
        <div className="campagns__headers__child">Objectif atteint</div>
        <div className="campagns__headers__child">Date d'ajout</div>
      </div>
        {campaigns.map((campaign) => {
          console.log(campaign);
          return (
          <Campagn {...campaign} key={campaign.id}/>
          )
        })}
    </div>
  );
}

export default Campagns;
