import React from 'react';

import './affecting.scss';
import img from '../../../../images/efluence.png';

const Affecting = () => (
  <div className="business-einfluence">
    <div className="business-einfluence__img">
      <img src={img} alt="Illustration représentant les médias sociaux"/>
    </div>
    <div className="business-einfluence__content">
      <h1 className="business-einfluence__h1">
      Avez-vous déjà entendu parler de l'e-influence ?
      </h1>
      <p className="business-einfluence__p">
      Si la réponse est oui, c’est sûrement dû à son efficacité redoutable. 
      Si la réponse est non, c’est sûrement dû au fait que cette technologie soit nouvelle et encore méconnue.
      Devenez un pure player et faite partie des piliers du marketing 3.0 ! <br/>
      Aujourd’hui, certains influenceurs sont devenus des KOLs (leaders d’opinion).
      Leur communauté ultra engagée garanti des taux d’engagement remarquables, des publicités virales et des ventes qui explosent.
      Résultat : Un véritable retour sur investissement quantitatif et qualitatif.
      </p>
    </div>
  </div>
);

export default Affecting;
