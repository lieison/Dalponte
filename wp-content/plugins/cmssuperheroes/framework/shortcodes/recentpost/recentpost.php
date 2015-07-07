<?php
/* --------------------------------------------------------------------- */
/* Shortcode Recent Post */
/* --------------------------------------------------------------------- */
add_shortcode('cs-shortcode-recent-post', 'cs_shortcode_recent_post_render');

function cs_shortcode_recent_post_render($atts, $content = null) {
    global $post, $wp_query, $post_option;

    extract(shortcode_atts(array(
                'title' => '',
                'heading_size'=>'h3',
                'title_align'=>'',
                'title_color'=>'',
                'heading_style'=>'',
                'subtitle'=>'',
                'subtitle_heading_size'=>'h4',
                'description' => '',

                'type' => '',
                'category' => '',
                'content_align'=>'',
                'content_color'=>'',

                'show_title' => false,
                'item_heading_size' => 'h3',
                'crop_image' => '0',
                'width_image' => 300,
                'height_image' => 200,
                'excerpt_length' => 100,
                'show_category' => false,
                'show_date' => false,
                'date_type' => 'details',
                'columns' => 3,

                'posts_per_page' => 12,
                'read_more' => '-1',
                'orderby' => 'date',
                'order' => 'desc',
                'layout' => 'style-1',
                'box_shadow'=>'5px 3px 4px #eee',
                'view_all_url'=>'',
                'view_all'=>'',
                'el_class' => ''
                    ), $atts));

    if ($posts_per_page == '' || $posts_per_page <= $columns) {
        $posts_per_page = $columns;
    }
    $date = time() . '_' . uniqid(true);
    $cs_massonry_layout='cs-grid-layout';
    if($type=='masonry'){
        wp_enqueue_script('jquery-isotope');
    	wp_enqueue_script('jquery-imagesloaded');
    	$cs_massonry_layout = 'cs-masonry-layout';
    }

    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
            $category[] = trim($cat);
        endforeach;
        $args = array(
            'posts_per_page' => $posts_per_page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $category
                )
            ),
            'orderby' => $orderby,
            'order' => $order,
            'post_type' => 'post',
            'post_status' => 'publish'
        );
    } else {
        $args = array(
            'posts_per_page' => $posts_per_page,
            'orderby' => $orderby,
            'order' => $order,
            'post_type' => 'post',
            'post_status' => 'publish'
        );
    }

    $span = "col-xs-12 col-sm-4 col-md-4 col-lg-4";
    switch ($columns) {
        case 1:
            $span = "col-xs-12 col-sm-12 col-md-12 col-lg-12";
            break;
        case 2:
            $span = "col-xs-12 col-sm-6 col-md-6 col-lg-6";
            break;
        case 3:
            $span = "col-xs-12 col-sm-4 col-md-4 col-lg-4";
            break;
        case 4:
            $span = "col-xs-12 col-sm-3 col-md-3 col-lg-3";
            break;
        case 6:
            $span = "col-xs-12 col-sm-2 col-md-2 col-lg-2";
            break;
        default:
            $span = "col-xs-12 col-sm-4 col-md-4 col-lg-4";
    }

    $post_option['content_align'] = $content_align;
    $post_option['content_color'] = $content_color;
    $post_option['show_title'] = $show_title;
    $post_option['heading'] = $item_heading_size;
    $post_option['excerpt_length'] = $excerpt_length;
    $post_option['show_title'] = $show_title;
    $post_option['show_category'] = $show_category;
    $post_option['show_date'] = $show_date;
    $post_option['date_type'] = $date_type;
    $post_option['crop_image'] = $crop_image;
    $post_option['width_image'] = $width_image;
    $post_option['height_image'] = $height_image;
    $post_option['read_more'] = $read_more;


    if($title_color!=''){
        $title_color = 'style="color:'.$title_color.';"';
    }

    $recent_class = str_replace('.', '-', $layout);
    $recent_sub_class = substr(strstr($layout, '.'), 1);

    $wp_query = new WP_Query($args);
    ob_start();
    ?>
    
    <div id="cs_recent_post_<?php echo $date ?>" class="cs-recent-post <?php echo $recent_sub_class.'-wrap' ?> <?php echo esc_attr($el_class); ?>" >
        <?php if ($title != "" || $description != "") { ?>
        <div class="cs-header <?php echo $heading_style;?>">
            <?php if ($title != "") { ?>
                <<?php echo $heading_size; ?> class="cs-title <?php echo $title_align;?>" <?php echo $title_color; ?>>
                    <span class="line">
                        <?php echo esc_attr($title); ?>
                    </span>
                    <?php if($view_all!='' && $recent_sub_class == 'layout4'):?>
                            <a class="cshero-viewall" href="<?php echo esc_url($view_all_url);?>" title="<?php echo esc_attr($view_all);?>"><?php echo $view_all;?></a>
                    <?php endif;?>
                </<?php echo $heading_size; ?>>
            <?php } ?>

            <?php if ($subtitle !=""){ ?>
                <<?php echo $subtitle_heading_size; ?> class="cs-subtitle <?php echo $title_align;?>"><?php echo esc_attr($subtitle); ?></<?php echo $subtitle_heading_size; ?>>
            <?php }?>
            <?php if ($description != "") { ?>
                <p class="cs-desc <?php echo $title_align;?>"><?php echo esc_attr($description); ?></p>
            <?php } ?>
        </div>
        <?php } ?>
        <div class="cs-content clearfix">
            <?php if ($wp_query->have_posts()) { ?>
                <div class="cs-recent-post <?php echo isset($output)?$output:''; ?> <?php echo $cs_massonry_layout .' '.$recent_class.' '. $recent_sub_class;?>" data-columns="<?php echo $columns;?>" data-type="<?php echo $type;?>">
                    <?php
                    $index = 1;
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        ?>

                        <?php if ($index == 1 && $type !='masonry') { ?>
                            <div class="row">
                            <?php } ?>
                            <div class="cs-recent-post-item <?php if($type=='masonry') echo 'cs-masonry-layout-item';?> <?php echo esc_attr($span); ?>">
                                <div class="cs-recent-post-container <?php echo $content_align;?>" style="color:<?php echo $content_color;?>;box-shadow:<?php echo $box_shadow;?>;">
                                    <?php
                                        $file_layout= "cms_templates/recentpost/layouts/$layout.php";
                                        if( locate_template($file_layout) ) {
                                            require locate_template($file_layout);
                                        } else {
                                            require  "layouts/$layout.php";
                                        }
                                        
                                    ?>
                                </div>
                            </div>
                            <?php
                            if ($index + 1 > $columns && $type !='masonry') {
                                $index = 0;
                                ?>
                            </div>
                            <?php
                        }
                        $index++;
                        ?>
                    <?php endwhile; ?>
                </div>
            <?php } else { ?>
                <span class="notfound">No post found!</span>
            <?php } ?>
        </div>

    </div>
    <?php if($view_all!='' && $recent_sub_class != 'layout4'):?>
        <div class="cshero-viewall text-center clearfix">
            <a class="btn btn-default" href="<?php echo esc_url($view_all_url);?>" title="<?php echo esc_attr($view_all);?>"><?php echo $view_all;?></a>
        </div>
    <?php endif;?>

    <?php
    wp_reset_query();
    wp_reset_postdata();
    return ob_get_clean();
}
?>