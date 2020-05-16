<?php
global $vars;
imedica_less_vars();
ob_start();
require_once( 'imedica-color-adjuster.php' );
$color_adjuster = new iMedica_Color_Adjuster;
?>
/*

Table of Contents - 

1. Basic Sidebar CSS
2. tagcloud widget
3. search widget
4. Footer Widget - Address
5. Twitter feed widget
6. Sidebar Menu
  6.1. Left Sidebar
  6.2. Style 1
  6.3. style 2 
    6.3.1 Right Sidebar
    6.3.2 Left Sidebar
  6.4. Style 3
  6.5. Style 4
  6.6. All styles reqrite for footer area widgets
7. Timetable widget

*/

/* Widgets
--------------------------------------------------------------*/

<?php

if ( $vars['sidebar-horizontal-seperator-bottom'] == '' ) {
  $vars['sidebar-horizontal-seperator-bottom'] = 0;
}

?>

.widget-area .widget {
  border-bottom-color: <?php echo $vars['sidebar-horizontal-seperator-color']; ?>;
  border-bottom-style: <?php echo $vars['sidebar-horizontal-seperator-style']; ?>;
  border-bottom-width: <?php echo $vars['sidebar-horizontal-seperator-bottom']; ?>;
  padding-bottom: <?php echo $vars['imedica-sidebar-widget-spacing']; ?>;
}

.imedica-footer-area aside:last-child {
    padding-bottom: 0;
}

.widget-area .widget:last-child {
  border-bottom: 0;
}

/* Make sure select elements fit in widgets */
.widget select {
  max-width: 100%;
}

/*sidebar li style*/
.widget-area ul li > a:hover:before {
    background: <?php echo $vars['imedica-theme-color']; ?>;
    color: <?php echo $vars['highlight-text-color']; ?>;
}

.widget-area ul li.recentcomments>a:before {
    content: none;
}
.widget-area ul li > a:before {
    content: "\f105";
    font-family: FontAwesome;
    font-weight: normal;
    border-width: 1px;
    border-style: solid;
    border-radius: 50%;
    text-align: center;
    font-size: 15px;
    width: 20px;
    height: 20px;
    padding-left: 1px;
    line-height: 17px;
    margin-right: 10px;
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -ms-transition: .3s;
    -o-transition: .3s;
    transition: .3s;
    color: <?php echo $vars['imedica-theme-color']; ?>;
    border-color: <?php echo $vars['imedica-theme-color']; ?>;
    display: inline-block;
}
#secondary ul li {
  border-color: #dcdcdc;
}

/* Sidebar Widget Area */
#secondary.left {
  background-color: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['sidebar-background-color'], $vars['sidebar-background-alpha'] ); ?>;
  padding-top: <?php echo $vars['sidebar-padding-top']; ?>;
  padding-right: <?php echo $vars['sidebar-padding-right']; ?>;
  padding-bottom: <?php echo $vars['sidebar-padding-bottom']; ?>;
  padding-left: <?php echo $vars['sidebar-padding-left']; ?>;
  border-color: <?php echo $vars['sidebar-border-color']; ?>;
  border-style: <?php echo $vars['sidebar-border-style']; ?>;
  border-top-width: <?php echo $vars['sidebar-border-top']; ?>;
  border-right-width: <?php echo $vars['sidebar-border-right']; ?>;
  border-bottom-width: <?php echo $vars['sidebar-border-bottom']; ?>;
  border-left-width: <?php echo $vars['sidebar-border-left']; ?>;
  word-wrap: break-word;
  -ms-word-wrap: break-word;
}

#secondary.right {
  background-color: <?php echo $color_adjuster->imd_Hex2RGBA($vars['sidebar-background-color'] ,$vars['sidebar-background-alpha'] ); ?>;
  padding-top: <?php echo $vars['sidebar-padding-top']; ?>;
  padding-right: <?php echo $vars['sidebar-padding-right']; ?>;
  padding-bottom: <?php echo $vars['sidebar-padding-bottom']; ?>;
  padding-left: <?php echo $vars['sidebar-padding-left']; ?>;
  border-color: <?php echo $vars['sidebar-border-right-color']; ?>;
  border-style: <?php echo $vars['sidebar-border-right-style']; ?>;
  border-top-width: <?php echo $vars['sidebar-border-right-top']; ?>;
  border-right-width: <?php echo $vars['sidebar-border-right-right']; ?>;
  border-bottom-width: <?php echo $vars['sidebar-border-right-bottom']; ?>;
  border-left-width: <?php echo $vars['sidebar-border-right-left']; ?>;
  word-wrap: break-word;
  -ms-word-wrap: break-word;
}

#secondary h3.widget-title {
  color: <?php echo $vars['sidebar-title-color']; ?>;
}

#secondary a {
  color: <?php echo $vars['sidebar-link-color']; ?>;
}

#secondary a:hover {
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

