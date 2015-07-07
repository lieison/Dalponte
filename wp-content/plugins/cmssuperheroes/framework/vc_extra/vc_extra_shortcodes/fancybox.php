<?php
vc_map ( array (
	"name" => 'Fancy Icon Boxes',
	"base" => "cshero-fancy-box",
	"icon" => "cs_icon_for_vc",
	"category" => __ ( 'CS Hero', CSCORE_NAME ),
	"description" => __ ('Icon Boxes',CSCORE_NAME),
	"params" => array (
		array (
				"type" => "textfield",
				"heading" => __ ( 'Title', CSCORE_NAME ),
				"param_name" => "title",
				"holder" => "div"
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( "Title size", CSCORE_NAME ),
				"param_name" => "heading_size",
				"value" => array (
						"H1" => "h1",
						"H2" => "h2",
						"H3" => "h3",
						"H4" => "h4",
						"H5" => "h5",
						"H6" => "h6",
						"Div" => "div",
				),
				"description" => 'Select your heading size for title.'
		),
		
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Title Color', CSCORE_NAME ),
				"param_name" => "title_color",
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Title Color Hover', CSCORE_NAME ),
				"param_name" => "title_color_hover",
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( 'Title Transform', CSCORE_NAME ),
				"param_name" => "title_transform",
				"value" => array (
						__ ( "Default", CSCORE_NAME ) => "inherit",
						__ ( "Uppercase", CSCORE_NAME ) => "uppercase",
						__ ( "Lowercase", CSCORE_NAME ) => "lowercase",
						__ ( "Capitalize", CSCORE_NAME ) => "capitalize",
				),
				"description" => __ ( 'Make title Uppercase or Lowercase or Inherit', CSCORE_NAME )
		),

		array (
				"type" => "textfield",
				"heading" => __ ( 'Title Margin', CSCORE_NAME ),
				"param_name" => "title_margin",
		),

		array (
				"type" => "dropdown",
				"heading" => __ ( 'Content Align', CSCORE_NAME ),
				"param_name" => "content_align",
				"value" => array (
						__ ( "Left", CSCORE_NAME ) => "text-left",
						__ ( "Center", CSCORE_NAME ) => "text-center",
						__ ( "Right", CSCORE_NAME ) => "text-right",
				),
				"description" => __ ( 'Make content align is: Left, Center, Right. Default is Center', CSCORE_NAME )
		),

		array (
				"type" => "textfield",
				"heading" => __ ( 'Icon', CSCORE_NAME ),
				"param_name" => "icon_title",
				"description" => 'You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart',
				"group" => "Icon",
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Icon Size', CSCORE_NAME ),
				"param_name" => "icon_size",
				"group" => "Icon",
				"description" => 'in px,%.... Default is 20px'
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Icon Color', CSCORE_NAME ),
				"param_name" => "icon_color",
				"group" => "Icon",
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Icon Color Hover', CSCORE_NAME ),
				"param_name" => "icon_color_hover",
				"group" => "Icon",
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Icon Width', CSCORE_NAME ),
				"param_name" => "icon_width",
				"group" => "Icon",
				"description" => 'px,em,...'
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Icon Height', CSCORE_NAME ),
				"param_name" => "icon_heigth",
				"group" => "Icon",
				"description" => 'px,em,...'
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Icon Backgroundc color', CSCORE_NAME ),
				"param_name" => "icon_bg_color",
				"group" => "Icon",
				"description" => 'Set Background color for icon'
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Icon Background Hover color', CSCORE_NAME ),
				"param_name" => "icon_bg_color_hover",
				"group" => "Icon",
				"description" => 'Set Background color for icon in hover state'
		),
       
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Border Color', CSCORE_NAME ),
				"param_name" => "border_color",
				"group" => "Border",
		),

		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Border Color Hover', CSCORE_NAME ),
				"param_name" => "border_color_hover",
				"group" => "Border",
		),
		
		array (
				"type" => "textfield",
				"heading" => __ ( 'Border Width', CSCORE_NAME ),
				"param_name" => "border_width",
				"group" => "Border",
				"description" => 'px,em,...'
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( "Border Style", CSCORE_NAME ),
				"param_name" => "border_style",
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
		array (
		    "type" => "textfield",
		    "heading" => __ ( 'Border Radius', CSCORE_NAME ),
		    "param_name" => "border_radius",
		    "group" => "Border",
		    "description" => 'px,%,...'
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( "Icon layout", CSCORE_NAME ),
				"param_name" => "layout",
				"value" =>cscore_get_files_name_array("fancybox"),
				"description" => 'Select your style of icon.',
				"holder"=>'div'
		),
		array (
			"type" => "dropdown",
			"heading" => __ ( "Icon hover style", CSCORE_NAME ),
			"param_name" => "icon_hover_style",
			"value" => array (
				"Style 1" => "style-1",
				"Style 2" => "style-2",
				"Style 3" => "style-3"
			),
			"description" => 'Hover style for icon.'
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( "Icon animate type", CSCORE_NAME ),
				"param_name" => "icon_animate_type",
				"value" => array (
						"None" => "none",
						"Scale up" => "scale-up",
						"Fade in" => "fade-in",
						"Right to left" => "right-to-left",
						"Left to right" => "left-to-right",
						"Top to bottom" => "top-to-bottom",
						"Bottom to top" => "bottom-to-top"
				),
				"description" => 'Select your animate type of icon.'
		),
		array (
				"type" => "checkbox",
				"heading" => __ ( 'Show icon link', CSCORE_NAME ),
				"param_name" => "show_icon_link",
				"value" => array (
						__ ( "Yes, please", CSCORE_NAME ) => true
				),
				"description" => __ ( 'Show or hide icon link.', CSCORE_NAME )
		),
        
		array (
				"type" => "attach_image",
				"heading" => __ ( 'Image', CSCORE_NAME ),
				"param_name" => "image",
				"group" => "Image",
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( 'Crop image', CSCORE_NAME ),
				"param_name" => "crop_image",
				"value" => array (
						"Yes"=>1,
						"No"=>0
				),
				"group" => "Image",
				"description" => __ ( 'Crop or not crop image on your Post.', CSCORE_NAME )
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Width image', CSCORE_NAME ),
				"param_name" => "width_image",
				"value" => '300',
				"group" => "Image",
				"description" => __ ( 'Enter the width of image. Default: 300.', CSCORE_NAME )
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Height image', CSCORE_NAME ),
				"param_name" => "height_image",
				"height" => '200',
				"group" => "Image",
				"description" => __ ( 'Enter the height of image. Default: 200.', CSCORE_NAME )
		),		
		array (
				"type" => "textarea_html",
				"heading" => __ ( 'Content', CSCORE_NAME ),
				"param_name" => 'content',
				"value" => '',
				"group" => "Content",
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Content Color', CSCORE_NAME ),
				"param_name" => "content_color",
				"group" => "Content",
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Content Color Hover', CSCORE_NAME ),
				"param_name" => "content_color_hover",
				"group" => "Content",
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Read More Link', CSCORE_NAME ),
				"param_name" => "link_show_more",
				"group" => "Content",
				"description" => 'Fill URL if you want to show read more link.'
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Read More Text', CSCORE_NAME ),
				"param_name" => "read_more",
				'value' => '',
				"group" => "Content",
				"description" => __ ( 'Optional link after post excerpts. Enter desired text for the link or for no link, leave blank or set to \"-1\".', CSCORE_NAME )
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Read Margin', CSCORE_NAME ),
				"param_name" => "read_more_margin",
				'value' => '',
				"group" => "Content",
		),
		array (
				"type" => "checkbox",
				"heading" => __ ( 'Read Button', CSCORE_NAME ),
				"param_name" => "read_btn",
				"value" => array (
						__ ( "Yes", CSCORE_NAME ) => true
				),
				"group" => "Content",
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( "Button Type", CSCORE_NAME ),
				"param_name" => "button_type",
				"value" => array (
						"Button Default" => "btn-default",
						"Button Primary" => "btn-primary"
				),
				"group" => "Content",
				"description" => 'Select your button type.'
		),
		array (
				"type" => "dropdown",
				"heading" => __ ( "Button Size", CSCORE_NAME ),
				"param_name" => "button_size",
				"value" => array (
						"Button Default" => "",
						"Button Large" => "btn-lg",
						"Button Medium" => "btn-md",
						"Button Small" => "btn-sm",
						"Button Mini" => "btn-xs"
				),
				"group" => "Content",
				"description" => 'Select your button size.'
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Custom class read more button', CSCORE_NAME ),
				"param_name" => "read_more_class",
				"group" => "Content",
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Box Background', CSCORE_NAME ),
				"param_name" => "box_bg",
				"value" =>'',
				"group" => "Extra",
				"description" => 'Choose Background color'
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Box Background Hover', CSCORE_NAME ),
				"param_name" => "box_bg_hover",
				"value" =>'',
				"group" => "Extra",
				"description" => 'Choose Background color'
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Box border', CSCORE_NAME ),
				"param_name" => "box_border",
				"value" =>'',
				"group" => "Extra",
				"description" => 'Choose Border color'
		),
		array (
				"type" => "colorpicker",
				"heading" => __ ( 'Box border hover', CSCORE_NAME ),
				"param_name" => "box_border_hover",
				"value" =>'',
				"group" => "Extra",
				"description" => 'Choose Border hover color'
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Box padding', CSCORE_NAME ),
				"param_name" => "box_padding",
				"value" =>'',
				"group" => "Extra",
				"description" => 'Enter padding for: Top Right Bottom Left. Ex:10px 10px 10px 10px. Default is 0'
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Box Margin', CSCORE_NAME ),
				"param_name" => "box_margin",
				"value" =>'',
				"group" => "Extra",
				"description" => 'Enter margin for: Top Right Bottom Left. Ex:10px 10px 10px 10px. Default is 0'
		),
		array (
				"type" => "textfield",
				"heading" => __ ( 'Custom Class', CSCORE_NAME ),
				"param_name" => "custom_class",
				"description" => 'If you wish to style particular Extra element differently, then use this field to add a class name and then refer to it in your css file.'
		)
	)
) );