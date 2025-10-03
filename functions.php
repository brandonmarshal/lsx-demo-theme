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
	/**
	 * Adds theme support for post formats.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_post_format_setup()
	{
		add_theme_support('post-formats', array('aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'));
	}
endif;
add_action('after_setup_theme', 'lsx_demo_theme_post_format_setup');

// Enqueues editor-style.css in the editors.
if (! function_exists('lsx_demo_theme_editor_style')) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_editor_style()
	{
		add_editor_style(get_parent_theme_file_uri('assets/css/editor-style.css'));
	}
endif;
add_action('after_setup_theme', 'lsx_demo_theme_editor_style');

// Enqueues style.css on the front.
if (! function_exists('lsx_demo_theme_enqueue_styles')) :
	/**
	 * Enqueues style.css on the front.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_enqueue_styles()
	{
		wp_enqueue_style(
			'lsx-demo-theme-style',
			get_parent_theme_file_uri('style.css'),
			array(),
			wp_get_theme()->get('Version')
		);
	}
endif;
add_action('wp_enqueue_scripts', 'lsx_demo_theme_enqueue_styles');

// Registers custom block styles.
if (! function_exists('lsx_demo_theme_block_styles')) :
	/**
	 * Registers custom block styles.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
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
	/**
	 * Registers pattern categories.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
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

		register_block_pattern_category(
			'lsx_demo_theme_fish',
			array(
				'label'       => __('Fish', 'lsx-demo-theme'),
				'description' => __('A collection of patterns for fish species and fishing content.', 'lsx-demo-theme'),
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_pattern_categories');

// Registers Fish Custom Post Type and taxonomies.
if (! function_exists('lsx_demo_theme_register_fish_cpt')) :
	/**
	 * Registers the Fish Custom Post Type and related taxonomies.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_register_fish_cpt()
	{
		// Register Fish Species taxonomy
		$species_labels = array(
			'name'                       => _x('Species Categories', 'taxonomy general name', 'lsx-demo-theme'),
			'singular_name'              => _x('Species Category', 'taxonomy singular name', 'lsx-demo-theme'),
			'menu_name'                  => __('Species Categories', 'lsx-demo-theme'),
			'all_items'                  => __('All Species Categories', 'lsx-demo-theme'),
			'parent_item'                => __('Parent Species Category', 'lsx-demo-theme'),
			'parent_item_colon'          => __('Parent Species Category:', 'lsx-demo-theme'),
			'new_item_name'              => __('New Species Category Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Species Category', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Species Category', 'lsx-demo-theme'),
			'update_item'                => __('Update Species Category', 'lsx-demo-theme'),
			'view_item'                  => __('View Species Category', 'lsx-demo-theme'),
			'separate_items_with_commas' => __('Separate species categories with commas', 'lsx-demo-theme'),
			'add_or_remove_items'        => __('Add or remove species categories', 'lsx-demo-theme'),
			'choose_from_most_used'      => __('Choose from the most used', 'lsx-demo-theme'),
			'popular_items'              => __('Popular Species Categories', 'lsx-demo-theme'),
			'search_items'               => __('Search Species Categories', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No species categories', 'lsx-demo-theme'),
			'items_list'                 => __('Species categories list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Species categories list navigation', 'lsx-demo-theme'),
		);

		register_taxonomy(
			'species',
			array('fish'),
			array(
				'labels'            => $species_labels,
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
				'show_in_rest'      => true,
				'rewrite'           => array('slug' => 'fish-species'),
			)
		);

		// Register Location taxonomy
		$location_labels = array(
			'name'                       => _x('Locations', 'taxonomy general name', 'lsx-demo-theme'),
			'singular_name'              => _x('Location', 'taxonomy singular name', 'lsx-demo-theme'),
			'menu_name'                  => __('Locations', 'lsx-demo-theme'),
			'all_items'                  => __('All Locations', 'lsx-demo-theme'),
			'parent_item'                => __('Parent Location', 'lsx-demo-theme'),
			'parent_item_colon'          => __('Parent Location:', 'lsx-demo-theme'),
			'new_item_name'              => __('New Location Name', 'lsx-demo-theme'),
			'add_new_item'               => __('Add New Location', 'lsx-demo-theme'),
			'edit_item'                  => __('Edit Location', 'lsx-demo-theme'),
			'update_item'                => __('Update Location', 'lsx-demo-theme'),
			'view_item'                  => __('View Location', 'lsx-demo-theme'),
			'separate_items_with_commas' => __('Separate locations with commas', 'lsx-demo-theme'),
			'add_or_remove_items'        => __('Add or remove locations', 'lsx-demo-theme'),
			'choose_from_most_used'      => __('Choose from the most used', 'lsx-demo-theme'),
			'popular_items'              => __('Popular Locations', 'lsx-demo-theme'),
			'search_items'               => __('Search Locations', 'lsx-demo-theme'),
			'not_found'                  => __('Not Found', 'lsx-demo-theme'),
			'no_terms'                   => __('No locations', 'lsx-demo-theme'),
			'items_list'                 => __('Locations list', 'lsx-demo-theme'),
			'items_list_navigation'      => __('Locations list navigation', 'lsx-demo-theme'),
		);

		register_taxonomy(
			'location',
			array('fish'),
			array(
				'labels'            => $location_labels,
				'hierarchical'      => false,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
				'show_in_rest'      => true,
				'rewrite'           => array('slug' => 'fishing-location'),
			)
		);

		// Register Fish Custom Post Type
		$fish_labels = array(
			'name'                  => _x('Fish Species', 'Post Type General Name', 'lsx-demo-theme'),
			'singular_name'         => _x('Fish Species', 'Post Type Singular Name', 'lsx-demo-theme'),
			'menu_name'             => __('Fish Species', 'lsx-demo-theme'),
			'name_admin_bar'        => __('Fish Species', 'lsx-demo-theme'),
			'archives'              => __('Fish Archives', 'lsx-demo-theme'),
			'attributes'            => __('Fish Attributes', 'lsx-demo-theme'),
			'parent_item_colon'     => __('Parent Fish:', 'lsx-demo-theme'),
			'all_items'             => __('All Fish Species', 'lsx-demo-theme'),
			'add_new_item'          => __('Add New Fish Species', 'lsx-demo-theme'),
			'add_new'               => __('Add New', 'lsx-demo-theme'),
			'new_item'              => __('New Fish Species', 'lsx-demo-theme'),
			'edit_item'             => __('Edit Fish Species', 'lsx-demo-theme'),
			'update_item'           => __('Update Fish Species', 'lsx-demo-theme'),
			'view_item'             => __('View Fish Species', 'lsx-demo-theme'),
			'view_items'            => __('View Fish Species', 'lsx-demo-theme'),
			'search_items'          => __('Search Fish Species', 'lsx-demo-theme'),
			'not_found'             => __('Not found', 'lsx-demo-theme'),
			'not_found_in_trash'    => __('Not found in Trash', 'lsx-demo-theme'),
			'featured_image'        => __('Fish Image', 'lsx-demo-theme'),
			'set_featured_image'    => __('Set fish image', 'lsx-demo-theme'),
			'remove_featured_image' => __('Remove fish image', 'lsx-demo-theme'),
			'use_featured_image'    => __('Use as fish image', 'lsx-demo-theme'),
			'insert_into_item'      => __('Insert into fish species', 'lsx-demo-theme'),
			'uploaded_to_this_item' => __('Uploaded to this fish species', 'lsx-demo-theme'),
			'items_list'            => __('Fish species list', 'lsx-demo-theme'),
			'items_list_navigation' => __('Fish species list navigation', 'lsx-demo-theme'),
			'filter_items_list'     => __('Filter fish species list', 'lsx-demo-theme'),
		);

		register_post_type(
			'fish',
			array(
				'label'                 => __('Fish Species', 'lsx-demo-theme'),
				'description'           => __('Fish species profiles and information', 'lsx-demo-theme'),
				'labels'                => $fish_labels,
				'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
				'taxonomies'            => array('species', 'location'),
				'hierarchical'          => false,
				'public'                => true,
				'show_ui'               => true,
				'show_in_menu'          => true,
				'menu_position'         => 5,
				'menu_icon'             => 'dashicons-pets',
				'show_in_admin_bar'     => true,
				'show_in_nav_menus'     => true,
				'can_export'            => true,
				'has_archive'           => true,
				'exclude_from_search'   => false,
				'publicly_queryable'    => true,
				'capability_type'       => 'post',
				'show_in_rest'          => true,
				'rewrite'               => array('slug' => 'fish'),
			)
		);
	}
endif;
add_action('init', 'lsx_demo_theme_register_fish_cpt');

// Registers block binding sources.
if (! function_exists('lsx_demo_theme_register_block_bindings')) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
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
	/**
	 * Callback function for the post format name block binding source.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return string|void Post format name, or nothing if the format is 'standard'.
	 */
	function lsx_demo_theme_format_binding()
	{
		$post_format_slug = get_post_format();

		if ($post_format_slug && 'standard' !== $post_format_slug) {
			return get_post_format_string($post_format_slug);
		}
	}
