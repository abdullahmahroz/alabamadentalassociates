<?php
add_action( 'vc_before_init', 'imedica_tabs_tab_init' );
function imedica_tabs_tab_init() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_tabs_tab extends WPBakeryShortCode {
		}
	}
	vc_map( array(
		'name' => __( 'iMedica Tab', 'imedica' ),
		'base' => 'vc_tab',
		'allowed_container_element' => 'vc_row',
		'is_container' => true,
		'content_element' => false,
		'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_elements/assets/tabs-tour.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_templates/css/imd-vc-tab-admin.css'),

		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'imedica' ),
				'param_name' => 'title',
				'description' => __( 'Enter title of tab.', 'imedica' ),
			),
			array(
				'type' => 'tab_id',
				'heading' => __( 'Tab ID', 'imedica' ),
				'param_name' => 'tab_id',
			), 
			array(
				"type"        => "icon_manager",
				"class"       => "",
				"heading"     => __( "Select Icon ", "imedica" ),
				"param_name"  => "icon",
				"value"       => "",
				"admin_label" => true,
				"description" => __( "Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='".admin_url( 'admin.php?page=bsf-font-icon-manager' )."' target='_blank'>add new here</a>.", "imedica" ),
				"group"       => "Icon",
			),
			array(
				"type"        => "colorpicker",
				"class"       => "",
				"heading"     => __( "Text and Icon Color", "imedica" ),
				"param_name"  => "text_color",
				"value"       => "#333333",
				"description" => __( "Give it a nice paint!", "imedica" ),
			),
		),
		'js_view' => 'ImedicaTabView',
	));
}