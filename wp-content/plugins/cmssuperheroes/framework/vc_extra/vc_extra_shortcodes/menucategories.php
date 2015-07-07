<?php
if (get_option('cms_superheroes_restaurant', true)) {
    vc_map(array(
        "name" => __("Menu Categories", CSCORE_NAME),
        "base" => "cs-menucategories",
        "icon" => "cs_icon_for_vc",
        "category" => __('CS Hero', CSCORE_NAME),
        "description" => __("Restaurant Menu Categories", CSCORE_NAME),
        "params" => array(
            array(
                "type" => "pro_taxonomy",
                "taxonomy" => "restaurantmenu_category",
                "heading" => __("Categories", CSCORE_NAME),
                "param_name" => "cats",
                "admin_label" => true,
                "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME)
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
                "description" => 'Select your heading size for title.'
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Title Categories Size", CSCORE_NAME),
                "param_name" => "title_size",
                "value" => array(
                    "Default" => 'h3',
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
                "heading" => __('Title Categories Color', CSCORE_NAME),
                "param_name" => "title_color",
                "description" => ''
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Number Items', CSCORE_NAME),
                "param_name" => "number_items",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                ),
                "description" => __('Show number items / Category.', CSCORE_NAME)
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Crop image', CSCORE_NAME),
                "param_name" => "crop_image",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                ),
                "description" => __('Crop or not crop image on your Post.', CSCORE_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __('Width image', CSCORE_NAME),
                "param_name" => "width_image",
                "description" => __('Enter the width of image. Default: 300.', CSCORE_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __('Height image', CSCORE_NAME),
                "param_name" => "height_image",
                "description" => __('Enter the height of image. Default: 200.', CSCORE_NAME)
            )
        )
    ));
}