endif;

// Demo content import for Fish CPT and Blog Posts.
if (! function_exists('lsx_demo_theme_import_demo_content')) :
	/**
	 * Imports demo content for Fish CPT and Blog Posts.
	 * This function runs once when the theme is activated.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_import_demo_content()
	{
		// Check if demo content has already been imported
		if (get_option('lsx_demo_theme_demo_imported')) {
			return;
		}

		// Import Fish Species Taxonomies
		lsx_demo_theme_import_fish_taxonomies();

		// Import Fish Species
		lsx_demo_theme_import_fish_species();

		// Import Blog Categories and Tags
		lsx_demo_theme_import_blog_taxonomies();

		// Import Blog Posts
		lsx_demo_theme_import_blog_posts();

		// Create Contact Page
		lsx_demo_theme_create_contact_page();

		// Mark demo content as imported
		update_option('lsx_demo_theme_demo_imported', true);
	}
endif;

/**
 * Import Fish Species Taxonomies.
 *
 * @since lsx-demo-theme 1.0
 *
 * @return void
 */
function lsx_demo_theme_import_fish_taxonomies()
{
	// Species Categories
	$species_categories = array(
		'Yellowfish',
		'Tilapia',
		'Catfish',
		'Tigerfish',
		'Other River Fish'
	);

	foreach ($species_categories as $category) {
		if (! term_exists($category, 'species')) {
			wp_insert_term($category, 'species');
		}
	}

	// Locations
	$locations = array(
		'Huttenspruit',
		'Tugela River',
		'Drakensberg Streams',
		'KwaZulu-Natal',
		'Local Dams',
		'Coastal Estuaries'
	);

	foreach ($locations as $location) {
		if (! term_exists($location, 'location')) {
			wp_insert_term($location, 'location');
		}
	}
}

/**
 * Import Fish Species demo content.
 *
 * @since lsx-demo-theme 1.0
 *
 * @return void
 */
