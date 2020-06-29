// menu auth desktop
const loginAuth = document.getElementById('login_auth');
const menuAuth = document.getElementById('auth_menu');

if (loginAuth) {
  loginAuth.addEventListener('click', (e) => {
    e.preventDefault();
    menuAuth.classList.toggle('menu__auth--visible');
  })
}

const iconBurger = document.getElementById('burger__menu__link');
const burgerMenu = document.getElementById('menu__burger');

iconBurger.addEventListener('click', (e) => {
  e.preventDefault();
  burgerMenu.classList.toggle('burger__menu--visible');
})

