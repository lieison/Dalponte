jQuery(document).ready(function($) {
	"use strict";
	$('.highcharts-content').each(function() {
		var data = $(this).attr('data-char');
		var type = $(this).attr('data-type');
		var options = $(this).attr('data-options');
		if(data != undefined && data != ''){
			data = $.parseJSON(decodeURIComponent(window.atob(data)));
			if(options != undefined && options != ''){
				options = $.parseJSON(decodeURIComponent(window.atob(options)));
				switch (type) {
				case 'pie_charts':
					if(options.show_3d == '1'){
						data.chart = {
							options3d: {
				                enabled: true,
				                alpha: options.alpha,
				                beta: 0
				            }
						};
					}
					data.plotOptions = {pie:{
						allowPointSelect: (options.allow_point_select == '1') ? true : false ,
						cursor: 'pointer',
						dataLabels:{enabled: (options.show_in_labels == '1') ? true : false },
						showInLegend: (options.show_in_legend == '1') ? true : false,
						depth: options.depth,
						innerSize: options.innersize,
						}
					};
					break;
				default:
					break;
				};
				data.legend = {
			            layout: 'vertical',
			            align: 'left',
			            verticalAlign: 'middle',
			            borderWidth: 0
			        };
			}
			$(this).highcharts(data);
		}
	});
	$('.highcharts-container text[text-anchor="end"]').remove();
});
