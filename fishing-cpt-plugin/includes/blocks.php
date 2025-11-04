<?php

/**
 * Block Registration for Fishing CPT Plugin
 */

namespace FishingCPTPlugin\Blocks;

if (! defined('ABSPATH')) {
	exit;
}

function init()
{
	add_action('init', __NAMESPACE__ . '\register_blocks');
}

function register_blocks()
{
	// Debug: Log that we're registering blocks
	error_log('Fishing Plugin: Registering blocks');

	register_block_type('fishing/fish-card', [
		'title' => 'Fish Card',
		'description' => 'Display fish information card',
		'category' => 'widgets',
		'icon' => 'palmtree',
		'render_callback' => __NAMESPACE__ . '\render_fish_card',
	]);

	register_block_type('fishing/gear-card', [
		'title' => 'Gear Card',
		'description' => 'Display gear information card',
		'category' => 'widgets',
		'icon' => 'hammer',
		'render_callback' => __NAMESPACE__ . '\render_gear_card',
	]);

	register_block_type('fishing/area-card', [
		'title' => 'Area Card',
		'description' => 'Display area information card',
		'category' => 'widgets',
		'icon' => 'location',
		'render_callback' => __NAMESPACE__ . '\render_area_card',
	]);

	register_block_type('fishing/repeatable-facts', [
		'title' => 'Repeatable Facts',
		'description' => 'Display repeatable fish facts',
		'category' => 'widgets',
		'icon' => 'list-view',
		'render_callback' => __NAMESPACE__ . '\render_repeatable_facts',
	]);

	error_log('Fishing Plugin: Blocks registered successfully');
}

function render_fish_card($attributes, $content, $block)
{
	return '<div class="fishing-fish-card"><p>🐟 Fish Card - Plugin Working!</p></div>';
}

function render_gear_card($attributes, $content, $block)
{
	return '<div class="fishing-gear-card"><p>🎣 Gear Card - Plugin Working!</p></div>';
}

function render_area_card($attributes, $content, $block)
{
	return '<div class="fishing-area-card"><p>📍 Area Card - Plugin Working!</p></div>';
}

function render_repeatable_facts($attributes, $content, $block)
{
	return '<div class="fishing-repeatable-facts"><p>📋 Repeatable Facts - Plugin Working!</p></div>';
}
