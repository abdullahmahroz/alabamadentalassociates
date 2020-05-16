<?php
global $img_style, $auth_name_font_styling, $author_bio_font_styling, $testimonial_desc_font_styling, $layout_style, $desc_line_height, $author_bio_line_height, $auth_name_line_height, $testimonial_layout_style, $testimonial_spacer_styling, $testimonial_spacer, $css_wrapper;// $testiblock_wrapper_borders_style;
$img_border_style = $img_border_width = $img_border_color = $img_border_radius = $image_width = '';
$auth_name_font   = $auth_name_font_style = $auth_name_font_size = $auth_name_font_color = $author_bio_font =
$author_bio_font_style = $author_bio_font_size = $author_bio_font_color = $desc_font = $desc_font_style = $desc_font_size = $desc_font_font_color = '';
$layout_style     = $testiblock_wrap_border_style = $testiblock_wrap_border_width = $testiblock_wrap_border_color = $desc_line_height = $author_bio_line_height = $auth_name_line_height = $testimonial_layout_style = '';

$testimonial_spacer = $testimonial_line_style = $testimonial_line_width = $testimonial_line_height  = $testimonial_line_color = $testimonial_spacer_img = $testimonial_spacer_img_width = $css_wrapper = '';

extract( shortcode_atts( array(
    "img_border_color"             => "",
    "img_border_style"             => "",
    "img_border_width"             => "0",
    "img_border_radius"            => "2",
    "image_width"                  => "100",
    "auth_name_font"               => "",
    "auth_name_font_style"         => "",
    "auth_name_font_size"          => "15",
    "auth_name_font_color"         => "",
    "author_bio_font"              => "",
    "author_bio_font_style"        => "",
    "author_bio_font_size"         => "",
    "author_bio_font_color"        => "",
    "desc_font"                    => "",
    "desc_font_style"              => "",
    "desc_font_size"               => "",
    "desc_font_font_color"         => "",
    "layout_style"                 => "layout1",
    "testimonial_layout_style"     => "style1",
    "testiblock_wrap_border_style" => "",
    "testiblock_wrap_border_width" => "",
    "testiblock_wrap_border_color" => "",
    "desc_line_height"             => "",
    "author_bio_line_height"       => "",
    "auth_name_line_height"        => "20",

    "testimonial_spacer"           => "",
    "testimonial_line_style"       => "",
    "testimonial_line_width"       => "100",
    "testimonial_line_height"      => "1",
    "testimonial_line_color"       => "",
    "testimonial_spacer_img"       => "",
    "testimonial_spacer_img_width" => "48",
    "css_wrapper"                  => ""

), $atts ) );
$img_style = '';

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

$testimonial_spacer             = ( isset( $testimonial_spacer ) && trim( $testimonial_spacer ) !== '' ) ? $testimonial_spacer : 'no_spacer';
$testimonial_line_style         = ( isset( $testimonial_line_style ) && trim( $testimonial_line_style ) !== '' ) ? $testimonial_line_style : 'solid';
$testimonial_line_width         = ( isset( $testimonial_line_width ) && trim( $testimonial_line_width ) !== '' ) ? $testimonial_line_width : '100';
$testimonial_line_height        = ( isset( $testimonial_line_height ) && trim( $testimonial_line_height ) !== '' ) ? $testimonial_line_height : '1';
$testimonial_line_color         = ( isset( $testimonial_line_color ) && trim( $testimonial_line_color ) !== '' ) ? $testimonial_line_color : 'inherit';
$testimonial_spacer_img_width   = ( isset( $testimonial_spacer_img_width ) && trim( $testimonial_spacer_img_width ) !== '' ) ? $testimonial_spacer_img_width : '50';
$testimonial_spacer_img         = ( isset( $testimonial_spacer_img ) && trim( $testimonial_spacer_img ) !== '' ) ? $testimonial_spacer_img : '';
$testimonial_spacer_styling     = '';

