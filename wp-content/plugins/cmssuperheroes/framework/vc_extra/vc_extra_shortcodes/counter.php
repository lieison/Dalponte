<?php
vc_map ( array (
		"name" => 'Counter',
		"base" => "cshero-counter",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "Zero Counter & Random Counter", CSCORE_NAME ),
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( 'Heading', CSCORE_NAME ),
				"param_name" => "heading",
			),
			array(
			    "type" => "dropdown",
			    "heading" => __("Heading size", CSCORE_NAME),
			    "param_name" => "heading_size",
			    "value" => array(
			    	"Default" => "h4",
			        "Heading 1" => "h1",
			        "Heading 2" => "h2",
			        "Heading 3" => "h3",
			        "Heading 4" => "h4",
			        "Heading 5" => "h5",
			        "Heading 6" => "h6",
			        "Div" 		=> "div",
			    ),
			    "description" => 'Select your heading size for title. Default is H4'
			),
			array(
			    "type" => "colorpicker",
			    "heading" => __('Heading Color', CSCORE_NAME),
			    "param_name" => "heading_color",
			),
			array (
		        "type" => "dropdown",
		        "class" => "",
		        "heading" => __ ( "Heading Align", CSCORE_NAME ),
		        "param_name" => "heading_align",
		        "value" => array (
		            "Left" => "text-left",
					"Right" => "text-right",
					"Center" => "text-center"
		        ),
		        "description" => __("Select align for Title", CSCORE_NAME)
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
		        "description" => __("Select heading style", CSCORE_NAME)
		    ),

			array (
				"type" => "dropdown",
				"class" => "",
				"heading" => __ ( "Counter Type", CSCORE_NAME ),
				"param_name" => "type",
				"value" => array (
					"Zero Counter" => "zero",
					"Random Counter" => "random"
				),
				"group" => "Counter config"
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Digit', CSCORE_NAME ),
				"param_name" => "digit",
				"value" => '',
				"group" => "Counter config"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Digit Prefix', CSCORE_NAME ),
			    "param_name" => "digit_prefix",
			    "description" => __('Prefix for digit', CSCORE_NAME),
				"group" => "Counter config"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Digit Suffix', CSCORE_NAME ),
			    "param_name" => "digit_suffix",
			    "description" => __('Suffix for digit', CSCORE_NAME),
				"group" => "Counter config"
			),
			array(
			    "type" => "dropdown",
			    "heading" => __("Digit Heading Type", CSCORE_NAME),
			    "param_name" => "digit_heading_size",
			    "value" => array(
			    	"Default" => "div",
			        "Heading 1" => "h1",
			        "Heading 2" => "h2",
			        "Heading 3" => "h3",
			        "Heading 4" => "h4",
			        "Heading 5" => "h5",
			        "Heading 6" => "h6",
			        "Div" 		=> "div",
			    ),
			    "group" => "Counter config",
			    "description" => 'Select your heading size for title. Default is DIV'
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Digit Font Size (px)', CSCORE_NAME ),
				"param_name" => "digit_font_size",
				"value" => '',
				"group" => "Counter config"
			),
			array (
				"type" => "colorpicker",
				"class" => "",
				"heading" => __ ( "Digit Font Color", CSCORE_NAME ),
				"param_name" => "digit_font_color",
				"value" => "",
				"group" => "Counter config"
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Digit Margin', CSCORE_NAME ),
				"param_name" => "digit_margin",
				"value" => '',
				"group" => "Counter config"
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Text', CSCORE_NAME ),
					"param_name" => "text",
					"value" => '',
					"admin_label" => true,
				"group" => "Counter config"
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Text Size (px)', CSCORE_NAME ),
					"param_name" => "text_size",
					"value" => '',
				"group" => "Counter config"
			),
			array (
			    "type" => "colorpicker",
			    "class" => "",
			    "heading" => __ ( "Text color", CSCORE_NAME ),
			    "param_name" => "text_color",
			    "value" => "",
				"group" => "Counter config"
			),
			array (
		        "type" => "dropdown",
		        "class" => "",
		        "heading" => __ ( "Text Style", CSCORE_NAME ),
		        "param_name" => "text_style",
		        "value" => array (
		            "Default" => "none",
		            "Uppercase" => "uppercase",
		            "Lowercase" => "lowercase",
		            "Capitalize" => "capitalize"
		        ),
		        "description" => __("Select text style", CSCORE_NAME),
				"group" => "Counter config"
		    ),

			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Icon', CSCORE_NAME ),
			    "param_name" => "icon",
			    "value" => '',
			    "description" => 'From http://fortawesome.github.io, http://ionicons.com',
				"group" => "Counter icon"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Icon Size', CSCORE_NAME ),
			    "param_name" => "icon_size",
			    "value" => '',
			    "description" => 'px, %...',
				"group" => "Counter icon"
			),
			array (
			    "type" => "colorpicker",
			    "class" => "",
			    "heading" => __ ( "Icon color", CSCORE_NAME ),
			    "param_name" => "icon_color",
			    "value" => "",
				"group" => "Counter icon"
			),

			array (
				"type" => "dropdown",
				"class" => "",
				"heading" => __ ( "Content Align", CSCORE_NAME ),
				"param_name" => "align",
				"value" => array (
					"Left" => "text-left",
					"Right" => "text-right",
					"Center" => "text-center"
				),
				"group" => "Layout"
			),
			array (
				"type" => "dropdown",
				"class" => "",
				"heading" => __ ( "Content Border Box", CSCORE_NAME ),
				"param_name" => "box",
				"value" => array (
					"No" => "no",
					"Yes" => "yes"
				),
				"group" => "Layout"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Border Width', CSCORE_NAME ),
			    "param_name" => "box_width",
			    "value" => '',
			    "description" => 'px, %...',
				"group" => "Layout"
			),
			array (
			    "type" => "dropdown",
			    "class" => "",
			    "heading" => __ ( 'Border Style', CSCORE_NAME ),
			    "param_name" => "box_style",
			    "value" => array (
			    	"None" => '',
					"Solid" => "solid",
					"Dotted" => "dotted",
					"Dashed" => "dashed",
					"Double" => "double"
				),
			    "description" => '',
				"group" => "Layout"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Border Radius', CSCORE_NAME ),
			    "param_name" => "box_radius",
			    "value" => '',
			    "description" => 'px, %...',
				"group" => "Layout"
			),
			array (
			    "type" => "colorpicker",
			    "class" => "",
			    "heading" => __ ( "Border color", CSCORE_NAME ),
			    "param_name" => "border_color",
			    "value" => "",
				"group" => "Layout"
			),
			array (
			    "type" => "colorpicker",
			    "class" => "",
			    "heading" => __ ( "Border color hover", CSCORE_NAME ),
			    "param_name" => "border_color_hover",
			    "value" => "",
				"group" => "Layout"
			),
			array (
			    "type" => "colorpicker",
			    "class" => "",
			    "heading" => __ ( "Background", CSCORE_NAME ),
			    "param_name" => "background_color",
			    "value" => "",
				"group" => "Layout"
			),
			array (
			    "type" => "colorpicker",
			    "class" => "",
			    "heading" => __ ( "Background hover", CSCORE_NAME ),
			    "param_name" => "background_color_hover",
			    "value" => "",
				"group" => "Layout"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Padding Box', CSCORE_NAME ),
			    "param_name" => "padding_box",
			    "value" => '',
			    "description" => 'px, %...',
				"group" => "Layout"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Box Width', CSCORE_NAME ),
			    "param_name" => "box_counter_width",
			    "value" => '',
			    "description" => 'px, %...',
				"group" => "Layout"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Box Height', CSCORE_NAME ),
			    "param_name" => "box_counter_height",
			    "value" => '',
			    "description" => 'px, %...',
				"group" => "Layout"
			),
			array (
			    "type" => "dropdown",
			    "class" => "",
			    "heading" => __ ( "Layout", CSCORE_NAME ),
			    "param_name" => "layout",
			    "value" =>cscore_get_files_name_array("counter"),
				"group" => "Layout"
			),
			array (
			    "type" => "textfield",
			    "heading" => __ ( 'Extra Class Name', CSCORE_NAME ),
			    "param_name" => "extra_class",
			    "value" => '',
			    "description" => 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.',
			    "group" => "Extra"
			)
		)
) );