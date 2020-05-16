<?php
global $vars;
imedica_less_vars();
ob_start();
require_once( 'imedica-color-adjuster.php' );
$color_adjuster = new iMedica_Color_Adjuster;
?>
/*

Table of contents - 

1. VC tab element
2. iMedica Team Members
3. iMedica Team Members Style-2   // New Updated on 16th Sep. 2015
4. Icon List
5. Info Box  - ultimate
6. Before After Slider
7. recent posts element
8. imedica ititle

*/


/*VC tab element*/
/*default styling for accordion*/
#content .wpb_content_element .wpb_tabs_nav {
  background-color: white;
}

.wpb_accordion_section.group .ui-accordion-header-active {
  background: <?php echo $vars['highlight-text-background']; ?>;
}

.wpb_accordion_section.group .wpb_accordion_header.ui-state-active {
  border-bottom: 1px solid #DCDDDE;
}

.wpb_accordion_section.group .wpb_accordion_header {
  background: none;
  border: 1px solid #DCDDDE;
  margin: 0;
  border-bottom: none;
  line-height: 2.65em;
  transition: all 0.2s ease-in-out;
}

.wpb_accordion_section.group:last-child .wpb_accordion_header {
  border-bottom: 1px solid #dcddde
}

.wpb_accordion_section.group .wpb_accordion_header a {
  color: <?php echo $vars['highlight-text-color']; ?>;
  margin-left: 2em;
  padding-top: 0px;
  padding-bottom: 0px;
}

.wpb_accordion_section.group i.accrdn-icon {
  color: <?php echo $vars['highlight-text-color']; ?>;
}

/*styling for active element*/
.wpb_accordion_section.group .ui-state-active {
  background-color: <?php echo $vars['highlight-text-background']; ?>;
}

.wpb_accordion_section.group .ui-state-active a {
  color: <?php echo $vars['highlight-text-color']; ?>;
}

.wpb_accordion_section.group .ui-state-active i.accrdn-icon {
  color: <?php echo $vars['highlight-text-color']; ?>;
}

.wpb_accordion .wpb_accordion_wrapper .ui-state-default .ui-icon,
.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon {
  display: block;
  width: 20px;
  height: 20px;
  background-image: url('<?php echo $vars['imd-dir']; ?>/vc_templates/images/arrow.png');
  background-repeat: no-repeat;
  position: absolute;
  right: 0.7em;
  top: 50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  background-position: 80% 95%;
}

.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon {
  background-image: url('<?php echo $vars['imd-dir']; ?>/vc_templates/images/arrow.png');
  background-position: 100% -25%;
}

span.ui-accordion-header-icon.ui-icon.ui-icon-triangle-1-s {
  color: <?php echo $vars['highlight-text-color']; ?>;
}

span.ui-accordion-header-icon.ui-icon.ui-icon-triangle-1-s:before {
  content: "\e115";
  color: inherit;
}

span.ui-accordion-header-icon.ui-icon.ui-icon-triangle-1-e {
  color: <?php echo $vars['imedica-theme-color']; ?>;
}

span.ui-accordion-header-icon.ui-icon.ui-icon-triangle-1-e:before {
  content: "\e114";
  color: inherit;
}

.wpb_accordion .wpb_accordion_wrapper .ui-state-default .ui-icon,
.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon,
.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon {
  background: none;
}

.wpb_tabs.wpb_content_element .wpb_tabs_nav .ui-tabs-active {
  background-color: <?php echo $vars['highlight-text-background']; ?>;
  transition: all 0.15s ease-In;
}

.imd_tour_link.ui-state-active span {
    /* color: <?php echo $vars['highlight-text-color']; ?> */
}

.wpb_tabs.wpb_content_element .wpb_tabs_nav .ui-tabs-active a.ui-tabs-anchor,
.wpb_tabs.wpb_content_element .wpb_tabs_nav .ui-tabs-active a.ui-tabs-anchor i {
  color: <?php echo $vars['highlight-text-color']; ?> !important;
  transition: all 0.15s ease-In;
}

