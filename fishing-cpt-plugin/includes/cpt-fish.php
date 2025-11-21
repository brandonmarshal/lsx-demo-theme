<?php

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

function register_fish_cpt(): void
{
	$labels = [
		'name' => \__('Fish', 'fishing-cpt-plugin'),
		'singular_name' => \__('Fish', 'fishing-cpt-plugin'),
		'menu_name' => \__('Fish', 'fishing-cpt-plugin'),
		'add_new_item' => \__('Add New Fish', 'fishing-cpt-plugin'),
	];
	$args = [
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-palmtree',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => ['slug' => 'fish'],
		'capability_type' => 'post',
		'map_meta_cap' => true,
	];
	\register_post_type('fish', $args);
}
\add_action('init', __NAMESPACE__ . '\register_fish_cpt');
