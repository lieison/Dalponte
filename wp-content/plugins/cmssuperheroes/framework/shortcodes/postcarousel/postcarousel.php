<?php
add_shortcode('cshero-post-carousel', 'cshero_post_carousel_render');

function cshero_post_carousel_render($atts, $content = null) {
	global $post, $wp_query;
	extract(shortcode_atts(array(
		/* General Option */
		'title' => '',
		'heading_size' =>'h3',
		'heading_icon'=>'',
		'title_align' =>'',
		'title_color' =>'',
		'heading_text_style'=>'',
		'subtitle' => '',
		'subtitle_heading_size'=>'h4',
		'description' => '',
		/* Source option */
		'category' => '',
		'posts_per_page' => 12,
		'meta_key' => '',
		'meta_value' => '',
		'orderby' => 'none',
		'order' => 'none',
		/* Layout Option*/
		'layout' => 'postcarousel.default',
		'carousel_mode' => 'horizontal',
		'rows' => 1,
		'width_item' => '360',
		'margin_item' => '30',
		'min_slide'=>'1',
		'max_slide'=>'3',
		'move_slide' =>'3',
		'auto_scroll' => '1',
		'speed_scroll' =>'500',
		'show_nav' => '',
		'nav_align'=>'',
		'nav_left_icon' => 'fa fa-angle-left',
        'nav_right_icon' => 'fa fa-angle-right', 
        'nav_icon_offset' => '0',
        'nav_arrow_style' => 'default',
		'show_pager' => '',
		'pager_align'=>'',
		'pager_style' => 'default',

		/* Item Option */
		'content_align' =>'left',
		'content_color'=>'',
		'content_hover_color'=>'',
		'content_bg_color' =>'',
		'content_bg_hover_color' => '',
		'overlay_bg_color' => 'rgba(255,255,255,0.8)',
		'overlay_appear' => '',
		'content_padding' => '0',
		'show_post_type'  => '0',
		'show_title' => '',
		'item_heading_size'=>'h3',
		'item_title_color' => '',
		'item_title_hover_color' => '',
		'item_title_margin' =>'0',
		'show_image'=>'1',
		'crop_image' => '0',
		'width_image' => '360',
		'height_image' => '263',
		'image_border' => '0',
		'show_category' => '1',
		'show_description' => '',
		'excerpt_length' => 100,

		
		'show_date' => '1',
		'date_format' => 'd F Y',
		'date_font_color' =>'',
		'date_font_format' =>'400',
		'date_font_style' => '',
		'show_comment' => '0',
		'show_author' => '0',
		'link_type'   => 'icon',
		'show_read_more' => '1',
		'read_more' => 'Read more',
		'read_more_icon' =>'fa fa-link',
		'show_popup' => '1',
		'popup_text' => 'Large Image',
		'popup_icon' => 'fa fa-search',
		'item_link_color' =>'',
		'item_link_hover_color'=>'',
		/* Extra Option*/
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
		if(!empty($meta_key)) {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'tax_query' => array(
						array(
								'taxonomy' => 'category',
								'field' => 'term_id',
								'terms' => $category
						)
				),
				'meta_query' => array(
					array(
						'key' => $meta_key,
						'value' => $meta_value
					)
				),
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'post',
				'post_status' => 'publish'
			);
		} else {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'tax_query' => array(
						array(
								'taxonomy' => 'category',
								'field' => 'id',
								'terms' => $category
						)
				),
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'post',
				'post_status' => 'publish'
			);
		}

	} else {
		if(!empty($meta_key)) {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'meta_query' => array(
					array(
						'key' => $meta_key,
						'value' => $meta_value
					)
				),
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'post',
				'post_status' => 'publish'
			);
		} else {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'post',
				'post_status' => 'publish'
			);
		}
	}

	$wp_query = new WP_Query($args);

	$date = time() . '_' . uniqid(true);
	ob_start();
	wp_enqueue_style('colorbox');
	wp_enqueue_style('postcarousel', CSCORE_PLUGIN_URL.'framework/shortcodes/postcarousel/css/postcarousel.css', array(), '1.0.0');

	wp_enqueue_script('colorbox');
	wp_enqueue_script('bxslider');
	wp_enqueue_script('jm-bxslider');

	$heading_style = 'style="color:'.$title_color.'!important;text-transform:'.$heading_text_style.';"';

	/* image style */
	$image_style = 'style="';
	$image_style .= 'border-radius:'.$image_border.';-webkit-border-radius:'.$image_border.';-moz-border-radius:'.$image_border.';-ms-border-radius:'.$image_border.';-o-border-radius:'.$image_border.';max-width:100%;';
	if(!$crop_image){
		$image_style .= 'width:100%;';
	}
	$image_style .= '"';
	/* Overlay Style */
	$overlay_style ='style="';
	$overlay_style .= 'z-index:4;border-radius:'.$image_border.';-webkit-border-radius:'.$image_border.';-moz-border-radius:'.$image_border.';-ms-border-radius:'.$image_border.';-o-border-radius:'.$image_border.';background-color:'.$overlay_bg_color.';color:'.$content_color.';';
	
	$crop_image_size = '';
	if($crop_image){
		$overlay_style .= 'width:'.$width_image.'px;height:'.$height_image.'px;max-width:100%;';
		$crop_image_size .='style="width:'.$width_image.'px;height:'.$height_image.'px;display: block;"';
	}
	$overlay_style .='"';

	$content_bg_hover_style ='background-color:'.$content_bg_hover_color.' !important;';

	$content_style = 'style="';
	$content_style .= 'color:'.$content_color.'; text-align:'.$content_align.';background-color:'.$content_bg_color.';padding:'.$content_padding.';';
	$content_style .='"';

	$content_hover_style ='color:'.$content_hover_color.' !important;';

	$item_title_style = 'style="display:block; ';
	$item_title_style .= 'color:'.$item_title_color.'; ';
	$item_title_style .= 'margin:'.$item_title_margin.'; ';
	$item_title_style .='"';

	$item_title_hover_style ='';
	$item_title_hover_style .= 'color:'.$item_title_hover_color.' !important;';

	$date_style = 'style="';
		$date_style .='text-transform:'.$date_font_style.';';
		$date_style .='font-weight:'.substr($date_font_format,0,3).';';
		$date_style .='font-style:'.substr($date_font_format,3).';';
		$date_style .='color:'.$date_font_color.';';
	$date_style .='"';

	$nav_icon_left_offset = "";
    $nav_icon_right_offset = "";
    if($nav_align == 'vertical-center'){
        $nav_icon_left_offset = $nav_icon_offset;
        $nav_icon_right_offset = $nav_icon_offset;
    }


