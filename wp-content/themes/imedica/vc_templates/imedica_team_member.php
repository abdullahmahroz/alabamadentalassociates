<?php
$image                  = $name = $pos_in_org  = $text_align = '';
$team_member_name_font  = $team_member_name_font_style = $team_member_name_font_size = $team_member_position_font = $team_member_position_font_style = $team_member_position_font_size = $team_member_description_font = $team_member_description_font_style = $team_member_description_font_size = '';
$team_member_name_color = '';
$team_member_org_color  = '';
$team_member_desc_color = $img_hover_eft = $img_border_style = $img_border_width = $img_border_color = $img_border_radius = $border_style = $border_width = $border_color = $border_radius = $staff_link = $link_switch = '';

/* Declaration for Style-2 for team */
$team_member_style = $divider_effect = $team_member_divider_color = $team_member_divider_width = $social_links = $selected_team_icon = $social_icon_url = $social_link_title = $team_member_bg_color = $team_member_align_style = $team_member_social_icon_color = $css_wrapper = '';

$el_class = '';
/* Declaration closed for Style-2 for team */

extract( shortcode_atts( array(
    "image"                              => "",
    "name"                               => "",
    "pos_in_org"                         => "",
    "text_align"                         => "",
    "team_member_name_font"              => "",
    "team_member_name_font_style"        => "",
    "team_member_name_font_size"         => "",
    "team_member_position_font"          => "",
    "team_member_position_font_style"    => "",
    "team_member_position_font_size"     => "",
    "team_member_description_font"       => "",
    "team_member_description_font_style" => "",
    "team_member_description_font_size"  => "",
    "team_member_name_color"             => "",
    "team_member_org_color"              => "",
    "team_member_desc_color"             => "",
    "img_hover_eft"                      => "",
    "img_border_style"                   => "",
    "img_border_width"                   => "",
    "img_border_radius"                  => "",
    "img_border_color"                   => "",
    "border_style"                       => "solid",
    "border_width"                       => "",
    "border_radius"                      => "",
    "border_color"                       => "",
    "staff_link"                         => "",
    "link_switch"                        => "",

    //New attributes for style 2
    "team_member_style"                => "",
    "divider_effect"                   => "",
    "team_member_bg_color"             => "",
    "team_member_align_style"          => "",
    "team_member_divider_color"        => "",
    "team_member_divider_width"        => "",
    "social_links"                     => "",
    "team_member_social_icon_color"    => "",
    "el_class"                         => "",
    'css_wrapper'                      => "",
    ), $atts ) );

$href                      = vc_build_link( $staff_link );
$url                       = $href['url'];
$target                    = trim( $href['target'] , ' ');
$font_args                     = array();

$css_wrapper = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_wrapper, ' ' ), "ult_countdown", $atts );
$css_wrapper = esc_attr( $css_wrapper );

$team_member_name_font_styling = '';
if ( ! $team_member_name_font == '' ) {
    $team_member_font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $team_member_name_font ) : '';
    $team_member_name_font_styling .= 'font-family:' . $team_member_font_family . ';';
    array_push( $font_args, $team_member_name_font );
}
if ( ! $team_member_name_font_style == '' ) {
    $team_member_name_font_styling .= $team_member_name_font_style . ';';
}
/*if ( ! $team_member_name_font_size == '' ) {
    $team_member_name_font_styling .= 'font-size:' . $team_member_name_font_size . 'px;';
}*/
if ( ! $team_member_name_color == '' ) {
    $team_member_name_font_styling .= 'color:' . $team_member_name_color . ';';
}
$team_member_position_font_styling = '';
if ( ! $team_member_position_font == '' ) {
    $team_member_font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $team_member_position_font ) : '';
    $team_member_position_font_styling .= 'font-family:' . $team_member_font_family . ';';
    array_push( $font_args, $team_member_position_font );
}
if ( ! $team_member_position_font_style == '' ) {
    $team_member_position_font_styling .= $team_member_position_font_style . ';';
}
/*if ( ! $team_member_position_font_size == '' ) {
    $team_member_position_font_styling .= 'font-size:' . $team_member_position_font_size . 'px;';
}*/
if ( ! $team_member_org_color == '' ) {
    $team_member_position_font_styling .= 'color:' . $team_member_org_color . ';';
}
$team_member_description_font_styling = '';
if ( ! $team_member_description_font == '' ) {
    $team_member_font_family = function_exists( "get_ultimate_font_family" ) ? get_ultimate_font_family( $team_member_description_font ) : '';
    $team_member_description_font_styling .= 'font-family:' . $team_member_font_family . ';';
    array_push( $font_args, $team_member_description_font );
}
if ( ! $team_member_description_font_style == '' ) {
    $team_member_description_font_styling .= $team_member_description_font_style . ';';
}
/*if ( ! $team_member_description_font_size == '' ) {
    $team_member_description_font_styling .= 'font-size:' . $team_member_description_font_size . 'px;';
}*/
if ( ! $team_member_desc_color == '' ) {
    $team_member_description_font_styling .= 'color:' . $team_member_desc_color . ';';
}
$img_hver_class = '';
if ( $img_hover_eft == 'on' ) {
    $img_hver_class = 'team_img_hover';
} elseif ( $img_hover_eft == 'off' ) {
    $img_hver_class = '';
}
$team_image_style = '';
if ( !$img_border_style == '' ) {
    $team_image_style .= 'border-style:'.$img_border_style.';';
}
if ( !$img_border_width == '' ) {
    $team_image_style .= 'border-width:'.$img_border_width.'px;';
}
if ( !$img_border_radius == '' ) {
    $team_image_style .= 'border-radius:'.$img_border_radius.'px;';
}
if ( !$img_border_color == '' ) {
    $team_image_style .= 'border-color:'.$img_border_color.';';
}
$team_border_style = '';

