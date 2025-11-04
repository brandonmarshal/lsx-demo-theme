<?php
/**
 * Relationship Helper Functions for Bidirectional Synchronization.
 *
 * Manages reciprocal relationships between Fish, Gear, and Area CPTs
 * to ensure data integrity and prevent circular references.
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 */

namespace Fishing_CPT;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Update reciprocal relationships when a post is saved.
 *
 * Synchronizes bidirectional relationships between related posts.
 * When a relationship is added from Post A to Post B, this function
 * ensures Post B also references Post A in its reciprocal field.
 *
 * @since 1.0.2
 *
 * @param int    $post_id        The ID of the post being saved.
 * @param array  $related_posts  Array of related post IDs or post objects.
 * @param string $source_field   The field name on the current post (e.g., 'related_gear').
 * @param string $target_field   The field name on related posts (e.g., 'related_fish').
 * @param string $target_post_type The post type of the related posts.
 *
 * @return void
 */
function update_reciprocal_relationships( int $post_id, array $related_posts, string $source_field, string $target_field, string $target_post_type ): void {
	// Validate inputs.
	if ( empty( $post_id ) || ! is_array( $related_posts ) ) {
		return;
	}

	// Remove the action to prevent infinite loops.
	remove_action( 'acf/save_post', __NAMESPACE__ . '\sync_fish_relationships', 20 );
	remove_action( 'acf/save_post', __NAMESPACE__ . '\sync_gear_relationships', 20 );
	remove_action( 'acf/save_post', __NAMESPACE__ . '\sync_area_relationships', 20 );

	// Convert post objects to IDs.
	$related_ids = array_map(
		function( $item ) {
			return is_object( $item ) ? $item->ID : (int) $item;
		},
		$related_posts
	);

	// Get the previous set of related post IDs for this post.
	$previous_related = get_field( $source_field, $post_id );
	if ( ! is_array( $previous_related ) ) {
		$previous_related = array();
	}
	$previous_ids = array_map(
		function( $item ) {
			return is_object( $item ) ? $item->ID : (int) $item;
		},
		$previous_related
	);

	// Calculate which posts were added and which were removed.
	$added_ids   = array_diff( $related_ids, $previous_ids );
	$removed_ids = array_diff( $previous_ids, $related_ids );

	// Add reciprocal relationship to newly related posts.
	foreach ( $added_ids as $target_id ) {
		$existing_relationships = get_field( $target_field, $target_id );
		if ( ! is_array( $existing_relationships ) ) {
			$existing_relationships = array();
		}
		$existing_ids = array_map(
			function( $item ) {
				return is_object( $item ) ? $item->ID : (int) $item;
			},
			$existing_relationships
		);
		if ( ! in_array( $post_id, $existing_ids, true ) ) {
			$existing_ids[] = $post_id;
			update_field( $target_field, $existing_ids, $target_id );
		}
	}

	// Remove reciprocal relationship from posts that are no longer related.
	foreach ( $removed_ids as $target_id ) {
		$existing_relationships = get_field( $target_field, $target_id );
		if ( ! is_array( $existing_relationships ) ) {
			$existing_relationships = array();
		}
		$existing_ids = array_map(
			function( $item ) {
				return is_object( $item ) ? $item->ID : (int) $item;
			},
			$existing_relationships
		);
		if ( in_array( $post_id, $existing_ids, true ) ) {
			$existing_ids = array_diff( $existing_ids, array( $post_id ) );
			update_field( $target_field, array_values( $existing_ids ), $target_id );
		}
	}

	// Re-add the actions after processing.
	add_action( 'acf/save_post', __NAMESPACE__ . '\sync_fish_relationships', 20 );
	add_action( 'acf/save_post', __NAMESPACE__ . '\sync_gear_relationships', 20 );
	add_action( 'acf/save_post', __NAMESPACE__ . '\sync_area_relationships', 20 );
}

/**
 * Synchronize Fish post relationships.
 *
 * Updates reciprocal relationships for Fish CPT when saved.
 * Handles relationships to Gear and Areas.
 *
 * @since 1.0.2
 *
 * @param int $post_id The ID of the Fish post being saved.
 *
 * @return void
 */
function sync_fish_relationships( int $post_id ): void {
	// Check if this is the correct post type.
	if ( 'fish' !== get_post_type( $post_id ) ) {
		return;
	}

	// Check if this is an autosave or revision.
	if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
		return;
	}

	// Verify user capabilities.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Sync Fish → Gear relationships.
	$related_gear = get_field( 'related_gear', $post_id );
	if ( is_array( $related_gear ) ) {
		update_reciprocal_relationships(
			$post_id,
			$related_gear,
			'related_gear',
			'related_fish',
			'gear'
		);
	}

	// Sync Fish → Area relationships.
	$related_areas = get_field( 'related_areas', $post_id );
	if ( is_array( $related_areas ) ) {
		update_reciprocal_relationships(
			$post_id,
			$related_areas,
			'related_areas',
			'related_fish',
			'area'
		);
	}
}
add_action( 'acf/save_post', __NAMESPACE__ . '\sync_fish_relationships', 20 );

/**
 * Synchronize Gear post relationships.
 *
 * Updates reciprocal relationships for Gear CPT when saved.
 * Handles relationships to Fish and Areas.
 *
 * @since 1.0.2
 *
 * @param int $post_id The ID of the Gear post being saved.
 *
 * @return void
 */