.wpb_tabs .wpb_tabs_nav li {
  transition: all 0.15s ease-In;
}

/*iMedica Team Members*/
.team-member-image {
    overflow: hidden;
}

.imedica_margin_fix .team-member-wrap {
  margin-bottom: 35px
}

.team-member-wrap {
  border: 1px solid #DCDDDE;
}

.team-member-image img {
  width: 100%;
}

.team-member-bio-wrap {
  text-align: center;
  padding: 10px;
}

.team-member-name {
  line-height: 1.6em;
  color: <?php echo $vars['imedica-theme-color']; ?>;
  font-size: 16px;
}

.team-member-image.team_img_hover:after {
  position: absolute;
  content: "";
  background-image: url("<?php echo $vars['imd-dir']; ?>/css/img/ov-plus.png");
  width: 83px;
  height: 83px;
  background-repeat: no-repeat;
  font-family: fontAwesome;
  font-size: 60px;
  color: #373737;
  font-weight: 300;
  top: 50%;
  left: 50%;
    -webkit-transform: translate(-50%, -50%);
     -moz-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
       -o-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  visibility: hidden;
  opacity: 0;
  transition: all .2s linear;
  z-index: 9999;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.team-member-wrap:hover .team-member-image.team_img_hover:before {
    width: 100%;
    position: absolute;
    height: 100%;
    background-color: <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 0.6 ); ?>;
    content: "";
    z-index: 9; 
    -webkit-box-shadow: inset 10px 10px 160px 20px <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 1 ); ?>;
    -moz-box-shadow: inset 10px 10px 160px 20px <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 1 ); ?>;
    box-shadow: inset 10px 10px 160px 20px <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 1 ); ?>;
    visibility: visible;
    opacity: 1;
}
.team-member-image.team_img_hover:before {
    width: 100%;
    position: absolute;
    height: 100%;
    content: "";
    z-index: 999;
    visibility: hidden;
    opacity: 0;
    -webkit-box-shadow: inset 10px 10px 160px 20px <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 1 ); ?>;
    -moz-box-shadow: inset 10px 10px 160px 20px <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 1 ); ?>;
    box-shadow: inset 10px 10px 160px 20px <?php echo $color_adjuster->imd_Hex2RGBA( $vars['imedica-theme-color'], 1 ); ?>;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
.team-member-wrap:hover .team-member-image.team_img_hover:before {
    visibility: visible;
    opacity: 1;
  -webkit-transition: all 0.3s ease-in-out;
     -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
       -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
}
.team-member-wrap:hover .team-member-image.team_img_hover:after {
    visibility: visible;
    opacity: 1;
  -webkit-transition: all 0.3s ease-in-out;
     -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
       -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
}
.imedica-call-to-action-wrapper.cta-shadow1:after {
  background-image: url('<?php echo $vars['imd-dir']; ?>/vc_templates/images/cta-shadow1.png');
}

.imedica-call-to-action-wrapper.cta-shadow2:after {
  background-image: url('<?php echo $vars['imd-dir']; ?>/vc_templates/images/cta-shadow2.png');
}

.imedica-call-to-action {
  text-align: center;
  padding: 5px 10px;
}

.imedica-btn-wrapper .imedica-btn {
  padding: 6px 15px 6px 10px;
  color: #fff;
  cursor: pointer;
  text-decoration: none;
  border-radius: 0px;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
  position: relative;
  z-index: 1;
  display: inline-block;
  text-align: center;
  transition: .5s;
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  box-shadow: 0 2px #0e70b1;
  /* animation */
}

