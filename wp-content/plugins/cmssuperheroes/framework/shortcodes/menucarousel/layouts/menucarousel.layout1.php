<div id="cs_carousel_post<?php echo esc_attr($date); ?>" class="cs-carousel-menu-food cs-menu-food-style1 <?php echo esc_attr($cl_show).' '.esc_attr($el_class); ?>">
    <?php if ($title != "" || $description != "") { ?>
    <div class="cs-header <?php echo $heading_style.' '.$title_align;?>">
        <?php if ($title != "") { ?>
            <<?php echo $heading_size; ?> class="cs-title" <?php echo $_title_color; ?>>
                <span class="line"><i class="fa fa-<?php echo esc_attr($heading_icon);?>">&nbsp;</i><?php echo esc_attr($title); ?></span>
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

    <div class="cs-content-menu-food <?php echo $pager_align; ?>">
        <div class="cs-menu-food-list">
            <div id="cs_carousel_post_<?php echo esc_attr($date); ?>" data-moveslides="1" data-auto="<?php echo $auto_scroll; ?>" data-prevselector="#cs_carousel_post<?php echo esc_attr($date); ?> .prev" data-nextselector="#cs_carousel_post<?php echo esc_attr($date); ?> .next" data-onsliderload="" data-touchenabled="1" data-controls="true" data-pager="<?php echo $show_pager;?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true" data-speed="500" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="<?php echo $max_slider; ?>" data-minslides="<?php echo $min_slider; ?>" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                <?php
                $counter =0;
                while ($wp_query->have_posts()) : $wp_query->the_post();

                $counter++;
                if($rows == 1){
                        echo '<div class="cs-menu-food-wrap">';
                    }else{
                        if($counter % $rows == 1){
                            echo '<div class="cs-menu-food-wrap">';
                        }
                    }
                ?>
                    <div class="cs-menu-food-item" <?php if(!$counter % $rows == 0) echo 'style="margin-bottom:'.esc_attr($margin_item).'px;"'; ?>>
                        <article id="post-<?php echo the_ID() ?>" <?php  post_class(); ?>>
                            <div class="cs-menu-food-container">
                                <div class="cs-menu-food-header">
                                    <?php if($show_image == '1') { ?>
                                        <?php
                                        if (has_post_thumbnail()){
                                           $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                            if($crop_image == '1'){

                                                $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                                                echo '<img alt="" class="attachment-featuredImageCropped" src="'. $image_resize .'" />';
                                            }else{
                                               echo '<div class="cs-menu-food-featured-img"><img src="'. esc_attr($attachment_image[0]) .'"   style="'.$image_style.'"  /></div>';
                                            }
                                        } else {
                                            $no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                                            if($crop_image == '1'){
                                                $image_resize = mr_image_resize( $no_image, $width_image, $height_image, true, false );
                                                echo '<div class="cs-menu-food-featured-img no-image">
                                                    <img class="attachment-featuredImageCropped" src="'. $image_resize .'"   style="'.$image_style.'"  /></div>';
                                            }else{
                                               echo '<div class="cs-menu-food-featured-img no-image"><img src="'. $no_image .'"   style="'.$image_style.'"  /></div>';
                                            }

                                        } ?>
                                    <?php } ?>
                                    <?php if($show_popup =='1'): ?>
                                        <?php
                                            $attachment_full_image = "";
                                            if (has_post_thumbnail()) {
                                                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                                $attachment_full_image = $attachment_image[0];
                                            } else {
                                                $attachment_full_image = get_template_directory_uri().'/framework/shortcodes/postcarousel/images/no-image.jpg';
                                            }
                                        ?>
                                        <a href="<?php echo esc_url($attachment_full_image); ?>" class="gallery colorbox">
                                            <?php //echo _e( "Open image", CSCORE_NAME );?>
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <div class="menuFoood-overlay"></div>
                                    <?php endif; ?>
                                </div>

                                <div class="cs-menu-food-body <?php echo esc_attr($content_align);?>" style="color:<?php echo esc_attr($content_color);?>;">
                                    <div class="cs-menu-food-inner clearfix">
                                        <div class="cs-menu-food-meta table clearfix">
                                            <?php if ($show_title == '1') { ?>
                                                <<?php echo $item_heading_size; ?> class="cs-menu-food-title table-cell">
                                                    <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="" style="color: <?php echo esc_attr($item_title_color); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </<?php echo $item_heading_size; ?>>
                                            <?php } ?>
                                            <div class="cs-menu-food-price table-cell">
                                                <span>
                                                <?php
                                                    $price = get_post_meta($post->ID, 'cs_menu_price', true);
                                                    $unit = get_post_meta($post->ID, 'cs_price_unit', true);
                                                    if($unit){
                                                        echo $unit.' '.$price;
                                                    } else {
                                                        echo $price;
                                                    }
                                                ?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php if($show_date =='1') :?>
                                            <span class="cs-menu-food-date"><i class="fa fa-clock-o"></i> <?php echo get_the_date('d.m.Y'); ?></span>
                                        <?php endif; ?>
                                        <?php if ($show_description == '1') { ?>
                                        <div class="cs-menu-food-description" style="color: <?php echo esc_attr($content_color); ?>">
                                            <?php if ($excerpt_length != -1) { ?>
                                                <p><?php echo cshero_content_max_charlength(strip_tags(get_the_content()), $excerpt_length); ?></p>
                                            <?php } else { ?>
                                                <p><?php the_content(); ?></p>
                                            <?php } ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </article>
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
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
    <?php if($show_nav == 'true' || $show_nav == '1'){ ?>
        <div class="cs-nav <?php echo $nav_align; ?>">
            <ul>
                <li class="prev"></li>
                <li class="next"></li>
            </ul>
        </div>
    <?php } ?>
    <?php if($morelink!=''):?>
        <div class="cs-morelink">
            <a href="<?php echo $morelink;?>" class="btn btn-default" >
                <?php if($moretext !='') echo $moretext; else echo __('View All', CSCORE_NAME) ; ?>
            </a>
        </div>
    <?php endif;?>
</div>