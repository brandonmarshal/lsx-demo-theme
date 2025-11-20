<?php

/**
 * Block Bindings for SCF/ACF Fields
 *
 * Registers block bindings source to connect WordPress blocks
 * with SCF/ACF custom field values for dynamic content display.
 *
 * @package FishingCPTPlugin
 * @since 1.0.2
 */

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register custom block bindings source for SCF/ACF fields.
 *
 * Provides a binding source that retrieves values from SCF/ACF fields
 * and makes them available to core blocks via the block bindings API.
 *
 * @since 1.0.2
 *
 * @return void
 */
function register_block_bindings(): void
{
	// Ensure block bindings API is available (WP 6.7+)
	if (! function_exists('register_block_bindings_source')) {
		return;
	}

	register_block_bindings_source(
		'fishing/scf-fields',
		array(
			'label'              => __('Fishing SCF Fields', 'fishing-cpt-plugin'),
			'get_value_callback' => __NAMESPACE__ . '\get_scf_field_value',
			'uses_context'       => array('postId', 'postType'),
		)
	);
}
add_action('init', __NAMESPACE__ . '\register_block_bindings');

/**
 * Get value callback for block bindings.
 *
 * Retrieves the value of a specified SCF/ACF field for use in block bindings.
 * Supports both simple fields and repeater field data.
 *
 * @since 1.0.2
 *
 * @param array    $source_args Arguments passed to the binding source.
 * @param WP_Block $block_instance Block instance.
 * @param string   $attribute_name The attribute name to bind.
 * @return string|array The field value, or empty string if not found.
 */
function get_scf_field_value(array $source_args, $block_instance, string $attribute_name)
{
	// Ensure we have a field name.
	if (empty($source_args['field_name'])) {
		return '';
	}

	$field_name = sanitize_text_field($source_args['field_name']);

	/**
	 * Define a whitelist of allowed field names for block bindings.
	 * You can filter this list using the 'fishing_cpt_allowed_field_names' filter.
	 *
	 * @since 1.0.3
	 */
	$allowed_field_names = apply_filters(
		'fishing_cpt_allowed_field_names',
		array(
			// Add allowed field names here, e.g.:
			'fishing_location',
			'fishing_species',
			'fishing_weight',
			'fishing_length',
			// Add more as needed.
		)
	);

	if (! in_array($field_name, $allowed_field_names, true)) {
		return '';
	}
	// Get post ID from context or use current post.
	$post_id = $block_instance->context['postId'] ?? get_the_ID();

	if (! $post_id) {
		return '';
	}

	// Check if ACF/SCF function exists.
	if (! function_exists('get_field')) {
		// Fallback to post meta if ACF/SCF not available.
		$value = get_post_meta($post_id, $field_name, true);
		return is_string($value) ? $value : '';
	}

	// Get field value using ACF/SCF.
	$value = get_field($field_name, $post_id);

	// Handle different field types.
	if (is_array($value)) {
		// For repeater fields, return as JSON for processing.
		return wp_json_encode($value);
	}

	// Return string value or empty string.
	if (is_string($value)) {
		return $value;
	}
	if (is_null($value)) {
		return '';
	}
	if (is_object($value)) {
		// Only cast to string if object implements __toString().
		if (method_exists($value, '__toString')) {
			return (string) $value;
		}
		return '';
	}
	if (is_resource($value)) {
		return '';
	}
	// For scalars (int, float, bool), cast to string.
	return (string) $value;
}

/**
 * Get formatted field value for display.
 *
 * Helper function to get a formatted field value with proper escaping.
 *
 * @since 1.0.2
 *
 * @param string $field_name The field name to retrieve.
 * @param int    $post_id Optional. Post ID. Default is current post.
 * @return string The formatted field value.
 */
function get_formatted_field_value(string $field_name, int $post_id = 0): string
{
	if (! $post_id) {
		$post_id = get_the_ID();
	}

	if (! $post_id) {
		return '';
	}

	if (! function_exists('get_field')) {
		$value = get_post_meta($post_id, $field_name, true);
		return is_string($value) ? esc_html($value) : '';
	}

	$value = get_field($field_name, $post_id);

	if (is_array($value)) {
		return '';
	}

	return is_string($value) ? esc_html($value) : '';
}
