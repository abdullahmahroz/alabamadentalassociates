<?php
/* Add custom favicon to admin */

function custom_admin_favicon() {
	global $imedica_opts;
	if ( isset( $imedica_opts['imedica_favicon']['url'] ) ) {
		echo '<link rel="shortcut icon" href="' . esc_url( $imedica_opts['imedica_favicon']['url'] ) . '"/>';
	}
}

add_action( 'admin_head', 'custom_admin_favicon' );

/*
* Returns an array of menus
*/
function imedica_get_custom_menus() {
	$nav_menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	foreach ( (array) $nav_menus as $menu ) {
		$imedica_menus[ $menu->name ] = $menu->term_id;
	}

	return $imedica_menus;
}

/*
* Returns an array of headers created in header builder
*/
function imedica_get_headers_list() {
	$header_query    = new WP_Query( array(
		'post_type'      => 'imedica_header',
		'orderby'        => 'ID',
		'order'          => 'ASC',
		'posts_per_page' => - 1
	) );
	$imedica_headers = array();
	while ( $header_query->have_posts() ) : $header_query->the_post();
		$imedica_headers[ get_the_ID() ] = get_the_title();
	endwhile;
	wp_reset_query();

	return $imedica_headers;
}

/*
* Returns an array of footers created in footer builder
*/
function imedica_get_footers_list() {
	$footer_query    = new WP_Query( array(
		'post_type'      => 'imedica_footer',
		'orderby'        => 'ID',
		'order'          => 'ASC',
		'posts_per_page' => - 1
	) );
	$imedica_footers = array();
	while ( $footer_query->have_posts() ) : $footer_query->the_post();
		$imedica_footers[ get_the_ID() ] = get_the_title();
	endwhile;
	wp_reset_query();

	return $imedica_footers;
}

//iMedica changed comments
if ( ! function_exists( 'imedica_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own imedica_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @since iMedica 1.0
	 */
	function iMedica_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				// Display trackbacks differently than normal comments.
				?>
				<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p><?php _e( 'Pingback:', 'imedica' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'imedica' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default :
				// Proceed with normal comments.
				global $post;
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="imedica-comment">
					<?php echo "<div class='iMedica-cmt-avatar-wrap'>" . get_avatar( $comment, 54 ) . "</div>"; ?>
					<div class="imedica-comment-data-wrap">
						<header class="imedica-comment-meta imedica-comment-author vcard">
							<?php
							printf( '<div class="iMedica-cmt-cite-wrap"><cite><b class="fn">%1$s</b> %2$s</cite></div>',
								get_comment_author_link(),
								// If current post author is also comment author, make it known visually.
								( $comment->user_id === $post->post_author ) ? '<span class="imedica-highlight-text iMedica-cmt-post-author">' . __( 'Post author', 'imedica' ) . '</span>' : ''
							);
							printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'imedica' ), get_comment_date(), get_comment_time() )
							);
							edit_comment_link( __( 'Edit', 'imedica' ), '<p class="imedica-edit-link">', '</p>' );
							if ( '0' == $comment->comment_approved ) : ?>
								<p class="imedica-highlight-text comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'imedica' ); ?></p>
							<?php endif; ?>
						</header>
						<!-- .comment-meta -->
						<section class="comment-content comment">
							<?php comment_text(); ?>
						</section>
						<!-- .comment-content -->
						<div class="reply">
							<?php comment_reply_link( array_merge( $args, array(
								'reply_text' => __( 'Reply', 'imedica' ),
								'after'      => ' ',
								'depth'      => $depth,
								'max_depth'  => $args['max_depth']
							) ) ); ?>
						</div>
						<!-- .reply -->
					</div>
				</article><!-- #comment-## -->
				<?php
				break;
		endswitch; // end comment_type check
	}
endif;
//Change font size of tags in tag cloud widget

function set_cloud_tag_size( $args ) {
	$args = array( 'smallest' => 11, 'largest' => 11 );

	return $args;
}

add_filter( 'widget_tag_cloud_args', 'set_cloud_tag_size' );

//Get video from video post on grid pages
function imedica_post_video( $post_id = null ) {
	global $post;
	$target_post = $post;
	if ( $post_id !== null ) {
		$target_post = get_post( $post_id );
	}
	$matches = null;
	if ( preg_match( '/<iframe(.*?)\\/?>(<\\/iframe>)?/s', $post->post_content, $matches ) ) {
		return $matches[0];
	}

	return ''; // return empty if no iframe found.
}

