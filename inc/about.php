<?php
function about_customize_register($wp_customize) {
    // Add Section for About Us
    $wp_customize->add_section('about_section', [
        'title'    => __('About Us Section', 'tknfc_textdomain'),
        'priority' => 30,
    ]);

    // Add Customizer Settings using add_customizer_setting
    add_customizer_setting(
        $wp_customize,
        'about_enabled',
        true,
        'Enable/disable about us section',
        'checkbox',
        'about_section',
        'about_section',
        'wp_validate_boolean',
        '.about-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'about_subtitle',
        'Read More About our Memecoin',
        'Sub Title',
        'text',
        'about_section',
        'about_section',
        'sanitize_text_field',
        '.about-subtitle'
    );

    add_customizer_setting(
        $wp_customize,
        'about_title',
        'About Our Memecoin',
        'Title',
        'text',
        'about_section',
        'about_section',
        'sanitize_text_field',
        '.about-title'
    );

    add_customizer_setting(
        $wp_customize,
        'about_description_1',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at dictum risus, non suscipit arcu.',
        'Description 1',
        'textarea',
        'about_section',
        'about_section',
        'sanitize_textarea_field',
        '.about-description'
    );

    add_customizer_setting(
        $wp_customize,
        'about_description_2',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit ipsa ut quasi adipisci voluptates, voluptatibus.',
        'Description 2',
        'textarea',
        'about_section',
        'about_section',
        'sanitize_textarea_field',
        '.about-description'
    );

    add_customizer_setting(
        $wp_customize,
        'about_image',
        get_template_directory_uri() . '/assets/img/core-img/about.png',
        'About Image',
        'image',
        'about_section',
        'about_section',
        'esc_url_raw',
        '.about-image'
    );

    add_customizer_setting(
        $wp_customize,
        'about_background_image',
        get_template_directory_uri() . '/assets/img/core-img/about-bg.png',
        'Background Image',
        'image',
        'about_section',
        'about_section',
        'esc_url_raw',
        '.about-sec'
    );

    // Add primary color setting and control
    $wp_customize->add_setting('about_bg_color', array(
        'default'           => '#FFFFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'about_bg_color', array(
        'label'   => __('Background Color', 'tknfc_textdomain'),
        'section' => 'about_section',
        'settings' => 'about_bg_color',
    )));
    $wp_customize->selective_refresh->add_partial('about_bg_color', [
        'selector' => '.about-sec',
        'render_callback' => function() {
            return get_theme_mod('about_bg_color', '#FFFFFFFF');
        },
    ]);
}

add_action('customize_register', 'about_customize_register');
