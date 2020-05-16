(function ($) {
    "use strict";
    jQuery(window).load(function () {
        var anchor = '.mobile-top-menu ul.nav-menu > li.menu-item-has-children';
        jQuery(anchor).prepend('<b class="caret"><i class="fa fa-fw"></i></b>');
        if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
            jQuery('.mobile-top-menu ul.nav-menu li.menu-item-has-children b.caret').on('touchend', function() {
                jQuery(this).parent().toggleClass('open');
            });
            jQuery('.mobile-top-menu .primary-navigation .nav-menu li a').on('touchend', function() {
                var el = jQuery(this);
                var link = el.attr('href');
                window.location = link;
            });
        } else {
            jQuery('.mobile-top-menu ul.nav-menu li.menu-item-has-children b.caret').on('click', function () {
                jQuery(this).parent().toggleClass('open');
            });
        }        
    });
    jQuery(window).resize(function () {
        jQuery(".ult-carousel-wrapper").each(function () {
            var $this = jQuery(this);
            if ($this.hasClass("ult_full_width")) {
                $this.removeAttr("style");
                var w = jQuery("html").outerWidth();
                var cw = $this.width();
                var left = (w - cw) / 2;
                $this.css({"position": "relative", "left": "-" + left + "px", "width": w + "px"});
            }
        });
    });
    jQuery(document).ready(function () {
        // Post Like
        jQuery("body").on("click", ".post-like a", function () {
            var heart = jQuery(this);
            var post_id = heart.data("post_id");
            jQuery.ajax({
                type: "post",
                url: ajaxurl,
                data: "action=post-like&nonce=" + ajax_nonce + "&imedica_post_like=&post_id=" + post_id,
                success: function (count) {
                    if (count.indexOf("already") !== -1) {
                        var lecount = count.replace("already", "");
                        if (lecount == 0) {
                            var lecount = "Like";
                        }
                        heart.children(".like").removeClass("pastliked").addClass("disliked").html("<i class='fa fa-heart'></i>");
                        heart.children(".count").removeClass("liked").addClass("disliked").text(lecount);
                    } else {
                        jQuery(".post-like.postid-" + post_id).html('<span class="like prevliked"><i class="fa fa-heart"></i></span> <span class="count alreadyliked">' + count + '</span>');
                    }
                }
            });
            return false;
        });
        jQuery(".ult-carousel-wrapper").each(function () {
            var $this = jQuery(this);
            if ($this.hasClass("ult_full_width")) {
                var w = jQuery("html").outerWidth();
                var cw = $this.width();
                var left = (w - cw) / 2;
                $this.css({
                    "position": "relative",
                    "left": "-" + left + "px",
                    "width": w + "px"
                });
            }
        });
        /*Scroll to top*/
        var h = jQuery("header.site-header-main").outerHeight();
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > h + 100) {
                jQuery('.imd-scroll-top').fadeIn();
            } else {
                jQuery('.imd-scroll-top').fadeOut();
            }
        });
        //Click event to scroll to top
        jQuery('.imd-scroll-top').click(function () {
            jQuery('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        // Apply lightbox to images
        jQuery('#page').find('a.imedica-lightbox').colorbox({
            maxWidth: '80%',
            maxHeight: '90%',
            rel: 'imedica-lightbox',
            opacity: 0.8,
            transition: 'elastic',
            current: ''
        });
    });
    jQuery(window).load(function () {
        var main_header = jQuery('.navbar-inverse1.header-default .site-navigation.primary-navigation ul.nav-menu > li > a');
        var stickyMenuList = jQuery('.navbar-inverse.header-default .site-navigation.primary-navigation ul.nav-menu > li > a');
        var title = jQuery('.navbar-inverse1.header-default div.header-main .site-heading').outerHeight();
        var stickyLogoHt = jQuery('.navbar-inverse.header-default div.header-main .site-title').outerHeight();
        var windowWidth = jQuery(window).width();
        if (windowWidth >= 783) {
            main_header.css({
                'line-height': title + 'px'
            });
            stickyMenuList.css({
                'line-height': stickyLogoHt + 'px'
            });
            jQuery('.menu-search-default-head').css({
                'line-height': title + 'px'
            }); 
            if ( jQuery('.navbar-inverse1').hasClass('header-default') ) {
                menuLineheight( title );
            };           
        } else {
            main_header.removeAttr('style');
        }
        var header_fixed = jQuery('.header-fixed').outerHeight() * 2;
        jQuery('.header-fixed').css('top', '-' + (header_fixed + 20) + 'px');
        var hPos = jQuery('.site-header-main').height();
        var b = document.body;
        var e = document.documentElement;
        var left = parseFloat(window.pageXOffset || b.scrollLeft || e.scrollLeft);
        var top = parseFloat(window.pageYOffset || b.scrollTop || e.scrollTop);
        var main_header = jQuery('.header-main').outerHeight();        
        if (hPos < (top - main_header)) {
            jQuery('.header-fixed').css('top', '0px');
        } else {
            jQuery('.header-fixed').css('top', '-' + header_fixed + 'px');
        }
    });
    jQuery(window).resize(function (event) {
        var main_header = jQuery('.header-default .site-navigation.primary-navigation ul.nav-menu > li > a');
        var stickyMenuList = jQuery('.navbar-inverse.header-default .site-navigation.primary-navigation ul.nav-menu > li > a');
        var title = jQuery('.header-default div.header-main .site-heading').outerHeight();
        var stickyLogoHt = jQuery('.navbar-inverse.header-default div.header-main .site-title').outerHeight();
        var windowWidth = jQuery(window).width();
        if (windowWidth >= 768) {
            main_header.css({'line-height': title + 'px'});
            stickyMenuList.css({'line-height': stickyLogoHt + 'px'});
            if ( jQuery('.navbar-inverse1').hasClass('header-default') ) {
                menuLineheight( title );
            };  
        } else {
            main_header.css('line-height', 'inherit');
        }
    });
    // Fixed header
    jQuery(window).scroll(function () {
        var hPos = jQuery('.site-header-main').height();
        var b = document.body;
        var e = document.documentElement;
        var left = parseFloat(window.pageXOffset || b.scrollLeft || e.scrollLeft);
        var top = parseFloat(window.pageYOffset || b.scrollTop || e.scrollTop);
        var main_header = jQuery('.header-main').outerHeight();
        var header_fixed = jQuery('.header-fixed').outerHeight() * 2;
        if (hPos < (top - main_header)) {
            jQuery('.header-fixed').css('top', '0px');
        } else {
            jQuery('.header-fixed').css('top', '-' + header_fixed + 'px');
        }
    });
    jQuery(window).load(function () {
        var parentList = 'ul.nav-menu li';
        jQuery(parentList).hover(function () {
            var subMenuOffset = jQuery(this).children('ul').offset();
            var pageMargin = jQuery('#page').css('margin-right').replace("px", "");
            if (subMenuOffset) {
                var distance = jQuery(window).width() - (subMenuOffset.left + jQuery(this).children('ul').width()) - pageMargin;
                if (distance < 0) {
                    jQuery(this).addClass('left_align');
                }
            }
            ;
        });
    })
    /*Price List js*/
    jQuery(document).ready(function () {
        var listElemWrap = jQuery('.imd-price-list-element-wrap');
        var listIconWrap = jQuery('.imd-price-list-element-wrap .imd-price-list-icon-wrap i');
        var elemHvColor = jQuery(listElemWrap, this).data('hv-color');
        var elemColor = jQuery(listElemWrap, this).data('color');
        var iconClr = jQuery(listIconWrap).data('icn-clr');
        var iconHvClr = jQuery(listIconWrap).data('icn-hv-clr');
        var icnBkClr = jQuery(listIconWrap).data('icn-bk-clr');
        var icnBkHvClr = jQuery(listIconWrap).data('icn-bk-hv-clr');
        jQuery('.price_list_name:after').addClass('class_name');
        jQuery(listElemWrap, this).hover(function () {
            /* Stuff to do when the mouse enters the element */
            jQuery(this).css('color', elemHvColor);
            jQuery(this).find("i").css({
                color: iconHvClr,
                background: icnBkHvClr,
            });
        }, function () {
            /* Stuff to do when the mouse leaves the element */
            jQuery(this).css('color', elemColor);
            jQuery(this).find("i").css({
                color: iconClr,
                background: icnBkClr
            });
        });
    });
    /*js for menu*/
    jQuery(window).load(function () {
        (function (e) {
            var t = jQuery("body");
            var n = jQuery(window);
            var r = jQuery(".imd-mobile-social-menu");
            var navMainMenu = jQuery("#primary-navigation");
            var navTopMenu = jQuery(".imedica-top-navigation");
            var headerMain = jQuery(".header-main");
            var i = jQuery(window).width();
            (function () {
                var e = jQuery("#primary-navigation");
                if (!e) {
                    return;
                }
                var t = e.find(".menu-toggle");
                if (!t) {
                    return;
                }
                var n = e.find(".nav-menu");
                if (!n || !n.children().length) {
                    t.hide();
                    return;
                }
                jQuery(".menu-toggle").on("click.fw_theme", function () {
                    r.removeClass("top-social-toggled-on");
                    navTopMenu.removeClass("top-menu-toggled-on");
                    e.toggleClass("toggled-on");
                    if (headerMain.hasClass("auto-height")) {
                        headerMain.removeClass("auto-height");
                    } else {
                        headerMain.addClass("auto-height");
                    }
                });
                jQuery(window).resize(function () {
                    if (jQuery(window).width() != i) {
                        headerMain.removeClass("auto-height");
                        e.removeClass("toggled-on");
                    }
                });
            })();
            (function () {
                var e = jQuery(".imedica-top-navigation");
                if (!e) {
                    return;
                }
                var t = e.find(".menu-toggle-top-menu");
                if (!t) {
                    return;
                }
                var n = e.find(".nav-menu");
                if (!n || !n.children().length) {
                    t.hide();
                    return;
                }
                jQuery(".menu-toggle-top-menu").on("click.fw_theme", function () {
                    r.removeClass("top-social-toggled-on");
                    navMainMenu.removeClass("toggled-on");
                    e.toggleClass("top-menu-toggled-on");
                    if (headerMain.hasClass("auto-height")) {
                        headerMain.removeClass("auto-height");
                    } else {
                        headerMain.addClass("auto-height");
                    }
                });
                jQuery(window).resize(function () {
                    if (jQuery(window).width() != i) {
                        headerMain.removeClass("auto-height");
                        e.removeClass("top-menu-toggled-on");
                    }
                });
            })();
            (function () {
                var e = jQuery(".imd-mobile-social-menu");
                if (!e) {
                    return;
                }
                var t = e.find(".menu-toggle-imd-top-social");
                if (!t) {
                    return;
                }
                jQuery(".menu-toggle-imd-top-social").on("click.fw_theme", function () {
                    navTopMenu.removeClass("top-menu-toggled-on");
                    navMainMenu.removeClass("toggled-on");
                    e.toggleClass("top-social-toggled-on");
                    if (headerMain.hasClass("auto-height")) {
                        headerMain.removeClass("auto-height");
                    } else {
                        headerMain.addClass("auto-height");
                    }
                });
                jQuery(window).resize(function () {
                    if (jQuery(window).width() != i) {
                        headerMain.removeClass("auto-height");
                        e.removeClass("top-social-toggled-on");
                        i = jQuery(window).width();
                    }
                });
            })();
            n.on("hashchange.fw_theme", function () {
                var e = document.getElementById(location.hash.substring(1));
                if (e) {
                    if (!/^(?:a|select|input|button|textarea)$/i.test(e.tagName)) {
                        e.tabIndex = -1;
                    }
                    e.focus();
                    window.scrollBy(0, -80);
                }
            });
            jQuery(function () {
                function e() {
                    return window.pageYOffset || document.documentElement.scrollTop;
                }

                function t() {
                    if (n.width() >= 781) {
                        var t = 80;
                        var r = e();
                        if (r >= t) {
                            jQuery("header.site-header").addClass("navbar-fixed-top");
                        } else {
                            jQuery("header.site-header").removeClass("navbar-fixed-top");
                        }
                    }
                }

                jQuery(window).resize(function () {
                    t();
                });
                jQuery(window).scroll(function () {
                    t();
                });
                jQuery(".primary-navigation, .secondary-navigation").find("a").on("focus.fw_theme blur.fw_theme", function () {
                    jQuery(this).parents().toggleClass("focus");
                });
            });
            n.load(function () {
                if (jQuery.isFunction(jQuery.fn.masonry)) {
                    jQuery("#footer-sidebar").masonry({
                        itemSelector: ".widget",
                        columnWidth: function (e) {
                            return e / 4;
                        },
                        gutterWidth: 0,
                        isResizable: true,
                        isRTL: jQuery("body").is(".rtl")
                    });
                }
                if (t.is(".slider")) {
                    jQuery(".featured-content").featuredslider({
                        selector: ".featured-content-inner > article",
                        controlsContainer: ".featured-content"
                    });
                }
            });
        })(jQuery);
    });
    /* Feture Box - Auto set height. */
    jQuery(window).load(function (e) {
        set_feature_box_min_height();
    });
    jQuery(window).resize(function (e) {
        set_feature_box_min_height();
    });
    jQuery('document').ready(function (e) {
        set_feature_box_min_height();
    });
    function set_feature_box_min_height() {
        jQuery('.col-futurebox').each(function (index, value) {
            var WW = jQuery(window).width() || '';
            if (WW != '') {
                if (WW >= 768) {
                    var h = jQuery(this).attr('data-min-height') || '';
                    if (h != '') {
                        jQuery(this).css('min-height', h);
                    }
                } else {
                    jQuery(this).css('min-height', 'initial');
                }
            }
        });
    }

    jQuery('document').ready(function () {
        jQuery('.col-futurebox').hover(
            function () {
                var hover = jQuery(this).find('.service-title').data('hover');
                jQuery(this).find('.service-title').css("color", hover);
                var descrbhover = jQuery(this).find('.describe').data('hover');
                jQuery(this).find('.describe').css("color", descrbhover);
                var c1 = jQuery(this).find('#btnlink').data('color');
                //        console.log(c1);
                jQuery(this).find('#btnlink').css("color", c1);
                var backhover = jQuery(this).data('hover');
                jQuery(this).css("background-color", backhover);
                jQuery(this).css("color", backhover);
                var btnhover = jQuery(this).find('#btnlink').data('btncolor'); //console.log(btnhover);
                jQuery(this).find('#btnlink').css("background-color", btnhover);
                var borderhover = jQuery(this).data('borderhover');
                jQuery(this).css("border-top-color", borderhover);
                var featuretabhover = jQuery(this).find('.featuretab').data('hover');
                jQuery(this).find('.featuretab').find('.featurerow').css("border-top-color", featuretabhover);
                var linkborderbhover = jQuery(this).find('#btnlink').data('bcolor');
                jQuery(this).find('#btnlink').css("border-color", linkborderbhover);
            },
            function () {
                var color = jQuery(this).find('.service-title').data('color');
                jQuery(this).find('.service-title').css("color", color);
                var backcolor = jQuery(this).find('.describe').data('color');
                jQuery(this).find('.describe').css("color", backcolor);
                var btncolor = jQuery(this).find('#btnlink').data('color');
                jQuery(this).find('#btnlink').css("color", btncolor);
                var backcoler = jQuery(this).data('color');
                jQuery(this).css("background-color", backcoler);
                jQuery(this).css("color", backcoler);
                var btnbccolor = jQuery(this).find('#btnlink').data('btncolor'); //console.log(btnbccolor);
                jQuery(this).find('#btnlink').css("background-color", btnbccolor);
                var bordercolor = jQuery(this).data('bordercolor');
                jQuery(this).css("border-top-color", bordercolor);
                var featuretacolor = jQuery(this).find('.featuretab').data('color');
                jQuery(this).find('.featuretab').find('.featurerow').css({
                    "border-top-color": featuretacolor
                });
                var linkbordercolor = jQuery(this).find('#btnlink').data('bcolor');
                jQuery(this).find('#btnlink').css("border-color", linkbordercolor);
            }
        );
        /*-------- for mouseover on button----------------*/
        jQuery('.infobox_button').hover(
            function () {
                var b1 = jQuery(this).data('hover');
                jQuery(this).css("color", b1);
                var b2 = jQuery(this).data('btnhovercolor'); //console.log(btnhover);
                jQuery(this).css("background-color", b2);
                var linkborderbhover = jQuery(this).data('bhover');
                jQuery(this).css("border-color", linkborderbhover);
            },
            function () {
                var bh1 = jQuery(this).data('color');
                jQuery(this).css("color", bh1);
                var bh2 = jQuery(this).data('btncolor'); //console.log(btnbccolor);
                jQuery(this).css("background-color", bh2);
                var linkbordercolor = jQuery(this).data('bcolor');
                jQuery(this).css("border-color", linkbordercolor);
            }
        );
    });
    /*-- for infobox border hover---------*/
    jQuery('document').ready(function () {
        jQuery('.futurebox .icon-box-3').each(function (index, value) {
            var CW = jQuery(window).width() || '';
            if (CW != '') {
                if (CW >= 768) {
                    var ch = jQuery(this).attr('data-min-height') || '';
                    if (ch != '') {
                        jQuery(this).css('min-height', ch);
                    }
                } else {
                    jQuery(this).css('min-height', 'initial');
                }
            }
        });
        // get before hover fold bg color
        jQuery('.icon-box-3').hover(
            function () {
                var cbhocolor = jQuery(this).data('borderhover');
                jQuery(this).css("border-color", cbhocolor);
                var tabborderhover = jQuery(this).find('.featuretab').data('hover');
                jQuery(this).find('.featurerow').css("border-color", tabborderhover);
                //  fold hover color
                var boxHover = jQuery(this).data('hover');
                jQuery(this).find('.icon-box-back2').css({
                    "border-right-color": boxHover
                });
            },
            function () {
                // fold color
                var foldColor = jQuery(this).find('.icon-box-back2').data('fold-color');
                jQuery(this).find('.icon-box-back2').css({
                    "border-right-color": foldColor
                });
                var cbcolor = jQuery(this).data('border-default');
                // console.log(cbcolor);
                jQuery(this).css('border-color', cbcolor);
                // console.log(jQuery(this));
                // var jmcolor = jQuery(this).data('bordercolor');
                // jQuery(this).css("border-color", jmcolor);
                var tabborder = jQuery(this).find('.featuretab').data('color');
                jQuery(this).find('.featurerow').css("border-color", tabborder);
            }
        );
        /* ---- for call to action -----------------*/
        jQuery('.imedica-btn ').hover(
            function () {
                var cbhocolor1 = jQuery(this).find('.imedica-icon').data('iconhovercolor');
                jQuery(this).find('.imedica-icon').css("color", cbhocolor1);
            },
            function () {
                var jmcolor1 = jQuery(this).find('.imedica-icon').data('iconcolor');
                jQuery(this).find('.imedica-icon').css("color", jmcolor1);
            }
        );
        /*--- for recent post-----------*/
        jQuery('.postgrid-atitle').hover(
            function () {
                var posttitlecolor = jQuery(this).data('titlehovercolor');
                jQuery(this).css("color", posttitlecolor);
                jQuery(this).siblings('tour_icon').css('color', posttitlecolor);
            },
            function () {
                var posthovertitle = jQuery(this).data('titlecolor');
                jQuery(this).css("color", posthovertitle);
                jQuery(this).siblings('tour_icon').css('color', posthovertitle);
            }
        );
        /*--- forPricing Table -----------*/
        jQuery('.imedicapricetabmain').hover(
            function () {
                var circlehovercolor = jQuery(this).find('.price-figure').data('circlehover');
                jQuery(this).find('.price-figure').css("background-color", circlehovercolor);
                var pricehovercolor = jQuery(this).find('.price-figure').data('pricehover');
                jQuery(this).find('.price-figure').css("color", pricehovercolor);
                jQuery(this).find('.price-link').css("color", pricehovercolor);
                var semicirclehovercolor = jQuery(this).find('.price-semi-circle').data('borderhover');
                jQuery(this).find('.price-semi-circle').css("border-color", semicirclehovercolor);
                var circlelinkhcolor = jQuery(this).find('.price-link').data('circlehover');
                jQuery(this).find('.price-link').css("background-color", circlelinkhcolor);
            },
            function () {
                var circlecolor = jQuery(this).find('.price-figure').data('circle');
                jQuery(this).find('.price-figure').css("background-color", circlecolor);
                var semicircle = jQuery(this).find('.price-semi-circle').data('border');
                jQuery(this).find('.price-semi-circle ').css("border-color", semicircle);
                var circlelinkcolor = jQuery(this).find('.price-link').data('circle');
                jQuery(this).find('.price-link').css("background-color", circlelinkcolor);
                var pricecolor = jQuery(this).find('.price-figure').data('pricecolor');
                jQuery(this).find('.price-figure').css("color", pricecolor);
                jQuery(this).find('.price-link').css("color", pricecolor);
            }
        );
        /*-------------------- price list --------------------*/
        jQuery('.imd-price-list-element-wrap').hover(
            function () {
                var bttlehover = jQuery(this).data('boldhover');
                if (bttlehover == 'on') {
                    jQuery(this).find('.imd-pricelist-item-name').addClass("pricelist-hover");
                }
            },
            function () {
                var bttlehover = jQuery(this).data('boldhover');
                if (bttlehover == 'on') {
                    jQuery(this).find('.imd-pricelist-item-name').removeClass("pricelist-hover");
                }
            });
    });
    /*Galley VC element - iMedica*/
    jQuery(window).load(function () {
        var galleryWidth = jQuery('.imedica_image_gallery').outerWidth();
        var noOfImages = Math.round(galleryWidth / 70);
        var imgSize = galleryWidth / noOfImages;
        jQuery('.imedica_image_gallery .bx-pager a').css('width', imgSize);
        jQuery(window).resize(function () {
            var galleryWidth = jQuery('.imedica_image_gallery').outerWidth();
            var noOfImages = Math.round(galleryWidth / 70);
            var imgSize = galleryWidth / noOfImages;
            imgSize = imgSize - 0.04;
            jQuery('.imedica_image_gallery .bx-pager a').css('width', imgSize);
        });
    });
    jQuery(window).load(function () {
        jQuery('.ultimate-accordion').each(function (index, element) {
            var t = jQuery(this);
            var Icon_Default_Color = t.find('.accrdn-icon').data('default');
            var Icon_Active_Color = t.find('.accrdn-icon').data('active');
            if (!t.find('.ultimate-accordion-title').hasClass('ui-state-active')) {
                t.find('span.ui-accordion-header-icon').css({
                    'color': Icon_Default_Color
                });
            } else {
                t.find('span.ui-accordion-header-icon').css({
                    'color': Icon_Active_Color
                });
            }
        });
    });
    jQuery(window).load(function () {
        jQuery('.ultimate-accordion').each(function (index, element) {
            var t = jQuery(this);
            //  @var    title
            var Box_Default_Bg = t.data('default');
            var Box_Active_Bg = t.data('active');
            var Box_Hover_Bg = t.data('hover');
            //  @var    icon
            var Icon_Default_Color = t.find('.accrdn-icon').data('default');
            var Icon_Active_Color = t.find('.accrdn-icon').data('active');
            var Icon_Hover_Color = t.find('.accrdn-icon').data('hover');
            var Icon_Hover_BGColor = t.find('.accrdn-icon').data('bghover');
            //  @var    title
            var Title_Default_Color = t.find('.ui-title').data('default');
            var Title_Active_Color = t.find('.ui-title').data('active');
            var Title_Hover_Color = t.find('.ui-title').data('hover');
            jQuery(this).hover(function () {
                if (t.find('.ultimate-accordion-title').hasClass('ui-state-active')) {
                    t.find('.ultimate-accordion-title').css({
                        'background-color': Box_Active_Bg
                    });
                    t.find('.accrdn-icon').css({
                        'background-color': Box_Active_Bg
                    });
                    t.find('.accrdn-icon').css({
                        'color': Icon_Active_Color
                    });
                    t.find('.ui-accordion-header-icon').css({
                        'color': Icon_Active_Color
                    });
                    t.find('.ui-title').css({
                        'color': Title_Active_Color
                    });
                } else {
                    t.find('.ultimate-accordion-title').css({
                        'background-color': Box_Hover_Bg
                    });
                    t.find('.accrdn-icon').css({
                        'color': Icon_Hover_Color
                    });
                    t.find('.ui-accordion-header-icon').css({
                        'color': Icon_Hover_BGColor
                    });
                    t.find('.accrdn-icon').css({
                        'background': Icon_Hover_BGColor
                    });
                    t.find('.ui-title').css({
                        'color': Title_Hover_Color
                    });
                }

            }, function () {
                //  !active tab
                if (!t.find('.ultimate-accordion-title').hasClass('ui-state-active')) {
                    //  default
                    t.find('.ultimate-accordion-title').css({
                        'background-color': Box_Default_Bg
                    });
                    t.find('.accrdn-icon').css({
                        'color': Icon_Default_Color
                    });
                    t.find('.ui-accordion-header-icon').css({
                        'color': Icon_Default_Color
                    });
                    t.find('.accrdn-icon').css({
                        'background': Box_Default_Bg
                    });
                    t.find('.ui-title').css({
                        'color': Title_Default_Color
                    });
                }
            });
            //  click
            jQuery(this).click(function () {
                var o = jQuery(this);
                o.find('.ultimate-accordion-title').css({
                    'background-color': Box_Active_Bg
                });
                o.find('.accrdn-icon').css({
                    'background-color': Box_Active_Bg
                });
                o.find('.accrdn-icon').css({
                    'color': Icon_Active_Color
                });
                o.find('.ui-accordion-header-icon').css({
                    'color': Icon_Active_Color
                });
                o.find('.ui-title').css({
                    'color': Title_Active_Color
                });
                o.siblings().each(function () {
                    var s = jQuery(this);
                    s.find('.ultimate-accordion-title').css({
                        'background-color': Box_Default_Bg
                    });
                    s.find('.accrdn-icon').css({
                        'color': Icon_Default_Color
                    });
                    s.find('.ui-accordion-header-icon').css({
                        'color': Icon_Default_Color
                    });
                    s.find('.accrdn-icon').css({
                        'background': Box_Default_Bg
                    });
                    s.find('.ui-title').css({
                        'color': Title_Default_Color
                    });
                });
            });
        });
    });
    jQuery(window).load(function () {
        jQuery('.ultimate-accordion').each(function (index, element) {
            var t = jQuery(this);
            //  @var    title
            var Box_Default_Bg = t.data('default');
            var Box_Active_Bg = t.data('active');
            var Box_Hover_Bg = t.data('hover');
            //  @var    icon
            var Icon_Default_Color = t.find('.accrdn-icon').data('default');
            var Icon_Active_Color = t.find('.accrdn-icon').data('active');
            var Icon_Hover_Color = t.find('.accrdn-icon').data('hover');
            //  @var    icon
            var Title_Default_Color = t.find('.ui-title').data('default');
            var Title_Active_Color = t.find('.ui-title').data('active');
            var Title_Hover_Color = t.find('.ui-title').data('hover');
            //  @init   set active colors for active tab
            if (t.find('.ultimate-accordion-title').hasClass('ui-state-active')) {
                t.find('.ultimate-accordion-title').css({
                    'background-color': Box_Active_Bg
                });
                t.find('.accrdn-icon').css({
                    'color': Icon_Active_Color
                });
                t.find('.ui-title').css({
                    'color': Title_Active_Color
                });
            } else {
            }
        });
    });
    /*--------------- for Tours------------------*/
    jQuery(window).load(function () {
        jQuery('.imd_tour li#imd_mainlink').hover(
            function () {
                var acve = jQuery(this).attr('class');
                var bstyleno = acve.split(" ");
                if (jQuery.inArray('ui-tabs-active', bstyleno) > -1) {
                } else {
                    var triconhcolor = jQuery(this).find('.tour_icon').data('iconhovercolor');
                    var bghover = jQuery(this).find('.tour_icon').data('background');
                    jQuery(this).find('.tour_icon').css("color", triconhcolor);
                    jQuery(this).find('.tour_icon').css("background", bghover);
                    var linktitlehcolor = jQuery(this).find('.imd_link').data('titlehovercolor');
                    jQuery(this).find('.imd_link').css("color", linktitlehcolor);
                }
            },
            function () {
                var acve = jQuery(this).attr('class');
                var bstyleno = acve.split(" ");
                if (jQuery.inArray('ui-tabs-active', bstyleno) > -1) {
                } else {
                    var triconcolor = jQuery(this).find('.tour_icon').data('iconcolor');
                    jQuery(this).find('.tour_icon').css("color", triconcolor);
                    jQuery(this).find('.tour_icon').css("background", 'none');
                    var linktitlecolor = jQuery(this).find('.imd_link').data('color');
                    jQuery(this).find('.imd_link').css("color", linktitlecolor);
                }
            });
    });
    jQuery(window).load(function () {
        jQuery('.imd_tour li>a.ultimate_tour').on('click', function () {
            var tourticon = jQuery(this).parent().find('.tour_icon').data('iconhovercolor');
            var iconbackground = jQuery(this).parent().find('.tour_icon').data('background');
            var titletour = jQuery(this).parent().find('.imd_link').data('titlehovercolor');
            var ticnnormal = jQuery(this).parent().find('.tour_icon').data('iconcolor');
            var linktitlecolor = jQuery(this).parent().find('.imd_link').data('color');
            jQuery(this).find('.tour_icon').css("color", tourticon);
            jQuery(this).find('.tour_icon').css("background", iconbackground);
            jQuery(this).find('.imd_link').css("color", titletour);
            jQuery(this).parent().siblings().find('.tour_icon').css("color", ticnnormal);
            jQuery(this).parent().siblings().find('.tour_icon').css("background", 'none');
            jQuery(this).parent().siblings().find('.imd_link').css("color", linktitlecolor);
        });
    });
    jQuery(window).load(function () {
        jQuery('ul.wpb_tabs_nav').find('li.ui-state-active').each(function (index, value) {
            var ticon = jQuery(this).find('.tour_icon').data('iconhovercolor');
            var ibag = jQuery(this).find('.tour_icon').data('background');
            var ttitle = jQuery(this).find('.imd_link').data('titlehovercolor');
            jQuery(this).find('.tour_icon').css("color", ticon);
            jQuery(this).find('.tour_icon').css("background", ibag);
            jQuery(this).find('.imd_link').css("color", ttitle);
        });
    });
    // Large Search Header 1
    jQuery(window).load(function () {
        jQuery('.search-large').addClass('search-close');
        jQuery('.menu-search-default-head a').on('click touchstart', function (event) {
            event.preventDefault();
            event.stopPropagation();
            jQuery('.search-large').removeClass('search-close');
            jQuery('.search-large').toggleClass('open-search');
            jQuery('.search-large input.imd-search').focus();

            /* New search layout*/
            jQuery('.new_search_form').fadeToggle(200);
            jQuery('.new_search_form').toggleClass('imd-bounceIt');
            jQuery('.new_search_form input.imd-search').focus();

            event.preventDefault();
            event.stopPropagation();
        });

        $("body").click
        (
          function(e)
          {
            if( !jQuery(e.target).hasClass("new_search_form") && jQuery(e.target).parents(".new_search_form").length === 0  && jQuery(e.target).parents(".imedica-search").length === 0 )
            {
              jQuery('.new_search_form').fadeOut(200);
              jQuery('.new_search_form').removeClass('imd-bounceIt');
            }
          }
        );

        jQuery('a.search-close,.search-large.open-search').on('click', function (event) {
            event.preventDefault();
            jQuery('.search-large').removeClass('open-search');
            jQuery('.search-large').addClass('search-close');
        });
        jQuery(document).keydown(function (e) {
            if (e.keyCode == 27) {
                jQuery('.search-large.open-search').removeClass('open-search');
                jQuery('.search-large.open-search').addClass('search-close');
            }
        });
    });
    /*Transparent Header Functionality*/
    // jQuery(window).load(function () {
    //     var windowWidth = jQuery(window).width();
    //     if (windowWidth >= 783) {
    //         var transHeight = jQuery('header.site-header-main').outerHeight();
    //         var thmShowcase = jQuery('.transparent_header .theme-showcase');
    //         var showCaseHt = thmShowcase.outerHeight() - transHeight;
    //         jQuery('.transparent_header .theme-showcase').css({
    //             position: 'relative',
    //             top: -transHeight,
    //             height: showCaseHt
    //         });
    //         ;
    //     } 
        // else if (windowWidth <= 783) {
        //     jQuery('.transparent_header .theme-showcase').removeAttr('css');
        //     jQuery('body').removeClass('transparent_header');
        // }
    // });
    // jQuery(window).resize(function (e) {
    //     var windowWidth = jQuery(window).width();
    //     if (windowWidth <= 783) {
    //         jQuery('.transparent_header .theme-showcase').removeAttr('style');
    //         jQuery('body').removeClass('transparent_header');
    //     }
    // });
    /* Info Box - Auto set height. */
    jQuery('document').ready(function (e) {
        iMedicaInfoBox();
    });
    jQuery(window).load(function (e) {
        iMedicaInfoBox();
    });
    jQuery(window).resize(function (e) {
        iMedicaInfoBox();
    });
    function iMedicaInfoBox() {
        var CW = jQuery(window).width() || '';
        jQuery('.futurebox .icon-box-3').each(function (index, value) {
            if (CW != '') {
                if (CW >= 768) {
                    var ch = jQuery(this).attr('data-min-height') || '';
                    if (ch != '') {
                        jQuery(this).css('min-height', ch);
                    }
                } else {
                    jQuery(this).css('min-height', 'initial');
                }
            }
        });
    }


    function menuLineheight( $lineht ) {        
        jQuery.post( imd_ajax.ajax_url,{
            action:'lineheight_menu',
            lineht: $lineht
        });
    }

})(jQuery);
