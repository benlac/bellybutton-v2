import React from 'react';
import Fade from 'react-reveal/Fade';

import './odnf.scss';
import about from '../../../../images/about_4.png';

const Odnf = () => (
  <div className="about__fourth">
    <img className="about__fourth__img" src={about} alt="Illustration représentant les médias sociaux"/>
    <div className="about__fourth__content">
      <Fade bottom>
        <h1 className="about__fourth__h1">Bellybutton x ODNF</h1>
      </Fade>
      <p className="about__fourth__p">Reforestation massive, préservation d’espaces verts en France, mise en place d’un lien social prometteur ou encore la participation aux ressources de la banque alimentaire locale...en d’autres termes autant d’ambitions qui nous ont poussé à décider de reverser 2% de nos bénéfices à l’association. Aussi, nous nous engageons pour chaque opération commerciale menée à un don de 10€ à l’association Planète Urgence, pour la plantation de 10 arbres. Travailler avec nous c’est donc concrètement soutenir la cause écologique. Participer à une opération commerciale avec nous c'est donc participer aussi au combat écologique</p>
    </div>
</div>
);

export default Odnf;
