<?php
add_action( 'vc_before_init', 'imedica_feature_boxes' );

function imedica_feature_boxes() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_feature_boxes extends WPBakeryShortCode {
		}
	}

		if(function_exists("vc_map")){
			vc_map( array(
		    "name" => __("Feature Box","imedica"),
		    "base" => "imedica_feature_boxes",
		    "icon"  => get_template_directory_uri() . "/vc_templates/images/featured_box.png",
		    "class" => "imd_featured_box",
			"description" => __("Display features of your business.","imedica"),
			"category" => 'iMedica',
		    "params" => array(
				//General Settings
				array(
					"type"       => "textfield",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Title ", "imedica" ),
					"param_name" => "title",
					"value"      => __( "", "imedica" ),
					"group"      => __( "General Settings", "imedica" )
				),
				array(
					"type"       => "textarea_html",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Description", "imedica" ),
					"param_name" => "content",
					"value"      => "",
					"group"      => __( "General Settings", "imedica" ),
				),
				array(
					"type"       => "dropdown",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Select Style", "imedica" ),
					"param_name" => "style",
					"value"      => array(
						__( "Style1", "imedica" ) => "Style1",
						__( "Style2", "imedica" ) => "Style2",
						__( "Style3", "imedica" ) => "Style3",
						__( "Style4", "imedica" ) => "Style4",
						__( "Style5", "imedica" ) => "Style5",
					),
					"group"      => __( "General Settings", "imedica" ),
				),
				array(
					"type"       => "text",
					"heading"    => __( "<div style='font-weight: 400;color: #394986;'> <i class='fa fa-info-circle'></i> <b>Style4:</b> Content should be in &lt;ul&gt; and &lt;li&gt; format, it will be automatically converted to table format.</div>", "imedica" ),
					"param_name" => "imd-msg-note-txt",
					"group"      =>  __( "General Settings", "imedica" ),
				),
				array(
					"type" => "number",
					"class" => "",
					"heading" => __("Box Min Height", "imedica"),
					"param_name" => "box_min_height",
					"value" => "",
					"suffix" =>"px",
					"description" => __("Select Min Height for Box.", "imedica"),
					"group"      => __( "General Settings", "imedica" ),
				),
				array(
					"type"       => "number",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Border Width", "imedica" ),
					"param_name" => "border_width",
					"value"      => 1, //Default  color
					"suffix"     => "px",
					"group"      => __( "General Settings", "imedica" ),
				),
				array(
					"type"       => "ult_switch",
					"class"      => "",
					"heading"    => __( "Hover Effect", "imedica" ),
					"param_name" => "enable_hover",
					"value"      => "",
					"options"    => array(
						"enable" => array(
							"label" => __( "Enable Hover effect?", "imedica" ),
							"on"    => "Yes",
							"off"   => "No",
						)
					),
					"group"      => __( "General Settings", "imedica" ),
					"dependency" => Array( "element" => "style", "value" => array( "Style5" ) ),
				),
				array(
					"type"        => "icon_manager",
					"class"       => "",
					"heading"     => __( "Select Icon ", "imedica" ),
					"param_name"  => "icon",
					"value"       => "",
					"description" => __( "Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='".admin_url( 'admin.php?page=bsf-font-icon-manager' )."' target='_blank'>add new here</a>.", "imedica" ),
					"dependency"  => Array( "element" => "style", "value" => array( "Style1", "Style2", "Style5" ) ),
					"group"       => __( "General Settings", "imedica" ),
				),
				array(
					"type"       => "number",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Icon Size", "imedica" ),
					"param_name" => "icon_size",
					"value"      => "15",
					"suffix"     => "px",
					"group"      => __( "General Settings", "imedica" ),
					"dependency" => Array( "element" => "style", "value" => array( "Style1", "Style2", "Style5" ) ),
				),
				array(
					"type"        => "vc_link",
					"class"       => "",
					"heading"     => __( "Link ", "imedica" ),
					"param_name"  => "button_link",
					"value"       => "",
					"description" => __( "You can link or remove the existing link on the button from here.", "imedica" ),
					"group"       => __( "General Settings", "imedica" ),
				),
				array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => __( "Extra Class", "imedica" ),
					"param_name"  => "el_class",
					"value"       => "",
					"description" => __( "Add extra class name that will be applied to the icon box, and you can use this class for your customizations.", "imedica" ),
					"group"       => __( "General Settings", "imedica" ),
				),
				//Color Settings
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "bg_color_settings",
					"text"             => __( "Background", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Color Settings", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"heading"    => __( "Background color", "imedica" ),
					"param_name" => "bgcolor",
					"value"      => '#ffffff', //Default  color
					"dependency" => Array( "element" => "style", "value" => array( "Style3", "Style4", "Style5" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"       => "colorpicker",
					"heading"    => __( "Background Hover Color", "imedica" ),
					"param_name" => "back_hover_color",
					"value"      => "#ffffff",
					"dependency" => Array( "element" => "style", "value" => array( "Style3", "Style4" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "title_color_settings",
					"text"             => __( "Title", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Color Settings", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Title color", "imedica" ),
					"param_name" => "titlecolor",
					"value"      => '', //Default  color
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"       => "colorpicker",
					"heading"    => __( "Title Hover Color", "imedica" ),
					"param_name" => "titlehover_color",
					"value"      => "",
					"dependency" => Array( "element" => "style", "value" => array( "Style3", "Style4" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "description_color_settings",
					"text"             => __( "Description", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Color Settings", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"heading"    => __( "Description color", "imedica" ),
					"param_name" => "descriptioncolor",
					"value"      => '', //Default  color
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"       => "colorpicker",
					"heading"    => __( "Description Hover Color", "imedica" ),
					"param_name" => "bdescription_hover_color",
					"value"      => "",
					"dependency" => Array( "element" => "style", "value" => array( "Style3", "Style4" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "icon_color_settings",
					"text"             => __( "Icon", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Color Settings", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
				),
				array(
					"type"       => "colorpicker",
					"heading"    => __( "Icon Color", "imedica" ),
					"param_name" => "icon_color",
					"value"      => "",
					"dependency" => Array( "element" => "style", "value" => array( "Style1", "Style2", "Style5" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"heading"    => __( "Icon Background color", "imedica" ),
					"param_name" => "textcolor",
					"value"      => '', //Default  color
					"dependency" => Array( "element" => "style", "value" => array( "Style1", "Style2", "Style5" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "border_color_settings",
					"text"             => __( "Border", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Color Settings", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Border color", "imedica" ),
					"param_name" => "border_color",
					"value"      => '', //Default  color
					"dependency" => Array(
						"element" => "style",
						"value"   => array( "Style4", "Style3", "Style1", "Style2", "Style5" )
					),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Border Hover color", "imedica" ),
					"param_name" => "border_hover_color",
					"value"      => '', //Default  color
					"dependency" => Array( "element" => "style", "value" => array( "Style4", "Style3" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "button_color_settings",
					"text"             => __( "Button", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Color Settings", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Button color", "imedica" ),
					"param_name" => "buttoncolor",
					"value"      => '', //Default  color
					"group"      => __( "Color Settings", "imedica" ),
					"dependency" => Array( "element" => "style", "value" => array( "Style3", "Style4" ) ),
				),
				array(
					"type"       => "colorpicker",
					"holder"     => "",
					"class"      => "",
					"heading"    => __( "Button Hover color", "imedica" ),
					"param_name" => "button_hover_color",
					"value"      => '', //Default  color
					"dependency" => Array( "element" => "style", "value" => array( "Style3", "Style4" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"       => "colorpicker",
					"class"      => "",
					"heading"    => __( "Button Text Color", "imedica" ),
					"param_name" => "btn_title",
					"value"      => "",
					"dependency" => Array( "element" => "style", "value" => array( "Style3", "Style4" ) ),
					"group"      => __( "Color Settings", "imedica" ),

				),
				array(
					"type"       => "colorpicker",
					"class"      => "",
					"heading"    => __( "Button Text Hover Color", "imedica" ),
					"param_name" => "btn_title_hover_color",
					"value"      => "",
					"dependency" => Array( "element" => "style", "value" => array( "Style3", "Style4" ) ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "fold_color_settings",
					"text"             => __( "Fold", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Color Settings", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
				),
				array(
					"type"       => "colorpicker",
					"param_name" => "fold_bg_color",
					"heading"    => __( "Fold Background Color", "imedica" ),
					"group"      => __( "Color Settings", "imedica" ),
				),
				//Typography
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "main_title_typograpy",
					"text"             => __( "Title Settings", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Typography", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
				),
				array(
					"type"        => "ultimate_google_fonts",
					"heading"     => __( "Title Font Family", "imedica" ),
					"param_name"  => "main_heading_font_family",
					"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
					"group"       => __( "Typography", "imedica" ),
				),
				array(
					"type"       => "ultimate_google_fonts_style",
					"heading"    => __( "Font Style", "imedica" ),
					"param_name" => "main_heading_style",
					"group"      => __( "Typography", "imedica" ),
				),
				array(
					"type"       => "number",
					"param_name" => "title_font_size",
					"heading"    => __( "Title Font size", "imedica" ),
					"value"      => "15",
					"suffix"     => "px",
					"group"      => __( "Typography", "imedica" ),
				),
				array(
					"type"       => "number",
					"param_name" => "title_line_ht",
					"heading"    => __( "Title Line Height", "imedica" ),
					"value"      => "20",
					"suffix"     => "px",
					"group"      => __( "Typography", "imedica" ),
				),
				array(
					"type"             => "ult_param_heading",
					"param_name"       => "main_desc_typograpy",
					"text"             => __( "Description Settings", "ultimate" ),
					"value"            => "",
					"class"            => "",
					"group"            => __( "Typography", "imedica" ),
					'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
				),
				array(
					"type"        => "ultimate_google_fonts",
					"heading"     => __( " Font Family", "imedica" ),
					"param_name"  => "desc_font_family",
					"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
					"group"       => __( "Typography", "imedica" ),
				),
				array(
					"type"       => "ultimate_google_fonts_style",
					"heading"    => __( "Font Style", "imedica" ),
					"param_name" => "sub_heading_style",
					"group"      => __( "Typography", "imedica" ),
				),
				array(
					"type"       => "number",
					"param_name" => "desc_font_size",
					"heading"    => __( "Font size", "imedica" ),
					"value"      => "15",
					"suffix"     => "px",
					"group"      => __( "Typography", "imedica" ),
				),
				array(
					"type"       => "number",
					"param_name" => "desc_line_ht",
					"heading"    => __( "Line Height", "imedica" ),
					"value"      => "20",
					"suffix"     => "px",
					"group"      => __( "Typography", "imedica" ),
				),
				array(
					"type"       => "text",
					"heading"    => __( "<h4>Enter values with respective unites. Example - 10px, 10em, 10%, etc.</h4>", "imedica" ),
					"param_name" => "margin_design_tab_text",
					"group"      => __( "Design", "imedica" ),
				),
				array(
					"type"       => "ultimate_margins",
					"heading"    => "Description Margins",
					"param_name" => "main_heading_margin",
					"positions"  => array(
						__( "Top", "imedica" )    => "top",
						__( "Bottom", "imedica" ) => "bottom"
					),
					"dependency" => Array(
						"element" => "style",
						"value"   => array( "Style1", "Style2", "Style3", "Style4" )
					),
					"group"      => __( "Design", "imedica" ),
				),
				array(
					"type"       => "ultimate_margins",
					"heading"    => __( "Sub Heading Margins", "imedica" ),
					"param_name" => "sub_heading_margin",
					"positions"  => array(
						__( "Top", "imedica" )    => "top",
						__( "Bottom", "imedica" ) => "bottom"
					),
					"dependency" => Array(
						"element" => "style",
						"value"   => array( "Style1", "Style2", "Style3", "Style4" )
					),
					"group"      => __( "Design", "imedica" ),
				),
				array(
					"type"       => "ultimate_margins",
					"heading"    => __( "Block Margins", "imedica" ),
					"param_name" => "block_margin_style5",
					"positions"  => array(
						__( "Top", "imedica" )    => "top",
						__( "Bottom", "imedica" ) => "bottom"
					),
					"dependency" => Array( "element" => "style", "value" => "Style5" ),
					"group"      => __( "Design", "imedica" ),
				),
				array(
					"type"       => "ultimate_margins",
					"heading"    => "Title Margins",
					"param_name" => "title_margin_style5",
					"positions"  => array(
						__( "Top", "imedica" )    => "top",
						__( "Bottom", "imedica" ) => "bottom"
					),
					"dependency" => Array( "element" => "style", "value" => "Style5" ),
					"group"      => __( "Design", "imedica" ),
				),
				array(
					"type"       => "text",
					"heading"    => __( "<h4>Element wrapper design opions</h4>", "imedica" ),
					"param_name" => "margin_design_tab_text",
					"group"      => __( "Design", "imedica" ),
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