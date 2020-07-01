import React from 'react';
import Fade from 'react-reveal/Fade';

import './solutions.scss';
import brain from '../../../../images/Brain.png';
import charts from '../../../../images/Charts.png';
import chip from '../../../../images/Chip.png';
import eyes from '../../../../images/Eyes.png';
import social from '../../../../images/Social.png';

const Solutions = () => (
  <div className="home__solutions">
    <Fade bottom>
      <h3 className="home__solutions__title">Une opération commerciale réussie :</h3>
    </Fade>
    <p className="home__solutions__subtitle">Notre solution tout-en-un</p>
    <div className="home__cards">
      <div className="home__solutions__card">
        <img className="home__card__img" src={eyes} alt=""/>
        <h4 className="home__card__title" >Une analyse minutieuse</h4>
        <p className="home__card__content">
        Quelle plateforme choisir ? Quel talent choisir pour représenter ma marque ? Quels sont les indicateurs clefs à analyser pour établir ma campagne ? Nous adaptons notre solution d’influence à vos besoins et contraintes réels.
        </p>
      </div>
      <div className="home__solutions__card">
        <img className="home__card__img" src={social} alt=""/>
        <h4 className="home__card__title" >Un catalogue d'influenceurs</h4>
        <p className="home__card__content">
        Nos influenceurs multiplateformes couvrent des thématiques variées et possèdent des communautés de tailles différentes nous permettant de recommander à nos clients les KOLs de leur marché pour des campagnes d’influences d’autant plus impactantes. 
        </p>
      </div>
      <div className="home__solutions__card">
        <img className="home__card__img" src={chip} alt=""/>
        <h4 className="home__card__title" >Une technologie prioritaire</h4>
        <p className="home__card__content">
        Nous avons dédié une équipe d’ingénieur à la conception d’outils de mesure pour nous permettre de prédire et de sélectionner les audiences et les communautés les plus adaptées afin de maximiser la portée des campagnes.
        </p>
      </div>
      <div className="home__solutions__card">
        <img className="home__card__img" src={brain} alt=""/>
        <h4 className="home__card__title" >Des idées innovantes</h4>
        <p className="home__card__content">
        Notre équipe met à votre disposition tout son savoir faire en matière de création pour vous assurer des campagnes en phase avec les attentes du marché pour un taux de conversion encore et toujours optimisé.
        </p>
      </div>
      <div className="home__solutions__card">
        <img className="home__card__img" src={charts} alt=""/>
        <h4 className="home__card__title" >Data visualisation et optimisation</h4>
        <p className="home__card__content">
        Pour vous permettre de suivre l’évolution des KPIs importants, d’intégrer les statistiques à vos reportings internes et de les optimiser, nous proposons un dashboard en temps réel pour suivre vos campagne de plus près. 
        </p>
      </div>
    </div>
  </div>
);

export default Solutions;

