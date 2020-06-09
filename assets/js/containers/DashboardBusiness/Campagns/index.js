import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/Campagns';

import { resetSortValue } from '../../../actions/dashboardBusiness';

const mapStateToProps = (state) => ({
  campaigns: state.dashboardBusiness.datas,
});

const mapDispatchToProps = (dispatch) => ({
  resetSortValue: () => {
    dispatch(resetSortValue());
  }
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);
