<?php
vc_map ( array (
		"name" => 'Drop Caps',
		"base" => "cs-dropcap",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ('Drop Caps',CSCORE_NAME),
		"params" => array (
			array (
					"type" => "textfield",
					"heading" => __ ( 'Icon', CSCORE_NAME ),
					"param_name" => "icon",
					"value" => '',
					"description" => 'You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart',
			),
        	array (
				"type" => "dropdown",
				"heading" => __ ( "Layout", CSCORE_NAME ),
				"param_name" => "layout",
				"value" => cscore_get_files_name_array("dropcap"),
				"description" => __('Select layout style.',CSCORE_NAME),
				"admin_label" => true,
			),
			array (
					"type" => "colorpicker",
					"heading" => __ ( 'Color first text and icon', CSCORE_NAME ),
					"param_name" => "color_first_text",
					"value" => ''
			),
			array (
					"type" => "colorpicker",
					"heading" => __ ( 'Background color first text and icon', CSCORE_NAME ),
					"param_name" => "background_buttom",
					"value" => ''
			),
			array (
					"type" => "colorpicker",
					"heading" => __ ( 'Border color first text and icon', CSCORE_NAME ),
					"param_name" => "border_color",
					"value" => ''
			),
			array (
					"type" => "textfield",
					"heading" => __ ( 'Border Radius', CSCORE_NAME ),
					"param_name" => "border_radius",
					"value" => '',
					"description" => '',
			),
			array (
					"type" => "colorpicker",
					"heading" => __ ( 'Content color', CSCORE_NAME ),
					"param_name" => "content_color",
					"value" => ''
			),
			array (
					"type" => "textarea_html",
					"heading" => __ ( 'Content', CSCORE_NAME ),
					"param_name" => "content",
					"value" => ''
			),
			array (
				"type" => "textfield",
				"heading" => __ ( "Extra class name", "js_composer" ),
				"param_name" => "el_class",
				"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
			)
		)
) );