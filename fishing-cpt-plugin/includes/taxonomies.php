<?php

/**
 * Taxonomies for Fishing CPT Plugin.
 *
 * Creates taxonomies to establish relationships between Fish, Gear, and Areas CPTs.
 * Uses standard WordPress taxonomy system instead of ACF relationships.
 *
 * @package FishingCPTPlugin
 * @since 1.0.3
 */

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register taxonomies for CPT relationships.
 *
 * Creates the following taxonomies:
 * - fishing_areas: Links Fish to Areas (hierarchical)
 * - suitable_gear: Links Fish to Gear (non-hierarchical)
 *
 * @since 1.0.3
 *
 * @return void
 */
function register_taxonomies(): void
{
	// Taxonomy to link Fish to Areas
	register_taxonomy(
		'fishing_areas',
		array('fish'),
		array(
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => _x('Fishing Areas', 'taxonomy general name', 'fishing-cpt-plugin'),
				'singular_name'     => _x('Fishing Area', 'taxonomy singular name', 'fishing-cpt-plugin'),
				'search_items'      => __('Search Fishing Areas', 'fishing-cpt-plugin'),
				'all_items'         => __('All Fishing Areas', 'fishing-cpt-plugin'),
				'parent_item'       => __('Parent Fishing Area', 'fishing-cpt-plugin'),
				'parent_item_colon' => __('Parent Fishing Area:', 'fishing-cpt-plugin'),
				'edit_item'         => __('Edit Fishing Area', 'fishing-cpt-plugin'),
				'update_item'       => __('Update Fishing Area', 'fishing-cpt-plugin'),
				'add_new_item'      => __('Add New Fishing Area', 'fishing-cpt-plugin'),
				'new_item_name'     => __('New Fishing Area Name', 'fishing-cpt-plugin'),
				'menu_name'         => __('Fishing Areas', 'fishing-cpt-plugin'),
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
				'name'                       => _x('Suitable Gear', 'taxonomy general name', 'fishing-cpt-plugin'),
				'singular_name'              => _x('Suitable Gear', 'taxonomy singular name', 'fishing-cpt-plugin'),
				'search_items'               => __('Search Suitable Gear', 'fishing-cpt-plugin'),
				'popular_items'              => __('Popular Suitable Gear', 'fishing-cpt-plugin'),
				'all_items'                  => __('All Suitable Gear', 'fishing-cpt-plugin'),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'edit_item'                  => __('Edit Suitable Gear', 'fishing-cpt-plugin'),
				'update_item'                => __('Update Suitable Gear', 'fishing-cpt-plugin'),
				'add_new_item'               => __('Add New Suitable Gear', 'fishing-cpt-plugin'),
				'new_item_name'              => __('New Suitable Gear Name', 'fishing-cpt-plugin'),
				'separate_items_with_commas' => __('Separate suitable gear with commas', 'fishing-cpt-plugin'),
				'add_or_remove_items'        => __('Add or remove suitable gear', 'fishing-cpt-plugin'),
				'choose_from_most_used'      => __('Choose from the most used suitable gear', 'fishing-cpt-plugin'),
				'menu_name'                  => __('Suitable Gear', 'fishing-cpt-plugin'),
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
				'name'              => _x('Fish Species', 'taxonomy general name', 'fishing-cpt-plugin'),
				'singular_name'     => _x('Fish Species', 'taxonomy singular name', 'fishing-cpt-plugin'),
				'search_items'      => __('Search Fish Species', 'fishing-cpt-plugin'),
				'all_items'         => __('All Fish Species', 'fishing-cpt-plugin'),
				'parent_item'       => __('Parent Fish Species', 'fishing-cpt-plugin'),
				'parent_item_colon' => __('Parent Fish Species:', 'fishing-cpt-plugin'),
				'edit_item'         => __('Edit Fish Species', 'fishing-cpt-plugin'),
				'update_item'       => __('Update Fish Species', 'fishing-cpt-plugin'),
				'add_new_item'      => __('Add New Fish Species', 'fishing-cpt-plugin'),
				'new_item_name'     => __('New Fish Species Name', 'fishing-cpt-plugin'),
				'menu_name'         => __('Fish Species', 'fishing-cpt-plugin'),
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
				'name'              => _x('Gear Categories', 'taxonomy general name', 'fishing-cpt-plugin'),
				'singular_name'     => _x('Gear Category', 'taxonomy singular name', 'fishing-cpt-plugin'),
				'search_items'      => __('Search Gear Categories', 'fishing-cpt-plugin'),
				'all_items'         => __('All Gear Categories', 'fishing-cpt-plugin'),
				'parent_item'       => __('Parent Gear Category', 'fishing-cpt-plugin'),
				'parent_item_colon' => __('Parent Gear Category:', 'fishing-cpt-plugin'),
				'edit_item'         => __('Edit Gear Category', 'fishing-cpt-plugin'),
				'update_item'       => __('Update Gear Category', 'fishing-cpt-plugin'),
				'add_new_item'      => __('Add New Gear Category', 'fishing-cpt-plugin'),
				'new_item_name'     => __('New Gear Category Name', 'fishing-cpt-plugin'),
				'menu_name'         => __('Gear Categories', 'fishing-cpt-plugin'),
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
				'name'              => _x('Area Types', 'taxonomy general name', 'fishing-cpt-plugin'),
				'singular_name'     => _x('Area Type', 'taxonomy singular name', 'fishing-cpt-plugin'),
				'search_items'      => __('Search Area Types', 'fishing-cpt-plugin'),
				'all_items'         => __('All Area Types', 'fishing-cpt-plugin'),
				'parent_item'       => __('Parent Area Type', 'fishing-cpt-plugin'),
				'parent_item_colon' => __('Parent Area Type:', 'fishing-cpt-plugin'),
				'edit_item'         => __('Edit Area Type', 'fishing-cpt-plugin'),
				'update_item'       => __('Update Area Type', 'fishing-cpt-plugin'),
				'add_new_item'      => __('Add New Area Type', 'fishing-cpt-plugin'),
				'new_item_name'     => __('New Area Type Name', 'fishing-cpt-plugin'),
				'menu_name'         => __('Area Types', 'fishing-cpt-plugin'),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array('slug' => 'area-type'),
			'show_in_rest'      => true,
		)
	);
}
add_action('init', __NAMESPACE__ . '\register_taxonomies');

