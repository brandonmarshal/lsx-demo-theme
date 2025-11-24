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
		'capability_type' => ['fish', 'fishes'],
		'map_meta_cap' => true,
		'template' => [
			['core/heading', ['level' => 2, 'placeholder' => \__('Species overview', 'fishing-cpt-plugin')]],
			['core/group', ['layout' => ['type' => 'constrained']], [
				['core/columns', [], [
					['core/column', [], [['core/image'], ['core/paragraph']]],
					['core/column', [], [['core/heading', ['level' => 3, 'content' => \__('Facts', 'fishing-cpt-plugin')]], ['core/list']]],
				]],
			]],
		],
		'template_lock' => 'insert',
	];
	\register_post_type('fish', $args);
}
\add_action('init', __NAMESPACE__ . '\register_fish_cpt');
