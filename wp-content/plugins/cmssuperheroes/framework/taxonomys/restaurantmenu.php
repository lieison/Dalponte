<?php
cs_options(array(
    'id'=>'img',
    'label'=>__('Category Image', CSCORE_NAME),
    'type' => 'image',
    'desc'=> __('Select a background image for category', CSCORE_NAME)
));
cs_options(array(
    'id' => 'bg_parallax',
    'label' => __('Parallax Background',CSCORE_NAME),
    'type' => 'switch',
    'options' => array('on'=>'yes','off'=>'no'),
    'value' => 'yes',
));
cs_options(array(
    'id'=>'bg_parallax_speed',
    'label'=>'Parallax Speed',
    'type'=>'text',
    'desc'=>__('Default 0.6', CSCORE_NAME)
));
?>