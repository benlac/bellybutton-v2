import React from 'react';
import PropTypes from 'prop-types';
import { NavLink } from 'react-router-dom';
import slugify from 'slugify';

const Campagn = ({ progression, title }) => (
  <NavLink to={`/business/dashboard/${slugify(title, {
    lower: true,
  })}`} >
  <div className="campagns__row">
    <div className="campagns__row__child">{title}</div>
    <div className="campagns__row__child"><i class="fas fa-users"></i> 12</div>
    <div className="campagns__row__child campagns__row__child--progress">
      <div
      className="progress-bar"
      >
        <div
        className="progression"
        style={{ width: progression }}
        />
      </div>
      <div className="number">{progression}</div>
    </div>
    <div className="campagns__row__child">01/06/2020</div>
  </div>
  </NavLink>
);

Campagn.propTypes = {
  progression: PropTypes.string.isRequired,
  title: PropTypes.string.isRequired,
};

export default Campagn;
