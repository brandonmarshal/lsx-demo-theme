<?php

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

function register_pattern_category(): void
{
	if (function_exists('register_block_pattern_category')) {
		\register_block_pattern_category('fishing', ['label' => \__('Fishing', 'fishing-cpt-plugin')]);
	}
}
\add_action('init', __NAMESPACE__ . '\register_pattern_category');

function register_patterns(): void
{
	if (! function_exists('register_block_pattern')) {
		return;
	}
	$patterns_dir = FISHING_CPT_PLUGIN_DIR . 'patterns/';
	$files        = glob($patterns_dir . '*.json');
	foreach ($files as $file) {
		$data = json_decode(file_get_contents($file), true);
		if (empty($data['title']) || empty($data['content'])) {
			continue;
		}
		$slug = 'fishing/' . basename($file, '.json');
		\register_block_pattern($slug, [
			'title'      => \sanitize_text_field($data['title']),
			'categories' => (array) ($data['categories'] ?? ['fishing']),
			'content'    => $data['content'],
		]);
	}
}
\add_action('init', __NAMESPACE__ . '\register_patterns', 12);
