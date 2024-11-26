<?php
/**
 * Theme functions and definitions
 *
 * @package Memecoin_Master
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require_once get_template_directory() . '/inc/social-navigation-widget.php';
require_once get_template_directory() . '/inc/footer-menu-widget.php';
require_once get_template_directory() . '/inc/footer-intro-widget.php';
require_once get_template_directory() . '/inc/footer.php';
require_once get_template_directory() . '/inc/hero.php';

function memecoin_master_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('memecoin-master-style', get_template_directory_uri() . '/assets/css/main.css', [], '1.0.1', 'all');

    // Enqueue main JavaScript
    // Enqueue jQuery (included in WordPress core)
    wp_enqueue_script('jquery', [], '2.2.4', true);

    // Enqueue Popper.js
//    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', [], '2.11.8', true);

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', ['jquery'], '5.1.0', true);

    // Enqueue custom JS files
    wp_enqueue_script('memecoin-master-plugins-script', get_template_directory_uri() . '/assets/js/plugins.js', ['jquery'], '1.0', true);
    wp_enqueue_script('memecoin-master-syotimer-script', get_template_directory_uri() . '/assets/js/jquery.syotimer.min.js', ['jquery'], '1.0', true);
    wp_enqueue_script('memecoin-master-script', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0', true);
    wp_enqueue_script('memecoin-master-copy-script', get_template_directory_uri() . '/assets/js/copy.js', ['jquery'], '1.0', true);
}
add_action('wp_enqueue_scripts', 'memecoin_master_enqueue_scripts');

// Register navigation menus
function memecoin_master_register_menus() {
    register_nav_menus([
        'main-menu' => __('Main Menu', 'memecoin-master'),
    ]);
}
add_action('init', 'memecoin_master_register_menus');

// Add theme support
function memecoin_master_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
//    add_theme_support('custom-logo');
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('widgets');
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'memecoin_master_theme_support');

function memecoin_master_customize_register($wp_customize) {
    // Add a Global Options Section
    $wp_customize->add_section('global_options_section', array(
        'title'       => __('Global Options', 'memecoin-master'),
        'priority'    => 20,
        'description' => __('Manage global settings for the theme', 'memecoin-master'),
    ));

    // Add Setting for Enabling/Disabling Preloader
    $wp_customize->add_setting('enable_preloader', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Preloader
    $wp_customize->add_control('enable_preloader_control', array(
        'label'    => __('Enable Preloader', 'memecoin-master'),
        'section'  => 'preloader_section',
        'settings' => 'enable_preloader',
        'type'     => 'checkbox',
    ));

    // Add Contract Address Setting
    $wp_customize->add_setting('global_contract_address', array(
        'default'           => '0xe3c127466908c2ccdc43521c8315b87fd369d605',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add Contract Address Control
    $wp_customize->add_control('global_contract_address_control', array(
        'label'    => __('Contract Address', 'memecoin-master'),
        'section'  => 'global_options_section',
        'settings' => 'global_contract_address',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'memecoin_master_customize_register');

function memecoin_master_customize_support() {
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'memecoin_master_customize_support');


// Add customizer settings