import { connect } from 'react-redux';

import App from '../../../../components/DashboardBusiness/Reporting/Sort';

import { sortValue } from '../../../../actions/dashboardBusiness';

const mapStateToProps = (state) => ({
  user: state.dashboardBusiness.userId,
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