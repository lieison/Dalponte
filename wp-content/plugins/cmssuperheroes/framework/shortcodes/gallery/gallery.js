jQuery(function($){
	"use strict";
	$gallery = $('ul.gallery');
	$gallery.isotope({
		// options
		itemSelector : 'li',
		layoutMode : 'fitRows',
		transformsEnabled: true
	});

	$filter = $('.gallery-filters');
	$selectors = $filter.find('>a');

	$filter.find('>a').click(function(){
		var selector = $(this).attr('data-filter');

		$selectors.removeClass('active');
		$(this).addClass('active');

		$gallery.isotope({ filter: selector });
		return false;
	});
});