<?php

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register taxonomies for Fishing Theme CPTs.
 *
 * Creates taxonomies to establish relationships between Fish, Gear, and Areas CPTs.
 *
 * @since 1.0.0
 */

/**
 * Register taxonomies for CPT relationships.
 *
 * Creates the following taxonomies:
 * - fishing_areas: Links Fish to Areas (hierarchical)
 * - suitable_gear: Links Fish to Gear (non-hierarchical)
 * - fish_species: Categories for Fish
 * - gear_category: Categories for Gear
 * - area_type: Categories for Areas
 *
 * @return void
 */
function fishing_theme_register_taxonomies(): void
{
	// Taxonomy to link Fish to Areas
	register_taxonomy(
		'fishing_areas',
		array('fish'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Fishing Areas', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Fishing Area', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Fishing Areas', 'fishing-theme'),
				'all_items'         => __('All Fishing Areas', 'fishing-theme'),
				'parent_item'       => __('Parent Fishing Area', 'fishing-theme'),
				'parent_item_colon' => __('Parent Fishing Area:', 'fishing-theme'),
				'edit_item'         => __('Edit Fishing Area', 'fishing-theme'),
				'update_item'       => __('Update Fishing Area', 'fishing-theme'),
				'add_new_item'      => __('Add New Fishing Area', 'fishing-theme'),
				'new_item_name'     => __('New Fishing Area Name', 'fishing-theme'),
				'menu_name'         => __('Fishing Areas', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'fishing-area'),
			'show_in_rest'      => true,
		)
	);

	// Taxonomy to link Fish to Gear (non-hierarchical)
	register_taxonomy(
		'suitable_gear',
		array('fish'),
		array(
			'hierarchical'      => false,
			'labels'            => array(
				'name'                       => _x('Suitable Gear', 'taxonomy general name', 'fishing-theme'),
				'singular_name'              => _x('Suitable Gear', 'taxonomy singular name', 'fishing-theme'),
				'search_items'               => __('Search Suitable Gear', 'fishing-theme'),
				'popular_items'              => __('Popular Suitable Gear', 'fishing-theme'),
				'all_items'                  => __('All Suitable Gear', 'fishing-theme'),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => __('Edit Suitable Gear', 'fishing-theme'),
				'update_item'                => __('Update Suitable Gear', 'fishing-theme'),
				'add_new_item'               => __('Add New Suitable Gear', 'fishing-theme'),
				'new_item_name'              => __('New Suitable Gear Name', 'fishing-theme'),
				'separate_items_with_commas' => __('Separate suitable gear with commas', 'fishing-theme'),
				'add_or_remove_items'        => __('Add or remove suitable gear', 'fishing-theme'),
				'choose_from_most_used'      => __('Choose from the most used suitable gear', 'fishing-theme'),
				'menu_name'                  => __('Suitable Gear', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'suitable-gear'),
			'show_in_rest'      => true,
		)
	);

	// Taxonomy for Fish species/categories
	register_taxonomy(
		'fish_species',
		array('fish'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Fish Species', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Fish Species', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Fish Species', 'fishing-theme'),
				'all_items'         => __('All Fish Species', 'fishing-theme'),
				'parent_item'       => __('Parent Fish Species', 'fishing-theme'),
				'parent_item_colon' => __('Parent Fish Species:', 'fishing-theme'),
				'edit_item'         => __('Edit Fish Species', 'fishing-theme'),
				'update_item'       => __('Update Fish Species', 'fishing-theme'),
				'add_new_item'      => __('Add New Fish Species', 'fishing-theme'),
				'new_item_name'     => __('New Fish Species Name', 'fishing-theme'),
				'menu_name'         => __('Fish Species', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'fish-species'),
			'show_in_rest'      => true,
		)
	);

	// Taxonomy for Gear categories
	register_taxonomy(
		'gear_category',
		array('gear'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Gear Categories', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Gear Category', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Gear Categories', 'fishing-theme'),
				'all_items'         => __('All Gear Categories', 'fishing-theme'),
				'parent_item'       => __('Parent Gear Category', 'fishing-theme'),
				'parent_item_colon' => __('Parent Gear Category:', 'fishing-theme'),
				'edit_item'         => __('Edit Gear Category', 'fishing-theme'),
				'update_item'       => __('Update Gear Category', 'fishing-theme'),
				'add_new_item'      => __('Add New Gear Category', 'fishing-theme'),
				'new_item_name'     => __('New Gear Category Name', 'fishing-theme'),
				'menu_name'         => __('Gear Categories', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'gear-category'),
			'show_in_rest'      => true,
		)
	);

	// Taxonomy for Area types
	register_taxonomy(
		'area_type',
		array('area'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Area Types', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Area Type', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Area Types', 'fishing-theme'),
				'all_items'         => __('All Area Types', 'fishing-theme'),
				'parent_item'       => __('Parent Area Type', 'fishing-theme'),
				'parent_item_colon' => __('Parent Area Type:', 'fishing-theme'),
				'edit_item'         => __('Edit Area Type', 'fishing-theme'),
				'update_item'       => __('Update Area Type', 'fishing-theme'),
				'add_new_item'      => __('Add New Area Type', 'fishing-theme'),
				'new_item_name'     => __('New Area Type Name', 'fishing-theme'),
				'menu_name'         => __('Area Types', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'area-type'),
			'show_in_rest'      => true,
		)
	);
}
add_action('init', 'fishing_theme_register_taxonomies', 10);
