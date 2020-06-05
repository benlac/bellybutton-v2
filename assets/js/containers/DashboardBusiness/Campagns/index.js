import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/Campagns';



const mapStateToProps = (state) => ({
  // campaigns: state.dashboardBusinness.datas,
});

const mapDispatchToProps = (dispatch) => ({
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);

// const pourcentage = ( campaign.viewGoal - campaign.view) / campaign.view * 100;