/*tagcloud widget*/
.tagcloud a,
#secondary .tagcloud a,
.imedica-footer-area  .tagcloud a {
    -webkit-transform: translateZ(0);
    -webkit-transition: .5s;
    -moz-transition: .5s;
    -ms-transition: .5s;
    -o-transition: .5s;
    transition: .5s;
     background: <?php echo $vars['imedica-theme-color']; ?>;
     color: <?php echo $vars['highlight-text-color']; ?>;
     padding: 5px 10px;
     margin: 0 5px 13px 0;
     position: relative;
     display: inline-block;
     float: left;
     padding-bottom: 0;
}
.tagcloud a:hover,
#secondary .tagcloud a:hover,
.imedica-footer-area .tagcloud a:hover {
    background: #f1f1f1;
    color: <?php echo $vars['imedica-theme-color']; ?>;
}
.tagcloud a:before {
    content: "";
    position: absolute;
    top: 100%;
    right: 0;
    border-width: 0.6em 1em 0 0;
    border-style: solid;
    border-top-color: <?php echo $color_adjuster->darken($vars['imedica-theme-color'] , 5 ); ?>;
    border-right-color: rgba(0, 0, 0, 0);
}
.tagcloud a:after {
    content: "";
    position: absolute;
    top: 100%;
    left: 0;
    right: 0.9em;
    border-width: 0.3em;
    border-style: solid;
    border-color: <?php echo $vars['imedica-theme-color']; ?>;
    -webkit-transition: .5s;
    -moz-transition: .5s;
    -ms-transition: .5s;
    -o-transition: .5s;
    transition: .5s;
}
.tagcloud a.tag-link-* {
    font-size: 11pt;
    border-top-color: #2075AE;
    color: <?php echo $vars['imedica-theme-color']; ?>;
    padding-bottom: 0;
    margin-top: 10px;
}
.tagcloud a:hover:after {
    border-color: #f1f1f1;
}

/*search widget*/
button.search-submit {
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  color: <?php echo $vars['highlight-text-color']; ?>;
  border-radius: 0;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  font-family: <?php echo $vars['body-text-font']; ?>;
  border: 0;
}

.site-footer .widget-social-icon {
  font-size: 30px;
  line-height: 1em;
  height: 30px;
  width: auto;
  float: left;
  margin: 0 20px 0 0;
  color: <?php echo $vars['footer-color-main']; ?>;
  background: none;
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  -ms-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}

.site-footer .widget-social-icon:hover {
  color: <?php echo $vars['imedica-theme-color']; ?>;
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  -ms-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}

/* Footer Widget - Address */
.icon-wrap.col-sm-1{
  padding: 0;
}

.site-footer .widget-address {
  margin: 0;
  padding: 0;
}

.site-footer .address-icons {
  font-size: 16px;
  color: <?php echo $vars['footer-color-main']; ?>;
  margin-right: 16px;
  background: none;
  text-align: left;
  height: 20px;
  line-height: 1.3em;
  width: 17px;
  float: left;
}

.recent-post-title span {
  display: inherit;
  font-size: 13px;
  color: <?php echo $vars['body-text-color']; ?>;
}

.recent-post-item .post-date {
    margin-right: 15px;
}

a.comments-link-recent i {
  padding-right: 5px;
}

.entry-content .recent-post-vc {
  list-style: none;
  margin: 0;
  padding-left: 0;
}

.recent-post-item .post-thumb {
  padding: 0;
  display: inline-block;
  width: auto;
  max-width: 15%;
  margin-right: 3%;
  vertical-align: top;
}

/* Twitter feed widget*/
.imedica-footer-area span.twitter-timestamp {
  width: 100%;
  clear: both;
  display: block;
  margin-bottom: 15px;
  color: <?php echo $vars['footer-color-hover']; ?>;
  margin-top: 8px;
  display:block
}

.imedica-footer-area span.twitter-timestamp time {
  color: <?php echo $vars['body-text-color']; ?>;
  font-size: 13px;
}

#secondary span.twitter-timestamp {
  width: 100%;
  clear: both;
  display: block;
  margin-bottom: 15px;
  color: <?php echo $vars['body-text-color']; ?>;
}

.imedica-footer-area ul.imedica-twitter-feed li:before {
  display: none;
}

.imedica-footer-area ul.imedica-twitter-feed {
  display: block;
  margin: 0;
}

.imedica-footer-area ul.imedica-twitter-feed .twitter-tweet {
  display: inline-block;
  width: 100%;
}

.imedica-footer-area .twitter-tweet i {
  padding: 0;
  font-size: 17px;
  text-align: left;
  display: inline-block;
  vertical-align: top;
  width: 10%;
  color: #FFF;
  line-height: 17px;
  margin-top: 3px;
}

.imedica-footer-area ul.imedica-twitter-feed span.col-md-11 {
  display: inline-block;
  width: 90%;
  padding: 0;
}

.imd-tabber-widget ul.imd-tabber-header li a.selected,
.imd-tabber-widget ul.imd-tabber-header li a:hover {
  margin-bottom: 0;
  cursor: default;
  color: <?php echo $vars['highlight-text-color']; ?>;
  background: <?php echo $vars['imedica-theme-color']; ?>;
}

/* Sidebar Menu - for left sidebar*/
#secondary ul.menu.side-menu-default li ul.sub-menu li {
  background: transparent;
}

#secondary.left ul.menu.side-menu-default li {
  border: none;
}

#secondary.left ul.menu.side-menu-default li,
#secondary.left ul.menu.side-menu-default li a {
  padding: 0;
  margin: 0;
  line-height: 3.2em;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  -webkit-transition: none;
  -moz-transition: none;
  -ms-transition: none;
  -o-transition: none;
  transition: none;
}

#secondary.left ul.menu.side-menu-default > li a {
  border-top: none;
  border-bottom: 0;
  border-right: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

#secondary.left ul.menu.side-menu-default > li a {
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

#secondary.left ul.menu.side-menu-default > li:first-child a {
  border-top: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

#secondary.left ul.menu.side-menu-default > li:first-child ul.sub-menu li a {
  border-top: 0;
}

