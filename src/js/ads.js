jQuery(document).ready(function($, p) {

	window.loadAds = function() {
		var width = window.innerWidth,
		adspots_300x250,
		adspots_300x600,
		adspots_728x90;

	    if (width < 600) {
	    	adspots_300x250 = $('.mobile-300x250');
	    	if (adspots_300x250.length) {
	    		adspots_300x250.each(function() {
	    			if (this.childNodes.length === 0) {
				        p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xpatus/ros/300x250"></script>');
	    			}
	    		});
	    	}
	    }

	    if (width > 728) {
	    	adspots_300x250 = $('.desktop-300x250');
	    	adspots_300x600 = $('.desktop-300x600');
	    	adspots_728x90 = $('.desktop-728x90');

	    	if (adspots_300x250.length) {
	    		adspots_300x250.each(function() {
	    			if (this.childNodes.length === 0) {
				    	p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xpatus/ros/300x250"></script>');
	    			}
	    		});
	    	}

	    	if (adspots_300x600.length) {
	    		adspots_300x600.each(function() {
	    			if (this.childNodes.length === 0) {
			    		p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xpatus/ros/300x600"></script>');
	    			}
	    		});
	    	}

	    	if (adspots_728x90.length) {
	    		adspots_728x90.each(function() {
	    			if (this.childNodes.length === 0) {
				    	p($(this), '<script type="text/javascript" src="http://tags.pubgears.com/xpatus/ros/728x90"></script>');
	    			}
	    		});
	    	}
	    }
	};

}(jQuery, postscribe));