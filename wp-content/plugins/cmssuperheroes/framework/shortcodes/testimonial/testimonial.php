<?php
/* --------------------------------------------------------------------- */
/* Shortcode Testimonial */
/* --------------------------------------------------------------------- */
add_shortcode('cshero-testimonial', 'cshero_testimonial_render');

function cshero_testimonial_render($atts, $content = null) {
        global $post, $wp_query, $testimonial_options, $smof_data;
        extract(shortcode_atts(array(
            /* General Option*/
            'title' => '',
            'heading_size' =>'h3',
            'heading_icon'=>'',
            'heading_align' =>'',
            'heading_color' =>'',
            'heading_text_style'=>'',
            'subtitle' => '',
            'subtitle_heading_size'=>'h4',
            'description' => '',
            /* Source option */
            'category' => '',
            'posts_per_page' => '12',
            'orderby' => 'none',
            'order' => 'none',
            'meta_key' => '',
            'meta_value' => '',
            /* Layout Option*/
            'type'   => 'slide',
            'layout' => 'testimonial.default',
            'carousel_mode' => 'horizontal',
            'width_item' => '360',
            'margin_item'  => '30',
            'max_slide' => '3',
            'min_slide' => '1',
            'move_slide' => '3',
            'auto_scroll' => '0',
            'speed_scroll' => '500',
            'show_nav' => '0',
            'nav_align' => '',
            'nav_left_icon' => 'fa fa-angle-left',
            'nav_right_icon' => 'fa fa-angle-right', 
            'nav_icon_offset' => '0',
            'nav_arrow_style' => 'default',
            'show_pager' => '0',
            'pager_align'=>'pager-left text-left',
            'pager_style' => 'default',
            
            /* Item Option*/
            'content_align'=>'text-left',
            'show_title' => '1',
            'item_title_heading'=>'h3',
            'item_title_heading_color'=>'#444',
            'quotation_type' => 'none',
            'quotation_left_icon'=>'-1',
            'quotation_right_icon'=>'-1',
            'quotation_left_text'=>'-1',
            'quotation_right_text'=>'-1',
            'quotation_color' => '',
            'quotation_icon_size'=>'48px',

            'show_image'=> '1',
            'crop_image' => '0',
            'width_image' => 360,
            'height_image' => 263,
            'image_border' =>'0',
            'image_align' => '',

            'show_description' => '1',
            'content_color'=>'',
            'content_bg_color'=>'',
            'content_padding'=>'',
            'content_border_radius'=>'',
            'show_category' => '1',
            'show_readmore' => '1',
            'read_more'=>'Read more',
            'excerpt_length' => 300,
            'excerpt_length_font_size' => '',
            
            /* Extra Option */
            'morelink' => '',
            'moretext' => '',
            'el_class' => '',
        ), $atts));
        $date = time() . '_' . uniqid(true);

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
                        'taxonomy' => 'testimonial_category',
                        'field' => 'term_id',
                        'terms' => $category
                    )
                ),
                'orderby' => $orderby,
                'order' => $order,
                'post_type' => 'testimonial',
                'post_status' => 'publish'
            );
        } else {
            $args = array(
                'posts_per_page' => $posts_per_page,
                'orderby' => $orderby,
                'order' => $order,
                'post_type' => 'testimonial',
                'post_status' => 'publish'
            );
        }

        $wp_query = new WP_Query($args);
        ob_start();

        wp_enqueue_script('bxslider');
        wp_enqueue_script('jm-bxslider');

        wp_enqueue_style('testimonial',CSCORE_PLUGIN_URL.'framework/shortcodes/testimonial/css/testimonial.css');

        $heading_style = 'style="color:'.$heading_color.'!important;text-transform:'.$heading_text_style.';"'; 
        /* image style */
        $image_style = 'style="';
        $image_style .= 'border-radius:'.$image_border.';-webkit-border-radius:'.$image_border.';-moz-border-radius:'.$image_border.';-ms-border-radius:'.$image_border.';-o-border-radius:'.$image_border.';';
        if(!$crop_image){
            $image_style .= 'width:100%;';
        }
        if($image_align == 'left') $image_style .= 'margin-right:20px;';
        if($image_align == 'right') $image_style .= 'margin-left:20px;';

        $image_style .= '"';

        /* Overlay Style */
        $overlay_style ='style="';
        $overlay_style .= 'border-radius:'.$image_border.';-webkit-border-radius:'.$image_border.';-moz-border-radius:'.$image_border.';-ms-border-radius:'.$image_border.';-o-border-radius:'.$image_border.';';
        if($content_bg_color != 'transparent'){
            $overlay_style .= 'background-color:'.$content_bg_color.';';
        }
        if($content_align == 'text-center'){
            $overlay_style .= 'margin:0 auto;';
        }
        if($crop_image){
            $overlay_style .= 'width:'.$width_image.'px;height:'.$height_image.'px;';
            $crop_image_size ='style="width:'.$width_image.'px;height:'.$height_image.'px;display: inline-block;"';
        }
        $overlay_style .='"';

        $content_style='padding:'.$content_padding.';';
        if($content_color) $content_style .= 'color:'.$content_color.';';
        if($content_bg_color) $content_style .= 'background-color:'.$content_bg_color.';';
        if($content_border_radius) $content_style .= 'border-radius:'.$content_border_radius.';';

        $nav_icon_left_offset = "auto";
        $nav_icon_right_offset = "auto";
        if($nav_align == 'vertical-center'){
            $nav_icon_left_offset = $nav_icon_offset;
            $nav_icon_right_offset = $nav_icon_offset;
        }

        if($excerpt_length_font_size !='') {
            $excerpt_length_font_size = $excerpt_length_font_size;
        } else {
            $excerpt_length_font_size = $smof_data['typography_0']['font-size'];
        }

        $desc_style ='style="';
            $desc_style .= 'font-size:'.$excerpt_length_font_size.';line-height:normal;';
        $desc_style .='"';

    ?>

        <div id="cshero_testimonial<?php echo esc_attr($date); ?>" class="cshero-testimonial <?php echo str_replace('.','-',$layout).' testimonial-'.$type.' '.esc_attr($el_class); ?>">
            <?php if ($title != "" || $subtitle || $description != "") { ?>
            <div class="cshero-header <?php echo $heading_align;?>">
                <?php if ($title != "") { ?>
                    <<?php echo $heading_size; ?> class="cshero-title" <?php echo $heading_style;?>>
                        <span class="line">
                            <?php if ($heading_icon) : ?>
                                <i class="fa fa-<?php echo esc_attr($heading_icon);?>"></i>
                            <?php endif; ?><?php echo esc_attr($title); ?></span>
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
            <div class="cshero-testimonial-wrapper">
                <?php if($type == 'tab') { ?>

                    <div id="cshero_testimonial_<?php echo esc_attr($date); ?>" data-mode="<?php echo esc_attr($carousel_mode);?>" data-shownav="<?php echo esc_attr($show_nav); ?>" data-pagerSelector="#cshero_testimonial<?php echo $date; ?> .cshero-control" class="slider tab-bxslider">

                <?php } else { ?>
                    <div id="cshero_testimonial_<?php echo esc_attr($date); ?>" data-mode="<?php echo esc_attr($carousel_mode);?>" data-moveslides="<?php echo esc_attr($move_slide);?>" data-auto="<?php echo $auto_scroll; ?>" data-speed="<?php echo esc_attr($speed_scroll);?>" data-prevselector="#cshero_testimonial<?php echo esc_attr($date); ?> .prev" data-nextselector="#cshero_testimonial<?php echo esc_attr($date); ?> .next" data-prevText="<i class='<?php echo esc_attr($nav_left_icon); ?>'></i>" data-nextText="<i class='<?php echo esc_attr($nav_right_icon); ?>'></i>" data-pagerSelector="#cshero_testimonial<?php echo $date; ?> .cshero-control" data-onsliderload="true" data-touchenabled="1" data-controls="true" data-pager="<?php echo $show_pager;?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true"  data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="<?php echo esc_attr($max_slide); ?>" data-minslides="<?php echo esc_attr($min_slide); ?>" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                <?php }  ?>
                
                    <?php
                        $counter =0;
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                    ?>
                        <div class="cshero-testimonial-item">
                            <?php
                                $file_layout= "cms_templates/testimonial/layouts/$layout.php";
                                $file_css   = "cms_templates/testimonial/css/$layout.css";
                                if(locate_template($file_layout)){
                                    if(locate_template($file_css))
                                        wp_enqueue_style("testimonial-$layout",get_template_directory_uri()."/".$file_css);
                                    require locate_template($file_layout);
                                }else{
                                        wp_enqueue_style('testimonial-'.$layout, CSCORE_PLUGIN_URL . "framework/shortcodes/testimonial/css/$layout.css");
                                        require  "layouts/$layout.php";
                                    }
                            ?>
                        </div>
                    <?php
                        endwhile;
                    ?>
                    
                </div>
                <?php if($show_pager){ ?>
                    <div class="cshero-pager cshero-control <?php echo $pager_align.' '.$pager_style;?>">
                        <?php
                            if($type == 'tab') {
                                //exit();
                            echo '<div class="cs-thumb">';
                            $cs_team_count =0;
                            while ($wp_query->have_posts()) : $wp_query->the_post();
                                
                                if (has_post_thumbnail()){ ?>
                                    <?php
                                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'thumbnail', false);
                                        if($crop_image){
                                            $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                                            echo '<a href="" data-slide-index="'.$cs_team_count.'">';
                                            echo '<img alt="" src="'. esc_url($image_resize) .'" '.$image_style.' />';
                                            echo '</a>';
                                        }else{
                                            echo '<a href=""  data-slide-index="'.$cs_team_count.'">';
                                            echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" '.$image_style.' />';
                                           echo '</a>';
                                        }
                                    ?>
                                    
                                <?php  } else {
                                    $no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                                    if($crop_image){
                                        $image_resize = mr_image_resize( $no_image, $width_image, $height_image, true, false );
                                    }
                                    ?>
                                    <a href="" data-slide-index="<?php echo $cs_team_count;?>" >
                                        <?php if($crop_image){ ?>
                                            <img alt="" src="<?php echo $image_resize; ;?>" <?php echo $image_style; ?> />
                                        <?php } else { ?>
                                            <img alt="" src="<?php echo $no_image; ;?>" <?php echo $image_style; ?> />
                                        <?php } ?>
                                    </a>
                                    <?php
                                
                                }
                                $cs_team_count++;
                            endwhile;
                            echo '</div>';
                        } ?>
                    </div>
                <?php } ?>
                <?php wp_reset_query(); ?>
                <?php if($show_nav){ ?>
                <div class="cshero-nav <?php echo $nav_align.' '.$nav_arrow_style; ?>">
                    <ul>
                        <li class="prev" style="left:<?php echo $nav_icon_left_offset;?>;"></li>
                        <li class="next" style="right:<?php echo $nav_icon_right_offset;?>;"></li>
                    </ul>
                </div>
                <?php } ?>
                <?php if($morelink!=''):?>
                    <div class="cs-morelink text-center">
                        <a href="<?php echo $morelink;?>" class="btn btn-default" >
                            <?php if($moretext !='') echo $moretext; else echo __('View All', CSCORE_NAME) ; ?>
                        </a>
                    </div>
                <?php endif;?>
            </div>
        </div>
        <?php
        
        wp_reset_postdata();
        return ob_get_clean();
}
?>