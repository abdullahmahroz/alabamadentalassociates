<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage iMedica
 * @since iMedica 1.0
 */
?>
<?php
global $post;
$current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : '';
if ( ! is_404() && ! is_search() && ! is_archive() && ! is_home() ) {
	$top_margin_fix = is_404() ? false : redux_post_meta( "imedica_opts", $post->ID, "imedica-top-margin" );
	// echo "string2";/
} elseif ( is_home() ) {
	$page_for_posts = (int) get_option( 'page_for_posts' );
	$blog_meta = redux_post_meta( "imedica_opts", (int)$page_for_posts );
	$top_margin_fix = $blog_meta['imedica-top-margin'];
}
$sidebar_pos = $current_position !== 'full' && $current_position !== 'left' ? 'right' : $current_position;
if ( isset( $top_margin_fix ) && $top_margin_fix == true ) {
	$margin_style = 'margin-top: 0;';
} else {
	$margin_style = '';
}
?>
<div id="secondary" class="widget-area col-xs-12 col-sm-5 col-md-4 col-lg-3 <?php echo esc_attr( $sidebar_pos ); ?>"
     role="complementary" style="<?php echo esc_attr( $margin_style ); ?>">
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php
		if ( $current_position !== 'full' && trim( $current_position ) !== "" ) :
			echo fw_ext_sidebars_show( 'blue' );
		elseif ( $current_position == '' ):
			dynamic_sidebar( 'sidebar-main' );
		endif; ?>
	</div>
	<!-- #primary-sidebar -->
</div><!-- #secondary -->