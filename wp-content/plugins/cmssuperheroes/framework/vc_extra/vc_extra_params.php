<?php 
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_button2");
/* add extra param for vc shortcodes */
function cshero_vc_extra_param()
{
    global $post;
    if (function_exists('vc_add_param')) {
        if (shortcode_exists('vc_row')) {
            // Adding stripes to rows
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => __('Responsive utilities', CSCORE_NAME),
                "param_name" => "row_responsive_large",
                "value" => array(
                    __("Hidden (Large devices)", CSCORE_NAME) => true
                ),
                "group" => __("Responsive", CSCORE_NAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_medium",
                "value" => array(
                    __("Hidden (Medium devices)", CSCORE_NAME) => true
                ),
                "group" => __("Responsive", CSCORE_NAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_small",
                "value" => array(
                    __("Hidden (Small devices)", CSCORE_NAME) => true
                ),
                "group" => __("Responsive", CSCORE_NAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "heading" => '',
                "param_name" => "row_responsive_extra_small",
                "value" => array(
                    __("Hidden (Extra small devices)", CSCORE_NAME) => true
                ),
                "group" => __("Responsive", CSCORE_NAME),
                "description" => __("For faster mobile-friendly development, use these utility classes for showing and hiding content by device via media query.", CSCORE_NAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("ID Name for Navigation", CSCORE_NAME),
                "param_name" => "dt_id",
                "value" => "",
                "group" => __("One Page", CSCORE_NAME),
                "description" => __("If this row wraps the content of one of your sections, set an ID. You can then use it for navigation. Ex: work", CSCORE_NAME)
            ));
            vc_add_param('vc_row', array(
                'type' => 'dropdown',
                'heading' => "Full Width",
                'param_name' => 'full_width',
                'value' => array(
                    "No" => "false",
                    "Yes" => "true"
                ),
                'description' => "Only activated on main layout full width"
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Heading color", CSCORE_NAME),
                "param_name" => "row_head_color",
                "value" => "",
                "description" => __("Select color for head.", CSCORE_NAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Link color", CSCORE_NAME),
                "param_name" => "row_link_color",
                "value" => "",
                "description" => __("Select color for link.", CSCORE_NAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Link color hover", CSCORE_NAME),
                "param_name" => "row_link_color_hover",
                "value" => "",
                "description" => __("Select color for link hover.", CSCORE_NAME)
            ));

            vc_add_param("vc_row_inner", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Same height", CSCORE_NAME),
                "param_name" => "same_height",
                "value" => array(
                    "" => 'true'
                ),
                "description" => __("Set the same hight for all column in this row.", CSCORE_NAME)
            ));

            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", CSCORE_NAME),
                "admin_label" => true,
                "param_name" => "animation",
                "value" => array(
                    "None" => "",
                    "Right To Left" => "right-to-left",
                    "Left To Right" => "left-to-right",
                    "Bottom To Top" => "bottom-to-top",
                    "Top To Bottom" => "top-to-bottom",
                    "Scale Up" => "scale-up",
                    "Fade In" => "fade-in"
                )
            ));
            vc_add_param("vc_row", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Row style", CSCORE_NAME),
                "admin_label" => true,
                "param_name" => "type",
                "value" => array(
                    "Default" => "",
                    "Custom" => "ww-custom"
                ),
                "group" => __("Style", CSCORE_NAME)
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Enable parallax", CSCORE_NAME),
                "param_name" => "enable_parallax",
                "value" => array(
                     __("Yes, please", CSCORE_NAME) => true
                ),
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Background ratio", CSCORE_NAME),
                "param_name" => "parallax_speed",
                "value" => "0.8",
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "value" => array(
                        "ww-custom"
                    )
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Overlay Color", CSCORE_NAME),
                "param_name" => "bg_video_color",
                "value" => "",
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Overlay Opacity", CSCORE_NAME),
                "param_name" => "bg_video_transparent",
                "value" => "0",
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Video poster", CSCORE_NAME),
                "param_name" => "poster",
                "value" => "",
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Loop", CSCORE_NAME),
                "param_name" => "loop",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                ),
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Autoplay", CSCORE_NAME),
                "param_name" => "autoplay",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                ),
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Muted", CSCORE_NAME),
                "param_name" => "muted",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                ),
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Controls", CSCORE_NAME),
                "param_name" => "controls",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                ),
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));
            vc_add_param("vc_row", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Show Button Play", CSCORE_NAME),
                "param_name" => "show_btn",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                ),
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));
            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (mp4)", CSCORE_NAME),
                "param_name" => "bg_video_src_mp4",
                "value" => "",
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (ogv)", CSCORE_NAME),
                "param_name" => "bg_video_src_ogv",
                "value" => "",
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));

            vc_add_param("vc_row", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Video background (webm)", CSCORE_NAME),
                "param_name" => "bg_video_src_webm",
                "value" => "",
                "group" => __("Style", CSCORE_NAME),
                "dependency" => array(
                    "element" => "type",
                    "not_empty" => true
                )
            ));
        }
        /* vc column */
        if (shortcode_exists('vc_column')) {
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", CSCORE_NAME),
                "admin_label" => true,
                "param_name" => "animation",
                "value" => array(
                    "None" => "",
                    "Right To Left" => "right-to-left",
                    "Left To Right" => "left-to-right",
                    "Bottom To Top" => "bottom-to-top",
                    "Top To Bottom" => "top-to-bottom",
                    "Scale Up" => "scale-up",
                    "Fade In" => "fade-in"
                )
            ));

            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Text Align", CSCORE_NAME),
                "admin_label" => true,
                "param_name" => "text_align",
                "value" => array(
                    "None" => "",
                    "Inherit" => "inherit",
                    "Initial" => "initial",
                    "Justify" => "justify",
                    "Left" => "left",
                    "Right" => "right",
                    "Center" => "center",
                    "Start" => "start",
                    "End" => "end"
                )
            ));
            vc_add_param("vc_column", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Column Heading Style", CSCORE_NAME),
                "admin_label" => true,
                "param_name" => "column_style",
                "value" => array(
                    "Default" => "",
                    "Title Primary Color" => "title-preset1",
                    "Title Secondary Color" => "title-preset2",
                    "Title Feature Box" => "title-feature-box"
                ),
                "description" => __("Add some styles to column", CSCORE_NAME)
            ));
        }
        // Pie chart
        if (shortcode_exists('vc_pie')) {
            vc_add_param("vc_pie", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Heading size", CSCORE_NAME),
                "param_name" => "heading_size",
                "value" => array(
                    "Default" => "h4",
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "description" => 'Select your heading size for title.'
            ));
            vc_add_param("vc_pie", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __('Title Color', CSCORE_NAME),
                "param_name" => "title_color"
            ));
            vc_add_param("vc_pie", array(
                'type' => 'textfield',
                'heading' => __('Pie icon', CSCORE_NAME),
                'param_name' => 'icon',
                'value' => '',
                'admin_label' => true
            ));
            vc_add_param("vc_pie", array(
                'type' => 'textfield',
                'heading' => __('Icon Size', CSCORE_NAME),
                'param_name' => 'icon_size',
                'description' => __('Font size of icon', CSCORE_NAME),
                'value' => '24',
                'admin_label' => true
            ));
            vc_add_param("vc_pie", array(
                'type' => 'colorpicker',
                'heading' => __('Icon Color', CSCORE_NAME),
                'param_name' => 'icon_color',
                'value' => '#888',
                'admin_label' => true
            ));
            vc_remove_param("vc_pie", "color");
            vc_add_param("vc_pie", array(
                'type' => 'colorpicker',
                'heading' => __('Bar color', CSCORE_NAME),
                'param_name' => 'color',
                'value' => '#00c3b6', // $pie_colors,
                'description' => __('Select pie chart color.', CSCORE_NAME),
                'admin_label' => true,
                'param_holder_class' => 'vc-colored-dropdown'
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Bar Width", CSCORE_NAME),
                "param_name" => "pie_width",
                "value" => "12"
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Description", CSCORE_NAME),
                "param_name" => "desc",
                "value" => ""
            ));
            vc_add_param("vc_pie", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", CSCORE_NAME),
                "param_name" => "style",
                "value" => array(
                    "Style 1" => "style1",
                    "Style 2" => "style2"
                ),
                "description" => __("Select style for pie.", CSCORE_NAME)
            ));
            vc_add_param("vc_pie", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon", CSCORE_NAME),
                "param_name" => "icon",
                "value" => "",
                "description" => __('You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart', CSCORE_NAME)
            ));
        }
        /*
         * Separator
         */
        if (shortcode_exists('vc_separator')) {
            vc_remove_param('vc_separator', 'el_class');
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Style Border Width", CSCORE_NAME),
                "param_name" => "border_width",
                "value" => "1",
                "description" => "Defualt 1"
            ));
            vc_add_param("vc_separator", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Show Arrow", CSCORE_NAME),
                "param_name" => "separator_arrow",
                "value" => array(
                    "No" => "no",
                    "Yes" => "yes"
                ),
                "group" => __("Arrow", CSCORE_NAME)
            ));
            vc_add_param("vc_separator", array(
                "type" => "dropdown",
                "heading" => __("Arrow Type", CSCORE_NAME),
                "param_name" => "separator_arrow_type",
                "value" => array(
                    "Border" => "border",
                    "Image" => "image",
                    "Icon" => "icon"
                ),
                "group" => __("Arrow", CSCORE_NAME),
                "dependency" => array(
                    "element" => 'separator_arrow',
                    "value" => array(
                        "yes"
                    )
                )
            ));
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "heading" => __("Arrow Width", CSCORE_NAME),
                "param_name" => "arrow_width",
                "value" => "12",
                "group" => __("Arrow", CSCORE_NAME),
                "dependency" => array(
                    "element" => 'separator_arrow',
                    "value" => array(
                        "yes"
                    )
                ),
                "description" => "Set Width for Arrow (Default 12)"
            ));
            vc_add_param("vc_separator", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Arrow Color", CSCORE_NAME),
                "param_name" => "arrow_color",
                "dependency" => array(
                    "element" => 'separator_arrow',
                    "value" => array(
                        "yes"
                    )
                ),
                "group" => __("Arrow", CSCORE_NAME)
            ));
            vc_add_param("vc_separator", array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Arrow Image", CSCORE_NAME),
                "param_name" => "arrow_image",
                "value" => "",
                "group" => __("Arrow", CSCORE_NAME),
                "dependency" => array(
                    "element" => 'separator_arrow_type',
                    "value" => array(
                        "image"
                    )
                )
            ));
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "heading" => __("Icon Class", CSCORE_NAME),
                "param_name" => "icon_class",
                "group" => __("Arrow", CSCORE_NAME),
                "dependency" => array(
                    "element" => 'separator_arrow_type',
                    "value" => array(
                        "icon"
                    )
                )
            ));
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "heading" => __("Width (px)", CSCORE_NAME),
                "param_name" => "icon_width",
                "group" => __("Arrow", CSCORE_NAME)
            ));
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "heading" => __("Height (px)", CSCORE_NAME),
                "param_name" => "icon_height",
                "group" => __("Arrow", CSCORE_NAME)
            ));
            vc_add_param("vc_separator", array(
                "type" => "colorpicker",
                "heading" => __("Background Color", CSCORE_NAME),
                "param_name" => "icon_bg",
                "group" => __("Arrow", CSCORE_NAME)
            ));
            vc_add_param("vc_separator", array(
                "type" => "colorpicker",
                "heading" => __("Border Color", CSCORE_NAME),
                "param_name" => "icon_border_color",
                "group" => __("Arrow", CSCORE_NAME)
            ));
            vc_add_param("vc_separator", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Border Style", CSCORE_NAME),
                "param_name" => "icon_border_style",
                "value" => array(
                    "none" => "none",
                    "dotted" => "dotted",
                    "dashed" => "dashed",
                    "solid" => "solid",
                    "double" => "double"
                ),
                "group" => __("Arrow", CSCORE_NAME)
            ));
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "heading" => __("Border Width (px)", CSCORE_NAME),
                "param_name" => "icon_border_width",
                "group" => __("Arrow", CSCORE_NAME)
            ));
            vc_add_param("vc_separator", array(
                "type" => "textfield",
                "heading" => __("Border Radius (px)", CSCORE_NAME),
                "param_name" => "icon_border_radius",
                "group" => __("Arrow", CSCORE_NAME)
            ));
        }
        /*
         * Separator with Text
         */
        if (shortcode_exists('vc_text_separator')) {
            vc_add_param("vc_text_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Style Border Width", CSCORE_NAME),
                "param_name" => "border_width",
                "value" => "1",
                "description" => "Defualt 1"
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Style Border Width", CSCORE_NAME),
                "param_name" => "border_width",
                "value" => "1",
                "description" => "Defualt 1"
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "dropdown",
                "heading" => __("Heading size", CSCORE_NAME),
                "param_name" => "heading_size",
                "value" => array(
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "description" => 'Select your heading size for text.'
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Text Transform", CSCORE_NAME),
                "param_name" => "text_transform",
                "value" => array(
                    "None" => "",
                    "Lowercase" => "lowercase",
                    "Uppercase" => "uppercase"
                ),
                "description" => "Uppercase & Lowercase for Text"
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Style Border Width", CSCORE_NAME),
                "param_name" => "border_width",
                "value" => "1",
                "description" => "Defualt 1"
            ));
            vc_add_param("vc_text_separator", array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => __("Description", CSCORE_NAME),
                "param_name" => "desc",
                "value" => "",
                "description" => ""
            ));
        }
        /* accordion */
        if (shortcode_exists('vc_accordion_tab')) {
            vc_add_param("vc_accordion_tab", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon", CSCORE_NAME),
                "param_name" => "icon",
                "value" => "",
                "description" => __('You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart', CSCORE_NAME)
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Title Color", CSCORE_NAME),
                "param_name" => "title_color"
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Tab", CSCORE_NAME),
                "param_name" => "background_tab"
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Content", CSCORE_NAME),
                "param_name" => "background_content"
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Title Active Color", CSCORE_NAME),
                "param_name" => "title_active_color"
            ));
            vc_add_param("vc_accordion_tab", array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background Tab Active", CSCORE_NAME),
                "param_name" => "background_tab_active"
            ));
            vc_add_param("vc_accordion", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Item Margin Bottom", CSCORE_NAME),
                "param_name" => "item_margin_bottom",
                "value" => '',
                "description" => __('margin bottom each accordion tab. Ex: 10px', CSCORE_NAME)
            ));
            vc_add_param("vc_accordion", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Item Border", CSCORE_NAME),
                "param_name" => "item_border",
                "value" => '',
                "description" => __('Border of each accordion tab. Ex: 1px solid #444', CSCORE_NAME)
            ));
            vc_add_param("vc_accordion", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Title Align", CSCORE_NAME),
                "param_name" => "title_align",
                "value" => array(
                    'Left' => 'left',
                    'Right' => 'right',
                    'Center' => 'center'
                )
            ));
        }

        /* VC Button */
        if (shortcode_exists('vc_button')) {
            vc_remove_param('vc_button', 'color');
            vc_remove_param('vc_button', 'icon');
            vc_remove_param('vc_button', 'size');
            vc_add_param("vc_button", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Button Type", CSCORE_NAME),
                "param_name" => "type",
                "value" => array(
                    'Button Default' => 'btn btn-default',
                    'Button Primary' => 'btn btn-primary',
                    'Button Border' => 'btn btn-border',
                    'Button Default Alt' => 'btn btn-default-alt',
                    'Button Primary Alt' => 'btn btn-primary-alt',
                    'Button Primary Alt White' => 'btn btn-primary-alt btn-white',
                    'Button Warning' => 'btn btn-warning',
                    'Button Danger' => 'btn btn-danger',
                    'Button Success' => 'btn btn-success',
                    'Button Info' => 'btn btn-info',
                    'Button Inverse' => 'btn btn-inverse'
                )
            ));
            $size_arr = array(
                __('Default', CSCORE_NAME) => '',
                __('Large', CSCORE_NAME) => 'btn-lg btn-large',
                __('Medium', CSCORE_NAME) => 'btn-md btn-medium',
                __('Small', CSCORE_NAME) => 'btn-sm btn-small',
                __('Mini', CSCORE_NAME) => "btn-xs btn-mini"
            );
            vc_add_param("vc_button", array(
                'type' => 'dropdown',
                'heading' => __('Size', CSCORE_NAME),
                'param_name' => 'size',
                'value' => $size_arr,
                'description' => __('Button size.', CSCORE_NAME)
            ));
            vc_add_param("vc_button", array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Button Block", CSCORE_NAME),
                "param_name" => "button_block",
                "value" => array(
                    "" => "true"
                ),
                "description" => __("Yes, please.", CSCORE_NAME)
            ));
        }
        if (shortcode_exists('vc_tab')) {
            vc_add_param("vc_tab", array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon", CSCORE_NAME),
                "param_name" => "icon_title",
                "value" => "",
                "description"=>__('You can find icon class at here: <a target="_blank" href="http://fontawesome.io/icons/">"http://fontawesome.io/icons/</a>. For example, fa fa-heart', CSCORE_NAME)
            ));
        }

        /*
         * Contact form-7
         */
        if (shortcode_exists('contact-form-7')) {
            vc_add_param("contact-form-7", array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Contact Style", CSCORE_NAME),
                "param_name" => "html_class",
                "value" => array(
                    'Style 1' => 'contact-style-1',
                    'Style 2' => 'contact-style-2',
                    'Style 3' => 'contact-style-3',
                    'Style 4' => 'contact-style-4'
                )
            ));
        }
    }
}

