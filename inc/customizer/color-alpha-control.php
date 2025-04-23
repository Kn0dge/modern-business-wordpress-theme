<?php
/**
 * @global WP_Customize_Control
 * @function wp_enqueue_script
 * @function get_template_directory_uri
 * @function wp_enqueue_style
 * @function esc_html
 * @function esc_attr
 */

namespace WPTRT\Customize\Control;

use function esc_html;
use function esc_attr;
use function wp_enqueue_script;
use function get_template_directory_uri;
use function wp_enqueue_style;
use WP_Customize_Control;

/**
 * @var WP_Customize_Control $this
 * @function \wp_enqueue_script
 * @function \get_template_directory_uri
 * @function \wp_enqueue_style
 * @function \esc_html
 * @function \esc_attr
 * @uses \WP_Customize_Control
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {

    class ColorAlpha extends WP_Customize_Control {

        public $type = 'color-alpha';

        public function enqueue() {
            wp_enqueue_script(
                'wptrt-color-alpha-control',
                get_template_directory_uri() . '/inc/customizer/js/color-alpha-control.js',
                array( 'jquery', 'customize-controls', 'wp-color-picker' ),
                '1.0.0',
                true
            );

            wp_enqueue_style(
                'wp-color-picker'
            );
        }

        public function render_content() {
            ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
                <input class="color-alpha" type="text" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
            </label>
            <?php
        }
    }
}
?>
