<?php
if( !function_exists('opn_admin_scripts') && !function_exists('opn_common_scripts') ) {
	add_action('wp_enqueue_scripts','opn_common_scripts');
	function opn_common_scripts() {
		$paths = wp_upload_dir();		
		$paths['fonts']   = 'smile_fonts';
		$paths['fonturl'] = set_url_scheme(trailingslashit($paths['baseurl']).$paths['fonts']);
		$fonts = get_option('smile_fonts');
		if(is_array($fonts)) {
			foreach($fonts as $font => $info) {
				if(strpos($info['style'], 'http://' ) !== false) {
					wp_enqueue_style('bsf-'.$font,$info['style']);
				} else {
					wp_enqueue_style('bsf-'.$font,trailingslashit($paths['fonturl']).$info['style']);
				}
			}
		}
		//	Enqueue Google Fonts
		if(!is_404() && !is_search()){
			global $post;
			if(!$post) return false;
			$post_content = $post->post_content;
			if(stripos($post_content, 'font_call:')) {
				preg_match_all('/font_call:(.*?)"/',$post_content, $display);
				enquque_ultimate_google_fonts_optimzed($display[1]);
			}
		}
	}
}
?>