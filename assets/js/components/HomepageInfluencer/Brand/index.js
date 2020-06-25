import React from 'react';

import './brand.scss';

import illuInflu from '../../../../images/influencer.png';
import montgolfiere from '../../../../images/icons/montgolfiere.png'

const Brand = () => (
<div className="section1 section1--influencer">
  <div className="section1__content">
      <h1 className="section1__h1">Collaborez avec vos marques préférées</h1>
      <p className="section1__p">Une équipe d'experts et de passionés, des outils puissants et un vrai suivi à votre disposition. Recevez des offres de collaborations avec des marques fortes</p>
      <a className="btn btn--influencer" href="">Créez votre compte gratuitement</a>
  </div>
  <div className="section1__img">
  <img
  className="img__influ"
    src={illuInflu}
    alt="Illustration représentant les médias sociaux"
  />
  <img className="img__montgolfiere" src={montgolfiere} alt=""/>
  </div>
</div>
);

export default Brand;
