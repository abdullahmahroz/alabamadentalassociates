(function ($) {
    "use strict";
    jQuery('document').ready(function () {
        jQuery('.futurebox').hover(
            function () {
                var hover = jQuery(this).find('.icon-box2-title').data('hover');
                jQuery(this).find('.icon-box2-title').css("color", hover);

                var linkhover = jQuery(this).find('.aread').data('hover');
                jQuery(this).find('.aread').css("color", linkhover);

                var iconhover = jQuery(this).find('i.icon-box-back2.stop').data('bg-hover');
                jQuery(this).find('i.icon-box-back2.stop').css("background-color", iconhover);

                var iconcolorhover = jQuery(this).find('i.icon-box-back2.stop').data('color-hover');
                jQuery(this).find('i.icon-box-back2.stop').css("color", iconcolorhover);

                var bghover = jQuery(this).find('.icon-box-3').data('hover');
                jQuery(this).find('.icon-box-3').css("background-color", bghover);

                var phover = jQuery(this).find('.icon-description').data('hover');
                jQuery(this).find('.icon-description').css("color", phover);

            },
            function () {
                var color = jQuery(this).find('.icon-box2-title').data('color');
                jQuery(this).find('.icon-box2-title').css("color", color);

                var linkcolor = jQuery(this).find('.aread').data('color');
                jQuery(this).find('.aread').css("color", linkcolor);

                var bgcolor = jQuery(this).find('.icon-box-3').data('color');
                jQuery(this).find('.icon-box-3').css("background-color", bgcolor);

                var pcolor = jQuery(this).find('.icon-description').data('color');
                jQuery(this).find('.icon-description').css("color", pcolor);

                var iconcolor = jQuery(this).find('i.icon-box-back2.stop').data('color');
                jQuery(this).find('i.icon-box-back2.stop').css("color", iconcolor);

                var iconcolorbg = jQuery(this).find('i.icon-box-back2.stop').data('bg-color');
                jQuery(this).find('i.icon-box-back2.stop').css("background-color", iconcolorbg);

            }
        );
    });
})(jQuery);