<?php

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
exit;
}

function register_areas_cpt(): void
{
$labels = [
'name' => \__('Areas', 'fishing-cpt-plugin'),
'singular_name' => \__('Area', 'fishing-cpt-plugin'),
'menu_name' => \__('Areas', 'fishing-cpt-plugin'),
];
$args = [
'labels' => $labels,
'public' => true,
'has_archive' => true,
'show_in_rest' => true,
'menu_icon' => 'dashicons-location',
'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
'rewrite' => ['slug' => 'areas'],
'capability_type' => ['area', 'areas'],
'map_meta_cap' => true,
];
\register_post_type('area', $args);
}
\add_action('init', __NAMESPACE__ . '\register_areas_cpt');
