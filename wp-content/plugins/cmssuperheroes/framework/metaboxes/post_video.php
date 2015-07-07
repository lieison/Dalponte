<div class='cs_metabox'>
	<?php
    cs_options(array(
    'id' => 'post_video_source',
    'label' => __('Select Source', CSCORE_NAME),
    'type' => 'select',
    'options' => array(
        '' => 'None',
        'post' => 'From Post',
        'media' => 'From Media',
        'youtube' => 'Youtube',
        'vimeo' => 'Vimeo'
        )
    ));
    ?>
	<div id="cs_video_setting">
	<?php
    cs_options(array(
        'id' => 'post_video_type',
        'label' => __('Video Type', CSCORE_NAME),
        'type' => 'select',
        'options' => array(
            'mp4' => 'MP4',
            'webm' => 'WebM',
            'ogg' => 'Ogg'
        )
    ));
    cs_options(array(
        'id' => 'post_video_url',
        'label' => __('Video URL', CSCORE_NAME),
        'type' => 'text',
        'placeholder' => __('Please upload the (MP4,WebM,Ogg) video file', CSCORE_NAME)
    ));
    cs_options(array(
        'id' => 'post_preview_image',
        'label' => __('Preview Image', CSCORE_NAME),
        'type' => 'images',
        'field' => 'single'
    ));
    cs_options(array(
        'id' => 'post_video_youtube',
        'label' => __('Youtube', CSCORE_NAME),
        'type' => 'text',
        'placeholder' => 'http://youtu.be/ID'
    ));
    cs_options(array(
        'id' => 'post_video_vimeo',
        'label' => __('Vimeo', CSCORE_NAME),
        'type' => 'text',
        'placeholder' => 'http://vimeo.com/ID'
    ));
    cs_options(array(
        'id' => 'post_video_height',
        'label' => __('Video Height', CSCORE_NAME),
        'type' => 'text',
        'placeholder' => '360px'
    ));
    ?>
	<p class="cs_info">
			<i class="dashicons dashicons-dashboard"></i><a
				href="http://www.w3schools.com/html/html5_video.asp"><?php echo _e('Video Formats and Browser Support',CSCORE_NAME); ?></a>
		</p>
	</div>
</div>
<?php
