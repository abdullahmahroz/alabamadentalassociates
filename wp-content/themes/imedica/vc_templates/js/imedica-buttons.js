(function ($) {
    "use strict";
    jQuery(document).ready(function () {
        jQuery('.imedica-btn-outline').hover(function () {
                /*      Hover Text       */
                var getHoverTextColor = jQuery(this).attr('data-outline-color-text-hover');
                jQuery(this).css({'color': getHoverTextColor});
                /*      Background      */
                var getBGHoverColor = jQuery(this).attr('data-outline-color-bg-hover');
                jQuery(this).css({'background-color': getBGHoverColor});
            }, function () {
                /* Current Text Color */
                var getCurrentTextColor = jQuery(this).attr('data-current-color-text');
                jQuery(this).css({'color': getCurrentTextColor});
                /*      Background      */
                var getCurrentBGHoverColor = jQuery(this).attr('data-outline-color-bg');
                jQuery(this).css({'background-color': getCurrentBGHoverColor});
            }
        );
    });
})(jQuery);