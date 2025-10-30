<?php

/**
 * Temporary debug script to check block registration
 *
 * Add this to your WordPress site temporarily to debug
 * Remove after testing
 */

// Add this to functions.php temporarily or create as a mu-plugin
add_action('wp_loaded', function () {
	if (is_admin()) {
		$registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

		$fishing_blocks = [];
		foreach ($registered_blocks as $block_name => $block_type) {
			if (strpos($block_name, 'fishing/') === 0) {
				$fishing_blocks[] = $block_name;
			}
		}

		if (!empty($fishing_blocks)) {
			add_action('admin_notices', function () use ($fishing_blocks) {
				echo '<div class="notice notice-success"><p><strong>Fishing Blocks Found:</strong> ' . implode(', ', $fishing_blocks) . '</p></div>';
			});
		} else {
			add_action('admin_notices', function () {
				echo '<div class="notice notice-error"><p><strong>No Fishing Blocks Found!</strong> Check block registration.</p></div>';
			});
		}
	}
});
