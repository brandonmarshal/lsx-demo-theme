<?php

/**
 * Plugin Name: Fishing CPT Plugin
 * Description: Registers Fish, Gear, and Stories custom post types, meta fields, Gutenberg blocks, patterns, query variations, settings page, REST endpoints, and capabilities.
 * Version: 1.0.1
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
define('FISHING_CPT_PLUGIN_VERSION', '1.0.1');
define('FISHING_CPT_PLUGIN_FILE', __FILE__);
define('FISHING_CPT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FISHING_CPT_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Load text domain.
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
		// 'includes/cpt-fish.php',        // Disabled: Using theme CPTs instead
		// 'includes/cpt-gear.php',       // Disabled: Using theme CPTs instead
		// 'includes/cpt-stories.php',    // Disabled: Using theme CPTs instead
		'includes/meta-fields.php',      // Add meta fields to existing CPTs
		'includes/rest-api.php',
		'includes/settings-page.php',
		'includes/blocks.php',
		'includes/blocks-query-variations.php',
		'includes/patterns.php',
		'includes/template-loader.php',
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
	FishingCPTPlugin\Blocks\init();
}

/**
 * Activation hook.
 */
function fishing_cpt_activate(): void
{
	// CPTs are handled by theme, we just add capabilities and flush rules
	if (function_exists('Fishing_CPT\add_caps')) {
		Fishing_CPT\add_caps();
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
