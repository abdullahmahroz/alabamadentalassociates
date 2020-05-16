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

global $imedica_opts, $imedica_layout, $top_header_menu_status, $top_header_html_pos, $top_header_html_status;
$layout                     = $imedica_opts['imedica_layout'];
$imedica_header_layout_page = '';
$page_for_posts             = (int) get_option( 'page_for_posts' );
if ( ! is_404() && ! is_search() && ! is_archive() && ! is_home() ) {
	$top_header_display_meta = redux_post_meta( "imedica_opts", $post->ID, "imedica-top-header-display" );
} elseif ( is_home() ) {
	$top_header_display_meta = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-top-header-display" );
}
$contatc_no         = isset( $imedica_opts['imedica-phone-number'] ) ? esc_attr( $imedica_opts['imedica-phone-number'] ) : '';
$email_id           = isset( $imedica_opts['imedica-email-id'] ) ? esc_attr( $imedica_opts['imedica-email-id'] ) : '';
$top_header         = isset( $imedica_opts['top-header-display'] ) ? esc_attr( $imedica_opts['top-header-display'] ) : false;
$top_header_display = isset( $top_header_display_meta ) ? $top_header_display_meta : $top_header;
$imedica_layout     = ( $layout == "container-fluid" ) ? $layout : "container";
$logo               = isset( $imedica_opts['imedica_logo'] ) ? esc_attr( $imedica_opts['imedica_logo']["url"] ) : '';
$header_mob_search  = isset( $imedica_opts['imd-mob-menu-search'] ) ? $imedica_opts['imd-mob-menu-search'] : '';
$imd_mob_topmenu    = isset( $imedica_opts['imd-mob-topmenu-class'] ) ? $imedica_opts['imd-mob-topmenu-class'] : 'fa fa-bars';
$imd_mob_icon1      = isset( $imedica_opts['imd-mob-icon1-class'] ) ? $imedica_opts['imd-mob-icon1-class'] : 'fa fa-rocket';
$imd_mob_icon2      = isset( $imedica_opts['imd-mob-icon2-class'] ) ? $imedica_opts['imd-mob-icon2-class'] : 'fa fa-bars';

