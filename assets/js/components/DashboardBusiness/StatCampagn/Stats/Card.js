import React from 'react';
import PropTypes from 'prop-types';

const Card = ({
  nameClass,
  title,
  stat,
  percent,
}) => {
  const classPercent = percent.indexOf('-') === 0 ? 'stats-card__percent stats-card__percent--red' : 'stats-card__percent stats-card__percent--green';
  return (
    <div className={nameClass}>
      <h3 className="stats-card__title">{title}</h3>
      <div className="stats-card__content">
        <p className="stats-card__number">{stat}</p>
        <p className={classPercent}>{percent}</p>
        <p className="stats-card__text">vs stats génerale de l'influencer</p>
      </div>
    </div>
  );
}

Card.propTypes = {
  nameClass: PropTypes.string.isRequired,
  title: PropTypes.string.isRequired,
  stat: PropTypes.number.isRequired,
  percent: PropTypes.string.isRequired,
}

export default Card;