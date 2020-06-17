import React from 'react';

import './listComments.scss';

const ListComments = () => (
  <div className="comment__display">
    <i className="fas fa-user-circle fa-3x"></i>
    <div className="comment__display__content">
      <h4 className="comment__display__title">Benoit</h4>
      <p className="comment__display__text">Très belle article</p>
    </div>
  </div>
);

export default ListComments;
