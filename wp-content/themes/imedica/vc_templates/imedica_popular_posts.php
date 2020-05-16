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
	'title_font_size'          => '15',
	'main_heading_style'       => '',
	'title_line_ht'            => '20',
	'desc_font_family'         => '',
	'desc_font_size'           => '15',
	'desc_heading_style'       => '',
	'desc_line_ht'             => '20',
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
	'css_wrapper'			 => ''
	), $atts ) );
$atts['show_date'] = $show_date;
$el_class          = $this->getExtraClass( $el_class );
$thumb_class       = ( $show_thumbnail ) ? '' : '-no-thumb';

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

/*------------  font style------------*/
$mhfont_family   = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $main_heading_font_family ) : "";
$dhfont_family   = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $desc_font_family ) : '';
$chfont_family   = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $pcn_font_family ) : '';
$cat_font_family = function_exists( 'get_ultimate_font_family' ) ? get_ultimate_font_family( $cat_font_family ) : '';
$container_style = function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $main_heading_style ) : '';
$href            = vc_build_link( $button_link );
$url             = $href['url'];
$target          = trim( $href['target'] );
$read            = $href['title'];
/*------------ container title font style------------*/
$title_font_size = (isset($title_font_size) && trim($title_font_size) != "") ? $title_font_size : '15';
$title_line_ht = (isset($title_line_ht) && trim($title_line_ht) != "") ? $title_line_ht : '20';
$mhfont_family = (isset($mhfont_family) && trim($mhfont_family) != "") ? $mhfont_family : 'inherit';

$container_style = '';
$container_style .= 'font-size: ' . esc_attr( $title_font_size ) . 'px;';
$container_style .= 'line-height: ' . esc_attr( $title_line_ht ) . 'px;';
$container_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $main_heading_style ) : '';
$container_style .= 'font-family: ' . esc_attr( $mhfont_family ) . ';';
/*------------ Post title font style------------*/
$desc_font_size = (isset($desc_font_size) && trim($desc_font_size) != "") ? $desc_font_size : '15';
$desc_line_ht = (isset($desc_line_ht) && trim($desc_line_ht) != "") ? $desc_line_ht : '20';
$dhfont_family = (isset($dhfont_family) && trim($dhfont_family) != "") ? $dhfont_family : 'inherit';

$title_style = '';
$title_style .= 'font-size: ' . esc_attr( $desc_font_size ) . 'px;';
$title_style .= 'line-height: ' . esc_attr( $desc_line_ht ) . 'px;';
$title_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $desc_heading_style ) : '';
$title_style .= 'font-family: ' . esc_attr( $dhfont_family ) . ';';
if ( $main_heading_margin != '' ) {
	$title_style .= $main_heading_margin . ';';
}
/*------------ Post content font style------------*/
$pcn_font_size = (isset($pcn_font_size) && trim($pcn_font_size) != "") ? $pcn_font_size : '15';
$pcn_line_ht = (isset($pcn_line_ht) && trim($pcn_line_ht) != "") ? $pcn_line_ht : '20';
$chfont_family = (isset($chfont_family) && trim($chfont_family) != "") ? $chfont_family : 'inherit';

$post_style = '';
$post_style .= 'font-size: ' . esc_attr( $pcn_font_size ) . 'px;';
$post_style .= 'line-height: ' . esc_attr( $pcn_line_ht ) . 'px;';
$post_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $pcn_heading_style ) : '';
$post_style .= 'font-family: ' . esc_attr( $chfont_family ) . ';';
if ( $sub_heading_margin != '' ) {
	$post_style .= $sub_heading_margin . ';';
}
/*------------ Post Category font style------------*/
$cat_font_size = (isset($cat_font_size) && trim($cat_font_size) != "") ? $cat_font_size : '15';
$cat_line_ht = (isset($cat_line_ht) && trim($cat_line_ht) != "") ? $cat_line_ht : '20';
$cat_font_family = (isset($cat_font_family) && trim($cat_font_family) != "") ? $cat_font_family : 'inherit';

$cat_style = '';
$cat_style .= 'font-size: ' . esc_attr( $cat_font_size ) . 'px;';
$cat_style .= 'line-height: ' . esc_attr( $cat_line_ht ) . 'px;';
$cat_style .= function_exists( 'get_ultimate_font_style' ) ? get_ultimate_font_style( $cat_heading_style ) : '';
$cat_style .= 'font-family: ' . esc_attr( $cat_font_family ) . ';';
/*---for post content--------*/
$cont_style = $cat_style;
if ( $content_margin != '' ) {
	$cont_style .= $content_margin . ';';
}
$cat_border_style = '';
/*------------ Post border  style------------*/
if ( $img_border_style != '' ) {
	$cat_border_style .= 'border-bottom-style: ' . esc_attr( $img_border_style ) . ';';
	$cat_border_style .= 'border-bottom-color: ' . esc_attr( $img_border_color ) . ';';
	$cat_border_style .= 'border-bottom-width: ' . esc_attr( $img_border_width ) . 'px;';
}
$output = '<div class="imedica_recent_posts' . esc_attr( $thumb_class ) . ' wpb_content_element' . esc_attr( $el_class ) . ' '. esc_attr( $css_wrapper ) .'">';
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
	'orderby'             => 'comment_count',
	'ignore_sticky_posts' => true
	) ) );
if ( $r->have_posts() ) :
	if ( $title ) {
		echo "<h3 style='{$container_style}'>" . esc_attr( $title ) . "</h3>";
	}
	$col = 12; ?>
	<ul class="recent-post-vc">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li class="recent-post-item" style=" <?php echo esc_attr( $cat_border_style ); ?>">
				<?php 	
				global $post; 
				$post_id = $post->ID;
				?>
				<?php if ( has_post_thumbnail() ): ?>
					<div class="post-thumb">
						<?php //the_post_thumbnail('recent-posts-thumbnail'); $col = 8;
						if ( has_post_thumbnail( $post_id ) ) {
							the_post_thumbnail( 'recent-posts-thumbnail-90' );
						}
						$col = 8;
						?>
					</div>
					<?php
					endif;
					?>
					<div class="post-content">
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
							<div class="post-excerpt" style=" <?php echo esc_attr( $cont_style ); ?>">
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
									echo "Posted in: ";
									foreach ( $post_categories as $c ) {
										$cat      = get_category( $c );
										$cat_link = get_category_link( $cat->term_id );
										echo '<a class="popular_post_category" href="' . esc_url( $cat_link ) . '">' . esc_html( $cat->name ) . '</a>';
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
					echo "<div class='post-content' ><a href='" . esc_url( $url ) . "'  target='" . esc_attr( $target ) . "'  >
					" . esc_html( $read ) . "&raquo;
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