if ( !$border_width == '' ) {
    $team_border_style .= 'border-width:'.$border_width.'px;';
}
if ( !$border_radius == '' ) {
    $team_border_style .= 'border-radius:'.$border_radius.'px;';
}
if ( !$border_color == '' ) {
    $team_border_style .= 'border-color:'.$border_color.';';
}
if ( !$border_style == '' ) {
    $team_border_style .= 'border-style:'.$border_style.';';
} else {
     $team_border_style .= 'border-style:none;';
}
$img = apply_filters('ult_get_img_single', $image, 'url');
$alt = apply_filters('ult_get_img_single', $image, 'alt');

ob_start();
//echo do_shortcode( $content );
echo '<div class="team-member-wrap '.$el_class.' '. esc_attr( $css_wrapper ) .'" style="'. esc_attr( $team_border_style ) .'">';
if ( $link_switch == 'on' ) {
    echo '<a href="'. $url .'" target="'. $target  .'">';
}
echo '<div class="team-member-image ' . esc_attr( $img_hver_class ) . '" style="'. esc_attr( $team_image_style ).'"> <img src="' . esc_url( $img ) . '" alt="' .$alt. '"  style="">';
echo '<span class="team-member-image-overlay"></span>';
echo '</div>';//team-member-image
if ( $link_switch == 'on' ) {
    echo '</a>';
}

// Code for Responsive font-size [Open]
$id = uniqid('imedica-heading');
// FIX: set old font size before implementing responsive param
if(is_numeric($team_member_name_font_size))     {   $team_member_name_font_size = 'desktop:'.$team_member_name_font_size.'px;';     }
$team_name_args = array(
                'target'        =>  '.team-member-bio-wrap.'. $id .' .team-member-name',
                'media_sizes'   => array(
                    'font-size'     => $team_member_name_font_size,
                ),
            );
$team_member_name_responsive = function_exists( 'get_ultimate_vc_responsive_media_css' ) ? get_ultimate_vc_responsive_media_css( $team_name_args ) : '';


if(is_numeric($team_member_position_font_size))     {   $team_member_position_font_size = 'desktop:'.$team_member_position_font_size.'px;';     }
$team_position_args = array(
                'target'        =>  '.team-member-bio-wrap.'. $id .' .team-member-position',
                'media_sizes'   => array(
                    'font-size'     => $team_member_position_font_size,
                ),
            );
$team_member_position_responsive = function_exists( 'get_ultimate_vc_responsive_media_css' ) ? get_ultimate_vc_responsive_media_css( $team_position_args ) : '';

if(is_numeric($team_member_description_font_size))     {   $team_member_description_font_size = 'desktop:'.$team_member_description_font_size.'px;';     }
$team_desc_args = array(
                'target'        =>  '.team-member-bio-wrap.'. $id .' .team-member-description',
                'media_sizes'   => array(
                    'font-size'     => $team_member_description_font_size,
                ),
            );

$team_member_desc_responsive = function_exists( 'get_ultimate_vc_responsive_media_css' ) ? get_ultimate_vc_responsive_media_css( $team_desc_args ) : '';
// Code for Responsive font-size [Closed]

