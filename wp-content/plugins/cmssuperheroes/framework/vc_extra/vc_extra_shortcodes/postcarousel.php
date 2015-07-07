<?php
global $font_format, $bxslider_nav_type, $bxslider_pager_type, $shortcode_date_format, $shortcode_button_type, $overlay_appear_style;
vc_map ( array (
		"name" => 'Post Carousel',
		"base" => "cshero-post-carousel",
		"icon" => "cshero_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( 'Post Carousel', CSCORE_NAME ),
		"params" => array (
				array (
					"type" => "textfield",
					"heading" => __ ( 'Heading', CSCORE_NAME ),
					"param_name" => "title",
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
				        "Heading 6" => "h6",
				        "Div"		=> "div",
				    ),
				    "description" => 'Select your heading size for title.'
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Heading Icon', CSCORE_NAME ),
						"param_name" => "heading_icon",
						"description" => __ ( 'Enter the class name of Awesome icon for get icon! Ex: code or codepen', CSCORE_NAME )
				),
				array (
			        "type" => "dropdown",
			        "class" => "",
			        "heading" => __ ( "Heading Align", CSCORE_NAME ),
			        "param_name" => "title_align",
			        "value" => array (
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
			    array (
			        "type" => "dropdown",
			        "class" => "",
			        "heading" => __ ( "Heading Text Style", CSCORE_NAME ),
			        "param_name" => "heading_text_style",
			        "value" => array (
			            "None" => "none",
			            "Uppercase" => "uppercase",
			            "Lowercase" => "lowercase",
			            "Capitalize" => "capitalize"
			        ),
			        "description" => __("Select heading style", CSCORE_NAME)
			    ),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Sub Heading', CSCORE_NAME ),
						"param_name" => "subtitle",
				),
				array(
				    "type" => "dropdown",
				    "heading" => __("Sub Heading size", CSCORE_NAME),
				    "param_name" => "subtitle_heading_size",
				    "value" => array(
				        "Default"   => "",
				        "Heading 1" => "h1",
				        "Heading 2" => "h2",
				        "Heading 3" => "h3",
				        "Heading 4" => "h4",
				        "Heading 5" => "h5",
				        "Heading 6" => "h6",
				        "Div"		=> "div",
				    ),
				    "description" => 'Select your heading size for sub title.'
				),

				array (
						"type" => "textfield",
						"heading" => __ ( 'Description', CSCORE_NAME ),
						"param_name" => "description",
				),

				array (
						"type" => "pro_taxonomy",
						"taxonomy" => "category",
						"heading" => __ ( "Categories", CSCORE_NAME ),
						"param_name" => "category",
						"group" => "Source Option",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME, CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Number of posts to show per page', CSCORE_NAME ),
						"param_name" => "posts_per_page",
						'value' => '12',
						"group" => "Source Option",
						"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Order by', CSCORE_NAME ),
						"param_name" => "orderby",
						"value" => array (
								"None" => "none",
								"Title" => "title",
								"Date" => "date",
								"ID" => "ID"
						),
						"group" => "Source Option",
						"description" => __ ( 'Order by ("none", "title", "date", "ID").', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Order', CSCORE_NAME ),
						"param_name" => "order",
						"value" => Array (
								"None" => "none",
								"ASC" => "ASC",
								"DESC" => "DESC"
						),
						"group" => "Source Option",
						"description" => __ ( 'Order ("None", "Asc", "Desc").', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Layout Styles", CSCORE_NAME ),
						"param_name" => "layout",
						"group" => "Layout Option",
						"value" =>cscore_get_files_name_array("postcarousel"),
						"admin_label" => true
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
                    "group" => "Layout Option",
                    "description" => __('NOTE: Vertical & Fade mode just show one item on each slide', CSCORE_NAME)
                ),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Rows", CSCORE_NAME ),
						"param_name" => "rows",
						"value" => array (
								"1 row" => "1",
								"2 rows" => "2",
								"3 rows" => "3",
								"4 rows" => "4",
								"5 rows" => "5",
								"6 rows" => "6",
								"7 rows" => "7",
								"8 rows" => "8",
								"9 rows" => "9",
								"10 rows" => "10",
								"11 rows" => "11",
								"12 rows" => "12"
						),
						"group" => "Layout Option",
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width item', CSCORE_NAME ),
						"param_name" => "width_item",
						"group" => "Layout Option",
						"description" => __ ( 'Enter the width of item. Default: 360.', CSCORE_NAME )
				),

				array (
						"type" => "textfield",
						"heading" => __ ( 'Item space', CSCORE_NAME ),
						"param_name" => "margin_item",
						"group" => "Layout Option",
						"description" => __ ( 'Enter the space between each item. Just enter the number. Ex 60. Default: 30.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Min item', CSCORE_NAME ),
						"param_name" => "min_slide",
						"group" => "Layout Option",
						"description" => __ ( 'Enter the minimum number item you want to show. Default: 1.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Max item', CSCORE_NAME ),
						"param_name" => "max_slide",
						"group" => "Layout Option",
						"description" => __ ( 'Enter the maximum item you want to show. Default: 3.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Number of item to move', CSCORE_NAME ),
						"param_name" => "move_slide",
						"group" => "Layout Option",
						"description" => __ ( 'Enter the number of item you want to move on each slide. Default: 3.', CSCORE_NAME )
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
                    "description" => __("Select position for Navigation", CSCORE_NAME)
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
                            "icon","square_black","square_white","square_gray","square_border","rounded_black","rounded_white","circle_black","circle_white"
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
                            "icon","square_black","square_white","square_gray","square_border","rounded_black","rounded_white","circle_black","circle_white"
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
				
				array (
			        "type" => "dropdown",
			        "class" => "",
			        "heading" => __ ( "Content Align", CSCORE_NAME ),
			        "param_name" => "content_align",
			        "value" => array (
			        	"DEfault" => "",
			            "Left" => "left",
			            "Center" => "center",
			            "Right" => "right"
			        ),
			        "group" => "Item Option",
			        "description" => __("Select align for content", CSCORE_NAME)
			    ),
			    array(
				    "type" => "colorpicker",
				    "heading" => __('Content Color', CSCORE_NAME),
				    "param_name" => "content_color",
				    "value" => "",
				    "group" => "Item Option",
				    "description" => __("Choose color for content", CSCORE_NAME)
				),
				array(
				    "type" => "colorpicker",
				    "heading" => __('Content Hover Color', CSCORE_NAME),
				    "param_name" => "content_hover_color",
				    "value" => "",
				    "group" => "Item Option",
				    "description" => __("Choose color for content when item is hovered", CSCORE_NAME)
				),
				array (
				    "type" => "colorpicker",
				    "heading" => __ ( 'Content Background Color', CSCORE_NAME ),
				    "param_name" => "content_bg_color",
				    "value" => "",
				    "group" => "Item Option",
				    "description" => __ ( 'Set Background for each items.', CSCORE_NAME )
				),
				array (
				    "type" => "colorpicker",
				    "heading" => __ ( 'Content Background Hover Color', CSCORE_NAME ),
				    "param_name" => "content_bg_hover_color",
				    "value" => "",
				    "group" => "Item Option",
				    "description" => __ ( 'Set Background Hover for each items.', CSCORE_NAME )
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
				array (
			        "type" => "dropdown",
			        "class" => "",
			        "heading" => __ ( "Show Post Type", CSCORE_NAME ),
			        "param_name" => "show_post_type",
			        "value" => array (
			            "No" => "0",
			            "Yes" => "1",
			        ),
			        "group" => "Item Option",
			        "description" => __("Show/Hide post type icon on each item.", CSCORE_NAME)
			    ),
				
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Item title', CSCORE_NAME ),
						"param_name" => "show_title",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Item Option",
						"description" => __ ( 'Show/Hide title of each post.', CSCORE_NAME )
				),
				array(
				    "type" => "colorpicker",
				    "heading" => __('Items Heading Color', CSCORE_NAME),
				    "param_name" => "item_title_color",
				    "group" => "Item Option",
				    "value" => "",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array(
				    "type" => "colorpicker",
				    "heading" => __('Items Heading Hover Color', CSCORE_NAME),
				    "param_name" => "item_title_hover_color",
				    "group" => "Item Option",
				    "value" => "",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array(
				    "type" => "dropdown",
				    "heading" => __("Item Heading size", CSCORE_NAME),
				    "param_name" => "item_heading_size",
				    "group" => "Item Option",
				    "value" => array(
				        "Default"   => "",
				        "Heading 1" => "h1",
				        "Heading 2" => "h2",
				        "Heading 3" => "h3",
				        "Heading 4" => "h4",
				        "Heading 5" => "h5",
				        "Heading 6" => "h6",
				        "Div"		=> "div"
				    ),
				    "description" => 'Select your heading size for each item title.',
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array(
				    "type" => "textfield",
				    "heading" => __('Items Heading Margin', CSCORE_NAME),
				    "param_name" => "item_title_margin",
				    "group" => "Item Option",
				    "value" => "",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show image', CSCORE_NAME ),
						"param_name" => "show_image",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Item Option",
						"description" => __ ( 'Show/Hide image of each post.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Crop image', CSCORE_NAME ),
						"param_name" => "crop_image",
						"value" => array (
							__("No", CSCORE_NAME) => '0',
							__("Yes", CSCORE_NAME) => '1'

						),
						"group" => "Item Option",
						"description" => __ ( 'Crop or not crop image on your Post.', CSCORE_NAME ),
						"dependency" => array(
	                        "element" => 'show_image',
	                        "value" => array(
	                            "1"
	                        )
	                    )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width image', CSCORE_NAME ),
						"param_name" => "width_image",
						"group" => "Item Option",
						"description" => __ ( 'Enter the width of image. Default: 360.', CSCORE_NAME ),
						"dependency" => array(
	                        "element" => 'crop_image',
	                        "value" => array(
	                            "1"
	                        )
	                    )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Height image', CSCORE_NAME ),
						"param_name" => "height_image",
						"group" => "Item Option",
						"description" => __ ( 'Enter the height of image. Default: 263.', CSCORE_NAME ),
						"dependency" => array(
	                        "element" => 'crop_image',
	                        "value" => array(
	                            "1"
	                        )
	                    )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Image border radius', CSCORE_NAME ),
						"param_name" => "image_border",
						"group" => "Item Option",
						"description" => __ ( 'Enter style border radius for image. Ex 3px for rounded, or 50% for circle. Default is 0', CSCORE_NAME ),
						"dependency" => array(
	                        "element" => 'show_image',
	                        "value" => array(
	                            "1"
	                        )
	                    )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Category', CSCORE_NAME ),
						"param_name" => "show_category",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Item Option",
						"description" => __ ( 'Show/Hide Category of post', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Description', CSCORE_NAME ),
						"param_name" => "show_description",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Item Option",
						"description" => __ ( 'Show/Hide Category of post', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Excerpt Length', CSCORE_NAME ),
						"param_name" => "excerpt_length",
						"value" => '',
						"group" => "Item Option",
						"description" => __ ( 'The length of the excerpt, number of words to display. Set to "-1" for no excerpt. Default: 100.', CSCORE_NAME ),
						"dependency" => array(
	                        "element" => 'show_description',
	                        "value" => array(
	                            "1"
	                        )
	                    )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show date', CSCORE_NAME ),
						"param_name" => "show_date",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Item Option",
						"description" => __ ( 'Show/Hide date of post', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Date format', CSCORE_NAME ),
						"param_name" => "date_format",
						"value" => $shortcode_date_format,
						"group" => "Item Option",
						"description" => __ ( 'Choose date format', CSCORE_NAME ),
						"dependency" => array(
	                        "element" => 'show_date',
	                        "value" => array(
	                            "1"
	                        )
	                    )
				),
				array(
				    "type" => "colorpicker",
				    "heading" => __('Date font color', CSCORE_NAME),
				    "param_name" => "date_font_color",
				    "group" => "Item Option",
				    "value" => "",
					"dependency" => array(
                        "element" => 'show_date',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array (
					"type" => "dropdown",
					"heading" => __ ( 'Date Font format', CSCORE_NAME ),
					"param_name" => "date_font_format",
					"value" => $font_format,
					"group" => "Item Option",
					"description" => __ ( 'Choose date font format', CSCORE_NAME ),
					"dependency" => array(
                        "element" => 'show_date',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array (
					"type" => "dropdown",
					"heading" => __ ( 'Date Text Style', CSCORE_NAME ),
					"param_name" => "date_font_style",
					"value" => array (
						"Default" => "initial",
						"None" 	=> "none",
			            "Uppercase" => "uppercase",
			            "Lowercase" => "lowercase",
			            "Capitalize" => "capitalize"
					),
					"group" => "Item Option",
					"description" => __ ( 'Choose date font style', CSCORE_NAME ),
					"dependency" => array(
                        "element" => 'show_date',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Comment', CSCORE_NAME ),
						"param_name" => "show_comment",
						"value" => array (
							__("No", CSCORE_NAME) => '0',
							__("Yes", CSCORE_NAME) => '1'
                			
						),
						"group" => "Item Option",
						"description" => __ ( 'Show/Hide comment of post', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Author', CSCORE_NAME ),
						"param_name" => "show_author",
						"value" => array (
							__("No", CSCORE_NAME) => '0',
							__("Yes", CSCORE_NAME) => '1'
						),
						"group" => "Item Option",
						"description" => __ ( 'Show/Hide Author of post', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show read more', CSCORE_NAME ),
						"param_name" => "show_read_more",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Item Option",
						"description" => __ ( 'Show / Hide redmore link', CSCORE_NAME )
				),
				array (
					"type" => "textfield",
					"heading" => __ ( 'Read More Text', CSCORE_NAME ),
					"param_name" => "read_more",
					"value" => 'Read more',
					"group" => "Item Option",
					"description" => __ ( 'Enter desired text for the link.', CSCORE_NAME ),
					"dependency" => array(
                        "element" => 'show_read_more',
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
                        "element" => 'show_read_more',
                        "value" => array(
                            "1"
                        )
                    )
	            ),
	            array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Popup image', CSCORE_NAME ),
						"param_name" => "show_popup",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Item Option",
						"description" => __ ( 'Show/Hide button to view image in popup', CSCORE_NAME )
				),
				array (
	                "type" => "textfield",
	                "heading" => __ ( 'Popup Text', CSCORE_NAME ),
	                "param_name" => "popup_text",
	                "value" => 'Large Image', 
	                "group" => "Item Option",
	                "description" => __ ( 'Enter the text you want for open Larger image in popup. Default is Large Image', CSCORE_NAME ),
					"dependency" => array(
                        "element" => 'show_popup',
                        "value" => array(
                            "1"
                        )
                    )
	            ),
	            array (
	                "type" => "textfield",
	                "heading" => __ ( 'Popup Icon', CSCORE_NAME ),
	                "param_name" => "popup_icon",
	                "value" => 'fa fa-search',
	                "group" => "Item Option",
	                "description" => __ ( 'Enter the class of AweSome or IonIcon font. Default is: fa fa-search', CSCORE_NAME ),
					"dependency" => array(
                        "element" => 'show_popup',
                        "value" => array(
                            "1"
                        )
                    )
	            ),
	            array (
					"type" => "dropdown",
					"heading" => __ ( 'Link type', CSCORE_NAME ),
					"param_name" => "link_type",
					"value" => array (
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
					"group" => "Item Option",
					"description" => __ ( 'Choose link type for Read more and Popup link. Default is icon', CSCORE_NAME )
				),
				array (
				    "type" => "colorpicker",
				    "heading" => __ ( 'Item Link Color', CSCORE_NAME ),
				    "param_name" => "item_link_color",
				    "value" => "",
				    "group" => "Item Option",
				    "description" => __ ( 'Set Link Color for list items.', CSCORE_NAME )
				),
				array (
				    "type" => "colorpicker",
				    "heading" => __ ( 'Item Link Hover Color', CSCORE_NAME ),
				    "param_name" => "item_link_hover_color",
				    "value" => "",
				    "group" => "Item Option",
				    "description" => __ ( 'Set Link hover for list items.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'View More Link', CSCORE_NAME ),
						"param_name" => "morelink",
						'value' => '',
						"group" => "Extra Option",
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'View More Text', CSCORE_NAME ),
						"param_name" => "moretext",
						'value' => '',
						"group" => "Extra Option",
				),
				array (
						"type" => "textfield",
						"heading" => __ ( "Extra class name", "js_composer" ),
						"param_name" => "el_class",
						"group" => "Extra Option",
						"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
				)
		)
) );
