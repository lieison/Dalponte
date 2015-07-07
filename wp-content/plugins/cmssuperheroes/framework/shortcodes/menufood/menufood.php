<?php
add_shortcode('cs-menufood', 'cs_shortcode_menufood_render');
$menufood_id = 0;
function cs_shortcode_menufood_render($params, $content = NULL) {
    global $menufood_id;
    extract(shortcode_atts(array(
                'category' => '',
                'enable_parallax' => '1',
                'category_heading'=>'h1',
                'category_padding' => '40px 0 40px 0',
                'num_post' => '',
                'post_heading'=>'h3',
                'title_category_color'=>'',
                'layout' => 'menufood.layout1',
                'layout_colunm' => '1',
                'excerpt_length' => '',
                'orderby' => 'ID',
                'show_price' => '',
                'image' => '',
                'crop_image' => '',
                'width_image' => '160',
                'height_image' => '160',
                'order' => 'DESC',
                'class' => ''
                    ), $params));
    $id = 'cs-menufood-'.$menufood_id;
    wp_enqueue_script('jquery-colorbox');

    $col = 'col-xs-12 col-sm-6 col-md-6 col-lg-6 menu_food_2_col';
    switch ($layout_colunm){
    	case 1:
    		$col = 'col-xs-12 col-sm-12 col-md-12 col-lg-12 menu_food_1_col';
    		break;
    	case 2:
    		$col = 'col-xs-12 col-sm-6 col-md-6 col-lg-6 menu_food_2_col';
    		break;
    	case 3:
    		$col = 'col-xs-12 col-sm-6 col-md-4 col-lg-4 menu_food_3_col';
    		break;
    	case 4:
    		$col = 'col-xs-12 col-sm-6 col-md-3 col-lg-3 menu_food_4_col';
    		break;
    }
    $image_layout = new stdClass();
    $image_layout->image = '';
    $image_layout->content = ' col-xs-12 col-sm-12 col-md-12 col-lg-12';
    if($image){
        $image_layout->image = ' col-xs-12 col-sm-6 col-md-4 col-lg-4';
        $image_layout->content = ' col-xs-12 col-sm-6 col-md-8 col-lg-8';
    }

    $posts = CSCORE_Base::getPostsByCategory($category,'restaurantmenu','restaurantmenu_category');
    
	$term = get_term( $category, 'restaurantmenu_category');
	$cat_data = get_option("category_".$category);
	$images_id = '';
	$attachment_image = array();
	if(isset($cat_data['img'])){
    	$images_id = (int)$cat_data['img'];
    	$attachment_image = wp_get_attachment_image_src($images_id,'full');
	}
	/* Background */
	$bg = '';
	$styles = '';
	$data_image_height = '';
	if(count($attachment_image) > 0){
	    $bg = $attachment_image[0];
	    if(empty($cat_data['bg_parallax_speed'])){
	        $cat_data['bg_parallax_speed'] = 0.6;
	    }
	    $data_image_height = " data-stellar-background-ratio='{$cat_data['bg_parallax_speed']}' data-background-height='{$attachment_image[2]}' data-background-width='{$attachment_image[1]}'";
	    $styles .= '<style type="text/css">';
	    $styles .= '#'.$id.'{';
	    $styles .= ' background-image:url('.$bg.');';
	    $styles .= ' padding:10px 0;';
	    if(isset($cat_data['bg_parallax']) && $cat_data['bg_parallax'] == 'yes'){
	       $styles .= ' -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
	    }
	    $styles .= '}';
	    $styles .= '</style>';
	}
	?>
    <?php if($enable_parallax) echo $styles; ?>
    <div class="<?php echo str_replace('.','-',$layout).' '.esc_attr($class); ?>">
        <?php if($enable_parallax) {?>
        <div id="<?php echo $id; ?>" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title-categoryFood<?php if($cat_data['bg_parallax'] == 'yes'){ echo " stripe-parallax-bg"; } ?>"<?php echo $data_image_height; ?>>
            <div style="padding:<?php echo $category_padding;?>;">
                <div class="title-category">
                   <<?php echo $category_heading; ?> class="title-default" style="color: <?php echo $title_category_color; ?>"><?php if(isset($term->name)){ echo esc_attr($term->name);} ?></<?php echo $category_heading; ?>>
                </div>
                <div class="description-category"><?php if(isset($term->description)){ echo esc_attr($term->description);} ?></div>
            </div>
        </div>
        <?php } else { ?>
            <div class="cshero-category-title" style="padding:<?php echo $category_padding;?>;">
                <div class="title-category">
                   <<?php echo $category_heading; ?> class="title-default" style="color: <?php echo $title_category_color; ?>"><?php if(isset($term->name)){ echo esc_attr($term->name);} ?></<?php echo $category_heading; ?>>
                </div>
                <div class="description-category"><?php if(isset($term->description)){ echo esc_attr($term->description);} ?></div>
            </div>
        <?php } ?>
        <div class="cshero-menufood-item-list">
            <?php 
                $counter =0;
                foreach ($posts as $post):
                $counter++;
                if($layout_colunm == 1){
                        echo '<div class="row">';
                    }else{
                        if($counter % $layout_colunm == 1){
                            echo '<div class="row">';
                        }
                    }
            ?>
                <?php 
                  $file_layout= "cms_templates/menufood/layouts/$layout.php";
                  $file_css   = "cms_templates/menufood/css/$layout.css";
                  if( locate_template($file_layout) ) {
                    if( locate_template($file_css) )
                        wp_enqueue_style( "menufood-$layout",get_template_directory_uri()."/".$file_css);
                    require locate_template($file_layout);
                    } else {
                        wp_enqueue_style('menufood', CSCORE_PLUGIN_URL . "framework/shortcodes/menufood/css/$layout.css");
                        require  "layouts/$layout.php";
                    }
                 ?>
            <?php 
                if($layout_colunm == 1){
                    echo '</div>';
                }else{
                    if($counter % $layout_colunm == 0 || $counter==$num_post){
                        echo '</div>';
                    }
                }
                endforeach; ?>
        </div>
    </div>
    <?php $menufood_id++; wp_reset_query(); wp_reset_postdata(); ?>
    <?php
}