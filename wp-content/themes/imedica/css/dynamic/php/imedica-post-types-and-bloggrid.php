<?php
global $vars;
imedica_less_vars();
ob_start();
require_once( 'imedica-color-adjuster.php' );
$color_adjuster = new iMedica_Color_Adjuster;
?>
/*
Table OF Contents - 

1. Asides post
2. gallery post
3. Post Gallery Carousel
4. Post Like
5. grid image overlay

*/

/*Asides post*/
.single-format-aside .aside-wrap,
.blog-default-wrapper .aside-wrap {
    background-color: <?php echo $color_adjuster->lighten($vars['imedica-theme-color'], 55) ;?>;
    border-left: 12px solid <?php echo $color_adjuster->lighten( $vars['imedica-theme-color'], 1); ?>;
    display: inline-block;
    width: 100%;
    margin-bottom: 25px;
}
.blog-default-wrapper .entry-summary p,
.blog-default-wrapper .search .entry-summary p,
.blog-default-wrapper .archive .entry-summary p {
    margin: 0;
}
/*gallery post */

.imedica-slideshow-gallery .slick-prev,
.imedica-slideshow-gallery .slick-next,
.imedica-slideshow-gallery .slick-prev:hover,
.imedica-slideshow-gallery .slick-next:hover {
    background: <?php echo $vars['imedica-theme-color']; ?>;
    padding: 8px;
}
.imedica-slideshow-gallery .slick-prev:before, 
.imedica-slideshow-gallery .slick-next:before {
    font-size: 12px;
    line-height: 1em;
}

/* Post Gallery Carousel */

a.right.imedica-carousel-control {
    position: absolute;
    top: 50%;
    right: 0;
    margin-top: -20px;
    font-size: 18px;
    background: <?php echo $vars['imedica-theme-color']; ?>;
    padding: 5px 5px 2px 10px;
}
a.left.imedica-carousel-control {
    position: absolute;
    top: 50%;
    left: 0;
    margin-top: -20px;
    font-size: 18px;
    background: <?php echo $vars['imedica-theme-color']; ?>;
    padding: 5px 10px 2px 5px;
}
.imedica-carousel-control span:before {
    color: <?php echo $vars['highlight-text-color']; ?>
}
.no-results button.button.search-submit {
    background-color: <?php echo $vars['imedica-theme-color']; ?>;
    color: <?php echo $vars['highlight-text-color']; ?>;
    border-radius: 0;
    padding: 0.76em;
    font-size: 13px;
    font-family: News Cycle;
    border: 0;
    width: 15%;
    height: 10%;
    max-width: 40px;
}
.blog-default-wrapper .read-more-link a.read-more-link,
.blog-default-wrapper .search .read-more-link a.read-more-link,
.blog-default-wrapper .archive .read-more-link a.read-more-link,
.blog-default-wrapper .tag .read-more-link a.read-more-link,
.blog-medium-image-wrapper .read-more-link a.read-more-link,
.blog-medium-image-wrapper .search .read-more-link a.read-more-link,
.blog-medium-image-wrapper .archive .read-more-link a.read-more-link {
    display: inline-block;
    position: relative;
    padding-top: 15px;
    padding-right: 40px;
    margin-top: 0;
    color: <?php echo $vars['body-text-color']; ?>;
}
.blog-default-wrapper .read-more-link a.read-more-link:after,
.blog-default-wrapper .search .read-more-link a.read-more-link:after,
.blog-default-wrapper .archive .read-more-link a.read-more-link:after,
.blog-medium-image-wrapper .read-more-link a.read-more-link:after,
.blog-medium-image-wrapper .search .read-more-link a.read-more-link:after,
.blog-medium-image-wrapper .archive .read-more-link a.read-more-link:after {
    content: '';
    position: absolute;
    width: 100%;
    height: 3px;
    top: 0;
    left: 0;
    background: <?php echo $vars['imedica-theme-color']; ?>;
}
article.sticky,
.category-sticky {
    padding-bottom: 15px;
    background: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'],0.020); ?>;
    display: inline-block;
    padding: 30px 20px;
    margin-bottom: 35px;
}
#page article.sticky {
    border: 2px solid <?php echo $color_adjuster->lighten( $vars['imedica-theme-color'], 31); ?>;
}
/*Post Like*/

.post-like {
    color: <?php echo $vars['imedica-theme-color']; ?>;
}
@media (max-width: 768px) {
    span.next-prev-text {
        display: none;
    }
}
/*grid image overlay*/

.post-thumb {
    position: relative;
    text-align: left;
}
.img-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 0.6); ?>;
    opacity: 0;
    transition: all 0.2s linear;
}
.blog .post-thumb a:hover:after {
    content:'';
    background: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 0.6); ?>;
    left: 0;
    transition: all 0.2s linear;
}
.blog .post-thumb a:after {
    content:'';
    position: absolute;
    width: 100%;
    height: 100%;
    background: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 0); ?>;
    left: 0;
    transition: all 0.2s linear;
}
.format-video .post-thumb a:after,
.format-video .post-thumb a:hover:after,
.format-gallery .post-thumb a:after,
.format-gallery .post-thumb a:hover:after,
.format-gallery .post-thumb a:after,
.format-gallery .post-thumb a:hover:after {
    content: none;
}
.imd-404-block {
    display: inline-block;
    color: <?php echo $vars['imedica-theme-color']; ?>;
    font-size: 400px;
    position: relative;
    font-size: 32vw;
}
.imd-404-block p {
    margin: 0;
    position: absolute;
    font-size: 101px;
    color: white;
    top: 55%;
    left: 50%;
    font-family: <?php echo $vars['heading-font-family']; ?>;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    font-size: 9vw;
    font-weight: bold;
}
.blog-default-wrapper article,
.blog-default-wrapper .search article,
.blog-default-wrapper .archive article {
    margin: 0;
    padding: 0;
    margin-bottom: 55px;
    float: left;
    width: 100%;
}

<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;