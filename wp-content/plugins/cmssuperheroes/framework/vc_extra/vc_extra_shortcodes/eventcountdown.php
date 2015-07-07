<?php
if (class_exists('CMSEvents')) {
    vc_map(array(
        "name" => 'Event Count Down',
        "base" => "cs-next-event",
        "icon" => "cs_icon_for_vc",
        "category" => __('CS Hero', CSCORE_NAME),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __('Title', CSCORE_NAME),
                "param_name" => "title"
            ),
            array(
                "type" => "textfield",
                "heading" => __('Description', CSCORE_NAME),
                "param_name" => "description"
            ),
            array (
                "type" => "pro_taxonomy",
                "taxonomy" => "event_category",
                "heading" => __ ( "Categories", CSCORE_NAME ),
                "param_name" => "category"
            ),
            array (
                "type" => "dropdown",
                "heading" => __ ( 'Show image', CSCORE_NAME ),
                "param_name" => "show_image",
                "value" => array (
                    "Yes"=>1,
                    "No"=>0
                ),
                "group" => "",
                "description" => __ ( 'Show or hide image.', CSCORE_NAME )
            ),
            array(
                "type" => "attach_image",
                "heading" => __('Image', CSCORE_NAME),
                "param_name" => "image"
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Crop Image', CSCORE_NAME),
                "param_name" => "crop_image",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                )
            ),
            array(
                "type" => "textfield",
                "heading" => __('Width Image', CSCORE_NAME),
                "param_name" => "width_image"
            ),
            array(
                "type" => "textfield",
                "heading" => __('Height Image', CSCORE_NAME),
                "param_name" => "height_image"
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Style", CSCORE_NAME),
                "param_name" => "layout",
                "value" => cscore_get_files_name_array("eventcountdown"),
                "description" => 'Select style for Next Event.'
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Numbers Position", CSCORE_NAME),
                "param_name" => "number_position",
                "value" => array('Default'=>'','After'=>'after','Circle'=>'circle'),
            ),
            array(
                "type" => "dropdown",
                "heading" => __ ( 'Show title', CSCORE_NAME ),
                "param_name" => "show_title",
                "value" => array (
                    "Yes"=>1,
                    "No"=>0
                ),
                "group" => "",
                "description" => __ ( 'Show or hide title.', CSCORE_NAME )
            ),
            array(
                "type" => "textfield",
                "heading" => __('Length Description', CSCORE_NAME),
                "param_name" => "length_description"
            )
        )
    ));
}