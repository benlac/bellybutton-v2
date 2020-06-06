import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/App';

import { fetchUserId } from '../../../actions/dashboardBusiness';

const mapStateToProps = (state) => ({
  loading: state.dashboardBusiness.loading,
  user: state.dashboardBusiness.userId,
});

const mapDispatchToProps = (dispatch) => ({
  fetchUserId: () => {
    dispatch(fetchUserId());
  },
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);