// intergrate VC
cs_integrateWithVC();

function cs_integrateWithVC()
{
    $vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;
    /*
     * Tabs ----------------------------------------------------------
     */
    $tab_id_1 = time() . '-1-' . rand(0, 100);
    $tab_id_2 = time() . '-2-' . rand(0, 100);
    vc_map(array(
        "name" => __('Tabs', CSCORE_NAME),
        'base' => 'vc_tabs',
        'show_settings_on_create' => false,
        'is_container' => true,
        'icon' => 'icon-wpb-ui-tab-content',
        'category' => __('Content', CSCORE_NAME),
        'description' => __('Tabbed content', CSCORE_NAME),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __('Widget title', CSCORE_NAME),
                'param_name' => 'title',
                'description' => __('Enter text which will be used as widget title. Leave blank if no title is needed.', CSCORE_NAME)
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Auto rotate tabs', CSCORE_NAME),
                'param_name' => 'interval',
                'value' => array(
                    __('Disable', CSCORE_NAME) => 0,
                    3,
                    5,
                    10,
                    15
                ),
                'std' => 0,
                'description' => __('Auto rotate tabs each X seconds.', CSCORE_NAME)
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Tab Color', CSCORE_NAME),
                'param_name' => 'tab_color',
                'std' => '#444'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Tab Color Active', CSCORE_NAME),
                'param_name' => 'tab_color_active',
                'std' => '#444'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Tab Background Color', CSCORE_NAME),
                'param_name' => 'tab_background_color'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Tab Background Color Active', CSCORE_NAME),
                'param_name' => 'tab_background_color_active'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Tab Icon Color', CSCORE_NAME),
                'param_name' => 'tab_icon_color'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Tab Icon Color Hover', CSCORE_NAME),
                'param_name' => 'tab_icon_color_hover'
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Tab Icon Color Active', CSCORE_NAME),
                'param_name' => 'tab_icon_color_active'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Extra class name', CSCORE_NAME),
                'param_name' => 'el_class',
                'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', CSCORE_NAME)
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'style',
                'heading' => __('Style', CSCORE_NAME),
                'value' => array(
                    "Style 1" => "style1",
                    "Style 2" => "style2",
                    "Style 3" => "style3"
                ),
                'std' => 'style1'
            )
        ),
        'custom_markup' => '
	<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
	<ul class="tabs_controls">
	</ul>
	%content%
	</div>',
        'default_content' => '
	[vc_tab title="' . __('Tab 1', CSCORE_NAME) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
	[vc_tab title="' . __('Tab 2', CSCORE_NAME) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
	',
        'js_view' => $vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35'
    ));
    /*
     * Call to Action Button ----------------------------------------------------------
     */
    $target_arr = array(
        __('Same window', CSCORE_NAME) => '_self',
        __('New window', CSCORE_NAME) => "_blank"
    );
    $button_type = array(
        __('Button Default', CSCORE_NAME) => 'btn-default',
        __('Button Primary', CSCORE_NAME) => 'btn-primary',
        __('Button White', CSCORE_NAME) => 'btn-primary btn-white'
    );
    $size_arr = array(
        __('Regular size', CSCORE_NAME) => '',
        __('Large', CSCORE_NAME) => 'btn-large',
        __('Small', CSCORE_NAME) => 'btn-small',
        __('Mini', CSCORE_NAME) => "btn-mini"
    );
    vc_map(array(
        'name' => __('Call to Action Button', CSCORE_NAME),
        'base' => 'vc_cta_button',
        'icon' => 'icon-wpb-call-to-action',
        'category' => __('Content', CSCORE_NAME),
        'description' => __('Catch visitors attention with CTA block', CSCORE_NAME),
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => __('Icon', CSCORE_NAME),
                'param_name' => 'call_icon',
                'description' => __('Font Awesome.', CSCORE_NAME)
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Icon size', CSCORE_NAME),
                'param_name' => 'call_icon_size',
                'description' => __('Icon on font size px.', CSCORE_NAME)
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Icon color', CSCORE_NAME),
                'param_name' => 'call_icon_color',
                'description' => __('Icon on color.', CSCORE_NAME)
            ),
            array(
                'type' => 'textarea',
                'admin_label' => true,
                'heading' => __('Title', CSCORE_NAME),
                'param_name' => 'call_text',
                'value' => __('Click edit button to change this text.', CSCORE_NAME),
                'description' => __('Enter your content.', CSCORE_NAME)
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Title heading size', CSCORE_NAME),
                'param_name' => 'call_text_heading_size',
                'description' => __('Choose heading style.', CSCORE_NAME),
                'value'  => array(
                    'H1' => 'h1',
                    'H2' => 'h2',
                    'H3' => 'h3',
                    'H4' => 'h4',
                    'H5' => 'h5',
                    'H6' => 'h6',
                    'Div' => 'div',
                    'Span' => 'span',
                )
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title font size', CSCORE_NAME),
                'param_name' => 'call_text_font_size',
                'description' => __('Text on font size px.', CSCORE_NAME)
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title color', CSCORE_NAME),
                'param_name' => 'call_text_color',
                'description' => __('Text on color.', CSCORE_NAME)
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Text on the button', CSCORE_NAME),
                'param_name' => 'title',
                'value' => __('Text on the button', CSCORE_NAME),
                'description' => __('Text on the button.', CSCORE_NAME)
            ),
            array(
                'type' => 'textfield',
                'heading' => __('URL (Link)', CSCORE_NAME),
                'param_name' => 'href',
                'description' => __('Button link.', CSCORE_NAME)
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Target', CSCORE_NAME),
                'param_name' => 'target',
                'value' => $target_arr,
                'dependency' => array(
                    'element' => 'href',
                    'not_empty' => true
                )
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Button Type ', CSCORE_NAME),
                'param_name' => 'button_type',
                'value' => $button_type,
                'description' => __('Button Type.', CSCORE_NAME),
                'param_holder_class' => 'vc-button-type-dropdown'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Button size', CSCORE_NAME),
                'param_name' => 'size',
                'value' => $size_arr,
                'description' => __('Button size.', CSCORE_NAME)
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Button align', CSCORE_NAME),
                'param_name' => 'position',
                'value' => array(
                    __('Align right', CSCORE_NAME) => 'cs_align_right',
                    __('Align left', CSCORE_NAME) => 'cs_align_left'
                ),
                'description' => __('Select button alignment.', CSCORE_NAME)
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Extra class name', CSCORE_NAME),
                'param_name' => 'el_class',
                'description' => __('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', CSCORE_NAME)
            )
        ),
        'js_view' => 'VcCallToActionView'
    ));
}
