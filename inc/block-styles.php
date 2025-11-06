<?php
/**
 * Block Styles Registration
 *
 * Registers custom block style variations for fishing section layouts.
 * These styles enable customizable background, padding, and typography options
 * for homepage and archive sections.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register fishing section block styles.
 *
 * Registers block style variations for core/group and core/columns blocks
 * to support hero sections, gallery layouts, and archive grids with
 * customizable styling options.
 *
 * @since 1.0.0
 *
 * @return void
 */
function lsx_demo_theme_register_fishing_section_styles() {
	// Register fishing hero section style for core/group.
	register_block_style(
		'core/group',
		array(
			'name'  => 'fishing-hero',
			'label' => __( 'Fishing Hero Section', 'lsx-demo-theme' ),
		)
	);

	// Register gallery section style for core/group.
	register_block_style(
		'core/group',
		array(
			'name'  => 'fishing-gallery-section',
			'label' => __( 'Gallery Section', 'lsx-demo-theme' ),
		)
	);

	// Register archive grid layout style for core/columns.
	register_block_style(
		'core/columns',
		array(
			'name'  => 'fishing-archive-grid',
			'label' => __( 'Archive Grid Layout', 'lsx-demo-theme' ),
		)
	);
}
add_action( 'init', 'lsx_demo_theme_register_fishing_section_styles' );
