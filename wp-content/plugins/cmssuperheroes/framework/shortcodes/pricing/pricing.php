<?php
add_shortcode('cs-pricing', 'cs_pricing_render');

function cs_pricing_render($atts, $content = null) {
	$use_pricing = 1;
	if($use_pricing == 1 || $use_pricing == true){
		global $post, $wp_query;
		extract(shortcode_atts(array(
			'title' => '',
			'heading_size'=>'',
			'title_color'=>'',
			'sub_title'=>'',
			'sub_heading_size'=>'',
			'sub_title_color'=>'',
			
			'description' => '',
			'description_color'=>'',
			/* Layout */
			'layout' => 'pricing.layout1',
			'columns' => 3,

			/* Item */
			'content_align' => 'text-center',
			'show_image'=>'1',
			'show_video'=>'1',
			'title_pricing_color'=>'',
			'badge_color' => "#fff",
			'title_background_pricing_color'=>'transparent',
			'content_background_pricing_color'=>'transparent',
			'button_background_pricing_color'=>'',
			'button_font_pricing_color'=>'',
			'button_type' => '',

			/* Source */
			'category' => '',
			'orderby' => 'none',
	        'order' => 'none',
			
			'el_class' => ''
		), $atts));

		$posts_per_page = 3;

		if ($columns != '') {
			$posts_per_page = $columns;
		}

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
									'taxonomy' => 'pricing_category',
									'field' => 'id',
									'terms' => $category
							)
					),
					'orderby' => $orderby,
					'order' => $order,
					'post_type' => 'pricing',
					'post_status' => 'publish',
					'paged' => 1
			);
		} else {
			$args = array(
					'posts_per_page' => $posts_per_page,
					'orderby' => $orderby,
					'order' => $order,
					'post_type' => 'pricing',
					'post_status' => 'publish',
					'paged' => 1
			);
		}

		$width = "col-xs-12 col-sm-6 col-md-3 col-lg-3";
		switch ($columns) {
			case 2:
				$width = "col-xs-12 col-sm-6 col-md-6 col-lg-6";
				break;
			case 3:
				$width = "col-xs-12 col-sm-6 col-md-4 col-lg-4";
				break;
            case 5:
				$width = "col-xs-12 col-sm-6 col-md-2 col-lg-2";
				break;
			default:
				$width = "col-xs-12 col-sm-6 col-md-3 col-lg-3";
				break;
		}
		$wp_query = new WP_Query($args);
		$date = time() . '_' . uniqid(true);

		$pricing_wrap = str_replace('.', '-', $layout);

		$title_styles = array();
		if($title_color){
			$title_styles[] = 'color:'.$title_color.';';
		}
		$title_styles = cshero_build_style($title_styles);

		$sub_title_styles = array();
		$sub_title_styles = array();
		if($sub_title_color){
			$sub_title_styles[] = 'color:'.$sub_title_color.';';
		}
		$sub_title_styles = cshero_build_style($sub_title_styles);

		$desc_style = array();
		if($description_color){
			$desc_style[] = 'color:'.$description_color.';';
		}
		$desc_style = cshero_build_style($desc_style);

		global $smof_data;

		/* Item style */
		$item_bg = $title_background_pricing_color;
		$feature_item_bg = $content_background_pricing_color;

		$item_title_style = 'style="';
			$item_title_style .= 'color:'.$title_pricing_color.';';
		$item_title_style .= '"';

		wp_enqueue_style('pricing', CSCORE_PLUGIN_URL . "framework/shortcodes/pricing/css/pricing.css");
		wp_enqueue_script('pricing',  CSCORE_PLUGIN_URL . "framework/shortcodes/pricing/js/video.pricing.js");
		ob_start();
        ?>

			<div id='cs_pricing_<?php echo esc_attr($date); ?>' class='cs-pricing cshero-pricing <?php echo esc_attr($pricing_wrap) . ' ' . esc_attr($el_class); ?>'>
			    <?php if ($title != "" || $description != "") { ?>
			        <div class="cshero-header">
			            <?php if ($title != "") { ?>
			                <<?php echo $heading_size; ?> class="cshero-title" <?php echo $title_styles; ?>><?php echo $title; ?></<?php echo $heading_size; ?>>
			            <?php } ?>
			            <?php if ($sub_title != "") { ?>
			                <<?php echo $sub_heading_size; ?> class="cshero-sub-title" <?php echo $sub_title_styles; ?>><?php echo $sub_title; ?></<?php echo $sub_heading_size; ?>>
			            <?php } ?>
			            <?php if ($description != "") { ?>
			                <p class="cshero-desc" <?php echo $desc_style; ?>><?php echo $description; ?></p>
			            <?php } ?>
			        </div>
			    <?php } ?>

			    <div class="content row">
			    <?php
			    while ($wp_query->have_posts()) {
			        $wp_query->the_post();
			        $custom = array();
			        $custom['best_value'] = $custom['is_feature'] = $custom['price'] = $custom['value'] = $custom['option_1'] = $custom['option_2'] = $custom['option_3'] = $custom['option_4'] = $custom['option_5'] = $custom['option_6'] = $custom['option_7'] = $custom['option_8'] = $custom['option_9'] = $custom['option_10'] = $custom['button_link'] = $custom['button_text'] = array();
			        $custom['best_value'][0] = '';
			        $custom['is_feature'][0] = '';
			        $custom['price'][0] = '';
			        $custom['value'][0] = '';
			        $custom['option_1'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['option_2'][0] = '';
			        $custom['button_text'][0] = '';
			        $custom['button_link'][0] = '';
			        $custom = array_merge($custom,get_post_custom($wp_query->post->ID));

			        $style = 'style="background-color:';
			        if($custom['is_feature'][0] == 1) $style .= $feature_item_bg.';'; else $style .= $item_bg.';';
			        if (has_post_thumbnail() and wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false) && $show_image) {
			        	$attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
			        	$style .=  'background-image: url('.esc_url($attachment_image[0]).'); background-size:cover;';
			        }
			        $style .='"';
			        /** video */
                    $poster = '';
                    $preview_image = get_post_meta($post->ID, 'cs_video_preview', true);
                    $video_file_webm = get_post_meta($post->ID, 'cs_video_link_webm', true);
                    $video_file_ogg = get_post_meta($post->ID, 'cs_video_link_ogg', true);
                    $video_file_mp4 = get_post_meta($post->ID, 'cs_video_link_mp4', true);
                    if($preview_image){
                        $preview_image = wp_get_attachment_image_src($preview_image, 'full');
                    }
                    if(is_array($preview_image)){
                        $poster = ' poster="'.$preview_image[0].'"';
                    }
			        ?>
			        <div class="cs-pricing-item <?php echo esc_attr($width).' '.$content_align; ?> <?php echo $custom['is_feature'][0] == 1 ? "cs-pricing-feature" : ""; ?>" >
			            <div class="cs-pricing-container <?php if($custom['best_value'][0] != '') echo 'hasBestValue'; ?>" <?php if($custom['best_value'][0] != '') { ?> title="<?php echo $custom['best_value'][0]; ?>" <?php } ?>>
			            	<?php 
						        $file_layout= "cms_templates/pricing/layouts/$layout.php";
						        $file_css   = "cms_templates/pricing/css/$layout.css";
						        if( locate_template($file_layout) ) {
						            if( locate_template($file_css) )
						                wp_enqueue_style( ''.$pricing_wrap.'',get_template_directory_uri()."/".$file_css);
						            require locate_template($file_layout);
						        } else {
						            wp_enqueue_style(''.$pricing_wrap.'', CSCORE_PLUGIN_URL . "framework/shortcodes/pricing/css/$layout.css");
						            require  "layouts/$layout.php";
						        }
						    ?>
			            </div>
			        </div>
			        <?php
			    }
			    ?>
			    </div>
			</div>
	        
        <?php wp_reset_postdata();wp_reset_query();
        return ob_get_clean();
    }else{
        return '';
    }
}