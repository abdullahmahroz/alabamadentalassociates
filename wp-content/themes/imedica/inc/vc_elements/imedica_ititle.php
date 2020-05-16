<?php
add_action( 'vc_before_init', 'imedica_ititle_init' );
function imedica_ititle_init() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_ititle extends WPBakeryShortCode {
		}
	}
	vc_map( array(
		"name"        => __( "iTitle", 'imedica' ),
		"description" => __( "Interactive iTitle.", 'imedica' ),
		"base"        => "imedica_ititle",
		"icon"  	  => get_template_directory_uri() . "/vc_templates/images/ititle.png",
		"class"       => "imd_ititle",
		"controls"    => "full",
		"category"    => __( 'iMedica', 'js_composer' ),
		"params"      => array(

			array(
				"type"        => "textfield",
				"class"       => "",
				"heading"     => __( "Title", 'imedica' ),
				"param_name"  => "title",
				"admin_label" => true,
				"value"       => __( "", 'imedica' ),
			),
			array(
				"type"        => "ult_switch",
				"class"       => "",
				"heading"     => __( "Add Icon", "imedica" ),
				"param_name"  => "add_icon",
				"value"       => "on",
				"default_set" => 'true',
				"options"     => array(
					"on" => array(
						"label" => "Do you want Icon for iTitle?",
						"on"    => "Yes",
						"off"   => "No",
					),
				),
				"description" => __( "", "imedica" ),
				"dependency"  => "",
			),
			array(
				"type"        => "icon_manager",
				"class"       => "",
				"heading"     => __( "Select Icon ", "imedica" ),
				"param_name"  => "icon",
				"value"       => "",
				"description" => __( "Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='".admin_url( 'admin.php?page=bsf-font-icon-manager' )."' target='_blank'>add new here</a>.", "imedica" ),
				"dependency"  => Array( "element" => "add_icon", "value" => array( "on" ) ),
			),
			array(
				"type"       => "number",
				"param_name" => "icon_size",
				"heading"    => __( "Icon Size", "imedica" ),
				"value"      => "",
				"suffix"     => "px",
				"dependency" => Array( "element" => "add_icon", "value" => array( "on" ) ),
			),
			array(
				"type"       => "number",
				"param_name" => "icon_line_height",
				"heading"    => __( "Icon Line Height", "imedica" ),
				"value"      => "",
				"suffix"     => "px",
				"dependency" => Array( "element" => "add_icon", "value" => array( "on" ) ),
			),
			array(
				"type"       => "dropdown",
				"holder"     => "",
				"class"      => "",
				"heading"    => __( "Icon Direction", 'imedica' ),
				"param_name" => "icon_direction",
				"value"      => array(
					"Left"  => "left",
					"Right" => "right",
				),
				"dependency" => Array( "element" => "add_icon", "value" => array( "on" ) ),
			),
			array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra Class Name', 'imedica' ),
					'param_name'  => 'el_class',
					'description' => ''
			),
			//Color Settings
			array(
				"type"       => "colorpicker",
				"param_name" => "bg_color",
				"heading"    => __( "Background Color", "imedica" ),
				"group"      => "Color Settings",
				"class"		 => "imedica-hidden",
				"edit_field_class" => "imedica-hidden",
			),
			array(
				"type"       => "colorpicker",
				"param_name" => "ititle_bg_color",
				"heading"    => __( "Background Color", "imedica" ),
				"group"      => "Color Settings",
			),
			array(
				"type"       => "colorpicker",
				"param_name" => "title_font_color",
				"heading"    => __( "Title Color", "imedica" ),
				"group"      => "Color Settings",
			),
			array(
				"type"       => "colorpicker",
				"param_name" => "icon_color",
				"heading"    => __( "Icon Color", "imedica" ),
				"group"      => "Color Settings",
				"dependency" => Array( "element" => "add_icon", "value" => array( "on" ) ),
			),
			array(
				"type"       => "colorpicker",
				"param_name" => "fold_light_color",
				"heading"    => __( "Fold Light", "imedica" ),
				"group"      => "Color Settings",
			),
			array(
				"type"       => "ultimate_spacing",
				"heading"    => __( "Padding", "imedica" ),
				"param_name" => "ititle_padding",
				"mode"       => "padding",                    //  margin/padding
				"unit"       => "px",                        //  [required] px,em,%,all     Default all
				"positions"  => array(                   //  Also set 'defaults'
					"Top"    => "",
					"Right"  => "",
					"Bottom" => "",
					"Left"   => ""
				),
				"group"      => "Color Settings",
			),
			// Typography
			array(
				"type"             => "ult_param_heading",
				"param_name"       => "title_typography_heading",
				"text"             => __( "Title Settings", "ultimate" ),
				"value"            => "",
				"class"            => "",
				"group"            => "Typography",
				'edit_field_class' => 'ult-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				"type"       => "ultimate_google_fonts",
				"heading"    => __( "Font Family", "imedica" ),
				"param_name" => "title_font",
				"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
				"value"      => "",
				"group"      => "Typography",
			),
			array(
				"type"       => "ultimate_google_fonts_style",
				"heading"    => __( "Font Style", "imedica" ),
				"param_name" => "title_font_style",
				"value"      => "",
				"group"      => "Typography",
			),
			array(
				"type"       => "number",
				"param_name" => "title_font_size",
				"heading"    => __( "Font size", "imedica" ),
				"value"      => "",
				"suffix"     => "px",
				"min"        => 10,
				"group"      => "Typography",
			),
			array(
				"type"       => "number",
				"param_name" => "title_font_line_height",
				"heading"    => __( "Font Line Height", "imedica" ),
				"value"      => "",
				"suffix"     => "px",
				"min"        => 10,
				"group"      => "Typography",
			),
			array(
				'type' => 'css_editor',
				'heading' => __( 'CSS', 'imedica' ),
				'param_name' => 'css_wrapper',
				'edit_field_class' => 'vc_col-sm-12 vc_column no-vc-background no-vc-border creative_link_css_editor',
				"group"      => __( "Design", "imedica" ),
			),
		)
	) );
}