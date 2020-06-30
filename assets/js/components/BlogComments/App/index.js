import React, { useState, useEffect } from 'react';
import axios from 'axios';
import PropTypes from 'prop-types';

import './app.scss';
import AddComment from '../AddComment';
import ListComments from '../ListComments';
import Loader from '../../DashboardBusiness/Loader';

const App = ({ articleId }) => {
  const [loading, setLoading] = useState(true);
  const [comments, setComments] = useState([]);
  const [article, setArticle] = useState(articleId);
  const [valueUser, setValueUser] = useState('');
  const [valueComment, setValueComment] = useState('');
  const [pagination, setPagination] = useState(1);
  const [prev, setPrev] = useState(null);
  const [next, setNext] = useState(2);

  useEffect(() => {
    loadComments();
  }, [pagination])

  const loadComments = () => {
    axios.get(`http://localhost:8000/blog/api/comments/${article}?page=${pagination}`)
      .then((response) => {
        setComments(response.data.comments);
        setPrev(response.data.prev);
        setNext(response.data.next);
      })
      .catch((error) => {
        console.warn(error);
      })
      .finally(() => {
        setLoading(false);
      })
  }

  const addNewComment = () => {
    const newComment = {
        id: comments.length + 1, 
        username: valueUser,
        body: valueComment,
        createdAt: new Date()
    }
    if(valueComment.trim() !== '') {
      setComments([
        {
          ...newComment
        },
        ...comments
      ]);
      axios({
        method: 'post',
        url: `http://localhost:8000/blog/api/article/${article}`,
        data: newComment,
      })
        .then((response) => {
          console.log(response);
          setValueComment('');
        })
        .catch((error) => {
          console.warn(error);
        });
    }
  }

  const changePagninationToNext = () => {
    if(next !== null) {
      setPagination(p => p + 1);
    }
  }

  const changePagninationToPrev = () => {
    if(prev !== null) {
      setPagination(p => p - 1);
    }
  }

  return (
    <div className="comments">
      <AddComment
        valueUser={valueUser}
        handleChange={setValueUser}
        valueComment={valueComment}
        handleChangeComment={setValueComment}
        submitComment={addNewComment}
      />
      {loading && <Loader />}
      {!loading && <ListComments
        comments={comments}
        pagination={pagination}
        prev={prev}
        next={next}
        handleChangeNext={changePagninationToNext}
        handleChangePrev={changePagninationToPrev}
      />}
    </div>
  );
};

App.propTypes = {
  articleId: PropTypes.string.isRequired,
};

export default App;
