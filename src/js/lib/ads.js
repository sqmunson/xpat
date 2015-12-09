jQuery(document).ready(function($, p) {

	window.loadAds = function() {
		var width = window.innerWidth,
		adspots_300x50,
		adspots_300x250,
		adspots_300x600,
		adspots_728x90;

		console.log('LOAD ADS');

	    if (width < 728) {
	    	// smaller than 728px screen
	    	adspots_300x50 = $('.mobile-300x50');
	    	adspots_300x250 = $('.mobile-300x250');

	    	if (adspots_300x50.length) {
	    		adspots_300x50.each(function() {
	    			if (this.childNodes.length === 0 && !$(this).hasClass('loaded')) {
	    				$(this).addClass('loaded');
				        p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xpatrow/ros/300x50?cb=' + Math.round(Math.random() * 100000) + '"></script><div class="space"></div>');
	    			}
	    		});
	    	}

	    	if (adspots_300x250.length) {
	    		adspots_300x250.each(function() {
	    			if (this.childNodes.length === 0 && !$(this).hasClass('loaded')) {
	    				$(this).addClass('loaded');
				        p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xptnt2/ros/300x250?cb=' + Math.round(Math.random() * 100000) + '&domain=' + window.location.hostname + '"></script><div class="space"></div>');
				        // p($(this), '<script type="text/javascript">kmn_placement = "102df5c44f5f8da4eed0736e427d5df6";</script><script type="text/javascript" src="//cdn.komoona.com/scripts/kmn_sa.js"></script><div class="space"></div>');
				        // $(this).append('<script type="text/javascript">kmn_placement = "102df5c44f5f8da4eed0736e427d5df6";</script><script type="text/javascript" src="//cdn.komoona.com/scripts/kmn_sa.js"></script><div class="space"></div>');
						// p($(this), '<div id="kmni_102df5c44f5f8da4eed0736e427d5df6"></div><script type="text/javascript" src="//cdn.komoona.com/scripts/kmn_sa.js" async></script><script type="text/javascript"> var kmn_tags = window.kmn_tags || []; kmn_tags.push("102df5c44f5f8da4eed0736e427d5df6"); </script><div class="space"></div>');
	    			}
	    		});
	    	}
	    } else {
	    	// larger than 728px screen
	    	adspots_300x250 = $('.desktop-300x250');
	    	adspots_300x600 = $('.desktop-300x600');
	    	adspots_728x90 = $('.desktop-728x90');

	    	if (adspots_300x250.length) {
	    		adspots_300x250.each(function() {
	    			if (this.childNodes.length === 0 && !$(this).hasClass('loaded')) {
	    				$(this).addClass('loaded');
				    	p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xpatus/ros/300x250?cb=' + Math.round(Math.random() * 100000) + '"></script><div class="space"></div>');
				        // p($(this), '<script type="text/javascript">kmn_placement = "102df5c44f5f8da4eed0736e427d5df6";</script><script type="text/javascript" src="//cdn.komoona.com/scripts/kmn_sa.js"></script><div class="space"></div>');
	    			}
	    		});
	    	}

	    	if (adspots_300x600.length) {
	    		adspots_300x600.each(function() {
	    			if (this.childNodes.length === 0 && !$(this).hasClass('loaded')) {
	    				$(this).addClass('loaded');
			    		p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xpatus/ros/300x600?cb=' + Math.round(Math.random() * 100000) + '"></script><div class="space"></div>');
	    			}
	    		});
	    	}

	    	if (adspots_728x90.length) {
	    		adspots_728x90.each(function() {
	    			if (this.childNodes.length === 0 && !$(this).hasClass('loaded')) {
	    				$(this).addClass('loaded');
				    	p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xpatus/ros/728x90?cb=' + Math.round(Math.random() * 100000) + '"></script><div class="space"></div>');
	    			}
	    		});
	    	}
	    }
	};

}(jQuery, postscribe));