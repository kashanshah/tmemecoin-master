<?php

function memecoin_master_customize_register_features_section($wp_customize) {
    // Add Features Section
    $features_section_id = add_customizer_section(
        $wp_customize,
        'Features Section',
        40,
        'Customize the Features Section'
    );

    // Add Fields for Features Section
    add_customizer_fields($wp_customize, array(
        array(
            'id'      => 'features_sub_title',
            'label'   => 'Features Sub Title',
            'section' => $features_section_id,
            'default' => 'Our Features',
            'type'    => 'text',
            'sanitize_callback' => 'sanitize_text_field',
            'partial_selector'  => '.features-sub-title',
        ),
        array(
            'id'      => 'features_title',
            'label'   => 'Features Title',
            'section' => $features_section_id,
            'default' => 'Our Awesome Features',
            'type'    => 'text',
            'sanitize_callback' => 'sanitize_text_field',
            'partial_selector'  => '.features-title',
        ),
        array(
            'id'      => 'features_description',
            'label'   => 'Features Description',
            'section' => $features_section_id,
            'default' => 'Discover the amazing features we offer.',
            'type'    => 'textarea',
            'sanitize_callback' => 'sanitize_text_field',
            'partial_selector'  => '.features-description',
        ),
    ));

    add_customizer_fields($wp_customize, array(
        array(
            'id'      => 'features_list',
            'label'   => 'Features List',
            'section' => $features_section_id,
            'type'    => 'repeater',
            'fields'  => array(
                'title'       => array('label' => 'Feature Title', 'type' => 'text'),
                'description' => array('label' => 'Feature Description', 'type' => 'textarea'),
                'image'       => array('label' => 'Feature Image', 'type' => 'image'),
            ),
            'description' => 'Add features with title, description, and image.',
            'sanitize_callback' => 'sanitize_repeater_field',
            'default'     => json_encode(array()), // Start with an empty repeater
        ),
    ));
}

add_action('customize_register', 'memecoin_master_customize_register_features_section');

