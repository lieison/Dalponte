jQuery(document).ready(function($) {
	"use strict";
	$('.cs-process').waypoint(function(){
		"use strict";
		var i = 0;
		var ul = $(this).find('ul');
		setInterval(function(){
			var li_selecter = ul.find('i:eq('+i+')');
			if(li_selecter.length > 0){
				li_selecter.addClass('wpb_start_animation wpb_appear_v2');
			} else {
				clearInterval(this);
			}
			i++;
		},500);
	},{
		offset : '70%',
		triggerOnce : true
	});
});