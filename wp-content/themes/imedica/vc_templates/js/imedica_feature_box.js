(function ($) {
    "use strict";
    jQuery('document').ready(function () {
        jQuery('.col-futurebox').hover(
            function () {
                var hover = jQuery(this).find('.service-title').data('hover');
                jQuery(this).find('.service-title').css("color", hover);

                var descrbhover = jQuery(this).find('.describe').data('hover');
                jQuery(this).find('.describe').css("color", descrbhover);

                var c1 = jQuery(this).find('#btnlink').data('hover');
                jQuery(this).find('#btnlink').css("color", c1);

                var backhover = jQuery(this).data('hover');
                jQuery(this).css("background-color", backhover);
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
            }
        );
    });
})(jQuery);