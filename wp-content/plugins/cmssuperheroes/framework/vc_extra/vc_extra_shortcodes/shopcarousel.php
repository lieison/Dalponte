<?php
global $bxslider_nav_type, $bxslider_pager_type, $shortcode_date_format, $shortcode_button_type, $overlay_appear_style;
if (class_exists ( 'Woocommerce' )) {
	vc_map ( array (
			"name" => 'Shop Carousel',
			"base" => "cs-shop-carousel",
			"icon" => "cs_icon_for_vc",
			"category" => __ ( 'CS Hero', CSCORE_NAME ),
			"description" => __ ( 'Shop Carousel', CSCORE_NAME, CSCORE_NAME ),
			"params" => array (

				array (
					"type" => "textfield",
					"heading" => __ ( 'Heading', CSCORE_NAME ),
					"param_name" => "title",
					"group" => "General",
					"admin_label" => true
				),
				array(
				    "type" => "dropdown",
				    "heading" => __("Heading size", CSCORE_NAME),
				    "param_name" => "heading_size",
				    "value" => array(
				        "Default"   => "h3",
				        "Heading 1" => "h1",
				        "Heading 2" => "h2",
				        "Heading 3" => "h3",
				        "Heading 4" => "h4",
				        "Heading 5" => "h5",
				        "Heading 6" => "h6"
				    ),
				    "group" => "General",
				    "description" => 'Select your heading size for title.'
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
			        "group" => "General",
			        "description" => __("Select align for Title", CSCORE_NAME)
			    ),
				array(
				    "type" => "colorpicker",
				    "heading" => __('Heading Color', CSCORE_NAME),
				    "param_name" => "title_color",
				    "group" => "General"
				),
				
				array (
						"type" => "textfield",
						"heading" => __ ( 'Sub Heading', CSCORE_NAME ),
						"param_name" => "subtitle",
						"group" => "General"
				),
				array(
				    "type" => "dropdown",
				    "heading" => __("Sub Heading size", CSCORE_NAME),
				    "param_name" => "subtitle_heading_size",
				    "value" => array(
				        "Default"   => "h4",
				        "Heading 1" => "h1",
				        "Heading 2" => "h2",
				        "Heading 3" => "h3",
				        "Heading 4" => "h4",
				        "Heading 5" => "h5",
				        "Heading 6" => "h6"
				    ),
				    "group" => "General",
				    "description" => 'Select your heading size for sub title.'
				),
				array (
						"type" => "textarea",
						"heading" => __ ( 'Description', CSCORE_NAME ),
						"param_name" => "description",
						"group" => "General"
				),
				
				array (
						"type" => "pro_taxonomy",
						"taxonomy" => "product_cat",
						"heading" => __ ( "Categories", CSCORE_NAME ),
						"param_name" => "category",
						"group" => "Source",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Number of posts to show per page', CSCORE_NAME ),
						"param_name" => "posts_per_page",
						'value' => '12',
						"group" => "Source",
						"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', CSCORE_NAME )
				),
				array (
						"type" => "",
						"heading" => __ ( 'Order Style', CSCORE_NAME ),
						"param_name" => "order_style",
						'value' => '',
						"group" => "Source",
						"description" => __ ( 'All config of Order', CSCORE_NAME )
				),

				array (
						"type" => "dropdown",
						"heading" => __ ( 'Order by', CSCORE_NAME ),
						"param_name" => "orderby",
						"value" => array (
								"None" => "none",
								"Title" => "title",
								"Date" => "date",
								"ID" => "ID",
								"Price" => 'price',
								"Sales" => 'sales',
								"Random" => 'rand',
						),
						"group" => "Source",
						"description" => __ ( 'Order by ("none", "title", "date", "ID", "Price", "Sales", "Random").', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Order', CSCORE_NAME ),
						"param_name" => "order",
						"value" => array (
								"None" => "none",
								"Ascending" => "asc",
								"Descending" => "desc"
						),
						"group" => "Source",
						"description" => __ ( 'Order ("none", "asc", "desc").', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width item', CSCORE_NAME ),
						"param_name" => "width_item",
						"group" => "Carousel Setting",
						"description" => __ ( 'Enter the width of item. Default: 360.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Margin item', CSCORE_NAME ),
						"param_name" => "margin_item",
						"group" => "Carousel Setting",
						"description" => __ ( 'Enter the margin of item. Default: 30.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Min Slide', CSCORE_NAME ),
						"param_name" => "min_slide",
						'value' => '1',
						"group" => "Carousel Setting"
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Max Slide', CSCORE_NAME ),
						"param_name" => "max_slide",
						"group" => "Carousel Setting",
						'value' => '3',
				),
				

				array (
						"type" => "dropdown",
						"heading" => __ ( 'Auto scroll', CSCORE_NAME ),
						"param_name" => "auto_scroll",

						"value" => array (
								__ ( "Yes", CSCORE_NAME ) => '1',
								__ ( "No", CSCORE_NAME ) => '0'
						),
						"group" => "Carousel Setting",
						"description" => __ ( 'Auto scroll.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Speed', CSCORE_NAME ),
						"param_name" => "speed",
						"dependency" => array(
	                        "element" => 'auto_scroll',
	                        "value" => array(
	                            "1"
	                        )
	                    ),
						"group" => "Carousel Setting",
						"description" => __ ( 'Enter the speed of carousel. Default: 500.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Navigation', CSCORE_NAME ),
						"param_name" => "show_nav",
						"value" => array (
								__ ( "Yes, please", CSCORE_NAME ) => '1',
								__ ( "No, please", CSCORE_NAME ) => '0'
						),
						"group" => "Carousel Setting",
						"description" => __ ( 'Show or hide navigation.', CSCORE_NAME )
				),
				array (
			        "type" => "dropdown",
			        "class" => "",
			        "heading" => __ ( "Navigation Align", CSCORE_NAME ),
			        "param_name" => "nav_align",
			        "value" => array (
			        	"Top Left" => "top-left",
			            "Top Center" => "top-center",
			            "Top Right" => "top-right",
			            "Bottom Left" => "text-left",
			            "Bottom Center" => "text-center",
			            "Bottom Right" => "text-right",
			            "Vertical Center" => "vertical-center"
			        ),
			        "dependency" => array(
                        "element" => 'show_nav',
                        "value" => array(
                            "1"
                        )
                    ),
			        "group" => "Carousel Setting",
			        "description" => __("Select align for Navigation", CSCORE_NAME)
			    ),
				array(
                    "type" => "dropdown",
                    "class" => "",
                    "heading" => __("Navigation Arrow Style", CSCORE_NAME),
                    "param_name" => "nav_type",
                    "value" => $bxslider_nav_type,
                    "dependency" => array(
                        "element" => 'show_nav',
                        "value" => array(
                            "1"
                        )
                    ),
                    "group" => "Carousel Setting",
                    "description" => __("Select style for navigation arrow", CSCORE_NAME)
                ),
                array(
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Navigation Left Arrow Icon", CSCORE_NAME),
                    "param_name" => "nav_left_icon",
                    "value" => "fa fa-angle-left",
                    "group" => "Carousel Setting",
                    "dependency" => array(
                        "element" => 'nav_type',
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
                    "group" => "Carousel Setting",
                    "dependency" => array(
                        "element" => 'nav_type',
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
                    "group" => "Carousel Setting",
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
								__ ( "Yes, please", CSCORE_NAME ) => '1',
								__ ( "No, please", CSCORE_NAME ) => '0',
						),
						"group" => "Carousel Setting",
						"description" => __ ( 'Show or hide pager on your carousel shop.', CSCORE_NAME )
				),
				array (
			        "type" => "dropdown",
			        "class" => "",
			        "heading" => __ ( "Pager Align", CSCORE_NAME ),
			        "param_name" => "pager_align",
			        "value" => array (
			        	"Default" => 'pager-center text-center',
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
			        "group" => "Carousel Setting",
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
                    "group" => "Carousel Setting",
                    "description" => __("Select style for pager", CSCORE_NAME)
                ),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Layout", CSCORE_NAME ),
						"param_name" => "layout",
						"group" => "Layout",
						"value" =>cscore_get_files_name_array("shopcarousel"),
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Rows", CSCORE_NAME ),
						"param_name" => "rows",
						"group" => "Layout",
						"value" => array (
								"1 row" => "1",
								"2 rows" => "2",
								"3 rows" => "3",
								"4 rows" => "4"
						),
				),
				array (
			        "type" => "dropdown",
			        "class" => "",
			        "heading" => __ ( "Content Align", CSCORE_NAME ),
			        "param_name" => "content_align",
			        "value" => array (
			        	"Default" => "",
			            "Left" => "left",
			            "Center" => "center",
			            "Right" => "right"
			        ),
			        "group" => "Layout",
			        "description" => __("Select align for content", CSCORE_NAME)
			    ),
			    array(
				    "type" => "colorpicker",
				    "heading" => __('Content Color', CSCORE_NAME),
				    "param_name" => "content_color",
				    "value" => "",
				    "group" => "Layout",
				    "description" => __("Choose color for content", CSCORE_NAME)
				),
				array(
				    "type" => "colorpicker",
				    "heading" => __('Content Hover Color', CSCORE_NAME),
				    "param_name" => "content_hover_color",
				    "value" => "",
				    "group" => "Layout",
				    "description" => __("Choose color for content when item is hovered", CSCORE_NAME)
				),
				array (
				    "type" => "colorpicker",
				    "heading" => __ ( 'Content Background Color', CSCORE_NAME ),
				    "param_name" => "content_bg_color",
				    "value" => "",
				    "group" => "Layout",
				    "description" => __ ( 'Set Background for each items.', CSCORE_NAME )
				),
				array (
				    "type" => "colorpicker",
				    "heading" => __ ( 'Content Background Hover Color', CSCORE_NAME ),
				    "param_name" => "content_bg_hover_color",
				    "value" => "",
				    "group" => "Layout",
				    "description" => __ ( 'Set Background Hover for each items.', CSCORE_NAME )
				),
				array (
				    "type" => "colorpicker",
				    "heading" => __ ( 'Overlay Background Color', CSCORE_NAME ),
				    "param_name" => "overlay_bg_color",
				    "value" => "rgba(0,0,0,0.7)", 
				    "group" => "Layout",
				    "description" => __ ( 'Set Background overlay for each items.', CSCORE_NAME )
				),
				array(
                    "type" => "dropdown",
                    "heading" => __('Overlay appear style', CSCORE_NAME),
                    "param_name" => "overlay_appear",
                    "description" => 'How to overlay style appear',
                    "value" => $overlay_appear_style,
                    "group" => "Layout"
                ),
				array (
				    "type" => "textfield",
				    "heading" => __ ( 'Content Padding', CSCORE_NAME ),
				    "param_name" => "content_padding",
				    "value" => "",
				    "group" => "Layout",
				    "description" => __ ( 'Set padding (Top-Right-Bottom-Left) for content of each item.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Item border', CSCORE_NAME ),
						"param_name" => "show_border",
						"value" => array (
							__("No", CSCORE_NAME) => '0',
							__("Yes", CSCORE_NAME) => '1'	
						),
						"group" => "Layout",
						"description" => __ ( 'Show/Hide border of content area of each product.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Item title', CSCORE_NAME ),
						"param_name" => "show_title",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Layout",
						"description" => __ ( 'Show/Hide title of each product.', CSCORE_NAME )
				),

				array(
				    "type" => "colorpicker",
				    "heading" => __('Items Heading Color', CSCORE_NAME),
				    "group" => "Layout",
				    "param_name" => "item_title_color",
				    "dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    ),
				),
				array(
				    "type" => "dropdown",
				    "heading" => __("Item Heading size", CSCORE_NAME),
				    "param_name" => "item_heading_size",
				    "value" => array(
				        "Default"   => "h3",
				        "Heading 1" => "h1",
				        "Heading 2" => "h2",
				        "Heading 3" => "h3",
				        "Heading 4" => "h4",
				        "Heading 5" => "h5",
				        "Heading 6" => "h6"
				    ),
				    "dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    ),
				    "group" => "Layout",
				    "description" => 'Select your heading size for each item title.'
				),
				array (
					"type" => "dropdown",
					"heading" => __ ( 'Show image', CSCORE_NAME ),
					"param_name" => "show_image",
					"value" => array (
						__("Yes", CSCORE_NAME) => '1',
            			__("No", CSCORE_NAME) => '0'
					),
					"group" => "Layout",
					"description" => __ ( 'Show/Hide image of each product.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Crop image', CSCORE_NAME ),
						"param_name" => "crop_image",
						"value" => array (
							__("No", CSCORE_NAME) => '0',
							__("Yes", CSCORE_NAME) => '1'

						),
						"dependency" => array(
                        "element" => 'show_image',
                        "value" => array(
	                            "1"
	                        )
	                    ),
	                    "group" => "Layout",
						"description" => __ ( 'Crop or not crop image on your product.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width image', CSCORE_NAME ),
						"param_name" => "width_image",
						"dependency" => array(
                        "element" => 'crop_image',
                        "value" => array(
	                            "1"
	                        )
	                    ),
	                    "group" => "Layout",
						"description" => __ ( 'Enter the width of image. Default: 360.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Height image', CSCORE_NAME ),
						"param_name" => "height_image",
						"dependency" => array(
                        "element" => 'crop_image',
                        "value" => array(
	                            "1"
	                        )
	                    ),
	                    "group" => "Layout",
						"description" => __ ( 'Enter the height of image. Default: 444.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Image border radius', CSCORE_NAME ),
						"param_name" => "image_border",
					    "dependency" => array(
	                        "element" => 'show_image',
	                        "value" => array(
	                            "1"
	                        )
	                    ),
						"group" => "Layout",
						"description" => __ ( 'Enter style border radius for image. Ex 3px for rounded, or 50% for circle.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Category', CSCORE_NAME ),
						"param_name" => "show_category",
						"value" => array (
							__("Yes", CSCORE_NAME) => '1',
                			__("No", CSCORE_NAME) => '0'
						),
						"group" => "Layout",
						"description" => __ ( 'Show/Hide Category of post', CSCORE_NAME )
				),
				array (
				    "type" => "colorpicker",
				    "heading" => __ ( 'Category Color', CSCORE_NAME ),
				    "param_name" => "category_color",
				    "value" => "#ffffff",
				    "dependency" => array(
                        "element" => 'show_category',
                        "value" => array(
                            "1"
                        )
                    ),
				    "group" => "Layout",
				    "description" => __ ( 'Set Category color for each items.', CSCORE_NAME )
				),
				array (
				    "type" => "dropdown",
				    "heading" => __ ( 'Show Description', CSCORE_NAME ),
				    "param_name" => "show_description",
				    "value" => array (
				        __("Yes", CSCORE_NAME) => '1',
				        __("No", CSCORE_NAME) => '0'
				    ),
				    "group" => "Layout",
				    "description" => __ ( 'Show/Hide Category of post', CSCORE_NAME )
				),
				array (
				    "type" => "textfield",
				    "heading" => __ ( 'Excerpt Length', CSCORE_NAME ),
				    "param_name" => "excerpt_length",
				    "value" => '',
					    "dependency" => array(
	                        "element" => 'show_description',
	                        "value" => array(
	                            "1"
	                        )
	                    ),
				    "group" => "Layout",
				    "description" => __ ( 'The length of the excerpt, number of words to display. Set to "-1" for no excerpt. Default: 20.', CSCORE_NAME )
				),
				
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show price', CSCORE_NAME ),
						"param_name" => "show_price",
						"value" => array (
								__ ( "Yes", "js_composer" ) => '1',
								__ ( "No", "js_composer" ) => '0',
						),
						"group" => "Layout",
						"description" => __ ( 'Show or hide price on your Product.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show Rate', CSCORE_NAME ),
						"param_name" => "show_rate",
						"value" => array (
							__ ( "No", "js_composer" ) => '0',
							__ ( "Yes", "js_composer" ) => '1',	
						),
						"group" => "Layout",
						"description" => __ ( 'Show or hide rate on your Product.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Show add to cart', CSCORE_NAME ),
						"param_name" => "show_add_to_cart",
						"value" => array (
								__ ( "Yes, please", "js_composer" ) => '1',
								__ ( "No, please", "js_composer" ) => '0'
						),
						"group" => "Layout",
						"description" => __ ( 'Show or hide add to cart on your Product.', CSCORE_NAME )
				),
				array (
				    "type" => "dropdown",
				    "heading" => __ ( 'Show View Details button', CSCORE_NAME ),
				    "param_name" => "show_details_btn",
				    "value" => array (
				        __("Yes", CSCORE_NAME) => '1',
				        __("No", CSCORE_NAME) => '0'
				    ),
				    "group" => "Layout",
				    "description" => __ ( 'Show/Hide View details button', CSCORE_NAME )
				),
				array (
				    "type" => "textfield",
				    "heading" => __ ( 'View detail button text', CSCORE_NAME ),
				    "param_name" => "view_details_btn_text",
				    "value" => 'View Details',
				    "dependency" => array(
                        "element" => 'show_details_btn',
                        "value" => array(
                            "1"
                        )
                    ),				    
				    "group" => "Layout",
				    "description" => __ ( 'The text on the details button. Default is: View Details', CSCORE_NAME )
				),
				array (
					"type" => "dropdown",
					"heading" => __ ( 'Button type', CSCORE_NAME ),
					"param_name" => "button_type",
					"value" =>array (
				        __("Default", CSCORE_NAME) => 'default',
				        __("Default Alt", CSCORE_NAME) => 'default-alt',
				        __("Icon", CSCORE_NAME) => 'icon'
				    ),
					"group" => "Layout",
					"description" => __ ( 'Choose Add to cart/View Detail style.', CSCORE_NAME )
				),
				array (
					"type" => "dropdown",
					"heading" => __ ( 'Show Author', CSCORE_NAME ),
					"param_name" => "show_author",
					"value" => array (
						__("No", CSCORE_NAME) => '0',
						__("Yes", CSCORE_NAME) => '1'
					),
					"group" => "Layout",
					"description" => __ ( 'Show/Hide Author of post', CSCORE_NAME )
				),
				array (
				    "type" => "dropdown",
				    "heading" => __ ( 'Show Date', CSCORE_NAME ),
				    "param_name" => "show_date",
				    "value" => array (
				    	__("No", CSCORE_NAME) => '0',
				        __("Yes", CSCORE_NAME) => '1'
				    ),
				    "group" => "Layout",
				    "description" => __ ( 'Show/Hide date on item', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Date format', CSCORE_NAME ),
						"param_name" => "date_format",
						"value" => $shortcode_date_format,
						"dependency" => array(
	                        "element" => 'show_date',
	                        "value" => array(
	                            "1"
	                        )
	                    ),
						"group" => "Layout",
						"description" => __ ( 'Choose date format', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Read More Link', CSCORE_NAME ),
						"param_name" => "morelink",
						"group" => "Extra",
						'value' => '',
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Read More Text', CSCORE_NAME ),
						"param_name" => "moretext",
						"group" => "Extra",
						'value' => '',
				),
				array (
			        "type" => "dropdown",
			        "class" => "",
			        "heading" => __ ( "View all button type", CSCORE_NAME ),
			        "param_name" => "view_all_button_type",
			        "value" => $shortcode_button_type,
			        "description" => __("Select button style", CSCORE_NAME),
					"group" =>"Extra"
			    ),
				array (
					"type" => "textfield",
					"heading" => __ ( "Extra class name", "js_composer" ),
					"param_name" => "el_class",
					"group" => "Extra",
					"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
				)
			)
	) );
}