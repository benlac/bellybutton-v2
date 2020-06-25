import React from 'react';

import header_business from '../../../../images/business_header.png'
import discussion from '../../../../images/icons/discussion.png'
import heart from '../../../../images/icons/heart.png'
import picture from '../../../../images/icons/picture.png'

import './header.scss';

const Header = () => (
  <div className="section1">
    <div className="section1__content">
      <h1 className="section1__h1">
        Des millions de vues <br /> à portée de clic
      </h1>
      <p className="section1__p">Une équipe d'experts et de passionés, des outils puissants et un vrai suivi à votre disposition. Recevez votre devis de campagne d'influence personnalisé sous 24 heures.</p>
      <a className="btn btn--business" href="">Obtenez votre solution <strong>sur mesure</strong></a>
      <p className="section1__P2">Audit complet gratuit, sans engagement, sans carte bancaire</p>
    </div>
    <div className="section1__img">
      <img
        className="img__header"
        src={header_business} alt="Illustration représentant les médias sociaux"
      />
      <img className="img__discussion" src={discussion} alt=""/>
      <img className="img__heart" src={heart} alt=""/>
      <img className="img__picture" src={picture} alt=""/>
    </div>
  </div>
);

export default Header;
