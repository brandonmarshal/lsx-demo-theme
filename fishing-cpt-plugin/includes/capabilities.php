<?php

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Add custom capabilities for our CPTs.
 */
function add_caps(): void
{
	$roles = ['administrator', 'editor'];
	$cpts  = ['fish', 'gear', 'area'];
	foreach ($roles as $role_name) {
		$role = \get_role($role_name);
		if (! $role) {
			continue;
		}
		foreach ($cpts as $cpt) {
			// Handle special cases for capability types
			if ($cpt === 'fish') {
				$singular = 'fish';
				$plural = 'fishes';
			} elseif ($cpt === 'gear') {
				$singular = 'gear_item';
				$plural = 'gear_items';
			} elseif ($cpt === 'area') {
				$singular = 'area';
				$plural = 'areas';
			} else {
				$singular = $cpt;
				$plural = $cpt . 's'; // fallback
			}

			$caps = [
				"edit_{$singular}",
				"read_{$singular}",
				"delete_{$singular}",
				"edit_{$plural}",
				"edit_others_{$plural}",
				"publish_{$plural}",
				"read_private_{$plural}",
				"delete_{$plural}",
				"delete_private_{$plural}",
			];
			foreach ($caps as $cap) {
				$role->add_cap($cap);
			}
		}
	}
}
\add_action('init', __NAMESPACE__ . '\add_caps');
