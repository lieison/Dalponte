<?php
/* init var */
if ( get_query_var('paged') ) { 
    $paged = get_query_var('paged'); 
}
elseif ( get_query_var('page') ) {
    $paged = get_query_var('page'); 
}
else { 
    $paged = 1; 
}
switch ($orderby) {
    case 'highest_rated':
        $orderby = '&r_sortby=highest_rated';
        break;
    case 'most_rated':
        $orderby = '&r_sortby=most_rated';
        break;
    default:
        $orderby = '&orderby=date';
        break;
}
/* end init */
?>



<div class="rating-content-wrap">
    <div class="cshero-header row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <?php if($title!=''){
                echo '<'.$heading_size.' '.$title_css.'>'.$title.'</'.$heading_size.'>';
            }
            ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <?php ob_start();?>
                <div class="rating-categories clearfix">
                    <?php
                    $cats = array();
                    $count = 0;$active = '';
                    if($categories==''){
                        $categories = get_categories();
                        echo '<ul class="rating-filter list-inline">';
                            foreach ($categories as $key => $category) {
                                $active = ($count == 0) ? 'active':'';
                                $cats[$category->term_id] = $category->slug;
                                echo '<li class="filter '.$active.'" data-filter="'.$category->slug.'"><a>';
                                    echo $category->name;
                                echo '</a></li>';
                                $count++;
                            }
                        echo '</ul>';
                    }
                    else{
                        echo '<ul class="rating-filter list-inline">';
                        foreach (explode(',',$categories) as $key => $cat_id) {
                            $active = ($count == 0) ? 'active':'';
                            $category = get_category($cat_id);
                            if($category){
                                $cats[$category->term_id] = $category->slug;
                                echo '<li class="filter '.$active.'" data-filter="'.$category->slug.'"><a>';
                                    echo $category->name;
                                echo '</a></li>';
                                $count++;
                            }
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            <?php
            $category_list = ob_get_clean();
            if($show_categories) echo $category_list;
            ?>
        </div>
    </div>   
    <div class="rating-content clearfix">
        <?php
        $count = 0;$active = '';
        foreach ($cats as $categrory_id => $category_alias) {
            $active = ($count>0)?'style="display:none;"':'';
            ?>
            <div class="category-<?php echo $category_alias;?> clearfix cshero-rating-list" <?php echo $active;?>>
            <div class="row">
                <?php
                $post_list = new WP_Query('post_type=post&paged='. $paged . '&cat=' . $categrory_id .'&post_status=publish&posts_per_page=' . $item_per_page.$orderby );
                $class='col-xs-12 col-lg-5 col-md-5 col-sm-5';
                if($post_list->post_count==1){
                    $class='col-xs-12 col-lg-12 col-md-12 col-sm-12';
                }
                if ( $post_list->have_posts() ) :
                    $count=0;
                    if($show_feature):
                        while( $post_list->have_posts() ) { 
                            $post_list->the_post();   
                            if($count==0){
                                ?>
                                <div class="feature-post <?php echo $class;?>">
                                <article <?php post_class(' rating-list-feature'); ?>>
                                    <header class="cs-blog-header">
                                        <?php if($show_image):?>
                                            <?php if ( has_post_thumbnail() and wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false) && ! post_password_required() && ! is_attachment() ){
                                                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                            }
                                            else{
                                                $attachment_image[0] = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                                            }
                                             ?>
                                            <div class="cs-blog-media">
                                                <div class="cs-blog-thumbnail">
                                                    <?php
                                                    if($crop_image){
                                                        $image_resize = mr_image_resize( $attachment_image[0], $width_image, $height_image, true, 'c', false );
                                                        echo '<img alt="" src="'. esc_url($image_resize) .'" />';
                                                    }else{
                                                        echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" />';
                                                    }
                                                    ?>
                                                </div><!-- .entry-thumbnail -->
                                            </div>
                                        <?php endif;?>
                                        <div class="cs-blog-meta cs-itemBlog-meta" <?php echo $feature_content_style; ?>>
                                            <?php
                                            if($show_title):
                                                echo cshero_title_render();
                                            endif;
                                            if($show_date):
                                                echo '<div class="release-date">'.__('Release date: ',THEMENAME).get_the_date('d M Y').'</div>';
                                            endif;
                                            if($show_rating){
                                                echo '<div class="rate-result"><span class="left">'.__('Rating: ',THEMENAME).'</span>';
                                                echo the_ratings_results(get_the_ID()).'</div>';
                                            }
                                            
                                            ?>
                                        </div>
                                    </header><!-- .entry-header -->
                                </article><!-- #post-## -->
                                </div>
                                <?php
                            }
                            break;
                        }
                    endif;
                    $count=0;
                    if($show_feature){
                        echo '<div class="col-xs-12 col-lg-7 col-md-7 col-sm-7">';
                    }
                    else{
                        echo '<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">';
                    }
                    $start = ($show_feature)?0:-1;
                    while( $post_list->have_posts() ) { 
                        $post_list->the_post();
                         if($count>$start){  ?>
                            <article <?php post_class(' rating-list-item clearfix'); ?>>
                                    <div class="cshero-post-img left">
                                        <?php if($show_list_image):?>
                                        <?php if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ){
                                                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                            }
                                            else{
                                                $attachment_image[0] = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                                            }
                                             ?>
                                            <div class="cs-blog-media">
                                                <div class="cs-blog-thumbnail">
                                                    <?php
                                                    if($crop_list_image){
                                                        $image_resize = mr_image_resize( $attachment_image[0], $width_list_image, $height_list_image, true, 'c', false );
                                                        echo '<img alt="" src="'. esc_url($image_resize) .'" />';
                                                    }else{
                                                        echo '<img alt="" src="'. esc_attr($attachment_image[0]) .'" />';
                                                    }
                                                    ?>
                                                </div><!-- .entry-thumbnail -->
                                            </div>
                                        <?php endif; ?>

                                    </div>
                                    <div class="cs-blog-meta cs-itemBlog-meta" <?php echo $list_content_style; ?>>
                                        <?php
                                            if($show_title):
                                                echo cshero_title_render();
                                            endif;
                                            if($show_date):
                                                echo '<div class="release-date">'.get_the_date('d M Y').'</div>'; 
                                            endif;
                                            if($show_rating){
                                                echo '<div class="rate-result"><span class="left">'.__('Rating: ',THEMENAME).'</span>';
                                                echo the_ratings_results(get_the_ID()).'</div>';
                                            }
                                        ?>
                                    </div>
                            </article> 
                            <?php
                        }
                    $count++;
                }
                echo '</div>';
                wp_reset_postdata();
                wp_reset_query();
                endif;
                ?>
            </div>
            </div>
            <?php
            $count++;
        }
        ?>
    </div>
    <?php

    ?>
</div>