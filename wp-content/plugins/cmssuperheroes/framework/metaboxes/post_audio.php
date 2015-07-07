<div class='cs_metabox'>
	<?php
    cs_options(array(
        'id' => 'post_audio_type',
        'label' => __('Audio Type', CSCORE_NAME),
        'type' => 'select',
        'options' => array(
            '' => 'None',
            'content' => 'From Post',
            'ogg' => 'OGG',
            'mp3' => 'MP3',
            'wav' => 'WAV'
        )
    ));
    cs_options(array(
        'id' => 'post_audio_url',
        'label' => __('File URL',CSCORE_NAME),
        'type' => 'text',
        'placeholder' => __('(OGG,MP3,WAV)', CSCORE_NAME),
    ));
?>
</div>
<?php
