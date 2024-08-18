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


// scroll up
jQuery(document).ready(function($) {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) { 
            $('#scroll-up').fadeIn();
        } else {
            $('#scroll-up').fadeOut();
        }
    });

    $('#scroll-up').click(function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 600); 
        return false;
    });
});