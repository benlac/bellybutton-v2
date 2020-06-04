import React from 'react';
import { Link } from 'react-router-dom';

import './sort.scss';

const Sort = () => (
    <div className="sort">
    <Link
      to="/business/dashboard"
      className="dashboard-business__back"
    >
      Retour aux campagnes
    </Link>
      <div className="sort__influencers">Trier par influenceurs</div>
    </div>
);

export default Sort;
