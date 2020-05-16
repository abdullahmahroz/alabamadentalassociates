<?php
$username    = $num = $update = $imedica_twitter_hyperlinks = $imedica_twitter_users = $encode_utf8 = '';
$consumerkey = $consumersecret = $accesstoken = $accesstokensecret = $css_wrapper = '';
extract( shortcode_atts( array(
	'username'                   => '',
	'num'                        => '',
	'update'                     => '',
	'imedica_twitter_hyperlinks' => '',
	'imedica_twitter_users'      => '',
	'encode_utf8'                => '',
	'consumerkey'                => '',
	'consumersecret'             => '',
	'accesstoken'                => '',
	'accesstokensecret'          => '',
	'css_wrapper'				 => ''
), $atts ) );
$transName = 'list-tweets'; // Name of value in database.
$cacheTime = 10; // Time in minutes between updates.
require_once( "twitteroauth/twitteroauth.php" ); //Path to twitteroauth library

$twitteruser = $username;

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

if ( !function_exists( 'getConnectionWithAccessToken' ) ) {
	function getConnectionWithAccessToken( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret ) {
		$connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );

		return $connection;
	}
}

$connection = getConnectionWithAccessToken( $consumerkey, $consumersecret, $accesstoken, $accesstokensecret );
$json       = $connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $twitteruser . "&count=" . $num );
// Get tweets into an array.
$twitterData = (array)$json; //json_decode($json, true);

echo '<ul class="imedica-twitter-feed '. esc_attr( $css_wrapper ) .'">';
if ( $username == '' ) {
	echo '<li>';
	echo 'RSS not configured';
	echo '</li>';
} else {

	if ( empty( $twitterData ) || isset( $twitterData['errors'] ) ) {
		echo '<li class="follow_on_twitter">';
		echo '<a href="http://www.twitter.com/' . $username . '" title="' . __( "Follow Me On Twitter", "imedica" ) . '">' . __( "Follow Me On Twitter", "imedica" ) . '</a>';
		echo '</li>';
	} else {
		$i = 0;

		foreach ( (array) $twitterData as $item ) {
			$msg       = $item->text;
			$permalink = 'http://twitter.com/#!/' . $username . '/status/' . $item->id_str;
			if ( $encode_utf8 ) {
				$msg = utf8_encode( $msg );
			}
			$link = $permalink;

			echo '<li class="twitter-tweet">';
			echo '<i class="Defaults-twitter col-md-1"></i>';

			if ( $imedica_twitter_hyperlinks ) {
				$msg = imedica_twitter_hyperlinks( $msg );
			}
			if ( $imedica_twitter_users ) {
				$msg = imedica_twitter_users( $msg );
			}

			echo '<span class="col-md-11">' . $msg . '</span>';

			if ( $update ) {
				$time = strtotime( $item->created_at );

				if ( ( abs( time() - $time ) ) < 86400 ) {
					$h_time = sprintf( __( '%s ago', 'imedica' ), human_time_diff( $time ) );
				} else {
					$h_time = date( 'Y/m/d', $time );
				}

				echo sprintf( __( '%s', 'twitter-for-wordpress' ), ' <span class="twitter-timestamp"><abbr title="' . date( 'Y/m/d H:i:s', $time ) . '">' . esc_html( $h_time ) . '</abbr></span>' );
			}

			echo '</li>';

			$i ++;
			if ( $i >= $num ) {
				break;
			}
		}
	}
}
echo '</ul>';
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