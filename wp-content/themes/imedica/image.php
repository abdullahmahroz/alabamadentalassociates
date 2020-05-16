<?php
/**
 * The template for displaying image attachments
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage iMedica
 * @since iMedica 1.0
 */
global $imedica_opts;
get_header(); ?>
<?php
$current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : '';
$sidebar_pos      = $current_position !== 'full' && $current_position !== 'left' ? 'right' : $current_position;
$cls              = 'with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 ' . esc_attr( $sidebar_pos );
if ( $sidebar_pos == 'full' ) {
	$cls = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 ' . esc_attr( $sidebar_pos );
} else {
	$cls = 'with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 ' . esc_attr( $sidebar_pos );
}
?>
<div class="row">
<div class="<?php echo esc_attr( $imedica_layout ); ?>">
<?php
if ( $current_position == "left" ) {
	get_sidebar();
}
?>
	<div id="primary" class="site-content <?php echo esc_attr( $cls ); ?>">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
						<div class="imedica-header">
		<?php if ( is_single() ) : ?>
			<h2 class="page-title"><?php the_title(); ?></h2>
		<?php elseif ( is_search() || is_author() || is_archive() || is_category() || is_tag() ): ?>
			<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php else : ?>
			<h2 class="page-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php endif; // is_single() ?>
		<p class="post-meta">
            <?php
                global $imedica_opts;
                   $blog_meta = $imedica_opts['imedica-blog-meta']['enabled'];
                    if($blog_meta):
                    foreach($blog_meta as $meta => $val){
                        switch($meta){
                            case 'author':
                                echo __('By ','imedica'); the_author_posts_link();  echo ' | ';
                                break;
                            case 'date':
                                echo get_the_date('M d, Y');  echo ' | ';
                                break;
                            case 'like':
                                echo getPostLikeLink(get_the_ID(),'span');  echo ' | ';
                                break;
                            case 'comments':
                                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : 
                                    echo comments_popup_link(__('Leave a comment','imedica'), __('1 Comment ', 'imedica'), __('% Comments ','imedica'));  echo ' | ';
                                endif;
                                break;
                            case 'category':
                                echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'imedica' ) );  echo ' | ';
                                break;
                        }
                    }
                    if(is_user_logged_in()){
                        edit_post_link( __( 'Edit', 'imedica' ), '<span class="edit-link">', '</span>' );  echo ' | ';
                    }
                endif;
            ?>
        </p>
	</div>
	<!-- page-header -->
					<!-- .entry-header -->
					<div class="entry-content">
						<div class="entry-attachment">
							<div class="attachment">
								<?php
								/*
								 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
								 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
								 */
								$attachments = array_values( get_children( array(
									'post_parent' => $post->post_parent,
									'post_status' => 'inherit',
									'post_type' => 'attachment',
									'post_mime_type' => 'image',
									'order' => 'ASC',
									'orderby' => 'menu_order ID'
								) ) );
								foreach ( $attachments as $k => $attachment ) :
									if ( $attachment->ID == $post->ID ) {
										break;
									}
								endforeach;
								$k ++;
								// If there is more than 1 attachment in a gallery
								if ( count( $attachments ) > 1 ) :
									if ( isset( $attachments[ $k ] ) ) :
										// get the URL of the next image attachment
										$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
									else :
										// or get the URL of the first image attachment
										$next_attachment_url = get_attachment_link( $attachments[0]->ID );
									endif;
								else :
									// or, if there's only 1 image, get the URL of the image
									$next_attachment_url = wp_get_attachment_url();
								endif;
								?>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>"
								   title="<?php the_title_attribute(); ?>" rel="attachment"><?php
									/**
									 * Filter the image attachment size to use.
									 *
									 * @since iMedica 1.0
									 *
									 * @param array $size {
									 *
									 * @type int The attachment height in pixels.
									 * @type int The attachment width in pixels.
									 * }
									 */
									$attachment_size = apply_filters( 'imedica_attachment_size', array( 960, 960 ) );
									echo wp_get_attachment_image( $post->ID, $attachment_size );
									?></a>
								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
									<div class="entry-caption">
										<?php the_excerpt(); ?>
									</div>
								<?php endif; ?>
							</div>
							<!-- .attachment -->
						</div>
						<!-- .entry-attachment -->
						<div class="entry-description">
							<?php the_content();
							?>
							<?php wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'imedica' ),
								'after'  => '</div>'
							) ); ?>
						</div>
						<!-- .entry-description -->
					</div>
					<!-- .entry-content -->
				</article><!-- #post -->
				 <?php 
                	if ($imedica_opts['post-sharer-enable'] == true) {
                		echo imd_get_sharing_box_social_links();
                	}
                 ?>
               <?php  if ($imedica_opts['author-bio-display'] == true) {
               	?>	
               	<div class="imd-author-meta col-md-12 col-sm-12 col-cs-12">
					<h2 class="about-author col-md-12 col-sm-12 col-cs-12 "><?php _e( "About the Author:", "imedica" ); ?> <?php echo get_the_author(); ?></h2>
					<div class="post-author-avatar col-md-2 col-sm-2 text-center col-xs-3"><?php echo get_avatar( get_the_author_meta('email') , 90 ); ?></div>
					<div class="post-author-bio col-md-10 col-sm-10 col-xs-9"><?php echo get_the_author_meta('description'); ?></div>
				</div>

               	<?php
               } ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
		<!-- #content -->
	</div>
	<!-- #primary -->
<?php
if ( $current_position == "right" || trim( $current_position ) == '' ) {
	get_sidebar();
}
get_footer();