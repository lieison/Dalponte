jQuery(document).ready(function($){
	"use strict";
    $('.cs-full-piechart').each(function(){
        var value = $(this).attr('data-value');
        var type = $(this).attr('data-type');
        var cutout = $(this).attr('data-cutout');

        if(value != undefined && value != ''){
            var ctx = $(this).find('canvas').get(0).getContext("2d");
            var char;
            $(this).waypoint(function() {
            	switch (type) {
				case 'doughnut':
					char = new Chart(ctx).Doughnut($.parseJSON(decodeURIComponent(value)), {responsive : true, segmentShowStroke : false, percentageInnerCutout: cutout});
					break;
				case 'pie':
					char = new Chart(ctx).Pie($.parseJSON(decodeURIComponent(value)), {responsive : true, segmentShowStroke : false});
					break;
				case 'polararea':
					char = new Chart(ctx).PolarArea($.parseJSON(decodeURIComponent(value)), {responsive : true, segmentShowStroke : false});
					break;
				case 'linechart':
					char = new Chart(ctx).Line($.parseJSON(decodeURIComponent(atob(value))), {responsive : true, segmentShowStroke : false});
					break;
				case 'barchart':
					char = new Chart(ctx).Bar($.parseJSON(decodeURIComponent(atob(value))), {responsive : true, segmentShowStroke : false});
					break;
				case 'radarchart':
					char = new Chart(ctx).Radar($.parseJSON(decodeURIComponent(atob(value))), {responsive : true, segmentShowStroke : false});
					break;
            	}
            },{offset: '95%', triggerOnce: true});
        }
    });
});
