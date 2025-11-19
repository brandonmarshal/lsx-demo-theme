<?php
/**
 * Relationship Field Groups for Fish, Gear, and Areas CPTs.
 *
 * Registers ACF/SCF field groups that enable bidirectional relationships
 * between Fish, Gear, and Area custom post types.
 *
 * @package FishingCPTPlugin
 * @since 1.0.2
 */

namespace FishingCPTPlugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register relationship field groups for all CPTs.
 *
 * Creates post_object fields for establishing relationships between
 * Fish, Gear, and Areas with multiple selection enabled.
 *
 * @since 1.0.2
 *
 * @return void
 */
function register_relationship_fields(): void {
	// Only proceed if ACF/SCF is available.
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// Fish Relationships Field Group.
	\acf_add_local_field_group(
		array(
			'key'                   => 'group_fish_relationships',
			'title'                 => \__( 'Fish Relationships', 'fishing-cpt-plugin' ),
			'fields'                => array(
				array(
					'key'           => 'field_fish_related_gear',
					'label'         => \__( 'Related Gear', 'fishing-cpt-plugin' ),
					'name'          => 'related_gear',
					'type'          => 'post_object',
					'instructions'  => \__( 'Select gear items that work well with this fish species.', 'fishing-cpt-plugin' ),
					'required'      => 0,
					'post_type'     => array( 'gear' ),
					'return_format' => 'object',
					'multiple'      => 1,
					'ui'            => 1,
					'allow_null'    => 1,
				),
				array(
					'key'           => 'field_fish_related_areas',
					'label'         => \__( 'Fishing Areas', 'fishing-cpt-plugin' ),
					'name'          => 'related_areas',
					'type'          => 'post_object',
					'instructions'  => \__( 'Select fishing areas where this species can be found.', 'fishing-cpt-plugin' ),
					'required'      => 0,
					'post_type'     => array( 'area' ),
					'return_format' => 'object',
					'multiple'      => 1,
					'ui'            => 1,
					'allow_null'    => 1,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'fish',
					),
				),
			),
			'menu_order'            => 10,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);

	// Gear Relationships Field Group.
	\acf_add_local_field_group(
		array(
			'key'                   => 'group_gear_relationships',
			'title'                 => \__( 'Gear Relationships', 'fishing-cpt-plugin' ),
			'fields'                => array(
				array(
					'key'           => 'field_gear_related_fish',
					'label'         => \__( 'Compatible Fish Species', 'fishing-cpt-plugin' ),
					'name'          => 'related_fish',
					'type'          => 'post_object',
					'instructions'  => \__( 'Select fish species this gear is suited for.', 'fishing-cpt-plugin' ),
					'required'      => 0,
					'post_type'     => array( 'fish' ),
					'return_format' => 'object',
					'multiple'      => 1,
					'ui'            => 1,
					'allow_null'    => 1,
				),
				array(
					'key'           => 'field_gear_related_areas',
					'label'         => \__( 'Recommended Areas', 'fishing-cpt-plugin' ),
					'name'          => 'related_areas',
					'type'          => 'post_object',
					'instructions'  => \__( 'Select fishing areas where this gear is recommended.', 'fishing-cpt-plugin' ),
					'required'      => 0,
					'post_type'     => array( 'area' ),
					'return_format' => 'object',
					'multiple'      => 1,
					'ui'            => 1,
					'allow_null'    => 1,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'gear',
					),
				),
			),
			'menu_order'            => 10,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);

	// Area Relationships Field Group.
	\acf_add_local_field_group(
		array(
			'key'                   => 'group_area_relationships',
			'title'                 => \__( 'Area Relationships', 'fishing-cpt-plugin' ),
			'fields'                => array(
				array(
					'key'           => 'field_area_related_fish',
					'label'         => \__( 'Fish Species Found Here', 'fishing-cpt-plugin' ),
					'name'          => 'related_fish',
					'type'          => 'post_object',
					'instructions'  => \__( 'Select fish species that can be found in this area.', 'fishing-cpt-plugin' ),
					'required'      => 0,
					'post_type'     => array( 'fish' ),
					'return_format' => 'object',
					'multiple'      => 1,
					'ui'            => 1,
					'allow_null'    => 1,
				),
				array(
					'key'           => 'field_area_related_gear',
					'label'         => \__( 'Recommended Gear', 'fishing-cpt-plugin' ),
					'name'          => 'related_gear',
					'type'          => 'post_object',
					'instructions'  => \__( 'Select gear that works well in this fishing area.', 'fishing-cpt-plugin' ),
					'required'      => 0,
					'post_type'     => array( 'gear' ),
					'return_format' => 'object',
					'multiple'      => 1,
					'ui'            => 1,
					'allow_null'    => 1,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'area',
					),
				),
			),
			'menu_order'            => 10,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);
}
\add_action( 'acf/init', __NAMESPACE__ . '\register_relationship_fields' );
