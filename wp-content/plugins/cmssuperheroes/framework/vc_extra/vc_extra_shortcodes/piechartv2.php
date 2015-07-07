<?php
vc_map(array(
    "name" => "Pie Chart V2",
    "base" => "cs-piechart-v2",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', CSCORE_NAME),
    "admin_enqueue_js" => CSCORE_PLUGIN_URL.'framework/assets/js/vc.options.piechartv2.js',
    "description" => __("Types Chart...", CSCORE_NAME),
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => __("Title", CSCORE_NAME),
            "param_name" => "title"
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Heading Size', CSCORE_NAME),
            "param_name" => "title_tag",
            "value" => array(
                "H1" => "h1",
                "H2" => "h2",
                "H3" => "h3",
                "H4" => "h4",
                "H5" => "h5",
                "H6" => "h6"
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => __('Title Color', CSCORE_NAME),
            "param_name" => "title_color"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Width", CSCORE_NAME),
            "param_name" => "width"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Height", CSCORE_NAME),
            "param_name" => "height"
        ),
        array(
            "type" => "dropdown",
            "heading" => __('Types Char', CSCORE_NAME),
            "param_name" => "type",
            "value" => array(
                "Pie Charts" => "pie_charts",
                "Line Charts" => "line_charts",
                "Bar Charts" => "bar_charts",
                "Bubble Charts" => "bubble_charts",
                "Polar Chart" => "polar_chart",
                "Spider Web" => "spider_web",
            )
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __("Json Data (Edit http://www.jsoneditoronline.org)", CSCORE_NAME),
            "param_name" => "content",
            "description" => __("Demo Follow Type Tab 'Demo Data' or http://www.highcharts.com/demo", CSCORE_NAME)
        ),
        /**
         * Pie Charts
         */
       array(
            "type" => "checkbox",
            "heading" => __("Allow Point Select", CSCORE_NAME),
            "param_name" => "pie_allow_point_select",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "dependency" => array(
                "element" => 'type',
                "value" => array(
                    "pie_charts"
                )
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Show In Legend", CSCORE_NAME),
            "param_name" => "char_in_legend",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "dependency" => array(
                "element" => 'type',
                "value" => array(
                    "pie_charts"
                )
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Show Labels", CSCORE_NAME),
            "param_name" => "char_show_labels",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "dependency" => array(
                "element" => 'type',
                "value" => array(
                    "pie_charts"
                )
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __("Gradient Fill", CSCORE_NAME),
            "param_name" => "char_gradient_fill",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "dependency" => array(
                "element" => 'type',
                "value" => array(
                    "pie_charts"
                )
            )
        ),
        array(
            "type" => "checkbox",
            "heading" => __('3D', CSCORE_NAME),
            "param_name" => "char_show_3d",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "dependency" => array(
                "element" => 'type',
                "value" => array(
                    "pie_charts"
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => __("Alpha", CSCORE_NAME),
            "param_name" => "char_alpha",
            "value" => "",
            "dependency" => array(
                "element" => 'char_show_3d',
                "value" => array(
                    '1'
                )
            ),
            "description" => __("0 to 45", CSCORE_NAME),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Depth", CSCORE_NAME),
            "param_name" => "char_depth",
            "value" => "",
            "dependency" => array(
                "element" => 'char_show_3d',
                "value" => array(
                    '1'
                )
            ),
            "description" => __("0 to 45", CSCORE_NAME),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Inner Size", CSCORE_NAME),
            "param_name" => "pie_innersize",
            "value" => "",
            "dependency" => array(
                "element" => 'type',
                "value" => array(
                    "pie_charts"
                )
            ),
            "description" => __("Default = 0 (Pie) > 0 (Donut)", CSCORE_NAME),
        ),
        /**
         * Line Charts
         */
    )
));