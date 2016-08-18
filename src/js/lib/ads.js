jQuery(document).ready(function($, p) {

	// DFP ad slot variables
	var slotIds = {
		network: '/137188010',
		'728x90': {
			ATF: '/728x90_Desktop_ATF',
			BTF: '/728x90_Desktop_1.BTF'
		},
		'300x250': {
			mobile: {
				top: '/300x250_Mobile_Top',
				mid: '/300x250_Mobile_Mid',
				BTF: '/300x250_Mobile_1.BTF'
			},
			desktop: {
				mid: '/300x250_Desktop_Mid',
				ATF: '/300x250_Desktop_ATF',
				BTF: '/300x250_Desktop_1.BTF'
			}
		},
		'320x50': {
			mobile: {
				top: '/320x50_Mobile_Top'
			}
		}
	};

	window.loadAds = function() {
		var width = window.innerWidth,
			adspots_320x50,
			adspots_300x250,
			adspots_300x600,
			adspots_728x90;

	    if (width < 728) {
	    	// smaller than 728px screen, load mobile ads

	    	adspots_320x50 = $('.mobile-320x50');
	    	adspots_300x250 = $('.mobile-300x250');

	    	if (adspots_300x250.length) {

	    		// loop through each mobile 300x250 placement on the page
	    		adspots_300x250.each(function() {
	    			var id = this.id,
	    				$this = $(this),
	    				slot;

	    			// if the placement div is empty and hasn't previously
	    			// been loaded then we want to load an ad
	    			if (this.childNodes.length === 0 && !$this.hasClass('loaded')) {

	    				// set the loaded flag so we don't try loading again
	    				$this.addClass('loaded');

	    				// '/<network ID>/<ad unit ID>', example: '/137188010/300x250_Mobile_Top'
	    				slot = slotIds.network + ($this.hasClass('top') ? slotIds['300x250'].mobile.top : slotIds['300x250'].mobile.BTF);

	    				// cmd.push adds function to the async queue
	    				googletag.cmd.push(function() {
	    					// googletag.pubads() gets access to ad service,
	    					// display() loads the ad with slot string, size array and div id
	    					googletag.pubads().display(slot, [300, 250], id);
	    				});
	    			}
	    		});
	    	}
	    } else {
	    	// larger than 728px screen, load desktop ads

	    	adspots_300x250 = $('.desktop-300x250');
	    	adspots_300x600 = $('.desktop-300x600');
	    	adspots_728x90 = $('.desktop-728x90');

	    	if (adspots_300x250.length) {

	    		// loop through each desktop 300x250 placement on the page
	    		adspots_300x250.each(function() {
	    			var id = this.id,
	    				$this = $(this),
	    				slot;

	    			// if the placement div is empty and hasn't previously
	    			// been loaded then we want to load an ad
	    			if (this.childNodes.length === 0 && !$this.hasClass('loaded')) {

	    				// set the loaded flag so we don't try loading again
	    				$this.addClass('loaded');

	    				// '/<network ID>/<ad unit ID>', example: '/137188010/300x250_Mobile_Top'
	    				slot = slotIds.network + ($this.hasClass('ATF') ? slotIds['300x250'].desktop.ATF : slotIds['300x250'].desktop.BTF);

	    				// cmd.push adds function to the async queue
	    				googletag.cmd.push(function() {
	    					// googletag.pubads() gets access to ad service,
	    					// display() loads the ad with slot string, size array and div id
		    				googletag.pubads().display(slot, [300, 250], id);
	    				});
	    			}
	    		});
	    	}

	    	if (adspots_728x90.length) {

	    		// loop through each desktop 300x250 placement on the page
	    		adspots_728x90.each(function() {
	    			var id = this.id,
	    				$this = $(this),
	    				slot;

	    			// if the placement div is empty and hasn't previously
	    			// been loaded then we want to load an ad
	    			if (this.childNodes.length === 0 && !$this.hasClass('loaded')) {

	    				// set the loaded flag so we don't try loading again
	    				$this.addClass('loaded');

	    				// '/<network ID>/<ad unit ID>', example: '/137188010/300x250_Mobile_Top'
	    				slot = slotIds.network + ($this.hasClass('ATF') ? slotIds['728x90'].ATF : slotIds['728x90'].BTF);

	    				// cmd.push adds function to the async queue
	    				googletag.cmd.push(function() {
	    					// googletag.pubads() gets access to ad service,
	    					// display() loads the ad with slot string, size array and div id
		    				googletag.pubads().display(slot, [728, 90], id);
	    				});
	    			}
	    		});
	    	}
	    }
	};

}(jQuery, postscribe));