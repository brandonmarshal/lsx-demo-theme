<?php

namespace FishingCPTPlugin\GoogleMaps;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Enqueue Google Maps scripts and styles for Area single posts.
 *
 * @since 1.0.1
 *
 * @return void
 */
function enqueue_maps_assets(): void
{
	// Only load on single Area posts
	if (! \is_singular('area')) {
		return;
	}

	// Get API key from settings
	$settings = \get_option('fishing_gmaps_settings', []);
	$api_key  = isset($settings['api_key']) ? $settings['api_key'] : '';

	// Don't enqueue if no API key is configured
	if (empty($api_key)) {
		return;
	}

	// Check if current Area post has location data
	$post_id    = \get_the_ID();
	$latitude   = \get_post_meta($post_id, 'area_latitude', true);
	$longitude  = \get_post_meta($post_id, 'area_longitude', true);

	// Don't enqueue if no location data
	if (empty($latitude) || empty($longitude)) {
		return;
	}

	/**
	 * Note on API Key Security:
	 * The Google Maps JavaScript API requires the API key to be included in the script URL.
	 * This is standard practice and documented by Google. To protect against unauthorized usage:
	 * 1. Restrict the API key in Google Cloud Console to specific domains (HTTP referrers)
	 * 2. Limit the API key to only the Maps JavaScript API
	 * 3. Set usage quotas and billing alerts
	 * 4. Monitor usage in Google Cloud Console
	 *
	 * @see https://developers.google.com/maps/api-security-best-practices
	 */

	// Enqueue Google Maps JavaScript API
	\wp_enqueue_script(
		'google-maps',
		'https://maps.googleapis.com/maps/api/js?key=' . urlencode($api_key),
		[],
		null,
		true
	);

	// Enqueue custom maps JavaScript
	\wp_enqueue_script(
		'fishing-maps',
		FISHING_CPT_PLUGIN_URL . 'assets/js/maps.js',
		['google-maps'],
		FISHING_CPT_PLUGIN_VERSION,
		true
	);

	// Enqueue maps CSS
	\wp_enqueue_style(
		'fishing-maps',
		FISHING_CPT_PLUGIN_URL . 'assets/css/maps.css',
		[],
		FISHING_CPT_PLUGIN_VERSION
	);
}
\add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_maps_assets');

/**
 * Get map data for an Area post.
 *
 * @since 1.0.1
 *
 * @param int $post_id Area post ID.
 * @return array|null Map data array or null if no location data.
 */
function get_area_map_data($post_id): ?array
{
	$latitude  = \get_post_meta($post_id, 'area_latitude', true);
	$longitude = \get_post_meta($post_id, 'area_longitude', true);
	$address   = \get_post_meta($post_id, 'area_address', true);

	// Return null if no coordinates
	if (empty($latitude) || empty($longitude)) {
		return null;
	}

	// Get settings with defaults
	$settings = \get_option('fishing_gmaps_settings', []);
	$zoom     = isset($settings['default_zoom']) ? (int) $settings['default_zoom'] : 12;
	$map_type = isset($settings['map_type']) ? $settings['map_type'] : 'roadmap';
	$api_key  = isset($settings['api_key']) ? $settings['api_key'] : '';

	return [
		'latitude'  => \floatval($latitude),
		'longitude' => \floatval($longitude),
		'address'   => ! empty($address) ? \sanitize_text_field($address) : '',
		'zoom'      => $zoom,
		'map_type'  => $map_type,
		'area_name' => \get_the_title($post_id),
		'api_key'   => $api_key,
	];
}

/**
 * Render map container for an Area post.
 *
 * @since 1.0.1
 *
 * @param int|null $post_id Optional. Area post ID. Defaults to current post.
 * @return void
 */
function render_area_map($post_id = null): void
{
	if (null === $post_id) {
		$post_id = \get_the_ID();
	}

	// Get map data (includes API key check)
	$map_data = get_area_map_data($post_id);

	// Don't render if no location data
	if (null === $map_data) {
		return;
	}

	// Check if API key is configured
	if (empty($map_data['api_key'])) {
		// Show admin notice if user is admin
		if (\current_user_can('manage_options')) {
			echo '<div class="fishing-map-notice" role="alert">';
			echo '<p>';
			/* translators: %s: URL to Maps Settings page */
			echo \wp_kses_post(
				sprintf(
					\__('Google Maps API key not configured. <a href="%s">Configure it now</a> to display the map.', 'fishing-cpt-plugin'),
					\admin_url('edit.php?post_type=fish&page=fishing-maps')
				)
			);
			echo '</p>';
			echo '</div>';
		}
		return;
	}

	// Render map container with data attributes
	?>
	<div class="area-map-section">
		<h2><?php echo \esc_html__('Location', 'fishing-cpt-plugin'); ?></h2>
		<div
			id="fishing-area-map"
			role="region"
			aria-label="<?php echo \esc_attr(\sprintf(\__('Map showing location of %s', 'fishing-cpt-plugin'), $map_data['area_name'])); ?>"
			data-latitude="<?php echo \esc_attr($map_data['latitude']); ?>"
			data-longitude="<?php echo \esc_attr($map_data['longitude']); ?>"
			data-area-name="<?php echo \esc_attr($map_data['area_name']); ?>"
			data-address="<?php echo \esc_attr($map_data['address']); ?>"
			data-zoom="<?php echo \esc_attr($map_data['zoom']); ?>"
			data-map-type="<?php echo \esc_attr($map_data['map_type']); ?>"
		></div>
	</div>
	<?php
}
