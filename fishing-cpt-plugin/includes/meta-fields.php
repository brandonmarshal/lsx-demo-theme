<?php

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register post meta for Fish, Gear, Areas including repeatable JSON fish facts.
 */
function register_meta_fields(): void
{
	// Fish facts JSON array stored as string (handled by ACF repeater).
	\register_post_meta('fish', 'fish_facts', [
		'single'            => true,
		'type'              => 'string',
		'show_in_rest'      => true,
		'sanitize_callback' => __NAMESPACE__ . '\sanitize_json_array',
		'auth_callback'     => __NAMESPACE__ . '\can_edit_meta',
	]);

	// ACF fields (scientific_name, water_type, average_size, bait_type, brand, gear_type, price, location, weather_conditions, catch_success)
	// are handled by ACF internally and don't need register_post_meta

	// Areas Google Maps location fields (not ACF fields, direct post meta).
	\register_post_meta('area', 'area_latitude', [
		'single'            => true,
		'type'              => 'string',
		'show_in_rest'      => true,
		'sanitize_callback' => __NAMESPACE__ . '\sanitize_latitude',
		'auth_callback'     => __NAMESPACE__ . '\can_edit_meta',
	]);

	\register_post_meta('area', 'area_longitude', [
		'single'            => true,
		'type'              => 'string',
		'show_in_rest'      => true,
		'sanitize_callback' => __NAMESPACE__ . '\sanitize_longitude',
		'auth_callback'     => __NAMESPACE__ . '\can_edit_meta',
	]);

	\register_post_meta('area', 'area_address', [
		'single'            => true,
		'type'              => 'string',
		'show_in_rest'      => true,
		'sanitize_callback' => 'sanitize_text_field',
		'auth_callback'     => __NAMESPACE__ . '\can_edit_meta',
	]);
}
\add_action('init', __NAMESPACE__ . '\register_meta_fields', 15);

function can_edit_meta(): bool
{
	return \current_user_can('edit_posts');
}

/**
 * Sanitize a JSON array string of facts.
 *
 * @param mixed $value Raw meta input.
 */
function sanitize_json_array($value): string
{
	if (is_string($value)) {
		$decoded = json_decode($value, true);
	} elseif (is_array($value)) {
		$decoded = $value;
	} else {
		$decoded = [];
	}
	if (! is_array($decoded)) {
		$decoded = [];
	}
	$clean = [];
	foreach ($decoded as $item) {
		if (is_string($item) && '' !== trim($item)) {
			$clean[] = \sanitize_text_field($item);
		}
	}
	return \wp_json_encode($clean);
}

/**
 * Sanitize latitude coordinate values.
 *
 * @since 1.0.1
 *
 * @param mixed $value Raw latitude input.
 * @return string Sanitized latitude value or empty string if invalid.
 */
function sanitize_latitude($value): string
{
	if (empty($value)) {
		return '';
	}

	// Validate that the input is numeric before conversion
	if (! is_numeric($value)) {
		return '';
	}

	// Convert to float and back to string to ensure valid numeric format
	$float_value = floatval($value);

	// Latitude must be between -90 and 90
	if ($float_value < -90 || $float_value > 90) {
		return '';
	}

	return \sanitize_text_field((string) $float_value);
}

/**
 * Sanitize longitude coordinate values.
 *
 * @since 1.0.1
 *
 * @param mixed $value Raw longitude input.
 * @return string Sanitized longitude value or empty string if invalid.
 */
function sanitize_longitude($value): string
{
	if (empty($value)) {
		return '';
	}

	// Validate that the input is numeric before conversion
	if (! is_numeric($value)) {
		return '';
	}

	// Convert to float and back to string to ensure valid numeric format
	$float_value = floatval($value);

	// Longitude must be between -180 and 180
	if ($float_value < -180 || $float_value > 180) {
		return '';
	}

	return \sanitize_text_field((string) $float_value);
}
