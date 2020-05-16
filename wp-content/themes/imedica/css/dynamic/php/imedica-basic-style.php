<?php
ob_start();
require_once( get_template_directory().'/css/dynamic/imedica-vars.php' );
global $vars;
imedica_less_vars();
require_once( 'imedica-color-adjuster.php' );
$color_adjuster = new iMedica_Color_Adjuster;
?>
b,strong {
    font-weight: bold;
}

body {
  background-color: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-color-bg'], $vars['imedica-color-bg-alpha']); ?>;
}

<?php $bg_img = str_replace( 'http://imedica.sharkz.in/wp-content/themes/imedica', get_template_directory_uri(), $vars['imedica-color-bg-img']); ?>

<?php if( $vars['imedica-color-bg-img'] != "" && ( $vars['imedica_layout'] == 'container-padded' || $vars['imedica_layout'] == 'container' )) { ?>
	body  {
	  background-image: <?php echo $bg_img; ?>;
	  background-repeat: <?php echo $vars['imd-bg-img-repeat'] ?>;
	}
<?php } ?>
::selection {
  background-color: <?php echo $vars['highlight-text-background'] ?>;
  color: <?php echo $vars['highlight-text-color'] ?>;
}

.entry-summary p,
.search .entry-summary p,
.archive .entry-summary p {
  margin: 0;
}

p {
  margin-bottom: 1.5em;
}

blockquote {
  margin: 30px 60px;
  padding: 20px;
  position: relative;
  border-top: 1px solid #DCDDDE;
  border-bottom: 1px solid #DCDDDE;
  font-style: italic;
  font-size: <?php echo $vars['body-text-font-size'] ?>;
  color: <?php echo $vars['imedica-theme-color'] ?>;
}

blockquote:after {
  content: '';
  width: 110px;
  height: 3px;
  display: block;
  background-color: <?php echo $vars['imedica-theme-color'] ?>;
  position: absolute;
  top: -2px;
  left: 0;
}

code,
kbd,
tt,
var {
  font: 15px Monaco, Consolas, "Andale Mono", "DejaVu Sans Mono", monospace;
}

body,
button,
input,
select,
textarea {
  font-size: <?php echo $vars['body-text-font-size'] ?>;
  color: <?php echo $vars['body-text-color'] ?>;
  font-family: <?php echo $vars['body-text-font'] ?>;
  line-height: <?php echo $vars['body-text-line-height'] ?>;
  font-weight: <?php echo $vars['body-text-font-weight'] ?>;
}

body,
ul li,
ol li,
.post-meta,
div.read-more-link {
  font-size: <?php echo $vars['body-text-font-size'] ?>;
  color: <?php echo $vars['body-text-color'] ?>;
  font-family: <?php echo $vars['body-text-font'] ?>;
  line-height: <?php echo $vars['body-text-line-height'] ?>;
  font-weight: <?php echo $vars['body-text-font-weight'] ?>;
}

.entry-title,
.imedica-comments-title,
.comment-reply-title,
.page-title,
.archive-title,
.archive-title,
.search.search-results .page-title,
.about-author,
.about-author a, 
.related-posts-title{
  font-family: <?php echo $vars['heading-font-family'] ?>;
  color: <?php echo $vars['imedica-theme-color'] ?>;
}

h1 {
  line-height: <?php echo $vars['heading-line-height'] ?>;
  font-size: <?php echo $vars['heading-font-size'] ?>;
  margin-bottom: 10px;
  font-weight: <?php echo $vars['heading-font-weight'] ?>;
}

h2 {
  font-family: <?php echo $vars['h2-heading-font-family'] ?>;
  font-size: <?php echo $vars['h2-heading-font-size'] ?>;
  line-height: <?php echo $vars['h2-heading-line-height'] ?>;
  margin-bottom: 10px;
  font-weight: <?php echo $vars['h2-heading-font-weight'] ?>;
}