#secondary.left ul.menu.side-menu-default li a {
  display: block;
  width: 100%;
  padding: 0 0.5em 0 0.9em;
  background: rgba(0, 0, 0, 0);
  color: <?php echo $vars['sidebar-link-color']; ?>;
  transition: all 0.15s ease-in-out;
}

#secondary.left ul.menu.side-menu-default li a:hover {
  padding: 0 0 0 1.3em;
}

#secondary.left ul.menu.side-menu-default li a:hover {
  background: transparent;
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

#secondary.left .side-menu-default .current-menu-item > a {
  position: relative;
}

#secondary.left .side-menu-default .current-menu-item > a:after {
  content: '';
  position: absolute;
  left: 0;
  width: 4px;
  height: 100%;
  background: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

.imedica-container #secondary.left ul.menu.side-menu-default .current-menu-item > a {
  padding: 0 0 0 1.6em;
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
  border-right: none;
}

.imedica-container #secondary.left ul.menu.side-menu-default .current-menu-item > a:hover {
  padding: 0 0 0 1.9em;
}

/* Sidebar - Sub Menu */
.widget-area ul.menu {
    margin: 0;
}
#secondary.left ul.menu.side-menu-default li ul.sub-menu li {
  border-bottom: none;
}

#secondary.left ul.menu.side-menu-default li ul.sub-menu li a {
  padding-left: 1.8em;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

#secondary.left ul.menu.side-menu-default li ul.sub-menu li a:hover {
  padding-left: 2.4em;
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

#secondary.left ul.menu.side-menu-default li ul.sub-menu .current-menu-item a {
  padding-left: 2.7em;
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

/* Sidebar - Menu List Icon */
#secondary.left ul.menu.side-menu-default li:before {
  content: none;
  font-family: FontAwesome;
  font-weight: normal;
  text-align: center;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 3.2em;
  width: 1em;
  height: 3.2em;
  padding: 0;
  margin: 0 0 0 0.5em;
  -webkit-transition: none;
  -moz-transition: none;
  -ms-transition: none;
  -o-transition: none;
  transition: none;
  color: <?php echo $vars['body-text-color']; ?>;
  background: rgba(0, 0, 0, 0);
  border: none;
  border-radius: none;
  position: absolute;
}

#secondary.left ul.menu.side-menu-default li:hover:before {
  background: rgba(0, 0, 0, 0);
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

/* Sidebar - Sub Menu List Icon */
#secondary.left ul.menu.side-menu-default li ul.sub-menu li:before {
  margin: 0 0 0 1.4em;
}

/* Sidebar Menu - for Right sidebar*/
#secondary.right ul.menu.side-menu-default li {
  border: none;
}

#secondary.right ul.menu.side-menu-default li,
#secondary.right ul.menu.side-menu-default li a {
  padding: 0;
  margin: 0;
  line-height: 3.2em;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  -webkit-transition: none;
  -moz-transition: none;
  -ms-transition: none;
  -o-transition: none;
  transition: none;
}

#secondary.right ul.menu.side-menu-default > li a {
  border-top: none;
  border-bottom: 0;
  border-left: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

#secondary.right ul.menu.side-menu-default > li a {
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

#secondary.right ul.menu .side-menu-default > li:first-child a {
  border-top: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

#secondary.right ul.menu.side-menu-default > li:first-child ul.sub-menu li a {
  border-top: 0;
}

#secondary.right ul.menu.side-menu-default li a {
  display: block;
  width: 100%;
  padding: 0 0.5em 0 0.9em;
  background: rgba(0, 0, 0, 0);
  color: <?php echo $vars['sidebar-link-color']; ?>;
  transition: all 0.15s ease-in-out;
}

#secondary.right ul.menu.side-menu-default li a:hover {
  padding: 0 0 0 1.3em;
}

#secondary.right ul.menu.side-menu-default li > a:hover {
  background: transparent;
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

#secondary.right .current-menu-item > a {
  position: relative;
}

#secondary.right .side-menu-default .current-menu-item > a:after {
  content: '';
  position: absolute;
  right: 0;
  width: 4px;
  height: 100%;
  background: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

.imedica-container #secondary.right ul.menu.side-menu-default .current-menu-item > a {
  padding: 0 0 0 1.6em;
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
  border-left: none;
}

.imedica-container #secondary.right ul.menu.side-menu-default .current-menu-item > a:hover {
  padding: 0 0 0 1.9em;
}

/* Sidebar - Sub Menu */
#secondary.right ul.menu.side-menu-default li ul.sub-menu li {
  border-bottom: none;
}

#secondary.right ul.menu.side-menu-default li ul.sub-menu li a {
  padding-left: 1.8em;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

#secondary.right ul.menu.side-menu-default li ul.sub-menu .current-menu-item a {
  padding-left: 2.7em;
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

#secondary.right ul.menu.side-menu-default li ul.sub-menu li a:hover {
  padding-left: 2.4em;
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

/* Sidebar - Menu List Icon */
#secondary.right ul.menu.side-menu-default li:before {
  content: none;
  font-family: FontAwesome;
  font-weight: normal;
  text-align: center;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 3.2em;
  width: 1em;
  height: 3.2em;
  padding: 0;
  margin: 0 0 0 0.5em;
  -webkit-transition: none;
  -moz-transition: none;
  -ms-transition: none;
  -o-transition: none;
  transition: none;
  color: <?php echo $vars['body-text-color']; ?>;
  background: rgba(0, 0, 0, 0);
  border: none;
  border-radius: none;
  position: absolute;
}
.widget-area .imd_custom_menu ul li a:before {
    content: none;
}
#secondary.right ul.menu .side-menu-default li:hover:before {
  background: rgba(0, 0, 0, 0);
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

