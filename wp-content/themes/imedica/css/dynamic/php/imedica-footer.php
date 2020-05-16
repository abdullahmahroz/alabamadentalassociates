<?php
global $vars;
imedica_less_vars();
ob_start();
require_once( 'imedica-color-adjuster.php' );
$color_adjuster = new iMedica_Color_Adjuster;
?>
/*
Table Of Contents - 

1. Footer Area
  1.1 - Main Footer
  1.2 - Small Footer
  1.3 - Footer Menu
2. Page as a Footer
*/

/* Variables
<?php echo $vars['footer-background-color-alpha']; ?>
<?php echo $vars['footer-background-small-alpha']; ?>
*/

/* Main Footer */
.site-footer {
  bottom: 0px;
  width: 100%;
}

.footerpadding {
  display: block;
  width: <?php echo $vars['footer-sep-width']; ?>;
  border-top-width: <?php echo $vars['footer-seperator-top']; ?>;
  border-top-style: <?php echo $vars['footer-seperator-style']; ?>;
  border-top-color: <?php echo $vars['footer-seperator-color']; ?>;
  margin-left: <?php echo $vars['footer-sep-margin-left']; ?>;
  margin-right: <?php echo $vars['footer-sep-margin-right']; ?>;
}

.imedica-footer-area {
  color: <?php echo $vars['footer-color-main']; ?>;
  background: <?php echo $vars['footer-background-color-main']; ?>;
  background: <?php echo $color_adjuster->imd_Hex2RGBA($vars['footer-background-color-main'], $vars['footer-background-color-alpha']); ?>;
}

.imedica-footer-area a {
  color: <?php echo $vars['footer-color-main']; ?>;
  display: block;
}

.imedica-footer-area a:hover {
  color: <?php echo $vars['footer-color-hover']; ?>;
}

/* Small Footer */
.site-info-bar {
  line-height: 1.8em;
  height: auto;
  background: <?php echo $vars['footer-background-color-small']; ?>;
  background: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['footer-background-color-small'], $vars['footer-background-small-alpha']); ?>;
  color: <?php echo $vars['footer-color-small']; ?>;
}

.site-info-bar a {
  color: <?php echo $vars['footer-color-small']; ?>;
}

.site-info-bar a:hover {
  color: <?php echo $vars['footer-color-hover']; ?>;
}

.footer-siteinfo-wrapper .container-fluid,
.imedica-footer-area .container {
  padding: 20px 0px;
}

.imd-box-layout .imedica-footer-area .container {
    padding: 0 15px;
}

.footer-siteinfo-wrapper {
  padding: 15px 0;
  padding-top: 0;
}

.small-footer-seperator {
  display: block;
  width: <?php echo $vars['small-footer-sep-width']; ?>;
  margin: 0 auto;
  border-top-color: <?php echo $vars['small-footer-seperator-color']; ?>;
  border-top-width: <?php echo $vars['small-footer-seperator-top']; ?>;
  border-top-style: <?php echo $vars['small-footer-seperator-style']; ?>;
  padding-bottom: 15px;
  margin-left: <?php echo $vars['small-footer-sep-margin-left']; ?>;
  margin-right: <?php echo $vars['small-footer-sep-margin-right']; ?>;
}

/* Footer Menu */
.footer-primary-navigation ul.nav-menu {
  display: block;
  margin-left: 0;
}

.footer-primary-navigation ul.nav-menu li {
  display: inline-block;
  padding: 0 1px;
}

.footer-primary-navigation ul.nav-menu li a,
.site-info {
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  font-family: <?php echo $vars['body-text-font']; ?>;
  line-height: <?php echo $vars['body-text-line-height']; ?>;
  font-weight: normal;
  font-weight: <?php echo $vars['body-text-font-weight']; ?>;
  color: <?php echo $vars['footer-color-small']; ?>;
}

.footer-primary-navigation ul.nav-menu li a {
  padding: 0 10px;
}

footer ul.nav-menu li a:hover,
footer ul.nav-menu li a {
  color: inherit;
}

footer ul.nav-menu li a:hover {
  color: <?php echo $vars['footer-color-hover']; ?>
}

.imedica-footer-area .recent-post-title span {
  color: inherit;
}

.footer-primary-navigation {
  /* text-align: right; */
}

/* Custom CSS for New small footer options */
ul.footer-social-link {
    list-style: none;
    display: block;
    margin: 0;
    padding: 0;
    width: 100%;
    line-height: 1em;
}

ul.footer-social-link li {
    display: inline-block;
    vertical-align: middle;
}

a.footer-social-icon {
    line-height: 1.5em;
    font-size: 16px;
    padding: 0 9px;
    color: <?php echo $vars['footer-color-small']; ?>;
}

.imd-footer {
  padding-right: 15px;
  margin: 15px 0;
  padding-left: 0
}

/* Common */

.no-pad {
  padding: 0;
}

.no-margin {
  margin: 0;
}

.small-footer-left,
.small-footer-right {
    padding: 0;
}

.small-footer-left {
  text-align:left
}

.small-footer-right {
  text-align:right
}

@media screen and (max-width: 783px) {
  .imedica-footer-area .site-info-bar .col-xs-12 {
    text-align: center;
    margin: 7px 0;
    padding: 0;
  }

  .footer-primary-navigation {
    text-align: center;
  }

  .col-lg-3.imd-footer:nth-child(3) {
      clear: both;
  }
}

@media screen and (max-width: 992px) {
  .site-info,
  .imd-footer-menu-wrap ul.nav-menu,
  .small-footer-left,
  .small-footer-right {
    text-align: center;
    margin: 10px 0;
  }
}

.imedica-footer-area .container.imedica-container aside {
  margin: 0;
}

.imedica-footer-area {
  padding-top: <?php echo $vars['footer-spacing-top']; ?>;
  padding-bottom: <?php echo $vars['footer-spacing-bottom']; ?>;
}


/* Page as a footer */
.single .site-footer .entry-content {
    margin-bottom: 0;
}
<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;