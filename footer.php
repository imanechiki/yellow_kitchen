<?php wp_footer(); ?>
<?php
$path = get_template_directory_uri();
?>

<footer id="footer-container">
    <div class="footer-content">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-container">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Logo.svg" alt="Logo">
        </a>
        <nav class="footer-nav">
            <?php
            if (has_nav_menu('footer-menu')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => 'footer-links',
                        'fallback_cb' => false,
                        'depth' => 1,
                    )
                );
            }
            ?>
            <div class="socialImages">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/fb.svg" />
                </a>

                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/insta.svg" />
                </a>
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/twitter.svg" />
                </a>
            </div>
        </nav>

    </div>
    <hr class="line">
    <div class="footer-bottom">
        <p>Copyright © 2024 | Yellow kitchen Restaurant | All Rights Reserved</p>
    </div>
</footer>


<?php wp_footer(); ?>







</body>


</html>