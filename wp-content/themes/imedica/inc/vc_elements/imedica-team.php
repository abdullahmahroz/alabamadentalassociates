<?php
/*
Module Name: imedica team member block for VC
Module URI: https://www.brainstormforce.com/demos/ultimate-carousel
*/
add_action( 'vc_before_init', 'init_imedica_team_member' );
add_action( "wp_enqueue_scripts", "imedica_team_member_scripts", 100 );

 // Added by Dinesh Chouhan for Social-Icon in Team style-2

function imedica_team_member_scripts() {
	wp_enqueue_script( 'ult-slick' );
	wp_enqueue_script( 'ultimate-vc-params' );
}

function init_imedica_team_member() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_team_member extends WPBakeryShortCode {
		}
	}
	if ( function_exists( "vc_map" ) ) {
		vc_map(
			array(
				"name"                    => __( "Team Member", "imedica" ),
				"base"                    => "imedica_team_member",
				"icon"                    => get_template_directory_uri() . "/vc_templates/images/team_member.png",
				"class"                   => "imd_team_member",
				"content_element"         => true,
				"controls"                => "full",
				"show_settings_on_create" => true,
				"category"                => "iMedica",
				"description"             => __( "Display your team members.", "imedica" ),
				"params"                  => array(
					// Custom Coding for new team styles
					array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => __( "Team Style", "imedica" ),
						"param_name"  => "team_member_style",
						"value"       => array(
							__( "Style-1", "imedica" )   => "style-1",
							__( "Style-2", "imedica" )  => "style-2",
						),
						"description" => __( "", "imedica" ),
						"group"       => "Team Member info",
					),
					array(
						"type"        => "ult_switch",
						"class"       => "",
						"heading"     => __( "Divider", "imedica" ),
						"param_name"  => "divider_effect",
						"value"       => "off",
						"options"     => array(
							"on" => array(
								"label" => __( "Add divider between contect & Social icons", "imedica" ),
								"on"    => "Yes",
								"off"   => "No",
							),
						),
						"description" => "",
						"dependency"  => Array( "element" => "team_member_style", "value" => "style-2" ),
						"group"       => "Team Member info",
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Divider Color", "imedica" ),
						"param_name"  => "team_member_divider_color",
						"value"       => "#107FC9",
						"description" => "",
						"group"       => "Team Member info",
						"dependency"  => Array( "element" => "divider_effect", "value" => 'on' ),
					),
					array(
						"type"        => "number",
						"class"       => "",
						"heading"     => __( "Divider width", "imedica" ),
						"param_name"  => "team_member_divider_width",
						"value"       => "50",
						"suffix"      => "%",
						"description" => "",
						"group"       => "Team Member info",
						"dependency"  => Array( "element" => "divider_effect", "value" => 'on' ),
					),
					array(
						'type' => 'text',
						'heading' => __( 'Social icons are available only for Style 2', 'js_composer' ),
						'param_name' => 'social_icon_note',
						'value' => '',
						'dependency'  => array( "element" => "team_member_style", "value" => array( "style-1" ) ),
						'group'  => __( 'Social Links', 'imedica' ),
						),
					array(
						'type' => 'param_group',
						'heading' => __( 'Social Icons', 'imedica' ),
						'param_name' => 'social_links',
						'dependency'  => array( "element" => "team_member_style", "value" => array( "style-2" ) ),
						'group'  => __( 'Social Links', 'imedica' ),
						'value' => urlencode( json_encode ( array(
																array(
																	"selected_team_icon" => "",
																	"social_title" => "",
																	"social_icon_url" => ""
																)
						) ) ),
						'params' => array(
							array(
								'type' => 'icon_manager',
								'heading' => __( 'Social Icon', 'js_composer' ),
								'param_name' => 'selected_team_icon',
								'value' => '',
								'description' => __( 'Select icon from library.', 'imedica' ),
							),
							array(
								"type" => "textfield",
								"heading" => __( "Title", "my-text-domain" ),
								"param_name" => "social_link_title",
								"value" => "",
								"description" => "",
								"admin_label" => true,
							),
							array(
								'type' => 'textfield',
								'heading' => __( 'Url', 'imedica' ),
								'param_name' => 'social_icon_url',
								'description' => "",
								'value' => '#',
							),

						),
						'callbacks' => array(
							'after_add' => 'vcChartParamAfterAddCallback'
						)
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Icon Color", "imedica" ),
						"param_name"  => "team_member_social_icon_color",
						"value"       => "#b2b2b2",
						"description" => "",
						"group"       => __( 'Social Links', 'imedica' ),
						"dependency"  => array( "element" => "team_member_style", "value" => array( "style-2" ) ),
					),
					array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => __( "Alignment Style", "imedica" ),
						"param_name"  => "team_member_align_style",
						"value"       => array(
							__( "Center", "imedica" )   => "center",
							__( "Left", "imedica" )  => "left",
							__( "Right", "imedica" )  => "right",
						),
						"description" => __( "", "imedica" ),
						"group"       => "Team Member info",
						"dependency"  => array( "element" => "team_member_style", "value" => array( "style-2" ) ),
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Background Color", "imedica" ),
						"param_name"  => "team_member_bg_color",
						"value"       => "#ffffff",
						"description" => "",
						"group"       => "Team Member info",
						"dependency"  => array( "element" => "team_member_style", "value" => array( "style-2" ) ),
					),
					// Closing fo new team styles
					array(
						"type"        => "ult_img_single",
						"heading"     => __( "Image of team member", "imedica" ),
						"param_name"  => "image",
						"description" => "",
						"group"       => "Team Member info"
					),
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
						"group"       => "Team Member info",
					),
					array(
						"type"        => "number",
						"class"       => "",
						"heading"     => __( "Image Border Width", "imedica" ),
						"param_name"  => "img_border_width",
						"value"       => "",
						"suffix"      => "",
						"dependency"  => Array( "element" => "img_border_style", "not_empty" => true ),
						"description" => __( "", "imedica" ),
						"group"       => "Team Member info",
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Image Border Color", "imedica" ),
						"param_name"  => "img_border_color",
						"value"       => "",
						"dependency"  => Array( "element" => "img_border_style", "not_empty" => true ),
						"description" => __( "", "imedica" ),
						"group"       => "Team Member info",
					),
					array(
						"type"        => "number",
						"class"       => "",
						"heading"     => __( "Image border radius", "imedica" ),
						"param_name"  => "img_border_radius",
						"value"       => "0",
						"min"         => "0",
						"max"         => "500",
						"step"        => "1",
						"suffix"      => "px",
						"description" => "",
						"dependency"  => Array( "element" => "img_border_style", "not_empty" => true ),
						"group"       => "Team Member info",
					),
					array(
						"type"        => "ult_switch",
						"class"       => "",
						"heading"     => __( "Image Hover Effect", "imedica" ),
						"param_name"  => "img_hover_eft",
						"value"       => "off",
						"options"     => array(
							"on" => array(
								"label" => __( "Hover effect for the team member image", "imedica" ),
								"on"    => "Yes",
								"off"   => "No",
							),
						),
						"description" => "",
						"dependency"  => "",
						"group"       => "Team Member info",
					),
					array(
						"type"        => "ult_switch",
						"class"       => "",
						"heading"     => __( "Custom link to staff page", "imedica" ),
						"param_name"  => "link_switch",
						"value"       => "",
						// "default_set" => 'true',
						"options"     => array(
							"on" => array(
								"label" => __( "Add custom link to employee page", "imedica" ),
								"on"    => "Yes",
								"off"   => "No",
							),
						),
						"description" => "",
						"dependency"  => "",
						"group"       => "Team Member info",
					),
					array(
						"type"        => "vc_link",
						"class"       => "",
						"heading"     => __( "Custom Link", "imedica" ),
						"param_name"  => "staff_link",
						"value"       => "",
						// "description" => __( "Add link to team member's name ", "imedica" ),
						"group"       => __( "Team Member info", "imedica" ),
						"dependency"  => Array( "element" => "link_switch", "value" => 'on' ),
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Name of team member", "imedica" ),
						"param_name"  => "name",
						"admin_label" => true,
						"description" => "",
						"group"       => "Team Member info"
					),
					array(
						"type"        => "textfield",
						"heading"     => __( "Position in organisation", "imedica" ),
						"param_name"  => "pos_in_org",
						"admin_label" => true,
						"description" => "",
						"group"       => "Team Member info"
					),
					array(
						"type"        => "textarea_html",
						"heading"     => __( "Short Description", "imedica" ),
						"param_name"  => "content",
						"description" => "",
						"group"       => "Team Member info"
					),
					array(
					"type"        => "textfield",
					"class"       => "",
					"heading"     => __( "Extra Class", "imedica" ),
					"param_name"  => "el_class",
					"value"       => "",
					"description" => __( "Add extra class name for your customizations.", "imedica" ),
					"group"       => __( "Team Member info", "imedica" ),
					),
					array(
						"type"       => "text",
						"param_name" => "title_text_typography",
						"heading"    => __( "<h2>Team Member Name typography settings</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => __( "Font Family", "imedica" ),
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"param_name" => "team_member_name_font",
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => __( "Font Style", "imedica" ),
						"param_name" => "team_member_name_font_style",
						"value"      => "",
						"group"      => "Typography"
					),
					// Responsive Param
					array(
                  	  	"type" => "ultimate_responsive", 
                  	  	"class" => "font-size",
                  	  	"heading" => __("Font size", 'imedica'),
                  	  	"param_name" => "team_member_name_font_size",
                  	  	"unit"  => "px",
                  	  	"media" => array(
                  	  	    "Desktop"           => '',
                  	  	    "Tablet"            => '',
                  	  	    "Tablet Portrait"   => '',
                  	  	    "Mobile Landscape"  => '',
                  	  	    "Mobile"            => '',
                  	  	),
                  	  	"group" => "Typography"
                  	),
					array(
						"type"       => "text",
						"param_name" => "title_text_typography",
						"heading"    => __( "<h2>Team Member position typography settings</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => __( "Font Family", "imedica" ),
						"param_name" => "team_member_position_font",
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => __( "Font Style", "imedica" ),
						"param_name" => "team_member_position_font_style",
						"value"      => "",
						"group"      => "Typography"
					),
					// Responsive Param
					array(
                  	  	"type" => "ultimate_responsive", 
                  	  	"class" => "font-size",
                  	  	"heading" => __("Font size", 'imedica'),
                  	  	"param_name" => "team_member_position_font_size",
                  	  	"unit"  => "px",
                  	  	"media" => array(
                  	  	    "Desktop"           => '',
                  	  	    "Tablet"            => '',
                  	  	    "Tablet Portrait"   => '',
                  	  	    "Mobile Landscape"  => '',
                  	  	    "Mobile"            => '',
                  	  	),
                  	  	"group" => "Typography"
                  	),
					array(
						"type"       => "text",
						"param_name" => "title_text_typography",
						"heading"    => __( "<h2>Team Member Description typography settings</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts",
						"heading"    => __( "Font Family", "imedica" ),
						"param_name" => "team_member_description_font",
						"description" => __( "Select the font of your choice. You can <a target='_blank' href='" . admin_url( 'admin.php?page=bsf-google-font-manager' ) . "'>add new in the collection here</a>.", "imedica" ),
						"value"      => "",
						"group"      => "Typography"
					),
					array(
						"type"       => "ultimate_google_fonts_style",
						"heading"    => __( "Font Style", "imedica" ),
						"param_name" => "team_member_description_font_style",
						"value"      => "",
						"group"      => "Typography"
					),
					// Responsive Param
					array(
                  	  	"type" => "ultimate_responsive", 
                  	  	"class" => "font-size",
                  	  	"heading" => __("Font size", 'imedica'),
                  	  	"param_name" => "team_member_description_font_size",
                  	  	"unit"  => "px",
                  	  	"media" => array(
                  	  	    "Desktop"           => '',
                  	  	    "Tablet"            => '',
                  	  	    "Tablet Portrait"   => '',
                  	  	    "Mobile Landscape"  => '',
                  	  	    "Mobile"            => '',
                  	  	),
                  	  	"group" => "Typography"
                  	),
					array(
						"type"       => "text",
						"param_name" => "text_colors",
						"heading"    => __( "<h2>Text Color for Team member name</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Text Colors"
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Text Color", "imedica" ),
						"param_name"  => "team_member_name_color",
						"value"       => "#107FC9",
						"description" => "",
						"group"       => "Text Colors",
					),
					array(
						"type"       => "text",
						"param_name" => "text_colors",
						"heading"    => __( "<h2>Text Color for Team member Organisation</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Text Colors"
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Text Color", "imedica" ),
						"param_name"  => "team_member_org_color",
						"value"       => "",
						"description" => "",
						"group"       => "Text Colors",
					),
					array(
						"type"       => "text",
						"param_name" => "text_colors",
						"heading"    => __( "<h2>Text Color for Team member description</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Text Colors"
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Text Color", "imedica" ),
						"param_name"  => "team_member_desc_color",
						"value"       => "",
						"description" => "",
						"group"       => "Text Colors",
					),
					array(
						"type"       => "text",
						"param_name" => "design_box",
						"heading"    => __( "<h2>Team Member border settings</h2>", "imedica" ),
						"value"      => "",
						"group"      => "Design"
					),
					array(
						"type"        => "dropdown",
						"class"       => "",
						"heading"     => __( "Border Style", "imedica" ),
						"param_name"  => "border_style",
						"value"       => array(
							__( "Solid", "imedica" )  => "solid",
							__( "Dashed", "imedica" ) => "dashed",
							__( "Dotted", "imedica" ) => "dotted",
							__( "Double", "imedica" ) => "double",
							__( "Inset", "imedica" )  => "inset",
							__( "Outset", "imedica" ) => "outset",
							__( "None", "imedica" )   => "none",
						),
						"description" => __( "", "imedica" ),
						"group"       => "Design",
					),
					array(
						"type"        => "number",
						"class"       => "",
						"heading"     => __( "Border Width", "imedica" ),
						"param_name"  => "border_width",
						"value"       => "1",
						"suffix"      => "px",
						"dependency"  => Array( "element" => "border_style", "value" => array( 'solid' , 'dashed' , 'dotted', 'double', 'inset', 'ourset' )),
						"description" => __( "", "imedica" ),
						"group"       => "Design",
					),
					array(
						"type"        => "colorpicker",
						"class"       => "",
						"heading"     => __( "Border Color", "imedica" ),
						"param_name"  => "border_color",
						"value"       => "#DCDDDE",
						"dependency"  => Array( "element" => "border_style", "value" => array( 'solid' , 'dashed' , 'dotted', 'double', 'inset', 'ourset' ) ),
						"description" => __( "", "imedica" ),
						"group"       => "Design",
					),
					array(
						"type"        => "number",
						"class"       => "",
						"heading"     => __( "border radius", "imedica" ),
						"param_name"  => "border_radius",
						"value"       => "0",
						"min"         => "0",
						"max"         => "500",
						"step"        => "1",
						"suffix"      => "px",
						"description" => "",
						"dependency"  => Array( "element" => "border_style", "value" => array( 'solid' , 'dashed' , 'dotted', 'double', 'inset', 'ourset' ) ),
						"group"       => "Design",
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
	}
} // function init_imedica_team_member
