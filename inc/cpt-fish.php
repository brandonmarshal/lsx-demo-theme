<?php

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register the Fish custom post type.
 *
 * @return void
 */
function register_fish_cpt(): void
{
	$labels = [
		'name' => \__('Fish', 'fishing-theme'),
		'singular_name' => \__('Fish', 'fishing-theme'),
		'menu_name' => \__('Fish', 'fishing-theme'),
		'name_admin_bar' => \__('Fish', 'fishing-theme'),
		'add_new' => \__('Add New', 'fishing-theme'),
		'add_new_item' => \__('Add New Fish', 'fishing-theme'),
		'new_item' => \__('New Fish', 'fishing-theme'),
		'edit_item' => \__('Edit Fish', 'fishing-theme'),
		'view_item' => \__('View Fish', 'fishing-theme'),
		'view_items' => \__('View Fish', 'fishing-theme'),
		'all_items' => \__('All Fish', 'fishing-theme'),
		'search_items' => \__('Search Fish', 'fishing-theme'),
		'not_found' => \__('No fish found.', 'fishing-theme'),
		'not_found_in_trash' => \__('No fish found in Trash.', 'fishing-theme'),
		'archives' => \__('Fish Archives', 'fishing-theme'),
		'featured_image' => \__('Featured Image', 'fishing-theme'),
		'set_featured_image' => \__('Set featured image', 'fishing-theme'),
		'remove_featured_image' => \__('Remove featured image', 'fishing-theme'),
		'use_featured_image' => \__('Use as featured image', 'fishing-theme'),
		'insert_into_item' => \__('Insert into fish', 'fishing-theme'),
		'uploaded_to_this_item' => \__('Uploaded to this fish', 'fishing-theme'),
		'items_list' => \__('Fish list', 'fishing-theme'),
		'items_list_navigation' => \__('Fish list navigation', 'fishing-theme'),
		'filter_items_list' => \__('Filter fish list', 'fishing-theme'),
	];
	$args = [
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-palmtree',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => ['slug' => 'fish'],
		'capability_type' => ['fish', 'fish'],
		'map_meta_cap' => true,
		'template' => [
			['core/heading', ['level' => 2, 'placeholder' => \__('Species overview', 'fishing-theme')]],
			['core/group', ['layout' => ['type' => 'constrained']], [
				['core/columns', [], [
					['core/column', [], [['core/image'], ['core/paragraph']]],
					['core/column', [], [['core/heading', ['level' => 3, 'content' => \__('Facts', 'fishing-theme')]], ['core/list']]],
				]],
			]],
		],
		'template_lock' => 'insert',
	];
	\register_post_type('fish', $args);
}
\add_action('init', 'register_fish_cpt', 5);
