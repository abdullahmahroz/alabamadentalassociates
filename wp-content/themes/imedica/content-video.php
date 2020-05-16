<?php
/**
 * The template for displaying posts in the Video post format.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-design-1' ); ?>>
	<div class="post-content-main">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="featured-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail( 'full' ); ?>
				</a>
			</div>
		<?php endif; ?>
		<div class="imedica-header">
			<?php if ( is_single() ) : ?>
				<h1 class="page-title"><?php the_title(); ?></h2>
			<?php else : ?>
				<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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
			</div>
			<!-- page-header -->
			<div class="page-summary">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'imedica' ) ); ?>
				<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'imedica' ),
					'after'  => '</div>'
					) ); ?>
				</div>
				<!--page-summary-->
			</div>
			<!-- post-content-main -->
		</article><!-- #post -->
