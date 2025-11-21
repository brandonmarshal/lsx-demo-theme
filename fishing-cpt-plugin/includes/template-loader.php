<?php

/**
 * Template Loader for Fishing CPT Plugin
 *
 * Provides backward compatibility for PHP templates while supporting
 * WordPress 6.7+ block templates. Ensures proper template hierarchy
 * for Fish, Gear, and Area post types.
 *
 * @package FishingCPTPlugin
 * @since 1.0.0
 */

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Load plugin templates with proper hierarchy.
 *
 * Template loading order:
 * 1. Theme HTML block templates (via block template system)
 * 2. Theme PHP templates (via locate_template)
 * 3. Plugin HTML block templates (registered via block-templates.php)
 * 4. Plugin PHP templates (fallback for non-block themes)
 *
 * This ensures maximum compatibility with both classic and block themes
 * while allowing theme overrides at every level.
 *
 * @since 1.0.0
 * @since 1.0.2 Enhanced for block template support
 *
 * @param string $template The path of the template to include.
 * @return string The filtered template path.
 */
function template_loader(string $template): string
{
	$types = array('fish', 'gear', 'area');

	// Single templates.
	if (\is_singular($types)) {
		$type      = \get_post_type();
		$single    = 'single-' . $type . '.php';

		// For fish CPT, prioritize plugin HTML template over theme templates
		if ($type === 'fish') {
			$plugin_html = FISHING_CPT_PLUGIN_DIR . 'templates/single-' . $type . '.html';
			if (file_exists($plugin_html)) {
				return $plugin_html;
			}
		}

		// Check for theme override first (PHP template).
		$theme_tpl = \locate_template(array($single));
		if ($theme_tpl) {
			return $theme_tpl;
		}

		// Check for HTML block template in theme.
		$html_template = 'single-' . $type . '.html';
		$theme_html    = \locate_template(array($html_template));
		if ($theme_html) {
			return $theme_html;
		}

		// Fallback to plugin PHP template if exists.
		$plugin_tpl = FISHING_CPT_PLUGIN_DIR . 'templates/' . $single;
		if (file_exists($plugin_tpl)) {
			return $plugin_tpl;
		}

		// Note: Plugin HTML block templates are handled by block-templates.php
		// via wp_register_block_template() and will be used automatically
		// if no theme override exists.
	}

	// Archive templates.
	foreach ($types as $type) {
		if (\is_post_type_archive($type)) {
			$archive = 'archive-' . $type . '.php';

			// Check for theme override first (PHP template).
			$theme_tpl = \locate_template(array($archive));
			if ($theme_tpl) {
				return $theme_tpl;
			}

			// Check for HTML block template in theme.
			$html_template = 'archive-' . $type . '.html';
			$theme_html    = \locate_template(array($html_template));
			if ($theme_html) {
				return $theme_html;
			}

			// Fallback to plugin PHP template if exists.
			$plugin_tpl = FISHING_CPT_PLUGIN_DIR . 'templates/' . $archive;
			if (file_exists($plugin_tpl)) {
				return $plugin_tpl;
			}

			// Note: Plugin HTML block templates are handled by block-templates.php.
		}
	}

	return $template;
}
\add_filter('template_include', __NAMESPACE__ . '\template_loader', 20);