function sync_gear_relationships( int $post_id ): void {
	// Check if this is the correct post type.
	if ( 'gear' !== get_post_type( $post_id ) ) {
		return;
	}

	// Check if this is an autosave or revision.
	if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
		return;
	}

	// Verify user capabilities.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Sync Gear → Fish relationships.
	$related_fish = get_field( 'related_fish', $post_id );
	if ( is_array( $related_fish ) ) {
		update_reciprocal_relationships(
			$post_id,
			$related_fish,
			'related_fish',
			'related_gear',
			'fish'
		);
	}

	// Sync Gear → Area relationships.
	$related_areas = get_field( 'related_areas', $post_id );
	if ( is_array( $related_areas ) ) {
		update_reciprocal_relationships(
			$post_id,
			$related_areas,
			'related_areas',
			'related_gear',
			'area'
		);
	}
}
add_action( 'acf/save_post', __NAMESPACE__ . '\sync_gear_relationships', 20 );

/**
 * Synchronize Area post relationships.
 *
 * Updates reciprocal relationships for Area CPT when saved.
 * Handles relationships to Fish and Gear.
 *
 * @since 1.0.2
 *
 * @param int $post_id The ID of the Area post being saved.
 *
 * @return void
 */
function sync_area_relationships( int $post_id ): void {
	// Check if this is the correct post type.
	if ( 'area' !== get_post_type( $post_id ) ) {
		return;
	}

	// Check if this is an autosave or revision.
	if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
		return;
	}

	// Verify user capabilities.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Sync Area → Fish relationships.
	$related_fish = get_field( 'related_fish', $post_id );
	if ( is_array( $related_fish ) ) {
		update_reciprocal_relationships(
			$post_id,
			$related_fish,
			'related_fish',
			'related_areas',
			'fish'
		);
	}

	// Sync Area → Gear relationships.
	$related_gear = get_field( 'related_gear', $post_id );
	if ( is_array( $related_gear ) ) {
		update_reciprocal_relationships(
			$post_id,
			$related_gear,
			'related_gear',
			'related_areas',
			'gear'
		);
	}
}
add_action( 'acf/save_post', __NAMESPACE__ . '\sync_area_relationships', 20 );

/**
 * Validate relationship data to prevent circular references.
 *
 * Checks if adding a relationship would create a circular reference
 * where Post A relates to Post B which relates back to Post A in a loop.
 *
 * @since 1.0.2
 *
 * @param int   $post_id     The ID of the current post.
 * @param array $related_ids Array of related post IDs.
 * @param int   $depth       Current recursion depth (prevents infinite loops).
 * @param array $visited     Array of already visited post IDs.
 *
 * @return bool True if relationships are valid, false if circular reference detected.
 */
function validate_relationships( int $post_id, array $related_ids, int $depth = 0, array $visited = array() ): bool {
	// Prevent infinite recursion (max depth of 10 levels).
	if ( $depth > 10 ) {
		return false;
	}

	// Check if we've already visited this post (circular reference detected).
	if ( in_array( $post_id, $visited, true ) ) {
		return false;
	}

	// Add current post to visited list.
	$visited[] = $post_id;

	// Check each related post.
	foreach ( $related_ids as $related_id ) {
		// If the related post is the same as the current post, it's circular.
		if ( $related_id === $post_id ) {
			return false;
		}

		// Recursively check related posts' relationships.
		$nested_relationships = get_field( 'related_posts', $related_id );
		if ( is_array( $nested_relationships ) && ! empty( $nested_relationships ) ) {
			$nested_ids = array_map(
				function( $item ) {
					return is_object( $item ) ? $item->ID : (int) $item;
				},
				$nested_relationships
			);

			if ( ! validate_relationships( $post_id, $nested_ids, $depth + 1, $visited ) ) {
				return false;
			}
		}
	}

	return true;
}

/**
 * Get all related posts for a given post across all relationship types.
 *
 * Utility function to retrieve all related posts for display or querying.
 *
 * @since 1.0.2
 *
 * @param int    $post_id       The ID of the post to get relationships for.
 * @param string $relationship_type Optional. Filter by relationship type ('gear', 'fish', 'area').
 *
 * @return array Array of related post objects.
 */
function get_all_related_posts( int $post_id, string $relationship_type = '' ): array {
	$post_type = get_post_type( $post_id );
	$related   = array();

	switch ( $post_type ) {
		case 'fish':
			if ( empty( $relationship_type ) || 'gear' === $relationship_type ) {
				$gear = get_field( 'related_gear', $post_id );
				if ( is_array( $gear ) ) {
					$related = array_merge( $related, $gear );
				}
			}
			if ( empty( $relationship_type ) || 'area' === $relationship_type ) {
				$areas = get_field( 'related_areas', $post_id );
				if ( is_array( $areas ) ) {
					$related = array_merge( $related, $areas );
				}
			}
			break;

		case 'gear':
			if ( empty( $relationship_type ) || 'fish' === $relationship_type ) {
				$fish = get_field( 'related_fish', $post_id );
				if ( is_array( $fish ) ) {
					$related = array_merge( $related, $fish );
				}
			}
			if ( empty( $relationship_type ) || 'area' === $relationship_type ) {
				$areas = get_field( 'related_areas', $post_id );
				if ( is_array( $areas ) ) {
					$related = array_merge( $related, $areas );
				}
			}
			break;

		case 'area':
			if ( empty( $relationship_type ) || 'fish' === $relationship_type ) {
				$fish = get_field( 'related_fish', $post_id );
				if ( is_array( $fish ) ) {
					$related = array_merge( $related, $fish );
				}
			}
			if ( empty( $relationship_type ) || 'gear' === $relationship_type ) {
				$gear = get_field( 'related_gear', $post_id );
				if ( is_array( $gear ) ) {
					$related = array_merge( $related, $gear );
				}
			}
			break;
	}

	return $related;
}
