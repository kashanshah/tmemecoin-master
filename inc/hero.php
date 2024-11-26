<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
function memecoin_master_customize_register_hero_banner($wp_customize) {
    // Hero Section Panel
    add_customizer_setting(
        $wp_customize,
        'hero_enabled',
        true,
        'Enable/disable hero section',
        'checkbox',
        'hero_section',
        'hero_section',
        'wp_validate_boolean',
        '.hero-section'
    );
    $wp_customize->add_section('hero_section', array(
        'title'       => __('Hero Section', 'tknfc_textdomain'),
        'priority'    => 30,
        'description' => __('Customize the Hero Section'),
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Creative Meme Coins Template',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title_control', array(
        'label'    => __('Hero Title', 'tknfc_textdomain'),
        'section'  => 'hero_section',
        'settings' => 'hero_title',
        'type'     => 'text',
    ));
    $wp_customize->selective_refresh->add_partial('hero_title', array(
        'selector'        => '.hero-title',
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_description_control', array(
        'label'    => __('Hero Description', 'tknfc_textdomain'),
        'section'  => 'hero_section',
        'settings' => 'hero_description',
        'type'     => 'textarea',
    ));
    $wp_customize->selective_refresh->add_partial('hero_description', array(
        'selector'        => '.hero-description',
    ));

    // Hero Image
    $wp_customize->add_setting('hero_image', array(
        'default'           => get_template_directory_uri() . '/assets/img/core-img/header-img2.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', array(
        'label'    => __('Hero Image', 'tknfc_textdomain'),
        'section'  => 'hero_section',
        'settings' => 'hero_image',
    )));
    $wp_customize->selective_refresh->add_partial('hero_image', array(
        'selector'        => '.hero-image',
    ));
}
add_action('customize_register', 'memecoin_master_customize_register_hero_banner');

