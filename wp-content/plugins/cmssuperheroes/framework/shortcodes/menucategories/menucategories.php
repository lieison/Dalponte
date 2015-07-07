<?php
add_shortcode('cs-menucategories', 'cshero_menu_categories_render');
function cshero_menu_categories_render($params, $content = null) {
    extract(shortcode_atts(array(
        'cats' => '',
        'col' => '4',
        'number_items' => '',
        'crop_image' => '',
        'title_size' => '',
        'title_color' => '',
        'width_image' => 300,
        'height_image' => 200,
    ), $params));
    if($cats){
        $cats = explode(',', $cats);
    }
    /** col */
    $_col = '';
    switch ($col) {
        case '1':
            $_col = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
            break;
        case '2':
            $_col = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
            break;
        case '3':
            $_col = 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
            break;
        case '4':
            $_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
            break;
    }

    wp_enqueue_style('menu.categories', CSCORE_PLUGIN_URL.'framework/shortcodes/menucategories/css/menu.categories.css');

    ob_start();
    $cats_count = count($cats);
    $rows = 0;
    ?>
    <?php foreach ($cats as $cat): ?>
        <?php
            $rows++;
            $term = get_term( $cat, 'restaurantmenu_category' );
            $cat_data = get_option("category_".$cat);
            $images_id = (int)$cat_data['img'];
            $image_resize = '';
            if($images_id){
                $attachment = wp_get_attachment_image_src($images_id,'full',false);
                if($crop_image){
                    $image_resize = mr_image_resize( $attachment[0], $width_image, $height_image, true, 'c', false );
                } else {
                    $image_resize = $attachment[0];
                }
            }
        ?>
        <?php
        if($rows % $col == 1){
            echo '<div class="row">';
        }
        ?>
        <div class="<?php echo $_col; ?> cs-menu-category">
            <div class="cs-menu-category-wrap">
                <div class="cs-menu-category-image">
                    <img alt="" src="<?php echo $image_resize; ?>">
                </div>
                <div class="cs-menu-category-meta">
                    <div class="cs-menu-category-title">
                        <<?php echo $title_size; ?> class="cs-menu-category-heading">
                            <a style="color: <?php echo $title_color; ?>" href="<?php echo get_term_link($term->term_id, 'restaurantmenu_category'); ?>" ><?php echo $term->name; ?><?php if($number_items){ echo ' ('.$term->count.')';} ?></a></h3>
                        </<?php echo $title_size; ?>>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if($rows % $col == 0 || $rows == $cats_count){
            echo '</div>';
        }
        endforeach;
        ?>
    <?php
    return ob_get_clean();
}