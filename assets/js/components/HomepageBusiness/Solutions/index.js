import React from 'react';

import './solutions.scss';
import brain from '../../../../images/Brain.png';
import charts from '../../../../images/Charts.png';
import chip from '../../../../images/Chip.png';
import eyes from '../../../../images/Eyes.png';
import social from '../../../../images/Social.png';

const Solutions = () => (
  <div className="home__solutions">
    <h3 className="home__solutions__title">Une opération commerciale réussie :</h3>
    <p className="home__solutions__subtitle">Notre solution tout-en-un</p>
    <div className="home__cards">
      <div className="home__solutions__card">
        <img className="home__card__img" src={eyes} alt=""/>
        <h4 className="home__card__title" >Une analyse minutieuse</h4>
        <p className="home__card__content">
          Analyse de la situation du client et offre sur mesure
          Quelle plateforme choisir ? Quel talent choisir pour représenter ma marque? Quels sont les indicateurs clefs à regarder pour établir ma campagne? Nous adaptons notre solution d’influence à vos besoins et contraintes réels. IRM, analyse et proposition sur mesure, pour une prestation sans commune mesure !
        </p>
      </div>
      <div className="home__solutions__card">
        <img className="home__card__img test" src={social} alt=""/>
        <h4 className="home__card__title" >Un catalogue d'influenceurs</h4>
        <p className="home__card__content">
          Nos influenceurs multiplateformes couvrent des thématiques variées et possèdent des  communautés de tailles différentes, nous permettant de recommander à nos clients les KOLs de leur marché, pour la réalisation de campagnes d’influences d’autant plus impactantes.
        </p>
      </div>
      <div className="home__solutions__card">
        <img className="home__card__img" src={chip} alt=""/>
        <h4 className="home__card__title" >Une technologie prioritaire</h4>
        <p className="home__card__content">
          Notre intelligence artificielle conçue par nos experts nous permet de prédire et de selectionner les audiences les plus adaptées. (manque une phrase)
        </p>
      </div>
      <div className="home__solutions__card">
        <img className="home__card__img test" src={brain} alt=""/>
        <h4 className="home__card__title" >Des idées innovantes</h4>
        <p className="home__card__content">
          Notre équipe met à votre disposition tout son savoir faire en matière de tendances pour vous assurer des campagnes en phase avec les attentes du marché, pour un taux de conversion encore et toujours optimisé.
        </p>
      </div>
      <div className="home__solutions__card">
        <img className="home__card__img" src={charts} alt=""/>
        <h4 className="home__card__title" >Des statistiques digestes</h4>
        <p className="home__card__content">
          Pour vous permettre de suivre l’évolution des KPIs importants, d’intégrer les statistiques à vos reportings internes et à votre stratégie de communication globale ou encore d’optimiser vos campagnes futures, nous proposons un dashboard de reportings en temps réel.
        </p>
      </div>
    </div>
  </div>
);

export default Solutions;

