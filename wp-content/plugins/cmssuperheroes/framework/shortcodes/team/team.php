<?php
add_shortcode('cshero-team', 'cshero_teams_carousel_render');

function cshero_teams_carousel_render($atts, $content = null) {
    global $post, $wp_query,$team_options;
    extract(shortcode_atts(array(
        /* General Option */
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
        'posts_per_page' => 12,
        'orderby' => 'none',
        'order' => 'none',
        'meta_key' => '',
        'meta_value' => '',
        
        /* Layout Option*/
        'layout' => 'team.default',
        'rows' => 1,
        'width_item' => '360',
        'margin_item' => '30',
        'min_slide'=>'1',
        'max_slide'=>'3',
        'move_slide' =>'3',
        'auto_scroll' => '0',
        'speed_scroll' =>'500',
        'show_nav' => '0',
        'nav_align'=>'text-center',
        'nav_left_icon' => 'fa fa-angle-left',
        'nav_right_icon' => 'fa fa-angle-right',
        'nav_icon_offset' => '0',
        'nav_arrow_style' => '',
        'show_pager' => '0',
        'pager_align'=>'text-center',

        /* Item Option */
        'content_align' => 'text-left',
        'content_bg_color' => 'transparent',
        'item_bg_color_hover' =>'',
        'overlay_bg' => 'rgba(51,51,51,0.9)',
        'overlay_appear' => '',
        'content_padding' => '25px 0 0 0',
        'show_image'  => '1',
        'crop_image' => '0',
        'width_image' => '360',
        'height_image' => '234',
        'img_radius' => '0',

        'show_title' => '1',
        'title_team_color' => '',
        'item_heading_size' => 'h3',
        'team_title_margin' => '0 0 15px 0',

        'show_category' => '0',
        'category_color'=>'',
        'show_team_position'=>'1',
        'show_team_qualification' => '0',
        'show_team_experience' => '0',
        'show_team_contact_info' => '0',
        'team_info_color' =>'',

        'show_description' => '1',
        'description_color' => '',
        'excerpt_length' => '100',

        'read_more' => '0',
        'read_more_type' => 'button',
        'read_more_text'=>'Read more',
        'read_more_icon' => 'fa fa-link',
        
        'show_socials' => '1',
        'social_color' => '',
        'social_hover_color' => '',
        'social_border_style'=>'none',
        'social_border_color'=>'',
        'social_border_color_hover'=>'',
        'social_border_width'=>'',
        'social_border_radius' => '0',
        'social_bg_color' => '',
        'social_bg_hover_color' => '',
        'social_height' => '',
        'social_width' => '',
        'social_font_size' => '',

        /* Extra Option */
        'morelink' => '',
        'moretext' => '',
        'el_class' => '',
        
    ), $atts));
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
                    'taxonomy' => 'team_category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            ),
            'orderby' => $orderby,
            'order' => $order,
            'post_type' => 'team',
            'post_status' => 'publish'
        );
    } else {
        $args = array(
            'posts_per_page' => $posts_per_page,
            'orderby' => $orderby,
            'order' => $order,
            'post_type' => 'team',
            'post_status' => 'publish'
        );
    }
    $date = time() . '_' . uniqid(true);
    $team_options = array(
        /* General Option */
        'title' => $title,
        'heading_size' =>$heading_size,
        'heading_icon'=> $heading_icon,
        'heading_align' => $heading_align,
        'heading_color' => $heading_color,
        'heading_text_style'=> $heading_text_style,
        'subtitle' => $subtitle,
        'subtitle_heading_size'=> $subtitle_heading_size,
        'description' => $description,
        /* Source option */
        'category' => $category,
        'posts_per_page' => $posts_per_page,
        'orderby' => $orderby,
        'order' => $order,
        'meta_key' => $meta_key,
        'meta_value' => $meta_value,
        
        /* Layout Option*/
        'layout' => $layout,
        'rows' => $rows,
        'width_item' => $width_item,
        'margin_item' => $margin_item,
        'min_slide'=> $min_slide,
        'max_slide'=> $max_slide,
        'move_slide' => $move_slide,
        'auto_scroll' => $auto_scroll,
        'speed_scroll' => $speed_scroll,
        'show_nav' =>  $show_nav,
        'nav_align'=> $nav_align,
        'nav_left_icon' => $nav_left_icon,
        'nav_right_icon' => $nav_right_icon,
        'nav_icon_offset' => $nav_icon_offset,
        'nav_arrow_style' => $nav_arrow_style,
        'show_pager' => $show_pager,
        'pager_align'=> $pager_align,

        /* Item Option */
        'content_align' => $content_align,
        'content_bg_color' => $content_bg_color,
        'crop_image' => $crop_image,
        'width_image' => $width_image,
        'height_image' => $height_image,
        'img_radius' => $img_radius,

        'show_title' => $show_title,
        'title_team_color' => $title_team_color,
        'item_heading_size' => $item_heading_size,

        'show_category' => $show_category,
        'category_color'=> $category_color,
        'show_team_position'=> $show_team_position,
        'show_team_qualification' => $show_team_qualification,
        'show_team_experience' => $show_team_experience,
        'show_team_contact_info' => $show_team_contact_info,
        'team_info_color' => $team_info_color,

        'show_description' => $show_description,
        'description_color' => $description_color,
        'excerpt_length' => $excerpt_length,

        'read_more' => $read_more,
        'read_more_text'=> $read_more_text,

        'show_socials' => $show_socials,
        'social_color' => $social_color,
        'social_hover_color' => $social_hover_color,
        'social_border_style'=> $social_border_style,
        'social_border_color'=> $social_border_color,
        'social_border_color_hover'=> $social_border_color_hover,
        'social_border_width'=> $social_border_width,
        'social_border_radius' => $social_border_radius,
        'social_bg_color' => $social_bg_color,
        'social_bg_hover_color' => $social_bg_hover_color,

        /* Extra Option */
        'morelink' => $morelink,
        'moretext' => $moretext,
        'el_class' => $el_class,
        'date' => $date,
    );
    $wp_query = new WP_Query($args);

    wp_enqueue_style('carousel_team_css', CSCORE_PLUGIN_URL.'framework/shortcodes/team/css/team.css', array(), '1.0.0');

    wp_enqueue_script('bxslider');
    wp_enqueue_script('jm-bxslider');

    $heading_style = 'style="color:'.$heading_color.'!important;text-transform:'.$heading_text_style.';"'; 

    $content_style ='style="';
        $content_style .='background-color:'.$content_bg_color.';';
        $content_style .='padding:'.$content_padding.';';
    $content_style .='"';

    $content_bg_color_hover = $item_bg_color_hover;
    $content_style_hover = '
        #cshero_team_'.esc_attr($date).' article:hover .cshero-team-content{
            background-color:'.$content_bg_color_hover.' !important;
        }
    ';

    $team_title_style = 'style="';
        $team_title_style .='color:'.$title_team_color.';';
        $team_title_style .='margin:'.$team_title_margin.';';
    $team_title_style .= '"';

    /* image style */
    $image_style = 'style="';
    $image_style .= 'border-radius:'.$img_radius.';-webkit-border-radius:'.$img_radius.';-moz-border-radius:'.$img_radius.';-ms-border-radius:'.$img_radius.';-o-border-radius:'.$img_radius.'; max-width:100%;';
    if(!$crop_image){
        $image_style .= 'width:100%;';
    }
    $image_style .= '"';

    /* Overlay Style */
    $overlay_style ='style="';
        $overlay_style .= 'border-radius:'.$img_radius.';-webkit-border-radius:'.$img_radius.';-moz-border-radius:'.$img_radius.';-ms-border-radius:'.$img_radius.';-o-border-radius:'.$img_radius.';';
        $overlay_style .= 'background-color:'.$overlay_bg.';';

        $crop_image_size ='';
        if($crop_image){
            $overlay_style .= 'width:'.$width_image.'px;height:'.$height_image.'px; max-width:100%;';
            $crop_image_size .='style="width:'.$width_image.'px; max-width:100%; height:'.$height_image.'px;"';
        }
    $overlay_style .='"';

    $category_style ='
        #cshero_team_'.esc_attr($date).' .cshero-team-category{
            color:'.$category_color.';
        }
    ';
    $description_style= '
        #cshero_team_'.esc_attr($date).' .cshero-team-description{
            color:'.$description_color.';
        }
    ';
    $team_info_style = '
        #cshero_team_'.esc_attr($date).' .cshero-team-info{
            color:'.$team_info_color.';
        }
    ';
    $social_style = 'style="';
    $social_style .= 'background-color: '.$social_bg_color.'; border: '.$social_border_style.' '.$social_border_width.' '.$social_border_color.'; -webkit-border-radius: '.$social_border_radius.'; -moz-border-radius: '.$social_border_radius.';-ms-border-radius: '.$social_border_radius.';-o-border-radius: '.$social_border_radius.';border-radius: '.$social_border_radius.'; color:'.$social_color.';';
    if($social_border_radius != '0' || $social_border_style != 'none' || $social_bg_color != ''){
        $social_style .= 'width:'.$social_width.';height:'.$social_height.';line-height:'.$social_height.';font-size:'.$social_font_size.';margin-right:5px;';
    }
    $social_style .= '"';

    $social_style_hover = '
        #cshero_team_'.esc_attr($date).' .cshero-team-social  a:hover,
        #cshero_team_'.esc_attr($date).' .cshero-team-social  a:active,
        #cshero_team_'.esc_attr($date).' .cshero-team-social  a:focus {
            background-color: '.$social_bg_hover_color.' !important;
            border-color: '.$social_border_color_hover.' !important;
            color: '.$social_hover_color.' !important;
        }
    ';

    $nav_icon_left_offset = "";
    $nav_icon_right_offset = "";
    if($nav_align == 'vertical-center'){
        $nav_icon_left_offset = $nav_icon_offset;
        $nav_icon_right_offset = $nav_icon_offset;
    }


    ob_start();
    ?>
    <div  id="cshero_team_<?php echo esc_attr($date); ?>" class="cshero-shortcode cshero-team cshero-team-carousel <?php echo str_replace('.','-',$layout).' '.esc_attr($el_class); ?>">
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
        <div class="cshero-carousel-list">
            <div id="cshero_team_carousel_<?php echo esc_attr($date); ?>" data-moveslides="<?php echo esc_attr($move_slide);?>" data-auto="<?php echo esc_attr($auto_scroll); ?>" data-prevselector="#cshero_team_<?php echo esc_attr($date); ?> .prev" data-nextselector="#cshero_team_<?php echo $date; ?> .next" data-prevText="<i class='<?php echo esc_attr($nav_left_icon); ?>'></i>" data-nextText="<i class='<?php echo esc_attr($nav_right_icon); ?>'></i>"  data-touchenabled="1" data-controls="true"  data-pager="<?php echo $show_pager;?>" data-pagerSelector="#cshero_team_<?php echo esc_attr($date); ?> .cshero-control" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true" data-speed="<?php echo esc_attr($speed_scroll); ?>" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="<?php echo esc_attr($max_slide);?>" data-minslides="<?php echo esc_attr($min_slide); ?>" data-slideWidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
               <?php
                $counter =0;
                while ($wp_query->have_posts()) : $wp_query->the_post();
                    $custom = get_post_custom($post->ID);
                     
                    if (has_post_thumbnail() and wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)) { 
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                        $full_image = $attachment_image[0];
                    } else {
                        $attachment_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
                        $full_image = $attachment_image;
                    }
                    if($read_more_type == 'button' || $read_more_type =='btn-trans'){
                        $readmore_link = '<a class="btn btn-default '.$read_more_type.'" title="" href="' . esc_url(get_the_permalink())  . '" >'.__($read_more_text,CSCORE_NAME).'</a>';
                    } elseif($read_more_type == 'icon-button' || $read_more_type == 'icon-button-black' || $read_more_type == 'icon-box-white'  || $read_more_type == 'icon-box-black'){
                        $readmore_link = '<a class="icon-link '.$read_more_type.'" title="'.__($read_more_text,CSCORE_NAME).'" href="' . esc_url(get_the_permalink())  . '" ><i class="'.$read_more_icon.'"></i></a>';
                    } elseif($read_more_type == 'text'){
                        $readmore_link = '<a class="" title="" href="' . esc_url(get_the_permalink())  . '" >'.__($read_more_text,CSCORE_NAME).'</a>';
                    } elseif($read_more_type == 'text-icon'){
                        $readmore_link = '<a class="" title="" href="' . esc_url(get_the_permalink())  . '" >'.__($read_more_text,CSCORE_NAME).' <i class="'.$read_more_icon.'"></i></a>';
                    } else {
                        $readmore_link = '<a class="icon-link" title="'.__($read_more_text,CSCORE_NAME).'" href="' . esc_url(get_the_permalink())  . '" ><i class="'.$read_more_icon.'"></i></a>';
                    }
                    
                    if ($show_socials) {
                        $team_email = isset($custom['team_email'][0]) ? $custom['team_email'][0] : '';
                        $team_facebook = isset($custom['team_facebook'][0]) ? $custom['team_facebook'][0] : '';
                        $team_twitter = isset($custom['team_twitter'][0]) ? $custom['team_twitter'][0] : '';
                        $team_google_plus = isset($custom['team_google_plus'][0]) ? $custom['team_google_plus'][0] : '';
                        $team_dribbble = isset($custom['team_dribbble'][0]) ? $custom['team_dribbble'][0] : '';
                        $team_youtube = isset($custom['team_youtube'][0]) ? $custom['team_youtube'][0] : '';
                        $team_rss = isset($custom['team_rss'][0]) ? $custom['team_rss'][0] : '';
                        $team_flickr = isset($custom['team_flickr'][0]) ? $custom['team_flickr'][0] : '';
                        $team_linkedin = isset($custom['team_linkedin'][0]) ? $custom['team_linkedin'][0] : '';
                        $team_vimeo = isset($custom['team_vimeo'][0]) ? $custom['team_vimeo'][0] : '';
                        $team_tumblr = isset($custom['team_tumblr'][0]) ? $custom['team_tumblr'][0] : '';
                        $team_pinterest = isset($custom['team_pinterest'][0]) ? $custom['team_pinterest'][0] : '';
                        $team_sky = isset($custom['team_sky'][0]) ? $custom['team_sky'][0] : '';
                        $team_github = isset($custom['team_github'][0]) ? $custom['team_github'][0] : '';
                        $team_instagram = isset($custom['team_instagram'][0]) ? $custom['team_instagram'][0] : '';

                        $links = array();
                        $links[] = ($team_email!='')?'<a '.$social_style.' class="team-email" href="mailto:'.$team_email.'" target="_blank" title="Email"><i class="fa fa-envelope-o"></i></a>':'';
                        $links[] = ($team_facebook!='')?'<a '.$social_style.' class="team-facebook" href="'.$team_facebook.'" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>':'';
                        $links[] = ($team_twitter!='')?'<a '.$social_style.' class="team-twitter" href="'.$team_twitter.'" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>':'';
                        $links[] = ($team_google_plus!='')?'<a '.$social_style.' class="team-google_plus" href="'.$team_google_plus.'" target="_blank" title="Google Plus"><i class="fa fa-google-plus"></i></a>':'';
                        $links[] = ($team_dribbble!='')?'<a '.$social_style.' class="team-dribbble" href="'.$team_dribbble.'" target="_blank" title="Dribble"><i class="fa fa-dribbble"></i></a>':'';
                        $links[] = ($team_youtube!='')?'<a '.$social_style.' class="team-youtube" href="'.$team_youtube.'" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a>':'';
                        $links[] = ($team_rss!='')?'<a '.$social_style.' class="team-rss" href="'.$team_rss.'" target="_blank" title="Rss"><i class="fa fa-rss"></i></a>':'';
                        $links[] = ($team_flickr!='')?'<a '.$social_style.' class="team-flickr" href="'.$team_flickr.'" target="_blank" title="Flickr"><i class="fa fa-flickr"></i></a>':'';
                        $links[] = ($team_linkedin!='')?'<a '.$social_style.' class="team-linkedin" href="'.$team_linkedin.'" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a>':'';
                        $links[] = ($team_vimeo!='')?'<a '.$social_style.' class="team-vimeo" href="'.$team_vimeo.'" target="_blank" title="Vimeo"><i class="fa fa-vimeo-square"></i></a>':'';
                        $links[] = ($team_tumblr!='')?'<a '.$social_style.' class="team-tumblr" href="'.$team_tumblr.'" target="_blank" title="Tumblr"><i class="fa fa-tumblr"></i></a>':'';
                        $links[] = ($team_pinterest!='')?'<a '.$social_style.' class="team-pinterest" href="'.$team_pinterest.'" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a>':'';
                        $links[] = ($team_sky!='')?'<a '.$social_style.' class="team-skype" href="'.$team_sky.'" target="_blank" title="Skype"><i class="fa fa-skype"></i></a>':'';
                        $links[] = ($team_github!='')?'<a '.$social_style.' class="team-github" href="'.$team_github.'" target="_blank" title="Github"><i class="fa fa-github"></i></a>':'';
                        $links[] = ($team_instagram!='')?'<a '.$social_style.' class="team-instagram" href="'.$team_instagram.'" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>':'';
                    }
                    $counter++;
                    if($rows == 1){
                        echo '<div class="cshero-team-carousel-item-wrap">';
                    }else{
                        if($counter % $rows == 1){
                            echo '<div class="cshero-team-carousel-item-wrap">';
                        }
                    }
                ?>
                        <div class="cshero-team-carousel-item <?php echo $content_align;?>" <?php if(($counter % $rows != 0) and $rows != 1) echo 'style="margin-bottom:'.esc_attr($margin_item).'px;"'; ?>>
                           
                            <?php
                                $file_layout= "cms_templates/team/layouts/$layout.php";
                                $file_css   = "cms_templates/team/css/$layout.css";
                                if(locate_template($file_layout)){
                                    if(locate_template($file_css))
                                        wp_enqueue_style(''.str_replace('.','-',$layout).'',get_template_directory_uri()."/".$file_css);
                                    require locate_template($file_layout);
                                }else{
                                        wp_enqueue_style(''.str_replace('.','-',$layout).'', CSCORE_PLUGIN_URL . "framework/shortcodes/team/css/$layout.css");
                                        require  "layouts/$layout.php";
                                    }
                            ?>
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
            <?php if($show_pager){ ?>
                <div class="cshero-control <?php echo $pager_align;?>"></div>
            <?php } ?>
            <?php if($show_nav){ ?>
            <div class="cshero-nav <?php echo $nav_align.' '.$nav_arrow_style;?>">
                <ul>
                    <li class="prev" style="left:<?php echo $nav_icon_left_offset;?>;"></li>
                    <li class="next" style="right:<?php echo $nav_icon_right_offset;?>;"></li>
                </ul>
            </div>
            <?php } ?>
        </div>
        <?php if($morelink!='' && $moretext !=''):?>
            <div class="cshero-morelink text-center"><a href="<?php echo $morelink;?>" class="btn btn-default" ><?php echo $moretext;?></a></div>
        <?php endif;?>
        
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
?>
