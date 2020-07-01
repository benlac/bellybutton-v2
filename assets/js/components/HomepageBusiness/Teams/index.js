import React from 'react';
import Fade from 'react-reveal/Fade';

import './teams.scss';
import teams from '../../../../images/illu_plus_business.png'

const Teams = () => (
  <div className="section2">
    <img className="section2__business__img" src={teams} />
    <div className="section2__content">
      <Fade bottom>
        <h1 className="section2__h1">Notre petit plus ?</h1>
      </Fade>
      <h3 className="section2__subtitle">Une équipe de créatifs 3.0 pour des concepts <span className="section2__viraux">viraux</span> et efficaces.</h3>
      <p className="section2__p">Mettez votre passion au service des marques qui vous font vibrer. Monétisez votre audience avec Bellybutton tout en gardant un oeil en temps réel sur vos campagnes grâce à la disponibilité de nos équipes. Engagez votre audience.<br />
      Parce que la gestion de la relation avec les marques est souvent chronophage.</p>
    </div>
  </div>
);

export default Teams;
