<?php

namespace Fishing_CPT;

if (! defined('ABSPATH')) {
	exit;
}

function register_query_variations(): void
{
	if (! function_exists('register_block_variation')) {
		return;
	}
	\register_block_variation('core/query', [
		'name'        => 'fishing-fish-grid',
		'title'       => \__('Fish Grid', 'fishing-cpt-plugin'),
		'description' => \__('Grid of Fish cards.', 'fishing-cpt-plugin'),
		'icon'        => 'palmtree',
		'attributes'  => ['query' => ['perPage' => 6, 'postType' => 'fish', 'order' => 'desc', 'orderBy' => 'date']],
		'innerBlocks' => [['core/post-template', [], [['fishing/fish-card']]]],
		'isActive'    => function ($attrs) {
			return ($attrs['query']['postType'] ?? '') === 'fish';
		},
	]);
	\register_block_variation('core/query', [
		'name'        => 'fishing-gear-list',
		'title'       => \__('Gear List', 'fishing-cpt-plugin'),
		'description' => \__('List of Gear items with price.', 'fishing-cpt-plugin'),
		'icon'        => 'hammer',
		'attributes'  => ['query' => ['perPage' => 8, 'postType' => 'gear', 'order' => 'desc', 'orderBy' => 'date']],
		'innerBlocks' => [['core/post-template', [], [['fishing/gear-card']]]],
		'isActive'    => function ($attrs) {
			return ($attrs['query']['postType'] ?? '') === 'gear';
		},
	]);
	\register_block_variation('core/query', [
		'name'        => 'fishing-stories-featured',
		'title'       => \__('Featured Stories', 'fishing-cpt-plugin'),
		'description' => \__('Featured recent stories with large images.', 'fishing-cpt-plugin'),
		'icon'        => 'book',
		'attributes'  => ['query' => ['perPage' => 3, 'postType' => 'stories', 'order' => 'desc', 'orderBy' => 'date']],
		'innerBlocks' => [['core/post-template', [], [['fishing/story-card']]]],
		'isActive'    => function ($attrs) {
			return ($attrs['query']['postType'] ?? '') === 'stories';
		},
	]);
}
\add_action('init', __NAMESPACE__ . '\register_query_variations');