if ( ! is_404() && ! is_search() && ! is_archive() && ! is_home() ) {
	$imedica_main_header_display = redux_post_meta( "imedica_opts", $post->ID, "imedica-main-header-display" );
	$sticky_header_page          = redux_post_meta( "imedica_opts", $post->ID, "imedica-sticky-header" );
	if ( $imedica_main_header_display ) {
		$imedica_header_layout_page = redux_post_meta( "imedica_opts", $post->ID, "imedica_header_layout" );
	}
} elseif ( is_home() ) {
	$imedica_main_header_display = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-main-header-display" );
	$sticky_header_page          = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-sticky-header" );
	if ( $imedica_main_header_display ) {
		$imedica_header_layout_page = redux_post_meta( "imedica_opts", $page_for_posts, "imedica_header_layout" );
	}
}
$imedica_header_admin  = isset( $imedica_opts['imedica_header_layout'] ) ? $imedica_opts['imedica_header_layout'] : '';
$imedica_header_layout = ( $imedica_header_layout_page ) ? $imedica_header_layout_page : $imedica_header_admin;
if ( $top_header_display ) {
	?>
	<div class="row navbar navbar-default navbar-static-top" role="navigation">
		<div class="imedica-row">
			<div class="container">
				<?php echo imedica_get_header( 'left' ); ?>
				<?php echo imedica_get_header( 'right' ); ?>
			</div>
		</div>
	</div>
<?php } ?>
<!-- blog-masthead -->
<div class="navbar-inverse1 navbar-fixed-top1 header-<?php echo esc_attr( $imedica_header_layout ); ?>"
     role="navigation">
	<div class="row">
		<div class="imedica-container">
			<div class="header-main">
				<div class="header-logo-center col-md-12 col-sm-12 col-xs-4 text-center">
					<div class="site-title">
						<?php
						if ( ! empty( $logo ) ) {
							?>
							<?php if ( ! is_single() ): ?>
								<h1 class="hide"><?php bloginfo( 'name' ); ?></h1>
							<?php endif ?>
							<a class="site-logo-img" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img
									src="<?php echo esc_url( $logo ); ?>"
									alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/></a>
						<?php } else { ?>
							<?php if ( ! is_single() ): ?>
								<h1 class="hide"><?php bloginfo( 'name' ); ?></h1>
							<?php endif ?>
							<a class="navbar-brand-title site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						<?php } ?>
					</div>
				</div>
				<div class="imd-mobile-menu-buttos">
					<?php
					if ( $top_header_menu_status ) {
						?>
						<!-- top menu button -->
						<div class="imd-button-wrap">
							<button class="menu-toggle-top-menu">
								<i class=<?php echo '"' . $imd_mob_topmenu . '"'; ?>></i>
							</button>
						</div>
						<?php
					}
					?>
					<!-- social button -->
					<div class="imd-button-wrap">
						<button class="menu-toggle-imd-top-social icon-rocket">
							<i class=<?php echo '"' . $imd_mob_icon1 . '"'; ?>></i>
						</button>
					</div>
					<!-- main menu toggle -->
					<div class="imd-button-wrap">
						<button class="menu-toggle">
							<i class=<?php echo '"' . $imd_mob_icon2 . '"'; ?>></i>
						</button>
					</div>
				</div>
				<!-- top mobile social menu -->
				<?php
				// user data from backend
				$facebook = isset( $imedica_opts['social-icon-fb'] ) ? $imedica_opts['social-icon-fb'] : '';
				$twitter  = isset( $imedica_opts['social-icon-twitter'] ) ? $imedica_opts['social-icon-twitter'] : '';
				$gplus    = isset( $imedica_opts['social-icon-gplus'] ) ? $imedica_opts['social-icon-gplus'] : '';
				$linkedin = isset( $imedica_opts['social-icon-linkedin'] ) ? $imedica_opts['social-icon-linkedin'] : '';
				$dribbble = isset( $imedica_opts['social-icon-dribbble'] ) ? $imedica_opts['social-icon-dribbble'] : '';
				$rss      = isset( $imedica_opts['social-icon-rss'] ) ? $imedica_opts['social-icon-rss'] : '';
				$custom_social_url  = isset( $imedica_opts['social-icon-custom-url'] ) ? $imedica_opts['social-icon-custom-url'] : '';
				$custom_social_icon = isset( $imedica_opts['social-icon-custom'] ) ? $imedica_opts['social-icon-custom'] : '';

				?>
				<div class="row imd-mobile-social-menu">
					<ul class="imd-social-menu">
						<?php if ( $contatc_no ): ?>
							<li class="imd-phno">
								<div class="imd-social-icon-wrap"><i class="fa fa-phone"></i></div>
								<a href="tel:<?php echo esc_attr( $contatc_no ); ?>"
								   class="top-contact-info"><?php echo esc_attr( $contatc_no ); ?></a></li>
						<?php endif ?>
						<?php if ( $email_id ): ?>
							<?php $email_id = sanitize_email( $email_id ); ?>
							<li class="imd-email-id">
								<div class="imd-social-icon-wrap"><i class="fa fa-envelope-o"></i></div>
								<a href="mailto:<?php echo antispambot( $email_id ); ?>"
								   class="top-contact-info"><?php echo antispambot( $email_id ); ?></a></li>
						<?php endif ?>
						<?php if ( $facebook || $twitter !== '' || $gplus !== '' || $linkedin !== '' || $dribbble !== '' || $rss !== '' ) { ?>
							<li class="imd-social-mobile">
								<div class="imd-social-icon-wrap"><i class="fa fa-globe"></i></div>
								<ul class="top-social-link-mobile">
									<?php if ( $facebook !== '' ) { ?>
										<li><a href="<?php echo esc_url( $facebook ); ?>" class="top-social-icon"
										       target="_blank"><i class="fa fa-facebook"></i></a></li>

									<?php }
									if ( $twitter !== '' ) { ?>
										<li><a href="<?php echo esc_url( $twitter ); ?>" class="top-social-icon"
										       target="_blank"><i
													class="fa fa-twitter"></i></a></li>

									<?php }
									if ( $gplus !== '' ) { ?>
										<li><a href="<?php echo esc_url( $gplus ); ?>" class="top-social-icon"
										       target="_blank"><i
													class="fa fa-google-plus"></i></a></li>

									<?php }
									if ( $linkedin !== '' ) { ?>
										<li><a href="<?php echo esc_url( $linkedin ); ?>" class="top-social-icon"
										       target="_blank"><i class="fa fa-linkedin"></i></a></li>

									<?php }
									if ( $dribbble !== '' ) { ?>
										<li><a href="<?php echo esc_url( $dribbble ); ?>" class="top-social-icon"
										       target="_blank"><i class="fa fa-dribbble"></i></a></li>

									<?php }
									if ( $rss !== '' ) { ?>
										<li><a href="<?php echo esc_url( $rss ); ?>" class="top-social-icon"
										       target="_blank"><i
													class="fa fa-rss"></i></a></li>
									<?php }
									if ( $custom_social_url !== '' ) { ?>
										<li><a target="_blank" href="<?php echo esc_url( $custom_social_url ); ?>"
										       class="top-social-icon"><i
													class="fa <?php echo esc_attr( $custom_social_icon ); ?>"></i></a>
										</li>
									<?php } ?>
								</ul>
							</li> <?php } ?>
						<?php
						if ( $top_header_html_status ) { ?>
							<li class="imd-custom-html">
								<div class="imd-social-icon-wrap"><i class="fa fa-info"></i>
								</div><?php echo $imedica_opts[ 'top-header-' . esc_attr( $top_header_html_pos ) . '-custom-html' ]; ?>
							</li>
						<?php } ?>

						<?php if ( isset( $header_mob_search ) && $header_mob_search == true ) { ?>
							<li class="search">
								<div class="imd-social-icon-wrap"><i class="fa fa-search"></i></div>
								<?php get_search_form( true ); ?>
							</li>
						<?php } ?>

					</ul>
				</div>


			</div>
		</div>
	</div>
	<div class="row site-navigation primary-navigation header-layout1">
		<div class="imedica-row">
			<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">

				<!-- top menu mobile -->
				<div class="mobile-top-menu">
					<?php

					if ( $top_header_menu_status ) {
						?>
						<div class="imedica-top-navigation">
							<?php
							if ( has_nav_menu( 'top-menu' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'top-menu',
										'menu_class'     => 'nav-menu ',
										'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'          => 5,
									)
								);
							} else {
								if ( is_user_logged_in() ) {
									echo '';
									?>
									<div>
										<ul class="nav-menu">
											<li>
												<a href="<?php echo esc_url( admin_url( '/nav-menus.php' ) ); ?>"><?php _e( "Assign Menu", "imedica" ); ?></a>
											</li>
										</ul>
									</div>
								<?php }
							}
							?>
						</div><!--  imedica-top-navigation -->

						<?php
					}
					?>
					<nav id="primary-navigation"
					     class="site-navigation primary-navigation col-md-12 col-sm-12 col-xs-8 text-center"
					     role="navigation">
						<!-- //top menu toggles -->

						<?php
						if ( has_nav_menu( 'primary' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_class'     => 'nav-menu imedica-row header1menu',
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'          => 5,
								)
							);
						} else {
							if ( is_user_logged_in() ) {
								echo '<div class="assign-menu-align"><a href="' . esc_url( admin_url( '/nav-menus.php' ) ) . '"> ' . __( "Assign Menu", "imedica" ) . '</a></div>';
							}
						}
						?>
					</nav>
				</div>
				<!-- mobile-top-menu -->
			</div>
		</div>
	</div>
</div>
