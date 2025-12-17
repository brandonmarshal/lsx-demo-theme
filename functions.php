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

// Load theme text domain for translations
if (! function_exists('fishing_theme_load_textdomain')) :
	function fishing_theme_load_textdomain()
	{
		load_theme_textdomain('fishing-theme', get_template_directory() . '/languages');
	}
endif;
add_action('after_setup_theme', 'fishing_theme_load_textdomain');

// Add theme support for block patterns
add_theme_support('block-patterns');


// Enqueue only the main stylesheet (style.css)
if (! function_exists('fishing_theme_enqueue_styles')) :
	function fishing_theme_enqueue_styles()
	{
		wp_enqueue_style(
			'fishing-theme-style',
			get_theme_file_uri('style.css'),
			array(),
			wp_get_theme()->get('Version')
		);
	}
endif;
add_action('wp_enqueue_scripts', 'fishing_theme_enqueue_styles');

// Enqueue webpack built assets
function fishing_theme_enqueue_webpack_assets()
{
	$asset_path = get_template_directory() . '/build/';
	$style_file = 'style-index.css';
	$script_file = 'index.js';

	if (file_exists($asset_path . $style_file)) {
		wp_enqueue_style(
			'fishing-theme-main',
			get_template_directory_uri() . '/build/' . $style_file,
			array(),
			filemtime($asset_path . $style_file)
		);
	}

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

// Enqueue styles for the block editor
function fishing_theme_enqueue_block_editor_assets()
{
	$asset_path = get_template_directory() . '/build/';
	$style_file = 'style-index.css';

	if (file_exists($asset_path . $style_file)) {
		wp_enqueue_style(
			'fishing-theme-editor',
			get_template_directory_uri() . '/build/' . $style_file,
			array(),
			filemtime($asset_path . $style_file)
		);
	}
}
add_action('enqueue_block_editor_assets', 'fishing_theme_enqueue_block_editor_assets');

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

// Register specific patterns
function fishing_theme_register_patterns()
{
	register_block_pattern(
		'fishing-theme/connected-info',
		array(
			'title'       => __('Connected Information Section', 'fishing-theme'),
			'description' => __('Section with headline and three premium cards for Fish, Gear, and Area CPTs, including icons, manual counters, and CTAs.', 'fishing-theme'),
			'categories'  => array('fishing_theme_page', 'featured'),
			'keywords'    => array('fishing', 'connected', 'cards', 'cpt', 'species', 'gear', 'areas'),
			'viewportWidth' => 1600,
			'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5rem","bottom":"5rem","left":"3rem","right":"3rem"}}},"backgroundColor":"black","textColor":"white","className":"connected-info-section"} -->
<div class="wp-block-group alignfull has-white-color has-black-background-color has-text-color has-background connected-info-section">
	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"2.5rem"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"3.5rem","fontWeight":"900","textTransform":"uppercase","letterSpacing":"0.05em"}}} -->
		<h2 class="wp-block-heading has-text-align-center" style="font-size:3.5rem;font-weight:900;letter-spacing:0.05em;text-transform:uppercase">EVERYTHING YOU NEED, CONNECTED.</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.4rem"}}} -->
		<p class="has-text-align-center" style="font-size:1.4rem">We connect fragmented fishing information into one clear system for smarter angling.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"4rem","bottom":"3rem"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2.5rem","right":"2.5rem"},"blockGap":"2rem"},"border":{"radius":"16px"}},"backgroundColor":"surface","className":"connected-card"} -->
			<div class="wp-block-group connected-card has-surface-background-color has-background" style="border-radius:16px;padding-top:4rem;padding-right:2.5rem;padding-bottom:4rem;padding-left:2.5rem">
				<!-- wp:image {"align":"center","width":"140px","height":"140px","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://thumbs.dreamstime.com/b/fish-outline-shape-icon-vector-illustration-150315746.jpg" alt="Fish Icon" style="width:140px;height:140px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2.2rem","fontWeight":"800"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:2.2rem;font-weight:800">FISH</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Recommended species info, techniques, and proven catches.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","className":"manual-counter"} -->
				<p class="has-text-align-center manual-counter has-accent-color has-text-color" style="font-size:3rem;font-weight:900">42<br>Species</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"border":{"radius":"6px"},"typography":{"textTransform":"uppercase"}},"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:6px;text-transform:uppercase">EXPLORE FISH</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2.5rem","right":"2.5rem"},"blockGap":"2rem"},"border":{"radius":"16px"}},"backgroundColor":"surface","className":"connected-card"} -->
			<div class="wp-block-group connected-card has-surface-background-color has-background" style="border-radius:16px;padding-top:4rem;padding-right:2.5rem;padding-bottom:4rem;padding-left:2.5rem">
				<!-- wp:image {"align":"center","width":"140px","height":"140px","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://www.shutterstock.com/image-vector/vector-illustration-fishing-rod-reel-260nw-2633515855.jpg" alt="Gear Icon" style="width:140px;height:140px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2.2rem","fontWeight":"800"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:2.2rem;font-weight:800">GEAR</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">One-line recommendations based on species, conditions, not sales.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","className":"manual-counter"} -->
				<p class="has-text-align-center manual-counter has-accent-color has-text-color" style="font-size:3rem;font-weight:900">128<br>Recommendations</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"border":{"radius":"6px"},"typography":{"textTransform":"uppercase"}},"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:6px;text-transform:uppercase">BROWSE GEAR</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2.5rem","right":"2.5rem"},"blockGap":"2rem"},"border":{"radius":"16px"}},"backgroundColor":"surface","className":"connected-card"} -->
			<div class="wp-block-group connected-card has-surface-background-color has-background" style="border-radius:16px;padding-top:4rem;padding-right:2.5rem;padding-bottom:4rem;padding-left:2.5rem">
				<!-- wp:image {"align":"center","width":"140px","height":"140px","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image aligncenter size-full is-resized"><img src="https://thumbs.dreamstime.com/b/fish-shape-pin-map-location-logo-symbol-vector-icon-illustration-graphic-design-220300417.jpg" alt="Area Icon" style="width:140px;height:140px" /></figure>
				<!-- /wp:image -->

				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2.2rem","fontWeight":"800"}}} -->
				<h3 class="wp-block-heading has-text-align-center" style="font-size:2.2rem;font-weight:800">AREA</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">The best locations in the region.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"3rem","fontWeight":"900"},"elements":{"link":{"color":{"text":"var:preset|color|accent"}}}},"textColor":"accent","className":"manual-counter"} -->
				<p class="has-text-align-center manual-counter has-accent-color has-text-color" style="font-size:3rem;font-weight:900">35<br>Areas</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
				<div class="wp-block-buttons">
					<!-- wp:button {"style":{"border":{"radius":"6px"},"typography":{"textTransform":"uppercase"}},"className":"is-style-outline"} -->
					<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:6px;text-transform:uppercase">BROWSE AREAS</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->',
		)
	);
}
add_action('init', 'fishing_theme_register_patterns');

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