if ( $team_member_style == 'style-2') {

    $team_member_bg_color = ( isset( $team_member_bg_color ) && trim( $team_member_bg_color ) !== '' ) ? $team_member_bg_color : '#ffffff';
    $team_member_align_style = ( isset( $team_member_align_style ) && trim( $team_member_align_style ) !== '' ) ? $team_member_align_style : 'center';
    
    echo '<div class="team-member-bio-wrap ' . $team_member_style . ' style-'. $team_member_align_style .' ' . $id . '" style="background-color: ' . $team_member_bg_color . '; text-align:' . $team_member_align_style . '">';

    echo '<div class="team-member-name-wrap">';
    if ( $link_switch == 'on' ) {
        echo '<a href="'. $url .'" target="'. $target  .'">';
    }
    echo '<div class="team-member-name ult-responsive" ' . $team_member_name_responsive .' style="' . $team_member_name_font_styling . '">' . $name . '</div>';
    if ( $link_switch == 'on' ) {
        echo '</a>';
    }
    if ( $pos_in_org ) {
        echo '<div class="team-member-position ult-responsive" ' . $team_member_position_responsive . ' style="' . $team_member_position_font_styling . '">' . $pos_in_org . '</div>';
    }

    echo '<div style="margin-bottom:15px">'; 
    
    if ( $divider_effect == 'on') {

        $team_member_divider_width = ( isset( $team_member_divider_width ) && trim($team_member_divider_width) !== '' ) ? $team_member_divider_width : '50';

        $team_member_divider_width = ( $team_member_divider_width <= 100 ) ? $team_member_divider_width : '100';

        echo '<hr align="'. $team_member_align_style .'" class="team-divider" style="width: ' . $team_member_divider_width . '%; background-color: ' . $team_member_divider_color . ';" />';
    }
    echo '</div>';
    
    if ( $content ) {
        echo '<div class="team-member-description ult-responsive" ' . $team_member_desc_responsive . ' style="' . $team_member_description_font_styling . '"><p>' . do_shortcode( $content ) . '</p></div>';
    }
    
    $social_icons = json_decode (urldecode( $social_links ) );
    
    if ( count( $social_icons ) > 0 ) {
        
        $team_member_social_icon_color = ( isset( $team_member_social_icon_color ) && trim( $team_member_social_icon_color ) !== '' ) ? $team_member_social_icon_color : '#b2b2b2';
        echo "<div class='social-buttons'>";
            
            foreach ($social_icons as $social_link) {
                
                if ( isset( $social_link->selected_team_icon ) && $social_link->selected_team_icon !== '' ) {

                    $social_icon_url = ( isset( $social_link->social_icon_url ) && $social_link->social_icon_url !== '' ) ? $social_link->social_icon_url : '#';
                    $social_link_title = ( isset( $social_link->social_link_title ) && $social_link->social_link_title !== '' ) ? $social_link->social_link_title : '';
                    echo "<a href='" . $social_icon_url . "' target='_blank' title='" . $social_link_title . "' class='team social-icon " . $social_link->selected_team_icon ."' style='color:" . $team_member_social_icon_color . "'></a>";
                }
            }

        echo "</div>";    
    }
    echo '</div>'; //team-member-name-wrap
}
else
{
    echo '<div class="team-member-bio-wrap ' . $id . '">';
    echo '<div class="team-member-name-wrap">';
    if ( $link_switch == 'on' ) {
        echo '<a href="'. $url .'" target="'. $target  .'">';
    }
    echo '<div class="team-member-name ult-responsive" ' . $team_member_name_responsive .' style="' . $team_member_name_font_styling . '">' . $name . '</div>';
    if ( $link_switch == 'on' ) {
        echo '</a>';
    }
    if ( $pos_in_org ) {
        echo '<div class="team-member-position ult-responsive" ' . $team_member_position_responsive . ' style="' . $team_member_position_font_styling . '">' . $pos_in_org . '</div>';
    }
    if ( $pos_in_org && $content ) {
        echo '<span class="team-member-border-bottom"></span>';
    }
    echo '</div>'; //team-member-name-wrap
    if ( $content ) {
        echo '<div class="team-member-description ult-responsive" ' . $team_member_desc_responsive . ' style="' . $team_member_description_font_styling . '"><p>' . do_shortcode( $content ) . '</p></div>';
    }
}

echo '</div>'; //team-member-bio-wrap
echo '</div>'; //team-member-wrap
echo ob_get_clean();