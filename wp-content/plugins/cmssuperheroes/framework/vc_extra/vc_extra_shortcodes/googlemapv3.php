<?php
vc_map(array(
    "name" => 'Google Map V3',
    "base" => "cs-extra-map",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', CSCORE_NAME),
    "description" => __('Map API V3 Unlimited Style', CSCORE_NAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('Title', CSCORE_NAME),
            "param_name" => "title",
            "description" => __('Title of Map', CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Heading size", CSCORE_NAME),
            "param_name" => "heading_size",
            "value" => array(
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 3" => "h3",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6"
            ),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __('Title Color', CSCORE_NAME),
            "param_name" => "title_color",
            "description" => ''
        ),
        array(
            "type" => "textfield",
            "heading" => __('API Key', CSCORE_NAME),
            "param_name" => "api",
            "value" => '',
            "description" => __('Enter you api key of map, get key from (https://console.developers.google.com)', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Address', CSCORE_NAME),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => __('Enter address of Map', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Coordinate', CSCORE_NAME),
            "param_name" => "coordinate",
            "value" => '',
            "description" => __('Enter coordinate of Map, format input (latitude, longitude)', CSCORE_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Click Show Info window', CSCORE_NAME),
            "param_name" => "infoclick",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "group" => __("Marker", CSCORE_NAME),
            "description" => __('Click a marker and show info window (Default Show).', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Coordinate', CSCORE_NAME),
            "param_name" => "markercoordinate",
            "value" => '',
            "group" => __("Marker", CSCORE_NAME),
            "description" => __('Enter marker coordinate of Map, format input (latitude, longitude)', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Title', CSCORE_NAME),
            "param_name" => "markertitle",
            "value" => '',
            "group" => __("Marker", CSCORE_NAME),
            "description" => __('Enter Title Info windows for marker', CSCORE_NAME)
        ),
        array(
            "type" => "textarea",
            "heading" => __('Marker Description', CSCORE_NAME),
            "param_name" => "markerdesc",
            "value" => '',
            "group" => __("Marker", CSCORE_NAME),
            "description" => __('Enter Description Info windows for marker', CSCORE_NAME)
        ),
        array(
            "type" => "attach_image",
            "heading" => __('Marker Icon', CSCORE_NAME),
            "param_name" => "markericon",
            "value" => '',
            "group" => __("Marker", CSCORE_NAME),
            "description" => __('Select image icon for marker', CSCORE_NAME)
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Marker List', CSCORE_NAME),
            "param_name" => "markerlist",
            "value" => '',
            "group" => __("Multiple Marker", CSCORE_NAME),
            "description" => __('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Info Window Max Width', CSCORE_NAME),
            "param_name" => "infowidth",
            "value" => '200',
            "group" => __("Marker", CSCORE_NAME),
            "description" => __('Set max width for info window', CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map Type", CSCORE_NAME),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => __('Select the map type.', CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style Template", CSCORE_NAME),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Custom" => "custom",
                "Light Monochrome" => "light-monochrome",
                "Blue water" => "blue-water",
                "Midnight Commander" => "midnight-commander",
                "Paper" => "paper",
                "Red Hues" => "red-hues",
                "Hot Pink" => "hot-pink"
            ),
            "group" => __("Map Style", CSCORE_NAME),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Custom Template', CSCORE_NAME),
            "param_name" => "content",
            "value" => '',
            "group" => __("Map Style", CSCORE_NAME),
            "description" => __('Get template from http://snazzymaps.com', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Zoom', CSCORE_NAME),
            "param_name" => "zoom",
            "value" => '13',
            "description" => __('zoom level of map, default is 13', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Width', CSCORE_NAME),
            "param_name" => "width",
            "value" => 'auto',
            "description" => __('Width of map without pixel, default is auto', CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __('Height', CSCORE_NAME),
            "param_name" => "height",
            "value" => '350px',
            "description" => __('Height of map without pixel, default is 350px', CSCORE_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scroll Wheel', CSCORE_NAME),
            "param_name" => "scrollwheel",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "group" => __("Controls", CSCORE_NAME),
            "description" => __('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', CSCORE_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Pan Control', CSCORE_NAME),
            "param_name" => "pancontrol",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "group" => __("Controls", CSCORE_NAME),
            "description" => __('Show or hide Pan control.', CSCORE_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Zoom Control', CSCORE_NAME),
            "param_name" => "zoomcontrol",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "group" => __("Controls", CSCORE_NAME),
            "description" => __('Show or hide Zoom Control.', CSCORE_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scale Control', CSCORE_NAME),
            "param_name" => "scalecontrol",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "group" => __("Controls", CSCORE_NAME),
            "description" => __('Show or hide Scale Control.', CSCORE_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Map Type Control', CSCORE_NAME),
            "param_name" => "maptypecontrol",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "group" => __("Controls", CSCORE_NAME),
            "description" => __('Show or hide Map Type Control.', CSCORE_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Street View Control', CSCORE_NAME),
            "param_name" => "streetviewcontrol",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "group" => __("Controls", CSCORE_NAME),
            "description" => __('Show or hide Street View Control.', CSCORE_NAME)
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Over View Map Control', CSCORE_NAME),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                __("Yes, please", CSCORE_NAME) => true
            ),
            "group" => __("Controls", CSCORE_NAME),
            "description" => __('Show or hide Over View Map Control.', CSCORE_NAME)
        )
    )
));