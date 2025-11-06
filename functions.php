<?php

/**
 * lsx-demo-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since lsx-demo-theme 1.0
 */

// Adds theme support for post formats.
if (! function_exists('lsx_demo_theme_post_format_setup')) :
	function lsx_demo_theme_post_format_setup()
	{
		add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'));
	}
endif;
add_action('after_setup_theme', 'lsx_demo_theme_post_format_setup');


// Enqueue only the main stylesheet (style.css)
if (! function_exists('lsx_demo_theme_enqueue_styles')) :
	function lsx_demo_theme_enqueue_styles()
	{
		wp_enqueue_style(
			'lsx-demo-theme-style',
			get_theme_file_uri('style.css'),
			array(),
			wp_get_theme()->get('Version')
		);
	}
endif;
add_action('wp_enqueue_scripts', 'lsx_demo_theme_enqueue_styles');

// Registers custom block styles.
if (! function_exists('lsx_demo_theme_block_styles')) :
	function lsx_demo_theme_block_styles()
	{
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __('Checkmark', 'lsx-demo-theme'),
				'inline_style' => '
					ul.is-style-checkmark-list {
						list-style-type: "\2713";
					}
					ul.is-style-checkmark-list li {
						padding-inline-start: 1ch;
					}',
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_block_styles');

// Registers pattern categories.
if (! function_exists('lsx_demo_theme_pattern_categories')) :
	function lsx_demo_theme_pattern_categories()
	{
		register_block_pattern_category(
			'lsx_demo_theme_page',
			array(
				'label'       => __('Pages', 'lsx-demo-theme'),
				'description' => __('A collection of full page layouts.', 'lsx-demo-theme'),
			)
		);

		register_block_pattern_category(
			'lsx_demo_theme_post-format',
			array(
				'label'       => __('Post formats', 'lsx-demo-theme'),
				'description' => __('A collection of post format patterns.', 'lsx-demo-theme'),
			)
		);

		register_block_pattern_category(
			'lsx_demo_theme_pricing',
			array(
				'label'       => __('Pricing', 'lsx-demo-theme'),
				'description' => __('A collection of pricing table patterns and layouts.', 'lsx-demo-theme'),
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_pattern_categories');

// Registers block binding sources.
if (! function_exists('lsx_demo_theme_register_block_bindings')) :
	function lsx_demo_theme_register_block_bindings()
	{
		register_block_bindings_source(
			'lsx-demo-theme/format',
			array(
				'label'              => _x('Post format name', 'Label for the block binding placeholder in the editor', 'lsx-demo-theme'),
				'get_value_callback' => 'lsx_demo_theme_format_binding',
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_register_block_bindings');

// Registers block binding callback function for the post format name.
if (! function_exists('lsx_demo_theme_format_binding')) :
	function lsx_demo_theme_format_binding()
	{
		$post_format_slug = get_post_format();
		if ($post_format_slug && 'standard' !== $post_format_slug) {
			return get_post_format_string($post_format_slug);
		}
	}
endif;

// Load custom post type and taxonomy registration files.
function lsx_demo_theme_load_cpt_and_tax_files()
{
	$files = array(
		'inc/cpt-fish.php',        // Restored: Keep existing posts safe
		'inc/cpt-gear.php',       // Restored: Keep existing posts safe
		'inc/cpt-area.php',       // Area CPT - replaces story
		'inc/taxonomies.php',
		'inc/seed-bass-post.php', // temporary: seeds "How to Catch a Bass" post (remove after creation)
		'inc/block-styles.php',   // Block styles for fishing section layouts
	);
	foreach ($files as $relative_path) {
		$absolute_path = get_parent_theme_file_path($relative_path);
		if (file_exists($absolute_path)) {
			require_once $absolute_path;
		}
	}
}
add_action('after_setup_theme', 'lsx_demo_theme_load_cpt_and_tax_files');
