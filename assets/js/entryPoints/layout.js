const loginAuth = document.getElementById('login_auth');
const menuAuth = document.getElementById('auth_menu');

loginAuth.addEventListener('click', (e) => {
  e.preventDefault();
  menuAuth.classList.toggle('menu__auth--visible');
})