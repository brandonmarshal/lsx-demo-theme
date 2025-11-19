<?php

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

function register_settings(): void
{
	\register_setting('fishing_cpt_settings', 'fishing_cpt_settings', __NAMESPACE__ . '\sanitize_settings');
	\add_settings_section('fishing_cpt_main', \__('Fishing CPT Settings', 'fishing-cpt-plugin'), '__return_false', 'fishing-cpt-plugin');
	\add_settings_field('enabled_cpts', \__('Enabled Post Types', 'fishing-cpt-plugin'), __NAMESPACE__ . '\field_enabled_cpts', 'fishing-cpt-plugin', 'fishing_cpt_main');
	\add_settings_field('posts_per_page', \__('Default Posts Per Page', 'fishing-cpt-plugin'), __NAMESPACE__ . '\field_posts_per_page', 'fishing-cpt-plugin', 'fishing_cpt_main');
}
\add_action('admin_init', __NAMESPACE__ . '\register_settings');

function sanitize_settings($input): array
{
	$output = [];
	$output['enabled_cpts']   = isset($input['enabled_cpts']) && is_array($input['enabled_cpts']) ? array_map('sanitize_key', $input['enabled_cpts']) : ['fish', 'gear', 'area'];
	$output['posts_per_page'] = isset($input['posts_per_page']) ? max(1, (int) $input['posts_per_page']) : 6;
	return $output;
}

function field_enabled_cpts(): void
{
	$options = \get_option('fishing_cpt_settings', []);
	$enabled = $options['enabled_cpts'] ?? ['fish', 'gear', 'area'];
	$cpts    = ['fish' => \__('Fish', 'fishing-cpt-plugin'), 'gear' => \__('Gear', 'fishing-cpt-plugin'), 'area' => \__('Areas', 'fishing-cpt-plugin')];
	foreach ($cpts as $slug => $label) {
		echo '<label><input type="checkbox" name="fishing_cpt_settings[enabled_cpts][]" value="' . \esc_attr($slug) . '" ' . \checked(in_array($slug, $enabled, true), true, false) . '> ' . \esc_html($label) . '</label><br />';
	}
}

function field_posts_per_page(): void
{
	$options = \get_option('fishing_cpt_settings', []);
	$value   = isset($options['posts_per_page']) ? (int) $options['posts_per_page'] : 6;
	echo '<input type="number" min="1" max="50" name="fishing_cpt_settings[posts_per_page]" value="' . \esc_attr($value) . '" />';
}

function add_settings_page(): void
{
	// Add settings page under the existing Fish CPT menu
	\add_submenu_page(
		'edit.php?post_type=fish',
		\__('Fishing CPT Settings', 'fishing-cpt-plugin'),
		\__('Settings', 'fishing-cpt-plugin'),
		'manage_options',
		'fishing-cpt-plugin',
		__NAMESPACE__ . '\render_settings_page'
	);
}
\add_action('admin_menu', __NAMESPACE__ . '\add_settings_page');

function render_settings_page(): void
{ ?>
	<div class="wrap">
		<h1><?php echo \esc_html__('Fishing CPT Settings', 'fishing-cpt-plugin'); ?></h1>
		<form method="post" action="options.php">
			<?php
			\settings_fields('fishing_cpt_settings');
			\do_settings_sections('fishing-cpt-plugin');
			\submit_button();
			?>
		</form>
	</div>
<?php }
