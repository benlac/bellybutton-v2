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
    <Campagn progression="50%" title="Campagnes France 18-35 ans" />
    <Campagn progression="20%" title="Lancement du nouveau produit" />
    <Campagn progression="100%" title="Lancement collection été" />
    <Campagn progression="70%" title="Ciblage étendu Canada Belgique" />
    <Campagn progression="10%" title="Fin d'année lancement produit" />
    <Campagn progression="0%" title="Campagne de fin d'année" />
  </div>
);

export default Campagns;
