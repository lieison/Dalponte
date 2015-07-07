<?php
global $smof_data;
if (get_option('cms_superheroes_restaurant', true)) {
    vc_map(array(
        "name" => 'Menu Food',
        "base" => "cs-menufood",
        "icon" => "cs_icon_for_vc",
        "category" => __('CS Hero', CSCORE_NAME),
        "description" => __('For Restaurant Menu.', CSCORE_NAME),
        "params" => array(
            array(
                "type" => "pro_taxonomy",
                "taxonomy" => "restaurantmenu_category",
                "heading" => __("Categories", CSCORE_NAME),
                "param_name" => "category",
                "group" => "Source Option",
                "description" => __("Note : Select a category (default show all).", CSCORE_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Order by', CSCORE_NAME),
                "param_name" => "orderby",
                "value" => array(
                    "Default" => "",
                    "Title" => "title",
                    "Date" => "date",
                    "ID" => "ID"
                ),
                "group" => "Source Option",
                "description" => __('Order by ("Default", "Title", "Create Date", "ID").', CSCORE_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Order', CSCORE_NAME),
                "param_name" => "order",
                "value" => Array(
                    "Default" => "",
                    "DESC" => "DESC",
                    "ASC" => "ASC"
                ),
                "group" => "Source Option",
                "description" => __('Order ("Default", "Asc", "Desc").', CSCORE_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Layout', CSCORE_NAME),
                "param_name" => "layout",
                "group" => "Layout Option",
                "value" => cscore_get_files_name_array("menufood")
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Number Colunm (1...4)', CSCORE_NAME),
                "param_name" => "layout_colunm",
                "value" => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4'
                ),
                "group" => "Layout Option",
                "description" => __('Select the number colunm of menu. Default: 1 colunm (min 1 and max 4)', CSCORE_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Enable Parallax', CSCORE_NAME),
                "param_name" => "enable_parallax",
                "value" => array(
                    __("Yes", CSCORE_NAME) => '1',
                    __("No", CSCORE_NAME) => '0'
                ),
                "group" => "Category Option",
                "description" => __('Make category parallax background style.', CSCORE_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Category Heading", CSCORE_NAME),
                "param_name" => "category_heading",
                "value" => array(
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "group" => "Category Option",
                "description" => __('Select your heading size for category title.', CSCORE_NAME)
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Category Color', CSCORE_NAME),
                "param_name" => "title_category_color",
                "group" => "Category Option",
                "description" => ''
            ),
            array(
                "type" => "textfield",
                "heading" => __('Category Padding', CSCORE_NAME),
                "param_name" => "category_padding",
                "value" => '40px 0 40px 0',
                "group" => "Category Option",
                "description" => __('Enter the padding for categories.', CSCORE_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __('Number posts', CSCORE_NAME),
                "param_name" => "num_post",
                "value" => '6',
                "group" => "Category Option",
                "description" => __('Enter the number posts in categories.', CSCORE_NAME)
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Post Heading", CSCORE_NAME),
                "param_name" => "post_heading",
                "value" => array(
                    "Heading 3" => "h3",
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "group" => "Item Option",
                "description" => __('Select your heading size for post title.', CSCORE_NAME)
            ),
            
            array(
                "type" => "textfield",
                "heading" => __('Excerpt Length', CSCORE_NAME),
                "param_name" => "excerpt_length",
                "value" => '',
                "group" => "Item Option",
                "description" => __('The length of the excerpt, number of words to display.', CSCORE_NAME)
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Show Price', CSCORE_NAME),
                "param_name" => "show_price",
                "value" => array(
                    __("Yes", CSCORE_NAME) => '1',
                    __("No", CSCORE_NAME) => '0'
                ),
                "group" => "Item Option"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Show Image', CSCORE_NAME),
                "param_name" => "image",
                "value" => array(
                    __("Yes", CSCORE_NAME) => '1',
                    __("No", CSCORE_NAME) => '0'
                ),
                "group" => "Item Option"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Crop Image', CSCORE_NAME),
                "param_name" => "crop_image",
                "value" => array(
                    __("No", CSCORE_NAME) => '0',
                    __("Yes", CSCORE_NAME) => '1'
                ),
                "group" => "Item Option",
                "dependency" => array(
                    "element" => 'image',
                    "value" => array(
                        "1"
                    )
                ),
                "group" => "Item Option",
            ),
            array(
                "type" => "textfield",
                "heading" => __('Width image', CSCORE_NAME),
                "param_name" => "width_image",
                "group" => "Item Option",
                "dependency" => array(
                    "element" => 'crop_image',
                    "value" => array(
                        "1"
                    )
                ),
                "description" => __('Enter the width of image. Default: 200.', CSCORE_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __('Height image', CSCORE_NAME),
                "param_name" => "height_image",
                "dependency" => array(
                    "element" => 'crop_image',
                    "value" => array(
                        "1"
                    )
                ),
                "group" => "Item Option",
                "description" => __('Enter the height of image. Default: 200.', CSCORE_NAME)
            )
        )
    ));
}