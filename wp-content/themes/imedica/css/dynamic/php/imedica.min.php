<?php
global $vars;
ob_start();
imedica_less_vars();
?>

.imedica_margin_fix .imedica_gallery_wrap {
    margin-bottom: 35px
}

.imedica_image_gallery .bx-wrapper {
    position: relative;
    margin: 0 auto;
    padding: 7px;
    border: 1px solid #eee
}

.imedica_image_gallery .bx-wrapper img {
    max-width: 100%;
    display: block
}

.bx-wrapper .bx-viewport {
    -moz-box-shadow: 0 0 1px #ccc;
    -webkit-box-shadow: 0 0 1px #ccc;
    box-shadow: 0 0 1px #ccc;
    border: 0;
    left: 0;
    background: #fff;
    -webkit-transform: translatez(0);
    -moz-transform: translatez(0);
    -ms-transform: translatez(0);
    -o-transform: translatez(0);
    transform: translatez(0)
}

.bx-wrapper .bx-controls-auto, .bx-wrapper .bx-pager {
    position: absolute;
    bottom: -30px;
    width: 100%
}

.bx-wrapper .bx-loading {
    min-height: 50px;
    background: url(<?php echo $vars[ 'imd-dir' ]; ?>/css/slick/ajax-loader.gif) center center no-repeat #fff;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2000
}

.bx-pager, .bx-wrapper .bx-controls-direction a {
    z-index: 99
}

.bx-wrapper .bx-pager {
    text-align: center;
    font-size: .85em;
    font-family: Arial;
    font-weight: 700;
    color: #666;
    top: 0
}

.bx-wrapper .bx-controls-auto .bx-controls-auto-item, .bx-wrapper .bx-pager .bx-pager-item {
    display: inline-block
}

.bx-wrapper .bx-pager.bx-default-pager a {
    background: #666;
    text-indent: -9999px;
    display: block;
    width: 10px;
    height: 10px;
    margin: 0 5px;
    outline: 0;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px
}

.bx-wrapper .bx-pager.bx-default-pager a.active, .bx-wrapper .bx-pager.bx-default-pager a:hover {
    background: #000
}

.bx-next {
    right: 7px
}

.bx-prev {
    left: 7px
}

.bx-wrapper .bx-controls-direction a i {
    position: absolute;
    top: 49%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
       -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
         -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
}

.site-content .bx-wrapper .bx-controls-direction a {
    position: absolute;
    top: 50%;
    margin-top: -16px;
    outline: 0;
    width: 1.8em;
    height: 1.8em;
    text-indent: 0;
    text-align: center;
    font-size: 15px;
    border: 1px solid <?php echo $vars["imedica-theme-color"]; ?>;
    display: block;
    background: 0 0;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out
}

.bx-wrapper .bx-controls-direction a:hover {
    color: #fff;
    background: <?php echo $vars["imedica-theme-color"]; ?>;
    border-color: <?php echo $vars["imedica-theme-color"]; ?>
}

.bx-wrapper .bx-controls-direction a.disabled {
    display: none
}

.bx-wrapper .bx-controls-auto {
    text-align: center
}

.bx-wrapper .bx-controls-auto .bx-start {
    display: block;
    text-indent: -9999px;
    width: 10px;
    height: 11px;
    outline: 0;
    background: url(<?php echo $vars[ 'imd-dir' ]; ?>/css/colorbox/images/controls.png) - 86 px - 11 px no-repeat;
    margin: 0 3px
}

.bx-wrapper .bx-controls-auto .bx-start.active, .bx-wrapper .bx-controls-auto .bx-start:hover {
    background-position: -86px 0
}

.bx-wrapper .bx-controls-auto .bx-stop {
    display: block;
    text-indent: -9999px;
    width: 9px;
    height: 11px;
    outline: 0;
    background: url(<?php echo $vars[ 'imd-dir' ]; ?>/css/colorbox/images/controls.png) - 86 px - 44 px no-repeat;
    margin: 0 3px
}

.bx-wrapper .bx-controls-auto .bx-stop.active, .bx-wrapper .bx-controls-auto .bx-stop:hover {
    background-position: -86px -33px
}

.bx-wrapper .bx-controls.bx-has-controls-auto.bx-has-pager .bx-pager {
    text-align: left;
    width: 80%
}

.bx-wrapper .bx-controls.bx-has-controls-auto.bx-has-pager .bx-controls-auto {
    right: 0;
    width: 35px
}

.bx-wrapper .bx-caption {
    position: absolute;
    bottom: 0;
    left: 0;
    background: rgba(80, 80, 80, .75);
    width: 100%
}

.bx-wrapper .bx-caption span {
    color: #fff;
    font-family: Arial;
    display: block;
    font-size: .85em;
    padding: 10px
}

div.bx-pager .imd-img-overlay {
    display: none
}

.bx-pager {
    display: inline-block;
}

.bx-pager a.bxslider-item {
    border: 1px solid #eee;
    padding: 7px;
    border-top: 0;
    float: left
}

.bx-wrapper .bx-viewport ul {
    margin: 0
}

.imedica_image_gallery .bx-wrapper .bx-viewport {
    height: auto !important
}

@charset "UTF-8";
.animated {
    -webkit-animation-duration: 1s;
    animation-duration: 1s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both
}

.animated.infinite {
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite
}

.animated.hinge {
    -webkit-animation-duration: 2s;
    animation-duration: 2s
}

.bounceIn, .bounceOut, .flipOutX, .flipOutY {
    animation-duration: .75s;
    -webkit-animation-duration: .75s
}

@-webkit-keyframes bounce {
    0%, 100%, 20%, 53%, 80% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
    40%, 43% {
        -webkit-transition-timing-function: cubic-bezier(.755, .050, .855, .060);
        transition-timing-function: cubic-bezier(.755, .050, .855, .060);
        -webkit-transform: translate3d(0, -30px, 0);
        transform: translate3d(0, -30px, 0)
    }
    70% {
        -webkit-transition-timing-function: cubic-bezier(.755, .050, .855, .060);
        transition-timing-function: cubic-bezier(.755, .050, .855, .060);
        -webkit-transform: translate3d(0, -15px, 0);
        transform: translate3d(0, -15px, 0)
    }
    90% {
        -webkit-transform: translate3d(0, -4px, 0);
        transform: translate3d(0, -4px, 0)
    }
}

@keyframes bounce {
    0%, 100%, 20%, 53%, 80% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
    40%, 43% {
        -webkit-transition-timing-function: cubic-bezier(.755, .050, .855, .060);
        transition-timing-function: cubic-bezier(.755, .050, .855, .060);
        -webkit-transform: translate3d(0, -30px, 0);
        transform: translate3d(0, -30px, 0)
    }
    70% {
        -webkit-transition-timing-function: cubic-bezier(.755, .050, .855, .060);
        transition-timing-function: cubic-bezier(.755, .050, .855, .060);
        -webkit-transform: translate3d(0, -15px, 0);
        transform: translate3d(0, -15px, 0)
    }
    90% {
        -webkit-transform: translate3d(0, -4px, 0);
        transform: translate3d(0, -4px, 0)
    }
}

.bounce {
    -webkit-animation-name: bounce;
    animation-name: bounce;
    -webkit-transform-origin: center bottom;
    -ms-transform-origin: center bottom;
    transform-origin: center bottom
}

@-webkit-keyframes flash {
    0%, 100%, 50% {
        opacity: 1
    }
    25%, 75% {
        opacity: 0
    }
}

@keyframes flash {
    0%, 100%, 50% {
        opacity: 1
    }
    25%, 75% {
        opacity: 0
    }
}

