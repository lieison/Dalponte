<?php
vc_map ( array (
		"name" => 'Video HTML5',
		"base" => "videohtml5",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "Video HTML5", CSCORE_NAME ),
		"params" => array (
			array (
				"type" => "dropdown",
				"heading" => __ ( 'Layout', CSCORE_NAME ),
				"param_name" => "layout",
				"value" => cscore_get_files_name_array("videohtml5"),
				"admin_label" => true
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Custom Class', CSCORE_NAME ),
				"param_name" => "el_class",
			),
			array (
				"type" => "attach_image",
				"class" => "",
				"heading" => __( "Video poster", CSCORE_NAME ),
				"param_name" => "poster",
				"value" => "",
				"group" =>"Image"
			),
			array (
				"type" => "dropdown",
				"heading" => __ ( 'Crop image', CSCORE_NAME ),
				"param_name" => "crop_image",
				"value" => array (
					__("No", CSCORE_NAME) => '0',
					__("Yes", CSCORE_NAME) => '1'

				),
				"description" => __ ( 'Crop or not crop image on your Post.', CSCORE_NAME ),
				"group" =>"Image"
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Width image', CSCORE_NAME ),
				"param_name" => "width_image",
				"description" => __ ( 'Enter the width of image. Default: 360.', CSCORE_NAME ),
				"group" =>"Image"
			),
			array (
				"type" => "textfield",
				"heading" => __ ( 'Height image', CSCORE_NAME ),
				"param_name" => "height_image",
				"description" => __ ( 'Enter the height of image. Default: 240.', CSCORE_NAME ),
				"group" =>"Image"
			),
			array (
				"type" => "colorpicker",
				"heading" => __ ( 'Overlay Background color on the video', CSCORE_NAME ),
				"param_name" => "bg_video_color",
				"description" => __ ( '', CSCORE_NAME ),
				"group" =>"Video"
			),
			array (
				"type" => "checkbox",
				"class" => "",
				"heading" => __( "Loop", CSCORE_NAME ),
				"param_name" => "loop",
				"value" => array (
						__( "Yes, please", CSCORE_NAME )  => true,
				),
				"group" =>"Video"
			),
			array (
				"type" => "checkbox",
				"class" => "",
				"heading" => __( "Autoplay", CSCORE_NAME ),
				"param_name" => "autoplay",
				"value" => array (
						__( "Yes, please", CSCORE_NAME )  => true,
				),
				"group" =>"Video"
			),
			array (
				"type" => "checkbox",
				"class" => "",
				"heading" => __( "Muted", CSCORE_NAME ),
				"param_name" => "muted",
				"value" => array (
						__( "Yes, please", CSCORE_NAME )  => true,
				),
				"group" =>"Video"
			),
			array (
				"type" => "checkbox",
				"class" => "",
				"heading" => __( "Controls", CSCORE_NAME ),
				"param_name" => "controls",
				"value" => array (
						__( "Yes, please", CSCORE_NAME )  => true,
				),
				"group" =>"Video"
			),
			array (
				"type" => "checkbox",
				"class" => "",
				"heading" => __( "Show Button Play", CSCORE_NAME ),
				"param_name" => "show_btn",
				"value" => array (
						__( "Yes, please", CSCORE_NAME )  => true,
				),
				"group" =>"Video"
			),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon Button", CSCORE_NAME),
                "param_name" => "icon",
                "value" => "",
                "group" =>"Video"
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Text Button", CSCORE_NAME),
                "param_name" => "text",
                "value" => "",
                "group" =>"Video"
            ),
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Type Button", CSCORE_NAME),
                "param_name" => "style",
                "value" => array(

					"Circle" => 'circle',
					"Square" => 'square',
					"Icon Only"	=> 'icon',
				),
				"group" =>"Video"
            ),
			array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Size Button", CSCORE_NAME),
                "param_name" => "size",
                "value" => array(
					"Normal" => 'normal',
					"Minimum" => 'minimum',
					"Large" => 'large',
				),
				"group" =>"Video"
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (mp4)", CSCORE_NAME),
                "param_name" => "bg_video_src_mp4",
                "value" => "",
                "group" =>"Video"
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (ogv)", CSCORE_NAME),
                "param_name" => "bg_video_src_ogv",
                "value" => "",
                "group" =>"Video"
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (webm)", CSCORE_NAME),
                "param_name" => "bg_video_src_webm",
                "value" => "",
                "group" =>"Video"
            ),
			array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => __("Content", CSCORE_NAME),
                "param_name" => "content",
                "value" => "",
                "group" =>"Content"
            ),
		)
) );