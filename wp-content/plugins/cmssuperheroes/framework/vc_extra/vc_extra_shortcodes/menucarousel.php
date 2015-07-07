<?php
if (get_option('cms_superheroes_restaurant', true)) {
    vc_map(
        array(
            "name" => 'Menu Carousel',
            "base" => "cs-menu-carousel",
            "icon" => "cs_icon_for_vc",
            "category" => __('CS Hero', CSCORE_NAME),
            "description" => __('Restaurant Menu Carousel', CSCORE_NAME),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __('Heading', CSCORE_NAME),
                    "param_name" => "title",
                    "description" => "",
                    "holder" => 'div'
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Heading size", CSCORE_NAME),
                    "param_name" => "heading_size",
                    "value" => array(
                        "Default" => '',
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
                    "heading" => __("Heading Style", CSCORE_NAME),
                    "param_name" => "heading_style",
                    "value" => array(
                        "Default" => "",
                        "Border Bottom" => "border-bottom",
                        "Overline" => "overline",
                        "Underline" => "underline",
                        "Line Through" => "line-through",
                        "Dotted Bottom" => "dotted-bottom",
                        "Header wrap Dotted Bottom" => "dotted-bottom2"
                    ),
                    "description" => __("Select heading style", CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Heading Text Style", CSCORE_NAME),
                    "param_name" => "heading_text_style",
                    "value" => array(
                        "Default" => "",
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
                        "Heading 6" => "h6"
                    ),
                    "description" => 'Select your heading size for sub title.'
                ),

                array(
                    "type" => "textfield",
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
                    "taxonomy" => "restaurantmenu_category",
                    "heading" => __("Categories", CSCORE_NAME),
                    "param_name" => "category",
                    "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME, CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Layout Styles", CSCORE_NAME),
                    "param_name" => "layout",
                    "value" => cscore_get_files_name_array("menucarousel"),
                    "admin_label" => true
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Content Align", CSCORE_NAME),
                    "param_name" => "content_align",
                    "value" => array(
                        "Left" => "text-left",
                        "Center" => "text-center",
                        "Right" => "text-right"
                    ),
                    "description" => __("Select align for content", CSCORE_NAME)
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Content Color', CSCORE_NAME),
                    "param_name" => "content_color",
                    "description" => __("Choose color for content", CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show Item title', CSCORE_NAME),
                    "param_name" => "show_title",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide title of each post.', CSCORE_NAME)
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Items Heading Color', CSCORE_NAME),
                    "param_name" => "item_title_color"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Item Heading size", CSCORE_NAME),
                    "param_name" => "item_heading_size",
                    "value" => array(
                        "Default" => "",
                        "Heading 1" => "h1",
                        "Heading 2" => "h2",
                        "Heading 3" => "h3",
                        "Heading 4" => "h4",
                        "Heading 5" => "h5",
                        "Heading 6" => "h6"
                    ),
                    "description" => 'Select your heading size for each item title.'
                ),

                array(
                    "type" => "dropdown",
                    "heading" => __('Show image', CSCORE_NAME),
                    "param_name" => "show_image",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide image of each post.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Crop image', CSCORE_NAME),
                    "param_name" => "crop_image",
                    "value" => array(
                        __("No", CSCORE_NAME) => '0',
                        __("Yes", CSCORE_NAME) => '1'
                    )
                    ,
                    "description" => __('Crop or not crop image on your Post.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width image', CSCORE_NAME),
                    "param_name" => "width_image",
                    "description" => __('Enter the width of image. Default: 360.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Height image', CSCORE_NAME),
                    "param_name" => "height_image",
                    "description" => __('Enter the height of image. Default: 240.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Image border radius', CSCORE_NAME),
                    "param_name" => "image_border",
                    "description" => __('Enter style border radius for image. Ex 3px for rounded, or 50% for circle.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show Description', CSCORE_NAME),
                    "param_name" => "show_description",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide Category of post', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Excerpt Length', CSCORE_NAME),
                    "param_name" => "excerpt_length",
                    "value" => '',
                    "description" => __('The length of the excerpt, number of words to display. Set to "-1" for no excerpt. Default: 100.', CSCORE_NAME)
                ),

                array(
                    "type" => "dropdown",
                    "heading" => __('Show Popup image', CSCORE_NAME),
                    "param_name" => "show_popup",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide button to view image in popup', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show date', CSCORE_NAME),
                    "param_name" => "show_date",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide date of post', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width item', CSCORE_NAME),
                    "param_name" => "width_item",
                    "description" => __('Enter the width of item. Default: 340.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Margin item', CSCORE_NAME),
                    "param_name" => "margin_item",
                    "description" => __('Enter the margin of item. Default: 30.', CSCORE_NAME)
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
                    "type" => "textfield",
                    "heading" => __('Min Slider', CSCORE_NAME),
                    "param_name" => "min_slider",
                    "description" => __('Enter the Min Slider. Default: 1.', CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Max Slider', CSCORE_NAME),
                    "param_name" => "max_slider",
                    "description" => __('Enter the Max Slider. Default: 4.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Auto scroll', CSCORE_NAME),
                    "param_name" => "auto_scroll",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Auto scroll.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show Pager', CSCORE_NAME),
                    "param_name" => "show_pager",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => 'true',
                        __("No", CSCORE_NAME) => 'false'
                    ),
                    "description" => __('Show or hide pager on your carousel post.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Pager Align", CSCORE_NAME),
                    "param_name" => "pager_align",
                    "value" => array(
                        "Left" => "pager-left",
                        "Center" => "pager-center",
                        "Right" => "pager-right"
                    ),
                    "description" => __("Select align for Pager", CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show navigation', CSCORE_NAME),
                    "param_name" => "show_nav",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show or hide navigation on your carousel post.', CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Navigation Align", CSCORE_NAME),
                    "param_name" => "nav_align",
                    "value" => array(
                        "Left" => "text-left",
                        "Center" => "text-center",
                        "Right" => "text-right"
                    ),
                    "description" => __("Select align for Pager", CSCORE_NAME)
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
                    "type" => "textfield",
                    "heading" => __('View More Link', CSCORE_NAME),
                    "param_name" => "morelink",
                    'value' => '',
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('View More Text', CSCORE_NAME),
                    "param_name" => "moretext",
                    'value' => '',
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "js_composer"),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
                )
            )
        ));
}