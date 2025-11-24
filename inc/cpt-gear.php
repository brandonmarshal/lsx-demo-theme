<?php

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register the Gear custom post type.
 *
 * @return void
 */
function register_gear_cpt(): void
{
	error_log('Registering Gear CPT');
	$labels = [
		'name' => \__('Gear', 'fishing-theme'),
		'singular_name' => \__('Gear', 'fishing-theme'),
		'menu_name' => \__('Gear', 'fishing-theme'),
		'name_admin_bar' => \__('Gear', 'fishing-theme'),
		'add_new' => \__('Add New', 'fishing-theme'),
		'add_new_item' => \__('Add New Gear', 'fishing-theme'),
		'new_item' => \__('New Gear', 'fishing-theme'),
		'edit_item' => \__('Edit Gear', 'fishing-theme'),
		'view_item' => \__('View Gear', 'fishing-theme'),
		'view_items' => \__('View Gear', 'fishing-theme'),
		'all_items' => \__('All Gear', 'fishing-theme'),
		'search_items' => \__('Search Gear', 'fishing-theme'),
		'not_found' => \__('No gear found.', 'fishing-theme'),
		'not_found_in_trash' => \__('No gear found in Trash.', 'fishing-theme'),
		'archives' => \__('Gear Archives', 'fishing-theme'),
		'featured_image' => \__('Featured Image', 'fishing-theme'),
		'set_featured_image' => \__('Set featured image', 'fishing-theme'),
		'remove_featured_image' => \__('Remove featured image', 'fishing-theme'),
		'use_featured_image' => \__('Use as featured image', 'fishing-theme'),
		'insert_into_item' => \__('Insert into gear', 'fishing-theme'),
		'uploaded_to_this_item' => \__('Uploaded to this gear', 'fishing-theme'),
		'items_list' => \__('Gear list', 'fishing-theme'),
		'items_list_navigation' => \__('Gear list navigation', 'fishing-theme'),
		'filter_items_list' => \__('Filter gear list', 'fishing-theme'),
	];
	$args = [
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-hammer',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => ['slug' => 'gear'],
		'capability_type' => 'post',
		'map_meta_cap' => true,
	];
	\register_post_type('gear', $args);
}
\add_action('init', 'register_gear_cpt', 10);
