<?php
vc_map(array(
    "name" => __("Woo Categories", CSCORE_NAME),
    "base" => "cs-woocategories",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero', CSCORE_NAME),
    "description" => __("Show list category product.", CSCORE_NAME),
    "params" => array(
        array(
            "type" => "pro_taxonomy",
            "taxonomy" => "product_cat",
            "heading" => __("Categories", CSCORE_NAME),
            "param_name" => "cats",
            "admin_label" => true,
            "group" => "General",
            "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", CSCORE_NAME),
            "param_name" => "el_class",
            "group" => "General",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Layout", CSCORE_NAME),
            "param_name" => "layout",
            "group" => "Layout",
            "value" => cscore_get_files_name_array("woocategories"),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Column", CSCORE_NAME),
            "param_name" => "col",
            "value" => array(
                "Default" => "",
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4"
            ),
            "group" => "Layout",
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __('Overlay background color', CSCORE_NAME),
            "param_name" => "overlay_bg",
            "group" => "Layout",
            "description" => ''
        ),
        array(
            "type" => "colorpicker",
            "heading" => __('Overlay background hover color', CSCORE_NAME),
            "param_name" => "overlay_bg_hover",
            "group" => "Layout",
            "description" => ''
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Title Categories size", CSCORE_NAME),
            "param_name" => "title_categories_size",
            "value" => array(
                "Default" => '',
                "Heading 1" => "h1",
                "Heading 2" => "h2",
                "Heading 3" => "h3",
                "Heading 4" => "h4",
                "Heading 5" => "h5",
                "Heading 6" => "h6",
                'div' =>'div'
            ),
            "group" => "Layout",
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "colorpicker",
            "heading" => __('Title Categories Color', CSCORE_NAME),
            "param_name" => "title_categories_color",
            "group" => "Layout",
            "description" => ''
        ),
        
        array (
            "type" => "checkbox",
            "heading" => __ ( 'Number Items', CSCORE_NAME ),
            "param_name" => "number_items",
            "value" => array (
                __ ( "Yes, please", CSCORE_NAME ) => true
            ),
            "group" => "Layout",
            "group" => "Layout",
            "description" => __ ( 'Show number items / Category.', CSCORE_NAME )
        ),
        array (
            "type" => "checkbox",
            "heading" => __ ( 'Crop image', CSCORE_NAME ),
            "param_name" => "crop_image",
            "value" => array (
                __ ( "Yes, please", CSCORE_NAME ) => true
            ),
            "group" => "Layout",
            "description" => __ ( 'Crop or not crop image on your Post.', CSCORE_NAME )
        ),
        array (
            "type" => "textfield",
            "heading" => __ ( 'Width image', CSCORE_NAME ),
            "param_name" => "width_image",
            "group" => "Layout",
            "description" => __ ( 'Enter the width of image. Default: 300.', CSCORE_NAME )
        ),
        array (
            "type" => "textfield",
            "heading" => __ ( 'Height image', CSCORE_NAME ),
            "param_name" => "height_image",
            "description" => __ ( 'Enter the height of image. Default: 200.', CSCORE_NAME ),
            "group" => "Layout"
        ),
        
    )
));
?>