h3 {
  font-family: <?php echo $vars['h3-heading-font-family'] ?>;
  font-size: <?php echo $vars['h3-heading-font-size'] ?>;
  line-height: <?php echo $vars['h3-heading-line-height'] ?>;
  margin-bottom: 10px;
  font-weight: <?php echo $vars['h3-heading-font-weight'] ?>;
}

h4 {
  font-family: <?php echo $vars['h4-heading-font-family'] ?>;
  font-size: <?php echo $vars['h4-heading-font-size'] ?>;
  line-height: <?php echo $vars['h4-heading-line-height'] ?>;
  margin-bottom: 10px;
  font-weight: <?php echo $vars['h4-heading-font-weight'] ?>;
}

h5 {
  font-family: <?php echo $vars['h5-heading-font-family'] ?>;
  font-size: <?php echo $vars['h5-heading-font-size'] ?>;
  line-height: <?php echo $vars['h5-heading-line-height'] ?>;
  margin-bottom: 10px;
  font-weight: <?php echo $vars['h5-heading-font-weight'] ?>;
}

h6 {
  font-family: <?php echo $vars['h6-heading-font-family'] ?>;
  font-size: <?php echo $vars['h6-heading-font-size'] ?>;
  line-height: <?php echo $vars['h6-heading-line-height'] ?>;
  margin-bottom: 10px;
  font-weight: <?php echo $vars['h6-heading-font-weight'] ?>;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="url"]:focus,
input[type="password"]:focus,
input[type="search"]:focus,
textarea:focus {
  color: #111;
  outline: none;
  border: 1px solid <?php echo $vars['imedica-theme-color'] ?>;
}

input[type="text"]:focus, input[type="email"]:focus,
input[type="url"]:focus, input[type="password"]:focus,
input[type="search"]:focus, textarea:focus {
  box-shadow: 0px 0px 5px 0px <?php echo $vars['imedica-theme-color'] ?>;
  transition: all 0.2s ease-In;
}

input[type="text"], input[type="email"],
input[type="url"], input[type="password"],
input[type="search"],
textarea {
  transition: all 0.7s ease-In;
}

.imedica-load-more-wrapper {
	text-align:center
}
.imd-button {
    background-color: <?php echo $vars['highlight-text-color'] ?>;
    color: <?php echo $vars['imedica-theme-color'] ?>;
    font-size: <?php echo $vars['body-text-font-size'] ?>;
    border: 1px solid <?php echo $vars['imedica-theme-color'] ?>;
	cursor: pointer;
	padding: 10px 15px;
	border-radius: 2px;
	transition: all 0.2s ease-in-out;
}
.imd-button:hover {
	background-color: <?php echo $vars['imedica-theme-color'] ?>;
    color: <?php echo $vars['highlight-text-color'] ?>;
}

/*--------------------------------------------------------------
5.0 Links
--------------------------------------------------------------*/
a {
  color: <?php echo $vars['link-color'] ?>;
  transition: all 0.2s ease-in-out;
}

a:hover {
  color: <?php echo $vars['link-hover-color'] ?>;
}

a:visited,
a:hover,
a:focus,
a:active {
  outline: none;
  text-decoration: none;
}

/* Scroll to Top */
.imd-scroll-top {
  display: none;
  position: fixed;
  right: 30px;
  bottom: 30px;
  width: 40px;
  height: 40px;
  font-size: 23px;
  line-height: 37px;
  text-align: center;
  border-radius: <?php echo $vars["scroll-to-top-radius"] ?>;
  background: <?php echo $vars['imedica-theme-color'] ?>;
  color: <?php echo $vars['highlight-text-color'] ?>;
  cursor: pointer;
  z-index: 101;
}

/* iMdeica Loader */
.imedica-loader {
	display:none;
}
.imd-bubblingG {
	text-align: center;
	width:60px;
	height:38px;
	margin:0 auto;
}