function imedica_post_video_grid( $post_id = null ) {
	global $post;
	$target_post = $post;
	if ( $post_id !== null ) {
		$target_post = get_post( $post_id );
	}
	$matches = "null";
	if ( preg_match( '/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $post->post_content, $matches ) ) {
		return '<div class="imd-video-wrapper">' . $matches[0] . '</div>';
	} elseif ( preg_match( "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $post->post_content, $matches ) ) {
		return '<div class="imd-video-wrapper"><iframe width="640" height="260" src="https://www.youtube.com/embed/' . $matches[0] . '?feature=oembed" frameborder="0" allowfullscreen=""></iframe></div>';
	} elseif ( preg_match( '(\/\/vimeo.com\/([1-9.-_]+))', $post->post_content, $matches ) ) {
		return '<div class="imd-video-wrapper"><iframe width="640" height="260" src="//player.vimeo.com/video/' . $matches[1] . '" frameborder="0" allowfullscreen=""></iframe></div>';
	}

	return ''; // return empty if no iframe found.
}

function imedica_post_video_check( $post_id = null ) {
	global $post;
	$target_post = $post;
	$vid         = false;
	if ( $post_id !== null ) {
		$target_post = get_post( $post_id );
	}
	$matches = "null";
	if ( preg_match( '/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $post->post_content, $matches ) ) {
		$vid = true;
	} elseif ( preg_match( "#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $post->post_content, $matches ) ) {
		$vid = true;
	} elseif ( preg_match( '(\/\/vimeo.com\/([1-9.-_]+))', $post->post_content, $matches ) ) {
		$vid = true;
	}

	return $vid; // return empty if no iframe found.
}

function imedica_post_img_grid( $img_size ) {
	global $post, $posts;
	$first_img = $image_thumb = '';
	ob_start();
	ob_end_clean();
	if ( preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches ) ) {
		$first_img = $matches[1][0];

		return $first_img;
	} else {
		return $first_img;
	}
}

function imedica_if_has_content( $post_id ) {
	$cls = '';
	if ( ! is_attachment() && ! has_post_format( 'image' ) && ! has_post_format( 'gallery' ) && ! has_post_format( 'quote' ) && ! has_post_format( 'video' ) && ! has_post_format( 'audio' ) ) {
		if ( get_the_post_thumbnail( $post_id ) == '' ) {
			$cls = 'no_img';
		}
	}
	if ( has_post_format( 'image' ) && imedica_post_img_grid( 'blog-medium-image' ) == '' ) {
		$cls = 'no_img';
	}
	if ( has_post_format( 'video' ) && imedica_post_video_check() != true ) {
		$cls = 'no_img';
	}
	if ( has_post_format( 'audio' ) && grid_audio_check() != true ) {
		$cls = 'no_img';
	}

	return $cls;
}

function give_linked_images_class( $content ) {
	$classes = 'imd_a_img'; // separate classes by spaces - 'img image-link'
	// check if there are already a class property assigned to the anchor
	if ( preg_match( '/<a.*? class=".*?"><\/div><\/a>/i', $content ) ) {
		// If there is, simply add the class
		$content = preg_replace( '/<a.*? class=".*?"><\/div><\/a>/i', '$1 ' . $classes . '$2', $content );
	} else {
		// If there is not an existing class, create a class property
		$content = preg_replace( '/(<a.*?)><img/', '$1 class="' . $classes . '" ><img', $content );
	}

	return $content;
}

function grid_audio_files() { // for audio post type - grab
	global $post;
	if ( preg_match( '((https?:)?\/\/(www\.)?soundcloud\.com\/[a-z?,-?,1-9?]+)', $post->post_content, $matches ) ) {
		return get_soundcloud_id( $matches[0] );
	} elseif ( preg_match( '/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $post->post_content, $matches ) ) {
		return $matches[0];
	}
}

function grid_audio_check() { // for audio post type - grab
	global $post;
	$ret = false;
	if ( preg_match( '((https?:)?\/\/(www\.)?soundcloud\.com\/[a-z?,-?,1-9?]+)', $post->post_content, $matches ) ) {
		$ret = true;
	} elseif ( preg_match( '/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $post->post_content, $matches ) ) {
		$ret = true;
	}

	return $ret;
}

function grid_preg_audio_files( $imd_excerpt ) {
	if ( preg_match( "((https?|ftp|gopher|telnet|file|notes|ms-help):((\/\/)|(\\\\))+[\w\d:#@%/;$()~_?\+-=\\\.&]*\.(mp3|m4a|ogg|wav|wma))", $imd_excerpt, $matches ) ) {
		return '[audio src="' . $matches[0] . '"]';
	}
}

function grid_remove_audio_url( $imd_excerpt ) {
	if ( preg_match( "((https?|ftp|gopher|telnet|file|notes|ms-help):((\/\/)|(\\\\))+[\w\d:#@%/;$()~_?\+-=\\\.&]*\.(mp3|m4a|ogg|wav|wma))", $imd_excerpt, $aurio_url ) ) {
		$matches = preg_replace( "((https?|ftp|gopher|telnet|file|notes|ms-help):((\/\/)|(\\\\))+[\w\d:#@%/;$()~_?\+-=\\\.&]*\.(mp3|m4a|ogg|wav|wma))", '', $imd_excerpt );

		return $matches;
	}
}

if ( ! function_exists( 'get_soundcloud_id' ) ) {

	function get_soundcloud_id( $sc_url ) {
		global $imedica_opts;
		$color = str_replace( '#', '', $imedica_opts['imedica-theme-color'] );
		$url   = strip_tags( $sc_url );
		if ( ! empty( $sc_url ) ) {
			$unparsed_json = wp_remote_get( 'http://api.soundcloud.com/resolve.json?url=' . $url . '&client_id=c7b853e983a53f5d1e0d278a8a461781' );
			// echo "<pre>";
			// print_r($unparsed_json);
			// echo "</pre>";
			if ( ! is_wp_error( $unparsed_json ) ) {
				if ( 200 === $unparsed_json['response']['code'] ) {
					$unparsed_json = $unparsed_json['body'];
					$json_object   = json_decode( $unparsed_json );
					// retrieve the user ID from json_object
					$roster_id = $json_object->{'id'};
					echo '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/' . esc_attr( $roster_id ) . '&amp;color=' . esc_attr( $color ) . '&amp;auto_play=false&amp;hide_related=true&amp;show_artwork=false&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false"></iframe>';
				}
			}

		}
	}

}

/*
* Overrite the excerpt function to allow certail HTML tags
*/
if ( ! function_exists( 'imd_allowedtags' ) ) {

	function imd_allowedtags() {
		// Add custom tags to this string
		return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<video>,<div>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<blockquote>,';
	}

}


if ( ! function_exists( 'imd_wp_trim_excerpt' ) ) :

	function imd_wp_trim_excerpt( $imd_excerpt ) {
		global $post;
		$id          = $post->ID;
		$raw_excerpt = $imd_excerpt;
		if ( '' == $imd_excerpt ) {
			$imd_excerpt = get_the_content( '' );
			if ( has_post_format( 'gallery' ) && ! is_single() ) :
				$gallery_excerpert = '<div style="display:none;"></div>';
				$gallery_excerpert .= preg_replace( "/\[gallery .+]/", " ", $imd_excerpt );
				$imd_excerpt = $gallery_excerpert;
			endif;
			$imd_excerpt = strip_shortcodes( $imd_excerpt );
			$imd_excerpt = apply_filters( 'the_content', $imd_excerpt );
			$imd_excerpt = str_replace( ']]>', ']]&gt;', $imd_excerpt );
			$imd_excerpt = strip_tags( $imd_excerpt, imd_allowedtags() ); /*IF you need to allow just certain tags. Delete if all tags are allowed */
			//Set the excerpt word count and only break after sentence is complete.
			if ( is_page_template( 'page-templates/blog-grid-2-columns.php' ) ) {
				$excerpt_word_count = 28;
			} elseif ( is_page_template( 'page-templates/blog-grid-3-columns.php' ) ) {
				$excerpt_word_count = 12;
			} else {
				$excerpt_word_count = apply_filters( 'imd_excerpt_word_count', 55 );
			}
			$excerpt_length = 35;//apply_filters('excerpt_length', $excerpt_word_count);
			$tokens         = array();
			$excerptOutput  = '';
			$count          = 0;
			$default_excerpt_till_word_ends = true;
			$imedica_excerpt_till_sentence_ends = apply_filters( 'imedica_excerpt_till_sentence_ends', $default_excerpt_till_word_ends );
			// Divide the string into tokens; HTML tags, or words, followed by any whitespace
			preg_match_all( '/(<[^>]+>|[^<>\s]+)\s*/u', $imd_excerpt, $tokens );
			foreach ( $tokens[0] as $token ) {

				if ( $imedica_excerpt_till_sentence_ends == true ) {
					if ( $count >= $excerpt_word_count && preg_match( '/[\,\;\?\.\!]\s*$/uS', $token ) ) {
						// Limit reached, continue until , ; ? . or ! occur at the end
						$excerptOutput .= trim( $token );
						break;
					}
				} else {
					if ( $count >= $excerpt_word_count ) {
						// Limit reached, continue until , ; ? . or ! occur at the end
						$excerptOutput .= trim( $token );
						break;
					}
				}
				// Add words to complete sentence
				$count ++;
				// Append what's left of the token
				$excerptOutput .= $token;
			}

			if ( $imedica_excerpt_till_sentence_ends == false ) {
				$excerptOutput .= ' ...';
			}

			$imd_excerpt = trim( force_balance_tags( $excerptOutput ) );
			if ( has_post_format( 'audio' ) && ! is_single() ) :
				$audio_excerpert = '';
				$audio_excerpert .= do_shortcode( grid_preg_audio_files( $imd_excerpt ) );
				$audio_excerpert .= grid_remove_audio_url( $imd_excerpt );
				$imd_excerpt = $audio_excerpert;
			endif;

			return $imd_excerpt;
		}

		return apply_filters( 'imd_wp_trim_excerpt', $imd_excerpt, $raw_excerpt );
	}
endif;
remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'imd_wp_trim_excerpt' );
/**
 * Overrite the HTML output of gallery shortcode to the custom output for carousel slider
 */

if ( ! function_exists( 'imedica_gallery_shortcode' ) ) {

	function imedica_gallery_shortcode( $atts ) {

		/**
		 * Before hook for gallery
		 * imedica_gallery_shortcode_before hook
		 *
		 * @since  3.0.3
		 */
		do_action( 'imedica_gallery_shortcode_before' );

		$ids = '';
		extract( shortcode_atts( array(
			'ids'          => '',
			'gallery_type' => '',
			'columns'      => '',
			'link'         => '',
			'size'         => ''
		), $atts, 'imedica_gallery_shortcode' ) );
		$images       = explode( ",", $ids );
		$smgid        = 'gallery_' . uniqid();
		$gallery_type = ( esc_attr( $gallery_type ) == '' ? 'default' : esc_attr( $gallery_type ) );
		$columns      = ( esc_attr( $columns ) == '' ? '3' : esc_attr( $columns ) );
		$size         = ( esc_attr( $size ) == '' ? 'thumbnail' : esc_attr( $size ) );
		$link         = ( esc_attr( $link ) == '' ? 'post' : esc_attr( $link ) );
		ob_start();
		if ( count( $images ) > 1 ) {
		if ( ( $gallery_type == "metro" ) ) { // If gallery Type is Metro
			imedica_justified_grid__gallery(); ?>

			<div id="<?php echo esc_attr( $smgid ); ?>" class="imedica-justified-grid-gallery">
				<div class="imedica-justified-grid">
					<?php
					$n = 0;
					foreach ( $images as $id ) {
						$cls                   = ( $n == 0 ) ? 'active' : '';
						$image_full_attributes = wp_get_attachment_image_src( $id, 'full' );
						$image_full_url        = $image_full_attributes[0];
						$image_attachment_url  = get_attachment_link( $id );
						if ( $link == 'post' ) {
							$image_link = $image_attachment_url;
						} else if ( $link == 'file' ) {
							$image_link = $image_full_url;
						} else {
							$image_link = '#';
						}
						$image_attributes = wp_get_attachment_image_src( $id, $size );
						$image_url        = $image_attributes[0];
						$image_info_array = (array) get_post( $id );
						$image_caption    = $image_info_array['post_excerpt'];
						if ( isset( $id ) && $id !== '' ) { ?>
							<a <?php if ( $link == 'file' ) {
								echo esc_attr( 'rel="imedica-lightbox" class="imedica-lightbox"' );
							} ?>
								href="<?php echo esc_url( $image_link ); ?>"
								<?php if ( $link == 'none' ) {
									echo esc_js( 'onclick=" return false;"' );
								} ?>
								title="<?php echo esc_attr( $image_caption ); ?>">
								<img src="<?php echo esc_url( $image_url ); ?>"
								     alt="<?php echo esc_attr( $image_caption ); ?>"/>
							</a>
							<?php
						}
						$n ++;
					} ?>
				</div>
			</div><!-- .imedica-collage-grid-gallery -->

		<?php } else if ( ( $gallery_type == "grid" ) ) { // If gallery Type is Grid ?>
			<div id="<?php echo esc_attr( $smgid ); ?>"
			     class="imedica-grid-gallery imedica-grid-column-<?php echo esc_attr( $columns ); ?> clear">
				<?php
				$n = 0;
				foreach ( $images as $id ) {
					$cls                   = ( $n == 0 ) ? 'active' : '';
					$image_full_attributes = wp_get_attachment_image_src( $id, 'full' );
					$image_full_url        = $image_full_attributes[0];
					$image_attachment_url  = get_attachment_link( $id );
					if ( $link == 'post' ) {
						$image_link = $image_attachment_url;
					} else if ( $link == 'file' ) {
						$image_link = $image_full_url;
					} else {
						$image_link = '#';
					}
					$image_attributes = wp_get_attachment_image_src( $id, $size );
					$image_url        = $image_attributes[0];
					$image_info_array = (array) get_post( $id );
					$image_caption    = isset( $image_info_array['post_excerpt'] ) ? $image_info_array['post_excerpt'] : '';
					if ( isset( $id ) && $id !== '' ) { ?>
						<a <?php if ( $link == 'file' ) {
							echo esc_attr( 'rel="imedica-lightbox" class="imedica-lightbox"' );
						} ?>
							href="<?php echo esc_url( $image_link ); ?>"
							<?php if ( $link == 'none' ) {
								echo esc_attr( 'onclick=" return false;"' );
							} ?>
							title="<?php echo ( $image_caption !== "" ) ? $image_caption : ''; ?>">
							<img src="<?php echo esc_url( $image_url ); ?>"
							     alt="<?php echo ( $image_caption !== "" ) ? $image_caption : ''; ?>"/>
							<h4 class="text-center imedica-grid-img-caption"><?php echo ( $image_caption !== "" ) ? $image_caption : ''; ?></h4>
						</a>
						<?php
					}
					$n ++;
				}
				?>
			</div><!-- .imedica-grid-gallery -->

		<?php } else { // If gallery Type is Slideshow ?>
			<div id="<?php echo esc_attr( $smgid ); ?>" class="imedica-slideshow-gallery">
				<?php
				$n = 0;
				foreach ( $images as $id ) {
					$cls                   = ( $n == 0 ) ? 'active' : '';
					$image_full_attributes = wp_get_attachment_image_src( $id, 'full' );
					$image_full_url        = $image_full_attributes[0];
					$image_attachment_url  = get_attachment_link( $id );
					if ( $link == 'post' ) {
						$image_link = $image_attachment_url;
					} else if ( $link == 'file' ) {
						$image_link = $image_full_url;
					} else {
						$image_link = '#';
					}
					$image_attributes = wp_get_attachment_image_src( $id, $size );
					$image_url        = $image_attributes[0];
					$image_info_array = (array) get_post( $id );
					$image_caption    = $image_info_array['post_excerpt'];
					if ( isset( $id ) && $id !== '' ) { ?>
						<a <?php if ( $link == 'file' ) {
							echo esc_attr( 'rel="imedica-lightbox" class="imedica-lightbox"' );
						} ?>
							href="<?php echo esc_url( $image_link ); ?>"
							<?php if ( $link == 'none' ) {
								echo esc_attr( 'onclick=" return false;"' );
							} ?>
							title="<?php echo esc_attr( $image_caption ); ?>">
							<img src="<?php echo esc_url( $image_url ); ?>"
							     alt="<?php echo esc_attr( $image_caption ); ?>"/>
							<?php if ( $columns == 1 && is_singular() ) { ?>
								<h4 class="text-center"><?php echo esc_attr( $image_caption ); ?></h4>
							<?php } ?>
						</a>
						<?php
					}
					$n ++;
				} ?>
			</div>

			<script type="text/javascript">
				jQuery(window).load(function () {
					jQuery('#<?php echo esc_js($smgid); ?>').slick({
						adaptiveHeight: true,
						slidesToShow: <?php echo esc_js($columns);?>,
						slidesToScroll: <?php echo esc_js($columns);?>,
						<?php if( $columns != 1 ) {?>
						responsive: [
							{
								breakpoint: 768,
								settings: {
									slidesToShow: 2,
									slidesToScroll: 2
								}
							},
							{
								breakpoint: 480,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
							}
						]
						<?php } ?>
					});
				});

				jQuery(document).on('masonryItemAdded', function () {
					jQuery('#<?php echo esc_js($smgid); ?>').slick({
						adaptiveHeight: true,
						slidesToShow: <?php echo esc_js($columns);?>,
						slidesToScroll: <?php echo esc_js($columns);?>,
						<?php if( $columns != 1 ) {?>
						responsive: [
							{
								breakpoint: 768,
								settings: {
									slidesToShow: 2,
									slidesToScroll: 2
								}
							},
							{
								breakpoint: 480,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
							}
						]
						<?php } ?>
					});
				});
			</script>
		<?php }

		} elseif ( count( $images ) == 1 ) { ?>

			<div id="<?php echo esc_attr( $smgid ); ?>" class="imedica-carousel carousel slide" data-ride="carousel">
				<?php $n = 0;
				foreach ( $images as $id ) {
					$cls              = ( $n == 0 ) ? 'active' : '';
					$image_attributes = wp_get_attachment_image_src( $id, 'full' );
					if ( $id !== '' ) { ?>

						<div class="item <?php echo esc_attr( $cls ); ?>"><img
								src="<?php echo esc_url( $image_attributes[0] ); ?>"
								alt="Gallery image"/></div>
					<?php }
					$n ++;
				} ?>
			</div>
			<?php
		}

		/**
		 * After hook for gallery
		 * imedica_gallery_shortcode_after hook
		 *
		 * @since  3.0.3
		 */
		do_action( 'imedica_gallery_shortcode_after' );

		return ob_get_clean();
	}

}

add_shortcode( 'gallery', 'imedica_gallery_shortcode' );

/* Get custom layout for top header bar */
if ( ! function_exists( 'imedica_get_header' ) ) {

	function imedica_get_header( $pos ) {
		global $imedica_opts, $top_header_menu_status, $top_header_html_pos, $top_header_html_status;
		/* Social Icons */
		$facebook           = isset( $imedica_opts['social-icon-fb'] ) ? $imedica_opts['social-icon-fb'] : '';
		$twitter            = isset( $imedica_opts['social-icon-twitter'] ) ? $imedica_opts['social-icon-twitter'] : '';
		$gplus              = isset( $imedica_opts['social-icon-gplus'] ) ? $imedica_opts['social-icon-gplus'] : '';
		$linkedin           = isset( $imedica_opts['social-icon-linkedin'] ) ? $imedica_opts['social-icon-linkedin'] : '';
		$dribbble           = isset( $imedica_opts['social-icon-dribbble'] ) ? $imedica_opts['social-icon-dribbble'] : '';
		$rss                = isset( $imedica_opts['social-icon-rss'] ) ? $imedica_opts['social-icon-rss'] : '';
		$custom_social_url  = isset( $imedica_opts['social-icon-custom-url'] ) ? $imedica_opts['social-icon-custom-url'] : '';
		$custom_social_icon = isset( $imedica_opts['social-icon-custom'] ) ? $imedica_opts['social-icon-custom'] : '';
		$social_icons       = isset( $imedica_opts['imedica-social-sort']['enabled'] ) ? $imedica_opts['imedica-social-sort']['enabled'] : '';
		$contatc_no         = isset( $imedica_opts['imedica-phone-number'] ) ? $imedica_opts['imedica-phone-number'] : '';
		$email_id           = isset( $imedica_opts['imedica-email-id'] ) ? $imedica_opts['imedica-email-id'] : '';

		$custom_social_icon = $custom_social_icon !== 'custom-icon-class' ? $imedica_opts['social-icon-custom'] : $imedica_opts['social-icon-custom-class'];

		$instagram = isset( $imedica_opts['social-icon-instagram'] ) ? $imedica_opts['social-icon-instagram'] : '';
		$pinterest = isset( $imedica_opts['social-icon-pinterest'] ) ? $imedica_opts['social-icon-pinterest'] : '';

		$custom_social_url2  = isset( $imedica_opts['social-icon-custom-url-2'] ) ? $imedica_opts['social-icon-custom-url-2'] : '';
		$custom_social_icon2 = ( isset( $imedica_opts['social-icon-custom-2'] ) && $imedica_opts['social-icon-custom-2'] !== 'custom-icon-class' )  ? $imedica_opts['social-icon-custom-2'] : $imedica_opts['social-icon-custom-class-2'];

		$custom_social_url3  = isset( $imedica_opts['social-icon-custom-url-3'] ) ? $imedica_opts['social-icon-custom-url-3'] : '';
		$custom_social_icon3 = ( isset( $imedica_opts['social-icon-custom-3'] ) && $imedica_opts['social-icon-custom-3'] !== 'custom-icon-class' )  ? $imedica_opts['social-icon-custom-3'] : $imedica_opts['social-icon-custom-class-3'];

		$custom_social_url4  = isset( $imedica_opts['social-icon-custom-url-4'] ) ? $imedica_opts['social-icon-custom-url-4'] : '';
		$custom_social_icon4 = ( isset( $imedica_opts['social-icon-custom-4'] ) && $imedica_opts['social-icon-custom-4'] !== 'custom-icon-class' )  ? $imedica_opts['social-icon-custom-4'] : $imedica_opts['social-icon-custom-class-4'];

		$imd_top_section = $imedica_opts[ 'imd_top_' . $pos . '_section' ];
		ob_start();
		switch ( $imd_top_section ) {
			case 'menu':
				$top_header_menu_status = 1;
				?>
				<div
					class="primary-navigation col-md-6 col-sm-6 col-xs-6 pull-<?php echo esc_attr( $pos ); ?> text-<?php echo esc_attr( $pos ); ?>">
					<!-- Button toggle top menu -->
					<div class="imedica-top-navigation">
						<?php
						if ( has_nav_menu( 'top-menu' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'top-menu',
									'menu_class'     => 'nav-menu',
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								)
							);
						} else {
							if ( is_user_logged_in() ) {
								echo '<a href="' . esc_url( admin_url( '/nav-menus.php' ) ) . '">' . __( "Assign Menu", "imedica" ) . '</a>';
							}
						}
						?>
					</div>
					<!--  imedica-top-navigation -->
				</div><!--/.primary-navigation -->
				<?php
				break;
			case 'social':
				?>
				<div
					class="pull-<?php echo esc_attr( $pos ); ?> col-md-5 col-sm-5 col-xs-5 imd-top-social text-<?php echo esc_attr( $pos ); ?>">
					<!-- button toggle top sozial -->
					<ul class="top-social-link">
						<?php
						if ( $social_icons ): foreach ( $social_icons as $key => $value ) {
							if ( $facebook !== '' && $key == 'social-icon-fb' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $facebook ); ?>"
								       class="top-social-icon"><i
											class="fa fa-facebook"></i></a></li>
							<?php }
							if ( $twitter !== '' && $key == 'social-icon-twitter' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $twitter ); ?>"
								       class="top-social-icon"><i
											class="fa fa-twitter"></i></a></li>
							<?php }
							if ( $gplus !== '' && $key == 'social-icon-gplus' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $gplus ); ?>"
								       class="top-social-icon"><i
											class="fa fa-google-plus"></i></a></li>
							<?php }
							if ( $linkedin !== '' && $key == 'social-icon-linkedin' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $linkedin ); ?>"
								       class="top-social-icon"><i
											class="fa fa-linkedin"></i></a></li>
							<?php }
							if ( $dribbble !== '' && $key == 'social-icon-dribbble' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $dribbble ); ?>"
								       class="top-social-icon"><i
											class="fa fa-dribbble"></i></a></li>
							<?php }
							if ( $instagram !== '' && $key == 'social-icon-instagram' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $instagram ); ?>"
								       class="top-social-icon"><i
											class="fa fa-instagram"></i></a></li>
							<?php }
							if ( $pinterest !== '' && $key == 'social-icon-pinterest' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $pinterest ); ?>"
								       class="top-social-icon"><i
											class="fa fa-pinterest"></i></a></li>
							<?php }
							if ( $rss !== '' && $key == 'social-icon-rss' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $rss ); ?>" class="top-social-icon"><i
											class="fa fa-rss"></i></a></li>
							<?php }
							if ( $custom_social_url !== '' && $key == 'social-icon-custom' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $custom_social_url ); ?>"
								       class="top-social-icon"><i
											class="fa <?php echo esc_attr( $custom_social_icon ); ?>"></i></a></li>
							<?php }
							if ( $custom_social_url2 !== '' && $key == 'social-icon-custom-2' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $custom_social_url2 ); ?>"
								       class="top-social-icon"><i
											class="fa <?php echo esc_attr( $custom_social_icon2 ); ?>"></i></a></li>
							<?php }
							if ( $custom_social_url3 !== '' && $key == 'social-icon-custom-3' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $custom_social_url3 ); ?>"
								       class="top-social-icon"><i
											class="fa <?php echo esc_attr( $custom_social_icon3 ); ?>"></i></a></li>
							<?php }
							if ( $custom_social_url4 !== '' && $key == 'social-icon-custom-4' ) { ?>
								<li><a target="_blank" href="<?php echo esc_url( $custom_social_url4 ); ?>"
								       class="top-social-icon"><i
											class="fa <?php echo esc_attr( $custom_social_icon4 ); ?>"></i></a></li>
							<?php }
						}
						endif; ?>
					</ul>
				</div>
				<!-- .imd-top-social -->
				<?php
				break;
			case 'custom':
				$top_header_html_status = 1;
				$top_header_html_pos    = $pos;
				?>
				<div
					class="top-custom-html col-md-6 col-sm-6 col-xs-6 pull-<?php echo esc_attr( $pos ); ?> text-<?php echo esc_attr( $pos ); ?>">
					<?php echo isset( $imedica_opts[ 'top-header-' . $pos . '-custom-html' ] ) ? $imedica_opts[ 'top-header-' . $pos . '-custom-html' ] : ''; ?>
				</div>
				<?php
				break;
			case 'contact':
				?>
				<div
					class="imd-contact-info-wrap col-md-6 col-sm-12 pull-<?php echo esc_attr( $pos ); ?> col-xs-12 text-<?php echo esc_attr( $pos ); ?>">
					<ul class="imd-contact-info">
						<?php if ( $contatc_no !== '' ) { ?>
							<li><a href="tel:<?php echo $contatc_no; ?>" class="top-contact-info"><i
										class="fa fa-phone"></i><?php echo esc_attr( $contatc_no ); ?></a></li>
						<?php } ?>
						<?php if ( $email_id !== '' ) { ?>
							<?php $email_id = sanitize_email( $email_id ); ?>
							<li><a href="mailto:<?php echo $email_id; ?>" class="top-contact-info"><i
										class="fa fa-envelope"></i><?php echo antispambot( $email_id ); ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<?php
				break;
		}

		return ob_get_clean();
	}

}
/*
* Output dynamic css to <head>
*/
if ( ! function_exists( 'imedica_dynamic_custom_css' ) ) {

	function imedica_dynamic_custom_css() {

		if ( is_admin() ) {
			return;
		}

		global $post, $imedica_opts;
		$transparent_header_text_color = $layout_style = '';
		if ( ! is_404() && ! is_search() && ! is_archive() && ! is_home() && ! is_admin() && ! is_login_page() && null !== $post ) {
			$transparent_header_text_color = redux_post_meta( "imedica_opts", $post->ID, "trans-header-color" );
		} elseif ( is_home() ) {
			$page_for_posts                = (int) get_option( 'page_for_posts' );
			$transparent_header_text_color = redux_post_meta( "imedica_opts", $page_for_posts, "trans-header-color" );
		}
		echo "<style type='text/css' id='imedica-transparent-header-css'>";

		if ( $transparent_header_text_color !== '' ) {
			echo ".transparent_header ul.imd-contact-info li a,.transparent_header ul.top-social-link li a,.transparent_header ul.nav-menu > li a, .transparent_header .navbar-static-top .imd-contact-info-wrap a.top-contact-info,.transparent_header .navbar-static-top ul.nav-menu li a,.transparent_header top-custom-html, .transparent_header .top-custom-html p,.transparent_header .site-navigation .current_page_item>a,.transparent_header ul.nav-menu li a {
			color: " . esc_attr( $transparent_header_text_color ) . ";
		}";

			echo ".transparent_header #primary-navigation ul.nav-menu li.current_page_item>a:after {background : " . esc_attr( $transparent_header_text_color ) . "}";
		}

		$sticky_bg   = '';
		$sticky_bg   = isset( $imedica_opts['sticky-header-bg'] ) ? $imedica_opts['sticky-header-bg'] : '';
		$sticky_bg   = ( $sticky_bg != "" ) ? $sticky_bg : array(
			"color" => '#ffffff',
			"alpha" => '1',
			"rgba"  => 'rgba(255,255,255,1)'
		);
		$sticky_text = isset( $imedica_opts['sticky-header-menu-color'] ) ? $imedica_opts['sticky-header-menu-color'] : '';
		if ( is_array( $sticky_bg ) && array_key_exists( "rgba", $sticky_bg ) ) {
			$sticky_bg = $sticky_bg['rgba'];
		} else {
			$sticky_bg = 'white';
		}

		if ( $sticky_bg !== '' ) {
			echo ".imedica_sticky_header .navbar-inverse.header-fixed { background: " . $sticky_bg . ";}";
		}
		if ( $sticky_text !== '' ) {
			echo ".imedica_sticky_header .navbar-inverse.header-fixed a {    color: " . $sticky_text . ";} ";
		}
		echo '</style>';

		echo "<style type='text/css' id='imedica-layout-options-css'>";

		$page_layout       = $imedica_opts['imedica_layout'];
		$content_max_width = isset( $imedica_opts['imedica-content-width'] ) && $imedica_opts['imedica-content-width'] !== "" ? $imedica_opts['imedica-content-width'] : '';
		if ( ( $page_layout == "container-box" && $content_max_width !== '' ) ) {
			$layout_style = isset( $content_max_width ) && $content_max_width !== "" ? '.container,.imedica-row{ width: ' . $content_max_width . 'px !important; max-width: 100% !important; }' : '';
		} elseif ( $page_layout == "container" ) {
			$box_width    = isset( $imedica_opts["imedica-box-width"] ) ? $imedica_opts["imedica-box-width"] : '';
			$layout_style = isset( $box_width ) && $box_width !== "" ? '.container,.imedica-row{ width: ' . $box_width . 'px !important; max-width: 100% !important; }' : '';
		}
		$custom_css = isset( $imedica_opts['imedica-custom-css'] ) && $imedica_opts['imedica-custom-css'] !== "" ? $imedica_opts['imedica-custom-css'] : '';
		echo $layout_style;
		echo '</style>';

		if ( $custom_css !== '' ) {
			echo "<style type='text/css' id='imedica-custom-css'>";
			echo $custom_css . '</style>' . "\n";
		}
	}

}


