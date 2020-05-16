<?php
add_action( 'vc_before_init', 'imedica_init_twitter_element' );
function imedica_init_twitter_element() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_twitter_feed extends WPBakeryShortCode {
		}
	}
	if ( function_exists( "vc_map" ) ) {
		vc_map( array(
			'name' => __('Twitter Feed', "imedica"),
			'base' => 'imedica_twitter_feed',
			'icon' => get_template_directory_uri() . "/vc_templates/images/twitter_feed.png",
			'class' => 'imd_twitter_feed',
			'category' => 'iMedica',
			'weight' => - 50,
			'description' => __( 'Display twitter timeline feed on your site.', 'imedica' ),
			'params'      => array(
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Title', 'imedica' ),
					'param_name'  => 'title',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Username', 'imedica' ),
					'param_name'  => 'username',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Consumer Key', 'imedica' ),
					'param_name'  => 'consumerkey',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Consumer Secret', 'imedica' ),
					'param_name'  => 'consumersecret',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Access Token', 'imedica' ),
					'param_name'  => 'accesstoken',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Access Token Secret', 'imedica' ),
					'param_name'  => 'accesstokensecret',
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Number of links', 'imedica' ),
					'param_name'  => 'num',
					'admin_label' => true
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Show timestamps?', 'imedica' ),
					'param_name' => 'update',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Discover hyperlinks?', 'imedica' ),
					'param_name' => 'imedica_twitter_hyperlinks',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'Discover @replies?', 'imedica' ),
					'param_name' => 'imedica_twitter_users',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'       => 'checkbox',
					'heading'    => __( 'UTF8 Encode?', 'imedica' ),
					'param_name' => 'encode_utf8',
					'value'      => array( __( 'Yes, please', 'imedica' ) => true )
				),
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'imedica' ),
					'param_name'  => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'imedica' )
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