// Register block bindings for CPT counts
if (! function_exists('fishing_theme_register_cpt_count_bindings')) :
	function fishing_theme_register_cpt_count_bindings()
	{
		// Fish species count
		register_block_bindings_source(
			'fishing-theme/fish-count',
			array(
				'label'              => _x('Fish Species Count', 'Label for the block binding placeholder in the editor', 'fishing-theme'),
				'get_value_callback' => 'fishing_theme_get_fish_count',
			)
		);

		// Gear items count
		register_block_bindings_source(
			'fishing-theme/gear-count',
			array(
				'label'              => _x('Gear Items Count', 'Label for the block binding placeholder in the editor', 'fishing-theme'),
				'get_value_callback' => 'fishing_theme_get_gear_count',
			)
		);

		// Fishing areas count
		register_block_bindings_source(
			'fishing-theme/area-count',
			array(
				'label'              => _x('Fishing Areas Count', 'Label for the block binding placeholder in the editor', 'fishing-theme'),
				'get_value_callback' => 'fishing_theme_get_area_count',
			)
		);
	}
endif;
add_action('init', 'fishing_theme_register_cpt_count_bindings', 5);

// Filter pattern content to make counts dynamic
function fishing_theme_filter_pattern_content($content, $block)
{
	if (isset($block['blockName']) && $block['blockName'] === 'core/pattern' && isset($block['attrs']['slug']) && $block['attrs']['slug'] === 'fishing-theme/connected-info') {
		$fish_count = fishing_theme_get_fish_count();
		$gear_count = fishing_theme_get_gear_count();
		$area_count = fishing_theme_get_area_count();

		// Replace static counts with dynamic ones
		$content = str_replace('42<br>Species', $fish_count . '<br>Species', $content);
		$content = str_replace('128<br>Items', $gear_count . '<br>Items', $content);
		$content = str_replace('35<br>Areas', $area_count . '<br>Areas', $content);
	}
	return $content;
}
add_filter('render_block', 'fishing_theme_filter_pattern_content', 10, 2);

// Callback functions for CPT counts
if (! function_exists('fishing_theme_get_fish_count')) :
	function fishing_theme_get_fish_count()
	{
		$count = wp_count_posts('fish'); // Fish CPT slug
		return isset($count->publish) ? $count->publish : 0;
	}
endif;

if (! function_exists('fishing_theme_get_gear_count')) :
	function fishing_theme_get_gear_count()
	{
		$count = wp_count_posts('gear'); // Gear CPT slug
		return isset($count->publish) ? $count->publish : 0;
	}
endif;

if (! function_exists('fishing_theme_get_area_count')) :
	function fishing_theme_get_area_count()
	{
		$count = wp_count_posts('area'); // Area CPT slug
		return isset($count->publish) ? $count->publish : 0;
	}
endif;

// Load custom post type and taxonomy registration files.
function fishing_theme_load_cpt_and_tax_files()
{
	$files = array(
		'inc/block-styles.php',
		'fishing-cpt-plugin/includes/capabilities.php',
		'fishing-cpt-plugin/includes/cpt-fish.php',
		'fishing-cpt-plugin/includes/cpt-gear.php',
		'fishing-cpt-plugin/includes/cpt-areas.php',
		'fishing-cpt-plugin/includes/meta-boxes.php',
		'fishing-cpt-plugin/includes/relationships.php',
		'fishing-cpt-plugin/includes/rest-api.php',
		'fishing-cpt-plugin/includes/settings.php',
		'fishing-cpt-plugin/includes/Blocks/init.php',
	);
	foreach ($files as $relative_path) {
		$absolute_path = get_parent_theme_file_path($relative_path);
		if (file_exists($absolute_path)) {
			require_once $absolute_path;
			error_log("Loaded: " . $relative_path);
		} else {
			error_log("Failed to load: " . $relative_path);
		}
	}
}
add_action('init', 'fishing_theme_load_cpt_and_tax_files', 1);