.imd-bubblingG span {
	display: inline-block;
	vertical-align: middle;
	width: 8px;
	height: 8px;
	margin: 19px auto;
	background: <?php echo $vars['imedica-theme-color'] ?>;
	-moz-border-radius: 38px;
	-moz-animation: bubblingG 0.7s infinite alternate;
	-webkit-border-radius: 38px;
	-webkit-animation: bubblingG 0.7s infinite alternate;
	-ms-border-radius: 38px;
	-ms-animation: bubblingG 0.7s infinite alternate;
	-o-border-radius: 38px;
	-o-animation: bubblingG 0.7s infinite alternate;
	border-radius: 38px;
	animation: bubblingG 0.7s infinite alternate;
}

#imd-bubblingG_1 {
	-moz-animation-delay: 0s;
	-webkit-animation-delay: 0s;
	-ms-animation-delay: 0s;
	-o-animation-delay: 0s;
	animation-delay: 0s;
}

#imd-bubblingG_2 {
	-moz-animation-delay: 0.21s;
	-webkit-animation-delay: 0.21s;
	-ms-animation-delay: 0.21s;
	-o-animation-delay: 0.21s;
	animation-delay: 0.21s;
}

#imd-bubblingG_3 {
	-moz-animation-delay: 0.42s;
	-webkit-animation-delay: 0.42s;
	-ms-animation-delay: 0.42s;
	-o-animation-delay: 0.42s;
	animation-delay: 0.42s;
}

@-moz-keyframes bubblingG {
	0% {
		width: 8px;
		height: 8px;
		background-color:<?php echo $vars['imedica-theme-color']; ?>;
		-moz-transform: translateY(0);
	}
	100% {
		width: 18px;
		height: 18px;
		background-color: <?php echo $vars['highlight-text-color']; ?>;
		-moz-transform: translateY(-16px);
	}
}

@-webkit-keyframes bubblingG {
	0% {
		width: 8px;
		height: 8px;
		background-color:<?php echo $vars['imedica-theme-color']; ?>;
		-webkit-transform: translateY(0);
	}
	100% {
		width: 18px;
		height: 18px;
		background-color:<?php echo $vars['highlight-text-color']; ?>;
		-webkit-transform: translateY(-16px);
	}
}

@-ms-keyframes bubblingG {
	0% {
		width: 8px;
		height: 8px;
		background-color:<?php echo $vars['imedica-theme-color']; ?>;
		-ms-transform: translateY(0);
	}
	100% {
		width: 18px;
		height: 18px;
		background-color:<?php echo $vars['highlight-text-color']; ?>;
		-ms-transform: translateY(-16px);
	}
}

@-o-keyframes bubblingG {
	0% {
		width: 8px;
		height: 8px;
		background-color:<?php echo $vars['imedica-theme-color']; ?>;
		-o-transform: translateY(0);
	}
	100% {
		width: 18px;
		height: 18px;
		background-color:<?php echo $vars['highlight-text-color']; ?>;
		-o-transform: translateY(-16px);
	}
}

@keyframes bubblingG {
	0% {
		width: 8px;
		height: 8px;
		background-color:<?php echo $vars['imedica-theme-color']; ?>;
		transform: translateY(0);
	}
	100% {
		width: 18px;
		height: 18px;
		background-color:<?php echo $vars['highlight-text-color']; ?>;
		transform: translateY(-16px);
	}
} 
/* imedica laoder */

/*CSS for colorbox - lightbox*/

