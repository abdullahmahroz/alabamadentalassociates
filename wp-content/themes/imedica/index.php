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
global $imedica_opts;
get_header(); ?>
<div class="row">
<div class="<?php echo esc_attr( $imedica_layout ); ?>">
<?php
$current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : '';
if ( $current_position == "left" ) {
	get_sidebar();
}
$top_margin_fix = redux_post_meta( "imedica_opts", $post->ID, "imedica-top-margin" );
if ( isset( $top_margin_fix ) && $top_margin_fix == true ) {
	$margin_style = 'style="margin-top: 0;"';
} else {
	$margin_style = '';
}
?>
	<div id="primary"
	     class="site-content with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 <?php echo esc_attr( $current_position ); ?>" <?php echo esc_attr( $margin_style ); ?>>
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
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
		</div>
		<!-- #content -->
	</div>
	<!-- #primary -->
<?php
if ( $current_position == "right" || trim( $current_position ) == '' ) {
	get_sidebar();
}
get_footer();