.flash {
    -webkit-animation-name: flash;
    animation-name: flash
}

@-webkit-keyframes pulse {
    0%, 100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1)
    }
    50% {
        -webkit-transform: scale3d(1.05, 1.05, 1.05);
        transform: scale3d(1.05, 1.05, 1.05)
    }
}

@keyframes pulse {
    0%, 100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1)
    }
    50% {
        -webkit-transform: scale3d(1.05, 1.05, 1.05);
        transform: scale3d(1.05, 1.05, 1.05)
    }
}

.pulse {
    -webkit-animation-name: pulse;
    animation-name: pulse
}

@-webkit-keyframes rubberBand {
    0%, 100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1)
    }
    30% {
        -webkit-transform: scale3d(1.25, .75, 1);
        transform: scale3d(1.25, .75, 1)
    }
    40% {
        -webkit-transform: scale3d(.75, 1.25, 1);
        transform: scale3d(.75, 1.25, 1)
    }
    50% {
        -webkit-transform: scale3d(1.15, .85, 1);
        transform: scale3d(1.15, .85, 1)
    }
    65% {
        -webkit-transform: scale3d(.95, 1.05, 1);
        transform: scale3d(.95, 1.05, 1)
    }
    75% {
        -webkit-transform: scale3d(1.05, .95, 1);
        transform: scale3d(1.05, .95, 1)
    }
}

@keyframes rubberBand {
    0%, 100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1)
    }
    30% {
        -webkit-transform: scale3d(1.25, .75, 1);
        transform: scale3d(1.25, .75, 1)
    }
    40% {
        -webkit-transform: scale3d(.75, 1.25, 1);
        transform: scale3d(.75, 1.25, 1)
    }
    50% {
        -webkit-transform: scale3d(1.15, .85, 1);
        transform: scale3d(1.15, .85, 1)
    }
    65% {
        -webkit-transform: scale3d(.95, 1.05, 1);
        transform: scale3d(.95, 1.05, 1)
    }
    75% {
        -webkit-transform: scale3d(1.05, .95, 1);
        transform: scale3d(1.05, .95, 1)
    }
}

.rubberBand {
    -webkit-animation-name: rubberBand;
    animation-name: rubberBand
}

@-webkit-keyframes shake {
    0%, 100% {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
    10%, 30%, 50%, 70%, 90% {
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0)
    }
    20%, 40%, 60%, 80% {
        -webkit-transform: translate3d(10px, 0, 0);
        transform: translate3d(10px, 0, 0)
    }
}

@keyframes shake {
    0%, 100% {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
    10%, 30%, 50%, 70%, 90% {
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0)
    }
    20%, 40%, 60%, 80% {
        -webkit-transform: translate3d(10px, 0, 0);
        transform: translate3d(10px, 0, 0)
    }
}

.shake {
    -webkit-animation-name: shake;
    animation-name: shake
}

@-webkit-keyframes swing {
    20% {
        -webkit-transform: rotate3d(0, 0, 1, 15deg);
        transform: rotate3d(0, 0, 1, 15deg)
    }
    40% {
        -webkit-transform: rotate3d(0, 0, 1, -10deg);
        transform: rotate3d(0, 0, 1, -10deg)
    }
    60% {
        -webkit-transform: rotate3d(0, 0, 1, 5deg);
        transform: rotate3d(0, 0, 1, 5deg)
    }
    80% {
        -webkit-transform: rotate3d(0, 0, 1, -5deg);
        transform: rotate3d(0, 0, 1, -5deg)
    }
    100% {
        -webkit-transform: rotate3d(0, 0, 1, 0deg);
        transform: rotate3d(0, 0, 1, 0deg)
    }
}

@keyframes swing {
    20% {
        -webkit-transform: rotate3d(0, 0, 1, 15deg);
        transform: rotate3d(0, 0, 1, 15deg)
    }
    40% {
        -webkit-transform: rotate3d(0, 0, 1, -10deg);
        transform: rotate3d(0, 0, 1, -10deg)
    }
    60% {
        -webkit-transform: rotate3d(0, 0, 1, 5deg);
        transform: rotate3d(0, 0, 1, 5deg)
    }
    80% {
        -webkit-transform: rotate3d(0, 0, 1, -5deg);
        transform: rotate3d(0, 0, 1, -5deg)
    }
    100% {
        -webkit-transform: rotate3d(0, 0, 1, 0deg);
        transform: rotate3d(0, 0, 1, 0deg)
    }
}

.swing {
    -webkit-transform-origin: top center;
    -ms-transform-origin: top center;
    transform-origin: top center;
    -webkit-animation-name: swing;
    animation-name: swing
}

@-webkit-keyframes tada {
    0%, 100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1)
    }
    10%, 20% {
        -webkit-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg)
    }
    30%, 50%, 70%, 90% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg)
    }
    40%, 60%, 80% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg)
    }
}

@keyframes tada {
    0%, 100% {
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1)
    }
    10%, 20% {
        -webkit-transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg)
    }
    30%, 50%, 70%, 90% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg)
    }
    40%, 60%, 80% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
        transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg)
    }
}

.tada {
    -webkit-animation-name: tada;
    animation-name: tada
}

@-webkit-keyframes wobble {
    0%, 100% {
        -webkit-transform: none;
        transform: none
    }
    15% {
        -webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
        transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg)
    }
    30% {
        -webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
        transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg)
    }
    45% {
        -webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
        transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg)
    }
    60% {
        -webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
        transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg)
    }
    75% {
        -webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
        transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg)
    }
}

@keyframes wobble {
    0%, 100% {
        -webkit-transform: none;
        transform: none
    }
    15% {
        -webkit-transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg);
        transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg)
    }
    30% {
        -webkit-transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg);
        transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg)
    }
    45% {
        -webkit-transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg);
        transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg)
    }
    60% {
        -webkit-transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg);
        transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg)
    }
    75% {
        -webkit-transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg);
        transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg)
    }
}

.wobble {
    -webkit-animation-name: wobble;
    animation-name: wobble
}

@-webkit-keyframes bounceIn {
    0%, 100%, 20%, 40%, 60%, 80% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.3, .3, .3);
        transform: scale3d(.3, .3, .3)
    }
    20% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1);
        transform: scale3d(1.1, 1.1, 1.1)
    }
    40% {
        -webkit-transform: scale3d(.9, .9, .9);
        transform: scale3d(.9, .9, .9)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(1.03, 1.03, 1.03);
        transform: scale3d(1.03, 1.03, 1.03)
    }
    80% {
        -webkit-transform: scale3d(.97, .97, .97);
        transform: scale3d(.97, .97, .97)
    }
    100% {
        opacity: 1;
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1)
    }
}

@keyframes bounceIn {
    0%, 100%, 20%, 40%, 60%, 80% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.3, .3, .3);
        transform: scale3d(.3, .3, .3)
    }
    20% {
        -webkit-transform: scale3d(1.1, 1.1, 1.1);
        transform: scale3d(1.1, 1.1, 1.1)
    }
    40% {
        -webkit-transform: scale3d(.9, .9, .9);
        transform: scale3d(.9, .9, .9)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(1.03, 1.03, 1.03);
        transform: scale3d(1.03, 1.03, 1.03)
    }
    80% {
        -webkit-transform: scale3d(.97, .97, .97);
        transform: scale3d(.97, .97, .97)
    }
    100% {
        opacity: 1;
        -webkit-transform: scale3d(1, 1, 1);
        transform: scale3d(1, 1, 1)
    }
}

