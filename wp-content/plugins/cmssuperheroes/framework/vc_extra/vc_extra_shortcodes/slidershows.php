<?php
/* --------------------------------------------------------------------- */
/* Shortcode Slideshows*/
/* --------------------------------------------------------------------- */
vc_map(array(
    "name" => __("Slideshows",CSCORE_NAME),
    "base" => "cs-shortcode-slideshows",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero',CSCORE_NAME),
    "description" => __("Custom slideshows.", CSCORE_NAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME)
        ),
    	array (
				"type" => "dropdown",
				"heading" => __ ( 'Show page', CSCORE_NAME ),
				"param_name" => "show_page",
				"value" => array (
						__ ( "Yes", "js_composer" ) => "1",
						__ ( "No", "js_composer" ) => "0"
				),
				"description" => __ ( 'Show or hide page on your Slidershows.', CSCORE_NAME )
			),
    	array (
        		"type" => "dropdown",
        		"heading" => __ ( 'Show shadow', CSCORE_NAME ),
        		"param_name" => "show_shadow",
        		"value" => array (
        				__ ( "Yes", "js_composer" ) => "1",
        				__ ( "No", "js_composer" ) => "0"
        		),
        		"description" => __ ( 'Show or hide shadow slidershows.', CSCORE_NAME )
        	),
        array(
            "type" => "attach_images",
            "heading" => __("Slideshows images upload", CSCORE_NAME),
            "param_name" => "slideshows_images",
            "value" => "",
            "description" => __("Select image from media to slidershows.", CSCORE_NAME)
        )
    )
));
?>