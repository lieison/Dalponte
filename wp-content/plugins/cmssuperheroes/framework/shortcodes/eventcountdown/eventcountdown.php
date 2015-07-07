<?php
add_shortcode('cs-next-event', 'cs_shortcode_next_event_render');

function cs_shortcode_next_event_render($params, $content = null)
{
    global $wp_query;
    extract(shortcode_atts(array(
        'title' => '',
        'image' => '',
        'category' => '',
        'show_image' => '',
        'crop_image' => '',
        'width_image' => '570',
        'height_image' => '219',
        'description' => '',
        'length_description' => '',
        "layout" => "eventcountdown.layout1",
        'number_position' => 'before',
        'show_title' => '',
        'class' => ''
    ), $params));
    // date_default_timezone_set("America/Los_Angeles");
    wp_enqueue_script('jquery-countdown', CSCORE_PLUGIN_URL . "framework/shortcodes/eventcountdown/js/jquery.countdown.min.js");
    wp_enqueue_script('custom-countdown', CSCORE_PLUGIN_URL . "framework/shortcodes/eventcountdown/js/custom.countdown.js");
    
    $args = array(
        'posts_per_page' => 1,
        'post_type' => 'event',
        'meta_query' => array(
            array(
                'key' => 'cmsevent_start_date',
                'value' => date('U'),
                'type' => 'NUMERIC',
                'compare' => '>='
            )
        ),
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'post_status' => 'publish'
    );
    /** by category */
    if ($category) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'event_category',
                'field' => 'term_id',
                'terms' => $category
            )
        );
    }
    /** query */
    $wp_query = new WP_Query($args);
    
    ob_start();
    
    $file_layout = "cms_templates/eventcountdown/layouts/$layout.php";
    $file_css = "cms_templates/eventcountdown/css/$layout.css";
    if (locate_template($file_layout)) {
        if (locate_template($file_css))
            wp_enqueue_style("eventcountdown-$layout", get_template_directory_uri() . "/" . $file_css);
        require locate_template($file_layout);
    } else {
        wp_enqueue_style('counter', CSCORE_PLUGIN_URL . "framework/shortcodes/eventcountdown/css/$layout.css");
        require "layouts/{$layout}.php";
    }
    wp_reset_query();
    return ob_get_clean();
}