#cboxOverlay {
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/overlay.png') repeat 0 0;
}
#colorbox {
    outline: 0;
}
#cboxTopLeft {
    width: 21px;
    height: 21px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') no-repeat -101px 0;
}
#cboxTopRight {
    width: 21px;
    height: 21px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') no-repeat -130px 0;
}
#cboxBottomLeft {
    width: 21px;
    height: 21px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') no-repeat -101px -29px;
}
#cboxBottomRight {
    width: 21px;
    height: 21px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') no-repeat -130px -29px;
}
#cboxMiddleLeft {
    width: 21px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') left top repeat-y;
}
#cboxMiddleRight {
    width: 21px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') right top repeat-y;
}
#cboxTopCenter {
    height: 21px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/border.png') 0 0 repeat-x;
}
#cboxBottomCenter {
    height: 21px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/border.png') 0 -29px repeat-x;
}
#cboxContent {
    background: #fff;
    overflow: hidden;
}
.cboxIframe {
    background: #fff;
}
#cboxError {
    padding: 50px;
    border: 1px solid #ccc;
}
#cboxLoadedContent {
    margin-bottom: 28px;
}
#cboxTitle {
    position: absolute;
    bottom: 4px;
    left: 0;
    text-align: center;
    width: 100%;
    color: #949494;
}
#cboxCurrent {
    position: absolute;
    bottom: 4px;
    left: 58px;
    color: #949494;
}
#cboxLoadingOverlay {
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/loading_background.png') no-repeat center center;
}
#cboxLoadingGraphic {
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/loading.gif') no-repeat center center;
}
/* these elements are buttons, and may need to have additional styles reset to avoid unwanted base styles */

#cboxPrevious,
#cboxNext,
#cboxSlideshow,
#cboxClose {
    border: 0;
    padding: 0;
    margin: 0;
    overflow: visible;
    width: auto;
    background: none;
}
/* avoid outlines on :active (mouseclick), but preserve outlines on :focus (tabbed navigating) */

#cboxPrevious:active,
#cboxNext:active,
#cboxSlideshow:active,
#cboxClose:active {
    outline: 0;
}
#cboxSlideshow {
    position: absolute;
    bottom: 4px;
    right: 30px;
    color: #0092ef;
}
#cboxPrevious {
    position: absolute;
    bottom: 0;
    left: 0;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') no-repeat -75px 0;
    width: 25px;
    height: 25px;
    text-indent: -9999px;
}
#cboxPrevious:hover {
    background-position: -75px -25px;
}
#cboxNext {
    position: absolute;
    bottom: 0;
    left: 27px;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') no-repeat -50px 0;
    width: 25px;
    height: 25px;
    text-indent: -9999px;
}
#cboxNext:hover {
    background-position: -50px -25px;
}
#cboxClose {
    position: absolute;
    bottom: 0;
    right: 0;
    background:url('<?php echo $vars['imd-dir']; ?>/css/colorbox/images/controls.png') no-repeat -25px 0;
    width: 25px;
    height: 25px;
    text-indent: -9999px;
}
#cboxClose:hover {
    background-position: -25px -25px;
}
.slick-loading .slick-list {
    background: #fff url("<?php echo $vars['imd-dir']; ?>/css/slick/ajax-loader.gif") center center no-repeat;
}

@media (min-width: 768px) {
    .container.imedica-container {
        width: 100%;
    }
}

/* BuddyPress Profile page styling */

#page .entry-content #buddypress div#item-header {
  margin: 0 0 -1px;
  border: 1px solid #ddd;
  padding: 15px;
  background-color: #fcfcfc;
  box-shadow: 0 1px 2px rgba(0,0,0,0.075);
}

#page .entry-content #buddypress div#item-header div#item-header-content {
  float: left;
  margin-left: 0;
  display: inline-block;
  width: 75%;
}
#page .entry-content #buddypress #item-nav .item-list-tabs {
  margin: 0 0 15px;
  border: 1px solid #ddd;
  background-color: #fcfcfc;
  box-shadow: 0 1px 2px rgba(0,0,0,0.075),inset -1px -1px #fff;
}
#page .entry-content #buddypress .item-list-tabs>ul {
  margin: 0 -1px -1px 0;
}
.buddypress .item-list-tabs>ul:before, .buddypress .item-list-tabs>ul:after {
  display: table;
  content: "";
}
#page .entry-content #buddypress #item-nav div.item-list-tabs ul li {
  width: 33.3333%;
  float: left;
  border-bottom: 1px solid #e7e7e7;
  border-right: 1px solid #e7e7e7;
}
#page .entry-content #buddypress #item-nav div.item-list-tabs ul li:nth-child(3n){
  border-right: none;
}

