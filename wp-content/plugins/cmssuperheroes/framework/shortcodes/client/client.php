<?php
add_shortcode('cshero-clients-carousel', 'cshero_clients_carousel_render');
function cshero_clients_carousel_render($atts, $content = null) {
        global $post, $wp_query;
        extract(shortcode_atts(array(
                'title' => '',
                'heading_size' => 'h3',
                'heading_icon' => '',
                'title_align' => 'text-left',
                'title_color' => '',
                'heading_text_style' => 'none',
                'subtitle' => '',
                'subtitle_heading_size' => 'h4',
                'description' => '',

                'category' => '',
                'crop_image' => '0',
                'width_image' => '320',
                'height_image' => '200',
                'show_client_title' => '1',
                'client_title_size' => 'h3',
                'client_title_align' => 'text-left',
                'client_title_color' => '',
                'client_title_text_style' => '', 
                'show_link' => '1',

                'layout' => 'default',
                'rows' => 1,
                'carousel_mode' => 'horizontal',
                'min_slide' => '1',
                'max_slide' => '3',
                'item_slide' => '3',
                'width_item' => '320',
                'margin_item' => '30',
                'auto_scroll' => '1',
                'speed' => '500',
                'show_nav' => '1',
                'nav_align' => 'text-left',
                'show_pager' => '1',
                'pager_align' => 'pager-left',
                
                'posts_per_page' => 12,
                'orderby' => 'none',
                'order' => 'none',

                'morelink' => '',
                'moretext' => '',
                'el_class' => ''
            ), $atts));
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
                        'taxonomy' => 'clientscategory',
                        'field' => 'id',
                        'terms' => $category
                    )
                ),
                'orderby' => $orderby,
                'order' => $order,
                'post_type' => 'myclients',
                'post_status' => 'publish'
            );
        } else {
            $args = array(
                'posts_per_page' => $posts_per_page,
                'orderby' => $orderby,
                'order' => $order,
                'post_type' => 'myclients',
                'post_status' => 'publish'
            );
        }
        $wp_query = new WP_Query($args);
        $date = time() . '_' . uniqid(true);
        ob_start();

        wp_enqueue_style('cshero-client-carousel', CSCORE_PLUGIN_URL.'framework/shortcodes/client/css/client.css', array(), '1.0.0');

        wp_enqueue_script('bxslider');
        wp_enqueue_script('jm-bxslider');

        $title_style = 'style="color:'.$title_color.';text-transform:'.$heading_text_style.';"';
        $client_title_style = 'style="color:'.$client_title_color.';text-transform:'.$client_title_text_style.';"';

        ?>
        <div  id="cshero_client_carousel<?php echo esc_attr($date); ?>" class="cshero-carousel cshero-client-carousel <?php echo str_replace('.','-',$layout).' '.esc_attr($el_class); ?>">
            <?php if ($title != "" || $subtitle != '' || $description != "") { ?>
            <div class="cshero-header <?php echo esc_attr($title_align);?>">
                <?php if ($title != "") { ?>
                    <<?php echo $heading_size; ?> class="cshero-title" <?php echo $title_style;?>>
                        <?php if($heading_icon !=''){?><i class="fa fa-<?php echo esc_attr($heading_icon);?>"></i><?php } ?>
                        <span class="line"><?php echo esc_attr($title); ?></span>
                    </<?php echo $heading_size; ?>>
                <?php } ?>
                <?php if ($subtitle !=""){ ?>
                    <<?php echo $subtitle_heading_size; ?> class="cshero-subtitle"><?php echo esc_attr($subtitle); ?></<?php echo $subtitle_heading_size; ?>>
                <?php }?>
                <?php if ($description != "") { ?>
                    <div class="cshero-desc"><?php echo esc_attr($description); ?></div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="cshero-client-content">
                <div class="cshero-client-list">
                    <div id="cshero_client_carousel_<?php echo esc_attr($date); ?>" data-mode="<?php echo esc_attr($carousel_mode);?>" data-moveslides="<?php echo esc_attr($item_slide);?>" data-auto="<?php echo esc_attr($auto_scroll); ?>" data-prevselector="#cshero_client_carousel<?php echo esc_attr($date); ?> .prev" data-nextselector="#cshero_client_carousel<?php echo $date; ?> .next" data-touchenabled="1" data-controls="true" data-pager="<?php echo $show_pager;?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true" data-speed="<?php echo esc_attr($speed); ?>" data-pagerSelector="#cshero_client_carousel<?php echo $date; ?> .cshero-control" data-minSlides="<?php echo esc_attr($min_slide);?>" data-maxSlides="<?php echo esc_attr($max_slide);?>" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                        <?php
                            $file_layout= "cms_templates/client/layouts/$layout.php";
                            $file_css   = "cms_templates/client/css/$layout.css";
                            if(locate_template($file_layout)) {
                                if(locate_template($file_css)) {
                                    wp_enqueue_style("client-$layout",get_template_directory_uri()."/".$file_css);
                                }
                                require locate_template($file_layout);
                             }else{
                                wp_enqueue_style("cshero-$layout", CSCORE_PLUGIN_URL . "framework/shortcodes/client/css/$layout.css");
                                require  "layouts/$layout.php";
                            }
                        ?>
                    </div>
                <?php if($show_pager) {?>
                <div class="cshero-control <?php echo esc_attr($pager_align);?>"></div>
                <?php } ?>

                <?php if($show_nav){ ?>
                <div class="cshero-nav <?php echo esc_attr($nav_align);?>">
                    <ul>
                        <li class="prev"></li>
                        <li class="next"></li>
                    </ul>
                </div>
                <?php } ?>
                </div>
                <?php if($morelink != '' && $moretext != ''):?>
                    <div class="cshero-morelink text-center">
                        <a href="<?php echo $morelink;?>" class="btn btn-default" ><?php echo $moretext;?></a>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <?php
        wp_reset_postdata();
        return ob_get_clean();

}
?>