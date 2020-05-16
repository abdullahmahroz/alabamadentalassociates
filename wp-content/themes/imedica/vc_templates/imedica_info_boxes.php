<?php
$title = $message = $textcolor = $title_font_size = $desc_font_size = $icon_type = $icon = $icon_color = $color1 = $bgcolor = $button_link = $titlecolor = $descriptioncolor = $titlehovercolor = $style = $description_hover_color = $back_hover_color = $output = $icon_color_bg_hover = $icon_color_hover = '';
$main_heading_style_inline = $sub_heading_style_inline =  $default_border_color = $css_wrapper = '';

extract( shortcode_atts( array(
	'title'                    => '',
	'textcolor'                => '',
	// 'title_font_size'          => '15',
	'icon_type'                => '',
	'icon_size'                => '25',
	'icon'                     => '',
	'icon_color'               => '',
	'icon_color_hover'         => '',
	'icon_color_bg_hover'      => '',
	'color1'                   => '',
	'fold_effect'              => 'on',
	'bgcolor'                  => '#e7e7e7',
	'button_link'              => '',
	'titlecolor'               => '#000000',
	'descriptioncolor'         => '#000000',
	'titlehovercolor'          => '#000000',
	'style'                    => 'Style1',
	'box_min_height'           => '',
	'description_hover_color'  => '#000000',
	'back_hover_color'         => '#f9f9f9',
	'main_heading_font_family' => '',
	'title_font_size'          => '15',
	'main_heading_style'       => '',
	'title_line_ht'            => '20',
	'desc_font_family'         => '',
	'desc_font_size'           => '15',
	'sub_heading_style'        => '',
	'desc_line_ht'             => '20',
	'el_class'                 => '',
	'main_heading_margin'      => '',
	'sub_heading_margin'       => '',
	'main_heading_border'      => '',
	'border_hover'             => '',
	'css_editor'			   => '',
	'css_wrapper'			   => '',
	), $atts ) );

/*----container border------*/

$bordercolor = $bordercolor1 = '';
if ( $main_heading_border != '' ) {
	$main_heading_border = str_replace( "|", " ", $main_heading_border );
	$bordercolor1        = ( explode( "|", $main_heading_border ) );
	$bordercolor1        = end( $bordercolor1 );
	$bordercolor         = ( explode( ":", $bordercolor1 ) );
	$bordercolor         = $bordercolor1;
	$bordercolor         = str_replace( ";", ",", $bordercolor );
} else {
	$main_heading_border = 'border-style:none;';
}

$skuList = explode(';', $main_heading_border);

if ( $default_border_color ) {
	if ( array_key_exists( '2' , $skuList ) ) {
		$default_border_color =  explode( "#", $skuList[2] );
		$default_border_color = trim( '#'.$default_border_color[1] );
	}
}

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

$href    = vc_build_link( $button_link );
$url     = $href['url'];
$target  = trim( $href['target'] );
$read    = $href['title'];
$col     = Array(
	hexdec( substr( $color1, 1, 2 ) ),
	hexdec( substr( $color1, 3, 2 ) ),
	hexdec( substr( $color1, 5, 2 ) )
	);
$darker  = Array(
	$col[0] / 1.2,
	$col[1] / 1.2,
	$col[2] / 1.2
	);
$lighter = Array(
	255 - ( 255 - $col[0] ) / 1.14,
	255 - ( 255 - $col[1] ) / 1.14,
	255 - ( 255 - $col[2] ) / 1.14
	);
$darker  = "#" . sprintf( "%02X%02X%02X", $darker[0], $darker[1], $darker[2] );
$lighter = "#" . sprintf( "%02X%02X%02X", $lighter[0], $lighter[1], $lighter[2] );

$colnew   = Array(
	hexdec( substr( $titlehovercolor, 1, 2 ) ),
	hexdec( substr( $titlehovercolor, 3, 2 ) ),
	hexdec( substr( $titlehovercolor, 5, 2 ) )
	);
$darker1  = Array(
	$colnew[0] / 1.2,
	$colnew[1] / 1.2,
	$colnew[2] / 1.2
	);
$lighter1 = Array(
	255 - ( 255 - $colnew[0] ) / 1.85,
	255 - ( 255 - $colnew[1] ) / 1.85,
	255 - ( 255 - $colnew[2] ) / 1.85
	);

