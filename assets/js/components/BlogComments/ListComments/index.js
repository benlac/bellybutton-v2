import React from 'react';
import PropTypes from 'prop-types';

import Comment from './Comment';
import './listComments.scss';
import Pagination from '../Pagination';

const ListComments = ({
  comments,
  pagination,
  handleChangeNext,
  handleChangePrev,
  prev,
  next,
}) => {
  const paginate = pagination === 1 && next === null ? false : true;
  return (
    <>
      {comments.map((comment) => (
        <Comment key={comment.id} {...comment}/>
      ))}
      {paginate &&
      <Pagination
        pagination={pagination}
        handleChangeNext={handleChangeNext}
        handleChangePrev={handleChangePrev}
        prev={prev}
        next={next}
      />
      }
    </>
  );
}

ListComments.propTypes = {
  comments: PropTypes.arrayOf(PropTypes.shape({
    id: PropTypes.number.isRequired,
  })).isRequired,
};

export default ListComments;
