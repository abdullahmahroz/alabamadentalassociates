<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
global $imedica_opts, $post;
$imedica_main_header_display = redux_post_meta( "imedica_opts", $post->ID, "imedica-main-header-display" );
$imedica_footer_display      = redux_post_meta( "imedica_opts", $post->ID, "imedica-footer-display" );
if ( $imedica_footer_display == null ) {
	$imedica_footer_display = true;
}
if ( $imedica_main_header_display == null ) {
	$imedica_main_header_display = true;
}
if ( $imedica_main_header_display === true ) {
	get_header();
} else {
	get_header( 'blank' );
}
?>
<?php
$current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : '';
$top_margin_fix   = redux_post_meta( "imedica_opts", $post->ID, "imedica-top-margin" );
if ( isset( $top_margin_fix ) && $top_margin_fix == true ) {
	$margin_style = 'margin-top: 0;';
} else {
	$margin_style = '';
}
?>
<div class="">
	<div class="imedica-row">
	<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">
		<?php
		$sidebar_pos = $current_position !== 'full' && $current_position !== 'left' ? 'right' : $current_position;
		$cls         = 'with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 ' . esc_attr( $sidebar_pos );
		if ( $sidebar_pos == 'full' ) {
			if(is_front_page()){
				$cls = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 homepage' . esc_attr( $sidebar_pos );	
			}else{
				$cls = 'col-xs-12 col-sm-7 col-md-8 col-lg-9 aaa ' . esc_attr( $sidebar_pos );	
			}
			
		} else {
			if(is_front_page()){
				$cls = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 homepage' . esc_attr( $sidebar_pos );	
			}else{
				$cls = 'col-xs-12 col-sm-7 col-md-8 col-lg-9 aaa ' . esc_attr( $sidebar_pos );	
			}
		}
		if ( $current_position == "left" ) { ?>
			<?php get_sidebar(); ?>
		<?php } ?>
		<div id="primary" class="site-content <?php echo esc_attr( $cls ); ?>"
		     style="<?php echo esc_attr( $margin_style ); ?>">
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php
					if ( comments_open( $post->ID ) ) {
						comments_template( '', true );
					}
					?>
				<?php endwhile; // end of the loop. ?>
			</div>
			<!-- #content -->
		</div>
		<!-- #primary -->
		<?php
		if ( $current_position == "right" || trim( $current_position ) == '' ) {
			get_sidebar();
		}
		?>
	</div>
	<!-- </div> -->
	<!-- second container primary -->
<?php
if ( $imedica_footer_display ) {
	get_footer();
} else {
	get_footer( 'blank' );
}