<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, iMedica already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage iMedica
 * @since iMedica 1.0
 */
global $imedica_opts, $blog_layout, $cls;
$blog_layout = $imedica_opts["imedica-blog-layout"];
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
get_header(); ?>
<div class="imedica-row">
<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">
<?php $current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : ''; ?>
<?php
$sidebar_pos = $current_position !== 'full' && $current_position !== 'left' ? 'right' : $current_position;
if ( $sidebar_pos == 'full' ) {
	$primary_cls = "col-sm-12 col-md-12 col-lg-12 without-sidebar " . esc_attr( $sidebar_pos );
} else {
	$primary_cls = "col-sm-7 col-md-8 col-lg-9 with-sidebar " . esc_attr( $sidebar_pos );
}
if ( $current_position == "left" ) { ?>
	<?php get_sidebar(); ?>
<?php } ?>

<div id="primary" class="site-content <?php echo esc_attr( $primary_cls ); ?>">
	<div id="content" role="main">
		<?php if ($blog_layout == "blog-medium") { ?>
		<div class="blog-grid-masonry blog-grid2 clear">
			<?php } ?>
			<?php if ($blog_layout == "blog-small") { ?>
			<div class="blog-grid-masonry blog-grid3 clear">
				<?php } ?>
				<?php if ( have_posts() ) : ?>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						/* Include the post format-specific template for the content. If you want to
						 * this in a child theme then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', $blog_layout_template );
					endwhile;
					if ( function_exists( 'imedica_pagination' ) ) {
						imedica_pagination();
					} else {
						imedica_content_nav( 'nav-below' );
					}
					?>
				<?php else : ?>
					<?php get_template_part( 'content', $blog_layout_template ); ?>
				<?php endif; ?>
			</div>
			<!-- #content -->
			<?php if ($blog_layout == "blog-medium" || $blog_layout == "blog-small") { ?>
		</div>
	<?php } ?>
	</div>
	<!-- #primary -->
<?php
if ( $current_position == "right" || trim( $current_position ) == "" ) {
	get_sidebar();
}
get_footer();