$icon_size 			= ( isset( $icon_size ) && $icon_size != "" ) ? $icon_size : '25';
$titlecolor 		= ( isset( $titlecolor ) && $titlecolor != "" ) ? $titlecolor : '#000000';
$descriptioncolor 	= ( isset( $descriptioncolor ) && $descriptioncolor != "" ) ? $descriptioncolor : '#000000';
$titlehovercolor 	= ( isset( $titlehovercolor ) && $titlehovercolor != "" ) ? $titlehovercolor : '#000000';
$description_hover_color = ( isset( $description_hover_color ) && $description_hover_color != "" ) ? $description_hover_color : '#000000';
$back_hover_color 	= ( isset( $back_hover_color ) && $back_hover_color != "" ) ? $back_hover_color : '#f9f9f9';
$bgcolor 	= ( isset( $bgcolor ) && $bgcolor != "" ) ? $bgcolor : '#e7e7e7';

$size           = $icon_size;
$iconlineheight = $icon_size * 2;

$darker1  = "#" . sprintf( "%02X%02X%02X", $darker[0], $darker[1], $darker[2] );
$lighter1 = "#" . sprintf( "%02X%02X%02X", $lighter[0], $lighter[1], $lighter[2] );

$bacground = "background: -webkit-gradient(linear,  left top,  left bottom,  color-stop(0,  " . $lighter . "),  color-stop(50%,  " . $lighter . "),  color-stop(51%,  " . $color1 . "),  color-stop(100%,  " . $color1 . " ));
background: -webkit-linear-gradient(top, " . $lighter . " 0, " . $lighter . " 50%, " . $color1 . " 51%, " . $color1 . " 100%);
background: -moz-linear-gradient(top, " . $lighter . " 0, " . $lighter . " 50%, " . $color1 . " 51%, " . $color1 . " 100%);
background: -ms-linear-gradient(top, " . $lighter . " 0, " . $lighter . " 50%, " . $color1 . " 51%, " . $color1 . " 100%);
background: -o-linear-gradient(top, " . $lighter . " 0, " . $lighter . " 50%, " . $color1 . " 51%, " . $color1 . " 100%);
background: linear-gradient(top, " . $lighter . " 0, " . $lighter . " 50%, " . $color1 . " 51%, " . $color1 . " 100%);";

$bacgroundnew = "    background: -webkit-gradient(linear,  left top,  left bottom,  color-stop(0,  " . $lighter1 . "),  color-stop(50%, " . $lighter1 . "),  color-stop(51%,  " . $titlehovercolor . "),  color-stop(100%,  " . $titlehovercolor . " ));
background: -webkit-linear-gradient(top, " . $lighter1 . " 0, " . $lighter1 . " 50%, " . $titlehovercolor . " 51%, " . $titlehovercolor . " 100%);
background: -moz-linear-gradient(top, " . $lighter1 . " 0, " . $lighter1 . " 50%, " . $titlehovercolor . " 51%, " . $titlehovercolor . " 100%);
background: -ms-linear-gradient(top, " . $lighter1 . " 0, " . $lighter1 . " 50%, " . $titlehovercolor . " 51%, " . $titlehovercolor . " 100%);
background: -o-linear-gradient(top, " . $lighter1 . " 0, " . $lighter1 . " 50%, " . $titlehovercolor . " 51%, " . $titlehovercolor . " 100%);
background: linear-gradient(top, " . $lighter1 . " 0, " . $lighter1 . " 50%, " . $titlehovercolor . " 51%, " . $titlehovercolor . " 100%);
";

/*---style for main title-----*/
if ( $main_heading_font_family != '' ) {
	$mhfont_family = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $main_heading_font_family ) : '';//family
	$mhfont_family = ( isset( $mhfont_family ) && $mhfont_family != "" ) ? $mhfont_family : 'inherit';
	$main_heading_style_inline .= 'font-family:' . $mhfont_family . ';';
}

$title_line_ht = ( isset( $title_line_ht ) && $title_line_ht != "" ) ? $title_line_ht : '20';
$title_font_size = ( isset( $title_font_size ) && $title_font_size != "" ) ? $title_font_size : '15';

$main_heading_style_inline .= 'color:' . $titlecolor . ';';//color
$main_heading_style_inline .= 'line-height:' . $title_line_ht . 'px;';//line-height
$main_heading_style_inline .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $main_heading_style ) : '' . ';';
$main_heading_style_inline .= 'font-size:' . $title_font_size . 'px;';
//style

if ( $main_heading_margin != '' ) {
	$main_heading_style_inline .= $main_heading_margin . ';';
}


/*---style for desc -----*/
if ( $desc_font_family != '' ) {
	$shfont_family = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $desc_font_family ) : '';
	$shfont_family = ( isset( $shfont_family ) && $shfont_family != "" ) ? $shfont_family : 'inherit';
	$sub_heading_style_inline .= 'font-family:' . $shfont_family . ';';
}
//sub heaing font style

