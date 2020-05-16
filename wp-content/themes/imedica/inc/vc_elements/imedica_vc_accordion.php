<?php
add_action( 'vc_before_init', 'imedica_accordion_tab_init' );
function imedica_accordion_tab_init() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_accordion_tab extends WPBakeryShortCode {
		}
	}
	vc_map( array(
		'name' => __( 'iMedica Section', 'imedica' ),
		'base' => 'vc_accordion_tab',
		'allowed_container_element' => 'vc_row',
		'is_container' => true,
		'content_element' => false,
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_templates/css/imd-vc-accordion-tab-admin.css'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'imedica' ),
				'param_name' => 'title',
				'value' => __( 'Section', 'imedica' ),
				'description' => __( 'Enter accordion section title.', 'imedica' ),
			),
			array(
				'type' => 'el_id',
				'heading' => __( 'Section ID', 'imedica' ),
				'param_name' => 'el_id',
				'description' => sprintf( __( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'js_composer' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . __( 'link', 'js_composer' ) . '</a>' ),
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
			)
		),
		'js_view' => 'VcAccordionTabView',
	) );
}