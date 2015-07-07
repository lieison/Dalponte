<?php
/* --------------------------------------------------------------------- */
/* Shortcode Logo */
/* --------------------------------------------------------------------- */
vc_map(array(
    "name" => __("Logo",CSCORE_NAME),
    "base" => "cs-shortcode-logo",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero',CSCORE_NAME),
    "description" => __("Custom logo.", CSCORE_NAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __("Logo Height", CSCORE_NAME),
            "param_name" => "logo_height",
            "description" => __("Logo Height. In px,...", CSCORE_NAME)
        ),
        array(
            "type" => "attach_image",
            "heading" => __("Logo", CSCORE_NAME),
            "param_name" => "logo",
            "value" => "",
            "description" => __("Default get logo from admin.", CSCORE_NAME)
        )
    )
));
?>