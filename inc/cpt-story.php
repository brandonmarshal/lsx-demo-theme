<?php

/**
 * Story custom post type registration.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */

if (! function_exists('bfa_register_story_cpt')) {
	/**
	 * Registers the `story` custom post type.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function bfa_register_story_cpt()
	{
		$labels = array(
			'name'                  => _x('Stories', 'Post Type General Name', 'lsx-demo-theme'),
			'singular_name'         => _x('Story', 'Post Type Singular Name', 'lsx-demo-theme'),
			'menu_name'             => _x('Stories', 'Admin Menu text', 'lsx-demo-theme'),
			'name_admin_bar'        => _x('Story', 'Add New on Toolbar', 'lsx-demo-theme'),
			'add_new'               => __('Add New', 'lsx-demo-theme'),
			'add_new_item'          => __('Add New Story', 'lsx-demo-theme'),
			'new_item'              => __('New Story', 'lsx-demo-theme'),
			'edit_item'             => __('Edit Story', 'lsx-demo-theme'),
			'view_item'             => __('View Story', 'lsx-demo-theme'),
			'all_items'             => __('All Stories', 'lsx-demo-theme'),
			'search_items'          => __('Search Stories', 'lsx-demo-theme'),
			'parent_item_colon'     => __('Parent Stories:', 'lsx-demo-theme'),
			'not_found'             => __('No stories found.', 'lsx-demo-theme'),
			'not_found_in_trash'    => __('No stories found in Trash.', 'lsx-demo-theme'),
			'featured_image'        => _x('Story Featured Image', 'Overrides the “Featured Image” phrase', 'lsx-demo-theme'),
			'set_featured_image'    => _x('Set featured image', 'Overrides the “Set featured image” phrase', 'lsx-demo-theme'),
			'remove_featured_image' => _x('Remove featured image', 'Overrides the “Remove featured image” phrase', 'lsx-demo-theme'),
			'use_featured_image'    => _x('Use as featured image', 'Overrides the “Use as featured image” phrase', 'lsx-demo-theme'),
			'archives'              => _x('Story archives', 'The post type archive label', 'lsx-demo-theme'),
			'insert_into_item'      => _x('Insert into story', 'Overrides the “Insert into post” phrase', 'lsx-demo-theme'),
			'uploaded_to_this_item' => _x('Uploaded to this story', 'Overrides the “Uploaded to this post” phrase', 'lsx-demo-theme'),
			'filter_items_list'     => _x('Filter story list', 'Screen reader text for the filter links', 'lsx-demo-theme'),
			'items_list_navigation' => _x('Story list navigation', 'Screen reader text for the pagination', 'lsx-demo-theme'),
			'items_list'            => _x('Story list', 'Screen reader text for the items list', 'lsx-demo-theme'),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'has_archive'        => true,
			'rewrite'            => array('slug' => 'stories'),
			'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author'),
			'menu_icon'          => 'dashicons-book',
			'menu_position'      => 22,
			'publicly_queryable' => true,
			'capability_type'    => 'post',
			'show_in_nav_menus'  => true,
		);

		register_post_type('story', $args);
	}
}
add_action('init', 'bfa_register_story_cpt');
