import React from 'react';

import './app.scss';
import AddComment from '../AddComment';
import ListComments from '../ListComments';

const App = () => (
  <div className="comments">
    <AddComment />
    <ListComments />
  </div>
);

export default App;
