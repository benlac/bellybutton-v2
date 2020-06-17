import React from 'react';
import { render } from 'react-dom';

import App from '../components/BlogComments/App';
import '../../scss/app.scss';

const target = document.getElementById('root_comments');

const articleId = target.dataset.articleId;

render(
  <App articleId={articleId} />,
  target
);
