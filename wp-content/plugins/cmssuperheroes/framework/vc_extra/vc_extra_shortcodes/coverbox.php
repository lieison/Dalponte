<?php
// Cover Boxes
vc_map ( array(
		"name" => "Cover Boxes",
		"base" => "cshero-cover-boxes",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "Three Box", CSCORE_NAME ),
		"params" => array(
				array(
						"type" => "heading",
						"class" => "",
						"heading" => __ ( "General Config", CSCORE_NAME ),
						"param_name" => "heading_general",
						"value" => "",
						"description" => ""
				),
				array(
						"type" => "textfield",
						"class" => "",
						"holder" => "div",
						"heading" => __ ( "Title", CSCORE_NAME ),
						"param_name" => "title",
						"value" => "",
						"description" => __( "Title of shortcode", CSCORE_NAME )
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Title size", CSCORE_NAME ),
						"param_name" => "title_size",
						"value" => array(
								"Heading 1"=>"h1",
								"Heading 2"=>"h2",
								"Heading 3"=>"h3",
								"Heading 4"=>"h4",
								"Heading 5"=>"h5",
								"Heading 6"=>"h6"
						),
						"description" => __ ( "Choose with heading tag to display for title", CSCORE_NAME )
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Title Align", CSCORE_NAME ),
						"param_name" => "title_align",
						"value" => array(
								"None"=>"",
								"Center"=>"center",
								"Left"=>"left",
								"Right"=>"right"
						),
				),
				array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __ ( "Title Color", CSCORE_NAME ),
						"param_name" => "title_color",
						"value" => "",
						"description" => __ ( "Choose title color", CSCORE_NAME )
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Item Active Default", CSCORE_NAME ),
						"param_name" => "item_default",
						"value" => array(
								"1"=>"1",
								"2"=>"2",
								"3"=>"3",
								"4"=>"4"
						),
						"description" => __ ( "Choose item default is actived", CSCORE_NAME )
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Item Title size", CSCORE_NAME ),
						"param_name" => "item_title_size",
						"value" => array(
								"Heading 1"=>"h1",
								"Heading 2"=>"h2",
								"Heading 3"=>"h3",
								"Heading 4"=>"h4",
								"Heading 5"=>"h5",
								"Heading 6"=>"h6"
						),
						"description" => __ ( "Choose with heading tag to display for item title", CSCORE_NAME )
				),
				array(
						"type" => "textarea",
						"class" => "",
						"heading" => __ ( "Description", CSCORE_NAME ),
						"param_name" => "description",
						"value" => "",
						"description" => __ ( "Description of shortcode", CSCORE_NAME )
				),
				array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __ ( "Item Title Color", CSCORE_NAME ),
						"param_name" => "item_title_color",
						"value" => "",
						"description" => __ ( "Choose title color for all items", CSCORE_NAME )
				),
				array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __ ( "Item Description Color", CSCORE_NAME ),
						"param_name" => "item_description_color",
						"value" => "",
						"description" => __ ( "Choose description color for all items", CSCORE_NAME )
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item Link Label", CSCORE_NAME ),
						"param_name" => "item_link_label",
						"value" => "",
						"description" => __ ( "Link label for all items. Ex: Read more.", CSCORE_NAME )
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Item Link Target", CSCORE_NAME ),
						"param_name" => "item_link_target",
						"value" => array(
								"Self" => "_self",
								"Blank" => "_blank",
								"Parent" => "_parent",
								"Top" => "_top"),
						"description" => __ ( "Link target for all items", CSCORE_NAME )
				),
				array(
					"type" => "dropdown",
					"heading" => __ ( 'Image size', CSCORE_NAME ),
					"param_name" => "image_size",
					"value" => array(
						"Full"=>1,
						"Thumbnail"=>0
					)
				),
				array(
						"type" => "heading",
						"class" => "",
						"heading" => __ ( "Item Config", CSCORE_NAME ),
						"param_name" => "heading_item",
						"value" => "",
				),
				array(
						"type" => "attach_image",
						"class" => "",
						"heading" => __ ( "Item Image 1", CSCORE_NAME ),
						"param_name" => "item_image1",
						"description" => __ ( "Select image thumbnail for item. If not, this item can't show on frontend.", CSCORE_NAME )
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item Title 1", CSCORE_NAME ),
						"param_name" => "item_title1",
						"value" => "",
						"description" => __ ( "Item Title", CSCORE_NAME )
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item sub title 1", CSCORE_NAME ),
						"param_name" => "item_sub_title1",
						"value" => "",
						"description" => __ ( "Item sub title", CSCORE_NAME )
				),
				array(
						"type" => "textarea",
						"class" => "",
						"heading" => __ ( "Item Description 1", CSCORE_NAME ),
						"param_name" => "item_description1",
						"value" => ""
				),
				array(
						"type" => "textfield",
						"class" => "item-link-1 item-link",
						"heading" => __ ( "Item Link 1", CSCORE_NAME ),
						"param_name" => "item_link1",
						"value" => "",
						"description" => __ ( "External link for item.", CSCORE_NAME )
				),
				array(
						"type" => "attach_image",
						"class" => "",
						"heading" => __ ( "Item Image 2", CSCORE_NAME ),
						"param_name" => "item_image2",
						"description" => __ ( "Select image thumbnail for item. If not, this item can't show on frontend.", CSCORE_NAME )
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item Title 2", CSCORE_NAME ),
						"param_name" => "item_title2",
						"value" => ""
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item sub title 2", CSCORE_NAME ),
						"param_name" => "item_sub_title2",
						"value" => "",
						"description" => __ ( "Item sub title", CSCORE_NAME )
				),
				array(
						"type" => "textarea",
						"class" => "",
						"heading" => __ ( "Item Description 2", CSCORE_NAME ),
						"param_name" => "item_description2",
						"value" => ""
				),
				array(
						"type" => "textfield",
						"class" => "item-link-2 item-link",
						"heading" => __ ( "Item Link 2", CSCORE_NAME ),
						"param_name" => "item_link1",
						"value" => "",
						"description" => __ ( "External link for item.", CSCORE_NAME )
				),
				array(
						"type" => "attach_image",
						"class" => "",
						"heading" => __ ( "Item Image 3", CSCORE_NAME ),
						"param_name" => "item_image3",
						"description" => __ ( "Select image thumbnail for item. If not, this item can't show on frontend.", CSCORE_NAME )
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item Title 3", CSCORE_NAME ),
						"param_name" => "item_title3",
						"value" => ""
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item sub title 3", CSCORE_NAME ),
						"param_name" => "item_sub_title3",
						"value" => "",
						"description" => __ ( "Item sub title", CSCORE_NAME )
				),
				array(
						"type" => "textarea",
						"class" => "",
						"heading" => __ ( "Item Description 3", CSCORE_NAME ),
						"param_name" => "item_description3",
						"value" => ""
				),
				array(
						"type" => "textfield",
						"class" => "item-link-3 item-link",
						"heading" => __ ( "Item Link 3", CSCORE_NAME ),
						"param_name" => "item_link3",
						"value" => "",
						"description" => __ ( "External link for item.", CSCORE_NAME )
				),
				array(
						"type" => "attach_image",
						"class" => "",
						"heading" => __ ( "Item Image 4", CSCORE_NAME ),
						"param_name" => "item_image4",
						"description" => __ ( "Select image thumbnail for item. If not, this item can't show on frontend.", CSCORE_NAME )
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item Title 4", CSCORE_NAME ),
						"param_name" => "item_title4",
						"value" => ""
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Item sub title 4", CSCORE_NAME ),
						"param_name" => "item_sub_title4",
						"value" => "",
						"description" => __ ( "Item sub title", CSCORE_NAME )
				),
				array(
						"type" => "textarea",
						"class" => "",
						"heading" => __ ( "Item Description 4", CSCORE_NAME ),
						"param_name" => "item_description4",
						"value" => ""
				),
				array(
						"type" => "textfield",
						"class" => "item-link-4 item-link",
						"heading" => __ ( "Item Link 4", CSCORE_NAME ),
						"param_name" => "item_link4",
						"value" => "",
						"description" => __ ( "External link for item.", CSCORE_NAME )
				),
				array(
						"type" => "heading",
						"class" => "",
						"heading" => __ ( "Extra Options", CSCORE_NAME ),
						"param_name" => "heading_extra",
						"value" => "",
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Read More Button Style", CSCORE_NAME ),
						"param_name" => "read_more_button_style",
						"value" => array(
								"Default" => "",
								"No" => "no",
								"Yes" => "yes"
						),
						"description" => ""
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Button Type", CSCORE_NAME ),
						"param_name" => "cover_button_type",
						"value" => array(
								"Button Default" => "btn-default",
								"Button Primary" => "btn-primary"
						),
						"description" => ""
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Button Size", CSCORE_NAME ),
						"param_name" => "cover_button_size",
						"value" => array(
								"Default" => "",
								"Lagre" => "btn-large",
								"Medium" => "btn-medium",
								"Small" => "btn-small",
								"Mini" => "btn-mini"
						),
						"description" => ""
				),
				array(
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Extra Class", CSCORE_NAME ),
						"param_name" => "extra_class",
						"value" => ""
				)
		)
) );