.bounceIn {
    -webkit-animation-name: bounceIn;
    animation-name: bounceIn
}

@-webkit-keyframes bounceInDown {
    0%, 100%, 60%, 75%, 90% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, -3000px, 0);
        transform: translate3d(0, -3000px, 0)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate3d(0, 25px, 0);
        transform: translate3d(0, 25px, 0)
    }
    75% {
        -webkit-transform: translate3d(0, -10px, 0);
        transform: translate3d(0, -10px, 0)
    }
    90% {
        -webkit-transform: translate3d(0, 5px, 0);
        transform: translate3d(0, 5px, 0)
    }
    100% {
        -webkit-transform: none;
        transform: none
    }
}

@keyframes bounceInDown {
    0%, 100%, 60%, 75%, 90% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, -3000px, 0);
        transform: translate3d(0, -3000px, 0)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate3d(0, 25px, 0);
        transform: translate3d(0, 25px, 0)
    }
    75% {
        -webkit-transform: translate3d(0, -10px, 0);
        transform: translate3d(0, -10px, 0)
    }
    90% {
        -webkit-transform: translate3d(0, 5px, 0);
        transform: translate3d(0, 5px, 0)
    }
    100% {
        -webkit-transform: none;
        transform: none
    }
}

.bounceInDown {
    -webkit-animation-name: bounceInDown;
    animation-name: bounceInDown
}

@-webkit-keyframes bounceInLeft {
    0%, 100%, 60%, 75%, 90% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: translate3d(-3000px, 0, 0);
        transform: translate3d(-3000px, 0, 0)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate3d(25px, 0, 0);
        transform: translate3d(25px, 0, 0)
    }
    75% {
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0)
    }
    90% {
        -webkit-transform: translate3d(5px, 0, 0);
        transform: translate3d(5px, 0, 0)
    }
    100% {
        -webkit-transform: none;
        transform: none
    }
}

@keyframes bounceInLeft {
    0%, 100%, 60%, 75%, 90% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: translate3d(-3000px, 0, 0);
        transform: translate3d(-3000px, 0, 0)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate3d(25px, 0, 0);
        transform: translate3d(25px, 0, 0)
    }
    75% {
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0)
    }
    90% {
        -webkit-transform: translate3d(5px, 0, 0);
        transform: translate3d(5px, 0, 0)
    }
    100% {
        -webkit-transform: none;
        transform: none
    }
}

.bounceInLeft {
    -webkit-animation-name: bounceInLeft;
    animation-name: bounceInLeft
}

@-webkit-keyframes bounceInRight {
    0%, 100%, 60%, 75%, 90% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: translate3d(3000px, 0, 0);
        transform: translate3d(3000px, 0, 0)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate3d(-25px, 0, 0);
        transform: translate3d(-25px, 0, 0)
    }
    75% {
        -webkit-transform: translate3d(10px, 0, 0);
        transform: translate3d(10px, 0, 0)
    }
    90% {
        -webkit-transform: translate3d(-5px, 0, 0);
        transform: translate3d(-5px, 0, 0)
    }
    100% {
        -webkit-transform: none;
        transform: none
    }
}

@keyframes bounceInRight {
    0%, 100%, 60%, 75%, 90% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: translate3d(3000px, 0, 0);
        transform: translate3d(3000px, 0, 0)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate3d(-25px, 0, 0);
        transform: translate3d(-25px, 0, 0)
    }
    75% {
        -webkit-transform: translate3d(10px, 0, 0);
        transform: translate3d(10px, 0, 0)
    }
    90% {
        -webkit-transform: translate3d(-5px, 0, 0);
        transform: translate3d(-5px, 0, 0)
    }
    100% {
        -webkit-transform: none;
        transform: none
    }
}

.bounceInRight {
    -webkit-animation-name: bounceInRight;
    animation-name: bounceInRight
}

