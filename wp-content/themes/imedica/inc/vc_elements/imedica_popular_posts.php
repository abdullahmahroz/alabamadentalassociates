<?php
add_action( 'vc_before_init', 'imedica_init_popular_posts' );
function imedica_init_popular_posts() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_popular_posts extends WPBakeryShortCode {
		}
	}
	if ( function_exists( "vc_map" ) ) {
		vc_map( array(
			'name'  => __('Popular Posts', "imedica"),
			'base'  => 'imedica_popular_posts',
			'icon'  => get_template_directory_uri() . "/vc_templates/images/popular_posts.png",
			'class' => 'imd_popular_posts',
			'category' => 'iMedica',
			'weight' => - 50,
			'description' => __( 'The most popular posts on your site', 'imedica' ),
			'params'      => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Title', 'imedica' ),
					'param_name'  => 'title',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Number of posts to show', 'imedica' ),
					'param_name'  => 'number',
					'admin_label' => true
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Display post date?', 'imedica' ),
					'param_name' => 'show_date',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Display post comments?', 'imedica' ),
					'param_name' => 'show_comments',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Display post thumbnail?', 'imedica' ),
					'param_name' => 'show_thumbnail',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Display post excerpt?', 'imedica' ),
					'param_name' => 'show_excerpt',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Display post category?', 'imedica' ),
					'param_name' => 'show_category',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'imedica' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'imedica' )
				),
				array(
					"type"       => "text",
					"heading"    => __( "<h2>Main Title Settings</h2>", "imedica" ),
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
					"heading"    => __( "Title Font size", "imedica" ),
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
					"heading"    => __( "<h2>Post Title Settings</h2>", "imedica" ),
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
					"heading"    => __( "Font Style", "smile" ),
					"param_name" => "desc_heading_style",
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
					"heading"    => __( "Post Title color", "imedica" ),
					"param_name" => "titlecolor",
					"value"      => '#000000', //Default  color
					"group"      => "Typography",
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Post Title Hover color", "imedica" ),
					"param_name" => "titlehovercolor",
					"value"      => '#000000', //Default  color
					"group"      => "Typography",
				),
				array(
					"type"       => "text",
					"heading"    => __( "<h2>Post Content Settings</h2>", "imedica" ),
					"param_name" => "main_desc_typograpy",
					"group"      => "Typography",
				),
				array(
					"type"        => "ultimate_google_fonts",
					"heading"     => __( "Font Family", "imedica" ),
					"param_name"  => "pcn_font_family",
					"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
					"group"       => "Typography",
				),
				array(
					"type"       => "ultimate_google_fonts_style",
					"heading"    => __( "Font Style", "smile" ),
					"param_name" => "pcn_heading_style",
					"group"      => "Typography",
				),
				array(
					"type"       => "number",
					"param_name" => "pcn_font_size",
					"heading"    => __( "Font size", "imedica" ),
					"value"      => "15",
					"suffix"     => "px",
					"group"      => "Typography"
				),
				array(
					"type"       => "number",
					"param_name" => "pcn_line_ht",
					"heading"    => __( "Line Height", "imedica" ),
					"value"      => "20",
					"suffix"     => "px",
					"group"      => "Typography",

				),
				array(
					"type"       => "text",
					"heading"    => __( "<h2>Post Category Settings</h2>", "imedica" ),
					"param_name" => "cat_desc_typograpy",
					"group"      => "Typography",
				),
				array(
					"type"        => "ultimate_google_fonts",
					"heading"     => __( " Font Family", "smile" ),
					"param_name"  => "cat_font_family",
					"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
					"group"       => "Typography",
				),
				array(
					"type"       => "ultimate_google_fonts_style",
					"heading"    => __( "Font Style", "smile" ),
					"param_name" => "cat_heading_style",
					"group"      => "Typography",
				),
				array(
					"type"       => "number",
					"param_name" => "cat_font_size",
					"heading"    => __( "Font size", "imedica" ),
					"value"      => "15",
					"suffix"     => "px",
					"group"      => "Typography"
				),
				array(
					"type"       => "number",
					"param_name" => "cat_line_ht",
					"heading"    => __( "Line Height", "imedica" ),
					"value"      => "20",
					"suffix"     => "px",
					"group"      => "Typography",

				),
				array(
					"type"       => "ultimate_spacing",
					"heading"    => __( "Title margin", "imedica" ),
					"param_name" => "main_heading_margin",
					"mode"       => "margin",                    //  margin/padding
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
					"type"       => "ultimate_spacing",
					"heading"    => __( "Post Calender and Comment margin", "imedica" ),
					"param_name" => "sub_heading_margin",
					"mode"       => "margin",                    //  margin/padding
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
					"type"       => "ultimate_spacing",
					"heading"    => __( "Content margin", "imedica" ),
					"param_name" => "content_margin",
					"mode"       => "margin",                    //  margin/padding
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
					"type"        => "dropdown",
					"class"       => "",
					"heading"     => __( " Border Style", "smile" ),
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
					"description" => __( "", "smile" ),
					"group"       => "Design",
				),
				array(
					"type"        => "number",
					"class"       => "",
					"heading"     => __( "Border Width", "smile" ),
					"param_name"  => "img_border_width",
					"value"       => "",
					"suffix"      => "",
					"dependency"  => Array( "element" => "img_border_style", "not_empty" => true ),
					"description" => __( "", "smile" ),
					"group"       => "Design",
				),
				array(
					"type"        => "colorpicker",
					"class"       => "",
					"heading"     => __( "Border Color", "smile" ),
					"param_name"  => "img_border_color",
					"value"       => "",
					"dependency"  => Array( "element" => "img_border_style", "not_empty" => true ),
					"description" => __( "", "smile" ),
					"group"       => "Design",
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