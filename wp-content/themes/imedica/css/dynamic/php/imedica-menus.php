<?php
global $vars;
imedica_less_vars();
ob_start();
require_once( 'imedica-color-adjuster.php' );
$color_adjuster = new iMedica_Color_Adjuster;
?>
/* Table Of Contents - 

1. Main Menu
  1.1 - main menu first level settings
  1.2 - sub menu settings
  1.3 - Mega Menu Column Heading typography
  1.4 - top header styling for mobile

*/

.main-navigation .current_page_item > a,
.main-navigation .current-menu-item > a,
.main-navigation .current_page_ancestor > a {
}

@media screen and (max-width: 600px) {
  .menu-toggle,
  .main-navigation.toggled .nav-menu {
    display: block;
  }

  .main-navigation ul {
    display: none;
  }
}

.site-navigation .current_page_item > a,
.site-navigation .current_page_ancestor > a,
.site-navigation .current-menu-item > a,
.site-navigation .current-menu-ancestor > a {
  color: <?php echo $vars['imd-menu-parent-hover-fontColor']; ?>;
}

#primary-navigation.toggled-on ul.nav-menu li.current_page_ancestor,
#primary-navigation.toggled-on ul.nav-menu li.current-menu-ancestor {
  background: inherit;
}

#primary-navigation ul.nav-menu li.current_page_item > a:after,
#primary-navigation ul.nav-menu li.current_page_ancestor > a:after,
#primary-navigation ul.nav-menu li.current-menu-item > a:after,
#primary-navigation ul.nav-menu li.current-menu-ancestor > a:after {
  content: '';
  width: 100%;
  background: <?php echo $vars['imd-menu-parent-borderColor']; ?>;
  height: 2px;
  position: absolute;
  top: 0;
  left: 0px;
}

.primary-navigation.site-navigation {
  background-color: <?php echo $color_adjuster->imd_Hex2RGBA($vars['imd-menu-parent-bkColor'],$vars['imd-menu-parent-bkColor-alpha']); ?>;
}

.navbar-inverse.navbar-fixed-top.header-default.header-fixed .primary-navigation.site-navigation {
  background-color: transparent;
}

.header-default.header-fixed .site-title {
  width: auto;
  line-height: 70px;
}

/* MainMenu Hover Animation*/

#primary-navigation ul.nav-menu li:hover > a:after {
  width: 100%;
  left: 0px;
}

.primary-navigation ul.nav-menu > li.current-menu-item,
.primary-navigation ul.nav-menu > li.current-menu-ancestor {
  background: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imd-menu-parent-hover-bkColor'], $vars['imd-menu-parent-hover-bkColor-alpha']); ?>;
}


#primary-navigation ul > li:hover:not(.mega-menu-col) {
  background: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imd-menu-parent-hover-bkColor'], $vars['imd-menu-parent-hover-bkColor-alpha']); ?>;
}

#primary-navigation ul>li:hover a {
    color: <?php echo $vars['imd-menu-parent-hover-fontColor']; ?>;
}

ul.nav-menu ul.sub-menu.mega-menu-row li ul.sub-menu a {
  width: 100%;
  line-height: 2.5em;
}

ul.nav-menu li.menu-item ul.sub-menu.mega-menu-row li a {
  width: 100%;
  padding-right: 0;
}

ul.sub-menu .current-menu-item.current_page_item,
ul.sub-menu .current-menu-ancestor {
  border-top: none;
}

/* main menu first level settings*/

ul.nav-menu li a {
  color: <?php echo $vars['imd-menu-parent-fontColor']; ?>;
  font-size: <?php echo $vars['imd-menu-parent-fontsize']; ?>;
  font-family: <?php echo $vars['imd-menu-parent-font']; ?>;
  font-weight: <?php echo $vars['imd-menu-parent-fontweight']; ?>;
}

