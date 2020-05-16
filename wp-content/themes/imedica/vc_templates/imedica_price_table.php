<?php
$title = $message = $titlecolor = $subtitle = $subtitle = $descriptioncolor = $backgroundcolor = $button_link = $pricer = $circlecolor = $main_box_padding = $style = $curr_symbol = $curr_prefix = $css_editor = '';
extract( shortcode_atts( array(
	'title'                    => '',
	'titlecolor'               => '#000000',
	'subtitle'                 => '',
	'subtitlecolor'            => '#000000',
	'descriptioncolor'         => '#000000',
	'backgroundcolor'          => '#ffffff',
	'button_link'              => '',
	'price'                    => '250',
	'circlecolor'              => '#107fc9',
	'style'                    => 'style2',
	'el_class'                 => '',
	'sub_heading_font_family'  => '',
	'sub_heading_style'        => '',
	'subtitle_font_size'       => '15',
	'subtitle_line_ht'         => '20',
	'desc_font_family'         => '',
	'subdesc_heading_style'    => '',
	'desc_font_size'           => '15',
	'desc_line_ht'             => '20',
	'main_heading_font_family' => '',
	'main_heading_style'       => '',
	'title_font_size'          => '15',
	'title_line_ht'            => '20',
	'main_heading_margin'      => '',
	'main_box_padding'         => '',
	'sub_heading_margin'       => '',
	'desc_text_align'          => '',
	'tablebordercolor'         => '',
	'circvlehovercolor'        => '#107fc9',
	'pricehovercolor'          => '#ffffff',
	'pricecolor'               => '#ffffff',
	'curr_symbol'			   => '',
	'curr_prefix'			   => 'on',
	'css_wrapper'			   => '',

), $atts ) );

/*Set defaults*/
if ($curr_symbol === '') {
	$curr_symbol = '$';
}
if ($curr_prefix === '') {
	$curr_prefix = 'on';
}

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

/* Set Default Colors */
$titlecolor 		= ( isset( $titlecolor ) && trim( $titlecolor ) != "" ) ? $titlecolor : '#000000';
$subtitlecolor 		= ( isset( $subtitlecolor ) && trim( $subtitlecolor ) != "" ) ? $subtitlecolor : '#000000';
$descriptioncolor 	= ( isset( $descriptioncolor ) && trim( $descriptioncolor ) != "" ) ? $descriptioncolor : '#000000';
$backgroundcolor 	= ( isset( $backgroundcolor ) && trim( $backgroundcolor ) != "" ) ? $backgroundcolor : '#ffffff';
$circlecolor 		= ( isset( $circlecolor ) && trim( $circlecolor ) != "" ) ? $circlecolor : '#107fc9';
$circvlehovercolor 	= ( isset( $circvlehovercolor ) && trim( $circvlehovercolor ) != "" ) ? $circvlehovercolor : '#107fc9';
$pricehovercolor 	= ( isset( $pricehovercolor ) && trim( $pricehovercolor ) != "" ) ? $pricehovercolor : '#ffffff';
$pricecolor 		= ( isset( $pricecolor ) && trim( $pricecolor ) != "" ) ? $pricecolor : '#ffffff';

$message = $content;
$href    = vc_build_link( $button_link );
$url     = $href['url'];
$target  = trim( $href['target'] );
$read    = $href['title'];
if ( $target == '' ) {
	$target = '_self';
}
if ( $style == 'style3' ) {
	$price_style = 'price-table-desc';
	$price       = '';
} elseif ( $style == 'style1' ) {
	$price_style = 'price-table-big';
} elseif ( $style == 'style2' ) {
	$price_style = 'iprice-no-right-border';
}

$margin = '';

if ( $desc_text_align == 'left' ) {
	$margin = 'padding-left:15px;';
} else if ( $desc_text_align == 'right' ) {
	$margin = 'padding-right:15px;';
} else if ( $desc_text_align == 'justify' ) {
	$margin = 'padding-left:15px;padding-right:15px;';
}

ob_start();
/*- color for circle---*/

