import React from 'react';

import './management.scss';

const Management = () => (
  <div className="dashboard__management">
    <form className="dashboard__search" >
    <input className="dashboard__input" type="text" />
  </form>
  <a className="dashboard__refresh" href="">Actualiser</a>
  </div>
);

export default Management;