ul.nav-menu li a:hover {
  /*main menu hover*/

  color: <?php echo $vars['imd-menu-parent-hover-fontColor']; ?>;
}

/*sub menu settings*/

#primary-navigation.site-navigation ul li > ul.sub-menu {
  background: <?php echo $vars['imd-menu-submenu-bkColor']; ?>;
}

.site-header-main #primary-navigation ul li ul.sub-menu li a {
  /*sub menu */

  color: <?php echo $vars['imd-menu-submenu-fontColor']; ?>;
  font-size: <?php echo $vars['imd-menu-submenu-fontsize']; ?>;
  font-family: <?php echo $vars['imd-menu-submenu-font']; ?>;
  line-height: <?php echo $vars['imd-menu-submenu-lineheight']; ?>;
  font-weight: <?php echo $vars['imd-menu-submenu-fontweight']; ?>;
}

.site-header-main #primary-navigation ul.nav-menu ul.sub-menu li a:hover,
#primary-navigation.site-navigation ul li>ul.sub-menu li:hover > a,
.site-header-main #primary-navigation ul li ul.sub-menu .current-menu-item a {
  color: <?php echo $vars['imd-menu-submenu-hover-fontColor']; ?>;
}

ul.sub-menu.mega-menu-row,
.primary-navigation ul ul {
  background: <?php echo $vars['imd-menu-submenu-bkColor']; ?>;
}

ul.nav-menu li.menu-item ul.sub-menu li {
  border-bottom: 1px solid <?php echo $vars['imd-semu-submenu-border-color']; ?>;
  /*border-bottom in sub menu*/

  border-bottom: none;
  padding-right: 0;
}

ul.nav-menu li.menu-item ul.sub-menu li:last-child {
  border-bottom: none;
}

ul.nav-menu li.menu-item ul.sub-menu.mega-menu-row li {
  border-bottom: none;
  /*remove border in mega menu*/
}

/* Primary Navigation */

.primary-navigation {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

#primary-navigation ul.nav-menu li a:after {
  content: '';
  width: 0px;
  background: <?php echo $vars['imd-menu-parent-borderColor']; ?>;
  height: 2px;
  position: absolute;
  top: 0;
  left: 50%;
  -webkit-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
}

.navbar-static-top ul.nav-menu li a {
  color: <?php echo $vars['top-header-color']; ?>;
  line-height: <?php echo $vars['body-text-line-height']; ?>;
  padding: 11px 5px;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
}

.navbar-static-top ul.nav-menu li a:hover {
  color: <?php echo $vars['top-header-link-hover-color']; ?>;
}

.navbar-static-top ul.nav-menu ul.sub-menu > li a {
  color: <?php echo $vars['imd-menu-submenu-fontColor']; ?>;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  font-family: <?php echo $vars['body-text-font']; ?>;
  line-height: <?php echo $vars['body-text-line-height']; ?>;
  padding: 8px 20px;
  font-weight: 400;
}

.navbar-static-top ul.nav-menu ul.sub-menu > li:hover {
  background-color: <?php echo $vars['imd-menu-submenu-hover-bkColor']; ?>;
}

/*Pages Callback - before assigning wordpress menu.*/

.nav-menu ul li > ul.children {
  visibility: hidden;
  margin-top: 20px;
  border-top: 2px solid <?php echo $vars['imd-menu-parent-borderColor']; ?>;
  box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
  opacity: 0;
}

.nav-menu ul li.current_page_item a:after {
  content: '';
  width: 100%;
  background: <?php echo $vars['imd-menu-parent-borderColor']; ?>;
  height: 2px;
  position: absolute;
  top: 0;
  left: 0;
}

.nav-menu ul li a:after,
.nav-menu ul li.page_item_has_children a:after {
  content: '';
  width: 0;
  background: <?php echo $vars['imd-menu-parent-borderColor']; ?>;
  height: 2px;
  position: absolute;
  top: 0;
  left: 50%;
  -webkit-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
}

