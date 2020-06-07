import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/Reporting';

const mapStateToProps = (state) => ({
  campaigns: state.dashboardBusiness.datas,
  sortValue: state.dashboardBusiness.sortValue,
});

const mapDispatchToProps = (dispatch) => ({

});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);