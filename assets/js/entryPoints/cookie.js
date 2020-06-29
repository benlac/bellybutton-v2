import Cookies from 'js-cookie';

function startGoogleAnalytics() {
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-156953598-1', 'auto');
  ga('send', 'pageview');
}

const cookieBanner = document.getElementById('cookie-banner');
const cookieInformAndAsk = document.getElementById('cookie-inform-and-ask');
const cookieMoreButton = document.getElementById('cookie-more-button');
const gaCancelButton = document.getElementById('ga-cancel-button');
const gaConfirmButton = document.getElementById('ga-confirm-button');

function processCookieConsent() {
  const consentCookie = Cookies.getJSON('hasConsent');
  const doNotTrack = navigator.doNotTrack || navigator.msDoNotTrack;

  if (doNotTrack === 'yes' || doNotTrack === '1' || consentCookie === false) {
    reject();
    return;
  }

  if (consentCookie === true) {
    startGoogleAnalytics();
    return;
  }

  if (doNotTrack === 'no' || doNotTrack === '0') {
    Cookies.set('hasConsent', true, { expires: 395 });
    startGoogleAnalytics();
    return;
  }
  cookieBanner.classList.add('active');
  cookieMoreButton.addEventListener('click', onMoreButtonClick, false);
  document.addEventListener('click', onDocumentClick, false);
}

const GA_PROPERTY = 'UA-XXXXX-Y'
const GA_COOKIE_NAMES = ['__utma', '__utmb', '__utmc', '__utmz', '_ga', '_gat'];

function reject() {
  Cookies.set(`ga-disable-${GA_PROPERTY}`, true, { expires: 395 });
  window[`ga-disable-${GA_PROPERTY}`] = true;
  Cookies.set('hasConsent', false, { expires: 395 });
  GA_COOKIE_NAMES.forEach(cookieName => Cookies.remove(cookieName));
}

function onDocumentClick(event) {
  const target = event.target;
  
  if (target.id === 'cookie-banner'
    || target.parentNode.id === 'cookie-banner'
    || target.parentNode.parentNode.id === 'cookie-banner'
    || target.id === 'cookie-more-button') {
    return;
  }
  
  event.preventDefault();
  
  Cookies.set('hasConsent', true, { expires: 365 });
  startGoogleAnalytics();
  
  cookieBanner.className = cookieBanner.className.replace('active', '').trim();
  
  document.removeEventListener('click', onDocumentClick, false);
  cookieMoreButton.removeEventListener('click', onMoreButtonClick, false);
}

function onMoreButtonClick(event) {
  event.preventDefault();
  cookieInformAndAsk.classList.add('active');
  cookieBanner.className = cookieBanner.className.replace('active', '').trim();
  gaCancelButton.addEventListener('click', onGaCancelButtonClick, false);
  gaConfirmButton.addEventListener('click', onGaConfirmButtonClick, false);
  document.removeEventListener('click', onDocumentClick, false);
  cookieMoreButton.removeEventListener('click', onMoreButtonClick, false);
  }

function onGaConfirmButtonClick(event) {
  event.preventDefault();
  
  Cookies.set('hasConsent', true, { expires: 365 });
  startGoogleAnalytics();
  
  cookieInformAndAsk.className = cookieBanner.className.replace('active', '').trim();
  
  gaCancelButton.removeEventListener('click', onGaCancelButtonClick, false);
  gaConfirmButton.removeEventListener('click', onGaConfirmButtonClick, false);
  }

function onGaCancelButtonClick(event) {
  event.preventDefault();
  
  reject();
  
  cookieInformAndAsk.className = cookieBanner.className.replace('active', '').trim();
  
  gaCancelButton.removeEventListener('click', onGaCancelButtonClick, false);
  gaConfirmButton.removeEventListener('click', onGaConfirmButtonClick, false);
  }

  processCookieConsent();