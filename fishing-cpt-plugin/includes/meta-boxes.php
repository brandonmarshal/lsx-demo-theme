<?php

/**
 * Standard WordPress Meta Boxes for Fish, Gear, and Areas CPTs.
 *
 * Creates standard WordPress meta boxes to replace ACF field groups.
 * Uses standard post meta storage and WordPress admin interface.
 *
 * @package FishingCPTPlugin
 * @since 1.0.3
 */

namespace FishingCPTPlugin;

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Add meta boxes for all CPTs.
 *
 * @since 1.0.3
 *
 * @return void
 */
function add_meta_boxes(): void
{
	// Fish meta box
	add_meta_box(
		'fish_details_meta_box',
		__('Fish Details', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\render_fish_meta_box',
		'fish',
		'normal',
		'high'
	);

	// Gear meta box
	add_meta_box(
		'gear_details_meta_box',
		__('Gear Details', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\render_gear_meta_box',
		'gear',
		'normal',
		'high'
	);

	// Areas meta box
	add_meta_box(
		'area_details_meta_box',
		__('Area Details', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\render_area_meta_box',
		'area',
		'normal',
		'high'
	);

	// Quick facts meta box for Fish
	add_meta_box(
		'fish_quick_facts_meta_box',
		__('Quick Facts', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\render_fish_quick_facts_meta_box',
		'fish',
		'normal',
		'default'
	);

	// Specifications meta box for Gear
	add_meta_box(
		'gear_specifications_meta_box',
		__('Specifications', 'fishing-cpt-plugin'),
		__NAMESPACE__ . '\render_gear_specifications_meta_box',
		'gear',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', __NAMESPACE__ . '\add_meta_boxes');

/**
 * Render Fish Details meta box.
 *
 * @since 1.0.3
 *
 * @param WP_Post $post Post object.
 * @return void
 */
function render_fish_meta_box($post): void
{
	wp_nonce_field('fish_details_meta_box', 'fish_details_meta_box_nonce');

	$scientific_name = get_post_meta($post->ID, '_scientific_name', true);
	$water_type = get_post_meta($post->ID, '_water_type', true);
	$average_size = get_post_meta($post->ID, '_average_size', true);
	$bait_type = get_post_meta($post->ID, '_bait_type', true);

?>
	<table class="form-table">
		<tr>
			<th scope="row">
				<label for="scientific_name"><?php esc_html_e('Scientific Name', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="scientific_name" name="scientific_name" value="<?php echo esc_attr($scientific_name); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., Oncorhynchus mykiss', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('Enter the scientific (Latin) name for this fish species.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="water_type"><?php esc_html_e('Water Type', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="water_type" name="water_type" value="<?php echo esc_attr($water_type); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., Freshwater, Saltwater, Brackish', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('Specify the type of water this fish inhabits.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="average_size"><?php esc_html_e('Average Size', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="average_size" name="average_size" value="<?php echo esc_attr($average_size); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., 12-18 inches', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('Typical size range for this species.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="bait_type"><?php esc_html_e('Bait Type', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="bait_type" name="bait_type" value="<?php echo esc_attr($bait_type); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., Minnows, Spinners, Flies', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('Common baits or lures used for this species.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
	</table>
<?php
}

/**
 * Render Gear Details meta box.
 *
 * @since 1.0.3
 *
 * @param WP_Post $post Post object.
 * @return void
 */
function render_gear_meta_box($post): void
{
	wp_nonce_field('gear_details_meta_box', 'gear_details_meta_box_nonce');

	$brand = get_post_meta($post->ID, '_brand', true);
	$gear_type = get_post_meta($post->ID, '_gear_type', true);
	$price = get_post_meta($post->ID, '_price', true);

?>
	<table class="form-table">
		<tr>
			<th scope="row">
				<label for="brand"><?php esc_html_e('Brand', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="brand" name="brand" value="<?php echo esc_attr($brand); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., Shimano, Daiwa, Penn', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('Manufacturer or brand name.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="gear_type"><?php esc_html_e('Gear Type', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="gear_type" name="gear_type" value="<?php echo esc_attr($gear_type); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., Spinning Reel, Fly Rod, Tackle Box', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('Type or category of fishing gear.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="price"><?php esc_html_e('Price', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="price" name="price" value="<?php echo esc_attr($price); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., $149.99, $50-200', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('Retail price or price range.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
	</table>
<?php
}

/**
 * Render Area Details meta box.
 *
 * @since 1.0.3
 *
 * @param WP_Post $post Post object.
 * @return void
 */
function render_area_meta_box($post): void
{
	wp_nonce_field('area_details_meta_box', 'area_details_meta_box_nonce');

	$location = get_post_meta($post->ID, '_location', true);
	$weather_conditions = get_post_meta($post->ID, '_weather_conditions', true);
	$catch_success = get_post_meta($post->ID, '_catch_success', true);

?>
	<table class="form-table">
		<tr>
			<th scope="row">
				<label for="location"><?php esc_html_e('Location', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="location" name="location" value="<?php echo esc_attr($location); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., Rocky Mountain National Park', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('General location or region name.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="weather_conditions"><?php esc_html_e('Weather Conditions', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="weather_conditions" name="weather_conditions" value="<?php echo esc_attr($weather_conditions); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., Variable, can be extreme', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('Typical weather patterns in this area.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
		<tr>
			<th scope="row">
				<label for="catch_success"><?php esc_html_e('Catch Success', 'fishing-cpt-plugin'); ?></label>
			</th>
			<td>
				<input type="text" id="catch_success" name="catch_success" value="<?php echo esc_attr($catch_success); ?>" class="regular-text" placeholder="<?php esc_attr_e('e.g., Good in spring and fall', 'fishing-cpt-plugin'); ?>" />
				<p class="description"><?php esc_html_e('General fishing success rate or conditions.', 'fishing-cpt-plugin'); ?></p>
			</td>
		</tr>
	</table>
<?php
}

/**
 * Render Fish Quick Facts meta box.
 *
 * @since 1.0.3
 *
 * @param WP_Post $post Post object.
 * @return void
 */
function render_fish_quick_facts_meta_box($post): void
{
	wp_nonce_field('fish_quick_facts_meta_box', 'fish_quick_facts_meta_box_nonce');

	$quick_facts = get_post_meta($post->ID, '_fish_quick_facts', true);
	if (! is_string($quick_facts)) {
		$quick_facts = '';
	}

?>
	<div id="fish-quick-facts-container">
		<p><?php esc_html_e('Add quick facts about this fish species. Use bullet points (-) for lists. Each line will be displayed as a separate fact.', 'fishing-cpt-plugin'); ?></p>

		<textarea id="fish_quick_facts" name="fish_quick_facts" rows="10" class="large-text" placeholder="<?php esc_attr_e('Example:
- Scientific Name: Oncorhynchus mykiss
- Habitat: Freshwater rivers and lakes
- Average Size: 12-18 inches
- Bait Type: Minnows and spinners', 'fishing-cpt-plugin'); ?>"><?php echo esc_textarea($quick_facts); ?></textarea>

		<p class="description"><?php esc_html_e('Enter each fact on a new line. Use dashes (-) at the beginning of lines to create bullet points.', 'fishing-cpt-plugin'); ?></p>
	</div>
<?php
}

/**
 * Render Gear Specifications meta box.
 *
 * @since 1.0.3
 *
 * @param WP_Post $post Post object.
 * @return void
 */
function render_gear_specifications_meta_box($post): void
{
	wp_nonce_field('gear_specifications_meta_box', 'gear_specifications_meta_box_nonce');

	$specifications = get_post_meta($post->ID, '_gear_specifications', true);
	if (! is_array($specifications)) {
		$specifications = array();
	}

?>
	<div id="gear-specifications-container">
		<p><?php esc_html_e('Add detailed specifications for this gear item.', 'fishing-cpt-plugin'); ?></p>

		<table class="widefat" id="gear-specifications-table">
			<thead>
				<tr>
					<th><?php esc_html_e('Specification', 'fishing-cpt-plugin'); ?></th>
					<th><?php esc_html_e('Value', 'fishing-cpt-plugin'); ?></th>
					<th><?php esc_html_e('Unit', 'fishing-cpt-plugin'); ?></th>
					<th><?php esc_html_e('Actions', 'fishing-cpt-plugin'); ?></th>
				</tr>
			</thead>
			<tbody id="gear-specifications-rows">
				<?php foreach ($specifications as $index => $spec) : ?>
					<tr class="spec-row">
						<td>
							<input type="text" name="gear_specifications[<?php echo esc_attr($index); ?>][name]" value="<?php echo esc_attr($spec['name'] ?? ''); ?>" placeholder="<?php esc_attr_e('e.g., Length, Weight, Material', 'fishing-cpt-plugin'); ?>" class="regular-text" />
						</td>
						<td>
							<input type="text" name="gear_specifications[<?php echo esc_attr($index); ?>][value]" value="<?php echo esc_attr($spec['value'] ?? ''); ?>" placeholder="<?php esc_attr_e('e.g., 7, 200, Carbon Fiber', 'fishing-cpt-plugin'); ?>" class="regular-text" />
						</td>
						<td>
							<select name="gear_specifications[<?php echo esc_attr($index); ?>][unit]">
								<option value=""><?php esc_html_e('- None -', 'fishing-cpt-plugin'); ?></option>
								<option value="mm" <?php selected($spec['unit'] ?? '', 'mm'); ?>><?php esc_html_e('Millimeters (mm)', 'fishing-cpt-plugin'); ?></option>
								<option value="cm" <?php selected($spec['unit'] ?? '', 'cm'); ?>><?php esc_html_e('Centimeters (cm)', 'fishing-cpt-plugin'); ?></option>
								<option value="m" <?php selected($spec['unit'] ?? '', 'm'); ?>><?php esc_html_e('Meters (m)', 'fishing-cpt-plugin'); ?></option>
								<option value="ft" <?php selected($spec['unit'] ?? '', 'ft'); ?>><?php esc_html_e('Feet (ft)', 'fishing-cpt-plugin'); ?></option>
								<option value="in" <?php selected($spec['unit'] ?? '', 'in'); ?>><?php esc_html_e('Inches (in)', 'fishing-cpt-plugin'); ?></option>
								<option value="g" <?php selected($spec['unit'] ?? '', 'g'); ?>><?php esc_html_e('Grams (g)', 'fishing-cpt-plugin'); ?></option>
								<option value="kg" <?php selected($spec['unit'] ?? '', 'kg'); ?>><?php esc_html_e('Kilograms (kg)', 'fishing-cpt-plugin'); ?></option>
								<option value="lbs" <?php selected($spec['unit'] ?? '', 'lbs'); ?>><?php esc_html_e('Pounds (lbs)', 'fishing-cpt-plugin'); ?></option>
								<option value="oz" <?php selected($spec['unit'] ?? '', 'oz'); ?>><?php esc_html_e('Ounces (oz)', 'fishing-cpt-plugin'); ?></option>
							</select>
						</td>
						<td>
							<button type="button" class="button remove-spec"><?php esc_html_e('Remove', 'fishing-cpt-plugin'); ?></button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<p><button type="button" class="button" id="add-gear-spec"><?php esc_html_e('Add Specification', 'fishing-cpt-plugin'); ?></button></p>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			let specIndex = <?php echo count($specifications); ?>;

			$('#add-gear-spec').on('click', function() {
				const rowHtml = `
				<tr class="spec-row">
					<td>
						<input type="text" name="gear_specifications[${specIndex}][name]" placeholder="<?php echo esc_js(__('e.g., Length, Weight, Material', 'fishing-cpt-plugin')); ?>" class="regular-text" />
					</td>
					<td>
						<input type="text" name="gear_specifications[${specIndex}][value]" placeholder="<?php echo esc_js(__('e.g., 7, 200, Carbon Fiber', 'fishing-cpt-plugin')); ?>" class="regular-text" />
					</td>
					<td>
						<select name="gear_specifications[${specIndex}][unit]">
							<option value=""><?php esc_html_e('- None -', 'fishing-cpt-plugin'); ?></option>
							<option value="mm"><?php esc_html_e('Millimeters (mm)', 'fishing-cpt-plugin'); ?></option>
							<option value="cm"><?php esc_html_e('Centimeters (cm)', 'fishing-cpt-plugin'); ?></option>
							<option value="m"><?php esc_html_e('Meters (m)', 'fishing-cpt-plugin'); ?></option>
							<option value="ft"><?php esc_html_e('Feet (ft)', 'fishing-cpt-plugin'); ?></option>
							<option value="in"><?php esc_html_e('Inches (in)', 'fishing-cpt-plugin'); ?></option>
							<option value="g"><?php esc_html_e('Grams (g)', 'fishing-cpt-plugin'); ?></option>
							<option value="kg"><?php esc_html_e('Kilograms (kg)', 'fishing-cpt-plugin'); ?></option>
							<option value="lbs"><?php esc_html_e('Pounds (lbs)', 'fishing-cpt-plugin'); ?></option>
							<option value="oz"><?php esc_html_e('Ounces (oz)', 'fishing-cpt-plugin'); ?></option>
						</select>
					</td>
					<td>
						<button type="button" class="button remove-spec"><?php esc_html_e('Remove', 'fishing-cpt-plugin'); ?></button>
					</td>
				</tr>
			`;
				$('#gear-specifications-rows').append(rowHtml);
				specIndex++;
			});

			$(document).on('click', '.remove-spec', function() {
				$(this).closest('.spec-row').remove();
			});
		});
	</script>
<?php
}

/**
 * Save meta box data.
 *
 * @since 1.0.3
 *
 * @param int $post_id Post ID.
 * @return void
 */
function save_meta_boxes($post_id): void
{
	// Check if this is an autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check user permissions
	if (! current_user_can('edit_post', $post_id)) {
		return;
	}

	$post_type = get_post_type($post_id);

	// Save Fish meta data
	if ($post_type === 'fish') {
		// Verify nonces
		if (
			! isset($_POST['fish_details_meta_box_nonce']) ||
			! wp_verify_nonce($_POST['fish_details_meta_box_nonce'], 'fish_details_meta_box')
		) {
			return;
		}

		if (
			! isset($_POST['fish_quick_facts_meta_box_nonce']) ||
			! wp_verify_nonce($_POST['fish_quick_facts_meta_box_nonce'], 'fish_quick_facts_meta_box')
		) {
			return;
		}

		// Save basic fields
		$fields = array('scientific_name', 'water_type', 'average_size', 'bait_type');
		foreach ($fields as $field) {
			if (isset($_POST[$field])) {
				update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
			}
		}

		// Save quick facts
		if (isset($_POST['fish_quick_facts'])) {
			update_post_meta($post_id, '_fish_quick_facts', wp_kses_post($_POST['fish_quick_facts']));
		}
	}

	// Save Gear meta data
	if ($post_type === 'gear') {
		// Verify nonce
		if (
			! isset($_POST['gear_details_meta_box_nonce']) ||
			! wp_verify_nonce($_POST['gear_details_meta_box_nonce'], 'gear_details_meta_box')
		) {
			return;
		}

		if (
			! isset($_POST['gear_specifications_meta_box_nonce']) ||
			! wp_verify_nonce($_POST['gear_specifications_meta_box_nonce'], 'gear_specifications_meta_box')
		) {
			return;
		}

		// Save basic fields
		$fields = array('brand', 'gear_type', 'price');
		foreach ($fields as $field) {
			if (isset($_POST[$field])) {
				update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
			}
		}

		// Save specifications
		if (isset($_POST['gear_specifications']) && is_array($_POST['gear_specifications'])) {
			$specifications = array();
			foreach ($_POST['gear_specifications'] as $spec) {
				if (! empty($spec['name']) && ! empty($spec['value'])) {
					$specifications[] = array(
						'name'  => sanitize_text_field($spec['name']),
						'value' => sanitize_text_field($spec['value']),
						'unit'  => sanitize_text_field($spec['unit'] ?? ''),
					);
				}
			}
			update_post_meta($post_id, '_gear_specifications', $specifications);
		}
	}

	// Save Area meta data
	if ($post_type === 'area') {
		// Verify nonce
		if (
			! isset($_POST['area_details_meta_box_nonce']) ||
			! wp_verify_nonce($_POST['area_details_meta_box_nonce'], 'area_details_meta_box')
		) {
			return;
		}

		// Save basic fields
		$fields = array('location', 'weather_conditions', 'catch_success');
		foreach ($fields as $field) {
			if (isset($_POST[$field])) {
				update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
			}
		}
	}
}
add_action('save_post', __NAMESPACE__ . '\save_meta_boxes');
