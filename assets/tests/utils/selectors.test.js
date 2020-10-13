import { expect } from 'chai';
import { slugifyTitle } from '../..lll/js/utils/selectors';

describe('selectors', () => {
  describe('function slugifyTitle', () => {
    it('is a function', () => {
      expect(slugifyTitle).to.be.a('function');
    });

    it('replaces spaces', () => {
      expect(slugifyTitle('Campagne 18-35 ans').to.equal('campagne-18-35-ans'));
    })

    it('lower case text', () => {
      expect(slugifyTitle('CAmpAgnE').to.equal('campagne'));
    })
  });

  describe('function getCampaingBySlug', () => {

  })
});
