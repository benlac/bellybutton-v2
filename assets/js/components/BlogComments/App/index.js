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

  return (
    <div className="comments">
      <AddComment />
      {loading && <Loader />}
      {!loading && <ListComments comments={comments}/>}
    </div>
  );
};

export default App;
