<?php
$imd_pr_list_content = $imd_pr_list_color = $imd_pr_list__font_size = $imd_pr_list_font = $imd_pr_list_font_style = $imd_pr_list_elem_color = $imd_pr_list_elem__font_size = $imd_pr_list_elem_font = $imd_pr_list_elem_font_style = $imd_pr_list_border_style = $imd_pr_list_border_width = $imd_pr_list_border_color = $imd_pr_list_elem_icon = $imd_pr_list_elem_font_color =
$imd_pr_list_elem_border_style = $imd_pr_list_elem_border_width = $imd_pr_list_elem_border_color = $imd_pr_list_elem_border_radius = $imd_pr_list_elem_bck_hv_color = $imd_pr_list_elem_icn_hv_color = $imd_pr_list_elem_bck_color = $imd_pr_list_elem_hv_color = $imd_pr_list_elem_icon_size = $imd_pr_list_sep_topmargin = $imd_pr_list_sep_bottommargin = $css_wrapper = '';
$el_class = '';
extract( shortcode_atts( array(
	"imd_pr_list_content"            => "",
	"imd_pr_list_color"              => "",
	"imd_pr_list__font_size"         => "15",
	"imd_pr_list_font"               => "",
	"imd_pr_list_font_style"         => "",
	"imd_pr_list_elem_color"         => "",
	"imd_pr_list_elem__font_size"    => "15",
	"imd_pr_list_elem_font"          => "",
	"imd_pr_list_elem_font_style"    => "",
	"imd_pr_list_border_style"       => "solid",
	"imd_pr_list_border_width"       => "0",
	"imd_pr_list_border_color"       => "",
	"imd_pr_list_elem_icon"          => "",
	"imd_pr_list_elem_font_color"    => "",
	"imd_pr_list_elem_border_style"  => "solid",
	"imd_pr_list_elem_border_width"  => "0",
	"imd_pr_list_elem_border_color"  => "",
	"imd_pr_list_elem_border_radius" => "15",
	"imd_pr_list_elem_icn_hv_color"  => "",
	"imd_pr_list_elem_bck_hv_color"  => "",
	"imd_pr_list_elem_bck_color"     => "",
	"imd_pr_list_elem_hv_color"      => "",
	"imd_pr_list_elem_icon_size"     => "15",
	"imd_pr_list_sep_topmargin"      => "15",
	"imd_pr_list_sep_bottommargin"   => "15",
	"main_box_padding"               => "",
	"enable_hover"                   => "",
	'el_class'  					 => "",
	'css_wrapper'					 => "",

), $atts ) );

global $imd_arr;

$imd_arr   = array();
$font_args = array();

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

$pr_list_elm_style  = '';
$pr_list_name_style = '';

if ( $imd_pr_list_elem_color ) {
	$pr_list_elm_style .= 'color:' . esc_attr( $imd_pr_list_elem_color ) . ';';
}
$imd_pr_list_elem__font_size = ( isset( $imd_pr_list_elem__font_size ) && trim( $imd_pr_list_elem__font_size ) != "" ) ? $imd_pr_list_elem__font_size : '15';
$pr_list_elm_style .= 'font-size:' . esc_attr( $imd_pr_list_elem__font_size ) . 'px;';

if ( $imd_pr_list_elem_font ) {
	$imd_pr_list_font_goog = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $imd_pr_list_elem_font ) : '';
	$pr_list_elm_style .= 'font-family:' . esc_attr( $imd_pr_list_font_goog ) . ';';
	array_push( $font_args, $imd_pr_list_font_goog );
}
if ( $imd_pr_list_font_style ) {
	$pr_list_elm_style .= function_exists( "get_ultimate_font_style" ) ? get_ultimate_font_style( $imd_pr_list_elem_font_style ) : '';
}

if ( $imd_pr_list_border_style ) {
	$pr_list_elm_style .= 'border-bottom-style:' . esc_attr( $imd_pr_list_border_style ) . ';';
}

$imd_pr_list_border_width = ( isset( $imd_pr_list_border_width ) && trim( $imd_pr_list_border_width ) != "" ) ? $imd_pr_list_border_width : '0';
$pr_list_elm_style .= 'border-bottom-width:' . esc_attr( $imd_pr_list_border_width ) . 'px;';

if ( $imd_pr_list_border_color ) {
	$pr_list_elm_style .= 'border-bottom-color:' . esc_attr( $imd_pr_list_border_color ) . ';';
}


$pr_list_icon_style = '';
if ( $imd_pr_list_elem_font_color ) {
	$pr_list_icon_style .= 'color:' . esc_attr( $imd_pr_list_elem_font_color ) . ';';
}
if ( $imd_pr_list_elem_border_style ) {
	$pr_list_icon_style .= 'border-style:' . esc_attr( $imd_pr_list_elem_border_style ) . ';';
}

$imd_pr_list_elem_border_width = ( isset( $imd_pr_list_elem_border_width ) && trim( $imd_pr_list_elem_border_width ) != "" ) ? $imd_pr_list_elem_border_width : '0';
$pr_list_icon_style .= 'border-width:' . esc_attr( $imd_pr_list_elem_border_width ) . 'px;';

