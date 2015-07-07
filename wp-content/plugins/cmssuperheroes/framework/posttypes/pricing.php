<?php
#-----------------------------------------------------------------#
# Create admin pricing section
#-----------------------------------------------------------------#

function cs_add_post_type_pricing() {
    $pricing_labels = array(
        'name' => __('Pricing & Service', 'taxonomy general name', CSCORE_NAME),
        'singular_name' => __('Pricing Item', CSCORE_NAME),
        'search_items' => __('Search Pricing Items', CSCORE_NAME),
        'all_items' => __('Pricing', CSCORE_NAME),
        'parent_item' => __('Parent Pricing Item', CSCORE_NAME),
        'edit_item' => __('Edit Pricing Item', CSCORE_NAME),
        'update_item' => __('Update Pricing Item', CSCORE_NAME),
        'add_new_item' => __('Add New Pricing Item', CSCORE_NAME),
        'not_found' => __('No pricing found', CSCORE_NAME)
    );

    $args = array(
        'labels' => $pricing_labels,
        'singular_label' => __('Project', CSCORE_NAME),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'hierarchical' => false,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('pricing', $args);

    register_taxonomy("pricing_category", array("pricing"), array("hierarchical" => true, "label" => __('Pricing Categories', CSCORE_NAME), 'query_var' => true, 'rewrite' => true));
}

add_action('init', 'cs_add_post_type_pricing');

function save_cs_pricing() {
    global $post;

    if (isset($post)) {
        update_post_meta($post->ID, "price", isset($_POST["price"]) ? $_POST["price"] : '');
        update_post_meta($post->ID, "value", isset($_POST["value"]) ? $_POST["value"] : '');
        update_post_meta($post->ID, "option_1", isset($_POST["option_1"]) ? $_POST["option_1"] : '');
        update_post_meta($post->ID, "option_2", isset($_POST["option_2"]) ? $_POST["option_2"] : '');
        update_post_meta($post->ID, "option_3", isset($_POST["option_3"]) ? $_POST["option_3"] : '');
        update_post_meta($post->ID, "option_4", isset($_POST["option_4"]) ? $_POST["option_4"] : '');
        update_post_meta($post->ID, "option_5", isset($_POST["option_5"]) ? $_POST["option_5"] : '');
        update_post_meta($post->ID, "option_6", isset($_POST["option_6"]) ? $_POST["option_6"] : '');
        update_post_meta($post->ID, "option_7", isset($_POST["option_7"]) ? $_POST["option_7"] : '');
        update_post_meta($post->ID, "option_8", isset($_POST["option_8"]) ? $_POST["option_8"] : '');
        update_post_meta($post->ID, "option_9", isset($_POST["option_9"]) ? $_POST["option_9"] : '');
        update_post_meta($post->ID, "option_10", isset($_POST["option_10"]) ? $_POST["option_10"] : '');
        update_post_meta($post->ID, "button_url", isset($_POST["button_url"]) ? $_POST["button_url"] : '');
        update_post_meta($post->ID, "button_text", isset($_POST["button_text"]) ? $_POST["button_text"] : '');
        update_post_meta($post->ID, "is_feature", isset($_POST["is_feature"]) ? $_POST["is_feature"] : '');
        update_post_meta($post->ID, "best_value", isset($_POST["best_value"]) ? $_POST["best_value"] : '');
    }
}

add_action('save_post', 'save_cs_pricing');

function admin_cs_pricing_init() {
    add_meta_box("cs_pricing_option_meta", "Pricing Option", "cs_pricing_option_meta", "pricing", "side", "low");
}

function cs_pricing_option_meta() {
    global $post;
    $custom = get_post_custom($post->ID);
    $price = $value = $option_1 = $option_2 = $option_3 = $option_4 = $option_5 = $option_6 = $option_7 = $option_8 = $option_9 = $option_10 = $button_url = $button_text= $is_feature = $best_value = '';
    if(!empty($custom)){
	    $price = $custom["price"][0];
	    $value = $custom["value"][0];
	    $option_1 = $custom["option_1"][0];
	    $option_2 = $custom["option_2"][0];
	    $option_3 = $custom["option_3"][0];
	    $option_4 = $custom["option_4"][0];
	    $option_5 = $custom["option_5"][0];
	    $option_6 = $custom["option_6"][0];
	    $option_7 = $custom["option_7"][0];
	    $option_8 = $custom["option_8"][0];
	    $option_9 = $custom["option_9"][0];
	    $option_10 = $custom["option_10"][0];
	    $button_url = $custom["button_url"][0];
	    $button_text = $custom["button_text"][0];
	    $is_feature = $custom["is_feature"][0];
	    $best_value = $custom["best_value"][0];
    }
    ?>
    <div>
        <div><label for="price">Price</label></div>
        <input name="price" value="<?php echo $price; ?>" />
    </div>
    <div>
        <div><label for="value">Value</label></div>
        <input name="value" value="<?php echo $value; ?>" />
    </div>
    <div>
        <div><label for="option_1">Option 1</label></div>
        <input name="option_1" value="<?php echo $option_1; ?>" />
    </div>
    <div>
        <div><label for="option_2">Option 2</label></div>
        <input name="option_2" value="<?php echo $option_2; ?>" />
    </div>
    <div>
        <div><label for="option_3">Option 3</label></div>
        <input name="option_3" value="<?php echo $option_3; ?>" />
    </div>
    <div>
        <div><label for="option_4">Option 4</label></div>
        <input name="option_4" value="<?php echo $option_4; ?>" />
    </div>
    <div>
        <div><label for="option_5">Option 5</label></div>
        <input name="option_5" value="<?php echo $option_5; ?>" />
    </div>
    <div>
        <div><label for="option_6">Option 6</label></div>
        <input name="option_6" value="<?php echo $option_6; ?>" />
    </div>
    <div>
        <div><label for="option_7">Option 7</label></div>
        <input name="option_7" value="<?php echo $option_7; ?>" />
    </div>
    <div>
        <div><label for="option_8">Option 8</label></div>
        <input name="option_8" value="<?php echo $option_8; ?>" />
    </div>
    <div>
        <div><label for="option_9">Option 9</label></div>
        <input name="option_9" value="<?php echo $option_9; ?>" />
    </div>
    <div>
        <div><label for="option_10">Option 10</label></div>
        <input name="option_10" value="<?php echo $option_10; ?>" />
    </div>
    <div>
        <div><label for="button_url">Button Url</label></div>
        <input name="button_url" value="<?php echo $button_url; ?>" />
    </div>
    <div>
        <div><label for="button_text">Button Text</label></div>
        <input name="button_text" value="<?php echo $button_text; ?>" />
    </div>
    <div>
        <div><label for="is_feature">Is feature</label></div>
        <input name="is_feature" value="1" type="checkbox" <?php echo $is_feature ? "checked='checked'" : ""; ?> />
    </div>
    <div>
        <div><label for="best_value">Best value</label></div>
        <input name="best_value" value="<?php echo $best_value; ?>" />
    </div>
    <?php
}

add_action("admin_init", "admin_cs_pricing_init");

function cs_pricing_edit_columns($columns) {
    $columns = array(
        "cb" => "<input type='checkbox' />",
        "title" => "Pricing Title",
        "description" => "Description",
        "pricing_categories" => "Categories"
    );

    return $columns;
}

add_filter("manage_edit-pricing_columns", "cs_pricing_edit_columns");

function cs_pricing_custom_columns($column) {
    global $post;

    switch ($column) {
        case "description":
            the_excerpt();
            break;
        case "pricing_categories":
            echo get_the_term_list($post->ID, 'pricing_category', '', ', ', '');
            break;
    }
}

add_action("manage_posts_custom_column", "cs_pricing_custom_columns");