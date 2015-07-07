<?php
add_shortcode ( 'cshero-progressbar', 'cshero_progressbar_render' );

$progressbar_callback = 0;
function cshero_progressbar_render($params, $content = null) {
    global $smof_data,$progressbar_callback;
    extract ( shortcode_atts ( array (
        'title' => '',
        'title_size'=>'h3',
        'title_color'=>'',
        'show_title' =>'1',
        'desc' => '',
        'desc_color'=>'',
        'title_margin'=>'',
        'title_font_format' => '400',
        'title_font_style' => 'initial',
        'value' => '50',
        'label_value'=>'',
        'icon' => '',
        'icon_color' => '',
        'icon_size' => '',
        'show_value' => '',
        'bg_color' => '',
        'color_value' => '',
        'color' => '',
        'vertical' =>false,
        'striped' => '',
        'animated' => '',
        'stacked' => '',
        'right' => '',
        'height'=> '',
        'width' => '',
        'border_color'=>'',
        'border_width'=>'',
        'border_radius' =>'',
        'border_style'=>'',
        'class' => '',
        'label' => '',
        "layout" => "progressbar.layout1"
    ), $params ) );

    wp_register_style('prettify', CSCORE_PLUGIN_URL . "framework/shortcodes/progressbar/prettify.min.css",array(),"0.7.0");
    wp_register_style('bootstrap-progressbar', CSCORE_PLUGIN_URL . "framework/shortcodes/progressbar/bootstrap-progressbar.min.css",array(),"0.7.0");
    wp_enqueue_style('prettify');
    wp_enqueue_style('bootstrap-progressbar');
    wp_enqueue_script('prettify', CSCORE_PLUGIN_URL . "framework/shortcodes/progressbar/prettify.min.js",array(),"0.7.0");
    wp_enqueue_script('bootstrap-progressbar', CSCORE_PLUGIN_URL . "framework/shortcodes/progressbar/bootstrap-progressbar.min.js",array(),"0.7.0");
    wp_enqueue_script('waypoints');

    wp_enqueue_script('cs-progressbar', CSCORE_PLUGIN_URL . "framework/shortcodes/progressbar/cs-progressbar.js",array(),"1.0.0");

    /* Title style */
    $title_style = 'style="';
        $title_style .= 'color:'.$title_color.';';
        $title_style .= 'margin:'.$title_margin. ';';
        $title_style .='text-transform:'.$title_font_style.';';
        $title_style .='font-weight:'.substr($title_font_format,0,3).';';
        $title_style .='font-style:'.substr($title_font_format,3).';';
    $title_style .='"';


    /* Desc color */
    $desc_style = array();
    if($desc_color){
        $desc_style[] = "color:$desc_color;";
    }
    $desc_style = cshero_build_style($desc_style);

    /* default color */
    if(!$color){
        $color = $smof_data['secondary_color'];
    }
    /* default width & height*/
    if($vertical){
        if(!$height){
            $height = '350px';
        }
        if(!$width){
            $width = '70px';
        }
    }
    $style = 'style="';
    if($height){
        $style .="height:$height;";
        $style .="line-height:$height;";
    }
    if($width){
        $style .="width:$width;";
    }
    if($bg_color){
        $style .= "background-color:$bg_color;";
    }
    if($border_style){
        $style .="border-style:$border_style;";
    }
    if($border_width){
        $style .="border-width:$border_width;";
    }
    if($border_color){
        $style .="border-color:$border_color;";
    }
    if($border_radius){
        $style .="border-radius:$border_radius;";
    }
    $style .= '"';

    if(!$height & !$vertical){
        $height = 20;
    }
    $valstyle = $height - $border_width*2;

    ob_start();
    ?>
    
    <div id="cshero-progress-<?php echo $progressbar_callback; ?>" class="cshero-progress-item <?php echo str_replace(".","-",$layout); ?> ">
        <?php 
            $file_layout= "cms_templates/progressbar/layouts/$layout.php";
            $file_css   = "cms_templates/progressbar/css/$layout.css";
            if(locate_template($file_layout)){
                if(locate_template($file_css))
                    wp_enqueue_style("progressbar-$layout",get_template_directory_uri()."/".$file_css);    
                require locate_template($file_layout);
            }else{
                wp_enqueue_style("progressbar-$layout", CSCORE_PLUGIN_URL . "framework/shortcodes/progressbar/css/$layout.css");
                require  "layouts/$layout.php";
            }
        ?>
    </div>
    <?php
    $progressbar_callback++;
    return ob_get_clean();
}