add_action( 'wp_print_scripts', 'imedica_dynamic_custom_css', 200 );

if ( ! function_exists( 'imedica_pagetitle_css' ) ) {

	function imedica_pagetitle_css() {
		global $post, $imedica_opts;
		$title_color                   = '';
		$transparent_header_text_color = $layout_style = '';
		if ( ! is_404() && ! is_search() && ! is_archive() && ! is_admin() && ! is_login_page() && null !== $post ) {
			if ( function_exists( 'redux_post_meta' ) ) {
				$title_color = redux_post_meta( "imedica_opts", $post->ID, "page-header-color" );
				if ( isset( $title_color ) && '' !== $title_color ) {
					echo "<style type='text/css' id='imedica-pagetitle-css'>";
					echo '.imd-pagetitle-container .imedica-title > .imedica-breadcrumb-title .breadcrumb-heading,.imd-pagetitle-container .imedica-breadcrumb .breadcrumbs,.imd-pagetitle-container .imedica-breadcrumb .breadcrumbs a,.imd-pagetitle-container .imedica-breadcrumb .breadcrumbs .separator{color:' . $title_color . '}';
					echo "</style>" . "\n";
				}
			}
		}
	}

}

add_action( 'wp_print_scripts', 'imedica_pagetitle_css', 200 );

