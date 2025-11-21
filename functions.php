<?php

/**
 * Fishing Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://github.com/lightspeedwp/.github
 *
 * @package WordPress
 * @subpackage Fishing_Theme
 * @since Fishing Theme 1.0.0
 */

// Adds theme support for post formats.
if (! function_exists('fishing_theme_post_format_setup')) :
	function fishing_theme_post_format_setup()
	{
		add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'));
	}
endif;
add_action('after_setup_theme', 'fishing_theme_post_format_setup');


// Enqueue only the main stylesheet (style.css)
if (! function_exists('fishing_theme_enqueue_styles')) :
	function fishing_theme_enqueue_styles()
	{
		// Temporarily disabled main theme CSS for testing
		/*
		wp_enqueue_style(
			'fishing-theme-style',
			get_theme_file_uri('style.css'),
			array(),
			wp_get_theme()->get('Version')
		);
		*/
	}
endif;
add_action('wp_enqueue_scripts', 'fishing_theme_enqueue_styles');

// Enqueue webpack built assets
function fishing_theme_enqueue_webpack_assets()
{
	$asset_path = get_template_directory() . '/build/';
	$style_file = 'style-index.css';
	$script_file = 'index.js';

	// Temporarily disabled SCSS/CSS loading for testing
	/*
	if (file_exists($asset_path . $style_file)) {
		wp_enqueue_style(
			'fishing-theme-main',
			get_template_directory_uri() . '/build/' . $style_file,
			array(),
			filemtime($asset_path . $style_file)
		);
	}
	*/

	if (file_exists($asset_path . $script_file)) {
		wp_enqueue_script(
			'fishing-theme-main',
			get_template_directory_uri() . '/build/' . $script_file,
			array(),
			filemtime($asset_path . $script_file),
			true
		);
	}
}
add_action('wp_enqueue_scripts', 'fishing_theme_enqueue_webpack_assets');

// Registers custom block styles.
if (! function_exists('fishing_theme_block_styles')) :
	function fishing_theme_block_styles()
	{
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __('Checkmark', 'fishing-theme'),
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
add_action('init', 'fishing_theme_block_styles');

// Registers pattern categories.
if (! function_exists('fishing_theme_pattern_categories')) :
	function fishing_theme_pattern_categories()
	{
		register_block_pattern_category(
			'fishing_theme_page',
			array(
				'label'       => __('Pages', 'fishing-theme'),
				'description' => __('A collection of full page layouts.', 'fishing-theme'),
			)
		);

		register_block_pattern_category(
			'fishing_theme_post-format',
			array(
				'label'       => __('Post formats', 'fishing-theme'),
				'description' => __('A collection of post format patterns.', 'fishing-theme'),
			)
		);

		register_block_pattern_category(
			'fishing_theme_pricing',
			array(
				'label'       => __('Pricing', 'fishing-theme'),
				'description' => __('A collection of pricing table patterns and layouts.', 'fishing-theme'),
			)
		);
	}
endif;
add_action('init', 'fishing_theme_pattern_categories');

// Registers block binding sources.
if (! function_exists('fishing_theme_register_block_bindings')) :
	function fishing_theme_register_block_bindings()
	{
		register_block_bindings_source(
			'fishing-theme/format',
			array(
				'label'              => _x('Post format name', 'Label for the block binding placeholder in the editor', 'fishing-theme'),
				'get_value_callback' => 'fishing_theme_format_binding',
			)
		);
	}
endif;
add_action('init', 'fishing_theme_register_block_bindings');

// Registers block binding callback function for the post format name.
if (! function_exists('fishing_theme_format_binding')) :
	function fishing_theme_format_binding()
	{
		$post_format_slug = get_post_format();
		if ($post_format_slug && 'standard' !== $post_format_slug) {
			return get_post_format_string($post_format_slug);
		}
	}
endif;

// Load custom post type and taxonomy registration files.
function fishing_theme_load_cpt_and_tax_files()
{
	$files = array(
		'inc/cpt-fish.php',
		'inc/cpt-gear.php',
		'inc/cpt-area.php',
		'inc/taxonomies.php',
		'inc/block-styles.php',
	);
	foreach ($files as $relative_path) {
		$absolute_path = get_parent_theme_file_path($relative_path);
		if (file_exists($absolute_path)) {
			require_once $absolute_path;
		}
	}
}
add_action('after_setup_theme', 'fishing_theme_load_cpt_and_tax_files');
