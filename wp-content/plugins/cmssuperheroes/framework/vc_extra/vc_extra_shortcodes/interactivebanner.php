<?php
vc_map ( array (
		"name" => 'Interactive Banner',
		"base" => "cs-interactive-banner",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __('Interactive Banner', CSCORE_NAME),
		"params" => array (
				array (
						"type" => "textfield",
						"heading" => __ ( 'Title', CSCORE_NAME ),
						"param_name" => "title",
						"description" => ''
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
						"description" => __('Select your heading size for title.', CSCORE_NAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Add link title', CSCORE_NAME ),
						"param_name" => "link_title",
						"value" => array (
								__ ( "Yes, please", CSCORE_NAME ) => true
						),
						"description" => __ ( 'Add link to title.', CSCORE_NAME )
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Title  Color", CSCORE_NAME),
					"param_name" => "title_color",
					"value" => "",
					"description" => ""
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Icons', CSCORE_NAME ),
						"param_name" => "icon_title",
						"description" => __('You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart', CSCORE_NAME )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Add link Icon', CSCORE_NAME ),
						"param_name" => "link_icon",
						"value" => array (
								__ ( "Yes, please", CSCORE_NAME ) => true
						),
						"description" => __ ( 'Add link to Icon.', CSCORE_NAME )
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Icon  Color", CSCORE_NAME),
					"param_name" => "icon_color",
					"value" => "",
					"description" => ""
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Icon background Color", CSCORE_NAME),
					"param_name" => "bg_icon_color",
					"value" => "",
					"description" => ""
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Icons size', CSCORE_NAME ),
						"param_name" => "icon_size",
						"description" => __('You can fill icon size example here: 30px', CSCORE_NAME )
				),
				array (
						"type" => "textarea",
						"heading" => __ ( 'Short Description', CSCORE_NAME ),
						"param_name" => 'short_description',
						"value" => '',
						"description" => ''
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("short description Color", CSCORE_NAME),
					"param_name" => "short_description_color",
					"value" => "",
					"description" => ""
				),
				array (
						"type" => "textarea",
						"heading" => __ ( 'Full Description', CSCORE_NAME ),
						"param_name" => 'full_description',
						"value" => '',
						"description" => ''
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Full description Color", CSCORE_NAME),
					"param_name" => "full_description_color",
					"value" => "",
					"description" => ""
				),
				array (
						"type" => "attach_image",
						"heading" => __ ( 'Image', CSCORE_NAME ),
						"param_name" => "image",
						"description" => ''
				),
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __("Background overlay", CSCORE_NAME),
					"param_name" => "overlay",
					"value" => "",
					"description" => ""
				),
				array (
					"type" => "colorpicker",
					"heading" => __ ( 'Background Overlay Hover', CSCORE_NAME ),
					"param_name" => "overlay_hover",
					"value" => "",
					"description" => ""
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Crop image', CSCORE_NAME ),
						"param_name" => "crop_image",
						"value" => array (
								__ ( "Yes, please", CSCORE_NAME ) => true
						),
						"description" => __ ( 'Crop or not crop image on your Post.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width image', CSCORE_NAME ),
						"param_name" => "width_image",
						"description" => __ ( 'Enter the width of image. Default: 300.', CSCORE_NAME )
				),

				array (
						"type" => "textfield",
						"heading" => __ ( 'Height image', CSCORE_NAME ),
						"param_name" => "height_image",
						"description" => __ ( 'Enter the height of image. Default: 200.', CSCORE_NAME )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Readmore Text', CSCORE_NAME ),
						"param_name" => "show_more",
						"description" => ''
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Link', CSCORE_NAME ),
						"param_name" => "link_show_more",
						"description" => __('Fill URL if you want to show read more link.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( "Style", CSCORE_NAME ),
						"param_name" => "style",
						"value" => array (
								"Style 1" => "style1",
								"Style 2" => "style2",
								"Style 3" => "style3",
								"Style 4" => "style4",
								"Style 5" => "style5",
								"Style 6" => "style6"
						),
						"description" => __('Select your style of interactive banner.', CSCORE_NAME )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( "animate type", CSCORE_NAME ),
						"param_name" => "interactive_animate_type",
						"value" => array (
								"None" => "none",
								"Scale up" => "scale-up",
								"Fade in" => "fade-in",
								"Right to left" => "right-to-left",
								"Left to right" => "left-to-right",
								"Top to bottom" => "top-to-bottom",
								"Bottom to top" => "bottom-to-top"
						),
						"description" => __('Select your animate type of icon.', CSCORE_NAME )
				),

				array (
						"type" => "textfield",
						"heading" => __ ( 'Custom Class', CSCORE_NAME ),
						"param_name" => "custom_class",
						"description" => ''
				)
		)
) );