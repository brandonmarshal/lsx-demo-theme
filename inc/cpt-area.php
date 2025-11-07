<?php

/**
 * Area custom post type registration.
 *
 * @package Fishing_Theme
 * @since 1.0.0
 */

if (! function_exists('bfa_register_area_cpt')) {
/**
 * Registers the `area` custom post type.
 *
 * @since 1.0.0
 * @return void
 */
function bfa_register_area_cpt()
{
$labels = array(
'name'                  => _x('Areas', 'Post Type General Name', 'fishing-theme'),
'singular_name'         => _x('Area', 'Post Type Singular Name', 'fishing-theme'),
'menu_name'             => _x('Areas', 'Admin Menu text', 'fishing-theme'),
'name_admin_bar'        => _x('Area', 'Add New on Toolbar', 'fishing-theme'),
'add_new'               => __('Add New', 'fishing-theme'),
'add_new_item'          => __('Add New Area', 'fishing-theme'),
'new_item'              => __('New Area', 'fishing-theme'),
'edit_item'             => __('Edit Area', 'fishing-theme'),
'view_item'             => __('View Area', 'fishing-theme'),
'all_items'             => __('All Areas', 'fishing-theme'),
'search_items'          => __('Search Areas', 'fishing-theme'),
'parent_item_colon'     => __('Parent Areas:', 'fishing-theme'),
'not_found'             => __('No areas found.', 'fishing-theme'),
'not_found_in_trash'    => __('No areas found in Trash.', 'fishing-theme'),
'featured_image'        => _x('Area Featured Image', 'Overrides the "Featured Image" phrase', 'fishing-theme'),
'set_featured_image'    => _x('Set featured image', 'Overrides the "Set featured image" phrase', 'fishing-theme'),
'remove_featured_image' => _x('Remove featured image', 'Overrides the "Remove featured image" phrase', 'fishing-theme'),
'use_featured_image'    => _x('Use as featured image', 'Overrides the "Use as featured image" phrase', 'fishing-theme'),
'archives'              => _x('Area archives', 'The post type archive label', 'fishing-theme'),
'insert_into_item'      => _x('Insert into area', 'Overrides the "Insert into post" phrase', 'fishing-theme'),
'uploaded_to_this_item' => _x('Uploaded to this area', 'Overrides the "Uploaded to this post" phrase', 'fishing-theme'),
'filter_items_list'     => _x('Filter area list', 'Screen reader text for the filter links', 'fishing-theme'),
'items_list_navigation' => _x('Area list navigation', 'Screen reader text for the pagination', 'fishing-theme'),
'items_list'            => _x('Area list', 'Screen reader text for the items list', 'fishing-theme'),
);

$args = array(
'labels'             => $labels,
'public'             => true,
'show_ui'            => true,
'show_in_menu'       => true,
'show_in_rest'       => true,
'has_archive'        => true,
'rewrite'            => array('slug' => 'areas'),
'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author'),
'menu_icon'          => 'dashicons-location',
'menu_position'      => 22,
'publicly_queryable' => true,
'capability_type'    => 'post',
'show_in_nav_menus'  => true,
);

register_post_type('area', $args);
}
}
add_action('init', 'bfa_register_area_cpt');
