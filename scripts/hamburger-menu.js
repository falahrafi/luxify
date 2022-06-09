const hamburgerMenu = document.querySelector('.hamburger-menu-container');
let menuOpen = false;
hamburgerMenu.addEventListener('click', function() {
   if(!menuOpen) {
      hamburgerMenu.classList.add('open');
      menuOpen = true;
   } else {
      hamburgerMenu.classList.remove('open');
      menuOpen = false;
   }
});