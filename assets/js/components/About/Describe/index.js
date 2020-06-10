import React from 'react';

import './describe.scss';
import about from '../../../../images/about.png';

const Describe = () => (
  <div className="about">
    <div className="about__content">
        <h1 className="about__h1">À propos de nous</h1>
        <p className="about__p">Bellybutton aide les agences à <br />pénétrer dans le monde du marketing d'influence<br /> afin d'atteindre un public plus large grâce à de <br /> puissants outils de prédiction, des performances et <br /> à une équipe d'experts en marketing d'influence</p>
    </div>
    <img className="about__img" src={about} alt="Illustration représentant les médias sociaux"/>
</div>
);

export default Describe;
