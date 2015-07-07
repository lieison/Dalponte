<?php
add_shortcode('cs-piechart-v2', 'cs_piechart_v2_render');

function cs_piechart_v2_render($params, $content = null)
{
    extract(shortcode_atts(array(
        'title' => '',
        'title_tag' => 'h4',
        'title_color' => '',
        'description' => '',
        'type' => '',
        'style' => '1',
        'width' => '100%',
        'height' => '100%',
        'margin' => '0 auto',
        'pie_allow_point_select'=> '0',
        'char_in_legend' => '0',
        'char_show_labels' => '0',
        'char_gradient_fill' => '0',
        'char_show_3d' => '0',
        'char_alpha' => '45',
        'char_depth' => '35',
        'pie_innersize' => '0',
    ), $params));
    wp_enqueue_script('waypoints');
    wp_enqueue_script('highcharts', CSCORE_PLUGIN_URL . "framework/shortcodes/piechartv2/highcharts.js");
    if(in_array($type, array('bubble_charts','polar_chart','spider_web','wind_rose'))){
        wp_enqueue_script('highcharts.more', CSCORE_PLUGIN_URL . "framework/shortcodes/piechartv2/highcharts-more.js");
    }
    if($char_show_3d){
        wp_enqueue_script('custom.highcharts.3d', CSCORE_PLUGIN_URL . "framework/shortcodes/piechartv2/highcharts-3d.js");
    }
    wp_enqueue_script('custom.highcharts', CSCORE_PLUGIN_URL . "framework/shortcodes/piechartv2/custom.highcharts.js");

    $options = new stdClass();
    switch ($type) {
        case 'pie_charts':
            $options->allow_point_select = $pie_allow_point_select;
            $options->show_in_legend = $char_in_legend;
            $options->show_in_labels = $char_show_labels;
            $options->gradient_fill = $char_gradient_fill;
            $options->show_3d = $char_show_3d;
            $options->alpha = $char_alpha;
            $options->depth = $char_depth;
            $options->innersize = $pie_innersize;
        break;
        
        default:
            ;
        break;
    }
    $options = base64_encode(json_encode($options));
    
    ob_start();
    ?>
	<div data-char="<?php echo $content; ?>" data-options="<?php echo $options; ?>" data-type="<?php echo $type; ?>" class="highcharts-content" style="min-width: <?php echo esc_attr($width); ?>; height: <?php echo esc_attr($height); ?>; margin: <?php echo esc_attr($margin); ?>"></div>
	<?php
    return ob_get_clean();
}
