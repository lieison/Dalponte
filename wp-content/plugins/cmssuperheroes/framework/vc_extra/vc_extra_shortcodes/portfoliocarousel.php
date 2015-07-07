<?php
global $bxslider_nav_type, $bxslider_pager_type, $shortcode_date_format, $shortcode_button_type, $overlay_appear_style;
if (get_option('cms_superheroes_portfolio', true)) {
    vc_map(
        array(
            "name" => 'Portfolio Carousel',
            "base" => "cshero-portfolio-carousel",
            "icon" => "cshero_icon_for_vc",
            "category" => __('CS Hero', CSCORE_NAME),
            "description" => __('Portfolio Carousel', CSCORE_NAME),
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
                    "taxonomy" => "portfolio_category",
                    "heading" => __("Categories", CSCORE_NAME),
                    "param_name" => "category",
                    "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME, CSCORE_NAME),
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
                    "class" => "",
                    "heading" => __("Layout", CSCORE_NAME),
                    "param_name" => "layout",
                    "value" => cscore_get_files_name_array("portfoliocarousel"),
                    "description" => __("Choose layout you want for portfolio item", CSCORE_NAME),
                    "admin_label" => true,
                    "group" => "Layout Option"
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
                    "description" => __("Choose row number you want to show portfolio item list. Default is: 1", CSCORE_NAME),
                    "group" => "Layout Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width item', CSCORE_NAME),
                    "param_name" => "width_item",
                    "description" => __('Enter the width of item. Default: 320.', CSCORE_NAME),
                    "group" => "Layout Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Item space', CSCORE_NAME),
                    "param_name" => "margin_item",
                    "description" => __('Enter the space between each item. Just enter the number. Ex 60. Default: 30.', CSCORE_NAME),
                    "group" => "Layout Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Min item', CSCORE_NAME),
                    "param_name" => "min_slide",
                    "description" => __('Enter the minimum number item you want to show. Default: 1.', CSCORE_NAME),
                    "group" => "Layout Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Max item', CSCORE_NAME),
                    "param_name" => "max_slide",
                    "description" => __('Enter the maximum item you want to show. Default: 3.', CSCORE_NAME),
                    "group" => "Layout Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Number of item to move', CSCORE_NAME),
                    "param_name" => "move_slide",
                    "description" => __('Enter the number of item you want to move on each slide. Default: 3.', CSCORE_NAME),
                    "group" => "Layout Option"
                ),
                
                array(
                    "type" => "dropdown",
                    "heading" => __('Auto scroll', CSCORE_NAME),
                    "param_name" => "auto_scroll",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Auto scroll.', CSCORE_NAME),
                    "group" => "Layout Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Speed Scroll', CSCORE_NAME),
                    "param_name" => "speed_scroll",
                    "value" => "500",
                    "description" => __('Enter the speed of carousel. Default: 500.', CSCORE_NAME),
                    "group" => "Layout Option",
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
                        __("No, please", CSCORE_NAME) => '0',
                        __("Yes, please", CSCORE_NAME) => '1'
                    ),
                    "description" => __('Show or hide navigation on your carousel post.', CSCORE_NAME),
                    "group" => "Layout Option"
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
                        "vertical center" => "vertical-center"
                    ),
                    "description" => __("Select align for Navigation", CSCORE_NAME),
                    "group" => "Layout Option",
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
                        __("No, please", CSCORE_NAME) => '0',
                        __("Yes, please", CSCORE_NAME) => '1'                        
                    ),
                    "description" => __('Show or hide pager on your carousel portfolio.', CSCORE_NAME),
                    "group" => "Layout Option"
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
                    "description" => __("Select align for Pager", CSCORE_NAME),
                    "group" => "Layout Option",
                    "dependency" => array(
                        "element" => 'show_pager',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array (
                    "type" => "colorpicker",
                    "heading" => __ ( 'Overlay Background Color', CSCORE_NAME ),
                    "param_name" => "overlay_bg_color",
                    "value" => "rgba(255,255,255,0.8)",
                    "group" => "Item Option",
                    "description" => __ ( 'Set Background overlay for each items.', CSCORE_NAME )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Overlay appear style', CSCORE_NAME),
                    "param_name" => "overlay_appear",
                    "description" => 'How to overlay style appear',
                    "value" => $overlay_appear_style,
                    "group" => "Item Option"
                ),
                array (
                    "type" => "textfield",
                    "heading" => __ ( 'Content Padding', CSCORE_NAME ),
                    "param_name" => "content_padding",
                    "value" => "",
                    "group" => "Item Option",
                    "description" => __ ( 'Set padding (Top-Right-Bottom-Left) for content of each item.', CSCORE_NAME )
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Item Content Align", CSCORE_NAME),
                    "param_name" => "item_content_align",
                    "value" => array(
                        "Left" => "text-left",
                        "Center" => "text-center",
                        "Right" => "text-right"
                    ),
                    "description" => __("Set align for item content", CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Item Content Color', CSCORE_NAME),
                    "param_name" => "item_content_color",
                    "value" => "#fff",
                    "description" => __('Set color for list items.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Item Background Color', CSCORE_NAME),
                    "param_name" => "item_bg_color",
                    "value" => "rgba(0,0,0,0.8)",
                    "description" => __('Set Background for list items.', CSCORE_NAME),
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
                    "description" => __('Crop or not crop image on your portfolio item.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width image', CSCORE_NAME),
                    "param_name" => "width_image",
                    "description" => __('Enter the width of image. Default: 370.', CSCORE_NAME),
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
                    "description" => __('Enter the height of image. Default: 240.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'crop_image',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                
                array(
                    "type" => "dropdown",
                    "heading" => __('Show porfolio title', CSCORE_NAME),
                    "param_name" => "show_title",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide title of porfolio item.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                
                array(
                    "type" => "dropdown",
                    "heading" => __("Portfolio Heading size", CSCORE_NAME),
                    "param_name" => "item_heading_size",
                    "value" => array(
                        "Default" => "",
                        "Heading 1" => "h1",
                        "Heading 2" => "h2",
                        "Heading 3" => "h3",
                        "Heading 4" => "h4",
                        "Heading 5" => "h5",
                        "Heading 6" => "h6",
                        "Div" => 'div'
                    ),
                    "description" => 'Select heading size for portfolio title.',
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Item Title Color', CSCORE_NAME),
                    "param_name" => "item_title_color",
                    "value" => "#fff",
                    "description" => __('Set color for list items.', CSCORE_NAME),
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
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide category of porfolio item.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show description', CSCORE_NAME),
                    "param_name" => "show_description",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide description of porfolio item.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Excerpt Length', CSCORE_NAME),
                    "param_name" => "excerpt_length",
                    "value" => '100',
                    "description" => __('The length of the excerpt, number of words to display. Set to "-1" for no excerpt. Default: 100.', CSCORE_NAME),
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
                    "heading" => __('Show launch Project', CSCORE_NAME),
                    "param_name" => "show_link",
                    "value" => array(
                        "No" => "0",
                        "Yes" => "1"
                    ),
                    "description" => __('Show/Hide external link to portfolio button.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Launch Project text', CSCORE_NAME),
                    "param_name" => "show_link_text",
                    "value" => 'Launch Project',
                    "description" => __('Enter desired text for the launch Project button.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_link',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show read more', CSCORE_NAME),
                    "param_name" => "show_read_more",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide Read more button.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Read More Text', CSCORE_NAME),
                    "param_name" => "read_more",
                    "value" => 'Read more',
                    "description" => __('Enter desired text for the link to porfolio details page.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_read_more',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show Popup image', CSCORE_NAME),
                    "param_name" => "show_popup",
                    "value" => array(
                        __("Yes, please", CSCORE_NAME) => '1',
                        __("No, please", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show/Hide popup image button.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Popup Text', CSCORE_NAME),
                    "param_name" => "popup_text",
                    "value" => 'Large image',
                    "description" => __('Enter desired text for the popup button.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'show_popup',
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
                    "group" => "Extra Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('View More Text', CSCORE_NAME),
                    "param_name" => "moretext",
                    'value' => '',
                    "description" => __('Text for link to page show all portfolio', CSCORE_NAME),
                    "group" => "Extra Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", "js_composer"),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer"),
                    "group" => "Extra Option"
                )
            )
        ));
}