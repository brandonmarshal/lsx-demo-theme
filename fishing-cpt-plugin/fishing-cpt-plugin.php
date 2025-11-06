<?php

/**
 * Plugin Name: Fishing CPT Plugin
 * Description: Registers Fish, Gear, and Areas custom post types, meta fields, Gutenberg blocks, patterns, query variations, settings page, REST endpoints, and capabilities with bidirectional relationships.
 * Version: 1.0.2
 * Author: Brandon Marshall - LightSpeed WP
 * Text Domain: fishing-cpt-plugin
 * Domain Path: /languages
 * Requires at least: 6.8.0
 * Requires PHP: 7.4
 * Requires Plugins: advanced-custom-fields
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

/**
 * Check for required plugin dependencies.
 *
 * Verifies that Secure Custom Fields (SCF) or Advanced Custom Fields (ACF)
 * is installed and activated. If not found, displays an admin notice and
 * deactivates this plugin to prevent errors.
 *
 * @since 1.0.1
 *
 * @return void
 */
function fishing_cpt_check_dependencies(): void
{
	// Check if ACF/SCF is active by looking for common functions.
	if (! function_exists('acf') && ! function_exists('get_field') && ! class_exists('ACF')) {
		// Deactivate this plugin.
		deactivate_plugins(plugin_basename(__FILE__));

		// Display admin notice.
		add_action('admin_notices', 'fishing_cpt_dependency_notice');

		// Prevent further execution.
		return;
	}
}
add_action('plugins_loaded', 'fishing_cpt_check_dependencies', 5);

/**
 * Display admin notice for missing dependency.
 *
 * Shows an error notice in the WordPress admin when Secure Custom Fields
 * is not installed or activated. Provides clear guidance on how to resolve.
 *
 * @since 1.0.1
 *
 * @return void
 */
function fishing_cpt_dependency_notice(): void
{
	?>
	<div class="notice notice-error is-dismissible">
		<p>
			<strong><?php echo esc_html__('Fishing CPT Plugin Error:', 'fishing-cpt-plugin'); ?></strong>
			<?php
			echo esc_html__(
				'This plugin requires Secure Custom Fields (SCF) or Advanced Custom Fields (ACF) to be installed and activated. Please install and activate it to use the Fishing CPT Plugin.',
				'fishing-cpt-plugin'
			);
			?>
		</p>
		<p>
			<?php
			/* translators: %s: URL to plugins page */
			echo wp_kses_post(
				sprintf(
					esc_html__('You can install it from the %s.', 'fishing-cpt-plugin'),
					'<a href="' . esc_url(admin_url('plugin-install.php')) . '">' . esc_html__('WordPress plugin directory', 'fishing-cpt-plugin') . '</a>'
				)
			);
			?>
		</p>
	</div>
	<?php

	// No need to unset $_GET['activate']; WordPress handles the notice UX.
}

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
		// 'includes/cpt-fish.php',        // Disabled: Using theme CPTs instead
		// 'includes/cpt-gear.php',       // Disabled: Using theme CPTs instead
		'includes/meta-fields.php',      // Add meta fields to existing CPTs
		'includes/relationship-fields.php',   // ACF/SCF relationship field groups
		'includes/repeatable-fields.php',     // ACF/SCF repeatable field groups
		'includes/repeatable-fields-enqueue.php',  // Enqueue repeatable field styles
		'includes/relationship-helpers.php',  // Bidirectional relationship sync
		'includes/gallery-fields.php',        // ACF/SCF gallery field groups
		'includes/gallery-enqueue.php',       // Enqueue gallery lightbox assets
		'includes/rest-api.php',
		'includes/settings-page.php',
		'includes/google-maps-settings.php',  // Google Maps settings page
		'includes/google-maps-enqueue.php',   // Google Maps assets enqueue
		'includes/blocks.php',
		'includes/blocks-query-variations.php',
		'includes/patterns.php',
		'includes/template-loader.php',
		'includes/block-bindings.php',       // Block bindings for SCF fields
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
