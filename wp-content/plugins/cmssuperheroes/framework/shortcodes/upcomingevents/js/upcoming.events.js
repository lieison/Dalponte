jQuery(document).ready(function($) {
	$('#event-loadmore').click(function() {
		var element = $(this);
		var start = element.attr('data-start');
		var more = element.attr('data-more');

		element.find('i').addClass('ion-looping');

		if(start != '' && more != ''){
			start = parseInt(start);
			more = parseInt(more);
			$.post(upevent.ajaxurl, {
				"action" : "up_events_intialize",
				"start" : start,
				"next" : more
			}, function(data) {
				if(data != ''){
					element.parents('.up-event').find('.up-event-main').append(data.content);
					element.attr('data-start',start + more);
				}
				element.find('i').removeClass('ion-looping');
			});
		}
	});
});