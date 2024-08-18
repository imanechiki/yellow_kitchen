document.addEventListener('DOMContentLoaded', function() {
    const burgerMenu = document.getElementById('burger-menu');
    const siteNavigation = document.getElementById('site-navigation');

    burgerMenu.addEventListener('click', function() {
        // Toggle the active class on the burger menu
        burgerMenu.classList.toggle('active');

        // Toggle the active class on the navigation menu
        siteNavigation.classList.toggle('active');
    });
});
