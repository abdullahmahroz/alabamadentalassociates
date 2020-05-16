<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage iMedica
 * @since iMedica 1.0
 */
global $imedica_opts;
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php get_template_directory_uri(); ?>/all-ie-only.css">
	<![endif]-->
	<?php if ( isset( $imedica_opts['imedica_favicon']['url'] ) ) { ?>
		<link rel="shortcut icon"
		      href="<?php echo esc_url( $imedica_opts['imedica_favicon']['url'] ); ?>"/><!-- favicon -->
	<?php }
	if ( isset( $imedica_opts['imedica_iphone_icon']['url'] ) && $imedica_opts['imedica_iphone_icon']['url'] !== "" ) { ?>
		<link rel="apple-touch-icon" type="image/png"
		      href="<?php echo esc_url( $imedica_opts['imedica_iphone_icon']['url'] ); ?>"><!-- iPhone -->
	<?php }
	if ( isset( $imedica_opts['imedica_ipad_icon']['url'] ) && $imedica_opts['imedica_ipad_icon']['url'] !== "" ) { ?>
		<link rel="apple-touch-icon" type="image/png" sizes="72x72"
		      href="<?php echo esc_url( $imedica_opts['imedica_ipad_icon']['url'] ); ?>"><!-- iPad -->
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>"/>
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php $logo_height = isset( $imedica_opts['imedica_logo']["height"] ) ? $imedica_opts['imedica_logo']["height"] : ''; ?>
	<?php wp_head(); ?>
	<?php
	echo isset( $imedica_opts['imedica-before-head'] ) && $imedica_opts['imedica-before-head'] !== "" ? $imedica_opts['imedica-before-head'] : '';
	?>
</head>
<body <?php body_class(); ?>>
<?php
global $imedica_layout, $post;
$test         = $imedica_opts['sidebar-border'];
$page_layout  = $imedica_opts['imedica_layout'];
$layout_style = '';
$box_width    = isset( $imedica_opts['imedica-box-width'] ) ? $imedica_opts['imedica-box-width'] : '';
if ( $page_layout == "container-box" ) {
	$page_layout .= " imd-full-layout";
} elseif ( $page_layout == "container" ) {
	$page_layout .= " imd-box-layout";
	$layout_style = isset( $box_width ) && $box_width !== "" ? 'style="width:' . esc_attr( $box_width ) . 'px;"' : '';
} elseif ( $page_layout == "container-fluid" ) {
	$page_layout .= " imd-fluid-layout";
} else {
	$page_layout .= " imd-full-layout";
}
if ( ! is_404() && ! is_search() && ! is_archive() &&  ! is_home() ) {
	$top_header_display_meta = redux_post_meta( "imedica_opts", $post->ID, "imedica-top-header-display" );
} elseif ( is_home() ) {
	$page_for_posts = (int) get_option( 'page_for_posts' );
	$top_header_display_meta = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-top-header-display" );
}
$top_header         = isset( $imedica_opts['top-header-display'] ) ? $imedica_opts['top-header-display'] : false;
$top_header_display = isset( $top_header_display_meta ) ? $top_header_display_meta : $top_header;
?>
<div id="page" class="<?php echo esc_attr( $page_layout ); ?>" <?php echo esc_attr( $layout_style ); ?>>
	<?php
	global $imedica_layout, $post;
	$layout                     = $imedica_opts['imedica_layout'];
	$imedica_header_layout_page = $sticky_header_page = '';
	if ( ! is_404() && ! is_search() && ! is_archive() ) {
		$imedica_main_header_display = redux_post_meta( "imedica_opts", $post->ID, "imedica-main-header-display" );
		$sticky_header_page = redux_post_meta( "imedica_opts", $post->ID, "imedica-sticky-header" );
		if ( $imedica_main_header_display ) {
			$imedica_header_layout_page = redux_post_meta( "imedica_opts", $post->ID, "imedica_header_layout" );
		}
	}
	//$imedica_header_layout = ( $imedica_header_layout_page ) ? $imedica_header_layout_page : $imedica_opts['imedica_header_layout'];
	$imedica_layout = ( $layout == "container-fluid" ) ? $layout : "container";
	$logo           = isset( $imedica_opts['imedica_logo']["url"] ) ? $imedica_opts['imedica_logo']["url"] : '';
	$sticky_header  = ( $sticky_header_page ) ? $sticky_header_page : $imedica_opts['imedica-sticky-header'];
	if ( ! is_404() && ! is_search() && ! is_archive() ) {
		$landing_page = redux_post_meta( "imedica_opts", $post->ID, "landing_window" );
		if ( isset( $landing_page ) && $landing_page != "" ) {
			$page = get_page( $landing_page );
			?>
			<div class="imedica-row landing-window">
				<div class="container">
					<?php echo do_shortcode( $page->post_content ); ?>
				</div>
			</div>
		<?php
		}
	}
	?>
	<header class="site-header-main">
		<?php if ( $top_header_display ) {
			?>
			<div class="row navbar navbar-default navbar-static-top" role="navigation">
				<div class="imedica-row">
					<div class="imedica-container">
						<?php echo imedica_get_header( 'left' ); ?>
						<?php echo imedica_get_header( 'right' ); ?>
					</div>
				</div>
			</div>
		<?php }

		if ( $sticky_header ) {
			?>
			<!-- Sticky-header -->
			<div class="navbar-inverse navbar-fixed-top header-default header-fixed" role="navigation">
				<div class="imedica-row">
					<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">
						<div class="header-main">
							<h2 class="site-title">
								<?php
								if ( ! empty( $logo ) ) {
									?>
									<a class="site-title site-logo-img" href="<?php echo esc_url( home_url( '/' ) ); ?>"
									   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
									   rel="home"><img src="<?php echo esc_url( $logo ); ?>"
									                   alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/></a>
								<?php } else { ?>
									<a class="navbar-brand-title site-logo"
									   href="<?php echo esc_url( home_url( '/' ) ); ?>"
									   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
										<?php bloginfo( 'name' ); ?>
									</a>
								<?php } ?>
							</h2>
							<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
								<button class="menu-toggle">
									<?php _e( 'Top Menu', 'imedica' ); ?>
								</button>
								<a class="screen-reader-text skip-link" href="#content">
									<?php _e( 'Skip to content', 'imedica' ); ?>
								</a>
								<?php wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'menu_class'     => 'nav-menu',
										'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									)
								);
								?>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- Sticky header -->
		<?php } ?>

	</header>
	<div class="theme-showcase" role="main">
		<?php
		$page_title_overlay_style = '';
		if ( is_home() ) {
			$imedica_header_display = 0;
		} else if ( ! is_404() && ! is_search() && ! is_archive() ) {
			global $post;
			$imedica_header_display = redux_post_meta( "imedica_opts", $post->ID, "imedica-header-display" );
			$title_bar_overlay      = redux_post_meta( "imedica_opts", $post->ID, "imedica-pageheader-overlay" );
			if ( isset( $title_bar_overlay ) && isset( $title_bar_overlay['alpha'] ) && isset( $title_bar_overlay['color'] ) ) {
				$page_title_overlay_style = 'opacity:' . $title_bar_overlay['alpha'] . ';background-color:' . $title_bar_overlay['color'];
			}
		} else {
			$imedica_header_display = 1;
		}
		if ($imedica_header_display){
		?>
		<div class="breadcrumbs">
			<div class="page-title-overlay" style=" <?php if ( isset( $page_title_overlay_style ) ) {
				echo esc_attr( $page_title_overlay_style );
			} ?>"></div>
			<?php get_header( 'title-bar' ); ?>
		</div>
<?php }