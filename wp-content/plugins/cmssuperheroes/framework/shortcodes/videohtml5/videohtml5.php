<?php

function cshero_videohtml5($params, $content = null) {
    extract(shortcode_atts(array(
    		'layout' =>'videohtml5.layout1',
    		'el_class' => '',
            'poster' => '',
            'crop_image' => '0',
            'width_image' => 360,
            'height_image' => 240,
            'autoplay' => false,
            'muted' => false,
            'loop' => false,
            'controls' => false,
            'show_btn' => false,
            'icon' => 'fa fa-play',
            'text' => '',
            'style' => 'circle',
            'size' => 'normal',
            'preload' => 'none',
            'bg_video_color' => '',
            'bg_video_src_mp4' => '',
            'bg_video_src_ogv' => '',
            'bg_video_src_webm' => '',
    ), $params));
	$class = 'videohtml5_wrap '.str_replace('.','-',$layout).' '.esc_attr($el_class).'';

	
	/* Video */
	if(is_numeric($poster)) {
		$image_src = wp_get_attachment_url( $poster );
	}else {
		$image_src = $poster;
	}
	if($crop_image == '1'){
		$image_src = mr_image_resize( $image_src, $width_image, $height_image, true, 'c', false );		
	}
    $bg_video = '';
    $bg_video_args = array();
    if ($bg_video_src_mp4) {
        $bg_video_args['mp4'] = $bg_video_src_mp4;
    }
    if ($bg_video_src_ogv) {
        $bg_video_args['ogv'] = $bg_video_src_ogv;
    }
    if ($bg_video_src_webm) {
        $bg_video_args['webm'] = $bg_video_src_webm;
    }
	$uniqid = uniqid('videohtml5');
    if (!empty($bg_video_args)) {
		$attr_strings = array(
            'id="'.$uniqid.'"',
            'data-id="'.$uniqid.'"',
        );
		if (!empty($image_src)) {
			$attr_strings[] = 'poster="'.$image_src.'"';
		}
		if ($autoplay==true) {
			$attr_strings[] = 'autoplay';
		}
		if ($muted==true) {
			$attr_strings[] = 'muted';
		}
		if ($loop==true) {
			$attr_strings[] = 'loop';
		}
		if ($controls==true) {
			$attr_strings[] = 'controls="controls"';
		}
		if ($preload) {
			$attr_strings[] = 'preload="'.$preload.'"';
		}
		$source_html = null;
        $source = '<source type="%s" src="%s" />';
        foreach ($bg_video_args as $video_type => $video_src) {
            $video_type = wp_check_filetype($video_src, wp_get_mime_types());
            $source_html .= sprintf($source, $video_type['type'], esc_url($video_src));
        }
    }
	ob_start(); ?>
		<?php 

            $file_layout= "cms_templates/videohtml5/layouts/$layout.php";
            $file_css   = "cms_templates/videohtml5/css/$layout.css";
            if(locate_template($file_layout)){
                if(locate_template($file_css))
                    wp_enqueue_style("videohtml5-$layout",get_template_directory_uri()."/".$file_css);
                require locate_template($file_layout);
            }else{
                    wp_enqueue_style("videohtml5-$layout", CSCORE_PLUGIN_URL . "framework/shortcodes/videohtml5/css/$layout.css");
                    require  "layouts/$layout.php";
                }

		?>
	<?php
    return ob_get_clean();
}

add_shortcode('videohtml5', 'cshero_videohtml5');
