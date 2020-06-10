import React from 'react';

import './contact.scss';

const Contact = () => (
  <div className="project">
    <h2 className="project__title">Parlons de votre projet</h2>
    <h4 className="project__subtitle">Entreprise ou agence, découvrez notre solution e-influence</h4>
    <a href="/business/audit" className="btn btn--project">
      Obtenez votre 
      <br /> 
      audit    
      <span className="project__span"> gratuitement</span>
    </a>
    <p className="project__text">
      Vous souhaitez qu'on vous rappelle ? Programmez un rendez-vous 
      <a className="project__link" href="/business/audit"
      >
        ici
      </a>
    </p>
  </div>
);

export default Contact;