/*	Add Custom CSS for Footer Page */

if ( ! function_exists( 'imedica_page_as_footer_css' ) ) {

	function imedica_page_as_footer_css() {
		global $imedica_opts, $post;
		$footer_type = isset( $imedica_opts['imd_footer_type'] ) ? $imedica_opts['imd_footer_type'] : 'simple';
		$footer_page = isset( $imedica_opts['imd_footer_page'] ) ? $imedica_opts['imd_footer_page'] : '';

		if ( ! is_404() && ! is_search() && ! is_archive() && null !== $post ) {

			if ( function_exists( 'redux_post_meta' ) ) {
				$landing_page = redux_post_meta( "imedica_opts", $post->ID, "landing_window" );
				if ( isset( $landing_page ) && $landing_page != "" ) {
					$page       = get_page( $landing_page );
					$custom_css = get_post_meta( $page->ID );
					echo "<style id='imedica-vc-hero-css'>";
					if ( isset( $custom_css['_wpb_shortcodes_custom_css'][0] ) ) {
						echo $custom_css['_wpb_shortcodes_custom_css'][0];
					}
					if ( isset( $custom_css['_wpb_post_custom_css'][0] ) ) {
						echo $custom_css['_wpb_post_custom_css'][0];
					}
					echo "</style>";
				}
			}

		}

		if ( isset( $footer_type ) && $footer_type != "simple" ) {
			$custom_css = get_post_meta( $footer_page );
			echo "<style id='imedica-vc-footer-css'>";
			if ( isset( $custom_css['_wpb_shortcodes_custom_css'][0] ) ) {
				echo $custom_css['_wpb_shortcodes_custom_css'][0];
			}
			if ( isset( $custom_css['_wpb_post_custom_css'][0] ) ) {
				echo $custom_css['_wpb_post_custom_css'][0];
			}
			echo "</style>";
			enable_ultimate_global_scripts();
		}
	}

}