/*menu options */

.nav-menu ul li a {
  /*/ main menu level 1*/

  font-family: <?php echo $vars['imd-menu-parent-font']; ?>;
  font-size: <?php echo $vars['imd-menu-parent-fontsize']; ?>;
  color: <?php echo $vars['imd-menu-parent-fontColor']; ?>;
}

.nav-menu ul li:hover > a {
  /*main menu level 1 hover*/

  color: <?php echo $vars['imd-menu-parent-hover-fontColor']; ?>;
}

/*sub menu*/

.nav-menu ul ul.children li a {
  padding: 10px 10px;
  font-family: <?php echo $vars['imd-menu-submenu-font']; ?>;
  font-size: <?php echo $vars['imd-menu-submenu-fontsize']; ?>;
  line-height: <?php echo $vars['imd-menu-submenu-lineheight']; ?>;
  color: <?php echo $vars['imd-menu-submenu-fontColor']; ?>;
  background-color: <?php echo $vars['imd-menu-submenu-bkColor']; ?>;
  border-top: 1px solid <?php echo $vars['imd-semu-submenu-border-color']; ?>;
}

.nav-menu ul ul.children li:hover > a {
  color: <?php echo $vars['imd-menu-submenu-hover-fontColor']; ?>;
  background-color: <?php echo $vars['imd-menu-submenu-hover-bkColor']; ?> ;
}

.nav-menu ul ul.children li:first-child {
  border-radius: 0;
}

a.top-social-icon {
  line-height: 1.5em;
  font-size: 19px;
  padding: 0 9px;
  color: <?php echo $vars['top-header-color']; ?>;
}

a.top-social-icon:hover {
  color: <?php echo $vars['top-header-link-hover-color']; ?>;
}

@media screen and (min-width: 783px) {
  .primary-navigation ul ul p {
    padding: 8px 20px;
    white-space: normal;
    min-width: <?php echo $vars['imedica-submenu-width']; ?>;
    padding-top: 0;
    color: <?php echo $vars['imd-menu-submenu-fontColor']; ?>;
    font-style: italic;
    margin-bottom: 0;
  }

  .primary-navigation ul ul a {
    padding: 8px 20px;
    white-space: normal;
    min-width: <?php echo $vars['imedica-submenu-width']; ?>;
  }

  ul.nav-menu li > ul.sub-menu {
    margin-top: 20px;
    visibility: hidden;
    opacity: 0;
    border-top: 2px solid <?php echo $vars['imd-menu-parent-borderColor']; ?>;
    box-shadow: 0px 1px 7px rgba(129, 129, 129, 0.1);
  }

  .primary-navigation .mega-menu {
    opacity: 0;
    visibility: hidden;
    overflow: hidden;
    position: absolute;
    background: <?php echo $vars['imd-menu-submenu-bkColor']; ?>;
    border-top: 2px solid <?php echo $vars['imd-menu-parent-borderColor']; ?>;
    z-index: 999;
    box-shadow: 0px 1px 7px rgba(129, 129, 129, 0.1);
    -webkit-transition-property: opacity, visibility, margin;
    transition-property: opacity, visibility, margin;
    -webkit-transition-timing-function: ease-in-out;
    transition-timing-function: ease-in-out;
    -webkit-transition-duration: 0.2s;
    transition-duration: 0.2s;
    margin-top: 20px;
  }

  /* column */
  .primary-navigation .mega-menu-col {
    display: table-cell;
    width: 1px;
    padding: 0 30px;
    border-left: 1px solid <?php echo $vars['imd-semu-submenu-border-color']; ?>;
    /* overrides from settings / styling / mega-menu */
  }

  .primary-navigation .mega-menu-col:first-child {
    border-left: none;
  }

  .site-header-main #primary-navigation div.mega-menu ul li.mega-menu-col > a {
    font-weight: <?php echo $vars['imd-menu-parent-fontweight']; ?>;
    margin-bottom: 15px;
  }

  .primary-navigation .mega-menu-col > a:before {
    top: 2px;
  }
  #primary-navigation.site-navigation ul li > ul.sub-menu li:hover,
	#primary-navigation.site-navigation ul li ul.sub-menu.mega-menu-row li.current-menu-item,
	ul.sub-menu li.current-menu-item {
	  background: <?php echo $vars['imd-menu-submenu-hover-bkColor']; ?>;
	}

  ul.mega-menu-row ul.sub-menu li a:hover {
    background: <?php echo $vars['imd-menu-submenu-hover-bkColor']; ?>;
  }

  .header-layout2.primary-navigation {
    float: none;
    border-top: 1px solid <?php echo $color_adjuster->darken($vars['imd-menu-parent-bkColor'], 6); ?>;
    border-bottom: 1px solid <?php echo $color_adjuster->darken( $vars['imd-menu-parent-bkColor'], 6); ?>;
    padding-top: 0;
  }

  /*Search in default menu*/
  .menu-search-default-head a {
    padding: 0 15px;
    color: <?php echo $vars['imd-menu-parent-fontColor']; ?>;
  }

  .menu-search-default-head a:hover {
    color: <?php echo $vars['imd-menu-parent-hover-fontColor']; ?>;
  }
    .row.site-navigation.primary-navigation.header-layout1 {
      border-top: 1px solid <?php echo $color_adjuster->darken( $vars['imd-menu-parent-bkColor'], 6); ?>;
      border-bottom: 1px solid <?php echo $color_adjuster->darken( $vars['imd-menu-parent-bkColor'], 6); ?>;
  }

    .header-layout2 .header-logo-left,
    .header-layout2 .header-search {
        padding: 20px 0;
    }
}