if ( $imd_pr_list_elem_border_color ) {
	$pr_list_icon_style .= 'border-color:' . esc_attr( $imd_pr_list_elem_border_color ) . ';';
}
$imd_pr_list_elem_border_radius = ( isset( $imd_pr_list_elem_border_radius ) && trim( $imd_pr_list_elem_border_radius ) != "" ) ? $imd_pr_list_elem_border_radius : '15';
$pr_list_icon_style .= 'border-radius:' . esc_attr( $imd_pr_list_elem_border_radius ) . 'px;';

$pr_list_icon_size_wrp = '';

$imd_pr_list_elem_icon_size = ( isset( $imd_pr_list_elem_icon_size ) && trim( $imd_pr_list_elem_icon_size ) != "" ) ? $imd_pr_list_elem_icon_size : '15';
$pr_list_icon_size_wrp .= 'font-size:' . esc_attr( $imd_pr_list_elem_icon_size ) . 'px;';


$pr_list_title_styling = '';

$imd_pr_list_sep_topmargin = ( isset( $imd_pr_list_sep_topmargin ) && trim( $imd_pr_list_sep_topmargin ) != "" ) ? $imd_pr_list_sep_topmargin : '15';
$pr_list_title_styling .= 'padding-bottom:' . esc_attr( $imd_pr_list_sep_topmargin ) . 'px;';

$imd_pr_list_sep_bottommargin = ( isset( $imd_pr_list_sep_bottommargin ) && trim( $imd_pr_list_sep_bottommargin ) != "" ) ? $imd_pr_list_sep_bottommargin : '15';
$pr_list_title_styling .= 'margin-bottom:' . esc_attr( $imd_pr_list_sep_bottommargin ) . 'px;';



if ( $imd_pr_list_color ) {
	$pr_list_name_style .= 'color:' . esc_attr( $imd_pr_list_color ) . ';';
}
$imd_pr_list__font_size = ( isset( $imd_pr_list__font_size ) && trim( $imd_pr_list__font_size ) != "" ) ? $imd_pr_list__font_size : '15';
$pr_list_name_style .= 'font-size:' . esc_attr( $imd_pr_list__font_size ) . 'px;';

if ( $imd_pr_list_font ) {
	$imd_pr_list_font_goog = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $imd_pr_list_font ) : '';
	$pr_list_name_style .= 'font-family:\'' . esc_attr( $imd_pr_list_font_goog ) . '\';';
	array_push( $font_args, $imd_pr_list_font_goog );
}
if ( $imd_pr_list_elem_font_style ) {
	$pr_list_name_style .= function_exists( "get_ultimate_font_style" ) ? get_ultimate_font_style( $imd_pr_list_elem_font_style ) : '';
}

//enable icon hover effect

$hover_effect = '';
if ( $enable_hover != '' && $enable_hover == 'enable' ) {
	$hover_effect = 'on';
} else {
	$hover_effect = 'off';
}

do_shortcode( $content );
echo "<div class='price_list_wrap ".$el_class." ". esc_attr( $css_wrapper ) ."'>";

if ( $imd_pr_list_content ) {
	echo '<h3 class="price_list_name" style="' . esc_attr( $pr_list_name_style ) . '' . esc_attr( $pr_list_title_styling ) . '">';
	echo esc_attr( $imd_pr_list_content );
	echo '</h3>';
}

echo '<div class="imd_price_list" >';
foreach ( $imd_arr as $key => $value ) {
	echo '<div class="imd-price-list-element-wrap" style="' . esc_attr( $pr_list_elm_style ) . ';' . esc_attr( $main_box_padding ) . ';" data-hv-color="' . esc_attr( $imd_pr_list_elem_hv_color ) . '" data-color="' . esc_attr( $imd_pr_list_elem_color ) . '" data-boldhover="' . esc_attr( $hover_effect ) . '">';
	if ( $pr_list_icon_style ) {
		echo '<div class="imd-price-list-icon-wrap" style="' . esc_attr( $pr_list_icon_size_wrp ) . '" ><i style="' . esc_attr( $pr_list_icon_style ) . '" class="' . esc_attr( $imd_pr_list_elem_icon ) . ' imd-pr-list-icon" data-icn-clr="' . esc_attr( $imd_pr_list_elem_font_color ) . '" data-icn-hv-clr="' . esc_attr( $imd_pr_list_elem_icn_hv_color ) . '" data-icn-bk-clr="' . esc_attr( $imd_pr_list_elem_bck_color ) . '" data-icn-bk-hv-clr="' . esc_attr( $imd_pr_list_elem_bck_hv_color ) . '" ></i></div>';
	}
	if ( $value['elm_name'] ) {
		echo '<span class="imd-pricelist-item-name">';
		echo esc_attr( $value['elm_name'] ) . '</span>';
	}
	if ( $value['elm_price'] ) {
		echo '<span class="imd-pricelist-item-price">';
		echo esc_attr( $value['elm_price'] ) . '</span>';
	}
	echo '</div>';
}
echo '</div>';

echo '</div>';
?>