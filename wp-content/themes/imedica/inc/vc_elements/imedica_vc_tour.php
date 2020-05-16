<?php
add_action( 'vc_before_init', 'imedica_tour_init' );
function imedica_tour_init() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_tour extends WPBakeryShortCode {
		}
	}
	vc_map(array(
				'name' => __( 'iMedica Tour', 'imedica' ),
				'base' => 'vc_tour',
				'show_settings_on_create' => false,
				'is_container' => true,
				'container_not_allowed' => true,
				//'deprecated' => '4.6',
				'icon' => 'icon-wpb-ui-tab-content-vertical',
				'category' => __( 'iMedica', 'imedica' ),
				/*backend css and js*/
				'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_elements/assets/tabs-tour.js'),
      			'admin_enqueue_css' => array(get_template_directory_uri().'/vc_templates/css/imd-vc-tour-admin.css'),
				
				'wrapper_class' => 'vc_clearfix',
				'description' => __( 'Vertical tabbed content', 'imedica' ),
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => __( 'Widget title', 'imedica' ),
						'param_name' => 'title',
						'description' => __( 'Enter text used as widget title (Note: located above content element).', 'imedica' ),
					),
					array(
						'type' => 'dropdown',
						'heading' => __( 'Auto rotate slides', 'imedica' ),
						'param_name' => 'interval',
						'value' => array(
							__( 'Disable', 'imedica' ) => 0,
							3,
							5,
							10,
							15,
						),
						'std' => 0,
						'description' => __( 'Auto rotate slides each X seconds.', 'imedica' ),
					),
					array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'imedica' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'imedica' ),
					), 
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => __( "Text Color", "imedica" ),
						"param_name" => "title_color",
						"value"      => "#8c99a9",
						"group"      => "Color Settings",
					), 
					array(
						"type"       => "hidden",
						"class"      => "",
						"heading"    => __( "", "imedica" ),
						"param_name" => "vctour_value",
						"value"      => "tour",
						"group"      => "Color Settings",
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => __( "Text Hover Color", "imedica" ),
						"param_name" => "text_hover_color",
						"value"      => "#107fc9",
						"group"      => "Color Settings",
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => __( "Icon Color", "imedica" ),
						"param_name" => "icon_color",
						"value"      => "#107fc9",
						"group"      => "Color Settings",
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => __( "Icon Hover Color", "imedica" ),
						"param_name" => "icon_hover_color",
						"value"      => "#ffffff",
						"group"      => "Color Settings",
					),
					array(
						"type"       => "colorpicker",
						"class"      => "",
						"heading"    => __( "Icon Background Hover Color", "imedica" ),
						"param_name" => "icon_bg_hover_color",
						"value"      => "#107fc9",
						"group"      => "Color Settings",
					),
			 		array(
						"type"             => "number",
						"param_name"       => "icon_font_size",
						"heading"          => "Icon Font size",
						"value"            => "",
						"suffix"           => "px",
						"min"              => 10,
						"group"            => "Color Settings",
						"edit_field_class" => "vc_col-sm-12 ultimate-admin-field-top-margin",
					),
					array(
						"type"             => "ult_param_heading",
						"param_name"       => "title_typography_heading",
						"text"             => __( "Title Settings", "ultimate" ),
						"value"            => "tour",
						"class"            => "",
						"group"            => "Typography",
						'edit_field_class' => 'ult-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => "Font Family",
						"param_name" => "title_font",
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"value"      => "",
						"group"      => "Typography",
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => "Font Style",
						"param_name" => "title_font_style",
						"value"      => "",
						"group"      => "Typography",
					),
					array(
						"type"             => "number",
						"param_name"       => "title_font_size",
						"heading"          => "Font size",
						"value"            => "",
						"suffix"           => "px",
						"min"              => 10,
						"group"            => "Typography",
						"edit_field_class" => "vc_col-sm-12 ultimate-admin-field-top-margin",
					),
					array(
						'type' => 'css_editor',
						'heading' => __( 'CSS', 'imedica' ),
						'param_name' => 'css_wrapper',
						'edit_field_class' => 'vc_col-sm-12 vc_column no-vc-background no-vc-border creative_link_css_editor',
						"group"      => __( "Design", "imedica" ),
					),


				), //param array end
				'custom_markup' => '
			<div class="wpb_tabs_holder wpb_holder vc_clearfix vc_container_for_children">
			<ul class="tabs_controls">
			</ul>
			%content%
			</div>',
				'default_content' => '
			[vc_tab title="' . __( 'Tab 1', 'imedica' ) . '" tab_id=""][/vc_tab]
			[vc_tab title="' . __( 'Tab 2', 'imedica' ) . '" tab_id=""][/vc_tab]
			',
				'js_view' => 'VcTabsView',
	));
}