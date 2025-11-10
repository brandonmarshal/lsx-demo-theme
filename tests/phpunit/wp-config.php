<?php
/**
 * WordPress test environment configuration file
 *
 * @package LSX_Demo_Theme
 */

// Test with WordPress debug mode on
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'SCRIPT_DEBUG', true );
define( 'WP_DEVELOPMENT_MODE', true );

// Disable direct file access
define( 'ABSPATH', true );

// Test environment URL
define( 'WP_TESTS_DOMAIN', 'example.org' );
define( 'WP_TESTS_EMAIL', 'admin@example.org' );
define( 'WP_TESTS_TITLE', 'Test Site' );

// WordPress database settings for tests
define( 'DB_NAME', 'test_db' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

$table_prefix = 'wp_test_';
