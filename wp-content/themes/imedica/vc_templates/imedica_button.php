<?php
$outline_color_bg_hover = $outline_color_bg = $outline_color_text_hover = $outline_hover_bg = $border_size = $animation_style = $color_border = $color_icon = $color_bg = $color = $output = $button_size = $button_alignment = $animation_style = $icon_direction = $icon = $icon_link = $btn_style = $btn_link = $css_wrapper = '';
extract( shortcode_atts( array(
	'button_size'              => 'tiny',
	'animation_style'          => '',
	'icon'                     => '',
	'icon_direction'           => 'left',
	'btn_style'                => 'color',
	'btn_link'                 => '',
	'color'                    => '',
	'color_bg'                 => '',
	'color_border'             => '',
	'color_icon'               => '',
	'animation_style'          => 'no_animation',
	'border_size'              => '',
	'outline_hover_bg'         => '',
	'outline_color_bg_hover'   => '',
	'outline_color_bg'         => '',
	'outline_color_text_hover' => '',
	'button_alignment'         => 'left',
	'el_class'                 => '',
	'main_heading_font_family' => '',
	'title_font_size'          => '15',
	'title_line_ht'            => '20',
	'icon_size'                => '15',
	'main_heading_style'       => '',
	'color_icon_hover'         => '',
	'css_wrapper'			   => '',

), $atts ) );
$content       = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, false ) : ''; // fix unclosed/unwanted paragraph tags in $content
$mhfont_family = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $main_heading_font_family ) : '';// title font family
$content = strip_tags( $content );

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );


/*		Styling Variables
 *-----------------------------------------------*/
$link_style = '';
$icon_style = '';
$btn_class  = '';
$animate    = '';

/*		Data Attributes
 * 	Set default colors for hover effect 	*/
$data_bg_hover      = '';
$data_text_hover    = '';
$data_icon_color    = '';
$data_outline_hover = '';
$data_color_border  = '';


/* 			main attributes
 *------------------------------------- */
$data_outline = '';
$data_current = '';


/* 	set data attribute for Outline Hover Background Color */
if ( $outline_color_bg_hover != '' ) {
	$data_outline .= 'data-outline-color-bg-hover="' . esc_attr( $outline_color_bg_hover ) . '" ';
}
if ( $outline_color_bg != '' ) {
	$data_outline .= 'data-outline-color-bg="' . esc_attr( $outline_color_bg ) . '" ';
}
if ( $outline_color_text_hover != '' ) {
	$data_outline .= 'data-outline-color-text-hover="' . esc_attr( $outline_color_text_hover ) . '" ';
}

if ( $outline_hover_bg != '' ) {
	$data_outline_hover = $outline_hover_bg;
}


/*		Color
*-------------------------------------------------*/
if ( $color != '' ) {
	$link_style .= 'color: ' . esc_attr( $color ) . ';';

	//	Set hover color for outline
	$data_current .= 'data-current-color-text="' . esc_attr( $color ) . '" ';
}


/* 			Button Styling
 *
 * 	-	Button Style - Outline
 *-----------------------------------------------*/
if ( $btn_style == 'outline' ) {
	$btn_class = 'imedica-btn-outline';

	if ( $color_border ) {
		$link_style .= 'border-color: ' . esc_attr( $color_border ) . ';';

		//	Set hover color for Outline [data attribute]
		$data_current .= 'data-current-color-border="' . esc_attr( $color_border ) . '" ';
	}
	if ( $border_size ) {
		$link_style .= 'border-width: ' . esc_attr( $border_size ) . 'px;';
	}
	if ( $outline_color_bg ) {
		$link_style .= 'background-color: ' . esc_attr( $outline_color_bg ) . ';';
	}

} else {
	/* -	Button Style - Default
	 *-----------------------------------------------*/
	if ( $color_bg != '' ) {
		$link_style .= 'background-color: ' . esc_attr( $color_bg ) . ';';
		$link_style .= 'box-shadow: 0 2px ' . esc_attr( $color_bg ) . ';';
		$link_style .= 'border-color: ' . esc_attr( $color_bg ) . ';';
		//	Set hover color for Default [data attribute]
		$data_current .= 'data-current-color-bg="' . esc_attr( $color_bg ) . '" ';
	}
}