@-webkit-keyframes bounceInUp {
    0%, 100%, 60%, 75%, 90% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 3000px, 0);
        transform: translate3d(0, 3000px, 0)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate3d(0, -20px, 0);
        transform: translate3d(0, -20px, 0)
    }
    75% {
        -webkit-transform: translate3d(0, 10px, 0);
        transform: translate3d(0, 10px, 0)
    }
    90% {
        -webkit-transform: translate3d(0, -5px, 0);
        transform: translate3d(0, -5px, 0)
    }
    100% {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

@keyframes bounceInUp {
    0%, 100%, 60%, 75%, 90% {
        -webkit-transition-timing-function: cubic-bezier(.215, .61, .355, 1);
        transition-timing-function: cubic-bezier(.215, .61, .355, 1)
    }
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 3000px, 0);
        transform: translate3d(0, 3000px, 0)
    }
    60% {
        opacity: 1;
        -webkit-transform: translate3d(0, -20px, 0);
        transform: translate3d(0, -20px, 0)
    }
    75% {
        -webkit-transform: translate3d(0, 10px, 0);
        transform: translate3d(0, 10px, 0)
    }
    90% {
        -webkit-transform: translate3d(0, -5px, 0);
        transform: translate3d(0, -5px, 0)
    }
    100% {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

.bounceInUp {
    -webkit-animation-name: bounceInUp;
    animation-name: bounceInUp
}

@-webkit-keyframes bounceOut {
    20% {
        -webkit-transform: scale3d(.9, .9, .9);
        transform: scale3d(.9, .9, .9)
    }
    50%, 55% {
        opacity: 1;
        -webkit-transform: scale3d(1.1, 1.1, 1.1);
        transform: scale3d(1.1, 1.1, 1.1)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale3d(.3, .3, .3);
        transform: scale3d(.3, .3, .3)
    }
}

@keyframes bounceOut {
    20% {
        -webkit-transform: scale3d(.9, .9, .9);
        transform: scale3d(.9, .9, .9)
    }
    50%, 55% {
        opacity: 1;
        -webkit-transform: scale3d(1.1, 1.1, 1.1);
        transform: scale3d(1.1, 1.1, 1.1)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale3d(.3, .3, .3);
        transform: scale3d(.3, .3, .3)
    }
}

.bounceOut {
    -webkit-animation-name: bounceOut;
    animation-name: bounceOut
}

@-webkit-keyframes bounceOutDown {
    20% {
        -webkit-transform: translate3d(0, 10px, 0);
        transform: translate3d(0, 10px, 0)
    }
    40%, 45% {
        opacity: 1;
        -webkit-transform: translate3d(0, -20px, 0);
        transform: translate3d(0, -20px, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, 2000px, 0);
        transform: translate3d(0, 2000px, 0)
    }
}

@keyframes bounceOutDown {
    20% {
        -webkit-transform: translate3d(0, 10px, 0);
        transform: translate3d(0, 10px, 0)
    }
    40%, 45% {
        opacity: 1;
        -webkit-transform: translate3d(0, -20px, 0);
        transform: translate3d(0, -20px, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, 2000px, 0);
        transform: translate3d(0, 2000px, 0)
    }
}

.bounceOutDown {
    -webkit-animation-name: bounceOutDown;
    animation-name: bounceOutDown
}

@-webkit-keyframes bounceOutLeft {
    20% {
        opacity: 1;
        -webkit-transform: translate3d(20px, 0, 0);
        transform: translate3d(20px, 0, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(-2000px, 0, 0);
        transform: translate3d(-2000px, 0, 0)
    }
}

@keyframes bounceOutLeft {
    20% {
        opacity: 1;
        -webkit-transform: translate3d(20px, 0, 0);
        transform: translate3d(20px, 0, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(-2000px, 0, 0);
        transform: translate3d(-2000px, 0, 0)
    }
}

.bounceOutLeft {
    -webkit-animation-name: bounceOutLeft;
    animation-name: bounceOutLeft
}

@-webkit-keyframes bounceOutRight {
    20% {
        opacity: 1;
        -webkit-transform: translate3d(-20px, 0, 0);
        transform: translate3d(-20px, 0, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(2000px, 0, 0);
        transform: translate3d(2000px, 0, 0)
    }
}

@keyframes bounceOutRight {
    20% {
        opacity: 1;
        -webkit-transform: translate3d(-20px, 0, 0);
        transform: translate3d(-20px, 0, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(2000px, 0, 0);
        transform: translate3d(2000px, 0, 0)
    }
}

.bounceOutRight {
    -webkit-animation-name: bounceOutRight;
    animation-name: bounceOutRight
}

@-webkit-keyframes bounceOutUp {
    20% {
        -webkit-transform: translate3d(0, -10px, 0);
        transform: translate3d(0, -10px, 0)
    }
    40%, 45% {
        opacity: 1;
        -webkit-transform: translate3d(0, 20px, 0);
        transform: translate3d(0, 20px, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, -2000px, 0);
        transform: translate3d(0, -2000px, 0)
    }
}

@keyframes bounceOutUp {
    20% {
        -webkit-transform: translate3d(0, -10px, 0);
        transform: translate3d(0, -10px, 0)
    }
    40%, 45% {
        opacity: 1;
        -webkit-transform: translate3d(0, 20px, 0);
        transform: translate3d(0, 20px, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, -2000px, 0);
        transform: translate3d(0, -2000px, 0)
    }
}

.bounceOutUp {
    -webkit-animation-name: bounceOutUp;
    animation-name: bounceOutUp
}

@-webkit-keyframes fadeIn {
    0% {
        opacity: 0
    }
    100% {
        opacity: 1
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0
    }
    100% {
        opacity: 1
    }
}

.fadeIn {
    -webkit-animation-name: fadeIn;
    animation-name: fadeIn
}

@-webkit-keyframes fadeInDown {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes fadeInDown {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.fadeInDown {
    -webkit-animation-name: fadeInDown;
    animation-name: fadeInDown
}

@-webkit-keyframes fadeInDownBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, -2000px, 0);
        transform: translate3d(0, -2000px, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes fadeInDownBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, -2000px, 0);
        transform: translate3d(0, -2000px, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.fadeInDownBig {
    -webkit-animation-name: fadeInDownBig;
    animation-name: fadeInDownBig
}

@-webkit-keyframes fadeInLeft {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes fadeInLeft {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.fadeInLeft {
    -webkit-animation-name: fadeInLeft;
    animation-name: fadeInLeft
}

@-webkit-keyframes fadeInLeftBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(-2000px, 0, 0);
        transform: translate3d(-2000px, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes fadeInLeftBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(-2000px, 0, 0);
        transform: translate3d(-2000px, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.fadeInLeftBig {
    -webkit-animation-name: fadeInLeftBig;
    animation-name: fadeInLeftBig
}

@-webkit-keyframes fadeInRight {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes fadeInRight {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.fadeInRight {
    -webkit-animation-name: fadeInRight;
    animation-name: fadeInRight
}

@-webkit-keyframes fadeInRightBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(2000px, 0, 0);
        transform: translate3d(2000px, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes fadeInRightBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(2000px, 0, 0);
        transform: translate3d(2000px, 0, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.fadeInRightBig {
    -webkit-animation-name: fadeInRightBig;
    animation-name: fadeInRightBig
}

@-webkit-keyframes fadeInUp {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.fadeInUp {
    -webkit-animation-name: fadeInUp;
    animation-name: fadeInUp
}

@-webkit-keyframes fadeInUpBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 2000px, 0);
        transform: translate3d(0, 2000px, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes fadeInUpBig {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 2000px, 0);
        transform: translate3d(0, 2000px, 0)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.fadeInUpBig {
    -webkit-animation-name: fadeInUpBig;
    animation-name: fadeInUpBig
}

@-webkit-keyframes fadeOut {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0
    }
}

@keyframes fadeOut {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0
    }
}

.fadeOut {
    -webkit-animation-name: fadeOut;
    animation-name: fadeOut
}

@-webkit-keyframes fadeOutDown {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0)
    }
}

@keyframes fadeOutDown {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0)
    }
}

.fadeOutDown {
    -webkit-animation-name: fadeOutDown;
    animation-name: fadeOutDown
}

@-webkit-keyframes fadeOutDownBig {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, 2000px, 0);
        transform: translate3d(0, 2000px, 0)
    }
}

@keyframes fadeOutDownBig {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, 2000px, 0);
        transform: translate3d(0, 2000px, 0)
    }
}

.fadeOutDownBig {
    -webkit-animation-name: fadeOutDownBig;
    animation-name: fadeOutDownBig
}

@-webkit-keyframes fadeOutLeft {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0)
    }
}

@keyframes fadeOutLeft {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0)
    }
}

.fadeOutLeft {
    -webkit-animation-name: fadeOutLeft;
    animation-name: fadeOutLeft
}

@-webkit-keyframes fadeOutLeftBig {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(-2000px, 0, 0);
        transform: translate3d(-2000px, 0, 0)
    }
}

@keyframes fadeOutLeftBig {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(-2000px, 0, 0);
        transform: translate3d(-2000px, 0, 0)
    }
}

.fadeOutLeftBig {
    -webkit-animation-name: fadeOutLeftBig;
    animation-name: fadeOutLeftBig
}

@-webkit-keyframes fadeOutRight {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
    }
}

@keyframes fadeOutRight {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0)
    }
}

.fadeOutRight {
    -webkit-animation-name: fadeOutRight;
    animation-name: fadeOutRight
}

@-webkit-keyframes fadeOutRightBig {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(2000px, 0, 0);
        transform: translate3d(2000px, 0, 0)
    }
}

@keyframes fadeOutRightBig {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(2000px, 0, 0);
        transform: translate3d(2000px, 0, 0)
    }
}

.fadeOutRightBig {
    -webkit-animation-name: fadeOutRightBig;
    animation-name: fadeOutRightBig
}

@-webkit-keyframes fadeOutUp {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0)
    }
}

@keyframes fadeOutUp {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, -100%, 0);
        transform: translate3d(0, -100%, 0)
    }
}

.fadeOutUp {
    -webkit-animation-name: fadeOutUp;
    animation-name: fadeOutUp
}

@-webkit-keyframes fadeOutUpBig {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, -2000px, 0);
        transform: translate3d(0, -2000px, 0)
    }
}

@keyframes fadeOutUpBig {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(0, -2000px, 0);
        transform: translate3d(0, -2000px, 0)
    }
}

.fadeOutUpBig {
    -webkit-animation-name: fadeOutUpBig;
    animation-name: fadeOutUpBig
}

@-webkit-keyframes flip {
    0% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -360deg);
        transform: perspective(400px) rotate3d(0, 1, 0, -360deg);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out
    }
    40% {
        -webkit-transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
        transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out
    }
    50% {
        -webkit-transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
        transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in
    }
    80% {
        -webkit-transform: perspective(400px) scale3d(.95, .95, .95);
        transform: perspective(400px) scale3d(.95, .95, .95);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in
    }
    100% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in
    }
}

