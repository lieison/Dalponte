<?php
function cshero_video($params, $content = null){
	extract(shortcode_atts(array(
	'height' => 320,
	'width' => 640
	), $params));

	wp_enqueue_script('fitvids', CSCORE_PLUGIN_URL . "framework/shortcodes/video/fitvids.js");
	$video = parse_url($content);

	switch($video['host']) {
		case 'youtu.be':
			$id = trim($video['path'],'/');
			$src = 'https://www.youtube.com/embed/' . $id;
			break;
		case 'www.youtube.com':
		case 'youtube.com':
			parse_str($video['query'], $query);
			$id = $query['v'];
			$src = 'https://www.youtube.com/embed/' . $id;
			break;
		case 'vimeo.com':
		case 'www.vimeo.com':
			$id = trim($video['path'],'/');
			$src = "http://player.vimeo.com/video/{$id}";
	}

	$out = '<div id="video-'.esc_attr($id).'" class="shortcode-video">
	<iframe src="'.esc_url($src).'" width="'.esc_attr($width).'" height="'.esc_attr($height).'" style="border:0; max-width:100%;" allowFullScreen></iframe>
	</div>';
	return $out;

}
add_shortcode('cs-video', 'cshero_video');