/* Sidebar - Sub Menu List Icon */
#secondary.right ul.menu .side-menu-default li ul.sub-menu li:before {
  margin: 0 0 0 1.4em;
}

/* CSS for cls Style1-right */
#secondary .imd_custom_menu ul {
    margin: 0;
}
.imd_custom_menu ul li a {
  font-size: <?php echo $vars['body-text-font-size']; ?>;
}

#secondary.right ul.side-menu-default li ul.sub-menu li a {
  padding-left: 25px;
}

#secondary.right ul.side-menu-default li ul.sub-menu ul.sub-menu li a {
  padding-left: 2.7em;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

#secondary.right ul.side-menu-default li ul.sub-menu li ul.sub-menu li a:hover {
  padding-left: 3.2em;
  border-bottom: 1px solid #e9ecef;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

#secondary.right ul.menu.side-menu-default li:hover > a {
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

/* CSS for cls Style1-right */
#secondary.left ul.side-menu-default li ul.sub-menu ul.sub-menu li a {
  padding-left: 2.7em;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

#secondary.left ul.side-menu-default li ul.sub-menu li ul.sub-menu li a:hover {
  padding-left: 3.2em;
  border-bottom: 1px solid #e9ecef;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

#secondary.left ul.menu.side-menu-default li:hover > a {
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

/* CSS for cls Style2 */
/* style 2  for right sidebar */
#secondary ul.side-menu-style2 li {
  padding: 0;
  border-bottom: none;
}

#secondary ul.side-menu-style2 li:before {
  content: none;
}

aside.widget ul.side-menu-style2 li > a {
  margin-left: 0px;
  display: inline-block;
}

#secondary.right ul.side-menu-style2 li {
  position: relative;
  display: block;
}

#secondary.right ul.side-menu-style2 {
  margin-right: 0px;
  border: 1px solid #dcdcdc;
  padding: 0px;
}

#secondary.right ul.side-menu-style2 li {
  border-top: 1px solid #dcdcdc;
  display: block;
}

#secondary.right ul.side-menu-style2 li ul.sub-menu li {
  border-top: 1px solid #dcdcdc;
  display: block;
}

#secondary.right ul.side-menu-style2 li:first-child {
  border-top: none;
}

#secondary.right ul.style2 li {
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -ms-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}

#secondary.right ul.side-menu-style2 li a:hover {
  background: #f8f8f8;
}

#secondary.right ul.side-menu-style2 li a {
  text-decoration: none;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 19px;
  display: block;
  padding: 13px 10px 13px 25px;
}

#secondary.right ul.side-menu-style2 li {
  margin: 0px;
}

#secondary.right ul.side-menu-style2 .current-menu-item a {
  color: <?php echo $vars['sidebar-link-color']; ?>;
  border: none;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
}

#secondary.right ul.side-menu-style2 ul.sub-menu .current-menu-item {
  background: none;
}

#secondary.right ul.side-menu-style2 ul.sub-menu .current-menu-item ul.sub-menu li a:hover {
  background-color: #f8f8f8;
}

#secondary.right ul.side-menu-style2 .current-menu-item ul.sub-menu li a:hover {
  background: #f8f8f8;
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

#secondary.right ul.side-menu-style2 .current-menu-item ul.sub-menu li a {
  background-color: none;
}

#secondary.right ul.side-menu-style2 .current-menu-item a:after {
  right: 100%;
  top: 50%;
  transform: translateY(-50%);
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-top: 23px solid transparent;
  border-bottom: 22px solid transparent;
  border-right: 20px solid #f8f8f8;
}

#secondary.right ul.side-menu-style2 .current-menu-item ul.sub-menu li a {
  cursor: pointer;
}

#secondary.right ul.side-menu-style2 .current-menu-item ul.sub-menu li a:after {
  content: none;
  cursor: pointer;
}

#secondary.right ul.side-menu-style2 .current-menu-item ul.sub-menu li a:before {
  content: none;
  cursor: pointer;
}

#secondary.right ul.side-menu-style2 .current-menu-item > a {
  background: #f8f8f8;
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

#secondary.right ul.side-menu-style2 li ul.sub-menu li a {
  padding-left: 35px;
}

#secondary.right ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li a {
  padding-left: 45px;
}

#secondary.right ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 55px;
}

#secondary.right ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 65px;
}

#secondary.right ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 75px;
}

#secondary.right ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 85px;
}

#secondary.right ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 95px;
}

/* style 2  for left sidebar */

#secondary.left ul.side-menu-style2 li {
  position: relative;
  display: block;
}

#secondary.left ul.side-menu-style2 {
  margin-right: 0px;
  border: 1px solid #dcdcdc;
  padding: 0px;
}

#secondary.left ul.side-menu-style2 li {
  border-top: 1px solid #dcdcdc;
  display: block;
}

#secondary.left ul.side-menu-style2 li ul.sub-menu li {
  border-top: 1px solid #dcdcdc;
  display: block;
}

#secondary.left ul.side-menu-style2 li:first-child {
  border-top: none;
}

#secondary.left ul.side-menu-style2 li a:hover {
  background: #f8f8f8;
}

#secondary.left ul.side-menu-style2 li a {
  text-decoration: none;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 19px;
  display: block;
  padding: 13px 10px 13px 25px;
}

#secondary.left ul.side-menu-style2 li {
  margin: 0px;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -ms-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}

#secondary.left ul.side-menu-style2 .current-menu-item a {
  color: <?php echo $vars['sidebar-link-color']; ?>;
  border: none;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  position: relative;
}

