<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$path = get_template_directory_uri();
?>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>


    <!-- CSS Files -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/stylesheet.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/global.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/medium.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/small.css" rel="stylesheet">

    <!-- External CSS Libraries -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/georgia" rel="stylesheet">

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></scrip
    <link href="<?php echo get_template_directory_uri(); ?>/css/stylesheet.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/global.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/medium-style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/small-style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
     
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">




    <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
    <header id="site-header">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-container">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/Logo.svg"
                    alt="yellow kitchen Logo">
            </a>
        </div>
        <div class="header-icons">
            <div class="login">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/person.svg" alt="person">
                <a href="<?php echo wp_login_url(); ?>">Log in</a>
            </div>
            <div class="cart">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/icons/cart.svg" alt="cart">
                <span class="cart-count">0</span>
            </div>
            <div class="burger-menu" id="burger-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav id="site-navigation" class="main-navigation">
            <?php
            if (has_nav_menu('header-menu')) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'header-menu',
                        'menu_id' => 'header-menu',
                        'container' => false,
                        'menu_class' => 'nav-menu',
                        'depth' => 2,
                    )
                );
            }
            ?>
        </nav>
    </header>