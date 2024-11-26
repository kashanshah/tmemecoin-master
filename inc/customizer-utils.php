<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Add a section to the WordPress Customizer.
 *
 * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager instance.
 * @param string $title Section title.
 * @param int $priority Section priority.
 * @param string $description Section description.
 * @param string $id Section ID (optional, auto-generated if not provided).
 */
function add_customizer_section($wp_customize, $title, $priority = 30, $description = '', $id = '')
{
    $id = $id ?: sanitize_title($title);
    $wp_customize->add_section($id, array(
        'title' => __($title, 'tknfc_textdomain'),
        'priority' => $priority,
        'description' => __($description, 'tknfc_textdomain'),
    ));
    return $id;
}

function add_customizer_setting($wp_customize, $id, $default = '', $label = '', $type = 'text', $section = 'global_options_section', $settings = '', $sanitize_callback = '', $selector = '') {
    // Hero Title
    $wp_customize->add_setting($id, array(
        'default'           => $default,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $control_args = [
        'label'       => $label,
        'section'     => $section,
        'settings'    => $id,
        'type'        => $type,
    ];
    if ($type === 'image') {
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $id, $control_args));
    } else {
        $wp_customize->add_control($id, $control_args);
    }
    // Add selective refresh if selector is provided
    if (!empty($selector) && isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial($id, [
            'selector'        => $selector,
//            'settings'        => [$id],
//            'render_callback' => function () use ($id) {
//                return get_theme_mod($id);
//            },
        ]);
    }

}