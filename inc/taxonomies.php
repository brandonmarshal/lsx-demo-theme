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
 * - species: Fish species/categories (hierarchical)
 * - habitats: Fish habitats (hierarchical)
 * - seasons: Fishing seasons (hierarchical)
 * - gear_type: Gear types (hierarchical)
 * - area_type: Area types (hierarchical)
 *
 * @return void
 */
function fishing_theme_register_taxonomies(): void
{
	// Fish Species taxonomy
	register_taxonomy(
		'species',
		array('fish'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Species', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Species', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Species', 'fishing-theme'),
				'all_items'         => __('All Species', 'fishing-theme'),
				'parent_item'       => __('Parent Species', 'fishing-theme'),
				'parent_item_colon' => __('Parent Species:', 'fishing-theme'),
				'edit_item'         => __('Edit Species', 'fishing-theme'),
				'update_item'       => __('Update Species', 'fishing-theme'),
				'add_new_item'      => __('Add New Species', 'fishing-theme'),
				'new_item_name'     => __('New Species Name', 'fishing-theme'),
				'menu_name'         => __('Species', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'species'),
			'show_in_rest'      => true,
		)
	);

	// Fish Habitats taxonomy
	register_taxonomy(
		'habitats',
		array('fish'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Habitats', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Habitat', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Habitats', 'fishing-theme'),
				'all_items'         => __('All Habitats', 'fishing-theme'),
				'parent_item'       => __('Parent Habitat', 'fishing-theme'),
				'parent_item_colon' => __('Parent Habitat:', 'fishing-theme'),
				'edit_item'         => __('Edit Habitat', 'fishing-theme'),
				'update_item'       => __('Update Habitat', 'fishing-theme'),
				'add_new_item'      => __('Add New Habitat', 'fishing-theme'),
				'new_item_name'     => __('New Habitat Name', 'fishing-theme'),
				'menu_name'         => __('Habitats', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'habitats'),
			'show_in_rest'      => true,
		)
	);

	// Fishing Seasons taxonomy
	register_taxonomy(
		'seasons',
		array('fish'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Seasons', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Season', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Seasons', 'fishing-theme'),
				'all_items'         => __('All Seasons', 'fishing-theme'),
				'parent_item'       => __('Parent Season', 'fishing-theme'),
				'parent_item_colon' => __('Parent Season:', 'fishing-theme'),
				'edit_item'         => __('Edit Season', 'fishing-theme'),
				'update_item'       => __('Update Season', 'fishing-theme'),
				'add_new_item'      => __('Add New Season', 'fishing-theme'),
				'new_item_name'     => __('New Season Name', 'fishing-theme'),
				'menu_name'         => __('Seasons', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'seasons'),
			'show_in_rest'      => true,
		)
	);

	// Gear Type taxonomy
	register_taxonomy(
		'gear_type',
		array('gear'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Gear Type', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Gear Type', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Gear Types', 'fishing-theme'),
				'all_items'         => __('All Gear Types', 'fishing-theme'),
				'parent_item'       => __('Parent Gear Type', 'fishing-theme'),
				'parent_item_colon' => __('Parent Gear Type:', 'fishing-theme'),
				'edit_item'         => __('Edit Gear Type', 'fishing-theme'),
				'update_item'       => __('Update Gear Type', 'fishing-theme'),
				'add_new_item'      => __('Add New Gear Type', 'fishing-theme'),
				'new_item_name'     => __('New Gear Type Name', 'fishing-theme'),
				'menu_name'         => __('Gear Type', 'fishing-theme'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'gear-type'),
			'show_in_rest'      => true,
		)
	);

	// Area Type taxonomy
	register_taxonomy(
		'area_type',
		array('area'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Area Type', 'taxonomy general name', 'fishing-theme'),
				'singular_name'     => _x('Area Type', 'taxonomy singular name', 'fishing-theme'),
				'search_items'      => __('Search Area Types', 'fishing-theme'),
				'all_items'         => __('All Area Types', 'fishing-theme'),
				'parent_item'       => __('Parent Area Type', 'fishing-theme'),
				'parent_item_colon' => __('Parent Area Type:', 'fishing-theme'),
				'edit_item'         => __('Edit Area Type', 'fishing-theme'),
				'update_item'       => __('Update Area Type', 'fishing-theme'),
				'add_new_item'      => __('Add New Area Type', 'fishing-theme'),
				'new_item_name'     => __('New Area Type Name', 'fishing-theme'),
				'menu_name'         => __('Area Type', 'fishing-theme'),
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
