Perfect — below is the **complete file set** for your plugin:
**“WP CPT Fish Plugin”**

Each file is labeled clearly so you can copy/paste directly into your VS Code project folder:
`wp-cpt-fish-plugin/`

---

## 🧩 FILE 1: `wp-cpt-fish-plugin.php`

```php
<?php
/*
Plugin Name: WP CPT Fish Plugin
Plugin URI:  https://example.com
Description: Registers Fish, Gear, and Stories CPTs with secure meta, block templates/patterns, fallback templates, settings, and custom capabilities.
Version:     1.0.0
Author:      Your Name
Text Domain: wp-cpt-fish
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'WP_CPT_FISH_DIR', plugin_dir_path( __FILE__ ) );
define( 'WP_CPT_FISH_URL', plugin_dir_url( __FILE__ ) );

/* Includes */
$includes = array(
    'includes/post-types.php',
    'includes/meta-fields.php',
    'includes/templates.php',
    'includes/block-patterns.php',
    'includes/settings-page.php',
    'includes/capabilities.php',
);

foreach ( $includes as $file ) {
    $path = WP_CPT_FISH_DIR . $file;
    if ( file_exists( $path ) ) {
        require_once $path;
    }
}

/* Activation / Deactivation */
register_activation_hook( __FILE__, 'wp_cpt_fish_activate' );
register_deactivation_hook( __FILE__, 'wp_cpt_fish_deactivate' );

function wp_cpt_fish_activate() {
    if ( function_exists( 'wp_cpt_fish_add_caps' ) ) {
        wp_cpt_fish_add_caps();
    }
    if ( function_exists( 'wp_cpt_fish_register_post_types' ) ) {
        wp_cpt_fish_register_post_types();
    }
    flush_rewrite_rules();
}

function wp_cpt_fish_deactivate() {
    flush_rewrite_rules();
}
```

---

## 🧩 FILE 2: `includes/post-types.php`

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', 'wp_cpt_fish_register_post_types', 10 );

