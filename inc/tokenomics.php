<?php

function tokenomics_customize_register($wp_customize) {
    // Add Section
    $wp_customize->add_section('tokenomics_section', [
        'title'    => __('Tokenomics', 'tknfc_textdomain'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'tokenomics_enabled',
        true,
        'Enable/disable tokenomics section',
        'checkbox',
        'tokenomics_section',
        'tokenomics_section',
        'wp_validate_boolean',
        '.tokenomics-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'tokenomics_subtitle',
        'Our Tokenomics',
        'Sub Title',
        'text',
        'tokenomics_section',
        'tokenomics_section',
        'sanitize_text_field',
        '.tokenomics-subtitle',
    );
    add_customizer_setting(
        $wp_customize,
        'tokenomics_title',
        'Our Tokenomics',
        'Title',
        'text',
        'tokenomics_section',
        'tokenomics_section',
        'sanitize_text_field',
        '.tokenomics-title',
    );
    add_customizer_setting(
        $wp_customize,
        'tokenomics_description',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis accumsan nisi Ut ut felis congue nisl hendrerit commodo.',
        'Sub Title',
        'text',
        'tokenomics_section',
        'tokenomics_section',
        'sanitize_text_field',
        '.tokenomics-description',
    );
    $wp_customize->add_setting('tokenomics_repeater', [
        'default'           => json_encode([
            ['title' => 'Liquidity', 'subtitle' => '30%', 'image_1' => '', 'image_2' => ''],
            ['title' => 'Title 2', 'subtitle' => 'Subtitle 2', 'image_1' => '', 'image_2' => ''],
            ['title' => 'Title 3', 'subtitle' => 'Subtitle 3', 'image_1' => '', 'image_2' => ''],
        ]),
        'sanitize_callback' => 'tknfc_sanitize_repeater',
    ]);

    // Add Dynamic Repeater Control
    $wp_customize->add_control(new WP_Customize_Dynamic_Repeater_Control($wp_customize, 'tokenomics_repeater', [
        'label'       => __('Tokenomics', 'tknfc_textdomain'),
        'description' => __('Add tokenomics information.', 'tknfc_textdomain'),
        'section'     => 'tokenomics_section',
        'settings'    => 'tokenomics_repeater',
        'fields'      => [
            ['id' => 'title', 'label' => 'Title', 'type' => 'text'],
            ['id' => 'subtitle', 'label' => 'Subtitle', 'type' => 'text'],
            ['id' => 'image_1', 'label' => 'Image 1', 'type' => 'image'],
            ['id' => 'image_2', 'label' => 'Image 2', 'type' => 'image'],
        ],
    ]));

    $wp_customize->selective_refresh->add_partial('tokenomics_repeater', [
        'selector' => '.token-information-div',
        'render_callback' => function() {
            get_template_part('template-parts/tokenomics');
        },
    ]);
}

add_action('customize_register', 'tokenomics_customize_register');