function lsx_demo_theme_import_fish_species()
{
	$fish_species = array(
		array(
			'title' => 'Smallmouth Yellowfish',
			'content' => 'A beautiful endemic species found in the rivers of South Africa. Known for their golden coloration and fighting spirit when hooked.',
			'species' => 'Yellowfish',
			'location' => 'Huttenspruit',
			'featured_image' => 'fish-smallmouth-yellowfish.jpg',
			'meta' => array(
				'habitat' => 'Fast-flowing rivers and streams',
				'season' => 'Spring and Summer',
				'average_size' => '25-40 cm',
				'bait' => 'Flies, small lures, worms',
				'conservation' => 'Protected - catch and release',
				'brandon_notes' => 'My favorite fish to catch on fly – their fight is incredible for their size!'
			)
		),
		array(
			'title' => 'Largemouth Yellowfish',
			'content' => 'The larger cousin of the Smallmouth Yellowfish, these impressive fish can grow quite substantial and provide excellent sport fishing opportunities.',
			'species' => 'Yellowfish',
			'location' => 'Tugela River',
			'featured_image' => 'fish-largemouth-yellowfish.jpg',
			'meta' => array(
				'habitat' => 'Deep pools in large rivers',
				'season' => 'Year-round, best in summer',
				'average_size' => '40-60 cm',
				'bait' => 'Larger lures, baitfish, worms',
				'conservation' => 'Protected - catch and release',
				'brandon_notes' => 'These giants require patience but the reward is worth it!'
			)
		),
		array(
			'title' => 'Mozambique Tilapia',
			'content' => 'A hardy and adaptable species that thrives in various water conditions. Popular among anglers for their accessibility and good table fare.',
			'species' => 'Tilapia',
			'location' => 'Local Dams',
			'featured_image' => 'fish-mozambique-tilapia.jpg',
			'meta' => array(
				'habitat' => 'Dams, slow rivers, warm water',
				'season' => 'Year-round',
				'average_size' => '20-35 cm',
				'bait' => 'Bread, worms, small lures',
				'conservation' => 'Common',
				'brandon_notes' => 'Great for beginners – they bite readily and are found everywhere!'
			)
		),
		array(
			'title' => 'Sharptooth Catfish (Barbel)',
			'content' => 'A formidable bottom-dwelling predator with distinctive whiskers. These powerful fish provide an excellent challenge for anglers seeking something different.',
			'species' => 'Catfish',
			'location' => 'Huttenspruit',
			'featured_image' => 'fish-sharptooth-catfish.jpg',
			'meta' => array(
				'habitat' => 'Deep pools and muddy riverbeds',
				'season' => 'Late summer',
				'average_size' => '50-80 cm',
				'bait' => 'Dead bait, chicken liver, worms',
				'conservation' => 'Common',
				'brandon_notes' => 'These guys are tough — bring a strong line and be ready for a fight!'
			)
		),
		array(
			'title' => 'Tigerfish',
			'content' => 'The apex predator of South African rivers. With their razor-sharp teeth and aggressive nature, tigerfish are the ultimate challenge for any angler.',
			'species' => 'Tigerfish',
			'location' => 'Tugela River',
			'featured_image' => 'fish-tigerfish.jpg',
			'meta' => array(
				'habitat' => 'Fast current, rocky areas',
				'season' => 'Summer months',
				'average_size' => '30-50 cm',
				'bait' => 'Spoons, spinners, live bait',
				'conservation' => 'Common but declining',
				'brandon_notes' => 'The tiger is the holy grail – catching one is an achievement to remember!'
			)
		),
		array(
			'title' => 'Rock Catfish',
			'content' => 'A smaller member of the catfish family that prefers rocky areas and fast-flowing water. They provide good sport on light tackle.',
			'species' => 'Catfish',
			'location' => 'Drakensberg Streams',
			'featured_image' => 'fish-rock-catfish.jpg',
			'meta' => array(
				'habitat' => 'Rocky streams, fast water',
				'season' => 'Summer and autumn',
				'average_size' => '15-25 cm',
				'bait' => 'Small worms, insects',
				'conservation' => 'Common',
				'brandon_notes' => 'Small but spirited – perfect for light tackle fishing in the mountains!'
			)
		),
		array(
			'title' => 'River Bream (Nembwe)',
			'content' => 'A beautiful silvery fish that inhabits the quieter sections of rivers and provides excellent table fare when harvested sustainably.',
			'species' => 'Other River Fish',
			'location' => 'Huttenspruit',
			'featured_image' => 'fish-river-bream.jpg',
			'meta' => array(
				'habitat' => 'Slow sections of rivers, near vegetation',
				'season' => 'Spring and summer',
				'average_size' => '20-30 cm',
				'bait' => 'Worms, small flies, bread',
				'conservation' => 'Common',
				'brandon_notes' => 'Underrated fish – they fight well and taste even better!'
			)
		),
		array(
			'title' => 'Natal Yellowfish',
			'content' => 'A regional variant of yellowfish found specifically in KwaZulu-Natal waters. Similar to their cousins but with unique characteristics.',
			'species' => 'Yellowfish',
			'location' => 'KwaZulu-Natal',
			'featured_image' => 'fish-natal-yellowfish.jpg',
			'meta' => array(
				'habitat' => 'Clear mountain streams',
				'season' => 'Spring through autumn',
				'average_size' => '20-35 cm',
				'bait' => 'Flies, small lures',
				'conservation' => 'Protected - catch and release',
				'brandon_notes' => 'The KZN variant has beautiful colors – truly stunning fish!'
			)
		),
		array(
			'title' => 'Redbreast Tilapia',
			'content' => 'Small but colorful tilapia species often found in dams and slower water. Their bright colors make them a joy to catch.',
			'species' => 'Tilapia',
			'location' => 'Local Dams',
			'featured_image' => 'fish-redbreast-tilapia.jpg',
			'meta' => array(
				'habitat' => 'Warm stillwaters, streams',
				'season' => 'Year-round',
				'average_size' => '15-25 cm',
				'bait' => 'Worms, small flies',
				'conservation' => 'Common',
				'brandon_notes' => 'Bright colors make them a joy to catch – often my first fish of the day!'
			)
		),
		array(
			'title' => 'Longfin Eel',
			'content' => 'A slender, snake-like species that migrates to the ocean to spawn. These mysterious fish are often caught by surprise when targeting other species.',
			'species' => 'Other River Fish',
			'location' => 'Huttenspruit',
			'featured_image' => 'fish-longfin-eel.jpg',
			'meta' => array(
				'habitat' => 'Rivers, dams, hiding under logs',
				'season' => 'Rainy season',
				'average_size' => '60-100 cm',
				'bait' => 'Worms, dead bait',
				'conservation' => 'Populations declining, release recommended',
				'brandon_notes' => 'Surprising catch – often hooked when targeting catfish at night!'
			)
		)
	);

	foreach ($fish_species as $fish) {
		// Check if post already exists
		$existing_post = get_page_by_title($fish['title'], OBJECT, 'fish');
		if ($existing_post) {
			continue;
		}

		// Create the post
		$post_id = wp_insert_post(array(
			'post_title'   => $fish['title'],
			'post_content' => $fish['content'],
			'post_status'  => 'publish',
			'post_type'    => 'fish',
			'post_author'  => 1
		));

		if (! is_wp_error($post_id)) {
			// Set taxonomies
			wp_set_object_terms($post_id, $fish['species'], 'species');
			wp_set_object_terms($post_id, $fish['location'], 'location');

			// Add meta fields
			foreach ($fish['meta'] as $key => $value) {
				update_post_meta($post_id, '_fish_' . $key, $value);
			}

			// Set featured image placeholder (in production, you would upload actual images)
			// For now, we'll just store the image filename for reference
			update_post_meta($post_id, '_fish_image_filename', $fish['featured_image']);
		}
	}
}

/**
 * Import Blog taxonomies.
 *
 * @since lsx-demo-theme 1.0
 *
 * @return void
 */
