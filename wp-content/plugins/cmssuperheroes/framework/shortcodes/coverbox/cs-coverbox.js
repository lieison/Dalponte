jQuery(document).ready(function($){
	"use strict";
	$('.cover_boxes').each(function(){
		"use strict";
		var id = $(this).attr('id');
		$(this).find('li').hover(function() {
			$('#'+id+' li').removeClass('active');
			$(this).addClass('active');
		});
	});
});