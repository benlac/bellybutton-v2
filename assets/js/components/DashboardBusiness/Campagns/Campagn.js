import React from 'react';
import PropTypes from 'prop-types';
import { NavLink } from 'react-router-dom';
import slugify from 'slugify';

const Campagn = ({ view, viewGoal, name, users, createdAt }) => {
  let pourcentage = ( viewGoal - view) / view * 100;
  if(pourcentage >= 100){
    pourcentage = 100;
  } else if (pourcentage < 0) {
    pourcentage = 0;
  }
  const pourcentageDisplay = `${Math.round(pourcentage)}%`;
  console.log(users);
  return (
    <NavLink to={`${window.location.pathname}/${slugify(name, {
      lower: true,
    })}`} >
    <div className="campagns__row">
      <div className="campagns__row__child campagns__row__child--title">{name}</div>
      <div className="campagns__row__child campagns__row__child--users"><i className="fas fa-users"></i> {users.length}</div>
      <div className="campagns__row__child campagns__row__child--progress">
        <div
        className="progress-bar"
        >
          <div
          className="progression"
          style={{ width: pourcentageDisplay }}
          />
        </div>
        <div className="number">{pourcentageDisplay}</div>
      </div>
      <div className="campagns__row__child campagns__row__child--date">{createdAt}</div>
    </div>
    </NavLink>
  );
}
Campagn.propTypes = {
  view: PropTypes.number.isRequired,
  viewGoal: PropTypes.number.isRequired,
  name: PropTypes.string.isRequired,
  users: PropTypes.array.isRequired,
};

export default Campagn;
