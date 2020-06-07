import React from 'react';
import { useParams } from 'react-router-dom';
import PropTypes from 'prop-types';

import { getRecipeBySlug } from '../../../utils/selectors';

import './stat_campagn.scss';
import Title from '../Title';
import Sort from '../../../containers/DashboardBusiness/Reporting/Sort';
import Stats from './Stats';

const Reporting = ({ campaigns, sortValue }) => {
  const { slug } = useParams();
  const campaign = getRecipeBySlug(campaigns, slug);
  const supports = campaign.supports;

  // Tri des support en fonction de la valeur du select
  const supportSorted = supports.find((support) => 
  support.name === sortValue);
  console.log(supportSorted);
  //@TODO COndition pour aditionner tous les support if sortValue === total alors retourner supports 
  // if (sortValue === 'total') {
  //   supportSorted = supports;
  // };
  return (
    <div className="dashboard__campagn-stat">
      <Title name={campaign.name} />
      <div className="stats__container">
        <Sort />
        <Stats {...supportSorted}/>
      </div>
    </div>
  );
}

Reporting.propTypes = {
  campaigns: PropTypes.arrayOf(
    PropTypes.shape({
      name: PropTypes.string.isRequired,
    }).isRequired,
  ).isRequired,
};

export default Reporting;