add_action( 'wp_enqueue_scripts', 'imedica_page_as_footer_css' );

function enable_ultimate_global_scripts( $page_id = '' ) {
	$opts = get_option( 'bsf_options' );
	if ( $opts['ultimate_global_scripts'] != 'enable' ) {
		$opts['ultimate_global_scripts'] = 'enable';
		update_option( 'bsf_options', $opts );
	}

	if ( $page_id !== '' ) {
		$custom_css = get_post_meta( $page_id );
		echo "<style id='imedica-vc-footer-css'>";
		if ( isset( $custom_css['_wpb_shortcodes_custom_css'][0] ) ) {
			echo $custom_css['_wpb_shortcodes_custom_css'][0];
		}
		if ( isset( $custom_css['_wpb_post_custom_css'][0] ) ) {
			echo $custom_css['_wpb_post_custom_css'][0];
		}
		echo "</style>";
		
	}

}

function imedica_admin_scripts() {
	wp_enqueue_style( "_custom_admin_style", ReduxFramework::$_url . '/assets/css/admin.css' );
	wp_register_style( 'imedica_admin_css', get_template_directory_uri() . '/css/imedica-admin-css.css' );
	wp_enqueue_style( 'imedica_admin_css' );
	wp_enqueue_script( "_ZeroClipboard", ReduxFramework::$_url . '/assets/js/ZeroClipboard.js', '', '', true );
	wp_enqueue_script( "_imd_admin", ReduxFramework::$_url . '/assets/js/admin.js', '', '', true );
}

