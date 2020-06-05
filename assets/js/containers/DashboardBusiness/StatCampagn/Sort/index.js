import { connect } from 'react-redux';

import App from '../../../../components/DashboardBusiness/StatCampagn/Sort';

const mapStateToProps = (state) => ({
  user: state.dashboardBusiness.userId,
});

const mapDispatchToProps = (dispatch) => ({

});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);