#secondary.left ul.side-menu-style2 ul.sub-menu .current-menu-item {
  background: none;
}

#secondary.left ul.side-menu-style2 ul.sub-menu .current-menu-item ul.sub-menu li a:hover {
  background-color: #f8f8f8;
}

#secondary.left ul.side-menu-style2 .current-menu-item ul.sub-menu li a:hover {
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

#secondary.left ul.side-menu-style2 .current-menu-item a:after {
  left: 100%;
  top: 50%;
  transform: translateY(-50%);
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-top: 23px solid transparent;
  border-bottom: 22px solid transparent;
  border-left: 20px solid #f8f8f8;
}

#secondary.left ul.side-menu-style2 .current-menu-item ul.sub-menu li a {
  cursor: pointer;
}

#secondary.left ul.side-menu-style2 .current-menu-item ul.sub-menu li a:after {
  content: none;
  cursor: pointer;
}

#secondary.left ul.side-menu-style2 .current-menu-item ul.sub-menu li a:before {
  content: none;
  cursor: pointer;
}

#secondary.left ul.side-menu-style2 .current-menu-item > a {
  background: #f8f8f8;
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

#secondary.left ul.side-menu-style2 li ul.sub-menu li a {
  padding-left: 35px;
}

#secondary.left ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li a {
  padding-left: 45px;
}

#secondary.left ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 55px;
}

#secondary.left ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 65px;
}

#secondary.left ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 75px;
}

#secondary.left ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 85px;
}

#secondary.left ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 95px;
}

/* CSS for cls Style3 */
#secondary.right .side-menu-style3 li:before {
  content: "\f105";
  padding-right: 2px;
  font-family: FontAwesome;
  font-weight: normal;
  text-align: center;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 23px;
  padding-left: 2px;
  margin-right: 10px;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
  position: absolute;
  border: none;
  color: <?php echo $vars['sidebar-link-color']; ?>;
  margin-top: 10px;
}

#secondary.right .side-menu-style3 li:hover {
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

#secondary.right .side-menu-style3 li:hover:before {
  background: none;
  color: <?php echo $vars['sidebar-link-color']; ?>;
}

#secondary ul.side-menu-style3 li {
  padding: 0;
  border-bottom: none;
}

#secondary.left .side-menu-style3 ul.sub-menu .current-menu-item {
  background: none;
}

.imd_custom_menu ul.side-menu-style3 li {
  display: block;
  border: none;
  padding: 0;
  margin: 0;
}

.imd_custom_menu ul.side-menu-style3 li a {
  display: block;
  border-bottom: none;
  padding: 10px 10px 10px 0px;
}

.imd_custom_menu ul.side-menu-style3 li ul.sub-menu li a {
  padding-left: 15px;
}

#secondary.left .imd_custom_menu ul.side-menu-style3 li ul.sub-menu li:before {
  padding-left: 25px;
}

#secondary.left .imd_custom_menu ul.side-menu-style3 li ul.sub-menu ul.sub-menu li a {
  padding-left: 35px;
}

#secondary.left .imd_custom_menu ul.side-menu-style3 li ul.sub-menu ul.sub-menu li:before {
  padding-left: 45px;
}

ul.sub-menu .current-menu-item {
  background: none;
}

#secondary ul.side-menu-style3 li {
  border-top: 1px solid #dcdcdc;
}

.imd_custom_menu ul.side-menu-style3 li > a {
  margin-left: 25px;
}

#secondary ul.menu.side-menu-style3 > li:first-child {
  border-top: 0;
}

#secondary.right .side-menu-style3 li ul.sub-menu li:before {
  left: 30px;
}

#secondary.right .side-menu-style3 li ul.sub-menu li ul.sub-menu li:before {
  left: 50px;
}

/* CSS for cls Style3-left */
#secondary.left .side-menu-style3 li:before {
  content: "\f105";
  padding-right: 2px;
  font-family: FontAwesome;
  font-weight: normal;
  text-align: center;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 23px;
  padding-left: 2px;
  margin-right: 10px;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
  position: absolute;
  border: none;
  color: <?php echo $vars['sidebar-link-color']; ?>;
  margin-top: 10px;
}

#secondary.left .side-menu-style3 li:hover {
  color: <?php echo $vars['sidebar-link-color']; ?>;
}

#secondary.left .side-menu-style3 li:hover:before {
  background: none;
  color: <?php echo $vars['sidebar-link-color']; ?>;
}

#secondary ul.side-menu-style3 li {
  padding: 0;
  border-bottom: none;
}

#secondary .side-menu-style3 .current-menu-item > a {
  color: <?php echo $vars['sidebar-link-color']; ?>;
}

#secondary.left .side-menu-style3 ul.sub-menu .current-menu-item {
  background: none;
}

.imd_custom_menu ul.side-menu-style3 li {
  display: block;
  border: none;
  padding: 0;
  margin: 0;
}

.imd_custom_menu ul.side-menu-style3 li a {
  display: block;
  border-bottom: none;
  padding: 10px 10px 10px 0px;
}

.imd_custom_menu ul.side-menu-style3 li ul.sub-menu li a {
  padding-left: 15px;
}

.imd_custom_menu ul.side-menu-style3 li ul.sub-menu li:before {
  padding-left: 25px;
}

.imd_custom_menu ul.side-menu-style3 li ul.sub-menu ul.sub-menu li a {
  padding-left: 35px;
}

