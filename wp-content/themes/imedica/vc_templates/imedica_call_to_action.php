<?php
$title_text_typography = $title_font = $title_font_style = $title_font_size = $title_font_line_height = $title_font_color = $desc_text_typography = $desc_font = $desc_font_style = $desc_font_size = $desc_font_line_height = $desc_font_color = $output = $title = $css_wrapper = '';
$el_class= '';
extract( shortcode_atts( array(
	'call_to_action_bg'            => '',
	'cta_layout'                   => 'fullwidth',
	'bg_shadow'                    => '',
	'title'                        => '',
	'title_text_typography'        => '',
	'title_font'                   => '',
	'title_font_style'             => '',
	'title_font_size'              => 'desktop:22px;',
	'title_font_line_height'       => 'desktop:28px;',
	'title_font_color'             => '',
	'desc_text_typography'         => '',
	'desc_font'                    => '',
	'desc_font_style'              => '',
	'desc_text_align'              => 'center',
	'desc_font_size'               => 'desktop:22px;',
	'desc_font_line_height'        => 'desktop:28px;',
	'desc_font_color'              => '',
	'btn_font'					   => '',
	'btn_font_style'			   => '',
	'btn_font_size'				   => 'desktop:12px;',
	'btn_font_line_height'		   => 'desktop:23px;',
	'view_style'                   => 'style1',
	'btn_button_size'              => 'tiny',
	'btn_content'                  => '',
	'btn_icon'                     => '',
	'btn_icon_direction'           => 'left',
	'btn_btn_style'                => 'color',
	'btn_btn_link'                 => '',
	'btn_color'                    => '',
	'btn_color_bg'                 => '',
	'btn_color_border'             => '',
	'btn_color_icon'               => '',
	'btn_icon_font_size'           => '',
	'btn_animation_style'          => 'no_animation',
	'btn_border_size'              => '',
	'btn_outline_hover_bg'         => '',
	'btn_outline_color_bg_hover'   => '',
	'btn_outline_color_bg'         => '',
	'btn_outline_color_text_hover' => '',
	'btn_hover_color_icon'         => '',
	'box_border'                   => '',
	'highlight_border'             => 'on',
	'title_padding'                => '',
	'button_padding'               => '',
	'el_class'					   => '',
	'css_wrapper'				   => '',

), $atts ) );
$content = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, true ) : ''; // fix unclosed/unwanted paragraph tags in $content

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

/*----------------------------------------------------------*
 * 					Main Block - [START] 			 	 	*
 *----------------------------------------------------------*/
/*
/* 		Styling Variables
 *--------------------------------------*/
$title_style = '';
$desc_style  = '';
$font_args   = array();
/* 		Title Styling
 *--------------------------------------*/
if ( $title_font != '' ) {
	$font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $title_font ) : '';
	$title_style .= 'font-family:' . esc_attr( $font_family ) . ';';
	array_push( $font_args, $title_font );
}
if ( $title_font_style != '' ) {
	$title_style .= function_exists( "get_ultimate_font_style" ) ? get_ultimate_font_style( $title_font_style ) : '';
}

$uid = 'imedica-cta-' . rand( 1000, 9999 );

// {Title} 	responsive font size and line height
if ( is_numeric( $title_font_size ) ) {
	$title_font_size = 'desktop:' . esc_attr( $title_font_size ) . 'px;';
}
if ( is_numeric( $title_font_line_height ) ) {
	$title_font_line_height = 'desktop:' . esc_attr( $title_font_line_height ) . 'px;';
}
$args             = array(
	'target'      => '#' . $uid . ' .imedica-call-to-action-title',
	'media_sizes' => array(
		'font-size'   => $title_font_size,
		'line-height' => $title_font_line_height,
	),
);
$title_responsive = function_exists( 'get_ultimate_vc_responsive_media_css' ) ? get_ultimate_vc_responsive_media_css( $args ) : '';
if ( $title_font_color != '' ) {
	$title_style .= 'color:' . esc_attr( $title_font_color ) . ';';
}

