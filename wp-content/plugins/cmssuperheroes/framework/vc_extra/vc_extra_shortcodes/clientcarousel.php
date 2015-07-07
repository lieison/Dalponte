<?php
if (get_option('cms_superheroes_client', true)) {
    vc_map(
        array(
            "name" => 'Client Carousel',
            "base" => "cshero-clients-carousel",
            "icon" => "cshero_icon_for_vc",
            "category" => __('CS Hero', CSCORE_NAME),
            "description" => __('Client Carousel', CSCORE_NAME),
            "params" => array(
                array(
                    "type" => "",
                    "heading" => __('GENERAL OPTION', CSCORE_NAME),
                    "param_name" => "general_option",
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Heading', CSCORE_NAME),
                    "param_name" => "title",
                    "holder" => 'div'
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Heading size", CSCORE_NAME),
                    "param_name" => "heading_size",
                    "value" => array(
                        "Default" => "",
                        "Heading 1" => "h1",
                        "Heading 2" => "h2",
                        "Heading 3" => "h3",
                        "Heading 4" => "h4",
                        "Heading 5" => "h5",
                        "Heading 6" => "h6",
                        "Div" => "div"
                    ),
                    "description" => 'Select your heading size for title. Default is H3'
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Heading Icon', CSCORE_NAME),
                    "param_name" => "heading_icon",
                    "description" => __('Enter the class name of Awesome icon for get icon! Ex: code or codepen', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Heading Align", CSCORE_NAME),
                    "param_name" => "title_align",
                    "value" => array(
                        "Left" => "text-left",
                        "Center" => "text-center",
                        "Right" => "text-right"
                    ),
                    "description" => __("Select align for Title", CSCORE_NAME)
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Heading Color', CSCORE_NAME),
                    "param_name" => "title_color",
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Heading Text Style", CSCORE_NAME),
                    "param_name" => "heading_text_style",
                    "value" => array(
                        "Default" => "none",
                        "Uppercase" => "uppercase",
                        "Lowercase" => "lowercase",
                        "Capitalize" => "capitalize"
                    ),
                    "description" => __("Select heading style", CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Sub Heading', CSCORE_NAME),
                    "param_name" => "subtitle",
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Sub Heading size", CSCORE_NAME),
                    "param_name" => "subtitle_heading_size",
                    "value" => array(
                        "Default" => "",
                        "Heading 1" => "h1",
                        "Heading 2" => "h2",
                        "Heading 3" => "h3",
                        "Heading 4" => "h4",
                        "Heading 5" => "h5",
                        "Heading 6" => "h6",
                        "Div" => "div"
                    ),
                    "description" => 'Select your heading size for sub title. Default is H4'
                ),

                array(
                    "type" => "textarea",
                    "heading" => __('Description', CSCORE_NAME),
                    "param_name" => "description",
                ),
                array(
                    "type" => "",
                    "heading" => __('SOURCE OPTION', CSCORE_NAME),
                    "param_name" => "source_option",
                ),
                array(
                    "type" => "pro_taxonomy",
                    "taxonomy" => "clientscategory",
                    "heading" => __('Category', CSCORE_NAME),
                    "param_name" => "category",
                    "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Number of posts to show per page', CSCORE_NAME),
                    "param_name" => "posts_per_page",
                    'value' => '12',
                    "description" => __('The number of posts to display on each page. Set to "-1" for display all posts on the page.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Order by', CSCORE_NAME),
                    "param_name" => "orderby",
                    "value" => array(
                        "None" => "none",
                        "Title" => "title",
                        "Date" => "date",
                        "ID" => "ID"
                    ),
                    "description" => __('Order by ("none", "title", "date", "ID").', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Order', CSCORE_NAME),
                    "param_name" => "order",
                    "value" => Array(
                        "None" => "none",
                        "ASC" => "ASC",
                        "DESC" => "DESC"
                    ),
                    "description" => __('Order ("None", "Asc", "Desc").', CSCORE_NAME)
                ),

                array(
                    "type" => "",
                    "heading" => __('LAYOUT OPTION', CSCORE_NAME),
                    "param_name" => "layout_option",
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Layout", CSCORE_NAME),
                    "param_name" => "layout",
                    "description" => __("Choose a layout style for yourself", CSCORE_NAME),
                    "value" => cscore_get_files_name_array("client"),
                    "admin_label" => true
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Rows", CSCORE_NAME),
                    "param_name" => "rows",
                    "value" => array(
                        "1 row" => "1",
                        "2 rows" => "2",
                        "3 rows" => "3",
                        "4 rows" => "4"
                    ),
                ),
                array(
                    "type" => "",
                    "heading" => __('CAROUSEL OPTION', CSCORE_NAME),
                    "param_name" => "carousel_option",
                ),

                array(
                    "type" => "dropdown",
                    "heading" => __('Carousel Mode', CSCORE_NAME),
                    "param_name" => "carousel_mode",
                    "value" => array(
                        __("Horizontal", CSCORE_NAME) => 'horizontal',
                        __("Vertical", CSCORE_NAME) => 'vertical',
                        __("Fade", CSCORE_NAME) => 'fade'
                    ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Min item', CSCORE_NAME),
                    "param_name" => "min_slide",
                    "value" => "1",
                    "description" => __('Enter the number of min item show on carousel. Default: 1.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Max item', CSCORE_NAME),
                    "param_name" => "max_slide",
                    "value" => "3",
                    "description" => __('Enter the number of max item show on carousel. Default: 3.', CSCORE_NAME)
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('Item slide', CSCORE_NAME),
                    "param_name" => "item_slide",
                    "value" => "3",
                    "description" => __('Enter the number of item slide . Default: 3.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width item', CSCORE_NAME),
                    "param_name" => "width_item",
                    "value" => "320",
                    "description" => __('Enter the width of item. Default: 320.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Margin item', CSCORE_NAME),
                    "param_name" => "margin_item",
                    "value" => "30",
                    "description" => __('Enter the margin of item. Default: 30.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Auto scroll', CSCORE_NAME),
                    "param_name" => "auto_scroll",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Auto scroll.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Speed', CSCORE_NAME),
                    "param_name" => "speed",
                    "value" => "500",
                    "description" => __('Enter the speed of carousel. Default: 500.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show navigation', CSCORE_NAME),
                    "param_name" => "show_nav",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show or hide navigation on your carousel client.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Navigation Align", CSCORE_NAME),
                    "param_name" => "nav_align",
                    "value" => array(
                        "Bottom Left" => "text-left",
                        "Bottom Center" => "text-center",
                        "Bottom Right" => "text-right",
                        "Vertical Center" => "vertical-center"
                    ),
                    "description" => __("Select align for Navigation", CSCORE_NAME)
                ),

                array(
                    "type" => "dropdown",
                    "heading" => __('Show Pager', CSCORE_NAME),
                    "param_name" => "show_pager",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show or hide pager on your carousel client.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Pager Align", CSCORE_NAME),
                    "param_name" => "pager_align",
                    "value" => array(
                        "Bottom Left" => "pager-left",
                        "Bottom Center" => "pager-center",
                        "Bottom Right" => "pager-right"
                    ),
                    "description" => __("Select align for Pager", CSCORE_NAME)
                ),
                array(
                    "type" => "",
                    "heading" => __('ITEM OPTION', CSCORE_NAME),
                    "param_name" => "item_option",
                    "description" => ""
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Crop image', CSCORE_NAME),
                    "param_name" => "crop_image",
                    "value" => array(
                        __("No, please", CSCORE_NAME) => '0',
                        __("Yes, please", CSCORE_NAME) => '1'
                    )
                    ,
                    "description" => __('Crop or not crop image of client.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width image', CSCORE_NAME),
                    "param_name" => "width_image",
                    "value" => "320",
                    "description" => __('Enter the width of image. Default: 320.', CSCORE_NAME)
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('Height image', CSCORE_NAME),
                    "param_name" => "height_image",
                    "value" => "240",
                    "description" => __('Enter the height of image. Default: 240.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show client title', CSCORE_NAME),
                    "param_name" => "show_client_title",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show or hide Client title.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Client title size", CSCORE_NAME),
                    "param_name" => "client_title_size",
                    "value" => array(
                        "Default" => "",
                        "Heading 1" => "h1",
                        "Heading 2" => "h2",
                        "Heading 3" => "h3",
                        "Heading 4" => "h4",
                        "Heading 5" => "h5",
                        "Heading 6" => "h6",
                        "Div" => "div"
                    ),
                    "description" => 'Select your heading size for client title. Default is H3'
                ),

                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Client title Align", CSCORE_NAME),
                    "param_name" => "client_title_align",
                    "value" => array(
                        "Left" => "text-left",
                        "Center" => "text-center",
                        "Right" => "text-right"
                    ),
                    "description" => __("Select align for Client Title", CSCORE_NAME)
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Client title Color', CSCORE_NAME),
                    "param_name" => "client_title_color",
                    "description" => ''
                ),

                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Client title text Style", CSCORE_NAME),
                    "param_name" => "client_title_text_style",
                    "value" => array(
                        "Default" => "none",
                        "Uppercase" => "uppercase",
                        "Lowercase" => "lowercase",
                        "Capitalize" => "capitalize"
                    ),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show link to client', CSCORE_NAME),
                    "param_name" => "show_link",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show or hide link client.', CSCORE_NAME)
                ),
                array(
                    "type" => "",
                    "heading" => __('EXTRA OPTION', CSCORE_NAME),
                    "param_name" => "extra_option",
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('View All Link', CSCORE_NAME),
                    "param_name" => "morelink",
                    'value' => '',
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('View All Text', CSCORE_NAME),
                    "param_name" => "moretext",
                    'value' => '',
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", CSCORE_NAME),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME)
                )
            )
        ));
}