<?php
global $vars;
$title = $textcolor = $icon = $icon_img = $img_width = $icon_size = $icon_color = $descriptioncolor = $button_link = '';
$style = $back_color = $bdescription_hover_color = $titlehover_color = $back_hover_color = $bgcolor = $css_wrapper = '';
extract( shortcode_atts( array(
	'title'                    => '',
	'textcolor'                => '',
	'icon_type'                => '',
	'icon'                     => '',
	'icon_size'                => '15',
	'icon_color'               => '',
	'titlecolor'               => '',
	'descriptioncolor'         => '',
	'button_link'              => '',
	'style'                    => 'Style1',
	'box_min_height'           => '',
	'back_color'               => '',
	'bdescription_hover_color' => '',
	'titlehover_color'         => '',
	'back_hover_color'         => '#ffffff',
	'bgcolor'                  => '#ffffff',
	'el_class'                 => '',
	'main_heading_font_family' => '',
	'title_font_size'          => '15',
	'main_heading_style'       => '',
	'title_line_ht'            => '20',
	'desc_font_family'         => '',
	'desc_font_size'           => '15',
	'sub_heading_style'        => '',
	'desc_line_ht'             => '20',
	'btn_title_hover_color'    => '',
	'btn_title'                => '',
	'button_hover_color'       => '',
	'buttoncolor'              => '',
	'main_heading_margin'      => '',
	'sub_heading_margin'       => '',
	'border_hover_color'       => '',
	'border_color'             => '',
	'fold_bg_color'            => '',
	'border_width'             => '1',
	'enable_hover'             => '',
	'title_margin_style5'      => '',
	'block_margin_style5'      => '',
	'css_wrapper'			   => '',
	), $atts ) );
$main_heading_style_inline = $sub_heading_style_inline = $style2_margin = '';
$color                     = $textcolor;
$href                      = vc_build_link( $button_link );
$url                       = $href['url'];
$target                    = trim( $href['target'] );
$read                      = $href['title'];
if ( $target == '' ) {
	$target = '_self';
}
$link_start = '';
$link_close = '';
if ( $url !== '' ) {
	$link_start = '<a href="'. esc_attr( $url  ) .'" target="' .$target. '" title="' . $read . '">';
	$link_close = '</a>';
}

if ( $back_color == '' ) {
	$back_color = $bgcolor;
}
if ( $textcolor == '' ) {
	$textcolor = $vars["imedica-theme-color"];
}

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );
$icon_size = ( isset( $icon_size ) && trim( $icon_size ) != "" ) ? $icon_size : '15';
$border_width = ( isset( $border_width ) && trim( $border_width ) != "" ) ? $border_width : '1';

$margin = '';
$bottom = '';
if ( function_exists( 'get_ultimate_font_family' ) ) {
	$dhfont_family = get_ultimate_font_family( $desc_font_family );
}
if ( function_exists( 'get_ultimate_font_style' ) ) {
	$desc_heading_style_inline = get_ultimate_font_style( $sub_heading_style );
}
if ( $main_heading_margin != '' ) {
	$style2_margin = explode( ";", $main_heading_margin );
	if ( $style2_margin[0] != '' ) {
		$top        = $style2_margin[0];
		$style2_top = explode( ":", $top );
		$style2_top[1];
		$top_margin = "margin-bottom:" . esc_attr( $style2_top[1] );
		$margin     = $top_margin;
	}
	if ( $style2_margin[1] != '' ) {
		$bottom = $style2_margin[1];
	}
}
/*---style for main title-----*/
if ( $main_heading_font_family != '' ) {
	if ( function_exists( 'get_ultimate_font_family' ) ) {
		$mhfont_family = get_ultimate_font_family( $main_heading_font_family );//family
		$mhfont_family = ( isset( $mhfont_family ) && trim( $mhfont_family ) != "" ) ? $mhfont_family : 'inherit';
		$main_heading_style_inline .= 'font-family:' . esc_attr( $mhfont_family ) . ';';
	}
}
//main heaing font style
if ( function_exists( 'get_ultimate_font_family' ) ) {
	$main_heading_style_inline .= get_ultimate_font_style( $main_heading_style );
}

