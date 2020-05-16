<?php
$output = $title = $tab_id = $icon = $text_color = '';

extract( shortcode_atts( array(
	'title'      => '',
	'tab_id'     => '',
	'icon'       => '',
	'text_color' => '',
), $atts ) );


// @deprecated used in old tabs // @todo minify
wp_register_script( 'imd_jquery_ui_tabs_rotate', get_template_directory_uri().'/vc_templates/js/jquery-ui-tabs-rotate/jquery-ui-tabs-rotate.js', array(
		'jquery',
		'jquery-ui-tabs',
	), '', true );
wp_enqueue_script( 'imd_jquery_ui_tabs_rotate' );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_tab ui-tabs-panel wpb_ui-tabs-hide vc_clearfix', $this->settings['base'], $atts );
$output .= "\n\t\t\t" . '<div id="tab-' . ( empty( $tab_id ) ? $title : $tab_id ) . '" class="' . esc_attr( $css_class ) . '">';
$output .= ( $content == '' || $content == ' ' ) ? __( "Empty tab. Edit page to add content here.", "js_composer" ) : "\n\t\t\t\t" . function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content ) : '';
$output .= "\n\t\t\t" . '</div> ';

echo ( $output ) !== "" ? $output : '';