.imd_custom_menu ul.side-menu-style3 li ul.sub-menu ul.sub-menu li:before {
  padding-left: 45px;
}

ul.sub-menu .current-menu-item {
  background: none;
}

#secondary ul.side-menu-style3 li {
  border-top: 1px solid #dcdcdc;
}

#secondary ul.side-menu-style3 .current-menu-item {
  background-color: initial; 
}

#secondary ul.side-menu-style3 .current-menu-item > a {
  color: <?php echo $vars['sidebar-link-color-hover']; ?>;
}

.imd_custom_menu ul.side-menu-style3 li > a {
  margin-left: 25px;
}

#secondary ul.menu.side-menu-style3 > li:first-child {
  border-top: 0;
}

/* CSS for cls Style4 */
#secondary ul.side-menu-style4 li {
  padding: 0;
  border-bottom: none;
  background: none;
}

#secondary ul.side-menu-style4 li:before {
  content: none;
}

aside.widget ul.side-menu-style4 li > a {
  margin-left: 0px;
  display: inline-block;
}

#secondary ul.side-menu-style4 li a {
  text-decoration: none;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 19px;
  display: block;
  padding: 13px 10px 13px 0px;
  border-bottom: 1px solid #f1f2f2;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -ms-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}

#secondary ul.side-menu-style4 li a:before {
  content: "\f105";
  font-size: inherit;
  height: 1.2em;
  width: 1.2em;
  line-height: 1.1em;
  text-align: center;
  color: <?php echo $vars['sidebar-link-color']; ?>;
  border-radius: 50%;
  font-family: fontawesome;
  float: left;
  padding-left: 1px;
  border: 1px solid;
  margin: 0px 15px 0 0px;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -ms-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}

#secondary ul.side-menu-style4 li a:hover:before {
  background-color: <?php echo $vars['sidebar-link-color-hover']; ?>;
  color: #ffffff;
  border: 1px solid <?php echo $vars['sidebar-link-color-hover']; ?>;
}

#secondary ul.side-menu-style4 li ul.sub-menu li a {
  padding-left: 20px;
}

#secondary ul.side-menu-style4 li ul.sub-menu li a {
  padding-left: 10px;
}

#secondary ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li a {
  padding-left: 20px;
}

#secondary ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 30px;
}

#secondary ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 40px;
}

#secondary ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 50px;
}

#secondary ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 60px;
}

#secondary ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 70px;
}

/* CSS for footer menu */
/* CSS for cls Style1 for footer */
.imedica-footer-area ul.menu.side-menu-default li ul.sub-menu li {
  background: transparent;
}

.imedica-footer-area ul.menu.side-menu-default li {
  border: none;
}

.imedica-footer-area ul.menu.side-menu-default li,
.imedica-footer-area ul.menu.side-menu-default li a {
  padding: 0;
  margin: 0;
  line-height: 3.2em;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  -webkit-transition: none;
  -moz-transition: none;
  -ms-transition: none;
  -o-transition: none;
  transition: none;
}