$title_font_size = ( isset( $title_font_size ) && trim( $title_font_size ) != "" ) ? $title_font_size : '15';
$title_line_ht = ( isset( $title_line_ht ) && trim( $title_line_ht ) != "" ) ? $title_line_ht : '20';

$main_heading_style_inline .= 'font-size:' . esc_attr( $title_font_size ) . 'px;';
$main_heading_style_inline .= 'color:' . esc_attr( $titlecolor ) . ';';//color
$main_heading_style_inline .= 'line-height:' . esc_attr( $title_line_ht ) . 'px;';//line-height
//attach margins for main heading
if ( $style == 'Style2' ) {
} else {
	if ( $main_heading_margin != '' && $style != 'Style5' ) {
		$main_heading_style_inline .= $main_heading_margin . ';';
	}
}
/*---style for desc -----*/
if ( $desc_font_family != '' ) {
	if ( function_exists( 'get_ultimate_font_family' ) ) {
		$shfont_family = get_ultimate_font_family( $desc_font_family );
		$shfont_family = ( isset( $shfont_family ) && trim( $shfont_family ) != "" ) ? $shfont_family : 'inherit';
		$sub_heading_style_inline .= 'font-family:' . esc_attr( $shfont_family ) . ';';
	}
}
//sub heaing font style
if ( function_exists( 'get_ultimate_font_style' ) ) {
	$sub_heading_style_inline .= get_ultimate_font_style( $sub_heading_style );
}
//attach font size if set
$desc_font_size = ( isset( $desc_font_size ) && trim( $desc_font_size ) != "" ) ? $desc_font_size : '15';
$desc_line_ht = ( isset( $desc_line_ht ) && trim( $desc_line_ht ) != "" ) ? $desc_line_ht : '20';

$sub_heading_style_inline .= 'font-size:' . esc_attr( $desc_font_size ) . 'px;';
$sub_heading_style_inline .= 'color:' . esc_attr( $descriptioncolor ) . ';';//color
$sub_heading_style_inline .= 'line-height:' . esc_attr( $desc_line_ht ) . 'px;';//line-height
if ( $sub_heading_margin != '' ) {
	$sub_heading_style_inline .= $sub_heading_margin;
}
if ( $style == 'Style1' || $style == 'Style5' ) {
	$sub_heading_style_inline .= 'border-bottom:0px solid ' . esc_attr( $textcolor ) . ';';//border-color-height
} else {
	$sub_heading_style_inline .= 'border-bottom:0px solid ' . esc_attr( $textcolor ) . ';';//border-color-height
}
$col        = Array(
	hexdec( substr( $textcolor, 1, 2 ) ),
	hexdec( substr( $textcolor, 3, 2 ) ),
	hexdec( substr( $textcolor, 5, 2 ) )
	);
$darker     = Array(
	$col[0] / 1.2,
	$col[1] / 1.2,
	$col[2] / 1.2
	);
$darker     = "#" . sprintf( "%02X%02X%02X", $darker[0], $darker[1], $darker[2] );
$borderwdth = round( $icon_size / 3.5 );
/*-- for style 3--------------*/
$colr         = Array(
	hexdec( substr( $back_color, 1, 2 ) ),
	hexdec( substr( $back_color, 3, 2 ) ),
	hexdec( substr( $back_color, 5, 2 ) )
	);
$bcknew       = Array(
	$colr[0] / 1.2,
	$colr[1] / 1.2,
	$colr[2] / 1.2
	);