function lsx_demo_theme_import_blog_taxonomies()
{
	// Blog Categories
	$categories = array(
		'Adventures',
		'Tips & Tricks',
		'Conservation',
		'Gear',
		'Seasons'
	);

	foreach ($categories as $category) {
		if (! term_exists($category, 'category')) {
			wp_insert_term($category, 'category');
		}
	}

	// Blog Tags
	$tags = array(
		'Huttenspruit',
		'KwaZulu-Natal',
		'Yellowfish',
		'Tilapia',
		'Catfish',
		'River fishing',
		'Fly fishing',
		'Morning fishing',
		'Story',
		'Catch-and-release'
	);

	foreach ($tags as $tag) {
		if (! term_exists($tag, 'post_tag')) {
			wp_insert_term($tag, 'post_tag');
		}
	}
}

/**
 * Import Blog Posts demo content.
 *
 * @since lsx-demo-theme 1.0
 *
 * @return void
 */
function lsx_demo_theme_import_blog_posts()
{
	$blog_posts = array(
		array(
			'title' => 'My First Catch on the Huttenspruit',
			'content' => "I'll never forget my first proper catch on the Huttenspruit. I was just twelve years old, armed with my grandfather's old rod and a tin of earthworms.\n\nThe morning mist was still rising from the water when I cast my line into what looked like a promising pool. After what felt like hours (but was probably only twenty minutes), I felt that unmistakable tug.\n\nIt was a small Smallmouth Yellowfish, barely the size of my hand, but to me it was the catch of a lifetime. The way it fought, the golden flash in the clear water, the pride on my grandfather's face – it was the moment I knew fishing would be part of my life forever.\n\nThat little yellowfish taught me patience, respect for nature, and the pure joy that comes from connecting with the river. Every time I return to that same pool, I remember that first catch and the journey it started.",
			'category' => 'Adventures',
			'tags' => array('Huttenspruit', 'Yellowfish', 'Story'),
			'excerpt' => 'The story of my first catch that started a lifelong passion for fishing.'
		),
		array(
			'title' => 'Top 5 Fishing Spots in KwaZulu-Natal',
			'content' => "KwaZulu-Natal is a fishing paradise, offering everything from mountain streams to coastal estuaries. Here are my top 5 spots that never disappoint:\n\n## 1. Huttenspruit\nMy home waters and the place where it all began. This river system offers excellent yellowfish fishing and is perfect for fly fishing enthusiasts.\n\n## 2. Tugela River\nThe mighty Tugela holds some of the largest yellowfish in the province. The deeper pools near the escarpment are particularly productive.\n\n## 3. Drakensberg Streams\nThese crystal-clear mountain streams are home to trout and native rock catfish. The scenery alone makes the hike worthwhile.\n\n## 4. Local Dams\nPerfect for beginners, these dams are stocked with various tilapia species and offer easy access and consistent action.\n\n## 5. Coastal Estuaries\nWhere rivers meet the sea, creating unique fishing opportunities for both freshwater and saltwater species.\n\nEach location offers its own challenges and rewards. Plan your next adventure with my Fish Guide to learn more about what you might encounter!",
			'category' => 'Tips & Tricks',
			'tags' => array('KwaZulu-Natal', 'River fishing', 'Huttenspruit'),
			'excerpt' => 'Discover the best fishing locations KwaZulu-Natal has to offer.'
		),
		array(
			'title' => 'How to Catch Smallmouth Yellowfish',
			'content' => "Smallmouth Yellowfish are one of South Africa's most prized native species. Here's everything you need to know to catch them successfully:\n\n## The Right Gear\n- Light to medium rod (6-7 foot)\n- Quality reel with smooth drag\n- 6-8lb line for most conditions\n- Selection of small flies and lures\n\n## Best Techniques\nFly fishing is by far the most effective method. Focus on:\n- Nymphing in deeper pools\n- Dry flies during evening hatches\n- Small streamers in faster water\n\n## Timing is Everything\nTarget the golden hours – early morning and late afternoon. Spring and early summer offer the best action when water temperatures are optimal.\n\n## Reading the Water\nLook for:\n- Rock ledges and drop-offs\n- Areas where fast water meets slow\n- Undercut banks with overhead cover\n\nRemember, all yellowfish are protected. Practice catch and release to preserve these magnificent fish for future generations.",
			'category' => 'Tips & Tricks',
			'tags' => array('Yellowfish', 'Fly fishing', 'Catch-and-release'),
			'excerpt' => 'Master the techniques needed to catch South Africa\'s prized yellowfish.'
		),
		array(
			'title' => 'Conservation and Responsible Fishing',
			'content' => "As anglers, we have a responsibility to protect the waters and fish we love. Here's how I practice conservation on every fishing trip:\n\n## Catch and Release Best Practices\n- Use barbless hooks or pinch down barbs\n- Land fish quickly to reduce stress\n- Keep fish in the water during photos\n- Handle with wet hands only\n- Release immediately in calm water\n\n## Respect the Environment\n- Pack out all trash, even if it's not yours\n- Stay on designated paths\n- Don't disturb spawning areas\n- Use lead-free tackle where required\n\n## Support Local Conservation\nI'm proud to support several local conservation initiatives:\n- River cleanup programs\n- Fish habitat restoration projects\n- Educational programs for young anglers\n\n## The Bigger Picture\nEvery fish we release, every piece of trash we pick up, every young angler we teach – it all adds up. We're not just fishing for today, we're protecting these waters for future generations.\n\nJoin me in being a conservation-minded angler. Our rivers depend on it.",
			'category' => 'Conservation',
			'tags' => array('Conservation', 'Catch-and-release', 'River fishing'),
			'excerpt' => 'Why conservation matters and how every angler can make a difference.'
		),
		array(
			'title' => 'The One That Got Away',
			'content' => "Every angler has this story, and I'm no exception. Mine involves the biggest yellowfish I've ever hooked – and the one that taught me the most.\n\nIt was a perfect autumn morning on the Tugela. The water was crystal clear, the temperature just right, and I had the whole pool to myself. I'd been working a small nymph through the deeper section when something massive took the fly.\n\nThe fight that followed was epic. This fish ran like nothing I'd experienced before – stripping line from my reel with ease. For twenty minutes we battled, the fish using every trick in the book to throw the hook.\n\nJust as I was gaining ground, bringing the fish closer to the shallows where I could see its massive golden flank, my line went slack. The hook had pulled free.\n\nI sat there for a long time, processing what had happened. At first, I was devastated. But then I realized something important: that fish had given me one of the most thrilling experiences of my fishing life. It didn't matter that I didn't land it – the memory of that fight is worth more than any photo.\n\nSometimes the fish we don't catch teach us the most about what fishing is really about.",
			'category' => 'Adventures',
			'tags' => array('Story', 'Yellowfish', 'KwaZulu-Natal'),
			'excerpt' => 'Sometimes the most memorable catches are the ones that get away.'
		),
		array(
			'title' => 'Essential Gear for Beginners',
			'content' => "Starting your fishing journey can feel overwhelming with all the gear options available. Here's my no-nonsense guide to getting started without breaking the bank:\n\n## The Basics You Actually Need\n\n### Rod and Reel\n- Medium action spinning rod (6-7 feet)\n- Quality entry-level spinning reel\n- Budget: R800-1200 for both\n\n### Line and Terminal Tackle\n- 6-8lb monofilament line\n- Assorted hooks (sizes 6-12)\n- Sinkers and swivels\n- Basic tackle box\n\n### Bait Options\n- Earthworms (most versatile)\n- Bread (great for tilapia)\n- Small spinners and spoons\n\n## What You Don't Need (Yet)\nAvoid these common beginner mistakes:\n- Expensive high-end gear\n- Too many lures and gadgets\n- Complicated tackle systems\n\n## Budget-Friendly Tips\n- Start with basic gear and upgrade as you learn\n- Buy from reputable tackle shops with good advice\n- Consider second-hand quality gear\n- Focus on technique over equipment\n\n## Building Your Skills\nThe best investment is time on the water. Start with easy-to-catch species like tilapia and build your confidence before targeting more challenging fish.\n\nRemember: the best gear is the gear you understand and can use effectively!",
			'category' => 'Gear',
			'tags' => array('Gear', 'Tips & Tricks'),
			'excerpt' => 'Everything a beginner needs to know about choosing the right fishing gear.'
		),
		array(
			'title' => 'A Day in the Life of a Fisherman',
			'content' => "Ever wondered what a typical fishing day looks like for me? Come along on a recent trip to the Huttenspruit:\n\n## 4:30 AM - Pre-Dawn Preparation\nThe alarm goes off while it's still dark. Coffee first (always coffee first), then I load the truck with gear I prepared the night before. Check the weather, water levels, and planned routes.\n\n## 5:30 AM - Riverside Arrival\nThe river is shrouded in mist, the air crisp and full of promise. I spend time just listening – the sound of flowing water, birds beginning their morning chorus. This is my meditation time.\n\n## 6:00 AM - First Cast\nAs the sky lightens, I start with a small nymph in the deeper pool. The first hour is often the most productive, so every cast counts.\n\n## 8:00 AM - Morning Success\nTwo yellowfish already released, including a beautiful specimen that gave me a spectacular fight. Time for a coffee break and some biltong.\n\n## 10:00 AM - Exploring New Water\nThe morning bite has slowed, so I move upstream to a section I haven't fished in months. Sometimes the best discoveries come from wandering.\n\n## 12:00 PM - Midday Rest\nLunch by the river, planning the afternoon approach. The fish are less active in the heat, but patience often pays off.\n\n## 3:00 PM - Afternoon Strategy\nSwitching to different flies as insects begin their afternoon activity. The fish are starting to move again.\n\n## 6:00 PM - Golden Hour\nThe magic time when everything comes together. Multiple fish rising, perfect light, and that feeling that anything is possible.\n\n## 8:00 PM - Reflection\nAs darkness falls, I pack up with a sense of satisfaction. Not just from the fish caught, but from the day spent in nature's embrace.\n\nThis is more than fishing – it's a way of life.",
			'category' => 'Adventures',
			'tags' => array('Story', 'Morning fishing', 'Huttenspruit'),
			'excerpt' => 'Join me for a complete day on the water from dawn to dusk.'
		)
	);

	foreach ($blog_posts as $post_data) {
		// Check if post already exists
		$existing_post = get_page_by_title($post_data['title'], OBJECT, 'post');
		if ($existing_post) {
			continue;
		}

		// Create the post
		$post_id = wp_insert_post(array(
			'post_title'   => $post_data['title'],
			'post_content' => $post_data['content'],
			'post_excerpt' => $post_data['excerpt'],
			'post_status'  => 'publish',
			'post_type'    => 'post',
			'post_author'  => 1
		));

		if (! is_wp_error($post_id)) {
			// Set category
			$category_term = get_term_by('name', $post_data['category'], 'category');
			if ($category_term) {
				wp_set_object_terms($post_id, $category_term->term_id, 'category');
			}

			// Set tags
			if (! empty($post_data['tags'])) {
				wp_set_object_terms($post_id, $post_data['tags'], 'post_tag');
			}
		}
	}
}

