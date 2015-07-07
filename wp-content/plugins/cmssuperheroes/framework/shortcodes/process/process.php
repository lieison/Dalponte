<?php
add_shortcode('cs-process', 'cshero_process_render');

function cshero_process_render($params, $content = null) {
    extract(shortcode_atts(array(
        'icon1' => '',
        'icon2' => '',
        'icon3' => '',
        'icon4' => '',
        'icon5' => '',
        'icon6' => '',
        'icon7' => '',
        'icon8' => '',
        'icon_font_size' => '',
        'icon_color' => '',
        'icon_color_hover' => '',
        'icon_background' => '',
        'icon_background_hover' => '',
        'icon_width' => '',
        'icon_height' => '',
        'icon_border_width' => '',
        'icon_border_color' => '',
        'icon_border_style' => '',
        'icon_border_radius' => '',
        'title_heading_size' => 'h3',
        'title_color' => '',
        'title_margin' => '',
        'title1'=>'',
        'title2'=>'',
        'title3'=>'',
        'title4'=>'',
        'title5'=>'',
        'title6'=>'',
        'title7'=>'',
        'title8'=>'',
        'desc1' => '',
        'desc2' => '',
        'desc3' => '',
        'desc4' => '',
        'desc5' => '',
        'desc6' => '',
        'desc7' => '',
        'desc8' => '',
        'process_column'=>'', 
        'layout'=>'' 
    ), $params));
    
    wp_enqueue_script('process-js',CSCORE_PLUGIN_URL . "framework/shortcodes/process/process.js");
    $sc_cls = time() . '_' . uniqid(true);
    ob_start();
    if($icon_background_hover || $icon_color_hover){
        $hover_style = '.cs-process-'.$sc_cls.' .cshero-process-outer:hover .cshero-process-inner i{background-color:'.$icon_background_hover.' !important; color:'.$icon_color_hover.' !important;}';
        wp_register_script( 'cshero_row_css', get_template_directory_uri().'/js/custom_row.js' );
        $translation_array = array( 'css' => $hover_style );
        wp_localize_script( 'cshero_row_css', 'cshero_row_object', $translation_array );
        wp_enqueue_script( 'cshero_row_css' );
    }
    ?>
    <div class="cs-process cs-process-<?php echo $sc_cls;?> cs-<?php echo str_replace(".","-",$layout) ;?>">
        <?php
        $file_layout= "cms_templates/process/layouts/$layout.php";
        $file_css   = "cms_templates/process/css/$layout.css";
        if(locate_template($file_layout)){
            if(locate_template($file_css))
                wp_enqueue_style("process-$layout",get_template_directory_uri()."/".$file_css);    
            require locate_template($file_layout);
        }else{
            wp_enqueue_style("process-$layout", CSCORE_PLUGIN_URL . "framework/shortcodes/process/css/$layout.css");
            require  "layouts/$layout.php";
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
}