import React from 'react';

import './banner.scss';
import brands from '../../../../images/brand/brands.png';
import rhino from '../../../../images/brand/rhino.png';
import mycom from '../../../../images/brand/mycom.png';
import plarium from '../../../../images/brand/plarium.png';
import supersoco from '../../../../images/brand/supersoco.png';
import pixonic from '../../../../images/brand/pixonic.png';

const Banner = () => (
  <div className="brand">
    <img className="brands__all" src={brands} alt=""/>
    <div className="brand__mobile">
      <img src={rhino} alt=""/>
      <img src={mycom} alt=""/>
      <img className="plarium" src={plarium} alt=""/>
      <img src={supersoco} alt=""/>
      <img src={pixonic} alt=""/>
    </div>
  </div>
)

export default Banner;
