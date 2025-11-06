<?php
/**
 * Enqueue Gallery Lightbox Assets
 *
 * Handles enqueuing of JavaScript and CSS for the fishing gallery
 * lightbox functionality on the frontend.
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 */

namespace Fishing_CPT;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue gallery lightbox scripts and styles on frontend.
 *
 * Only enqueues when fishing gallery block is present in content.
 *
 * @since 1.0.2
 *
 * @return void
 */
function enqueue_gallery_lightbox_assets(): void {
	// Only on frontend, not in admin.
	if ( is_admin() ) {
		return;
	}

	// Check if current post has the gallery block.
	global $post;
	if ( ! $post || ! has_block( 'fishing/gallery', $post ) ) {
		return;
	}

	// Enqueue lightbox JavaScript.
	wp_enqueue_script(
		'fishing-gallery-lightbox',
		FISHING_CPT_PLUGIN_URL . 'assets/js/fishing-gallery-lightbox.js',
		array(),
		FISHING_CPT_PLUGIN_VERSION,
		array( 'in_footer' => true )
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_gallery_lightbox_assets' );
