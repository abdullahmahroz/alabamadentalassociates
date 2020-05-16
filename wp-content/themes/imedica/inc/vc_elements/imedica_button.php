<?php
add_action( 'vc_before_init', 'imedica_button_init' );
function imedica_button_init() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_button extends WPBakeryShortCode {
		}
	}
	if ( function_exists( 'vc_map' ) ) {
		vc_map( array(
			"name"        => __( "Buttons", 'imedica' ),
			"description" => __( "Eye caching buttons.", 'imedica' ),
			"base"        => "imedica_button",
			"icon"  	  => get_template_directory_uri() . "/vc_templates/images/buttons.png",
			"class"       => "imd_buttons",
			"controls"    => "full",
			"category"    => __( 'iMedica', 'imedica' ),
			"params"      => array(
				array(
					"type"        => "textfield",
					"holder"      => "div",
					"class"       => "",
					"heading"     => __( "Title", 'imedica' ),
					"param_name"  => "content",
					"value"       => __( "", 'imedica' ),
					"description" => __( "Provide the title for the button.", 'imedica' )
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Button Size", 'imedica' ),
					"param_name"  => "button_size",
					"value"       => array(
						__( "Tiny", "imedica" )   => "tiny",
						__( "Small", "imedica" )  => "small",
						__( "Medium", "imedica" ) => "medium",
						__( "Large", "imedica" )  => "large",
					),
					"description" => __( "Choose Button Size", 'imedica' )
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Button alignment", 'imedica' ),
					"param_name"  => "button_alignment",
					"value"       => array(
						__( "Left", "imedica" )   => "left",
						__( "Right", "imedica" )  => "right",
						__( "Center", "imedica" ) => "center",
					),
					"description" => __( "Choose Alignment of button", 'imedica' )
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Button Style", 'imedica' ),
					"param_name"  => "btn_style",
					"value"       => array(
						__( "Default", "imedica" ) => "color",
						__( "Outline", "imedica" ) => "outline",
					),
					"description" => __( "Select Button Style.", 'imedica' )
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Text Color", "imedica" ),
					"param_name"  => "color",
					"value"       => "",
					"description" => __( "Select Color for Title.", "imedica" ),
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Background Color", "imedica" ),
					"param_name"  => "color_bg",
					"value"       => "",
					"description" => __( "Select Background Color for button.", "imedica" ),
					"dependency"  => Array( "element" => "btn_style", "value" => 'color' ),
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Text Hover Color", "imedica" ),
					"param_name"  => "outline_color_text_hover",
					"value"       => "",
					"description" => __( "Select Background Color for button.", "imedica" ),
					"dependency"  => Array( "element" => "btn_style", "value" => 'outline' ),
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Border Color", "imedica" ),
					"param_name"  => "color_border",
					"value"       => "",
					"description" => __( "Select Border Color for button.", "imedica" ),
					"dependency"  => Array( "element" => "btn_style", "value" => 'outline' ),
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Background Color", "imedica" ),
					"param_name"  => "outline_color_bg",
					"value"       => "",
					"description" => __( "Select Background Hover Color for button.", "imedica" ),
					"dependency"  => Array( "element" => "btn_style", "value" => 'outline' ),
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Background Hover Color", "imedica" ),
					"param_name"  => "outline_color_bg_hover",
					"value"       => "",
					"description" => __( "Select Background Hover Color for button.", "imedica" ),
					"dependency"  => Array( "element" => "btn_style", "value" => 'outline' ),
				),
				array(
					"type"        => "number",
					"class"       => "",
					"heading"     => __( "Border Width", "imedica" ),
					"param_name"  => "border_size",
					"value"       => 1,
					"min"         => 1,
					"max"         => 10,
					"suffix"      => "px",
					"description" => __( "Thickness of the button border.", "imedica" ),
					"dependency"  => Array( "element" => "btn_style", "value" => 'outline' ),
				),
				array(
					"type"        => "icon_manager",
					"class"       => "",
					"heading"     => __( "Select Icon ", "imedica" ),
					"param_name"  => "icon",
					"value"       => "",
					"admin_label" => true,
					"description" => __( "Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='".admin_url( 'admin.php?page=bsf-font-icon-manager' )."' target='_blank'>add new here</a>.", "imedica" ),
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Icon Color", "imedica" ),
					"param_name"  => "color_icon",
					"value"       => "",
					"description" => __( "Select color for icon.", "imedica" ),
				),
				array(
					"type"       => "number",
					"param_name" => "icon_size",
					"heading"    => __( "Icon Size", "imedica" ),
					"value"      => " ",
					"suffix"     => "px",
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Icon Hover Color", "imedica" ),
					"param_name"  => "color_icon_hover",
					"value"       => "",
					"description" => __( "Select color for icon.", "imedica" ),
					"dependency"  => Array( "element" => "btn_style", "value" => 'outline' ),
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Icon Direction", 'imedica' ),
					"param_name"  => "icon_direction",
					"value"       => array(
						"Left"  => "left",
						"Right" => "right",
					),
					"description" => __( "Select icon direction.", 'imedica' )
				),
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => __( "Add Link", "imedica" ),
					"param_name"  => "btn_link",
					"value"       => "",
					"description" => __( "Provide the link that will be applied to this button.", "imedica" )
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Animation", 'imedica' ),
					"param_name"  => "animation_style",
					"value"       => array(
						"No Animation" => "no_animation",
						"Animate"      => "animate",
					),
					"description" => __( "Like CSS3 Animations? We have an option for you!", 'imedica' )
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra Class Name', 'imedica' ),
					'param_name'  => 'el_class',
					'description' => '',
					),
				array(
					"type"       => "text",
					"heading"    => __( "<h2>Title Settings</h2>", "imedica" ),
					"param_name" => "main_title_typograpy",
					"group"      => "Typography",
				),
				array(
					"type"        => "ultimate_google_fonts",
					"heading"     => __( " Font Family", "imedica" ),
					"param_name"  => "main_heading_font_family",
					"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
					"group"       => "Typography",
				),
				array(
					"type"       => "ultimate_google_fonts_style",
					"heading"    => __( "Font Style", "imedica" ),
					"param_name" => "main_heading_style",
					"group"      => "Typography",
				),
				array(
					"type"       => "number",
					"param_name" => "title_font_size",
					"heading"    => __( "Font size", "imedica" ),
					"value"      => "15",
					"suffix"     => "px",
					"group"      => "Typography"
				),
				array(
					"type"       => "number",
					"param_name" => "title_line_ht",
					"heading"    => __( "Line Height", "imedica" ),
					"value"      => "20",
					"suffix"     => "px",
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
}