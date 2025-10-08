<?php

/**
 * Gear custom post type registration.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */

if (! function_exists('bfa_register_gear_cpt')) {
	/**
	 * Registers the `gear` custom post type.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function bfa_register_gear_cpt()
	{
		$labels = array(
			'name'                  => _x('Gear', 'Post Type General Name', 'lsx-demo-theme'),
			'singular_name'         => _x('Gear Item', 'Post Type Singular Name', 'lsx-demo-theme'),
			'menu_name'             => _x('Gear', 'Admin Menu text', 'lsx-demo-theme'),
			'name_admin_bar'        => _x('Gear Item', 'Add New on Toolbar', 'lsx-demo-theme'),
			'add_new'               => __('Add New', 'lsx-demo-theme'),
			'add_new_item'          => __('Add New Gear Item', 'lsx-demo-theme'),
			'new_item'              => __('New Gear Item', 'lsx-demo-theme'),
			'edit_item'             => __('Edit Gear Item', 'lsx-demo-theme'),
			'view_item'             => __('View Gear Item', 'lsx-demo-theme'),
			'all_items'             => __('All Gear', 'lsx-demo-theme'),
			'search_items'          => __('Search Gear', 'lsx-demo-theme'),
			'parent_item_colon'     => __('Parent Gear:', 'lsx-demo-theme'),
			'not_found'             => __('No gear found.', 'lsx-demo-theme'),
			'not_found_in_trash'    => __('No gear found in Trash.', 'lsx-demo-theme'),
			'featured_image'        => _x('Gear Featured Image', 'Overrides the “Featured Image” phrase', 'lsx-demo-theme'),
			'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase', 'lsx-demo-theme'),
			'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase', 'lsx-demo-theme'),
			'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase', 'lsx-demo-theme'),
			'archives'              => _x('Gear archives', 'The post type archive label', 'lsx-demo-theme'),
			'insert_into_item'      => _x('Insert into gear item', 'Overrides the “Insert into post” phrase', 'lsx-demo-theme'),
			'uploaded_to_this_item' => _x('Uploaded to this gear item', 'Overrides the “Uploaded to this post” phrase', 'lsx-demo-theme'),
			'filter_items_list'     => _x('Filter gear list', 'Screen reader text for the filter links', 'lsx-demo-theme'),
			'items_list_navigation' => _x('Gear list navigation', 'Screen reader text for the pagination', 'lsx-demo-theme'),
			'items_list'            => _x('Gear list', 'Screen reader text for the items list', 'lsx-demo-theme'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'has_archive'        => true,
			'rewrite'            => array('slug' => 'gear'),
			'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author'),
			'menu_icon'          => 'dashicons-hammer',
			'menu_position'      => 21,
			'publicly_queryable' => true,
			'capability_type'    => 'post',
			'show_in_nav_menus'  => true,
		);

		register_post_type('gear', $args);
	}
}
add_action('init', 'bfa_register_gear_cpt');
