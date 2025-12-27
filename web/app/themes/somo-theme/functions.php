<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function somo_theme_setup()
{
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Use Main Menu
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'somo-theme'),
        )
    );

    // Custom Logo
    add_theme_support(
        'custom-logo',
        array(
            'height' => 100,
            'width' => 400,
            'flex-width' => true,
            'flex-height' => true,
        )
    );
}
add_action('after_setup_theme', 'somo_theme_setup');

function somo_theme_scripts()
{
    wp_enqueue_style('somo-theme-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue Google Fonts (Inter)
    wp_enqueue_style('somo-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Merriweather:wght@400;700&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'somo_theme_scripts');

/**
 * Customizer Settings for Front Page
 */
function somo_customize_register($wp_customize)
{
    // Impact Section Panel
    $wp_customize->add_section('somo_impact_section', array(
        'title' => __('Impact Section', 'somo-theme'),
        'priority' => 30,
    ));

    // Loop for 3 Impact cards
    for ($i = 1; $i <= 3; $i++) {
        // Icon
        $wp_customize->add_setting("somo_impact_icon_$i", array(
            'default' => '⭐',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("somo_impact_icon_$i", array(
            'label' => __("Card $i Icon (Emoji)", 'somo-theme'),
            'section' => 'somo_impact_section',
            'type' => 'text',
        ));

        // Title
        $wp_customize->add_setting("somo_impact_title_$i", array(
            'default' => __("Impact Title $i", 'somo-theme'),
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("somo_impact_title_$i", array(
            'label' => __("Card $i Title", 'somo-theme'),
            'section' => 'somo_impact_section',
            'type' => 'text',
        ));

        // Description
        $wp_customize->add_setting("somo_impact_desc_$i", array(
            'default' => __("Description for impact card $i.", 'somo-theme'),
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("somo_impact_desc_$i", array(
            'label' => __("Card $i Description", 'somo-theme'),
            'section' => 'somo_impact_section',
            'type' => 'textarea',
        ));

        // Link URL
        $wp_customize->add_setting("somo_impact_url_$i", array(
            'default' => '#',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control("somo_impact_url_$i", array(
            'label' => __("Card $i Link URL", 'somo-theme'),
            'section' => 'somo_impact_section',
            'type' => 'url',
        ));

        // Color override 
        $wp_customize->add_setting("somo_impact_color_$i", array(
            'default' => '#d44206',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "somo_impact_color_$i", array(
            'label' => __("Card $i Icon Color", 'somo-theme'),
            'section' => 'somo_impact_section',
        )));
    }

    // Hero Section Panel
    $wp_customize->add_section('somo_hero_section', array(
        'title' => __('Hero Section', 'somo-theme'),
        'priority' => 20,
    ));

    // Hero Title
    $wp_customize->add_setting('somo_hero_title', array(
        'default' => 'Ondersteun de toekomst van kinderen in Namibië',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('somo_hero_title', array(
        'label' => __('Hero Title', 'somo-theme'),
        'section' => 'somo_hero_section',
        'type' => 'text',
    ));

    // Hero Text
    $wp_customize->add_setting('somo_hero_text', array(
        'default' => 'SOMO investeert in onderwijs, voeding en zelfredzaamheid voor jongeren in Outjo.',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('somo_hero_text', array(
        'label' => __('Hero Text', 'somo-theme'),
        'section' => 'somo_hero_section',
        'type' => 'textarea',
    ));

    // Hero Button Text
    $wp_customize->add_setting('somo_hero_btn_text', array(
        'default' => 'Help mee',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('somo_hero_btn_text', array(
        'label' => __('Button Text', 'somo-theme'),
        'section' => 'somo_hero_section',
        'type' => 'text',
    ));

    // Hero Button Link
    $wp_customize->add_setting('somo_hero_btn_url', array(
        'default' => '/doneren',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('somo_hero_btn_url', array(
        'label' => __('Button URL', 'somo-theme'),
        'section' => 'somo_hero_section',
        'type' => 'text',
    ));

    // Hero Background Image
    $wp_customize->add_setting('somo_hero_image', array(
        'default' => 'https://source.unsplash.com/1600x900/?namibia,desert',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'somo_hero_image', array(
        'label' => __('Background Image', 'somo-theme'),
        'section' => 'somo_hero_section',
    )));
}
add_action('customize_register', 'somo_customize_register');

/**
 * Register Widget Areas
 */
function somo_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Footer Column 1', 'somo-theme'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'somo-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column 2', 'somo-theme'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'somo-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column 3', 'somo-theme'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'somo-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer Column 4', 'somo-theme'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'somo-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => esc_html__('Page CTA Bar', 'somo-theme'),
        'id' => 'page-cta',
        'description' => esc_html__('Appears at the bottom of pages. Use for Call to Action.', 'somo-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'somo_widgets_init');

/**
 * Register "Projecten" Custom Post Type
 */
function somo_register_project_cpt()
{
    $labels = array(
        'name' => _x('Projecten', 'Post Type General Name', 'somo-theme'),
        'singular_name' => _x('Project', 'Post Type Singular Name', 'somo-theme'),
        'menu_name' => __('Projecten', 'somo-theme'),
        'name_admin_bar' => __('Project', 'somo-theme'),
        'archives' => __('Projectarchieven', 'somo-theme'),
        'attributes' => __('Projectattributen', 'somo-theme'),
        'parent_item_colon' => __('Hoofdproject:', 'somo-theme'),
        'all_items' => __('Alle Projecten', 'somo-theme'),
        'add_new_item' => __('Nieuw Project toevoegen', 'somo-theme'),
        'add_new' => __('Nieuw toevoegen', 'somo-theme'),
        'new_item' => __('Nieuw Project', 'somo-theme'),
        'edit_item' => __('Bewerk Project', 'somo-theme'),
        'update_item' => __('Update Project', 'somo-theme'),
        'view_item' => __('Bekijk Project', 'somo-theme'),
        'view_items' => __('Bekijk Projecten', 'somo-theme'),
        'search_items' => __('Zoek Project', 'somo-theme'),
        'not_found' => __('Niet gevonden', 'somo-theme'),
        'not_found_in_trash' => __('Niet gevonden in prullenbak', 'somo-theme'),
        'featured_image' => __('Uitgelichte afbeelding', 'somo-theme'),
        'set_featured_image' => __('Stel uitgelichte afbeelding in', 'somo-theme'),
        'remove_featured_image' => __('Verwijder uitgelichte afbeelding', 'somo-theme'),
        'use_featured_image' => __('Gebruik als uitgelichte afbeelding', 'somo-theme'),
        'insert_into_item' => __('Invoegen in project', 'somo-theme'),
        'uploaded_to_this_item' => __('Geüpload naar dit project', 'somo-theme'),
        'items_list' => __('Projectenlijst', 'somo-theme'),
        'items_list_navigation' => __('Projectenlijst navigatie', 'somo-theme'),
        'filter_items_list' => __('Filter projectenlijst', 'somo-theme'),
    );
    $args = array(
        'label' => __('Project', 'somo-theme'),
        'description' => __('Projecten van SOMO', 'somo-theme'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => 'projecten',
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true, // Enable Gutenberg
    );
    register_post_type('project', $args);
}
add_action('init', 'somo_register_project_cpt', 0);
