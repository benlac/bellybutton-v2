import React from 'react';

import './environment.scss';
import about from '../../../../images/about_3.png';

const Environment = () => (
  <div className="about__third">
    <div className="about__third__content">
        <h1 className="about__third__h1">Responsabilité <br />environnementale</h1>
        <p className="about__third__p">Parce que nous pensons qu’une entreprise au 21ème siècle se doit de s’engager concrètement dans l’action écologique (et non plus seulement faire du washing), pour concrétiser nos ambitions d’impact et utiliser notre visibilité et notre influence. Bellybutton s’associe avec L’Or de nos Forêts (ODNF), association loi 1901 oeuvrant pour la création de forêts-jardins comestibles en France et dans le monde. 2% des bénéfices de Bellybutton sont ainsi versés à l’ODNF. #Offronsnotreinfluence</p>
    </div>
    <img className="about__third__img" src={about} alt="Illustration représentant les médias sociaux"/>
</div>
);

export default Environment;
