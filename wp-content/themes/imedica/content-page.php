<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'imedica' ),
			'after'  => '</div>'
		) ); ?>
	</div>
	<!-- .entry-content -->
	<footer class="entry-meta">
		<div class="imedica-row">
			<?php edit_post_link( __( 'Edit', 'imedica' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</footer>
	<!-- .entry-meta -->
</article><!-- #post -->
