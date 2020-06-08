import React from 'react';
import { Link } from 'react-router-dom';
import { useParams } from 'react-router-dom';
import PropTypes from 'prop-types';

import { getCampaignBySlug } from '../../../../utils/selectors';

import './sort.scss';

const Sort = ({ user, sortValue, campaigns, resetSortValue }) => {
  const handleChange = (e) => {
    sortValue(e.target.value)
  };
  const handleValue = () => {
    resetSortValue();
  }
  const { slug } = useParams();
  const campaign = getCampaignBySlug(campaigns, slug);
  const supports = campaign.supports;
  console.log(supports);

  return (
      <div className="sort">
      <Link
        to={`/business/dashboard/${user}`}
        className="dashboard-business__back"
        onClick={handleValue}
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
          <option className="list__support__item" value="total">
              Stats global
          </option>
          {supports.map((support) => (
            <option key={support.id} className="list__support__item" value={support.name}>
              {support.name}
            </option>
          ))}
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
