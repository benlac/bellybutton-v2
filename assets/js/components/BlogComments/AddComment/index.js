import React from 'react';

import './addComment.scss';

const AddComment = () => (
  <>
    <h3 className="comment__title">Commentaires</h3>
    <form>
      <input type="text" className="comment__username" placeholder="Votre nom"/>
      <textarea type="text" className="comment__content" placeholder="Ajouter un commentaire"/>
      <button className="btn btn--comment">Ajouter</button>
    </form>
  </>
);

export default AddComment;
