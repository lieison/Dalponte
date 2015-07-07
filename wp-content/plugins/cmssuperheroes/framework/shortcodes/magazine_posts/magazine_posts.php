<?php
add_shortcode('cshero-magazine-posts', 'cshero_magazine_posts');
function cshero_magazine_posts($params, $content = null) {
    extract(shortcode_atts(array(
        'title' => '',
        'heading_size'=>'h3',
        'title_color' => '',
        'title_transform' => '',
        'categories' => '',
        'item_per_page' => 5,
        'show_image' => '1',
        'date_format' => 'd F Y',
        'crop_image' => '1',
        'width_image' => '370',
        'height_image' => '260',
        'show_date' => '1',
        'show_feature' => '1',
        'show_description' => '1',
        'show_list_image' => '1',
        'show_type' => '0',
        'crop_list_image' => '1',
        'width_list_image' => '70',
        'height_list_image' => '70',
        'show_list_date' => '1',
        'show_list_description' => '0',
        'layout' => 'magazine_posts.layout1',
        'custom_class' => '',
    ), $params));
    $excerpt_length = 150;
    $title_css = ' style="';
    if($title_color!=''){
        $title_css .= ' color:'.$title_color.'; ';
    }
    $title_css .= 'text-transform:'.$title_transform.';';
    $title_css.='"';
    $id = 'cshero_magazine_posts_'.uniqid().'_'.time();
    /* init var */
    $args = array();
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
            $category[] = trim($cat);
        endforeach;
        $args = array(
            'posts_per_page' => $item_per_page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            ),
            'post_type' => 'post',
            'post_status' => 'publish'
        );
    } else {
        $args = array(
            'posts_per_page' => $item_per_page,
            'post_type' => 'post',
            'post_status' => 'publish'
        );
    }
    $wp_query = new WP_Query($args);
    if($show_type){
        $custom_class.=' show-post-type';
    } else {
        $custom_class.=' hide-post-type';
    }
    ob_start();
    ?>
    <div class="cshero-shortcode cshero-magazine-posts <?php echo str_replace('.','-',$layout); ?> <?php echo $custom_class;?>" id="<?php echo $id;?>">
        <?php 
            $file_layout= "cms_templates/magazine_posts/layouts/$layout.php";
            $file_css   = "cms_templates/magazine_posts/css/$layout.css";
            if(locate_template($file_layout)){
                if(locate_template($file_css))
                    wp_enqueue_style("magazine-posts-$layout",get_template_directory_uri()."/".$file_css);    
                require locate_template($file_layout);
            }else{
                wp_enqueue_style("magazine-posts-$layout", CSCORE_PLUGIN_URL . "framework/shortcodes/magazine_posts/css/$layout.css");
                require  "layouts/$layout.php";
            }
        ?>
    </div>
    <?php
    return ob_get_clean();
}