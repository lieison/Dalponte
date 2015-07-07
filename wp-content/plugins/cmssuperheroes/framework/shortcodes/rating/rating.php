<?php
add_shortcode('cshero-rating', 'cshero_rating');
function cshero_rating($params, $content = null) {
    extract(shortcode_atts(array(
        'title' => '',
        'heading_size'=>'h3',
        'title_color' => '',
        'title_transform' => '',
        'categories' => '',
        'show_categories' => '0',
        'show_feature' => '0',
        'orderby' => 'latest',
        'show_image' => '1',
        'align_image' => '',
        'show_title' => '0',
        'show_description' => '0',
        'crop_image' => '0',
        'width_image' => '370',
        'height_image' => '240',
        'show_list_image' => '1',
        'align_list_image' => 'left',
        'crop_list_image' => '0',
        'width_list_image' => '370',
        'height_list_image' => '240',
        'show_date' => '0',
        'show_rating' => '0',
        'item_per_page' => 5,
        'layout' => 'rating.layout1',
        'custom_class' => '',
    ), $params));
    $title_css = ' style="';
    if($title_color!=''){
        $title_css .= ' color:'.$title_color.'; ';
    }
    $title_css .= 'text-transform:'.$title_transform.';';
    $title_css.='"';
    $id = 'cshero_rating_'.uniqid().'_'.time();
    ob_start();
    wp_enqueue_script("rating-script",CSCORE_PLUGIN_URL . "framework/shortcodes/rating/js/rating.js");

    $feature_content_style = 'style="';
        if($show_image !='') { $feature_padding = $width_image+20;  $feature_content_style .= 'padding-'.$align_image.':'.$feature_padding.'px;'; }
    $feature_content_style .= '"';

    $list_content_style = 'style="';
        if($show_list_image!='') { $list_padding = $width_list_image+20;  $list_content_style .= 'padding-'.$align_list_image.':'.$list_padding.'px;'; }
    $list_content_style .= '"';

    ?>
    <div class="cshero-rating <?php echo str_replace('.','-',$layout); ?> <?php echo $custom_class;?>" id="<?php echo $id;?>">
        <?php 
            $file_layout= "cms_templates/rating/layouts/$layout.php";
            $file_css   = "cms_templates/rating/css/$layout.css";
            if(locate_template($file_layout)){
                if(locate_template($file_css))
                    wp_enqueue_style("rating-$layout",get_template_directory_uri()."/".$file_css);    
                require locate_template($file_layout);
            }else{
                wp_enqueue_style("rating-$layout", CSCORE_PLUGIN_URL . "framework/shortcodes/rating/css/$layout.css");
                require  "layouts/$layout.php";
            }
        ?>
    </div>
    <?php
    return ob_get_clean();
}