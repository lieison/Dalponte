jQuery(document).ready(function($) {
	"use strict";
	$('.pricing-video').on('click', '.pricing-video-play', function() {
		"use strict";
		var video = $(this).parent().find('video');
		video.get(0).play();
		video.removeClass('pause').addClass('play');
		control($(this),video);
	});
	$('.pricing-video').on('click', 'video', function() {
		"use strict";
		var video = $(this);
		var video_control = video.parent().find('.pricing-video-play');
		if($(this).hasClass('play')){
			video.get(0).pause();
			control(video_control, video);
			video.removeClass('play').addClass('pause');
		} else {
			video.get(0).play();
			control(video_control, video);
			video.removeClass('pause').addClass('play');
		}
	});
	function control(control,video) {
		control.css({
			display : 'none'
		});
		video.get(0).onpause = function() {
			control.css({
				display : 'block'
			});
			video.removeClass('play').addClass('pause');
		}
	}
})