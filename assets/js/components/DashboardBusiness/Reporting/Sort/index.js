import React from 'react';
import { Link } from 'react-router-dom';
import PropTypes from 'prop-types';

import './sort.scss';

const Sort = ({ user, sortValue }) => {
  const handleChange = (e) => {
    console.log(e.target.value);
    sortValue(e.target.value)
  };
  return (
      <div className="sort">
      <Link
        to={`/business/dashboard/${user}`}
        className="dashboard-business__back"
      >
        Retour aux campagnes
      </Link>
        <div className="sort__influencers">Trier par vidéo</div>
          <select
            className="list__support"
            name="list-supports"
            id="lists--supports"
            onChange={handleChange}
          >
            <option
              className="list__support__item list__support__item" 
              value="total"
            >
              Stats global
            </option>
            <option className="list__support__item--active" value="The Beatles - Hey Jude - Allie Sherlock Cover">
            The Beatles - Hey Jude - Allie Sherlock Cover
            </option>
            <option className="list__support__item" value="Tuto GraphQL">
              Tuto GraphQL
            </option>
            <option className="list__support__item" value="J'ai trouvé moins intuitif qu'impots.gouv.fr !">
              J'ai trouvé moins intuitif qu'impots.gouv.fr !
            </option>
          </select>
        </div>
  );
}

Sort.propTypes = {
  sortValue: PropTypes.func.isRequired,
  user: PropTypes.oneOfType([
    PropTypes.number.isRequired,
    PropTypes.string.isRequired,
  ]).isRequired,
};
export default Sort;
