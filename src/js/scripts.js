(function( root, $, undefined ) {
	"use strict";

	$(function () {
		// DOM ready, take it away

        var stickyFeaturedOffsetTop,
            stickyFeatured = $('.sticky-featured'),
            stickyFB = $('.sticky-fb-like'),
            stickyAd = $('.sticky-ad'),
            menuWrapper = $('.menu-wrapper'),
            navDesktop = $('nav.desktop ul'),
            navShares = $('nav .shares'),
            isSingle = $('body').hasClass('single');

        $(window).bind('scroll touchstart', function() {
            var scrollTop = $(window).scrollTop();

            if (scrollTop > 50) {
                menuWrapper.addClass('menu-shadow');
                if (isSingle) {
                    navDesktop.slideUp();
                    navShares.slideDown();
                }
            } else {
                menuWrapper.removeClass('menu-shadow');
                if (isSingle) {
                    navDesktop.slideDown();
                    navShares.slideUp();
                }
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

        $('.show-children').click(function() {
            $(this).nextAll('ul.sub-menu').slideToggle();
            $(this).toggleClass('active');
        });

        $('.wrapper').click(function(e) {
            console.log('yup', e);
            if ($(this).hasClass('show-menu')) {
                console.log('menu!');
                e.preventDefault();
                $('.mobile-nav').hide();
                $('.wrapper').removeClass('show-menu');
            }
        });

        $('.hamburger').click(function(e) {
            console.log('hamburger');
            e.stopPropagation();
            $('.mobile-nav').toggle();
            $('.wrapper').toggleClass('show-menu');
        });

        
	});

} ( this, jQuery ));

function fb_share(url, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (300 / 2);
    var winLeft = (screen.width / 2) - (550 / 2);
    window.open('http://www.facebook.com/sharer/sharer.php?u=' + window.location + '&', 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=550,height=300');
}