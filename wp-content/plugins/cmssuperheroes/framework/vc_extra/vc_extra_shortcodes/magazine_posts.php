<?php
vc_map( array(
		"name" => 'Magazine Posts',
		"base" => "cshero-magazine-posts",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "This element display list posts for magazine style", CSCORE_NAME ),
		"params" => array(
			array(
					"type" => "textfield",
					"heading" => __ ( 'Title', CSCORE_NAME ),
					"param_name" => "title",
					"group" => "General",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Title size", CSCORE_NAME ),
				"param_name" => "heading_size",
				"default" => "h3",
				"value" => array(
						"H1" => "h1",
						"H2" => "h2",
						"H3" => "h3",
						"H4" => "h4",
						"H5" => "h5",
						"H6" => "h6",
						"Div" => "div",
				),
				"description" => 'Select your heading size for title.',
					"group" => "General",
			),
			
			array(
					"type" => "colorpicker",
					"heading" => __ ( 'Title Color', CSCORE_NAME ),
					"param_name" => "title_color",
					"group" => "General",
			),
			array(
					"type" => "dropdown",
					"heading" => __ ( 'Title Transform', CSCORE_NAME ),
					"param_name" => "title_transform",
					"value" => array(
							__ ( "Default", CSCORE_NAME ) => "inherit",
							__ ( "Uppercase", CSCORE_NAME ) => "uppercase",
							__ ( "Lowercase", CSCORE_NAME ) => "lowercase",
							__ ( "Capitalize", CSCORE_NAME ) => "capitalize",
					),
					"description" => __ ( 'Make title Uppercase or Lowercase or Inherit', CSCORE_NAME ),
					"group" => "General",
			),
			array(
					"type" => "pro_taxonomy",
					"heading" => __ ( 'Categories', CSCORE_NAME ),
					"param_name" => "categories",
					"taxonomy" => 'category',
					"description" => __ ( 'Choose Categories', CSCORE_NAME ),
					"group" => "Source",
					"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => __ ( 'Limit Items', CSCORE_NAME ),
				"param_name" => "item_per_page",
				"std" => 5,
				"description" => 'Number posts on display.',
					"group" => "Source",
			),
			array(
				"type" => "dropdown",
				"heading" => __( 'Date format', CSCORE_NAME ),
				"param_name" => "date_format",
				"value" => array(
					__("05 December 2014", CSCORE_NAME) => 'd F Y',
					__("December 13th 2014", CSCORE_NAME) => 'F jS Y',
					__("13th December 2014", CSCORE_NAME) => 'jS F Y',
	    			__("05 Dec 2014", CSCORE_NAME) => 'd M Y',
	    			__("Dec 05 2014", CSCORE_NAME) => 'M d Y',
	    			__("05 December 2014 15:15:15 AM", CSCORE_NAME) => 'd F Y H:i:s A',
	    			__("05 December 2014 15:15:15 am", CSCORE_NAME) => 'd F Y H:i:s a',
	    			__("05 Dec 2014 15:15:15 AM", CSCORE_NAME) => 'd M Y H:i:s A',
	    			__("05 Dec 2014 15:15:15 am", CSCORE_NAME) => 'd M Y H:i:s a',
	    			__("5 mins ago",CSCORE_NAME) => 'time'
				),
				"group" => "Source",
				"description" => __( 'Choose date format', CSCORE_NAME )
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Feature", CSCORE_NAME ),
				"param_name" => "show_feature",
				"std" => '1',
				"value" => array(
	                __("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'
	            ),
				"description" => 'Show or Hide feature post',
				"group" => "Feature Post",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Type of Posts", CSCORE_NAME ),
				"param_name" => "show_type",
				"std" => '1',
				"value" => array(
	                __("No", CSCORE_NAME) => '0',
	                __("Yes", CSCORE_NAME) => '1'
	            ),
	            "dependency" => array(
                    "element" => 'show_feature',
                    "value" => array(
                        "1"
                    )
                ),
				"description" => 'Show or Hide type of post',
				"group" => "Feature Post",
			),
			
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Image", CSCORE_NAME ),
				"param_name" => "show_image",
				"std" => '1',
				"value" => array(
					__("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'
	            ),
	            "dependency" => array(
                    "element" => 'show_feature',
                    "value" => array(
                        "1"
                    )
                ),
				"description" => 'Show or Hide feature image of post',
				"group" => "Feature Post",
			),
			array(
	            "type" => "dropdown",
	            "heading" => __('Crop image', CSCORE_NAME),
	            "param_name" => "crop_image",
	            "value" => array(
	            	__("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'
	            ),
	            "dependency" => array(
                    "element" => 'show_image',
                    "value" => array(
                        "1"
                    )
                ),
	            "group" => "Feature Post",
	            "description" => __('Crop or not crop image on your post.', CSCORE_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __('Width feature image', CSCORE_NAME),
	            "param_name" => "width_image",
	            "value" => "370",
	            "dependency" => array(
                    "element" => 'crop_image',
                    "value" => array(
                        "1"
                    )
                ),
	            "group" => "Feature Post",
	            "description" => __('Enter the width of image. Default: 370.', CSCORE_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __('Height feature image', CSCORE_NAME),
	            "param_name" => "height_image",
	            "value" => "260",
	            "dependency" => array(
                    "element" => 'crop_image',
                    "value" => array(
                        "1"
                    )
                ),
	            "group" => "Feature Post",
	            "description" => __('Enter the height of image. Default: 260.', CSCORE_NAME)
	        ),
	        array(
				"type" => "dropdown",
				"heading" => __ ( "Show Date", CSCORE_NAME ),
				"param_name" => "show_date",
				"std" => '1',
				"value" => array(
	                __("No", CSCORE_NAME) => '0',
	                __("Yes", CSCORE_NAME) => '1'
	            ),
	            "dependency" => array(
                    "element" => 'show_feature',
                    "value" => array(
                        "1"
                    )
                ),
				"description" => 'Show or Hide date of post',
				"group" => "Feature Post",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Description", CSCORE_NAME ),
				"param_name" => "show_description",
				"std" => '1',
				"value" => array(
	                __("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'
	            ),
	            "dependency" => array(
                    "element" => 'show_feature',
                    "value" => array(
                        "1"
                    )
                ),
				"description" => 'Show or Hide description of post',
				"group" => "Feature Post",
			),
	        array(
				"type" => "dropdown",
				"heading" => __ ( "Show Image", CSCORE_NAME ),
				"param_name" => "show_list_image",
				"std" => '1',
				"value" => array(
					__("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'  
	            ),
				"description" => 'Show or Hide feature image of post',
				"group" => "List Posts",
			),
	        array(
	            "type" => "dropdown",
	            "heading" => __('Crop image', CSCORE_NAME),
	            "param_name" => "crop_list_image",
	            "value" => array(
	            	__("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'     
	            ),
	            "dependency" => array(
                    "element" => 'show_list_image',
                    "value" => array(
                        "1"
                    )
                ),
	            "group" => "List Posts",
	            "description" => __('Crop or not crop image on your posts.', CSCORE_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __('Width list image', CSCORE_NAME),
	            "param_name" => "width_list_image",
	            "value" => "70",
	            "dependency" => array(
                    "element" => 'crop_list_image',
                    "value" => array(
                        "1"
                    )
                ),
	            "group" => "List Posts",
	            "description" => __('Enter the width of image. Default: 70.', CSCORE_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __('Height list image', CSCORE_NAME),
	            "param_name" => "height_list_image",
	            "value" => "70",
	            "group" => "List Posts",
	            "dependency" => array(
                    "element" => 'crop_list_image',
                    "value" => array(
                        "1"
                    )
                ),
	            "description" => __('Enter the height of image. Default: 70.', CSCORE_NAME)
	        ),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Date", CSCORE_NAME ),
				"param_name" => "show_list_date",
				"std" => '1',
				"value" => array(
					__("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'    
	            ),
	            
				"description" => 'Show or Hide date of post',
				"group" => "List Posts",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Description", CSCORE_NAME ),
				"param_name" => "show_list_description",
				"value" => array(
	                __("No", CSCORE_NAME) => '0',
	                __("Yes", CSCORE_NAME) => '1'
	            ),
				"description" => 'Show or Hide description of post',
				"group" => "List Posts",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "List layout", CSCORE_NAME ),
				"param_name" => "layout",
				"value" => cscore_get_files_name_array("magazine_posts"),
				"description" => 'Select layout of Posts list.',
				"hover"=>'div',
				"group" => "Layout",
				"admin_label" => "true"
			),
			array(
				"type" => "textfield",
				"heading" => __ ( 'Custom Class', CSCORE_NAME ),
				"param_name" => "custom_class",
				"description" => 'If you wish to style particular Extra element differently, then use this field to add a class name and then refer to it in your css file.',
					"group" => "Layout",
			)
			
		)
) );