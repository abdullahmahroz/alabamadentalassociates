<?php
$output = $title = $number = $show_date = $show_thumbnail = $el_class = $show_comments = $css_wrapper = '';
extract( shortcode_atts( array(
	'title'                    => "",
	'number'                   => 5,
	'show_date'                => false,
	'show_thumbnail'           => '',
	'show_excerpt'             => '',
	'el_class'                 => '',
	'main_heading_font_family' => '',
	'title_font_size'          => '',
	'main_heading_style'       => '',
	'title_line_ht'            => '',
	'desc_font_family'         => '',
	'desc_font_size'           => '',
	'desc_heading_style'       => '',
	'desc_line_ht'             => '',
	'pcn_line_ht'              => '20',
	'pcn_heading_style'        => '',
	'pcn_font_size'            => '15',
	'pcn_font_family'          => '',
	'show_category'            => '',
	'cat_line_ht'              => '20',
	'cat_heading_style'        => '',
	'cat_font_size'            => '15',
	'cat_font_family'          => '',
	'main_heading_margin'      => '',
	'sub_heading_margin'       => '',
	'content_margin'           => '',
	'img_border_style'         => '',
	'img_border_color'         => '',
	'img_border_width'         => '',
	'button_link'              => '',
	'titlecolor'               => '#000000',
	'titlehovercolor'          => '#000000',
	'show_comments'          => '',
	'css_wrapper'			 => '',
	), $atts ) );
$atts['show_date'] = $show_date;

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

$el_class          = $this->getExtraClass( $el_class );
$thumb_class       = ( $show_thumbnail ) ? '' : '-no-thumb';
$mhfont_family     = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $main_heading_font_family ) : '';
$dhfont_family     = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $desc_font_family ) : '';
$chfont_family     = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $pcn_font_family ) : '';
$cat_font_family   = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $cat_font_family ) : '';
$href              = vc_build_link( $button_link );
$url               = $href['url'];
$target            = trim( $href['target'] );
$read              = $href['title'];
/*------------ container title font style------------*/
$container_style = '';
$container_style .= 'font-size: ' . $title_font_size . 'px;';
$container_style .= 'line-height: ' . $title_line_ht . 'px;';
if ( isset( $mhfont_family ) && $mhfont_family !== '' ) {
	$container_style .= 'font-family: ' . $mhfont_family . ';';
}
$container_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $main_heading_style ) : '';
/*------------ Post title font style------------*/
$title_style = '';
$title_style .= 'font-size: ' . $desc_font_size . 'px;';
$title_style .= 'line-height: ' . $desc_line_ht . 'px;';
$title_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $desc_heading_style ) : '';
if ( isset( $dhfont_family ) && $dhfont_family !== ''  ) {
	$title_style .= 'font-family: ' . $dhfont_family . ';';
}
if ( $main_heading_margin != '' ) {
	$title_style .= $main_heading_margin . ';';
}
/*------------ Post meta content font style------------*/
$post_style = '';
$post_style .= 'font-size: ' . $pcn_font_size . 'px;';
$post_style .= 'line-height: ' . $pcn_line_ht . 'px;';
$post_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $pcn_heading_style ) : '';
if ( isset( $chfont_family ) && $chfont_family !== ''  ) {
	$post_style .= 'font-family: ' . $chfont_family . ';';
}
if ( $sub_heading_margin != '' ) {
	$post_style .= $sub_heading_margin . ';';
}
/*------------ Post Category font style------------*/
$cat_style = '';
$cat_style .= 'font-size: ' . $cat_font_size . 'px;';
$cat_style .= 'line-height: ' . $cat_line_ht . 'px;';
$cat_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $cat_heading_style ) : '';
if ( isset( $cat_font_family ) && $cat_font_family !== '' ) {	
	$cat_style .= 'font-family: ' . $cat_font_family . ';';	
}
/*---for post content--------*/
$cont_style = '';
if ( $content_margin != '' ) {
	$cont_style .= $content_margin . ';';
}
$cat_border_style = '';
/*------------ Post border  style------------*/
if ( $img_border_style != '' ) {
	$cat_border_style .= 'border-bottom-style: ' . $img_border_style . ';';
	$cat_border_style .= 'border-bottom-color: ' . $img_border_color . ';';
	$cat_border_style .= 'border-bottom-width: ' . $img_border_width . 'px;';
}
$output = '<div class="imedica_recent_posts' . $thumb_class . ' wpb_content_element' . $el_class . ' '. esc_attr( $css_wrapper ) .'">';
ob_start();
/**
 * Filter the arguments for the Recent Posts widget.
 *
 * @since 3.4.0
 *
 * @see WP_Query::get_posts()
 *
 * @param array $args An array of arguments used to retrieve the recent posts.
 */
