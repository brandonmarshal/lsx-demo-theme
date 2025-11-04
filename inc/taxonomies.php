<?php

/**
 * Taxonomy registrations for Brandon's Fishing Adventures.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */

if (! function_exists('bfa_register_taxonomies')) {
	/**
	 * Registers fish, gear, and area taxonomies.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	function bfa_register_taxonomies()
	{
		// Species (hierarchical) for fish.
		register_taxonomy(
			'species',
			array('fish'),
			array(
				'labels'       => array(
					'name'          => _x('Species', 'taxonomy general name', 'lsx-demo-theme'),
					'singular_name' => _x('Species', 'taxonomy singular name', 'lsx-demo-theme'),
				),
				'hierarchical' => true,
				'show_ui'      => true,
				'show_in_rest' => true,
				'show_admin_column' => true,
				'rewrite'      => array('slug' => 'species'),
			)
		);

		// Habitat (hierarchical) for fish.
		register_taxonomy(
			'habitat',
			array('fish'),
			array(
				'labels'       => array(
					'name'          => _x('Habitats', 'taxonomy general name', 'lsx-demo-theme'),
					'singular_name' => _x('Habitat', 'taxonomy singular name', 'lsx-demo-theme'),
				),
				'hierarchical' => true,
				'show_ui'      => true,
				'show_in_rest' => true,
				'show_admin_column' => true,
				'rewrite'      => array('slug' => 'habitat'),
			)
		);

		// Season (non-hierarchical) for fish.
		register_taxonomy(
			'season',
			array('fish'),
			array(
				'labels'       => array(
					'name'          => _x('Seasons', 'taxonomy general name', 'lsx-demo-theme'),
					'singular_name' => _x('Season', 'taxonomy singular name', 'lsx-demo-theme'),
				),
				'hierarchical' => false,
				'show_ui'      => true,
				'show_in_rest' => true,
				'show_admin_column' => true,
				'rewrite'      => array('slug' => 'season'),
			)
		);

		// Gear Type (hierarchical) for gear.
		register_taxonomy(
			'gear_type',
			array('gear'),
			array(
				'labels'       => array(
					'name'          => _x('Gear Types', 'taxonomy general name', 'lsx-demo-theme'),
					'singular_name' => _x('Gear Type', 'taxonomy singular name', 'lsx-demo-theme'),
				),
				'hierarchical' => true,
				'show_ui'      => true,
				'show_in_rest' => true,
				'show_admin_column' => true,
				'rewrite'      => array('slug' => 'gear-type'),
			)
		);

		// Area Category (hierarchical) for area.
		register_taxonomy(
			'area_category',
			array('area'),
			array(
				'labels'       => array(
					'name'          => _x('Area Categories', 'taxonomy general name', 'lsx-demo-theme'),
					'singular_name' => _x('Area Category', 'taxonomy singular name', 'lsx-demo-theme'),
				),
				'hierarchical' => true,
				'show_ui'      => true,
				'show_in_rest' => true,
				'show_admin_column' => true,
				'rewrite'      => array('slug' => 'area-category'),
			)
		);
	}
}
add_action('init', 'bfa_register_taxonomies', 11);
