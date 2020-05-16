<?php
global $imedica_opts, $post, $imedica_layout;
$imedica_header_bg_pos = $imedica_header_bg_repeat = $imedica_header_bg_size = $title_bg_img = $title_color_bg = $title_color = $custom_page_title = $title_bar_meta = '';
$page_for_posts = (int) get_option( 'page_for_posts' );
if ( ! is_404() && ! is_search() && ! is_archive() && ! is_home() ) {
	$custom_page_title        = redux_post_meta( "imedica_opts", $post->ID, "custom-page-title" );
	$title_bar_meta           = redux_post_meta( "imedica_opts", $post->ID, "imedica-header" );
	$title_color              = redux_post_meta( "imedica_opts", $post->ID, "page-header-color" );
	$title_color_bg           = redux_post_meta( "imedica_opts", $post->ID, "page-header-color-bg" );
	$title_bg_img             = redux_post_meta( "imedica_opts", $post->ID, "page-header-color-bg-img" );
	$imedica_header_bg_size   = redux_post_meta( "imedica_opts", $post->ID, "imedica-header-bg-size" );
	$imedica_header_bg_repeat = redux_post_meta( "imedica_opts", $post->ID, "imedica-header-bg-repeat" );
	$imedica_header_bg_pos    = redux_post_meta( "imedica_opts", $post->ID, "imedica-header-bg-pos" );
	$title_bar_padding        = redux_post_meta( "imedica_opts", $post->ID, "imedica-page-header-spacing" );
	if ( $title_bar_padding && ( $title_bar_padding['padding-top'] || $title_bar_padding['padding-bottom'] ) ) {
		$title_bar_style_css = 'padding-top:' . $title_bar_padding['padding-top'] . ';padding-bottom:' . $title_bar_padding['padding-bottom'];
	}
	} elseif ( is_home() ) {
		$custom_page_title        = redux_post_meta( "imedica_opts", $page_for_posts, "custom-page-title" );
		$title_bar_meta           = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-header" );
		$title_color              = redux_post_meta( "imedica_opts", $page_for_posts, "page-header-color" );
		$title_color_bg           = redux_post_meta( "imedica_opts", $page_for_posts, "page-header-color-bg" );
		$title_bg_img             = redux_post_meta( "imedica_opts", $page_for_posts, "page-header-color-bg-img" );
		$imedica_header_bg_size   = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-header-bg-size" );
		$imedica_header_bg_repeat = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-header-bg-repeat" );
		$imedica_header_bg_pos    = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-header-bg-pos" );
		$title_bar_padding        = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-page-header-spacing" );
		if ( $title_bar_padding && ( $title_bar_padding['padding-top'] || $title_bar_padding['padding-bottom'] ) ) {
			$title_bar_style_css = 'padding-top:' . $title_bar_padding['padding-top'] . ';padding-bottom:' . $title_bar_padding['padding-bottom'];
		}
	}