/**
 * Auto-populate taxonomies with terms from existing posts.
 *
 * This function helps migrate from the old ACF relationship system
 * to the new taxonomy-based system by creating terms from existing data.
 *
 * @since 1.0.3
 *
 * @return void
 */
function populate_relationship_taxonomies(): void
{
	// Only run this once
	if (get_option('fishing_cpt_taxonomies_populated')) {
		return;
	}

	// Get all areas and create fishing_areas terms
	$areas = get_posts(array(
		'post_type'      => 'area',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	));

	foreach ($areas as $area) {
		$term_name = $area->post_title;
		$existing_term = term_exists($term_name, 'fishing_areas');

		if (!$existing_term) {
			wp_insert_term($term_name, 'fishing_areas', array(
				'description' => $area->post_excerpt,
			));
		}
	}

	// Get all gear and create suitable_gear terms
	$gear_items = get_posts(array(
		'post_type'      => 'gear',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
	));

	foreach ($gear_items as $gear) {
		$term_name = $gear->post_title;
		$existing_term = term_exists($term_name, 'suitable_gear');

		if (!$existing_term) {
			wp_insert_term($term_name, 'suitable_gear');
		}
	}

	update_option('fishing_cpt_taxonomies_populated', true);
}
add_action('init', __NAMESPACE__ . '\populate_relationship_taxonomies', 99);

/**
 * Get related posts using taxonomies.
 *
 * @since 1.0.3
 *
 * @param int    $post_id   Post ID to get related posts for.
 * @param string $taxonomy  Taxonomy to use for relationship.
 * @param string $post_type Post type to get related posts from.
 * @return array Array of related post objects.
 */
function get_related_posts($post_id, $taxonomy, $post_type): array
{
	$terms = wp_get_post_terms($post_id, $taxonomy, array('fields' => 'ids'));

	if (empty($terms)) {
		return array();
	}

	$related_posts = get_posts(array(
		'post_type'      => $post_type,
		'posts_per_page' => -1,
		'tax_query'      => array(
			array(
				'taxonomy' => $taxonomy,
				'field'    => 'term_id',
				'terms'    => $terms,
			),
		),
		'post__not_in'   => array($post_id),
	));

	return $related_posts;
}

/**
 * Display related areas for a fish post.
 *
 * @since 1.0.3
 *
 * @param int|null $post_id Optional. Post ID. Default is current post.
 * @return void
 */
function display_related_areas($post_id = null): void
{
	$post_id = $post_id ?? get_the_ID();

	if (get_post_type($post_id) !== 'fish') {
		return;
	}

	$related_areas = get_related_posts($post_id, 'fishing_areas', 'area');

	if (empty($related_areas)) {
		return;
	}

	echo '<div class="related-areas">';
	echo '<h3>' . esc_html__('Fishing Areas', 'fishing-cpt-plugin') . '</h3>';
	echo '<ul class="areas-list">';

	foreach ($related_areas as $area) {
		echo '<li>';
		echo '<a href="' . esc_url(get_permalink($area->ID)) . '">' . esc_html($area->post_title) . '</a>';
		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}

/**
 * Display suitable gear for a fish post.
 *
 * @since 1.0.3
 *
 * @param int|null $post_id Optional. Post ID. Default is current post.
 * @return void
 */
function display_suitable_gear($post_id = null): void
{
	$post_id = $post_id ?? get_the_ID();

	if (get_post_type($post_id) !== 'fish') {
		return;
	}

	$related_gear = get_related_posts($post_id, 'suitable_gear', 'gear');

	if (empty($related_gear)) {
		return;
	}

	echo '<div class="suitable-gear">';
	echo '<h3>' . esc_html__('Suitable Gear', 'fishing-cpt-plugin') . '</h3>';
	echo '<ul class="gear-list">';

	foreach ($related_gear as $gear) {
		echo '<li>';
		echo '<a href="' . esc_url(get_permalink($gear->ID)) . '">' . esc_html($gear->post_title) . '</a>';
		echo '</li>';
	}

	echo '</ul>';
	echo '</div>';
}
