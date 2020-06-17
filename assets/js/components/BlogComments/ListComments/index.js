import React from 'react';
import PropTypes from 'prop-types';

import Comment from './Comment';
import './listComments.scss';

const ListComments = ({ comments }) => (
  comments.map((comment) => (
    <Comment key={comment.id} {...comment}/>
  ))
);

ListComments.propTypes = {
  comments: PropTypes.arrayOf(PropTypes.shape({
    id: PropTypes.number.isRequired,
  })).isRequired,
};

export default ListComments;
