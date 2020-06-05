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
        <Campagn title="Test" progression="34%"/>
    </div>
  );
}

export default Campagns;
