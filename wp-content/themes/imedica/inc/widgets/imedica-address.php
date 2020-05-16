<?php
add_action( 'widgets_init', 'imd_address_load_widgets' );
function imd_address_load_widgets() {
	register_widget( 'iMedica_Address_Widget' );
}
class iMedica_Address_Widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array( 'classname' => 'imd_address', 'description' => __( 'Display address.', "imedica" ) );
		$control_ops = array( 'id_base' => 'imd_address-widget' );
		parent::__construct( 'imd_address-widget', __( 'iMedica: Address', "imedica" ), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title   = apply_filters( 'widget_title', $instance['title'] );
		$address = $instance['address'] ? $instance['address'] : '';
		$phone   = $instance['phone'] ? $instance['phone'] : '';
		$fax     = $instance['fax'] ? $instance['fax'] : '';
		$email   = $instance['email'] ? $instance['email'] : '';
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title ;
		}
		?>
		<div class="address clearfix">
			<address class="widget-address">
				<?php if ( ! empty( $address ) ) { ?>
					<div class="col-xs-12 no-pad"><span class="icon-wrap col-sm-1"><i
								class="fa fa-globe address-icons"></i></span><span
							class="address-meta col-sm-11"><?php echo nl2br( $address ); ?></span></div>    <?php } ?>
				<?php if ( ! empty( $phone ) ) { ?>
					<div class="col-xs-12 no-pad"><span class="icon-wrap col-sm-1"><i
								class="fa fa-phone address-icons"></i></span><span
							class="address-meta col-sm-11"><a href="tel:+<?php echo preg_replace( '/\D/', '', esc_attr($phone) ); ?>" ><?php echo esc_attr($phone); ?></a></span></div>    <?php } ?>
				<?php if ( ! empty( $fax ) ) { ?>
					<div class="col-xs-12 no-pad"><span class="icon-wrap col-sm-1"><i
								class="fa fa-file address-icons"></i></span><span
							class="address-meta col-sm-11"><?php echo esc_attr($fax); ?></span></div>    <?php } ?>
				<?php if ( ! empty( $email ) ) { 
					$email = sanitize_email( $email );
				?>
					<div class="col-xs-12 no-pad"><span class="icon-wrap col-sm-1"><i
								class="fa fa-envelope address-icons"></i></span><span
							class="address-meta col-sm-11"><a href="mailto:<?php echo antispambot( $email ); ?>" ><?php echo antispambot( $email ); ?></a></span></div>    <?php } ?>
			</address>
		</div>
		<?php echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance            = $old_instance;
		$instance['title']   = strip_tags( $new_instance['title'] );
		$instance['address'] = strip_tags( $new_instance['address'] );
		$instance['phone']   = strip_tags( $new_instance['phone'] );
		$instance['fax']     = strip_tags( $new_instance['fax'] );
		$instance['email']   = strip_tags( $new_instance['email'] );
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 'title' => 'Address', 'address' => '', 'phone' => '', 'fax' => '', 'email' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( "Title:", "imedica" ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"
			       name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'address' )); ?>"><?php _e( "Address:", "imedica" ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'address' )); ?>"
			          name="<?php echo esc_attr($this->get_field_name( 'address' )); ?>"
			          rows="5"><?php echo esc_attr($instance['address']); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>"><?php _e( "Phone:", "imedica" ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>"
			       name="<?php echo esc_attr($this->get_field_name( 'phone' )); ?>" value="<?php echo esc_attr($instance['phone']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'fax' )); ?>"><?php _e( "FAX:", "imedica" ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'fax' )); ?>"
			       name="<?php echo esc_attr($this->get_field_name( 'fax' )); ?>" value="<?php echo esc_attr($instance['fax']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'email' )); ?>"><?php _e( "Email:", "imedica" ); ?></label>
			<input class="widefat" type="email" id="<?php echo esc_attr($this->get_field_id( 'email' )); ?>"
			       name="<?php echo esc_attr($this->get_field_name( 'email' )); ?>" value="<?php echo esc_attr($instance['email']); ?>"/>
		</p>
	<?php
	}
}
?>