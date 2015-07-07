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
    $audio_type = get_post_meta($post->ID, 'cs_post_audio_type', true);
    $audio_url = get_post_meta($post->ID, 'cs_post_audio_url', true);
    if($audio_type):
    ?>
    <div class="cs-entry-media">
       <?php

            if($audio_type){
                ?>
                <div class="cs-blog-media">
                <?php
                switch ($audio_type){
                    case 'content':
                        $shortcode = cshero_get_shortcode_from_content('playlist');
                        if(!$shortcode){
                            $shortcode = cshero_get_shortcode_from_content('audio');
                        }
                        if($shortcode):
                            echo do_shortcode($shortcode);
                        endif;
                        break;
                    default:
                        if($audio_url){
                            echo do_shortcode('[audio '.$audio_type.'="'.$audio_url.'"][/audio]');
                        }
                        break;
                }
                ?>
                </div>
                <?php
            }
            ?>
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
    <?php if ($show_title == '1') { ?>
        <div class="cs-recent-post-title">
            <<?php echo $heading;?> class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></<?php echo $heading;?>>
        </div>
    <?php } ?>
    <?php if($show_category == '1'):?>
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
    <?php if($excerpt_length != '-1' || isset($read_more) && $read_more != '-1'):?>
        <div class="cs-recent-post-description">
            <?php
            // Post content/excerpt
            if ($excerpt_length != '-1') {
                echo cshero_string_limit_words( strip_tags(get_the_content()),$excerpt_length);
            } else {
                echo strip_shortcodes($post->post_content);
            }
            // Read more link
            if (isset($read_more) && $read_more != '-1') {
                echo '<div class="cs-read-more"><a href="' . esc_url(get_permalink()) . '" title="' . esc_attr($read_more) . '" class="read-more-link">
                <i class="fa fa-share"></i>' . $read_more . '</a></div>';
            }
            ?>
        </div>
    <?php endif; ?>
</article>