$r = new WP_Query( apply_filters( 'widget_posts_args', array(
	'posts_per_page'      => $number,
	'no_found_rows'       => true,
	'post_status'         => 'publish',
	'ignore_sticky_posts' => true
	) ) );
if ( $r->have_posts() ) :
	if ( $title ) {
		echo "<h3 style='" . $container_style . "'>" . $title . "</h3>";
	}
	$col = 12; ?>
	<ul class="recent-post-vc">
		<?php while ( $r->have_posts() ) : $r->the_post();
		global $post;
		$post_id = $post->ID;
		?>
		<li class="recent-post-item">
			<?php if ( has_post_thumbnail() ): ?>
				<div class="post-thumb">
					<?php
					if ( has_post_thumbnail( $post_id ) ) {
						the_post_thumbnail( 'recent-posts-thumbnail-90' );
					}
					$col = 8;
					?>
				</div>
			<?php endif; ?>
			<div class="post-content" style=" <?php echo esc_attr( $cat_border_style ); ?>">
				<div class="post-title-grid" style=" <?php echo esc_attr( $title_style ); ?>"><a
					href="<?php the_permalink(); ?>"
					class="postgrid-atitle"
					data-titlecolor="<?php echo esc_attr( $titlecolor ); ?>"
					data-titlehovercolor="<?php echo esc_attr( $titlehovercolor ); ?>"
					style="color:<?php echo esc_attr( $titlecolor ); ?>">
					<?php get_the_title() ? the_title() : the_ID(); ?>
				</a></div>
				<?php if ( $show_date || $show_comments ): ?>
					<div class="post-meta-grid" style=" <?php echo esc_attr( $post_style ); ?>">
						<?php if ( $show_date ) : ?>
							<i class="fa fa-calendar"></i><span class="post-date"><?php echo get_the_date(); ?></span>
						<?php endif ?>
						<?php
						if ( $show_comments == true ) {
							comments_popup_link(
								__( '<span class="imd-recent-posts-cmt"><i class="fa fa-comments comments-meta"></i> Post a Comment</span>', 'imedica' ),
								__( '<i class="fa fa-comments comments-meta"></i> 1 Comment', 'imedica' ),
								__( '<i class="fa fa-comments comments-meta"></i> % Comments', 'imedica' ),
								'comments-link-recent',
								__( '<i class="fa fa-comments comments-meta"></i> Comments are Closed', 'imedica' )
								);
						}						
						?>
					</div>	
				<?php endif; ?>
				<?php if ( $show_excerpt ): ?>
					<div class="post-excerpt"
					style=" <?php echo esc_attr( $cont_style ); ?><?php echo esc_attr( $post_style ); ?>">
					<?php
					$strexcerpt = get_the_excerpt();

					if ( function_exists( 'mb_substr' ) ) {
						echo $str = mb_substr( strip_tags( $strexcerpt ), 0, 170, 'UTF-8' ) . '...';
					} else {
						echo $str = substr( strip_tags( $strexcerpt ), 0, 170 ) . '...';
					}
					
					?></div>
				<?php endif; ?>
				<?php if ( $show_category ): ?>
					<div class="post-category" style=" <?php echo esc_attr( $cat_style ); ?>">
						<?php
						$post_categories = wp_get_post_categories( $post_id );
						$cats            = array();
						echo __( "Posted in: ", "imedica" );
						foreach ( $post_categories as $c ) {
							$cat      = get_category( $c );
							$cat_link = get_category_link( $cat->term_id );
							echo '<a class="recent_post_category" href="' . esc_url( $cat_link ) . '">' . $cat->name . '</a>';
							$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
						}
						?>
					</div>
				<?php endif; ?>
			</div>
		</li>
	<?php endwhile; ?>
	<?php
	if ( $read != null ) {
		if ( $target == '' ) {
			$target = '_self';
		}
		echo '<li class="recent-post-item">';
		echo '<div class="post-thumb" style="width: 87px;max-width: 20%;"></div>';
		echo "<div class='post-content' ><a href='" . esc_url( $url ) . "'  target='" . esc_attr( $target ) . "'  >
			" . $read . " &raquo;

		</a>
	</div>
</li>";
}
?>
</ul>
<?php
	// Reset the global $the_post as this query will have stomped on it
wp_reset_postdata();
endif;
$output .= ob_get_clean();
$output .= '</div>' . "\n";
echo $output;