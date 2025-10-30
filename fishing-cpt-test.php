<?php

/**
 * Temporary test file to verify Fishing CPT Plugin is working
 *
 * Add this to your active theme's functions.php temporarily
 * Remove after testing
 */

add_action('admin_notices', function () {
	// Check if our CPTs are registered
	$post_types = get_post_types(['_builtin' => false], 'names');

	if (in_array('fish', $post_types) || in_array('gear', $post_types) || in_array('stories', $post_types)) {
		echo '<div class="notice notice-success is-dismissible">';
		echo '<p><strong>✅ Fishing CPT Plugin is working!</strong> CPTs registered: ' . implode(', ', $post_types) . '</p>';
		echo '</div>';
	} else {
		echo '<div class="notice notice-error is-dismissible">';
		echo '<p><strong>❌ Fishing CPT Plugin CPTs not found.</strong> Available CPTs: ' . implode(', ', $post_types) . '</p>';
		echo '</div>';
	}
});

// Also check if our functions exist
add_action('admin_notices', function () {
	if (function_exists('Fishing_CPT\register_fish_cpt')) {
		echo '<div class="notice notice-info is-dismissible">';
		echo '<p><strong>ℹ️ Fish CPT function exists and is loaded.</strong></p>';
		echo '</div>';
	}
});
