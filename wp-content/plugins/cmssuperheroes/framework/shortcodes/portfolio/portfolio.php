<?php
add_shortcode('cshero-portfolio', 'cshero_portfolio_render');
add_action('wp_enqueue_scripts','add_lib_script');

function get_max_post($arrayData){
	$args = build_args_portfolio($arrayData);
	$wp_query = new WP_Query($args);
	$count = $wp_query->post_count;
	return $count;
}

function build_args_portfolio($arrayData){
	extract($arrayData);
	if (isset($category)) {
		$cats = $category;
		$category = $term_cats = array();
		foreach ((array) $cats as $cat) :
			$category[] = trim($cat);
			$term_cats[] = get_term( $cat, 'portfolio_category' );
		endforeach;
		$args = array(
			'posts_per_page' => $posts_per_page,
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio_category',
					'field' => 'term_id',
					'terms' => $category
				)
			),
			'orderby' => $orderby,
			'order' => null,
			'post_type' => 'portfolio',
			'post_status' => 'publish',
			'paged' => $paged
		);
	} else {
		$args = array(
			'posts_per_page' => $posts_per_page,
			'orderby' => $orderby,
			'order' => null,
			'post_type' => 'portfolio',
			'post_status' => 'publish',
			'paged' => $paged
		);
	}
	if(isset($max_post) && $max_post == true){ $args['posts_per_page'] = -1; }
	if(isset($post__not_in)){ $args['post__not_in'] = $post__not_in; }
	return $args;
}


function set_portfolio_options($arrayData){
	extract($arrayData);

	$portfolio_options = array();

	$cats = $category;
	$term_cats = array();
	foreach ((array) $category as $cat) :
	   $term_cats[] = get_term( $cat, 'portfolio_category' );
	endforeach;
	$portfolio_options['term_cats'] = $term_cats;

	return $portfolio_options;
}

function set_pagination_options($arrayData){
	extract($arrayData);

	$pagination_options = array();
	$pagination_options['show_pages'] = $show_pages;
	$pagination_options['show_pages_number'] = $show_pages_number;
	$pagination_options['show_page_nav'] = $show_page_nav;

	return $pagination_options;
}

function add_lib_script(){
	wp_enqueue_style('colorbox');
	wp_enqueue_style('cshero_portfolio', CSCORE_PLUGIN_URL.'framework/shortcodes/portfolio/css/portfolio.css',array(), '1.0.0', 'all');
}

