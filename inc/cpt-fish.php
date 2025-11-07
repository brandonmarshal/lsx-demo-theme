<?php

/**
 * Fish custom post type registration.
 *
 * @package Fishing_Theme
 * @since 1.0.0
 */

if (! function_exists('bfa_register_fish_cpt')) {
	/**
	 * Registers the `fish` custom post type.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function bfa_register_fish_cpt()
	{
		$labels = array(
			'name'                  => _x('Fish', 'Post Type General Name', 'fishing-theme'),
			'singular_name'         => _x('Fish', 'Post Type Singular Name', 'fishing-theme'),
			'menu_name'             => _x('Fish', 'Admin Menu text', 'fishing-theme'),
			'name_admin_bar'        => _x('Fish', 'Add New on Toolbar', 'fishing-theme'),
			'add_new'               => __('Add New', 'fishing-theme'),
			'add_new_item'          => __('Add New Fish', 'fishing-theme'),
			'new_item'              => __('New Fish', 'fishing-theme'),
			'edit_item'             => __('Edit Fish', 'fishing-theme'),
			'view_item'             => __('View Fish', 'fishing-theme'),
			'all_items'             => __('All Fish', 'fishing-theme'),
			'search_items'          => __('Search Fish', 'fishing-theme'),
			'parent_item_colon'     => __('Parent Fish:', 'fishing-theme'),
			'not_found'             => __('No fish found.', 'fishing-theme'),
			'not_found_in_trash'    => __('No fish found in Trash.', 'fishing-theme'),
			'featured_image'        => _x('Fish Featured Image', 'Overrides the “Featured Image” phrase', 'fishing-theme'),
			'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase', 'fishing-theme'),
			'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase', 'fishing-theme'),
			'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase', 'fishing-theme'),
			'archives'              => _x('Fish archives', 'The post type archive label', 'fishing-theme'),
			'insert_into_item'      => _x('Insert into fish', 'Overrides the “Insert into post” phrase', 'fishing-theme'),
			'uploaded_to_this_item' => _x('Uploaded to this fish', 'Overrides the “Uploaded to this post” phrase', 'fishing-theme'),
			'filter_items_list'     => _x('Filter fish list', 'Screen reader text for the filter links', 'fishing-theme'),
			'items_list_navigation' => _x('Fish list navigation', 'Screen reader text for the pagination', 'fishing-theme'),
			'items_list'            => _x('Fish list', 'Screen reader text for the items list', 'fishing-theme'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'has_archive'        => true,
			'rewrite'            => array('slug' => 'fish'),
			'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author'),
			'menu_icon'          => 'dashicons-palmtree',
			'menu_position'      => 20,
			'publicly_queryable' => true,
			'capability_type'    => 'post',
			'show_in_nav_menus'  => true,
		);

		register_post_type('fish', $args);
	}
}
add_action('init', 'bfa_register_fish_cpt');
