import React from 'react';


import Contact from '../../HomepageBusiness/Contact';
import Brand from '../Brand';

import './app.scss';
import Audience from '../Audience';

const App = () => (
  <>
    <Brand />
    <Audience />
    <div className="container">
    <Contact />
    </div>
  </>
);

export default App;