$desc_line_ht = ( isset( $desc_line_ht ) && $desc_line_ht != "" ) ? $desc_line_ht : '20';
$desc_font_size = ( isset( $desc_font_size ) && $desc_font_size != "" ) ? $desc_font_size : '15';

$sub_heading_style_inline .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $sub_heading_style ) : '' . ';';
//attach font size if set

if ( $desc_font_size != '' ) {
	$sub_heading_style_inline .= 'font-size:' . $desc_font_size . 'px;';
}

$sub_heading_style_inline .= 'color:' . $descriptioncolor . ';';//color
$sub_heading_style_inline .= 'line-height:' . $desc_line_ht . 'px;';//line-height
if ( $sub_heading_margin != '' ) {
	$sub_heading_style_inline .= $sub_heading_margin . ';';
}


if ( $target == '' ) {
	$target = '_self';
}


if ( $style == 'Style3' ) {
	$borderstyle = '';
	if ( $main_heading_border != '' ) {
		$borderstyle .= 'border-top-color:' . $main_heading_border . ';';
		$borderstyle .= 'border-top-width:1px;';
	}


	if ( $read != '' ) {
		$btmargin = 'margin-bottom:-10px';
	} else {
		$btmargin = 'margin-bottom:-25px';
	}

	$html = '';
	$html .= function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content ) : '';
	$doc                     = new DOMDocument();
	$doc->preserveWhiteSpace = false;
	$searchPage              = mb_convert_encoding( $html, 'HTML-ENTITIES', "UTF-8" );
	

	$tags_to_strip = Array( "p" );
	foreach ($tags_to_strip as $tag)
	{
		$searchPage = preg_replace("/<\\/?" . $tag . "(.|\\s)*?>/",'',$searchPage);

	}

	$doc->loadHTML( $searchPage );
	$liList   = $doc->getElementsByTagName( 'li' );
	$liValues = array();
	foreach ( $liList as $li ) {
		$str        = $li->nodeValue;
		$liValues[] = htmlspecialchars_decode( utf8_decode( htmlentities( $str, ENT_COMPAT, 'utf-8', false ) ) );
	}
	$cnt = 0;
	$tab = '';
	$tab .= '<table class="featuretab" data-color="' . esc_attr( $bordercolor ) . '"  data-hover="' . esc_attr( $border_hover ) . ' " style= "' . $btmargin . '" ><tr>';
	foreach ( $liValues as $key => $value ) {
		$tab .= '<td>' . $value . '</td>';

		$cnt ++;
		if ( $cnt == 2 ) {
			$cnt = 0;
			$tab .= '</tr>
			<tr style="' . $borderstyle . '" class="featurerow">';
			}

		}
		$tab .= '</tr></table>';

	}

	$box_style_data = '';
	if ( $box_min_height != '' ) {
		$box_style_data .= " data-min-height='" . $box_min_height . "px' ";
	}

	if ( $style == 'Style1' ) {
		$output .= "<div class='futurebox " . $style . " " . esc_attr( $el_class ) . " " . esc_attr( $css_wrapper ) . "'  >
		<div " . $box_style_data . " class='icon-box-3 ' style='background: none repeat scroll 0% 0% padding-box " . $bgcolor . ";" . $main_heading_border . "' data-hover='" . esc_attr( $back_hover_color ) . "' data-color='" . esc_attr( $bgcolor ) . " 'data-border-default='". trim($default_border_color) ."  ' data-borderhover='" . esc_attr( $border_hover ) . "' data-bordercolor='" . esc_attr( $bordercolor ) . "'>
			<div class='icon-boxwrap2' style='" . $bacground . ";width:" . $iconlineheight . "px;height:" . $iconlineheight . "px;' data-hover='" . esc_attr( $bacgroundnew ) . "' data-color='" . esc_attr( $bacground ) . "' >
				<i class='" . esc_attr( $icon ) . " icon-box-back2' data-color='" . esc_attr( $icon_color ) . "' data-hover='" . esc_attr( $icon_color_bg_hover ) . "' style='color:" . $icon_color . ";line-height:" . $iconlineheight . "px!important;font-size:" . $size . "px' ></i>
			</div>
			<div class='icon-box2-title' style='" . $main_heading_style_inline . "' data-hover='" . esc_attr( $titlehovercolor ) . "' data-color='" . esc_attr( $titlecolor ) . "'>" . esc_html( $title ) . "</div>
			<div class='icon-description' style='" . $sub_heading_style_inline . "' data-hover='" . esc_attr( $description_hover_color ) . "' data-color='" . esc_attr( $descriptioncolor ) . "'>" . $content . "</div>";
			if ( $read != null ) {
				$output .= "<div class='iconbox-readmore' style='background: none repeat scroll 0% 0% " . $color1 . ";
				border: 1px solid " . $lighter . ";' onmouseover=this.style.backgroundColor='" . $lighter . "' onmouseout=this.style.backgroundColor='" . $color1 . "'><a href='" . $url . "' style='color:#ffffff!important'   target='" . $target . "'>" . $read . "</a></div>";
			}
			$output .= "</div>
		</div>";
	} else if ( $style == 'Style2' ) {
		if ( $fold_effect != '' && $fold_effect == 'on' ) {
			$el_class .= 'fold_effect';
		}
		$output .= "<div class='futurebox  " . $style . " " . $el_class . " " . esc_attr( $css_wrapper ) . "'  >
		<div " . $box_style_data . " class='icon-box-3 stop' style='background: none repeat scroll 0% 0% padding-box " . $bgcolor . ";" . $main_heading_border . " 'data-border-default='". $default_border_color ."  ' data-hover='" . $back_hover_color . "' data-color='" . $bgcolor . "' data-borderhover='" . $border_hover . "' data-bordercolor='" . $bordercolor . "'>
			<div class='icon-boxwrap2 stop infofoldMe' style='background-color: " . $color1 . ";border-radius: 0%;font-size:" . $icon_size . "px;' data-hover='" . $titlehovercolor . "' data-color='" . $color1 . "'>
				<i class='" . $icon . " icon-box-back2 stop' data-color='" . $icon_color . "' data-fold-color='" . $bgcolor . "' data-bg-color='" . $color1 . "' data-bg-hover='" . $icon_color_bg_hover . "' data-color-hover='" . $icon_color_hover . "' style='border-right-color:" . $bgcolor . ";border-top-color:" . $darker . ";background-color:" . $color1 . "; color:" . $icon_color . "' ></i>
			</div>
			<div class='icon-box2-title' style='" . $main_heading_style_inline . "' data-hover='" . $titlehovercolor . "' data-color='" . $titlecolor . "'>" . $title . "</div>
			<div class='icon-description info_content' style='" . $sub_heading_style_inline . "' data-hover='" . $description_hover_color . "' data-color='" . $descriptioncolor . "'>" . $content . "</div>";
			if ( $read != null ) {
				$output .= "<div class='iconbox-readmore-none aread'><a href='" . $url . "' style='color:" . $titlecolor . ";' target='" . $target . "' data-hover='" . $titlehovercolor . "' data-color='" . $titlecolor . "'>" . $read . " &raquo;</a></div>";
			}
			$output .= "</div></div>";
		}

		if ( $style == 'Style3' ) {
			$output .= "<div class='futurebox " . $style . " " . $el_class . " " . esc_attr( $css_wrapper ) . "'  >
			<div " . $box_style_data . " class='icon-box-3 ' style='background: none repeat scroll 0% 0% padding-box " . $bgcolor . ";" . $main_heading_border . " 'data-border-default='". $default_border_color ."  ' data-hover='" . $back_hover_color . "' data-color='" . $bgcolor . "' data-borderhover='" . $border_hover . "' data-bordercolor='" . $bordercolor . "'>
				<div class='icon-boxwrap2' style='" . $bacground . ";width:" . $iconlineheight . "px;height:" . $iconlineheight . "px;' data-hover='" . $bacgroundnew . "' data-color='" . $bacground . "' >
					<i class='" . $icon . " icon-box-back2' data-color='" . $icon_color . "' data-hover='" . $icon_color_bg_hover . "' style='color:" . $icon_color . ";line-height:" . $iconlineheight . "px!important;font-size:" . $size . "px' ></i>
				</div>
				<div class='icon-box2-title' style='" . $main_heading_style_inline . "' data-hover='" . $titlehovercolor . "' data-color='" . $titlecolor . "'>" . $title . "</div>
				<div class='icon-description' style='" . $sub_heading_style_inline . "' data-hover='" . $description_hover_color . "' data-color='" . $descriptioncolor . "'>" . $tab . "</div>";
				if ( $read != null ) {
					$output .= "<div class='iconbox-readmore' style='background: none repeat scroll 0% 0% " . $color1 . ";
					border: 1px solid " . $lighter . ";' onmouseover=this.style.backgroundColor='" . $lighter . "' onmouseout=this.style.backgroundColor='" . $color1 . "'><a href='" . $url . "' style='color:#ffffff!important'   target='" . $target . "'>" . $read . "</a></div>";
				}
				$output .= "</div>
			</div>";
		}

		echo ( $output ) !== "" ? $output : '';

