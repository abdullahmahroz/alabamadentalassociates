<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage iMedica
 * @since iMedica 1.0
 */
$sidebars = array( "sidebar-footer-1", "sidebar-footer-2", "sidebar-footer-3", "sidebar-footer-4" );
$n        = 0;
foreach ( $sidebars as $key => $sidebar ) {
	if ( is_active_sidebar( $sidebar ) ) {
		$n ++;
	} else {
		unset( $sidebars[ $key ] );
	}
}
if ( $n !== 0 ) {
	$cols   = 12 / $n;
	$sm_col = $cols * 2;
	if ( $sm_col > 6 ) {
		$sm_col = 6;
	}
	$xs_col = $sm_col * 2;
	if ( $xs_col > 12 ) {
		$xs_col = 12;
	}
	foreach ( $sidebars as $key => $sidebar ) {
		echo '<div class="col-lg-' . esc_attr( $cols ) . ' col-md-' . esc_attr( $cols ) . ' col-sm-' . esc_attr( $sm_col ) . ' col-xs-' . esc_attr( $xs_col ) . ' imd-footer">';
		if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( $sidebar ) ) : else : ?>
		<?php endif; ?>
		<?php echo '</div>';
	}
} else {
	if ( is_user_logged_in() ) {
		?>
		<div class="col-sm-4 imd-footer">
			<div class="imd-no-footer-widget">
				<h3 class="widget-title"><?php _e( "Widget area", "imedica" ); ?></h3>

				<p class="no-widget-text"><a
						href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php _e( "Click Here to assign a widget here", "imedica" ); ?></a>
				</p>
			</div>
		</div>
		<div class="col-sm-4 imd-footer">
			<div class="imd-no-footer-widget">
				<h3 class="widget-title"><?php _e( "Widget area", "imedica" ); ?></h3>

				<p class="no-widget-text"><a
						href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php _e( "Click Here to assign a widget here", "imedica" ); ?></a>
				</p>
			</div>
		</div>
		<div class="col-sm-4 imd-footer">
			<div class="imd-no-footer-widget">
				<h3 class="widget-title"><?php _e( "Widget area", "imedica" ); ?></h3>

				<p class="no-widget-text"><a
						href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php _e( "Click Here to assign a widget here", "imedica" ); ?></a>
				</p>
			</div>
		</div>
	<?php
	}
}
?>