@keyframes flip {
    0% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -360deg);
        transform: perspective(400px) rotate3d(0, 1, 0, -360deg);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out
    }
    40% {
        -webkit-transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
        transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out
    }
    50% {
        -webkit-transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
        transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in
    }
    80% {
        -webkit-transform: perspective(400px) scale3d(.95, .95, .95);
        transform: perspective(400px) scale3d(.95, .95, .95);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in
    }
    100% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in
    }
}

.animated.flip {
    -webkit-backface-visibility: visible;
    backface-visibility: visible;
    -webkit-animation-name: flip;
    animation-name: flip
}

.flipInX, .flipInY, .flipOutX, .flipOutY {
    backface-visibility: visible !important;
    -webkit-backface-visibility: visible !important
}

@-webkit-keyframes flipInX {
    0% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in;
        opacity: 0
    }
    40% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in
    }
    60% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
        transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
        opacity: 1
    }
    80% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
        transform: perspective(400px) rotate3d(1, 0, 0, -5deg)
    }
    100% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px)
    }
}

@keyframes flipInX {
    0% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in;
        opacity: 0
    }
    40% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in
    }
    60% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
        transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
        opacity: 1
    }
    80% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
        transform: perspective(400px) rotate3d(1, 0, 0, -5deg)
    }
    100% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px)
    }
}

.flipInX {
    -webkit-animation-name: flipInX;
    animation-name: flipInX
}

@-webkit-keyframes flipInY {
    0% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in;
        opacity: 0
    }
    40% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
        transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in
    }
    60% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
        transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
        opacity: 1
    }
    80% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
        transform: perspective(400px) rotate3d(0, 1, 0, -5deg)
    }
    100% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px)
    }
}

@keyframes flipInY {
    0% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in;
        opacity: 0
    }
    40% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
        transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in
    }
    60% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
        transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
        opacity: 1
    }
    80% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -5deg);
        transform: perspective(400px) rotate3d(0, 1, 0, -5deg)
    }
    100% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px)
    }
}

.flipInY {
    -webkit-animation-name: flipInY;
    animation-name: flipInY
}

@-webkit-keyframes flipOutX {
    0% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px)
    }
    30% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        opacity: 1
    }
    100% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        opacity: 0
    }
}

@keyframes flipOutX {
    0% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px)
    }
    30% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        opacity: 1
    }
    100% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        opacity: 0
    }
}

.flipOutX {
    -webkit-animation-name: flipOutX;
    animation-name: flipOutX
}

@-webkit-keyframes flipOutY {
    0% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px)
    }
    30% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
        transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
        opacity: 1
    }
    100% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        opacity: 0
    }
}

@keyframes flipOutY {
    0% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px)
    }
    30% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
        transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
        opacity: 1
    }
    100% {
        -webkit-transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
        opacity: 0
    }
}

.flipOutY {
    -webkit-animation-name: flipOutY;
    animation-name: flipOutY
}

@-webkit-keyframes lightSpeedIn {
    0% {
        -webkit-transform: translate3d(100%, 0, 0) skewX(-30deg);
        transform: translate3d(100%, 0, 0) skewX(-30deg);
        opacity: 0
    }
    60% {
        -webkit-transform: skewX(20deg);
        transform: skewX(20deg);
        opacity: 1
    }
    80% {
        -webkit-transform: skewX(-5deg);
        transform: skewX(-5deg);
        opacity: 1
    }
    100% {
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

@keyframes lightSpeedIn {
    0% {
        -webkit-transform: translate3d(100%, 0, 0) skewX(-30deg);
        transform: translate3d(100%, 0, 0) skewX(-30deg);
        opacity: 0
    }
    60% {
        -webkit-transform: skewX(20deg);
        transform: skewX(20deg);
        opacity: 1
    }
    80% {
        -webkit-transform: skewX(-5deg);
        transform: skewX(-5deg);
        opacity: 1
    }
    100% {
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

.lightSpeedIn {
    -webkit-animation-name: lightSpeedIn;
    animation-name: lightSpeedIn;
    -webkit-animation-timing-function: ease-out;
    animation-timing-function: ease-out
}

@-webkit-keyframes lightSpeedOut {
    0% {
        opacity: 1
    }
    100% {
        -webkit-transform: translate3d(100%, 0, 0) skewX(30deg);
        transform: translate3d(100%, 0, 0) skewX(30deg);
        opacity: 0
    }
}

@keyframes lightSpeedOut {
    0% {
        opacity: 1
    }
    100% {
        -webkit-transform: translate3d(100%, 0, 0) skewX(30deg);
        transform: translate3d(100%, 0, 0) skewX(30deg);
        opacity: 0
    }
}

.lightSpeedOut {
    -webkit-animation-name: lightSpeedOut;
    animation-name: lightSpeedOut;
    -webkit-animation-timing-function: ease-in;
    animation-timing-function: ease-in
}

@-webkit-keyframes rotateIn {
    0% {
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transform: rotate3d(0, 0, 1, -200deg);
        transform: rotate3d(0, 0, 1, -200deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

@keyframes rotateIn {
    0% {
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transform: rotate3d(0, 0, 1, -200deg);
        transform: rotate3d(0, 0, 1, -200deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

.rotateIn {
    -webkit-animation-name: rotateIn;
    animation-name: rotateIn
}

@-webkit-keyframes rotateInDownLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

@keyframes rotateInDownLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

.rotateInDownLeft {
    -webkit-animation-name: rotateInDownLeft;
    animation-name: rotateInDownLeft
}

@-webkit-keyframes rotateInDownRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

@keyframes rotateInDownRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

.rotateInDownRight {
    -webkit-animation-name: rotateInDownRight;
    animation-name: rotateInDownRight
}

@-webkit-keyframes rotateInUpLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

@keyframes rotateInUpLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

.rotateInUpLeft {
    -webkit-animation-name: rotateInUpLeft;
    animation-name: rotateInUpLeft
}

@-webkit-keyframes rotateInUpRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate3d(0, 0, 1, -90deg);
        transform: rotate3d(0, 0, 1, -90deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

@keyframes rotateInUpRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate3d(0, 0, 1, -90deg);
        transform: rotate3d(0, 0, 1, -90deg);
        opacity: 0
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: none;
        transform: none;
        opacity: 1
    }
}

.rotateInUpRight {
    -webkit-animation-name: rotateInUpRight;
    animation-name: rotateInUpRight
}

@-webkit-keyframes rotateOut {
    0% {
        -webkit-transform-origin: center;
        transform-origin: center;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transform: rotate3d(0, 0, 1, 200deg);
        transform: rotate3d(0, 0, 1, 200deg);
        opacity: 0
    }
}

@keyframes rotateOut {
    0% {
        -webkit-transform-origin: center;
        transform-origin: center;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: center;
        transform-origin: center;
        -webkit-transform: rotate3d(0, 0, 1, 200deg);
        transform: rotate3d(0, 0, 1, 200deg);
        opacity: 0
    }
}

.rotateOut {
    -webkit-animation-name: rotateOut;
    animation-name: rotateOut
}

@-webkit-keyframes rotateOutDownLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
        opacity: 0
    }
}

@keyframes rotateOutDownLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate3d(0, 0, 1, 45deg);
        transform: rotate3d(0, 0, 1, 45deg);
        opacity: 0
    }
}

.rotateOutDownLeft {
    -webkit-animation-name: rotateOutDownLeft;
    animation-name: rotateOutDownLeft
}

@-webkit-keyframes rotateOutDownRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
        opacity: 0
    }
}

@keyframes rotateOutDownRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
        opacity: 0
    }
}

.rotateOutDownRight {
    -webkit-animation-name: rotateOutDownRight;
    animation-name: rotateOutDownRight
}

@-webkit-keyframes rotateOutUpLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
        opacity: 0
    }
}

