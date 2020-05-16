<?php
add_action( 'vc_before_init', 'init_testimonials_block_addon' );
function init_testimonials_block_addon() {
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_advanced_testimonials_block extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_single_testimonial_block extends WPBakeryShortCode {
		}
	}

//	add_shortcode( "advanced_testimonials_block", array( $this, "advanced_testimonials_block_shortcode" ) );
//	add_shortcode( "single_testimonial_block", array( $this, "single_testimonial_block_shortcode" ) );
	if ( function_exists( "vc_map" ) ) {
		vc_map(
			array(
				"name"                    => __( "Testimonials Block", "imedica" ),
				"description"             => "Display your testimonials.",
				"base"                    => "advanced_testimonials_block",
				"as_parent"               => array( 'only' => 'single_testimonial_block' ),
				"content_element"         => true,
				"controls"                => "full",
				"show_settings_on_create" => true,
				"icon"                    => get_template_directory_uri() . "/vc_templates/images/testimonials.png",
				"category"                => "iMedica",
				"js_view"                 => 'VcColumnView',
				"params"                  => array(
					array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => __( "Image Border Style", "imedica" ),
						"param_name"  => "img_border_style",
						"value"       => array(
							__( "None", "imedica" )   => "",
							__( "Solid", "imedica" )  => "solid",
							__( "Dashed", "imedica" ) => "dashed",
							__( "Dotted", "imedica" ) => "dotted",
							__( "Double", "imedica" ) => "double",
							__( "Inset", "imedica" )  => "inset",
							__( "Outset", "imedica" ) => "outset",
						),
						"description" => __( "", "imedica" ),
						"group"       => "Image Options",
					),
					array(
						"type"        => "number",
						"class"       => "",
						"heading"     => __( "Border Width", "imedica" ),
						"param_name"  => "img_border_width",
						"value"       => "",
						"suffix"      => "",
						"dependency"  => Array( "element" => "img_border_style", "not_empty" => true ),
						"description" => __( "", "imedica" ),
						"group"       => "Image Options",
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Border Color", "imedica" ),
						"param_name"  => "img_border_color",
						"value"       => "",
						"dependency"  => Array( "element" => "img_border_style", "not_empty" => true ),
						"description" => __( "", "imedica" ),
						"group"       => "Image Options",
					),
					array(
						"type"        => "number",
						"class"       => "",
						"heading"     => __( "Set custom border radius", "imedica" ),
						"param_name"  => "img_border_radius",
						"value"       => "2",
						"min"         => "0",
						"max"         => "500",
						"step"        => "1",
						"suffix"      => "px",
						"description" => "",
						"dependency"  => Array( "element" => "img_border_style", "not_empty" => true ),
						"group"       => "Image Options",
					),
					array(
						"type"        => "number",
						"class"       => "",
						"heading"     => __( "Image Width", "imedica" ),
						"param_name"  => "image_width",
						"value"       => "100",
						"min"         => "50",
						"max"         => "1000",
						"step"        => "1",
						"suffix"      => "px",
						"description" => "",
						"group"       => "Image Options",
					),
					array(
						"type"       => "text",
						"param_name" => "title_text_typography",
						"heading"    => __( "<h2>Testimonial author Name settings</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => __( "Font Family", "imedica" ),
						"param_name" => "auth_name_font",
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => __( "Font Style", "imedica" ),
						"param_name" => "auth_name_font_style",
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"             => "number",
						"param_name"       => "auth_name_font_size",
						"heading"          => __( "Font size", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "15",
						"suffix"           => "px",
						"group"            => "Typography"
					),
					array(
						"type"             => "number",
						"param_name"       => "auth_name_line_height",
						"heading"          => __( "Line Height", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "20",
						"suffix"           => "px",
						"group"            => "Typography"
					),
					array(
						"type"       => "colorpicker",
						"param_name" => "auth_name_font_color",
						"value"      => "#414042",
						"heading"    => "Color",
						"group"      => "Typography"
					),
					array(
						"type"       => "text",
						"param_name" => "title_text_typography",
						"heading"    => __( "<h2>Testimonial author bio settings</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => __( "Font Family", "imedica" ),
						"param_name" => "author_bio_font",
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => __( "Font Style", "imedica" ),
						"param_name" => "author_bio_font_style",
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"             => "number",
						"param_name"       => "author_bio_font_size",
						"heading"          => __( "Font size", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "13",
						"suffix"           => "px",
						"group"            => "Typography"
					),
					array(
						"type"             => "number",
						"param_name"       => "author_bio_line_height",
						"heading"          => __( "Line Height", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "18",
						"suffix"           => "px",
						"group"            => "Typography"
					),
					array(
						"type"       => "colorpicker",
						"param_name" => "author_bio_font_color",
						"value"      => "#107fc9",
						"heading"    => __( "Color", "imedica" ),
						"group"      => "Typography"
					),
					array(
						"type"       => "text",
						"param_name" => "desc_text_typography",
						"heading"    => __( "<h2>Testimonial Content Settings</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => __( "Font Family", "imedica" ),
						"param_name" => "desc_font",
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => __( "Font Style", "imedica" ),
						"param_name" => "desc_font_style",
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"             => "number",
						"param_name"       => "desc_font_size",
						"heading"          => __( "Font size", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "13",
						"suffix"           => "px",
						"group"            => "Typography"
					),
					array(
						"type"             => "number",
						"param_name"       => "desc_line_height",
						"heading"          => __( "Line Height", "imedica" ),
						"edit_field_class" => "vc_col-sm-6",
						"value"            => "18",
						"suffix"           => "px",
						"group"            => "Typography"
					),
					array(
						"type"       => "colorpicker",
						"param_name" => "desc_font_font_color",
						"value"      => "#6d6d6d",
						"heading"    => __( "Color", "imedica" ),
						"group"      => "Typography"
					),
					array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => __( "Slider Type", "imedica" ),
						"param_name"  => "layout_style",
						"value"       => array(
							__( "Author info on left", "imedica" )               => "layout1",
							__( "Author info on right", "imedica" )              => "layout2",
							__( "Author info below the testimonial", "imedica" ) => "layout3",
							__( "Author info on top of testimonial", "imedica" ) => "layout4"
						),
						"description" => "",
						"group"       => "Layout",
					),
					array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => __( "Testimonial Style", "imedica" ),
						"param_name"  => "testimonial_layout_style",
						"value"       => array(
							__( "Style-1", "imedica" )              => "style1",
							__( "Style-2", "imedica" )              => "style2",
						),
						"description" => "",
						"group"       => "Layout",
						"dependency"  => Array( "element" => "layout_style", "value" => array( 'layout1', 'layout2' ) ),
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Seperator", "ultimate_vc"),
						"param_name" => "testimonial_spacer",
						"value" => array(
							__("No Seperator","ultimate_vc")	=>	"no_spacer",
							__("Line","ultimate_vc")			=>	"line_only",
							__("Image","ultimate_vc") 			=> "image_only",
						),
						"description" => __("Horizontal line or image to divide sections", "ultimate_vc"),
						"group"       => "Layout",
						"dependency"  => Array( "element" => "testimonial_layout_style", "value" => array( 'style2' ) ),
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __("Line Style", "ultimate_vc"),
						"param_name" => "testimonial_line_style",
						"value" => array(
							__("Solid","ultimate_vc") => "solid",
							__("Dashed","ultimate_vc") => "dashed",
							__("Dotted","ultimate_vc") => "dotted",
							__("Double","ultimate_vc") => "double",
							__("Inset","ultimate_vc") => "inset",
							__("Outset","ultimate_vc") => "outset",
						),
						"dependency" => Array("element" => "testimonial_spacer", "value" => array("line_only")),
						"group"      => "Layout",
					),
					array(
						"type" => "number",
						"class" => "",
						"heading" => __("Line Width", "ultimate_vc"),
						"param_name" => "testimonial_line_width",
						"value" => "100",
						"suffix" => "%",
						"dependency" => Array("element" => "testimonial_spacer", "value" => array("line_only")),
						"group"      => "Layout",
					),
					array(
						"type" => "number",
						"class" => "",
						"heading" => __("Line Height", "ultimate_vc"),
						"param_name" => "testimonial_line_height",
						"value" => 1,
						"min" => 1,
						"max" => 50,
						"suffix" => "px",
						"dependency" => Array("element" => "testimonial_spacer", "value" => array("line_only")),
						"group"      => "Layout",
					),
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __("Line Color", "ultimate_vc"),
						"param_name" => "testimonial_line_color",
						"value" => "",	
						"dependency" => Array("element" => "testimonial_spacer", "value" => array("line_only")),
						"group"      => "Layout",
					),
					array(
						"type" => "ult_img_single",
						"heading" => __("Select Image", "ultimate_vc"),
						"param_name" => "testimonial_spacer_img",
						"dependency" => Array("element" => "testimonial_spacer", "value" => array("image_only")),
						"group"      => "Layout",
					),
					array(
						"type" => "number",
						"class" => "",
						"heading" => __("Image Width", "ultimate_vc"),
						"param_name" => "testimonial_spacer_img_width",
						"value" => 48,
						"suffix" => "px",
						"description" => __("Provide image width (optional)", "ultimate_vc"),
						"dependency" => Array("element" => "testimonial_spacer", "value" => array("image_only")),
						"group"      => "Layout",
					),
					array(
						'type' => 'css_editor',
						'heading' => __( 'CSS', 'imedica' ),
						'param_name' => 'css_wrapper',
						'edit_field_class' => 'vc_col-sm-12 vc_column no-vc-background no-vc-border creative_link_css_editor',
						"group"      => __( "Design", "imedica" ),
					),
				) // params array
			)//vc_map => array
		);//vc_map
		vc_map( array(
			"name"            => __( "Single Testimonial Block", "imedica" ),
			"base"            => "single_testimonial_block",
			"content_element" => true,
			"icon"            => get_template_directory_uri() . "/vc_templates/images/testimonial-item.png",
			"as_child"        => array( 'only' => 'advanced_testimonials_block' ),
			"params"          => array(
				array(
					"type"        => "ult_img_single",
					"heading"     => __( "Image", "imedica" ),
					"param_name"  => "image",
					"description" => __( "", "imedica" )
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Name", "imedica" ),
					"param_name"  => "name",
					"admin_label" => true,
					"description" => __( "", "imedica" )
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Position", "imedica" ),
					"param_name"  => "position",
					"admin_label" => true,
					"description" => __( "", "imedica" )
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Company", "imedica" ),
					"param_name"  => "company",
					"description" => __( "", "imedica" )
				),
				array(
					"type"        => "textarea_html",
					"heading"     => __( "Testimonial", "imedica" ),
					"param_name"  => "content",
					"description" => __( "", "imedica" )
				),
				array(
					"type"        => "textfield",
					"heading"     => __( "Extra class name", "imedica" ),
					"param_name"  => "el_class",
					"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "imedica" )
				),
				array(
					"type"        => "icon_manager",
					"class"       => "",
					"heading"     => __( "Select Icon ", "imedica" ),
					"param_name"  => "icon",
					"value"       => "",
					"description" => __( "Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='".admin_url( 'admin.php?page=bsf-font-icon-manager' )."' target='_blank'>add new here</a>.", "imedica" ),
					"group"       => "Icon Settings",
				),
				array(
					"type"       => "colorpicker",
					"heading"    => __( "Icon Color", "imedica" ),
					"param_name" => "icon_color",
					"value"      => "",
					"group"      => "Icon Settings",
				),
				array(
					"type"       => "number",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Icon Size", "imedica" ),
					"param_name" => "icon_size",
					"value"      => "15",
					"suffix"     => "px",
					"group"      => "General Settings",
					"group"      => "Icon Settings",
				),
			)
			//params array
		)// vc_map => array - single
		);//vc_map - single
	} // function exists vc_map
} // function init_testimonials_block_addon