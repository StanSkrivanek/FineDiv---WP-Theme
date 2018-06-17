<?php

//  ============================================================================================
//      REGISTER CPT - Workshops
//  ============================================================================================
add_action('init', 'workshops_custom_post_type');
add_action('init', 'workshops_custom_taxonomies');

function workshops_custom_post_type()
{

    $labels = array(
        'name' => _x('Workshops', 'Post Type General Name', 'FineDiv'),
        'singular_name' => _x('Workshop', 'Post Type Singular Name', 'FineDiv'),
        'name_admin_bar' => __('Workshops', 'FineDiv'),
        'menu_name' => __('Workshops', 'FineDiv'),
        'archives' => __('Workshops Archives', 'FineDiv'),
        'attributes' => __('Workshop Attributes', 'FineDiv'),
        'parent_item_colon' => __('Parent Item:', 'FineDiv'),
        'all_items' => __('All workshops', 'FineDiv'),
        'add_new_item' => __('Add New', 'FineDiv'),
        'add_new' => __('Add New', 'FineDiv'),
        'new_item' => __('New Item', 'FineDiv'),
        'edit_item' => __('Edit Item', 'FineDiv'),
        'update_item' => __('Update Item', 'workshop'),
        'view_item' => __('View Item', 'FineDiv'),
        'view_items' => __('View Items', 'FineDiv'),
        'search_items' => __('Search Item', 'FineDiv'),
        'not_found' => __('Item Not found', 'FineDiv'),
        'not_found_in_trash' => __('Item Not found in Trash', 'FineDiv'),
        'featured_image' => __('Featured Image', 'FineDiv'),
        'set_featured_image' => __('Set featured image', 'FineDiv'),
        'remove_featured_image' => __('Remove featured image', 'FineDiv'),
        'use_featured_image' => __('Use as featured image', 'FineDiv'),
        'insert_into_item' => __('Insert into Workshops', 'FineDiv'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'FineDiv'),
        'items_list' => __('Items list', 'FineDiv'),
        'items_list_navigation' => __('Items list navigation', 'FineDiv'),
        'filter_items_list' => __('Filter Items list', 'FineDiv'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array('title', 'post-formats'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'can_export' => true,
        'menu_position' => 8,
        'rewrite' => array('slug' => 'workshops'),
        'capability_type' => 'post',
        'label' => __('Workshops', 'FineDiv'),
        'description' => __('Post Type Description', 'FineDiv'),
        'show_in_admin_bar' => true,
        'exclude_from_search' => false,
    );
    register_post_type('workshops', $args);

}


//  REGISTER Taxonomies - Workshops
//  ===================================================
function workshops_custom_taxonomies()
{
    // add new taxonomy hierarchical (category)
    $labels = array(
        'name' => 'Categories',
        'singular_name' => 'Category',
        'search_items' => 'Search Item Category',
        'all_items' => 'All Items',
        'parent_item' => 'Parent Item',
        'parent_item_colon' => 'Parent Item',
        'edit_item' => 'Edit Item',
        'update_item' => 'Update Item',
        'add_new_item' => 'Add New',
        'new_item_name' => 'New Item Name',
        'menu_name' => 'Categories',
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'workshops')
    );

    register_taxonomy('workshops', array('workshops'), $args);

    // add new taxonomy NOT hierarchical (tag)

    register_taxonomy('specs', 'workshops', array(
        'label' => 'Specs',
        'rewrite' => array('slug' => 'specs'),
        'hierarchical' => false,
        'show_admin_column' => true,
    ));

}