.imedica-btn-wrapper .imedica-btn:hover,
.imedica-btn-wrapper .imedica-btn:visited {
  color: #fff;
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  transition: .5s;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
  box-shadow: 0 2px #0d67a3;
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-outline {
  display: inline-block;
  color: <?php echo $vars['imedica-theme-color']; ?>;
  margin-right: 15px;
  transition: .3s;
  background: #fff;
  border-bottom: 0;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
  box-shadow: none;
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-outline:hover {
  color: #fff;
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  transition: .5s;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-outline:hover .imedica-icon {
  color: #fff;
}

.imedica-btn-wrapper .imedica-btn.imedica-btn-outline .imedica-icon {
  color: <?php echo $vars['imedica-theme-color']; ?>;
  padding: 5px;
  line-height: 1em;
}

.price-figure {
  position: relative;
  font-size: 34px;
  color: #fff;
  width: 127px;
  height: 127px;
  border-radius: 50%;
  line-height: 100px;
  text-align: center;
  background: <?php echo $vars['imedica-theme-color']; ?>;
  margin: -64px auto 0 auto;
}

.price-table .learn-more {
  background: none repeat scroll 0% 0% <?php echo $vars['imedica-theme-color']; ?>;
  line-height: 51px;
  font-size: 20px;
  float: left;
  color: #FFF;
  text-align: center;
  width: 100%;
}

.price-table a {
  text-decoration: none;
}

.price-table.price-table-big {
  padding: 0px;
  width: 107%;
  background: <?php echo $vars['imedica-theme-color']; ?>;
  margin: -30px 0 0 -5px;
  position: relative;
  z-index: 99;
  box-shadow: 0 0 21px rgba(191, 188, 188, 0.4);
}

.price-table.price-table-big .price-figure img {
  float: left;
  position: absolute;
  top: 25px;
  left: 108px;
}

.price-table.price-table-big {
  padding: 0px;
  width: 107%;
  background: none repeat scroll 0% 0% <?php echo $vars['imedica-theme-color']; ?>;
  margin: -30px 0px 0px -10px;
  position: relative;
  z-index: 1;
  box-shadow: 0px 0px 21px rgba(191, 188, 188, 0.4);
}

.icon-box2-title {
  line-height: 1.3em;
  margin: 20px 0px 15px;
  width: 100%;
  text-align: center;
  color: #464A4C;
  font-size: 20px;
  font-family: <?php echo $vars['body-text-font']; ?>;
  letter-spacing: 0.5px;
  text-transform: capitalize;
  transition: all 0.2s ease-In;
}

.no_border {
  border: none;
  padding: 0px;
}

.icon-box-3 p {
  font-size: 13px;
  color: inherit;
  line-height: 1.4em;
  font-family: <?php echo $vars['body-text-font']; ?>;
  text-align: center;
  margin: 0px 0px 10px;
}

.icon-description {
  padding: 10px 10px 15px 15px;
  text-align: center;
  word-break: break-word;
  text-indent: initial;
}

.iconbox-readmore {
  height: 29px;
  width: 106px;
  transition: all 0.5s ease 0s;
  line-height: 27px;
  text-align: center;
  margin: 0px auto;
  border-radius: 0px;
  cursor: pointer;
}

.iconbox-readmore a {
  font-size: 13px;
  color: #FFF;
  font-family: <?php echo $vars['body-text-font']; ?>;
  text-decoration: none;
}

.icon-box-3:hover {
  background: none repeat scroll 0% 0% <?php echo $vars['imedica-theme-color']; ?>;
  border: 1px solid #eee;
  transition: all 0.5s ease 0s;
}

.icon-box-3:hover .icon-boxwrap2 {
  -webkit-transform: rotate(140deg);
  -moz-transform: rotate(140deg);
  -ms-transform: rotate(140deg);
  -o-transform: rotate(140deg);
  -webkit-transform: rotate(140deg);
  transform: rotate(140deg);
  -webkit-transform-origin: center;
  -moz-transform-origin: center;
  -ms-transform-origin: center;
  -o-transform-origin: center;
  -webkit-transform-origin: center;
  transform-origin: center;
  -webkit-transition: .5s;
  -moz-transition: .5s;
  -ms-transition: .5s;
  -o-transition: .5s;
  transition: .5s;
}

.icon-box-3:hover .icon-box-back2 {
  color: #FFF;
  -webkit-transform: rotate(-140deg);
  transform: rotate(-140deg);
  -webkit-transform-origin: center center 0px;
  transform-origin: center center 0px;
  transition: all 0.5s ease 0s;
}

.icon-box-3:hover .icon-box2-title {
  color: <?php echo $vars['imedica-theme-color']; ?>;
}

.icon-box-3:hover p {
  color: inherit;
}

.iconbox-readmore:hover a {
  color: #FFF;
}

.iconbox-readmore:hover {
  height: 29px;
  width: 106px;
  border: 1px solid red;
  transition: all 0.5s ease 0s;
}

.iconbox-readmore-none {
  width: 106px;
  transition: all 0.5s ease 0s;
  line-height: 27px;
  text-align: center;
  margin: 0px auto;
  border-radius: 0px;
  cursor: pointer;
}

.iconbox-readmore-none a {
  font-size: 13px;
  color: #000000;
  font-family: <?php echo $vars['body-text-font']; ?>;
  text-decoration: none;
}

.infofoldMe:before {
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  border-width: 12px 12px 0px 0px;
  border-color: <?php echo $vars['imedica-theme-color']; ?>;
}

.icon-box-back2.stop {
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
}

.fold_effect .icon-box-back2:after {
  content: '';
  position: absolute;
  bottom: -1px;
  right: -1px;
  border-width: 12px 12px 0px 0px;
  border-style: solid;
  border-top-color: inherit;
  border-right-color: inherit;
  outline: none;
  box-shadow: none;
}

.service-icon-container {
  height: auto;
  width: auto;
  float: left;
  position: relative;
  margin-right: 10px;
  perspective: 600px;
  border-color: <?php echo $vars['imedica-theme-color']; ?>;
  padding: 5px;
  padding-left: 0;
}

.service-box .rot-y .panel-icon {
  position: relative;
  transition-duration: 0.3s;
  transition-property: -webkit-transform;
  transition-property: transform;
    -webkit-transform: translateZ(0px);
     -moz-transform: translateZ(0px);
      -ms-transform: translateZ(0px);
       -o-transform: translateZ(0px);
          transform: translateZ(0px);
  display: inline-block;
}

.styl1icon {
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  color: #FFF;
  font-size: 35px;
  line-height: 35px;
  min-width: 2em;
  min-height: 2em;
  padding: 11px;
}

.foldMe1:before {
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  border-width: 15px 15px 0px 0px;
  border-style: solid;
  border-color: <?php echo $vars['imedica-theme-color']; ?>;
}

.price_list_name:after {
  content: '';
  width: 100px;
  height: 3px;
  position: absolute;
  bottom: -2px;
  left: 0;
  background: <?php echo $vars['imedica-theme-color']; ?>;
}

/* iMedica Team Members Style-2 */
.style-2.team-member-bio-wrap {
    padding: 35px 10px;
    margin: 0px;
}

.style-2 .team-member-name-wrap{
  width:100%;  
}

.style-2 .team-member-position {
    padding-bottom: 0px;
}

.style-2 .team-divider{
  padding-top:1px;
  margin-top: 15px;
  margin-bottom: 0px;
}

.style-2 .team-member-description{
  padding-top: 0px;
}

.style-2 .social-buttons a.team.social-icon {
    margin: 0px .4em;
    font-size: 16px;
}

.team-member-bio-wrap.style-2.style-left .team.social-icon:first-child {
    margin-left: 0;
}

.team-member-bio-wrap.style-2.style-right .team.social-icon:first-child {
    margin-right: 0;
}

.style-2 .social-buttons a.team.social-icon:hover {
  color: <?php echo $vars['imedica-theme-color']; ?> !important;
}
/* iMedica Team Members Style-2 Closed*/

/* Icon List */
div.imed_list ul li .uavc-list-content span.uavc-list-desc:hover {
  color: <?php echo $vars['imedica-theme-color']; ?>;
  padding-left: 5px;
}

div.imed_list ul li .uavc-list-content span.uavc-list-desc {
  transition: 0.20s all ease-in-out;
}

div.imed_list.uavc-list-icon li {
  padding-bottom: 15px !important;
  line-height: 1.3em !important;
}

button.slick-next.square-border:hover .ultsl-arrow-right6 {
  color: <?php echo $vars['imedica-theme-color']; ?>;
}

button.slick-next.square-border,
button.slick-prev.square-border {
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

button.slick-prev.square-border:hover .ultsl-arrow-left6 {
  color: <?php echo $vars['imedica-theme-color']; ?>;
}

button.slick-prev.square-border:hover {
  border-color: <?php echo $vars['imedica-theme-color']; ?> !important;
}

button.slick-next.square-border:hover .ultsl-arrow-left6 {
  color: <?php echo $vars['imedica-theme-color']; ?>;
}

button.slick-next.square-border:hover {
  border-color: <?php echo $vars['imedica-theme-color']; ?> !important;
}

/*Info Box  - ultimate*/
.imed_ico_list .aio-icon-box,
.wpb_column > .wpb_wrapper .aio-icon-component .aio-icon-box {
  padding: 17px 0px 10px 0;
  margin-bottom: 0;
}
#page .imed_ico_list .aio-icon-box {
    margin-bottom: 0;
}
.imed_ico_list .aio-icon-component.style_1 {
  border-bottom: 1px solid #f1f2f2;
}

.imed_ico_list .aio-icon-component.style_1:last-child {
  border-bottom: none;
}

.imed_ico_list .aio-icon.advanced,
.imed_ico_list .aio-icon-title {
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.imed_ico_list .aio-icon-component:hover .aio-icon-title {
  color: <?php echo $vars['imedica-theme-color']; ?> !important;
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.imed_ico_list .aio-icon-component:hover .aio-icon.advanced {
  background-color: <?php echo $vars['imedica-theme-color']; ?> !important;
  color: <?php echo $vars['highlight-text-color']; ?> !important;
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

/*Before After Slider*/
.ba-outside .slide-pre,
.ba-outside .slide-nex {
  background: none;
  min-width: 1em;
  min-height: 1em;
  border: 1px solid <?php echo $vars['imedica-theme-color']; ?>;
  margin: 0 0 0 15px;
  opacity: 1;
  transition: opacity 500ms ease-in;
  -moz-transition: opacity 500ms ease-in;
  -ms-transition: opacity 500ms ease-in;
  -o-transition: opacity 500ms ease-in;
  -webkit-transition: opacity 500ms ease-in;
  border-radius: 50%;
  padding: 0.8em;
  position: relative;
  font-size: 20px;
  line-height: 20px;
  overflow: visible;
}

.ba-outside .slide-pre {
  float: right !important;
  background-position: 0% 0%;
  background-position: -2px -25px;
  position: relative;
}

.ba-outside .slide-pre:before {
  content: "\f104";
  position: absolute;
  color: <?php echo $vars['imedica-theme-color']; ?>;
  top: 48%;
  left: 44%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  font-size: inherit;
  line-height: inherit;
  font-family: 'Defaults';
}

.imedica-container .ba-outside a.bx-next,
.imedica-container .ba-outside a.bx-prev {
  text-decoration: none;
  line-height: 1px;
  color: rgba(0, 0, 0, 0) !important;
  font-size: 1px;
  float: left;
  padding: 10.5px;
  min-height: 1em;
  min-width: 1em;
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  left: 0;
  border-radius: 50%;
}

.ba-outside .slide-nex:before {
  content: "\f105";
  position: absolute;
  color: <?php echo $vars['imedica-theme-color']; ?>;
  top: 48%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  font-size: inherit;
  line-height: inherit;
  font-family: 'Defaults';
}

.ba-outside .slide-nex:hover {
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  color: #ffffff;
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.ba-outside .slide-pre:hover {
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  color: #ffffff;
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.ba-outside .slide-pre:hover:before {
  color: #ffffff;
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.ba-outside .slide-nex:hover:before {
  color: #ffffff;
  -webkit-transition: all .2s ease-in-out;
  -moz-transition: all .2s ease-in-out;
  -ms-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.beforeAfterSlidebar .imd-img-overlay {
  display: none;
}

.ba-outside {
  width: 100%;
  position: relative;
}

.ba-outside .slide-nex {
  position: absolute;
  left: 52%;
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
}

.ba-outside .slide-pre {
  position: absolute;
  right: 48%;
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
}

.baslider-main {
  box-shadow: none !important;
}

.bx-wrapper .bx-viewport {
  box-shadow: none !important;
}

.bx-viewport li.baslideli {
  border: 5px solid #fff;
}

.baslider-main .bx-wrapper .bx-viewport {
  border: none;
}

.baslider-main .bx-wrapper:after {
  position: absolute;
  content: '';
  width: 115%;
  height: 38px;
  bottom: 0px;
  z-index: -1;
  left: -7.5%;
  background-image: url('<?php echo $vars['imd-dir']; ?>/vc_templates/images/shadow.png');
  background-size: contain;
  background-position: bottom;
  background-repeat: no-repeat;
}

/*recent posts element*/
.recent-post-item .post-meta-grid {
  color: <?php echo $vars['imedica-theme-color']; ?>;
}

.imedica_recent_posts-no-thumb .recent-post-item .post-thumb {
    display: none;
}

/*imedica ititle*/

.imedica-ititle-wrapper .imedica-ititle.ititle-foldMe {
  display: block;
  background-color: <?php echo $vars['imedica-theme-color']; ?>;
  padding: 5px 20px;
  border-top-color: #0067A3;
  border-right-color: #fff;
}

/*Twitter VC element*/

span.twitter-timestamp {
  width: 100%;
  clear: both;
  display: block;
  margin-bottom: 15px;
  color: <?php echo $vars['body-text-color']; ?>;
  margin-top: 8px;
}

span.twitter-timestamp time {
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

ul.imedica-twitter-feed li:before {
  display: none;
}

ul.imedica-twitter-feed {
  display: block;
}

ul.imedica-twitter-feed .twitter-tweet {
  display: inline-block;
  width: 100%;
}

.twitter-tweet i {
  padding: 0;
  font-size: 17px;
  text-align: left;
  display: inline-block;
  vertical-align: top;
  width: 10%;
  color: <?php echo $vars['body-text-color']; ?>;
  line-height: 17px;
  margin-top: 3px;
}

ul.imedica-twitter-feed span.col-md-11 {
  display: inline-block;
  width: 90%;
  padding: 0;
}

/***************************** Vc deprecated element Tour Tab ********************************************/

/*--- for vc_tour---*/
.tour_icon, .wpb_tour .wpb_tabs_nav li {
    border-right: 1px solid #e0e1e2;
}
.tour_ext_class {
    margin-left: 10%;
}
.wpb_tour .wpb_tabs_nav li {
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -ms-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
}

/******************* less to css imported from vc***************/
/*********** plugins\js_composer\assets\less\shortcodes\vc_tabs_tour_accordion.less  ********************************/
.wpb_content_element .wpb_tabs_nav li a:focus,
.wpb_accordion_section .wpb_accordion_header a:focus,
.wpb_tour_next_prev_nav a:focus {
  outline: none;
}
/** Tabs/Tour Common **/
.wpb_content_element .wpb_tour_tabs_wrapper,
.wpb_content_element .wpb_tabs_nav {
  padding: 0;
}
.wpb_content_element .wpb_tabs_nav {
  margin: 0;
  padding-left: 0 !important;
  text-indent: inherit !important;
}
#content .wpb_content_element .wpb_tabs_nav {
  margin: 0;
}
.wpb_content_element .wpb_tabs_nav li {
  background-color: #ffffff;
  white-space: nowrap;
  padding: 0;
  background-image: none;
  list-style: none !important;
}
.wpb_content_element .wpb_tabs_nav li:after,
.wpb_content_element .wpb_tabs_nav li:before {
  display: none !important;
}
.wpb_content_element .wpb_tabs_nav li.ui-tabs-active,
.wpb_content_element .wpb_tabs_nav li:hover {
  background-color: #f7f7f7;
}
.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a {
  cursor: default;
}
.wpb_content_element .wpb_tour_tabs_wrapper .wpb_ui-tabs-hide {
  display: none;
}
/** Tabs/Tour/Accordion Common **/
.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav a,
.wpb_content_element .wpb_accordion_header a {
  border-bottom: none;
  text-decoration: none;
  display: block;
  padding: 0.5em 1em;
}
.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header,
.wpb_content_element.wpb_tabs .wpb_tour_tabs_wrapper .wpb_tab {
  background-color: #f7f7f7;
  border-left: 1px solid #dcddde;
  border-right: 1px solid #dcddde;
  border-bottom: 1px solid #dcddde;
}
.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tab,
.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_content {
  padding: 1em;
}
.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tab > .wpb_content_element:last-child,
.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_content > .wpb_content_element:last-child,
.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tab .wpb_row:last-child > div > div.wpb_wrapper .wpb_content_element:last-child,
.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_content .wpb_row:last-child > div > div.wpb_wrapper .wpb_content_element:last-child {
  margin-bottom: 0;
}
/** Tabs **/
.wpb_tabs .wpb_tabs_nav li {
  float: left;
  margin: 0 1px 0 0;
}
/** Tour **/
.wpb_tour .wpb_tabs_nav {
  float: left;
  width: 31.66666667%;
}
.wpb_tour .wpb_tabs_nav li {
  margin: 0 0 1px 0;
  clear: left;
  width: 100%;
}
.wpb_tour .wpb_tabs_nav a {
  width: 100%;
}
.wpb_tour .wpb_tour_tabs_wrapper .wpb_tab {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border: none;
  float: left;
  width: 68.33333333%;
  padding: 0 0 0 21.73913043px;
}
.wpb_tour_next_prev_nav {
  margin-left: 31.66666667%;
  padding-left: 21.73913043px;
  font-size: 80%;
}
.wpb_tour_next_prev_nav a {
  border-bottom: 1px dotted;
  text-decoration: none;
}
.wpb_tour_next_prev_nav a:hover {
  text-decoration: none;
  border-bottom: none;
}
.wpb_tour_next_prev_nav span {
  width: 48%;
  display: inline-block;
  padding-top: 1em;
  float: left;
}
.wpb_tour_next_prev_nav span.wpb_next_slide {
  text-align: right;
  float: right;
}
/** Accordion **/
.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header {
  margin: 0 0 1px 0;
  padding-top: 0;
  position: relative;
  text-transform: none;
  font-weight: inherit;
  font-size: inherit;
  font-family: inherit;
  line-height: inherit;
  letter-spacing: inherit;
}
.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a {
  padding-left: 1em;
  height: auto;
  line-height: 2.65em;
}
.wpb_accordion .wpb_accordion_wrapper .ui-state-default .ui-icon,
.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon {
  display: block;
  width: 16px;
  height: 16px;
  background-image: url('<?php echo $vars['imd-dir']; ?>/vc_templates/images/toggle_open.png');
  background-repeat: no-repeat;
  position: absolute;
  right: 0.7em;
  top: 0.7em;
}
.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon {
  background-image: url('<?php echo $vars['imd-dir']; ?>/vc_templates/images/toggle_close.png');
}
/* tabs_tour_accordion responsive rules */
@media (max-width: 480px) {
  .vc_responsive .wpb_tour .wpb_tour_tabs_wrapper .wpb_tabs_nav,
  .vc_responsive .wpb_tour .wpb_tab,
  .vc_responsive .wpb_tour_next_prev_nav {
    width: 100%;
    float: none;
    margin-left: 0;
  }
  .vc_responsive .wpb_tour_next_prev_nav {
    width: auto;
    padding: 0 1em;
  }
  .vc_responsive #content .wpb_tour .wpb_tour_tabs_wrapper .wpb_tabs_nav {
    margin-bottom: 1em;
  }
  .vc_responsive .wpb_tour .wpb_tab {
    padding-left: 1em;
    padding-right: 1em;
  }
}
/******* end common ***************/

/***********************Vc deprcate elemnt style end***************************/
<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;