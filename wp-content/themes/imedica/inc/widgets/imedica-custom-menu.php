<?php
add_action( 'widgets_init', 'imd_menu_widgets' );
function imd_menu_widgets() {
	register_widget( 'iMedica_Menu_Widget' );
}
class iMedica_Menu_Widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array( 'classname' => 'imd_custom_menu', 'description' => __( 'Custom Menu.', "imedica" ) );
		$control_ops = array( 'id_base' => 'imd_custom_menu-widget' );
		parent::__construct( 'imd_custom_menu-widget', __( 'iMedica: Menu', "imedica" ), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title    = apply_filters( 'widget_title', $instance['title'] );
		$style    = isset( $instance['style'] ) ? $instance['style'] : '';
		$nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title ;
		}
		wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu, 'menu_class' => 'menu side-menu-' . $style ) );
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['style'] = strip_tags( $new_instance['style'] );
		if ( ! empty( $new_instance['nav_menu'] ) ) {
			$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 'title' => '', 'nav_menu' => '', 'style' => '' );
		$title    = isset( $instance['title'] ) ? $instance['title'] : 'Menu';
		$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
		$style    = isset( $instance['style'] ) ? $instance['style'] : '';
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( "Title:", "imedica" ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"
			       name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<?php
		$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
		if ( ! $menus ) {
			echo '<p>' . sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.' ), esc_url( admin_url( 'nav-menus.php' ) ) ) . '</p>';
			return;
		}?>
		<p>
			<label
				for="<?php echo esc_attr($this->get_field_id( 'nav_menu' )); ?>"><?php _e( 'Select Menu:', 'imedica' ); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'nav_menu' )); ?>"
			        name="<?php echo esc_attr($this->get_field_name( 'nav_menu' )); ?>">
				<option value="0"><?php _e( '&mdash; Select &mdash;', 'imedica' ) ?></option>
				<?php
				foreach ( $menus as $menu ) {
					echo '<option value="' . $menu->term_id . '"'
					     . selected( $nav_menu, $menu->term_id, false )
					     . '>' . $menu->name. '</option>';
				}
				?>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php _e( "Style:", "imedica" ); ?></label>
			<select id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"
			        name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" class="widefat" style="width:100%;">
				<option <?php selected( $instance['style'], 'default' ); ?> value="default"><?php _e( "Style 1", "imedica" ); ?></option>
				<option <?php selected( $instance['style'], 'style2' ); ?> value="style2"><?php _e( "Style 2", "imedica" ); ?></option>
				<option <?php selected( $instance['style'], 'style3' ); ?> value="style3"><?php _e( "Style 3", "imedica" ); ?></option>
				<option <?php selected( $instance['style'], 'style4' ); ?> value="style4"><?php _e( "Style 4", "imedica" ); ?></option>
			</select>
		</p>
	<?php
	}
}
?>