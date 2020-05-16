<?php
add_action( 'widgets_init', 'imd_social_profiles_load_widgets' );
function imd_social_profiles_load_widgets() {
	register_widget( 'iMedica_Social_Profiles_Widget' );
}

class iMedica_Social_Profiles_Widget extends WP_Widget {
	function __construct() {
		/**
		 *    Global Profiles Array
		 *
		 *     Add social profiles with bullien value true/false. Widget just add profiles which value is true.
		 *
		 * @global $profiles    array of social profiles
		 * @since 1.0.
		 */
		global $profiles;
		$profiles    = array(
			'facebook'    => true,
			'twitter'     => true,
			'google-plus' => true,
			'linkedin'    => true,
			'rss'         => true,
			'flickr'      => true,
			'reddit'      => true,
			'digg'        => true,
			'github'      => true,
			'vk'          => true,
			'youtube'     => true,
			'instagram'   => true,
			'pinterest'   => true,
		);
		$widget_ops  = array( 'classname' => 'imd_social_profiles', 'description' => 'Add social profiles.' );
		$control_ops = array( 'id_base' => 'imd_social_profiles-widget' );
		parent::__construct( 'imd_social_profiles-widget', 'iMedica: Social Profiles', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title     = apply_filters( 'widget_title', $instance['title'] );
		$icon_size = $instance['icon-size'] ? $instance['icon-size'] : '';
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		} ?>
		<div class="social-profiles-wrapper clearfix">
			<ul class="social-profiles">
				<?php
				global $profiles;

				foreach ( $profiles as $key => $status ) {
					if ( isset( $instance[ $key ] ) ) {
						if ( $status && $instance[ $key ] != '' ) {
							echo '<li><a href="' . $instance[ $key ] . '" target="_blank" title="' . ucwords( str_replace( "-", " ", $key ) ) . '"><i style="font-size: ' . $icon_size . 'px;" class="fa fa-' . $key . ' widget-social-icon" data-original-title="' . ucwords( str_replace( "-", " ", $key ) ) . '" id="widget-' . $key . '" data-toggle="tooltip" data-placement="bottom" title="' . ucwords( str_replace( "-", " ", $key ) ) . '"></i></a></li>';
							?>
							<?php
						}
					}
				} ?>
			</ul>
		</div>
		<?php echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		global $profiles;
		$instance              = $old_instance;
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['icon-size'] = strip_tags( $new_instance['icon-size'] );
		/**
		 *    Update Instance
		 *
		 * @global $profiles    array of social profiles
		 * @since 1.0.
		 */
		foreach ( $profiles as $key => $status ) {
			if ( $status ) {
				$instance[ $key ] = strip_tags( $new_instance[ $key ] );
			}
		}

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => 'SOCIAL MEDIA', 'icon-size' => '18' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( "Title:", "imedica" ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'icon-size' ) ); ?>"><?php _e( "Icon Size", "imedica" ); ?>
				<small><i>px</i></small>
				:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id( 'icon-size' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'icon-size' ) ); ?>"
			       value="<?php echo esc_attr( $instance['icon-size'] ); ?>"/>
		</p>
		<?php
		/**
		 *    Add input fields in widget
		 *
		 *    Add social profile input fields in widget from global array $profiles
		 *
		 * @global $profiles    array of social profiles
		 * @since 1.0.
		 */
		global $profiles;
		foreach ( $profiles as $key => $status ) {
			if ( $status ) {
				$Val = '';
				if ( isset( $instance[ $key ] ) && $instance[ $key ] != '' ) {
					$Val = $instance[ $key ];
				}
				?>
				<p>
					<label
						for="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"><?php echo ucwords( str_replace( "-", " ", $key ) ); ?>
						:</label>
					<input class="widefat" type="url" id="<?php echo esc_attr( $this->get_field_id( $key ) ); ?>"
					       name="<?php echo esc_attr( $this->get_field_name( $key ) ); ?>"
					       value="<?php echo esc_attr( $Val ); ?>"/>
				</p>
				<?php
			}
		}
	}
}