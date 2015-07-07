
<article id="post-<?php echo the_ID() ?>" <?php post_class(); ?>>
    <div class="cshero-carousel-container">
            <?php if($show_image == '1') :
                echo '<div class="cshero-eventscarousel-image">';
                $image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                if (has_post_thumbnail() and wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false)){
                    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false);
                    $image = $attachment_image[0];
                }
                if($crop_image == '1'){
                    $image_resize = mr_image_resize( $image, $width_image, $height_image, true, 'c', false );
                    echo '<img alt="" src="'. $image_resize .'" '.$image_style.' />';
                }else{
                    echo '<img src="'. $image .'" '.$image_style.' />';
                }

                if($show_start_date): ?>
                <div class="start-date">
                    <span class="edate"><?php the_cmsevent_start_datetime(); ?></span>
                </div>
                <?php endif; ?>
                <?php if($show_end_date): ?>
                <div class="end-date">
                    <span class="edate"><?php the_cmsevent_end_datetime(); ?></span>
                </div>
                <?php endif; 

                if($show_popup =='1'): ?>
                <div class="overlay">
                    <div class="overlay-content">
                        <a href="<?php echo $image; ?>" class="gallery colorbox">
                            <?php //echo _e( "Open image", CSCORE_NAME );?>
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            <?php endif;
                echo '</div>';
            endif; ?>


        <div class="cshero-carousel-body <?php echo esc_attr($content_align);?>" <?php echo esc_attr($content_style)?>>
            <div class="cshero-carousel-inner clearfix">
                <?php if ($show_title) { ?>
                    <<?php echo $item_heading_size; ?> class="cshero-carousel-title">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel="" style="color: <?php echo esc_attr($item_title_color); ?>">
                            <?php the_title(); ?>
                        </a>
                    </<?php echo $item_heading_size; ?>>
                <?php } ?>
                <?php if ($show_category) : ?>
                    <div class="cshero-carousel-post-category">
                        <i class="fa fa-folder-open"></i> <?php echo strip_tags (get_the_term_list(get_the_ID(), 'event_category', '', ', ', '')); ?>
                    </div>
                <?php endif; ?>
                <?php if($show_start_time || $show_end_time): ?>
                <div class="cshero-carousel-event-time">
                    <i class="fa fa-clock-o"></i>
                    <?php if($show_start_time): ?>
                    <span class="start-time">
                        <?php the_cmsevent_start_datetime('H:i A'); ?>
                    </span>
                    <?php endif; ?>
                    <?php if($show_end_time): ?>
                    <span class="end-time">
                        <span class="etime"><?php the_cmsevent_end_datetime('H:i A'); ?></span>
                    </span>
                    <?php endif; ?> 
                </div>
                <?php endif; ?>

                <?php if($show_address): ?>
                    <div class="eaddress">
                    <?php
                    the_cmsevent_location();
                    ?>
                    </div>
                <?php endif; ?>
                <?php if ($show_description) { ?>
                <div class="cshero-carousel-post-description" style="color: <?php echo esc_attr($content_color); ?>">
                    <?php if ($excerpt_length != -1) { ?>
                        <p><?php echo cshero_content_max_charlength(strip_tags(get_the_content()), $excerpt_length); ?></p>
                    <?php } else { ?>
                        <p><?php the_content(); ?></p>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <?php if($show_date || $show_comment || $show_author): ?>
            <div class="cshero-carousel-meta clearfix">
                <?php if($show_date) :?>
                <span><i class="fa fa-clock-o"></i> <?php echo the_date($date_format); ?></span>
                <?php endif; ?>
                <?php if($show_comment) :?>
                <span class="cshero-carousel-comment"><i class="fa fa-comment-o"></i>
                    <?php
                    $comments = get_comments_number();
                    if($comments > 0){
                        echo $comments." Comments";
                    }
                    else {
                        echo _e("No Comments",CSCORE_NAME);
                    }
                    ?>
                </span>
                <?php endif; ?>
                <?php if($show_author) :?>
                <span><i class="fa fa-pencil"></i> <?php echo get_the_author_meta('display_name',get_the_author()); ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php if($show_read_more): ?>
            <div class="cshero-carousel-footer">
                <div class="cshero-carousel-post-read-more">
                    <a class="btn btn-default" href="<?php the_permalink() ?>"><?php echo esc_attr($read_more); ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>

                