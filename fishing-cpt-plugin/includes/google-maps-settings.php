<?php

namespace Fishing_CPT\GoogleMaps;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Register Google Maps settings.
 *
 * @since 1.0.1
 *
 * @return void
 */
function register_maps_settings(): void
{
	\register_setting('fishing_gmaps_settings', 'fishing_gmaps_settings', __NAMESPACE__ . '\sanitize_maps_settings');

	\add_settings_section(
		'fishing_gmaps_api',
		\__('Google Maps API Configuration', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\render_api_section_description',
		'fishing-maps'
	);

	\add_settings_field(
		'api_key',
		\__('Google Maps API Key', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\field_api_key',
		'fishing-maps',
		'fishing_gmaps_api'
	);

	\add_settings_section(
		'fishing_gmaps_display',
		\__('Map Display Settings', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\render_display_section_description',
		'fishing-maps'
	);

	\add_settings_field(
		'default_zoom',
		\__('Default Zoom Level', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\field_default_zoom',
		'fishing-maps',
		'fishing_gmaps_display'
	);

	\add_settings_field(
		'map_type',
		\__('Default Map Type', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\field_map_type',
		'fishing-maps',
		'fishing_gmaps_display'
	);
}
\add_action('admin_init', __NAMESPACE__ . '\register_maps_settings');

/**
 * Render API section description.
 *
 * @since 1.0.1
 *
 * @return void
 */
function render_api_section_description(): void
{
	echo '<p>';
	echo \esc_html__('Configure your Google Maps API key to enable map displays on Area posts.', 'fishing-cpt-plugin');
	echo ' ';
	/* translators: %s: URL to Google Maps Platform documentation */
	echo \wp_kses_post(
		sprintf(
			\__('Learn how to get an API key from the <a href="%s" target="_blank" rel="noopener noreferrer">Google Maps Platform documentation</a>.', 'fishing-cpt-plugin'),
			'https://developers.google.com/maps/documentation/javascript/get-api-key'
		)
	);
	echo '</p>';
}

/**
 * Render display section description.
 *
 * @since 1.0.1
 *
 * @return void
 */
function render_display_section_description(): void
{
	echo '<p>';
	echo \esc_html__('Customize the default appearance of maps on Area posts.', 'fishing-cpt-plugin');
	echo '</p>';
}

/**
 * Sanitize maps settings.
 *
 * @since 1.0.1
 *
 * @param array $input Raw settings input.
 * @return array Sanitized settings.
 */
function sanitize_maps_settings($input): array
{
	$output = [];

	// Sanitize API key
	if (isset($input['api_key'])) {
		$output['api_key'] = \sanitize_text_field($input['api_key']);
	}

	// Validate and sanitize zoom level (1-20)
	if (isset($input['default_zoom'])) {
		$zoom = (int) $input['default_zoom'];
		$output['default_zoom'] = max(1, min(20, $zoom));
	} else {
		$output['default_zoom'] = 12;
	}

	// Validate map type
	$valid_types = ['roadmap', 'satellite', 'hybrid', 'terrain'];
	if (isset($input['map_type']) && in_array($input['map_type'], $valid_types, true)) {
		$output['map_type'] = $input['map_type'];
	} else {
		$output['map_type'] = 'roadmap';
	}

	// If API key was provided and changed, add admin notice for verification
	$previous_settings = \get_option('fishing_gmaps_settings', []);
	$previous_api_key = isset($previous_settings['api_key']) ? $previous_settings['api_key'] : '';

	if (! empty($output['api_key']) && $output['api_key'] !== $previous_api_key) {
		\add_settings_error(
			'fishing_gmaps_settings',
			'api_key_updated',
			\__('Google Maps API key has been updated. Please verify it works by viewing an Area post.', 'fishing-cpt-plugin'),
			'info'
		);
	}

	return $output;
}

/**
 * Render API key field.
 *
 * @since 1.0.1
 *
 * @return void
 */
function field_api_key(): void
{
	$options = \get_option('fishing_gmaps_settings', []);
	$value   = $options['api_key'] ?? '';
	?>
	<input
		type="text"
		name="fishing_gmaps_settings[api_key]"
		id="fishing_gmaps_api_key"
		value="<?php echo \esc_attr($value); ?>"
		class="regular-text"
		placeholder="<?php echo \esc_attr__('Enter your Google Maps API key', 'fishing-cpt-plugin'); ?>"
	/>
	<p class="description">
		<?php
		echo \esc_html__('Required for displaying maps on Area posts. Keep this key secure and restrict its usage in Google Cloud Console.', 'fishing-cpt-plugin');
		?>
	</p>
	<?php
}

/**
 * Render default zoom field.
 *
 * @since 1.0.1
 *
 * @return void
 */
function field_default_zoom(): void
{
	$options = \get_option('fishing_gmaps_settings', []);
	$value   = isset($options['default_zoom']) ? (int) $options['default_zoom'] : 12;
	?>
	<input
		type="number"
		name="fishing_gmaps_settings[default_zoom]"
		id="fishing_gmaps_default_zoom"
		value="<?php echo \esc_attr($value); ?>"
		min="1"
		max="20"
		step="1"
	/>
	<p class="description">
		<?php
		echo \esc_html__('Default zoom level for maps (1-20). Lower numbers show larger areas, higher numbers show more detail.', 'fishing-cpt-plugin');
		echo ' ';
		echo \esc_html__('Default: 12', 'fishing-cpt-plugin');
		?>
	</p>
	<?php
}

/**
 * Render map type field.
 *
 * @since 1.0.1
 *
 * @return void
 */
function field_map_type(): void
{
	$options = \get_option('fishing_gmaps_settings', []);
	$value   = isset($options['map_type']) ? $options['map_type'] : 'roadmap';

	$map_types = [
		'roadmap'   => \__('Roadmap', 'fishing-cpt-plugin'),
		'satellite' => \__('Satellite', 'fishing-cpt-plugin'),
		'hybrid'    => \__('Hybrid', 'fishing-cpt-plugin'),
		'terrain'   => \__('Terrain', 'fishing-cpt-plugin'),
	];
	?>
	<select name="fishing_gmaps_settings[map_type]" id="fishing_gmaps_map_type">
		<?php foreach ($map_types as $type => $label) : ?>
			<option value="<?php echo \esc_attr($type); ?>" <?php \selected($value, $type); ?>>
				<?php echo \esc_html($label); ?>
			</option>
		<?php endforeach; ?>
	</select>
	<p class="description">
		<?php echo \esc_html__('Choose the default map display type for Area posts.', 'fishing-cpt-plugin'); ?>
	</p>
	<?php
}

/**
 * Add Maps Settings submenu page.
 *
 * @since 1.0.1
 *
 * @return void
 */
function add_maps_settings_page(): void
{
	\add_submenu_page(
		'edit.php?post_type=fish',
		\__('Maps Settings', 'fishing-cpt-plugin'),
		\__('Maps Settings', 'fishing-cpt-plugin'),
		'manage_options',
		'fishing-maps',
		__NAMESPACE__ . '\render_maps_settings_page'
	);
}
\add_action('admin_menu', __NAMESPACE__ . '\add_maps_settings_page');

/**
 * Render Maps Settings page.
 *
 * @since 1.0.1
 *
 * @return void
 */
function render_maps_settings_page(): void
{
	// Check user capabilities
	if (! \current_user_can('manage_options')) {
		return;
	}

	// Get current API key status
	$options = \get_option('fishing_gmaps_settings', []);
	$has_api_key = ! empty($options['api_key']);
	?>
	<div class="wrap">
		<h1><?php echo \esc_html(\get_admin_page_title()); ?></h1>

		<?php if (! $has_api_key) : ?>
			<div class="notice notice-warning">
				<p>
					<strong><?php echo \esc_html__('Google Maps API Key Required', 'fishing-cpt-plugin'); ?></strong>
				</p>
				<p>
					<?php
					echo \esc_html__('To display maps on Area posts, you need to configure a Google Maps API key below.', 'fishing-cpt-plugin');
					?>
				</p>
			</div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php
			\settings_fields('fishing_gmaps_settings');
			\do_settings_sections('fishing-maps');
			\submit_button();
			?>
		</form>

		<?php if ($has_api_key) : ?>
			<div class="card">
				<h2><?php echo \esc_html__('Testing Your Configuration', 'fishing-cpt-plugin'); ?></h2>
				<p>
					<?php
					echo \esc_html__('Your Google Maps API key is configured. To test it:', 'fishing-cpt-plugin');
					?>
				</p>
				<ol>
					<li><?php echo \esc_html__('Create or edit an Area post', 'fishing-cpt-plugin'); ?></li>
					<li><?php echo \esc_html__('Add latitude, longitude, or address in the custom fields', 'fishing-cpt-plugin'); ?></li>
					<li><?php echo \esc_html__('View the Area post on the frontend to see the map', 'fishing-cpt-plugin'); ?></li>
				</ol>
				<p>
					<?php
					echo \esc_html__('If the map does not appear, check your browser console for errors and verify your API key has the Maps JavaScript API enabled in Google Cloud Console.', 'fishing-cpt-plugin');
					?>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<?php
}
