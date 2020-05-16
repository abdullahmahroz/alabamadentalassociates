<?php
$images = $el_class = $enable_gallery_thumbnails = '';
extract( shortcode_atts( array(
	'images'                    => '',
	'enable_gallery_thumbnails' => 'on',
	'el_class'                  => '',
), $atts ) );
$img_arr   = explode( ",", $images );
$img_count = count( $img_arr );
$uid       = uniqid();
echo "<div class='imedica_gallery_wrap'>";
echo '<div class="imedica_image_gallery ' . esc_attr( $el_class ) . '">';
echo '<ul class="bxslider_' . esc_attr( $uid ) . '">';
foreach ( $img_arr as $key => $img_id ) {
	$alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
	$img_big = wp_get_attachment_image_src( $img_id, 'full' );
	echo '<li><img src="' . esc_url( $img_big[0] ) . '" alt="' . $alt . '"></li>';
}
echo '</ul>';
if ( $enable_gallery_thumbnails == "on" ) {
	echo '<div id="bxslider_' . esc_attr( $uid ) . '" class="bx-pager">';
	foreach ( $img_arr as $key => $img_id ) {
		$alt       = get_the_title( $img_id );
		$img_thumb = wp_get_attachment_image_src( $img_id, 'recent-posts-thumbnail' );
		echo '<a data-slide-index="' . esc_attr( $key ) . '" href="#" class="bxslider-item"><img src="' . esc_url( $img_thumb[0] ) . '" alt="' . esc_attr( $alt ) . '"></a>';
	}
	echo '</div>';
}

echo '</div>';
echo '</div>';
?>
<script type="text/javascript">
	jQuery(document).ready(function () {
		var slider_<?php echo esc_attr( $uid ); ?> = jQuery(".<?php echo esc_js('bxslider_' . esc_attr( $uid )); ?>").bxSlider({
			pagerCustom: "#<?php echo esc_js('bxslider_' . esc_attr( $uid )) ; ?>",
		});
		jQuery(document).on('ultAdvancedTabClicked', function(){
			setTimeout(function(){
				slider_<?php echo esc_attr( $uid ); ?>.reloadSlider();
			},300);
		});
		jQuery('.vc_tta-tab a').on('click',function(){
			setTimeout(function(){
				slider_<?php echo esc_attr( $uid ); ?>.reloadSlider();
			},300);
		});
		jQuery( ".imd_tour" ).on( "tabscreate", function( event, ui ) {
			setTimeout(function(){
				slider_<?php echo esc_attr( $uid ); ?>.reloadSlider();
			},300);
		});
		jQuery( ".imd_tour" ).on( "tabsactivate", function( event, ui ) {
			setTimeout(function(){
				slider_<?php echo esc_attr( $uid ); ?>.reloadSlider();
			},300);
		});
		jQuery( ".wpb_tabs" ).on( "tabscreate", function( event, ui ) {
			setTimeout(function(){
				slider_<?php echo esc_attr( $uid ); ?>.reloadSlider();
			},300);
		});
		jQuery('.wpb_tabs').on('tabsactivate',function(event, ui){
			console.log('HELLO');
			setTimeout(function(){
				slider_<?php echo esc_attr( $uid ); ?>.reloadSlider();
			},300);
		});
	});
</script>