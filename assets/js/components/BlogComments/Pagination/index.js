import React from 'react';

import './pagination.scss';

const Pagination = ({
  pagination,
  prev,
  next,
  handleChangeNext,
  handleChangePrev
}) => (
  <div className="pagination-comments">
    {prev !== null &&
      <a className="pagination-comment__prev" href="" onClick={(e) => {
        e.preventDefault();
        handleChangePrev();
      }}>
      &#60; Préc
      </a>
    }
    <span className="pagination-comment__current">{pagination} </span>
    {next !== null &&
    <a className="pagination-comment__next" href="" onClick={(e) => {
      e.preventDefault();
      handleChangeNext();
    }}>
    Suiv &#62;
    </a>
    }
  </div>
);

export default Pagination;