function get_portfolio_items($arrayData){
	extract($arrayData);
	$count = 0;
	
	if ($wp_query->have_posts()) {
        global $cs_portfolio,$cs_portfolio_id;
        if(!isset($cs_portfolio)){
            $cs_portfolio =1;
        }
        $cs_portfolio_id = "cshero_portfolio_{$cs_portfolio}";
        $cs_portfolio++;
		echo '<div id="'.$cs_portfolio_id.'" class="cshero-portfolio cshero-portfolio-col'.esc_attr($columns).' '.str_replace('.','-',$layout).' '.esc_attr($el_class).'" data-columns="'.esc_attr($columns).'" data-type="'.esc_attr($type).'" style="margin-right: -'.$item_margin.'">';
		echo '<div class="cshero-portfolio-wrapper">';
		echo '<div class="grid-sizer"></div>';
		$cat_slug_array = array();
		while ($wp_query->have_posts()) {
			$wp_query->the_post();
			/* get all terms */
			$terms_cat = get_the_terms($wp_query->post->ID, "portfolio_category");
			/* default list cats and list pager of cat on a portfolio item */
			$project_cats = NULL;
			$page_project_cats = NULL;
			$project_names = $project_slug = array();
			/* get class as categories name and get array categories name & slug*/
			if (!empty($terms_cat)) {
				foreach ($terms_cat as $term) {
					$project_cats .= 'cat-'.strtolower($term->slug) . ' ';
					$project_names[] = $term->name;
					$project_slug[] = 'cat-'.strtolower($term->slug);
					$cat_slug_array[] = 'cat-'.strtolower($term->slug);
				}
			}
			/* tag */
			$terms = get_the_terms($wp_query->post->ID, "portfolio_tag");
			$project_tags = NULL;
			if (!empty($terms)) {
				foreach ($terms as $term) {
					$project_tags .= 'tag-'.strtolower($term->slug) . ' ';
				}
			}
			/* end tag */
			$_id = get_the_ID();
			/* page for a portfolio item when filter all -  example page-1 */
			$tmp_page = floor($count/$items_display)+1;
			/* init page for portfolio item when filter a category - example page-cat-category-1 */
			/* foreach categories of a portfolio */
			foreach ($project_slug as $project_cat) {
				/* count item of a category. Default 0 */
				$categories_tmp[$project_cat]['count']=(!isset($categories_tmp[$project_cat]['count']))?0:$categories_tmp[$project_cat]['count'];
				/* init page number for a portfolio item of a category. */
				$categories_tmp[$project_cat]['page']=floor($categories_tmp[$project_cat]['count']/$items_display)+1;
				/* render class page number filter a category */
				$page_project_cats .= 'page-'.strtolower($project_cat).'-'.$categories_tmp[$project_cat]['page'].' ';
				/* count item for a category when loop */
				$categories_tmp[$project_cat]['count']++;
			}
			/* count item when loop for all categories */
			$firs_item ='';
			$count++;
			if($count == '1') $firs_item .='first-item';
			echo 	'<div class="cshero-shortcode cshero-portfolio-item '.esc_attr($project_cats).' '.trim(esc_attr($page_project_cats)).' '.esc_attr($project_tags) .' '.' page-'.$tmp_page.' '.$item_content_align.' '.$firs_item.'" data-id="'.esc_attr($_id).'">';
                        $file_layout= "cms_templates/portfolio/layouts/$layout.php";
                        $file_css   = "cms_templates/portfolio/css/$layout.css";
                        if(locate_template($file_layout)){
                            if(locate_template($file_css))
                                wp_enqueue_style("cshero-portfolio-".str_replace('.','-',$layout),get_template_directory_uri()."/".$file_css);
                            require locate_template($file_layout);
                        }else{
                            wp_enqueue_style('cshero-portfolio-'.str_replace('.','-',$layout).'', CSCORE_PLUGIN_URL . "framework/shortcodes/portfolio/css/$layout.css");
                            require  "layouts/$layout.php";
                        }
			echo 	"</div>";
		}
		echo "</div></div>";
		/*Pagination*/
        if($pagination == 1) {
        	$active = '';
			$page = ($count % $items_display == 0)?floor($count/$items_display):(floor($count/$items_display) +1);
			if($page>1){
				echo '<div class="cshero-control '.$pagination_type.' cshero_portfolio_filters center cshero_portfolio_filters-pagination filtered-cat-"><ul class="bx-pager-inner cshero-portfolio-pagination btn-group" data-filter-group="page">';
				for($i=1;$i<=$page;$i++){
					$active = ($i==1)?'category-page-1 active':"";
					echo '<li ><a href="#" data-filter=".page-'.$i.'" class="bx-pager-link '.$active.'"><span>'.$i.'</span></a></li>';
				}
				echo '</ul></div>';
			}
			/* list pagination for all category. Each category as a pagination. */
			foreach(array_unique($cat_slug_array) as $project_cat){
				/* init page number. */
				$categories_tmp[$project_cat]['page'] = ($categories_tmp[$project_cat]['count'] % $items_display == 0)?floor($categories_tmp[$project_cat]['count']/$items_display):(floor($categories_tmp[$project_cat]['count']/$items_display) +1);
				/* render when page count > 1 */
				if($categories_tmp[$project_cat]['page']>1){
					
					echo '<div style="display:none;" class="cshero-control '.$pagination_type.' cshero_portfolio_filters cshero_portfolio_filters-pagination center filtered-cat-'.$project_cat.'"><ul class="bx-pager-inner btn-group cshero-portfolio-pagination" data-filter-group="page-cat">';
					for($i=1;$i<=$categories_tmp[$project_cat]['page'];$i++){
						$active = ($i==1)?'category-page-1 active':"";
						echo '<li ><a href="#" data-filter=".page-'.trim(esc_attr($project_cat)).'-'.$i.'" class="bx-pager-link '.$active.'"><span>'.$i.'</span></a></li>';
					}
					echo '</ul></div>';
				}
			}
        }
		if($morelink && $moretext){
		  echo "<div class='cshero-portfolio-view-all clearfix center'><a href='".$morelink."' class='".$view_all_button_type."'>".$moretext."</a></div>";
		}
		?> 
	<?php }
}