/*		Styling Variables
 *-----------------------------------------------*/
$link_style = '';
$icon_style = '';
$btn_class  = '';
$animate    = '';

/* 		Button Typography
 *--------------------------------------*/
if ( $btn_font != '' ) {
	$font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $btn_font ) : '';
	$link_style .= 'font-family:' . esc_attr( $font_family ) . ';';
	array_push( $font_args, $btn_font );
}
if ( $btn_font_style != '' ) {
	$link_style .= function_exists( "get_ultimate_font_style" ) ? get_ultimate_font_style( $btn_font_style ) : '';
}
if ( is_numeric( $btn_font_size ) ) {
	$btn_font_size = 'desktop:' . esc_attr( $btn_font_size ) . 'px;';
}
if ( is_numeric( $btn_font_line_height ) ) {
	$btn_font_line_height = 'desktop:' . esc_attr( $btn_font_line_height ) . 'px;';
}
//responsive font size and line height for title
$args            = array(
	'target'      => '#' . esc_attr( $uid ) . ' .imedica-btn-wrapper a.imedica-btn',
	'media_sizes' => array(
		'font-size'   => $btn_font_size,
		'line-height' => $btn_font_line_height,
	),
);
$btn_responsive = function_exists( 'get_ultimate_vc_responsive_media_css' ) ? get_ultimate_vc_responsive_media_css( $args ) : '';

/* 		Description Styling
 *--------------------------------------*/
if ( $desc_font != '' ) {
	$font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $desc_font ) : '';
	$desc_style .= 'font-family:' . esc_attr( $font_family ) . ';';
	array_push( $font_args, $desc_font );
}
if ( $desc_font_style != '' ) {
	$desc_style .= function_exists( "get_ultimate_font_style" ) ? get_ultimate_font_style( $desc_font_style ) : '';
}
// {Description} 	responsive font size and line height
if ( is_numeric( $desc_font_size ) ) {
	$desc_font_size = 'desktop:' . esc_attr( $desc_font_size ) . 'px;';
}
if ( is_numeric( $desc_font_line_height ) ) {
	$desc_font_line_height = 'desktop:' . esc_attr( $desc_font_line_height ) . 'px;';
}
//responsive font size and line height for title
$args            = array(
	'target'      => '#' . esc_attr( $uid ) . ' .imedica-call-to-action-description, #' . esc_attr( $uid ) . ' .imedica-call-to-action-description p',
	'media_sizes' => array(
		'font-size'   => $desc_font_size,
		'line-height' => $desc_font_line_height,
	),
);
$desc_responsive = function_exists( 'get_ultimate_vc_responsive_media_css' ) ? get_ultimate_vc_responsive_media_css( $args ) : '';
if ( $desc_font_color != '' ) {
	$desc_style .= 'color:' . esc_attr( $desc_font_color ) . ';';
}
if ( $desc_text_align != '' ) {
	$desc_style .= 'text-align:' . esc_attr( $desc_text_align );
}

/*			Main Block BG Color
 *------------------------------------------*/
$main_block_style = '';
if ( $call_to_action_bg != '' ) {
	$main_block_style .= 'background-color:' . esc_attr( $call_to_action_bg ) . ';';
}
if ( $view_style == 'style2' ) {
	$wrap_cls = 'col-md-9 col-lg-9 col-sm-9 col-xs-12';
}
/*----------------------------------------------------------*
 * 					Main Block - [END] 			 	 	*
 *----------------------------------------------------------*/


