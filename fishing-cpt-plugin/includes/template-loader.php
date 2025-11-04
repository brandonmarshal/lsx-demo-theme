<?php

namespace Fishing_CPT;

if (! defined('ABSPATH')) {
	exit;
}

function template_loader($template)
{
	$types = ['fish', 'gear', 'area'];
	// Single.
	if (\is_singular($types)) {
		$type      = \get_post_type();
		$single    = 'single-' . $type . '.php';
		$theme_tpl = \locate_template([$single]);
		if ($theme_tpl) {
			return $theme_tpl;
		}
		$plugin_tpl = FISHING_CPT_PLUGIN_DIR . 'templates/' . $single;
		if (file_exists($plugin_tpl)) {
			return $plugin_tpl;
		}
	}
	// Archive.
	foreach ($types as $type) {
		if (\is_post_type_archive($type)) {
			$archive    = 'archive-' . $type . '.php';
			$theme_tpl  = \locate_template([$archive]);
			if ($theme_tpl) {
				return $theme_tpl;
			}
			$plugin_tpl = FISHING_CPT_PLUGIN_DIR . 'templates/' . $archive;
			if (file_exists($plugin_tpl)) {
				return $plugin_tpl;
			}
		}
	}
	return $template;
}
\add_filter('template_include', __NAMESPACE__ . '\template_loader', 20);
