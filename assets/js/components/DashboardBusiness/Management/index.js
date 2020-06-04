import React from 'react';

import './management.scss';

const Management = () => (
  <div className="dashboard__management">
    <form className="dashboard__search" >
      <input
        className="dashboard__input"
        type="text"
        placeholder="Rechercher une campagnes..."
      />
    </form>
  <a className="btn btn--dashboard__refresh" href=""><i className="fas fa-sync-alt"></i> Actualiser</a>
  </div>
);

export default Management;
