<?php
global $custom_colors, $theme_color, $text_color, $icon_color, $bg_color, $text_hover_color, $icon_hover_color, $icon_bg_hover_color, $text_active_color, $icon_active_color, $bg_active_color, $title_typography_heading, $title_font, $title_font_style, $title_font_size, $title_font_line_height, $css_wrapper;
wp_enqueue_script( 'jquery-ui-accordion' );
$output = $title = $interval = $el_class = $collapsible = $active_tab = '';
//
extract( shortcode_atts( array(
	'title'                    => '',
	'interval'                 => 0,
	'el_class'                 => '',
	'collapsible'              => 'no',
	'active_tab'               => '1',
	'custom_colors'            => 'on',
	'theme_color'              => '',
	'text_color'               => '',
	'icon_color'               => '',
	'bg_color'                 => '',
	'text_hover_color'         => '',
	'icon_hover_color'         => '',
	'icon_bg_hover_color'      => '',
	'text_active_color'        => '',
	'icon_active_color'        => '',
	'bg_active_color'          => '',
	'title_typography_heading' => '',
	'title_font'               => '',
	'title_font_style'         => '',
	'title_font_size'          => '',
	'title_font_line_height'   => '',
	'css_wrapper'			   => '',
), $atts ) );
$el_class  = $this->getExtraClass( $el_class );
$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );


$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_accordion wpb_content_element ' . esc_attr( $el_class ) . ' not-column-inherit ' . $css_wrapper, $this->settings['base'], $atts );
$output .= "\n\t" . '<div class="' . esc_attr( $css_class ) . '" data-collapsible="' . esc_attr( $collapsible ) . '" data-active-tab="' . esc_attr( $active_tab ) . '">'; //data-interval="'.$interval.'"
$output .= "\n\t\t" . '<div class="wpb_wrapper wpb_accordion_wrapper ui-accordion">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_accordion_heading' ) );
$output .= "\n\t\t\t" . function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content ) : '';
$output .= "\n\t\t" . '</div> ';
$output .= "\n\t" . '</div> ';
echo ( $output ) !== "" ? $output : '';