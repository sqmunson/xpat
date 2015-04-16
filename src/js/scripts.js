(function( root, $, undefined ) {
	"use strict";

	$(function () {
		// DOM ready, take it away

        var stickyFeaturedOffsetTop,
            stickyFeatured = $('.sticky-featured'),
            stickyFB = $('.sticky-fb-like'),
            stickyAd = $('.sticky-ad'),
            menuWrapper = $('.menu-wrapper');

        $(window).bind('scroll touchstart', function() {
            var scrollTop = $(window).scrollTop();

            if (scrollTop > 50) {
                menuWrapper.addClass('menu-shadow');
            } else {
                menuWrapper.removeClass('menu-shadow');
            }

            if (stickyFeatured.is(':visible')) {
                if (scrollTop >= stickyFeaturedOffsetTop - menuWrapper.height()) {
                    stickyFeatured.addClass('stick');
                    stickyAd.addClass('stick');
                    stickyFB.show();
                } else {
                    stickyFeaturedOffsetTop =  stickyFeatured.offset().top;
                    stickyFeatured.removeClass('stick');
                    stickyAd.removeClass('stick');
                    stickyFB.hide();
                }
            }
        });
	});

} ( this, jQuery ));

function fb_share(url, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (300 / 2);
    var winLeft = (screen.width / 2) - (550 / 2);
    window.open('http://www.facebook.com/sharer/sharer.php?u=' + window.location + '&', 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=550,height=300');
}