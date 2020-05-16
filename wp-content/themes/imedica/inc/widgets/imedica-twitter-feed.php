<?php
add_action( 'widgets_init', 'tweets_load_widgets' );
function tweets_load_widgets() {
	register_widget( 'iMedica_Tweets_Widget' );
}
class iMedica_Tweets_Widget extends WP_Widget {
	function __construct() {
		$widget_ops  = array( 'classname' => 'tweets', 'description' => '' );
		$control_ops = array( 'id_base' => 'tweets-widget' );
		parent::__construct( 'tweets-widget', 'iMedica: Twitter', $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title               = apply_filters( 'widget_title', $instance['title'] );
		$consumer_key        = $instance['consumer_key'];
		$consumer_secret     = $instance['consumer_secret'];
		$access_token        = $instance['access_token'];
		$access_token_secret = $instance['access_token_secret'];
		$twitter_id          = $instance['twitter_id'];
		$count               = (int) $instance['count'];
		$widget_id           = $args['widget_id'];
		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		if ( $twitter_id && $consumer_key && $consumer_secret && $access_token && $access_token_secret && $count ) {
			$transName = 'list_tweets_' . $widget_id;
			$cacheTime = 10;
			if ( false === ( $twitterData = get_transient( $transName ) ) ) {
				$token = get_option( 'cfTwitterToken_' . $widget_id );
				// get a new token anyways
				delete_option( 'cfTwitterToken_' . $widget_id );
				// getting new auth bearer only if we don't have one
				if ( ! $token ) {
					// preparing credentials
					$credentials = $consumer_key . ':' . $consumer_secret;
					$toSend      = base64_encode( $credentials );
					// http post arguments
					$args = array(
						'method'      => 'POST',
						'httpversion' => '1.1',
						'blocking'    => true,
						'headers'     => array(
							'Authorization' => 'Basic ' . $toSend,
							'Content-Type'  => 'application/x-www-form-urlencoded;charset=UTF-8'
							),
						'body'        => array( 'grant_type' => 'client_credentials' )
						);
					add_filter( 'https_ssl_verify', '__return_false' );
					$response = wp_remote_post( 'https://api.twitter.com/oauth2/token', $args );
					$keys     = json_decode( wp_remote_retrieve_body( $response ) );
					if ( $keys ) {
						// saving token to wp_options table
						update_option( 'cfTwitterToken_' . $widget_id, $keys->access_token );
						$token = $keys->access_token;
					}
				}
				// we have bearer token wether we obtained it from API or from options
				$args = array(
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array(
						'Authorization' => "Bearer $token"
						)
					);
				add_filter( 'https_ssl_verify', '__return_false' );
				$api_url  = esc_url( 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $twitter_id . '&count=' . $count );
				$response = wp_remote_get( $api_url, $args );
				set_transient( $transName, wp_remote_retrieve_body( $response ), 60 * $cacheTime );
			}
			@$twitter = json_decode( get_transient( $transName ), true );
			if ( $twitter && is_array( $twitter ) ) {
				?>
				<div class="twitter-box">
					<div class="twitter-holder">
						<div class="tweets-container" id="tweets_<?php echo esc_attr($widget_id); ?>">
							<ul class="imedica-twitter-feed">
								<?php
								$i                          = 0;
								$imedica_twitter_hyperlinks = $imedica_twitter_users = $encode_utf8 = $update = true;
								foreach ( (array) $twitter as $item ) {
									if ( is_array( $item ) && array_key_exists( 'text' , $item )) {
										$msg       = $item['text'];
										$permalink = 'http://twitter.com/#!/' . $twitter_id . '/status/' . $item['id_str'];
										if ( $encode_utf8 ) {
										// $msg = utf8_encode( $msg );
										}
										$link = $permalink;
										echo '<li class="twitter-tweet">';
										echo '<i class="fa fa-angle-right col-md-1"></i>';
										if ( $imedica_twitter_hyperlinks ) {
											$msg = imedica_twitter_hyperlinks( $msg );
										}
										if ( $imedica_twitter_users ) {
											$msg = imedica_twitter_users( $msg );
										}
										echo '<span class="col-md-11">' . $msg;
										if ( $update ) {
											$time = strtotime( $item['created_at'] );
											if ( ( abs( time() - $time ) ) < 86400 ) {
												$h_time = sprintf( __( '%s ago', 'imedica' ), human_time_diff( $time ) );
											} else {
												$h_time = date( 'Y-m-d', $time );
											}
											echo sprintf( __( '%s', 'twitter-for-wordpress' ), '<span class="twitter-timestamp"><time>' . $h_time . '</time></span>' );
										}
										echo '</span>';
										echo '</li>';
										$i ++;
										if ( $i >= $count ) {
											break;
										}
									} else {
										echo "Twitter replied with error - ".$item[0]['message'];
									}
								}
								?>
							</ul>
						</div>
					</div>
					<span class="arrow"></span>
				</div>
				<?php }
			}
			echo $after_widget;
		}
		function ago( $time ) {
			$periods        = array(
				__( 'second', 'iMedica' ),
				__( 'minute', 'iMedica' ),
				__( 'hour', 'iMedica' ),
				__( 'day', 'iMedica' ),
				__( 'week', 'iMedica' ),
				__( 'month', 'iMedica' ),
				__( 'year', 'iMedica' ),
				__( 'decade', 'iMedica' )
				);
			$periods_plural = array(
				__( 'seconds', 'iMedica' ),
				__( 'minutes', 'iMedica' ),
				__( 'hours', 'iMedica' ),
				__( 'days', 'iMedica' ),
				__( 'weeks', 'iMedica' ),
				__( 'months', 'iMedica' ),
				__( 'years', 'iMedica' ),
				__( 'decades', 'iMedica' )
				);
			$lengths        = array( '60', '60', '24', '7', '4.35', '12', '10' );
			$now            = time();
			$difference     = $now - $time;
			$tense          = __( 'ago', 'ieedica' );
			for ( $j = 0; $difference >= $lengths[ $j ] && $j < count( $lengths ) - 1; $j ++ ) {
				$difference /= $lengths[ $j ];
			}
			$difference = round( $difference );
			if ( $difference != 1 ) {
				$periods[ $j ] = $periods_plural[ $j ];
			}
			return sprintf( '%s %s %s', $difference, $periods[ $j ], $tense );
		}
		function update( $new_instance, $old_instance ) {
			$instance                        = $old_instance;
			$instance['title']               = strip_tags( $new_instance['title'] );
			$instance['consumer_key']        = $new_instance['consumer_key'];
			$instance['consumer_secret']     = $new_instance['consumer_secret'];
			$instance['access_token']        = $new_instance['access_token'];
			$instance['access_token_secret'] = $new_instance['access_token_secret'];
			$instance['twitter_id']          = $new_instance['twitter_id'];
			$instance['count']               = $new_instance['count'];
			return $instance;
		}
		function form( $instance ) {
			$defaults = array(
				'title'               => 'Recent Tweets',
				'twitter_id'          => '',
				'count'               => 3,
				'consumer_key'        => '',
				'consumer_secret'     => '',
				'access_token'        => '',
				'access_token_secret' => ''
				);
				$instance = wp_parse_args( (array) $instance, $defaults ); ?>
				<p><a href="http://dev.twitter.com/apps"><?php _e( "Find or Create your Twitter App", "imedica" ); ?></a></p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( "Title:", "imedica" ); ?></label>
					<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'consumer_key' )); ?>"><?php _e( "Consumer Key:", "imedica" ); ?></label>
					<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'consumer_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'consumer_key' )); ?>" value="<?php echo esc_attr($instance['consumer_key']); ?>" />
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'consumer_secret' )); ?>"><?php _e( "Consumer Secret:", "imedica" ); ?></label>
					<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'consumer_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'consumer_secret' )); ?>" value="<?php echo esc_attr($instance['consumer_secret']); ?>" />
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'access_token' )); ?>"><?php _e( "Access Token:", "imedica" ); ?></label>
					<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'access_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'access_token' )); ?>" value="<?php echo esc_attr($instance['access_token']); ?>" />
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'access_token_secret' )); ?>"><?php _e( "Access Token Secret:", "imedica" ); ?></label>
					<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'access_token_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'access_token_secret' )); ?>" value="<?php echo esc_attr($instance['access_token_secret']); ?>" />
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id( 'twitter_id' )); ?>"><?php _e( "Twitter Username:", "imedica" ); ?></label>
					<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'twitter_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter_id' )); ?>" value="<?php echo esc_attr($instance['twitter_id']); ?>" />
				</p>
				<label for="<?php echo esc_attr($this->get_field_id( 'count' )); ?>"><?php _e( "Number of Tweets:", "imedica" ); ?></label>
				<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'count' )); ?>" value="<?php echo esc_attr($instance['count']); ?>" />
			</p>
			<?php
		}
	}
// Find links and create the imedica_twitter_hyperlinks
	if ( ! function_exists( 'imedica_twitter_hyperlinks' ) ) {
		function imedica_twitter_hyperlinks( $text ) {
			$text = preg_replace( '/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"$1\" class=\"twitter-link\">$1</a>", $text );
			$text = preg_replace( '/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text );
		// match name@address
			$text = preg_replace( "/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i", "<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text );
		//mach #trendingtopics. Props to Michael Voigt
			$text = preg_replace( '/([\.|\,|\:|\Ai|\A?|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text );
			return $text;
		}
	}
//Find twitter users
	if ( ! function_exists( 'imedica_twitter_users' ) ) {
		function imedica_twitter_users( $text ) {
			$text = preg_replace( '/([\.|\,|\:|\Ai|\A?|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text );
			return $text;
		}
	}
	?>