$display_title = isset( $imedica_opts['titlebar-options']['title'] ) ? $imedica_opts['titlebar-options']['title']  : '';
$display_breadcrumb = isset( $imedica_opts['titlebar-options']['breadcrumb'] ) ? $imedica_opts['titlebar-options']['breadcrumb']  : '';
$color    = isset( $title_color ) && $title_color !== "" ? 'color:' . $title_color . ';' : '';
$bg_color = isset( $title_color_bg["color"] ) ? $title_color_bg["color"] : '';
$bg_img   = isset( $title_bg_img['url'] ) && $title_bg_img['url'] !== "" ? 'url(' . esc_url( $title_bg_img['url'] ) . ');' : '';
$style    = $color;
$style .= ( $bg_color !== "" || $bg_img !== "" ) ? ' background:' . $bg_color . '' . $bg_img.';' : '';
$style .= isset( $imedica_header_bg_pos ) && $imedica_header_bg_pos !== "" ? 'background-position:' . $imedica_header_bg_pos . ';' : '';
$style .= isset( $imedica_header_bg_repeat ) && $imedica_header_bg_repeat !== "" ? 'background-repeat:' . $imedica_header_bg_repeat . ';' : '';
$style .= isset( $imedica_header_bg_size ) && $imedica_header_bg_size !== "" ? 'background-size:' . $imedica_header_bg_size . ';' : '';
$style .= isset( $title_bar_style_css ) && $title_bar_style_css != "" ? $title_bar_style_css : '';
$title_bar_style = isset( $title_bar_meta ) && $title_bar_meta !== "" ? $title_bar_meta : $imedica_opts["imedica-header-layout"];
?>
<div class="imedica-page-header" style="<?php echo esc_attr( $style ); ?>">
	<div class="imedica-row">
		<div class="imedica-container imd-pagetitle-container">
			<?php
			if ( $title_bar_style == "style1" || $title_bar_style == "" ) { ?>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-left imedica-title">
				<?php
				if ( is_404() ) {
					$title = __( '404 - Page Not Found!', 'imedica' );
				} elseif ( is_search() ) {
					$title = __( 'Search Results for - ', 'imedica' ) . get_search_query();
				} elseif ( is_archive() ) {
					if ( is_author() ) {
						$title = __( 'Author Archive: ', 'imedica' ) . get_the_author();
					} else if ( is_tag() ) {
						$title = __( 'Tag Archive: ', 'imedica' ) . single_tag_title( '', false );
					} else if ( is_category() ) {
						$title = __( 'Category Archive: ', 'imedica' ) . single_cat_title( '', false );
					} else if ( is_date() ) {
						if ( is_day() ) :
							$title = __( 'Daily Archives : ', 'imedica' ) . get_the_date();
						elseif ( is_month() ) :
							$title = __( 'Monthly Archives : ', 'imedica' ) . get_the_date( 'F Y' );
						elseif ( is_year() ) :
							$title = __( 'Yearly Archives : ', 'imedica' ) . get_the_date( 'Y' );
						else :
							$title = __( 'Archives', 'imedica' );
						endif;
					} elseif ( get_post_type() == 'product' ) {
						$title = __( 'Shop', 'imedica' );
					} else {
						$title = single_term_title( '', false );
					}
				} else {
					if ( $custom_page_title !== "" ) {
						$title = $custom_page_title;
					} elseif ( is_home() && get_option( 'page_for_posts' ) ) {
						$blog_page_id = get_option( 'page_for_posts' );
						$title        = get_page( $blog_page_id )->post_title;
					} else {
						$title = $post->post_title;
					}
					
					if ( $title == "" ) {
						$title = $post->post_title;
					}
				}
				if ( $display_title ) {
					echo '<div class="imedica-breadcrumb-title">';
					echo '<h3 class="breadcrumb-heading">' . esc_html( $title ) . '</h3>';
					echo '</div>';
				}					
				?>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 text-right imedica-breadcrumb">
				<?php
				if ( $display_breadcrumb ) {
					if ( function_exists( 'imedica_breadcrumb' ) ) {
						imedica_breadcrumb();
					}
				}					
				?>
			</div>
			<?php } elseif ( $title_bar_style == "style2" ) { ?>
			<div class="col-lg-12 text-center imedica-title">
				<?php
				if ( ! is_404() ) {
					if ( $custom_page_title !== "" ) {
						$title = $custom_page_title;
					} elseif ( is_home() && get_option( 'page_for_posts' ) ) {
						$blog_page_id = get_option( 'page_for_posts' );
						$title        = get_page( $blog_page_id )->post_title;
					} else {
						$title = $post->post_title;
					}
					if ( $display_title ) {
						echo '<div class="imedica-breadcrumb-title">';
						echo '<h3>' . esc_html( $title ) . '</h3>';
						echo '</div>';
					}
				}
				?>
			</div>
			<div class="col-lg-12 text-center imedica-title-sep"><i class="fa fa-chevron-circle-right"></i></div>
			<div class="col-lg-12 text-center imedica-breadcrumb">
				<?php
				if ( function_exists( 'imedica_breadcrumb' ) ) {
					if ( $display_breadcrumb ) {
						imedica_breadcrumb();
					}
				}
				?>
			</div>
			<?php } ?>
		</div>
		<!-- row -->
	</div>
</div>
