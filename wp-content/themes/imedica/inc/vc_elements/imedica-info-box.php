<?php
add_action( 'wp_enqueue_scripts', 'fnimedica_info_boxes' );
add_action( 'vc_before_init', 'imedica_info_boxes' );
function fnimedica_info_boxes() {
	wp_register_style( 'imedica_info_boxes-style', get_stylesheet_directory_uri() . '/vc_templates/css/imedica_feature_infoboxes.css', false, null );
}
function imedica_info_boxes() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_info_boxes extends WPBakeryShortCode {
		}
	}
	if ( function_exists( "vc_map" ) ) {
		vc_map( array(
		"name" => __("Imedica - Info Box", "imedica"),
		"base" => "imedica_info_boxes",
		"icon"  => get_template_directory_uri() . "/vc_templates/images/info_box.png",
		"class" => "imd_info_box",
		"category" => 'iMedica',
		"description" => __("Add icon box with custom font icon.", "imedica"),
		"params" => array(
				array(
					"type"       => "textfield",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Title ", "imedica" ),
					"param_name" => "title",
					"value"      => "",
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
					"type"       => "text",
					"heading"    => __( "<h2>Description Settings</h2>", "imedica" ),
					"param_name" => "main_desc_typograpy",
					"group"      => "Typography",
				),
				array(
					"type"        => "ultimate_google_fonts",
					"heading"     => __( " Font Family", "imedica" ),
					"param_name"  => "desc_font_family",
					"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
					"group"       => "Typography",
				),
				array(
					"type"       => "ultimate_google_fonts_style",
					"heading"    => __( "Font Style", "imedica" ),
					"param_name" => "sub_heading_style",
					"group"      => "Typography",
				),
				array(
					"type"       => "number",
					"param_name" => "desc_font_size",
					"heading"    => __( "Font size", "imedica" ),
					"value"      => "15",
					"suffix"     => "px",
					"group"      => "Typography"
				),
				array(
					"type"       => "number",
					"param_name" => "desc_line_ht",
					"heading"    => __( "Line Height", "imedica" ),
					"value"      => "20",
					"suffix"     => "px",
					"group"      => "Typography",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Title color", "imedica" ),
					"param_name" => "titlecolor",
					"value"      => '#000000', //Default  color
					"group"      => "Color Settings",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Title Hover color", "imedica" ),
					"param_name" => "titlehovercolor",
					"value"      => '#000000', //Default  color
					"group"      => "Color Settings",
				),
				array(
					"type"       => "textarea_html",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Description", "imedica" ),
					"param_name" => "content",
					"value"      => "",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Description color", "imedica" ),
					"param_name" => "descriptioncolor",
					"value"      => '#000000', //Default  color
					"group"      => "Color Settings",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Description Hover color", "imedica" ),
					"param_name" => "description_hover_color",
					"value"      => '#000000', //Default  color
					"group"      => "Color Settings",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Background color", "imedica" ),
					"param_name" => "bgcolor",
					"value"      => '#e7e7e7', //Default  color
					"group"      => "Color Settings",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Background Hover color", "imedica" ),
					"param_name" => "back_hover_color",
					"value"      => '#f9f9f9', //Default  color
					"group"      => "Color Settings",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Select Style", "imedica" ),
					"param_name"  => "style",
					"value"       => array(
						'Style1' => 'Style1',
						'Style2' => 'Style2',
						'Style3' => 'Style3',
					),
					"description" => __( "Select Style For displayng Content ", "imedica" )
				),
				array(
					"type" => "number",
					"class" => "",
					"heading" => __("Box Min Height", "ultimate_vc"),
					"param_name" => "box_min_height",
					"value" => "",
					"suffix" =>"px",
					"description" => __("Select Min Height for Box.", "ultimate_vc"),
				),
				array(
					"type"        => "icon_manager",
					"class"       => "",
					"heading"     => __( "Select Icon ", "imedica" ),
					"param_name"  => "icon",
					"value"       => "",
					"description" => __( "Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='".admin_url( 'admin.php?page=bsf-font-icon-manager' )."' target='_blank'>add new here</a>.", "imedica" ),
				),
				array(
					"type"       => "number",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Icon Size", "imedica" ),
					"param_name" => "icon_size",
					"value"      => "25",
					"suffix"     => "px",
					"dependency" => Array( "element" => "style", "value" => array( "Style1", "Style2", "Style3" ) ),
				),
				array(
					"type"       => "colorpicker",
					"class"      => "",
					"heading"    => __( "Icon Color", "imedica" ),
					"param_name" => "icon_color",
					"value"      => "",
				),
				array(
					"type"       => "colorpicker",
					"class"      => "",
					"heading"    => __( "Icon Hover Color", "imedica" ),
					"param_name" => "icon_color_hover",
					"value"      => "",
					"dependency" => Array( "element" => "style", "value" => array( "Style2" ) ),
				),
				array(
					"type"        => "colorpicker",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Icon Background color", "imedica" ),
					"param_name"  => "color1",
					"value"       => '', //Default Red color
					"description" => __( "Choose color for icon", "imedica" ),
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Icon Hover Background color", "imedica" ),
					"param_name" => "icon_color_bg_hover",
					"value"      => '', //Default Red color
					"dependency" => Array( "element" => "style", "value" => array( "Style2" ) ),
				),
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => __( "Link ", "imedica" ),
					"param_name"  => "button_link",
					"value"       => "",
					"description" => __( "You can link or remove the existing link on the button from here.", "imedica" ),
				),
				array(
					"type"        => "ult_switch",
					"class"       => "",
					"heading"     => __( "Fold Effect", "imedica" ),
					"param_name"  => "fold_effect",
					"value"       => "on",
					"default_set" => true,
					"options"     => array(
						"on" => array(
							"label" => __( "Enable Fold Effect?", "imedica" ),
							"on"    => "Yes",
							"off"   => "No",
						),
					),
					"description" => __( "", "imedica" ),
					"dependency"  => "",
				),
				array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => __( "Extra Class", "imedica" ),
					"param_name"  => "el_class",
					"value"       => "",
					"description" => __( "Add extra class name that will be applied to the icon box, and you can use this class for your customizations.", "imedica" ),
				),
				array(
					"type"       => "text",
					"heading"    => __( "<h4>Enter values with respective unites. Example - 10px, 10em, 10%, etc.</h4>", "imedica" ),
					"param_name" => "margin_design_tab_text",
					"group"      => "Design",
				),
				array(
					"type"       => "ultimate_margins",
					"heading"    => __( "Description Margins", "imedica" ),
					"param_name" => "main_heading_margin",
					"positions"  => array(
						__( "Top", "imedica" )    => "top",
						__( "Bottom", "imedica" ) => "bottom"
					),
					"group"      => "Design"
				),
				array(
					"type"       => "ultimate_margins",
					"heading"    => __( "Sub Heading Margins", "imedica" ),
					"param_name" => "sub_heading_margin",
					"positions"  => array(
						__( "Top", "imedica" )    => "top",
						__( "Bottom", "imedica" ) => "bottom"
					),
					"group"      => "Design"
				),
				array(
					"type"          => "ultimate_border",
					"heading"       => __( "Border", "imedica" ),
					"param_name"    => "main_heading_border",
					"unit"          => "px",
					"positions"     => array(
						__( "Top", "imedica" )    => "",
						__( "Right", "imedica" )  => "",
						__( "Bottom", "imedica" ) => "",
						__( "Left", "imedica" )   => ""
					),
					"enable_radius" => false,
					"radius"        => array(
						__( "Top Left", "imedica" )     => "",                // use 'Top Left'
						__( "Top Right", "imedica" )    => "",                  // use 'Top Right'
						__( "Bottom Right", "imedica" ) => "",                // use 'Bottom Right'
						__( "Bottom Left", "imedica" )  => ""                   // use 'Bottom Left'
					),
					"group"         => "Design"
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Border Hover color", "imedica" ),
					"param_name" => "border_hover",
					"value"      => '', //Default Red color
					"group"      => "Design"
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
