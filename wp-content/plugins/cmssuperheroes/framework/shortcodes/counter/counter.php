<?php
$callback = 0;
add_shortcode('cshero-counter', 'cshero_counter_render');
function cshero_counter_render( $atts, $content = null ) {
    global $callback;

    $args = array(
        "heading" => '',
        "heading_size" => '',
        "heading_color" => '',
        "heading_align" => '',
        "heading_text_style" => '',
        "type" => '',
        "digit" => '1000',
        "digit_prefix" => '',
        "digit_suffix" => '',
        "digit_heading_size" => 'div',
        "digit_font_size" => '',
        "digit_font_color" => '',
        "digit_margin" => '',
        "text" => '',
        "text_size" => '',
        "text_color" => '',
        "text_style" => '',
        "icon" => '',
        "icon_size" => '',
        "icon_color" => '',
        "align" => '',
        "box" => '',
        "box_width" => '',
        "box_style" => '',
        "box_radius" => '',
        "box_counter_width" => '',
        "box_counter_height" => '',
        "border_color" => '',
        "border_color_hover" => '',
        "background_color" => '',
        "background_color_hover" => '',
        "padding_box" => '',
        "layout" => '',
        'extra_class' => ''
    );
    
    extract(shortcode_atts($args, $atts));
    wp_enqueue_script('counter', CSCORE_PLUGIN_URL . "/framework/shortcodes/counter/cshero-countUp.min.js");
    wp_enqueue_script('waypoints');
    wp_enqueue_script('cshero-counter', CSCORE_PLUGIN_URL . "/framework/shortcodes/counter/cshero-counter.js");
    /* init variables */ 
    $unique_id = uniqid().'_'.time();
    $counter_id = 'cshero-counter'.$unique_id;

    /* heading style */
    $heading_style = array();
    $heading_style[] = ( $heading_color ) ? "color: $heading_color;" : '';
    $heading_style[] = ( $heading_align ) ? "text-align: $heading_align;" : '';
    $heading_style = cshero_build_style( $heading_style );
   
    /* icon style */
    $icon_style = array();
    $icon_style[] = ( $icon_size ) ? "font-size: $icon_size;" : '';
    $icon_style[] = ( $digit_margin ) ? "margin: $digit_margin;" : '';
    $icon_style[] = ( $icon_color ) ? "color: $icon_color;" : '';
    $icon_style = cshero_build_style( $icon_style );

    /* Counter style */
    $counter_styles = array();
    $counter_styles[] = ( $digit_font_size ) ? "font-size: $digit_font_size;" : '';
    $counter_styles[] = ( $digit_font_color ) ? "color: $digit_font_color;" : '';
    $counter_styles[] = ( $digit_margin ) ? "margin: $digit_margin;" : '';
    $counter_styles = cshero_build_style( $counter_styles );
    
    /* Text style */
    $text_styles = array();
    $text_styles[] = ( $text_size ) ? "font-size: $text_size;" : '';
    $text_styles[] = ( $text_color ) ? "color: $text_color;" : '';
    $text_styles[] = ( $text_style ) ? "text-transform: $text_style;" : '';
    $text_styles = cshero_build_style( $text_styles );

    /* Border box */
    $wrap_style = array();
    if ( $box != 'no' ) {
        $wrap_style[] = ( $box_width ) ? "border-width: $box_width;" : '';
        $wrap_style[] = ( $box_style ) ? "border-style: $box_style;" : '';
        $wrap_style[] = ( $box_counter_width ) ? "width: $box_counter_width;" : '';
        $wrap_style[] = ( $box_counter_height ) ? "height: $box_counter_height;" : '';
        $wrap_style[] = ( $box_counter_height ) ? "line-height: $box_counter_height;" : '';
        $wrap_style[] = ( $box_radius ) ? "-webkit-border-radius: $box_radius;" : '';
        $wrap_style[] = ( $box_radius ) ? "-moz-border-radius: $box_radius;" : '';
        $wrap_style[] = ( $box_radius ) ? "border-radius: $box_radius;" : '';
        $wrap_style[] = ( $border_color ) ? "border-color: $border_color;" : ''; 
        $wrap_style[] = ( $background_color ) ? "background-color: $background_color;" : ''; 
    }
    $wrap_style[] = ( $padding_box ) ? "padding: $padding_box;" : '';
    $wrap_style = cshero_build_style( $wrap_style );



    /* data render */
    $data_render = array();
    if( $digit_prefix ) {
        $data_render[] = 'data-prefix="'.$digit_prefix.'"';
    }
    if( $digit_suffix ) {
        $data_render[] = 'data-suffix="'.$digit_suffix.'"';
    }
    $data_render[] = 'data-type="'.$type.'"';
    $data_render[] = 'data-digit="'.$digit.'"';
    ob_start();
    $file_layout= "cms_templates/counter/layouts/$layout.php";
    $file_css   = "cms_templates/counter/css/$layout.css";
    if( locate_template($file_layout) ) {
        if( locate_template($file_css) )
            wp_enqueue_style( "cshero-counter-$layout",get_template_directory_uri()."/".$file_css);
        require locate_template($file_layout);
    } else {
        wp_enqueue_style('cshero-counter-'.str_replace('.','-',$layout).'', CSCORE_PLUGIN_URL . "framework/shortcodes/counter/css/$layout.css");
        require  "layouts/$layout.php";
    }
    $callback ++;

    return ob_get_clean();
}