.header-default .site-navigation .nav-menu {
  text-align: left;
  float: right;
}

/* Mega Menu Column Heading typography */

.site-header-main #primary-navigation ul.sub-menu.mega-menu-row > li.mega-menu-col > a  {
  color: <?php echo $vars['imd-mega-menu-col-title-color']; ?>;
  font-weight: <?php echo $vars['imd-mega-menu-col-title-fontWeight']; ?>;
  font-size: <?php echo $vars['imd-mega-menu-col-title-fontSize']; ?>;
  font-family: <?php echo $vars['imd-mega-menu-col-title-font']; ?>;
  line-height: <?php echo $vars['imd-mega-menu-col-title-lineheight']; ?>;
}

/* top header styling for mobile */

@media screen and (max-width: 767px) {
  .imedica-page-header .col-xs-12 {
    text-align: center;
    margin: 3px 0;
  }

  .header-default .site-heading {
    width: 40%;
  }

  .imd-full-layout .imedica-title {
    padding-left: 0;
  }

  .imd-full-layout .imedica-breadcrumb {
    padding-right: 0;
  }

  .row.site-navigation.primary-navigation.header-layout1 {
    padding-top: 0;
  }
}

@media screen and (max-width: 782px) {
  /*remove main menu hover animations on mobile */
  #primary-navigation ul.nav-menu li.current_page_item > a:after,
  #primary-navigation ul.nav-menu li.current_page_ancestor > a:after,
  #primary-navigation ul.nav-menu li.current-menu-item > a:after,
  #primary-navigation ul.nav-menu li.current-menu-ancestor > a:after {
    content: none;
  }

  #primary-navigation ul.nav-menu li a:after {
    content: none;
  }

  .top-menu-toggled-on .nav-menu li a:after {
    content: none;
  }

  .row.site-navigation.primary-navigation.header-layout2 {
    padding: 0;
  }

  .site-header-main .mobile-top-menu #primary-navigation ul.sub-menu.mega-menu-row > li.mega-menu-col > a {
    color: #E0E0E0;
  }
}
<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;