/*----------------------------------------------------------*
 * 					Button Block - [START] 			 	 	*
 *----------------------------------------------------------*/

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
if ( $btn_outline_color_bg_hover != '' ) {
	$data_outline .= 'data-outline-color-bg-hover="' . esc_attr( $btn_outline_color_bg_hover ) . '" ';
}
if ( $btn_outline_color_bg != '' ) {
	$data_outline .= 'data-outline-color-bg="' . esc_attr( $btn_outline_color_bg ) . '" ';
}
if ( $btn_outline_color_text_hover != '' ) {
	$data_outline .= 'data-outline-color-text-hover="' . esc_attr( $btn_outline_color_text_hover ) . '" ';
}
if ( $btn_outline_hover_bg != '' ) {
	$data_outline_hover = $outline_hover_bg;
}
/*		Color
*-------------------------------------------------*/
if ( $btn_color != '' ) {
	$link_style .= 'color: ' . esc_attr( $btn_color ) . ';';
	//	Set hover color for outline
	$data_current .= 'data-current-color-text="' . esc_attr( $btn_color ) . '" ';
}
/* 			Button Styling
 *
 * 	-	Button Style - Outline
 *-----------------------------------------------*/
if ( $btn_btn_style == 'outline' ) {
	$btn_class = 'imedica-btn-outline';
	if ( $btn_color_border ) {
		$link_style .= 'border-color: ' . esc_attr( $btn_color_border ) . ';';
		//	Set hover color for Outline [data attribute]
		$data_current .= 'data-current-color-border="' . esc_attr( $btn_color_border ) . '" ';
	}
	if ( $btn_border_size ) {
		$link_style .= 'border-width: ' . esc_attr( $btn_border_size ) . 'px;';
	}
	if ( $btn_outline_color_bg ) {
		$link_style .= 'background-color: ' . esc_attr( $btn_outline_color_bg ) . ';';
	}
} else {
	/* -	Button Style - Default
	 *-----------------------------------------------*/
	if ( $btn_color_bg != '' ) {
		$link_style .= 'background-color: ' . esc_attr( $btn_color_bg ) . ';';
		$link_style .= 'box-shadow: 0 2px ' . esc_attr( $btn_color_bg ) . ';';
		$link_style .= 'border-color: ' . esc_attr( $btn_color_bg ) . ';';
		//	Set hover color for Default [data attribute]
		$data_current .= 'data-current-color-bg="' . esc_attr( $btn_color_bg ) . '" ';
	}
}

/* 		Button Link
*-----------------------------------------------*/
$link = '#';
$link_target = $link_title = '';

if ( $btn_btn_link != '' ) {
	$href 		 = vc_build_link( $btn_btn_link );
	$link 		 = $href['url'];
	$link_target = trim( $href['target'] );
	$link_title  = $href['title'];
}
/* 	Check Animation */
if ( $btn_animation_style != '' && $btn_animation_style == "animate" ) {
	$animate = 'imedica-btn-animate';

	//	get icon direction for animation
	if ( $btn_icon_direction != '' ) {
		$animate .= '-' . esc_attr( $btn_icon_direction );
	}
}
/* 		Icon styling
*-----------------------------------------------*/
if ( $btn_color_icon != '' ) {
	$icon_style .= 'color: ' . esc_attr( $btn_color_icon ) . '; ';
	//	Set hover color for Default [data attribute]
}
if ( $btn_icon_font_size != '' ) {
	$icon_style .= 'font-size: ' . esc_attr( $btn_icon_font_size ) . 'px; ';
}
if ( $view_style == 'style2' ) {
	$cta_imdbtn_class = 'col-md-3 col-sm-3 col-xs-12';
} else {
	$cta_imdbtn_class = '';
}
/*----------------------------------------------------------*
 * 					Button Block - [END] 			 	 	*
 *----------------------------------------------------------*/


