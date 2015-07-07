<?php
function cs_add_post_type_portfolio() {
    $portfolio_labels = array(
        'name' => __('Portfolio', 'taxonomy general name', CSCORE_NAME),
        'singular_name' => __('Portfolio Item', CSCORE_NAME),
        'search_items' => __('Search Portfolio Items', CSCORE_NAME),
        'all_items' => __('Portfolio', CSCORE_NAME),
        'parent_item' => __('Parent Portfolio Item', CSCORE_NAME),
        'edit_item' => __('Edit Portfolio Item', CSCORE_NAME),
        'update_item' => __('Update Portfolio Item', CSCORE_NAME),
        'add_new_item' => __('Add New Portfolio Item', CSCORE_NAME),
        'not_found' => __('No portfolio found', CSCORE_NAME)
    );

    $args = array(
        'labels' => $portfolio_labels,
        'rewrite' => array('slug' => 'portfolio'),
        'singular_label' => __('Project', CSCORE_NAME),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'hierarchical' => true,
        'menu_position' => 9,
    	'capability_type'=>'post',
        'menu_icon' => 'dashicons-welcome-view-site',
        'supports' => array('title', 'editor', 'thumbnail', 'comments')
    );

    register_post_type('portfolio', $args);
    register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => __('Portfolio Categories', CSCORE_NAME), 'query_var' => true,'show_ui' => true, 'rewrite' => true));

    $labels = array(
        'name' => __('Portfolio Tags', 'taxonomy general name', CSCORE_NAME),
        'singular_name' => __('Tag', 'taxonomy singular name', CSCORE_NAME),
        'search_items' => __('Search Tags', CSCORE_NAME),
        'popular_items' => __('Popular Tags', CSCORE_NAME),
        'all_items' => __('All Tags', CSCORE_NAME),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Tag', CSCORE_NAME),
        'update_item' => __('Update Tag', CSCORE_NAME),
        'add_new_item' => __('Add New Tag', CSCORE_NAME),
        'new_item_name' => __('New Tag Name', CSCORE_NAME),
        'separate_items_with_commas' => __('Separate tags with commas', CSCORE_NAME),
        'add_or_remove_items' => __('Add or remove tags', CSCORE_NAME),
        'choose_from_most_used' => __('Choose from the most used tags', CSCORE_NAME),
        'menu_name' => __('Portfolio Tags', CSCORE_NAME),
    );

    register_taxonomy('portfolio_tag', 'portfolio', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'tag'),
    ));

}

add_action('init', 'cs_add_post_type_portfolio');


/* custom filter */
add_action('restrict_manage_posts', 'restrict_listings_by_portfolio');

function restrict_listings_by_portfolio()
{
    global $typenow;
    global $wp_query;
    if ($typenow == 'portfolio') {
        $taxonomy = 'portfolio_category';
        $term = isset($wp_query->query['portfolio_category']) ? $wp_query->query['portfolio_category'] : '';
        $business_taxonomy = get_taxonomy($taxonomy);
        wp_dropdown_categories(array(
        'show_option_all' => __("Show All", CSCORE_NAME),
        'taxonomy' => $taxonomy,
        'name' => 'portfolio_category',
        'orderby' => 'name',
        'selected' => $term,
        'hierarchical' => true,
        'depth' => 3,
        'show_count' => true, // Show # listings in parens
        'hide_empty' => true // Don't show businesses w/o listings
        ));
    }
}

add_filter('parse_query', 'convert_portfolio_id_to_taxonomy_term_in_query');

function convert_portfolio_id_to_taxonomy_term_in_query($query)
{
    global $pagenow;
    $qv = &$query->query_vars;
    if ($pagenow == 'edit.php' && isset($qv['portfolio_category']) && is_numeric($qv['portfolio_category'])) {
        $term = get_term_by('id', $qv['portfolio_category'], 'portfolio_category');
        $qv['portfolio_category'] = ($term ? $term->slug : '');
    }
}