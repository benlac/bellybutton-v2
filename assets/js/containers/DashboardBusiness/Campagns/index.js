import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/Campagns';



const mapStateToProps = (state) => ({
  campaigns: state.dashboardBusiness.datas,
});

const mapDispatchToProps = (dispatch) => ({
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);
