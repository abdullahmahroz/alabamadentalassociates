<?php
class imd_Widget_Tabber extends WP_Widget {
	var $defaults = array(
		'sidebar' => '',
		'class'   => ''
	);
	public function __construct( $id_base = false, $name = '', $widget_options = array(), $control_options = array() ) {
		parent::__construct( 'imd-widget-tabber', __( 'iMedica: Widget Tabber', "imedica" ), array( 'description' => __( 'Sidebar into tabbed widget.', "imedica" ) ) );
	}
	public function widget( $args, $instance ) {
		add_filter( 'dynamic_sidebar_params', array( &$this, 'widget_sidebar_params' ) );
		extract( $args, EXTR_SKIP );
		echo $before_widget;
		if ( $args['id'] != $instance['sidebar'] ) {
			echo '<div id="' . $widget_id . '" class="imd-tabber-widget">';
			echo '<ul class="imd-tabber-header"></ul>';
			dynamic_sidebar( $instance["sidebar"] );
			echo '</div>';
		} else {
			echo __( 'Tabber widget is not properly configured.', "imedica" );
		}
		echo $after_widget;
		remove_filter( 'dynamic_sidebar_params', array( &$this, 'widget_sidebar_params' ) );
	}
	public function form( $instance ) {
		global $wp_registered_sidebars;
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>
		<p><label>Sidebar:</label>
			<select style="background-color: white;" class="widefat imd-tabber-sidebars"
			        id="<?php echo esc_attr($this->get_field_id( 'sidebar' )); ?>"
			        name="<?php echo esc_attr($this->get_field_name( 'sidebar' )); ?>">
				<?php
				foreach ( $wp_registered_sidebars as $id => $sidebar ) {
					if ( $id != 'wp_inactive_widgets' ) {
						$selected = $instance['sidebar'] == $id ? ' selected="selected"' : '';
						echo sprintf( '<option value="%s"%s>%s</option>', $id, $selected, $sidebar['name'] );
					}
				}
				?>
			</select><br/>
			<em><?php _e( "Make sure not to select Sidebar holding this widget. If you do that, Tabber will not be visible.", "imedica" ); ?></em>
		</p>
		<p><label>CSS Class:</label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'class' )); ?>"
			       name="<?php echo esc_attr($this->get_field_name( 'class' )); ?>" type="text"
			       value="<?php echo esc_attr($instance['class']); ?>"/>
		</p>
	<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance            = $old_instance;
		$instance['sidebar'] = strip_tags( stripslashes( $new_instance['sidebar'] ) );
		$instance['class']   = strip_tags( stripslashes( $new_instance['class'] ) );
		return $instance;
	}
	public function widget_sidebar_params( $params ) {
		$params[0]['before_widget'] = '<div id="' . $params[0]['widget_id'] . '" class="imd-st-tab">';
		$params[0]['after_widget']  = '</div>';
		$params[0]['before_title']  = '<a href="#" class="imd-st-title">';
		$params[0]['after_title']   = '</a>';
		return $params;
	}
}
add_action( 'widgets_init', 'imd_st_widgets_init' );
function imd_st_widgets_init() {
	register_widget( 'imd_Widget_Tabber' );
}