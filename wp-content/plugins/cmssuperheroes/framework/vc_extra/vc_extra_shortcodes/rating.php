<?php
if(function_exists('the_ratings')):
$orderby = array(
	"Highest Rating" => "highest_rated",
	"Latest Post" => "latest",
	"Most rating" => "most_rated"
	);
vc_map( array(
		"name" => 'Rating List',
		"base" => "cshero-rating",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "This element display list rating of post", CSCORE_NAME ),
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
				"type" => "textfield",
				"heading" => __ ( 'Custom Class', CSCORE_NAME ),
				"param_name" => "custom_class",
				"description" => 'If you wish to style particular Extra element differently, then use this field to add a class name and then refer to it in your css file.',
				"group" => "General",
			),
			
			array(
					"type" => "pro_taxonomy",
					"heading" => __ ( 'Categories', CSCORE_NAME ),
					"param_name" => "categories",
					"taxonomy" => 'category',
					"description" => __ ( 'Choose Categories', CSCORE_NAME ),
					"group" => "Source",
			),
			array(
					"type" => "dropdown",
					"heading" => __ ( 'Order By', CSCORE_NAME ),
					"param_name" => "orderby",
					"value" => $orderby,
					"description" => __ ( 'Order list post', CSCORE_NAME ),
					"group" => "Source",
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
				"heading" => __ ( "List layout", CSCORE_NAME ),
				"param_name" => "layout",
				"value" => cscore_get_files_name_array("rating"),
				"description" => 'Select layout of rating list.',
				"hover"=>'div',
				"group" => "Layout",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Categories Filter", CSCORE_NAME ),
				"param_name" => "show_categories",
				"std" => '1',
				"value" => array(
	                __("No", CSCORE_NAME) => '0',
	                __("Yes", CSCORE_NAME) => '1'
	            ),
				"description" => 'Show or Hide categories filter',
				"group" => "Layout",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Title", CSCORE_NAME ),
				"param_name" => "show_title",
				"std" => '1',
				"value" => array(
	                __("No", CSCORE_NAME) => '0',
	                __("Yes", CSCORE_NAME) => '1'
	            ),
				"description" => 'Show or Hide title of post',
				"group" => "Items",
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
				"description" => 'Show or Hide date of post',
				"group" => "Items",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Rating", CSCORE_NAME ),
				"param_name" => "show_rating",
				"std" => '1',
				"value" => array(
	                __("No", CSCORE_NAME) => '0',
	                __("Yes", CSCORE_NAME) => '1'
	            ),
				"description" => 'Show or Hide feature post',
				"group" => "Items",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Feature", CSCORE_NAME ),
				"param_name" => "show_feature",
				"std" => '1',
				"value" => array(
	                __("No", CSCORE_NAME) => '0',
	                __("Yes", CSCORE_NAME) => '1'
	            ),
				"description" => 'Show or Hide feature post',
				"group" => "Feature Item",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Show Image", CSCORE_NAME ),
				"param_name" => "show_image",
				"value" => array(
	                __("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'
	            ),
				"description" => 'Show or Hide feature image of post',
				"group" => "Feature Item",
			),
	        array(
				"type" => "dropdown",
				"heading" => __ ( "Align Image", CSCORE_NAME ),
				"param_name" => "align_image",
				"value" => array(
					__("Default", CSCORE_NAME) => '',
	                __("Left", CSCORE_NAME) => 'left',
	                __("Right", CSCORE_NAME) => 'right'
	            ),
	            "dependency" => array(
                    "element" => 'show_image',
                    "value" => array(
                        "1"
                    )
                ),
				"description" => 'Align image of post',
				"group" => "Feature Item",
			),
			array(
	            "type" => "dropdown",
	            "heading" => __('Crop Feature image', CSCORE_NAME),
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
				"group" => "Feature Item",
	            "description" => __('Crop or not crop image on your Portfolio.', CSCORE_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __('Width feature image', CSCORE_NAME),
	            "param_name" => "width_image",
	            "dependency" => array(
                    "element" => 'crop_image',
                    "value" => array(
                        "1"
                    )
                ),
				"group" => "Feature Item",
	            "description" => __('Enter the width of image. Default: 340.', CSCORE_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __('Height feature image', CSCORE_NAME),
	            "param_name" => "height_image",
	            "dependency" => array(
                    "element" => 'crop_image',
                    "value" => array(
                        "1"
                    )
                ),
				"group" => "Feature Item",
	            "description" => __('Enter the height of image. Default: 340.', CSCORE_NAME)
	        ),
	        array(
				"type" => "dropdown",
				"heading" => __ ( "Show Image", CSCORE_NAME ),
				"param_name" => "show_list_image",
				"value" => array(
	                __("Yes", CSCORE_NAME) => '1',
	                __("No", CSCORE_NAME) => '0'
	            ),
				"description" => 'Show or Hide list image of post',
				"group" => "List Item",
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Align Image", CSCORE_NAME ),
				"param_name" => "align_list_image",
				"value" => array(
					__("Default", CSCORE_NAME) => '',
	                __("Left", CSCORE_NAME) => 'left',
	                __("Right", CSCORE_NAME) => 'right'
	            ),
	            "dependency" => array(
                    "element" => 'show_list_image',
                    "value" => array(
                        "1"
                    )
                ),
				"description" => 'Align image of post',
				"group" => "List Item",
			),
	        array(
	            "type" => "dropdown",
	            "heading" => __('Crop List image', CSCORE_NAME),
	            "param_name" => "crop_list_image",
	            "value" => array(
	                __("No", CSCORE_NAME) => '0',
	                __("Yes", CSCORE_NAME) => '1'
	            ),
	            "dependency" => array(
                    "element" => 'show_list_image',
                    "value" => array(
                        "1"
                    )
                ),
				"group" => "List Item",
	            "description" => __('Crop or not crop image on your Portfolio.', CSCORE_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __('Width list image', CSCORE_NAME),
	            "param_name" => "width_list_image",
	            "dependency" => array(
                    "element" => 'crop_list_image',
                    "value" => array(
                        "1"
                    )
                ),
				"group" => "List Item",
	            "description" => __('Enter the width of image. Default: 340.', CSCORE_NAME)
	        ),
	        array(
	            "type" => "textfield",
	            "heading" => __('Height list image', CSCORE_NAME),
	            "param_name" => "height_list_image",
	            "dependency" => array(
                    "element" => 'crop_list_image',
                    "value" => array(
                        "1"
                    )
                ),
				"group" => "List Item",
	            "description" => __('Enter the height of image. Default: 340.', CSCORE_NAME)
	        )	
		)
) );
endif;