import React from 'react';

import './odnf.scss';
import about from '../../../../images/about_4.png';

const Odnf = () => (
  <div className="about__fourth">
    <img className="about__fourth__img" src={about} alt="Illustration représentant les médias sociaux"/>
    <div className="about__fourth__content">
        <h1 className="about__fourth__h1">Bellybutton x ODNF</h1>
        <p className="about__fourth__p">Reforestation massive, préservation d’espaces <br /> verts en France, mise en place d’un lien social <br /> prometteur ou encore la participation aux <br /> ressources de la banque alimentaire locale...en <br /> d’autres termes autant d’ambitions qui nous ont <br /> poussé à décider de reverser 2% de nos bénéfices <br /> à l’association. Aussi, nous nous engageons pour <br /> chaque opération commerciale menée à un don de 10€ <br /> à l’association Planète Urgence, pour la <br /> plantation de 10 arbres. Travailler avec nous c’est <br /> donc concrètement soutenir la cause écologique. <br /> Participer à une opération commerciale avec nous c'est donc participer aussi au combat écologique</p>
    </div>
</div>
);

export default Odnf;