/**
 * Create Contact Page with FAQ.
 *
 * @since lsx-demo-theme 1.0
 *
 * @return void
 */
function lsx_demo_theme_create_contact_page()
{
	// Check if Contact page already exists
	$existing_page = get_page_by_title('Contact', OBJECT, 'page');
	if ($existing_page) {
		return;
	}

	$contact_content = '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"x-large"} -->
	<h1 class="wp-block-heading has-text-align-center has-x-large-font-size">Contact</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
	<p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--50)">Got a question or want to share your fishing story? Drop me a note, and I\'ll get back to you soon.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"left"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"level":2,"fontSize":"large"} -->
		<h2 class="wp-block-heading has-large-font-size">Get in Touch</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><strong>Name:</strong> [Contact Form Field]</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><strong>Email:</strong> [Contact Form Field]</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><strong>Message:</strong> [Contact Form Field]</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><strong>What\'s your favorite fish to catch? (Optional):</strong> [Contact Form Field]</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
	<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:pattern {"slug":"lsx-demo-theme/text-fishing-faqs"} /-->
</div>
<!-- /wp:group -->';

	// Create the Contact page
	wp_insert_post(array(
		'post_title'   => 'Contact',
		'post_content' => $contact_content,
		'post_status'  => 'publish',
		'post_type'    => 'page',
		'post_author'  => 1
	));
}

// Run demo content import on theme activation
add_action('after_switch_theme', 'lsx_demo_theme_import_demo_content');

