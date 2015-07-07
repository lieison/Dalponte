<?php
global $overlay_appear_style;
if (get_option('cms_superheroes_team', true)) {
    vc_map(
        array(
            "name" => 'Team',
            "base" => "cshero-team",
            "icon" => "cshero_icon_for_vc",
            "category" => __('CS Hero', CSCORE_NAME),
            "description" => __('Team carousel', CSCORE_NAME),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __('Title', CSCORE_NAME),
                    "param_name" => "title",
                    "description" => "",
                    "holder" => "div",
                    "group" => "General"
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
                    "description" => 'Select your heading size for title.',
                    "group" => "General"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Heading Icon', CSCORE_NAME),
                    "param_name" => "heading_icon",
                    "description" => __('Enter the class name of Awesome icon for get icon! Ex: code or codepen', CSCORE_NAME),
                    "group" => "General"
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Heading Align", CSCORE_NAME),
                    "param_name" => "heading_align",
                    "value" => array(
                        "Left" => "text-left",
                        "Center" => "text-center",
                        "Right" => "text-right"
                    ),
                    "description" => __("Select align for Title", CSCORE_NAME),
                    "group" => "General"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Heading Color', CSCORE_NAME),
                    "param_name" => "heading_color",
                    "description" => '',
                    "group" => "General"
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Heading Text Style", CSCORE_NAME),
                    "param_name" => "heading_text_style",
                    "value" => array(
                        "None" => "none",
                        "Uppercase" => "uppercase",
                        "Lowercase" => "lowercase",
                        "Capitalize" => "capitalize"
                    ),
                    "description" => __("Select heading style", CSCORE_NAME),
                    "group" => "General"
                ),
				array(
                    "type" => "textfield",
                    "heading" => __('Sub Heading', CSCORE_NAME),
                    "param_name" => "subtitle",
                    "description" => "",
                    "group" => "General"
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
                    "description" => 'Select your heading size for sub title.',
                    "group" => "General"
                ),
                array(
                    "type" => "textarea",
                    "heading" => __('Description', CSCORE_NAME),
                    "param_name" => "description",
                    "description" => "",
                    "group" => "General"
                ),
                array(
                    "type" => "pro_taxonomy",
                    "taxonomy" => "team_category",
                    "heading" => __('Category', CSCORE_NAME),
                    "param_name" => "category",
                    "description" => 'The category ID\'s to pull posts from. Can be entered as a comma separated list.',
                    "group" => "Source Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Number of posts to show per page', CSCORE_NAME),
                    "param_name" => "posts_per_page",
                    'value' => '12',
                    "description" => __('The number of posts to display on each page. Set to "-1" for display all posts on the page.', CSCORE_NAME),
                    "group" => "Source Option"
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
                    "description" => __('Order by ("none", "title", "date", "ID").', CSCORE_NAME),
                    "group" => "Source Option"
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
                    "description" => __('Order ("None", "Asc", "Desc").', CSCORE_NAME),
                    "group" => "Source Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Layout', CSCORE_NAME),
                    "param_name" => "layout",
                    "value" => cscore_get_files_name_array("team"),
                    "description" => "",
                    "admin_label" => true,
                    "group" => "Layout"
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
                    "group" => "Layout"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width item', CSCORE_NAME),
                    "param_name" => "width_item",
                    "description" => __('Enter the width of item. Default: 360.', CSCORE_NAME),
                    "group" => "Layout"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Item space', CSCORE_NAME),
                    "param_name" => "margin_item",
                    "description" => __('Enter the space between each item. Just enter the number. Ex 60. Default: 30.', CSCORE_NAME),
                    "group" => "Layout"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Min item', CSCORE_NAME),
                    "param_name" => "min_slide",
                    "description" => __('Enter the minimum number item you want to show. Default: 1.', CSCORE_NAME),
                    "group" => "Layout"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Max item', CSCORE_NAME),
                    "param_name" => "max_slide",
                    "description" => __('Enter the maximum item you want to show. Default: 3.', CSCORE_NAME),
                    "group" => "Layout"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Number of item to move', CSCORE_NAME),
                    "param_name" => "move_slide",
                    "description" => __('Enter the number of item you want to move on each slide. Default: 3.', CSCORE_NAME),
                    "group" => "Layout"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Auto scroll', CSCORE_NAME),
                    "param_name" => "auto_scroll",
                    "value" => array(
                        __("No", CSCORE_NAME) => '0',
                        __("Yes", CSCORE_NAME) => '1'                       
                    ),
                    "description" => __('Auto scroll.', CSCORE_NAME),
                    "group" => "Layout"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Speed Scroll', CSCORE_NAME),
                    "param_name" => "speed_scroll",
                    "value" => "500",
                    "description" => __('Enter the time delay when move slide. Default is 500', CSCORE_NAME),
                    "group" => "Layout",
                    "dependency" => array(
                        "element" => 'auto_scroll',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show navigation', CSCORE_NAME),
                    "param_name" => "show_nav",
                    "value" => array(
                        __("No", CSCORE_NAME) => '0',
                        __("Yes", CSCORE_NAME) => '1'
                    ),
                    "description" => __('Show or hide navigation on your carousel team.', CSCORE_NAME),
                    "group" => "Layout"
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Navigation Align", CSCORE_NAME),
                    "param_name" => "nav_align",
                    "value" => array(
                        "Default" => "text-center",
                        "Bottom Left" => "text-left",
                        "Bottom Center" => "text-center",
                        "Bottom Right" => "text-right",
                        "Vertical center" => "vertical-center"
                    ),
                    "description" => __("Select align for Navigation", CSCORE_NAME),
                    "group" => "Layout",
                    "dependency" => array(
                        "element" => 'show_nav',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Navigation Left Arrow Icon", CSCORE_NAME),
                    "param_name" => "nav_left_icon",
                    "value" => "fa fa-angle-left",
                    "description" => __("Select Awesome icon for arrow left", CSCORE_NAME),
                    "group" => "Layout",
                    "dependency" => array(
                        "element" => 'show_nav',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Navigation Right Arrow Icon", CSCORE_NAME),
                    "param_name" => "nav_right_icon",
                    "value" => "fa fa-angle-right",
                    "description" => __("Select Awesome icon for arrow Right", CSCORE_NAME),
                    "group" => "Layout",
                    "dependency" => array(
                        "element" => 'show_nav',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Navigation Arrow Offset", CSCORE_NAME),
                    "param_name" => "nav_icon_offset",
                    "value" => "0",
                    "description" => __("Choose horizontal offset for arrow icon. This option just apply for Navigation align is: Vertical center", CSCORE_NAME),
                    "group" => "Layout",
                    "dependency" => array(
                        "element" => 'nav_align',
                        "value" => array(
                            "vertical-center"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Navigation Arrow Style", CSCORE_NAME),
                    "param_name" => "nav_arrow_style",
                    "value" => array(
                        "Default" => "",
                        "Square Black" => "square_black",
                        "Square White" => "square_white",
                        "Rounded Black" => "rounded_black",
                        "Rounded White" => "rounded_white",
                        "Circle Black" => "circle_black",
                        "Circle White" => "circle_white"
                    ),
                    "description" => __("Select style for navigation arrow", CSCORE_NAME),
                    "group" => "Layout",
                    "dependency" => array(
                        "element" => 'show_nav',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show Pager', CSCORE_NAME),
                    "param_name" => "show_pager",
                    "value" => array(
                        __("No", CSCORE_NAME) => '0',
                        __("Yes", CSCORE_NAME) => '1'
                    ),
                    "description" => __('Show or hide pager on your carousel.', CSCORE_NAME),
                    "group" => "Layout"
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Pager Align", CSCORE_NAME),
                    "param_name" => "pager_align",
                    "value" => array(
                        "Default" => "text-center",
                        "Left" => "text-left",
                        "Center" => "text-center",
                        "Right" => "text-right"
                    ),
                    "description" => __("Select align for Pager", CSCORE_NAME),
                    "group" => "Layout",
                    "dependency" => array(
                        "element" => 'show_pager',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Content Align', CSCORE_NAME),
                    "param_name" => "content_align",
                    "value" => array(
                        "Default" => "",
                        "Left" => "text-left",
                        "Center" => "text-center",
                        "Right" => "text-right"
                    ),
                    "description" => 'Choose content align styke for each item',
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Content Background Color', CSCORE_NAME),
                    "param_name" => "content_bg_color",
                    "value" => "transparent",
                    "description" => 'Choose background color for each item',
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Content background hover', CSCORE_NAME),
                    "param_name" => "item_bg_color_hover",
                    "description" => 'Background layout item hover',
                    "value" => "transparent",
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Content Padding', CSCORE_NAME),
                    "param_name" => "content_padding",
                    "description" => 'Set padding space for content',
                    "value" => "25px 0 0 0",
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Overlay background color', CSCORE_NAME),
                    "param_name" => "overlay_bg",
                    "description" => 'Background color for overlay area',
                    "value" =>"rgba(51,51,51,0.9)",
                    "std" =>"rgba(51,51,51,0.9)",
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Overlay appear style', CSCORE_NAME),
                    "param_name" => "overlay_appear",
                    "description" => 'How to overlay style appear',
                    "value" => $overlay_appear_style,
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show image', CSCORE_NAME),
                    "param_name" => "show_image",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide image on your Portfolio.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Crop image', CSCORE_NAME),
                    "param_name" => "crop_image",
                    "value" => array(
                        __("No", CSCORE_NAME) => '0',
                        __("Yes", CSCORE_NAME) => '1'
                    ),
                    "description" => __('Crop or not crop image on your Portfolio.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_image',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width image', CSCORE_NAME),
                    "param_name" => "width_image",
                    "description" => __('Enter the width of image. Default: 360.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'crop_image',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Height image', CSCORE_NAME),
                    "param_name" => "height_image",
                    "description" => __('Enter the height of image. Default: 234.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'crop_image',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Border radius Main images', CSCORE_NAME),
                    "param_name" => "img_radius",
                    "description" => __('Enter the Border radius of Main images. Example: 50%, 5px.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_image',
                        "value" => array(
                            "1"
                        )
                    )
                )
                ,
                array(
                    "type" => "dropdown",
                    "heading" => __('Show Team title', CSCORE_NAME),
                    "param_name" => "show_title",
                    "value" => array(
                        __("Yes", "js_composer") => "1",
                        __("No", "js_composer") => "0"
                    ),
                    "description" => __('Show or hide title on your team.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Team Title Color', CSCORE_NAME),
                    "param_name" => "title_team_color",
                    "description" => '',
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Team Heading size", CSCORE_NAME),
                    "param_name" => "item_heading_size",
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
                    "description" => __('Select your heading size for title.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Team Title margin', CSCORE_NAME),
                    "param_name" => "team_title_margin",
                    "description" => 'Set margin for title',
                    "value" => "0 0 15px 0",
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show category', CSCORE_NAME),
                    "param_name" => "show_category",
                    "value" => array(
                        __("No", "js_composer") => "0",
                        __("Yes", "js_composer") => "1"
                    ),
                    "description" => __('Show or hide category on your Team.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Category Color', CSCORE_NAME),
                    "param_name" => "category_color",
                    "description" => '',
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_category',
                        "value" => array(
                            "1"
                        )
                    )
                ),

                array(
                    "type" => "",
                    "heading" => __('Team Info', CSCORE_NAME),
                    "param_name" => "team_info",
                    "description" => __('Show or hide Team Info on your Team. Default is Hide', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "",
                    "param_name" => "show_team_position",
                    "value" => array(
                        __("Show Team Position", "js_composer") => "1",
                        __("Hide Team Position", "js_composer") => "0"
                    ),
                    "description" => "",
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "",
                    "param_name" => "show_team_qualification",
                    "value" => array(
                        __("Hide Team Qualification", "js_composer") => "0",
                        __("Show Team Qualification", "js_composer") => "1"
                    ),
                    "description" => "",
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "",
                    "param_name" => "show_team_experience",
                    "value" => array(
                        __("Hide Team Experience", "js_composer") => "0",
                        __("Show Team Experience", "js_composer") => "1"
                    ),
                    "description" => "",
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => "",
                    "param_name" => "show_team_contact_info",
                    "value" => array(
                        __("Hide Team Contact Info", "js_composer") => "0",
                        __("Show Team Contact Info", "js_composer") => "1"
                    ),
                    "description" => "",
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Team Info Color', CSCORE_NAME),
                    "param_name" => "team_info_color",
                    "description" => '',
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show description', CSCORE_NAME),
                    "param_name" => "show_description",
                    "value" => array(
                        __("Yes", "js_composer") => "1",
                        __("No", "js_composer") => "0"
                    ),
                    "description" => __('Show or hide description on your Portfolio.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Description Color', CSCORE_NAME),
                    "param_name" => "description_color",
                    "description" => '',
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_description',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Excerpt length', CSCORE_NAME),
                    "param_name" => "excerpt_length",
                    'value' => '100',
                    "description" => __('Default is: 100', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_description',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show Read more', CSCORE_NAME),
                    "param_name" => "read_more",
                    "value" => array(
                        __("No", "js_composer") => "0",
                        __("Yes", "js_composer") => "1"    
                    ),
                    "description" => __('Show or hide socials on your Team.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Read more type', CSCORE_NAME),
                    "param_name" => "read_more_type",
                    "value" => array(
                        __ ( "Button Default", CSCORE_NAME ) => "button",
                        __ ( "Button Transparent", CSCORE_NAME ) => "btn-trans",
                        __ ( "Icon", CSCORE_NAME ) => "icon",
                        __ ( "Icon Box White", CSCORE_NAME ) => "icon-box-white",
                        __ ( "Icon Box Black", CSCORE_NAME ) => "icon-box-black",
                        __ ( "Icon Button White", CSCORE_NAME ) => "icon-button",
                        __ ( "Icon Button Black", CSCORE_NAME ) => "icon-button-black",
                        __ ( "Text", CSCORE_NAME ) => "text",
                        __ ( "Text & Icon", CSCORE_NAME ) => "text-icon",
                    ),
                    "description" => __('How read more show.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'read_more',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Read more Text', CSCORE_NAME),
                    "param_name" => "read_more_text",
                    'value' => 'Read more',
                    "description" => "",
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'read_more',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array (
                    "type" => "textfield",
                    "heading" => __ ( 'Read more Icon', CSCORE_NAME ),
                    "param_name" => "read_more_icon",
                    "value" => 'fa fa-link',
                    "group" => "Item Option",
                    "description" => __ ( 'Enter the class of AweSome or IonIcon font. Default is: fa fa-link', CSCORE_NAME ),
                    "dependency" => array(
                        "element" => 'read_more',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show socials', CSCORE_NAME),
                    "param_name" => "show_socials",
                    "value" => array(
                        __("Yes", "js_composer") => "1",
                        __("No", "js_composer") => "0"
                    ),
                    "description" => __('Show or hide socials on your Team.', CSCORE_NAME),
                    "group" => "Social Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Social Font Size', CSCORE_NAME),
                    "param_name" => "social_font_size",
                    "description" => __('Enter social font size, Ex: 20px.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Social Color', CSCORE_NAME),
                    "param_name" => "social_color",
                    "value" => "#fff",
                    "description" => __('Enter the color of Social.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Social hover Color', CSCORE_NAME),
                    "param_name" => "social_hover_color",
                    "value" => "#333",
                    "description" => __('Enter the color hover of Social.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Social Border Style", CSCORE_NAME),
                    "param_name" => "social_border_style",
                    "value" => array(
                        "None" => "none",
                        "Solid" => "solid",
                        "Dotted" => "dotted",
                        "Dashed" => "dashed",
                        "Double" => "double"
                    ),
                    "description" => 'Select your style of border.',
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Social Border Color', CSCORE_NAME),
                    "param_name" => "social_border_color",
                    "description" => '',
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),

                array(
                    "type" => "colorpicker",
                    "heading" => __('Social Border Color Hover', CSCORE_NAME),
                    "param_name" => "social_border_color_hover",
                    "description" => '',
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('Social Width', CSCORE_NAME),
                    "param_name" => "social_width",
                    "description" => __('Enter social width, Ex: 20px.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('Social Height', CSCORE_NAME),
                    "param_name" => "social_height",
                    "description" => __('Enter social height, Ex: 20px.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('Social Border Width', CSCORE_NAME),
                    "param_name" => "social_border_width",
                    "description" => __('Enter border width: Top Right Bottom Left. Ex: 1px 2px 3px 2px. Default is 0.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('Social Border radius', CSCORE_NAME),
                    "param_name" => "social_border_radius",
                    "value" => "50%",
                    "description" => __('Enter the Border radius of Social. Example: 50%, 5px.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                )
                ,
                array(
                    "type" => "colorpicker",
                    "heading" => __('Social background Color', CSCORE_NAME),
                    "param_name" => "social_bg_color",
                    "value" => "#888",
                    "description" => __('Enter the Background color of Social.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Social background color Hover', CSCORE_NAME),
                    "param_name" => "social_bg_hover_color",
                    "value" => "#fff",
                    "description" => __('Enter the Background hover color of Social.', CSCORE_NAME),
                    "group" => "Social Option",
                    "dependency" => array(
                        "element" => 'show_socials',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('View More Link', CSCORE_NAME),
                    "param_name" => "morelink",
                    'value' => '',
                    "description" => __('Link to page to show all portfolio', CSCORE_NAME),
                    "group" => "Extra"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('View More Text', CSCORE_NAME),
                    "param_name" => "moretext",
                    'value' => '',
                    "description" => __('Text for link to page show all portfolio', CSCORE_NAME),
                    "group" => "Extra"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", CSCORE_NAME),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME),
                    "group" => "Extra"
                )
            )
        ));
}