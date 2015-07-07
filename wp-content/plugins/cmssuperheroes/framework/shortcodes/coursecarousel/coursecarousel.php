<?php
add_shortcode('cs-course-carousel', 'cs_course_carousel_render');
function cs_course_carousel_render($atts, $content = null) {
	global $post, $wp_query;

	extract(shortcode_atts(array(
		'title' => '',
		'heading_size' =>'h2',
		'title_align' =>'',
		'title_color' =>'',
		'heading_style' =>'',
		'subtitle' => '',
		'subtitle_heading_size'=>'h4',
		'description' => '',

		'category' => '',
		'item_heading_size'=>'h3',
		'show_title' => '1',
		'crop_image' => '0',
		'width_image' => 340,
		'height_image' => 340,
		'show_description' => '1',
		'excerpt_length' => 100,
		'show_category' => '1',
		'show_popup' => '1',
		'popup_text' => 'Large image',
		'show_read_more' => '1',
		'read_more' => 'Read more',
		'show_date'=>'1',
		'posts_per_page' => 12,
		'orderby' => 'none',
		'order' => 'none',

		"layout" => "coursecarousel.layout1",
		'rows' => 1,
		'min_slide' =>'1',
		'max_slide' =>'3',
		'speed_slide' =>'500',
		'number_slide' =>'3',
		'width_item' => 340,
		'margin_item' => 30,
		'auto_scroll' => '1',
		'show_nav' => '1',
		'nav_align'=>'text-left',
		'show_pager' => '1',
		'pager_align'=>'pager-left',
		'same_height' => '1',

		'meta_key' => '',
		'meta_value' => '',

		'morelink' => '',
		'moretext' => '',
		'el_class' => '',

	), $atts));
	$crop_image=($crop_image=='false')?false:$crop_image;
	if (isset($category) && $category != '') {
		$cats = explode(',', $category);
		$category = array();
		foreach ((array) $cats as $cat) :
		$category[] = trim($cat);
		endforeach;
		$args = array(
				'posts_per_page' => $posts_per_page,
				'post_type' => 'sfwd-courses',
				'tax_query' => array(
						array(
								'taxonomy' => 'category',
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
                            'post_type' => 'sfwd-courses',
                            'orderby' => $orderby,
                            'order' => $order,
                            'post_status' => 'publish'
            );
        }

	$wp_query = new WP_Query($args);

	$date = time() . '_' . uniqid(true);
	ob_start();
	wp_enqueue_style('colorbox');
    wp_enqueue_style('coursecarousel', CSCORE_PLUGIN_URL.'framework/shortcodes/coursecarousel/css/coursecarousel.css', array(), '1.0.0');
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

    $file_layout= "cms_templates/coursecarousel/layouts/$layout.php";
    $file_css   = "cms_templates/coursecarousel/css/$layout.css";
    if(locate_template($file_layout)){
        if(locate_template($file_css))
            wp_enqueue_style("coursecarousel-$layout",get_template_directory_uri()."/".$file_css);
        require locate_template($file_layout);
    }else{
            wp_enqueue_style('coursecarousel', CSCORE_PLUGIN_URL . "framework/shortcodes/coursecarousel/css/$layout.css");
            require  "layouts/$layout.php";
        }
    wp_reset_postdata();
    return ob_get_clean();
}