$col     = Array(
	hexdec( substr( $circlecolor, 1, 2 ) ),
	hexdec( substr( $circlecolor, 3, 2 ) ),
	hexdec( substr( $circlecolor, 5, 2 ) )
);
$darker  = Array(
	$col[0] / 1.2,
	$col[1] / 1.2,
	$col[2] / 1.2
);
$lighter = Array(
	255 - ( 255 - $col[0] ) / 1.5,
	255 - ( 255 - $col[1] ) / 1.5,
	255 - ( 255 - $col[2] ) / 1.5
);
$darker  = "#" . sprintf( "%02X%02X%02X", $darker[0], $darker[1], $darker[2] );
$lighter = "#" . sprintf( "%02X%02X%02X", $lighter[0], $lighter[1], $lighter[2] );

/*-- circle hover color--------------*/

$hovercol     = Array(
	hexdec( substr( $circvlehovercolor, 1, 2 ) ),
	hexdec( substr( $circvlehovercolor, 3, 2 ) ),
	hexdec( substr( $circvlehovercolor, 5, 2 ) )
);

$hoverdarker  = Array(
	$hovercol[0] / 1.2,
	$hovercol[1] / 1.2,
	$hovercol[2] / 1.2
);
$hoverlighter = Array(
	255 - ( 255 - $hovercol[0] ) / 1.5,
	255 - ( 255 - $hovercol[1] ) / 1.5,
	255 - ( 255 - $hovercol[2] ) / 1.5
);

$hdarker      = "#" . sprintf( "%02X%02X%02X", $hoverdarker[0], $hoverdarker[1], $hoverdarker[2] );
$hlighter     = "#" . sprintf( "%02X%02X%02X", $hoverlighter[0], $hoverlighter[1], $hoverlighter[2] );


$main_heading_style_inline = $sub_heading_style_inline = $subdesc_heading_style_inline = '';
/*---style for main title-----*/
if ( $main_heading_font_family != '' ) {
	if ( function_exists( 'get_ultimate_font_family' ) ) {
		$mhfont_family = get_ultimate_font_family( $main_heading_font_family );//family
		$mhfont_family = ( isset( $mhfont_family ) && trim( $mhfont_family ) != "" ) ? $mhfont_family : 'inherit';
		$main_heading_style_inline .= 'font-family:' . esc_attr( $mhfont_family ) . ';';
	}

}
if ( function_exists( 'get_ultimate_font_style' ) ) {
	$main_heading_style_inline .= get_ultimate_font_style( $main_heading_style );
}
$title_font_size = ( isset( $title_font_size ) && trim( $title_font_size ) != "" ) ? $title_font_size : '15';
$title_line_ht = ( isset( $title_line_ht ) && trim( $title_line_ht ) != "" ) ? $title_line_ht : '20';

$main_heading_style_inline .= 'color:' . esc_attr( $titlecolor ) . ';';//color
$main_heading_style_inline .= 'line-height:' . esc_attr( $title_line_ht ) . 'px;';//line-height
$main_heading_style_inline .= 'font-size:' . esc_attr( $title_font_size ) . 'px;';


if ( $main_heading_margin != '' ) {
	$main_heading_style_inline .= $main_heading_margin . ';';
}

$main_heading_style_inline .= 'text-align:' . esc_attr( $desc_text_align ) . ';' . esc_attr( $margin ) . ';';//alignment

// $main_heading_style_inline;
$amargin = 'text-align:' . esc_attr( $desc_text_align ) . ';' . esc_attr( $margin ) . ';';//alignment

/*---style for desc -----*/
if ( $desc_font_family != '' ) {
	if ( function_exists( 'get_ultimate_font_family' ) ) {
		$shfont_family = get_ultimate_font_family( $desc_font_family );
		$shfont_family = ( isset( $shfont_family ) && trim( $shfont_family ) != "" ) ? $shfont_family : 'inherit';
		$subdesc_heading_style_inline .= 'font-family:' . esc_attr( $shfont_family ) . ';';

	}
}
//sub heaing font style
if ( function_exists( 'get_ultimate_font_style' ) ) {
	$subdesc_heading_style_inline .= get_ultimate_font_style( $subdesc_heading_style );
}

//attach font size if set
$desc_font_size = ( isset( $desc_font_size ) && trim( $desc_font_size ) != "" ) ? $desc_font_size : '15';
$desc_line_ht = ( isset( $desc_line_ht ) && trim( $desc_line_ht ) != "" ) ? $desc_line_ht : '20';


$subdesc_heading_style_inline .= 'font-size:' . esc_attr( $desc_font_size ) . 'px;';
$subdesc_heading_style_inline .= 'color:' . esc_attr( $descriptioncolor ) . ';';//color
$subdesc_heading_style_inline .= 'line-height:' . esc_attr( $desc_line_ht ) . 'px;';//line-height
$subdesc_heading_style_inline .= 'text-align:' . esc_attr( $desc_text_align ) . ';';//alignment

