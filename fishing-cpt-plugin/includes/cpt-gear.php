<?php

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

function register_gear_cpt(): void
{
	$labels = [
		'name' => \__('Gear', 'fishing-cpt-plugin'),
		'singular_name' => \__('Gear', 'fishing-cpt-plugin'),
		'menu_name' => \__('Gear', 'fishing-cpt-plugin'),
	];
	$args = [
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-hammer',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => ['slug' => 'gear'],
		'capability_type' => ['gear', 'gear'],
		'map_meta_cap' => true,
	];
	\register_post_type('gear', $args);
}
\add_action('init', __NAMESPACE__ . '\register_gear_cpt');
