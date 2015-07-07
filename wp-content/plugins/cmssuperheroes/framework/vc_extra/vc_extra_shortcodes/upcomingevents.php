<?php
if (get_option('cms_superheroes_events', true)) {
    vc_map(array(
        "name" => 'Upcoming Event',
        "base" => "cs-up-event",
        "icon" => "cs_icon_for_vc",
        "category" => __('CS Hero', CSCORE_NAME),
        "description" => __('Show list upcoming events', CSCORE_NAME),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __('Heading', CSCORE_NAME),
                "param_name" => "title",
                "holder" => 'div'
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Heading size", CSCORE_NAME),
                "param_name" => "heading_size",
                "value" => array(
                    "Default" => "",
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "description" => 'Select your heading size for title.'
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Heading Align", CSCORE_NAME),
                "param_name" => "title_align",
                "value" => array(
                    "Left" => "text-left",
                    "Center" => "text-center",
                    "Right" => "text-right"
                ),
                "description" => __("Select align for Title", CSCORE_NAME)
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Heading Color', CSCORE_NAME),
                "param_name" => "title_color",
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Heading Style", CSCORE_NAME),
                "param_name" => "heading_style",
                "value" => array(
                    "Default" => "",
                    "Border Bottom" => "border-bottom",
                    "Overline" => "overline",
                    "Underline" => "underline",
                    "Line Through" => "line-through",
                    "Dotted Bottom" => "dotted-bottom"
                ),
                "description" => __("Select heading style", CSCORE_NAME)
            ),
            array(
                "type" => "textfield",
                "heading" => __('Sub Heading', CSCORE_NAME),
                "param_name" => "subtitle",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Sub Heading size", CSCORE_NAME),
                "param_name" => "subtitle_heading_size",
                "value" => array(
                    "Default" => "",
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "description" => 'Select your heading size for sub title.'
            ),
            array(
                "type" => "textfield",
                "heading" => __('Description', CSCORE_NAME),
                "param_name" => "description",
            ),
            array(
                "type" => "",
                "heading" => __('SOURCE OPTION', CSCORE_NAME),
                "param_name" => "source_option",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Course Heading size", CSCORE_NAME),
                "param_name" => "item_heading_size",
                "value" => array(
                    "Default" => "",
                    "Heading 1" => "h1",
                    "Heading 2" => "h2",
                    "Heading 3" => "h3",
                    "Heading 4" => "h4",
                    "Heading 5" => "h5",
                    "Heading 6" => "h6"
                ),
                "description" => 'Select  heading size for course title.'
            ),
            array(
                "type" => "textfield",
                "heading" => __('Number item on page', CSCORE_NAME),
                "param_name" => "page_more"
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Crop Image', CSCORE_NAME),
                "param_name" => "crop_image",
                "value" => array(
                    __("Yes, please", CSCORE_NAME) => true
                )
            ),
            array(
                "type" => "textfield",
                "heading" => __('Width Image', CSCORE_NAME),
                "param_name" => "width_image"
            ),
            array(
                "type" => "textfield",
                "heading" => __('Height Image', CSCORE_NAME),
                "param_name" => "height_image"
            )
        )
    ));
}