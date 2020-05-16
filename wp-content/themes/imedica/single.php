<?php
/**
 * The Template for displaying all single posts
 *
 */
global $imedica_opts, $post;
$top_margin_fix = redux_post_meta( "imedica_opts", $post->ID, "imedica-top-margin" );
$imedica_main_header_display = redux_post_meta( "imedica_opts", $post->ID, "imedica-main-header-display" );
$imedica_footer_display = redux_post_meta( "imedica_opts", $post->ID, "imedica-footer-display" );
$enable_related_posts = isset($imedica_opts['display-related-posts']) ? $imedica_opts['display-related-posts'] : '';
if($imedica_footer_display == null) {$imedica_footer_display = true;}
if($imedica_main_header_display == null) {$imedica_main_header_display = true;}
if($imedica_main_header_display){
	get_header();
} else {
	get_header('blank');
}
if (isset($top_margin_fix) && $top_margin_fix == true) {
	$margin_style = 'margin-top: 0;';
} else {$margin_style = '';}
?>
<div class="imedica-row">
	<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">
		<?php 
		$current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : '';
		?>
		<?php
		$sidebar_pos = $current_position !== 'full' && $current_position !== 'left' ? 'right' : $current_position;

		$cls = 'with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 '.esc_attr( $sidebar_pos );  
		if($sidebar_pos == 'full'){
			$cls = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 '. esc_attr( $sidebar_pos );
		} else {
			$cls = 'with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 '. esc_attr( $sidebar_pos );
		}
		if($current_position == "left"){
			get_sidebar();
		}
		?>
		<div id="primary" class="site-content <?php echo esc_attr( $cls ); ?>" style="<?php echo esc_attr( $margin_style ); ?>">
			<div id="content" role="main">
				<nav class="nav-single">
					<?php if( get_previous_post_link()): ?>
						<div class="nav-previous">
							<?php previous_post_link('%link','<i class="fa fa-angle-left"></i>',''); ?>
						</div>
					<?php endif; ?>

					<?php if( get_next_post_link()):?>
						<div class="nav-next">
							<?php next_post_link('%link','<i class="fa fa-angle-right"></i>', ''); ?>
						</div>
					<?php endif; ?>

				</nav> <!-- .nav-single -->
				<?php
				while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>

				<?php 
				if ($imedica_opts['post-sharer-enable'] == true) {
					echo imd_get_sharing_box_social_links();
				}
				?>
				<?php  if ($imedica_opts['author-bio-display'] == true) {
					?>
					<span class="author vcard">	
						<div class="imd-author-meta col-md-12 col-sm-12 col-cs-12">
							<h2 class="about-author col-md-12 col-sm-12 col-cs-12 ">
								<?php _e( 'About the Author : ','imedica');  ?>
								<span class="fn"> 
									<?php echo "<a class='url fn n' href='". get_the_author_meta( 'user_url' ) ."' itemprop='url' rel='author'>". get_the_author() ."</a>"  ?>
								</span>
							</h2>
							<div class="post-author-avatar col-md-2 col-sm-2 text-center col-xs-3"><?php echo get_avatar( get_the_author_meta('email') , 90 ); ?></div>
							<div class="post-author-bio col-md-10 col-sm-10 col-xs-9"><?php echo get_the_author_meta('description'); ?></div>
						</div>
					</span></span>

					<?php
				} ?>

				<?php if ($enable_related_posts == 1) {
               		imedica_related_posts($post);// Related Posts
               	}  ?>

               	<?php comments_template( '', true ); ?>
               <?php endwhile; // end of the loop. ?>
           </div><!-- #content -->
       </div><!-- #primary -->
       <?php 
       if($current_position == "right" || trim($current_position) == ''){
       	get_sidebar();
       }
       if($imedica_footer_display){
       	get_footer();
       } else {
       	get_footer('blank');
       }