// Admin function to manually trigger demo content import (for testing)
if (! function_exists('lsx_demo_theme_manual_import_demo_content')) :
	/**
	 * Manual trigger for demo content import (for testing/development).
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_manual_import_demo_content()
	{
		// Only allow for admin users and if GET parameter is set
		if (! current_user_can('manage_options') || ! isset($_GET['import_demo'])) {
			return;
		}

		// Reset the import flag to allow re-import
		delete_option('lsx_demo_theme_demo_imported');

		// Run the import
		lsx_demo_theme_import_demo_content();

		// Show admin notice
		add_action('admin_notices', 'lsx_demo_theme_admin_notice_demo_imported');
	}
endif;

/**
 * Displays a success notice after demo content import.
 *
 * @since lsx-demo-theme 1.0
 *
 * @return void
 */
function lsx_demo_theme_admin_notice_demo_imported()
{
	echo '<div class="notice notice-success is-dismissible">';
	echo '<p>' . esc_html__('Demo content imported successfully!', 'lsx-demo-theme') . '</p>';
	echo '</div>';
}
add_action('admin_init', 'lsx_demo_theme_manual_import_demo_content');

// Add comprehensive SEO meta tags to all pages
if (! function_exists('lsx_demo_theme_add_seo_meta_tags')) :
	/**
	 * Add SEO meta tags including Open Graph and Twitter Cards.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_add_seo_meta_tags()
	{
		global $post;

		// Basic meta tags
		$site_name = get_bloginfo('name');
		$site_description = get_bloginfo('description');
		$site_url = home_url();

		// Page-specific data
		$page_title = wp_get_document_title();
		$page_description = '';
		$page_image = '';
		$page_url = '';

		if (is_singular()) {
			if (! isset($post) || ! is_object($post)) {
				return;
			}
			$page_url = get_permalink();
			$page_description = get_the_excerpt($post) ?: $site_description;

			// Get featured image
			if (has_post_thumbnail()) {
				$page_image = get_the_post_thumbnail_url($post, 'large');
			}

			// Custom descriptions for Fish CPT
			if (is_singular('fish')) {
				$species_info = get_post_meta($post->ID, 'species_info', true);
				if ($species_info) {
					$page_description = wp_trim_words($species_info, 25);
				}
			}
		} elseif (is_home() || is_front_page()) {
			$page_url = $site_url;
			$page_description = $site_description;
			$page_image = get_template_directory_uri() . '/assets/images/homepage-hero.jpg';
		} elseif (is_post_type_archive('fish')) {
			$page_url = get_post_type_archive_link('fish');
			$page_description = __('Discover the diverse fish species of KwaZulu-Natal rivers. Learn about their habitats, fishing techniques, and conservation status.', 'lsx-demo-theme');
			$page_image = get_template_directory_uri() . '/assets/images/fish-archive-header.jpg';
		} elseif (is_category() || is_tag() || is_archive()) {
			$page_url = get_permalink();
			$page_description = get_the_archive_description() ?: $site_description;
			$page_image = get_template_directory_uri() . '/assets/images/blog-archive-header.jpg';
		}

		// Fallback image
		if (empty($page_image)) {
			$page_image = get_template_directory_uri() . '/assets/images/homepage-hero.jpg';
		}

		// Clean descriptions
		$page_description = wp_strip_all_tags($page_description);
		$page_description = wp_trim_words($page_description, 25);

		// Output meta tags
		echo '<meta name="description" content="' . esc_attr($page_description) . '">' . "\n";

		// Open Graph tags
		echo '<meta property="og:title" content="' . esc_attr($page_title) . '">' . "\n";
		echo '<meta property="og:description" content="' . esc_attr($page_description) . '">' . "\n";
		echo '<meta property="og:image" content="' . esc_url($page_image) . '">' . "\n";
		echo '<meta property="og:url" content="' . esc_url($page_url) . '">' . "\n";
		echo '<meta property="og:type" content="' . (is_singular() ? 'article' : 'website') . '">' . "\n";
		echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
		echo '<meta property="og:locale" content="' . esc_attr(get_locale()) . '">' . "\n";

		// Twitter Card tags
		echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
		echo '<meta name="twitter:title" content="' . esc_attr($page_title) . '">' . "\n";
		echo '<meta name="twitter:description" content="' . esc_attr($page_description) . '">' . "\n";
		echo '<meta name="twitter:image" content="' . esc_url($page_image) . '">' . "\n";

		// Additional meta tags for Fish CPT
		if (is_singular('fish')) {
			$habitat = get_post_meta($post->ID, 'habitat', true);
			$conservation_status = get_post_meta($post->ID, 'conservation_status', true);

			if ($habitat) {
				echo '<meta name="fish:habitat" content="' . esc_attr($habitat) . '">' . "\n";
			}
			if ($conservation_status) {
				echo '<meta name="fish:conservation_status" content="' . esc_attr($conservation_status) . '">' . "\n";
			}
		}
	}
endif;
add_action('wp_head', 'lsx_demo_theme_add_seo_meta_tags', 1);

// Add structured data for Fish CPT
if (! function_exists('lsx_demo_theme_add_fish_structured_data')) :
	/**
	 * Add structured data for Fish CPT entries.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_add_fish_structured_data()
	{
		if (! is_singular('fish')) {
			return;
		}

		global $post;

		$structured_data = array(
			'@context' => 'https://schema.org',
			'@type' => 'Animal',
			'name' => get_the_title(),
			'description' => get_the_excerpt(),
			'url' => get_permalink(),
			'image' => get_the_post_thumbnail_url($post, 'large'),
		);

		// Add custom fields if they exist
		$habitat = get_post_meta($post->ID, 'habitat', true);
		$conservation_status = get_post_meta($post->ID, 'conservation_status', true);
		$species_info = get_post_meta($post->ID, 'species_info', true);

		if ($habitat) {
			$structured_data['habitat'] = $habitat;
		}

		if ($conservation_status) {
			$structured_data['conservationStatus'] = $conservation_status;
		}

		if ($species_info) {
			$structured_data['additionalProperty'] = array(
				'@type' => 'PropertyValue',
				'name' => 'Species Information',
				'value' => wp_strip_all_tags($species_info)
			);
		}

		echo '<script type="application/ld+json">' . wp_json_encode($structured_data, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
	}
endif;
add_action('wp_head', 'lsx_demo_theme_add_fish_structured_data', 5);

// Add FAQ Schema to Contact page and relevant pages for SEO
if (! function_exists('lsx_demo_theme_add_faq_schema')) :
	/**
	 * Add FAQ Schema JSON-LD to pages with FAQ content.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_add_faq_schema()
	{
		// Only add on specific pages or if FAQ pattern is present
		if (! is_page('contact') && ! is_post_type_archive('fish') && ! is_singular('fish')) {
			return;
		}

		$faq_data = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(
				array(
					'@type'          => 'Question',
					'name'           => __('How can I learn more about the fish you catch?', 'lsx-demo-theme'),
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => __('Check out the Fish Guide for detailed profiles of each species, including habitat information, best fishing techniques, and conservation status.', 'lsx-demo-theme')
					)
				),
				array(
					'@type'          => 'Question',
					'name'           => __('Do you offer guided fishing trips?', 'lsx-demo-theme'),
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => __('Not yet, but I\'m happy to share tips for your next adventure. Feel free to contact me with specific questions about fishing locations, techniques, or gear recommendations.', 'lsx-demo-theme')
					)
				),
				array(
					'@type'          => 'Question',
					'name'           => __('What\'s the best time to fish in KwaZulu-Natal?', 'lsx-demo-theme'),
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => __('Early morning and late afternoon are generally the most productive times. Spring and early summer offer the best action for most species, especially yellowfish. Water temperature and weather conditions play a big role in fish activity.', 'lsx-demo-theme')
					)
				),
				array(
					'@type'          => 'Question',
					'name'           => __('Are yellowfish protected species?', 'lsx-demo-theme'),
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => __('Yes, all yellowfish species are protected in South Africa. They must be released immediately after being caught. This helps preserve these magnificent native fish for future generations.', 'lsx-demo-theme')
					)
				)
			)
		);

		echo '<script type="application/ld+json">' . wp_json_encode($faq_data, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
	}
endif;
add_action('wp_head', 'lsx_demo_theme_add_faq_schema');

// Add Google Search Console verification and other SEO head tags
if (! function_exists('lsx_demo_theme_add_verification_tags')) :
	/**
	 * Add verification tags for search engines.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_add_verification_tags()
	{
		// Google Search Console verification (placeholder - replace with actual value)
		echo '<meta name="google-site-verification" content="placeholder-google-verification-code" />' . "\n";

		// Bing verification (placeholder - replace with actual value)
		echo '<meta name="msvalidate.01" content="placeholder-bing-verification-code" />' . "\n";

		// Pinterest verification (placeholder - replace with actual value)
		echo '<meta name="p:domain_verify" content="placeholder-pinterest-verification-code" />' . "\n";

		// Add canonical URL
		if (! is_404()) {
			$canonical_url = '';
			if (is_singular()) {
				$canonical_url = get_permalink();
			} elseif (is_home() || is_front_page()) {
				$canonical_url = home_url();
			} elseif (is_archive()) {
				$canonical_url = get_permalink();
			}

			if ($canonical_url) {
				echo '<link rel="canonical" href="' . esc_url($canonical_url) . '" />' . "\n";
			}
		}

		// Add robots meta tag
		if (is_search() || is_404()) {
			echo '<meta name="robots" content="noindex, nofollow" />' . "\n";
		} else {
			echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />' . "\n";
		}
	}
endif;
add_action('wp_head', 'lsx_demo_theme_add_verification_tags', 2);

// Generate simple XML sitemap
if (! function_exists('lsx_demo_theme_generate_sitemap')) :
	/**
	 * Generate a simple XML sitemap.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_generate_sitemap()
	{
		if (! isset($_GET['sitemap']) || $_GET['sitemap'] !== 'xml') {
			return;
		}

		header('Content-Type: application/xml; charset=utf-8');

		echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
		echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

		// Homepage
		echo '<url>' . "\n";
		echo '<loc>' . esc_url(home_url()) . '</loc>' . "\n";
		echo '<lastmod>' . date('c') . '</lastmod>' . "\n";
		echo '<changefreq>weekly</changefreq>' . "\n";
		echo '<priority>1.0</priority>' . "\n";
		echo '</url>' . "\n";

		// Pages
		$pages = get_pages(array('post_status' => 'publish'));
		foreach ($pages as $page) {
			echo '<url>' . "\n";
			echo '<loc>' . esc_url(get_permalink($page->ID)) . '</loc>' . "\n";
			echo '<lastmod>' . date('c', strtotime($page->post_modified)) . '</lastmod>' . "\n";
			echo '<changefreq>monthly</changefreq>' . "\n";
			echo '<priority>0.8</priority>' . "\n";
			echo '</url>' . "\n";
		}

		// Posts
		$posts = get_posts(array(
			'post_status' => 'publish',
			'numberposts' => -1
		));
		foreach ($posts as $post) {
			echo '<url>' . "\n";
			echo '<loc>' . esc_url(get_permalink($post->ID)) . '</loc>' . "\n";
			echo '<lastmod>' . date('c', strtotime($post->post_modified)) . '</lastmod>' . "\n";
			echo '<changefreq>monthly</changefreq>' . "\n";
			echo '<priority>0.6</priority>' . "\n";
			echo '</url>' . "\n";
		}

		// Fish CPT
		$fish_posts = get_posts(array(
			'post_type' => 'fish',
			'post_status' => 'publish',
			'numberposts' => -1
		));
		foreach ($fish_posts as $fish) {
			echo '<url>' . "\n";
			echo '<loc>' . esc_url(get_permalink($fish->ID)) . '</loc>' . "\n";
			echo '<lastmod>' . date('c', strtotime($fish->post_modified)) . '</lastmod>' . "\n";
			echo '<changefreq>monthly</changefreq>' . "\n";
			echo '<priority>0.7</priority>' . "\n";
			echo '</url>' . "\n";
		}

		// Archives
		echo '<url>' . "\n";
		echo '<loc>' . esc_url(get_post_type_archive_link('fish')) . '</loc>' . "\n";
		echo '<lastmod>' . date('c') . '</lastmod>' . "\n";
		echo '<changefreq>weekly</changefreq>' . "\n";
		echo '<priority>0.9</priority>' . "\n";
		echo '</url>' . "\n";

		echo '</urlset>' . "\n";
		exit;
	}
endif;
add_action('init', 'lsx_demo_theme_generate_sitemap');

// Add sitemap reference to robots.txt
if (! function_exists('lsx_demo_theme_add_sitemap_to_robots')) :
	/**
	 * Add sitemap reference to robots.txt.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @param string $output The robots.txt output.
	 * @return string Modified robots.txt content.
	 */
	function lsx_demo_theme_add_sitemap_to_robots($output)
	{
		$output .= "\nSitemap: " . home_url('/?sitemap=xml') . "\n";
		return $output;
	}