.imedica-footer-area ul.menu.side-menu-default > li a {
  border-top: none;
  border-bottom: 0;
  border-right: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

.imedica-footer-area ul.menu.side-menu-default > li a {
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

.imedica-footer-area ul.menu.side-menu-default > li:first-child a {
  border-top: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
}

.imedica-footer-area ul.menu.side-menu-default > li:first-child ul.sub-menu li a {
  border-top: 0;
}

.imedica-footer-area ul.menu.side-menu-default li a {
  display: block;
  width: 100%;
  padding: 0 0.5em 0 0.9em;
  background: rgba(0, 0, 0, 0);
  color: <?php echo $vars['footer-color-main']; ?>;
  transition: all 0.15s ease-in-out;
}

.imedica-footer-area ul.menu.side-menu-default li a:hover {
  padding: 0 0 0 1.3em;
}

.imedica-footer-area ul.menu.side-menu-default li.current-menu-item a:hover {
  padding: 0 0 0 1.9em;
}

.imedica-footer-area ul.menu.side-menu-default li > a:hover {
  background: transparent;
  color: <?php echo $vars['footer-color-main']; ?>;
}

.imedica-footer-area .side-menu-default .current-menu-item > a {
  position: relative;
}

.imedica-footer-area .side-menu-default .current-menu-item > a:after {
  content: '';
  position: absolute;
  left: 0;
  width: 4px;
  height: 100%;
  background: <?php echo $vars['footer-color-hover']; ?>;
}

.imedica-footer-area ul.menu.side-menu-default .current-menu-item > a {
  padding: 0 0 0 1.6em;
  color: <?php echo $vars['footer-color-hover']; ?>;
  border-right: none;
}

/* Sidebar - Sub Menu */
.imedica-footer-area ul.menu.side-menu-default li ul.sub-menu li {
  border-bottom: none;
}

.imedica-footer-area ul.menu.side-menu-default li ul.sub-menu li a {
  padding-left: 1.8em;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

.imedica-footer-area ul.menu.side-menu-default li ul.sub-menu li a:hover {
  padding-left: 2.4em;
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

.imedica-footer-area ul.menu.side-menu-default li ul.sub-menu .current-menu-item a {
  padding-left: 2.7em;
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['body-text-color'] , 32 ); ?>;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

/* Sidebar - Menu List Icon */
.imedica-footer-area ul.menu.side-menu-default li:before {
  content: none;
  font-family: FontAwesome;
  font-weight: normal;
  text-align: center;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 3.2em;
  width: 1em;
  height: 3.2em;
  padding: 0;
  margin: 0 0 0 0.5em;
  -webkit-transition: none;
  -moz-transition: none;
  -ms-transition: none;
  -o-transition: none;
  transition: none;
  color: <?php echo $vars['body-text-color']; ?>;
  background: rgba(0, 0, 0, 0);
  border: none;
  border-radius: none;
  position: absolute;
}

.imedica-footer-area ul.menu.side-menu-default li:hover:before {
  background: rgba(0, 0, 0, 0);
  color: <?php echo $vars['footer-color-hover']; ?>;
}

/* Sidebar - Sub Menu List Icon */
.imedica-footer-area ul.menu.side-menu-default li ul.sub-menu li:before {
  margin: 0 0 0 1.4em;
}

.imedica-footer-area ul.menu.side-menu-default li > a:hover {
  background: transparent;
  color: <?php echo $vars['footer-color-hover']; ?>;
}

.imedica-footer-area ul.side-menu-default li ul.sub-menu ul.sub-menu li a {
  padding-left: 2.7em;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

.imedica-footer-area ul.side-menu-default li ul.sub-menu li ul.sub-menu li a:hover {
  padding-left: 3.2em;
  border-bottom: 1px solid #e9ecef;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

.imedica-footer-area ul.menu.side-menu-default li:hover > a {
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

/* CSS for footer style2 */
.imedica-footer-area ul.side-menu-style2 li {
  padding: 0;
  border-bottom: none;
  position: relative;
  display: block;
}

.imedica-footer-area ul.side-menu-style2 li:before {
  content: none;
}

.imedica-footer-area aside.widget ul.side-menu-style2 li > a {
  margin-left: 0px;
  display: block;
  position: relative;
}

.imedica-footer-area ul.side-menu-style2 {
  margin-right: 0px;
  border: 1px solid <?php echo $color_adjuster->lighten($vars['footer-background-color-main'] , 74 ); ?>;
  padding: 0px;
  display: block;
}

.imedica-footer-area ul.side-menu-style2 li {
  border-top: 1px solid <?php echo $color_adjuster->lighten($vars['footer-background-color-main'] , 74 ); ?>;
  display: block;
}

.imedica-footer-area ul.side-menu-style2 li ul.sub-menu li {
  border-top: 1px solid <?php echo $color_adjuster->lighten($vars['footer-background-color-main'] , 74 ); ?>;
  display: block;
}

.imedica-footer-area ul.side-menu-style2 li:first-child {
  border-top: none;
}

.imedica-footer-area ul.style2 li {
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -ms-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}

.imedica-footer-area ul.side-menu-style2 li a:hover {
  background: <?php echo $color_adjuster->darken($vars['footer-color-hover'] , 9 ); ?>;
  color: <?php echo $vars['footer-color-main']; ?>;
}

.imedica-footer-area ul.side-menu-style2 li a {
  text-decoration: none;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 19px;
  display: block;
  padding: 13px 10px 13px 25px;
}

.imedica-footer-area ul.side-menu-style2 li {
  margin: 0px;
}

.imedica-footer-area ul.side-menu-style2 .current-menu-item a {
  color: <?php echo $vars['footer-color-main']; ?>;
  border: none;
  font-size: 15px;
}

.imedica-footer-area ul.side-menu-style2 ul.sub-menu .current-menu-item {
  background: none;
}

.imedica-footer-area ul.side-menu-style2 ul.sub-menu .current-menu-item ul.sub-menu li a:hover {
  background-color: <?php echo $color_adjuster->darken($vars['footer-color-hover'] , 9 ); ?>;
}

.imedica-footer-area ul.side-menu-style2 .current-menu-item ul.sub-menu li a:hover {
  background: <?php echo $color_adjuster->darken($vars['footer-color-hover'] , 9 ); ?>;
  color: <?php echo $vars['footer-color-main']; ?>;
}

.imedica-footer-area ul.side-menu-style2 .current-menu-item ul.sub-menu li a {
  background-color: none;
}

.imedica-footer-area ul.side-menu-style2 .current-menu-item ul.sub-menu li a {
  cursor: pointer;
}

.imedica-footer-area ul.side-menu-style2 .current-menu-item ul.sub-menu li a:after {
  content: none;
  cursor: pointer;
}

.imedica-footer-area ul.side-menu-style2 .current-menu-item ul.sub-menu li a:before {
  content: none;
  cursor: pointer;
}

.imedica-footer-area ul.side-menu-style2 .current-menu-item > a {
  background: <?php echo $color_adjuster->darken($vars['footer-color-hover'] , 9 ); ?>;
}

.imedica-footer-area ul.side-menu-style2 li ul.sub-menu li a {
  padding-left: 35px;
}

.imedica-footer-area ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li a {
  padding-left: 45px;
}

.imedica-footer-area ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 55px;
}

.imedica-footer-area ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 65px;
}

.imedica-footer-area ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 75px;
}

.imedica-footer-area ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 85px;
}

.imedica-footer-area ul.side-menu-style2 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 95px;
}

/* CSS for footer style3 */
.imedica-footer-area .side-menu-style3 li:before {
  content: "\f105";
  padding-right: 2px;
  font-family: FontAwesome;
  font-weight: normal;
  text-align: center;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  width: 20px;
  height: 20px;
  line-height: 23px;
  padding-left: 2px;
  margin-right: 10px;
  -webkit-transition: .3s;
  -moz-transition: .3s;
  -ms-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
  position: absolute;
  border: none;
  color: <?php echo $vars['footer-color-main']; ?>;
  margin-top: 10px;
}

.imedica-footer-area .side-menu-style3 li a:hover {
  color: <?php echo $vars['footer-color-hover']; ?>;
}

.imedica-footer-area .side-menu-style3 li:before {
  padding-left: 15px;
}

/* CSS for cls Style3-left */
.imedica-footer-area .side-menu-style3 li:hover {
  color: <?php echo $vars['footer-color-main']; ?>;
}

.imedica-footer-area .side-menu-style3 li a:hover:before {
  background: none;
  color: <?php echo $vars['footer-color-hover']; ?>;
}

.imedica-footer-area ul.side-menu-style3 li {
  padding: 0;
  border-bottom: none;
}

.imedica-footer-area .side-menu-style3 .current-menu-item > a {
  color: <?php echo $vars['footer-color-main']; ?>;
}

.imedica-footer-area .side-menu-style3 ul.sub-menu .current-menu-item {
  background: none;
}

.imedica-footer-area ul.side-menu-style3 li {
  border-top: 1px solid #dcdcdc;
}

.imedica-footer-area ul.side-menu-style3 .current-menu-item.current_page_item {
  border-top: 1px solid #dcdcdc;
}

.imedica-footer-area ul.side-menu-style3 .current-menu-item > a {
  color: <?php echo $vars['footer-color-hover']; ?>;
}

.imedica-footer-area .imd_custom_menu ul.side-menu-style3 li > a {
  margin-left: 30px;
}

.imedica-footer-area .imd_custom_menu ul.side-menu-style3 li ul.sub-menu ul.sub-menu li:before {
  padding-left: 0px;
}

.imedica-footer-area .imd_custom_menu ul.side-menu-style3 li ul.sub-menu li:before {
  padding-left: 10px;
}

.imedica-footer-area .imd_custom_menu ul.side-menu-style3 li ul.sub-menu ul.sub-menu li a {
  padding-left: 30px;
}

.imedica-footer-area ul.side-menu-style3 li > a:hover {
  background: transparent;
  color: <?php echo $vars['footer-color-hover']; ?>;
}

.imedica-footer-area ul.menu.side-menu-style3 > li:first-child {
  border-top: 0;
}

.imedica-footer-area .side-menu-style3 li ul.sub-menu li:before {
  left: 30px;
}

.imedica-footer-area .side-menu-style3 li ul.sub-menu li ul.sub-menu li:before {
  left: 50px;
}

/* CSS for footer style4 */
.imedica-footer-area ul.side-menu-style4 li {
  padding: 0;
  border-bottom: none;
  background: none;
}

.imedica-footer-area ul.side-menu-style4 li:before {
  content: none;
}

.imedica-footer-area aside.widget ul.side-menu-style4 li > a {
  margin-left: 0px;
  display: block;
}

.imedica-footer-area ul.side-menu-style4 li a {
  text-decoration: none;
  font-size: <?php echo $vars['body-text-font-size']; ?>;
  line-height: 19px;
  display: block;
  padding: 13px 10px 13px 0px;
  border-bottom: 1px solid <?php echo $color_adjuster->lighten($vars['footer-background-color-main'] , 74 ); ?>;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -ms-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}

.imedica-footer-area ul.side-menu-style4 li a:before {
  content: "\f105";
  font-size: inherit;
  height: 1.2em;
  width: 1.2em;
  line-height: 1.1em;
  text-align: center;
  color: <?php echo $vars['footer-color-main']; ?>;
  border-radius: 50%;
  font-family: fontawesome;
  float: left;
  padding-left: 1px;
  border: 1px solid <?php echo $vars['footer-color-main']; ?>;
  margin: 0px 15px 0 0px;
  -webkit-transition: all .3s ease-in-out;
  -moz-transition: all .3s ease-in-out;
  -ms-transition: all .3s ease-in-out;
  -o-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
}

.imedica-footer-area ul.side-menu-style4 li a:hover:before {
  background-color: <?php echo $vars['footer-color-hover']; ?>;
  color: <?php echo $vars['footer-color-main']; ?>;
  border: 1px solid <?php echo $vars['footer-color-hover']; ?>;
}

.imedica-footer-area ul.side-menu-style4 li ul.sub-menu li a {
  padding-left: 20px;
}

.imedica-footer-area ul.side-menu-style4 li ul.sub-menu li a {
  padding-left: 10px;
}

.imedica-footer-area ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li a {
  padding-left: 20px;
}

.imedica-footer-area ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 30px;
}

.imedica-footer-area ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 40px;
}

.imedica-footer-area ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 50px;
}

.imedica-footer-area ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 60px;
}

.imedica-footer-area ul.side-menu-style4 li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li ul.sub-menu li a {
  padding-left: 70px;
}

/*RSS widget*/

.rss-date {
    margin-left: 30px;
    display: block;
    margin: 10px 0 10px 0px;
}
.rss-date:before {
    content: "\f073";
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    transform: translate(0, 0);
    margin-right: 10px;
    color: <?php echo $vars['imedica-theme-color']; ?>;
}
#secondary ul li .rsswidget {
  color: <?php echo $vars['imedica-theme-color']; ?>;
}
#secondary .widget_rss li:before {
    content: none;
}
#secondary .widget_rss li a{
    margin: 0;
}
/*Calender Widget*/

#wp-calendar td a{
    color: <?php echo $vars['imedica-theme-color']; ?>;
    font-weight: bold;
}

/*Recent comments*/
#secondary ul li.recentcomments a {
    color: <?php echo $vars['imedica-theme-color']; ?>;
}

/* Timetable Widget */
.widget.upcoming_events_widget {
    display: inline-block;
}

<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;