#page .entry-content #buddypress .item-list-tabs > ul > li.current > a, #buddypress .item-list-tabs > ul > li.selected > a{
  color:#107fc9;
}
#page .entry-content .item-list-tabs>ul>li.current>a, #buddypress .item-l0ist-tabs>ul>li.selected>a {
  background-color: #fff;
}
#page .entry-content #buddypress .item-list-tabs>ul>li {
  display: inline-block;
  line-height:normal;
}
#page .entry-content #buddypress div.item-list-tabs ul li a{
  padding:10px 10px;
}
#page .entry-content #buddypress div.item-list-tabs ul li.current a, #buddypress div.item-list-tabs ul li.selected a{
  background:none !important;
}
#page .entry-content #buddypress #item-nav div.item-list-tabs ul li a{
  position:relative;
}
#page .entry-content #buddypress #item-nav div.item-list-tabs ul li a span{
  position:absolute;
  right:-5px;
  top:-5px;
}
#page .entry-content #buddypress #item-body .item-list-tabs {
  margin: 0 0 15px !important;
  text-align: center !important;
}
#page .entry-content #buddypress #item-body .item-list-tabs > ul{
  margin:0px;
}
#page .entry-content #buddypress #item-body .item-list-tabs > ul>li.last {
  display: block;
  margin-top: 45px!important;
  width:100%;
}
#page .entry-content #buddypress #item-body .item-list-tabs ul>li.last label {
  display: none;
}
#page .entry-content #buddypress #item-body div.item-list-tabs ul li.last select {
  max-width: 100% !important;
  float:none;
}
#page .entry-content #buddypress #item-body div.item-list-tabs ul li {
  float:none;
}
#page .entry-content #buddypress #item-body div.item-list-tabs ul li.last select {
  max-width: 100% !important;
  float: none;
  width: 100%;
  height: 35px;
  border-radius: 6px;
  box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
  outline: none;
  border-color: rgba(153, 153, 153, 0.45);
}
#page .entry-content #buddypress #item-body #whats-new-form {
  margin-bottom: 15px !important;
  border: 1px solid #ddd;
  padding: 15px!important;
  background-color: #fcfcfc;
  box-shadow: 0 1px 2px rgba(0,0,0,0.075);
}
#page .entry-content #buddypress #item-body #whats-new-form:before, #buddypress #item-body #whats-new-form:after {
  display: table;
  content: "";
}
#page .entry-content #buddypress #item-body #whats-new-form #whats-new-avatar{
  display:none;
}
#page .entry-content #buddypress form#whats-new-form p.activity-greeting {
  line-height: .5em;
  margin-bottom: 15px;
  margin-left: 0px !important; 
  font-size: 18px;
}
#page .entry-content #buddypress #item-body #whats-new-form textarea {
  margin: 0 0 2px;
  width: 100%;
  height: 5em !important;
  border-radius: 6px;
  box-shadow: 0 1px 2px rgba(0,0,0,0.075);
  outline: none;
}
#page .entry-content #buddypress #whats-new-options{
  float:left;
}
#page .entry-content #buddypress #whats-new:focus {
  outline: none;
  border-color: #999 !important;
}
#page .entry-content #buddypress #item-nav div#object-nav {
  overflow: visible;
  display: inline-block;
  width: 100%;
}
#page .entry-content #buddypress form#whats-new-form #whats-new-content{
  margin-left:0px !important;
  padding: 0 0 30px 0px !important;
}
#page .entry-content #buddypress #item-nav div.item-list-tabs ul li a span{
  background: #107fc9;
  border-radius: 25%;
  color:#ffffff;
}
#page .entry-content #buddypress #item-nav div.item-list-tabs ul li:last-child {
  border-bottom: none;
}
#page .entry-content #buddypress .item-list {
  margin: 0;
  list-style: none;
}
#page .entry-content #buddypress .item-list>li {
  margin: 0 0 15px !important;
  border: 1px solid #ddd;
  padding: 15px;
  background-color: #fff;
  box-shadow: 0 1px 2px rgba(0,0,0,0.075);
}
#page .entry-content #buddypress ul.item-list li img.avatar {
  margin: 0 10px 0 10px;
  border-radius: 10%;
}
#page .entry-content #buddypress div.activity-meta {
  margin: 18px 0 0;
  clear: both;
  float: left;
  width: 100%;
}
#page .entry-content #buddypress div.activity-meta a {
  padding: 4px 8px;
  display: block;
  float: left;
  position: relative;
  border-right: 1px solid #ddd;
}
#page .entry-content #buddypress .activity-list li.mini .activity-avatar img.avatar {
  height: 50px; 
  margin-left:30px;
  width: 50px; 
}
@media (max-width: 768px){
  #page .entry-content #buddypress #item-nav div.item-list-tabs ul li{
    width:50%;
  }
  #page .entry-content #buddypress #item-nav div.item-list-tabs ul li:nth-child(3) {
    border-right: 1px solid #e7e7e7; 
  }
  #page .entry-content #buddypress #item-nav div.item-list-tabs ul li:nth-child(2n) {
    border-right: none;
  }
}
@media (max-width: 480px){
  #page .entry-content #buddypress #item-nav div.item-list-tabs ul li{
    float:none;
    width:100%;
  }
  #page .entry-content #buddypress #item-nav div.item-list-tabs ul li:nth-child(3n) {
    border-right: 1px solid #e7e7e7;
  }
  #page .entry-content #buddypress #item-nav div.item-list-tabs ul li a span {
    position: absolute;
    right: 5px;
    top: 10px;
  }
  #page .entry-content #buddypress div#item-header div#item-header-content{
    width:100%;
  }
}
.hidden_title{
  display: none;
}

