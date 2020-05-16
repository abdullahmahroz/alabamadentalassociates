<?php
//header("Content-type: text/css"); 

function write_imedica_dynamic_css($buffer){
	$myfile = fopen(get_template_directory()."/css/dynamic/imedica-dynamic-style.css", "a") or die("Unable to open file!");
	$css = $buffer;
	fwrite($myfile, $css);
	fclose($myfile);
	return false;
}

ob_start('write_imedica_dynamic_css');
	$template = get_template_directory()."/css/dynamic/imedica-dynamic-style.css";
	if( is_file($template) ){
		unlink( $template );
	}
	include_once( 'php/font-awesome.php' );
	include_once( 'php/imedica.bootstrap.min.php' );
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
ob_get_clean();