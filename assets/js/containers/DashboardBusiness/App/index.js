import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/App';

import { fetchDatas, fetchUserId } from '../../../actions/dashboardBusiness';

const mapStateToProps = (state) => ({
  loading: state.dashboardBusiness.loading,
});

const mapDispatchToProps = (dispatch) => ({
  fetchDatas: () => {
    dispatch(fetchDatas());
  },
  fetchUserId: (id) => {
    dispatch(fetchUserId(id));
  },
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);