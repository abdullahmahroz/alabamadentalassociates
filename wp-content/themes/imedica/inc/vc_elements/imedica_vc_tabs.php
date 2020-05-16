<?php
//vc_remove_element( "vc_tabs" );
add_action( 'vc_before_init', 'imedica_tabs_init' );
function imedica_tabs_init() {
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_imedica_tabs extends WPBakeryShortCode {
		}
	}
	vc_map( array(
		'name' => __( 'iMedica Tabs', 'imedica' ),
		'base' => 'vc_tabs',
		'show_settings_on_create' => false,
		'is_container' => true,
		'icon' => 'icon-wpb-ui-tab-content',
		'category' => __( 'iMedica', 'imedica' ),
		'description' => __( 'Tabbed content', 'imedica' ),
		'admin_enqueue_js' => array(get_template_directory_uri().'/inc/vc_elements/assets/tabs-tour.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_templates/css/imd-vc-tabs-admin.css'),

		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'imedica' ),
				'param_name' => 'title',
				'description' => __( 'Enter text used as widget title (Note: located above content element).', 'imedica' ),
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Auto rotate', 'imedica' ),
				'param_name' => 'interval',
				'value' => array(
					__( 'Disable', 'imedica' ) => 0,
					3,
					5,
					10,
					15,
				),
				'std' => 0,
				'description' => __( 'Auto rotate tabs each X seconds.', 'imedica' ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'imedica' ),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'imedica' ),
			),
			array(
				'type' => 'css_editor',
				'heading' => __( 'CSS', 'imedica' ),
				'param_name' => 'css_wrapper',
				'edit_field_class' => 'vc_col-sm-12 vc_column no-vc-background no-vc-border creative_link_css_editor',
				"group"      => __( "Design", "imedica" ),
			),
		),
		'custom_markup' => '
	<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
	<ul class="tabs_controls">
	</ul>
	%content%
	</div>',
		'default_content' => '
	[vc_tab title="' . __( 'Tab 1', 'imedica' ) . '" tab_id=""][/vc_tab]
	[vc_tab title="' . __( 'Tab 2', 'imedica' ) . '" tab_id=""][/vc_tab]
	',
		'js_view' => 'ImedicaTabsView',
	) );
}