/*---style for sub -----*/
if ( $sub_heading_font_family != '' ) {
	if ( function_exists( 'get_ultimate_font_family' ) ) {
		$shfont_family = get_ultimate_font_family( $sub_heading_font_family );
		$shfont_family = ( isset( $shfont_family ) && trim( $shfont_family ) != "" ) ? $shfont_family : 'inherit';
		$sub_heading_style_inline .= 'font-family:' . esc_attr( $shfont_family ) . ';';

	}
}
//sub heaing font style
if ( function_exists( 'get_ultimate_font_style' ) ) {
	$sub_heading_style_inline .= get_ultimate_font_style( $sub_heading_style );
}

//attach font size if set
$subtitle_font_size = ( isset( $subtitle_font_size ) && trim( $subtitle_font_size ) != "" ) ? $subtitle_font_size : '15';
$subtitle_line_ht = ( isset( $subtitle_line_ht ) && trim( $subtitle_line_ht ) != "" ) ? $subtitle_line_ht : '20';

$sub_heading_style_inline .= 'font-size:' . esc_attr( $subtitle_font_size ) . 'px;';
$sub_heading_style_inline .= 'color:' . esc_attr( $subtitlecolor ) . ';';//color
$sub_heading_style_inline .= 'line-height:' . esc_attr( $subtitle_line_ht ) . 'px;';//line-height

if ( $sub_heading_margin != '' ) {
	$sub_heading_style_inline .= $sub_heading_margin . ';';
}
$sub_heading_style_inline .= 'text-align:' . esc_attr( $desc_text_align ) . ';' . esc_attr( $margin ) . ';';//alignment

$box_style = '';
if ( $main_box_padding != '' ) {
	$box_style = 'style="' . esc_attr( $main_box_padding ) . '"';
}

echo "<div class='imedicapricetabmain " . esc_attr( $el_class ) . " ". esc_attr( $css_wrapper ) ."'>
<div class='imedica_col-md-3 '>
<div class='price-table " . esc_attr( $price_style ) . "' style='" . esc_attr( $subdesc_heading_style_inline ) . ";background: none repeat scroll 0% 0% " . $backgroundcolor . ";'>";
if ( $price ) {
	echo "<div class='imd-price-wrap'>
    <div class='price-figure' style='background-color:" . esc_attr( $circlecolor ) . ";color:" . esc_attr( $pricecolor ) . "' data-circle='" . esc_attr( $circlecolor ) . "' data-circlehover='" . esc_attr( $circvlehovercolor ) . "' data-pricehover='" . esc_attr( $pricehovercolor ) . "' data-pricecolor='" . esc_attr( $pricecolor ) . "'>";
    if ( $curr_prefix != '' && $curr_prefix == 'on' ) {
    	echo esc_attr( $curr_symbol );
    	echo  esc_attr( $price );
    } else {
    	echo  esc_attr( $price );
    	echo esc_attr( $curr_symbol );
    }
    
	echo  "<div class='price-semi-circle' style='border-top: 21px solid;border-color:" . $darker . ";background: none repeat scroll 0% 0% " . $backgroundcolor . ";' data-border='" . esc_attr( $darker ) . "'  data-borderhover='" . esc_attr( $hdarker ) . "'></div>
            </div>";
} else {
	echo "<div class='imd-price-wrap'><div class='no-price'></div>";
}
echo "<div class='price-plan' " . $box_style . ">
        <div class='price-plan-title' style='" . esc_attr( $main_heading_style_inline ) . "' >" . $title . "</div>";
if ( $subtitle ) {
	echo "<div class='iprice-span' style='" . esc_attr( $sub_heading_style_inline ) . "'>" . $subtitle . "</div>";
}

echo "</div>
        </div>
       " . $content . "
         <span class='pricetable-link'><a href='" . esc_url( $url ) . "' style='background-color:" . esc_attr( $circlecolor ) . ";" . esc_attr( $amargin ) . ";color:" . esc_attr( $pricecolor ) . "' target='" . esc_attr( $target ) . "' data-circle='" . esc_attr( $circlecolor ) . "' data-circlehover='" . esc_attr( $circvlehovercolor ) . "' class='price-link'>" . esc_attr( $read ) . "</a></span>
        </div>
    </div>
    </div>";