add_action( "admin_enqueue_scripts", "imedica_admin_scripts" );

function imd_restructure_imgs( $content ) {
	$new_content = do_shortcode( $content );
	$doc         = new DOMDocument();
	libxml_use_internal_errors( true );
	@$doc->LoadHTML( '<?xml encoding="UTF-8">' . $new_content );
	$images     = $doc->getElementsByTagName( 'img' );
	$attributes = array( 'src' => 'src' );
	foreach ( $images as $image ) {
		foreach ( $attributes as $key => $value ) {
			// Get the value of the current attributes and set them to variables.
			$$key = $image->getAttribute( $key );
			// Remove the existing attributes.
			$image->removeAttribute( $key );
			// Set the new attribute.
			$image->setAttribute( $value, $$key );
			// Somehow get image's 'src' value from $attributes array & assign its key to $image_url
			$image_url = $image->getAttribute( 'src' );
			// Find size attributes
			$imagesize = array( '', '' );
			if ( $image_url !== '' ) {
				// Find size attributes
				$header_response = wp_remote_get( $image_url );
				if ( $header_response['response']['code'] == 200 ) {
					$imagesize = getimagesize( $image_url );
				}
				// Set image size attributes
				$image->setAttribute( 'width', $imagesize[0] );
				$image->setAttribute( 'height', $imagesize[1] );
			}
			// Add a new attribute & set value
			$image->setAttribute( 'data-aspect-ratio', 'auto' );
			// Add the new noscript node.
			$append_div = $doc->createElement( 'div' );
			$image->parentNode->insertBefore( $append_div, $image );
			// Add the img node to the noscript node.
			$append_div->setAttribute( 'class', 'imd-img-overlay' );
		}
	}
	$html = $doc->saveHTML();

	return $doc->saveHTML();
}

