jQuery(window).load(function(e) {
	"use strict";
	jQuery('.cs-gallery').each(function(){
		"use strict";
		if (jQuery(this).attr('data-columns') != '1') {
			var id = jQuery(this).attr('id');
			var container = document.querySelector('#'+id+'');
			new Masonry(container,{
			});
		}
	});
});