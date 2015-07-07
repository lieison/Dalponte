<?php

function cs_add_post_type_my_client() {
    $labels = array(
        'name' => _x('Clients', 'Post type general name', CSCORE_NAME),
        'singular_name' => _x('Pro Clients', 'Post type singular name', CSCORE_NAME),
        'add_new' => _x('Add new client', 'Client Item', CSCORE_NAME),
        'add_new_item' => __('Add new client', CSCORE_NAME),
        'edit_item' => __('Edit client', CSCORE_NAME),
        'new_item' => __('New client', CSCORE_NAME),
        'all_items' => __('All clients', CSCORE_NAME),
        'view_item' => __('View', CSCORE_NAME),
        'search_items' => __('Search', CSCORE_NAME),
        'not_found' => __('No clients found.', CSCORE_NAME),
        'not_found_in_trash' => __('No clients found.', CSCORE_NAME),
        'parent_item_colon' => '',
        'menu_name' => 'Clients'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-networking',
        'supports' => array('title', 'thumbnail')
    );
    register_post_type('myclients', $args);
    register_taxonomy(
        'clientscategory', array('myclients'), array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Client Categories',
            'add_new_item' =>
            'Add New Category',
            'parent_item' => 'Parent Category'),
        'query_var' => true,
        'rewrite' => array('slug' => 'clientscategory')
        )
    );
}
add_action('init', 'cs_add_post_type_my_client');