endif;
add_filter('robots_txt', 'lsx_demo_theme_add_sitemap_to_robots');

// Add lazy loading and performance optimizations
if (! function_exists('lsx_demo_theme_add_performance_optimizations')) :
	/**
	 * Add performance optimizations including lazy loading and resource hints.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_add_performance_optimizations()
	{
		// Add resource hints for better performance
		echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
		echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";

		// Add viewport meta tag if not already present
		if (! current_theme_supports('title-tag')) {
			echo '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\n";
		}

		// Add theme color for mobile browsers
		echo '<meta name="theme-color" content="#ff5f1f">' . "\n";
		echo '<meta name="msapplication-TileColor" content="#ff5f1f">' . "\n";
	}
endif;
add_action('wp_head', 'lsx_demo_theme_add_performance_optimizations', 3);

// Add lazy loading to images
if (! function_exists('lsx_demo_theme_add_lazy_loading')) :
	/**
	 * Add lazy loading attributes to images.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @param string $html The HTML content.
	 * @return string Modified HTML with lazy loading attributes.
	 */
	function lsx_demo_theme_add_lazy_loading($html)
	{
		// Don't add lazy loading to images in the admin or if it's already present
		if (is_admin() || strpos($html, 'loading=') !== false) {
			return $html;
		}

		// Add loading="lazy" to img tags
		$html = str_replace('<img ', '<img loading="lazy" ', $html);

		return $html;
	}
