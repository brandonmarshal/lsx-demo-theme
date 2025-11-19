<?php
/**
 * Enqueue Gallery Lightbox Assets
 *
 * Handles enqueuing of JavaScript and CSS for the fishing gallery
 * lightbox functionality on the frontend.
 *
 * @package FishingCPTPlugin
 * @since 1.0.2
 */

namespace FishingCPTPlugin;

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

	// Only proceed on singular post/page and if the post has the gallery block.
	if ( ! is_singular() ) {
		return;
	}

	$post = get_post();
	if ( ! $post || ! has_block( 'fishing/gallery', $post ) ) {
		return;
	}

	// Check if any gallery block has lightbox enabled before enqueuing.
	$has_lightbox_enabled = false;
	
	// Parse blocks to check for lightbox attribute.
	if ( has_blocks( $post->post_content ) ) {
		$blocks = parse_blocks( $post->post_content );
		foreach ( $blocks as $block ) {
			if ( 'fishing/gallery' === $block['blockName'] ) {
				// Check if lightbox is enabled (default is true).
				$lightbox = $block['attrs']['lightbox'] ?? true;
				if ( $lightbox ) {
					$has_lightbox_enabled = true;
					break;
				}
			}
		}
	}

	// Only enqueue lightbox JavaScript if at least one gallery has lightbox enabled.
	if ( $has_lightbox_enabled ) {
		wp_enqueue_script(
			'fishing-gallery-lightbox',
			FISHING_CPT_PLUGIN_URL . 'assets/js/fishing-gallery-lightbox.js',
			array(),
			FISHING_CPT_PLUGIN_VERSION,
			array( 'in_footer' => true )
		);
	}
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_gallery_lightbox_assets' );
