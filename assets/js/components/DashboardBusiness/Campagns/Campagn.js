import React from 'react';
import PropTypes from 'prop-types';


const Campagn = ({ progression }) => (
  <div className="campagns__row">
    <div className="campagns__row__child">Lancement nouveau produit</div>
    <div className="campagns__row__child">12</div>
    <div className="campagns__row__child campagns__row__child--progress-bar">
      <div className="progression"  style={{ width: progression }}></div>
    </div>
    <div className="campagns__row__child">01/06/2020</div>
  </div>
);

Campagn.propTypes = {
  progression: PropTypes.string.isRequired,
};

export default Campagn;