?>
	<div id="cshero_post_carousel_<?php echo esc_attr($date); ?>" class="cshero-post-carousel <?php echo str_replace('.','-',$layout).' '.esc_attr($el_class); ?>">
		<style type="text/css" scoped>
			#cshero_post_carousel_<?php echo esc_attr($date); ?> article:hover .cshero-carousel-body{<?php echo $content_hover_style.' '.$content_bg_hover_style; ?> }
			#cshero_post_carousel_<?php echo esc_attr($date); ?> article:hover .cshero-carousel-title a{<?php echo $item_title_hover_style;?> }
			#cshero_post_carousel_<?php echo esc_attr($date); ?> .link-wrap a{ color: <?php echo $item_link_color;?>;}
			#cshero_post_carousel_<?php echo esc_attr($date); ?> .link-wrap a:hover{ color: <?php echo $item_link_hover_color;?>;}
			#cshero_post_carousel_<?php echo esc_attr($date); ?> .link-wrap [class*='icon-box-']:hover .fa,
			#cshero_post_carousel_<?php echo esc_attr($date); ?> .link-wrap [class^='icon-box-']:hover .fa{border-color:<?php echo $item_link_hover_color;?>;}
		</style>
	    <?php if ($title != "" || $subtitle || $description != "") { ?>
	    <div class="cshero-header <?php echo $title_align;?>">
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
        <div class="cshero-post-carousel-list <?php echo $show_post_type ? 'show-post-type':''; ?>">
            <div id="cshero_post_carousel<?php echo esc_attr($date); ?>" data-mode="<?php echo esc_attr($carousel_mode);?>" data-moveslides="<?php echo esc_attr($move_slide);?>" data-auto="<?php echo $auto_scroll; ?>" data-speed="<?php echo esc_attr($speed_scroll);?>" data-prevselector="#cshero_post_carousel_<?php echo esc_attr($date); ?> .prev" data-nextselector="#cshero_post_carousel_<?php echo esc_attr($date); ?> .next" data-prevText="<i class='<?php echo esc_attr($nav_left_icon); ?>'></i>" data-nextText="<i class='<?php echo esc_attr($nav_right_icon); ?>'></i>" data-pagerSelector="#cshero_post_carousel_<?php echo $date; ?> .cshero-control" data-onsliderload="true" data-touchenabled="1" data-controls="true" data-pager="<?php echo $show_pager;?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true"  data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="<?php echo esc_attr($max_slide); ?>" data-minslides="<?php echo esc_attr($min_slide); ?>" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                <?php
                $counter =0;
                while ($wp_query->have_posts()) : $wp_query->the_post();

                $counter++;
                if($rows == 1){
                        echo '<div class="cshero-post-carousel-item-wrap">';
                    }else{
                        if($counter % $rows == 1){
                            echo '<div class="cshero-post-carousel-item-wrap">';
                        }
                    }
                ?>
                	<?php 
                		if (has_post_thumbnail()){
			                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
			                $full_image = $attachment_image[0];
		            	} else {
			                $attachment_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
			                $full_image = $attachment_image;
		                }
					    if($link_type == 'button' || $link_type =='btn-trans'){
					        $readmore_link = '<a class="btn btn-default '.$link_type.'" title="" href="' . esc_url(get_the_permalink())  . '" >'.__($read_more,CSCORE_NAME).'</a>';
					        $popup_link = '<a class="btn btn-default colorbox '.$link_type.'" href="'.esc_url($full_image).'" >'.__($popup_text,CSCORE_NAME).'</a>';
					    } elseif($link_type == 'icon-button' || $link_type == 'icon-button-black' || $link_type == 'icon-box-white'  || $link_type == 'icon-box-black'){
					        $readmore_link = '<a class="icon-link '.$link_type.'" title="'.__($read_more,CSCORE_NAME).'" href="' . esc_url(get_the_permalink())  . '" ><i class="'.$read_more_icon.'"></i></a>';
					        $popup_link = '<a class="icon-link colorbox '.$link_type.'" title="'.__($popup_text,CSCORE_NAME).'" href="'.esc_url($full_image).'" ><i class="'.$popup_icon.'"></i></a>';
					    } elseif($link_type == 'text'){
					        $readmore_link = '<a class="" title="" href="' . esc_url(get_the_permalink())  . '" >'.__($read_more,CSCORE_NAME).'</a>';
					        $popup_link = '<a class="colorbox" href="'.esc_url($full_image).'" >'.__($popup_text,CSCORE_NAME).'</a>';
					    } elseif($link_type == 'text-icon'){
					        $readmore_link = '<a class="" title="" href="' . esc_url(get_the_permalink())  . '" >'.__($read_more,CSCORE_NAME).' <i class="'.$read_more_icon.'"></i></a>';
					        $popup_link = '<a class="colorbox" href="'.esc_url($full_image).'" >'.__($popup_text,CSCORE_NAME).' <i class="'.$popup_icon.'"></i></a>';
					    }
					    elseif($link_type == 'icon'){
					        $readmore_link = '<a class="" title="" href="' . esc_url(get_the_permalink())  . '" ><i class="'.$read_more_icon.'"></i></a>';
					        $popup_link = '<a class="colorbox" href="'.esc_url($full_image).'" ><i class="'.$popup_icon.'"></i></a>';
					    } else {
					        $readmore_link = '<a class="icon-link" title="'.__($read_more,CSCORE_NAME).'" href="' . esc_url(get_the_permalink())  . '" ><i class="'.$read_more_icon.'"></i></a>';
					        $popup_link = '<a class="icon-link colorbox" title="'.__($popup_text,CSCORE_NAME).'" href="'.esc_url($full_image).'" ><i class="'.$popup_icon.'"></i></a>';
					    }
					?>
	                <div class="cshero-shortcode cshero-post-carousel-item content-<?php echo $content_align;?>" <?php if(($counter % $rows != 0) and $rows != 1) echo 'style="margin-bottom:'.esc_attr($margin_item).'px;"'; ?>>
						<?php 
				           $file_layout= "cms_templates/postcarousel/layouts/$layout.php";
                            $file_css   = "cms_templates/postcarousel/css/$layout.css";
                            if(locate_template($file_layout)){
                                if(locate_template($file_css))
                                    wp_enqueue_style(''.str_replace('.','-',$layout).'',get_template_directory_uri()."/".$file_css);    
                                require locate_template($file_layout);
                            }else{
                                wp_enqueue_style(''.str_replace('.','-',$layout).'', CSCORE_PLUGIN_URL . "framework/shortcodes/postcarousel/css/$layout.css");
                                require  "layouts/$layout.php";
                            }
                        ?>
					</div>
			    <?php
                if($rows == 1){
                    echo '</div>';
                }else{
                    if($counter % $rows == 0 || $counter==$wp_query->post_count){
                        echo '</div>';
                    }
                }
                endwhile;
                wp_reset_query();
                ?>
			</div>
		</div>
		<?php if($show_pager) { ?>
			<div class="cshero-control <?php echo $pager_align.' '.$pager_style;?>"></div>
		<?php } ?>
		<?php if($show_nav){ ?>
        <div class="cshero-nav <?php echo $nav_align.' '.$nav_arrow_style; ?>">
            <ul>
                <li class="prev" style="left:<?php echo $nav_icon_left_offset;?>;"></li>
                <li class="next" style="right:<?php echo $nav_icon_right_offset;?>;"></li>
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
<?php
    return ob_get_clean();
}
