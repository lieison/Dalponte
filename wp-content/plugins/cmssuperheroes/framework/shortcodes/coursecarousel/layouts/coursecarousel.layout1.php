<h1 id="in-shortcoder-coursecarouse">This shortcoder coursecarouse</h1>
<div id="cs_carousel_course<?php echo esc_attr($date); ?>" class="cs-carousel-course cs-carousel-course-<?php echo $styles;?> <?php echo esc_attr($cl_show).' '.esc_attr($el_class); ?>">

    <?php if ($title != "" || $description != "") { ?>
    <div class="cs-header <?php echo $heading_style;?>">
        <?php if ($title != "") { ?>
            <<?php echo $heading_size; ?> class="cs-title <?php echo $title_align;?>" <?php if($title_color){ echo 'style="color:'.$title_color.';"'; }; ?>><span class="line"><?php echo esc_attr($title); ?></span></<?php echo $heading_size; ?>>
        <?php } ?>
        <?php if ($subtitle !=""){ ?>
            <<?php echo $subtitle_heading_size; ?> class="cs-subtitle <?php echo $title_align;?>"><?php echo esc_attr($subtitle); ?></<?php echo $subtitle_heading_size; ?>>
        <?php }?>
        <?php if ($description != "") { ?>
            <p class="cs-desc <?php echo $title_align;?>"><?php echo esc_attr($description); ?></p>
        <?php } ?>
    </div>
    <?php } ?>
    <div class="cs-content">
        <div class="cs-carousel-list <?php echo $pager_align;?>">
            <div id="cs_carousel_course_<?php echo esc_attr($date); ?>" data-moveslides="<?php echo esc_attr($number_slide); ?>" data-auto="<?php echo esc_attr($auto_scroll); ?>" data-prevselector="#cs_carousel_course<?php echo esc_attr($date); ?> .prev" data-nextselector="#cs_carousel_course<?php echo esc_attr($date); ?> .next" data-touchenabled="1" data-controls="true" data-pager="<?php echo esc_attr($show_pager);?>" data-pause="4000"  data-infiniteloop="true" data-adaptiveheight="true" data-speed="<?php echo esc_attr($speed_slide); ?>" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="<?php echo esc_attr($max_slide); ?>" data-minslides="<?php echo esc_attr($min_slide); ?>" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                <?php
                $counter =0;
                while ($wp_query->have_posts()) : $wp_query->the_post();

                $attachment_full_image = "";
                if (has_post_thumbnail() and wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)) {
                    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                    $attachment_full_image = $attachment_image[0];
                } else {
                	$attachment_full_image = get_template_directory_uri().'/framework/shortcodes/coursecarousel/images/no-image.jpg';
                }
                $counter++;
                if($rows == 1){
                        echo '<div class="cs-carousel-item-wrap">';
                    }else{
                        if($counter % $rows == 1){
                            echo '<div class="cs-carousel-item-wrap">';
                        }
                    }
                ?>
                    <div class="cs-carousel-item" <?php if(!$counter % $rows == 0) echo 'style="margin-bottom:'.esc_attr($margin_item).'px;"'; ?>>
                        <article id="post-<?php echo the_ID() ?>" <?php  post_class(); ?>>
                            <div class="cs-carousel-container">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="cs-course-image">
                                        <?php if($crop_image){
                                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                            $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                                            echo '<img class="attachment-featuredImageCropped" src="'. esc_url($image_resize)  .'" />';
                                        }else{
                                           echo get_the_post_thumbnail($post->ID);
                                        } ?>
                                    </div>
                                <?php } else { ?>
                                	<?php
                                		$no_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                                		if($crop_image){
                                			$image_resize = mr_image_resize( $no_image, $width_image, $height_image, true, false );
                                		}
                                	?>
                                	<div class="cs-carousel-image no-image">
                                		<?php if($crop_image){ ?>
					                		<img alt="<?php the_title(); ?>" src="<?php echo $image_resize; ;?>" />
					                	<?php } else { ?>
					                		<img alt="<?php the_title(); ?>" src="<?php echo $no_image; ;?>" />
					                	<?php } ?>
					                </div>
                                <?php } ?>
                                <div class="cs-course-content">
                                    <?php if($show_date) :?>
                                    <span class="course-date">
                                        <span class="month"><?php echo get_the_date('M'); ?></span>
                                        <span class="date"><?php echo get_the_date('d'); ?></span>
                                    </span>
                                    <?php endif; ?>
                                    <div class="cs-course-content-inner">
                                        <?php if ($show_title) { ?>
                                            <<?php echo $item_heading_size; ?> class="cs-course-title">
                                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="">
                                                    <?php the_title(); ?>
                                                </a>
                                            </<?php echo $item_heading_size; ?>>
                                        <?php } ?>
                                        <div class="cs-course-content-hidden">
                                            <?php if ($show_category) : ?>
                                                <div class="cs-carousel-course-category">
                                                    <?php echo strip_tags (get_the_term_list($post->ID, 'category', '', ', ', '')); ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($show_description) { ?>
                                                <div class="cs-carousel-course-description">
                                                    <?php if ($excerpt_length != -1) { ?>
                                                        <p><?php echo cshero_content_max_charlength(strip_tags(get_the_content()), $excerpt_length); ?></p>
                                                    <?php } else { ?>
                                                        <p><?php the_content(); ?></p>
                                                    <?php } ?>
                                                </div>
                                            <?php } ?>
                                            <?php if($show_read_more || $show_popup) :?>
                                                <div class="cs-course-link-wrap">
                                                    <div class="cs-course-link-inner">
                                                        <?php if($show_read_more) :?>
                                                            <a class="btn btn-default" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="">
                                                                <?php echo $read_more; ?>
                                                            </a>
                                                        <?php endif;?>
                                                        <?php if($show_popup) :?>
                                                            <a class="colorbox btn btn-default" title="<?php the_title(); ?>" href="<?php echo esc_url($attachment_full_image); ?>" rel="">
                                                                <?php echo $popup_text; ?>
                                                            </a>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php
                if($rows == 1){
                    echo '</div>';
                }else{
                    if(($counter % $rows == 0)||($counter==$wp_query->post_count)){
                        echo '</div>';
                    }
                }
                endwhile;
                wp_reset_query();
                ?>
            </div>
        </div>
        <?php if($show_nav){ ?>
            <div class="cs-nav <?php echo $nav_align;?>">
                <ul>
                    <li class="prev"></li>
                    <li class="next"></li>
                </ul>
            </div>
        <?php } ?>
        <?php if($morelink!=''):?>
            <div class="cs-morelink"><a class="btn btn-default" href="<?php echo $morelink;?>" class="" ><?php echo $moretext;?></a></div>
        <?php endif;?>
    </div>
</div>