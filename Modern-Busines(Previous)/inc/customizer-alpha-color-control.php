<?php
if (!class_exists('Customizer_Alpha_Color_Control')) {
    if (class_exists('WP_Customize_Control')) {
        /**
         * Alpha Color Picker Custom Control
         */
        class Customizer_Alpha_Color_Control extends WP_Customize_Control {
            /**
             * Control type
             *
             * @var string
             */
            public $type = 'alpha-color';

            /**
             * Add support for palettes to be passed in.
             *
             * @var bool
             */
            public $palette;

            /**
             * Add support for showing the opacity value on the slider handle.
             *
             * @var bool
             */
            public $show_opacity;

            /**
             * Enqueue scripts and styles.
             */
            public function enqueue() {
                wp_enqueue_script('alpha-color-picker', get_template_directory_uri() . '/js/alpha-color-control.js', array('jquery', 'wp-color-picker'), '1.0.0', true);
                wp_enqueue_style('wp-color-picker');
            }

            /**
             * Render the control.
             */
            public function render_content() {
                // Process the palette
                if (is_array($this->palette)) {
                    $palette = implode('|', $this->palette);
                } else {
                    // Default palette
                    $palette = '#222222|#444444|#777777|#999999|#aaaaaa|#cccccc|#e1e1e1|#ffffff';
                }

                // Support passing show_opacity as string or boolean
                $show_opacity = ($this->show_opacity === true || $this->show_opacity === 'true') ? 'true' : 'false';

                // Get our value for the customizer
                $value = $this->value();

                // Output the label and description if they exist
                if (!empty($this->label)) {
                    echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
                }
                if (!empty($this->description)) {
                    echo '<span class="description customize-control-description">' . esc_html($this->description) . '</span>';
                }
                ?>
                <label>
                    <input class="alpha-color-control" type="text" data-show-opacity="<?php echo esc_attr($show_opacity); ?>" data-palette="<?php echo esc_attr($palette); ?>" data-default-color="<?php echo esc_attr($this->settings['default']->default); ?>" <?php $this->link(); ?> />
                </label>
                <?php
            }
        }
    }
}