function wp_cpt_fish_register_post_types() {
    // FISH
    $fish_labels = array(
        'name' => __( 'Fish', 'wp-cpt-fish' ),
        'singular_name' => __( 'Fish', 'wp-cpt-fish' ),
        'menu_name' => __( 'Fish', 'wp-cpt-fish' ),
        'add_new_item' => __( 'Add New Fish', 'wp-cpt-fish' ),
    );

    $fish_args = array(
        'labels' => $fish_labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-palmtree',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite' => array( 'slug' => 'fish' ),
        'capability_type' => array( 'fish', 'fishes' ),
        'map_meta_cap' => true,
        'template' => array(
            array( 'core/heading', array( 'level' => 2, 'placeholder' => 'Species overview' ) ),
            array( 'core/columns', array(), array(
                array( 'core/column', array(), array( array( 'core/image' ), array( 'core/paragraph' ) ) ),
                array( 'core/column', array(), array( array( 'core/heading', array( 'level' => 3, 'content' => 'Facts' ) ), array( 'core/list' ) ) )
            ) )
        ),
        'template_lock' => 'insert'
    );
    register_post_type( 'fish', $fish_args );

    // GEAR
    $gear_args = array(
        'labels' => array(
            'name' => __( 'Gear', 'wp-cpt-fish' ),
            'singular_name' => __( 'Gear', 'wp-cpt-fish' ),
            'menu_name' => __( 'Gear', 'wp-cpt-fish' ),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'rewrite' => array( 'slug' => 'gear' )
    );
    register_post_type( 'gear', $gear_args );

    // STORIES
    $stories_args = array(
        'labels' => array(
            'name' => __( 'Stories', 'wp-cpt-fish' ),
            'singular_name' => __( 'Story', 'wp-cpt-fish' ),
            'menu_name' => __( 'Stories', 'wp-cpt-fish' ),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'rewrite' => array( 'slug' => 'stories' )
    );
    register_post_type( 'stories', $stories_args );
}
```

---

## 🧩 FILE 3: `includes/meta-fields.php`

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', 'wp_cpt_fish_register_meta', 15 );

function wp_cpt_fish_register_meta() {
    $fields = array(
        'scientific_name' => 'string',
        'water_type'      => 'string',
        'avg_size_cm'     => 'number',
        'best_bait'       => 'string',
    );

    foreach ( $fields as $key => $type ) {
        register_post_meta( 'fish', $key, array(
            'single' => true,
            'type'   => $type,
            'show_in_rest' => array( 'schema' => array( 'type' => $type ) ),
            'sanitize_callback' => $type === 'number' ? 'floatval' : 'sanitize_text_field',
            'auth_callback'     => function() { return current_user_can( 'edit_posts' ); },
        ));
    }
}
```

---

## 🧩 FILE 4: `includes/templates.php`

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_filter( 'template_include', 'wp_cpt_fish_template_loader', 20 );

function wp_cpt_fish_template_loader( $template ) {
    if ( is_singular( 'fish' ) ) {
        $theme_file = locate_template( array( 'single-fish.php' ) );
        if ( $theme_file ) {
            return $theme_file;
        }
        return WP_CPT_FISH_DIR . 'templates/single-fish.php';
    }

    if ( is_post_type_archive( 'fish' ) ) {
        $theme_file = locate_template( array( 'archive-fish.php' ) );
        if ( $theme_file ) {
            return $theme_file;
        }
        return WP_CPT_FISH_DIR . 'templates/archive-fish.php';
    }

    return $template;
}
```

---

## 🧩 FILE 5: `templates/single-fish.php`

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
while ( have_posts() ) : the_post();
    $scientific = get_post_meta( get_the_ID(), 'scientific_name', true );
    $water = get_post_meta( get_the_ID(), 'water_type', true );
    $size = get_post_meta( get_the_ID(), 'avg_size_cm', true );
    $bait = get_post_meta( get_the_ID(), 'best_bait', true );
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header>
            <h1><?php echo esc_html( get_the_title() ); ?></h1>
            <?php if ( $scientific ): ?><p><em><?php echo esc_html( $scientific ); ?></em></p><?php endif; ?>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>
            <ul class="fish-meta">
                <?php if ( $water ): ?><li><strong>Water:</strong> <?php echo esc_html( $water ); ?></li><?php endif; ?>
                <?php if ( $size ): ?><li><strong>Avg size (cm):</strong> <?php echo esc_html( $size ); ?></li><?php endif; ?>
                <?php if ( $bait ): ?><li><strong>Best bait:</strong> <?php echo esc_html( $bait ); ?></li><?php endif; ?>
            </ul>
        </div>
    </article>
    <?php
endwhile;
get_footer();
```

---

## 🧩 FILE 6: `templates/archive-fish.php`

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
get_header();
?>
<main>
    <h1><?php post_type_archive_title(); ?></h1>
    <?php if ( have_posts() ) : ?>
        <ul class="fish-list">
            <?php while ( have_posts() ) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php the_excerpt(); ?>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php _e( 'No fish found.', 'wp-cpt-fish' ); ?></p>
    <?php endif; ?>
</main>
<?php
get_footer();
```

---

## 🧩 FILE 7: `includes/block-patterns.php`

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', 'wp_cpt_fish_register_block_patterns' );

function wp_cpt_fish_register_block_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {
        register_block_pattern(
            'wp-cpt-fish/fish-intro',
            array(
                'title' => __( 'Fish Intro', 'wp-cpt-fish' ),
                'categories' => array( 'text' ),
                'content' => "<!-- wp/heading --><h2>About this fish</h2><!-- /wp/heading --><!-- wp/paragraph --><p>Quick facts about this fish...</p><!-- /wp/paragraph -->"
            )
        );
    }
}
```

---

## 🧩 FILE 8: `assets/block-patterns/fish-intro.json`

```json
{
  "title": "Fish Intro",
  "categories": ["text"],
  "content": "<!-- wp/heading --><h2>About this fish</h2><!-- /wp/heading --><!-- wp/paragraph --><p>Quick facts about this fish...</p><!-- /wp/paragraph -->"
}
```

---

## 🧩 FILE 9: `includes/settings-page.php`

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_menu', 'wp_cpt_fish_register_settings_page' );
add_action( 'admin_init', 'wp_cpt_fish_register_settings' );

function wp_cpt_fish_register_settings_page() {
    add_submenu_page(
        'edit.php?post_type=fish',
        __( 'Fish Settings', 'wp-cpt-fish' ),
        __( 'Settings', 'wp-cpt-fish' ),
        'manage_options',
        'wp-cpt-fish-settings',
        'wp_cpt_fish_settings_page_callback'
    );
}

function wp_cpt_fish_register_settings() {
    register_setting( 'wp_cpt_fish_options', 'wp_cpt_fish_options', 'wp_cpt_fish_sanitize_options' );
    add_settings_section( 'wp_cpt_fish_main', __( 'Plugin Settings', 'wp-cpt-fish' ), null, 'wp-cpt-fish-settings' );
    add_settings_field( 'default_lock', __( 'Default Template Lock', 'wp-cpt-fish' ), 'wp_cpt_fish_default_lock_callback', 'wp-cpt-fish-settings', 'wp_cpt_fish_main' );
}

function wp_cpt_fish_default_lock_callback() {
    $options = get_option( 'wp_cpt_fish_options', array() );
    $value = isset( $options['default_lock'] ) ? $options['default_lock'] : '';
    echo '<select name="wp_cpt_fish_options[default_lock]">';
    echo '<option value="">' . esc_html__( 'None', 'wp-cpt-fish' ) . '</option>';
    echo '<option value="insert" ' . selected( $value, 'insert', false ) . '>' . esc_html__( 'Insert only', 'wp-cpt-fish' ) . '</option>';
    echo '<option value="all" ' . selected( $value, 'all', false ) . '>' . esc_html__( 'All', 'wp-cpt-fish' ) . '</option>';
    echo '</select>';
}

function wp_cpt_fish_sanitize_options( $input ) {
    $output = array();
    if ( isset( $input['default_lock'] ) && in_array( $input['default_lock'], array( '', 'insert', 'all' ), true ) ) {
        $output['default_lock'] = $input['default_lock'];
    }
    return $output;
}

function wp_cpt_fish_settings_page_callback() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Fish Plugin Settings', 'wp-cpt-fish' ); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'wp_cpt_fish_options' );
            do_settings_sections( 'wp-cpt-fish-settings' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
```

---

## 🧩 FILE 10: `includes/capabilities.php`

```php
<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wp_cpt_fish_add_caps() {
    $roles = array( 'administrator', 'editor' );

    $caps = array(
        'edit_fish', 'read_fish', 'delete_fish',
        'edit_fishes', 'edit_others_fishes', 'publish_fishes', 'read_private_fishes',
        'delete_fishes', 'delete_private_fishes'
    );

    foreach ( $roles as $role_name ) {
        $role = get_role( $role_name );
        if ( ! $role ) continue;
        foreach ( $caps as $cap ) {
            $role->add_cap( $cap );
        }
    }
}
```

---

## 🧩 FILE 11: `uninstall.php`

```php
<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// remove plugin options
delete_option( 'wp_cpt_fish_options' );
```

---

## 🧩 FILE 12: `readme.txt`

```
=== WP CPT Fish Plugin ===
Contributors: yourname
Stable tag: 1.0.0
Requires at least: 5.8
Tested up to: 6.x
License: GPLv2 or later

== Description ==
This plugin registers Fish, Gear, and Stories custom post types with secure meta, fallback templates, block patterns, and an admin settings page.

== Installation ==
1. Upload `wp-cpt-fish-plugin.zip` via WP Admin → Plugins → Add New → Upload Plugin.
2. Activate the plugin.
3. Go to Dashboard → Fish → Settings to configure defaults.

== Changelog ==
= 1.0.0 =
Initial release.
```

---

✅ **Next step for you in VS Code:**

1. Create the folder:
   `/wp-content/plugins/wp-cpt-fish-plugin`
2. Copy/paste each file into the structure above.
3. Zip the folder if you want to test install:

   ```bash
   cd /wp-content/plugins/
   zip -r wp-cpt-fish-plugin.zip wp-cpt-fish-plugin
   ```
4. Upload and activate the plugin.

---

Would you like me to include a **Copilot “prompt template” file** (like `TASKS.md`) that explains the plugin goals for Copilot to auto-extend or refactor in VS Code? It helps Copilot understand ongoing context while editing.
