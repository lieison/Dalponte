<?php
// Cover Boxes
vc_map ( array(
		"name" => "Cart & Search",
		"base" => "cshero-cart-search",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "Shortcode show search and cart icon", CSCORE_NAME ),
		"params" => array(
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Show Cart", CSCORE_NAME ),
						"param_name" => "show_cart",
						"value" => array(
								"Yes, Please" => "1",
								"No" => "0",
							),
						"description" => __ ( "Display Cart icon.", CSCORE_NAME )
				),
				array(
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Show Search", CSCORE_NAME ),
						"param_name" => "show_search",
						"value" => array(
								"Yes, Please" => "1",
								"No" => "0",
								),
						"description" => __ ( "Display Search icon.", CSCORE_NAME )
				),
		)
) );