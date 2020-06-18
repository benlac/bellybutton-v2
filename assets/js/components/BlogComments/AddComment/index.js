import React from 'react';

import './addComment.scss';

const AddComment = ({ valueUser, handleChange, valueComment, handleChangeComment, submitComment }) => {
  const handleSubmit = (e) => {
    e.preventDefault();
    submitComment();
  }
  return (
    <>
      <h3 className="comment__title">Commentaires</h3>
      <form onSubmit={handleSubmit} >
        <input
          type="text"
          className="comment__username"
          placeholder="Votre nom"
          value={valueUser}
          onChange={(event) => {
            handleChange(event.target.value);
          }}
        />
        <textarea
          type="text"
          className="comment__content"
          placeholder="Ajouter un commentaire"
          value={valueComment}
          onChange={(event) => {
            handleChangeComment(event.target.value);
          }}
        />
        <button type="submit" className="btn btn--comment">Ajouter</button>
      </form>
    </>
  );
}

export default AddComment;
