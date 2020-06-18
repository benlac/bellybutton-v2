import React from 'react';
import PropTypes from 'prop-types';

import './management.scss';

const Management = ({ value, handleChange, searchCampaign }) => {
  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('submit');
    searchCampaign();
  }
  return (
    <div className="dashboard__management">
      <form className="dashboard__search" onSubmit={handleSubmit} >
        <input
          className="dashboard__input"
          type="text"
          placeholder="Rechercher une campagnes..."
          value={value}
          onChange={(e) => {
            handleChange(e.target.value)
          }}
        />
      </form>
    <a className="btn btn--dashboard__refresh" href=""><i className="fas fa-sync-alt"></i> Actualiser</a>
    </div>
  );
};

Management.propTypes = {
  value: PropTypes.string.isRequired,
  handleChange: PropTypes.func.isRequired,
  searchCampaign: PropTypes.func.isRequired,
};

export default Management;
