import { connect } from 'react-redux';

import App from '../../../components/DashboardBusiness/Management';

import { handleChangeSearch, searchCampaign } from '../../../actions/dashboardBusiness';

const mapStateToProps = (state) => ({
  value: state.dashboardBusiness.valueSearch,
});

const mapDispatchToProps = (dispatch) => ({
  handleChange: (e) => {
    dispatch(handleChangeSearch(e));
  },
  searchCampaign: () => {
    dispatch(searchCampaign());
  }
});

export default connect(
  mapStateToProps,
  mapDispatchToProps,
)(App);
