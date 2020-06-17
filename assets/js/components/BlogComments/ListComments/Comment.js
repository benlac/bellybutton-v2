import React from 'react';
import PropTypes from 'prop-types';

const Comment = ({ username, body }) => (
  <div className="comment__display">
    <i className="fas fa-user-circle fa-3x"></i>
    <div className="comment__display__content">
      <h4 className="comment__display__title">{username}</h4>
      <p className="comment__display__text">{body}</p>
    </div>
  </div>
)

Comment.propTypes = {
  username: PropTypes.string.isRequired,
  body: PropTypes.string.isRequired,
};

export default Comment;
