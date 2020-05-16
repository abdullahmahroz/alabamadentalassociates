<?php
/**
 * (1) Enqueue scripts for like system
 */

if ( ! function_exists( 'like_scripts' ) ) {

	function like_scripts() {
		$html = '<script type="text/javascript">';
		$html .= 'var ajaxurl = "' . esc_url( admin_url( 'admin-ajax.php' ) ) . '"' . "\n";
		$html .= 'var ajax_nonce = "' . wp_create_nonce( 'ajax-nonce' ) . '"';
		$html .= '</script>';
		echo $html;
	}

}

add_action( 'wp_enqueue_scripts', 'like_scripts' );

/**
 * (2) Save like data
 */

if ( ! function_exists( 'imedica_post_like' ) ) {

	function imedica_post_like() {
		$nonce = $_POST['nonce'];
		if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
			die ( 'Nope!' );
		}
		if ( isset( $_POST['imedica_post_like'] ) ) {
			$post_id                 = $_POST['post_id']; // post id
			$imedica_post_like_count = get_post_meta( $post_id, "_imedica_post_like_count", true ); // post like count
			if ( is_user_logged_in() ) { // user is logged in
				global $current_user;
				$user_id     = $current_user->ID; // current user
				$meta_POSTS  = get_user_meta( $user_id, "_liked_posts" ); // post ids from user meta
				$meta_USERS  = get_post_meta( $post_id, "_user_liked" ); // user ids from post meta
				$liked_POSTS = ""; // setup array variable
				$liked_USERS = ""; // setup array variable
				if ( count( $meta_POSTS ) != 0 ) { // meta exists, set up values
					$liked_POSTS = $meta_POSTS[0];
				}
				if ( ! is_array( $liked_POSTS ) ) // make array just in case
				{
					$liked_POSTS = array();
				}
				if ( count( $meta_USERS ) != 0 ) { // meta exists, set up values
					$liked_USERS = $meta_USERS[0];
				}
				if ( ! is_array( $liked_USERS ) ) // make array just in case
				{
					$liked_USERS = array();
				}
				$liked_POSTS[ 'post-' . $post_id ] = $post_id; // Add post id to user meta array
				$liked_USERS[ 'user-' . $user_id ] = $user_id; // add user id to post meta array
				$user_likes                        = count( $liked_POSTS ); // count user likes
				if ( ! AlreadyLiked( $post_id ) ) { // like the post
					update_post_meta( $post_id, "_user_liked", $liked_USERS ); // Add user ID to post meta
					update_post_meta( $post_id, "_imedica_post_like_count", ++ $imedica_post_like_count ); // +1 count post meta
					update_user_meta( $user_id, "_liked_posts", $liked_POSTS ); // Add post ID to user meta
					update_user_meta( $user_id, "_user_like_count", $user_likes ); // +1 count user meta
					echo esc_attr( $imedica_post_like_count ); // update count on front end
				} else { // unlike the post
					$pid_key = array_search( $post_id, $liked_POSTS ); // find the key
					$uid_key = array_search( $user_id, $liked_USERS ); // find the key
					unset( $liked_POSTS[ $pid_key ] ); // remove from array
					unset( $liked_USERS[ $uid_key ] ); // remove from array
					$user_likes = count( $liked_POSTS ); // recount user likes
					update_post_meta( $post_id, "_user_liked", $liked_USERS ); // Remove user ID from post meta
					update_post_meta( $post_id, "_imedica_post_like_count", -- $imedica_post_like_count ); // -1 count post meta
					update_user_meta( $user_id, "_liked_posts", $liked_POSTS ); // Remove post ID from user meta
					update_user_meta( $user_id, "_user_like_count", $user_likes ); // -1 count user meta
					echo "already" . esc_attr( $imedica_post_like_count ); // update count on front end
				}
			} else { // user is not logged in (anonymous)
				$ip        = $_SERVER['REMOTE_ADDR']; // user IP address
				$meta_IPS  = get_post_meta( $post_id, "_user_IP" ); // stored IP addresses
				$liked_IPS = ""; // set up array variable
				if ( count( $meta_IPS ) != 0 ) { // meta exists, set up values
					$liked_IPS = $meta_IPS[0];
				}
				if ( ! is_array( $liked_IPS ) ) // make array just in case
				{
					$liked_IPS = array();
				}
				if ( ! in_array( $ip, $liked_IPS ) ) // if IP not in array
				{
					$liked_IPS[ 'ip-' . $ip ] = $ip;
				} // add IP to array
				if ( ! AlreadyLiked( $post_id ) ) { // like the post
					update_post_meta( $post_id, "_user_IP", $liked_IPS ); // Add user IP to post meta
					update_post_meta( $post_id, "_imedica_post_like_count", ++ $imedica_post_like_count ); // +1 count post meta
					echo esc_attr( $imedica_post_like_count ); // update count on front end
				} else { // unlike the post
					$ip_key = array_search( $ip, $liked_IPS ); // find the key
					unset( $liked_IPS[ $ip_key ] ); // remove from array
					update_post_meta( $post_id, "_user_IP", $liked_IPS ); // Remove user IP from post meta
					update_post_meta( $post_id, "_imedica_post_like_count", -- $imedica_post_like_count ); // -1 count post meta
					echo "already" . esc_attr( $imedica_post_like_count ); // update count on front end
				}
			}
		}
		exit;
	}

}

