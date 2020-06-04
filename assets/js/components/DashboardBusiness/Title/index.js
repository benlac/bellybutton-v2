import React from 'react';
import PropTypes from 'prop-types';

import './title.scss';

const Title = ({ name }) => (
  <div className="dashboard__title">
    <h2 className="dashboard__title__h2"> {name} </h2>
  </div>
);

Title.propTypes = {
  name: PropTypes.string.isRequired,
};

export default Title;
