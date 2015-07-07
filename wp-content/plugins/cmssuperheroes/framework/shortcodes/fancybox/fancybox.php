<?php
add_shortcode('cshero-fancy-box', 'cshero_fancy_box_render');
function cshero_fancy_box_render($atts, $content = null) {
    extract(shortcode_atts(array(
        "layout" => "",
        'content_align'=>'text-center',
        'icon_title' => '',
        'icon_size' =>'20px',
        'icon_color'=>'',
        'icon_color_hover'=>'',
        'icon_width'=>'',
        'icon_heigth'=>'',
        'icon_style' => '',
        'icon_hover_style'=>'style-1',
        'icon_animate_type' => 'none',
        'border_color'=>'',
        'border_color_hover'=>'',
        'border_width'=>'',
        'border_radius' =>'',
        'border_style'=>'none',
        'icon_bg_color'=>'',
        'icon_bg_color_hover'=>'',
        'show_icon_link' => false,
        'title_transform' => 'inherit',
        'image' => '',
        'crop_image' => 0,
        'width_image' => 300,
        'height_image' => 200,
        'title' => '',
        'title_color'=>'',
        'title_color_hover'=>'',
        'title_margin'=>'',
        'heading_size' => 'h4',
        'link_show_more' => '',
        'content_color'=>'',
        'content_color_hover'=>'',
        'box_bg'=>'',
        'box_bg_hover'=>'',
        'box_border'=>'',
        'box_border_hover'=>'',
        'box_padding'=>'0',
        'box_margin'=>'0',
        'read_more' => '',
        'read_btn' =>'',
        'read_more_class'=>'',
        'read_more_margin'=>'',
        'button_type' => '',
        'button_size' => '',
        'custom_class' => '',
        'show_order_item' => false,
        'number_order_item' => '',
        'show_notification' => false,
        'notification_icon' => '',
        'number_item_notification' => '',
        'image_positon' => 0
    ), $atts));
    global $smof_data;
    $unique_id = uniqid().'_'.time();
    $fancybox_id = 'cshero-fancybox'.$unique_id;

    $fancy_wrap = str_replace('.', '-', $layout);

    if(class_exists('WPBakeryVisualComposerAbstract')){
        $content = wpb_js_remove_wpautop($content);
    }

    if ($link_show_more == '') {
        $link_show_more = '#';
    }

    if($icon_animate_type != 'none') {
        //$animate_class = array();
        //$animate_class[] = $icon_animate_type;
        //$animate_class[] = 'animate-element';
        //$animate_class = esc_attr( implode( ' ', $animate_class ) );
        /* class animation for row */
        wp_enqueue_script('waypoints');
        $animate_class = '  wpb_animate_when_almost_visible wpb_'.$icon_animate_type;
    }else {
        $animate_class = '';
    }

    /* Box style */
    $box_style = array();

    if ( !empty($box_border) || !empty($box_border_hover) ) {
        $box_style[] = 'border-width: 1px;';
        $box_style[] = 'border-style: solid;';
    }
    $box_style[] = ($box_border) ? 'border-color: '.$box_border.';' : 'border-color: transparent;';
    $box_style[] = ( $box_padding ) ? "padding: $box_padding;" : '';
    $box_style[] = ( $box_margin ) ? "margin: $box_margin;" : '';
    $box_style[] = ($box_bg) ? "background: $box_bg" : '';
    $box_style = cshero_build_style( $box_style );

    // make style for title
    $title_style = array();
    $title_style[] = ( $title_color ) ? "color: $title_color;" : '';
    $title_style[] = ( $title_margin ) ? "margin: $title_margin;" : '';
    $title_style[] = ( $title_transform ) ? "text-transform: $title_transform;" : '';
    $title_style = cshero_build_style( $title_style );

    // make style for icon
    $style = array();
    $style[] = 'text-align:center;';
    $style[] = ($icon_size) ? "font-size: $icon_size;" : '';
    $style[] = ($icon_color) ? "color: $icon_color;" : '';
    $style[] = ($icon_bg_color) ? "background-color: $icon_bg_color;" : '';
    $style[] = ($icon_width) ? "width: $icon_width;" : '';
    $style[] = ($icon_heigth) ? "height: $icon_heigth;" : '';
    $style[] = ($icon_heigth) ? "line-height: $icon_heigth;" : '';
    $style[] = ($border_style) ? "border-style: $border_style;" : '';
    $style[] = ($border_width) ? "border-width: $border_width;" : '';
    $style[] = ($border_color) ? "border-color: $border_color;" : '';
    if ( $border_radius ) {
        $style[] = "border-radius: $border_radius; 
                    -webkit-border-radius: $border_radius;
                    -moz-border-radius: $border_radius;
                    -ms-border-radius: $border_radius;
                    -o-border-radius: $border_radius;";
    }
    $style = cshero_build_style( $style );

    $style2 = '';
    if( $icon_width ) {
        $style2 = 'style="padding-left: '.esc_attr($icon_width).';"';
    }

    $overlay_style ='style="';
    $overlay_style .='background-color:'.$box_bg_hover.';';
    $overlay_style .='"';

    ob_start();
	$attachment_image = array();
	$image_url = '';
	if (!empty($image)) {
		$attachment_image = wp_get_attachment_image_src($image, 'full');
        if($crop_image == 1){
            $image_url = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
        } else {
            $image_url = $attachment_image[0];
        }
	}
    global $fancy_css,$layout_css;
    wp_enqueue_style('cshero-fancybox-animation',CSCORE_PLUGIN_URL.'framework/shortcodes/fancybox/css/fancybox.css');
         
    $file_layout= "cms_templates/fancybox/layouts/$layout.php";
    $file_css = "cms_templates/fancybox/css/$layout.css";
    if(locate_template($file_layout)) {
        if(locate_template($file_css)) {
            wp_enqueue_style("fancybox-$layout",get_template_directory_uri()."/".$file_css);
        }
        require locate_template($file_layout);
    }else{
        wp_enqueue_style('cshero-'.$fancy_wrap, CSCORE_PLUGIN_URL . "framework/shortcodes/fancybox/css/$layout.css");
        require  "layouts/$layout.php";
    }
    return ob_get_clean();
}