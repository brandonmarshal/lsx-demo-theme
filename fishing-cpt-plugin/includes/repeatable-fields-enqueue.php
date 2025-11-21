<?php

/**
 * Enqueue assets for single CPT pages.
 *
 * @package FishingCPTPlugin
 * @since 1.0.2
 */

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Enqueue styles for single Fish, Gear, and Area posts.
 *
 * Conditionally loads the stylesheet only on single CPT pages
 * to optimize performance and avoid unnecessary asset loading.
 *
 * @since 1.0.2
 *
 * @return void
 */
function enqueue_single_cpt_assets(): void
{
	// Only load on single Fish, Gear, or Area posts.
	if (! \is_singular(array('fish', 'gear', 'area'))) {
		return;
	}

	// Enqueue single CPT styles (compiled from SCSS).
	\wp_enqueue_style(
		'fishing-single-cpt',
		FISHING_CPT_PLUGIN_URL . 'build/single-fish.css',
		array(),
		FISHING_CPT_PLUGIN_VERSION
	);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_single_cpt_assets');
