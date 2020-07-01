import React from 'react';
import Fade from 'react-reveal/Fade';

import './audience.scss';
import illuInfluencer from '../../../../images/illu_influencers.png'

const Audience = () => (
  <div className="section2">
    <img className="section2__img" src={illuInfluencer} alt="Illustration représentant les médias sociaux"/>
    <div className="section2__content">
      <Fade bottom>
        <h1 className="section2__h1">Monétisez votre audience</h1>
      </Fade>
        <p className="section2__p">Mettez votre passion au service des marques qui vous font vibrer. Monétisez votre audience avec Bellybutton tout en gardant un oeil en temps réel sur vos campagnes grâce à la disponibilité de nos équipes et votre espace influenceur. Engagez votre audience. Nous gérons la collaboration avec les marques pour vous.</p>
    </div>
  </div>
);

export default Audience;
