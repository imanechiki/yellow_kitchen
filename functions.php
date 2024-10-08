<?php
/**
 * Functions.php
 *
 * @package webloo
 * @lead - imabe
 * @developer imane
 */

/**
 * Recursively scan directories for templates.
 *
 * @param string $dir The directory to scan.
 * @param array $templates The array to hold found templates.
 */

function scan_directory_for_templates($dir, &$templates, $relative_path = '')
{
    if (!is_dir($dir)) {
        return;  // Return early if the directory does not exist
    }

    $files = scandir($dir);
    if ($files === false) {
        return;  // Return early if scandir fails to open the directory
    }

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $file_path = $dir . '/' . $file;
        if (is_dir($file_path)) {
            scan_directory_for_templates($file_path, $templates, $relative_path . $file . '/');
        } elseif (is_file($file_path) && pathinfo($file_path, PATHINFO_EXTENSION) === 'php') {
            $template_data = get_file_data(
                $file_path,
                array(
                    'Template Name' => 'Template Name',
                    'Template Post Type' => 'Template Post Type',
                )
            );
            if (!empty($template_data['Template Name'])) {
                $relative_file_path = $relative_path . $file;
                $templates[$relative_file_path] = $template_data['Template Name'];
            }
        }
    }
}


/**
 * Automatically discover templates in the includes and templates directories and register them.
 */
function webloo_auto_discover_templates($templates)
{
    // Directories to scan
    $directories = array(
        get_template_directory() . '/includes',
        get_template_directory() . '/templates'
    );
    foreach ($directories as $directory) {
        scan_directory_for_templates($directory, $templates, basename($directory) . '/');
    }
    return $templates;
}
add_filter('theme_page_templates', 'webloo_auto_discover_templates');

/**
 * Load templates from the includes and templates directories.
 */
function webloo_template_include($template)
{
    // Get the currently selected template
    $selected_template = get_page_template_slug();

    if ($selected_template) {
        // Look for the template in the includes and templates directories
        $new_template = locate_template($selected_template);
        if ($new_template) {
            return $new_template;
        }
    }

    return $template;
}
add_filter('template_include', 'webloo_template_include');

/**
 * Enqueue scripts and styles and json file.
 */
function yellowKitchen_enqueue_scripts()
{
    // Enqueue general styles
    wp_enqueue_style('webloo-styles', get_stylesheet_uri());

    // Enqueue Slick Carousel styles
    wp_enqueue_style('slick-carousel-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    // Enqueue Slick Carousel script first
    wp_enqueue_script('slick-carousel-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);

    // Enqueue custom script that initializes Slick Carousel
    wp_enqueue_script('custom-slick-init', get_template_directory_uri() . '/js/slick-carousel.js', array('jquery', 'slick-carousel-js'), null, true);

    // Enqueue your main custom script
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);

    // Localize scripts with necessary parameters
    $ajax_params = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('load_more_products_nonce')
    );
    
    // Localize parameters for scripts
    wp_localize_script('custom-load-more', 'ajax_params', $ajax_params);
    wp_localize_script('custom-cart', 'ajax_params', $ajax_params);
}

add_action('wp_enqueue_scripts', 'yellowKitchen_enqueue_scripts');





/**
 * Register navigation menu.
 */
function register_theme_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'), // Assuming this is already there for your header menu.
            'footer-menu' => __('Footer Menu')  // This will register a new menu for the footer.
        )
    );
}
add_action('init', 'register_theme_menus');


/**
 * Add theme support.
 */
function webloo_theme_support()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

}
add_action('after_setup_theme', 'webloo_theme_support');



/**
 * Debug custom templates.
 */
add_action('init', 'check_custom_templates');
function check_custom_templates()
{
    $templates = wp_get_theme()->get_page_templates();
    error_log(print_r($templates, true));
}



// reading time for a post
function calculate_reading_time()
{
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return $reading_time;
}
function reading_time_shortcode()
{
    return calculate_reading_time();
}
add_shortcode('rt_reading_time', 'reading_time_shortcode');


//load jquery
function load_jquery()
{
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'load_jquery');


add_action('rest_api_init', function () {
    register_rest_route('myplugin/v1', '/search_restaurants/', array(
        'methods' => 'POST',
        'callback' => 'search_restaurants_by_address',
        'permission_callback' => '__return_true', // Adjust as needed
    ));
});