/* WordPress 4.3 Compatibility Fixes */ 

.ult-testiblock-auth-social *:not(i),
.price-table p,
.imd-price-list-element-wrap span,
.recent-post-vc .post-meta-grid a,
.recent-post-vc .post-meta-grid span,
.recent-post-vc .post-excerpt *,
.icon-box-3 .icon-description *,
.imedica-btn > p {
    font-family: inherit !important;
    font-size: inherit !important;
    font-style: inherit !important;
    color: inherit !important;
    line-height: inherit !important
}

<?php
  /*  Code created by Dinesh Chouhan for new Padding Layout */
  if( isset( $vars['imedica-padded-template'] ) && $vars['imedica-padded-template'] != "" ) { ?>

    #page.container-padded {
      background-color: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-padded-body-bg-color'], $vars['imedica-padded-body-bg-opacity']) ?>;
    }
    
    @media (min-width: 780px) {
      <?php if( $vars['imedica-padded-bg-img'] != "" ) { ?>
        body  {
          background-image: <?php echo $vars['imedica-padded-bg-img'] ?>;
          background-repeat: <?php echo $vars['imd-padded-bg-img-repeat'] ?>;
          border: <?php echo $vars['imedica-padded-template'] . ' solid ' . $color_adjuster->imd_Hex2RGBA( $vars['imedica-padded-bg-color'], 0) ?>;
        }
      <?php } else { ?>
      body {
        border: <?php echo $vars['imedica-padded-template'] . ' solid ' . $color_adjuster->imd_Hex2RGBA( $vars['imedica-padded-bg-color'], $vars['imedica-padded-bg-opacity']) ?>;
      }
      <?php } ?>
    }

<?php  } // Code closed by Dinesh Chouhan?>


/* CSS for sticky header height otions */

