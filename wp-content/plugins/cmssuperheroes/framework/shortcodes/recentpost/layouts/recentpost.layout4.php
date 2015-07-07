<?php
    global $post_option,$smof_data, $post;

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
    <div class="cs-recent-post-container">
        <div class="author-info-wrap">
            <?php echo get_avatar( $post->post_author, 60); ?> 
            <?php if (isset($show_date) && $show_date == true) { ?>
                <div class="date-info-wrap">
                    <span class="create-day"><?php echo get_the_time('d'); ?></span>
                    <span class="create-month"><?php echo get_the_time('M'); ?></span>
                </div>
            <?php } ?>
        </div>
        <div class="cs-recentpost-wrap">
            <div class="cs-recent-post-item">
                <?php if ($show_title == true || $show_title == '1') { ?>
                    <<?php echo $heading;?> class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></<?php echo $heading;?>>
                <?php } ?>    

                <?php if ($excerpt_length != '-1'):  
                    echo cshero_string_limit_words( strip_tags(strip_tags(get_the_content())),$excerpt_length);
                    // Read more link
                    if (isset($read_more) && $read_more != '-1') {
                        echo '<div class="cs-read-more"><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr($read_more) . '" class="read-more-link"><i class="fa fa-share"></i>' . $read_more . '</a></div>';
                    }
                endif;?>
            </div>
            
            <?php 
            /*if (isset($show_date) && $show_date == true) {
                $categories = get_the_category();
                $separator = ', ';
                $output = '';
                if($categories){
                    foreach($categories as $category) {
                        $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",CSCORE_NAME), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                    }
                }*/
            ?>

        </div>
    </div>
</artile>