$darkerbcknew = "#" . sprintf( "%02X%02X%02X", $bcknew[0], $bcknew[1], $bcknew[2] );
$borderstyle  = '';
if ( $border_color != '' ) {
	$borderstyle .= 'border-top-color:' . esc_attr( $border_color ) . ';';
}
if ( $border_width != '' ) {
	$borderstyle .= 'border-top-width:' . esc_attr( $border_width ) . 'px;';
}
/*---for folded icon hover---*/
$colhvr          = Array(
	hexdec( substr( $back_hover_color, 1, 2 ) ),
	hexdec( substr( $back_hover_color, 3, 2 ) ),
	hexdec( substr( $back_hover_color, 5, 2 ) )
	);
$bckhvrnew       = Array(
	$colhvr[0] / 1.2,
	$colhvr[1] / 1.2,
	$colhvr[2] / 1.2
	);
$darkerhvrbcknew = "#" . sprintf( "%02X%02X%02X", $bckhvrnew[0], $bckhvrnew[1], $bckhvrnew[2] );
if ( $style == 'Style3' || $style == 'Style2' || $style == 'Style1' || $style == 'Style5' ) {
	$butnborderstyle = '';
	if ( $border_color != '' ) {
		$butnborderstyle .= 'border-color:' . esc_attr( $border_color ) . ';';
	}
	if ( $border_width != '' ) {
		$butnborderstyle .= 'border-width:' . esc_attr( $border_width ) . 'px;';
	}
}
if ( $style == 'Style4' ) {
	if ( $read != '' ) {
		$btmargin = 'margin-bottom:-10px;';
	} else {
		$btmargin = 'margin-bottom:-25px;';
	}
	$html = $tab = '';
	$html .= function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content ) : '';
	$doc                     = new DOMDocument();
	$doc->preserveWhiteSpace = false;
	$searchPage              = $html;
		
	libxml_use_internal_errors( true );
	$doc->loadHTML('<meta http-equiv="content-type" content="text/html; charset=utf-8">'.$searchPage);
	$liList   = $doc->getElementsByTagName( 'li' );
	$liValues = array();

	foreach ( $liList as $li ) {
		$str        = $li->nodeValue;
		$liValues[] = $str;
	}	
	$cnt = 0;
	$tab .= '';
	$tab .= '<table class="featuretab" data-color="' . esc_attr( $border_color ) . '"  data-hover="' . esc_attr( $border_hover_color ) . ' " style= "' . esc_attr( $btmargin ) . '" ><tr>';
	foreach ( $liValues as $key => $value ) {
		$tab .= '<td>' . esc_attr( $value ) . '</td>';
		$cnt ++;
		if ( $cnt == 2 ) {
			$cnt = 0;
			$tab .= '</tr>
			<tr style="' . esc_attr( $borderstyle ) . '" class="featurerow">';
			}
		}
		$tab .= '<td style="display:none;"></td><td style="display:none;"></td></tr></table>';
	}