<?php if ( $vars['toggle-height-sticky'] == true ) { 

  $percentage = 40;
  $totalHeight = $vars['custom-height-sticky'];

  $new_height = $totalHeight - ($percentage / 100) * $totalHeight;

  ?>
  .navbar-inverse.navbar-fixed-top.header-default.header-fixed {
      height: <?php echo $vars['custom-height-sticky']; ?>px;
  }
  .navbar-inverse.header-default ul.nav-menu > li.menu-item a {
      line-height: <?php echo $vars['custom-height-sticky']; ?>px; 
  }
  .navbar-inverse.navbar-fixed-top.header-default.header-fixed .site-logo-img img {
      height: <?php  echo $new_height.'px'; ?>;
  }
  .header-default.header-fixed .site-title {
      line-height: <?php echo $vars['custom-height-sticky']; ?>px !important;
  }
  .imedica_sticky_header .navbar-inverse.header-fixed .site-title {
      padding: 0 !important;
  }
  .navbar-fixed-top {
    box-shadow: 0 1px 10px -5px rgba(0, 0, 0, 0.4) !important;
  }
<?php }  ?>

.gryscaleimg .aio-icon-img:hover,
.gryscaleimg .vc_single_image-img:hover {
    filter: none;
    -webkit-filter: grayscale(0);
    opacity: 1;
    -moz-transition: all 0.6s ease;
    -webkit-transition: all 0.6s ease;
    -ms-transition: all 0.6s ease;
    -o-transition: all 0.6s ease;
    transition: all 0.6s ease;
}
.gryscaleimg .aio-icon-img,
.gryscaleimg .vc_single_image-img {
    filter:url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /*     Firefox 10+, Firefox on Android */
    filter:gray; /* IE6-9 */
    -webkit-filter:grayscale(100%); /* Chrome 19+, Safari 6+, Safari 6+ iOS */
    -moz-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    opacity: 0.3;
    -moz-transition: all 0.6s ease;
    -webkit-transition: all 0.6s ease;
    -ms-transition: all 0.6s ease;
    -o-transition: all 0.6s ease;
    transition: all 0.6s ease;
}

.over_the_slider {
  z-index: 29;
  margin-top: -100px;
  display: inline-block;
  width: 100%;
  margin-left: 0 !important;
  margin-right: 0 !important;
}

@media screen and (max-width: 768px) {
  .over_the_slider {
    margin-top: 0;
    display: block;
    width: auto;
  }
}

/* Custom CSS form new form style   */
#new_search_form {
    min-width: 230px;
    position: absolute;
    right: 0px;
    bottom: 0px;
    top:100%;
    height: 70%;
    z-index: 9999;
    padding: 7px 14px;
    background-color: #fff;
    box-shadow: 0px 3px 10px 1px rgba(0, 0, 0, 0.2);
}

#new_search_form input[type="text"] {
  width: 240px;
}

#new_search_form input[type="text"]:focus {
  box-shadow:none;
}

#new_search_form .button.search-submit{
  position: relative;
  left: -3px;
}

.imd-bounceIt{
  animation-duration: 0.4s;
  animation-name: imd-bounceIn;
}

@keyframes imd-bounceIn {
  0% {
    transform: scale(0.8);
    opacity: 0;
  }
  60% {
    transform: scale(1.05);
    opacity: 1;
  }
  100% {
    transform: scale(1);
  }
}

@media (max-width:782px) {
  #new_search_form {
    display:none !important;
  }
}

/* CSS for schema tags */
.entry-date.published {
    display: none;
}

/* slick slider navigation dots alignment */
.slick-slider .slick-dots {
    padding-left: 0;
}

/* mailchimp footer widget center aligned in internet explorer */
input[type=email] {
    padding: 0px 0px 0px 8px;
}

/* Full width for Upcomming Events Plugin */
.widget.upcoming_events_widget{
  width:100%;
}

/* fix header default image going out of wrapper in firefox */
.header-default .site-logo-img {
    width: 100%;
}

<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;