jQuery(document).ready(function($) {
"use strict";
/* element */
var select = $('#event_countdown');
var data_count = select.attr('data-count');
var data_style = (select.attr('data-style') != undefined) ? select.attr('data-style'): 'before';

if (data_count != undefined) {
	
	/* data label. */
	var data_label = select.attr('data-label');
	data_label = (data_label != undefined && data_label != '') ? data_label.split(',') : data_label = [ 'DAYS', 'HOURS', 'MINUTES','SENCONDS' ];

	/* run countdown. */
	select.countdown(data_count,function(event) {
		var p_seconds = Math.round(100 - (event.offset.seconds / 60) * 100) ;
		var p_minutes = Math.round(100 - (event.offset.minutes / 60) * 100) ;
		var p_hours = Math.round(100 - (event.offset.hours / 24) * 100) ;
		
		var str = "";
		switch (true){
			case (data_style == 'after'):
				str = '<ul><li class="cs-count-day"><span>%D</span><span>'+data_label[0]+
				'</span></li><li class="cs-count-hours"><span>%H</span><span>'+data_label[1]+
				'</span></li><li class="cs-count-minutes"><span>%M</span><span>'+data_label[2]+
				'</span></li><li class="cs-count-sencond"><span>%S</span><span>'+data_label[3]+
				'</span></li></ul>';
				break;
			case (data_style == 'before'):
				str = '<ul><li class="cs-count-day"><span>'+data_label[0]+'</span><span>%D</span>'+
				'</li><li class="cs-count-hours"><span>'+data_label[1]+'</span><span>%H</span>'+
				'</li><li class="cs-count-minutes"><span>'+data_label[2]+'</span><span>%M</span>'+
				'</li><li class="cs-count-sencond"><span>'+data_label[3]+'</span><span>%S</span>'+
				'</li></ul>';
				break;
			case (data_style == 'circle'):
				str = '<div class="cs-count-day col-xs-6 col-sm-6 col-md-3 col-lg-3"><span class="days progress progress-'+p_hours+'"><span>%D</span></span><span>'+data_label[0]+'</span></div>'+
					'<div class="cs-count-hours col-xs-6 col-sm-6 col-md-3 col-lg-3"><span class="hours progress progress-'+p_hours+'"><span>%H</span></span><span>'+data_label[1]+'</span></div>'+
					'<div class="cs-count-minutes col-xs-6 col-sm-6 col-md-3 col-lg-3"><span class="minutes progress progress-'+p_minutes+'"><span>%M</span></span><span>'+data_label[2]+'</span></div>'+
					'<div class="cs-count-sencond col-xs-6 col-sm-6 col-md-3 col-lg-3"><span class="second progress progress-'+p_seconds+'"><span>%S</span></span><span>'+data_label[3]+'</span></div>';
				break;
		}
		
		var $this = $(this).html(event.strftime(str));
	});
}});