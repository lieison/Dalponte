<?php
vc_map ( array (
		"name" => "Pie Chart",
		"base" => "cs-piechart",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ("Pie, Doughnut Charts, Area Chart, Line Chart, Bar Chart...",CSCORE_NAME),
		"params" => array (
				array (
					"type" => "",
					"heading" => __ ( 'GENARAL OPTION', CSCORE_NAME ),
					"param_name" => "general_option",
				),
				array (
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Title", CSCORE_NAME ),
						"param_name" => "title",
						"admin_label" => true
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Heading Size', CSCORE_NAME ),
						"param_name" => "title_tag",
						"value" => array (
								"H1" => "h1",
								"H2" => "h2",
								"H3" => "h3",
								"H4" => "h4",
								"H5" => "h5",
								"H6" => "h6"
						),
				),
				array (
						"type" => "colorpicker",
						"heading" => __ ( 'Title Color', CSCORE_NAME ),
						"param_name" => "title_color",
				),
				array (
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Description", CSCORE_NAME ),
						"param_name" => "description",
				),
				array (
					"type" => "",
					"heading" => __ ( 'CHART OPTION', CSCORE_NAME ),
					"param_name" => "chart_option",
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Type', CSCORE_NAME ),
						"param_name" => "type",
						"value" => array (
								"Doughnut" => "doughnut",
								"Pie" => "pie",
								"Area Chart" => "polararea",
								"Line Chart" => "linechart",
								"Bar Chart" => "barchart",
								"Radar Chart" => "radarchart"
						),
				),
				array (
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Inner Cutout", CSCORE_NAME ),
						"param_name" => "inner_cutout",
						"value" => 0,
						"description" => __ ( "Number 0->99 - The percentage of the chart that we cut out of the middle (This is 0 for Pie charts)", CSCORE_NAME )
				),
				array (
					"type" => "",
					"heading" => __ ( 'LAYOUT OPTION', CSCORE_NAME ),
					"param_name" => "layout_option",
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Layout', CSCORE_NAME ),
						"param_name" => "style",
						"value" => array (
								"Layout 1" => "1",
								"Layout 2" => "2",
								"Layout 3" => "3",
								"Layout 4" => "4",
								"Layout 5" => "5",
								"Layout 6" => "6"
						),
				),
				array (
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Width", CSCORE_NAME ),
						"param_name" => "width",
						"value"=>"auto",
						"description" => "Use a number, ex: 176"
				),
				array (
						"type" => "textfield",
						"class" => "",
						"heading" => __ ( "Height", CSCORE_NAME ),
						"param_name" => "height",
						"value"=>"auto",
						"description" => "Use a number, ex: 176"
				),
				array (
					"type" => "",
					"heading" => __ ( 'IMPORT DATA', CSCORE_NAME ),
					"param_name" => "data_option",
				),
				array (
						"type" => "textarea",
						"class" => "",
						"heading" => __ ( "Values for (Doughnut, Pie, Area Chart)", CSCORE_NAME ),
						"param_name" => "values",
						"value" => "",
						"description" => "{'value':300,'color':'#F7464A','highlight':'#FF5A5E','label':'Red'},{'value':50,'color':'#46BFBD','highlight':'#5AD3D1','label':'Green'},{'value':100,'color':'#FDB45C','highlight':'#FFC870','label':'Yellow'}"
				),
				array (
				    "type" => "textarea_raw_html",
				    "class" => "",
				    "heading" => __ ( "Values for (Line Chart, Bar Chart, Radar Chart)", CSCORE_NAME ),
				    "param_name" => "values2",
				    "value" => '',
				    "description" => '{"labels":["January","February","March","April","May","June","July"],"datasets":[{"label":"My First dataset","fillColor":"rgba(220,220,220,0.2)","strokeColor":"rgba(220,220,220,1)","pointColor":"rgba(220,220,220,1)","pointStrokeColor":"#fff","pointHighlightFill":"#fff","pointHighlightStroke":"rgba(220,220,220,1)","data":[65,59,80,81,56,55,40]},{"label":"My Second dataset","fillColor":"rgba(151,187,205,0.2)","strokeColor":"rgba(151,187,205,1)","pointColor":"rgba(151,187,205,1)","pointStrokeColor":"#fff","pointHighlightFill":"#fff","pointHighlightStroke":"rgba(151,187,205,1)","data":[28,48,40,19,86,27,90]}]}'
				),
				array (
					"type" => "textfield",
					"heading" => __ ( "Extra class name", "js_composer" ),
					"param_name" => "el_class",
					"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
				)
		)
) );