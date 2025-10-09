<?php

/**
 * Taxonomy registrations for Brandon's Fishing Adventures.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */

if (! function_exists('bfa_register_taxonomies')) {
	/**
	 * Registers fish, gear, and story taxonomies.
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

		// Story Category (hierarchical) for story.
		register_taxonomy(
			'story_category',
			array('story'),
			array(
				'labels'       => array(
					'name'          => _x('Story Categories', 'taxonomy general name', 'lsx-demo-theme'),
					'singular_name' => _x('Story Category', 'taxonomy singular name', 'lsx-demo-theme'),
				),
				'hierarchical' => true,
				'show_ui'      => true,
				'show_in_rest' => true,
				'show_admin_column' => true,
				'rewrite'      => array('slug' => 'story-category'),
			)
		);
	}
}
add_action('init', 'bfa_register_taxonomies', 11);
