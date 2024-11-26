<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('WP_Customize_Control')) {
    return; // Ensure the WP_Customize_Control class exists
}

class WP_Customize_Repeater_Control extends WP_Customize_Control {
    public $type = 'repeater';
    public $fields = array();

    public function render_content() {
        ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php if ($this->description): ?>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php endif; ?>
        </label>
        <ul class="repeater-list" data-setting="<?php echo esc_attr($this->id); ?>">
            <?php
            $values = json_decode($this->value(), true) ?: array();
            $values = is_array($values) ? $values : array();
            foreach ($values as $value): ?>
                <li class="repeater-item">
                    <?php foreach ($this->fields as $key => $field): ?>
                        <label><?php echo esc_html($field['label']); ?></label>
                        <?php if ($field['type'] === 'text'): ?>
                            <input type="text" class="repeater-input" data-key="<?php echo esc_attr($key); ?>" value="<?php echo esc_attr($value[$key] ?? ''); ?>" />
                        <?php elseif ($field['type'] === 'textarea'): ?>
                            <textarea class="repeater-input" data-key="<?php echo esc_attr($key); ?>"><?php echo esc_html($value[$key] ?? ''); ?></textarea>
                        <?php elseif ($field['type'] === 'image'): ?>
                            <input type="text" class="repeater-input" data-key="<?php echo esc_attr($key); ?>" value="<?php echo esc_url($value[$key] ?? ''); ?>" />
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <button type="button" class="remove-repeater-item">Remove</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="add-repeater-item">Add Item</button>
        <script type="text/template" id="repeater-item-template-<?php echo esc_attr($this->id); ?>">
            <li class="repeater-item">
                <?php foreach ($this->fields as $key => $field): ?>
                    <label><?php echo esc_html($field['label']); ?></label>
                    <?php if ($field['type'] === 'text'): ?>
                        <input type="text" class="repeater-input" data-key="<?php echo esc_attr($key); ?>" />
                    <?php elseif ($field['type'] === 'textarea'): ?>
                        <textarea class="repeater-input" data-key="<?php echo esc_attr($key); ?>"></textarea>
                    <?php elseif ($field['type'] === 'image'): ?>
                        <input type="text" class="repeater-input" data-key="<?php echo esc_attr($key); ?>" />
                    <?php endif; ?>
                <?php endforeach; ?>
                <button type="button" class="remove-repeater-item">Remove</button>
            </li>
        </script>
        <input type="hidden" class="repeater-value" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> />
        <?php
    }
}

function sanitize_repeater_field($input) {
    $decoded = json_decode($input, true);
    if (!is_array($decoded)) {
        return json_encode(array());
    }
    // Optionally validate each field
    foreach ($decoded as &$item) {
        foreach ($item as $key => &$value) {
            $value = sanitize_text_field($value);
        }
    }
    return json_encode($decoded);
}

function enqueue_customizer_scripts() {
    wp_enqueue_script('customizer-repeater', get_template_directory_uri() . '/assets/js/customizer-repeater.js', array('jquery', 'customize-controls'), '1.0', true);
}
add_action('customize_controls_enqueue_scripts', 'enqueue_customizer_scripts');

