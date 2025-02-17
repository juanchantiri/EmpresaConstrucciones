const toggler = document.getElementById('navbar-toggler');
const navbarNav = document.getElementById('navbar-nav');

toggler.addEventListener('click', () => {
    navbarNav.classList.toggle('show');
});
