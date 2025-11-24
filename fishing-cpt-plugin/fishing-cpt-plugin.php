<?php

/**
 * Plugin Name: Fishing CPT Plugin
 * Description: Registers Fish, Gear, and Areas custom post types with custom meta fields, Gutenberg blocks, patterns, query variations, settings page, REST endpoints, and capabilities with bidirectional relationships.
 * Version: 1.0.2
 * Author: Brandon Marshall - LightSpeed WP
 * Text Domain: fishing-cpt-plugin
 * Domain Path: /languages
 * Requires at least: 6.8.0
 * Requires PHP: 7.4
 * License: GPL-2.0-or-later
 */
if (! defined('ABSPATH')) {
	exit;
}

// Constants.
define('FISHING_CPT_PLUGIN_VERSION', '1.0.2');
define('FISHING_CPT_PLUGIN_FILE', __FILE__);
define('FISHING_CPT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FISHING_CPT_PLUGIN_URL', plugin_dir_url(__FILE__));

// Use statements for namespaced functions
use function FishingCPTPlugin\add_caps;
use function FishingCPTPlugin\Blocks\init;

/**
 * Load text domain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function fishing_cpt_load_textdomain(): void
{
	load_plugin_textdomain('fishing-cpt-plugin', false, basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'fishing_cpt_load_textdomain');

/**
 * Includes list.
 */
function fishing_cpt_includes(): void
{
	$files = [
		'includes/capabilities.php',
		'includes/cpt-fish.php',        // Plugin registers its own Fish CPT
		'includes/cpt-gear.php',       // Plugin registers its own Gear CPT
		'includes/cpt-areas.php',      // Plugin registers its own Areas CPT
		'includes/meta-boxes.php',     // Standard WordPress meta boxes for all CPTs
		'includes/taxonomies.php',     // Taxonomies for relationships between CPTs
		'includes/meta-fields.php',    // Post meta registration for all fields
		'includes/rest-api.php',
		'includes/settings-page.php',
		'includes/google-maps-settings.php',  // Google Maps settings page
		'includes/google-maps-enqueue.php',   // Google Maps assets enqueue
		'includes/blocks.php',
		'includes/blocks-query-variations.php',
		'includes/patterns.php',
		'includes/template-loader.php',
		'includes/block-templates.php',      // WP 6.7+ block template registration
	];
	foreach ($files as $rel) {
		$path = FISHING_CPT_PLUGIN_DIR . $rel;
		if (file_exists($path)) {
			require_once $path;
		}
	}
}
fishing_cpt_includes();

// Initialize blocks functionality
if (function_exists('FishingCPTPlugin\Blocks\init')) {
	init();
}

/**
 * Activation hook.
 */
function fishing_cpt_activate(): void
{
	// Register CPTs on activation
	if (function_exists('FishingCPTPlugin\register_fish_cpt')) {
		FishingCPTPlugin\register_fish_cpt();
	}
	if (function_exists('FishingCPTPlugin\register_gear_cpt')) {
		FishingCPTPlugin\register_gear_cpt();
	}
	if (function_exists('FishingCPTPlugin\register_areas_cpt')) {
		FishingCPTPlugin\register_areas_cpt();
	}

	// Add capabilities and flush rules
	if (function_exists('FishingCPTPlugin\add_caps')) {
		add_caps();
	}
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'fishing_cpt_activate');

/**
 * Deactivation hook.
 */
function fishing_cpt_deactivate(): void
{
	flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'fishing_cpt_deactivate');

/**
 * Uninstall cleanup (handled in uninstall.php).
 */
function fishing_cpt_uninstall(): void
{
	delete_option('fishing_cpt_settings');
}
register_uninstall_hook(__FILE__, 'fishing_cpt_uninstall');
