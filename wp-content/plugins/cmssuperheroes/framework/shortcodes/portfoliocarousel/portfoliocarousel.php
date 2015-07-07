<?php
add_shortcode('cshero-portfolio-carousel', 'cshero_portfolio_carousel_render');
function cshero_portfolio_carousel_render($atts, $content = null) {
	global $post, $wp_query;

	extract(shortcode_atts(array(
		/* General option */
		'title' => '',
		'heading_size' =>'h3',
		'heading_icon' => '',
		'heading_align' =>'',
		'heading_color' =>'',
		'heading_text_style' => 'none',
		'subtitle' => '',
		'subtitle_heading_size'=>'h4',
		'description' => '',

		/* Source option */
		'category' => '',
		'posts_per_page' => '12',
		'orderby' => 'none',
		'order' => 'none',
		'meta_key' => '',
		'meta_value' => '',

		/* Layout Option */
		'layout' => 'default',
		'rows' => 1,
		'width_item' => '320',
		'margin_item' => '30',
		'auto_scroll' => '1',
		'speed_scroll' => '500',
		'show_nav' => '1',
		'nav_align'=>'text-left',
		'show_pager' => '0',
		'pager_align'=>'pager-left',
		'min_slide' => '1',
		'max_slide' => '3',
		'move_slide' => '3',
		
		/* Item Option */
		'overlay_bg_color' => 'rgba(0,0,0,0.8)',
		'overlay_appear' => '',
		'content_padding' => '',
		'item_content_align' => 'text-left',
		'item_content_color' => '#fff',
		'item_bg_color'		 => 'rgba(0,0,0,0.8)',
		'crop_image' => '0',
		'width_image' => '370',
		'height_image' => '240',
		'show_title' => '1',
		'item_heading_size'=>'h3',
		'item_title_color' =>'#fff',
		
		'show_description' => '1',
		'excerpt_length' => 100,
		'show_category' => '1',
		'show_popup' => '1',
		'popup_text' => 'Large image',
		'show_link' => '0',
		'show_link_text' => 'Launch Project',
		'show_read_more' => '0',
		'read_more' => 'Read more',

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
				'post_type' => 'portfolio',
				'tax_query' => array(
						array(
								'taxonomy' => 'portfolio_category',
								'field' => 'term_id',
								'terms' => $category
						)
				),
				'orderby' => $orderby,
				'order' => $order,
				'post_status' => 'publish'
		);
	} else {
            $args = array(
                            'posts_per_page' => $posts_per_page,
                            'post_type' => 'portfolio',
                            'orderby' => $orderby,
                            'order' => $order,
                            'post_status' => 'publish'
            );
        }

	$wp_query = new WP_Query($args);

	$date = time() . '_' . uniqid(true);
	ob_start();
	wp_enqueue_style('colorbox');
    wp_enqueue_style('cshero-portfoliocarousel', CSCORE_PLUGIN_URL.'framework/shortcodes/portfoliocarousel/css/portfoliocarousel.css', array(), '1.0.0');
	wp_enqueue_script('colorbox');
	wp_enqueue_script('bxslider');
	wp_enqueue_script('jm-bxslider');


    $heading_style = 'style="color:'.$heading_color.';text-transform:'.$heading_text_style.';"';
    $item_style = 'style="background-color:'.$item_bg_color.'; color:'.$item_content_color.'; padding:'.$content_padding.';"';
    $item_title_style = 'style="color:'.$item_title_color.';"';
    $image_style ='';
    if(!$crop_image) {
    	$image_style = 'style="width:100%;max-width:100%;"';
    }

    /* Overlay Style */
    $overlay_style ='style="'; 
    $overlay_style .= 'background-color:'.$overlay_bg_color.';color:'.$item_content_color.';';
    
    /* $crop_image_size = '';
    if($crop_image){
        $overlay_style .= 'width:'.$width_image.'px;height:'.$height_image.'px;max-width:100%;';
        $crop_image_size .='style="width:'.$width_image.'px;height:'.$height_image.'px;display: inline-block;"';
    } */
    $overlay_style .='"';
    ?>
    	<div id="cshero_portfolio_carousel<?php echo esc_attr($date); ?>" class="cshero-portfolio-carousel <?php echo str_replace('.','-',$layout).' '.esc_attr($el_class); ?>">
    		<?php if ($title != "" || $description != "") { ?>
		    <div class="cshero-header <?php echo esc_attr($heading_align);?> clearfix">
		        <?php if ($title != "") { ?>
		            <<?php echo $heading_size; ?> class="cshero-title" <?php echo $heading_style;?>>
		            	<?php if($heading_icon !=''){?><i class="fa fa-<?php echo esc_attr($heading_icon);?>"></i><?php } ?>
		            	<span class="line"><?php echo esc_attr($title); ?></span>
		            </<?php echo $heading_size; ?>>
		        <?php } ?>
		        <?php if ($subtitle !=""){ ?>
		            <<?php echo $subtitle_heading_size; ?> class="cshero-subtitle ">
		            	<?php echo esc_attr($subtitle); ?>
		            </<?php echo $subtitle_heading_size; ?>>
		        <?php }?>
		        <?php if ($description != "") { ?>
		            <div class="cshero-header-desc"><?php echo esc_attr($description); ?></div>
		        <?php } ?>
		    </div>
		    <?php } ?>

		    <div class="cshero-portfolio-carousel-list clearfix">
            	<div id="cshero_portfolio_carousel_<?php echo esc_attr($date); ?>" data-moveslides="<?php echo esc_attr($move_slide);?>" data-auto="<?php echo esc_attr($auto_scroll); ?>" data-prevselector="#cshero_portfolio_carousel<?php echo esc_attr($date); ?> .prev" data-nextselector="#cshero_portfolio_carousel<?php echo esc_attr($date); ?> .next" data-touchenabled="1" data-controls="true" data-pager="<?php echo esc_attr($show_pager);?>" data-pagerSelector="#cshero_portfolio_carousel<?php echo $date; ?> .cshero-control" data-pause="4000"  data-infiniteloop="false" data-adaptiveheight="true" data-speed="<?php echo esc_attr($speed_scroll); ?>" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="<?php echo esc_attr($max_slide); ?>" data-minslides="<?php echo esc_attr($min_slide); ?>" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
            		<?php
		                $counter =0;
		                while ($wp_query->have_posts()) : $wp_query->the_post();

		                $attachment_full_image = "";
		                if (has_post_thumbnail()) {
		                    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
		                    $attachment_full_image = $attachment_image[0];
		                } else {
		                	$attachment_full_image = CSCORE_PLUGIN_URL.'assets/images/no-image.jpg';
		                }
		                $counter++;
		                if($rows == 1){
		                        echo '<div class="cshero-portfolio-carousel-item-wrap">';
		                    }else{
		                        if($counter % $rows == 1){
		                            echo '<div class="cshero-portfolio--carousel-item-wrap">';
		                        }
		                    }
		                ?>
		                <?php
		                    $portfolio_link = get_post_meta(get_the_ID(), 'cs_portfolio_link', true);
		                    ?>
		                    <div class="cshero-shortcode cshero-portfolio-carousel-item <?php echo $item_content_align; ?>" <?php if(($counter % $rows != 0) and $rows != 1) echo 'style="margin-bottom:'.esc_attr($margin_item).'px;"'; ?>>
		                        <?php
		                            $file_layout= "cms_templates/portfoliocarousel/layouts/$layout.php";
		                            $file_css   = "cms_templates/portfoliocarousel/css/$layout.css";
		                            if(locate_template($file_layout)){
		                                if(locate_template($file_css))
		                                    wp_enqueue_style("cshero-portfoliocarousel-".str_replace('.','-',$layout),get_template_directory_uri()."/".$file_css);
		                                require locate_template($file_layout);
		                            }else{
		                                    wp_enqueue_style('cshero-portfoliocarousel-'.str_replace('.','-',$layout).'', CSCORE_PLUGIN_URL . "framework/shortcodes/portfoliocarousel/css/$layout.css");
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
            	<?php if($show_pager) {?>
	                <div class="cshero-control <?php echo esc_attr($pager_align);?>"></div>
	            <?php } ?>
	            <?php if($show_nav){ ?>
	            <div class="cshero-nav <?php echo $nav_align;?>">
		                <ul>
		                    <li class="prev"></li>
		                    <li class="next"></li>
		                </ul>
		            </div>
		        <?php } ?>
            </div>
            
	        <?php if($morelink!='' && $moretext !=''):?>
	            <div class="cshero-morelink text-center"><a class="btn btn-default" href="<?php echo $morelink;?>"><?php echo $moretext;?></a></div>
	        <?php endif;?>
    	</div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