endif;
add_filter('the_content', 'lsx_demo_theme_add_lazy_loading');
add_filter('post_thumbnail_html', 'lsx_demo_theme_add_lazy_loading');

// Optimize CSS delivery
if (! function_exists('lsx_demo_theme_optimize_css_delivery')) :
	/**
	 * Optimize CSS delivery by adding preload hints for critical CSS.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_optimize_css_delivery()
	{
		if (is_admin()) {
			return;
		}

		// Preload critical CSS files
		$theme_version = wp_get_theme()->get('Version');
		$style_uri = get_stylesheet_uri();

		echo '<link rel="preload" href="' . esc_url($style_uri) . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
		echo '<noscript><link rel="stylesheet" href="' . esc_url($style_uri) . '"></noscript>' . "\n";
	}
endif;
add_action('wp_head', 'lsx_demo_theme_optimize_css_delivery', 4);

// Add performance monitoring for Core Web Vitals
if (! function_exists('lsx_demo_theme_add_web_vitals_monitoring')) :
	/**
	 * Add Web Vitals monitoring script for performance tracking.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @return void
	 */
	function lsx_demo_theme_add_web_vitals_monitoring()
	{
		if (is_admin() || ! WP_DEBUG) {
			return;
		}

?>
		<script>
			// Web Vitals monitoring for development
			(function() {
				if ('performance' in window && 'PerformanceObserver' in window) {
					// Monitor Largest Contentful Paint (LCP)
					new PerformanceObserver((entryList) => {
						for (const entry of entryList.getEntries()) {
							console.log('LCP:', entry.startTime);
						}
					}).observe({
						entryTypes: ['largest-contentful-paint']
					});

					// Monitor First Input Delay (FID)
					new PerformanceObserver((entryList) => {
						for (const entry of entryList.getEntries()) {
							console.log('FID:', entry.processingStart - entry.startTime);
						}
					}).observe({
						entryTypes: ['first-input']
					});

					// Monitor Cumulative Layout Shift (CLS)
					let clsValue = 0;
					new PerformanceObserver((entryList) => {
						for (const entry of entryList.getEntries()) {
							if (!entry.hadRecentInput) {
								clsValue += entry.value;
								console.log('CLS:', clsValue);
							}
						}
					}).observe({
						entryTypes: ['layout-shift']
					});
				}
			})();
		</script>
<?php
	}
endif;
add_action('wp_footer', 'lsx_demo_theme_add_web_vitals_monitoring', 100);

// Add internal linking optimization
if (! function_exists('lsx_demo_theme_optimize_internal_linking')) :
	/**
	 * Add internal linking suggestions and optimize existing links.
	 *
	 * @since lsx-demo-theme 1.0
	 *
	 * @param string $content The post content.
	 * @return string Modified content with optimized internal links.
	 */
	function lsx_demo_theme_optimize_internal_linking($content)
	{
		if (is_admin() || ! is_singular()) {
			return $content;
		}

		global $post;

		// Auto-link fish species mentioned in blog posts to fish CPT entries
		if ($post->post_type === 'post') {
			$fish_posts = get_posts(array(
				'post_type' => 'fish',
				'post_status' => 'publish',
				'numberposts' => -1
			));

			foreach ($fish_posts as $fish) {
				$fish_name = get_the_title($fish->ID);
				$fish_link = get_permalink($fish->ID);

				// Replace fish name with link if not already linked
				$pattern = '/\b(' . preg_quote($fish_name, '/') . ')\b(?![^<]*>)/i';
				$replacement = '<a href="' . esc_url($fish_link) . '" title="Learn more about ' . esc_attr($fish_name) . '">${1}</a>';

				// Only replace first occurrence to avoid overlinking
				$content = preg_replace($pattern, $replacement, $content, 1);
			}
		}

		// Add related blog posts to fish CPT entries
		if ($post->post_type === 'fish') {
			$fish_name = get_the_title();
			$related_posts = get_posts(array(
				'post_type' => 'post',
				's' => $fish_name,
				'numberposts' => 3,
				'post__not_in' => array($post->ID)
			));

			if ($related_posts) {
				$related_content = '<div class="related-blog-posts">';
				$related_content .= '<h3>' . __('Related Fishing Stories', 'lsx-demo-theme') . '</h3>';
				$related_content .= '<ul>';

				foreach ($related_posts as $related_post) {
					$related_content .= '<li><a href="' . get_permalink($related_post->ID) . '">' . get_the_title($related_post->ID) . '</a></li>';
				}

				$related_content .= '</ul></div>';
				$content .= $related_content;
			}
		}

		return $content;
	}
endif;
add_filter('the_content', 'lsx_demo_theme_optimize_internal_linking', 20);
