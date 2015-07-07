<?php
add_shortcode('cs-woocategories', 'cshero_woo_categories_render');

function cshero_woo_categories_render($params, $content = null) {
    extract(shortcode_atts(array(
        'cats' => '',
        'col' => '4',
        'overlay_bg' => 'transparent',
        'overlay_bg_hover' => 'transparent',
        'number_items' => '',
        'crop_image' => '',
        'title_categories_size' => 'h3',
        'title_categories_color' => '',
        'layout' => 'woocategories.layout1',
        'width_image' => 300,
        'height_image' => 200,
        'el_class' =>'',
    ), $params));
    wp_enqueue_style('woocategories', CSCORE_PLUGIN_URL.'framework/shortcodes/woocategories/css/woocategories.css');

    $overlay_style ='style="';
    $overlay_style .='background-color:'.$overlay_bg.';';
    $overlay_style .='"';

    $overlay_style_hover ='background-color:'.$overlay_bg_hover.' !important;';


    $_cats = array();
    if($cats){
        $_cats = explode(',', $cats);
    } else {
        $terms = get_terms('product_cat');
        foreach ($terms as $cat){
            $_cats[] = $cat->term_id;
        }
    }
    /** col */
    $_col = '';
    switch ($col) {
        case '1':
            $_col = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
            break;
        case '2':
            $_col = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
            break;
        case '3':
            $_col = 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
            break;
        case '4':
            $_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
            break;
    }
    ob_start();
    $cats_count = count($_cats);
    $rows = 0;
    $date = time() . '_' . uniqid(true);
    ?>
    <div id="cshero-woocategories-<?php echo $date;?>" class="<?php echo str_replace('.','-',$layout).' '.esc_attr($el_class);?>">
        <?php foreach ($_cats as $cat): ?>
            <?php
                $rows++;
                $term = get_term( $cat, 'product_cat' );
                if(!empty($term->term_id)){
                    $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                    $image_resize = '';
                    if($thumbnail_id){
                        $attachment = wp_get_attachment_image_src($thumbnail_id,'full',false);
                        if($crop_image){
                            $image_resize = mr_image_resize( $attachment[0], $width_image, $height_image, true, 'c', false );
                        } else {
                            $image_resize = $attachment[0];
                        }
                    }
                }
            ?>
            <?php
            if($rows % $col == 1){
                echo '<div class="row">';
            }

                $file_layout= "cms_templates/woocategories/layouts/$layout.php";
                $file_css   = "cms_templates/woocategories/css/$layout.css";
                if(locate_template($file_layout)){
                    if(locate_template($file_css))
                        wp_enqueue_style("woocategories-$layout",get_template_directory_uri()."/".$file_css);
                    require locate_template($file_layout);
                }else{
                    wp_enqueue_style('woocategories', CSCORE_PLUGIN_URL . "framework/shortcodes/woocategories/css/$layout.css");
                    //var_dump($layout); exit();
                    require  "layouts/$layout.php";
                }

            if($rows % $col == 0 || $rows == $cats_count){
                echo '</div>';
            }
            endforeach;
        ?>
    </div>
    <div class="dynamic-css">
        <style type="text/css" scoped>
            #cshero-woocategories-<?php echo $date;?> .cs-categories-woo:hover .overlay{<?php echo $overlay_style_hover; ?>}
        </style>
    </div>
    <?php
    return ob_get_clean();
}