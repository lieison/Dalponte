<?php
add_shortcode('cs-menu-carousel', 'cs_shortcode_menu_carousel_render');

function cs_shortcode_menu_carousel_render($atts, $content = null) {
	global $post, $wp_query;
	extract(shortcode_atts(array(
		'title' => '',
		'heading_size' =>'h3',
		'heading_icon'=>'',
		'title_align' =>'',
		'title_color' =>'',
		'heading_style' =>'',
		'heading_text_style'=>'',
		'subtitle' => '',
		'subtitle_heading_size'=>'h4',
		'description' => '',
		'category' => '',
		'layout' => 'postcarousel.layout1',
		'show_image'=>'1',
		'crop_image' => '0',
		'width_image' => '360',
		'height_image' => '240',
		'image_border' => '',
		'width_item' => '340',
		'margin_item' => '30',
		'auto_scroll' => '1',
		'show_nav' => '',
		'nav_align'=>'',
		'show_pager' => '',
		'pager_align'=>'',
		'content_align' =>'',
		'content_color'=>'',
		'item_heading_size'=>'h3',
		'show_title' => '',
		'item_title_color' => '',
		'show_description' => '',
		'excerpt_length' => 100,
		'show_category' => '1',
		'show_popup' => '1',
		'show_date' => '1',
		'show_comment' => '1',
		'show_author' => '1',
		'show_read_more' => '1',
		'read_more' => 'Read more',
		'rows' => 1,
		'min_slider'=>'1',
		'max_slider'=>'6',
		'posts_per_page' => 12,
		'meta_key' => '',
		'meta_value' => '',
		'orderby' => 'none',
		'order' => 'none',
		'el_class' => '',
		'morelink' => '',
		'moretext' => ''
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
								'taxonomy' => 'restaurantmenu_category',
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
				'post_type' => 'restaurantmenu',
				'post_status' => 'publish'
			);
		} else {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'tax_query' => array(
						array(
								'taxonomy' => 'restaurantmenu_category',
								'field' => 'id',
								'terms' => $category
						)
				),
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'restaurantmenu',
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
				'post_type' => 'restaurantmenu',
				'post_status' => 'publish'
			);
		} else {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'orderby' => $orderby,
				'order' => $order,
				'post_type' => 'restaurantmenu',
				'post_status' => 'publish'
			);
		}
	}

	$wp_query = new WP_Query($args);

	$date = time() . '_' . uniqid(true);
	ob_start();
	wp_enqueue_style('colorbox');
	wp_enqueue_script('colorbox');
	wp_enqueue_script('bxslider');
	wp_enqueue_script('jm-bxslider');
	$cl_show = '';
	if ($title != "" || $description != "") {
		$cl_show .= 'show-header';
	}
	if ($show_nav == true || $show_nav == 1) {
		$cl_show .= ' show-nav';
	}

	$image_style = '';
    if($image_border !='') $image_style .= 'border-radius:'.$image_border.';-webkit-border-radius:'.$image_border.';-moz-border-radius:'.$image_border.';-ms-border-radius:'.$image_border.';-o-border-radius:'.$image_border.';';
	/* */
	$_title_color = 'style="';
		if($title_color){
		    $_title_color .= 'color:'.$title_color.'!important;';
		}
		if($heading_text_style){
			$_title_color .= 'text-transform:'.$heading_text_style.';';
		}
	$_title_color .= '"';
  
    $file_layout= "cms_templates/menucarousel/layouts/$layout.php";
    $file_css   = "cms_templates/menucarousel/css/$layout.css";
    if( locate_template($file_layout) ) {
        if( locate_template($file_css) )
            wp_enqueue_style( "menucarousel-$layout",get_template_directory_uri()."/".$file_css);
        require locate_template($file_layout);
    } else {
        wp_enqueue_style('menucarousel', CSCORE_PLUGIN_URL . "framework/shortcodes/menucarousel/css/$layout.css");
        require  "layouts/$layout.php";
    }
    wp_reset_postdata();
    return ob_get_clean();
}
