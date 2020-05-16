<?php
/*
Plugin Name: One Page Navigator for Visual Composer
Plugin URI: https://brainstormforce.com/
Author: Brainstorm Force
Author URI: https://www.brainstormforce.com
Version: 1.1.9
Description: One Page Navigator to make awesome one page website.
Text Domain: opn
*/

if(!defined('OPN_VERSION'))
	define('OPN_VERSION', '1.1.9');

if(!class_exists('OPN'))
{
	add_action('admin_init','opn_init_addons');
	function opn_init_addons() {
		$required_vc = '4.0';
		if(defined('WPB_VC_VERSION')){
			if( version_compare( $required_vc, WPB_VC_VERSION, '>' )){
				add_action( 'admin_notices', 'opn_admin_notice_for_version');
			}
		} else {
			add_action( 'admin_notices', 'opn_admin_notice_for_vc_activation');
		}
	}// end opn_init_addons
	function opn_admin_notice_for_version() {
		echo '<div class="updated"><p>'.__('The','opn').' <strong>One Page Navigator</strong> '.__('plugin requires','opn').' <strong>Visual Composer</strong> '.__('version 3.7.2 or greater.','opn').'</p></div>';
	}
	function opn_admin_notice_for_vc_activation() {
		echo '<div class="updated"><p>'.__('The','opn').' <strong>One Page Navigator</strong> '.__('plugin requires','opn').' <strong>Visual Composer</strong> '.__('Plugin installed and activated.','opn').'</p></div>';
	}

	class OPN {
		function __construct() {
			$this->assets_js = plugins_url('assets/js/',__FILE__);
			$this->assets_css = plugins_url('assets/css/',__FILE__);
			$this->admin_js = plugins_url('admin/js/',__FILE__);
			$this->admin_css = plugins_url('admin/css/',__FILE__);

			add_action('init',array($this,'opn_init'));
			add_action('wp_enqueue_scripts',array($this,'opn_scripts'));

			add_action('after_setup_theme',array($this,'opn_includes'));
			add_action('admin_init',array($this,'opn_admin_init'));
			add_action('admin_enqueue_scripts',array($this,'opn_admin_scripts'));
		}
		function opn_admin_scripts($hook) {
			if($hook == "post.php" || $hook == "post-new.php" || $hook == "edit.php"){
				wp_enqueue_script( 'opn_admin', plugins_url('assets/js/admin.js',__FILE__), array( 'jquery' ), OPN_VERSION, true);
			}
		}
		function opn_admin_fonts_scripts($hook) {
			$this->paths = wp_upload_dir();
			$this->paths['fonts'] 	= 'smile_fonts';
			$this->paths['fonturl'] = set_url_scheme(trailingslashit($this->paths['baseurl']).$this->paths['fonts']);

			// enqueue css files on backend'
			wp_enqueue_style("ultimate-admin-style",plugins_url("admin/css/style.css",__FILE__));
			if($hook == "post.php" || $hook == "post-new.php" || $hook == "edit.php"){
				wp_enqueue_style('aio-icon-manager',$this->admin_css.'icon-manager.css');
				//wp_enqueue_script('vc-inline-editor',$this->assets_js.'vc-inline-editor.js',array('vc_inline_custom_view_js'),'1.5',true);

				$fonts = get_option('smile_fonts');
				if(is_array($fonts)) {
					foreach($fonts as $font => $info) {
						if(strpos($info['style'], 'http://' ) !== false) {
							wp_enqueue_style('bsf-'.$font,$info['style']);
						} else {
							wp_enqueue_style('bsf-'.$font,trailingslashit($this->paths['fonturl']).$info['style']);
						}
					}
				}
			}
		}
		function opn_includes() {
			$elem   = plugin_dir_path( __FILE__ ).'elements/';

			// Add Module
			foreach(glob($elem."*.php") as $module) {
				require_once(realpath($module));
			}

			//	Disable {Params} - if - "Ultimate Addons" is Installed
			if(!defined('ULTIMATE_VERSION')){
				$params = plugin_dir_path( __FILE__ ).'params/';

				add_action('admin_enqueue_scripts',array($this,'opn_admin_fonts_scripts'));
				// Add Files
				foreach(glob($params."*.php") as $param) {
					require_once(realpath($param));
				}
			}
		}
		function opn_admin_init() {
			if(function_exists('vc_add_param')){

				//	Hide row id option for VC version - 4.5
				//$RowClass = 'vc_col-sm-12';
				//if(defined('WPB_VC_VERSION') && version_compare( WPB_VC_VERSION, '4.4.4', '>' )) {
				//	$RowClass = 'vc_col-sm-12 vc_dependent-hidden';
				//}

				vc_add_param('vc_row',array(
						'type' => 'textfield',
						'heading' => __('Row ID', 'opn'),
						//'edit_field_class' => $RowClass,
						'description' => __("Enter row ID. This will work only if Row ID (Row Settings> General -> Row ID) is empty. (Note: make sure it is unique and valid according to w3c specification).", "opn"),
						'param_name' => 'opn_row_id',
						'value' => '',
						"group" => "One Page",
					)
				);
				vc_add_param('vc_row',array(
						'type' => 'number',
						'heading' => __('Top Gutter', 'opn'),
						'suffix' => 'px',
						'description' => __('This will help you to leave some space from top when user navigates to the row using one page navigation.'),
						'param_name' => 'opn_row_gutter',
						'value' => '',
						"group" => "One Page",
					)
				);
                vc_add_param('vc_row',array(
						"type" => "ult_switch",
						"class" => "",
						"heading" => __("Invert Colors for Navigator", "opn"),
						"param_name" => "opn_enable_overlay",
						"value" => "off",
						"options" => array(
							"on" => array(
								"on" => "Yes",
								"off" => "No",
							),
						),
						'description' => __('Change one page navigation colors when you scroll from this row.', 'opn'),
						"group" => "One Page",
					)
               	);
               	vc_add_param('vc_row',array(
						"type" => "ult_switch",
						"class" => "",
						"heading" => __("Hide Navigation", "opn"),
						"param_name" => "opn_hide_navigation",
						"value" => "off",
						"options" => array(
							"on" => array(
								"on" => "Yes",
								"off" => "No",
							),
						),
						'description' => __('Hide one page navigation when you scroll from this row.', 'opn'),
						"group" => "One Page",
					)
               	);
			}
		}
		function opn_init() {
			if(defined('WPB_VC_VERSION') && version_compare( WPB_VC_VERSION, '4.4', '>=' )) {
				add_filter('vc_shortcode_output',array($this, 'opn_row_shortcode'),10,3);
			}
		}
		function opn_row_shortcode($output, $obj, $attr) {
			if($obj->settings('base')=='vc_row') {
				$output .= $this->opn_shortcode($attr, '');
			}
			return $output;
		}
		function opn_scripts() {
			wp_register_script('opn-custom', plugins_url('/assets/js/op-custom.min.js',__FILE__), array( 'jquery' ), OPN_VERSION, true);
			wp_register_script('opn-animate-scroll', plugins_url('/assets/js/animatescroll.min.js',__FILE__), array( 'jquery' ), OPN_VERSION, true);
		}
		function opn_shortcode($atts, $content) {
			wp_enqueue_script('opn-custom');
			wp_enqueue_script('opn-animate-scroll');
			extract( shortcode_atts(
				array(
					'opn_row_id' 		  => '',
					'opn_row_gutter' 	  => '',
					'opn_enable_overlay'  => '',
					'opn_hide_navigation' => '',
				),$atts
			));
			$output = '<div class="opn-row-pre-element" data-id="'.$opn_row_id.'" data-gutter="'.$opn_row_gutter.'" data-opn_hide_navigation="'.$opn_hide_navigation.'" data-opn_enable_overlay="'.$opn_enable_overlay.'"></div>';
			return $output;
		}
	}
	new OPN;
}
if(defined('WPB_VC_VERSION') && (!version_compare( WPB_VC_VERSION, '4.4', '>=' ))){
	if ( !function_exists( 'vc_theme_after_vc_row' ) ) {
		function vc_theme_after_vc_row($atts, $content = null) {
			$opn = new OPN;
			return $opn->opn_shortcode($atts, $content);
		}
	}
}
// bsf core
$bsf_core_version_file = realpath(dirname(__FILE__).'/admin/bsf-core/version.yml');
if(is_file($bsf_core_version_file)) {
	global $bsf_core_version, $bsf_core_path;
	$bsf_core_dir = realpath(dirname(__FILE__).'/admin/bsf-core/');
	$version = file_get_contents($bsf_core_version_file);
	if(version_compare($version, $bsf_core_version, '>')) {
		$bsf_core_version = $version;
		$bsf_core_path = $bsf_core_dir;
	}
}
add_action('init', 'bsf_core_load', 999);
if(!function_exists('bsf_core_load')) {
	function bsf_core_load() {
		global $bsf_core_version, $bsf_core_path;
		if(is_file(realpath($bsf_core_path.'/index.php'))) {
			include_once realpath($bsf_core_path.'/index.php');
		}
	}
}
// BSF CORE commom functions
if(!function_exists('bsf_get_option')) {
	function bsf_get_option($request = false) {
		$bsf_options = get_option('bsf_options');
		if(!$request)
			return $bsf_options;
		else
			return (isset($bsf_options[$request])) ? $bsf_options[$request] : false;
	}
}
if(!function_exists('bsf_update_option')) {
	function bsf_update_option($request, $value) {
		$bsf_options = get_option('bsf_options');
		$bsf_options[$request] = $value;
		return update_option('bsf_options', $bsf_options);
	}
}
add_action( 'wp_ajax_bsf_dismiss_notice', 'bsf_dismiss_notice');
if(!function_exists('bsf_dismiss_notice')) {
	function bsf_dismiss_notice() {
		$notice = $_POST['notice'];
		$x = bsf_update_option($notice, true);
		echo ($x) ? true : false;
		die();
	}
}

