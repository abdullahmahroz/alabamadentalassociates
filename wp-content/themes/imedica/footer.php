<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 */
global $imedica_layout, $imedica_opts;
$small_foot_display = true;
if ( ! is_404() && ! is_search() && ! is_archive() && ! is_home() ) {
	$small_foot_display = redux_post_meta( "imedica_opts", $post->ID, "imedica-smallfooter-display" );
} elseif ( is_home() ) {
	$page_for_posts = (int) get_option( 'page_for_posts' );
	$small_foot_display = redux_post_meta( "imedica_opts", $page_for_posts, "imedica-smallfooter-display" );
}
$small_foot_display = isset( $small_foot_display ) ? $small_foot_display : true;

$footer_type = isset( $imedica_opts['imd_footer_type']) ? $imedica_opts['imd_footer_type'] : 'simple';
$footer_page = isset( $imedica_opts['imd_footer_page']) ? $imedica_opts['imd_footer_page'] : '';
?>
</div>
<!-- .row -->
</div>
<!-- .container -->
</div>
<!-- .theme-showcase -->
<!-- #main .wrapper -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footerpadding"></div>
	
	<?php if( isset( $footer_type ) && $footer_type == 'page' ) {  ?>
		<div class="">
			<div class="imedica-row">
				<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">
					<div class="site-content" style="margin-bottom: 0px;">
						<div id="content" role="main">
							<?php $the_query = new WP_Query( 'page_id='.$footer_page ); ?>
							<?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); ?>
								<?php get_template_part( 'content', 'page' ); ?>
							<?php endwhile; // end of the loop. ?>
						</div>
						<!-- #content -->
					</div>
				</div>
			</div>
		</div>
	<?php }

	elseif( isset( $footer_type ) && $footer_type == 'simple' ) { ?>

		<div class="row imedica-footer-area">
			<div class="imedica-row widget-area">
				<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">
					<?php get_footer( 'default' ); ?>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
		
		<?php if ( $small_foot_display ) {	?>
		<div class="row site-info-bar">
			<div class="footer-siteinfo-wrapper col-md-12 col-sm-12 col-xs-12">
				<div class="small-footer-seperator"></div>
				<div class="imedica-row">
					<div class="imedica-container">
						<?php
							echo imedica_get_custom_small_footer( 'left' );
							echo imedica_get_custom_small_footer( 'right' );
						?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- imedica-row -->	
	<?php }	?>		
</footer>
<!-- #colophon -->
</div>
<?php
if ( isset( $imedica_opts["scroll-to-top"] ) && $imedica_opts["scroll-to-top"] ) {
	?>
	<div class="imd-scroll-top">
		<i class="fa fa-angle-up"></i>
	</div>
<?php } ?>
<!-- #page -->
<?php
echo isset( $imedica_opts['imedica-before-body'] ) && $imedica_opts['imedica-before-body'] !== "" ? $imedica_opts['imedica-before-body'] : '';
?>
<?php wp_footer(); ?>
<?php 
	$header_search		= isset( $imedica_opts['default-menu-search']) ? $imedica_opts['default-menu-search'] : '';
	$imd_search_layout	= isset( $imedica_opts['imd-search-layout']) ? $imedica_opts['imd-search-layout'] : 'style1';
?>
<?php  if ( isset($header_search) && $header_search == true && isset($imd_search_layout) && $imd_search_layout == 'style1' ): ?>
 <div class="search-large">
	<div class="imedica-row">
		<div class="imedica-container">
			<a href="#" class='search-close imedica-icons-cross'></a>

			<div class="search-wrap">
				<h3 class="large-search-text"><?php _e( 'START TYPING AND PRESS ENTER TO SEARCH', 'imedica' ) ?></h3>

				<form class="search" action="<?php echo esc_url( home_url() ); ?>/" method="get">
					<fieldset>
						<span class="text"><input name="s" class="imd-search" type="text" value=""
						                          Placeholder="<?php echo __( 'Start Typing...', 'imedica' ); ?>"/></span>
						<button class="button search-submit"><i class="imedica-icons-search2"></i></button>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div> 
<?php endif ?>
</body></html>