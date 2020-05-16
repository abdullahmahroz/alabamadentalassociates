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
get_header(); ?>
<?php $current_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : ''; ?>
<div class="">
	<div class="imedica-row">
	<div class="<?php echo esc_attr( $imedica_layout ); ?> imedica-container">
		<?php
		$sidebar_pos = $current_position !== 'full' && $current_position !== 'left' ? 'right' : $current_position;
		$cls         = 'with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 ' . esc_attr( $sidebar_pos );
		if ( $sidebar_pos == 'full' ) {
			$cls = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 ' . esc_attr( $sidebar_pos );
		} else {
			$cls = 'with-sidebar col-xs-12 col-sm-7 col-md-8 col-lg-9 ' . esc_attr( $sidebar_pos );
		}
		if ( $current_position == "left" ) { ?>
			<?php get_sidebar(); ?>
		<?php } ?>
		<div id="primary" class="site-content <?php echo esc_attr( $cls ); ?>">
			<div id="content" role="main">
				<?php woocommerce_content(); ?>
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
get_footer();