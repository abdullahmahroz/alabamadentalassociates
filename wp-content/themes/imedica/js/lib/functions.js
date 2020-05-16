/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */
 (function($) {
	 "use strict";
    var body = jQuery('body');
    var _window = jQuery(window);
	var navSocialMenu = jQuery('.imd-mobile-social-menu');
    var navMainMenu = jQuery('#primary-navigation');
    var navTopMenu = jQuery('.imedica-top-navigation');
    var headerMain = jQuery('.header-main');
    // Enable menu toggle for small screens.
    (function () {
        var nav = jQuery('#primary-navigation');
        if (!nav) {
            return;
        }
        var button = nav.find('.menu-toggle');
        if (!button) {
            return;
        }
        // Hide button if menu is missing or empty.
        var menu = nav.find('.nav-menu');
        if (!menu || !menu.children().length) {
            button.hide();
            return;
        }
        jQuery('.menu-toggle').on('click.fw_theme', function () {
            navSocialMenu.removeClass('top-social-toggled-on');
            navTopMenu.removeClass('top-menu-toggled-on');
            nav.toggleClass('toggled-on');
            if (headerMain.hasClass('auto-height')) {
                headerMain.removeClass('auto-height');
            } else {
                headerMain.addClass('auto-height');
            }
        });
        jQuery(window).resize(function () {
            headerMain.removeClass('auto-height');
            nav.removeClass('toggled-on');
        });

    })();
    //top-navigation-mobile-toggle
    (function () {
        var nav = jQuery('.imedica-top-navigation');
        if (!nav) {
            return;
        }
        var button = nav.find('.menu-toggle-top-menu');
        if (!button) {
            return;
        }
        // Hide button if menu is missing or empty.
        var menu = nav.find('.nav-menu');
        if (!menu || !menu.children().length) {
            button.hide();
            return;
        }
        jQuery('.menu-toggle-top-menu').on('click.fw_theme', function () {
            navSocialMenu.removeClass('top-social-toggled-on');
            navMainMenu.removeClass('toggled-on');
            nav.toggleClass('top-menu-toggled-on');
            if (headerMain.hasClass('auto-height')) {
                headerMain.removeClass('auto-height');
            } else {
                headerMain.addClass('auto-height');
            }
        });
        jQuery(window).resize(function () {
            headerMain.removeClass('auto-height');
            nav.removeClass('top-menu-toggled-on');
        });

    })();
    //top social icons mobile menu
    (function () {
        var nav = jQuery('.imd-mobile-social-menu');
        if (!nav) {
            return;
        }
        var button = nav.find('.menu-toggle-imd-top-social');
        if (!button) {
            return;
        }
        jQuery('.menu-toggle-imd-top-social').on('click.fw_theme', function () {
            navTopMenu.removeClass('top-menu-toggled-on');
            navMainMenu.removeClass('toggled-on');
            nav.toggleClass('top-social-toggled-on');
            if (headerMain.hasClass('auto-height')) {
                headerMain.removeClass('auto-height');
            } else {
                headerMain.addClass('auto-height');
            }
        });
        jQuery(window).resize(function () {
            headerMain.removeClass('auto-height');
            nav.removeClass('top-social-toggled-on');
        });

    })();
    /*
     * Makes "skip to content" link work correctly in IE9 and Chrome for better
     * accessibility.
     *
     * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
     */
    _window.on('hashchange.fw_theme', function () {
        var element = document.getElementById(location.hash.substring(1));
        if (element) {
            if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
                element.tabIndex = -1;
            }
            element.focus();
            // Repositions the window on jump-to-anchor to account for header height.
            window.scrollBy(0, -80);
        }
    });
    jQuery(function () {
        /*
         * Fixed header for large screen.
         * If the header becomes more than 48px tall, unfix the header.
         *
         * The callback on the scroll event is only added if there is a header
         * image and we are not on mobile.
         */
        jQuery(window).resize(function () {
            setFixedHeader();
        });

        jQuery(window).scroll(function () {
            setFixedHeader();
        });

        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
        }

        function setFixedHeader() {
            if (_window.width() >= 781) {
                var fixHeader = 80;
                var scroll = getCurrentScroll();
                if (scroll >= fixHeader) {
                    jQuery('header.site-header').addClass('navbar-fixed-top');
                }
                else {
                    jQuery('header.site-header').removeClass('navbar-fixed-top');
                }
            }
        }
        // Focus styles for menus.
        jQuery('.primary-navigation, .secondary-navigation').find('a').on('focus.fw_theme blur.fw_theme', function () {
            jQuery(this).parents().toggleClass('focus');
        });
    });
    _window.load(function () {
        // Arrange footer widgets vertically.
        if (jQuery.isFunction(jQuery.fn.masonry)) {
            jQuery('#footer-sidebar').masonry({
                itemSelector: '.widget',
                columnWidth: function (containerWidth) {
                    return containerWidth / 4;
                },
                gutterWidth: 0,
                isResizable: true,
                isRTL: jQuery('body').is('.rtl')
            });
        }
        // Initialize Featured Content slider.
        if (body.is('.slider')) {
            jQuery('.featured-content').featuredslider({
                selector: '.featured-content-inner > article',
                controlsContainer: '.featured-content'
            });
        }
    });

	/*
	 menu mobile
	 */
	jQuery(window).load(function () {
		var anchor = '.mobile-top-menu ul.nav-menu > li.menu-item-has-children';
		jQuery(anchor).prepend('<b class="caret" <="" a=""><i class="fa fa-fw"></i></b>');
		jQuery('.mobile-top-menu ul.nav-menu li.menu-item-has-children b.caret').click(function () {
			jQuery(this).parent().toggleClass('open');
		});
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
	// Fixed header
	jQuery(window).scroll(function () {
		var hPos = jQuery('.site-header-main').height();
		var b = document.body;
		var e = document.documentElement;
		var left = parseFloat(window.pageXOffset || b.scrollLeft || e.scrollLeft);
		var top = parseFloat(window.pageYOffset || b.scrollTop || e.scrollTop);
		var main_header = jQuery('.header-main').outerHeight();
		if (hPos < (top - main_header)) {
			jQuery('.header-fixed').css('top', '0px');
		}
		else {
			jQuery('.header-fixed').css('top', '-80px');
		}
	});
	
 })(jQuery);