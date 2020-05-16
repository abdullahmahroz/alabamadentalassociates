<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 */
global $imedica_opts;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'imedica' ); ?>
		</div>
	<?php endif; ?>
	<header class="entry-header">
		<div class="post-thumb">
			<?php if ( ! post_password_required() && ! is_attachment() ) :
				the_post_thumbnail( 'blog-large' );
			endif; ?>
		</div>
			<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h2>
			<?php else : ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php endif; // is_single() ?>
		<p class="post-meta">

			<?php   
			global $imedica_opts;
			$blog_meta = $imedica_opts['imedica-blog-meta']['enabled'];
			if ( $blog_meta ):
				foreach ( $blog_meta as $meta => $val ) {
					switch ( $meta ) {
						case 'author':
							echo __( 'By ', 'imedica' );
							esc_url( the_author_posts_link() );
							echo ' | ';
							break;
						case 'date':
							echo esc_attr( get_the_date() );
							echo ' | ';
							break;
						case 'like':
							echo getPostLikeLink( get_the_ID(), 'span' );
							echo ' | ';
							break;
						case 'comments':
							if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
								echo comments_popup_link( __( 'Leave a comment', 'imedica' ), __( '1 Comment ', 'imedica' ), __( '% Comments ', 'imedica' ) );
								echo ' | ';
							endif;
							break;
						case 'category':
							$cat = get_the_category_list();
							if ( $cat ) {
								echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'imedica' ) );
								echo ' | ';
							}
							break;
						case 'tag':
							$tags = get_the_tag_list();
							if ( $tags ) {
								echo get_the_tag_list( '', __( ', ', 'imedica' ) );
								echo ' | ';
							}


							break;
					}
				}
				if ( is_user_logged_in() ) {
					edit_post_link( __( 'Edit', 'imedica' ), '<span class="edit-link">', '</span>' );
					echo ' | ';
				}
			endif;
			?>
			<time datetime="<?php the_time('Y-m-d') ?>" class="entry-date published"><?php the_time('Y-m-d'); ?></time>
            <time datetime="<?php the_modified_time('d F Y'); ?>" class="entry-date updated"><?php the_modified_time('d F Y'); ?></time>
		</p>

		<div class="clearfix"></div>
	</header>
	<!-- .entry-header -->
	<?php if ( is_search() || is_home() || is_front_page() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<div class="post-content">
				<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'imedica' ) ); ?>
				<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'imedica' ),
					'after'  => '</div>'
				) ); ?>
			</div>
		</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post -->
