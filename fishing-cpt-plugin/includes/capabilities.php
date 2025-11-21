<?php

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Add capabilities for our CPTs.
 *
 * Since we're using standard 'post' capability types, standard WordPress roles
 * (administrator, editor, author, contributor) will have appropriate permissions.
 * This function ensures administrators and editors have full access to our CPTs.
 */
function add_caps(): void
{
	// Using standard 'post' capabilities, so standard roles should work
	// This function is kept for future extensibility if needed
}
