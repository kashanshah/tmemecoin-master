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
        'title' => __($title, 'memecoin-master'),
        'priority' => $priority,
        'description' => __($description, 'memecoin-master'),
    ));
    return $id;
}

/**
 * Add multiple fields to a specific Customizer section.
 *
 * @param WP_Customize_Manager $wp_customize The WP_Customize_Manager instance.
 * @param array $fields Array of field configurations.
 */
function add_customizer_fields($wp_customize, $fields)
{
    foreach ($fields as $field) {
        $setting_id = $field['id'];
        $sanitize_callback = isset($field['sanitize_callback']) ? $field['sanitize_callback'] : 'sanitize_text_field';

        // Add Setting
        $wp_customize->add_setting($setting_id, array(
            'default' => $field['default'] ?? '',
            'sanitize_callback' => $sanitize_callback,
        ));

        // Add Control
        $control_args = array(
            'label' => __($field['label'], 'memecoin-master'),
            'section' => $field['section'],
            'settings' => $setting_id,
            'type' => $field['type'] ?? 'text', // Default type is 'text'
        );

        // Special handling for certain field types
        if ($field['type'] === 'image') {
            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "{$setting_id}_control", $control_args));
        } elseif ($field['type'] === 'repeater') {
            // Handle repeater fields (custom logic required)
            $wp_customize->add_setting("{$setting_id}_json", array(
                'default' => json_encode($field['default'] ?? []),
                'sanitize_callback' => 'wp_kses_post',
            ));
            $wp_customize->add_control(new WP_Customize_Repeater_Control($wp_customize, "{$setting_id}_control", array(
                'label' => __($field['label'], 'memecoin-master'),
                'section' => $field['section'],
                'settings' => "{$setting_id}_json",
                'fields' => $field['fields'] ?? [],
                'description' => $field['description'] ?? '',
            )));
        } else {
            $wp_customize->add_control("{$setting_id}_control", $control_args);
        }

        // Add selective refresh if provided
        if (isset($field['partial_selector'])) {
            $wp_customize->selective_refresh->add_partial($setting_id, array(
                'selector' => $field['partial_selector'],
            ));
        }
    }
}
