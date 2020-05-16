<?php
add_action( 'widgets_init', 'imd_recent_posts_load_widgets' );
function imd_recent_posts_load_widgets() {
	register_widget( 'iMedica_Recent_Posts_Widget' );
}
class iMedica_Recent_Posts_Widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array(
			'classname'   => 'imd_recent_posts',
			'description' => __( 'Display recent posts with thumbnail.', "imedica" )
			);
		$control_ops = array( 'id_base' => 'imd_recent_posts-widget' );
		parent::__construct( 'imd_recent_posts-widget', __( 'iMedica: Recent Posts', "imedica" ), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title  = apply_filters( 'widget_title', $instance['title'] );
		$number = $instance['number'];
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		?>
		<div class="recent-posts-items clearfix">
			<?php
			$posts = new WP_Query( apply_filters( 'widget_posts_args', array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true
				) ) );
			if ( $posts->have_posts() ):
				?>
			<?php while ( $posts->have_posts() ): $posts->the_post(); ?>
				<?php
				$new_permalink = get_permalink();
				global $post;
				$post_id = $post->ID;
				?>
				<a href="<?php echo esc_url( $new_permalink ); ?>" title="<?php the_title(); ?>">
					
					<?php
					if ( get_the_post_thumbnail( $post_id ) != '' ) { ?>
					<div class="recent-post-thumbnail">
						<?php the_post_thumbnail( 'recent-posts-thumbnail' ); ?>
					</div>
					<?php 					}
					$col = 8;
					?>
					<div class="recent-post-title">
						<?php the_title(); ?>
						<?php echo '<span>' . get_the_date( 'M d, Y', $post_id ) . '</span>'; ?>
					</div>
				</a>
			<?php endwhile; endif;
			wp_reset_query();
			?>
		</div>
		<?php echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance           = $old_instance;
		$instance['title']  = strip_tags( $new_instance['title'] );
		$instance['number'] = $new_instance['number'];
		return $instance;
	}
	function form( $instance ) {
		$defaults = array( 'title' => 'Recent Posts', 'number' => 6 );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( "Title:", "imedica" ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"
			name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<p>
			<label
			for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php _e( "Number of items to show:", "imedica" ); ?></label>
			<input class="widefat" type="text" style="width: 30px;" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"
			name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>"/>
		</p>
		<?php
	}
}