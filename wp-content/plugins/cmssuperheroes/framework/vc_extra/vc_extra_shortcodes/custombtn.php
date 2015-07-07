<?php

add_action('init', 'custombtn_integrateWithVC');

function custombtn_integrateWithVC() {
    vc_map(array(
        "name" => __("Custom Button", CSCORE_NAME),
        "base" => "cs-custombtn",
        "class" => "cs-custombtn",
        "category" => __('CS Hero', CSCORE_NAME),
        "icon" => "cs_icon_for_vc",
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Element Selector", CSCORE_NAME),
                "param_name" => "el_selector",
                "value" => ".section-scroll-top",
                "description" => __("Element Selector.", CSCORE_NAME)
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon Class", CSCORE_NAME),
                "param_name" => "icon_class",
                "value" => "fa fa-arrow-down",
                "description" => __("Icon Class.", CSCORE_NAME)
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", CSCORE_NAME),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("Extra Class.", CSCORE_NAME)
            ),
        )
    ));
}
