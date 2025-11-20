<?php

/**
 * Repeatable Field Groups for Fish and Gear CPTs.
 *
 * Registers ACF/SCF repeatable field groups for structured data entry
 * including gear specifications and fish quick facts.
 *
 * @package FishingCPTPlugin
 * @since 1.0.2
 */

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register repeatable field groups for Gear and Fish CPTs.
 *
 * Creates repeater fields for:
 * - Gear specifications (name, value, unit)
 * - Fish quick facts (label, value)
 *
 * @since 1.0.2
 *
 * @return void
 */
function register_repeatable_fields(): void
{
	// Only proceed if ACF/SCF is available.
	if (! function_exists('acf_add_local_field_group')) {
		error_log('FishingCPTPlugin: ACF not available for repeatable fields registration');
		return;
	}

	error_log('FishingCPTPlugin: Registering repeatable field groups');

	// Gear Specifications Field Group.
	acf_add_local_field_group(
		array(
			'key'                   => 'group_gear_specifications',
			'title'                 => __('Gear Specifications', 'fishing-cpt-plugin'),
			'fields'                => array(
				array(
					'key'          => 'field_gear_specs',
					'label'        => __('Specifications', 'fishing-cpt-plugin'),
					'name'         => 'gear_specs',
					'type'         => 'repeater',
					'instructions' => __('Add detailed specifications for this gear item.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'layout'       => 'table',
					'button_label' => __('Add Specification', 'fishing-cpt-plugin'),
					'min'          => 0,
					'max'          => 20,
					'collapsed'    => '',
					'sub_fields'   => array(
						array(
							'key'          => 'field_spec_name',
							'label'        => __('Specification', 'fishing-cpt-plugin'),
							'name'         => 'spec_name',
							'type'         => 'text',
							'required'     => 1,
							'placeholder'  => __('e.g., Length, Weight, Material', 'fishing-cpt-plugin'),
							'wrapper'      => array(
								'width' => '40',
							),
						),
						array(
							'key'          => 'field_spec_value',
							'label'        => __('Value', 'fishing-cpt-plugin'),
							'name'         => 'spec_value',
							'type'         => 'text',
							'required'     => 1,
							'placeholder'  => __('e.g., 7, 200, Carbon Fiber', 'fishing-cpt-plugin'),
							'wrapper'      => array(
								'width' => '30',
							),
						),
						array(
							'key'          => 'field_spec_unit',
							'label'        => __('Unit', 'fishing-cpt-plugin'),
							'name'         => 'spec_unit',
							'type'         => 'select',
							'required'     => 0,
							'choices'      => array(
								''     => __('- None -', 'fishing-cpt-plugin'),
								'mm'   => __('Millimeters (mm)', 'fishing-cpt-plugin'),
								'cm'   => __('Centimeters (cm)', 'fishing-cpt-plugin'),
								'm'    => __('Meters (m)', 'fishing-cpt-plugin'),
								'ft'   => __('Feet (ft)', 'fishing-cpt-plugin'),
								'in'   => __('Inches (in)', 'fishing-cpt-plugin'),
								'g'    => __('Grams (g)', 'fishing-cpt-plugin'),
								'kg'   => __('Kilograms (kg)', 'fishing-cpt-plugin'),
								'lbs'  => __('Pounds (lbs)', 'fishing-cpt-plugin'),
								'oz'   => __('Ounces (oz)', 'fishing-cpt-plugin'),
							),
							'allow_null'   => 1,
							'placeholder'  => __('Select unit', 'fishing-cpt-plugin'),
							'wrapper'      => array(
								'width' => '30',
							),
						),
					),
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
			'menu_order'            => 15,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);

	// Fish Quick Facts Field Group.
	acf_add_local_field_group(
		array(
			'key'                   => 'group_fish_quick_facts',
			'title'                 => __('Fish Quick Facts', 'fishing-cpt-plugin'),
			'fields'                => array(
				array(
					'key'          => 'field_fish_quick_facts',
					'label'        => __('Quick Facts', 'fishing-cpt-plugin'),
					'name'         => 'fish_quick_facts',
					'type'         => 'repeater',
					'instructions' => __('Add quick facts about this fish species. These will be displayed in a structured format.', 'fishing-cpt-plugin'),
					'required'     => 0,
					'layout'       => 'table',
					'button_label' => __('Add Fact', 'fishing-cpt-plugin'),
					'min'          => 0,
					'max'          => 15,
					'collapsed'    => '',
					'sub_fields'   => array(
						array(
							'key'          => 'field_fact_label',
							'label'        => __('Label', 'fishing-cpt-plugin'),
							'name'         => 'fact_label',
							'type'         => 'text',
							'required'     => 1,
							'placeholder'  => __('e.g., Scientific Name, Habitat, Average Size', 'fishing-cpt-plugin'),
							'wrapper'      => array(
								'width' => '40',
							),
						),
						array(
							'key'          => 'field_fact_value',
							'label'        => __('Value', 'fishing-cpt-plugin'),
							'name'         => 'fact_value',
							'type'         => 'textarea',
							'required'     => 1,
							'placeholder'  => __('Enter the fact details', 'fishing-cpt-plugin'),
							'rows'         => 2,
							'wrapper'      => array(
								'width' => '60',
							),
						),
					),
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
			'menu_order'            => 15,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
		)
	);
}
add_action('init', __NAMESPACE__ . '\register_repeatable_fields', 20);

error_log('FishingCPTPlugin: Repeatable field groups registration completed');

/**
 * Display gear specifications in a structured table format.
 *
 * Outputs specifications with proper escaping and accessibility attributes.
 * Falls back gracefully if no specifications are defined.
 *
 * @since 1.0.2
 *
 * @param int|null $post_id Optional. Post ID. Default is current post.
 * @return void
 */
function display_gear_specifications($post_id = null): void
{
	$post_id = $post_id ?? get_the_ID();

	$specifications = get_post_meta($post_id, '_gear_specifications', true);

	if (empty($specifications) || ! is_array($specifications)) {
		return;
	}

	echo '<div class="gear-specifications">';
	echo '<h3>' . esc_html__('Specifications', 'fishing-cpt-plugin') . '</h3>';
	echo '<table class="specs-table" role="table" aria-label="' . esc_attr__('Gear specifications', 'fishing-cpt-plugin') . '">';
	echo '<thead>';
	echo '<tr>';
	echo '<th scope="col">' . esc_html__('Specification', 'fishing-cpt-plugin') . '</th>';
	echo '<th scope="col">' . esc_html__('Value', 'fishing-cpt-plugin') . '</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';

	foreach ($specifications as $spec) {
		if (empty($spec['name']) || empty($spec['value'])) {
			continue;
		}

		$value_with_unit = $spec['value'];
		if (! empty($spec['unit'])) {
			$value_with_unit .= ' ' . $spec['unit'];
		}

		echo '<tr>';
		echo '<td>' . esc_html($spec['name']) . '</td>';
		echo '<td>' . esc_html($value_with_unit) . '</td>';
		echo '</tr>';
	}

	echo '</tbody>';
	echo '</table>';
	echo '</div>';
}

/**
 * Display fish quick facts in a structured list format.
 *
 * Outputs facts with proper semantic markup and accessibility attributes.
 * Falls back gracefully if no facts are defined.
 *
 * @since 1.0.2
 *
 * @param int|null $post_id Optional. Post ID. Default is current post.
 * @return void
 */
function display_fish_quick_facts($post_id = null): void
{
	$post_id = $post_id ?? get_the_ID();

	$facts = get_post_meta($post_id, '_fish_quick_facts', true);

	if (empty($facts) || ! is_array($facts)) {
		return;
	}

	echo '<div class="fish-quick-facts">';
	echo '<h3>' . esc_html__('Quick Facts', 'fishing-cpt-plugin') . '</h3>';
	echo '<dl class="facts-list" aria-label="' . esc_attr__('Fish quick facts', 'fishing-cpt-plugin') . '">';

	foreach ($facts as $fact) {
		if (empty($fact['label']) || empty($fact['value'])) {
			continue;
		}

		echo '<dt class="fact-label">' . esc_html($fact['label']) . '</dt>';
		echo '<dd class="fact-value">' . wp_kses_post(wpautop($fact['value'])) . '</dd>';
	}

	echo '</dl>';
	echo '</div>';
}
