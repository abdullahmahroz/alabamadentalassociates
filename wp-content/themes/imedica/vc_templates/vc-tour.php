<?php
define( 'SLIDE_TITLE', __( "Slide", "js_composer" ) );
require_once get_template_directory() . '/vc_templates/vc-tabs.php' );

class WPBakeryShortCode_VC_Tour extends WPBakeryShortCode_VC_Tabs {
	protected $predefined_atts = array(
		'tab_id'                 => SLIDE_TITLE,
		'title'                  => '',
		'title_font'             => '',
		'icon_font_size'         => '',
		'icon_bg_hover_color'    => '',
		'title_font_style'       => '',
		'title_font_size'        => '',
		'title_font_line_height' => '',
		'vctour_value'           => '',
		'title_color'            => '',
		'text_hover_color'       => '',
		'icon_color'             => '',
		'icon_hover_color'       => '',
		'vctour_value'           => '',
		'css_wrapper'			 =>	'',
	);

	protected function getFileName() {
		return 'vc_tabs';
	}

	public function getTabTemplate() {
		$html = '<div class="wpb_template">';
		$html .= do_shortcode( '[vc_tab title="' . SLIDE_TITLE . '" tab_id=""  title_font="' . esc_attr( $title_font ) . '" icon_font_size="' . esc_attr( $icon_font_size ) . '"  title_font_style="' . esc_attr( $title_font_style ) . '" title_font_size="' . esc_attr( $title_font_size ) . '"  title_color="' . esc_attr( $title_color ) . '" text_hover_color="' . esc_attr( $text_hover_color ) . '" icon_color="' . esc_attr( $icon_color ) . '" icon_hover_color="' . esc_attr( $icon_hover_color ) . '" vctour_value="' . esc_attr( $vctour_value ) . '" ][/vc_tab]' );
		$html .= '</div>';
	}

}