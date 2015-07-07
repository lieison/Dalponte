<?php
    global $post_option,$smof_data;

    $post_id = get_the_ID();

    $excerpt_length = $post_option['excerpt_length'];
    $show_title = $post_option['show_title'];
    $show_category = $post_option['show_category'];
    $show_date = $post_option['show_date'];
    $date_type = $post_option['date_type'];
    $crop_image = $post_option['crop_image'];
    $width_image = $post_option['width_image'];
    $height_image = $post_option['height_image'];
    $read_more = $post_option['read_more'];
    $heading = $post_option['heading'];
?>
<article id="post_<?php echo esc_attr($post_id); ?>" <?php post_class('cs-post-item'); ?>>
    <?php if (has_post_thumbnail()){?>
    <div class="cs-entry-media">
        <?php

            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full', false);
            if($crop_image == true || $crop_image == 1){
                $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                echo '<a href="' . esc_url(get_permalink()) . '" class="cs-post-image"><img alt="" class="attachment-featuredImageCropped" src="'. esc_attr($image_resize) .'" /></a>';
            }else{
                echo '<a href="' . esc_url(get_permalink()) . '" class="cs-post-image"><img src="'. esc_attr($attachment_image[0]) .'" alt="" /></a>';
            }

        ?>
    </div>
    <?php }?>
    <div class="cs-popular-content">
        <!-- Title / Page Headline -->
        <?php if ($show_title == true || $show_title == '1') { ?>
            <div class="cs-recent-post-title">
                <<?php echo $heading;?> class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></<?php echo $heading;?>>
            </div>
        <?php } ?>

        <!-- Datetime -->
        <?php if (isset($show_date) && $show_date == true) {
            $categories = get_the_category();
            $separator = ', ';
            $output = '';
            if($categories){
                foreach($categories as $category) {
                    $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",CSCORE_NAME), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                }
            }
            ?>
            <div class="cs-recent-post-meta">
                <?php if($show_category):?>
                    <span class="cs-category"><?php echo trim($output, $separator);?></span>
                <?php endif;?>
                <?php
                if (isset($show_date) && $show_date == true) {
                    if($date_type=='details'){
                        ?><span class="date"><?php echo the_time($smof_data['archive_date_format']); ?></span><?php
                    }
                    else{
                        ?><span class="date"><?php echo tp_relative_time(get_the_time('Y-m-d G:i')); ?></span><?php
                    }
                }
                ?>
            </div>
    <?php } ?>
        <?php if ($excerpt_length != '-1'):?>
        <div class="cs-recent-post-description">
            <?php
            echo cshero_string_limit_words( strip_tags(strip_tags(get_the_content())),$excerpt_length);
            // Read more link
            if (isset($read_more) && $read_more != '-1') {
                echo '<div class="cs-read-more"><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr($read_more) . '" class="read-more-link"><i class="fa fa-share"></i>' . $read_more . '</a></div>';
            }
            ?>
        </div>
    <?php endif;?>
    </div>
</article>