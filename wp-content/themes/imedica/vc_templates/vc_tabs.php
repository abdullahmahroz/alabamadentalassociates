<?php
$output = $title = $interval = $el_class = $css_wrapper = '';
extract( shortcode_atts( array(
	'title'                  => '',
	'interval'               => 0,
	'el_class'               => '',
	'icon_font_size'         => '',
	'icon_bg_color'          => '',
	'icon_bg_hover_color'    => '',
	'icon_color'             => '',
	'icon_hover_color'       => '',
	'title_font'             => '',
	'title_font_style'       => '',
	'title_font_size'        => '',
	'title_font_line_height' => '',
	'title_color'            => '',//'#8c99a9',
	'text_hover_color'       => '',//'#107fc9',
	'vctour_value'			 => '',
	'title_class'			 => '',
	'css_wrapper'			 => '',
), $atts ) );
$tour = $title_color;
wp_enqueue_script( 'jquery-ui-tabs' );

$el_class = $this->getExtraClass( $el_class );

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

$element = 'wpb_tabs';
if ( 'vc_tour' == $this->shortcode ) {
	$element = 'wpb_tour';
}

// Extract tab titles
preg_match_all( '/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
$tab_titles = array();
/**
 * vc_tabs
 *
 */
if ( isset( $matches[1] ) ) {
	$tab_titles = $matches[1];
}

/*----style for tour title --*/

$style_link = '';
$style_link .= 'color:' . $title_color . ';';
$style_link .= 'font-size:' . $title_font_size . 'px;';
if ( function_exists( 'get_ultimate_font_family' ) ) {
	$mhfont_family = get_ultimate_font_family( $title_font );//family
	if ( $mhfont_family ) {
		$style_link .= 'font-family:' . $mhfont_family . ';';
	}
}
//main heaing font style
if ( function_exists( 'get_ultimate_font_style' ) ) {
	$style_link .= get_ultimate_font_style( $title_font_style ) . ';';
}
//$style_link;

/*--for icon-----*/
$icon_style = '';
$icon_style .= 'color:' . $icon_color . ';';
$icon_style .= 'font-size:' . $icon_font_size . 'px;';

$tabs_nav    = '';
$tabs_nav .= '<ul class="wpb_tabs_nav ui-tabs-nav vc_clearfix">';
foreach ( $tab_titles as $tab ) {
	$tab_atts = shortcode_parse_atts( $tab[0] );
	$tab_icon = isset( $tab_atts['icon'] ) && $tab_atts['icon'] !== "none" ? '<i class="' . esc_attr( $tab_atts['icon'] ) . ' tabs-icon tour_icon" style="' . $icon_style . '" data-iconcolor="' . esc_attr( $icon_color ) . '" data-iconhovercolor="' . esc_attr( $icon_hover_color ) . '" data-background="' . esc_attr( $icon_bg_hover_color ) . '" ></i>' : '';
	if ( $tab_icon == '' ) {
		// $title_class = 'tour_ext_class';
	}
	if ( isset( $tab_atts['title'] ) ) {
		$tabs_nav .= '<li id="imd_mainlink" class="imd_tour_link"><a style="' . esc_attr( $style_link ) . '" href="#tab-' . ( isset( $tab_atts['tab_id'] ) ? $tab_atts['tab_id'] : $tab_atts['title'] ) . '"  class="ultimate_tour" >' . $tab_icon . ' <span class="imd_link ' . esc_attr( $title_class ) . '" data-color="' . esc_attr( $title_color ) . '" data-titlehovercolor="' . esc_attr( $text_hover_color ) . '" >' . $tab_atts['title'] . '</span></a></li>';
	}
}
$tabs_nav .= '</ul>' . "\n";

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, trim( $element . ' wpb_content_element imd_tour' . $el_class .' ' .$css_wrapper ), $this->settings['base'], $atts );

$output .= "\n\t" . '<div class="' . esc_attr( $css_class ) . '" data-interval="' . esc_attr( $interval ) . '">';
$output .= "\n\t\t" . '<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs vc_clearfix">';
$output .= wpb_widget_title( array( 'title' => $title, 'extraclass' => $element . '_heading' ) );
$output .= "\n\t\t\t" . $tabs_nav;
$output .= "\n\t\t\t" . function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content ) : '';
$output .= "\n\t\t" . '</div> ';
$output .= "\n\t" . '</div> ';



echo ( $output ) !== "" ? $output : '';