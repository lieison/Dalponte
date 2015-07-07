<?php
    global $post_option,$smof_data;

    $post_id = get_the_ID();

    $excerpt_length = $post_option['excerpt_length'];
    $show_title = $post_option['show_title'];
    $show_date = $post_option['show_date'];
    $show_category = $post_option['show_category'];
    $crop_image = $post_option['crop_image'];
    $date_type = $post_option['date_type'];
    $width_image = $post_option['width_image'];
    $height_image = $post_option['height_image'];
    $read_more = $post_option['read_more'];
    $heading = $post_option['heading'];
?>
<article id="post_<?php echo esc_attr($post_id); ?>" <?php post_class('cs-post-item cs-post-'.get_post_format()); ?>>
    <?php
    $gallery_ids = cshero_grab_ids_from_gallery()->ids;
    if(has_post_thumbnail() || !empty($gallery_ids)):
    ?>
    <div class="cs-entry-media">
        <?php
        if (has_post_thumbnail()){
            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full', false);
            if($crop_image == true || $crop_image == 1){
                $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                echo '<a href="' . esc_url(get_permalink()) . '" class="cs-post-image"><img class="attachment-featuredImageCropped" src="'. esc_attr($image_resize) .'" alt="" /></a>';
            }else{
                echo '<a href="' . esc_url(get_permalink()) . '" class="cs-post-image"><img src="'. esc_attr($attachment_image[0]) .'" alt="" /></a>';
            }
        }
        ?>
        <?php

            if(!empty($gallery_ids)):
                wp_enqueue_style('colorbox');
                wp_enqueue_script('jquery-colorbox');
            ?>  <div class="hidden" id="cs-gallery-wrap-popup<?php echo $post_id;?>">
                    <div id="carousel-example-generic<?php echo $post_id;?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                        <?php $i = 0; ?>
                        <?php foreach ($gallery_ids as $image_id): ?>
                            <?php
                            $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                            if($attachment_image[0] != ''):?>
                                <div class="item <?php if($i==0){ echo 'active'; } ?>">
                                    <img style="width:100%;"  data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                                </div>
                            <?php $i++; endif; ?>
                        <?php endforeach; ?>
                        </div>
                        <a class="left carousel-control" href="#cs-gallery-popup<?php echo $post_id;?>" role="button" data-slide="prev">
                            <span class="ion-ios7-arrow-left"></span>
                        </a>
                        <a class="right carousel-control" href="#cs-gallery-popup<?php echo $post_id;?>" role="button" data-slide="next">
                            <span class="ion-ios7-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <a class='cs-colorbox-post-gallery' data-sid="<?php echo $post_id;?>" data-selement="carousel-example-generic<?php echo $post_id;?>" href="#"><i class="fa fa-photo"></i></a>
            <?php endif; ?>
    </div>
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

    <!-- Title / Page Headline -->
    <?php if ($show_title == true || $show_title == '1') { ?>
        <div class="cs-recent-post-title">
            <<?php echo $heading;?> class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></<?php echo $heading;?>>
        </div>
    <?php } ?>
    <?php if($show_category):?>
        <div class="cs-recent-post-meta">
            <?php
                $categories = get_the_category();
                $separator = ', ';
                $output = '';
                if($categories){
                    foreach($categories as $category) {
                        $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",CSCORE_NAME), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                    }
                }
            ?>
                <span class="cs-category"><?php echo trim($output, $separator);?></span>

        </div>
    <?php endif;?>
    <!-- Content -->
    <div class="cs-recent-post-description">
        <?php
        // Post content/excerpt
        if ($excerpt_length != '-1') {
            echo cshero_string_limit_words( strip_tags(strip_tags(get_the_content())),$excerpt_length);
        } else {
            echo strip_shortcodes($post->post_content);
        }
        // Read more link
        if (isset($read_more) && $read_more != '-1') {
            echo '<div class="cs-read-more"><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr($read_more) . '" class="read-more-link"><i class="fa fa-share"></i>' . $read_more . '</a></div>';
        }
        ?>
    </div>
</article>