<?php
add_shortcode('cs-shop-carousel', 'cs_shop_carousel_render');

function cs_shop_carousel_render($atts) {
        extract(shortcode_atts(array(
        'title' => '',
        'heading_size'=>'',
        'heading_style'=>'',
        'title_align'=>'',
        'title_color'=>'',
        'subtitle'=>'',
        'subtitle_heading_size'=>'',
        'description' => '',
        /* Carousel Option */
        'layout' => 'shopcarousel.layout1',
        'carousel_mode' => 'horizontal',
        'category' => '',
        'width_item' => 340,
        'margin_item' => 30,
        'min_slide'=>'1',
        'max_slide'=>'3',
        'move_slide' =>'3',
        'speed' => 500,
        'rows' => 1,
        'auto_scroll' => '1',
        'show_nav' => '1',
        'nav_align'=>'text-center',
        'nav_left_icon' => 'fa fa-angle-left',
        'nav_right_icon' => 'fa fa-angle-right', 
        'nav_icon_offset' => '0',
        'nav_type' => 'default',
        'show_pager' => '1',
        'pager_align' => 'pager-center text-center',
        'pager_style' => 'default',

        /* Item Layout */
        'content_align' =>'',
        'content_color' => '',
        'content_hover_color' => '',
        'content_bg_color' => '',
        'content_bg_hover_color' => '',
        'overlay_bg_color' => 'rgba(0,0,0,0.7)',
        'overlay_appear'  => '',
        'content_padding' => '',
        'show_border' => '0',

        'show_title' => '1',
        'item_title_color'=>'',
        'item_heading_size'=>'',
        'show_image'=>'1',
        'crop_image'=>'',
        'width_image'=>'360',
        'height_image'=>'263',
        'image_border'=>'',
        'show_description' => '',
        'excerpt_length' => 100,
        'show_category' => '1',
        'category_color' => '#ffffff',
        'show_price' => '1',
        'show_rate' =>'0',
        'show_details_btn' => '1',
        'view_details_btn_text' => 'View Details',
        'show_add_to_cart' => '1',
        'button_type' => 'default',
        /*'add_to_cart_btn_text' => 'Add to cart',*/
        'show_author' => '0',
        'show_date' => '0',
        'date_format' => 'M d Y',
        'posts_per_page' => -1,
        'morelink' => '',
        'moretext' => '',
        'view_all_button_type' => 'btn btn-default',
        'el_class' => '',
        'orderby' => 'none',
        'order' => 'none'
                ), $atts));
        $args = array();
        if (isset($category) && $category != '') {
            $cats = explode(',', $category);
            $category = array();
            foreach ((array) $cats as $cat) :
            $category[] = trim($cat);
            endforeach;
            $args = array(
                'posts_per_page' => $posts_per_page,
                'post_type' => 'product',
                'tax_query' => array(
                        array(
                                'taxonomy' => 'product_cat',
                                'field' => 'id',
                                'terms' => $category
                        )
                ),
                'order' => $order,
                'post_status' => 'publish'
            );
        }
        else{
            $args = array(
                    'posts_per_page' => $posts_per_page,
                    'post_type' => 'product',
                    'order' => $order,
                    'post_status' => 'publish'
            );
        }
        /* Orderby */
        if ($orderby == 'price') {
            $args['meta_key'] = '_price';
            $args['orderby']  = 'meta_value_num';
        }
        else if ($orderby == 'rand') {
            $args['orderby']  = 'rand';
        }
        else if ($orderby == 'sales') {
            $args['meta_key'] = 'total_sales';
            $args['orderby']  = 'meta_value_num';
        }
        else {
            $args['orderby']  = $orderby;
        }

        $products = new WP_Query($args);

        ob_start();
        
        $date = time() . '_' . uniqid(true);
        $speed_scroll  = $speed;
        $shortcodes_add_to_cart_button_type = $button_type;
        
        wp_enqueue_script('bxslider');
        wp_enqueue_script('jm-bxslider');
        wp_enqueue_style('shopcarousel', CSCORE_PLUGIN_URL.'framework/shortcodes/shopcarousel/css/shopcarousel.css', array(), '1.0.0');
        $cls = $el_class;
        if($show_border) $cls .= ' content_border';
        
        /* Navigation Position */
        if($nav_align =='top-left') $nav_align .=' nav-top text-left';
        if($nav_align =='top-center') $nav_align .=' nav-top text-center';
        if($nav_align =='top-right') $nav_align .=' nav-top text-right';

        /* Overlay Style */
        $overlay_style ='style="'; 
        $overlay_style .= 'border-radius:'.$image_border.';-webkit-border-radius:'.$image_border.';-moz-border-radius:'.$image_border.';-ms-border-radius:'.$image_border.';-o-border-radius:'.$image_border.';background-color:'.$overlay_bg_color.';color:'.$content_color.';';
        
        /* $crop_image_size = '';
        if($crop_image){
            $overlay_style .= 'width:'.$width_image.'px;height:'.$height_image.'px;max-width:100%;';
            $crop_image_size .='style="width:'.$width_image.'px;height:'.$height_image.'px;display: inline-block;"';
        } */
        $overlay_style .='"';

        $content_style = 'style="';
        $content_style .= 'color:'.$content_color.'; text-align:'.$content_align.';background-color:'.$content_bg_color.';padding:'.$content_padding.';';
        $content_style .='"';

        $content_hover_style ='color:'.$content_hover_color.' !important; background-color:'.$content_bg_hover_color.' !important;';

        $image_style = '';
        if($image_border !='') $image_style .= 'border-radius:'.$image_border.';-webkit-border-radius:'.$image_border.';-moz-border-radius:'.$image_border.';-ms-border-radius:'.$image_border.';-o-border-radius:'.$image_border.';';

        $nav_icon_left_offset = "";
        $nav_icon_right_offset = "";
        if($nav_align == 'vertical-center'){
            $nav_icon_left_offset = $nav_icon_offset;
            $nav_icon_right_offset = $nav_icon_offset;
        }
        $nav_arrow_style = $nav_type;

        ob_start();
        if ($products->have_posts()) { ?>
            
            <div id="cshero_carousel_product<?php echo esc_attr($date); ?>" class="cshero-shortcode cshero-shopcarousel cshero-<?php echo str_replace('.','-',$layout).' '.$cls; ?>">

                <style type="text/css" scoped>
                    #cshero_carousel_product<?php echo esc_attr($date); ?> .product-image img {<?php echo $image_style; ?>}
                    #cshero_carousel_product<?php echo esc_attr($date); ?> .cshero-carousel-item .product-content .product-category > a{color:<?php echo $category_color;?>;}
                    #cshero_carousel_product<?php echo esc_attr($date); ?> .cshero-carousel-item .product-content *{color:<?php echo $content_color; ?>;}
                    #cshero_carousel_product<?php echo esc_attr($date); ?> .cshero-carousel-item:hover .product-content {<?php echo $content_hover_style; ?>}
                </style>

                <?php if ($title != "" || $description != "") { ?>
                <div class="cs-header <?php echo $heading_style;?>">
                    <?php if ($title != "") { ?>
                        <<?php echo $heading_size; ?> class="cs-title <?php echo $title_align;?>" style="color:<?php echo $title_color; ?>;">
                            <span class="line"><?php echo esc_attr($title); ?></span>
                        </<?php echo $heading_size; ?>>
                    <?php } ?>
                    <?php if ($subtitle !=""){ ?>
                        <<?php echo $subtitle_heading_size; ?> class="cs-subtitle <?php echo $title_align;?>">
                            <?php echo esc_attr($subtitle); ?>
                        </<?php echo $subtitle_heading_size; ?>>
                    <?php }?>
                    <?php if ($description != "") { ?>
                        <p class="cs-desc <?php echo $title_align;?>"><?php echo esc_attr($description); ?></p>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="cs-content"> 
                    <div class="cs-carousel-product-list">
                        <div id="cshero_carousel_product_<?php echo esc_attr($date); ?>" data-mode="<?php echo esc_attr($carousel_mode);?>" data-moveslides="<?php echo esc_attr($move_slide);?>" data-auto="<?php echo $auto_scroll; ?>" data-speed="<?php echo esc_attr($speed_scroll);?>" data-prevselector="#cshero_carousel_product<?php echo esc_attr($date); ?> .prev" data-nextselector="#cshero_carousel_product<?php echo esc_attr($date); ?> .next" data-prevText="<i class='<?php echo esc_attr($nav_left_icon); ?>'></i>" data-nextText="<i class='<?php echo esc_attr($nav_right_icon); ?>'></i>" data-pagerSelector="#cshero_carousel_product<?php echo $date; ?> .cshero-control" data-onsliderload="true" data-touchenabled="1" data-controls="true" data-pager="<?php echo $show_pager;?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true"  data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="<?php echo esc_attr($max_slide); ?>" data-minslides="<?php echo esc_attr($min_slide); ?>" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                            <?php
                                $counter = 0;
                                while ($products->have_posts()) : $products->the_post();
                                $counter++;
                                ?>
                                <?php
                                global $product;

                                /* Ensure visibility */
                                if (!$product || !$product->is_visible())
                                    return;

                                /* Extra post classes */
                                $classes = array();

                                $classes[] = 'cs-carousel-item-wrap '.$content_align;
                                if($rows == 1){
                                    echo '<div class="cs-carousel-item-full">';
                                }else{
                                    if($counter % $rows == 1){
                                        echo '<div class="cs-carousel-item-full">';
                                    }
                                }

                                ?>
                                <div <?php post_class($classes); ?> <?php if(!($counter % $rows == 0) and $rows>1) echo 'style="margin-bottom:'.$margin_item.'px;"'; ?>>
                                    <?php
                                        $file_layout= "cms_templates/shopcarousel/layouts/$layout.php";
                                        $file_css   = "cms_templates/shopcarousel/css/$layout.css";
                                        if(locate_template($file_layout)){
                                            if(locate_template($file_css))
                                                wp_enqueue_style("shopcarousel-$layout",get_template_directory_uri()."/".$file_css);
                                                require locate_template($file_layout);
                                        }else{
                                            wp_enqueue_style('counter', CSCORE_PLUGIN_URL . "framework/shortcodes/shopcarousel/css/$layout.css");
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
                            endwhile; /* end of the loop. */
                            ?>
                        </div>
                        
                    </div>
                    <?php if($show_pager) { ?>
                        <div class="cshero-control <?php echo $pager_align.' '.$pager_style;?>"></div>
                    <?php } ?>
                    <?php if($show_nav){ ?>
                    <div class="cshero-nav <?php echo $nav_align.' '.$nav_arrow_style; ?>">
                        <ul>
                            <li class="prev" style="left:<?php echo $nav_icon_left_offset;?>;"></li>
                            <li class="next" style="right:<?php echo $nav_icon_right_offset;?>;"></li>
                        </ul>
                    </div>
                    <?php } ?>
                    <?php if($morelink!=''):?>
                        <div class="cshero-morelink">
                            <a href="<?php echo $morelink;?>" class="<?php echo esc_attr($view_all_button_type); ?>" >
                                <?php if($moretext !='') echo $moretext; else echo __('View All', CSCORE_NAME) ; ?>
                            </a>
                        </div>
                    <?php endif;?>
                </div>
            </div>

        <?php wp_reset_postdata();
        ?>
        
        <?php }
        return '<div class="woocommerce">' . ob_get_clean() . '</div>';
}
