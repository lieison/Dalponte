<?php
vc_map ( array (
		"name" => 'Full Boxes',
		"base" => "cs-full-box",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "Full Box & 15 styles hover", CSCORE_NAME ),
		"params" => array (
			array (
				"type" => "textfield",
				"heading" => __ ( 'Title', CSCORE_NAME ),
				"param_name" => "title",
				"holder"=> "div",
				"group" => "General"
			),
			array (
				"type" => "dropdown",
				"heading" => __ ( "Heading size", CSCORE_NAME ),
				"param_name" => "heading_size",
				"value" => array (
						"Heading 1" => "h1",
						"Heading 2" => "h2",
						"Heading 3" => "h3",
						"Heading 4" => "h4",
						"Heading 5" => "h5",
						"Heading 6" => "h6"
				),
				"description" => 'Select your heading size for title.',
				"group" => "General"
			),
			array (
				"type" => "colorpicker",
				"heading" => __ ( 'Title color', CSCORE_NAME ),
				"param_name" => "title_color",
				"group" => "General"
			),
			array (
				"type" => "attach_image",
				"heading" => __ ( 'Image', CSCORE_NAME ),
				"param_name" => "image",
				"group" => "Content Option"
			),
			array (
				"type" => "checkbox",
				"heading" => __ ( 'Crop image', CSCORE_NAME ),
				"param_name" => "crop_image",
				"value" => array (
					__ ( "Yes, please", CSCORE_NAME ) => true
				),
				"description" => __ ( 'Crop or not crop image on your Full Box.', CSCORE_NAME ),
				"group" => "Content Option"
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Width image', CSCORE_NAME ),
				"param_name" => "width_image",
				"description" => __ ( 'Enter the width of image. Default: 300', CSCORE_NAME ),
				"group" => "Content Option"
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Height image', CSCORE_NAME ),
				"param_name" => "height_image",
				"description" => __ ( 'Enter the height of image. Default: 200', CSCORE_NAME ),
				"group" => "Content Option"
			),
			array (
				"type" => "textarea",
				"heading" => __ ( 'Content text', CSCORE_NAME ),
				"param_name" => 'content',
				"value" => '',
				"group" => "Content Option"
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Except length', CSCORE_NAME ),
				"param_name" => "content_limit",
				"group" => "Content Option"
			),
			array (
				"type" => "colorpicker",
				"heading" => __ ( 'Content font color', CSCORE_NAME ),
				"param_name" => "content_color",
				"group" => "Content Option"
			),

			array (
				"type" => "dropdown",
				"heading" => __ ( "Layout", CSCORE_NAME ),
				"param_name" => "style",
				"value" => array (
						"Lily" => "lily",
						"Sadie" => "sadie",
						"Honey" => "honey",
						"Layla" => "layla",
						"Zoe" => "zoe",
						"Oscar" => "oscar",
						"Marley" => "marley",
						"Ruby" => "ruby",
						"Roxy" => "roxy",
						"Bubba" => "bubba",
						"Romeo" => "romeo",
						"Dexter" => "dexter",
						"Sarah" => "sarah",
						"Chico" => "chico",
						"Milo" => "milo",
						"Triangle Top" => 'triangle-top',
						"Triangle Bottom" => 'triangle-bottom',
						"Simple" => 'simple'
				),
				"description" => 'Select your layout.',
				"admin_label" => true,
				"group" => "Layout Option"
			),

			array (
				"type" => "textfield",
				"heading" => __ ( 'Read more link', CSCORE_NAME ),
				"param_name" => "link",
				"group" => "Extra Option"
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Custom Class', CSCORE_NAME ),
				"param_name" => "custom_class",
				"group" => "Extra Option"
			)
		)
) );