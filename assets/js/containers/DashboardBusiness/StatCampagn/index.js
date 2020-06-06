import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/StatCampagn';

const mapStateToProps = (state) => ({
  campaigns: state.dashboardBusiness.datas,
});

const mapDispatchToProps = (dispatch) => ({

});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);