<?php
vc_map(array(
		"name" => 'CS Social',
		"base" => "cs-social",
		"icon" => "cs_icon_for_vc",
		"category" => __( 'CS Hero', CSCORE_NAME ),
		"description" => __( 'Social icon', CSCORE_NAME ),
		"params" => array(
			array(
					"type" => "textfield",
					"heading" => __( 'Heading', CSCORE_NAME ),
					"param_name" => "title",
			),
			array(
					"type" => "dropdown",
					"heading" => __( "Heading size", CSCORE_NAME ),
					"param_name" => "heading_size",
					"value" => array(
							"Default" => "",
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
					"type" => "colorpicker",
					"heading" => __( 'Heading Color', CSCORE_NAME ),
					"param_name" => "title_color",
			),
			array(
		        "type" => "dropdown",
		        "class" => "",
		        "heading" => __( "Heading Align", CSCORE_NAME ),
		        "param_name" => "title_align",
		        "value" => array(
		            "Left" => "text-left",
		            "Center" => "text-center",
		            "Right" => "text-right"
		        ),
		        "description" => __("Select align for Title", CSCORE_NAME)
		    ),
		    array(
		        "type" => "dropdown",
		        "class" => "",
		        "heading" => __( "Heading Style", CSCORE_NAME ),
		        "param_name" => "heading_style",
		        "value" => array(
		            "Default" => "",
		            "Border Bottom" => "border-bottom",
		            "Overline" => "overline",
		            "Underline" => "underline",
		            "Line Through" => "line-through",
                	"Dotted Bottom" =>"dotted-bottom"
		        ),
		        "description" => __("Select heading style", CSCORE_NAME)
		    ),
			array(
					"type" => "textfield",
					"heading" => __( 'Description', CSCORE_NAME ),
					"param_name" => "description",
			),

			array(
					"type" => "dropdown",
					"heading" => __( 'Layout', CSCORE_NAME ),
					"param_name" => "layout",
					"value" => cscore_get_files_name_array("social"),
			),
			array(
					"type" => "textfield",
					"heading" => __( "Extra class name", CSCORE_NAME ),
					"param_name" => "el_class",
					"description" => __( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME )
			),
			array(
					"type" => "textfield",
					"heading" => __( "Icon size", CSCORE_NAME ),
					"param_name" => "icon_size",
					"group" => "Icon",
					"description" => __( 'input size for icon social. Example: 15px', CSCORE_NAME )
			),
			array(
					"type" => "colorpicker",
					"heading" => __( 'Icon Color', CSCORE_NAME ),
					"param_name" => "icon_color",
					"group" => "Icon",
			),
			array(
					"type" => "colorpicker",
					"heading" => __( 'Icon Hover Color', CSCORE_NAME ),
					"param_name" => "icon_hover_color",
					"group" => "Icon",
			),
			array(
					"type" => "colorpicker",
					"heading" => __( 'Icon Background Color', CSCORE_NAME ),
					"param_name" => "icon_bg_color",
					"group" => "Icon",
			),
			array(
					"type" => "colorpicker",
					"heading" => __( 'Icon Background Hover Color', CSCORE_NAME ),
					"param_name" => "icon_bg_hover_color",
					"group" => "Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon Height', CSCORE_NAME ),
					"param_name" => "icon_height",
					"group" => "Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon Width', CSCORE_NAME ),
					"param_name" => "icon_width",
					"group" => "Icon",
			),
			array(
					"type" => "colorpicker",
					"heading" => __( 'Border Color', CSCORE_NAME ),
					"param_name" => "border_color",
					"group" => "Border",
			),
			array(
					"type" => "colorpicker",
					"heading" => __( 'Border Hover Color', CSCORE_NAME ),
					"param_name" => "border_hover_color",
					"group" => "Border",
			),
			array(
				"type" => "textfield",
				"heading" => __ ( 'Border Width', CSCORE_NAME ),
				"param_name" => "border_width",
				"group" => "Border",
				"description" => 'px,em,...'
			),
			array(
				"type" => "dropdown",
				"heading" => __ ( "Border Style", CSCORE_NAME ),
				"param_name" => "border_style",
				"group" => "Border",
				"value" => array (
						"None" => "none",
						"Solid" => "solid",
						"Dotted" => "dotted",
						"Dashed" => "dashed",
						"Double" => "double"
				),
				"group" => "Border",
				"description" => 'Select your style of border.'
			),
			array(
			    "type" => "textfield",
			    "heading" => __ ( 'Border Radius', CSCORE_NAME ),
			    "param_name" => "border_radius",
			    "group" => "Border",
			    "description" => 'px,%,...'
			),
			array(
			    "type" => "textfield",
			    "heading" => __ ( 'Social item margin', CSCORE_NAME ),
			    "param_name" => "social_item_margin",
			    "description" => 'px,%,...'
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 1', CSCORE_NAME ),
					"param_name" => "icon1",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 1 link', CSCORE_NAME ),
					"param_name" => "icon1_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 2', CSCORE_NAME ),
					"param_name" => "icon2",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 2 link', CSCORE_NAME ),
					"param_name" => "icon2_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 3', CSCORE_NAME ),
					"param_name" => "icon3",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 3 link', CSCORE_NAME ),
					"param_name" => "icon3_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 4', CSCORE_NAME ),
					"param_name" => "icon4",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 4 link', CSCORE_NAME ),
					"param_name" => "icon4_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 5', CSCORE_NAME ),
					"param_name" => "icon5",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 5 link', CSCORE_NAME ),
					"param_name" => "icon5_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 6', CSCORE_NAME ),
					"param_name" => "icon6",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 6 link', CSCORE_NAME ),
					"param_name" => "icon6_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 7', CSCORE_NAME ),
					"param_name" => "icon7",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 7 link', CSCORE_NAME ),
					"param_name" => "icon7_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 8', CSCORE_NAME ),
					"param_name" => "icon8",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 8 link', CSCORE_NAME ),
					"param_name" => "icon8_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 9', CSCORE_NAME ),
					"param_name" => "icon9",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 9 link', CSCORE_NAME ),
					"param_name" => "icon9_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 10', CSCORE_NAME ),
					"param_name" => "icon10",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 10 link', CSCORE_NAME ),
					"param_name" => "icon10_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 11', CSCORE_NAME ),
					"param_name" => "icon11",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 11 link', CSCORE_NAME ),
					"param_name" => "icon11_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 12', CSCORE_NAME ),
					"param_name" => "icon12",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 12 link', CSCORE_NAME ),
					"param_name" => "icon12_link",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 13', CSCORE_NAME ),
					"param_name" => "icon13",
					"group" => "Link Icon",
			),
			array(
					"type" => "textfield",
					"heading" => __( 'Icon 13 link', CSCORE_NAME ),
					"param_name" => "icon13_link",
					"group" => "Link Icon",
			)
		)
));