//	button variable
$ButtonData = '';
if ( $btn_content !== '' ) {
	$ButtonData = "<div class='imedica-btn-wrapper ". esc_attr( $cta_imdbtn_class ) . "' style='" . esc_attr( $button_padding ) . "'>";
	$ButtonData .= " <a href='" . esc_url( $link ) . "'  title='".esc_attr( $link_title )."' target='".esc_attr( $link_target )."' class='ult-responsive imedica-btn {$btn_class} imedica-btn-{$btn_button_size} {$animate}' style='{$link_style}' {$data_outline} {$data_current} {$btn_responsive} >";

	//	Has icon?
	if ( $btn_icon ) {
		/* 		Icon Direction
		*-----------------------------------------------*/
		//	if direction - left
		if ( $btn_icon_direction == 'left' ) {
			$ButtonData .= "<i style='{$icon_style}' class='imedica-icon {$btn_icon} imedica-icon-{$btn_icon_direction}' data-iconcolor='" . $btn_color_icon . "' data-iconhovercolor='" . $btn_hover_color_icon . "' ></i> <!-- .imedica-icon-left -->";
			$ButtonData .= $btn_content;
		}
		//	if direction - right
		if ( $btn_icon_direction == 'right' ) {
			$ButtonData .= $btn_content;
			$ButtonData .= "<i style='{$icon_style}' class='imedica-icon {$btn_icon} imedica-icon-{$btn_icon_direction} ' data-iconcolor='" . $btn_color_icon . "' data-iconhovercolor='" . $btn_hover_color_icon . "'></i> <!-- .imedica-icon-right -->";
		}
	} else {
		// if icon not select
		$ButtonData .= $btn_content;
	}
	$ButtonData .= "	</a> <!-- .imedica-btn -->";
	$ButtonData .= "</div> <!-- .imedica-btn-wrapper -->";
}


			//highlight_border_color
$BorderStyle = '';
if ( $box_border != '' ) {
	$border = explode( "|", $box_border );

	$BorderStyle = '';
	if ( isset( $border[0] ) ) {
		$BorderStyle .= $border[0];
	}
	if ( isset( $border[1] ) ) {
		$BorderStyle .= $border[1];
	}
	if ( isset( $border[2] ) ) {
		$BorderStyle .= $border[2];
	}

}


if ( $view_style != '' ) {
	switch ( $view_style ) {
		case 'style2':

			if ( isset( $highlight_border ) && $highlight_border == 'on' ) {
				//set border for box
				$main_block_style .= 'border:1px solid #e4e4e4;';
			}

			$output .= '<div id="' . $uid . '" class="imedica-call-to-action-wrapper '.$el_class.' '. $bg_shadow . ' '. esc_attr( $css_wrapper ) .'" style="' . $main_block_style . '">';
			$output .= '	<div class="imedica-call-to-action-style2" style="' . $BorderStyle . '">';
			$output .= '		<div class="imedica-call-to-action ' . $wrap_cls . '" style="' . $title_padding . '" >';
			$output .= '			<div class="imedica-call-to-action-description ult-responsive" ' . $desc_responsive . ' style="' . $desc_style . '">';
			$output .= $content;
			$output .= '			</div> <!-- .imedica-call-to-action-description -->';
			$output .= '		</div> <!-- .imedica-call-to-action -->';

			$output .= $ButtonData;

			$output .= '	</div> <!-- .imedica-call-to-action-style2 -->';
			$output .= '</div> <!-- .imedica-call-to-action-wrapper -->';
			break;
		case 'style1':
		default:
			$output .= '<div id="' . $uid . '" class="imedica-call-to-action-wrapper '.$el_class.' ' . $bg_shadow . ' '. esc_attr( $css_wrapper ) .'" style="' . $main_block_style . '">';
			$output .= '	<div class="imedica-call-to-action-style1" style="' . $BorderStyle . '">';
			$output .= '		<div class="imedica-call-to-action" style="' . $title_padding . '">';
			$output .= '			<div class="imedica-call-to-action-header">';
			$output .= '				<h3 class="imedica-call-to-action-title ult-responsive" ' . $title_responsive . ' style="' . $title_style . '">' . $title . '</h3>';
			$output .= '			</div> <!-- .imedica-call-to-action-header -->';
			$output .= '			<div class="imedica-call-to-action-description ult-responsive" ' . $desc_responsive . ' style="' . $desc_style . '">';
			$output .= $content;
			$output .= '			</div> <!-- .imedica-call-to-action-description -->';
			$output .= '		</div> <!-- .imedica-call-to-action -->';

			$output .= $ButtonData;

			$output .= '	</div> <!-- .imedica-call-to-action-style1 -->';
			$output .= '</div> <!-- .imedica-call-to-action-wrapper -->';
			break;
	}
}

echo ( $output ) !== "" ? $output : '';