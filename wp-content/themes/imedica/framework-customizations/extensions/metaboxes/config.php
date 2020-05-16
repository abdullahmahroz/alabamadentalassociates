<?php
// INCLUDE THIS BEFORE you load your ReduxFramework object config file.
// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = "imedica_opts";
if ( ! function_exists( "imedica_add_metaboxes" ) ):
	function imedica_add_metaboxes( $metaboxes ) {
		$args = array( 'public' => true );
		global $imedica_opts;
		$default_for_page_header = get_option( 'imedica_opts' );
		$page_header_status      = isset($default_for_page_header['imedica-page-header-display']) ? $default_for_page_header['imedica-page-header-display'] : 0;
		$imedica_header_layout   = $default_for_page_header['imedica_header_layout'];
		$top_header_display      = $default_for_page_header['top-header-display'];
		$sticky_header_status	 = $default_for_page_header['imedica-sticky-header'];

		$title_top   = isset( $default_for_page_header['imedica-page-header-spacing']['padding-top'] ) ? $default_for_page_header['imedica-page-header-spacing']['padding-top'] : '24px';
		$title_bottom = isset( $default_for_page_header['imedica-page-header-spacing']['padding-bottom'] ) ? $default_for_page_header['imedica-page-header-spacing']['padding-bottom'] : '24px';

		$output                  = 'names'; // names or objects, note names is the default
		$operator                = 'and'; // 'and' or 'or'
		$post_types              = get_post_types( $args, $output, $operator );
		$post_types              = implode( ",", $post_types );
		$post_types              = explode( ",", $post_types );
		$page_header_default     = $imedica_opts["imedica-header-layout"];
		$boxSections[]           = array(
			'title'  => __( 'Header Settings', 'imedica' ),
			'icon'   => 'el-icon-website',
			'fields' => array(
				array(
					'id'       => 'imedica-top-header-display',
					'type'     => 'switch',
					'title'    => __( 'Top Header Display', 'imedica' ),
					'subtitle' => __( 'Show or hide the top header bar', 'imedica' ),
					'default'  => $top_header_display,
				),
				array(
					'id'       => 'imedica-main-header-display',
					'type'     => 'switch',
					'title'    => __( 'Display logo header on this page', 'imedica' ),
					'subtitle' => __( 'Choose whether you want to display / hide the page header with logo on this page.', 'imedica' ),
					'default'  => true,
					'on'       => 'Display',
					'off'      => 'Hide',
				),
				array(
					'id'       => 'imedica_header_layout',
					'type'     => 'image_select',
					'title'    => __( 'Header Layout', 'imedica' ),
					'subtitle' => __( 'Choose the default header layout for your site.', 'imedica' ),
					'options'  => array(
						'default' => array(
							'alt' => 'Default Layout',
							'img' => ReduxFramework::$_url . '/assets/img/header-1.jpg'
						),
						'layout1' => array(
							'alt' => 'Layout 1',
							'img' => ReduxFramework::$_url . '/assets/img/header-2.jpg'
						),
						'layout2' => array(
							'alt' => 'Layout 2',
							'img' => ReduxFramework::$_url . '/assets/img/header-3.png'
						),
					),
					'default'  => $imedica_header_layout,
					'required' => array( 'imedica-main-header-display', '=', '1' ),
				),
				array(
					'id'       => 'imedica-sticky-header',
					'type'     => 'switch',
					'title'    => __( 'Enable sticky header on this page', 'imedica' ),
					'subtitle' => __( 'Choose whether you want to enable / disable the sticky header on this page.', 'imedica' ),
					'default'  => $sticky_header_status,
					'on'       => 'Enable',
					'off'      => 'Disable',
				),
				array(
					'id'       => 'imedica-top-margin',
					'type'     => 'switch',
					'title'    => __( 'Attach first row to header', 'imedica' ),
					'subtitle' => __( 'Remove space between page header and the first row', 'imedica' ),
					'default'  => false,
				),
				array(
					'id'       => 'landing_window',
					'type'     => 'select',
					'title'    => __( 'Hero Section', 'imedica' ),
					'subtitle' => __( 'You can display content of any other page before this page.', 'imedica' ),
					'options'  => '',
					'data'     => 'pages',
					'default'  => '',
				),
				array(
					'id'       => 'transparent-header',
					'type'     => 'switch',
					'title'    => __( 'Transparent Header', 'imedica' ),
					'subtitle' => __( 'Enable Transparent Header', 'imedica' ),
					'default'  => false,
				),
				array(
					'id'          => 'trans-header-color',
					'type'        => 'color',
					'title'       => __( 'Text Color For Transparent Header', 'imedica' ),
					'desc'        => __( 'Set text color for top header and menu when using transparent header', 'imedica' ),
					'default'     => '',
					'validate'    => 'color',
					'transparent' => false,
					'required'    => array( 'transparent-header', '=', '1' ),
				),
			),
		);
		$boxSections[]           = array(
			'title'  => __( 'Page Title Bar', 'imedica' ),
			'icon'   => 'el-icon-credit-card',
			'fields' => array(
				array(
					'id'       => 'imedica-header-display',
					'type'     => 'switch',
					'title'    => __( 'Page Title Bar', 'imedica' ),
					'subtitle' => __( 'Choose whether you want to display the page title bar on this page or not.', 'imedica' ),
					'default'  => $page_header_status,
				),
				array(
					'id'          => 'imedica-header',
					'title'       => __( 'Select Page Header Section Layout', 'imedica' ),
					'desc'        => 'Please select the header title bar section layout you would like to display on this page.',
					'type'        => 'select',
					'options'     => array(
						"style1" => "Title Bar Default Layout",
						"style2" => "Title Bar Modern Layout"
					),
					'placeholder' => 'Select Page Header Layout',
					'default'     => $page_header_default,
				),
				array(
					'id'      => 'custom-page-title',
					'type'    => 'text',
					'title'   => __( 'Custom Page Title', 'imedica' ),
					'desc'    => __( 'Enter custom page title to be displayed in page title bar.', 'imedica' ),
					'default' => '',
				),
				array(
					'id'          => 'page-header-color',
					'type'        => 'color',
					'title'       => __( 'Page Header Text / Link Color', 'imedica' ),
					'desc'        => __( 'Set text color for Page header bar.', 'imedica' ),
					'default'     => '',
					'validate'    => 'color',
					'transparent' => false,
				),
				array(
					'id'          => 'page-header-color-bg',
					'type'        => 'color_rgba',
					'title'       => __( 'Page Header Background Color', 'imedica' ),
					'desc'        => __( 'Set Background color for page header bar.', 'imedica' ),
					'default'     => '',
					'validate'    => 'colorrgba',
					'transparent' => false,
				),
				array(
					'id'          => 'imedica-pageheader-overlay',
					'type'        => 'color_rgba',
					'title'       => __( 'Page Title overlay color', 'imedica' ),
					'subtitle'    => __( 'Set color and alpha of page header', 'imedica' ),
					'default'     => array(
						'color' => '',
						'alpha' => ''
					),
					'validate'    => 'colorrgba',
					'transparent' => false,
				),
				array(
					'id'             => 'imedica-page-header-spacing',
					'type'           => 'spacing',
					'mode'           => 'padding',
					'units'          => array( 'em', 'px' ),
					'units_extended' => 'false',
					'left'           => 'true',
					'right'          => 'true',
					'title'          => __( 'Spacing options for page header', 'imedica' ),
					'desc'           => __( 'Add custom spacing for page header', 'imedica' ),
					'default'        => array(
						'padding-top'    => $title_top,
						'padding-bottom' => $title_bottom,
						'units'          => 'px',
					)
				),
				array(
					'id'       => 'page-header-color-bg-img',
					'type'     => 'media',
					'url'      => true,
					'title'    => __( 'Page Header Background Image', 'imedica' ),
					'compiler' => 'true',
					'desc'     => __( 'Upload Page Header Background Image or leave blank for no image.', 'imedica' ),
					'subtitle' => __( 'Upload any media using the WordPress native uploader', 'imedica' ),
					'default'  => '',
				),
				array(
					'id'          => 'imedica-header-bg-size',
					'title'       => __( 'Select Page Header Background Size', 'imedica' ),
					'desc'        => 'Please select the header title bar background size.',
					'type'        => 'select',
					'options'     => array( "contain" => "Contain", "cover" => "Cover", "initial" => "Initial" ),
					'placeholder' => 'Select Background Size',
					'default'     => "",
				),
				array(
					'id'          => 'imedica-header-bg-repeat',
					'title'       => __( 'Select Page Header Background Repeat', 'imedica' ),
					'desc'        => 'Please select the header title bar background repeat option.',
					'type'        => 'select',
					'options'     => array(
						"repeat"    => "Repeat",
						"repeat-x"  => "Repeat X",
						"repeat-y"  => "Repeat Y",
						"no-repeat" => "No Repeat"
					),
					'placeholder' => 'Select Background Repeat Option',
					'default'     => "",
				),
				array(
					'id'          => 'imedica-header-bg-pos',
					'title'       => __( 'Select Page Header Background Position', 'imedica' ),
					'desc'        => 'Please select the header title bar background position.',
					'type'        => 'select',
					'options'     => array(
						"left"   => "Left",
						"right"  => "Right",
						"top"    => "Top",
						"bottom" => "Bottom",
						"center" => "Center"
					),
					'placeholder' => 'Select Background Position',
					'default'     => "",
				),
			)
		);

		$boxSections[] = array(
			'title'  => __( 'Footer Settings', 'imedica' ),
			'icon'   => 'el-icon-photo',
			'fields' => array(
				array(
					'id'       => 'imedica-footer-display',
					'type'     => 'switch',
					'title'    => __( 'Display footer on this page', 'imedica' ),
					'subtitle' => __( 'Choose whether you want to display / hide the page footer area on this page.', 'imedica' ),
					'default'  => true,
					'on'       => 'Display',
					'off'      => 'Hide',
				),
				array(
					'id'       => 'imedica-smallfooter-display',
					'type'     => 'switch',
					'title'    => __( 'Display Small footer on this page', 'imedica' ),
					'subtitle' => __( 'Choose whether you want to display / hide the footer area with copyright information.', 'imedica' ),
					'default'  => true,
					'on'       => 'Display',
					'off'      => 'Hide',
				),
			),
		);

		$metaboxes   = array();
		$metaboxes[] = array(
			'id'         => 'imedica-meta-options',
			'title'      => __( 'iMedica Options', 'imedica' ),
			'post_types' => $post_types,//array('page','post'),
			'position'   => 'normal', // normal, advanced, side
			'priority'   => 'default', // high, core, default, low
			'sections'   => $boxSections
		);
		return $metaboxes;
	}

	add_action( 'redux/metaboxes/' . $redux_opt_name . '/boxes', 'imedica_add_metaboxes' );
endif;