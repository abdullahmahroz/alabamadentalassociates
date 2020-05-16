<?php
$image    = $name = $position = $company = $el_class = '';
$addclass = '';
extract( shortcode_atts( array(
    "image"      => "",
    "name"       => "",
    "position"   => "",
    "company"    => "",
    "el_class"   => "",
    "icon"       => "",
    "icon_color" => "",
    "icon_size"  => "",
), $atts ) );

global $img_style, $auth_name_font_styling, $testimonial_desc_font_styling, $author_bio_font_styling, $layout_style, $testimonial_layout_style, $testimonial_spacer, $testimonial_spacer_styling, $css_wrapper;
$img = apply_filters('ult_get_img_single', $image, 'url');
$alt = apply_filters('ult_get_img_single', $image, 'alt');
if ( $layout_style == '' || $layout_style == 'layout1' || $layout_style == 'layout2' ) {
    $layout_class = 'horizontal_layout';
} elseif ( $layout_style == 'layout3' || $layout_style == 'layout4' ) {
    $layout_class = 'vertical_layout';
}
if ( $layout_style == 'layout1' ) {
    $addclass .= "left-wrap";
}
elseif ( $layout_style == 'layout2' ) {
    $addclass .= "right-wrap";
}

$output = '';
$output .= '<div class="ult-testiblock-wrap ' . esc_attr( $layout_class ) . ' ' . esc_attr( $el_class ) . ' ' . esc_attr( $addclass ) . ' '. esc_attr( $css_wrapper ) .'">';
if ( $layout_style == "layout1" || $layout_style == '' ) { 
    
    if( $testimonial_layout_style == "style2") {
        $output .= '<div class="ult-testiblock-authinfo style2 col-xs-12 col-sm-2 col-md-2">';
        if ( $img ) {
            $output .= '<div class="ult-testiblock-auth-avatar">
                <img src="' . esc_url( $img ) . '" alt="'.$alt.'"  style="' . esc_attr( $img_style ) . '">
                </div>';
        }
        $output .= '</div>'; //ult-testiblock-authinfo
        $content = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, true ) : '';
        $output .= '<div class="ult-testiblock-testimonial-content style2 col-xs-12 col-sm-10 col-md-10"><div style="' . esc_attr( $testimonial_desc_font_styling ) . '">' . do_shortcode( $content ) .'</div>';
        
        if ( $testimonial_spacer == "line_only" ) {
            $output .= '<span class="ult-testiblock-divider" style="'. $testimonial_spacer_styling .'" ></span>';    
        }
        elseif ( $testimonial_spacer == "image_only" ) {
            $output .= $testimonial_spacer_styling;    
        }
        
        $output .= '<div class="ult-testiblock-auth-name" style="' . $auth_name_font_styling . '">' . esc_html( $name ) . '</div>';
        $output .= '<div class="ult-testiblock-auth-social" style="' . $author_bio_font_styling . '">
                <span class="ult-testiblock-position">' . $position . '</span>
                <span class="ult-testiblock-company">' . $company . '</span>
                <span class="ult-testiblock-company test_icon"><i style="color: ' . esc_attr( $icon_color ) . '; font-size: ' . esc_attr( $icon_size ) . 'px;" class="' . esc_attr( $icon ) . '"></i></span>
            </div>';
        $output .= '</div>';
    }
    else {
        $output .= '<div class="ult-testiblock-authinfo style1 col-xs-12 col-sm-3 col-md-3">';
        if ( $img ) {
            $output .= '<div class="ult-testiblock-auth-avatar">
                <img src="' . esc_url( $img ) . '" alt="'.$alt.'"  style="' . esc_attr( $img_style ) . '">
                </div>';
        }
        $output .= '<div class="ult-testiblock-auth-name" style="' . $auth_name_font_styling . '">' . esc_html( $name ) . '</div>';
        $output .= '<div class="ult-testiblock-auth-social" style="' . $author_bio_font_styling . '">
                <span class="ult-testiblock-position">' . $position . '</span>
                <span class="ult-testiblock-company">' . $company . '</span>
                <span class="ult-testiblock-company test_icon"><i style="color: ' . esc_attr( $icon_color ) . '; font-size: ' . esc_attr( $icon_size ) . 'px;" class="' . esc_attr( $icon ) . '"></i></span>
            </div>';
        $output .= '</div>'; //ult-testiblock-authinfo
        $content = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, true ) : '';
        $output .= '<div class="ult-testiblock-testimonial-content style1 col-xs-12 col-sm-9 col-md-9" style="' . esc_attr( $testimonial_desc_font_styling ) . '">' . do_shortcode( $content ) . '
        </div>';
    }
} elseif ( $layout_style == "layout2" ) {

    if( $testimonial_layout_style == "style2") {

        $content = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, true ) : '';
        $output .= '<div class="ult-testiblock-testimonial-content style2 col-xs-12 col-sm-10 col-md-10"><div style="' . esc_attr( $testimonial_desc_font_styling ) . '">' . do_shortcode( $content ) . '</div>'; 
        
        if ( $testimonial_spacer == "line_only" ) {
            $output .= '<span class="ult-testiblock-divider" style="'. $testimonial_spacer_styling .'" ></span>';    
        }
        elseif ( $testimonial_spacer == "image_only" ) {
            $output .= $testimonial_spacer_styling;    
        }
        
        $output .= '<div class="ult-testiblock-auth-name" style="' . esc_attr( $auth_name_font_styling ) . '">' . esc_html( $name ) . '</div>';
        $output .= '<div class="ult-testiblock-auth-social" style="' . esc_attr( $author_bio_font_styling ) . '">
                <span class="ult-testiblock-position">' . $position . '</span>
                <span class="ult-testiblock-company">' . $company . '</span>
                <span class="ult-testiblock-company test_icon"><i style="color: ' . esc_attr( $icon_color ) . '; font-size: ' . esc_attr( $icon_size ) . 'px;" class="' . esc_attr( $icon ) . '"></i></span>
            </div>';
        $output .= '</div>';
        $output .= '<div class="ult-testiblock-authinfo style2 col-xs-12 col-sm-2 col-md-2">';
        if ( $img ) {
            $output .= '<div class="ult-testiblock-auth-avatar imd-right">
                <img src="' . esc_url( $img ) . '" alt="'.$alt.'" style="' . esc_attr( $img_style ) . '">
                </div>';
        }
        $output .= '</div>'; //ult-testiblock-authinfo
    }
    else {
        $content = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, true ) : '';
        $output .= '<div class="ult-testiblock-testimonial-content style1 col-xs-12 col-sm-9 col-md-9" style="' . esc_attr( $testimonial_desc_font_styling ) . '">' . do_shortcode( $content ) . '
        </div>';
        $output .= '<div class="ult-testiblock-authinfo style1 col-xs-12 col-sm-3 col-md-3">';
        if ( $img ) {
            $output .= '<div class="ult-testiblock-auth-avatar">
                <img src="' . esc_url( $img ) . '" alt="'.$alt.'" style="' . esc_attr( $img_style ) . '">
                </div>';
        }
        $output .= '<div class="ult-testiblock-auth-name" style="' . esc_attr( $auth_name_font_styling ) . '">' . esc_html( $name ) . '</div>';
        $output .= '<div class="ult-testiblock-auth-social" style="' . esc_attr( $author_bio_font_styling ) . '">
                <span class="ult-testiblock-position">' . $position . '</span>
                <span class="ult-testiblock-company">' . $company . '</span>
                <span class="ult-testiblock-company test_icon"><i style="color: ' . esc_attr( $icon_color ) . '; font-size: ' . esc_attr( $icon_size ) . 'px;" class="' . esc_attr( $icon ) . '"></i></span>
            </div>';
        $output .= '</div>'; //ult-testiblock-authinfo
    }
} elseif ( $layout_style == "layout3" ) {
    $content = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, true ) : '';
    $output .= '<div class="ult-testiblock-testimonial-content " style="' . esc_attr( $testimonial_desc_font_styling ) . '">' . do_shortcode( $content ) . '
    </div>';
    $output .= '<div class="ult-testiblock-authinfo">';
    if ( $img ) {
        $output .= '<div class="ult-testiblock-auth-avatar">
            <img src="' . esc_url( $img ) . '" alt="'.$alt.'" style="' . esc_attr( $img_style ) . '">
            </div>';
    }
    $output .= '<div class="ult-testiblock-auth-name" style="' . esc_attr( $auth_name_font_styling ) . '">' . esc_html( $name ) . '</div>';
    $output .= '<div class="ult-testiblock-auth-social" style="' . esc_attr( $author_bio_font_styling ) . '">
            <span class="ult-testiblock-position">' . esc_html( $position ) . '</span>
            <span class="ult-testiblock-company">' . esc_html( $company ) . '</span>
            <span class="ult-testiblock-company test_icon"><i style="color: ' . esc_attr( $icon_color ) . '; font-size: ' . esc_attr( $icon_size ) . 'px;" class="' . esc_attr( $icon ) . '"></i></span>
        </div>';
    $output .= '</div>'; //ult-testiblock-authinfo
} elseif ( $layout_style == "layout4" ) {
    $content = function_exists( 'wpb_js_remove_wpautop' ) ? wpb_js_remove_wpautop( $content, true ) : '';
    $output .= '<div class="ult-testiblock-authinfo">';
    if ( $img ) {
        $output .= '<div class="ult-testiblock-auth-avatar">
            <img src="' . esc_url( $img ) . '" alt="'.$alt.'"  style="' . esc_attr( $img_style ) . '">
            </div>';
    }
    $output .= '<div class="ult-testiblock-auth-name" style="' . esc_attr( $auth_name_font_styling ) . '">' . esc_html( $name ) . '</div>';
    $output .= '<div class="ult-testiblock-auth-social" style="' . esc_attr( $author_bio_font_styling ) . '">
            <span class="ult-testiblock-position">' . $position . '</span>
            <span class="ult-testiblock-company">' . $company . '</span>
            <span class="ult-testiblock-company test_icon"><i style="color: ' . esc_attr( $icon_color ) . '; font-size: ' . esc_attr( $icon_size ) . 'px;" class="' . esc_attr( $icon ) . '"></i></span>
        </div>';
    $output .= '</div>'; //ult-testiblock-authinfo			
    $output .= '<div class="ult-testiblock-testimonial-content" style="' . esc_attr( $testimonial_desc_font_styling ) . '">' . do_shortcode( $content ) . '
    </div>';
}
$output .= '</div>'; //ult-testiblock-wrap
echo $output;