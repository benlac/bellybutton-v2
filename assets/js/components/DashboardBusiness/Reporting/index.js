import React from 'react';
import { useParams } from 'react-router-dom';
import PropTypes from 'prop-types';

import { getCampaignBySlug } from '../../../utils/selectors';

import './stat_campagn.scss';
import Title from '../Title';
import Sort from '../../../containers/DashboardBusiness/Reporting/Sort';
import Stats from './Stats';

const Reporting = ({ campaigns, sortValue }) => {
  const { slug } = useParams();
  const campaign = getCampaignBySlug(campaigns, slug);
  const supports = campaign.supports;

  const ttxSupports = supports.map((support) => support);

  // Récuperation d'un tableau d'objet des stats pour tous les supports réunis
  const allComments = ttxSupports.map((ttxSupport) =>  ttxSupport.comments)
  const allLikes = ttxSupports.map((ttxSupport) =>  ttxSupport.likes)
  const allViews = ttxSupports.map((ttxSupport) =>  ttxSupport.views)
  const commentsTotal = allComments.flat();
  const likesTotal = allLikes.flat();
  const viewsTotal = allViews.flat();

  // Création d'un objet a envoyer au composant enfant si sortValue vaut 'total'
  const supportSortedTotal = {
    name: 'Total',
    likes: likesTotal,
    comments: commentsTotal,
    views: viewsTotal,
  };

  // Si sortValue vaut 'total' on envoie l'objet avec les stats global, sinon on tri en fonction de la valeur du select récuperer dans le state
  const supportSorted = sortValue === 'total' ? supportSortedTotal : supports.find((support) => support.name === sortValue);

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
