<?php
/**
 * Gear Specifications Block - Frontend Render
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 */

if (! defined('ABSPATH')) {
	exit;
}

$post_id = $block->context['postId'] ?? get_the_ID();
$display_style = $attributes['displayStyle'] ?? 'table';

// Get wrapper attributes with block supports
$wrapper_attributes = get_block_wrapper_attributes([
	'class' => 'fishing-gear-specs fishing-gear-specs--' . esc_attr($display_style),
]);

// Check if ACF function exists
if (! function_exists('get_field')) {
	echo '<div ' . $wrapper_attributes . '>';
	echo '<p class="fishing-gear-specs__notice">' . esc_html__('Advanced Custom Fields is required to display gear specifications.', 'fishing-cpt-plugin') . '</p>';
	echo '</div>';
	return;
}

// Get gear specifications from ACF repeater
$specs = get_field('gear_specs', $post_id);

if (empty($specs) || ! is_array($specs)) {
	echo '<div ' . $wrapper_attributes . '>';
	echo '<p class="fishing-gear-specs__placeholder">' . esc_html__('No specifications have been added yet.', 'fishing-cpt-plugin') . '</p>';
	echo '</div>';
	return;
}

echo '<div ' . $wrapper_attributes . '>';

// Display based on chosen style
switch ($display_style) {
	case 'list':
		echo '<dl class="fishing-gear-specs__list" aria-label="' . esc_attr__('Gear specifications', 'fishing-cpt-plugin') . '">';
		foreach ($specs as $spec) {
			if (empty($spec['spec_name']) || empty($spec['spec_value'])) {
				continue;
			}
			$value_with_unit = $spec['spec_value'];
			if (! empty($spec['spec_unit'])) {
				$value_with_unit .= ' ' . $spec['spec_unit'];
			}
			echo '<dt class="fishing-gear-specs__label">' . esc_html($spec['spec_name']) . '</dt>';
			echo '<dd class="fishing-gear-specs__value">' . esc_html($value_with_unit) . '</dd>';
		}
		echo '</dl>';
		break;

	case 'cards':
		echo '<div class="fishing-gear-specs__cards">';
		foreach ($specs as $spec) {
			if (empty($spec['spec_name']) || empty($spec['spec_value'])) {
				continue;
			}
			$value_with_unit = $spec['spec_value'];
			if (! empty($spec['spec_unit'])) {
				$value_with_unit .= ' ' . $spec['spec_unit'];
			}
			echo '<div class="fishing-gear-specs__card">';
			echo '<h4 class="fishing-gear-specs__label">' . esc_html($spec['spec_name']) . '</h4>';
			echo '<div class="fishing-gear-specs__value">' . esc_html($value_with_unit) . '</div>';
			echo '</div>';
		}
		echo '</div>';
		break;

	case 'table':
	default:
		echo '<table class="fishing-gear-specs__table" role="table" aria-label="' . esc_attr__('Gear specifications', 'fishing-cpt-plugin') . '">';
		echo '<thead><tr>';
		echo '<th scope="col">' . esc_html__('Specification', 'fishing-cpt-plugin') . '</th>';
		echo '<th scope="col">' . esc_html__('Value', 'fishing-cpt-plugin') . '</th>';
		echo '</tr></thead>';
		echo '<tbody>';
		foreach ($specs as $spec) {
			if (empty($spec['spec_name']) || empty($spec['spec_value'])) {
				continue;
			}
			$value_with_unit = $spec['spec_value'];
			if (! empty($spec['spec_unit'])) {
				$value_with_unit .= ' ' . $spec['spec_unit'];
			}
			echo '<tr>';
			echo '<td class="fishing-gear-specs__label"><strong>' . esc_html($spec['spec_name']) . '</strong></td>';
			echo '<td class="fishing-gear-specs__value">' . esc_html($value_with_unit) . '</td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
		break;
}

echo '</div>';
