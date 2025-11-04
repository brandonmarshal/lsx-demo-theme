<?php

namespace Fishing_CPT;

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
		$role = get_role($role_name);
		if (! $role) {
			continue;
		}
		foreach ($cpts as $cpt) {
			$plural = $cpt === 'fish' ? 'fishes' : ($cpt === 'area' ? 'areas' : $cpt); // simple pluralization.
			$caps = [
				"edit_{$cpt}",
				"read_{$cpt}",
				"delete_{$cpt}",
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
add_action('init', __NAMESPACE__ . '\add_caps');
