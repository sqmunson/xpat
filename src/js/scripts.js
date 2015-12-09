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
            headerLike = $('.fb-like-header'),
            logo = $('.logo'),
            hamburger = $('.hamburger'),
            mobileShares = $('.hamburger-holder .shares'),
            body = $('body'),
            isSingle = body.hasClass('single'),
            isHome = body.hasClass('home'),
            mainPost = isSingle ? $('.main-post') : null,
            mainPostRect = mainPost ? mainPost[0].getBoundingClientRect() : null;

        var state = {
            scrollTop: 0,
            logoHidden: false,
            sharesHidden: true,
            headerLikeHidden: true,
            navDesktop: {
                moved: false
            }
        };

        function showShares() {
            if (!state.navDesktop.moved) {

                // move the normal nav up off screen
                navDesktop.animate({top:'-100px'}, 200, function() {

                    // then hide the nav
                    navDesktop.hide();

                    // slide the desktop shares in
                    navShares.show('slide', {direction: 'right'}, 500);
                });

                // record the state
                state.navDesktop.moved = true;

                // if we're in mobile view
                if (window.innerWidth < 728) {

                    // move hamburger to left
                    hamburger.css('float','left');

                    // hide the logo
                    logo.hide();

                    // show the mobile shares
                    mobileShares.show();

                    // record the state
                    state.logoHidden = true;
                    state.sharesHidden = false;
                }

            }
        }

        function hideShares() {
            if (state.navDesktop.moved) {

                // slide the desktop shares off screen
                navShares.hide('slide', {direction: 'right'}, 500, function() {

                    // show the desktop nav
                    navDesktop.show();

                    // slide the desktop nav back into view
                    navDesktop.animate({top:'0px'}, 200);
                });

                // record desktop state
                state.navDesktop.moved = false;

                // if we're in mobile
                if (window.innerWidth < 728) {

                    // move the hamburger back to the right
                    hamburger.css('float','right');

                    // show the logo
                    logo.show(); // might cause issues with hamburger click below

                    // hide the mobile shares
                    mobileShares.hide();

                    // record the state
                    state.logoHidden = false;
                    state.sharesHidden = true;
                }
            }
        }

        function handleStickyFeatured() {
            if (state.scrollTop >= stickyFeaturedOffsetTop - menuWrapper.height()) {
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

        function toggleMobileMenuChildren() {
            $(this).nextAll('ul.sub-menu').slideToggle();
            $(this).toggleClass('active');
        }

        $(window).bind('scroll touchstart', function() {
            var width = window.innerWidth;

            state.scrollTop = $(window).scrollTop();

            if ($('.mobile-nav').is(':visible')) { return; }

            if (state.scrollTop > 50) {

                menuWrapper.addClass('menu-shadow');

                if (isHome && width < 1050) {
                    // turn logo into Like Button
                    // logo.hide();
                    // headerLike.show();
                    // state.logoHidden = true;
                    // state.headerLikeHidden = false;
                }

                if (isSingle) {

                    if (state.scrollTop > mainPostRect.bottom) {

                        hideShares();

                    } else {

                        showShares();

                    }
                }

            } else {

                menuWrapper.removeClass('menu-shadow');

                if (isHome && width < 1050) {
                    // turn Like Button back into logo
                    // logo.show();
                    // headerLike.hide();
                    // state.logoHidden = false;
                    // state.headerLikeHidden = true;
                }

                if (isSingle) {

                    hideShares();

                }

            }

            if (stickyFeatured.is(':visible')) {

                handleStickyFeatured();

            }

        });

        function toggleMobileNav() {
            $('.mobile-nav').toggle();
            $('.wrapper').toggleClass('show-menu');
            $('body').toggleClass('show-menu');

            if (!state.sharesHidden) {
                mobileShares.toggle();
            }

            if (!state.logoHidden) {
                logo.toggle();
            }

            if (!state.headerLikeHidden) {
                // headerLike.toggle();
            }
        }

        function preventScroll(e) {
            e.preventDefault();
        }

        $('.wrapper').click(function(e) {
            if ($(this).hasClass('show-menu')) {
                e.stopPropagation();
                e.preventDefault();

                toggleMobileNav();

                // $('body').off('touchstart', '.wrapper', preventScroll);
                // $('body').off('touchmove', '.wrapper', preventScroll);
            }
        });

        $('.hamburger').click(function(e) {
            e.stopPropagation();

            // var menuOpen = $('.mobile-nav').is(':visible');

            toggleMobileNav();

            // if (!menuOpen) {
                // $('body').on('touchstart', '.wrapper', preventScroll);
                // $('body').on('touchmove', '.wrapper', preventScroll);
            // }

        });

        $('.show-children').click(toggleMobileMenuChildren);

	});

} ( this, jQuery ));

function fb_share(url, winWidth, winHeight) {
    var winTop = (screen.height / 2) - (300 / 2);
    var winLeft = (screen.width / 2) - (550 / 2);
    var location = window.location;
    var url = location.protocol + '//' + location.host + location.pathname + location.hash;
    window.open('http://www.facebook.com/sharer/sharer.php?u=' + url + '&', 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=550,height=300');
}