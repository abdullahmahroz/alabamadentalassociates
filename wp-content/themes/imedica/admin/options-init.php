<?php
/* *
  ReduxFramework Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */
if ( ! class_exists( 'imedica_Redux_Framework_config' ) ) {
	class imedica_Redux_Framework_config {
		public $args = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {
			if ( ! class_exists( 'Redux' ) ) {
				return;
			}
			// This is needed. Bah WordPress bugs.  ;)
			if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
				$this->initSettings();
			} else {
				add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
			}
		}

		public function initSettings() {
			// Just for demo purposes. Not needed per say.
			$this->theme = wp_get_theme();
			// Set the default arguments
			$this->setArguments();
			// Set a few help tabs so you can see how it's done
			$this->setHelpTabs();
			// Create the sections and fields
			$this->setSections();
			if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
				return;
			}
			// If Redux is running as a plugin, this will remove the demo notice and links
			add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

			$this->ReduxFramework = new Redux( $this->sections, $this->args );
		}

		/* *
          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field   set with compiler=>true is changed.
         * */
		function compiler_action( $options, $css ) {
			return;
		}

		/* *
          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.
          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons
         * */
		function dynamic_section( $sections ) {
			$sections[] = array(
				'title'  => __( 'Section via hook', 'imedica' ),
				'desc'   => __( '<p class="redux-section-desc">' . $this->args['opt_name'] . 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'imedica' ),
				'icon'   => 'el-icon-paper-clip',
				// Leave this as a blank section, no options just some intro text set above.
				'fields' => array()
			);

			return $sections;
		}

		/* *
          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
         * */
		function change_arguments( $args ) {
			$args['dev_mode'] = false;
			return $args;
		}

		/* *
          Filter hook for filtering the default value of any given field. Very useful in development mode.
         * */
		function change_defaults( $defaults ) {
			$defaults['str_replace'] = 'Testing filter hook!';

			return $defaults;
		}

		// Remove the demo link and the notice of integrated demo from the redux-framework plugin
		function remove_demo() {
			// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
			if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
				remove_filter( 'plugin_row_meta', array(
					ReduxFrameworkPlugin::instance(),
					'plugin_metalinks'
				), null, 2 );
				// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
				remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
			}
		}

		public function setSections() {
			/* *
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
			// Background Patterns Reader
			$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
			$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
			$sample_patterns      = array();
			if ( is_dir( $sample_patterns_path ) ) :
				if ( $sample_patterns_dir = Opendir( $sample_patterns_path ) ) :
					$sample_patterns = array();
					while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
						if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
							$name              = explode( '.', $sample_patterns_file );
							$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
							$sample_patterns[] = array(
								'alt' => $name,
								'img' => $sample_patterns_url . $sample_patterns_file
							);
						}
					}
				endif;
			endif;
			ob_start();
			$ct              = wp_get_theme();
			$this->theme     = $ct;
			$item_name       = $this->theme->get( 'Name' );
			$tags            = $this->theme->Tags;
			$screenshot      = $this->theme->get_screenshot();
			$class           = $screenshot ? 'has-screenshot' : '';
			$imedica_headers = imedica_get_headers_list();
			$imedica_footers = imedica_get_footers_list();
			$customize_title = sprintf( __( 'Customize &#8220;%s&#8221;', 'imedica' ), $this->theme->display( 'Name' ) );

			?>
			<div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
				<?php if ( $screenshot ) : ?>
					<?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
						<a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
						   title="<?php echo esc_attr( $customize_title ); ?>">
							<img src="<?php echo esc_url( $screenshot ); ?>"
							     alt="<?php esc_attr_e( 'Current theme preview' ); ?>"/>
						</a>
					<?php endif; ?>
					<img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
					     alt="<?php esc_attr_e( 'Current theme preview' ); ?>"/>
				<?php endif; ?>
				<h4><?php echo $this->theme->display( 'Name' ); ?></h4>

				<div>
					<ul class="theme-info">
						<li><?php printf( __( 'By %s', 'imedica' ), $this->theme->display( 'Author' ) ); ?></li>
						<li><?php printf( __( 'Version %s', 'imedica' ), $this->theme->display( 'Version' ) ); ?></li>
						<li><?php echo '<strong>' . __( 'Tags', 'imedica' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
					</ul>
					<p class="theme-description"><?php echo $this->theme->display( 'Description' ); ?></p>
					<?php
					if ( $this->theme->parent() ) {
						printf( ' <p class="howto">' . __( 'This <a href="%1$s">child theme</a> requires its parent theme, %2$s.' ) . '</p>', __( 'http://codex.wordpress.org/Child_Themes', 'imedica' ), $this->theme->parent()->display( 'Name' ) );
					}
					?>
				</div>
			</div>
			<?php
			$item_info = ob_get_contents();
			ob_end_clean();
			$sampleHTML = '';
			if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
				/** @global WP_Filesystem_Direct $wp_filesystem */
				global $wp_filesystem;
				if ( empty( $wp_filesystem ) ) {
					require_once( ABSPATH . '/wp-admin/includes/file.php' );
					WP_Filesystem();
				}
				$sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
			}
			// ACTUAL DECLARATION OF SECTIONS
			if ( ! class_exists( 'Redux' ) ) {
		        return;
		    }
			$opt_name = "imedica_opts";
			$theme = wp_get_theme();

			Redux::setArgs( $opt_name, $this->args );

			$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'admin_folder' );
    		Redux::setHelpSidebar( $opt_name, $content );

			Redux::setSection( $opt_name, array(
				'title'   => __( 'General', 'imedica' ),
				'heading' => __( 'Site Layout', 'imedica' ),
				'desc'    => __( '<p class="redux-section-desc">Select your site layout from options given.</p>', 'imedica' ),
				'icon'    => 'el-icon-home',
				'fields'  => array(
					array(
						'id'      => 'imedica_layout',
						'type'    => 'select',
						'title'   => __( 'Select Site Layout', 'imedica' ),
						'options' => array(
							'container'       => 'Box Layout',
							'container-box'   => 'Full Width Layout',
							'container-padded' => 'Padded Layout',
							'container-fluid' => 'Fluid Layout'
						),
						'default' => 'container-box',
					),
					// New updated options for Padded template
					array(
						'id'          => 'imedica-padded-body-bg-color',
						'type'        => 'color_rgba',
						'title'       => __( 'Body Background Color', 'imedica' ),
						'desc'        => __( 'Set color from the padded space.', 'imedica' ),
						'default'     => array( 'color' => '#FFFFFF', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
						'transparent' => false,
						'required'    => array( 'imedica_layout', '=', 'container-padded' )
					),
					array(
						'id'            => 'imedica-box-width',
						'title'         => __( 'Box Width', 'imedica' ),
						'type'          => 'spinner',
						'subtitle'      => __( 'Width of actual content area.', 'imedica' ),
						'default'       => 1170,
						'min'           => 320,
						'step'          => 1,
						'max'           => 1920,
						'display_value' => 'select',
						'required'      => array( 'imedica_layout', '=', 'container' )
					),
					array(
						'id'            => 'box-margin-topbottom',
						'title'         => __( 'Box Top and Bottom Margin', 'imedica' ),
						'type'          => 'spinner',
						'subtitle'      => __( 'Top and bottom margin for the box layout', 'imedica' ),
						'default'       => 0,
						'min'           => 0,
						'step'          => 1,
						'max'           => 600,
						'display_value' => 'select',
						'required'      => array( 'imedica_layout', '=', 'container' )
					),
					array(
						'id'          => 'imedica-padded-bg-color',
						'type'        => 'color_rgba',
						'title'       => __( 'Padding Background Color', 'imedica' ),
						'desc'        => __( 'Set color from the padded space.', 'imedica' ),
						'default'     => array( 'color' => '#F6F6F6', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
						'transparent' => false,
						'required'    => array( 'imedica_layout', '=', 'container-padded' )
					),
					array(
						'id'       => 'imedica-padded-bg-img',
						'type'     => 'media',
						'url'      => true,
						'title'    => __( 'Padding Background Image', 'imedica' ),
						'compiler' => 'true',
						'desc'     => __( 'Upload Background Image for padded space or leave blank for no image.', 'imedica' ),
						'default'  => '',
						'required' => array( 'imedica_layout', '=', 'container-padded' )
					),
					array(
						'id'          => 'imd-padded-bg-img-repeat',
						'title'       => __( 'Padding Background Repeat', 'imedica' ),
						'desc'        => '<p class="redux-section-desc">Please select the background repeat option according to your image.</p>',
						'type'        => 'select',
						'options'     => array(
							"repeat"    => "Repeat",
							"repeat-x"  => "Repeat X",
							"repeat-y"  => "Repeat Y",
							"no-repeat" => "No Repeat"
						),
						'placeholder' => 'Background repeat',
						'default'     => 'repeat',
						'required'    => array( 'imedica_layout', '=', 'container-padded' )
					),
					// End new updated options for Padded template
					array(
						'id'            => 'imedica-content-width',
						'title'         => __( 'Content Max Width', 'imedica' ),
						'type'          => 'spinner',
						'subtitle'      => __( 'Width of actual content area.', 'imedica' ),
						'default'       => 1170,
						'min'           => 320,
						'step'          => 1,
						'max'           => 1920,
						'display_value' => 'select',
						'required'      => array( 'imedica_layout', '=', 'container-box' )
					),
					array(
						'id'          => 'imedica-color-bg',
						'type'        => 'color_rgba',
						'title'       => __( 'Default Site Background Color', 'imedica' ),
						'desc'        => __( 'Set site background color.', 'imedica' ),
						'default'     => array( 'color' => '#F8F8F8', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
						'transparent' => false,
						'required'    => array( 'imedica_layout', '=', 'container' )
					),
					array(
						'id'       => 'imedica-color-bg-img',
						'type'     => 'media',
						'url'      => true,
						'title'    => __( 'Default Site Background Image', 'imedica' ),
						'compiler' => 'true',
						'desc'     => __( 'Upload Site Background Image or leave blank for no image.', 'imedica' ),
						'default'  => array( 'url' => get_template_directory_uri() . "/css/img/imbg.jpg" ),
						'required' => array( 'imedica_layout', '=', 'container' )
					),
					array(
						'id'          => 'imd-bg-img-repeat',
						'title'       => __( 'Background Repeat', 'imedica' ),
						'desc'        => '<p class="redux-section-desc">Please select the background repeat option according to your image.</p>',
						'type'        => 'select',
						'options'     => array(
							"repeat"    => "Repeat",
							"repeat-x"  => "Repeat X",
							"repeat-y"  => "Repeat Y",
							"no-repeat" => "No Repeat"
						),
						'placeholder' => 'Background repeat',
						'default'     => 'repeat',
						'required'    => array( 'imedica_layout', '=', 'container' )
					),
				)
			));
			Redux::setSection( $opt_name, array(
        		'title'      =>  __( 'Logo and Icons', 'imedica' ),
        		'id'         => 'section-theme-logo-icons',
        		'desc' 		 => __( 'These are the general settings required for your website. Upload your logo and icons to be used on various devices.', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						"title"   => __( "Custom Header Logo", 'imedica' ),
						"desc"    => __( "Upload custom logo for header.", 'imedica' ),
						"id"      => "imedica_logo",
						"default" => array( 'url' => get_template_directory_uri() . "/css/img/logo.png" ),
						"type"    => "media"
					),
					array(
						"title"   => __( "Custom Retina Logo", 'imedica' ),
						"desc"    => __( "Upload custom logo for retina display.", 'imedica' ),
						"id"      => "imedica_logo_retina",
						"default" => array( 'url' => get_template_directory_uri() . "/css/img/logo@2x.png" ),
						"type"    => "media"
					),
					array(
						"title"   => __( "Custom Favicon", 'imedica' ),
						"desc"    => __( "Upload your custom favicon.", 'imedica' ),
						"id"      => "imedica_favicon",
						"default" => array( 'url' => get_template_directory_uri() . "/css/img/favicon@2x.png" ),
						"type"    => "media"
					),
					array(
						"title" => __( "Apple iPhone Icon", 'imedica' ),
						"desc"  => __( "Upload icon for Apple iPhone (57px X 57px ).", 'imedica' ),
						"id"    => "imedica_iphone_icon",
						"std"   => "",
						"type"  => "media"
					),
					array(
						"title" => __( "Apple iPad Icon", 'imedica' ),
						"desc"  => __( "Upload icon for Apple iPad (72px X 72px ).", 'imedica' ),
						"id"    => "imedica_ipad_icon",
						"std"   => "",
						"type"  => "media"
					),
				)
			) );
			Redux::setSection( $opt_name, array(
        		'title'      => __( 'Contact Information', 'imedica' ),
        		'id'         => 'section-theme-contact-info',
        		'desc' => __( 'Enter your contact details', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						'id'      => 'imedica-phone-number',
						'type'    => 'text',
						'title'   => __( 'Phone Number', 'imedica' ),
						'default' => '1800-123-456',
					),
					array(
						'id'      => 'imedica-email-id',
						'type'    => 'text',
						'title'   => __( 'Email id', 'imedica' ),
						'default' => 'email@domain.com',
					),
				),
			) );
			Redux::setSection( $opt_name, array(
				'title'  => __( 'Blog', 'imedica' ),
				'desc'   => __( '<p class="redux-section-desc">Set options to enhance the look and feel of Blog page.</p>', 'imedica' ),
				'icon'   => 'el-icon-bold',
				'fields' => array(
					array(
						'id'          => 'imedica-blog-layout',
						'title'       => __( 'Select Blog Layout', 'imedica' ),
						'desc'        => '<p class="redux-section-desc">Please select the layout you would like to use for your blog page.</p>',
						'type'        => 'select',
						'options'     => array(
							"blog-medium"     => __( "Masonry Blog two Columns", 'imedica' ),
							"blog-small"      => __( "Masonry Blog Three Columns", 'imedica' ),
							"blog-large"      => __( "Blog Large Images", 'imedica' ),
							"blog-img-medium" => __( "Blog Medium Images", 'imedica' )
						),
						'placeholder' => 'Select Blog Layout',
						'default'     => 'blog-large'
					),
					array(
						'id'          => 'blog-infinite-scroll',
						'type'        => __( 'switch', 'imedica' ),
						'title'       => __( 'Enable or disable infinite loading of blog posts', 'imedica' ),
						'description' => __( 'Choose whether you want to enable infinitely loading blog posts', 'imedica' ),
						'default'     => 0,
						'on'          => 'Enabled',
						'off'         => 'Disabled',
						'required'    => array(
							array(
								'imedica-blog-layout',
								'equals',
								array(
									'blog-medium',
									'blog-small',
									'blog-large',
									'blog-img-medium'
								)
							),
						)
					),
					array(
						'id'          => 'blog-infinite-scroll-event',
						'type'        => __( 'switch', 'imedica' ),
						'title'       => __( 'Event to trigger infinite loading', 'imedica' ),
						'description' => __( 'Choose whether you want trigger infinite loading of blog posts on Scroll or Button Click', 'imedica' ),
						'default'     => 1,
						'on'          => 'Scroll',
						'off'         => 'Click',
						'required'    => array( 'blog-infinite-scroll', 'equals', '1' ),
					),
					array(
						'id'          => 'blog-appear-animation',
						'type'        => __( 'switch', 'imedica' ),
						'title'       => __( 'Enable or disable appear animation for blog posts', 'imedica' ),
						'description' => __( 'Choose whether you want to enable the appear animation for blog posts', 'imedica' ),
						'default'     => 1,
						'on'          => 'Enabled',
						'off'         => 'Disabled',
						'required'    => array(
							array(
								'imedica-blog-layout',
								'equals',
								array(
									'blog-medium',
									'blog-small',
									'blog-large',
									'blog-img-medium'
								)
							),
						)
					),
					array(
						'id'       => 'blog-appear-animation-select',
						'type'     => 'select',
						'title'    => __( 'Appear animation for blog posts', 'imedica' ),
						'subtitle' => __( 'Select the animation for the blog posts', 'imedica' ),
						'options'  => array(
							"bounce"      => 'bounce',
							"pulse"       => 'pulse',
							"shake"       => 'shake',
							"swing"       => 'swing',
							"tada"        => 'tada',
							"bounceIn"    => 'bounceIn',
							"bounceInUp"  => 'bounceInUp',
							"fadeIn"      => 'fadeIn',
							"fadeInUp"    => 'fadeInUp',
							"fadeInUpBig" => 'fadeInUpBig',
							"zoomIn"      => 'zoomIn',
							"zoomInUp"    => 'zoomInUp',
						),
						'default'  => 'fadeInUp',
						'required' => array( 'blog-appear-animation', 'equals', '1' ),
					),
					array(
						'id'            => 'imedica-blog-animation-delay',
						'title'         => __( 'Animation delay for the blog posts', 'imedica' ),
						'type'          => 'spinner',
						'default'       => 0,
						'min'           => 0,
						'step'          => 1,
						'max'           => 5,
						'display_value' => 'select',
						'required'      => array( 'blog-appear-animation', 'equals', '1' ),
					),
					array(
						'id'            => 'imedica-blog-animation-duration',
						'title'         => __( 'Animation duration for the blog posts', 'imedica' ),
						'type'          => 'spinner',
						'default'       => 2,
						'min'           => 0,
						'step'          => 1,
						'max'           => 5,
						'display_value' => 'select',
						'required'      => array( 'blog-appear-animation', 'equals', '1' ),
					),
					array(
						'id'       => 'imedica-blog-meta',
						'type'     => 'sorter',
						'title'    => 'Manage Blog Meta Data',
						'subtitle' => '<p class="redux-section-desc">Set which blog metadata you would like to display on the blog.</p>',
						'compiler' => 'false',
						'backup'   => false,
						'options'  => array(
							'enabled'  => array(
								'author'   => 'Author',
								'date'     => 'Post Publish Date',
								'category' => 'Category',
								'tag' => 'Tag',
								'like'     => 'Post Like',
								'link'     => 'Read More Link',
								'comments' => 'Comments Popup'
							),
							'disabled' => array(),
						),

					),
					array(
						'id'       => 'author-bio-display',
						'type'     => 'switch',
						'title'    => __( 'Show author info in blog posts', 'imedica' ),
						'subtitle' => __( 'Choose whether you want to display or hide the author information on blog posts', 'imedica' ),
						'default'  => 1,
						'on'       => 'Enabled',
						'off'      => 'Disabled',
					),
					array(
						'id'       => 'display-related-posts',
						'type'     => 'switch',
						'title'    => __( 'Display Related Posts on Blog Posts', 'imedica' ),
						'subtitle' => __( 'Choose whether you want to display or hide post Related posts on a single blog post', 'imedica' ),
						'default'  => 1,
						'on'       => 'Enabled',
						'off'      => 'Disabled',
					),
					array(
						'id'       => 'post-sharer-enable',
						'type'     => 'switch',
						'title'    => __( 'Show social sharer on blog posts', 'imedica' ),
						'subtitle' => __( 'Choose whether you want to display or hide social share on blog posts', 'imedica' ),
						'default'  => 1,
						'on'       => 'Enabled',
						'off'      => 'Disabled',
					),
					array(
						'id'       => 'post-sharer-networks',
						'type'     => 'checkbox',
						'title'    => __( 'Social networks to be allowed for sharing', 'imedica' ),
						'subtitle' => __( 'Select the social networks to be displayed in post page', 'imedica' ),
						'required' => array( 'post-sharer-enable', 'equals', '1' ),
						'options'  => array(
							'fb'        => 'Facebook',
							'twitter'   => 'twitter',
							'linkedin'  => 'LinkedIn ',
							'reddit'    => 'reddit',
							'tumblr'    => 'Tumblr',
							'gplus'     => 'Google+',
							'pinterest' => 'Pinterest',
							'vk'        => 'VKontakte',
							'mail'      => 'E-mail',
						),
						//See how default has changed? you also don't need to specify opts that are 0.
						'default'  => array(
							'fb'        => '1',
							'twitter'   => '1',
							'linkedin'  => '1',
							'reddit'    => '1',
							'tumblr'    => '1',
							'gplus'     => '1',
							'pinterest' => '1',
							'vk'        => '1',
							'mail'      => '1',
						)
					),

				),
			) );

			Redux::setSection( $opt_name, array(
				'title'   => __( 'Header', 'imedica' ),
				'heading' =>  __( 'Site Header Settings', 'imedica' ), 
				'desc'    =>  __( '', 'imedica' ),
				'icon'    => 'el-icon-credit-card',
				'fields'  => array(
					array(
						'id'       => 'imedica_header_layout',
						'type'     => 'image_select',
						'title'    => __( 'Header Layout', 'imedica' ),
						'subtitle' => __( 'Choose the default header layout for your site.', 'imedica' ),
						'options'  => array(
							'default' => array(
								'alt' => 'Default Layout',
								'img' => ReduxFramework::$_url . 'assets/img/header-1.jpg'
							),
							'layout1' => array(
								'alt' => 'Layout 1',
								'img' => ReduxFramework::$_url . 'assets/img/header-2.jpg'
							),
							'layout2' => array(
								'alt' => 'Layout 2',
								'img' => ReduxFramework::$_url . 'assets/img/header-3.png'
							),
						),
						'default'  => 'default'
					),
					array(
						'id'          => 'main-header-bg-color',
						'type'        => 'color_rgba',
						'transparent' => false,
						'title'       => __( 'Main Header Background Color', 'imedica' ),
						'desc'        => __( 'Set background color for top header bar.', 'imedica' ),
						'default'     => array( 'color' => '#ffffff', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'      =>  __( 'Top Header Bar', 'imedica' ),
        		'id'         => 'section-top-header',
        		'desc' 		 => __( '', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						'id'      => 'top-header-display',
						'type'    => 'switch',
						'title'   => __( 'Enable or Disable Top Header Bar', 'imedica' ),
						'desc'    => __( 'Choose whether you want to display or hide the top header bar', 'imedica' ),
						'default' => 1,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
					),
					array(
						'id'       => 'imd_top_left_section',
						'type'     => 'select',
						'title'    => __( 'Top Header - Left Side', 'imedica' ),
						'desc'     => __( 'Select what do you want to display at left side in top header.', 'imedica' ),
						'options'  => array(
							'menu'    => 'Menu',
							'social'  => 'Social Media',
							'custom'  => 'Custom HTML',
							'contact' => 'Contact information'
						),
						'default'  => 'contact',
						'required' => array( 'top-header-display', '=', '1' ),
					),
					array(
						'id'       => 'top-header-left-custom-html',
						'type'     => 'textarea',
						'title'    => __( 'Top Header - Left Side Custom HTML', 'imedica' ),
						'desc'     => __( 'You can add custom HTML here to be displayed in the left section on top header bar.', 'imedica' ),
						'desc'     => __( 'This is the description field, good for additional info.', 'imedica' ),
						'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'default'  => '<p>HTML is allowed in here.</p>',
						'required' => array( 'imd_top_left_section', '=', 'custom' ),
					),
					array(
						'id'       => 'imd_top_right_section',
						'type'     => 'select',
						'title'    => __( 'Top Header - Right Side', 'imedica' ),
						'desc'     => __( 'Select what do you want to display at right side in top header.', 'imedica' ),
						'options'  => array(
							'menu'    => 'Menu',
							'social'  => 'Social Media',
							'custom'  => 'Custom HTML',
							'contact' => 'Contact information'
						),
						'default'  => 'social',
						'required' => array( 'top-header-display', '=', '1' ),
					),
					array(
						'id'       => 'top-header-right-custom-html',
						'type'     => 'textarea',
						'title'    => __( 'Top Header - Right Side Custom HTML', 'imedica' ),
						'desc'     => __( 'You can add custom HTML here to be displayed in the right section on top header bar.', 'imedica' ),
						'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'default'  => '<p>HTML is allowed in here.</p>',
						'required' => array( 'imd_top_right_section', '=', 'custom' ),
					),
					array(
						'id'          => 'top-header-bg-color',
						'type'        => 'color_rgba',
						'transparent' => false,
						'title'       => __( 'Top Header Background Color', 'imedica' ),
						'desc'        => __( 'Set background color for top header bar.', 'imedica' ),
						'default'     => array( 'color' => '#ffffff', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
						'required'    => array( 'top-header-display', '=', '1' ),
					),
					array(
						'id'          => 'top-header-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Top Header Text  Color', 'imedica' ),
						'desc'        => __( 'Set text color for top header bar.', 'imedica' ),
						'default'     => '#b2b2b2',
						'validate'    => 'color',
						'required'    => array( 'top-header-display', '=', '1' ),
					),
					array(
						'id'          => 'top-header-link-hover-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Top Header Link Hover Color', 'imedica' ),
						'desc'        => __( 'Set text color for top header bar link on hover.', 'imedica' ),
						'default'     => '#267FC9',
						'validate'    => 'color',
						'required'    => array( 'top-header-display', '=', '1' ),
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'      =>  __( 'Sticky Header Settings', 'imedica' ),
        		'id'         => 'section-sticky-header',
        		'desc' 		 => __( '', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						'id'      => 'imedica-sticky-header',
						'title'   => __( 'Sticky Header Display', 'imedica' ),
						'desc'    => __( 'Choose whether you want to enable / disable the sticky header menu.', 'imedica' ),
						'type'    => 'switch',
						'default' => false,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
					),
					array(
						'id'      => 'toggle-height-sticky',
						'type'    => 'switch',
						'title'   => __( 'Enable or Disable custom height for sticky menu', 'imedica' ),
						'desc'    => __( 'Choose whether you want to have custom height in sticky header', 'imedica' ),
						'default' => 0,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
						'required'    => array( 'imedica-sticky-header', '=', '1' ),
					),
					array(
						'id'      => 'sticky-width-box',
						'type'    => 'switch',
						'title'   => __( 'Width of sticky header same as width of box layout?', 'imedica' ),
						'desc'    => __( 'Choose whether you want to have width of sticky header to be same as the width of box layout.', 'imedica' ),
						'default' => 0,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
						'required'    => array( 
							array( 'imedica-sticky-header', '=', '1' ),
							array( 'imedica_layout', '=', 'container' ),
							)
					),
					array(
						'id'            => 'custom-height-sticky',
						'title'         => __( 'Height of sticky header', 'imedica' ),
						'type'          => 'spinner',
						'subtitle'      => __( 'Width of actual content area.', 'imedica' ),
						'default'       => 70,
						'min'           => 30,
						'step'          => 1,
						'max'           => 140,
						'display_value' => 'select',
						'required'    => array( 'toggle-height-sticky', '=', '1' ),
					),
					array(
						'id'          => 'sticky-header-bg',
						'type'        => 'color_rgba',
						'title'       => __( 'Background color for sticky header', 'imedica' ),
						'desc'        => __( 'Set Background color for Sticky header, leave it blank if you dont wish to have different color for sticky header', 'imedica' ),
						'default'     => array( 'color' => '#FFF', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
						'transparent' => false,
						'required'    => array( 'imedica-sticky-header', '=', '1' ),
					),
					array(
						'id'          => 'sticky-header-menu-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Text color for the menu items in sticky header', 'imedica' ),
						'desc'        => __( 'Set text color menu items when sticky header is on, leave it blank if you dont wish to have different color for sticky header.', 'imedica' ),
						'default'     => '',
						'validate'    => 'color',
						'required'    => array( 'imedica-sticky-header', '=', '1' ),
					),
					array(
						"title"   => __( "Custom Header logo for sticky header", 'imedica' ),
						"desc"    => __( "Custom logo to be displayed when sticky header is on. Leave it blank to if you dont want to change the logo in sticky header.", 'imedica' ),
						"id"      => "sticky_custom_logo",
						"default" => "",
						"type"    => "media",
						'required'    => array( 'imedica-sticky-header', '=', '1' ),
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'      =>  __( 'Page Header', 'imedica' ),
        		'id'         => 'page-header',
        		'desc' 		 => __( '', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						'id'      => 'imedica-page-header-display',
						'title'   => __( 'Page Header Display', 'imedica' ),
						'desc'    => __( 'Choose whether you want to enable / disable the page header on single pages.', 'imedica' ),
						'type'    => 'switch',
						'default' => false,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
					),					
					array(
						'id'       => 'titlebar-options',
						'type'     => 'checkbox',
						'title'    => __( 'Display options for Page Title Bar', 'imedica' ),
						'subtitle' => __( 'Choose what you want to be displayed on page title bar.', 'imedica' ),
						'required' => array( 'imedica-page-header-display', 'equals', '1' ),
						'options'  => array(
							'title'        => 'Page Title',
							'breadcrumb'   => 'Breadcrumb',
						),
						//See how default has changed? you also don't need to specify opts that are 0.
						'default'  => array(
							'title'        => '1',
							'breadcrumb'   => '1',
						)
					),
					array(
						'id'          => 'imedica-header-layout',
						'title'       => __( 'Default Page Header Layout', 'imedica' ),
						'desc'        => __( 'Please select the default layout for page header.', 'imedica' ),
						'type'        => 'select',
						'options'     => array(
							"style1" => __( "Title Bar Default Layout", 'imedica' ),
							"style2" => __( "Title Bar Modern Layout", 'imedica' )
						),
						'placeholder' => __( 'Select Page Header Layout', 'imedica' ),
						'default'     => 'style1'
					),
					array(
						'id'          => 'page-header-color-bg',
						'type'        => 'color_rgba',
						'title'       => __( 'Default Page Header Background Color', 'imedica' ),
						'desc'        => __( 'Set Background color for page header.', 'imedica' ),
						'default'     => array( 'color' => '#F8F8F8', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
						'transparent' => false,
					),
					array(
						'id'       => 'page-header-color-bg-img',
						'type'     => 'media',
						'url'      => true,
						'title'    => __( 'Default Page Header Background Image', 'imedica' ),
						'compiler' => 'true',
						'desc'     => __( 'Upload Page Header Background Image or leave blank if you dont want to a background image.', 'imedica' ),
						'default'  => '',
					),
					array(
						'id'          => 'imedica-header-bg-size',
						'title'       => __( 'Page header background image size', 'imedica' ),
						'desc'        => __( 'you can select the background size for the image.', 'imedica' ),
						'type'        => 'select',
						'options'     => array( "contain" => "Contain", "cover" => "Cover", "initial" => "Initial" ),
						'placeholder' => 'Select Background Size',
						'default'     => "cover"
					),
					array(
						'id'          => 'imedica-header-bg-repeat',
						'title'       => __( 'Default Page Header Background Repeat', 'imedica' ),
						'desc'        => __( 'Please select the header title bar background repeat option.', 'imedica' ),
						'type'        => 'select',
						'options'     => array(
							"repeat"    => "Repeat",
							"repeat-x"  => "Repeat X",
							"repeat-y"  => "Repeat Y",
							"no-repeat" => "No Repeat"
						),
						'placeholder' => __( 'Select Background Repeat Option', 'imedica' ),
						'default'     => "no-repeat"
					),
					array(
						'id'          => 'imedica-header-bg-pos',
						'title'       => __( 'Default Page Header Background Position', 'imedica' ),
						'desc'        => __( 'Please select the page header background image position.', 'imedica' ),
						'type'        => 'select',
						'options'     => array(
							"left"   => "Left",
							"right"  => "Right",
							"top"    => "Top",
							"bottom" => "Bottom",
							"center" => "Center"
						),
						'placeholder' => __( 'Select Background Position', 'imedica' ),
						'default'     => "center"
					),
					array(
						'id'          => 'imedica-pageheader-overlay',
						'type'        => 'color_rgba',
						'title'       => __( 'Page Title overlay color', 'imedica' ),
						'desc'        => __( 'Set color and opacity for the overlay page header', 'imedica' ),
						'default'     => array(
							'color' => '#fff',
							'alpha' => 0.1
						),
						'validate'    => 'colorrgba',
						'transparent' => false,
					),
					array(
						'id'             => 'imedica-page-header-spacing',
						'type'           => 'spacing',
						'mode'           => 'padding',
						'units'          => array( 'em', 'px' ),
						'units_extended' => 'false',
						'left'           => 'true',
						'right'          => 'true',
						'title'          => __( 'Spacing options for page header', 'imedica' ),
						'desc'           => __( 'Add custom spacing for page header', 'imedica' ),
						'default'        => array(
							'padding-top'    => '24px',
							'padding-bottom' => '24px',
							'units'          => 'px',
						)
					),
					array(
						'id'          => 'imedica-page-header-title',
						'type'        => 'typography',
						'title'       => __( 'Text Settings for Page Header Title', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => true,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'This will be set as default font for page header title.', 'imedica' ),
						'default'     => array(
							'font-style'  => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							'line-height' => '25px',
							'font-size'   => '25px',
							'color'       => '#333',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "24px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'imedica-page-header-breadcrumb',
						'type'        => 'typography',
						'title'       => __( 'Text Settings for Page Header Breadcrumbs', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => true,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'This will be set as default font for breadcrumbs.', 'imedica' ),
						'default'     => array(
							'font-style'  => '400',
							'font-family' => 'Open Sans',
							'color'       => '#666666',
							'google'      => true,
							'line-height' => '12px',
							'font-size'   => '12px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "24px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'imedica-breadcrumbs-hover-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Breadcrumbs Text Hover Color', 'imedica' ),
						'desc'        => __( 'Set hover color for breadcrumb text and link.', 'imedica' ),
						'default'     => '#b2b2b2',
						'validate'    => 'color',
					),
				)
			) );
			
			$dc_opt = get_option('imedica_opts');
			
			$left_credits_txt = isset( $dc_opt['footer-credits'] ) ? $dc_opt['footer-credits'] : 'Copyright &copy; 2016 <a href="http://brainstormforce.com/">Brainstorm Force</a>. Powered by <a href="https://wordpress.org/">WordPress</a>.';

			$right_credits_txt = isset( $dc_opt['footer-credits'] ) ? $dc_opt['footer-credits'] : 'Copyright &copy; 2016 <a href="http://brainstormforce.com/">Brainstorm Force</a>. Powered by <a href="https://wordpress.org/">WordPress</a>.';

			// Site Footer Options
			Redux::setSection( $opt_name, array(
				'title'   => __( 'Footer', 'imedica' ),
				'heading' => __( 'Footer Setting', 'imedica' ),
				'desc'    => '', 
				'icon'    => 'el-icon-photo',
				'fields'  => array(
					// New Footer selection option
					array(
						'id'       => 'imd_footer_type',
						'type'     => 'select',
						'title'    => __( 'Footer Type', 'imedica' ),
						'desc'     => __( 'Select which type of footer you want to show on your website/blog.', 'imedica' ),
						'options'  => array(
							'simple'    => 'Default Footer',
							'page'  => 'Page As Footer',
						),
						'default'  => 'simple',
					),
					array(
						'id'      => 'imd_footer_page',
						'type'    => 'select',
						'title'   => __( 'Select Custom Footer Page', 'imedica' ),
						'desc'    => __( 'Select a page that you want to use as Footer.', 'imedica' ),
						'options' => '',
						'data'    => 'pages',
						'default' => '',
						'required' => array( 'imd_footer_type', '=', 'page' ),
					),
					// New Options for Small footer as like top header
					array(
						'id'       => 'imd_footer_left_section',
						'type'     => 'select',
						'title'    => __( 'Small Footer - Left Side', 'imedica' ),
						'desc'     => __( 'Select what do you want to display at left side in small footer.', 'imedica' ),
						'options'  => array(
							'menu'    => 'Footer Menu',
							'social'  => 'Social Media',
							'custom'  => 'Credits Note',
						),
						'default'  => 'custom',
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
					array(
						'id'      => 'left-footer-credits',
						'type'    => 'textarea',
						'title'   => __( 'Credits Note', 'imedica' ),
						'desc'    => __( 'You can set your copyright text from here, Custom HTML is supported.', 'imedica' ),
						'required' => array( 'imd_footer_left_section', '=', 'custom', 'imd_footer_type', '=', 'page'  ),
						'default' =>  $left_credits_txt,
					),
					array(
						'id'       => 'imd_footer_right_section',
						'type'     => 'select',
						'title'    => __( 'Small Footer - Right Side', 'imedica' ),
						'desc'     => __( 'Select what do you want to display at right side in small footer.', 'imedica' ),
						'options'  => array(
							'menu'    => 'Footer Menu',
							'social'  => 'Social Media',
							'custom'  => 'Credits Note',
						),
						'default'  => 'menu',
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
					array(
						'id'      => 'right-footer-credits',
						'type'    => 'textarea',
						'title'   => __( 'Credits Note', 'imedica' ),
						'desc'    => __( 'You can set your copyright text from here, Custom HTML is supported.', 'imedica' ),
						'required' => array( 'imd_footer_right_section', '=', 'custom', 'imd_footer_type', '=', 'page'  ),
						'default' => $right_credits_txt,
					),
					// End New Options for Small footer
					array(
						'id'          => 'footer-background-color-main',
						'type'        => 'color_rgba',
						'transparent' => false,
						'title'       => __( 'Main Footer Background Color', 'imedica' ),
						'desc'        => __( 'Set background color for the main footer area.', 'imedica' ),
						'default'     => array( 'color' => '#363839', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
					array(
						'id'          => 'footer-color-main',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Main Footer Text / Link Color', 'imedica' ),
						'desc'        => __( 'Set the text color for text or links in the footer area.', 'imedica' ),
						'default'     => '#fff',
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
					array(
						'id'          => 'footer-color-hover',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Main Footer Link Hover Color', 'imedica' ),
						'desc'        => __( 'Set the link hover color for the text in main footer area.', 'imedica' ),
						'default'     => '#fff',
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
					array(
						'id'      => 'footer-spacing',
						'type'    => 'spacing',
						'mode'    => 'padding',
						'units'   => array( 'em', 'px' ),
						'all'     => false,
						'right'   => false,
						'left'    => false,
						'title'   => __( 'Main Footer Spacing', 'imedica' ),
						'desc'    => __( 'Set top and bottom spacing for main footer', 'imedica' ),
						'default' => array(
							'padding-top'    => '65px',
							'padding-bottom' => '50px',
							'units'          => 'px',
						),
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
					array(
						'id'          => 'footer-background-color-small',
						'type'        => 'color_rgba',
						'transparent' => false,
						'title'       => __( 'Small Footer Background Color', 'imedica' ),
						'desc'        => __( 'Set the background color for the small footer area.', 'imedica' ),
						'default'     => array( 'color' => '#2F3232', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
					array(
						'id'          => 'footer-color-small',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Small Footer Text / Link Color', 'imedica' ),
						'desc'        => __( 'Set the text / link color for the text in the small footer area.', 'imedica' ),
						'default'     => '#fff',
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'      =>  __( 'Footer Seperator', 'imedica' ),
        		'id'         => 'section-footer-seperator',
        		'desc' 		 => __( '', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						'id'      => 'footer-border-width',
						'type'    => 'radio',
						'title'   => __( 'Main footer Seperator width', 'imedica' ),
						'desc'    => __( 'Select the width for the footer separator.', 'imedica' ),
						'options' => array(
							'1' => 'Full Width',
							'2' => 'Content Width'
						),
						'default' => '1',
					),
					array(
						'id'            => 'footer-seperator',
						'type'          => 'border',
						'all'           => false,
						'bottom'        => false,
						'left'          => false,
						'right'         => false,
						'display_units' => 'true',
						'title'         => __( 'Main Footer Seperator Type', 'imedica' ),
						'desc'          => __( 'Select the type for the footer separator.', 'imedica' ),
						'default'       => array(
							'border-color' => '#ddd',
							'border-style' => 'solid',
							'border-top'   => '0'
						),
					),
					array(
						'id'      => 'small-footer-border-width',
						'type'    => 'radio',
						'title'   => __( 'Small footer Seperator width', 'imedica' ),
						'desc'    => __( 'Select the width of small footer separator.', 'imedica' ),
						'options' => array(
							'1' => 'Full Width',
							'2' => 'Content Width'
						),
						'default' => '1',
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
					array(
						'id'            => 'small-footer-seperator',
						'type'          => 'border',
						'all'           => false,
						'bottom'        => false,
						'left'          => false,
						'right'         => false,
						'display_units' => 'true',
						'title'         => __( 'Small Footer Seperator Type', 'imedica' ),
						'desc'          => __( 'Select the type of small footer separator.', 'imedica' ),
						'default'       => array(
							'border-color' => '#ddd',
							'border-style' => 'solid',
							'border-top'   => '0'
						),
						'required' => array( 'imd_footer_type', '=', 'simple' ),
					),
				)
			) );

			Redux::setSection( $opt_name, array(
				'title'   => __( 'Sidebar', 'imedica' ),
				'heading' => __( 'Sidebar Color Options', 'imedica' ),
				'id'      => 'section-sidebar-styling',
				'desc'    => '', 
				'icon'    => 'el-icon-tasks',
				'fields'  => array(
					array(
						'id'          => 'sidebar-title-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Sidebar Title Color', 'imedica' ),
						'desc'        => __( 'Select color for the text in sidebar.', 'imedica' ),
						'default'     => '#414042',
						'validate'    => 'color'
					),
					array(
						'id'          => 'sidebar-link-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Sidebar Link Color', 'imedica' ),
						'desc'        => __( 'Select color for the links in sidebar.', 'imedica' ),
						'default'     => '#8C99A9',
						'validate'    => 'color',
					),
					array(
						'id'          => 'sidebar-link-color-hover',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Sidebar Link Hover Color', 'imedica' ),
						'desc'        => __( 'Select hover color for the links in sidebar.', 'imedica' ),
						'default'     => '#107FC9',
					),
					array(
						'id'          => 'sidebar-background-color',
						'type'        => 'color_rgba',
						'transparent' => false,
						'title'       => __( 'Sidebar Background Color', 'imedica' ),
						'desc'        => __( 'Select background color for the sidebar.', 'imedica' ),
						'default'     => array( 'color' => '#FFF', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
					),
					array(
						'id'            => 'sidebar-padding',
						'type'          => 'spacing',
						'mode'          => 'padding',
						'all'           => false,
						'units'         => 'px',
						'display_units' => 'true',
						'title'         => __( 'Sidebar Padding', 'imedica' ),
						'desc'          => __( 'Choose the top, bottom, left and right padding for sidebar.', 'imedica' ),
						'default'       => array(
							'padding-top'    => '0',
							'padding-right'  => '15',
							'padding-bottom' => '0',
							'padding-left'   => '15'
						)
					),
					array(
						'id'            => 'imedica-sidebar-widget-spacing',
						'title'         => __( 'Space between widgets', 'imedica' ),
						'type'          => 'spinner',
						'desc'          => __( 'Select the space to be added between the sidebar widgets.', 'imedica' ),
						'default'       => 40,
						'min'           => 25,
						'step'          => 1,
						'max'           => 100,
						'display_value' => 'text',
						'required'      => array( 'imedica_layout', '=', 'container-box' )
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'      =>  __( 'Sidebar Separator Border', 'imedica' ),
        		'id'         => 'section-sidebar-border',
        		'desc' 		 => __( '', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						'id'            => 'sidebar-border',
						'type'          => 'border',
						'all'           => false,
						'display_units' => 'true',
						'title'         => __( 'Separator Border for Left Sidebar', 'imedica' ),
						'desc'          => __( 'Set border for left sidebar', 'imedica' ),
						'default'       => array(
							'border-color'  => '#ddd',
							'border-style'  => 'solid',
							'border-top'    => '0',
							'border-right'  => '0',
							'border-bottom' => '0',
							'border-left'   => '0'
						)
					),
					array(
						'id'            => 'sidebar-border-right',
						'type'          => 'border',
						'all'           => false,
						'display_units' => 'true',
						'title'         => __( 'Separator Border for Right Sidebar', 'imedica' ),
						'desc'          => __( 'Set border for right sidebar', 'imedica' ),
						'default'       => array(
							'border-color'  => '#ddd',
							'border-style'  => 'solid',
							'border-top'    => '0',
							'border-right'  => '0',
							'border-bottom' => '0',
							'border-left'   => '0'
						)
					),
					array(
						'id'            => 'sidebar-horizontal-seperator',
						'type'          => 'border',
						'all'           => false,
						'top'           => false,
						'left'          => false,
						'right'         => false,
						'bottom'        => true,
						'display_units' => 'true',
						'title'         => __( 'Horizontal seperator for widgets', 'imedica' ),
						'desc'          => __( 'Set separator border between widgets', 'imedica' ),
						'default'       => array(
							'border-color'  => '#ddd',
							'border-style'  => 'solid',
							'border-top'    => '0',
							'border-right'  => '0',
							'border-bottom' => '0',
							'border-left'   => '0'
						)
					),
				)
			) );

			Redux::setSection( $opt_name, array(
				'title'   => __( 'Menu', 'imedica' ),
				'heading' => __( 'Parent Menu', 'imedica' ),
				'desc'    => '', 
				'icon'    => 'el-icon-list',
				'fields'  => array(
					array(
						'id'          => 'imd-menu-parent-fontColor',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Text Color', 'imedica' ),
						'desc'        => __( 'This will be set as default text color for parent menu item.', 'imedica' ),
						'default'     => '#333',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-menu-parent-hover-fontColor',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Text Hover Color', 'imedica' ),
						'desc'        => __( 'This will be set as text hover color parent menu item.', 'imedica' ),
						'default'     => '#107FC9',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-parent-menu-bg-color',
						'type'        => 'color_rgba',
						'transparent' => false,
						'title'       => __( 'Background Color', 'imedica' ),
						'desc'        => __( 'This will be set as background color for parent menu menu item.', 'imedica' ),
						'default'     => array( 'color' => '#fff', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
					),
					array(
						'id'          => 'imd-parent-menu-hover-bg-color',
						'type'        => 'color_rgba',
						'transparent' => false,
						'title'       => __( 'Background Hover Color', 'imedica' ),
						'desc'        => __( 'This will be set as background color for parent menu menu item on hover.', 'imedica' ),
						'default'     => array( 'color' => '#fff', 'alpha' => '1' ),
						'validate'    => 'colorrgba',
					),
					array(
						'id'          => 'imd-menu-parent-borderColor',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Border Color', 'imedica' ),
						'desc'        => __( 'This will be set as border color for parent menu item.', 'imedica' ),
						'default'     => '#107FC9',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-menu-parent-font',
						'type'        => 'typography',
						'title'       => __( 'Parent Menu Font', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => false,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'This will be set as default font for parent menu item.', 'imedica' ),
						'default'     => array(
							'font-style'  => '600',
							'font-family' => 'Open Sans',
							'google'      => true,
							'line-height' => '15px',
							'font-size'   => '15px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "24px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'      =>  __( 'Sub Menu', 'imedica' ),
        		'id'         => 'section-theme-color',
        		'desc' 		 => __( '', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						'id'          => 'imd-menu-submenu-fontColor',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Text Color', 'imedica' ),
						'desc'        => __( 'This will be set as default text color for submenu menu item.', 'imedica' ),
						'default'     => '#4d4d4d',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-menu-submenu-hover-fontColor',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Text Hover Color', 'imedica' ),
						'desc'        => __( 'This will be set as text hover color for submenu item.', 'imedica' ),
						'default'     => '#107FC9',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-menu-submenu-bg-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Background Color', 'imedica' ),
						'desc'        => __( 'This will be set as background color for submenu menu item.', 'imedica' ),
						'default'     => '#fff',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-menu-submenu-hover-bg-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Background Hover Color', 'imedica' ),
						'desc'        => __( 'This will be set as background color for submenu menu item on hover.', 'imedica' ),
						'default'     => '#F8F8F8',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-menu-submenu-font',
						'type'        => 'typography',
						'title'       => __( 'Sub-Menu Menu Font', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'This will be set as default font for submenu item.', 'imedica' ),
						'default'     => array(
							'font-style'  => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							'font-size'   => '13px',
							'line-height' => '20px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "24px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'            => 'imedica-submenu-width',
						'title'         => __( 'Submenu width', 'imedica' ),
						'type'          => 'spinner',
						'subtitle'      => __( 'Set width for the Submenu.', 'imedica' ),
						'default'       => 176,
						'min'           => 100,
						'step'          => 1,
						'max'           => 300,
						'display_value' => 'select',
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'      =>  __( 'Mega Menu Column Title', 'imedica' ),
        		'id'         => 'mega-menu-col',
        		'desc' 		 => __( '', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
					array(
						'id'          => 'imd-mega-menu-col-title-font',
						'type'        => 'typography',
						'title'       => __( 'Mega Menu column title Font', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'This will be set as default font for Mega menu column title.', 'imedica' ),
						'default'     => array(
							'font-style'  => '600',
							'font-family' => 'Open Sans',
							'google'      => true,
							'font-size'   => '14px',
							'line-height' => '20px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "24px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'imd-mega-menu-col-title-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Text Color', 'imedica' ),
						'desc'        => __( 'This will be set as default text color for mega menu column title.', 'imedica' ),
						'default'     => '#414042',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-menu-submenu-borderColor',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Border Color', 'imedica' ),
						'desc'        => __( 'This will be set as border color for mega menu seperators.', 'imedica' ),
						'default'     => '#F1F2F2',
						'validate'    => 'color',
					),
					array(
						'id'      => 'default-menu-search',
						'type'    => 'switch',
						'title'   => __( 'Enable or Disable search in menu', 'imedica' ),
						'desc'    => __( 'Choose whether you want to show or hide search in menu', 'imedica' ),
						'default' => 1,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
						'required' => array( 'imedica_header_layout', '=', 'default' ),
					),
					array(
						'id'      => 'imd-search-layout',
						'type'    => 'select',
						'title'   => __( 'Search Layout', 'imedica' ),
						'options' => array(
							'style1'   => 'Full Screen Search',
							'style2'   => 'Simple Search',
						),
						'default' => 'style1',
						'required' => array( 'default-menu-search', 'equals', '1' ),
					)
				)
			) );
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			Redux::setSection( $opt_name, array(
				'title'      =>  __( 'Mobile Menu', 'imedica' ),
        		'id'         => 'imd-mobile-menu',
        		'desc' 		 => __( '', 'imedica' ),
        		'subsection' => true,
        		'fields'     => array(
        			array(
						'id'          => 'imd-mob-menu-icon-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Mobile Menu Icons Color', 'imedica' ),
						'desc'        => __( 'This will be set color for menu icons.', 'imedica' ),
						'default'     => '#333333',
						'validate'    => 'color',
					),
					array(
						'id'    => 'imd-mob-topmenu-class',
						'type'  => 'text',
						'title' => __( 'Custom Icon For Top Bar Menu', 'imedica' ),
						'desc'        => __( 'More information on using custom icon class <a href="https://docs.brainstormforce.com/custom-font-icons-for-mobile-menu/" target="_blank">Click Here</a>', 'imedica' ),
						'default'	=> 'fa fa-bars'
					),
					array(
						'id'    => 'imd-mob-icon2-class',
						'type'  => 'text',
						'title' => __( 'Custom Icon For Navigation Menu', 'imedica' ),
						'desc'        => __( 'More information on using custom icon class <a href="https://docs.brainstormforce.com/custom-font-icons-for-mobile-menu/" target="_blank">Click Here</a>', 'imedica' ),
						'default'	=> 'fa fa-bars',
					),
        			array(
						'id'          => 'imd-mob-submenu-bg-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Menu Background Color', 'imedica' ),
						'desc'        => __( 'This will be set as background color for menu on mobile phones.', 'imedica' ),
						'default'     => '#303030',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-mob-text-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Menu Text Color', 'imedica' ),
						'desc'        => __( 'This will be set as default text color for menu item on mobile menu.', 'imedica' ),
						'default'     => '#E0E0E0',
						'validate'    => 'color',
					),
					array(
						'id'          => 'imd-mob-text-hoverColor',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Menu Text Hover Color', 'imedica' ),
						'desc'        => __( 'This will be set as text hover color for menu item for mobile menu.', 'imedica' ),
						'default'     => '#107FC9',
						'validate'    => 'color',
					),
					array(
						'id'      => 'imd-mob-menu-search',
						'type'    => 'switch',
						'title'   => __( 'Enable or Disable search in menu', 'imedica' ),
						'desc'    => __( 'Choose whether you want to show or hide search in menu', 'imedica' ),
						'default' => 1,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
					),
					array(
					    'id'   =>'divider_1',
					    // 'desc' => __('Social information mobile menu.', 'imedica'),
					    'type' => 'divide'
					),
					array(
						'id'      => 'imd-mob-social-menu',
						'type'    => 'switch',
						'title'   => __( 'Enable or Disable Social Media Menuon mobile devices', 'imedica' ),
						'desc'    => __( 'Choose whether you want to show or hide social menu on mobile', 'imedica' ),
						'default' => 1,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
					),
					array(
						'id'    => 'imd-mob-icon1-class',
						'type'  => 'text',
						'title' => __( 'Custom Icon For Social Media Menu', 'imedica' ),
						'desc'        => __( 'More information on using custom icon class <a href="https://docs.brainstormforce.com/custom-font-icons-for-mobile-menu/" target="_blank">Click Here</a>', 'imedica' ),
						'default'	=> 'fa fa-rocket',
						'required'    => array( 'imd-mob-social-menu', '=', true ),
					),
	       			array(
						'id'          => 'imd-mob-social-bg-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Social Media Menu Background Color', 'imedica' ),
						'desc'        => __( 'This will be set as background color for menu on mobile phones.', 'imedica' ),
						'default'     => '#eeeeee',
						'validate'    => 'color',
						'required'    => array( 'imd-mob-social-menu', '=', true ),
					),
					array(
						'id'          => 'imd-mob-social-text-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Social Media Menu Text Color', 'imedica' ),
						'desc'        => __( 'This will be set as default text color for menu item on mobile menu.', 'imedica' ),
						'default'     => '#4C4D4E',
						'validate'    => 'color',
						'required'    => array( 'imd-mob-social-menu', '=', true ),
					),
					array(
						'id'          => 'imd-mob-social-text-hoverColor',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Social Media Menu Text Hover Color', 'imedica' ),
						'desc'        => __( 'This will be set as text hover color for menu item for mobile menu.', 'imedica' ),
						'default'     => '#4C4D4E',
						'validate'    => 'color',
						'required'    => array( 'imd-mob-social-menu', '=', true ),
					),
					array(
						'id'      => 'imd-mob-menu-search',
						'type'    => 'switch',
						'title'   => __( 'Enable or Disable search in social media menu', 'imedica' ),
						'desc'    => __( 'Choose whether you want to show or hide search in menu', 'imedica' ),
						'default' => 1,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
						'required'    => array( 'imd-mob-social-menu', '=', true ),
					),
				)
			) );
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			Redux::setSection( $opt_name, array(
				'title'  => __( 'Typography', 'imedica' ),
				'desc'   => __( '<p class="redux-section-desc">Set font options to enhance the look and feel of your site.Use Google Fonts for better look.</p>', 'imedica' ),
				'icon'   => 'el-icon-text-width',
				'fields' => array(
					array(
						'id'          => 'main_body_font',
						'type'        => 'typography',
						'title'       => __( 'Main Body Text', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'Used in P tags.', 'imedica' ),
						'default'     => array(
							'font-style'  => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							"font-size"   => "13px",
							'line-height' => '23px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "24px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'page_heading_font',
						'type'        => 'typography',
						'title'       => __( 'Headings - H1', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'Used in H1 tag.', 'imedica' ),
						'default'     => array(
							'font-weight' => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							"font-size"   => "37px",
							'line-height' => '48px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "24px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'page_heading_font_h2',
						'type'        => 'typography',
						'title'       => __( 'Headings - H2', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'Used in H2 tag.', 'imedica' ),
						'default'     => array(
							'font-weight' => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							"font-size"   => "23px",
							'line-height' => '33px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "20px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'page_heading_font_h3',
						'type'        => 'typography',
						'title'       => __( 'Headings - H3', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'Used in H3 tag.', 'imedica' ),
						'default'     => array(
							'font-weight' => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							"font-size"   => "21px",
							'line-height' => '30px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "18px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'page_heading_font_h4',
						'type'        => 'typography',
						'title'       => __( 'Headings - H4', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'Used in H4 tag.', 'imedica' ),
						'default'     => array(
							'font-weight' => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							"font-size"   => "16px",
							'line-height' => '20px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "16px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'page_heading_font_h5',
						'type'        => 'typography',
						'title'       => __( 'Headings - H5', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'Used in H5 tag.', 'imedica' ),
						'default'     => array(
							'font-weight' => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							"font-size"   => "15px",
							'line-height' => '18px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "15px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),
					array(
						'id'          => 'page_heading_font_h6',
						'type'        => 'typography',
						'title'       => __( 'Headings - H6', 'imedica' ),
						'google'      => true,
						// Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup' => false,
						// Select a backup non-google font in addition to a google font
						'font-size'   => true,
						'line-height' => true,
						'subsets'     => true,
						'text-align'  => false,
						'color'       => false,
						'all_styles'  => true,
						// Enable all Google Font style/weight variations to be added to the page
						'units'       => 'px',
						// Defaults to px
						'subtitle'    => __( 'Used in H6 tag.', 'imedica' ),
						'default'     => array(
							'font-weight' => '400',
							'font-family' => 'Open Sans',
							'google'      => true,
							"font-size"   => "13px",
							'line-height' => '15px',
						),
						"preview"     => array(
							"text"           => "The quick brown fox jumps over the lazy dog",
							//this is the text from preview box
							"font-size"      => "14px",
							//this is the text size from preview box,
							"always_display" => true
						)
					),

				)
			) );
			Redux::setSection( $opt_name, array(
				'title'   => __( 'Styling', 'imedica' ),
				'heading' => '', 
				'desc'    => '', 
				'icon'    => 'el-icon-magic',
				'fields'  => array(
					array(
						'id'          => 'imedica-theme-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Theme Color', 'imedica' ),
						'desc'        => __( 'This will be set as global color for your site.', 'imedica' ),
						'default'     => '#107FC9',
						'validate'    => 'color',
					),
					array(
						'id'          => 'body-text-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Body Text Color', 'imedica' ),
						'desc'        => __( 'This will be set as global text color for body.', 'imedica' ),
						'default'     => '#8c99a9',
						'validate'    => 'color',
					),
					array(
						'id'          => 'highlight-text-background',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Highlight Text Background', 'imedica' ),
						'desc'        => __( 'Set highlight text background color, this is used for background color for text selection, usually this should be same as theme color.', 'imedica' ),
						'default'     => '#107FC9',
						'validate'    => 'color',
					),
					array(
						'id'          => 'highlight-text-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Highlight Text Color', 'imedica' ),
						'desc'        => __( 'Set highlight text color, this is used as text color in the text selection, usually this is the color that goes well along with the highlight background color', 'imedica' ),
						'default'     => '#ffffff',
						'validate'    => 'color',
					),
					array(
						'id'          => 'link-color',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Link Color', 'imedica' ),
						'desc'        => __( 'Set text link color.', 'imedica' ),
						'default'     => '#107FC9',
						'validate'    => 'color',
					),
					array(
						'id'          => 'link-color-hover',
						'type'        => 'color',
						'transparent' => false,
						'title'       => __( 'Link Hover Color', 'imedica' ),
						'desc'        => __( 'Set text link hover color.', 'imedica' ),
						'default'     => '#8c99a9',
						'validate'    => 'color',
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'   => __( 'Social Media', 'imedica' ),
				'heading' => __( 'Enter Social Media URLs', 'imedica' ),
				'desc'    => __( 'Specify your social media urls which you would like to show on your site in top header.', 'imedica, if you dont want to use any social icon, leave it blank.' ),
				'icon'    => 'el-icon-group',
				'fields'  => array(
					array(
						'id'      => 'social-icon-fb',
						'type'    => 'text',
						'title'   => __( 'Facebook', 'imedica' ),
						'default' => 'https://www.facebook.com',
					),
					array(
						'id'      => 'social-icon-twitter',
						'type'    => 'text',
						'title'   => __( 'Twitter', 'imedica' ),
						'default' => 'https://www.twitter.com',
					),
					array(
						'id'      => 'social-icon-gplus',
						'type'    => 'text',
						'title'   => __( 'Google Plus', 'imedica' ),
						'default' => 'https://plus.google.com',
					),
					array(
						'id'      => 'social-icon-linkedin',
						'type'    => 'text',
						'title'   => __( 'LinkedIn', 'imedica' ),
						'default' => 'https://www.linkedin.com',
					),
					array(
						'id'      => 'social-icon-dribbble',
						'type'    => 'text',
						'title'   => __( 'Dribbble', 'imedica' ),
						'default' => 'https://www.dribbble.com',
					),
					array(
						'id'      => 'social-icon-instagram',
						'type'    => 'text',
						'title'   => __( 'Instagram', 'imedica' ),
						'default' => '',
					),
					array(
						'id'      => 'social-icon-pinterest',
						'type'    => 'text',
						'title'   => __( 'Pinterest', 'imedica' ),
						'default' => '',
					),
					array(
						'id'    => 'social-icon-rss',
						'type'  => 'text',
						'title' => __( 'RSS Feed', 'imedica' ),
					),
					// Custom Icon 1
					array(
						'id'   =>'divider_0',
						'type' => 'divide'
					),
					array(
						'id'      => 'social-icon-custom',
						'type'    => 'select',
						'title'   => __( 'Select custom Social Media icon 1', 'imedica' ),
						'options' => array(
							'custom-icon-class'     => 'Custom Icon',
							"FontAwsome" => ImedicaFontAwesome::$fa_icons

						),
						'default' => '',
					),
					array(
						'id'    => 'social-icon-custom-class',
						'type'  => 'text',
						'title' => __( 'Custom Class For Icon 1', 'imedica' ),
						'required'    => array( 'social-icon-custom', '=', 'custom-icon-class' ),
						'desc'        => __( 'More information on using custom icon class <a href="https://docs.brainstormforce.com/custom-font-icons-for-mobile-menu/" target="_blank">Click Here</a>', 'imedica' ),
						'default'	=> 'fa-github',
					),
					array(
						'id'    => 'social-icon-custom-url',
						'type'  => 'text',
						'title' => __( 'Custom Social Media URL 1', 'imedica' ),
					),
					array(
						'id'   =>'divider_1',
						'type' => 'divide'
					),
					array(
						'id'      => 'social-icon-custom-2',
						'type'    => 'select',
						'title'   => __( 'Select custom Social Media icon 2', 'imedica' ),
						'options' => array(
							'custom-icon-class'     => 'Custom Icon',
							"FontAwsome" => ImedicaFontAwesome::$fa_icons

						),
						'default' => '',
					),
					array(
						'id'    => 'social-icon-custom-class-2',
						'type'  => 'text',
						'title' => __( 'Custom Class For Icon 2', 'imedica' ),
						'required'    => array( 'social-icon-custom-2', '=', 'custom-icon-class' ),
						'desc'        => __( 'More information on using custom icon class <a href="https://docs.brainstormforce.com/custom-font-icons-for-mobile-menu/" target="_blank">Click Here</a>', 'imedica' ),
						'default'	=> 'fa-github',
					),
					array(
						'id'    => 'social-icon-custom-url-2',
						'type'  => 'text',
						'title' => __( 'Custom Social Media URL 2', 'imedica' ),
					),
					array(
						'id'   =>'divider_2',
						'type' => 'divide'
					),
					// Custom Icon 3
					array(
						'id'      => 'social-icon-custom-3',
						'type'    => 'select',
						'title'   => __( 'Select custom Social Media icon 3', 'imedica' ),
						'options' => array(
							'custom-icon-class'     => 'Custom Icon',
							"FontAwsome" => ImedicaFontAwesome::$fa_icons

						),
						'default' => '',
					),
					array(
						'id'    => 'social-icon-custom-class-3',
						'type'  => 'text',
						'title' => __( 'Custom Class For Icon 3', 'imedica' ),
						'required'    => array( 'social-icon-custom-3', '=', 'custom-icon-class' ),
						'desc'        => __( 'More information on using custom icon class <a href="https://docs.brainstormforce.com/custom-font-icons-for-mobile-menu/" target="_blank">Click Here</a>', 'imedica' ),
						'default'	=> 'fa-github',
					),
					array(
						'id'    => 'social-icon-custom-url-3',
						'type'  => 'text',
						'title' => __( 'Custom Social Media URL 3', 'imedica' ),
					),
					array(
						'id'   =>'divider_3',
						'type' => 'divide'
					),
					// Custom Icon 4
					array(
						'id'      => 'social-icon-custom-4',
						'type'    => 'select',
						'title'   => __( 'Select custom Social Media icon 4', 'imedica' ),
						'options' => array(
							'custom-icon-class'     => 'Custom Icon',
							"FontAwsome" => ImedicaFontAwesome::$fa_icons

						),
						'default' => '',
					),
					array(
						'id'    => 'social-icon-custom-class-4',
						'type'  => 'text',
						'title' => __( 'Custom Class For Icon 4', 'imedica' ),
						'required'    => array( 'social-icon-custom-4', '=', 'custom-icon-class' ),
						'desc'        => __( 'More information on using custom icon class <a href="https://docs.brainstormforce.com/custom-font-icons-for-mobile-menu/" target="_blank">Click Here</a>', 'imedica' ),
						'default'	=> 'fa-github',
					),
					array(
						'id'    => 'social-icon-custom-url-4',
						'type'  => 'text',
						'title' => __( 'Custom Social Media URL 4', 'imedica' ),
					),

					array(
						'id'       => 'imedica-social-sort',
						'type'     => 'sorter',
						'title'    => 'Manage Social',
						'subtitle' => '<p class="redux-section-desc">Set order and which social media data you would like to display on blog an.</p>',
						'compiler' => 'false',
						'backup'   => false,
						'options'  => array(
							'enabled'  => array(
								'social-icon-fb'       => 'Facebook',
								'social-icon-twitter'  => 'Twitter',
								'social-icon-gplus'    => 'Google Plus',
								'social-icon-linkedin' => 'LinkedIn',
								'social-icon-dribbble' => 'Dribbble',
								'social-icon-rss'      => 'RSS Feed',
								'social-icon-custom'   => 'Custom 1'
							),
							'disabled' => array(
								'social-icon-instagram' => 'Instagram',
								'social-icon-pinterest' => 'Pinterest',
								'social-icon-custom-2'   => 'Custom 2',
								'social-icon-custom-3'   => 'Custom 3',
								'social-icon-custom-4'   => 'Custom 4'
							),
						),
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'   => __( 'Custom Scripts', 'imedica' ),
				'heading' => '', 
				'desc'    => '', 
				'icon'    => 'el-icon-file-edit',
				'fields'  => array(
					array(
						'id'       => 'imedica-custom-css',
						'type'     => 'ace_editor',
						'title'    => __( 'Custom CSS Code', 'imedica' ),
						'subtitle' => __( 'Paste your CSS code here.', 'imedica' ),
						'mode'     => 'css',
						'theme'    => 'eclipse',
						'options'  => array( 'minLines' => 15, 'maxLines' => 80 )
					),
					array(
						'id'       => 'imedica-before-head',
						'type'     => 'ace_editor',
						'title'    => __( 'Code to be placed after &lt;/head&gt; tag', 'imedica' ),
						'subtitle' => __( 'Code here will be added just before the closing &lt;/head&gt; tag.', 'imedica' ),
						'mode'     => 'text',
						'theme'    => 'eclipse',
						'options'  => array( 'minLines' => 15, 'maxLines' => 80 )
					),
					array(
						'id'       => 'imedica-before-body',
						'type'     => 'ace_editor',
						'title'    => __( 'Code to be placed before closing body tag. i.e. &lt;/body&gt; tag', 'imedica' ),
						'subtitle' => __( 'Code here will be added just before the closing of &lt;body&gt; tag.', 'imedica' ),
						'mode'     => 'text',
						'theme'    => 'eclipse',
						'options'  => array( 'minLines' => 15, 'maxLines' => 80 )
					),
				)
			) );
			Redux::setSection( $opt_name, array(
				'title'   => __( 'Advanced', 'imedica' ),
				'heading' => '', 
				'desc'    => '', 
				'icon'    => 'el-icon-view-mode',
				'fields'  => array(
					array(
						'id'      => 'nice-scroll',
						'type'    => 'switch',
						'title'   => __( 'Smooth Scroll Script', 'imedica' ),
						'desc'    => __( 'Enable smooth scrolling effect on your website.', 'imedica' ),
						'default' => false,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
					),
					array(
						'id'      => 'scroll-to-top',
						'type'    => 'switch',
						'title'   => __( 'Scroll to Top Script', 'imedica' ),
						'desc'    => __( 'Enable scroll to top link on your website', 'imedica' ),
						'default' => true,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
					),
					array(
						'id'      => 'round-scroll-to-top',
						'type'    => 'switch',
						'title'   => __( 'Round scroll to top button', 'imedica' ),
						'desc'    => __( 'Make scroll to top button round', 'imedica' ),
						'default' => false,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
						'required'    => array( 'scroll-to-top', 'equals', true )
					),
					array(
						'id'      => 'retina-js',
						'type'    => 'switch',
						'title'   => __( 'Enable Ratina Mode', 'imedica' ),
						'desc'    => __( 'This option will load a JavaScript that will load high resolution images on devices with retina ready displays (Refer theme documentation for more information).', 'imedica' ),
						'default' => false,
						'on'      => 'Enabled',
						'off'     => 'Disabled',
					),
					array(
						'id'      => 'custom_404',
						'type'    => 'select',
						'title'   => __( 'Select Custom 404 Page', 'imedica' ),
						'desc'    => __( 'Select a page that you want to use as 404 page.', 'imedica' ),
						'options' => '',
						'data'    => 'pages',
						'default' => '',
					),
					array(
						'id'      => 'dev_mode',
						'type'    => 'switch',
						'title'   => __( 'Developer Mode', 'imedica' ),
						'desc'    => __( 'Activate / de-activate developer mode for extra debugging purpose.', 'imedica' ),
						'default' => true,
						'on'      => 'Activate',
						'off'     => 'Deactivate',
					),
					array(
						'id'      => 'optimized_css',
						'type'    => 'switch',
						'title'   => __( 'Load CSS Code in &lt;head&gt;', 'imedica' ),
						'desc'    => __( 'If enabled, all the css code will be loaded into the head otherwise, the css file will be enqueued.', 'imedica' ),
						'default' => true,
						'on'      => 'Enable',
						'off'     => 'Disable',
					),
				)
			) );
		}

		public function setHelpTabs() {
			// Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
			$opt_name = "imedica_opts";
			$tabs = array(
		        array(
		            'id'      => 'redux-help-tab-1',
					'title'   => __( 'Theme Information 1', 'imedica' ),
					'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'imedica' )
		        ),
		        array(
		            'id'      => 'redux-help-tab-2',
					'title'   => __( 'Theme Information 2', 'imedica' ),
					'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'imedica' )
		        )
		    );
		    Redux::setHelpTab( $opt_name, $tabs );
		}

		/**
		 * All the possible arguments for Redux.
		 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		 * */
		public function setArguments() {
			$theme                         = wp_get_theme(); // For use with some settings. Not necessary.
			$this->args                    = array(
				'opt_name'              => 'imedica_opts',
				'page_slug'             => 'imedica_options',
				'page_title'            => 'iMedica Options',
				'dev_mode'              => '0',
				'intro_text'            => '',
				'footer_text'           => '',
				'admin_bar'             => '1',
				'menu_type'             => 'menu',
				'menu_title'            => 'iMedica',
				'allow_sub_menu'        => '1',
				'page_parent_post_type' => 'your_post_type',
				'customizer'            => false,
				'default_show'          => '1',
				'hints'                 =>
					array(
						'icon'          => 'el-icon-question-sign',
						'icon_position' => 'right',
						'icon_size'     => 'normal',
						'tip_style'     =>
							array(
								'color' => 'light',
							),
						'tip_position'  =>
							array(
								'my' => 'top left',
								'at' => 'bottom right',
							),
						'tip_effect'    =>
							array(
								'show' =>
									array(
										'effect'   => 'fade',
										'duration' => '500',
										'event'    => 'mouseover',
									),
								'hide' =>
									array(
										'effect'   => 'fade',
										'duration' => '500',
										'event'    => 'mouseleave unfocus',
									),
							),
					),
				'output'                => '1',
				'output_tag'            => '1',
				'compiler'              => '0',
				'page_icon'             => 'icon-themes',
				'page_permissions'      => 'manage_options',
				'save_defaults'         => 'true',
				'show_import_export'    => '1',
				'disable_save_warn'     => '1',
				'database'              => 'options',
				'transient_time'        => '6000',
				'network_sites'         => '1',
				'use_cdn' 				=> false
			);
			$theme                         = wp_get_theme(); // For use with some settings. Not necessary.
			$this->args["display_name"]    = $theme->get( "Name" );
			$this->args["display_version"] = $theme->get( "Version" );
			// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
			$this->args['share_icons'][] = array(
				'url'   => 'http://bsf.io/github',
				'title' => 'Visit us on GitHub',
				'icon'  => 'el-icon-github'
			);
			$this->args['share_icons'][] = array(
				'url'   => 'http://bsf.io/facebook',
				'title' => 'Like us on Facebook',
				'icon'  => 'el-icon-facebook'
			);
			$this->args['share_icons'][] = array(
				'url'   => 'http://bsf.io/twitter',
				'title' => 'Follow us on Twitter',
				'icon'  => 'el-icon-twitter'
			);
			$this->args['share_icons'][] = array(
				'url'   => 'http://bsf.io/linkedin',
				'title' => 'Find us on LinkedIn',
				'icon'  => 'el-icon-linkedin'
			);	
		}
	}

	global $reduxConfig;
	$reduxConfig = new imedica_Redux_Framework_config();
}
/**
 * Custom function for the callback referenced above
 */
if ( ! function_exists( 'imedica_my_custom_field' ) ):
	function imedica_my_custom_field( $field, $value ) {
		print_r( $field );
		echo '<br/>';
		print_r( $value );
	}
endif;
/**
 * Custom function for the callback validation referenced above
 * */
if ( ! function_exists( 'imedica_validate_callback_function' ) ):
	function imedica_validate_callback_function( $field, $value, $existing_value ) {
		$error = false;
		$value = 'just testing';
		$return['value'] = $value;
		if ( $error == true ) {
			$return['error'] = $field;
		}

		return $return;
	}
endif;
if ( ! function_exists( "imedica_icon_manager" ) ) {
	function imedica_icon_manager( $param_name, $value ) {
		if ( class_exists( "AIO_Icon_Manager" ) ) {
			$font_manager = AIO_Icon_Manager::get_font_manager();
			$uid          = uniqid();
			$output       = '<div class="icon_selector_' . esc_attr( $uid ) . '">'
			                . '<input name="' . esc_attr( $param_name ) . '"
                      class="wpb_vc_param_value wpb-textinput ' . esc_attr( $param_name ) . ' field_' . esc_attr( $uid ) . '" type="hidden" 
                      value="' . esc_attr( $value ) . '"/>';
			$fonts        = get_option( 'imedica_fonts' );
			$output .= '<p><div class="preview-icon preview-icon-' . esc_attr( $uid ) . '"><i class=""></i></div><input class="search-icon" type="text" placeholder="Search for a suitable icon.." /></p>';
			$output .= '<div id="imedica_icon_search">';
			$output .= '<ul class="icons-list imedica_icon">';
			foreach ( $fonts as $font => $info ) {
				$icon_set   = array();
				$icons      = array();
				$upload_dir = wp_upload_dir();
				$path       = trailingslashit( $upload_dir['basedir'] );
				$file       = $path . $info['include'] . '/' . $info['config'];
				include( $file );
				if ( ! empty( $icons ) ) {
					$icon_set = array_merge( $icon_set, $icons );
				}
				if ( $font == "smt" ) {
					$set_name = 'Default Icons';
				} else {
					$set_name = ucfirst( $font );
				}
				if ( ! empty( $icon_set ) ) {
					$output .= '<p><strong>' . esc_attr( $set_name ) . '</strong></p>';
					$output .= '<li title="no-icon" data-icons="none" data-icons-tag="none,blank" style="cursor: pointer;"></li>';
					foreach ( $icon_set as $icons ) {
						foreach ( $icons as $icon ) {
							$output .= '<li title="' . esc_attr( $icon['class'] ) . '" data-icons="' . esc_attr( $font ) . '-' . esc_attr( $icon['class'] ) . '" data-icons-tag="' . esc_attr( $icon['tags'] ) . '">';
							$output .= '<i class="icon ' . esc_attr( $font ) . '-' . esc_attr( $icon['class'] ) . '"></i><label class="icon">' . esc_attr( $icon['class'] ) . '</label></li>';
						}
					}
				}
			}
			$output . '</ul>';

			$output .= '<script type="text/javascript">
                        jQuery(document).ready(function(){
                            setTimeout(function() {
                                jQuery(".icon_selector_' . esc_js( $uid ) . ' .search-icon").focus();
                            }, 1000);
                            jQuery(".icon_selector_' . esc_js( $uid ) . ' .search-icon").keyup(function(){
                                // Retrieve the input field text and reset the count to zero
                                var filter = jQuery(this).val(), count = 0;
                                // Loop through the icon list
                                jQuery(".icon_selector_' . esc_js( $uid ) . ' .icons-list li").each(function(){
                                    // If the list item does not contain the text phrase fade it out
                                    if (jQuery(this).attr("data-icons-tag").search(new RegExp(filter, "i")) < 0) {
                                        jQuery(this).fadeOut();
                                    } else {
                                        jQuery(this).show();
                                        count++;
                                    }
                                });
                            });
                        });
                </script>';

			$output .= '</div>';

			$output .= '</div>';
			$output .= '<script type="text/javascript">
                jQuery(document).ready(function(){
                    jQuery(".icon_selector_' . esc_js( $uid ) . ' > .preview-icon-' . esc_js( $uid ) . '").html("<i class=\'' . esc_js( $value ) . '\'></i>");
                    jQuery(".icon_selector_' . esc_js( $uid ) . ' .icons-list li[data-icons=\'' . esc_js( $value ) . '\']").addClass("selected");
                });
                jQuery(".icon_selector_' . esc_js( $uid ) . ' .icons-list li").click(function() {
                    jQuery(this).attr("class","selected").siblings().removeAttr("class");
                    var icon = jQuery(this).attr("data-icons");
                    jQuery("input[name=\'' . esc_js( $param_name ) . '\']").val(icon);
                    jQuery(".icon_selector_' . esc_js( $uid ) . ' > .preview-icon-' . esc_js( $uid ) . '").html("<i class=\'"+icon+"\'></i>");
                });
                </script>';

			return $output;
		} else {
			return 'Please activate the "Ultimate Addons for Visual Composer" plugin.';
		}
	}
}