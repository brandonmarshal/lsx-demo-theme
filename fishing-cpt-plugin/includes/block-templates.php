<?php
/**
 * Block Template Registration for WordPress 6.7+
 *
 * Registers fish-related block templates programmatically using
 * WordPress 6.7+ block template registration API.
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 */

namespace Fishing_CPT;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register plugin block templates.
 *
 * Registers single and archive templates for Fish CPT using the
 * WordPress 6.7+ wp_register_block_template() function. These templates
 * will appear in the Site Editor and can be customized by users.
 *
 * @since 1.0.2
 *
 * @return void
 */
function register_block_templates(): void {
	// Check if wp_register_block_template is available (WP 6.7+)
	if ( ! function_exists( 'wp_register_block_template' ) ) {
		return;
	}

	// Register single fish template.
	register_single_fish_template();

	// Register archive fish template.
	register_archive_fish_template();
}
add_action( 'init', __NAMESPACE__ . '\register_block_templates' );

/**
 * Register single fish block template.
 *
 * Registers the single fish species template with full HTML content
 * from the templates directory.
 *
 * @since 1.0.2
 *
 * @return void
 */
function register_single_fish_template(): void {
	$template_file = FISHING_CPT_PLUGIN_DIR . 'templates/single-fish.html';

	// Ensure template file exists.
	if ( ! file_exists( $template_file ) ) {
		return;
	}

	// Get template content.
	$content = file_get_contents( $template_file );

	if ( empty( $content ) ) {
		return;
	}

	// Register the block template.
	wp_register_block_template(
		'fishing-cpt-plugin//single-fish',
		array(
			'title'       => __( 'Single Fish Species', 'fishing-cpt-plugin' ),
			'description' => __( 'Template for displaying individual fish species with details, taxonomies, and related content.', 'fishing-cpt-plugin' ),
			'content'     => $content,
			'post_types'  => array( 'fish' ),
		)
	);
}

/**
 * Register archive fish block template.
 *
 * Registers the fish archive/listing template with full HTML content
 * from the templates directory.
 *
 * @since 1.0.2
 *
 * @return void
 */
function register_archive_fish_template(): void {
	$template_file = FISHING_CPT_PLUGIN_DIR . 'templates/archive-fish.html';

	// Ensure template file exists.
	if ( ! file_exists( $template_file ) ) {
		return;
	}

	// Get template content.
	$content = file_get_contents( $template_file );

	if ( empty( $content ) ) {
		return;
	}

	// Register the block template.
	wp_register_block_template(
		'fishing-cpt-plugin//archive-fish',
		array(
			'title'       => __( 'Fish Species Archive', 'fishing-cpt-plugin' ),
			'description' => __( 'Archive template for fish species listings with filtering and grid display.', 'fishing-cpt-plugin' ),
			'content'     => $content,
			'post_types'  => array( 'fish' ),
		)
	);
}

/**
 * Add plugin templates to template hierarchy.
 *
 * Ensures that block templates registered by the plugin are included
 * in the template hierarchy and can be overridden by the theme.
 *
 * @since 1.0.2
 *
 * @param array $templates Array of template files.
 * @return array Modified template array.
 */
function add_plugin_templates_to_hierarchy( array $templates ): array {
	// Add plugin namespace to templates for Fish CPT.
	if ( is_singular( 'fish' ) ) {
		array_unshift( $templates, 'fishing-cpt-plugin//single-fish' );
	}

	if ( is_post_type_archive( 'fish' ) ) {
		array_unshift( $templates, 'fishing-cpt-plugin//archive-fish' );
	}

	return $templates;
}
add_filter( 'block_template_hierarchy', __NAMESPACE__ . '\add_plugin_templates_to_hierarchy' );
