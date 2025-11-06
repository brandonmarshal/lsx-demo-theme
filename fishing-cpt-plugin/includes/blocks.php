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
	// Validate that plugin directory constant is defined
	if (! defined('FISHING_CPT_PLUGIN_DIR')) {
		return;
	}
	
	// Register blocks using block.json files from the build directory
	$blocks_dir = FISHING_CPT_PLUGIN_DIR . 'build/blocks/';
	
	// Array of block names to register
	$blocks = [
		'fish-card',
		'gear-card',
		'area-card',
		'repeatable-facts',
		'fish-facts',
		'gear-specs',
		'fishing-gallery',
	];
	
	foreach ($blocks as $block_name) {
		$block_path = $blocks_dir . $block_name;
		
		// Check if block directory exists in build folder
		if (file_exists($block_path)) {
			// Register block type from block.json with assets
			register_block_type($block_path);
		}
	}
}
