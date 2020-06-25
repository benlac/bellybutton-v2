import React from 'react';

import './expert.scss';
import about from '../../../../images/about_2.png';

const Expert = () => (
  <div className="about__second">
    <img className="about__second__img" src={about} alt="Illustration représentant les médias sociaux"/>
    <div className="about__second__content">
        <h1 className="about__second__h1">Une équipe d'experts</h1>
        <p className="about__second__p">L’équipe Bellybutton est composée d'experts mais surtout de personnes passionnées par le monde de l'influence marketing. Nous vous conseillons et vous assistons dans le lancement de campagnes publicitaires à fort impact. Toujours disponible, toujours ouverte à la discussion, notre équipe veut fournir les services les plus adaptés à vos besoins réels pour construire une relation de long terme et significative avec vous.</p>
    </div>
</div>
);

export default Expert;
