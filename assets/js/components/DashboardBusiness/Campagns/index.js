import React from 'react';

import Campagn from './Campagn';

import './campagns.scss';

const Campagns = () => (
  <div className="dashboard__campagns">
    <div className="campagns__headers">
      <div className="campagns__headers__child">Nom de la campagne</div>
      <div className="campagns__headers__child">Influenceurs</div>
      <div className="campagns__headers__child">Objectif atteint</div>
      <div className="campagns__headers__child">Date d'ajout</div>
    </div>
    <Campagn progression="50%"/>
    <Campagn progression="20%"/>
    <Campagn progression="100%"/>
    <Campagn progression="70%"/>
    <Campagn progression="10%"/>
    <Campagn progression="5%"/>
  </div>
);

export default Campagns;
