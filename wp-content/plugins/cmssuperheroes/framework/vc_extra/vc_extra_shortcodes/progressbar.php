<?php
vc_map ( array (
		"name" => "Progress Bar",
		"base" => "cshero-progressbar",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __('Progress (Horizontal & Vertical)',CSCORE_NAME),
		"params" => array (
				array (
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
					"heading" => __ ( "Title", CSCORE_NAME ),
					"param_name" => "title",
					"description" => "",
					"group" => "General"
				),
                array (
                    "type" => "dropdown",
                    "heading" => __ ( 'Show Title', CSCORE_NAME ),
                    "param_name" => "show_title",
                    "value" => array (
                        __("Yes", CSCORE_NAME) => '1',
                		__("No", CSCORE_NAME) => '0'
                    ),
                    "description" => '',
					"group" => "General"
                ),
                array (
                    "type" => "colorpicker",
                    "heading" => __ ( 'Title Color', CSCORE_NAME ),
                    "param_name" => "title_color",
                    "description" => '',
					"group" => "General",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
                ),
				array (
					"type" => "dropdown",
					"heading" => __ ( "Title size", CSCORE_NAME ),
					"param_name" => "title_size",
					"value" => array (
							"Heading 1" => "h1",
							"Heading 2" => "h2",
							"Heading 3" => "h3",
							"Heading 4" => "h4",
							"Heading 5" => "h5",
							"Heading 6" => "h6",
							"Span" => 'span'
					),
					"description" => __('Select your heading size for title.',CSCORE_NAME),
					"group" => "General",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array (
					"type" => "dropdown",
					"heading" => __ ( 'Title Font format', CSCORE_NAME ),
					"param_name" => "title_font_format",
					"value" => array (
						__("Normal 400", CSCORE_NAME) => '400',
						__("Thin 100", CSCORE_NAME) => '100',
						__("Light 200", CSCORE_NAME) => '200',
						__("Book 300", CSCORE_NAME) => '300',
						__("Semi-Bold 600", CSCORE_NAME) => '600',
            			__("Bold 700", CSCORE_NAME) => '700',
            			__("Extra-Bold 800", CSCORE_NAME) => '800',
            			__("Normal 400 Italic", CSCORE_NAME) => '400italic',
            			__("Thin 100 Italic", CSCORE_NAME) => '100italic',
						__("Light 200 Italic", CSCORE_NAME) => '200italic',
            			__("Book 300 Italic", CSCORE_NAME) => '300italic',
            			__("Normal 400 Italic", CSCORE_NAME) => '400italic',
            			__("Simi-Bold 600 Italic", CSCORE_NAME) => '600italic',
            			__("Bold 700 Italic", CSCORE_NAME) => '700italic',
            			__("Extra-Bold 800 Italic",CSCORE_NAME) => '800italic'
					),
					"group" => "General",
					"description" => __ ( 'Choose title font format', CSCORE_NAME ),
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array (
					"type" => "dropdown",
					"heading" => __ ( 'Title Text Style', CSCORE_NAME ),
					"param_name" => "title_font_style",
					"value" => array (
						"Default" => "initial",
						"None" 	=> "none",
			            "Uppercase" => "uppercase",
			            "Lowercase" => "lowercase",
			            "Capitalize" => "capitalize"
					),
					"group" => "General",
					"description" => __ ( 'Choose title font style', CSCORE_NAME ),
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
				),
				array (
					"type" => "textfield",
					"heading" => __ ( 'Title Margin', CSCORE_NAME ),
					"param_name" => "title_margin",
					"description" => 'EX: top right bottom left, 5px 5px 5px 5px',
					"group" => "General",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
				),
                array (
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __ ( "Title Icon", CSCORE_NAME ),
                    "param_name" => "icon",
                    "description" => "",
					"group" => "General",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array (
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __ ( "Icon Size", CSCORE_NAME ),
                    "param_name" => "icon_size",
                    "description" => "Size of icon. Ex: 24px",
					"group" => "General",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
                ),
                array (
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => __ ( "Icon Color", CSCORE_NAME ),
                    "param_name" => "icon_color",
                    "description" => "",
					"group" => "General",
					"dependency" => array(
                        "element" => 'show_title',
                        "value" => array(
                            "1"
                        )
                    )
                ),
				array (
					"type" => "textfield",
					"class" => "",
					"heading" => __ ( "Description", CSCORE_NAME ),
					"param_name" => "desc",
					"description" => "",
					"group" => "General"
				),
				array (
					"type" => "colorpicker",
					"heading" => __ ( 'Description Color', CSCORE_NAME ),
					"param_name" => "desc_color",
					"description" => '',
					"group" => "General"
				),

                array (
					"type" => "checkbox",
					"heading" => __ ( 'Show Value', CSCORE_NAME ),
					"param_name" => "show_value",
					"value" => array (
							"Yes" => "true"
					),
					"description" => '',
					"group" => "Progress Bar"
				),
				array (
					"type" => "textfield",
					"class" => "",
					"heading" => __ ( "Value", CSCORE_NAME ),
					"param_name" => "value",
					'admin_label'=>true,
					"description" => "Number only, ex: 60",
					"group" => "Progress Bar"
				),
				array (
					"type" => "textfield",
					"class" => "",
					"heading" => __ ( "Label value", CSCORE_NAME ),
					"param_name" => "label_value",
					"description" => "",
					"group" => "Progress Bar"
				),
				array (
					"type" => "colorpicker",
					"heading" => __ ( 'Color value', CSCORE_NAME ),
					"param_name" => "color_value",
					"description" => __('Color for value. Default is #e9e9e9',CSCORE_NAME),
					"group" => "Progress Bar"
				),
				array (
					"type" => "colorpicker",
					"heading" => __ ( 'Background Color Bar', CSCORE_NAME ),
					"param_name" => "bg_color",
					"description" => __('Background color for wrapper bar. Default is #e9e9e9',CSCORE_NAME),
					"group" => "Progress Bar"
				),
				array (
					"type" => "colorpicker",
					"heading" => __ ( 'Background color for value', CSCORE_NAME ),
					"param_name" => "color",
					"description" => __('Background color for value.',CSCORE_NAME),
					"group" => "Progress Bar"
				),
				array (
					"type" => "checkbox",
					"heading" => __ ( 'Vertical', CSCORE_NAME ),
					"param_name" => "vertical",
					"value" => array (
							"Yes" => "false"
					),
					"description" => '',
					"group" => "Progress Bar"
				),
				array (
					"type" => "checkbox",
					"heading" => __ ( 'Striped', CSCORE_NAME ),
					"param_name" => "striped",
					"value" => array (
							"Yes" => "false"
					),
					"description" => '',
					"group" => "Progress Bar"
				),
				array (
					"type" => "checkbox",
					"heading" => __ ( 'Animated', CSCORE_NAME ),
					"param_name" => "animated",
					"value" => array (
							"Yes" => "true"
					),
					"description" => __('Animate for Stripe',CSCORE_NAME),
					"group" => "Progress Bar"
				),
				array (
					"type" => "checkbox",
					"heading" => __ ( 'Process Start From Right', CSCORE_NAME ),
					"param_name" => "right",
					"value" => array (
							"Yes" => "true"
					),
					"description" => 'Default start from left',
					"group" => "Progress Bar"
				),
				
				array (
					"type" => "textfield",
					"class" => "",
					"heading" => __ ( "Width", CSCORE_NAME ),
					"param_name" => "width",
					"description" => "in px",
					"group" => "Progress Bar"
				),
				array (
					"type" => "textfield",
					"class" => "",
					"heading" => __ ( "Height", CSCORE_NAME ),
					"param_name" => "height",
					"description" => "in px",
					"group" => "Progress Bar"
				),
				array (
					"type" => "dropdown",
					"heading" => __ ( "Border Style", CSCORE_NAME ),
					"param_name" => "border_style",
					"value" => array (
							"None" => "",
							"Solid" => "solid",
							"Dotted" => "dotted",
							"Dashed" => "dashed",
							"Double" => "double"
					),
					"description" => 'Select your style of border.',
					"group" => "Progress Bar"
				),
				array (
					"type" => "textfield",
					"heading" => __ ( 'Border Width', CSCORE_NAME ),
					"param_name" => "border_width",
					"description" => 'px,em,...',
					"group" => "Progress Bar"
				),
				array (
					"type" => "colorpicker",
					"heading" => __ ( 'Border Color', CSCORE_NAME ),
					"param_name" => "border_color",
					"description" => '',
					"group" => "Progress Bar"
				),
				array (
				    "type" => "textfield",
				    "heading" => __ ( 'Border Radius', CSCORE_NAME ),
				    "param_name" => "border_radius",
				    "description" => 'px,%,...',
					"group" => "Progress Bar"
				),

				array (
					"type" => "dropdown",
					"heading" => __ ( "Layout", CSCORE_NAME ),
					"param_name" => "layout",
					"value" => cscore_get_files_name_array("progressbar"),
					"description" => __('Select layout style.',CSCORE_NAME),
					"admin_label" => true,
					"group" => "Layout Option"
				),
                array (
                    "type" => "textfield",
                    "heading" => __ ( "Extra class name", CSCORE_NAME ),
                    "param_name" => "el_class",
                    "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME ),
					"group" => "Layout Option"
                ),
		)
) );