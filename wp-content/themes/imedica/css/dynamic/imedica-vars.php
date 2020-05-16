<?php
if ( ! function_exists( "imedica_less_vars" ) ) {
	function imedica_less_vars() {
		global $imd_data, $vars;
		$imd_data = get_option('imedica_opts');

		$vars                  = array();
		$vars['imd-fonts-dir'] = get_template_directory_uri() . "/css/fonts";
		$vars['imd-dir']       = get_template_directory_uri();
		$top_header_img        = get_template_directory_uri() . "/css/img/g30.png";
		$bg_img                = get_template_directory_uri() . "/css/img/imbg.jpg";

		$vars["imedica-color-bg"]       = isset( $imd_data['imedica-color-bg']['color'] ) ? $imd_data['imedica-color-bg']['color'] : '#F8F8F8';
		$vars["imedica-color-bg-alpha"] = isset( $imd_data['imedica-color-bg']['alpha'] ) ? $imd_data['imedica-color-bg']['alpha'] : '1';
		$vars["imedica-color-bg-img"]   = isset( $imd_data['imedica-color-bg-img']['url'] ) && trim( $imd_data['imedica-color-bg-img']['url'] ) !== "" ? 'url("' . $imd_data['imedica-color-bg-img']['url'] . '")' : "";
		$vars['imd-bg-img-repeat']      = isset( $imd_data['imd-bg-img-repeat'] ) ? $imd_data['imd-bg-img-repeat'] : 'repeat';

		// Global Colors
		$vars["imedica-theme-color"]       = isset( $imd_data['imedica-theme-color'] ) ? $imd_data['imedica-theme-color'] : '#107FC9';
		$vars["body-text-color"]           = isset( $imd_data['body-text-color'] ) ? $imd_data['body-text-color'] : '#8c99a9';
		$vars["highlight-text-background"] = isset( $imd_data['highlight-text-background'] ) ? $imd_data['highlight-text-background'] : '#107FC9';
		$vars["highlight-text-color"]      = isset( $imd_data['highlight-text-color'] ) ? $imd_data['highlight-text-color'] : '#ffffff';
		$vars["link-color"]                = isset( $imd_data['link-color'] ) ? $imd_data['link-color'] : '#107FC9';
		$vars["link-hover-color"]          = isset( $imd_data['link-color-hover'] ) ? $imd_data['link-color-hover'] : '#8c99a9';

		$vars["body-text-font-size"]   = isset( $imd_data['main_body_font']['font-size'] ) ? $imd_data['main_body_font']['font-size'] : '13px';
		$vars["body-text-font-weight"] = isset( $imd_data['main_body_font']['font-weight'] ) ? $imd_data['main_body_font']['font-weight'] : '400';
		$vars["body-text-font"]        = isset( $imd_data['main_body_font']['font-family'] ) ? $imd_data['main_body_font']['font-family'] : 'Open Sans';
		$vars["body-text-line-height"] = isset( $imd_data['main_body_font']['line-height'] ) ? $imd_data['main_body_font']['line-height'] : '23px';

		// Heading - H1
		$vars["heading-font-family"] = isset( $imd_data['page_heading_font']['font-family'] ) ? $imd_data['page_heading_font']['font-family'] : 'Open Sans';
		$vars["heading-font-size"]   = isset( $imd_data['page_heading_font']['font-size'] ) ? $imd_data['page_heading_font']['font-size'] : '37px';
		$vars["heading-font-weight"] = isset( $imd_data['page_heading_font']['font-weight'] ) ? $imd_data['page_heading_font']['font-weight'] : '300';
		$vars["heading-line-height"] = isset( $imd_data['page_heading_font']['line-height'] ) ? $imd_data['page_heading_font']['line-height'] : '48px';

		// Heading - H2
		$vars["h2-heading-font-family"] = isset( $imd_data['page_heading_font_h2']['font-family'] ) ? $imd_data['page_heading_font_h2']['font-family'] : 'Open Sans';
		$vars["h2-heading-font-size"]   = isset( $imd_data['page_heading_font_h2']['font-size'] ) ? $imd_data['page_heading_font_h2']['font-size'] : '23px';
		$vars["h2-heading-font-weight"] = isset( $imd_data['page_heading_font_h2']['font-weight'] ) ? $imd_data['page_heading_font_h2']['font-weight'] : '300';
		$vars["h2-heading-line-height"] = isset( $imd_data['page_heading_font_h2']['line-height'] ) ? $imd_data['page_heading_font_h2']['line-height'] : '35px';

		// Heading - h3
		$vars["h3-heading-font-family"] = isset( $imd_data['page_heading_font_h3']['font-family'] ) ? $imd_data['page_heading_font_h3']['font-family'] : 'Open Sans';
		$vars["h3-heading-font-size"]   = isset( $imd_data['page_heading_font_h3']['font-size'] ) ? $imd_data['page_heading_font_h3']['font-size'] : '21px';
		$vars["h3-heading-font-weight"] = isset( $imd_data['page_heading_font_h3']['font-weight'] ) ? $imd_data['page_heading_font_h3']['font-weight'] : '300';
		$vars["h3-heading-line-height"] = isset( $imd_data['page_heading_font_h3']['line-height'] ) ? $imd_data['page_heading_font_h3']['line-height'] : '30px';

		// Heading - h4
		$vars["h4-heading-font-family"] = isset( $imd_data['page_heading_font_h4']['font-family'] ) ? $imd_data['page_heading_font_h4']['font-family'] : 'Open Sans';
		$vars["h4-heading-font-size"]   = isset( $imd_data['page_heading_font_h4']['font-size'] ) ? $imd_data['page_heading_font_h4']['font-size'] : '16px';
		$vars["h4-heading-font-weight"] = isset( $imd_data['page_heading_font_h4']['font-weight'] ) ? $imd_data['page_heading_font_h4']['font-weight'] : '300';
		$vars["h4-heading-line-height"] = isset( $imd_data['page_heading_font_h4']['line-height'] ) ? $imd_data['page_heading_font_h4']['line-height'] : '20px';

		// Heading - h5
		$vars["h5-heading-font-family"] = isset( $imd_data['page_heading_font_h5']['font-family'] ) ? $imd_data['page_heading_font_h5']['font-family'] : 'Open Sans';
		$vars["h5-heading-font-size"]   = isset( $imd_data['page_heading_font_h5']['font-size'] ) ? $imd_data['page_heading_font_h5']['font-size'] : '15px';
		$vars["h5-heading-font-weight"] = isset( $imd_data['page_heading_font_h5']['font-weight'] ) ? $imd_data['page_heading_font_h5']['font-weight'] : '300';
		$vars["h5-heading-line-height"] = isset( $imd_data['page_heading_font_h5']['line-height'] ) ? $imd_data['page_heading_font_h5']['line-height'] : '18px';

		// Heading - h6
		$vars["h6-heading-font-family"] = isset( $imd_data['page_heading_font_h6']['font-family'] ) ? $imd_data['page_heading_font_h6']['font-family'] : 'Open Sans';
		$vars["h6-heading-font-size"]   = isset( $imd_data['page_heading_font_h6']['font-size'] ) ? $imd_data['page_heading_font_h6']['font-size'] : '13px';
		$vars["h6-heading-font-weight"] = isset( $imd_data['page_heading_font_h6']['font-weight'] ) ? $imd_data['page_heading_font_h6']['font-weight'] : '300';
		$vars["h6-heading-line-height"] = isset( $imd_data['page_heading_font_h6']['line-height'] ) ? $imd_data['page_heading_font_h6']['line-height'] : '15px';

		// Main header
		$vars["main-header-bg-color"] = isset( $imd_data['main-header-bg-color']['color'] ) ? $imd_data['main-header-bg-color']['color'] : '#ffffff';
		$vars["main-header-bg-alpha"] = isset( $imd_data['main-header-bg-color']['alpha'] ) ? $imd_data['main-header-bg-color']['alpha'] : '1';

		// Top header bar
		$vars["top-header-color"]            = isset( $imd_data['top-header-color'] ) ? $imd_data['top-header-color'] : '#b2b2b2';
		$vars["top-header-bg-color"]         = isset( $imd_data['top-header-bg-color']['color'] ) ? $imd_data['top-header-bg-color']['color'] : '#fefefe';
		$vars["top-header-bg-alpha"]         = isset( $imd_data['top-header-bg-color']['alpha'] ) ? $imd_data['top-header-bg-color']['alpha'] : '1';
		$vars["top-header-link-hover-color"] = isset( $imd_data['top-header-link-hover-color'] ) ? $imd_data['top-header-link-hover-color'] : '#267FC9';

		//parent menu  -
		// parent - Font family - 
		$vars["imd-menu-parent-font"] = isset( $imd_data['imd-menu-parent-font']['font-family'] ) ? $imd_data['imd-menu-parent-font']['font-family'] : 'Open Sans';
		// parent - Font size - 
		$vars["imd-menu-parent-fontsize"] = isset( $imd_data['imd-menu-parent-font']['font-size'] ) ? $imd_data['imd-menu-parent-font']['font-size'] : '15px';
		// parent - Font size - 
		$vars["imd-menu-parent-fontweight"] = isset( $imd_data['imd-menu-parent-font']['font-weight'] ) ? $imd_data['imd-menu-parent-font']['font-weight'] : '600';
		// parent - Font color - 
		$vars["imd-menu-parent-fontColor"] = isset( $imd_data['imd-menu-parent-fontColor'] ) ? $imd_data['imd-menu-parent-fontColor'] : '#333';
		// parent - background color - 
		$vars["imd-menu-parent-bkColor"]       = isset( $imd_data['imd-parent-menu-bg-color']['color'] ) ? $imd_data['imd-parent-menu-bg-color']['color'] : '#fff';
		$vars["imd-menu-parent-bkColor-alpha"] = isset( $imd_data['imd-parent-menu-bg-color']['alpha'] ) ? $imd_data['imd-parent-menu-bg-color']['alpha'] : '1';
		// parent - background hover color - 
		$vars["imd-menu-parent-hover-bkColor"]       = isset( $imd_data['imd-parent-menu-hover-bg-color']['color'] ) ? $imd_data['imd-parent-menu-hover-bg-color']['color'] : '#fff';
		$vars["imd-menu-parent-hover-bkColor-alpha"] = isset( $imd_data['imd-parent-menu-hover-bg-color']['alpha'] ) ? $imd_data['imd-parent-menu-hover-bg-color']['alpha'] : '1';
		// parent - Font hover color
		$vars["imd-menu-parent-hover-fontColor"] = isset( $imd_data['imd-menu-parent-hover-fontColor'] ) ? $imd_data['imd-menu-parent-hover-fontColor'] : '#107FC9';
		// menu parent border color
		$vars["imd-menu-parent-borderColor"] = isset( $imd_data['imd-menu-parent-borderColor'] ) ? $imd_data['imd-menu-parent-borderColor'] : '#107FC9';


		//sub menu
		// sub menu - Font size - 
		$vars["imd-menu-submenu-font"] = isset( $imd_data['imd-menu-submenu-font']['font-family'] ) ? $imd_data['imd-menu-submenu-font']['font-family'] : 'Open Sans';
		// sub menu - Font size - 
		$vars["imd-menu-submenu-fontsize"] = isset( $imd_data['imd-menu-submenu-font']['font-size'] ) ? $imd_data['imd-menu-submenu-font']['font-size'] : '13px';
		// sub menu - Font size - 
		$vars["imd-menu-submenu-fontweight"] = isset( $imd_data['imd-menu-submenu-font']['font-weight'] ) ? $imd_data['imd-menu-submenu-font']['font-weight'] : '400';
		// sub menu - line height - 
		$vars["imd-menu-submenu-lineheight"] = isset( $imd_data['imd-menu-submenu-font']['line-height'] ) ? $imd_data['imd-menu-submenu-font']['line-height'] : '20px';
		// sub menu - font color - 
		$vars["imd-menu-submenu-fontColor"] = isset( $imd_data['imd-menu-submenu-fontColor'] ) ? $imd_data['imd-menu-submenu-fontColor'] : '#4d4d4d';
		// sub menu - font hover color - 
		$vars["imd-menu-submenu-hover-fontColor"] = isset( $imd_data['imd-menu-submenu-hover-fontColor'] ) ? $imd_data['imd-menu-submenu-hover-fontColor'] : '#107FC9';
		// sub menu - background color - 
		$vars["imd-menu-submenu-bkColor"] = isset( $imd_data['imd-menu-submenu-bg-color'] ) ? $imd_data['imd-menu-submenu-bg-color'] : '#fff';
		// sub menu - background hover color - 
		$vars["imd-menu-submenu-hover-bkColor"] = isset( $imd_data['imd-menu-submenu-hover-bg-color'] ) ? $imd_data['imd-menu-submenu-hover-bg-color'] : '#F8F8F8';
		// sub menu border bottom color
		$vars["imd-semu-submenu-border-color"] = isset( $imd_data['imd-menu-submenu-borderColor'] ) ? $imd_data['imd-menu-submenu-borderColor'] : '#F1F2F2';
		$vars["imedica-submenu-width"]         = isset( $imd_data['imedica-submenu-width'] ) ? $imd_data['imedica-submenu-width'] . 'px' : '176px';

		//mega menu column
		// mega menu column font 
		$vars["imd-mega-menu-col-title-font"]       = isset( $imd_data["imd-mega-menu-col-title-font"]["font-family"] ) ? $imd_data["imd-mega-menu-col-title-font"]["font-family"] : 'Open Sans';
		$vars["imd-mega-menu-col-title-fontSize"]   = isset( $imd_data["imd-mega-menu-col-title-font"]["font-size"] ) ? $imd_data["imd-mega-menu-col-title-font"]['font-size'] : '14px';
		$vars["imd-mega-menu-col-title-fontWeight"] = isset( $imd_data["imd-mega-menu-col-title-font"]["font-weight"] ) ? $imd_data["imd-mega-menu-col-title-font"]["font-weight"] : '600';
		$vars["imd-mega-menu-col-title-lineheight"] = isset( $imd_data['imd-menu-submenu-font']['line-height'] ) ? $imd_data['imd-menu-submenu-font']['line-height'] : '20px';
		$vars["imd-mega-menu-col-title-color"]      = isset( $imd_data["imd-mega-menu-col-title-color"] ) ? $imd_data["imd-mega-menu-col-title-color"] : '#414042';
		
		//Mobile Menu
		//Mobile Menu Icons color
		$vars["imd-mob-menu-icon-color"]      = isset( $imd_data["imd-mob-menu-icon-color"] ) ? $imd_data["imd-mob-menu-icon-color"] : '#333333';

		//Mobile menu background color
		$vars["imd-mob-submenu-bg-color"]      = isset( $imd_data["imd-mob-submenu-bg-color"] ) ? $imd_data["imd-mob-submenu-bg-color"] : '#303030';

		//Mobile menu text color
		$vars["imd-mob-text-color"]      = isset( $imd_data["imd-mob-text-color"] ) ? $imd_data["imd-mob-text-color"] : '#E0E0E0';
		//Mobile menu text hover color
		$vars["imd-mob-text-hoverColor"]      = isset( $imd_data["imd-mob-text-hoverColor"] ) ? $imd_data["imd-mob-text-hoverColor"] : '#107FC9';


		// Footer
		$vars["footer-background-color-main"]  = isset( $imd_data['footer-background-color-main']['color'] ) ? $imd_data['footer-background-color-main']['color'] : '#363839';
		$vars["footer-background-color-alpha"] = isset( $imd_data['footer-background-color-main']['alpha'] ) ? $imd_data['footer-background-color-main']['alpha'] : '1';
		$vars["footer-color-main"]             = isset( $imd_data['footer-color-main'] ) ? $imd_data['footer-color-main'] : '#fff';
		$vars["footer-background-color-small"] = isset( $imd_data['footer-background-color-small']['color'] ) ? $imd_data['footer-background-color-small']['color'] : '#2F3232';
		$vars["footer-background-small-alpha"] = isset( $imd_data['footer-background-color-small']['alpha'] ) ? $imd_data['footer-background-color-small']['alpha'] : '1';
		$vars["footer-color-small"]            = isset( $imd_data['footer-color-small'] ) ? $imd_data['footer-color-small'] : '#fff';
		$vars["footer-color-hover"]            = isset( $imd_data['footer-color-hover'] ) ? $imd_data['footer-color-hover'] : '#fff';

		// Page title bar
		$vars["title_color_bg"]           = isset( $imd_data["page-header-color-bg"]["color"] ) ? $imd_data["page-header-color-bg"]["color"] : '#F8F8F8';
		$vars["title_color_bg_alpha"]     = isset( $imd_data["page-header-color-bg"]["alpha"] ) ? $imd_data["page-header-color-bg"]["alpha"] : '1';
		$vars["title_bg_img"]             = isset( $imd_data["page-header-color-bg-img"]["url"] ) ? 'url("' . $imd_data["page-header-color-bg-img"]["url"] . '")' : '';
		$vars["imedica_header_bg_size"]   = isset( $imd_data["imedica-header-bg-size"] ) ? $imd_data["imedica-header-bg-size"] : 'cover';
		$vars["imedica_header_bg_repeat"] = isset( $imd_data["imedica-header-bg-repeat"] ) ? $imd_data["imedica-header-bg-repeat"] : 'no-repeat';
		$vars["imedica_header_bg_pos"]    = isset( $imd_data["imedica-header-bg-pos"] ) ? $imd_data["imedica-header-bg-pos"] : 'center';
		$vars["title_text_font_family"]   = isset( $imd_data["imedica-page-header-title"]["font-family"] ) ? $imd_data["imedica-page-header-title"]["font-family"] : 'Open Sans';
		$vars["title_text_font_size"]     = isset( $imd_data["imedica-page-header-title"]["font-size"] ) ? $imd_data["imedica-page-header-title"]["font-size"] : '25px';
		$vars["title_text_font_weight"]   = isset( $imd_data["imedica-page-header-title"]["font-weight"] ) ? $imd_data["imedica-page-header-title"]["font-weight"] : '400';
		$vars["title_text_color"]         = isset( $imd_data["imedica-page-header-title"]["color"] ) ? $imd_data["imedica-page-header-title"]["color"] : '#333';

		$vars["imedica-pageheader-overlay"]       = isset( $imd_data["imedica-pageheader-overlay"]["color"] ) ? $imd_data["imedica-pageheader-overlay"]["color"] : '#F8F8F8';
		$vars["imedica-pageheader-overlay_alpha"] = isset( $imd_data["imedica-pageheader-overlay"]["alpha"] ) ? $imd_data["imedica-pageheader-overlay"]["alpha"] : '0.1';


		$vars["breadcrumb_color"]       = isset( $imd_data["imedica-page-header-breadcrumb"]["color"] ) ? $imd_data["imedica-page-header-breadcrumb"]["color"] : '#666666';
		$vars["breadcrumb_font_family"] = isset( $imd_data["imedica-page-header-breadcrumb"]["font-family"] ) ? $imd_data["imedica-page-header-breadcrumb"]["font-family"] : 'Open Sans';
		$vars["breadcrumb_font_size"]   = isset( $imd_data["imedica-page-header-breadcrumb"]["font-size"] ) ? $imd_data["imedica-page-header-breadcrumb"]["font-size"] : '12px';
		$vars["breadcrumb_font_weight"] = isset( $imd_data["imedica-page-header-breadcrumb"]["font-weight"] ) ? $imd_data["imedica-page-header-breadcrumb"]["font-weight"] : '300';
		$vars["breadcrumb_hover_color"] = isset( $imd_data["imedica-breadcrumbs-hover-color"] ) ? $imd_data["imedica-breadcrumbs-hover-color"] : '#b2b2b2';

		$vars['page-header-padding-top']    = isset( $imd_data['imedica-page-header-spacing']['padding-top'] ) ? $imd_data['imedica-page-header-spacing']['padding-top'] : '24px';
		$vars['page-header-padding-bottom'] = isset( $imd_data['imedica-page-header-spacing']['padding-bottom'] ) ? $imd_data['imedica-page-header-spacing']['padding-bottom'] : '24px';


		// Sidebar
		$vars['sidebar-title-color']      = isset( $imd_data['sidebar-title-color'] ) ? $imd_data['sidebar-title-color'] : '#414042';
		$vars['sidebar-link-color']       = isset( $imd_data['sidebar-link-color'] ) ? $imd_data['sidebar-link-color'] : '#8C99A9';
		$vars['sidebar-link-color-hover'] = isset( $imd_data['sidebar-link-color-hover'] ) ? $imd_data['sidebar-link-color-hover'] : '#107FC9';
		$vars['sidebar-background-color'] = isset( $imd_data['sidebar-background-color']['color'] ) ? $imd_data['sidebar-background-color']['color'] : '#FFF';
		$vars['sidebar-background-alpha'] = isset( $imd_data['sidebar-background-color']['alpha'] ) ? $imd_data['sidebar-background-color']['alpha'] : '1';

		$vars['sidebar-padding-top']    = isset( $imd_data['sidebar-padding']['padding-top'] ) ? $imd_data['sidebar-padding']['padding-top'] : '0';
		$vars['sidebar-padding-right']  = isset( $imd_data['sidebar-padding']['padding-right'] ) ? $imd_data['sidebar-padding']['padding-right'] : '15px';
		$vars['sidebar-padding-bottom'] = isset( $imd_data['sidebar-padding']['padding-bottom'] ) ? $imd_data['sidebar-padding']['padding-bottom'] : '0';
		$vars['sidebar-padding-left']   = isset( $imd_data['sidebar-padding']['padding-left'] ) ? $imd_data['sidebar-padding']['padding-left'] : '15px';

		$vars['sidebar-border-color']  = isset( $imd_data['sidebar-border']['border-color'] ) ? $imd_data['sidebar-border']['border-color'] : '#ddd';
		$vars['sidebar-border-style']  = isset( $imd_data['sidebar-border']['border-style'] ) ? $imd_data['sidebar-border']['border-style'] : 'solid';
		$vars['sidebar-border-top']    = isset( $imd_data['sidebar-border']['border-top'] ) ? $imd_data['sidebar-border']['border-top'] : '0';
		$vars['sidebar-border-right']  = isset( $imd_data['sidebar-border']['border-right'] ) ? $imd_data['sidebar-border']['border-right'] : '0';
		$vars['sidebar-border-bottom'] = isset( $imd_data['sidebar-border']['border-bottom'] ) ? $imd_data['sidebar-border']['border-bottom'] : '0';
		$vars['sidebar-border-left']   = isset( $imd_data['sidebar-border']['border-left'] ) ? $imd_data['sidebar-border']['border-left'] : '0';


		$vars['sidebar-border-right-color']  = isset( $imd_data['sidebar-border-right']['border-color'] ) ? $imd_data['sidebar-border-right']['border-color'] : '#ddd';
		$vars['sidebar-border-right-style']  = isset( $imd_data['sidebar-border-right']['border-style'] ) ? $imd_data['sidebar-border-right']['border-style'] : 'solid';
		$vars['sidebar-border-right-top']    = isset( $imd_data['sidebar-border-right']['border-top'] ) ? $imd_data['sidebar-border-right']['border-top'] : '0';
		$vars['sidebar-border-right-right']  = isset( $imd_data['sidebar-border-right']['border-right'] ) ? $imd_data['sidebar-border-right']['border-right'] : '0';
		$vars['sidebar-border-right-bottom'] = isset( $imd_data['sidebar-border-right']['border-bottom'] ) ? $imd_data['sidebar-border-right']['border-bottom'] : '0';
		$vars['sidebar-border-right-left']   = isset( $imd_data['sidebar-border-right']['border-left'] ) ? $imd_data['sidebar-border-right']['border-left'] : '0';

		$vars['imedica-sidebar-widget-spacing'] = isset( $imd_data['imedica-sidebar-widget-spacing'] ) ? $imd_data['imedica-sidebar-widget-spacing'] . 'px' : '40px';

		$vars['sidebar-horizontal-seperator-color']  = isset( $imd_data['sidebar-horizontal-seperator']['border-color'] ) ? $imd_data['sidebar-horizontal-seperator']['border-color'] : 'ddd';
		$vars['sidebar-horizontal-seperator-style']  = isset( $imd_data['sidebar-horizontal-seperator']['border-style'] ) ? $imd_data['sidebar-horizontal-seperator']['border-style'] : 'solid';
		$vars['sidebar-horizontal-seperator-bottom'] = isset( $imd_data['sidebar-horizontal-seperator']['border-bottom'] ) ? $imd_data['sidebar-horizontal-seperator']['border-bottom'] : '0';
		$vars['imedica_layout']         = isset( $imd_data['imedica_layout'] ) ? $imd_data['imedica_layout'] : '';

		$footer_seperater_width = isset( $imd_data['footer-border-width'] ) ? $imd_data['footer-border-width'] : '1';
		$page_layout            = isset( $imd_data['imedica_layout'] ) ? $imd_data['imedica_layout'] : '';
		$layout_style           = '';
		$content_max_width      = isset( $imd_data['imedica-content-width'] ) && $imd_data['imedica-content-width'] !== "" ? $imd_data['imedica-content-width'] : '';

		if ( ( $page_layout == "container-box" && $content_max_width !== '' ) ) {
			$layout_style = isset( $content_max_width ) && $content_max_width !== "" ? $content_max_width : '';
		} elseif ( $page_layout == "container" ) {
			$box_width    = isset( $imd_data["imedica-box-width"] ) ? $imd_data["imedica-box-width"] : '';
			$layout_style = isset( $box_width ) && $box_width !== "" ? $box_width : '';
		} elseif( $page_layout == "container-padded") {
			// This condition applied for Padded template
			$vars['imedica-padded-template'] = '30px';
		}

		$vars['box_top_bottom_margin']    = isset( $imd_data["box-margin-topbottom"] ) ? $imd_data["box-margin-topbottom"] : '0';

		/* Style for Padded layout */
		$vars['imedica-padded-body-bg-color'] = isset( $imd_data['imedica-padded-body-bg-color']['color'] ) ? $imd_data['imedica-padded-body-bg-color']['color'] : '#FFFFFF';
		$vars['imedica-padded-body-bg-opacity'] = isset( $imd_data['imedica-padded-body-bg-color']['alpha'] ) ? $imd_data['imedica-padded-body-bg-color']['alpha'] : '1';

		$vars['imedica-padded-bg-color'] = isset( $imd_data['imedica-padded-bg-color']['color'] ) ? $imd_data['imedica-padded-bg-color']['color'] : '#F6F6F6';
		$vars['imedica-padded-bg-opacity'] = isset( $imd_data['imedica-padded-bg-color']['alpha'] ) ? $imd_data['imedica-padded-bg-color']['alpha'] : '1';
		
		$vars['imedica-padded-bg-img']   = isset( $imd_data['imedica-padded-bg-img']['url'] ) && trim( $imd_data['imedica-padded-bg-img']['url'] ) !== "" ? 'url("' . $imd_data['imedica-padded-bg-img']['url'] . '")' : "";
		$vars['imd-padded-bg-img-repeat']      = isset( $imd_data['imd-padded-bg-img-repeat'] ) ? $imd_data['imd-padded-bg-img-repeat'] : 'repeat';
		/* Style Closed for Padded layout */

		if ( $footer_seperater_width == 1 ) {
			$vars['footer-sep-width'] = 'auto';
			$vars['footer-sep-margin-left'] = '-15px';
			$vars['footer-sep-margin-right'] = '-15px';
		} else {
			$vars['footer-sep-width'] = $layout_style . 'px;';
			$vars['footer-sep-margin-left'] = 'auto';
			$vars['footer-sep-margin-right'] = 'auto';
		}

		$vars['footer-seperator-color'] = isset( $imd_data['footer-seperator']['border-color'] ) ? $imd_data['footer-seperator']['border-color'] : 'ddd';
		$vars['footer-seperator-style'] = isset( $imd_data['footer-seperator']['border-style'] ) ? $imd_data['footer-seperator']['border-style'] : 'solid';
		$vars['footer-seperator-top']   = isset( $imd_data['footer-seperator']['border-top'] ) ? $imd_data['footer-seperator']['border-top'] : '0';


		$small_footer_seperater_width = isset( $imd_data['small-footer-border-width'] ) ? $imd_data['small-footer-border-width'] : '1';
		$page_layout                  = isset( $imd_data['imedica_layout'] ) ? $imd_data['imedica_layout'] : '';

		if ( $small_footer_seperater_width == 1 ) {
			$vars['small-footer-sep-width'] = 'auto';
			$vars['small-footer-sep-margin-left'] = '-15px';
			$vars['small-footer-sep-margin-right'] = '-15px';
		} else {
			$vars['small-footer-sep-width'] = $layout_style . 'px;';
			$vars['small-footer-sep-margin-left'] = 'auto';
			$vars['small-footer-sep-margin-right'] = 'auto';
		}
		$vars['small-footer-seperator-color'] = isset( $imd_data['small-footer-seperator']['border-color'] ) ? $imd_data['small-footer-seperator']['border-color'] : 'ddd';
		$vars['small-footer-seperator-style'] = isset( $imd_data['small-footer-seperator']['border-style'] ) ? $imd_data['small-footer-seperator']['border-style'] : 'solid';
		$vars['small-footer-seperator-top']   = isset( $imd_data['small-footer-seperator']['border-top'] ) ? $imd_data['small-footer-seperator']['border-top'] : '0';


		$vars['footer-spacing-top']    = isset( $imd_data['footer-spacing']['padding-top'] ) ? $imd_data['footer-spacing']['padding-top'] : '65px;';
		$vars['footer-spacing-bottom'] = isset( $imd_data['footer-spacing']['padding-bottom'] ) ? $imd_data['footer-spacing']['padding-bottom'] : '50px;';

		$vars['toggle-height-sticky'] = isset( $imd_data['toggle-height-sticky'] ) ? $imd_data['toggle-height-sticky'] : false;
		$vars['sticky-width-box'] = isset( $imd_data['sticky-width-box'] ) ? $imd_data['sticky-width-box'] : false;

		$vars['custom-height-sticky'] = isset( $imd_data['custom-height-sticky'] ) ? $imd_data['custom-height-sticky'] : '70';

		$vars['round-scroll-to-top'] = isset( $imd_data['round-scroll-to-top'] ) ? $imd_data['round-scroll-to-top'] : false;

		//New vars for Updated Small options
		$vars['imd_footer_left_section']  = isset( $imd_data['imd_footer_left_section'] ) ? $imd_data['imd_footer_left_section'] : 'custom';
		$vars['imd_footer_right_section']  = isset( $imd_data['imd_footer_right_section'] ) ? $imd_data['imd_footer_right_section'] : 'menu';

		$vars['left-footer-credits']  = isset( $imd_data['left-footer-credits'] ) ? $imd_data['left-footer-credits'] : '';
		$vars['right-footer-credits']  = isset( $imd_data['right-footer-credits'] ) ? $imd_data['right-footer-credits'] : '';

		// New vars for Search layout
		$vars['imd-search-layout']  = isset( $imd_data['imd-search-layout'] ) ? $imd_data['imd-search-layout'] : 'style1';

		// New footer type option for Page & Simple
		$vars['imd_footer_type']  = isset( $imd_data['imd_footer_type'] ) ? $imd_data['imd_footer_type'] : 'simple';
		$vars['imd_footer_page']  = isset( $imd_data['imd_footer_page'] ) ? $imd_data['imd_footer_page'] : '';

		// mobile menu options
		$vars["imd-mob-social-text-color"] = isset( $imd_data['imd-mob-social-text-color'] ) ? $imd_data['imd-mob-social-text-color'] : '#4C4D4E';
		$vars["imd-mob-social-text-hoverColor"] = isset( $imd_data['imd-mob-social-text-hoverColor'] ) ? $imd_data['imd-mob-social-text-hoverColor'] : '#4C4D4E';
		$vars["imd-mob-social-bg-color"] = isset( $imd_data['imd-mob-social-bg-color'] ) ? $imd_data['imd-mob-social-bg-color'] : '#EEE';


		if ( $vars['round-scroll-to-top'] == true ) {
			$vars["scroll-to-top-radius"] = '50%';
		} else {
			$vars["scroll-to-top-radius"] = '2px';
		}

		return $vars;
	}
}