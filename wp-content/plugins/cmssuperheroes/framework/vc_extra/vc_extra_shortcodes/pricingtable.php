<?php
if (get_option('cms_superheroes_pricing', true)) {
    $button_arr = array(
        __('Button Default', CSCORE_NAME) => 'btn btn-default',
        __('Button Default Alt', CSCORE_NAME) => 'btn btn-default-alt',
        __('Button Default White', CSCORE_NAME) => 'btn btn-white',
        __('Button Border', CSCORE_NAME) => 'btn btn-border',
        __('Button Border White', CSCORE_NAME) => 'btn btn-border-white',
        __('Button Primary', CSCORE_NAME) => 'btn btn-primary',
        __('Button Primary Alt', CSCORE_NAME) => 'btn btn-primary-alt',
        __('Button Primary Alt White', CSCORE_NAME) => 'btn btn-primary-alt btn-white',
        __('Button Warning', CSCORE_NAME) => 'btn btn-warning',
        __('Button Danger', CSCORE_NAME) => 'btn btn-danger',
        __('Button Success', CSCORE_NAME) => 'btn btn-success',
        __('Button Info', CSCORE_NAME) => 'btn btn-info',
        __('Button Inverse', CSCORE_NAME) => 'btn btn-inverse' 
    );
    vc_map(array(
        "name" => 'Pricing',
        "base" => "cs-pricing",
        "icon" => "cs_icon_for_vc",
        "category" => __('CS Hero', CSCORE_NAME),
        "description" => __('Pricing Table', CSCORE_NAME),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __('Title', CSCORE_NAME),
                "param_name" => "title",
                "description" => "",
                "holder" => "div",
                "group" => "General"
            ),
            array(
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
                "description" => 'Select your heading size for title.',
                "group" => "General"
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Title Color', CSCORE_NAME),
                "param_name" => "title_color",
                "description" => '',
                "group" => "General"
            ),
            array(
                "type" => "textfield",
                "heading" => __('Sub Title', CSCORE_NAME),
                "param_name" => "sub_title",
                "description" => "",
                "group" => "General"
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Sub Heading size", CSCORE_NAME),
                "param_name" => "sub_heading_size",
                "value" => array(
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
            array(
                "type" => "colorpicker",
                "heading" => __('Sub Title Color', CSCORE_NAME),
                "param_name" => "sub_title_color",
                "description" => '',
                "group" => "General"
            ),
            array(
                "type" => "textfield",
                "heading" => __('Description', CSCORE_NAME),
                "param_name" => "description",
                "description" => "",
                "group" => "General"
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Description Color', CSCORE_NAME),
                "param_name" => "description_color",
                "description" => '',
                "group" => "General"
            ),
            
            array(
                "type" => "textfield",
                "heading" => __('Extra class', CSCORE_NAME),
                "param_name" => "el_class",
                "value" => '',
                "description" => __('Enter extra class for pricing style.', CSCORE_NAME),
                "group" => "General"
            ),
            array(
                "type" => "pro_taxonomy",
                "taxonomy" => "pricing_category",
                "heading" => __("Categories", CSCORE_NAME),
                "param_name" => "category",
                "description" => __("Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", CSCORE_NAME),
                "group" => "Source"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Order by', CSCORE_NAME),
                "param_name" => "orderby",
                "value" => array(
                    "None" => "none",
                    "Title" => "title",
                    "Date" => "date",
                    "ID" => "ID"
                ),
                "description" => __('Order by ("none", "title", "date", "ID").', CSCORE_NAME),
                "group" => "Source"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Order', CSCORE_NAME),
                "param_name" => "order",
                "value" => Array(
                    "None" => "none",
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
                "description" => __('Order ("None", "Asc", "Desc").', CSCORE_NAME),
                "group" => "Source"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Layout', CSCORE_NAME),
                "param_name" => "layout",
                "value" => cscore_get_files_name_array("pricing"),
                "admin_label" => true, 
                "group" => "Layout"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Columns', CSCORE_NAME),
                "param_name" => "columns",
                "value" => array(
                    "2 Columns" => "2",
                    "3 Columns" => "3",
                    "4 Columns" => "4",
                    "5 Columns" => "5"
                ),
                "description" => __('How many columns would you like to display on the Pricing Overview page?', CSCORE_NAME),
                "group" => "Layout"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Content Align', CSCORE_NAME),
                "param_name" => "content_align",
                "value" => array(
                    __("Default", CSCORE_NAME) => 'text-center',
                    __("Left", CSCORE_NAME) => 'text-left',
                    __("Center", CSCORE_NAME) => 'text-center',
                    __("right", CSCORE_NAME) => 'text-right'
                ),
                "description" => __('Choose conent align style.', CSCORE_NAME),
                "group" => "Item Option"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Show Image', CSCORE_NAME),
                "param_name" => "show_image",
                "value" => array(
                    __("Yes", CSCORE_NAME) => '1',
                    __("No", CSCORE_NAME) => '0'
                ),
                "description" => __('Show or hide featured image on your Pricing.', CSCORE_NAME),
                "group" => "Item Option"
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Show Video', CSCORE_NAME),
                "param_name" => "show_video",
                "value" => array(
                    __("Yes", CSCORE_NAME) => '1',
                    __("No", CSCORE_NAME) => '0'
                ),
                "description" => __('Show or hide featured image on your Pricing.', CSCORE_NAME),
                "group" => "Item Option"
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Title Font Color', CSCORE_NAME),
                "param_name" => "title_pricing_color",
                "description" => '',
                "group" => "Item Option"
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Feature Badge Font Color', CSCORE_NAME),
                "param_name" => "badge_color",
                "description" => '',
                "group" => "Item Option"
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Item Background Color', CSCORE_NAME),
                "param_name" => "title_background_pricing_color",
                "description" => '',
                "group" => "Item Option"
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Feature Item Background Color', CSCORE_NAME),
                "param_name" => "content_background_pricing_color",
                "description" => '',
                "group" => "Item Option"
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Feature Button Background Color', CSCORE_NAME),
                "param_name" => "button_background_pricing_color",
                "description" => '',
                "group" => "Item Option"
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Feature Button Font Color', CSCORE_NAME),
                "param_name" => "button_font_pricing_color",
                "description" => '',
                "group" => "Item Option"
            ),           
            array(
                "type" => "dropdown",
                "heading" => __('Button Type', CSCORE_NAME),
                "param_name" => "button_type",
                "value" => $button_arr,
                "description" => "",
                "group" => "Item Option"
            )
        )
    ));
}