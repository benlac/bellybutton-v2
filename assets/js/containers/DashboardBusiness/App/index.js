import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/App';

import { fetchDatas } from '../../../actions/dashboardBusiness';

const mapStateToProps = (state) => ({

});

const mapDispatchToProps = (dispatch) => ({
  fetchDatas: () => {
    dispatch(fetchDatas());
  }
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);