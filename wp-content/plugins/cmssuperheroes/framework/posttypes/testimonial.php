<?php

#-----------------------------------------------------------------#
# Create admin testimonial section
#-----------------------------------------------------------------#

function cs_add_post_type_testimonial() {
    $testimonial_labels = array(
        'name' => __('Testimonials', 'taxonomy general name', CSCORE_NAME),
        'singular_name' => __('Testimonial Item', CSCORE_NAME),
        'search_items' => __('Search Testimonial Items', CSCORE_NAME),
        'all_items' => __('Testimonial', CSCORE_NAME),
        'parent_item' => __('Parent Testimonial Item', CSCORE_NAME),
        'edit_item' => __('Edit Testimonial Item', CSCORE_NAME),
        'update_item' => __('Update Testimonial Item', CSCORE_NAME),
        'add_new_item' => __('Add New Testimonial Item', CSCORE_NAME),
        'not_found' => __('No testimonial found', CSCORE_NAME)
    );

    $options = get_option('cshero');
    $custom_slug = null;

    if (!empty($options['testimonial_rewrite_slug']))
        $custom_slug = $options['testimonial_rewrite_slug'];

    $args = array(
        'labels' => $testimonial_labels,
        'rewrite' => array('slug' => $custom_slug, 'with_front' => false),
        'singular_label' => __('Project', CSCORE_NAME),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'hierarchical' => false,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => array('title', 'editor', 'thumbnail', 'comments')
    );

    register_post_type('testimonial', $args);

    register_taxonomy('testimonial_category', 'testimonial', array('hierarchical' => true, 'label' => __('Testimonial Categories', CSCORE_NAME), 'query_var' => true, 'rewrite' => true));

    $labels = array(
        'name' => _x('Testimonial Tags', 'taxonomy general name', CSCORE_NAME),
        'singular_name' => _x('Tag', 'taxonomy singular name', CSCORE_NAME),
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
        'menu_name' => __('Testimonial Tags', CSCORE_NAME),
    );

    register_taxonomy('testimonial_tag', 'testimonial', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'tag'),
    ));
}

add_action('init', 'cs_add_post_type_testimonial');