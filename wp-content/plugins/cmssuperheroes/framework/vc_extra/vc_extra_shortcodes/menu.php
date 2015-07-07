<?php
/* --------------------------------------------------------------------- */
/* Shortcode Menu */
/* --------------------------------------------------------------------- */
$custom_menus = array();
$menus = get_terms('nav_menu', array('hide_empty' => false));
if (is_array($menus)) {
    foreach ($menus as $single_menu) {
        $custom_menus[$single_menu->name] = $single_menu->term_id;
    }
}

vc_map(array(
    "name" => 'Menu',
    "base" => "cs-shortcode-menu",
    "icon" => "cs_icon_for_vc",
    "category" => __('CS Hero',CSCORE_NAME),
    "class" => "wpb_vc_wp_widget",
    "description" => __("Load a menu", CSCORE_NAME),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('Title', CSCORE_NAME),
            "param_name" => "title",
        ),
        array (
            "type" => "dropdown",
            "class" => "",
            "heading" => __ ( "Layout Styles", CSCORE_NAME ),
            "param_name" => "layout",
            "value" =>cscore_get_files_name_array("menu"),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Menu", "js_composer"),
            "param_name" => "nav_menu",
            "value" => $custom_menus,
            "description" => __(empty($custom_menus) ? "Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu." : "Select menu", CSCORE_NAME),
            "admin_label" => true
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Link Color", CSCORE_NAME),
            "param_name" => "menu_link_color",
            "description" => __("The menu item color for first level.", CSCORE_NAME)
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Link Active", CSCORE_NAME),
            "param_name" => "menu_link_active",
            "description" => __("The menu item color is actived.", CSCORE_NAME)
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Active", CSCORE_NAME),
            "param_name" => "menu_background_active",
            "description" => __("The menu item background color is actived.", CSCORE_NAME)
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Link Hover", CSCORE_NAME),
            "param_name" => "menu_link_hover",
            "description" => __("The menu item color is hover.", CSCORE_NAME)
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Background Hover", CSCORE_NAME),
            "param_name" => "menu_background_hover",
            "description" => __("The menu item background color is hover.", CSCORE_NAME)
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Content Widget Position", CSCORE_NAME),
            "param_name" => "widget_position",
            "value" => array(
                "Default" => "",
                "Left" => "left",
                "Right" => "right"
            ),
            "description" => __("Choose position for widget content. Default is LEFT.", CSCORE_NAME)
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Content Widget Background", CSCORE_NAME),
            "param_name" => "widget_bg",
            "description" => __("Choose background color for Content Widget.", CSCORE_NAME)
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", CSCORE_NAME)
        )
    )
));
?>