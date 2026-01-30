<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <header class="site-header">
        <div class="container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <img src="https://www.somomaarssen.nl/wp-content/uploads/2023/09/cropped-SomoLogoKorrekt.jpg"
                            alt="<?php bloginfo('name'); ?>" class="custom-logo">
                    </a>
                    <?php
                }
                ?>
            </div><!-- .site-branding -->

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="box">
                    <span class="bar top"></span>
                    <span class="bar mid"></span>
                    <span class="bar bot"></span>
                </span>
            </button>

            <nav class="main-navigation" id="site-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => false,
                        'fallback_cb' => false,
                    )
                );
                ?>
            </nav><!-- .main-navigation -->

            <div class="header-actions">
                <a href="/doneren" class="btn">Doneren</a>
            </div>
        </div>
    </header>