//enable icon hover effect
	$hover_effect = '';
	if ( $enable_hover != '' && $enable_hover == 'enable' ) {
		$hover_effect = 'panel-icon';
	}
	$box_style_data = '';
	if ( $box_min_height != '' ) {
		$box_style_data .= " data-min-height='" . esc_attr(  $box_min_height ) . "px' ";
	}
	switch ( $style ) {
		case 'Style1':
		//icon style
		$icon_style = 'background-color:' . esc_attr( $textcolor ) . ';color:' . esc_attr( $icon_color ) . ';';
		$icon_style .= 'font-size:' . esc_attr( $icon_size ) . 'px;line-height:' . esc_attr( $icon_size ) . 'px!important;';
		$icon_style .= 'border-right-color:' . esc_attr( $fold_bg_color ) . ';border-top-color:' . esc_attr( $darker ) . ';';
		//anchor style
		$anchor_style = 'color:' . esc_attr( $textcolor ) . ';border-top-style:solid ;' . esc_attr( $butnborderstyle ) . ';padding-top:5px;';
		echo "	<div " . $box_style_data . " class='col-futurebox  service-box " . esc_attr( $css_wrapper )  ." " . esc_attr( $style ) . " " . esc_attr( $el_class ) . "'>
		<div class='service-icon-container rot-y'>
			<i class='styl1icon " . esc_attr( $icon ) . " panel-icon' style='" . esc_attr( $icon_style ) . "'></i>
		</div>". $link_start ." <div class='feature-style1_title' style='" . esc_attr( $main_heading_style_inline ) . "'>" . $title . " </div>". $link_close ."
		<div class='feture-style1-desc' style='" . esc_attr( $sub_heading_style_inline ) . " ;float: left;'>" . do_shortcode( $content ). "</div>";
		if ( $read != null ) {
			echo "<a href='" . esc_url( $url ) . "' style='" . esc_attr( $anchor_style ) . "' target='" . esc_attr( $target ) . "' class='featuretab2' data-color='" . esc_attr( $border_color ) . "'  data-hover='" . esc_attr( $border_hover_color ) . "' data-btncolor='" . esc_attr( $buttoncolor ) . "' data-btnhovercolor='" . esc_attr( $button_hover_color ) . "' >
			" . esc_attr( $read ) . " &raquo;
		</a>";
	}
	echo "	</div>";
	break;
	case 'Style2':
	echo "<div " . $box_style_data . " class='col-futurebox service-box " . esc_attr( $style ) . " " . esc_attr( $css_wrapper ) . " " . esc_attr( $el_class ) . "'>
	<div style=''>
		<div class='service-title featuretab2' style='border-bottom: solid ;padding-bottom: 15px;text-align:center;" . esc_attr( $butnborderstyle ) . ";border-color:" . esc_attr( $border_color ) . "' data-color='" . esc_attr( $border_color ) . "'  data-hover='" . esc_attr( $border_hover_color ) . "'>
			<div class='service-icon-container rot-y scontainer' align='center' style='" . esc_attr( $margin ) . "'>
				<i class='" . esc_attr( $icon ) . " panel-icon iconid'  style='border-right-color:" . esc_attr( $fold_bg_color ) . ";background-color:" . esc_attr( $textcolor ) . ";color:" . esc_attr( $icon_color ) . ";line-height:" . esc_attr( $icon_size ) . "px!important;font-size:" . esc_attr( $icon_size ) . "px!important;border-top-color:" . esc_attr( $darker ) . ";' ></i>
			</div> ". $link_start ." <div style='" . esc_attr( $main_heading_style_inline ) . ";" . esc_attr( $bottom ) . "'>" . $title . "</div>". $link_close ."</div>
			<div class='feature-styl2-descr' style='" . esc_attr( $sub_heading_style_inline ) . "'>" . do_shortcode( $content ) . "</div>";
			if ( $read != null ) {
				echo "<a class='style2_link' href='" . esc_url( $url ) . "' style='color:" . esc_attr( $textcolor ) . ";text-align:center;' target='" . esc_attr( $target ) . "' >
				" . esc_attr( $read ) . " &raquo;
			</a>";
		}
		echo "</div></div>";
		break;
		case 'Style3':
		echo "<div " . $box_style_data . " class='col-futurebox  service-box foldMe " . esc_attr( $style ) . " " . esc_attr( $css_wrapper ) . " " . esc_attr( $el_class ) . "' style='color:" . esc_attr( $back_color ) . ";background-color:" . esc_attr( $back_color ) . ";border-top-color:" . esc_attr( $darkerbcknew ) . "'
		data-hover='" . esc_attr( $back_hover_color ) . "' data-color='" . esc_attr( $back_color ) . "' data-borderhover='" . esc_attr( $darkerhvrbcknew ) . "'  data-bordercolor='" . esc_attr( $darkerbcknew ) . "'>
		<div class='fututerbox-main'>". $link_start ."<div class='service-title' style='" . esc_attr( $main_heading_style_inline ) . ";border-top-color:" . esc_attr( $darkerbcknew ) . "' data-hover='" . esc_attr( $titlehover_color ) . "' data-color='" . esc_attr( $titlecolor ) . "'>
				" . $title . "</div>". $link_close ."
				<div  class='describe' style='" . esc_attr( $sub_heading_style_inline ) . "' data-hover='" . esc_attr( $bdescription_hover_color ) . "' data-color='" . esc_attr( $descriptioncolor ) . "'>" . do_shortcode( $content ) . "</div>";
				if ( $read != null ) {
					echo "<a href='" . esc_url( $url ) . "' class='infobox_button futurebtnstyle3' style='color:" . esc_attr( $btn_title ) . ";width:auto;height: auto;
					line-height: 20px;background-color: " . esc_attr( $buttoncolor ) . ";" . esc_attr( $butnborderstyle ) . "' target='" . esc_attr( $target ) . "' data-hover='" . esc_attr( $btn_title_hover_color ) . "' data-color='" . esc_attr( $btn_title ) . "' data-btncolor='" . esc_attr( $buttoncolor ) . "' data-btnhovercolor='" . esc_attr( $button_hover_color ) . "'  data-bcolor='" . esc_attr( $border_color ) . "' data-bhover='" . esc_attr( $border_hover_color ) . "'>
					" . esc_attr( $read ) . "
				</a>";
			}
			echo "</div></div>";
			break;
			case 'Style4':
			echo "<div " . $box_style_data . " class='col-futurebox  service-box  foldMe " . esc_attr( $style ) . " " . esc_attr( $css_wrapper ) . " " . esc_attr( $el_class ) . "' style='color:" . esc_attr( $back_color ) . ";background-color:" . esc_attr( $back_color ) . ";border-top-color:" . esc_attr( $darkerbcknew ) . "'
			data-hover='" . esc_attr( $back_hover_color ) . "' data-color='" . esc_attr( $back_color ) . "' data-borderhover='" . esc_attr( $darkerhvrbcknew ) . "'  data-bordercolor='" . esc_attr( $darkerbcknew ) . "'>
			<div class='fututerbox-main'>". $link_start ."<div class='service-title' style='" . esc_attr( $main_heading_style_inline ) . ";border-top-color:" . esc_attr( $darkerbcknew ) . "' data-hover='" . esc_attr( $titlehover_color ) . "' data-color='" . esc_attr( $titlecolor ) . "'>
					" . $title . "</div>". $link_close ."
					<div  class='describe' style='" . esc_attr( $sub_heading_style_inline ) . "' data-hover='" . esc_attr( $bdescription_hover_color ) . "' data-color='" . esc_attr( $descriptioncolor ) . "'>" . $tab . "</div>";
					if ( $read != null ) {
						echo "<a href='" . esc_url( $url ) . "' class='infobox_button futurebtnstyle3' style='color:" . esc_attr( $btn_title ) . ";width:auto;height: auto;
						line-height: 20px;background-color: " . esc_attr( $buttoncolor ) . ";' target='" . esc_attr( $target ) . "' data-hover='" . esc_attr( $btn_title_hover_color ) . "' data-color='" . esc_attr( $btn_title ) . "' data-btncolor='" . esc_attr( $buttoncolor ) . "' data-btnhovercolor='" . esc_attr( $button_hover_color ) . "'>
						" . esc_attr( $read ) . "
					</a>";
				}
				echo "</div></div>";
				break;
				case 'Style5':
		// styling varibales
		//box
				$box_style = '';
				$box_style .= 'border-style: solid;';
				if ( $bgcolor != '' ) {
					$box_style .= 'background-color:' . esc_attr( $bgcolor ) . ';';
				}
				if ( $border_width != '' ) {
					$box_style .= 'border-bottom-width: ' . esc_attr( $border_width ) . 'px;';
				}
				if ( $border_color != '' ) {
					$box_style .= 'border-color: ' . esc_attr( $border_color ) . ';';
				}
		//title_margin_style5
				if ( $title_margin_style5 != '' ) {
					$style5_margin = explode( ";", $title_margin_style5 );
					if ( $style5_margin[0] != '' ) {
						$top        = $style5_margin[0];
						$style2_top = explode( ":", $top );
						$style2_top[1];
						$top_margin = 'margin-top:' . esc_attr( $style2_top[1] ) . ';';
						$main_heading_style_inline .= $top_margin;
					}
					if ( $style5_margin[1] != '' ) {
						$bottom = $style5_margin[1] . ';';
						$main_heading_style_inline .= $bottom;
					}
				}
		// /block_margin_style5
				if ( $block_margin_style5 != '' ) {
					$b_margin = explode( ";", $block_margin_style5 );
					if ( $b_margin[0] != '' ) {
						$top        = $b_margin[0];
						$style5_top = explode( ":", $top );
						$style5_top[1];
						$top_margin = 'margin-top:' . esc_attr( $style5_top[1] ) . ';';
						$box_style .= $top_margin;
					}
					if ( $b_margin[1] != '' ) {
						$bottom = $b_margin[1] . ';';
						$box_style .= $bottom;
					}
				}
		//icon
				$icon_style = '';
				if ( $textcolor != '' ) {
					$icon_style .= 'background-color:' . esc_attr( $textcolor ) . ';';
				}
				if ( $icon_color != '' ) {
					$icon_style .= 'color:' . esc_attr( $icon_color ) . ';';
				}
				if ( $icon_size != '' ) {
					$icon_style .= 'font-size:' . esc_attr( $icon_size ) . 'px;';
				}
				if ( $fold_bg_color != '' ) {
					$icon_style .= 'border-right-color:' . esc_attr( $fold_bg_color ) . ';';
				}
				if ( $darker != '' ) {
					$icon_style .= 'border-top-color:' . esc_attr( $darker ) . ';';
				}
		//anchor
				$anchor_style = 'padding-top:5px;';
				if ( $textcolor != '' ) {
					$anchor_style .= 'color:' . esc_attr( $textcolor ) . ';';
				}
				if ( $butnborderstyle != '' ) {
					$anchor_style .= 'border-top-style:solid ;' . esc_attr( $butnborderstyle ) . ';';
				}
				echo "	<div " . $box_style_data . " class='col-futurebox  service-box " . esc_attr( $style ) . " " . esc_attr( $css_wrapper ) . " " . esc_attr( $el_class ) . "' style='" . esc_attr( $box_style ) . "'>
				<div class='feature-box-inner-wrapper'>
					<div class='feature-left-block'>
						<div class='service-icon-container rot-y feature-icon-wrapper '>
							<i class='" . esc_attr( $icon ) . " " . esc_attr( $hover_effect ) . "  feature-icon' style='" . esc_attr( $icon_style ) . "'></i>
						</div>
					</div>
					<div class='feature-right-block'>";
						if ( $title != '' ) :
							if ( $url !== '') {
								echo "<a href=".esc_url( $url  )."><div class='feature-style1_title' style='" . esc_attr( $main_heading_style_inline ) . "'>" . $title . " </div></a>";
							} else {
								echo "<div class='feature-style1_title' style='" . esc_attr( $main_heading_style_inline ) . "'>" . $title . " </div>";
							}
							endif;
							if ( $content != '' ) :
								echo "					<div class='feture-style1-desc' style='" . esc_attr( $sub_heading_style_inline ) . " ;float: left;'>" . do_shortcode( $content ) . "</div>";
							endif;
							if ( $read != null ) :
								echo "					<a href='" . esc_url( $url ) . "' style='" . esc_attr( $anchor_style ) . "' target='" . esc_attr( $target ) . "' class='featuretab2' data-color='" . esc_attr( $border_color ) . "'  data-hover='" . esc_attr( $border_hover_color ) . "' data-btncolor='" . esc_attr( $buttoncolor ) . "' data-btnhovercolor='" . esc_attr( $button_hover_color ) . "' >
							" . esc_attr( $read ) . " &raquo;
						</a>";
						endif;
						echo "			</div>";
						echo "		</div>";
						echo "	</div>";
						break;
					}