function check_retina_image_availability() {
	$image        = $_POST['image'];
	$file_headers = wp_remote_head( $image );
	$exists       = 'not exists';
	if ( ! is_wp_error( $file_headers ) ) {
		if ( $file_headers['response']['code'] == '404' ) {
			$exists = 'not exists';
		} else {
			$exists = 'exists';
		}
	}

	echo esc_attr( $exists );
	die();
}

add_action( 'wp_ajax_check_retina_image_availability', 'check_retina_image_availability' );
add_action( 'wp_ajax_nopriv_check_retina_image_availability', 'check_retina_image_availability' );

function lineheight_menu() {
	$lineht = $_POST['lineht'];
	$lineht = (int) esc_attr( $lineht );
	if ( is_int( $lineht ) ) {
		$lineht_opt = get_option( 'imedica_menulineht', 90 );
		if ( $lineht !== $lineht_opt ) {
			update_option( 'imedica_menulineht', $lineht );
		}
	}

	die();
}

add_action( 'wp_ajax_lineheight_menu', 'lineheight_menu' );
add_action( 'wp_ajax_nopriv_lineheight_menu', 'lineheight_menu' );

//remove attach_image param

if ( function_exists( "vc_remove_param" ) ) {
	vc_remove_param( "vc_single_image", "image" );
}

if ( function_exists( "vc_add_param" ) ) {
	$attributes                = array();
	$attributes['type']        = "ult_img_single";
	$attributes['heading']     = "Upload Image";
	$attributes['param_name']  = "image";
	$attributes['description'] = __( "Select image from media library", "ultimate_vc" );
	$attributes['admin_label'] = true;
	$attributes['dependency']  = array(
		'element' => 'source',
		'value'   => 'media_library',
	);

	vc_add_param( 'vc_single_image', $attributes );
}

