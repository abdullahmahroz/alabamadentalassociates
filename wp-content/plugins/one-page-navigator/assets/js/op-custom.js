/*
 * jQuery Ultimate One Page Navigator Plugin
 *
 * Copyright (c) 2015 
 * Dual licensed under the MIT and GPL licenses.
 * Uses the same license as jQuery, see:
 * http://jquery.org/license
 *
 * @version 1.0
 *
 */

;(function($, window, document, undefined){
    
    // our plugin constructor
    var ultOnePageNavigator = function(el, options){
        this.el = el;
        this.$el = $(el);
        this.options = options;
        this.metadata = this.$el.data('plugin-options');
        this.$win = $(window);
        this.sections = {};
        this.didScroll = false;
        this.$doc = $(document);
        this.docHeight = this.$doc.height();
    };

    // the plugin prototype
    ultOnePageNavigator.prototype = {
        defaults: {
            navParent: 'ul',
            navItems: 'a',
            currentClass: 'current',
            showTooltip: 'show-tooltip',
            changeHash: false,
            easing: 'swing',
            filter: '',
            scrollSpeed: 750,
            scrollThreshold: 0.5,
            begin: false,
            end: false,
            scrollChange: true
        },

        init: function() {

            // Introduce defaults that can be extended either
            // globally or using an object literal.
            // initially hide the navigator
            this.HideOnRow();

            this.config = $.extend({}, this.defaults, this.options, this.metadata);

            this.$nav = this.$el.find(this.config.navItems);

            //Filter any links out of the nav
            if(this.config.filter !== '') {
                this.$nav = this.$nav.filter(this.config.filter);
            }

            //Handle clicks on the nav
            //this.$nav.on('click.ultOnePageNavigator', $.proxy(this.handleClick, this));

            //Get the section positions
            this.getPositions();

            //Handle scroll changes
            this.bindInterval();

            //Update the positions on resize too
            this.$win.on('resize.ultOnePageNavigator', $.proxy(this.getPositions, this));

            //  Call init to show Invert & Normal colors of current row
            this.didScroll = true;

            return this;
        },

        /*              On Scroll - set - Active item                     
         * -------------------------------------------------------------- */
        adjustNav: function(self, $parent) {
            self.$el.find('.' + self.config.currentClass).removeClass(self.config.currentClass);
            $(self.$el).siblings(".opn_list").children("li").removeClass(self.config.currentClass);
            $parent.addClass(self.config.currentClass);
        },
        setRowDefaultColors: function() {
            //  Remove active item - class
            var clist = this;

            this.$el.find(this.config.navParent).each(function(index, element) {
                var t = $(this);
                var Icon = t.find('i');

                //  Remove active item - class
                t.find('.' + clist.config.currentClass).removeClass(clist.config.currentClass);
                t.find('.' + clist.config.showTooltip).removeClass(clist.config.showTooltip);

                var bg_color = t.attr('data-bg_color') || t.css('background-color');
                var icon_color = t.attr('data-icon_color') || Icon.css('color');
                t.css('background-color', bg_color);
                Icon.css('color', icon_color);

                // Set tooltip {Normal} colors
                t.find('.opn-tooltip, .opn-tooltip:before').each(function(index, element) {
                    var normalBg = $(this).attr('data-normal_bg_color');
                    var normalColor = $(this).attr('data-normal_color');

                    $(this).css('background-color', normalBg);
                    $(this).css('border-color', normalBg);
                    $(this).css('color', normalColor);
                });
            });
        },
        setRowInvertColors: function() {
            var clist = this;
            var windowTop = this.$win.scrollTop();
            var position = this.getSectionCustom(windowTop);

            this.$el.find(this.config.navParent).each(function(index, element) {
                var t = $(this);
                var Icon = t.find('i');
                var ap = t.find('a[href$="#' + position + '"]').parent();

                //  Add active item - class
                t.find('.' + clist.config.currentClass).removeClass(clist.config.currentClass);
                ap.addClass(clist.config.currentClass);

                var on_row_bg_color = t.attr('data-on_row_bg_color') || t.css('background-color');
                var on_row_icon_color = t.attr('data-on_row_icon_color') || t.attr('data-icon_color');
                var on_row_icon_hover_color = t.attr('data-on_row_icon_hover_color') || t.attr('data-icon_hover_color');

                t.css('background-color', on_row_bg_color);
                Icon.css('color', on_row_icon_color);
                t.find('.' + clist.config.currentClass + ' i').css('color', on_row_icon_hover_color);

                //  Check 'auto tooltip'
                t.find('.' + clist.config.showTooltip).removeClass(clist.config.showTooltip);
                var showTootip = t.attr('data-tooltip_autoshow') || '';
                if(showTootip === 'on') {
                    clist.autoShowActiveTooltip(ap, clist);
                } else {
                    clist.autoRemoveActiveTooltip(ap, clist);
                }

                // Set tooltip invert colors
                t.find('.opn-tooltip, .opn-tooltip:before').each(function(index, element) {
                    var invertBg = $(this).attr('data-invert_bg_color') || $(this).css('background-color');
                    var invertColor = $(this).attr('data-invert_color') || $(this).css('color');

                    $(this).css('background-color', invertBg);
                    $(this).css('border-color', invertBg);
                    $(this).css('color', invertColor);
                });
            });
        },
        setRowNonInvertColors: function() {
            //  Remove active item - class
            var windowTop = this.$win.scrollTop();
            var position = this.getSectionCustom(windowTop);
            var clist = this;

            this.$el.find(this.config.navParent).each(function(index, element) {
                var t = $(this);
                var Icon = t.find('i');
                var ap = t.find('a[href$="#' + position + '"]').parent();

                //  Add active item - class
                t.find('.' + clist.config.currentClass).removeClass(clist.config.currentClass);
                ap.addClass(clist.config.currentClass);

                var bg_color = t.attr('data-bg_color') || t.css('background-color');
                var icon_color = t.attr('data-icon_color') || Icon.css('color');
                var icon_hover_color = t.attr('data-icon_hover_color') || Icon.css('color');
                
                t.css('background-color', bg_color);
                Icon.css('color', icon_color);
                t.find('.' + clist.config.currentClass + ' i').css('color', icon_hover_color);

                //  Check 'auto tooltip'
                t.find('.' + clist.config.showTooltip).removeClass(clist.config.showTooltip);
                var showTootip = t.attr('data-tooltip_autoshow') || '';
                if(showTootip === 'on') {
                    clist.autoShowActiveTooltip(ap, clist);
                } else {
                    clist.autoRemoveActiveTooltip(ap, clist);
                }

                // Set tooltip {Normal} colors
                t.find('.opn-tooltip, .opn-tooltip:before').each(function(index, element) {
                    var normalBg = $(this).attr('data-normal_bg_color');
                    var normalColor = $(this).attr('data-normal_color');

                    $(this).css('background-color', normalBg);
                    $(this).css('border-color', normalBg);
                    $(this).css('color', normalColor);
                });
            });
        },
        autoShowActiveTooltip: function(ap, clist) {
            ap.addClass(clist.config.showTooltip);
        },
        autoRemoveActiveTooltip: function(ap, clist) {
            ap.removeClass(clist.config.showTooltip);
        },
        ShowOnRow: function() {
            $(this.el).css({'visibility':'visible', 'opacity':'1'});
        },
        HideOnRow: function() {
            $(this.el).css({'visibility':'hidden', 'opacity':'0'});
        },
        scrollChange: function() {
            var windowTop = this.$win.scrollTop();
            var position = this.getSectionCustom(windowTop);
            var $parent;

            //  Check list is {on row} or {out of row}
            if(typeof position!='undefined' && position!=null) {
            
                // ON Row
                var tid = '#'+position;
                // Check {row hidden} on/off
                var HN = $(tid).attr('data-opn_hide_navigation') || '';

                if(HN=='on') {
                    this.HideOnRow();
                } else {
                    this.ShowOnRow();
                    var DO = $(tid).attr('data-opn_enable_overlay') || '';
                    if(DO!='' && DO=='on') {
                        //  Here, status is - ON - So, apply {Row Overlay} Colors
                        this.setRowInvertColors();          //  Set invert colors - Bcz it's status is ON
                    } else {
                        //  Here, status is - OFF - So, apply {Normal/Default} Colors
                        this.setRowNonInvertColors();         //  Set default/non invert colors - Bcz it's status is OFF
                    }
                }

            } else {
                // OUT of Row
                //  Apply {Normal/Default} Colors
                //console.log('Current on - Out of Div: '+position);
                this.ShowOnRow();
                this.setRowDefaultColors();             //  Set default colors - Bcz its out of ROW
            }
        },

        getSectionCustom: function(windowPos) {
            var returnValue = null;
            var windowHeight = Math.round(this.$win.height() * this.config.scrollThreshold);
            var container = $('.opn_fixed_container');
            var l = container.offset();
            var lh = container.outerHeight();

            for(var section in this.sections) {
                var sv = '#'+section;
                var s = $(sv).offset();
                var h = $(sv).outerHeight();

                var totalHeight = s.top + h;
                
                s.top = ( s.top - (lh/2) );

                //console.log(sv +' : from top '+s.top+ ' and l.top '+l.top);
                if(Math.round(l.top)>=Math.round(s.top) && Math.round(l.top)<=Math.round(totalHeight)) {
                    returnValue = section;
                }

            }

            return returnValue;
        },
        oneScroll: function() {
            var self = this;
            var windowTop = self.$win.scrollTop();
            var position = self.getSectionCustom(windowTop);

            if(typeof position != 'undefined' && position != null) {
                
                /*      1 SCROLL            */
                var prev = $('#' + position).prev().attr('id') || '';
                var next = $('#' + position).next().attr('id') || '';
                
                self.$el.find(self.config.navParent).each(function(index, element) {
                    var anch = $(element).find('a');
                    anch.each(function(i, e) {
                        var a = $(e).attr('href');
                        if(typeof a !== 'undefined' && a != null) {
                            i = a.split('#')[1];
                            if(position == i) {
                                p = $(e).parent().parent();
                                one_row_scroll = p.attr('data-one_row_scroll') || 'off';
                            }
                        }
                    });

                    //  check 'one_row_scroll' and scroll one full row at a time
                    if(one_row_scroll === 'on') {
                        // Cross Browser - mouse wheel scroll
                        //http://stackoverflow.com/questions/9957860/detect-user-scroll-down-or-scroll-up-in-jquery
                        var mousewheelevt = (/Firefox/i.test(navigator.userAgent)) ? "DOMMouseScroll" : "mousewheel" //FF doesn't recognize mousewheel as of FF3.x
                        $('#'+position).bind(mousewheelevt, function(e) {
                            var evt = window.event || e //equalize event object     
                            evt = evt.originalEvent ? evt.originalEvent : evt; //convert to originalEvent if possible               
                            var delta = evt.detail ? evt.detail*(-40) : evt.wheelDelta //check for detail first, because it is used by Opera and FF

                            if(delta > 0) {
                                if(typeof prev!='undefined' ) {
                                    $('#'+prev).animatescroll({
                                        scrollSpeed: 1000,
                                        easing: 'easeOutQuad',
                                    });
                                }
                            } else {
                                if(typeof next!='undefined' && next !== '') {
                                    $('#'+next).animatescroll({
                                        scrollSpeed: 1000,
                                        easing: 'easeOutQuad',
                                    });
                                }
                            }
                        });
                    }
                });
            }
        },

        bindInterval: function() {
            var self = this;
            var docHeight;

            self.$win.on('scroll.ultOnePageNavigator', function() {
                self.didScroll = true;
            });

            self.t = setInterval(function() {
                docHeight = self.$doc.height();

                //If it was scrolled
                if(self.didScroll) {
                    self.didScroll = false;
                    self.scrollChange();  
                    // 1 Scroll
                    //self.oneScroll();
                }


                 //If the document height changes
                if(docHeight !== self.docHeight) {
                    self.docHeight = docHeight;
                    self.getPositions();
                }
            }, 250);
        },

        getHash: function($link) {
            return $link.attr('href').split('#')[1];
        },

        getPositions: function() {
            var self = this;
            var linkHref;
            var topPos;
            var $target;

            self.$el.find(self.config.navParent).each(function() {
                self.$nav.each(function() {
                    linkHref = self.getHash($(this));
                    $target = $('#' + linkHref);
                    
                    if($target.length) {
                        topPos = $target.offset().top;
                        self.sections[linkHref] = Math.round(topPos);
                    }
                });
            });
        },

        getSection: function(windowPos) {
            var returnValue = null;
            var windowHeight = Math.round(this.$win.height() * this.config.scrollThreshold);

            for(var section in this.sections) {
                if((this.sections[section] - windowHeight) < windowPos) {
                    returnValue = section;
                }
            }

            return returnValue;
        },

        scrollTo: function(target, callback) {
            var offset = $(target).offset().top;

            $('html, body').animate({
                scrollTop: offset
            }, this.config.scrollSpeed, this.config.easing, callback);
        },

        unbindInterval: function() {
            clearInterval(this.t);
            this.$win.unbind('scroll.ultOnePageNavigator');
        }
    };

    ultOnePageNavigator.defaults = ultOnePageNavigator.prototype.defaults;
    $.fn.ultOnePageNavigator = function(options) {
        return this.each(function() {
            new ultOnePageNavigator(this, options).init();
        });
    };

    /* custom */
    $(window).load(function() {
        var ListContents = '';
        $('.opn_navigator').each(function(index, element) {
            var t = $(this),
                List = '';
            ListContents += t.html();
            t.remove();
        });
        if(ListContents!='') {
            $('body').append('<div class="opn_fixed_wrap"><div class="opn_fixed_container"><div class="opn_fixed">' + ListContents + '</div></div></div>');
        }

        // set hover effect
        $('.opn_fixed .opn_list').each(function(index, element) {
            var t       = $(this);

            // Hide {ACTIVE} tooltip on hover
            var showTootip = t.attr('data-tooltip_autoshow') || '';
            t.hover(function() {
                $(this).find('.dts-current').removeClass('show-tooltip');
            }, function() {
                if(showTootip === 'on') {
                    $(this).find('.dts-current').addClass('show-tooltip');
                }
            });

            // Show only {ONE} tooltip on {HOVER}
            t.find('li').hover(function() {
                $(this).siblings('li').find('.opn-tooltip').hide();
            }, function() {
                $(this).siblings('li').find('.opn-tooltip').show();
            });

        });
        ////console.log(anchors);
        $('.opn_fixed').ultOnePageNavigator({
            currentClass: 'dts-current',
            showTooltip: 'show-tooltip',
        });

        //  add nav position class
        var navPos = $('.opn_list').first().attr('data-nav-position') || '';
        var navDist = $('.opn_list').first().attr('data-nav_distance') || '';

        if(navPos!='') {
            switch(navPos) {
                case 'bottom':  setDistance(navPos, navDist);
                                break;
                case 'left':    setDistance(navPos, navDist);
                                break;
                case 'right':   setDistance(navPos, navDist);
                                break;
            }
        }
    });
    function setDistance(navPos, navDist){
        $('.opn_fixed_container').addClass(navPos);
        if(navDist!='') {
            navDist = navDist + 'px';
            $('.opn_fixed_container').css(navPos, navDist);
        }
    }
    
    $(document).ready(function() {
        $('.opn_fixed').ultOnePageNavigator({
            currentClass: 'dts-current',
            showTooltip: 'show-tooltip',
        });
        
        
    });
})( jQuery, window , document );