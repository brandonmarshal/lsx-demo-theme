<?php

/**
 * Basic Field Groups for Fish, Gear, and Areas CPTs.
 *
 * Registers ACF/SCF field groups for basic meta fields that are stored
 * as post meta but need ACF interface for admin editing.
 *
 * @package FishingCPTPlugin
 * @since 1.0.2
 */

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register basic field groups for all CPTs.
 *
 * Creates text fields for:
 * - Fish: scientific_name, water_type, average_size, bait_type
 * - Gear: brand, gear_type, price
 * - Areas: location, weather_conditions, catch_success
 *
 * @since 1.0.2
 *
 * @return void
 */
function register_basic_fields(): void
{
	// Only proceed if ACF/SCF is available.
	if (! function_exists('acf_add_local_field_group')) {
		error_log('Fishing CPT Plugin: ACF not available, skipping field group registration');
		return;
	}

	error_log('Fishing CPT Plugin: Registering ACF field groups');

	// Fish Basic Fields Group.
	$result = \acf_add_local_field_group(
		array(
			'key'                   => 'group_fish_basic_fields',
			'title'                 => __('Fish Details', 'fishing-cpt-plugin'),
			'fields'                => array(
				array(
					'key'          => 'field_scientific_name',
					'label'        => __('Scientific Name', 'fishing-cpt-plugin'),
					'name'         => 'scientific_name',
					'type'         => 'text',
					'instructions' => __('Enter the scientific (Latin) name for this fish species.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., Oncorhynchus mykiss', 'fishing-cpt-plugin'),
				),
				array(
					'key'          => 'field_water_type',
					'label'        => __('Water Type', 'fishing-cpt-plugin'),
					'name'         => 'water_type',
					'type'         => 'text',
					'instructions' => __('Specify the type of water this fish inhabits.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., Freshwater, Saltwater, Brackish', 'fishing-cpt-plugin'),
				),
				array(
					'key'          => 'field_average_size',
					'label'        => __('Average Size', 'fishing-cpt-plugin'),
					'name'         => 'average_size',
					'type'         => 'text',
					'instructions' => __('Typical size range for this species.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., 12-18 inches', 'fishing-cpt-plugin'),
				),
				array(
					'key'          => 'field_bait_type',
					'label'        => __('Bait Type', 'fishing-cpt-plugin'),
					'name'         => 'bait_type',
					'type'         => 'text',
					'instructions' => __('Common baits or lures used for this species.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., Minnows, Spinners, Flies', 'fishing-cpt-plugin'),
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
			'menu_order'            => 5,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);
	error_log('Fishing CPT Plugin: Fish field group registration result: ' . ($result ? 'success' : 'failed'));

	// Gear Basic Fields Group.
	\acf_add_local_field_group(
		array(
			'key'                   => 'group_gear_basic_fields',
			'title'                 => __('Gear Details', 'fishing-cpt-plugin'),
			'fields'                => array(
				array(
					'key'          => 'field_brand',
					'label'        => __('Brand', 'fishing-cpt-plugin'),
					'name'         => 'brand',
					'type'         => 'text',
					'instructions' => __('Manufacturer or brand name.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., Shimano, Daiwa, Penn', 'fishing-cpt-plugin'),
				),
				array(
					'key'          => 'field_gear_type',
					'label'        => __('Gear Type', 'fishing-cpt-plugin'),
					'name'         => 'gear_type',
					'type'         => 'text',
					'instructions' => __('Type or category of fishing gear.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., Spinning Reel, Fly Rod, Tackle Box', 'fishing-cpt-plugin'),
				),
				array(
					'key'          => 'field_price',
					'label'        => __('Price', 'fishing-cpt-plugin'),
					'name'         => 'price',
					'type'         => 'text',
					'instructions' => __('Retail price or price range.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., $149.99, $50-200', 'fishing-cpt-plugin'),
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
			'menu_order'            => 5,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);

	// Areas Basic Fields Group.
	\acf_add_local_field_group(
		array(
			'key'                   => 'group_area_basic_fields',
			'title'                 => __('Area Details', 'fishing-cpt-plugin'),
			'fields'                => array(
				array(
					'key'          => 'field_location',
					'label'        => __('Location', 'fishing-cpt-plugin'),
					'name'         => 'location',
					'type'         => 'text',
					'instructions' => __('General location or region name.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., Rocky Mountain National Park', 'fishing-cpt-plugin'),
				),
				array(
					'key'          => 'field_weather_conditions',
					'label'        => __('Weather Conditions', 'fishing-cpt-plugin'),
					'name'         => 'weather_conditions',
					'type'         => 'text',
					'instructions' => __('Typical weather patterns in this area.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., Variable, can be extreme', 'fishing-cpt-plugin'),
				),
				array(
					'key'          => 'field_catch_success',
					'label'        => __('Catch Success', 'fishing-cpt-plugin'),
					'name'         => 'catch_success',
					'type'         => 'text',
					'instructions' => __('General fishing success rate or conditions.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'placeholder'  => __('e.g., Good in spring and fall', 'fishing-cpt-plugin'),
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
			'menu_order'            => 5,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);
}
add_action('init', __NAMESPACE__ . '\register_basic_fields', 20);
