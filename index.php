<?php
/*
Template Name: Home
*/
$path = get_template_directory_uri();
get_header(); ?>

<section id="hero-section">
    <div class="text-image">
        <div class="left-text">
            <?php
            $main_heading = get_field('main_heading');
            if ($main_heading) {
                echo '<h1>' . esc_html($main_heading) . '</h1>';
            }

            if (have_rows('buttons')) {
                echo '<div class="buttons">';
                while (have_rows('buttons')):
                    the_row();
                    $button_text = get_sub_field('button_text');
                    $button_subtext = get_sub_field('button_subtext');
                    $button_link = get_sub_field('link');

                    if ($button_text && $button_link) {
                        echo '<div class="hero-button-container">';
                        echo '<a href="' . esc_url($button_link) . '" class="button">';
                        echo '<span class="button-text">' . esc_html($button_text) . '</span>';
                        if ($button_subtext) {
                            echo '<span class="button-subtext">' . esc_html($button_subtext) . '</span>';
                        }
                        echo '</a>';
                        echo '</div>';
                    }
                endwhile;
                echo '</div>';
            }
            ?>

        </div>
        <div class="right-image">
            <?php
            $image = get_field('image');
            if ($image) {
                $image_url = $image['url'];
                $image_alt = $image['alt'];
                echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" class="main-image">';
            }
            ?>

        </div>
    </div>

    <div class="icons-and-text-blocks">

        <?php
        if (have_rows('icons_and_text_blocks')) {
            while (have_rows('icons_and_text_blocks')):
                the_row();
                $icon = get_sub_field('icon');
                $text = get_sub_field('text');
                if ($icon && $text) {
                    $icon_url = $icon['url'];
                    $icon_alt = $icon['alt'];
                    echo '<div class="icons-and-text-block">';
                    echo '<img src="' . esc_url($icon_url) . '" alt="' . esc_attr($icon_alt) . '" class="icon">';
                    echo '<p>' . esc_html($text) . '</p>';
                    echo '</div>';
                }
            endwhile;
        }
        ?>

    </div>
</section>
<section id="restaurants">
    <div class="restaurants-header">
        <h2>Restaurants</h2>
        <div class="show-more"><a href="<?php echo home_url('/restaurants'); ?>">Show more</a></div>
    </div>
    <div class="menu-items-wrapper">
        <button type="button" class="menu-prev">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/Button (1).svg" alt="Previous">
        </button>

        <div class="menu-items">
            <?php
            if (have_rows('menu')) {
                while (have_rows('menu')) {
                    the_row();
                    $menu_image = get_sub_field('menu_image');
                    if ($menu_image) {
                        $menu_image_url = $menu_image['url'];
                        $menu_image_alt = $menu_image['alt'];
                        echo '<div class="menu-item">';
                        echo '<img src="' . esc_url($menu_image_url) . '" alt="' . esc_attr($menu_image_alt) . '" class="menu-image">';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>

        <button type="button" class="menu-next">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/Button.svg" alt="Next">
        </button>
    </div>
</section>
<section id="adress">
    <div class="adress-text">
        <?php
        $address_title = get_field('adress_title');
        $address_description = get_field('adress_description');

        if ($address_title) {
            echo '<h2>' . esc_html($address_title) . '</h2>';
        }

        if ($address_description) {
            echo '<p>' . esc_html($address_description) . '</p>';
        }
        ?>
    </div>
    <div class="search-bar">
        <form id="search-form" action="" method="POST">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/location.svg" alt="Location"
                class="input-icon">
            <input type="text" id="address-input" name="address" placeholder="Enter delivery address" required>
            <button type="submit" id="search-button">Send</button>
        </form>
    </div>
</section>



<?php get_footer(); ?>