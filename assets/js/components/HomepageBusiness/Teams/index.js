import React from 'react';

import './teams.scss';
import teams from '../../../../images/illu_plus_business.png'

const Teams = () => (
  <div className="section2">
    <img className="section2__business__img" src={teams} />
    <div className="section2__content">
        <h1 className="section2__h1">Notre petit plus ?</h1>
        <h3 className="section2__subtitle">Une équipe de créatifs 3.0 pour des concepts <span className="section2__viraux">viraux</span> et efficaces.</h3>
        <p className="section2__p">Vous avez besoin d’aide pour gérer votre carrière? négocier vos contrats ? avez-besoin d'écoute? de conseils? Mettez votre passion au service des marques qui vous font vibrer. Monétisez votre audience avec Bellybutton tout en gardant un oeil en temps réel sur vos campagnes grâce à la disponibilité de nos équipes et votre espace influenceur. Engagez votre audience. Nous gérons la collaboration avec les marques pour vous. <br />
        Parce que la gestion de la relation avec les marques est souvent chronophage. Parce que que votre métier est de vous concentrer sur la création de contenu pour votre audience. Parce que les marques engagées et engageantes nécessitent un traitement premium.</p>
    </div>
  </div>
);

export default Teams;