if ( $testimonial_spacer == "line_only" ) {
    
    $testimonial_spacer_styling .= 'border-bottom-style:'. $testimonial_line_style .'; ';
    $testimonial_spacer_styling .= 'border-bottom-width:'. $testimonial_line_height .'px; ';
    $testimonial_spacer_styling .= 'border-bottom-color:'. $testimonial_line_color .'; ';
    $testimonial_spacer_styling .= 'width:'. $testimonial_line_width .'%; ';
}
elseif ( $testimonial_spacer == "image_only") {
    
    if ( trim( $testimonial_spacer_img ) != '' ) {
        $testimonial_spacer_img = apply_filters('ult_get_img_single', $image, 'url');
        $alt = apply_filters('ult_get_img_single', $image, 'alt');

        $testimonial_spacer_styling .= '<img src="'. $testimonial_spacer_img .'" class="ult-testiblock-divider" alt="' .$alt. '" style="width:'. $testimonial_spacer_img_width .'px">';
    }
    else {
        $testimonial_spacer_styling .= '';
    }
}

//$testimonial_layout_style = ( isset( $testimonial_layout_style  && trim( $testimonial_layout_style ) !== "" ) ) ? $testimonial_layout_style : 'style1';
if ( ! $img_border_style == "" ) {
    if ( ! $img_border_style == '' ) {
        $img_style .= 'border-style:' . $img_border_style . ';';
    }
    if ( ! $img_border_color == '' ) {
        $img_style .= 'border-color:' . $img_border_color . ';';
    }
    if ( ! $img_border_radius == '' ) {
        $img_style .= 'border-radius:' . $img_border_radius . 'px;';
    }
    if ( ! $img_border_width == '' ) {
        $img_style .= 'border-width:' . $img_border_width . 'px;';
    }
}
if ( ! $image_width == '' ) {
    $img_style .= 'width:' . $image_width . 'px;';
}
$font_args              = array();
$auth_name_font_styling = '';
if ( ! $auth_name_font == '' ) {
    $auth_font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $auth_name_font ) : '';
    $auth_name_font_styling .= 'font-family:' . $auth_font_family . ';';
    array_push( $font_args, $auth_name_font );
}
if ( ! $auth_name_font_style == '' ) {
    $auth_name_font_styling .= $auth_name_font_style . ';';
}
if ( ! $auth_name_font_size == '' ) {
    $auth_name_font_styling .= 'font-size:' . $auth_name_font_size . 'px;';
}
if ( ! $auth_name_font_color == '' ) {
    $auth_name_font_styling .= 'color:' . $auth_name_font_color . ';';
}
if ( ! $auth_name_line_height == '' ) {
    $auth_name_font_styling .= 'line-height:' . $auth_name_line_height . 'px;';
}
$author_bio_font_styling = '';
if ( ! $author_bio_font == '' ) {
    $auth_bio_font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $author_bio_font ) : '';
    $author_bio_font_styling .= 'font-family:' . $auth_bio_font_family . ';';
    array_push( $font_args, $author_bio_font );
}
if ( ! $author_bio_font_style == '' ) {
    $author_bio_font_styling .= $author_bio_font_style . ';';
}
if ( ! $author_bio_font_size == '' ) {
    $author_bio_font_styling .= 'font-size:' . $author_bio_font_size . 'px;';
}
if ( ! $author_bio_font_color == '' ) {
    $author_bio_font_styling .= 'color:' . $author_bio_font_color . ';';
}
if ( ! $author_bio_line_height == '' ) {
    $author_bio_font_styling .= 'line-height:' . $author_bio_line_height . 'px;';
}
$testimonial_desc_font_styling = '';
if ( ! $desc_font == '' ) {
    $test_desc_font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $desc_font ) : '';
    $testimonial_desc_font_styling .= 'font-family:' . $test_desc_font_family . ';';
    array_push( $font_args, $desc_font );
}

if ( ! $desc_font_style == '' ) {
    $testimonial_desc_font_styling .= $desc_font_style . ';';
}
if ( ! $desc_font_size == '' ) {
    $testimonial_desc_font_styling .= 'font-size:' . $desc_font_size . 'px;';
}
if ( ! $desc_font_font_color == '' ) {
    $testimonial_desc_font_styling .= 'color:' . $desc_font_font_color . ';';
}
if ( ! $desc_line_height == '' ) {
    $testimonial_desc_font_styling .= 'line-height:' . $desc_line_height . 'px;';
}

ob_start();
echo do_shortcode( $content );

echo ob_get_clean();