add_action( 'wp_ajax_nopriv_post-like', 'imedica_post_like' );
add_action( 'wp_ajax_post-like', 'imedica_post_like' );

/**
 * (3) Test if user already liked post
 */

if ( ! function_exists( 'AlreadyLiked' ) ) {

	function AlreadyLiked( $post_id ) { // test if user liked before
		if ( is_user_logged_in() ) { // user is logged in
			global $current_user;
			$user_id     = $current_user->ID; // current user
			$meta_USERS  = get_post_meta( $post_id, "_user_liked" ); // user ids from post meta
			$liked_USERS = ""; // set up array variable
			if ( count( $meta_USERS ) != 0 ) { // meta exists, set up values
				$liked_USERS = $meta_USERS[0];
			}
			if ( ! is_array( $liked_USERS ) ) // make array just in case
			{
				$liked_USERS = array();
			}
			if ( in_array( $user_id, $liked_USERS ) ) { // True if User ID in array
				return true;
			}

			return false;
		} else { // user is anonymous, use IP address for voting
			$meta_IPS  = get_post_meta( $post_id, "_user_IP" ); // get previously voted IP address
			$ip        = $_SERVER["REMOTE_ADDR"]; // Retrieve current user IP
			$liked_IPS = ""; // set up array variable
			if ( count( $meta_IPS ) != 0 ) { // meta exists, set up values
				$liked_IPS = $meta_IPS[0];
			}
			if ( ! is_array( $liked_IPS ) ) // make array just in case
			{
				$liked_IPS = array();
			}
			if ( in_array( $ip, $liked_IPS ) ) { // True is IP in array
				return true;
			}

			return false;
		}
	}

}

/**
 * (4) Front end button
 */
if ( ! function_exists( 'getPostLikeLink' ) ) {

	function getPostLikeLink( $post_id, $tag = 'div' ) {
		$theme_object = wp_get_theme();
		$themename    = esc_attr( $theme_object->Name ); // the theme name
		$like_count   = get_post_meta( $post_id, "_imedica_post_like_count", true ); // get post likes
		if ( ( ! $like_count ) || ( $like_count && $like_count == "0" ) ) { // no votes, set up empty variable
			$likes = __( 'Like', 'imedica' );
		} elseif ( $like_count && $like_count != "0" ) { // there are votes!
			$likes = esc_attr( $like_count );
		}
		$output = '<' . $tag . ' class="post-like postid-' . esc_attr( $post_id ) . '">';
		if ( AlreadyLiked( $post_id ) ) { // already liked, set up unlike addon
			$output .= ' <span class="like prevliked"><i class="fa fa-heart"></i></span>';
			$output .= ' <span class="count alreadyliked">' . $likes . '</span>';
		} else { // normal like button
			$output .= '<a href="#" data-post_id="' . esc_attr( $post_id ) . '">';
			$output .= ' <span class="like"><i class="fa fa-heart"></i></span>';
			$output .= ' <span class="count">' . $likes . '</span></a>';
		}
		$output .= '</' . $tag . '>';

		return $output;
	}

}


/**
 * (5) Retrieve User Likes and Show on Profile
 */
if ( ! function_exists( 'show_user_likes' ) ) {

	function show_user_likes( $user ) { ?>

		<table class="form-table">
			<tr>
				<th><label for="user_likes"><?php _e( 'Your Favorite Posts ', 'imedica' ); ?></label></th>
				<td>
					<?php global $current_user;
					$user_likes = get_user_meta( $user->ID, "_liked_posts" );
					if ( $user_likes && count( $user_likes ) > 0 ) {
						$the_likes = $user_likes[0];
					} else {
						$the_likes = '';
					}
					if ( ! is_array( $the_likes ) ) {
						$the_likes = array();
					}
					$count = count( $the_likes );
					$i     = 0;
					if ( $count > 0 ) {
						$like_list = '';
						echo '<p>';
						foreach ( $the_likes as $the_like ) {
							$i ++;
							$like_list .= '<a href="' . esc_url( get_permalink( $the_like ) ) . '" title="' . esc_attr( get_the_title( $the_like ) ) . '">' . get_the_title( $the_like ) . '</a>';
							if ( $count != $i ) {
								$like_list .= ' &middot; ';
							} else {
								$like_list .= '</p>';
							}
						}
						echo ( $like_list !== "" ) ? $like_list : '';
					} else {
						echo '<p>' . __( 'You do not like anything yet.', 'imedica' ) . '</p>';
					} ?>
				</td>
			</tr>
		</table>
		
	<?php }

}


add_action( 'show_user_profile', 'show_user_likes' );
add_action( 'edit_user_profile', 'show_user_likes' );
