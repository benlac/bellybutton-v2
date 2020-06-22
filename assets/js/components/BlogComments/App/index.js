import React, { useState, useEffect } from 'react';
import axios from 'axios';

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

  useEffect(() => {
    loadComments();
  }, [])

  const loadComments = () => {
    axios.get(`http://localhost:8000/blog/api/comments/${article}`)
      .then((response) => {
        setComments(response.data);
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
        username: valueUser,
        body: valueComment,
        createdAt: new Date()
    }
    setComments([
      {
        ...newComment,
        id: comments.length + 1
      },
      ...comments
    ]);
    setValueComment('');
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
      {!loading && <ListComments comments={comments}/>}
    </div>
  );
};

export default App;