@keyframes rotateOutUpLeft {
    0% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: left bottom;
        transform-origin: left bottom;
        -webkit-transform: rotate3d(0, 0, 1, -45deg);
        transform: rotate3d(0, 0, 1, -45deg);
        opacity: 0
    }
}

.rotateOutUpLeft {
    -webkit-animation-name: rotateOutUpLeft;
    animation-name: rotateOutUpLeft
}

@-webkit-keyframes rotateOutUpRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate3d(0, 0, 1, 90deg);
        transform: rotate3d(0, 0, 1, 90deg);
        opacity: 0
    }
}

@keyframes rotateOutUpRight {
    0% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        opacity: 1
    }
    100% {
        -webkit-transform-origin: right bottom;
        transform-origin: right bottom;
        -webkit-transform: rotate3d(0, 0, 1, 90deg);
        transform: rotate3d(0, 0, 1, 90deg);
        opacity: 0
    }
}

.rotateOutUpRight {
    -webkit-animation-name: rotateOutUpRight;
    animation-name: rotateOutUpRight
}

@-webkit-keyframes hinge {
    0% {
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out
    }
    20%, 60% {
        -webkit-transform: rotate3d(0, 0, 1, 80deg);
        transform: rotate3d(0, 0, 1, 80deg);
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out
    }
    40%, 80% {
        -webkit-transform: rotate3d(0, 0, 1, 60deg);
        transform: rotate3d(0, 0, 1, 60deg);
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        opacity: 1
    }
    100% {
        -webkit-transform: translate3d(0, 700px, 0);
        transform: translate3d(0, 700px, 0);
        opacity: 0
    }
}

@keyframes hinge {
    0% {
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out
    }
    20%, 60% {
        -webkit-transform: rotate3d(0, 0, 1, 80deg);
        transform: rotate3d(0, 0, 1, 80deg);
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out
    }
    40%, 80% {
        -webkit-transform: rotate3d(0, 0, 1, 60deg);
        transform: rotate3d(0, 0, 1, 60deg);
        -webkit-transform-origin: top left;
        transform-origin: top left;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        opacity: 1
    }
    100% {
        -webkit-transform: translate3d(0, 700px, 0);
        transform: translate3d(0, 700px, 0);
        opacity: 0
    }
}

.hinge {
    -webkit-animation-name: hinge;
    animation-name: hinge
}

@-webkit-keyframes rollIn {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
        transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

@keyframes rollIn {
    0% {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg);
        transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg)
    }
    100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none
    }
}

.rollIn {
    -webkit-animation-name: rollIn;
    animation-name: rollIn
}

@-webkit-keyframes rollOut {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
        transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg)
    }
}

@keyframes rollOut {
    0% {
        opacity: 1
    }
    100% {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg);
        transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg)
    }
}

.rollOut {
    -webkit-animation-name: rollOut;
    animation-name: rollOut
}

@-webkit-keyframes zoomIn {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.3, .3, .3);
        transform: scale3d(.3, .3, .3)
    }
    50% {
        opacity: 1
    }
}

@keyframes zoomIn {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.3, .3, .3);
        transform: scale3d(.3, .3, .3)
    }
    50% {
        opacity: 1
    }
}

.zoomIn {
    -webkit-animation-name: zoomIn;
    animation-name: zoomIn
}

@-webkit-keyframes zoomInDown {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
        transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
        transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

@keyframes zoomInDown {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
        transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
        transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

.zoomInDown {
    -webkit-animation-name: zoomInDown;
    animation-name: zoomInDown
}

@-webkit-keyframes zoomInLeft {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(-1000px, 0, 0);
        transform: scale3d(.1, .1, .1) translate3d(-1000px, 0, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(10px, 0, 0);
        transform: scale3d(.475, .475, .475) translate3d(10px, 0, 0);
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

@keyframes zoomInLeft {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(-1000px, 0, 0);
        transform: scale3d(.1, .1, .1) translate3d(-1000px, 0, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(10px, 0, 0);
        transform: scale3d(.475, .475, .475) translate3d(10px, 0, 0);
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

.zoomInLeft {
    -webkit-animation-name: zoomInLeft;
    animation-name: zoomInLeft
}

@-webkit-keyframes zoomInRight {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
        transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
        transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

@keyframes zoomInRight {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
        transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
        transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

.zoomInRight {
    -webkit-animation-name: zoomInRight;
    animation-name: zoomInRight
}

@-webkit-keyframes zoomInUp {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(0, 1000px, 0);
        transform: scale3d(.1, .1, .1) translate3d(0, 1000px, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
        transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

@keyframes zoomInUp {
    0% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(0, 1000px, 0);
        transform: scale3d(.1, .1, .1) translate3d(0, 1000px, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    60% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
        transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

.zoomInUp {
    -webkit-animation-name: zoomInUp;
    animation-name: zoomInUp
}

@-webkit-keyframes zoomOut {
    0% {
        opacity: 1
    }
    50% {
        opacity: 0;
        -webkit-transform: scale3d(.3, .3, .3);
        transform: scale3d(.3, .3, .3)
    }
    100% {
        opacity: 0
    }
}

@keyframes zoomOut {
    0% {
        opacity: 1
    }
    50% {
        opacity: 0;
        -webkit-transform: scale3d(.3, .3, .3);
        transform: scale3d(.3, .3, .3)
    }
    100% {
        opacity: 0
    }
}

.zoomOut {
    -webkit-animation-name: zoomOut;
    animation-name: zoomOut
}

@-webkit-keyframes zoomOutDown {
    40% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
        transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(0, 2000px, 0);
        transform: scale3d(.1, .1, .1) translate3d(0, 2000px, 0);
        -webkit-transform-origin: center bottom;
        transform-origin: center bottom;
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

@keyframes zoomOutDown {
    40% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
        transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(0, 2000px, 0);
        transform: scale3d(.1, .1, .1) translate3d(0, 2000px, 0);
        -webkit-transform-origin: center bottom;
        transform-origin: center bottom;
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

.zoomOutDown {
    -webkit-animation-name: zoomOutDown;
    animation-name: zoomOutDown
}

@-webkit-keyframes zoomOutLeft {
    40% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0);
        transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale(.1) translate3d(-2000px, 0, 0);
        transform: scale(.1) translate3d(-2000px, 0, 0);
        -webkit-transform-origin: left center;
        transform-origin: left center
    }
}

@keyframes zoomOutLeft {
    40% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0);
        transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale(.1) translate3d(-2000px, 0, 0);
        transform: scale(.1) translate3d(-2000px, 0, 0);
        -webkit-transform-origin: left center;
        transform-origin: left center
    }
}

.zoomOutLeft {
    -webkit-animation-name: zoomOutLeft;
    animation-name: zoomOutLeft
}

@-webkit-keyframes zoomOutRight {
    40% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(-42px, 0, 0);
        transform: scale3d(.475, .475, .475) translate3d(-42px, 0, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale(.1) translate3d(2000px, 0, 0);
        transform: scale(.1) translate3d(2000px, 0, 0);
        -webkit-transform-origin: right center;
        transform-origin: right center
    }
}

@keyframes zoomOutRight {
    40% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(-42px, 0, 0);
        transform: scale3d(.475, .475, .475) translate3d(-42px, 0, 0)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale(.1) translate3d(2000px, 0, 0);
        transform: scale(.1) translate3d(2000px, 0, 0);
        -webkit-transform-origin: right center;
        transform-origin: right center
    }
}

.zoomOutRight {
    -webkit-animation-name: zoomOutRight;
    animation-name: zoomOutRight
}

@-webkit-keyframes zoomOutUp {
    40% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
        transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(0, -2000px, 0);
        transform: scale3d(.1, .1, .1) translate3d(0, -2000px, 0);
        -webkit-transform-origin: center bottom;
        transform-origin: center bottom;
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

@keyframes zoomOutUp {
    40% {
        opacity: 1;
        -webkit-transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
        transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
        -webkit-animation-timing-function: cubic-bezier(.55, .055, .675, .19);
        animation-timing-function: cubic-bezier(.55, .055, .675, .19)
    }
    100% {
        opacity: 0;
        -webkit-transform: scale3d(.1, .1, .1) translate3d(0, -2000px, 0);
        transform: scale3d(.1, .1, .1) translate3d(0, -2000px, 0);
        -webkit-transform-origin: center bottom;
        transform-origin: center bottom;
        -webkit-animation-timing-function: cubic-bezier(.175, .885, .32, 1);
        animation-timing-function: cubic-bezier(.175, .885, .32, 1)
    }
}

.zoomOutUp {
    -webkit-animation-name: zoomOutUp;
    animation-name: zoomOutUp
}

@-webkit-keyframes slideInDown {
    0% {
        -webkit-transform: translateY(-100%);
        transform: translateY(-100%);
        visibility: visible
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0)
    }
}

@keyframes slideInDown {
    0% {
        -webkit-transform: translateY(-100%);
        transform: translateY(-100%);
        visibility: visible
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0)
    }
}

.slideInDown {
    -webkit-animation-name: slideInDown;
    animation-name: slideInDown
}

@-webkit-keyframes slideInLeft {
    0% {
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        visibility: visible
    }
    100% {
        -webkit-transform: translateX(0);
        transform: translateX(0)
    }
}

@keyframes slideInLeft {
    0% {
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        visibility: visible
    }
    100% {
        -webkit-transform: translateX(0);
        transform: translateX(0)
    }
}

.slideInLeft {
    -webkit-animation-name: slideInLeft;
    animation-name: slideInLeft
}

@-webkit-keyframes slideInRight {
    0% {
        -webkit-transform: translateX(100%);
        transform: translateX(100%);
        visibility: visible
    }
    100% {
        -webkit-transform: translateX(0);
        transform: translateX(0)
    }
}

@keyframes slideInRight {
    0% {
        -webkit-transform: translateX(100%);
        transform: translateX(100%);
        visibility: visible
    }
    100% {
        -webkit-transform: translateX(0);
        transform: translateX(0)
    }
}

.slideInRight {
    -webkit-animation-name: slideInRight;
    animation-name: slideInRight
}

@-webkit-keyframes slideInUp {
    0% {
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
        visibility: visible
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0)
    }
}

@keyframes slideInUp {
    0% {
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
        visibility: visible
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0)
    }
}

.slideInUp {
    -webkit-animation-name: slideInUp;
    animation-name: slideInUp
}

@-webkit-keyframes slideOutDown {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0)
    }
    100% {
        visibility: hidden;
        -webkit-transform: translateY(100%);
        transform: translateY(100%)
    }
}

@keyframes slideOutDown {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0)
    }
    100% {
        visibility: hidden;
        -webkit-transform: translateY(100%);
        transform: translateY(100%)
    }
}

.slideOutDown {
    -webkit-animation-name: slideOutDown;
    animation-name: slideOutDown
}

@-webkit-keyframes slideOutLeft {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0)
    }
    100% {
        visibility: hidden;
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%)
    }
}

