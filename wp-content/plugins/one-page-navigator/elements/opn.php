<?php
if(!class_exists('OPN_Navigator')){
	class OPN_Navigator{
		function __construct(){
			
			add_shortcode('opn_navigator',		array($this, 'opn_navigator_init'));
			add_shortcode('opn_navigator_item',	array($this, 'opn_navigator_item_shortcode'));
			add_action('init',					array($this, 'opn_shortcode_mapper'));
			add_action('wp_enqueue_scripts',	array($this, 'opn_assets'));
			add_action('admin_enqueue_scripts',	array($this, 'opn_admin_assets'));

			// Menu Actions & Filters
			/* Create menu if - Ultimate Addons for Visual Composer is NOT INSTALLED. */
			if( !defined('ULTIMATE_VERSION') ) {
				add_action('admin_menu',		array($this,'create_opn_menu'), 99);
			}

			// Save options
			add_action( 'wp_ajax_opn_options', 	array($this,'opn_options_update'));

			//	Add Admin Page - options to post/page contents
			add_action('wp_footer',				array($this, 'append_opn_settings') );

			//	Add filter to - Remove empty lines & white spaces from selector
			add_filter( 'opn_excludes', 		array($this, 'opn_validate_selector_init') );
			add_filter( 'opn_includes', 		array($this, 'opn_validate_selector_init') );

			add_filter('bsf_core_style_screens', array($this, 'opn_bsf_core_style_hooks'));
		}
		function opn_bsf_core_style_hooks($hooks) {
			$array = array(
				'opn_page_opn-resources',
			);
			foreach ($array as $hook) {
				array_push($hooks, $hook);
			}
			return $hooks;
		}
	   	function opn_validate_selector_init( $sel ) {
	   		if( isset($sel) && !empty( $sel ) ) {
		   		$sel = preg_replace("/[\n\n|\n|\r\n]+/", " ", $sel);
	   		}
	   		return $sel;
	   	}
		function append_opn_settings( $content ) {

			if( !is_404() && !is_search() ){

				wp_enqueue_script('opn-animate-scroll');
				wp_enqueue_script('opn-custom');
				wp_enqueue_style('opn-custom-style');

				global $post;
				$vc_version = 0;
				if(defined('WPB_VC_VERSION') && version_compare( WPB_VC_VERSION, '4.4.4', '>' )) {
					$vc_version = WPB_VC_VERSION;
				}
				$vc_class  = 'vc_row';
				$ex_class  = '.imd_tour_link a, .ult_tab_li a, .bx-pager a, .ui-tabs-anchor, .vc_tta-panel-title a, .vc_tta-tab a, .vc_tta-panel, .ui-title';
				$inc_class = 'a[href!="#"]';

				$active_menu_class = 'opn_active_menu';
				$scroll_status = false;

				if(!$post) return false;

				$post_content = $post->post_content;

				/* 	Enable - for both - main menu (#) link & opn navigation
				 *	Uncomment below code to disable the OPN if - OPN Item list is available. */
				/*if ( !stripos( $post_content, '[opn_navigator') ) {*/
					$opn_options = get_option('opn_options');
					if(!empty($opn_options)) {
						$options = maybe_unserialize( $opn_options ); 	// convert to serialize
						foreach ($options as $key => $value) {
							switch ($key) {
								case 'opn_theme_support':	if($value == 'enable') {
																$scroll_status = true; 		// check 1 scroll enabled?
															}
									break;
								case 'vc_class':		$vc_class = $value; 		// get vc_row class default 'vc_row'
									break;
								case 'ex_class':		$ex_class = $value; 		// get vc_row class default 'vc_row'
									break;
								case 'inc_class':		$inc_class = $value; 		// get vc_row class default 'vc_row'
									break;
								case 'active_menu_class': $active_menu_class = $value;
									break;
							}
						}
					}
				/*}*/

				$ex_class 	= apply_filters('opn_excludes',$ex_class);
				$inc_class 	= apply_filters('opn_includes',$inc_class);
				?>
					<script type="text/javascript">

						/*
						 * 	- 	Add VC_Row classes [with - support theme]
						 *  - 	Add Active Menu class
						 *-------------------------------------------------------------*/
						;(function ( $, window, undefined ) {
							var pluginName = 'OPN_Scroll',
							    document = window.document,
							    defaults = {
									vc_version: parseFloat('<?php echo $vc_version; ?>'),
									activeItem: '<?php echo $active_menu_class; ?>',
									rowClass: '<?php echo $vc_class; ?>',
									inc_class: '<?php echo $inc_class; ?>',
									ex_class: '<?php echo $ex_class; ?>',
									active: '',
									firstItem: false,
							    };

							function opn( element, options ) {
							  this.element = element;
							  this.options = $.extend( {}, defaults, options) ;
							  this._defaults = defaults;
							  this._name = pluginName;
							  this.init();
							}
						  	opn.prototype.init = function () {
							    var self 		= this,
							    	p 			= self._defaults,
							    	ac 			= p.activeItem,
							    	includes 	= p.inc_class;

							    //	Add active class
							    $( includes ).bind('click touchstart', function(){
									$(this).parent('li').siblings().removeClass( ac );
									$(this).parent('li').addClass( ac );
								});

								if(typeof p.rowClass != 'undefined' && p.rowClass != null) {

									//	Add THEME Support for VC ROW ID from OPN
							        $('.opn-row-pre-element').each(function(index, el) {
									    var id = $(el).attr('data-id');
									    var gutter = $(el).attr('data-gutter');
									    var opn_enable_overlay = $(el).attr('data-opn_enable_overlay') || '';
									    var opn_hide_navigation = $(el).attr('data-opn_hide_navigation') || '';

									    //	set VC row class from user
									    var $row = $(el).prevAll('.'+p.rowClass+':first');

									    $row.attr('data-op-gutter', gutter);
									    $row.attr('data-opn_enable_overlay', opn_enable_overlay);
									    $row.attr('data-opn_hide_navigation', opn_hide_navigation);
									    if (id != '') {
									    	//	Add ID for VC version <= 4.4
									    	/*if( parseFloat(p.vc_version) <= parseFloat(4.4) ) {*/
									    		//	Check VC version 4.5 set ROW ID
									    		//	if not found set OPN ID for row.

									    		/* 	Does not check VC version or Row has ID.
									    		 * 	Add ID for row Either VC or OPN.
									    		 * 	To fix theme ID's issue.
									    		 *------------------------------------------------------------*/
									    		var hasID = $row.attr('id') || '';
									    		if(hasID === 'undefined' || hasID === null || hasID==='') {
										        	$row.attr('id', id);
									    		}
									    	/*}*/
									    }
									    $(el).remove();
									});

							        //  Apply for 1 Scroll
									setTimeout(function(){
										$('.'+p.rowClass).each( function(index, elem) {
											var id = $(elem).attr('id') || null;
											if(typeof id!= 'undefined' && id != null) {

							                    // 	Get fist Item
							                    if( p.firstItem == false ) {
							                    	p.firstItem = id;
							                    	$('#'+p.firstItem).addClass('opn-active');
							                    	$('#'+p.firstItem).parent().addClass('opn-row-container');
							                    }
											}
										});
							        },700);
								}
	  						};
							$.fn[pluginName] = function ( options ) {
								return this.each(function () {
									if (!$.data(this, 'plugin_' + pluginName)) {
										$.data(this, 'plugin_' + pluginName, new opn( this, options ));
									}
								});
							}
							$(document).ready(function() {

								$('body').OPN_Scroll();

								//	on Visit Scroll to # link
								var opn_jump = function(e)
						        {
						        	var target = 'undefined';

						            if (e)
						            {
						                e.preventDefault();
						                if( !$(this).hasClass('<?php echo $ex_class; ?>') ) {
						                	target = $(this).attr("href");
						                }
						            } else
						            {
						                target = location.hash;
						            }
						            if (typeof target === 'undefined' || target === '')
						                return false;
						            var gutter = $(target).attr('data-op-gutter');
						            if (typeof gutter === 'undefined')
						                gutter = 0;

						            $(target).animatescroll({
						                scrollSpeed: 1000,
						                easing: 'easeOutQuad',
						                padding: gutter
						            });
						            location.hash = target;
						            $(window).load(function(){
						                setTimeout(function(){
						                     $(target).animatescroll({
						                        scrollSpeed: 1000,
						                        easing: 'easeOutQuad',
						                        padding: gutter
						                    });
						                },500);
						            });
						        }

                                opn_jump();

                                //  Add EXCLUDE - Classes & ID's
                                $('<?php echo $ex_class; ?>').addClass('opn-exclude');

                                /*
                                 *  on Click / Touch
                                 *--------------------------------------------------------*/
                                // For menu it will works
                                $('<?php echo $inc_class; ?>').bind('click touchstart', function(){
                                	//	Exclude Anchors who has class - '.opn-exclude'
					        		if( !$(this).hasClass('opn-exclude') ) {
	                                    if (location.pathname.replace(/\/$/, '') == this.pathname.replace(/\/$/, '') && location.hostname == this.hostname) {
	                                        var target  = $(this.hash);
	                                        var hasHash = this.hash;
	                                        if(typeof hasHash != 'undefined' && hasHash != null && hasHash != '') {
		                                        target = target.length ? target : $('[name=' + hasHash.slice(1) + ']');
		                                        if (target.length) {
		                                            var id = hasHash.slice(1);
		                                            var gutter = $('#' + id).attr('data-op-gutter') || 0;

		                                            $('#' + id).animatescroll({
		                                                scrollSpeed: 1000,
		                                                easing: "easeOutQuad",
		                                                padding: gutter
		                                            });
		                                            return false;
		                                        }
	                                        }
	                                    }
	                              	}
                                });

							});

					        $(document).on('click touchstart', '<?php echo $inc_class; ?>', function(e) {
					        	//	Exclude Anchors who has class - '.opn-exclude'
					        	if( !$(this).hasClass('opn-exclude') ) {
							        if (location.pathname.replace(/\/$/, '') == this.pathname.replace(/\/$/, '') && location.hostname == this.hostname) {
							            var target  = $(this.hash);
	                                    var hasHash = this.hash;
	                                    if(typeof hasHash != 'undefined' && hasHash != null && hasHash != '') {
								            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
								            if (target.length) {

								            	var scroll_speed = 1000;
								                var scroll_effect = "easeOutQuad";
								                var id = this.hash.slice(1);
								                // Above settings works JUST for - One Page Navigator - Menu
								                var i = p = '';
								                $('.opn_fixed .opn_list').each(function(index, element) {
								                    var anch = $(element).find('a');
								                    anch.each(function(ind, elm) {
								                        var a = $(elm).attr('href');

								                        if(typeof a !== 'undefined' && a != null) {
								                            ind = a.split('#')[1];
								                            if(id == ind) {
								                                p = $(elm).parent().parent();
								                                scroll_speed = p.attr('data-scroll_speed') || 1000;
								                                scroll_effect = p.attr('data-scroll_effect') || "easeOutQuad";
								                            }
								                        }
								                    });
								                });

								                var gutter = $('#' + id).attr('data-op-gutter') || 0;
								                scroll_speed = parseInt(scroll_speed);

								                $('#' + id).animatescroll({
								                    scrollSpeed: scroll_speed,
								                    easing: scroll_effect,
								                    padding: gutter
								                });
								                return false;
								            }
								    	}
							        }
							    }
						    });

						}(jQuery, window));
					</script>
			<?php }
			return $content;
		}
		function opn_options_update(){
			$result      = '';
			$optionArray = '';
			
			// update options
			if( isset($_POST['opn_theme_support']) && !empty($_POST['opn_theme_support'] ) ) {
				$optionArray['opn_theme_support'] = $_POST['opn_theme_support'] ;
			}
			if( isset($_POST['vc_class']) && !empty($_POST['vc_class'] ) ) {
				$optionArray['vc_class'] = $_POST['vc_class'] ;
			}
			if( isset($_POST['inc_class']) && !empty($_POST['inc_class'] ) ) {
				$optionArray['inc_class'] = $_POST['inc_class'] ;
			}
			if( isset($_POST['ex_class']) && !empty($_POST['ex_class'] ) ) {
				$optionArray['ex_class'] = $_POST['ex_class'] ;
			}
			if( isset($_POST['active_menu_class']) && !empty($_POST['active_menu_class'] ) ) {
				$optionArray['active_menu_class'] = $_POST['active_menu_class'] ;
			}
			if( !empty($optionArray ) ) {
				$result = maybe_serialize( $optionArray );
			}

			$result = update_option('opn_options',$result);
			if($result!=''){
				echo 'success';
			} else {
				echo 'failed';
			}
			die();
		}
		function create_opn_menu() {

			global $submenu;
			if(defined('BSF_MENU_POS'))
				$required_place = BSF_MENU_POS;
			else
				$required_place = 200;

			$place = bsf_get_free_menu_position($required_place,1);

			$page = add_menu_page(
					'OPN',
					'OPN',
					'administrator',
					'opn-settings',
					array($this,'opn_settings'),
					'dashicons-admin-generic',
					$place
				);
				//	For first sub menu
				add_submenu_page(
					"opn-settings",
					__("OPN Settings","ultimate_vc"),
					__("OPN Settings","ultimate_vc"),
					"administrator",
					"opn-settings",
					array($this,'opn_settings')
				);

				$Ultimate_Google_Font_Manager = new Ultimate_Google_Font_Manager;
				$page = add_submenu_page(
					"DONOTATTACH",
					__("Google Font","ultimate_vc"),
					__("Google Fonts","ultimate_vc"),
					"administrator",
					"bsf-google-font-manager",
					array($Ultimate_Google_Font_Manager,'ultimate_font_manager_dashboard')
				);
				add_action( 'admin_print_scripts-' . $page, array($Ultimate_Google_Font_Manager,'admin_google_font_scripts'));

				$AIO_Icon_Manager = new AIO_Icon_Manager;
				$page2 = add_submenu_page(
					"DONOTATTACH",
					__("Icon Manager","ultimate_vc"),
					__("Icon Manager","ultimate_vc"),
					"administrator",
					"bsf-font-icon-manager",
					array($AIO_Icon_Manager,'icon_manager_dashboard')
				);
				add_action( 'admin_print_scripts-' . $page2, array($AIO_Icon_Manager,'admin_scripts'));

				$resources_page = add_submenu_page(
					"opn-settings",
					__("Resources","ultimate_vc"),
					__("Resources","ultimate_vc"),
					"administrator",
					"opn-resources",
					array($this, 'opn_resources')
				);

		}
		function opn_resources() {
			$connects = false;
			require_once(plugin_dir_path(__FILE__).'../admin/resources.php');
		}

		function opn_settings() {
			wp_enqueue_style('opn-admin-css');
			?>
			<div class="wrap">
		 		<div id="message"></div>
		        <h2><?php echo __('One Page Settings', 'opn'); ?></h2>
				<script type="text/javascript">
					jQuery(document).ready(function(e) {
						jQuery("#opn-options-save").bind('click',function(e){
							e.preventDefault();
							var data = jQuery("#opn-options").serialize();
							//console.log(data);
							jQuery.ajax({
								url: ajaxurl,
								data: data,
								dataType: 'html',
								type: 'post',
								success: function(result){
									if(result == "success"){
										jQuery("#message").html('<div class="updated"><p><?php echo __('Settings updated successfully!','opn'); ?></p></div>');
									} else {
										jQuery("#message").html('<div class="error"><p><?php echo __('No settings were updated.','opn'); ?></p></div>');
									}
								}
							});
						});
					});
				</script>

				<?php
					//	Exclude common Classes & ID's from OPN
					$scroll_status 		= '';
					$ex_class  			= '.imd_tour_link a, .ult_tab_li a, .bx-pager a, .ui-tabs-anchor, .vc_tta-panel-title a, .vc_tta-tab a, .vc_tta-panel, .ui-title';
					$inc_class 			= 'a[href!="#"]';
					$vc_class 			= 'wpb_row';
					$status_val 		= 'disable';
					$active_menu_class 	= 'opn-active-menu';
					$opn_options = get_option('opn_options');
					if(!empty($opn_options)) {
						$options = maybe_unserialize( $opn_options ); 	// convert to serialize
						foreach ($options as $key => $value) {
							switch ($key) {
								case 'opn_theme_support': if($value == 'enable') { $scroll_status = 'checked="checked"'; $status_val = $value; } ; break;
								case 'vc_class': $vc_class = $value; break;
								case 'ex_class': $ex_class = $value; break;
								case 'inc_class': $inc_class = $value; break;
								case 'active_menu_class': $active_menu_class = $value; break;
							}
						}
					}

				?>
		        <form method="post" id="opn-options">
			    	<input type="hidden" name="action" value="opn_options" />
			    	<table class="form-table">

			        	<tbody>

			                <tr valign="top">
			                	<th scope="row"><?php echo __("Active Menu Class","opn");?></th>
			                    <td>
			                    	<input type="text" id="active_menu_class" name="active_menu_class" value="<?php echo $active_menu_class; ?>"/>
			                    	<div class="ult-help">
			                    		<small class="ult-tip"><?php echo __("Set active menu class of your navigation bar;<br/> it may useful for you to write custom CSS to design active menu.", "opn");?></small>
			                    		<i class="dashicons dashicons-editor-help"></i>
			                    	</div>
								</td>
			                </tr>

			                <tr valign="top" class="opn-theme-support-dependant" data-status="<?php echo $status_val; ?>" >
			                	<th scope="row"><?php echo __("VC Row Class","opn");?></th>
			                    <td>
			                    	<input type="text" id="vc_class" name="vc_class" value="<?php echo $vc_class; ?>" />
			                    	<div class="ult-help">
			                    		<small class="ult-tip"><?php echo __("Enter VC Row class if you are using modified version of Visual Composer.", "opn");?></small>
			                    		<i class="dashicons dashicons-editor-help"></i>
			                    	</div>
								</td>
			                </tr>
			                <tr valign="top">
			                	<th scope="row"><?php echo __("Include IDs & Classes","opn");?></th>
			                    <td>
			                    	<textarea id="inc_class" name="inc_class" rows="5" cols="40"><?php echo $inc_class; ?></textarea>
			                    	<div class="ult-help">
			                    		<small class="ult-tip">
			                    			<?php echo __("<b>Be Careful!</b><br/>Valid input selector is required to run this functionality smoothly. Here are examples -", "opn");?><br/>
					                    	Add ID's &amp; Classes to include it from One Page Navigator.<br>
		                                    - Dont add extra <code>comma (,) or dot (.)</code> at the beginning or end of the excludes section.<br>
		                                    - Avoid extra space in between selector e.g. <code># id or . class</code><br>
		                                    [Ref: <a href="https://api.jquery.com/category/selectors/">jQuery Selectors</a>]
			                    		</small>
			                    		<i class="dashicons dashicons-editor-help"></i>
			                    	</div><br/>
			                    	<small><?php echo __( "Include entered classes from scroll to feature. If click on <br>particular element moves your page to top of browser, <br>then add that element's class in this list to stop that behavior.", "opn" ) ; ?></small>
								</td>
			                </tr>
			                <tr valign="top">
			                	<th scope="row"><?php echo __("Exclude IDs & Classes","opn");?></th>
			                    <td>
			                    	<textarea id="ex_class" name="ex_class" rows="5" cols="40"><?php echo $ex_class; ?></textarea>
			                    	<div class="ult-help">
			                    		<small class="ult-tip">
			                    			<?php echo __("<b>Be Careful!</b><br/>Valid input selector is required to run this functionality smoothly. Here are examples -", "opn");?><br/>
					                    	Add ID's &amp; Classes to exclude it from One Page Navigator.<br>
		                                    - Dont add extra <code>comma (,) or dot (.)</code> at the beginning or end of the excludes section.<br>
		                                    - Avoid extra space inbetween selector e.g. <code># id or . class</code><br>
		                                    [Ref: <a href="https://api.jquery.com/category/selectors/">jQuery Selectors</a>]
			                    		</small>
			                    		<i class="dashicons dashicons-editor-help"></i>
			                    	</div><br/>
			                    	<small><?php echo __( "Exclude entered classes from scroll to feature. If click on <br>particular element moves your page to top of browser, <br>then add that element's class in this list to stop that behavior.", "opn" ) ; ?></small>
								</td>
			                </tr>

			            </tbody>
			        </table>
			    </form>
			    <p class="submit"><input type="submit" name="submit" id="opn-options-save" class="button button-large button-primary" value="<?php echo __("Save Changes","ultimate");?>"></p>
		    </div>
		<?php
		}
		function opn_admin_assets() {
			wp_register_style('opn-admin-css', plugins_url('../assets/css/op-admin.css',__FILE__), null, OPN_VERSION, 'all');
		}
		function opn_assets() {
			wp_register_style('opn-custom-style', plugins_url('../assets/css/op-custom.min.css',__FILE__), null, OPN_VERSION, 'all');
		}
		function opn_navigator_item_shortcode($atts, $content = null) {
			global $bg_color, $icon_color, $icon_hover_color, $icon_size, $icon_padding, $tooltip_invert_bg_color, $tooltip_invert_color;
			global $dot_bg_color, $dot_color, $dot_hover_color, $tooltip_background_color, $tooltip_bubble,/*$tooltip_text_color,*/ $tooltip_padding, /*$tooltip_border_color,*/ $tooltip_border_radius, $tooltip_font, $tooltip_font_style, $tooltip_font_size, $tooltip_font_line_height, $tooltip_custom_color;
		    extract( shortcode_atts( array(
		       'target_link'    => '',
		       'title'          => '',
		       'icon'           => 'Defaults-circle',
		    ), $atts ) );

		    //  Styling / Data Attribute variables
		    $tooltip_base_style = $tooltip_content_style = '';
		    $font_args = array();
		    $tooltip_arrow_border_style = $tooltip_arrow_bg_style = '';

		    /**         Tooltip Styling
		     *---------------------------------------------------------*/
		    //  Base
		    /*if($tooltip_border_color!='') { $tooltip_base_style .= 'border-color:' .$tooltip_border_color. ';'; }*/
		    if($tooltip_border_radius!='') { $tooltip_base_style .= 'border-radius:' .$tooltip_border_radius. 'px;'; }
		    /*if($tooltip_border_color!='') { $tooltip_arrow_border_style .= 'border-color:' .$tooltip_border_color. ';'; }*/
		    //  Contents
		    if($tooltip_border_radius!='') { $tooltip_content_style .= 'border-radius:' .$tooltip_border_radius. 'px;'; }
		    if($tooltip_background_color!='') {
		    	$tooltip_content_style .= 'background-color:' .$tooltip_background_color. ';';
		    	$tooltip_arrow_bg_style .= 'border-color:' .$tooltip_background_color. ';';
		    }
		    /*if($tooltip_text_color!='') { $tooltip_content_style .= 'color:' .$tooltip_text_color. ';'; }*/
		    if($tooltip_padding!='') { $tooltip_content_style .= $tooltip_padding;  }
		 	if($tooltip_custom_color != '') { $tooltip_content_style .= 'color:'.$tooltip_custom_color.';'; }
		    //      Typography
		    if($tooltip_font != '') {
		        $font_family = get_ultimate_font_family($tooltip_font);
		        if($font_family!=''){ $tooltip_content_style .= 'font-family:'.$font_family.';'; }
		        array_push($font_args, $tooltip_font);
		    }
	        if($tooltip_font_style != '') { $tooltip_content_style .= get_ultimate_font_style($tooltip_font_style); }
	        if($tooltip_font_size != '') { $tooltip_content_style .= 'font-size:'.$tooltip_font_size.'px;'; }
	        if($tooltip_font_line_height != '') { $tooltip_content_style .= 'line-height:'.$tooltip_font_line_height.'px;'; }

		    //  Link
		    $url = $target = $link_title = '';
		    if($target_link!='') {
		    	/*$link       =   vc_build_link($target_link);
		        $url        =   $link['url'];
		        $target     =   $link['target'];
		        $link_title =   $link['title'];*/
		        $url        =   $target_link;
		        $target     =   '';
		        $link_title =   '';
		    }

		    /**         Icon
		     *---------------------------------------------------------*/
		    $icon_attr = $icon_style = '';
		    // attr
		    //if($icon_color!='')         { $icon_attr .= 'data-icon-color="'.$icon_color.'"'; }
		    //if($icon_hover_color!='')   { $icon_attr .= 'data-icon-hover-color="'.$icon_hover_color.'"'; }
		    //  css
		    if($icon_color!='')         { $icon_style .= 'color:'.$icon_color.';'; }
		    if($icon_size!='')          { $icon_style .= 'font-size:'.$icon_size.'px;'; }
		    /*if($icon_padding!='')       { $icon_style .= $icon_padding; }*/
			ob_start();

			/*<div class="ult-tooltip no-bubble">Friendly Admin Panel</div>*/

			$bubble = '';
			if(isset($tooltip_bubble) && $tooltip_bubble=='off') {
				$bubble = 'no-bubble';
			}

		    echo    '<li style="'.$icon_padding.'" >';
		    echo    '   <a href="'.$url.'" target="'.$target.'" title="'.$link_title.'" >';
		    echo    '     <i class="'.$icon.'" style="'.$icon_style.'" '.$icon_attr.'>';
		    if($title!='') {
		    		echo 	'<div class="opn-tooltip '.$bubble.'" data-invert_bg_color="'.$tooltip_invert_bg_color.'" data-invert_color="'.$tooltip_invert_color.'" data-normal_bg_color="'.$tooltip_background_color.'" data-normal_color="'.$tooltip_custom_color.'" style="'.$tooltip_base_style.' '.$tooltip_content_style.' '.$tooltip_arrow_border_style.' '.$tooltip_arrow_bg_style.' ">' .$title. '</div>';
		    }
		    echo    '     </i>';
		    echo    '   </a>';
		    echo    '</li>';
			return ob_get_clean();
		}

		function opn_navigator_init($atts, $content = null) {
			global $icon_color, $icon_hover_color, $icon_size, $icon_padding, $tooltip_invert_bg_color, $tooltip_invert_color;
			global $dot_bg_color, $dot_color, $dot_hover_color, $tooltip_background_color, $tooltip_bubble, /*$tooltip_text_color,*/ $tooltip_padding, /*$tooltip_border_color,*/ $tooltip_border_radius, $tooltip_font, $tooltip_font_style, $tooltip_font_size, $tooltip_font_line_height, $tooltip_custom_color;

		    extract( shortcode_atts( array(
		    	'nav_position'				=> 	'bottom',
		    	'nav_distance'				=> 	'20',
		    	'nav_opacity'				=>  '0.7',
		        'bg_color'                  =>  '#107fc9',
		        'icon_color'                =>  '#b7c9ff',
		        'icon_hover_color'          =>  '#ffffff',
		        'icon_padding'              =>  '',
		        'icon_size'                 =>  '',
		        'scroll_effect'				=> 	'easeOutQuad',
				'scroll_speed'				=> 	'1000',
				/*'one_row_scroll'			=>  'off',*/
		        'disable_on'				=> 	'',
		        'dot_style'                 =>  '',
		        'dot_position'              =>  '',
		        'dot_bg_color'              =>  '',
		        'dot_color'                 =>  '',
		        'dot_hover_color'           =>  '',
		        'tooltip_background_color'  => '#333333',
		        'tooltip_custom_color'    	=> '#ffffff',
		        'tooltip_invert_bg_color'	=> '#f2f2f2',
				'tooltip_invert_color'		=> '#333333',
		        /*'tooltip_text_color'      => '',*/
		        'tooltip_padding'           => '',
		        /*'tooltip_border_color'    => '',*/
		        'tooltip_border_radius'     => '5',
		        'tooltip_font'    			=> '',
		        'tooltip_font_style'  		=> '',
		        'tooltip_font_size'   		=> '',
		        'tooltip_font_line_height'  => '',
				'on_row_bg_color'			=> '#333333',
				'on_row_icon_color'			=> '#a8a8a8',
				'on_row_icon_hover_color'	=> '#ffffff',
		        'main_heading_margin' 		=> '',
		        'main_heading_padding'  	=> '',
		        'main_heading_border'   	=> '',
		        'media_sizes'           	=> '',
		        'media_sizes_1'         	=> '',
		        'media_sizes_2'         	=> '',
		        'tooltip_bubble'			=> 'on',
		        'tooltip_autoshow'			=> 'off',
		    ), $atts ) );

		    $uid = "ult-responsive-". rand(1000, 9999);
			ob_start();
		    $list_style = 'background-color:' .$bg_color. ';opacity:'.$nav_opacity.';';

		    $DataAtts = '';
		    //	Normal Colors
		    if($bg_color!='') 				{ $DataAtts .= ' data-bg_color="'.$bg_color.'" '; 	}
		    if($icon_color!='') 			{ $DataAtts .= ' data-icon_color="'.$icon_color.'" '; 	}
		    if($icon_hover_color!='') 		{ $DataAtts .= ' data-icon_hover_color="'.$icon_hover_color.'" '; 	}

		    //	Overlay Colors
		    if($on_row_bg_color!='') 		{ $DataAtts .= ' data-on_row_bg_color="'.$on_row_bg_color.'" '; 	}
			if($on_row_icon_color!='') 		{ $DataAtts .= ' data-on_row_icon_color="'.$on_row_icon_color.'" '; 	}
			if($on_row_icon_hover_color!=''){ $DataAtts .= ' data-on_row_icon_hover_color="'.$on_row_icon_hover_color.'" '; 	}

		    echo '<div class="opn_navigator">';
		    //echo '	  <ul data-tooltip_autoshow="'.$tooltip_autoshow.'" data-scroll_effect="'.$scroll_effect.'" data-one_row_scroll="'.$one_row_scroll.'" data-scroll_speed="'.$scroll_speed.'" data-nav-position="'.$nav_position.'" data-nav_distance="'.$nav_distance.'" class="opn_list '.$disable_on.'" style="'.$list_style.'" '.$DataAtts.' >';
		    echo '	  <ul data-tooltip_autoshow="'.$tooltip_autoshow.'" data-scroll_effect="'.$scroll_effect.'" data-scroll_speed="'.$scroll_speed.'" data-nav-position="'.$nav_position.'" data-nav_distance="'.$nav_distance.'" class="opn_list '.$disable_on.'" style="'.$list_style.'" '.$DataAtts.' >';
		    echo  	  		do_shortcode($content);
		    echo '	  </ul>';
		    echo '</div>';
			return ob_get_clean();
		}

		function opn_shortcode_mapper(){
			if(function_exists('vc_map')){
				vc_map(
					array(
						"name"                    => __("One Page Navigator", "opn"),
						"base"                    => "opn_navigator",
						"icon"                    => plugins_url('../assets/img/nav-parent.png',__FILE__),
						"as_parent"               => array('only' => 'opn_navigator_item'),
						"content_element"         => true,
						"controls"                => "full",
						"show_settings_on_create" => true,
						"category"                => "One Page Navigator",
						"description"             => "Navigation menu for one page.",
						"js_view"                 => 'VcColumnView',
						"params"                  => array(
							array(
								"type"       => "dropdown",
								"class"      => "",
								"heading"    => __("Navigation Bar Position","opn"),
								"param_name" => "nav_position",
								"value"      => array(
									__( 'Bottom', 'opn' ) => '',
									__( 'Right', 'opn' )  => 'right',
									__( 'Left', 'opn' )   => 'left',
								),
								"description" => __( 'Bottom position works perfect only when row height is greater than or equal to viewport height.', 'opn' )
						  	),
			                array(
								"type"        => "number",
								"param_name"  => "nav_distance",
								"heading"     => __('Navigation Bar Placement', 'opn' ),
								"description" => __( 'Distance of Navigation Bar from edge of the screen.', 'opn' ),
								"value"       => '',
								"suffix"      => 'px',
			                ),
			                array(
								"type"        => "number",
								"param_name"  => "nav_opacity",
								"heading"     => "Navigation Bar Opacity",
								"description" => "This setting controls opacity of navigation bar. Enter value between 0.1 to 1.0.<br> (0 means transparent & 1 means solid)",
								"value"       => "",
								"suffix"      => "",
								"step"        => 0.1,
								"min"         => 0.1,
								"max"         => 1,
			                ),
			                array(
								"type"       => "number",
								"param_name" => "icon_size",
								"heading"    => "Icon Size",
								"value"      => "",
								"suffix"     => "px",
								"min"        => 10,
			                ),

			                //	add spacing param
			                array(
								"type"       => "ultimate_spacing",
								"heading"    => "Padding Between Icons",
								"param_name" => "icon_padding",
								"mode"       => "padding",                    //  margin/padding
								"unit"       => "px",                        //  [required] px,em,%,all     Default all
								"positions"  => array(                   //  Also set 'defaults'
									__( 'Top', 'opn' )    => '',
									__( 'Right', 'opn' )  => '',
									__( 'Bottom', 'opn' ) => '',
									__( 'Left', 'opn' )   => '',
							    ),
							),
							array(
								"type"       => "dropdown",
								"class"      => "",
								"heading"    => __("Hide Navigation Bar on","opn"),
								"param_name" => "disable_on",
								"value"      => array(
									__( 'None', 'opn' )          => '',
									__( 'iPad & Mobile', 'opn' ) => 'disable_on_767',
									__( 'Mobile Only', 'opn' )   => 'disable_on_479',
								),
						  	),

							//	Colors
							array(
								"type"             => "ult_param_heading",
								"param_name"       => "normal_colors_typography",
								"heading"          => __("Navigation Bar - Normal Colors","opn"),
								"value"            => "",
								"class"            => "ult-param-heading",
								'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
								"group"            => "Colors"
							),
							array(
								"type"       => "colorpicker",
								"class"      => "",
								"heading"    => __("Background Color", "opn"),
								"param_name" => "bg_color",
								"value"      => "",
								"group"      => "Colors"
			                ),
			                array(
								"type"       => "colorpicker",
								"class"      => "",
								"heading"    => __("Icon Color", "opn"),
								"param_name" => "icon_color",
								"value"      => "",
								"group"      => "Colors"
			                ),
			                array(
								"type"       => "colorpicker",
								"class"      => "",
								"heading"    => __("Icon Active Color", "opn"),
								"param_name" => "icon_hover_color",
								"value"      => "",
								"group"      => "Colors"
			                ),

			                array(
								"type"             => "ult_param_heading",
								"param_name"       => "invert_colors_typography",
								"heading"          => __("Navigation Bar - Invert Colors","opn"),
								"value"            => "",
								"class"            => "ult-param-heading",
								'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
								"group"            => "Colors"
							),
							array(
								"type"       => "colorpicker",
								"heading"    => __("Background Color","opn"),
								"param_name" => "on_row_bg_color",
								"value"      => "",
								"group"      => "Colors"
							),
							array(
								"type"       => "colorpicker",
								"heading"    => __("Icon Color","opn"),
								"param_name" => "on_row_icon_color",
								"value"      => "",
								"group"      => "Colors"
							),
							array(
								"type"       => "colorpicker",
								"heading"    => __("Icon Active Color","opn"),
								"param_name" => "on_row_icon_hover_color",
								"value"      => "",
								"group"      => "Colors"
							),

							array(
								"type"             => "ult_param_heading",
								"param_name"       => "tooltip_colors_typography",
								"heading"          => __("Tooltip - Normal Colors","opn"),
								"value"            => "",
								"class"            => "ult-param-heading",
								'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
								"group"            => "Colors"
							),
			                array(
								"type"         => "colorpicker",
								"class"        => "",
								"heading"      => __("Background Color", "opn"),
								"param_name"   => "tooltip_background_color",
								"value"        => "",
								"group"        => "Colors",
								//"dependency" => array("element" => "tooltip_theme", "value" => "custom"),
			                ),
			                array(
								"type"          => "colorpicker",
								"class"         => "",
								"heading"       => __("Tooltip Text Color", "opn"),
								"param_name"    => "tooltip_custom_color",
								"value"         => "",
								// "dependency" => array("element" => "tooltip_theme", "value" => "custom"),
								"group"         => "Colors",
								/*"description" => __("Select the color for tooltip text.", "opn"),                */
			                ),
			                array(
								"type"             => "ult_param_heading",
								"param_name"       => "tooltip_colors_typography",
								"heading"          => __("Tooltip - Invert Colors","opn"),
								"value"            => "",
								"class"            => "ult-param-heading",
								'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
								"group"            => "Colors"
							),
			                array(
								"type"         => "colorpicker",
								"class"        => "",
								"heading"      => __("Background Color", "opn"),
								"param_name"   => "tooltip_invert_bg_color",
								"value"        => "",
								"group"        => "Colors",
								//"dependency" => array("element" => "tooltip_theme", "value" => "custom"),
			                ),
			                array(
								"type"          => "colorpicker",
								"class"         => "",
								"heading"       => __("Tooltip Text Color", "opn"),
								"param_name"    => "tooltip_invert_color",
								"value"         => "",
								// "dependency" => array("element" => "tooltip_theme", "value" => "custom"),
								"group"         => "Colors",
								/*"description" => __("Select the color for tooltip text.", "opn"),                */
			                ),

			                //  Tooltip
			                array(
								"type"       => "ultimate_spacing",
								"heading"    => "Padding",
								"param_name" => "tooltip_padding",
								"mode"       => "padding",                    //  margin/padding
								"unit"       => "px",                        //  [required] px,em,%,all     Default all
								"positions"  => array(                   //  Also set 'defaults'
									"Top"    => "",
									"Right"  => "",
									"Bottom" => "",
									"Left"   => ""
							    ),
								"description" => __("Adjust inside spacing of tooltip.", "opn"),
								"group"       => "Tooltip",
							),
			                array(
								"type"       => "number",
								"class"      => "",
								"heading"    => __("Border Radius", "opn"),
								"param_name" => "tooltip_border_radius",
								"value"      => "",
								"group"      => "Tooltip",
								"suffix"     => "px",
			                ),
			                array(
								"type"       => "ult_switch",
								"class"      => "",
								"heading"    => __("Bubble Arrow", "opn"),
								"param_name" => "tooltip_bubble",
								"value"      => "",
								"options"    => array(
									"on" => array(
										"label" => __("Do you want to show arrow for tooltip?",'opn'),
										"on"    => "Yes",
										"off"   => "No",
									),
								),
								"group" => "Tooltip",
							),
							array(
								"type"       => "ult_switch",
								"class"      => "",
								"heading"    => __("Auto Show - Active Item Tooltip","opn"),
								"param_name" => "tooltip_autoshow",
								"value"      => "",
								"options"    => array(
									"on" => array(
										"label" => __("Automatically appear {Active} item tooltip?",'opn'),
										"on"    => __("Yes", "opn"),
										"off"   => __("No", "opn"),
									),
								),
								"group" => "Tooltip",
							),

			                //  Typography
			                array(
								"type"       => "ultimate_google_fonts",
								"heading"    => "Font Family",
								"param_name" => "tooltip_font",
								"value"      => "",
								"group"      => "Tooltip Typography"
			                ),
			                array(
								"type"       => "ultimate_google_fonts_style",
								"heading"    => "Font Style",
								"param_name" => "tooltip_font_style",
								"value"      => "",
								"group"      => "Tooltip Typography"
			                ),
			                array(
								"type"       => "number",
								"param_name" => "tooltip_font_size",
								"heading"    => "Font size",
								"value"      => "",
								"suffix"     => "px",
								"min"        => 10,
								"group"      => "Tooltip Typography"
			                ),
			                array(
								"type"       => "number",
								"param_name" => "tooltip_font_line_height",
								"heading"    => "Line Height",
								"value"      => "",
								"suffix"     => "px",
								"min"        => 10,
								"group"      => "Tooltip Typography"
			                ),

			                //	"Scroll Settings"
							array(
								"type"       => "dropdown",
								"class"      => "",
								"heading"    => __("Scroll Effects","opn"),
								"param_name" => "scroll_effect",
								"value"      => array(
									'easeOutQuad'      => '',
									'easeInOutCirc'    => 'easeInOutCirc',
									'easeInQuad'       => 'easeInQuad',
									'easeInOutQuad'    => 'easeInOutQuad',
									'easeInCubic'      => 'easeInCubic',
									'easeOutCubic'     => 'easeOutCubic',
									'easeInOutCubic'   => 'easeInOutCubic',
									'easeInQuart'      => 'easeInQuart',
									'easeOutQuart'     => 'easeOutQuart',
									'easeInOutQuart'   => 'easeInOutQuart',
									'easeInQuint'      => 'easeInQuint',
									'easeOutQuint'     => 'easeOutQuint',
									'easeInOutQuint'   => 'easeInOutQuint',
									'easeInSine'       => 'easeInSine',
									'easeOutSine'      => 'easeOutSine',
									'easeInOutSine'    => 'easeInOutSine',
									'easeInExpo'       => 'easeInExpo',
									'easeOutExpo'      => 'easeOutExpo',
									'easeInOutExpo'    => 'easeInOutExpo',
									'easeInCirc'       => 'easeInCirc',
									'easeOutCirc'      => 'easeOutCirc',
									'easeInElastic'    => 'easeInElastic',
									'easeOutElastic'   => 'easeOutElastic',
									'easeInOutElastic' => 'easeInOutElastic',
									'easeInBack'       => 'easeInBack',
									'easeOutBack'      => 'easeOutBack',
									'easeInOutBack'    => 'easeInOutBack',
									'easeInBounce'     => 'easeInBounce',
									'easeOutBounce'    => 'easeOutBounce',
									'easeInOutBounce'  => 'easeInOutBounce',
								),
								"group"       => "Scroll Settings",
								"description" => __("Scroll page nicely after clicking on navigation bar item.", "opn"),
						  	),
			                array(
								"type"       => "number",
								"class"      => "",
								"heading"    => __("Scroll Speed", "opn"),
								"param_name" => "scroll_speed",
								"value"      => "",
								"group"      => "",
								"suffix"     => "ms",
								"group"      => "Scroll Settings",
			                ),
			                /*array(
								"type"       => "ult_switch",
								"class"      => "",
								"heading"    => __("One Row Scroll", "opn"),
								"param_name" => "one_row_scroll",
								"value"      => "",
								"options"    => array(
									"on" => array(
										"label" => __("Move to next/previous row on single scroll?",'opn'),
										"on" => "Yes",
										"off" => "No",
									),
								),
								"group" => "Scroll Settings",
							),*/
						)
					)//vc_map => array
				);//vc_map
				vc_map( array(
					"name" => __("One Page Navigator - Item", "opn"),
					"base" => "opn_navigator_item",
					"icon" => plugins_url('../assets/img/nav-item.png',__FILE__),
					"content_element" => true,
					"as_child" => array('only' => 'opn_navigator'),
					"params" => array (
						array(
							"type"        => "textfield",
							/*"holder"    => "div",*/
							"class"       => "",
							"heading"     => __("Tooltip Text", 'opn'),
							"param_name"  => "title",
							"value"       => __("", 'opn'),
							"description" => __("This is displayed when user hovers on the navigation item.", 'ultimate')
                        ),
                        array(
							"type"        => "textfield",
							"class"       => "",
							"heading"     => __("Link to the Row with ID", 'opn'),
							"param_name"  => "target_link",
							"admin_label" => true,
							"value"       => __("", 'opn'),
							"description" => __("Example - http://domain.com#YourID or #YourID", 'ultimate')
                        ),
                        /*array(
							"type"        => "vc_link",
							"class"       => "",
							"heading"     => __("Link to the Row with ID", "opn"),
							"param_name"  => "target_link",
							"value"       => "",
							"description" => __("Example - domain.com#YourID", "opn"),
					 	),*/
                   		array(
							"type"        => "icon_manager",
							"class"       => "",
							"heading"     => __("Icon for Navigation Item","opn"),
							"param_name"  => "icon",
							"value"       => "",
							"description" => __("Click and select icon of your choice. If you can't find the one that suits for your purpose, you can <a href='admin.php?page=font-icon-Manager' target='_blank'>add new here</a>.", "opn"),
							"group"       => __("Select Icon", 'opn'),
				  	 	),
					) //params array
				)// vc_map => array - single
				);//vc_map - single
			} /* end vc_map check*/
		}/*end animate_shortcode_mapper()*/
	}
	// Instantiate the class
	new OPN_Navigator;

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_opn_navigator_item extends WPBakeryShortCode {
			function content($atts,$content=null){
				return opn_navigator_item_shortcode($atts,$content=null);
			}
		}
	}
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_opn_navigator extends WPBakeryShortCodesContainer {
		}
	}
}
