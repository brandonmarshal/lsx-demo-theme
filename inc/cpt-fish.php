<?php

/**
 * Fish custom post type registration.
 *
 * @package lsx-demo-theme
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
			'name'                  => _x('Fish', 'Post Type General Name', 'lsx-demo-theme'),
			'singular_name'         => _x('Fish', 'Post Type Singular Name', 'lsx-demo-theme'),
			'menu_name'             => _x('Fish', 'Admin Menu text', 'lsx-demo-theme'),
			'name_admin_bar'        => _x('Fish', 'Add New on Toolbar', 'lsx-demo-theme'),
			'add_new'               => __('Add New', 'lsx-demo-theme'),
			'add_new_item'          => __('Add New Fish', 'lsx-demo-theme'),
			'new_item'              => __('New Fish', 'lsx-demo-theme'),
			'edit_item'             => __('Edit Fish', 'lsx-demo-theme'),
			'view_item'             => __('View Fish', 'lsx-demo-theme'),
			'all_items'             => __('All Fish', 'lsx-demo-theme'),
			'search_items'          => __('Search Fish', 'lsx-demo-theme'),
			'parent_item_colon'     => __('Parent Fish:', 'lsx-demo-theme'),
			'not_found'             => __('No fish found.', 'lsx-demo-theme'),
			'not_found_in_trash'    => __('No fish found in Trash.', 'lsx-demo-theme'),
			'featured_image'        => _x('Fish Featured Image', 'Overrides the “Featured Image” phrase', 'lsx-demo-theme'),
			'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase', 'lsx-demo-theme'),
			'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase', 'lsx-demo-theme'),
			'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase', 'lsx-demo-theme'),
			'archives'              => _x('Fish archives', 'The post type archive label', 'lsx-demo-theme'),
			'insert_into_item'      => _x('Insert into fish', 'Overrides the “Insert into post” phrase', 'lsx-demo-theme'),
			'uploaded_to_this_item' => _x('Uploaded to this fish', 'Overrides the “Uploaded to this post” phrase', 'lsx-demo-theme'),
			'filter_items_list'     => _x('Filter fish list', 'Screen reader text for the filter links', 'lsx-demo-theme'),
			'items_list_navigation' => _x('Fish list navigation', 'Screen reader text for the pagination', 'lsx-demo-theme'),
			'items_list'            => _x('Fish list', 'Screen reader text for the items list', 'lsx-demo-theme'),
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
