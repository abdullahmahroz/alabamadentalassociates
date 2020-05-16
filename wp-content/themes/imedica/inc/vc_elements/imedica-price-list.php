<?php
/*
Module Name: iMedica Price List
Module URI: https://www.brainstormforce.com/demos/ultimate-carousel
*/
add_action( "vc_before_init", "func_imd_price_list" );

function func_imd_price_list() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imd_price_list_element extends WPBakeryShortCode {
		}
	}
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_imd_price_list extends WPBakeryShortCodesContainer {
		}
	}
	if ( function_exists( "vc_map" ) ) {
		vc_map(
			array(
				"name"                    => __( "Price list", "smile" ),
				"base"                    => "imd_price_list",
				"icon"                    => get_template_directory_uri() . "/vc_templates/images/price_list.png",
				"class"                   => "imd_price_list",
				"as_parent"               => array( 'only' => 'imd_price_list_element' ),
				"content_element"         => true,
				"controls"                => "full",
				"show_settings_on_create" => true,
				"category"                => "iMedica",
				"description"             => __( "Pricing information in list format.", "imedica" ),
				"js_view"                 => 'VcColumnView',
				"params"                  => array(
					array(
						"type"        => "textfield",
						"holder"      => "div",
						"class"       => "",
						"heading"     => __( "Title", 'imedica' ),
						"param_name"  => "imd_pr_list_content",
						"value"       => __( "", 'imedica' ),
						"description" => __( "Provide the title the price list.", 'imedica' ),
						"group"       => "List Title",
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "Text Color", "imedica" ),
						"param_name"       => "imd_pr_list_color",
						"value"            => "",
						"description"      => __( "Select Color for Title.", "imedica" ),
						"group"            => "List Title"
					),
					array(
						"type"             => "number",
						"param_name"       => "imd_pr_list__font_size",
						"heading"          => __( "Font size", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "15",
						"suffix"           => "px",
						"description"      => __( "Select Font Size Title.", "imedica" ),
						"group"            => "List Title"
					),
					array(
						"type"             => "number",
						"param_name"       => "imd_pr_list_sep_topmargin",
						"heading"          => __( "Seperator top margin", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "15",
						"suffix"           => "px",
						"group"            => "List Title"
					),
					array(
						"type"             => "number",
						"param_name"       => "imd_pr_list_sep_bottommargin",
						"heading"          => __( "Seperator bottom margin", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "15",
						"suffix"           => "px",
						"group"            => "List Title"
					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => __( "Font Family", "imedica" ),
						"param_name" => "imd_pr_list_font",
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"value"      => "",
						"group"      => "List Title"
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => __( "Font Style", "imedica" ),
						"param_name" => "imd_pr_list_font_style",
						"value"      => "",
						"group"      => "List Title"
					),
					array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra Class Name', 'imedica' ),
					'param_name'  => 'el_class',
					'description' => '',
					"group"      => "List Title"
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "Text Color", "imedica" ),
						"param_name"       => "imd_pr_list_elem_color",
						"value"            => "",
						"description"      => __( "Select Color for Title.", "imedica" ),
						"group"            => "List sub element"
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "Text Hover Color", "imedica" ),
						"param_name"       => "imd_pr_list_elem_hv_color",
						"value"            => "",
						"description"      => __( "Select Color for Title.", "imedica" ),
						"group"            => "List sub element"
					),
					array(
						"type"             => "number",
						"param_name"       => "imd_pr_list_elem__font_size",
						"heading"          => __( "Font size", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "15",
						"suffix"           => "px",
						"group"            => "List sub element"
					),
					array(
						"type"             => "ult_switch",
						"class"            => "",
						"heading"          => __( "Hover Effect", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"param_name"       => "enable_hover",
						"value"            => "",
						"options"          => array(
							"enable" => array(
								"label" => "Enable Hover effect for sub elements title?",
								"on"    => "Yes",
								"off"   => "No",
							)
						),
						"group"            => "List sub element",

					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => __( "Font Family", "imedica" ),
						"param_name" => "imd_pr_list_elem_font",
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"value"      => "",
						"group"      => "List sub element"
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => __( "Font Style", "imedica" ),
						"param_name" => "imd_pr_list_elem_font_style",
						"value"      => "",
						"group"      => "List sub element"
					),
					array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => __( "border bottom settings", "smile" ),
						"param_name"  => "imd_pr_list_border_style",
						"value"       => array(
							__( "Solid", "imedica" )  => "solid",
							__( "Dashed", "imedica" ) => "dashed",
							__( "Dotted", "imedica" ) => "dotted",
							__( "Double", "imedica" ) => "double",
							__( "Inset", "imedica" )  => "inset",
							__( "Outset", "imedica" ) => "outset",
							__( "None", "imedica" )   => "",
						),
						"description" => __( "", "smile" ),
						"group"       => "List sub element"
					),
					array(
						"type"             => "number",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "Border Width", "smile" ),
						"param_name"       => "imd_pr_list_border_width",
						"value"            => "0",
						"suffix"           => "px",
						"dependency"       => Array( "element" => "img_border_style", "not_empty" => true ),
						"description"      => __( "", "smile" ),
						"group"            => "List sub element"
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "Border Color", "smile" ),
						"param_name"       => "imd_pr_list_border_color",
						"value"            => "",
						"dependency"       => Array( "element" => "img_border_style", "not_empty" => true ),
						"description"      => __( "", "smile" ),
						"group"            => "List sub element"
					),
					array(
						"type"       => "number",
						"param_name" => "imd_pr_list_elem_icon_size",
						"heading"    => __( "Size Of icon", "imedica" ),
						"value"      => "15",
						"suffix"     => "px",
						"group"      => "List icon"
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "Icon Color", "imedica" ),
						"param_name"       => "imd_pr_list_elem_font_color",
						"value"            => "",
						"description"      => __( "Select Color for icon.", "imedica" ),
						"group"            => "List icon"
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "Icon Hover Color", "imedica" ),
						"param_name"       => "imd_pr_list_elem_icn_hv_color",
						"value"            => "",
						"description"      => __( "Select Color for icon.", "imedica" ),
						"group"            => "List icon"
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "background Color", "imedica" ),
						"param_name"       => "imd_pr_list_elem_bck_color",
						"value"            => "",
						"description"      => __( "Select Color for Title.", "imedica" ),
						"group"            => "List icon"
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-6",
						"heading"          => __( "background Hover Color", "imedica" ),
						"param_name"       => "imd_pr_list_elem_bck_hv_color",
						"value"            => "",
						"description"      => __( "Select Color for Title.", "imedica" ),
						"group"            => "List icon"
					),
					array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => __( "Image Border Style", "smile" ),
						"param_name"  => "imd_pr_list_elem_border_style",
						"value"       => array(
							__( "Solid", "imedica" )  => "solid",
							__( "Dashed", "imedica" ) => "dashed",
							__( "Dotted", "imedica" ) => "dotted",
							__( "Double", "imedica" ) => "double",
							__( "Inset", "imedica" )  => "inset",
							__( "Outset", "imedica" ) => "outset",
							__( "None", "imedica" )   => "",
						),
						"description" => __( "", "smile" ),
						"group"       => "List icon"
					),
					array(
						"type"             => "number",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-4",
						"heading"          => __( "Border Width", "smile" ),
						"param_name"       => "imd_pr_list_elem_border_width",
						"value"            => "0",
						"suffix"           => "px",
						"dependency"       => Array(
							"element"   => "imd_pr_list_elem_border_style",
							"not_empty" => true
						),
						"description"      => __( "", "smile" ),
						"group"            => "List icon"
					),
					array(
						"type"             => "colorpicker",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-4",
						"heading"          => __( "Border Color", "smile" ),
						"param_name"       => "imd_pr_list_elem_border_color",
						"value"            => "",
						"dependency"       => Array(
							"element" => "imd_pr_list_elem_border_style",
							"value"   => array(
								"solid",
								"dashed",
								"dotted",
								"double",
								"inset",
								"outset"
							)
						),
						"description"      => __( "", "smile" ),
						"group"            => "List icon"
					),
					array(
						"type"             => "number",
						"class"            => "",
						"edit_field_class" => "vc_col-sm-4",
						"heading"          => __( "Set custom border radius", "smile" ),
						"param_name"       => "imd_pr_list_elem_border_radius",
						"value"            => "15",
						"min"              => "0",
						"max"              => "500",
						"step"             => "1",
						"suffix"           => "px",
						"description"      => __( "", "smile" ),
						"dependency"       => Array(
							"element" => "imd_pr_list_elem_border_style",
							"value"   => array(
								"solid",
								"dashed",
								"dotted",
								"double",
								"inset",
								"outset"
							)
						),
						"group"            => "List icon"
					),
					array(
						"type"        => "icon_manager",
						"class"       => "",
						"heading"     => __( "Select Icon ", "imedica" ),
						"param_name"  => "imd_pr_list_elem_icon",
						"value"       => "",
						"admin_label" => true,
						"description" => __( "Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='".admin_url( 'admin.php?page=bsf-font-icon-manager' )."' target='_blank'>add new here</a>.", "imedica" ),
						"group"       => "List icon"
					),
					array(
						"type"       => "ultimate_spacing",
						"heading"    => __( "Padding", "imedica" ),
						"param_name" => "main_box_padding",
						"mode"       => "padding",                    //  margin/padding
						"unit"       => "px",                        //  [required] px,em,%,all     Default all
						"positions"  => array(                   //  Also set 'defaults'
							"Top"    => "",
							"Right"  => "",
							"Bottom" => "",
							"Left"   => "",
						),
						"group"      => "List sub element",
					),
					array(
						'type' => 'css_editor',
						'heading' => __( 'CSS', 'imedica' ),
						'param_name' => 'css_wrapper',
						'edit_field_class' => 'vc_col-sm-12 vc_column no-vc-background no-vc-border creative_link_css_editor',
						"group"      => __( "Design", "imedica" ),
					),

					)
				)//vc_map => array
			);//vc_map
			vc_map( array(
					"name" => __("Price List element", "smile"),
					"base" => "imd_price_list_element",
					"icon"  => get_template_directory_uri() . "/vc_templates/images/price_list_item.png",
					"class" => "imd_price_list_item",
					"content_element" => true,
					"as_child" => array('only' => 'imd_price_list'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"params" => array(
							array(
		                      "type" => "textfield",
		                      "holder" => "div",
		                      "class" => "",
		                      "heading" => __("Element Name", 'imedica'),
		                      "param_name" => "imd_pr_list_elm_name",
		                      "value" => __("", 'imedica'),
		                      "description" => __("Provide the title the price list item.", 'imedica'),
	                  		),
	                  		array(
		                      "type" => "textfield",
		                      "holder" => "div",
		                      "class" => "",
		                      "heading" => __("Element Price", 'imedica'),
		                      "param_name" => "imd_pr_list_elm_price",
		                      "value" => __("", 'imedica'),
		                      "description" => __("Provide the price for price list item.", 'imedica'),
	                  		),
						) //params array
					)// vc_map => array - single
				);//vc_map - single
		} // function exists vc_map
	} // function func_imd_price_list