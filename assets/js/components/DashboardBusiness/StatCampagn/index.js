import React from 'react';
import { useParams } from 'react-router-dom';

import './stat_campagn.scss';

const StatCampagn = () => {
  const { slug } = useParams();
  return (
    <>
      <div>{slug}</div>
      <div>Tri</div>
      <div>Stat</div>
    </>
  );
}

export default StatCampagn;
