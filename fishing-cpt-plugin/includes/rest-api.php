<?php

namespace Fishing_CPT;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register simple REST routes.
 */
function register_rest_routes(): void
{
	\register_rest_route('fishing/v1', '/fish/(?P<id>\\d+)/facts', [
		'methods'             => 'GET',
		'callback'            => __NAMESPACE__ . '\rest_get_fish_facts',
		'permission_callback' => '__return_true',
		'args'                => ['id' => ['validate_callback' => 'absint']],
	]);
}
\add_action('rest_api_init', __NAMESPACE__ . '\register_rest_routes');

function rest_get_fish_facts($request)
{
	$id = (int) $request['id'];
	if ('fish' !== \get_post_type($id)) {
		return new \WP_Error('invalid_fish', \__('Invalid fish ID.', 'fishing-cpt-plugin'), ['status' => 404]);
	}
	$json  = \get_post_meta($id, 'fish_facts', true);
	$facts = json_decode($json, true);
	if (! is_array($facts)) {
		$facts = [];
	}
	return ['id' => $id, 'facts' => array_map('sanitize_text_field', $facts)];
}
