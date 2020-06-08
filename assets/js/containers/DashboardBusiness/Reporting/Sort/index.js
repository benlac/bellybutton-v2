import { connect } from 'react-redux';

import App from '../../../../components/DashboardBusiness/Reporting/Sort';

import { sortValue, resetSortValue } from '../../../../actions/dashboardBusiness';

const mapStateToProps = (state) => ({
  user: state.dashboardBusiness.userId,
  campaigns: state.dashboardBusiness.datas
});

const mapDispatchToProps = (dispatch) => ({
  sortValue: (value) => {
    dispatch(sortValue(value))
  },
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);