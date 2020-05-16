<?php
global $vars;
imedica_less_vars();
ob_start();
require_once( 'imedica-color-adjuster.php' );
$color_adjuster = new iMedica_Color_Adjuster;
?>
/*

Table Of contents - 

1. Header Layout 2
2. Default navbar
3. top contact info
4. Sticky Header

*/

/*Header Layout 2*/

.header-search.header2-search fieldset {
  width: 100%;
  float: right;
  margin-top: 30px;
}

.header-search.header2-search fieldset input.imd-search {
  line-height: 2.4em;
  width: 80%;
  float: left;
  padding: 0;
  padding-left: 5px;
}

.header-search.header2-search fieldset .button.search-submit {
  float: left;
}

.header-search span.text {
  width: 25%;
  display: inline-block;
  height: auto;
}

.header-search .search span.text input.imd-search {
  line-height: 18px;
  margin: 0;
  padding-bottom: 9px;
  width: 100%;
  vertical-align: top;
}

.header-logo-center .site-title {
  text-align: center;
  width: 100%;
  margin-top: 30px;
  margin-bottom: 30px;
}

.site-logo-img {
    display: inline-block;
}

.header-main .site-title {
  width: 100%;
  margin-left: 0px;
}

.site-heading {
  padding: 20px 0;
}

.header-search button.search-submit {
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  color: #FFF;
  border-radius: 0;
  padding: 0.6em;
  font-size: 13px;
  font-family: News Cycle;
  border: 0;
  margin-left: -4px;
  float: none;
  width: 35px;
  height: 35px;
  line-height: 20px;
  vertical-align: top;
}

.imd-contact-info-wrap {
  width: auto;
  height: auto;
  text-align: center;
}

/*Default navbar*/
.navbar-default p {
  color: <?php echo $vars['top-header-color']; ?>;
}

.navbar-default {
  background-color: <?php echo $color_adjuster->imd_Hex2RGBA($vars['top-header-bg-color'], $vars['top-header-bg-alpha']); ?>;
  border-color: <?php echo $color_adjuster->darken($vars['top-header-bg-color'], 6); ?>;
}

/*top contact info*/
.navbar-static-top .imd-contact-info-wrap a.top-contact-info {
  color: <?php echo $vars['top-header-color']; ?>;
}

.navbar-static-top .imd-contact-info-wrap a.top-contact-info:hover {
  color: <?php echo $vars['top-header-link-hover-color']; ?>;
}

/*top custom html*/
.navbar-static-top .top-custom-html * {
  color: <?php echo $vars['top-header-color']; ?>;
}

.navbar-static-top .top-custom-html a:hover {
  color: <?php echo $vars['top-header-link-hover-color']; ?>;
}

.imedica-page-header {
  background-color: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['title_color_bg'], $vars['title_color_bg_alpha']); ?>;
  background-image: <?php echo $vars['title_bg_img']; ?>;
  background-size: <?php echo $vars['imedica_header_bg_size']; ?>;
  background-repeat: <?php echo $vars['imedica_header_bg_repeat']; ?>;
  background-position: <?php echo $vars['imedica_header_bg_pos']; ?>;
  padding-top: <?php echo $vars['page-header-padding-top']; ?>;
  padding-bottom: <?php echo $vars['page-header-padding-bottom']; ?>;
  word-wrap: break-word;
  -ms-word-wrap: break-word;
  border-bottom: 1px solid <?php echo $color_adjuster->darken( $vars['main-header-bg-color'], 6); ?>;
}

.imedica-title > .imedica-breadcrumb-title .breadcrumb-heading {
  font-family: <?php echo $vars['title_text_font_family']; ?>;
  font-size: <?php echo $vars['title_text_font_size']; ?>;
  color: <?php echo $vars['title_text_color']; ?>;
  font-weight: <?php echo $vars['title_text_font_weight']; ?>;
  margin: 0;
}

.theme-showcase .page-title-overlay {
  background-color: <?php echo $vars['imedica-pageheader-overlay']; ?>;
  opacity: <?php echo $vars['imedica-pageheader-overlay_alpha']; ?>;
}

.breadcrumbs {
  position: relative;
}

.imedica-breadcrumb .breadcrumbs {
  color: <?php echo $vars['breadcrumb_color']; ?>;
  font-family: <?php echo $vars['breadcrumb_font_family']; ?>;
  font-size: <?php echo $vars['breadcrumb_font_size']; ?>;
  font-weight: <?php echo $vars['breadcrumb_font_weight']; ?>;
}

.imedica-breadcrumb .breadcrumbs a {
  color: <?php echo $vars['breadcrumb_color']; ?>;
}

.imedica-breadcrumb .breadcrumbs a.fa {
  font-family: FontAwesome;
}

.imedica-breadcrumb .breadcrumbs a:hover {
  color: <?php echo $vars['breadcrumb_hover_color']; ?>;
  text-decoration: none;
}

.breadcrumbs .separator {
  color: <?php echo $color_adjuster->lighten( $vars['breadcrumb_color'], 30); ?>;
  padding-left: 5px;
  padding-right: 5px;
}

.navbar .imedica-row .container .imd-contact-info-wrap,
.navbar .imedica-row .container .primary-navigation,
.navbar .imedica-row .container .imd-top-social {
  padding: 0;
}

.row.navbar-inverse1.header-default,
.header-layout1 .header-main,
.row.navbar-inverse1.navbar-fixed-top1.header-layout2 {
  background-color: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['main-header-bg-color'], $vars['main-header-bg-alpha'] ); ?>;
}

~media screen and (min-width: 783px) {
  .row.navbar-inverse1.header-default {
    margin: 0;
    margin-left: -15px;
    margin-right: -15px;
    padding-left: 15px;
    padding-right: 15px;
    border-bottom: 1px solid <?php echo $color_adjuster->darken( $vars['main-header-bg-color'], 6); ?>;
  }
}

.imedica_sticky_header .navbar-inverse.header-fixed .site-title {
  padding: 5px 0;
  display: inline-block;
}

<?php if ( $vars['sticky-width-box'] == true && $vars['imedica_layout'] == 'container' ): ?>
  .navbar-inverse {
    <?php
      $box_width    = isset( $imedica_opts["imedica-box-width"] ) ? $imedica_opts["imedica-box-width"] . 'px' : '';
    ?>
    width: <?php echo $box_width; ?>;
    margin: 0 auto;
  }
<?php endif ?>


<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;
