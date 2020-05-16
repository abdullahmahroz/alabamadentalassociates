<?php
global $custom_colors, $theme_color, $text_color, $icon_color, $bg_color, $text_hover_color, $icon_hover_color, $icon_bg_hover_color, $text_active_color, $icon_active_color, $bg_active_color, $title_typography_heading, $title_font, $title_font_style, $title_font_size, $title_font_line_height, $imedica_opts, $css_wrapper;
$output = '';
extract( shortcode_atts( array(
	'title' => __( "Section", "js_composer" ),
	'icon'  => '',
	), $atts ) );
///// 	Styling Variables
$tab_style = $title_style = '';

// return '<pre>'. var_dump( $icon_active_color ) . '</pre>';

$body_text = $imedica_opts['body-text-color'];
$theme_color = $imedica_opts['imedica-theme-color'];
$theme_color_bg = $imedica_opts['highlight-text-color'];

//// style - tab
$font_args = array();

$font_family = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $title_font ) : '';
if ( $font_family != '' ) {
	$tab_style .= 'font-family:' . $font_family . ';';
}
array_push( $font_args, $title_font );
if ( $title_font_style != '' ) {
	$tab_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $title_font_style ) : '';
}
if ( $title_font_size != '' ) {
	$tab_style .= 'font-size:' . $title_font_size . 'px;';
}
if ( $title_font_line_height != '' ) {
	$tab_style .= 'line-height:' . $title_font_line_height . 'px;';
}


if ( $bg_color != '' ) {
	$tab_style .= 'background:' . $bg_color . ';';
	$output .= '<style id="vc_accordion_imedica">.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ultimate-accordion-title{
		background-color:'. $bg_color .'
	}';
	$output .= '</style>';
} else {
	$tab_style .= 'background:' . $theme_color_bg . ';';
	$output .= '<style id="vc_accordion_imedica">.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ultimate-accordion-title{
		background-color:'. $theme_color_bg .'
	}';
	$output .= '</style>';
}


// Set Theme Colors
if ( $custom_colors == '' || $custom_colors == 'on' ) {

	$text_color        = $body_text;
	$bg_color          = $theme_color_bg;
	$icon_color        = $theme_color_bg;
	$text_active_color = $theme_color_bg;
	$icon_active_color = $theme_color_bg;
	if ( $theme_color != '' ) {
		$icon_color          = $theme_color;
		$text_hover_color    = $theme_color;
		$icon_bg_hover_color = $theme_color;
		$bg_active_color     = $theme_color;
	}
} elseif( $custom_colors == 'off' ) {
	// return '<pre>'. var_dump( $text_color ) . '</pre>';
	// $icon_color          = $theme_color;
	// $text_hover_color    = $theme_color;
	// $icon_bg_hover_color = $theme_color;
	// $bg_active_color     = $theme_color;
	// $text_color     = $body_text;
	// $text_active_color = '#ffffff';
}
//// style - title
/**
 *
 * ALL INLINE COLORS DISABLED - Dut to set active color via js. Find custom.js
 */
if ( $text_color != '' ) {
	$title_style .= 'color:' . $text_color . ';';
} else {
	$title_style .= 'color:' . $body_text . ';';
}
$tab_icon  = $icon !== "" ? '<i class="' . esc_attr( $icon ) . ' accrdn-icon" style="color: ' . esc_attr( $icon_color ) . '" data-default="' . esc_attr( $icon_color ) . '" data-bghover="' . esc_attr( $icon_bg_hover_color ) . '" data-hover="' . esc_attr( $icon_hover_color ) . '" data-active="' . esc_attr( $icon_active_color ) . '" ></i>' : '';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_accordion_section group', $this->settings['base'], $atts );

$output .= "\n\t\t\t" . '<div class="' . esc_attr( $css_class ) . ' ultimate-accordion" data-default="' . esc_attr( $bg_color ) . '" data-active="' . esc_attr( $bg_active_color ) . '" >';

$output .= "\n\t\t\t\t" . '<h3 class="wpb_accordion_header ui-accordion-header ultimate-accordion-title" style="' . esc_attr( $tab_style ) . ' ' . esc_attr( $title_style ) . '"> ' . $tab_icon . ' <a class="ui-title" style="' . esc_attr( $title_style ) . '" data-default="' . esc_attr( $text_color ) . '" data-hover="' . esc_attr( $text_hover_color ) . '" data-active="' . esc_attr( $text_active_color ) . '" href="#' . $title . '">' . $title . '</a></h3>';

$output .= "\n\t\t\t\t" . '<div class="wpb_accordion_content ui-accordion-content ultimate-accordion-content vc_clearfix">';
$output .= ( $content == '' || $content == ' ' ) ? __( "Empty section. Edit page to add content here.", "js_composer" ) : "\n\t\t\t\t" . function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content ) : '';
$output .= "\n\t\t\t\t" . '</div>';
$output .= "\n\t\t\t" . '</div> ' . "\n";
echo ( $output ) !== "" ? $output : '';