@keyframes slideOutLeft {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0)
    }
    100% {
        visibility: hidden;
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%)
    }
}

.slideOutLeft {
    -webkit-animation-name: slideOutLeft;
    animation-name: slideOutLeft
}

@-webkit-keyframes slideOutRight {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0)
    }
    100% {
        visibility: hidden;
        -webkit-transform: translateX(100%);
        transform: translateX(100%)
    }
}

@keyframes slideOutRight {
    0% {
        -webkit-transform: translateX(0);
        transform: translateX(0)
    }
    100% {
        visibility: hidden;
        -webkit-transform: translateX(100%);
        transform: translateX(100%)
    }
}

.slideOutRight {
    -webkit-animation-name: slideOutRight;
    animation-name: slideOutRight
}

@-webkit-keyframes slideOutUp {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0)
    }
    100% {
        visibility: hidden;
        -webkit-transform: translateY(-100%);
        transform: translateY(-100%)
    }
}

@keyframes slideOutUp {
    0% {
        -webkit-transform: translateY(0);
        transform: translateY(0)
    }
    100% {
        visibility: hidden;
        -webkit-transform: translateY(-100%);
        transform: translateY(-100%)
    }
}

.slideOutUp {
    -webkit-animation-name: slideOutUp;
    animation-name: slideOutUp
}

@-webkit-keyframes justified-gallery-show-caption-animation {
    from {
        opacity: 0
    }
    to {
        opacity: .7
    }
}

@-moz-keyframes justified-gallery-show-caption-animation {
    from {
        opacity: 0
    }
    to {
        opacity: .7
    }
}

@-o-keyframes justified-gallery-show-caption-animation {
    from {
        opacity: 0
    }
    to {
        opacity: .7
    }
}

@keyframes justified-gallery-show-caption-animation {
    from {
        opacity: 0
    }
    to {
        opacity: .7
    }
}

@-webkit-keyframes justified-gallery-show-entry-animation {
    from {
        opacity: 0
    }
    to {
        opacity: 1
    }
}

@-moz-keyframes justified-gallery-show-entry-animation {
    from {
        opacity: 0
    }
    to {
        opacity: 1
    }
}

@-o-keyframes justified-gallery-show-entry-animation {
    from {
        opacity: 0
    }
    to {
        opacity: 1
    }
}

@keyframes justified-gallery-show-entry-animation {
    from {
        opacity: 0
    }
    to {
        opacity: 1
    }
}

.justified-gallery {
    width: 100%;
    position: relative;
    overflow: hidden
}

.justified-gallery > a, .justified-gallery > div {
    position: absolute;
    display: inline-block;
    overflow: hidden;
    opacity: 0;
    filter: alpha(opacity=0)
}

.justified-gallery > a > a > img, .justified-gallery > a > img, .justified-gallery > div > a > img, .justified-gallery > div > img {
    position: absolute;
    top: 50%;
    left: 50%;
    margin: 0;
    padding: 0;
    border: none
}

.justified-gallery > a > .caption, .justified-gallery > div > .caption {
    display: none;
    position: absolute;
    bottom: 0;
    padding: 0 5px;
    background-color: #000;
    left: 0;
    right: 0;
    margin: 0;
    color: #fff;
    font-size: 12px;
    line-height: 2em;
    font-weight: 300;
    font-family: sans-serif
}

.justified-gallery > a > .caption.caption-visible, .justified-gallery > div > .caption.caption-visible {
    display: initial;
    opacity: .7;
    filter: "alpha(opacity=70)";
    -webkit-animation: justified-gallery-show-caption-animation 500ms 0 ease;
    -moz-animation: justified-gallery-show-caption-animation 500ms 0 ease;
    -ms-animation: justified-gallery-show-caption-animation 500ms 0 ease
}