/* 		Button Link
*-----------------------------------------------*/
$link = $target = '';
if ( $btn_link != '' ) {
	$href = vc_build_link( $btn_link );
	$link = $href['url'];
	$target = trim( $href['target'] );
}


/* 	Check Animation */
if ( $animation_style != '' && $animation_style == "animate" ) {
	$animate = 'imedica-btn-animate';

	//	get icon direction for animation
	if ( $icon_direction != '' ) {
		$animate .= '-' . esc_attr( $icon_direction );
	}
}

/* 		Icon styling
*-----------------------------------------------*/
if ( $color_icon != '' ) {
	$icon_style .= 'color: ' . esc_attr( $color_icon ) . '; ';

	//	Set hover color for Default [data attribute]
}


/*------------ link font style------------*/
$title_font_size = ( isset( $title_font_size ) && trim( $title_font_size ) != "" ) ? $title_font_size : '15';
$title_line_ht = ( isset( $title_line_ht ) && trim( $title_line_ht ) != "" ) ? $title_line_ht : '20';
$mhfont_family = ( isset( $mhfont_family ) && trim( $mhfont_family ) != "" ) ? $mhfont_family : 'inherit';

$link_style .= 'font-size: ' . esc_attr( $title_font_size ) . 'px;';
$link_style .= 'line-height: ' . esc_attr( $title_line_ht ) . 'px;';
$link_style .= 'font-family: ' . esc_attr( $mhfont_family ) . ';';
if ( $main_heading_style != '' ) {
	$link_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $main_heading_style ) : '' . ';';
}


/*------------ icon style------------*/
$icon_size = ( isset( $icon_size ) && trim( $icon_size ) != "" ) ? $icon_size : '15';

$icon_style .= 'font-size: ' . esc_attr( $icon_size ) . 'px; ';

$output = "<div class='imedica-btn-wrapper " . esc_attr( $el_class ) . " ". esc_attr( $css_wrapper ) ." ' style='text-align:" . $button_alignment . ";'>";
$output .= "	<a ";

if ( $link !== '' ) {
	$output .= "href='" . esc_attr( $link ) . "'";  
}
if ( $target !== '' ) {
	$output .=  "target='" . esc_attr( $target ) . "'  ";
}

$output .= "class='imedica-btn " . $btn_class . " imedica-btn-" . $button_size . " " . $animate . "' style='" . $link_style . "' " . $data_outline . " " . $data_current . " >" . $icon_link . "";

//	Has icon?
if ( $icon ) {

	/* 		Icon Direction
	*-----------------------------------------------*/
	//	if direction - left
	if ( $icon_direction == 'left' ) {
		$output .= "<i style='" . esc_attr( $icon_style ) . "' class='imedica-icon " . $icon . " imedica-icon-" . $icon_direction . "' data-iconcolor='" . esc_attr( $color_icon ) . "' data-iconhovercolor='" . esc_attr( $color_icon_hover ) . "' ></i> <!-- .imedica-icon-left -->";
		$output .= $content;
	}
	//	if direction - right
	if ( $icon_direction == 'right' ) {
		$output .= $content;
		$output .= "<i style='" . $icon_style . "' class='imedica-icon " . $icon . " imedica-icon-" . $icon_direction . "' data-iconcolor='" . esc_attr( $color_icon ) . "' data-iconhovercolor='" . esc_attr( $color_icon_hover ) . "' ></i> <!-- .imedica-icon-right -->";
	}
} else {

	// if icon not select
	$output .= $content;
}
$output .= "	</a> <!-- .imedica-btn -->";
$output .= "</div> <!-- .imedica-btn-wrapper -->";

echo ( $output ) !== "" ? $output : '';

?>