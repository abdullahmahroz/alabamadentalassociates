<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */
global $imedica_opts, $blog_layout, $cls;
die('callhome');
$blog_layout = $imedica_opts["imedica-blog-layout"];
$page_for_posts = (int) get_option( 'page_for_posts' );

$blog_meta = redux_post_meta( "imedica_opts", $page_for_posts );
$imedica_main_header_display = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-main-header-display" );
$imedica_footer_display = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-footer-display" );

$top_margin_fix = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-top-margin" );


if ( $blog_layout == "blog-medium" ) {
	$cls                  = 'col-md-6 col-xs-12';
	$blog_layout_template = 'grid';
} elseif ( $blog_layout == "blog-small" ) {
	$cls                  = 'col-md-4 col-sm-6';
	$blog_layout_template = 'grid';
} elseif ( $blog_layout == "blog-large" ) {
	$cls                  = '';
	$blog_layout_template = 'blogpage';
} elseif ( $blog_layout == "blog-img-medium" ) {
	$cls                  = '';
	$blog_layout_template = 'blogmedium';
}
$infinite_scroll = false;
if ( isset( $imedica_opts["blog-infinite-scroll"] ) ) {
	$infinite_scroll = $imedica_opts["blog-infinite-scroll"];
}
$current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : '';
$sidebar_pos      = $current_position !== 'full' && $current_position !== 'left' ? 'right' : $current_position;
if ( $sidebar_pos == 'full' ) {
	$primary_cls = "col-sm-12 col-md-12 col-lg-12 without-sidebar " . esc_attr( $sidebar_pos );
} else {
	$primary_cls = "col-sm-7 col-md-8 col-lg-9 with-sidebar " . esc_attr( $sidebar_pos );
}

$page_for_posts = (int) get_option( 'page_for_posts' );
$blog_meta = redux_post_meta( "imedica_opts", $page_for_posts );
$imedica_footer_display = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-footer-display" );
$top_margin_fix = $blog_meta['imedica-top-margin'];

if ( isset( $top_margin_fix ) && $top_margin_fix == true ) {
	$margin_style = 'margin-top: 0;';
} else {
	$margin_style = '';
}
if($imedica_footer_display == null) {$imedica_footer_display = true;}
if($imedica_main_header_display == null) {$imedica_main_header_display = true;}
if($imedica_main_header_display){
	get_header();
} else {
	get_header('blank');
} 
?>
<div class="imedica-row">
<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">
<?php
if ( $current_position == "left" ) {
	get_sidebar();
}
?>
	<div id="primary"
	     class="site-content col-xs-12 <?php echo esc_attr( $primary_cls ); ?> <?php echo esc_attr( $current_position ); ?> imd-blog-home"
	     style="<?php echo esc_attr( $margin_style ); ?>">
		<div id="content" role="main">
			<?php if ( $blog_layout == "blog-medium" ) {
				echo '<div class="blog-grid-masonry blog-grid2 clear">';
			} ?>
			<?php if ( $blog_layout == "blog-small" ) {
				echo '<div class="blog-grid-masonry blog-grid3 clear">';
			} ?>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', $blog_layout_template ); ?>

				<?php endwhile; ?>
				<?php
				if ( function_exists( 'imedica_pagination' ) ) {
					imedica_pagination();
				} else {
					imedica_content_nav( 'nav-below' );
				}
				?>
			<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<?php if ( current_user_can( 'edit_posts' ) ) :
						// Show a different message to a logged-in user who can add posts.
						?>
						<header class="entry-header">
							<h1 class="entry-title">
								<?php _e( 'No posts to display', 'imedica' ); ?>
							</h1>
						</header>
						<div class="entry-content">
							<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'imedica' ), admin_url( 'post-new.php' ) ); ?></p>
						</div>
						<!-- .entry-content -->

					<?php else :
						// Show the default message to everyone else.
						?>
						<header class="entry-header">
							<h1 class="entry-title">
								<?php _e( 'Nothing Found', 'imedica' ); ?>
							</h1>
						</header>
						<div class="entry-content">
							<p>
								<?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'imedica' ); ?>
							</p>
							<?php get_search_form(); ?>
						</div>
						<!-- .entry-content -->
					<?php endif; // end current_user_can() check ?>
				</article>
				<!-- #post-0 -->

			<?php endif; // end have_posts() check ?>
			<?php if ( $blog_layout == "blog-medium" || $blog_layout == "blog-small" ) {
				echo '</div>';
			} ?>
			<?php
			if ( $infinite_scroll ) {
				echo get_imedica_loader();
			}
			?>
		</div>
		<!-- #content -->
	</div>
	<!-- #primary -->
<?php
if ( $current_position == "right" || trim( $current_position ) == '' ) {
	get_sidebar();
}
if($imedica_footer_display){
	get_footer();
} else {
	get_footer('blank');
}