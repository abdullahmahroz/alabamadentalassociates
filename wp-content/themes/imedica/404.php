<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage iMedica
 * @since iMedica 1.0
 */
global $imedica_opts, $post;
$custom_404 = $imedica_opts['custom_404']; 
get_header(); ?>
<?php $current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'full'; ?>
<?php if ( ! isset( $custom_404 ) || $custom_404 == "" ) { ?>
	<div class="row">
<?php } ?>
<div class="<?php echo esc_attr( $imedica_layout ); ?>">
<?php
$sidebar_pos = $current_position !== 'full' && $current_position !== 'left' ? 'right' : $current_position;
$cls         = 'without-sidebar col-xs-12 col-sm-12 col-md-12 col-lg-12 ' . esc_attr( $sidebar_pos );
if ( $current_position == 'full' || $current_position == '' || $current_position == null ) {
	$cls = 'without-sidebar col-xs-12 col-sm-12 col-md-12 col-lg-12 ' . esc_attr( $sidebar_pos );
} elseif ( $current_position == 'left' || $current_position == 'right' ) {
	$cls = 'with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 ' . esc_attr( $sidebar_pos );
}
if ( $current_position == "left" ) { ?>

	<?php get_sidebar(); ?>

<?php } ?>

	<div id="primary" class="site-content <?php echo esc_attr( $cls ); ?> text-center">
		<div id="content" role="main">
			<article id="post-0" class="post error404 no-results not-found">
				<?php
				if ( isset( $custom_404 ) && $custom_404 !== "" ) {
					enable_ultimate_global_scripts( $custom_404 );
					$page = get_page( $custom_404 );
					$the_query = new WP_Query( 'page_id='.$custom_404 );
					while ( $the_query -> have_posts() ) : $the_query -> the_post();
						get_template_part( 'content', 'page' );
					endwhile; // end of the loop. 
				} else {
					?>
					<header class="entry-header">
						<div class="imd-404-block-container">
							<div class="imd-404-block imedica-icons-suitcase">
								<p class="404text"><?php _e( '404', 'imedica' ); ?></p>
							</div>
						</div>
						<h2 class="entry-title-404"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'imedica' ); ?></h2>
					</header>
					<div class="entry-content-404">
						<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'imedica' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				<?php } ?>
			</article>
			<!-- #post-0 -->
		</div>
		<!-- #content -->
	</div><!-- #primary -->
<?php
if ( $current_position == "right" || trim( $current_position ) == '' ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>