function portfolio_js($stringJSON){
    wp_enqueue_script('jquery-isotope');
    wp_enqueue_script('jm-direction');
    wp_enqueue_script('colorbox');
	wp_register_script( 'cs_custom_portfolio', CSCORE_PLUGIN_URL . 'framework/shortcodes/portfolio/js/custom_portfolio.js' );
	wp_localize_script( 'cs_custom_portfolio', 'cs_custom_portfolio', $stringJSON );
	wp_localize_script( 'cs_custom_portfolio', 'cs_custom_portfolio_ajaxurl', array('url'=>admin_url('admin-ajax.php')));
	wp_enqueue_script( 'cs_custom_portfolio' );
}


function cshero_portfolio_render($atts, $content = null) {
    $use_portfolio = 1;
    if($use_portfolio == 1 || $use_portfolio == true){
        global $post, $wp_query, $portfolio_filters, $portfolio_options, $pagination_options;

        extract(shortcode_atts(array(
        	/* General option*/
        	'title' => '',
            'heading_size' => 'h3',
            'heading_icon' => '',
            'title_align' => 'text-left',
            'heading_color' => '',
            'heading_align' => '',
            'heading_text_style' => 'none',
            'subtitle' => '',
            'subtitle_heading_size' => 'h4',
            'description' => '',

            /* Source Option*/
            'category' => '',
            'posts_per_page' => '20',
            'orderby' => '',
            'order'   => '', 
            'items_display' =>'10',
            /* Layout option */
            'type' => 'grid',
            'layout' => 'portfolio.default',
            'columns' => '3',
            'filter' => '1',
            'filter_align' => 'text-left',
            'filter_btn' => 'btn',
            'filter_btn_size' => 'btn-default',
            'filter_margin' => '0 0 90px 0',
            'pagination'   => '1',
            'pagination_type' => 'number',
            "item_margin"       => '',

            /* Item Option*/
            "item_content_align" => "text-left",
			"show_title"		=> '1',
            "title_color"       => '#fff',
            "category_color"       => '#fff',
			"show_category"		=> '1',
            "item_bg_color"    => 'rgba(0,0,0,0.8)',
			"show_description"	=> '1',
            "description_color" => '#fff',
			"excerpt_length"	=> '100',
			"crop_image"		=> '0',
			"width_image"		=> '370',
			"height_image"		=> '200',
			"read_more"			=> '1',
			"read_more_text"	=> 'Read more',
			'read_more_icon'	=> 'fa fa-link',
			"zoom"			    => '1',
			"zoom_text"			=> 'Large image',
			'zoom_icon'			=> 'fa fa-search',
			"show_link"			=> '1',
			'link_text'			=> 'Launch Project',
			'link_icon'			=> 'fa fa-external-link',
			'link_type'			=> 'icon',
			"item_link_color"    => '#fff',
            "item_link_hover_color"    => '#fff',
			
			'morelink'			=> '',
			'moretext'			=> '',
			'view_all_button_type' => 'btn btn-default',
			'el_class'			=> ''

		), $atts));     
        /* set post for page */
		($posts_per_page == '')? $posts_per_page = -1 : "";

		/*set page*/
        $paged = 1;
        $_category = array();
        if($category==''){
            $terms = get_terms('portfolio_category');
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $category);
        }
		/* get max post */
		$count_max_post = get_max_post(array(
			"category" 			=> $_category,
			"posts_per_page" 	=> $posts_per_page,
			"orderby" 			=> $orderby,
			"paged" 			=> $paged,
			"max_post" 			=> true
		));

		/* build args */
		$args = build_args_portfolio(array(
			"category" 			=> $_category,
			"posts_per_page" 	=> $posts_per_page,
			"orderby" 			=> $orderby,
			"paged" 			=> $paged
		));

		/* set portfolio options */
        $portfolio_options = set_portfolio_options(array(
        	
			/* Item Option*/
			"category"			=> $_category,
			"item_content_align" => $item_content_align,
			"items_display" => $items_display,
			"show_title"		=> $show_title,
            "title_color"       => $title_color,
			"show_category"		=> $show_category,
			"category_color"		=> $category_color,
            "item_bg_color"    => $item_bg_color,
			"show_description"	=> $show_description,
            "description_color" => $description_color,
			"excerpt_length"	=> $excerpt_length,
			"crop_image"		=> $crop_image,
			"width_image"		=> $width_image,
			"height_image"		=> $height_image,
			"read_more"			=> $read_more,
			"read_more_text"	=> $read_more_text,
			'read_more_icon'	=> $read_more_icon,
			"zoom"			    => $zoom,
			"zoom_text"			=> $zoom_text,
			'zoom_icon'			=> $zoom_icon,
			"show_link"			=> $show_link,
			'link_text'			=> $link_text,
			'link_icon'			=> $link_icon,
			'link_type'			=> $link_type,
			"item_link_color"    => $item_link_color,
            "item_link_hover_color"    => $item_link_hover_color,
            /* Extra Option */
            "morelink"          => $morelink,
            "moretext"          => $moretext,
            'view_all_button_type' => $view_all_button_type,
            'pagination'        => $pagination,
            'pagination_type'	=> $pagination_type,
            'el_class'			=> $el_class
		));

        $wp_query = new WP_Query($args);
		$count_post = $wp_query->post_count; 
        ob_start();
        if ($wp_query->have_posts()) { ?>

        	<?php if ($title != "" || $subtitle != '' || $description != "") { ?>
			<div class="cshero-header <?php echo esc_attr($heading_align);?>">
   			 <?php if ($title != "") { 
			    	$heading_style = 'style="color:'.$heading_color.';text-transform:'.$heading_text_style.';"';
			    	?>
			        <<?php echo $heading_size; ?> class="cshero-title" <?php echo $heading_style;?>>
			            <?php if($heading_icon !=''){?><i class="fa fa-<?php echo esc_attr($heading_icon);?>"></i><?php } ?>
			            <span class="line"><?php echo esc_attr($title); ?></span>
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

        	<?php 
            /* get filter */
            if($filter == 1) {
            	$filter_style = 'style="';
            	$filter_style .= 'margin:'.$filter_margin.';';
            	$filter_style .= '"';
	            if(locate_template('cms_templates/portfolio/'.str_replace('.','-',$layout).'-filters.php')){
	                require locate_template('cms_templates/portfolio/'.str_replace('.','-',$layout).'-filters.php');
                    wp_enqueue_style(str_replace('.','-',$layout).'-filters',get_template_directory_uri().'/cms_templates/portfolio/css/'.str_replace('.','-',$layout).'-filters.css');
	            }else{
	                require  "portfolio-filters.php";
	            }
	        }


			/* get portfolio items */
			get_portfolio_items(array(
				"wp_query" 				=> $wp_query,
				"columns" 				=> $columns,
				"type" 					=> $type,
				"layout" 				=> $layout,
				"item_margin"       	=> $item_margin,
				"count_max_post"		=> $count_max_post,
				"count_post" 			=> $count_post,
				"items_display" 	=> $items_display,
				"morelink"              => $morelink,
				"moretext"              => $moretext,
				"view_all_button_type"              => $view_all_button_type,

				/* Item Option*/
				"item_content_align" => $item_content_align,
				"show_title"		=> $show_title,
	            "title_color"       => $title_color,
				"show_category"		=> $show_category,
				"category_color"		=> $category_color,
	            "item_bg_color"    => $item_bg_color,
	            "item_link_color"    => $item_link_color,
	            "item_link_hover_color"    => $item_link_hover_color,
				"show_description"	=> $show_description,
	            "description_color" => $description_color,
				"excerpt_length"	=> $excerpt_length,
				"crop_image"		=> $crop_image,
				"width_image"		=> $width_image,
				"height_image"		=> $height_image,
				'link_type'			=> $link_type,
				"read_more"			=> $read_more,
				"read_more_text"	=> $read_more_text,
				'read_more_icon'	=> $read_more_icon,
				"zoom"			    => $zoom,
				"zoom_text"			=> $zoom_text,
				'zoom_icon'			=> $zoom_icon,
				"show_link"			=> $show_link,
				"link_text"			=> $link_text,
				'link_icon'			=> $link_icon,
                'pagination'        => $pagination,
                'pagination_type'	=> $pagination_type,
                'el_class'			=> $el_class
				
			));

			/* js */
			portfolio_js($atts);

		} else {
            echo "<span class='notfound'>No portfolio found!</span>";
        }

        wp_reset_query();
        wp_reset_postdata();
        return ob_get_clean();
    }else{
        return '';
    }
}
?>
