<?php
add_action( 'wp_enqueue_scripts', 'imedica_Price_tables' );
add_action( 'vc_before_init', 'imedica_price_table' );
function imedica_Price_tables() {
	wp_register_style( 'imedica_Price_tables-style', get_stylesheet_directory_uri() . '/vc_templates/css/imedica_Price_table.css', false, null );
}

function imedica_price_table() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_price_table extends WPBakeryShortCode {
		}
	}
	if ( function_exists( "vc_map" ) ) {
		vc_map( array(
		"name" => "Price Table",
		"base" => "imedica_price_table",
		"icon" => get_template_directory_uri() . "/vc_templates/images/price_table.png",
		"class" => "imd_price_table",
		"category" => 'iMedica',
		"description" => "Pricing information in table format.",
		"params" => array(
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "",
					"heading" => __("Title","imedica"),
					"param_name" => "title",
					"value"      => "",
				),
				array(
					"type"        => "dropdown",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Featured price table?", "imedica" ),
					"param_name"  => "style",
					"value"       => array(
						'Not Featured'                => 'style2',
						'Make it featured'            => 'style1',
						'Price Table Description box' => 'style3'
					),
					"description" => __( "Select whether to make this pricing table as featured or not.", "imedica" )
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Title color", "imedica" ),
					"param_name" => "titlecolor",
					"value"      => '#000000', //Default  color
					"group"      => "Color Setting ",

				),
				array(
					"type"       => "textfield",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Subtitle ", "imedica" ),
					"param_name" => "subtitle",
					"value"      => "",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Subtitle color", "imedica" ),
					"param_name" => "subtitlecolor",
					"value"      => '#000000', //Default  color
					"group"      => "Color Setting ",
				),
				array(
					"type"        => "textarea_html",
					"holder"      => "",
					"class"       => "",
					"heading"     => __( "Description", "imedica" ),
					"param_name"  => "content",
					"value"       => "",
					"description" => __( "Description needs to be added <ul><li> structure, it will be auomatically be converted to table format", "imedica" )
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Description color", "imedica" ),
					"param_name" => "descriptioncolor",
					"value"      => '#000000', //
					"group"      => "Color Setting ",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Background color", "imedica" ),
					"param_name" => "backgroundcolor",
					"value"      => '#ffffff', //Default Red color
					"group"      => "Color Setting ",

				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Circle Background", "imedica" ),
					"param_name" => "circlecolor",
					"value"      => '#107fc9',
					"group"      => "Color Setting ",
					"dependency" => Array( "element" => "style", "value" => array( "style1", "style2" ) ),

				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Circle Hover color", "imedica" ),
					"param_name" => "circvlehovercolor",
					"value"      => '#107fc9', //Default  color
					"group"      => "Color Setting ",
					"dependency" => Array( "element" => "style", "value" => array( "style1", "style2" ) ),

				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Price Color", "imedica" ),
					"param_name" => "pricecolor",
					"value"      => '#ffffff', //Default  color
					"group"      => "Color Setting ",
					"dependency" => Array( "element" => "style", "value" => array( "style1", "style2" ) ),

				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Price Hover Color", "imedica" ),
					"param_name" => "pricehovercolor",
					"value"      => '#ffffff', //Default  color
					"group"      => "Color Setting ",
					"dependency" => Array( "element" => "style", "value" => array( "style1", "style2" ) ),

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
					"type"       => "textfield",
					"holder"     => "",
					"class"      => "",
					"edit_field_class" => "vc_col-sm-6",
					"heading"    => __( "Currency Sumbol ", "imedica" ),
					"param_name" => "curr_symbol",
					"value"      => "$",
					// "suffix"     => "$",
					"dependency" => Array( "element" => "style", "value" => array( "style1", "style2" ) ),
				),
				array(
					"type"        => "ult_switch",
					"class"       => "",
					"edit_field_class" => "vc_col-sm-6",
					"heading"     => __( "Currency Symbol as Prefix", "imedica" ),
					"param_name"  => "curr_prefix",
					"value"       => "on",
					"default_set" => 'true',
					"options"     => array(
						"on" => array(
							// "label" => __( "Currency symbol as prefix to price?", "imedica" ),
							"on"    => "Yes",
							"off"   => "No",
						),
					),
					"description" => __( "Currency symbol as prefix to the price?", "imedica" ),
					"dependency" => Array( "element" => "style", "value" => array( "style1", "style2" ) ),
				),
				array(
					"type"       => "number",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Price ", "imedica" ),
					"param_name" => "price",
					"value"      => "250",
					// "suffix"     => "$",
					"dependency" => Array( "element" => "style", "value" => array( "style1", "style2" ) ),
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
					"heading"    => __( "<h2>Subtitle Settings</h2>", "imedica" ),
					"param_name" => "sub_title_typograpy",
					"group"      => "Typography",
				),
				array(
					"type"        => "ultimate_google_fonts",
					"heading"     => __( " Font Family", "imedica" ),
					"param_name"  => "sub_heading_font_family",
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
					"param_name" => "subtitle_font_size",
					"heading"    => __( "Font size", "imedica" ),
					"value"      => "15",
					"suffix"     => "px",
					"group"      => "Typography"
				),
				array(
					"type"       => "number",
					"param_name" => "subtitle_line_ht",
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
					"param_name" => "subdesc_heading_style",
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
					"type"       => "dropdown",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Alignment", 'imedica' ),
					"param_name" => "desc_text_align",
					"value"      => array(
						__( "Center", "imedica" )  => "center",
						__( "Left", "imedica" )    => "left",
						__( "Right", "imedica" )   => "right",
						__( "Justify", "imedica" ) => "justify",
					),
					"group"      => "Design",
				),
				array(
					"type"       => "text",
					"heading"    => __( "<h4>Enter values with respective unites. Example - 10px, 10em, 10%, etc.</h4>", "imedica" ),
					"param_name" => "margin_design_tab_text",
					"group"      => "Design",
				),
				array(
					"type"       => "ultimate_spacing",
					"heading"    => __( "Title Padding", "imedica" ),
					"param_name" => "main_box_padding",
					"mode"       => "padding",                    //  margin/padding
					"unit"       => "px",                        //  [required] px,em,%,all     Default all
					"positions"  => array(                   //  Also set 'defaults'
						__( "Top", "imedica" )    => "",
						__( "Right", "imedica" )  => "",
						__( "Bottom", "imedica" ) => "",
						__( "Left", "imedica" )   => "",
					),
					"group"      => "Design"
				),
				array(
					"type"       => "ultimate_margins",
					"heading"    => __( "Main Heading Margins", "imedica" ),
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