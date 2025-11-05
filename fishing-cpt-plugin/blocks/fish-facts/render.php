<?php
/**
 * Fish Quick Facts Block - Frontend Render
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 */

if (! defined('ABSPATH')) {
	exit;
}

$post_id = $block->context['postId'] ?? get_the_ID();
$display_style = $attributes['displayStyle'] ?? 'list';

// Get wrapper attributes with block supports
$wrapper_attributes = get_block_wrapper_attributes([
	'class' => 'fishing-fish-facts fishing-fish-facts--' . esc_attr($display_style),
]);

// Check if ACF function exists
if (! function_exists('get_field')) {
	echo '<div ' . $wrapper_attributes . '>';
	echo '<p class="fishing-fish-facts__notice">' . esc_html__('Advanced Custom Fields is required to display fish quick facts.', 'fishing-cpt-plugin') . '</p>';
	echo '</div>';
	return;
}

// Get fish quick facts from ACF repeater
$facts = get_field('fish_quick_facts', $post_id);

if (empty($facts) || ! is_array($facts)) {
	echo '<div ' . $wrapper_attributes . '>';
	echo '<p class="fishing-fish-facts__placeholder">' . esc_html__('No quick facts have been added yet.', 'fishing-cpt-plugin') . '</p>';
	echo '</div>';
	return;
}

echo '<div ' . $wrapper_attributes . '>';

// Display based on chosen style
switch ($display_style) {
	case 'table':
		echo '<table class="fishing-fish-facts__table" role="table" aria-label="' . esc_attr__('Fish quick facts', 'fishing-cpt-plugin') . '">';
		echo '<thead><tr>';
		echo '<th scope="col">' . esc_html__('Fact', 'fishing-cpt-plugin') . '</th>';
		echo '<th scope="col">' . esc_html__('Details', 'fishing-cpt-plugin') . '</th>';
		echo '</tr></thead>';
		echo '<tbody>';
		foreach ($facts as $fact) {
			if (empty($fact['fact_label']) || empty($fact['fact_value'])) {
				continue;
			}
			echo '<tr>';
			echo '<td class="fishing-fish-facts__label"><strong>' . esc_html($fact['fact_label']) . '</strong></td>';
			echo '<td class="fishing-fish-facts__value">' . wp_kses_post(wpautop($fact['fact_value'])) . '</td>';
			echo '</tr>';
		}
		echo '</tbody></table>';
		break;

	case 'cards':
		echo '<div class="fishing-fish-facts__cards">';
		foreach ($facts as $fact) {
			if (empty($fact['fact_label']) || empty($fact['fact_value'])) {
				continue;
			}
			echo '<div class="fishing-fish-facts__card">';
			echo '<h4 class="fishing-fish-facts__label">' . esc_html($fact['fact_label']) . '</h4>';
			echo '<div class="fishing-fish-facts__value">' . wp_kses_post(wpautop($fact['fact_value'])) . '</div>';
			echo '</div>';
		}
		echo '</div>';
		break;

	case 'list':
	default:
		echo '<dl class="fishing-fish-facts__list" aria-label="' . esc_attr__('Fish quick facts', 'fishing-cpt-plugin') . '">';
		foreach ($facts as $fact) {
			if (empty($fact['fact_label']) || empty($fact['fact_value'])) {
				continue;
			}
			echo '<dt class="fishing-fish-facts__label">' . esc_html($fact['fact_label']) . '</dt>';
			echo '<dd class="fishing-fish-facts__value">' . wp_kses_post(wpautop($fact['fact_value'])) . '</dd>';
		}
		echo '</dl>';
		break;
}

echo '</div>';
