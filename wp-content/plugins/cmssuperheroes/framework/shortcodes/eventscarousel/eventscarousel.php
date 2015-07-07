<?php
add_shortcode('cs-event-carousel', 'cs_shortcode_event_carousel');

function cs_shortcode_event_carousel($atts, $content = null)
{
    global $post, $wpdb;
    extract(shortcode_atts(array(
        /* General Option */
        'title' => '',
        'heading_size' => 'h3',
        'heading_icon' => '',
        'title_align' => '',
        'title_color' => '',
        'heading_style' => '',
        'subtitle' => '',
        'subtitle_heading_size' => 'h4',
        'heading_text_style' => '',
        'description' => '',

        /* Source option */
        'category' => '',
        'posts_per_page' => 12,
        'meta_key' => '',
        'meta_value' => '',
        'orderby' => 'e.start_date',
        'order' => 'ASC',

        /* Layout Option*/
        'layout' => 'eventscarousel.layout1',
        'carousel_mode' => 'horizontal',
        'rows' => 1,
        'width_item' => '340',
        'margin_item' => '30',
        'min_slide'=>'1',
        'max_slide'=>'3',
        'move_slide' =>'3',
        'auto_scroll' => '0',
        'speed_scroll' =>'500',
        'show_nav' => '0',
        'nav_align'=>'',
        'nav_left_icon' => 'fa fa-angle-left',
        'nav_right_icon' => 'fa fa-angle-right', 
        'nav_icon_offset' => '0',
        'nav_arrow_style' => 'default',
        'show_pager' => '0',
        'pager_align'=>'pager-left text-left',

        /* Item Option */        
        'content_align' => '',
        'content_color' => '',
        'show_image' => '1',
        'crop_image' => '0',
        'width_image' => '360',
        'height_image' => '240',
        'image_border' => '0',
        'item_heading_size' => 'h3',
        'show_title' => '',
        'item_title_color' => '',
        'show_description' => '0',
        'excerpt_length' => 100,
        'show_category' => '0',
        'show_popup' => '0',
        'show_start_date' => '1',
        'show_start_time' => '1',
        'show_end_date' => '0',
        'show_end_time' => '1',
        'show_date' => '0',
        'date_format'  => 'd M',
        'show_address' => '0',
        'show_comment' => '0',
        'show_author' => '0',
        'show_read_more' => '0',
        'read_more' => 'Read more',

        /* Extra Option*/
        'el_class' => '',
        'morelink' => '',
        'moretext' => 'View All'
    ), $atts));

    $args = array(
        'posts_per_page' => $posts_per_page,
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
    
    $date = time() . '_' . uniqid(true);
    ob_start();
    wp_enqueue_style('colorbox');
    wp_enqueue_style('eventscarousel', CSCORE_PLUGIN_URL . 'framework/shortcodes/eventscarousel/css/eventscarousel.css', array(), '1.0.0');

    wp_enqueue_script('colorbox');
    wp_enqueue_script('bxslider');
    wp_enqueue_script('jm-bxslider');

    $nav_pos ='';
    if($nav_align == '1') $nav_pos = 'top top-left text-left';
    if($nav_align == '2') $nav_pos = 'top top-center text-center';
    if($nav_align == '3') $nav_pos = 'top top-right text-right';

    $image_style = 'style="';
    $image_style .= 'border-radius:' . $image_border . ';-webkit-border-radius:' . $image_border . ';-moz-border-radius:' . $image_border . ';-ms-border-radius:' . $image_border . ';-o-border-radius:' . $image_border . ';';
    $image_style = '"';

    $content_style = 'style="';
        $content_style .= 'color:'.$content_color.';';
    $content_style .= '"';

    $_title_color = 'style="';
    if ($title_color) {
        $_title_color .= 'color:' . $title_color . '!important;';
    }
    if ($heading_text_style) {
        $_title_color .= 'text-transform:' . $heading_text_style . ';';
    }
    $_title_color .= '"';
    ?>

    <div class="cshero-eventscarousel-post <?php echo str_replace('.','-',$layout).' '.esc_attr($el_class); ?>">
    <?php if ($title != "" || $description != "") { ?>
    <div class="cshero-header <?php echo $heading_style.' '.$title_align;?>">
        <?php if ($title != "") { ?>
            <<?php echo $heading_size; ?> class="cs-title" <?php echo $_title_color; ?>>
                <span class="line">
                    <?php if ($heading_icon) : ?>
                        <i class="fa fa-<?php echo esc_attr($heading_icon);?>"></i>
                    <?php endif; ?><?php echo esc_attr($title); ?></span>
            </<?php echo $heading_size; ?>>
        <?php } ?>
        <?php if ($subtitle !=""){ ?>
            <<?php echo $subtitle_heading_size; ?> class="cs-subtitle" <?php echo $_title_color; ?>><?php echo esc_attr($subtitle); ?></<?php echo $subtitle_heading_size; ?>>
        <?php }?>
        <?php if ($description != "") { ?>
            <p class="cs-desc"><?php echo esc_attr($description); ?></p>
        <?php } ?>
    </div>
    <?php } ?>
    <?php if($show_nav && $nav_pos != ''){ ?>
        <div class="cshero-nav <?php echo $nav_pos; ?>">
            <ul>
                <li class="prev"></li>
                <li class="next"></li>
            </ul>
        </div>
    <?php } ?>
    <div class="cs-carousel-list">

        <div id="cshero_eventscarousel_post<?php echo esc_attr($date); ?>" data-mode="<?php echo esc_attr($carousel_mode);?>" data-moveslides="<?php echo esc_attr($move_slide);?>" data-auto="<?php echo $auto_scroll; ?>" data-speed="<?php echo esc_attr($speed_scroll);?>" data-prevselector="#cshero_eventscarousel_post<?php echo esc_attr($date); ?> .prev" data-nextselector="#cshero_eventscarousel_post<?php echo esc_attr($date); ?> .next" data-prevText="<i class='<?php echo esc_attr($nav_left_icon); ?>'></i>" data-nextText="<i class='<?php echo esc_attr($nav_right_icon); ?>'></i>" data-pagerSelector="#cshero_eventscarousel_post<?php echo $date; ?> .cshero-control" data-onsliderload="true" data-touchenabled="1" data-controls="true" data-pager="<?php echo $show_pager;?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true"  data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="<?php echo esc_attr($max_slide); ?>" data-minslides="<?php echo esc_attr($min_slide); ?>" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
            <?php
            $counter =0;
            while ($wp_query->have_posts()) : $wp_query->the_post();
            $counter++;
            if($rows == 1){
                    echo '<div class="cs-carousel-item-wrap">';
                }else{
                    if($counter % $rows == 1){
                        echo '<div class="cs-carousel-item-wrap">';
                    }
                }
                $start_date = get_the_cmsevent_start_timestamp();
                $end_date = get_the_cmsevent_end_timestamp();
                if($date_format == 'd M') { 
                    $start_date = '<span class="date">'.date('d',$start_date).'</span><span class="month">'.date('M',$start_date).'</span>';
                    $end_date = '<span class="date">'.date('d',$end_date).'</span><span class="month">'.date('M',$end_date).'</span>';
                } else {
                    $start_date = date($date_format,$start_date);
                    $end_date = date($date_format,$end_date);
                }
            ?>
            <div class="cs-carousel-item" <?php if(!$counter % $rows == 0 && $rows != '1') echo 'style="margin-bottom:'.esc_attr($margin_item).'px;"'; ?>>
                <?php 
                $file_layout= "cms_templates/eventscarousel/layouts/$layout.php";
                $file_css   = "cms_templates/eventscarousel/css/$layout.css";
                if(locate_template($file_layout)){
                    if(locate_template($file_css))
                        wp_enqueue_style("eventscarousel-$layout",get_template_directory_uri()."/".$file_css);
                        require locate_template($file_layout);
                    }else{
                        wp_enqueue_style('eventscarousel-$layout', CSCORE_PLUGIN_URL . "framework/shortcodes/eventscarousel/css/$layout.css");
                        require  "layouts/$layout.php";
                    }
                ?>
            </div>
            <?php
                if($rows == 1){
                    echo '</div>';
                }else{
                    if($counter % $rows == 0){
                        echo '</div>';
                    }
                }
                endwhile;
            ?>
        </div>
    </div>
    <?php if($show_pager) {?>
    <div class="cshero-control <?php echo $pager_align;?>"></div>
    <?php } ?>
    <?php if($show_nav && $nav_pos == ''){ ?>
        <div class="cshero-nav <?php echo $nav_align.' '.$nav_arrow_style; ?>">
            <ul>
                <li class="prev" style="left:<?php echo $nav_icon_offset;?>;"></li>
                <li class="next" style="right:<?php echo $nav_icon_offset;?>;"></li>
            </ul>
        </div>
    <?php } ?>
    <?php if($morelink!=''):?>
        <div class="csheor-morelink">
            <a href="<?php echo $morelink;?>" class="btn btn-default" >
                <?php echo $moretext; ?>
            </a>
        </div>
    <?php endif;?>
    <?php            
    wp_reset_postdata();
    return ob_get_clean();
}