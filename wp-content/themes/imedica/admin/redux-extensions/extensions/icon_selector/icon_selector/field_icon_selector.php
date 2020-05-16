<?php
/**
 * Redux Framework is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Redux Framework is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     ReduxFramework
 * @author      Dovy Paukstys
 * @version     3.1.5
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Don't duplicate me!
if ( ! class_exists( 'ReduxFramework_icon_selector' ) ) {

	/**
	 * Main ReduxFramework_icon_selector class
	 *
	 * @since       1.0.0
	 */
	class ReduxFramework_icon_selector extends ReduxFramework {

		/**
		 * Field Constructor.
		 *
		 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		function __construct( $field = array(), $value = '', $parent ) {


			$this->parent = $parent;
			$this->field  = $field;
			$this->value  = $value;

			$this->paths            = wp_upload_dir();
			$this->paths['fonts']   = 'imedica_fonts';
			$this->paths['fonturl'] = set_url_scheme( trailingslashit( $this->paths['baseurl'] ) . $this->paths['fonts'] );

			if ( empty( $this->extension_dir ) ) {
				$this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
				$this->extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->extension_dir ) );
			}

			// Set default args for this field to avoid bad indexes. Change this to anything you use.
			$defaults    = array(
				'options'          => array(),
				'stylesheet'       => '',
				'output'           => true,
				'enqueue'          => true,
				'enqueue_frontend' => true
			);
			$this->field = wp_parse_args( $this->field, $defaults );

		}

		/**
		 * Field Render Function.
		 *
		 * Takes the vars and outputs the HTML for the field in the settings
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function render() {

			// HTML output goes here
			$value      = ( $this->value ) ? esc_attr( $this->value ) : $this->field['default'];
			$input_name = $this->field['name'];
			if ( function_exists( "imedica_icon_manager" ) ) {
				echo imedica_icon_manager( $input_name, $value );
			} else {
				echo '<p> Please activate "Ultimate Addons for Visual Composer" plugin. </p>';
			}

		}

		/**
		 * Enqueue Function.
		 *
		 * If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function enqueue() {

			$extension = ReduxFramework_extension_icon_selector::getInstance();

			wp_enqueue_style(
				'redux-field-icon-selector-css',
				$this->extension_url . 'field_icon_selector.css',
				time(),
				true
			);

			$fonts = get_option( 'imedica_fonts' );
			if ( is_array( $fonts ) ) {
				foreach ( $fonts as $font => $info ) {
					if ( strpos( $info['style'], 'http://' ) !== false ) {
						wp_enqueue_style( 'bsf-' . $font, $info['style'] );
					} else {
						wp_enqueue_style( 'bsf-' . $font, trailingslashit( $this->paths['fonturl'] ) . $info['style'] );
					}
				}
			}

		}

		/**
		 * Output Function.
		 *
		 * Used to enqueue to the front-end
		 *
		 * @since       1.0.0
		 * @access      public
		 * @return      void
		 */
		public function output() {

			if ( $this->field['enqueue_frontend'] ) {

			}

		}

	}
}