add_action('admin_init', 'bsf_core_check',10);
if(!function_exists('bsf_core_check')) {
	function bsf_core_check() {
		if(!defined('BSF_CORE')) {
			if(!bsf_get_option('hide-bsf-core-notice'))
				add_action( 'admin_notices', 'bsf_core_admin_notice' );
		}
	}
}

if(!function_exists('bsf_core_admin_notice')) {
	function bsf_core_admin_notice() {
		?>
		<script type="text/javascript">
		(function($){
			$(document).ready(function(){
				$(document).on( "click", ".bsf-notice", function() {
					var bsf_notice_name = $(this).attr("data-bsf-notice");
				    $.ajax({
				        url: ajaxurl,
				        method: 'POST',
				        data: {
				            action: "bsf_dismiss_notice",
				            notice: bsf_notice_name
				        },
				        success: function(response) {
				        	console.log(response);
				        }
				    })
				})
			});
		})(jQuery);
		</script>
		<div class="bsf-notice update-nag notice is-dismissible" data-bsf-notice="hide-bsf-core-notice">
            <p><?php _e( 'License registration and extensions are not part of plugin/theme anymore. Kindly download and install "BSF CORE" plugin to manage your licenses and extensins.', 'bsf' ); ?></p>
        </div>
		<?php
	}
}

if(isset($_GET['hide-bsf-core-notice']) && $_GET['hide-bsf-core-notice'] === 're-enable') {
	$x = bsf_update_option('hide-bsf-core-notice', false);
}

// end of common functions
?>
