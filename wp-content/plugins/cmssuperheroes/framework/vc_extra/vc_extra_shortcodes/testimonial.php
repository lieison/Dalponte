<?php
global $bxslider_nav_type, $bxslider_pager_type;
if (get_option('cms_superheroes_testimonials', true)) {
    vc_map(
        array(
            "name" => 'Testimonial',
            "base" => "cshero-testimonial",
            "icon" => "cshero_icon_for_vc",
            "category" => __('CS Hero', CSCORE_NAME),
            "description" => __('Testimonial', CSCORE_NAME),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __('Title', CSCORE_NAME),
                    "param_name" => "title",
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
                    "type" => "textfield",
                    "heading" => __('Description', CSCORE_NAME),
                    "param_name" => "description",
                    "group" => "General"
                ),

                array(
                    "type" => "pro_taxonomy",
                    "taxonomy" => "testimonial_category",
                    "heading" => __("Categories", CSCORE_NAME),
                    "param_name" => "category",
                    "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME),
                    "group" => "Source Option"
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Number of post to show per page", CSCORE_NAME),
                    "param_name" => "posts_per_page",
                    "value" => "12",
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
                    "description" => __("Choose a layout style for yourself", CSCORE_NAME),
                    "value" => cscore_get_files_name_array("testimonial"),
                    "admin_label" => true,
                    "group" => "Layout Option"
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Layout Mode", CSCORE_NAME),
                    "param_name" => "type",
                    "value" => Array(
                        "Slide" => "slide",
                        "Tab" => "tab"
                    ),
                    "description" => __("Choose a layout mode for yourself", CSCORE_NAME),
                    "admin_label" => true,
                    "group" => "Layout Option"
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
                    "description" => __('NOTE: Vertical & Fade mode just show one item on each slide', CSCORE_NAME),
                    "group" => "Layout Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Item width', CSCORE_NAME),
                    "param_name" => "width_item",
                    "description" => __('The width of item. Default is 320', CSCORE_NAME),
                    "group" => "Layout Option"
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('Item Space', CSCORE_NAME),
                    "param_name" => "margin_item",
                    "description" => __('Enter the space between each item. Default: 30.', CSCORE_NAME),
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
                array (
                        "type" => "dropdown",
                        "heading" => __ ( 'Auto scroll', CSCORE_NAME ),
                        "param_name" => "auto_scroll",
                        "value" => array (
                            __("No", CSCORE_NAME) => '0',
                            __("Yes", CSCORE_NAME) => '1',
                        ),
                        "group" => "Layout Option",
                        "description" => __ ( 'Auto scroll.', CSCORE_NAME )
                ),
                array (
                    "type" => "textfield",
                    "heading" => __ ( 'Speed Scroll', CSCORE_NAME ),
                    "param_name" => "speed_scroll",
                    "value" => "500",
                    "dependency" => array(
                        "element" => 'auto_scroll',
                        "value" => array(
                            "1"
                        )
                    ),
                    "group" => "Layout Option",
                    "description" => __ ( 'Enter the time delay when move slide. Default is 500', CSCORE_NAME )
                ),
                array (
                        "type" => "dropdown",
                        "heading" => __ ( 'Show navigation', CSCORE_NAME ),
                        "param_name" => "show_nav",
                        "value" => array (
                            __("No", CSCORE_NAME) => '0',
                            __("Yes", CSCORE_NAME) => '1'
                        ),
                        "group" => "Layout Option",
                        "description" => __ ( 'Show or hide navigation on your carousel post.', CSCORE_NAME )
                ),
                array (
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __ ( "Navigation Position", CSCORE_NAME ),
                    "param_name" => "nav_align",
                    "value" => array (
                        "Top Left" => "1",
                        "Top Center" => "2",
                        "Top Right" => "3",
                        "Bottom Left" => "text-left",
                        "Bottom Center" => "text-center",
                        "Bottom Right" => "text-right",
                        "Vertical Center" => "vertical-center"
                    ),
                    "group" => "Layout Option",
                    "dependency" => array(
                        "element" => 'show_nav',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __("Select Position for Navigation", CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Navigation Arrow Style", CSCORE_NAME),
                    "param_name" => "nav_arrow_style",
                    "value" => $bxslider_nav_type,
                    "dependency" => array(
                        "element" => 'show_nav',
                        "value" => array(
                            "1"
                        )
                    ),
                    "group" => "Layout Option",
                    "description" => __("Select style for navigation arrow", CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Navigation Left Arrow Icon", CSCORE_NAME),
                    "param_name" => "nav_left_icon",
                    "value" => "fa fa-angle-left",
                    "group" => "Layout Option",
                    "dependency" => array(
                        "element" => 'nav_arrow_style',
                        "value" => array(
                            "icon","square_black","square_white","square_gray","square_border","rounded_black","rounded_white","circle_black","circle_white","circle_black small","circle_white small"
                        )
                    ),
                    "description" => __("Select Awesome icon for arrow left", CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Navigation Right Arrow Icon", CSCORE_NAME),
                    "param_name" => "nav_right_icon",
                    "value" => "fa fa-angle-right",
                    "group" => "Layout Option",
                    "dependency" => array(
                        "element" => 'nav_arrow_style',
                        "value" => array(
                            "icon","square_black","square_white","square_gray","square_border","rounded_black","rounded_white","circle_black","circle_white","circle_black small","circle_white small"
                        )
                    ),
                    "description" => __("Select Awesome icon for arrow Right", CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Navigation Arrow Offset", CSCORE_NAME),
                    "param_name" => "nav_icon_offset",
                    "value" => "0",
                    "group" => "Layout Option",
                    "dependency" => array(
                        "element" => 'nav_align',
                        "value" => array(
                            "vertical-center"
                        )
                    ),
                    "description" => __("Choose horizontal offset for arrow icon. This option just apply for Navigation align is: Vertical center", CSCORE_NAME)
                ),
                
                array (
                        "type" => "dropdown",
                        "heading" => __ ( 'Show Pager', CSCORE_NAME ),
                        "param_name" => "show_pager",
                        "value" => array (
                            __("No", CSCORE_NAME) => '0',
                            __("Yes", CSCORE_NAME) => '1'  
                        ),
                        "group" => "Layout Option",
                        "description" => __ ( 'Show or hide pager on your carousel post.', CSCORE_NAME )
                ),
                array (
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __ ( "Pager Align", CSCORE_NAME ),
                    "param_name" => "pager_align",
                    "value" => array (
                        "Bottom Left" => "pager-left text-left",
                        "Bottom Center" => "pager-center text-center",
                        "Bottom Right" => "pager-right text-right"
                    ),
                    "dependency" => array(
                        "element" => 'show_pager',
                        "value" => array(
                            "1"
                        )
                    ),
                    "group" => "Layout Option",
                    "description" => __("Select align for Pager", CSCORE_NAME)
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Pager Style", CSCORE_NAME),
                    "param_name" => "pager_style",
                    "value" => $bxslider_pager_type,
                    "dependency" => array(
                        "element" => 'show_pager',
                        "value" => array(
                            "1"
                        )
                    ),
                    "group" => "Layout Option",
                    "description" => __("Select style for pager", CSCORE_NAME)
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
                    "description" => __("Select align for each item content", CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Content Color', CSCORE_NAME),
                    "param_name" => "content_color",
                    "description" => __("Select color for each item description", CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Content Background Color', CSCORE_NAME),
                    "param_name" => "content_bg_color",
                    "description" => __("Select background color for each item", CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Padding', CSCORE_NAME),
                    "param_name" => "content_padding",
                    'value' => '',
                    "description" => __('The padding for content of each item. Top Right Bottom Left, Ex: 10px 10px 10px 10px', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Content Border Radius', CSCORE_NAME),
                    "param_name" => "content_border_radius",
                    'value' => '',
                    "description" => __('Enter border radius for each item', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show item image', CSCORE_NAME),
                    "param_name" => "show_image",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show or hide image on your Testimonial item.', CSCORE_NAME),
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
                    "dependency" => array(
                        "element" => 'show_image',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __('Crop or not crop image on Testimonial item.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Width image', CSCORE_NAME),
                    "param_name" => "width_image",
                    "dependency" => array(
                        "element" => 'crop_image',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __('Enter the width of image. Default: 300.', CSCORE_NAME),
                    "group" => "Item Option"
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
                    "description" => __('Enter the height of image. Default: 300.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Image border radius', CSCORE_NAME),
                    "param_name" => "image_border",
                    "dependency" => array(
                        "element" => 'show_image',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __('Enter the border radius style for item image. Example 0 for square image, 5px for rounded image or 50% for circle image. Default is 0', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Image Align", CSCORE_NAME),
                    "param_name" => "image_align",
                    "value" => array(
                        "Left" => "left",
                        "Center" => "center",
                        "Right" => "right"
                    ),
                    "dependency" => array(
                        "element" => 'show_image',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __("Select align for each item content", CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Quotation Type", CSCORE_NAME),
                    "param_name" => "quotation_type",
                    "value" => array(
                        "None" => "none",
                        "Icon" => "icon",
                        "Text" => "text"
                    ),
                    "description" => __("", CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Quotation Left icon', CSCORE_NAME),
                    "param_name" => "quotation_left_icon",
                    'value' => '',
                    "description" => __('Choose Quotation Left icon. <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" taget="_blank">Click here</a> for choose AweSome icon or <a href="http://ionicons.com/" taget="_blank">Click here</a> for choose IonIcon. Default is hide', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'quotation_type',
                        "value" => array(
                            "icon"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Quotation Right icon', CSCORE_NAME),
                    "param_name" => "quotation_right_icon",
                    'value' => '',
                    "description" => __('Choose Quotation Left icon. <a href="http://fortawesome.github.io/Font-Awesome/cheatsheet/" taget="_blank">Click here</a> for choose AweSome icon or <a href="http://ionicons.com/" taget="_blank">Click here</a> for choose IonIcon. Default is hide.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'quotation_type',
                        "value" => array(
                            "icon"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Quotation Left Text', CSCORE_NAME),
                    "param_name" => "quotation_left_text",
                    'value' => '',
                    "description" => __('Enter Quotation Left text.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'quotation_type',
                        "value" => array(
                            "text"
                        )
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Quotation Right Text', CSCORE_NAME),
                    "param_name" => "quotation_right_text",
                    'value' => '',
                    "description" => __('Enter Quotation Right text.', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'quotation_type',
                        "value" => array(
                            "text"
                        )
                    )
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Quotation Color', CSCORE_NAME),
                    "param_name" => "quotation_color",
                    "description" => __("Select color for Quotation. Default color is primary color", CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'quotation_type',
                        "value" => array(
                            "icon",
                            "text"
                        )
                    ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Quotation Size', CSCORE_NAME),
                    "param_name" => "quotation_icon_size",
                    'value' => '48px',
                    "description" => __('Choose font size (px/em/...) for icon. Default is 48px', CSCORE_NAME),
                    "group" => "Item Option",
                    "dependency" => array(
                        "element" => 'quotation_type',
                        "value" => array(
                            "icon",
                            "text"
                        )
                    ),
                ),

                array(
                    "type" => "dropdown",
                    "heading" => __('Show title', CSCORE_NAME),
                    "param_name" => "show_title",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show or hide title on each item.', CSCORE_NAME),
                    "group" => "Item Option"                    
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Item Title Size", CSCORE_NAME),
                    "param_name" => "item_title_heading",
                    "value" => array(
                        "Default" => "",
                        "H1" => "h1",
                        "H2" => "h2",
                        "H3" => "h3",
                        "H4" => "h4",
                        "H5" => "h5",
                        "H6" => "h6",
                        "Div" => "div"
                    ),
                    "dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __("Select Heading for Title", CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Item Title Color', CSCORE_NAME),
                    "param_name" => "item_title_heading_color",
                    "description" => __("Select color for each item title", CSCORE_NAME),
                    "group" => "Item Option"
                ),

                array(
                    "type" => "dropdown",
                    "heading" => __('Show category', CSCORE_NAME),
                    "param_name" => "show_category",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),

                    "description" => __('Show or hide category on your testimonial.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show description', CSCORE_NAME),
                    "param_name" => "show_description",
                    "value" => array(
                        __("Yes", CSCORE_NAME) => '1',
                        __("No", CSCORE_NAME) => '0'
                    ),
                    "description" => __('Show or hide description on your Testimonial.', CSCORE_NAME),
                    "group" => "Item Option"
                ),

                array(
                    "type" => "textfield",
                    "heading" => __('Excerpt Length', CSCORE_NAME),
                    "param_name" => "excerpt_length",
                    'value' => '300',
                    "dependency" => array(
                        "element" => 'show_description',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __('The length of the excerpt, number of words to display. Set to "-1" for no excerpt.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Description font size', CSCORE_NAME),
                    "param_name" => "excerpt_length_font_size",
                    'value' => '',
                    "dependency" => array(
                        "element" => 'show_description',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __('The font size of the excerpt.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Show read more', CSCORE_NAME),
                    "param_name" => "show_readmore",
                    "value" => array(
                        __("No", CSCORE_NAME) => '0',
                        __("Yes", CSCORE_NAME) => '1'    
                    ),
                    "description" => __('Show or hide read more button.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Read More Text', CSCORE_NAME),
                    "param_name" => "read_more",
                    "value" => 'Read more',
                    "dependency" => array(
                        "element" => 'show_readmore',
                        "value" => array(
                            "1"
                        )
                    ),
                    "description" => __('Enter desired text for details link.', CSCORE_NAME),
                    "group" => "Item Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('View All Link', CSCORE_NAME),
                    "param_name" => "morelink",
                    'value' => '',
                    "group" => "Extra Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('View All Text', CSCORE_NAME),
                    "param_name" => "moretext",
                    'value' => '',
                    "group" => "Extra Option"
                ),
                array(
                    "type" => "textfield",
                    "heading" => __('Custom Class', CSCORE_NAME),
                    "param_name" => "el_class",
                    "description" => '',
                    "group" => "Extra Option"
                )
            )
        ));
}