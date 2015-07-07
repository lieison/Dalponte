<?php
global $sc_border_style;
vc_map(array(
    "name" => __("Process",CSCORE_NAME),
    "base" => "cs-process",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero',CSCORE_NAME),
    "description" => __("Process 4 Step.", CSCORE_NAME),
    "params" => array(
        
        array (
            "type" => "dropdown",
            "heading" => __ ( "Layout", CSCORE_NAME ),
            "param_name" => "layout",
            "value" =>cscore_get_files_name_array("process"),
            "description" => 'Select your style of layout.',
            "group" => "General",
            "default" => 'process.layout1'
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Title Heading size", CSCORE_NAME),
            "param_name" => "title_heading_size",
            "value" => array(
                "Default"   => "",
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 3" => "h3",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6"
            ),
            "description" => 'Select your heading size for title.',
            "group" => "General"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Title Color", CSCORE_NAME),
            "param_name" => "title_color",
            "description" => __("Insert title color", CSCORE_NAME),
            "group" => "General",
            "default" => "#111"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title Margin", CSCORE_NAME),
            "param_name" => "title_margin",
            "description" => __("Insert title margin", CSCORE_NAME),
            "group" => "General",
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Background", CSCORE_NAME),
            "param_name" => "icon_background",
            "description" => __("Insert icon background", CSCORE_NAME),
            "default" => "rgba(245,245,245,1)",
            "group" => "Icon Config"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Background HOver", CSCORE_NAME),
            "param_name" => "icon_background_hover",
            "description" => __("Insert icon background on hover", CSCORE_NAME),
            "default" => "#111",
            "group" => "Icon Config"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Color", CSCORE_NAME),
            "param_name" => "icon_color",
            "description" => __("Insert icon color", CSCORE_NAME),
            "default" => "#111",
            "group" => "Icon Config"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Color Hover", CSCORE_NAME),
            "param_name" => "icon_color_hover",
            "description" => __("Insert icon color on hover", CSCORE_NAME),
            "default" => "#fff",
            "group" => "Icon Config"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon Font size", CSCORE_NAME),
            "param_name" => "icon_font_size",
            "description" => __("Insert icon font size px,%.", CSCORE_NAME),
            "group" => "Icon Config"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon width", CSCORE_NAME),
            "param_name" => "icon_width",
            "description" => __("Insert icon width", CSCORE_NAME),
            "default" => '',
            "group" => "Icon Config"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon height", CSCORE_NAME),
            "param_name" => "icon_height",
            "description" => __("Insert icon height", CSCORE_NAME),
            "default" => '',
            "group" => "Icon Config"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon Border Width", CSCORE_NAME),
            "param_name" => "icon_border_width",
            "description" => __("Insert icon border width", CSCORE_NAME),
            "default" => '',
            "group" => "Icon Config"
        ),
        array (
            "type" => "dropdown",
            "heading" => __ ( "Border Style", CSCORE_NAME ),
            "param_name" => "icon_border_style",
            "value" =>$sc_border_style,
            "description" => 'Select your style of border.',
            "default" => '',
            "group" => "Icon Config"
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Icon Border Color", CSCORE_NAME),
            "param_name" => "icon_border_color",
            "description" => __("Insert icon border color", CSCORE_NAME),
            "default" => '',
            "group" => "Icon Config"
        ),
        
        array(
            "type" => "textfield",
            "heading" => __("Icon Border Radius", CSCORE_NAME),
            "param_name" => "icon_border_radius",
            "description" => __("Insert icon border radius 50% or 50px", CSCORE_NAME),
            "group" => "Icon Config"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon 1", CSCORE_NAME),
            "param_name" => "icon1",
            "description" => __("Insert icon class.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title 1", CSCORE_NAME),
            "param_name" => "title1",
            "description" => __("Insert title process 1.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description 1", CSCORE_NAME),
            "param_name" => "desc1",
            "description" => __("Insert description process 1.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon 2", CSCORE_NAME),
            "param_name" => "icon2",
            "description" => __("Insert icon class.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title 2", CSCORE_NAME),
            "param_name" => "title2",
            "description" => __("Insert title process 2.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description 2", CSCORE_NAME),
            "param_name" => "desc2",
            "description" => __("Insert description process 2.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon 3", CSCORE_NAME),
            "param_name" => "icon3",
            "description" => __("Insert icon class.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title 3", CSCORE_NAME),
            "param_name" => "title3",
            "description" => __("Insert title process 3.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description 3", CSCORE_NAME),
            "param_name" => "desc3",
            "description" => __("Insert description process 3.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon 4", CSCORE_NAME),
            "param_name" => "icon4",
            "description" => __("Insert icon class.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title 4", CSCORE_NAME),
            "param_name" => "title4",
            "description" => __("Insert title process 4.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description 4", CSCORE_NAME),
            "param_name" => "desc4",
            "description" => __("Insert description process 4.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon 5", CSCORE_NAME),
            "param_name" => "icon5",
            "description" => __("Insert icon class.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title 5", CSCORE_NAME),
            "param_name" => "title5",
            "description" => __("Insert title process 5.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description 5", CSCORE_NAME),
            "param_name" => "desc5",
            "description" => __("Insert description process 5.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon 6", CSCORE_NAME),
            "param_name" => "icon6",
            "description" => __("Insert icon class.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title 6", CSCORE_NAME),
            "param_name" => "title6",
            "description" => __("Insert title process 6.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description 6", CSCORE_NAME),
            "param_name" => "desc6",
            "description" => __("Insert description process 6.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon 7", CSCORE_NAME),
            "param_name" => "icon7",
            "description" => __("Insert icon class.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title 7", CSCORE_NAME),
            "param_name" => "title7",
            "description" => __("Insert title process 7.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description 7", CSCORE_NAME),
            "param_name" => "desc7",
            "description" => __("Insert description process 7.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Icon 8", CSCORE_NAME),
            "param_name" => "icon8",
            "description" => __("Insert icon class.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title 8", CSCORE_NAME),
            "param_name" => "title8",
            "description" => __("Insert title process 8.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Description 8", CSCORE_NAME),
            "param_name" => "desc8",
            "description" => __("Insert description process 8.", CSCORE_NAME),
            "group" => "Item"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Process Column", CSCORE_NAME),
            "param_name" => "process_column",
            "value" => array(
                "None"   => "",
                "2 Column" => "process-2-column",
                "3 Column" => "process-3-column",
                "4 Column" => "process-4-column",
                "5 Column" => "process-5-column",
                "6 Column" => "process-6-column",
                "7 Column" => "process-7-column",
                "8 Column" => "process-8-column"
            ),
            "description" => 'Select column process.',
            "group" => "Extra" 
        )
    )
));
?>