if ( ! function_exists( 'imedica_get_small_footer' ) ) {

	function imedica_get_custom_small_footer( $pos ) {
		global $imedica_opts;
		/* Social Icons */
		$facebook           = isset( $imedica_opts['social-icon-fb'] ) ? $imedica_opts['social-icon-fb'] : '';
		$twitter            = isset( $imedica_opts['social-icon-twitter'] ) ? $imedica_opts['social-icon-twitter'] : '';
		$gplus              = isset( $imedica_opts['social-icon-gplus'] ) ? $imedica_opts['social-icon-gplus'] : '';
		$linkedin           = isset( $imedica_opts['social-icon-linkedin'] ) ? $imedica_opts['social-icon-linkedin'] : '';
		$dribbble           = isset( $imedica_opts['social-icon-dribbble'] ) ? $imedica_opts['social-icon-dribbble'] : '';
		$rss                = isset( $imedica_opts['social-icon-rss'] ) ? $imedica_opts['social-icon-rss'] : '';
		$custom_social_url  = isset( $imedica_opts['social-icon-custom-url'] ) ? $imedica_opts['social-icon-custom-url'] : '';
		$custom_social_icon = isset( $imedica_opts['social-icon-custom'] ) ? $imedica_opts['social-icon-custom'] : '';
		$social_icons       = isset( $imedica_opts['imedica-social-sort']['enabled'] ) ? $imedica_opts['imedica-social-sort']['enabled'] : '';
		$contatc_no         = isset( $imedica_opts['imedica-phone-number'] ) ? $imedica_opts['imedica-phone-number'] : '';
		$email_id           = isset( $imedica_opts['imedica-email-id'] ) ? $imedica_opts['imedica-email-id'] : '';

		$custom_social_icon = $custom_social_icon !== 'custom-icon-class' ? $imedica_opts['social-icon-custom'] : $imedica_opts['social-icon-custom-class'];

		if ( ! isset( $imedica_opts[ 'imd_footer_' . $pos . '_section' ] ) && $pos == 'left' ) { ?>

			<div class="top-custom-html col-md-6 col-sm-6 col-xs-12 small-footer-<?php echo esc_attr( $pos ); ?>">
				<?php echo isset( $imedica_opts['footer-credits'] ) ? $imedica_opts['footer-credits'] : ''; ?>
			</div>
		<?php } elseif ( ! isset( $imedica_opts[ 'imd_footer_' . $pos . '_section' ] ) && $pos == 'right' ) { ?>

			<div class="col-md-6 col-sm-6 col-xs-12 small-footer-<?php echo esc_attr( $pos ); ?>">
				<!-- Button toggle top menu -->
				<div class="footer-primary-navigation">
					<?php
					if ( has_nav_menu( 'footer-menu' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer-menu',
								'menu_class'     => 'nav-menu',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							)
						);
					} else {
						if ( is_user_logged_in() ) {
							echo '<a href="' . esc_url( admin_url( '/nav-menus.php' ) ) . '">' . __( "Assign Menu", "imedica" ) . '</a>';
						}
					}
					?>
				</div>
				<!--  imedica-top-navigation -->
			</div><!--/.primary-navigation -->
		<?php } else {
			$imd_top_section = $imedica_opts[ 'imd_footer_' . $pos . '_section' ];
			ob_start();
			switch ( $imd_top_section ) {
				case 'menu':
					/*$top_header_menu_status = 1;*/
					?>
					<div class="col-md-6 col-sm-6 col-xs-12 small-footer-<?php echo esc_attr( $pos ); ?>">
						<!-- Button toggle top menu -->
						<div class="footer-primary-navigation">
							<?php
							if ( has_nav_menu( 'footer-menu' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'footer-menu',
										'menu_class'     => 'nav-menu',
										'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									)
								);
							} else {
								if ( is_user_logged_in() ) {
									echo '<a href="' . esc_url( admin_url( '/nav-menus.php' ) ) . '">' . __( "Assign Menu", "imedica" ) . '</a>';
								}
							}
							?>
						</div>
						<!--  imedica-top-navigation -->
					</div><!--/.primary-navigation -->
					<?php
					break;
				case 'social':
					?>
					<div
						class="small-footer-<?php echo esc_attr( $pos ); ?> col-md-6 col-sm-6 col-xs-12 imd-top-social">
						<!-- button toggle top sozial -->
						<ul class="footer-social-link">
							<?php
							if ( $social_icons ): foreach ( $social_icons as $key => $value ) {
								if ( $facebook !== '' && $key == 'social-icon-fb' ) { ?>
									<li><a target="_blank" href="<?php echo esc_url( $facebook ); ?>"
									       class="footer-social-icon"><i class="fa fa-facebook"></i></a></li>
								<?php }
								if ( $twitter !== '' && $key == 'social-icon-twitter' ) { ?>
									<li><a target="_blank" href="<?php echo esc_url( $twitter ); ?>"
									       class="footer-social-icon"><i class="fa fa-twitter"></i></a></li>
								<?php }
								if ( $gplus !== '' && $key == 'social-icon-gplus' ) { ?>
									<li><a target="_blank" href="<?php echo esc_url( $gplus ); ?>"
									       class="footer-social-icon"><i class="fa fa-google-plus"></i></a></li>
								<?php }
								if ( $linkedin !== '' && $key == 'social-icon-linkedin' ) { ?>
									<li><a target="_blank" href="<?php echo esc_url( $linkedin ); ?>"
									       class="footer-social-icon"><i class="fa fa-linkedin"></i></a></li>
								<?php }
								if ( $dribbble !== '' && $key == 'social-icon-dribbble' ) { ?>
									<li><a target="_blank" href="<?php echo esc_url( $dribbble ); ?>"
									       class="footer-social-icon"><i class="fa fa-dribbble"></i></a></li>
								<?php }
								if ( $rss !== '' && $key == 'social-icon-rss' ) { ?>
									<li><a target="_blank" href="<?php echo esc_url( $rss ); ?>"
									       class="footer-social-icon"><i class="fa fa-rss"></i></a></li>
								<?php }
								if ( $custom_social_url !== '' && $key == 'social-icon-custom' ) { ?>
									<li><a target="_blank" href="<?php echo esc_url( $custom_social_url ); ?>"
									       class="footer-social-icon"><i
												class="fa <?php echo esc_attr( $custom_social_icon ); ?>"></i></a></li>
								<?php }
							}
							endif; ?>
						</ul>
					</div>
					<!-- .imd-top-social -->
					<?php
					break;
				case 'custom':
					/*$top_header_html_status = 1;
					$top_header_html_pos = $pos;*/
					?>
					<div
						class="top-custom-html col-md-6 col-sm-6 col-xs-12 small-footer-<?php echo esc_attr( $pos ); ?>">
						<?php echo isset( $imedica_opts[ $pos . '-footer-credits' ] ) ? $imedica_opts[ $pos . '-footer-credits' ] : ''; ?>
					</div>
					<?php
					break;
			}

			return ob_get_clean();
		}
	}

}

if ( ! function_exists( 'colourBrightness' ) ) {

	/*
	Lighter Darker Php Script

	How to use 

	//Lighter
	$colour = '#ae64fe';
	$brightness = 0.5; // 50% brighter
	$newColour = colourBrightness($colour,$brightness);

	//Darker
	$colour = '#ae64fe';
	$brightness = -0.5; // 50% darker
	$newColour = colourBrightness($colour,$brightness);*/

	function colourBrightness( $hex, $percent ) {
		// Work out if hash given
		$hash = '';
		if ( stristr( $hex, '#' ) ) {
			$hex  = str_replace( '#', '', $hex );
			$hash = '#';
		}
		/// HEX TO RGB
		$rgb = array( hexdec( substr( $hex, 0, 2 ) ), hexdec( substr( $hex, 2, 2 ) ), hexdec( substr( $hex, 4, 2 ) ) );
		//// CALCULATE
		for ( $i = 0; $i < 3; $i ++ ) {
			// See if brighter or darker
			if ( $percent > 0 ) {
				// Lighter
				$rgb[ $i ] = round( $rgb[ $i ] * $percent ) + round( 255 * ( 1 - $percent ) );
			} else {
				// Darker
				$positivePercent = $percent - ( $percent * 2 );
				$rgb[ $i ]       = round( $rgb[ $i ] * $positivePercent ) + round( 0 * ( 1 - $positivePercent ) );
			}
			// In case rounding up causes us to go to 256
			if ( $rgb[ $i ] > 255 ) {
				$rgb[ $i ] = 255;
			}
		}
		//// RBG to Hex
		$hex = '';
		for ( $i = 0; $i < 3; $i ++ ) {
			// Convert the decimal digit to hex
			$hexDigit = dechex( $rgb[ $i ] );
			// Add a leading zero if necessary
			if ( strlen( $hexDigit ) == 1 ) {
				$hexDigit = "0" . $hexDigit;
			}
			// Append to the hex string
			$hex .= $hexDigit;
		}

		return $hash . $hex;
	}
}