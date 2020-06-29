const modal = document.getElementById('modal__delete');
const overlay = document.getElementById('overlay');
const displayModal = document.getElementById('delete-account');
const cancel = document.getElementById('cancel-deletion');

displayModal.addEventListener('click', (e) => {
  e.preventDefault();
  modal.classList.add('modal__delete--visible')
  overlay.classList.add('overlay--visible');
})

cancel.addEventListener('click', (e) => {
  e.preventDefault();
  modal.classList.remove('modal__delete--visible')
  overlay.classList.remove('overlay--visible');
})

overlay.addEventListener('click', (e) => {
  e.preventDefault();
  modal.classList.remove('modal__delete--visible')
  overlay.classList.remove('overlay--visible');
})