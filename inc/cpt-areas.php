<?php

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register the Areas custom post type.
 *
 * @return void
 */
function register_areas_cpt(): void
{
	error_log('Registering Areas CPT');
	$labels = [
		'name' => \__('Areas', 'fishing-theme'),
		'singular_name' => \__('Area', 'fishing-theme'),
		'menu_name' => \__('Areas', 'fishing-theme'),
		'name_admin_bar' => \__('Area', 'fishing-theme'),
		'add_new' => \__('Add New', 'fishing-theme'),
		'add_new_item' => \__('Add New Area', 'fishing-theme'),
		'new_item' => \__('New Area', 'fishing-theme'),
		'edit_item' => \__('Edit Area', 'fishing-theme'),
		'view_item' => \__('View Area', 'fishing-theme'),
		'view_items' => \__('View Areas', 'fishing-theme'),
		'all_items' => \__('All Areas', 'fishing-theme'),
		'search_items' => \__('Search Areas', 'fishing-theme'),
		'not_found' => \__('No areas found.', 'fishing-theme'),
		'not_found_in_trash' => \__('No areas found in Trash.', 'fishing-theme'),
		'archives' => \__('Area Archives', 'fishing-theme'),
		'featured_image' => \__('Featured Image', 'fishing-theme'),
		'set_featured_image' => \__('Set featured image', 'fishing-theme'),
		'remove_featured_image' => \__('Remove featured image', 'fishing-theme'),
		'use_featured_image' => \__('Use as featured image', 'fishing-theme'),
		'insert_into_item' => \__('Insert into area', 'fishing-theme'),
		'uploaded_to_this_item' => \__('Uploaded to this area', 'fishing-theme'),
		'items_list' => \__('Areas list', 'fishing-theme'),
		'items_list_navigation' => \__('Areas list navigation', 'fishing-theme'),
		'filter_items_list' => \__('Filter areas list', 'fishing-theme'),
	];
	$args = [
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-location',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => ['slug' => 'areas'],
		'capability_type' => 'post',
		'map_meta_cap' => true,
	];
	\register_post_type('area', $args);
}
\add_action('after_setup_theme', 'register_areas_cpt', 20);
