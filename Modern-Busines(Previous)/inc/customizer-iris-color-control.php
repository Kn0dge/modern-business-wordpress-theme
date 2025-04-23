<?php
/**
 * Iris Color Picker Customizer Control
 *
 * This control enhances the standard color picker with the Iris color picker.
 */

if (!class_exists('Customizer_Iris_Color_Control')) {
    if (class_exists('WP_Customize_Control')) {
        /**
         * Iris Color Picker Custom Control
         */
        class Customizer_Iris_Color_Control extends WP_Customize_Control {
            /**
             * Control type
             *
             * @var string
             */
            public $type = 'iris-color';

            /**
             * Color palettes
             *
             * @var array
             */
            public $palettes;

            /**
             * Enqueue scripts and styles.
             */
            public function enqueue() {
                wp_enqueue_script('iris-color-picker', get_template_directory_uri() . '/js/iris-color-control.js', array('jquery', 'wp-color-picker'), '1.0.0', true);
                wp_enqueue_style('wp-color-picker');
            }

            /**
             * Render the control.
             */
            public function render_content() {
                // Process the palettes
                if (is_array($this->palettes)) {
                    $palettes = json_encode($this->palettes);
                } else {
                    // Default palettes
                    $palettes = json_encode(array(
                        '#000000',
                        '#ffffff',
                        '#dd3333',
                        '#dd9933',
                        '#eeee22',
                        '#81d742',
                        '#1e73be',
                        '#8224e3',
                    ));
                }

                // Output the label and description if they exist
                if (!empty($this->label)) {
                    echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
                }
                if (!empty($this->description)) {
                    echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
                }
                ?>
                <label>
                    <input class="iris-color-control" type="text" data-palettes="<?php echo esc_attr($palettes); ?>" <?php $this->link(); ?> />
                </label>
                <?php
            }
        }
    }
}
