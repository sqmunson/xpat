(function( root, $, undefined ) {
	"use strict";

	$(function () {
		// DOM ready, take it away

        var stickyFeaturedOffsetTop,
            stickyFeatured = $('.sticky-featured'),
            stickyFB = $('.sticky-fb-like'),
            stickyAd = $('.sticky-ad'),
            menuWrapper = $('.menu-wrapper'),
            navDesktop = $('nav.desktop > ul'),
            navShares = $('nav .shares'),
            logo = $('.logo'),
            hamburger = $('.hamburger'),
            mobileShares = $('.hamburger-holder .shares'),
            isSingle = $('body').hasClass('single'),
            mainPost = isSingle ? $('.main-post') : null,
            mainPostRect = mainPost ? mainPost[0].getBoundingClientRect() : null;

        var state = {
            logoHidden: false,
            navDesktop: {
                moved: false
            }
        };

        $(window).bind('scroll touchstart', function() {
            var scrollTop = $(window).scrollTop();

            if (scrollTop > 50) {
                menuWrapper.addClass('menu-shadow');
                if (isSingle) {
                    if (scrollTop > mainPostRect.bottom) {
                        // slide the socials out
                        // navShares.hide('slide', {direction: 'left'}, 1000);
                        // navDesktop.show('slide', {direction: 'up'}, 1000);
                        if (state.navDesktop.moved) {
                            navShares.hide('slide', {direction: 'right'}, 500, function() {
                                navDesktop.show();
                                navDesktop.animate({top:'0px'}, 200);
                            });
                            if (window.innerWidth < 728) {
                                state.logoHidden = false;
                                hamburger.css('float','right');
                                logo.show(); // might cause issues with hamburger click below
                                mobileShares.hide();
                            }
                            state.navDesktop.moved = false;

                        }

                    } else {
                        // slide the socials in
                        if (!state.navDesktop.moved) {
                            navDesktop.animate({top:'-100px'}, 200, function() {
                                navDesktop.hide();
                                navShares.show('slide', {direction: 'right'}, 500);
                            });

                            if (window.innerWidth < 728) {
                                hamburger.css('float','left');
                                logo.hide();
                                state.logoHidden = true;
                                mobileShares.show();
                            }
                            
                            state.navDesktop.moved = true;
                            
                        }
                        // navShares.show('slide', {direction: 'up'}, 1000);
                        // navDesktop.hide('slide', {direction: 'up'}, 1000);

                        // navShares.slideDown();
                        // mobileShares.slideDown();
                    }
                    
                }
            } else {
                menuWrapper.removeClass('menu-shadow');
                if (isSingle) {
                    if (state.navDesktop.moved) {
                        navShares.hide('slide', {direction: 'right'}, 500, function() {
                            navDesktop.show();
                            navDesktop.animate({top:'0px'}, 200);
                        });
                        if (window.innerWidth < 728) {
                            state.logoHidden = false;
                            hamburger.css('float','right');
                            logo.show(); // might cause issues with hamburger click below
                            mobileShares.hide();
                        }
                        
                        state.navDesktop.moved = false;
                    }

                    // navShares.hide('slide', {direction: 'right'}, 1000);
                    // navDesktop.show('slide', {direction: 'up'}, 1000);
                    // navDesktop.slideDown();
                    // navShares.slideUp();
                    // mobileShares.slideUp();
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
            if ($(this).hasClass('show-menu')) {
                e.preventDefault();
                $('.mobile-nav').hide();
                if (!state.logoHidden) {
                    logo.show();
                }
                $('.wrapper').removeClass('show-menu');
            }
        });

        $('.hamburger').click(function(e) {
            e.stopPropagation();
            $('.mobile-nav').toggle();
            if (!state.logoHidden) {
                logo.toggle();
            }
            $('.wrapper').toggleClass('show-menu');
        });

        
	});

} ( this, jQuery ));

function fb_share(url, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (300 / 2);
    var winLeft = (screen.width / 2) - (550 / 2);
    window.open('http://www.facebook.com/sharer/sharer.php?u=' + window.location + '&', 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=550,height=300');
}