.justified-gallery > .entry-visible {
    opacity: 1;
    filter: alpha(opacity=100);
    -webkit-animation: justified-gallery-show-entry-animation 500ms 0 ease;
    -moz-animation: justified-gallery-show-entry-animation 500ms 0 ease;
    -ms-animation: justified-gallery-show-entry-animation 500ms 0 ease
}

.justified-gallery > .spinner {
    position: absolute;
    bottom: 0;
    margin-left: -24px;
    padding: 10px 0;
    left: 50%;
    opacity: initial;
    filter: initial;
    overflow: initial
}

.justified-gallery > .spinner > span {
    display: inline-block;
    opacity: 0;
    filter: alpha(opacity=0);
    width: 8px;
    height: 8px;
    margin: 0 4px;
    background-color: #000;
    border-radius: 6px
}

#cboxWrapper, .cboxPhoto {
    max-width: none
}

.cboxIframe, .cboxPhoto {
    display: block;
    border: 0
}

#cboxOverlay, #cboxWrapper, #colorbox {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9999;
    overflow: hidden
}

#cboxOverlay {
    position: fixed;
    width: 100%;
    height: 100%
}

#cboxBottomLeft, #cboxMiddleLeft {
    clear: left
}

#cboxContent {
    position: relative
}

#cboxLoadedContent {
    overflow: auto;
    -webkit-overflow-scrolling: touch
}

#cboxTitle {
    margin: 0
}

#cboxLoadingGraphic, #cboxLoadingOverlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%
}

#cboxClose, #cboxNext, #cboxPrevious, #cboxSlideshow {
    cursor: pointer
}

.cboxPhoto {
    float: left;
    margin: auto;
    -ms-interpolation-mode: bicubic
}

.cboxIframe {
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0
}

#cboxContent, #cboxLoadedContent, #colorbox {
    box-sizing: content-box;
    -moz-box-sizing: content-box;
    -webkit-box-sizing: content-box
}

.cboxIE #cboxBottomCenter, .cboxIE #cboxBottomLeft, .cboxIE #cboxBottomRight, .cboxIE #cboxMiddleLeft, .cboxIE #cboxMiddleRight, .cboxIE #cboxTopCenter, .cboxIE #cboxTopLeft, .cboxIE #cboxTopRight {
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF, endColorstr=#00FFFFFF)
}

@charset "UTF-8";
.slick-slider, .slick-track {
    position: relative;
    display: block
}

.slick-loading .slick-slide, .slick-loading .slick-track {
    visibility: hidden
}

.slick-slider {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -ms-touch-action: pan-y;
    touch-action: pan-y;
    -webkit-tap-highlight-color: transparent
}

.slick-list {
    position: relative;
    overflow: hidden;
    display: block;
    margin: 0;
    padding: 0
}

.slick-list:focus {
    outline: 0
}

.slick-loading .slick-list {
    background: url("<?php echo $vars['imd-dir']; ?>/css/slick/ajax-loader.gif") center center no-repeat #fff
}

.slick-list.dragging {
    cursor: pointer;
    cursor: hand
}

.slick-slider .slick-track {
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
}

.slick-track {
    left: 0;
    top: 0
}

.slick-track:after, .slick-track:before {
    content: "";
    display: table
}

.slick-track:after {
    clear: both
}

.slick-slide {
    float: left;
    height: 100%;
    min-height: 1px;
    display: none
}

[dir=rtl] .slick-slide {
    float: right
}

.slick-slide img {
    display: block;
    margin: 0 auto
}

.slick-slide.slick-loading img {
    display: none
}

.slick-slide.dragging img {
    pointer-events: none
}

.slick-initialized .slick-slide {
    display: block
}

.slick-vertical .slick-slide {
    display: block;
    height: auto;
    border: 1px solid transparent
}

@font-face {
    font-family: slick;
    src: url(<?php echo $vars[ 'imd-fonts-dir' ]; ?>/slick.eot);
    src: url(<?php echo $vars[ 'imd-fonts-dir' ]; ?>/slick.eot?#iefix)format("embedded-opentype"),url(<?php echo $vars['imd-fonts-dir']; ?>/slick.woff)format("woff"),url(<?php echo $vars['imd-fonts-dir']; ?>/slick.ttf)format("truetype"),url(<?php echo $vars['imd-fonts-dir']; ?>/slick.svg#slick)format("svg");
    font-weight: 400;
    font-style: normal
}

.imedica-row .ult-carousel-wrapper button.square-border, 
.imedica-row .ult-carousel-wrapper button.square-border {
    position: absolute;
    display: block;
    height: 32px;
    width: 32px;
    line-height: 0;
    font-size: 0;
    cursor: pointer;
    background: 0 0;
    color: transparent;
    top: 50%;
    -webkit-transform: translateY(-50%);
       -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
         -o-transform: translateY(-50%);
            transform: translateY(-50%);
    padding: 0;
    margin: 0;
    border: none;
    outline: 0;
    border-radius: 0;
}

.slick-next:focus, .slick-next:hover, .slick-prev:focus, .slick-prev:hover {
    outline: 0;
    background: 0 0;
    color: transparent
}

.slick-next:focus:before, .slick-next:hover:before, .slick-prev:focus:before, .slick-prev:hover:before {
    opacity: 1
}

.slick-next.slick-disabled:before, .slick-prev.slick-disabled:before {
    opacity: .25
}

.imedica-slideshow-gallery .slick-prev:before, .slick-next:before {
    font-family: FontAwesome;
    font-size: 15px;
    font-weight: 400;
    line-height: 1;
    color: #fff;
    opacity: .85;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: auto
}

.imedica-slideshow-gallery .slick-prev {
    left: 0
}

.imedica-slideshow-gallery [dir=rtl] .slick-prev {
    left: auto;
    right: -25px
}

.imedica-slideshow-gallery .slick-prev:before {
    content: "\f053"
}

.imedica-slideshow-gallery [dir=rtl] .slick-prev:before {
    content: "→"
}

.imedica-slideshow-gallery .slick-next {
    right: 0
}

.imedica-slideshow-gallery [dir=rtl] .slick-next {
    left: -25px;
    right: auto
}

.imedica-slideshow-gallery .slick-next:before {
    content: "\f054"
}

.imedica-slideshow-gallery [dir=rtl] .slick-next:before {
    content: "←"
}

.slick-slider {
    margin-bottom: 0
}

.slick-dots {
    position: absolute;
    bottom: -45px;
    list-style: none;
    display: block;
    text-align: center;
    padding: 0;
    width: 100%
}

.slick-dots li {
    position: relative;
    display: inline-block;
    height: 20px;
    width: 20px;
    margin: 0 5px;
    padding: 0;
    cursor: pointer
}

.slick-dots li button {
    border: 0;
    background: 0 0;
    display: block;
    height: 20px;
    width: 20px;
    outline: 0;
    line-height: 0;
    font-size: 0;
    color: transparent;
    padding: 5px;
    cursor: pointer
}

.slick-dots li button:focus, .slick-dots li button:hover {
    outline: 0
}

.slick-dots li button:focus:before, .slick-dots li button:hover:before {
    opacity: 1
}

.slick-dots li button:before {
    position: absolute;
    top: 0;
    left: 0;
    content: "•";
    width: 20px;
    height: 20px;
    font-family: slick;
    font-size: 6px;
    line-height: 20px;
    text-align: center;
    color: #000;
    opacity: .25;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale
}

.slick-dots li.slick-active button:before {
    color: #000;
    opacity: .75
}

.ultimate-gallery {
    position: relative;
    display: block
}
<?php
/* remove comments */
$str = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', ob_get_clean() );

/* remove tabs, spaces, newlines, etc. */
$str = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $str );

echo $str;