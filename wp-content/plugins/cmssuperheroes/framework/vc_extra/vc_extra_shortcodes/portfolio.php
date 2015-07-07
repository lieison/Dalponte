<?php
global $bxslider_nav_type, $bxslider_pager_type, $shortcode_date_format, $shortcode_button_type, $overlay_appear_style,$button_type, $button_size;
vc_map ( array (
		"name" => 'Portfolio',
		"base" => "cshero-portfolio",
		"icon" => "cshero_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "Portfolio", CSCORE_NAME ),
		"params" => array (
			
			array (
				"type" => "textfield",
				"heading" => __ ( 'Heading', CSCORE_NAME ),
				"param_name" => "title",
				"holder" => 'div',
				"group" =>"General"
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
			        "Div" 		=> "div",
			    ),
			    "description" => 'Select your heading size for title. Default is H3',
				"group" =>"General"
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Heading Icon', CSCORE_NAME ),
					"param_name" => "heading_icon",
					"description" => __ ( 'Enter the class name of Awesome icon for get icon! Ex: code or codepen', CSCORE_NAME ),
				"group" =>"General"
			),
			array (
		        "type" => "dropdown",
		        "class" => "",
		        "heading" => __ ( "Heading Align", CSCORE_NAME ),
		        "param_name" => "heading_align",
		        "value" => array (
		            "Left" => "text-left",
		            "Center" => "text-center",
		            "Right" => "text-right"
		        ),
		        "description" => __("Select align for Title", CSCORE_NAME),
				"group" =>"General"
		    ),
			array(
			    "type" => "colorpicker",
			    "heading" => __('Heading Color', CSCORE_NAME),
			    "param_name" => "heading_color",
				"group" =>"General"
			),
		    array (
		        "type" => "dropdown",
		        "class" => "",
		        "heading" => __ ( "Heading Text Style", CSCORE_NAME ),
		        "param_name" => "heading_text_style",
		        "value" => array (
		            "Default" => "none",
		            "Uppercase" => "uppercase",
		            "Lowercase" => "lowercase",
		            "Capitalize" => "capitalize"
		        ),
		        "description" => __("Select heading style", CSCORE_NAME),
				"group" =>"General"
		    ),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Sub Heading', CSCORE_NAME ),
					"param_name" => "subtitle",
				"group" =>"General"
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
			        "Div" 		=> "div",
			    ),
			    "description" => 'Select your heading size for sub title. Default is H4',
				"group" =>"General"
			),

			array (
					"type" => "textarea",
					"heading" => __ ( 'Description', CSCORE_NAME ),
					"param_name" => "description",
				"group" =>"General"
			),

			array (
					"type" => "pro_taxonomy",
					"taxonomy" => "portfolio_category",
					"heading" => __ ( "Categories", CSCORE_NAME ),
					"param_name" => "category",
					"description" => __ ( "Note: By default, all your portfolio will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME ),
				"group" =>"Source Option"
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Number of posts to show per page', CSCORE_NAME ),
					"param_name" => "items_display",
					'value' => '12',
					"description" => __ ( 'Number of items display.', CSCORE_NAME ),
				"group" =>"Source Option"
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Limit Items', CSCORE_NAME ),
					"param_name" => "posts_per_page",
					'value' => '20',
					"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', CSCORE_NAME ),
				"group" =>"Source Option"
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
					"description" => __ ( 'Order by ("none", "title", "date", "ID").', CSCORE_NAME ),
				"group" =>"Source Option"
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
					"description" => __ ( 'Order ("None", "Asc", "Desc").', CSCORE_NAME ),
				"group" =>"Source Option"
			),

			array (
					"type" => "dropdown",
					"class" => "",
					"heading" => __ ( "Layout Type", CSCORE_NAME ),
					"param_name" => "type",
					"value" => array (
						"Grid" => "grid",
						"Masonry" => "masonry",
					),
					"admin_label" => true,
				"group" =>"Layout Option"
			),

			array (
					"type" => "dropdown",
					"class" => "",
					"heading" => __ ( "Layout Style", CSCORE_NAME ),
					"param_name" => "layout",
					"value" =>cscore_get_files_name_array("portfolio"),
					"admin_label" => true,
				"group" =>"Layout Option"
			),
			array (
					"type" => "dropdown",
					"class" => "",
					"heading" => __ ( "Columns", CSCORE_NAME ),
					"param_name" => "columns",
					"value" => array (
							"Default" =>"",
							"1 column" => "1",
							"2 columns" => "2",
							"3 columns" => "3",
							"4 columns" => "4",
							"5 columns" => "5"
					),
					"description" => __ ( "Default is 3", CSCORE_NAME ),
				"group" =>"Layout Option"
			),
			array (
					"type" => "dropdown",
					"heading" => __ ( 'Filter', CSCORE_NAME ),
					"param_name" => "filter",
					"value" => array (
						__ ( "Yes, please", "js_composer" ) => "1",
						__ ( "No, please", "js_composer" ) => "0"
					),
					"description" => __ ( 'Would you like your portfolio items to be filter?', CSCORE_NAME ),
				"group" =>"Layout Option"
			),
			array (
			    "type" => "dropdown",
			    "class" => "",
			    "heading" => __ ( "Filter Align", CSCORE_NAME ),
			    "param_name" => "filter_align",
			    "value" => array (
			        "Left" => "text-left",
			        "Center" => "text-center",
			        "Right" => "text-right"
			    ),
			    "description" => __ ( "Set align for Filter", CSCORE_NAME ),
				"group" =>"Layout Option",
				"dependency" => array(
                    "element" => 'filter',
                    "value" => array(
                        "1"
                    )
                ),
			),
			array (
				"type" => "dropdown",
				"heading" => __ ( 'Filter Button Type', CSCORE_NAME ),
				"param_name" => "filter_btn",
				"value" => $button_type,
				"description" => __ ( 'Choose filter button style', CSCORE_NAME ),
				"group" =>"Layout Option",
				"dependency" => array(
                    "element" => 'filter',
                    "value" => array(
                        "1"
                    )
                ),
			),
			array (
				"type" => "dropdown",
				"heading" => __ ( 'Filter Button Size', CSCORE_NAME ),
				"param_name" => "filter_btn_size",
				"value" => $button_size,
				"description" => __ ( 'Choose filter button size', CSCORE_NAME ),
				"group" =>"Layout Option",
				"dependency" => array(
                    "element" => 'filter',
                    "value" => array(
                        "1"
                    )
                ),
			),
			array (
			    "type" => "textfield",
			    "class" => "",
			    "heading" => __ ( "Filter margin", CSCORE_NAME ),
			    "param_name" => "filter_margin",
			    "value" => "0 0 90px 0",
			    "description" => __ ( "Set margin Top/Right/Bottom/Left for Filter", CSCORE_NAME ),
				"group" =>"Layout Option",
				"dependency" => array(
                    "element" => 'filter',
                    "value" => array(
                        "1"
                    )
                ),
			),
			array (
					"type" => "dropdown",
					"heading" => __ ( 'Show Pagination', CSCORE_NAME ),
					"param_name" => "pagination",
					"value" => array (
						__ ( "No, please", "CSCORE_NAME" ) => "0",
						__ ( "Yes, please", "CSCORE_NAME" ) => "1"	
					),
					"description" => __ ( 'Show/Hide pagination', CSCORE_NAME ),
				"group" =>"Layout Option"
			),
			array (
				"type" => "dropdown",
				"heading" => __ ( 'Pagination Type', CSCORE_NAME ),
				"param_name" => "pagination_type",
				"value" => $bxslider_pager_type,
				"description" => __ ( 'Show pagination as number, bullet or other', CSCORE_NAME ),
				"group" =>"Layout Option",
				"dependency" => array(
                    "element" => 'pagination',
                    "value" => array(
                        "1"
                    )
                ),
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Item space', CSCORE_NAME ),
			    "param_name" => "item_margin",
			    "description" => __ ( 'Enter the space Top, Right, Bottom, Left between each item. Ex: 5px 5px 5px 5px. Default is 0 ', CSCORE_NAME ),
				"group" =>"Item Option"
			),
			array (
			    "type" => "dropdown",
			    "class" => "",
			    "heading" => __ ( "Item Content Align", CSCORE_NAME ),
			    "param_name" => "item_content_align",
			    "value" => array (
			        "Left" => "text-left",
			        "Center" => "text-center",
			        "Right" => "text-right"
			    ),
			    "description" => __ ( "Set align for item content", CSCORE_NAME ),
				"group" =>"Item Option"
			),
			array (
			    "type" => "colorpicker",
			    "heading" => __ ( 'Item Background Color', CSCORE_NAME ),
			    "param_name" => "item_bg_color",
			    "value" => "rgba(0,0,0,0.8)",
			    "description" => __ ( 'Set Background for list items.', CSCORE_NAME ),
				"group" =>"Item Option"
			),
			array (
					"type" => "dropdown",
					"heading" => __ ( 'Crop image', CSCORE_NAME ),
					"param_name" => "crop_image",
					"value" => array (
						__ ( "No, please", CSCORE_NAME ) => '0',
						__ ( "Yes, please", CSCORE_NAME ) => '1'
					),
					"description" => __ ( 'Crop or not crop image on your Portfolio. Just set to YES if you want to use Grid Layout', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'type',
                    "value" => array(
                        "grid"
                    )
                )
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Width image', CSCORE_NAME ),
					"param_name" => "width_image",
					"description" => __ ( 'Enter the width of image. Default: 370.', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'crop_image',
                    "value" => array(
                        "1"
                    )
                ),
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Height image', CSCORE_NAME ),
					"param_name" => "height_image",
					"description" => __ ( 'Enter the height of image. Default: 200.', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'crop_image',
                    "value" => array(
                        "1"
                    )
                ),
			),
			
			array (
					"type" => "dropdown",
					"heading" => __ ( 'Show title', CSCORE_NAME ),
					"param_name" => "show_title",
					"value" => array (
						__ ( "Yes, please", "js_composer" ) => "1",
						__ ( "No, please", "js_composer" ) => "0"
					),
					"description" => __ ( 'Show or hide title on your Portfolio.', CSCORE_NAME ),
				"group" =>"Item Option"
			),
			array (
			    "type" => "colorpicker",
			    "heading" => __ ( 'Title Color', CSCORE_NAME ),
			    "param_name" => "title_color",
			    "value" => "#fff",
			    "description" => __ ( 'Set color for title items.', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'show_title',
                    "value" => array(
                        "1"
                    )
                ),
			),

			array (
					"type" => "dropdown",
					"heading" => __ ( 'Show category', CSCORE_NAME ),
					"param_name" => "show_category",
					"value" => array (
						__ ( "Yes, please", "js_composer" ) => "1",
						__ ( "No, please", "js_composer" ) => "0"
					),
					"description" => __ ( 'Show or hide category on your Portfolio.', CSCORE_NAME ),
				"group" =>"Item Option"
			),
			array (
			    "type" => "colorpicker",
			    "heading" => __ ( 'Category Color', CSCORE_NAME ),
			    "param_name" => "category_color",
			    "value" => "#fff",
			    "description" => __ ( 'Set color for title items.', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'show_category',
                    "value" => array(
                        "1"
                    )
                ),
			),
			array (
					"type" => "dropdown",
					"heading" => __ ( 'Show description', CSCORE_NAME ),
					"param_name" => "show_description",
					"value" => array (
						__ ( "Yes, please", "js_composer" ) => "1",
						__ ( "No, please", "js_composer" ) => "0"
					),
					"description" => __ ( 'Show or hide description on your Portfolio.', CSCORE_NAME ),
				"group" =>"Item Option"
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Excerpt Length', CSCORE_NAME ),
					"param_name" => "excerpt_length",
					'value' => '100',
					"description" => __ ( 'The length of the excerpt, number of words to display. Set to "-1" for no excerpt.', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'show_description',
                    "value" => array(
                        "1"
                    )
                ),
			),
			array (
			    "type" => "colorpicker",
			    "heading" => __ ( 'Description Color', CSCORE_NAME ),
			    "param_name" => "description_color",
			    "value" => "#fff",
			    "description" => __ ( 'Set color for description.', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'show_description',
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
							__ ( "Icon", CSCORE_NAME ) => "icon",
							__ ( "Icon Circle", CSCORE_NAME ) => "icon-circle",
							__ ( "Button", CSCORE_NAME ) => "button",
							__ ( "Text", CSCORE_NAME ) => "text",

					),
					"description" => __ ( 'Choose link type for Launch project, read more and popup link. Default is Text', CSCORE_NAME ),
				"group" =>"Item Option"
			),
            array (
			    "type" => "colorpicker",
			    "heading" => __ ( 'Item Link Color', CSCORE_NAME ),
			    "param_name" => "item_link_color",
			    "value" => "#fff",
			    "description" => __ ( 'Set Link Color for list items.', CSCORE_NAME ),
				"group" =>"Item Option"
			),
			array (
			    "type" => "colorpicker",
			    "heading" => __ ( 'Item Link Hover Color', CSCORE_NAME ),
			    "param_name" => "item_link_hover_color",
			    "value" => "#fff",
			    "description" => __ ( 'Set Link hover for list items.', CSCORE_NAME ),
				"group" =>"Item Option"
			),
			array (
					"type" => "dropdown",
					"heading" => __ ( 'Show Link', CSCORE_NAME ),
					"param_name" => "show_link",
					"value" => array (
						__ ( "Yes, please", "js_composer" ) => "1",
						__ ( "No, please", "js_composer" ) => "0"
					),
					"description" => __ ( 'Show/Hide external link button', CSCORE_NAME ),
				"group" =>"Item Option"
			),
            
			array (
					"type" => "textfield",
					"heading" => __ ( 'Link text', CSCORE_NAME ),
					"param_name" => "link_text",
					'value' => 'Launch Project',
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'link_type',
                    "value" => array(
                        "text", "button"
                    )
                ),
			),
			array (
                "type" => "textfield",
                "heading" => __ ( 'Link Icon', CSCORE_NAME ),
                "param_name" => "link_icon",
                "value" => 'fa fa-external-link',
                "description" => __ ( 'Enter the class of AweSome or IonIcon font. Default is: fa fa-external-link', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'link_type',
                    "value" => array(
                        "icon", "icon-circle"
                    )
                ),
            ),
			array (
					"type" => "dropdown",
					"heading" => __ ( 'Show Read More', CSCORE_NAME ),
					"param_name" => "read_more",
					"value" => array (
							__ ( "Yes", CSCORE_NAME ) => "1",
							__ ( "No", CSCORE_NAME ) => "0"
					),
					"description" => __ ( 'Show/Hide Read more button', CSCORE_NAME ),
				"group" =>"Item Option"
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Read more text', CSCORE_NAME ),
				'param_name' => 'read_more_text',
				"value" => 'Read more',
				'description' => __( 'Enter the text you want for link to detail portfolio item. Default is Read more', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'link_type',
                    "value" => array(
                        "text","button"
                    )
                )
			),
			array (
                "type" => "textfield",
                "heading" => __ ( 'Read more Icon', CSCORE_NAME ),
                "param_name" => "read_more_icon",
                "value" => 'fa fa-link',
                "description" => __ ( 'Enter the class of AweSome or IonIcon font. Default is: fa fa-link', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'link_type',
                    "value" => array(
                        "icon", "icon-circle"
                    )
                )
            ),
			array (
					"type" => "dropdown",
					"heading" => __ ( 'Show Popup', CSCORE_NAME ),
					"param_name" => "zoom",
					"value" => array (
							__ ( "Yes", CSCORE_NAME ) => "1",
							__ ( "No", CSCORE_NAME ) => "0"
					),
					"description" => __ ( 'Show/Hide Larger image. Default is Show', CSCORE_NAME ),
				"group" =>"Item Option"
			),
            array (
                "type" => "textfield",
                "heading" => __ ( 'Popup Text', CSCORE_NAME ),
                "param_name" => "zoom_text",
                "value" => 'Large Image',
                "description" => __ ( 'Enter the text you want for open Larger image in popup. Default is Large Image', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'link_type',
                    "value" => array(
                        "text","button"
                    )
                )
            ),
            array (
                "type" => "textfield",
                "heading" => __ ( 'Popup Icon', CSCORE_NAME ),
                "param_name" => "zoom_icon",
                "value" => 'fa fa-search',
                "description" => __ ( 'Enter the class of AweSome or IonIcon font. Default is: fa fa-search', CSCORE_NAME ),
				"group" =>"Item Option",
				"dependency" => array(
                    "element" => 'link_type',
                    "value" => array(
                        "icon", "icon-circle"
                    )
                )
            ),
            

			array (
			    "type" => "textfield",
			    "heading" => __ ( 'View All Link', CSCORE_NAME ),
			    "param_name" => "morelink",
			    'value' => '',
			    "description" => __ ( 'Link to page to show all portfolio', CSCORE_NAME ),
				"group" =>"Extra Option"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'View All Text', CSCORE_NAME ),
			    "param_name" => "moretext",
			    'value' => '',
			    "description" => __ ( 'Text for link to page show all portfolio', CSCORE_NAME ),
				"group" =>"Extra Option"
			),
			array (
		        "type" => "dropdown",
		        "class" => "",
		        "heading" => __ ( "View all button type", CSCORE_NAME ),
		        "param_name" => "view_all_button_type",
		        "value" => $shortcode_button_type,
		        "description" => __("Select button style", CSCORE_NAME),
				"group" =>"Extra Option"
		    ),
			
			array (
					"type" => "textfield",
					"heading" => __ ( "Extra class name", CSCORE_NAME ),
					"param_name" => "el_class",
					"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME ),
				"group" =>"Extra Option"
			)
		)
) );