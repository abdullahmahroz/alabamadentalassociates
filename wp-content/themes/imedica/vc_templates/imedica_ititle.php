<?php
$el_class = '';
extract( shortcode_atts( array(
	'title'                  => '',
	'add_icon'               => 'on',
	'icon'                   => '',
	'icon_size'              => '',
	'icon_line_height'       => '',
	'icon_direction'         => 'left',
	'ititle_padding'         => '',
	'title_font'             => '',
	'title_font_style'       => '',
	'title_font_size'        => '',
	'title_font_line_height' => '',
	'title_font_color'       => '',
	'icon_color'             => '',
	'bg_color'               => '',
	'ititle_bg_color'        => '',
	'fold_light_color'       => '',
	'el_class'				 => '',
	'css_wrapper'			 => '',
), $atts ) );
$content = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, true ) : ''; // fix unclosed/unwanted paragraph tags in $content
/**
 *            Styling variables
 *-------------------------------------------*/

if ( $ititle_bg_color != '' ) {
	$bg_color = $ititle_bg_color;
}

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

$block_style = '';
$title_style = '';
$icon_style  = '';
$font_args   = array();
// 		Title Styling
if ( $title_font != '' ) {
	$font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $title_font ) : '';
	$title_style .= 'font-family:' . esc_attr( $font_family ) . ';';
	array_push( $font_args, $title_font );
}
if ( $title_font_style != '' ) {
	$title_style .= function_exists( "get_ultimate_font_style" ) ? get_ultimate_font_style( $title_font_style ) : '';
}
if ( $title_font_size != '' ) {
	$title_style .= 'font-size:' . esc_attr( $title_font_size ) . 'px;';
}
if ( $title_font_line_height != '' ) {
	$title_style .= 'line-height:' . esc_attr( $title_font_line_height ) . 'px;';
}
if ( $title_font_color != '' ) {
	$title_style .= 'color:' . esc_attr( $title_font_color ) . ';';
}

// padding
if ( $ititle_padding != '' ) {
	$block_style .= $ititle_padding;
}
if ( $bg_color != '' ) {
	$block_style .= 'background-color:' . esc_attr( $bg_color ) . ';';
}
/*
 *	 =Icon
 *------------------------------*/
//	color
if ( $icon_color != '' ) {
	$icon_style .= 'color:' . esc_attr( $icon_color ) . ';';
}
if ( $icon_size != '' ) {
	$icon_style .= 'font-size:' . esc_attr( $icon_size ) . 'px;';
}
if ( $icon_line_height != '' ) {
	$icon_style .= 'line-height:' . esc_attr( $icon_line_height ) . 'px;';
}
if ( $bg_color != '' ) {
	$darker = apply_filters( 'imedica_get_darken', $bg_color );
}
//	fold colors
if ( $bg_color != '' ) {
	$block_style .= 'border-top-color:' . esc_attr( $darker ) . ';';
}
if ( $fold_light_color != '' ) {
	$block_style .= 'border-right-color:' . esc_attr( $fold_light_color ) . ';';
}
echo '<div class="imedica-ititle-wrapper '.$el_class.' '. esc_attr( $css_wrapper ) .' ">
		    <div class="imedica-ititle ititle-foldMe dir-' . esc_attr( $icon_direction ) . '" style="' . esc_attr( $block_style ) . '">';
if ( $add_icon != '' && $add_icon == 'on' ) {
	echo '<div class="imedica-ititle-icon" style="' . esc_attr( $icon_style ) . '">
		  			<i class="' . esc_attr( $icon ) . '"></i>
		      	</div>';
}
echo '<div class="imedica-ititle-title" style="' . esc_attr( $title_style ) . '">' . esc_html( $title ) . '</div>
		    </div>
		</div>';
?>