(function ($) {
    "use strict";
    
    $(window).load(function() {
        $('.thim-sc-video .toggle-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });
    });
    
})(jQuery);
