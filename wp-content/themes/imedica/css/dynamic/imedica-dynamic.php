<?php
require_once( 'imedica-vars.php' );
if( !function_exists( 'imedica_dynamic_css_php' ) ){

	function imedica_dynamic_css_php(){
		global $imedica_opts;
		$optimized_css = isset( $imedica_opts['optimized_css'] ) ? $imedica_opts['optimized_css'] : true;
		
		if( $optimized_css ) {
			
			echo '<style type="text/css" id="imedica-dynamic">'."\n";
			include_once( 'php/imedica.bootstrap.min.php' );
			include_once( 'php/font-awesome.php' );
			include_once( 'php/imedica.fa.min.php' );
			include_once( 'php/imedica-style.min.php' );
			include_once( 'php/imedica.min.php' );
			include_once( 'php/imedica-basic-style.php' );
			include_once( 'php/imedica-comment-section.php' );
			include_once( 'php/imedica-footer.php' );
			include_once( 'php/imedica-menus.php' );
			include_once( 'php/imedica-post-navigation.php' );
			include_once( 'php/imedica-post-types-and-bloggrid.php' );
			include_once( 'php/imedica-site-header.php' );
			include_once( 'php/imedica-vc-elements.php' );
			include_once( 'php/imedica-widget-area.php' );
			echo '</style>'."\n";

		} else {
			require_once('imedica-style.php');
			
			wp_register_style( 'imedica-dynamic-style', get_template_directory_uri().'/css/dynamic/imedica-dynamic-style.css');
			wp_enqueue_style( 'imedica-dynamic-style');
		}
	}

}

add_action( 'wp_enqueue_scripts', 'imedica_dynamic_css_php' );