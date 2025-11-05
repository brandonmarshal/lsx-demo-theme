<?php
/**
 * Enqueue assets for repeatable field display on single CPT pages.
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 */

namespace Fishing_CPT;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue repeatable fields CSS for single Fish and Gear posts.
 *
 * Conditionally loads the stylesheet only on single Fish or Gear post pages
 * to optimize performance and avoid unnecessary asset loading.
 *
 * @since 1.0.2
 *
 * @return void
 */
function enqueue_repeatable_fields_assets(): void {
	// Only load on single Fish or Gear posts.
	if ( ! is_singular( array( 'fish', 'gear' ) ) ) {
		return;
	}

	// Enqueue repeatable fields CSS.
	wp_enqueue_style(
		'fishing-repeatable-fields',
		FISHING_CPT_PLUGIN_URL . 'assets/css/repeatable-fields.css',
		array(),
		FISHING_CPT_PLUGIN_VERSION
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_repeatable_fields_assets' );
