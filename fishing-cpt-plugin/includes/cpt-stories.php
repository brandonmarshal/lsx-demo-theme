<?php

namespace Fishing_CPT;

if (! defined('ABSPATH')) {
	exit;
}

function register_stories_cpt(): void
{
	$labels = [
		'name' => __('Stories', 'fishing-cpt-plugin'),
		'singular_name' => __('Story', 'fishing-cpt-plugin'),
		'menu_name' => __('Stories', 'fishing-cpt-plugin'),
	];
	$args = [
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'show_in_rest' => true,
		'menu_icon' => 'dashicons-book',
		'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
		'rewrite' => ['slug' => 'stories'],
		'capability_type' => ['story', 'stories'],
		'map_meta_cap' => true,
	];
	register_post_type('stories', $args);
}
add_action('init', __NAMESPACE__ . '\register_stories_cpt');
