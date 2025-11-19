<?php
/**
 * Gallery Field Group for Fish, Gear, and Area CPTs.
 *
 * Registers ACF/SCF gallery field group for image galleries across
 * all fishing-related custom post types.
 *
 * @package FishingCPTPlugin
 * @since 1.0.2
 */

namespace FishingCPTPlugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register gallery field group for Fish, Gear, and Area CPTs.
 *
 * Creates a gallery field for managing multiple images with
 * lightbox display support on the frontend.
 *
 * @since 1.0.2
 *
 * @return void
 */
function register_gallery_fields(): void {
	// Only proceed if ACF/SCF is available.
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// Fishing Gallery Field Group.
	acf_add_local_field_group(
		array(
			'key'                   => 'group_fishing_gallery',
			'title'                 => __( 'Fishing Gallery', 'fishing-cpt-plugin' ),
			'fields'                => array(
				array(
					'key'           => 'field_fishing_gallery',
					'label'         => __( 'Image Gallery', 'fishing-cpt-plugin' ),
					'name'          => 'fishing_gallery',
					'type'          => 'gallery',
					'instructions'  => __( 'Add images to display in the gallery. Images will be shown with lightbox functionality on the frontend.', 'fishing-cpt-plugin' ),
					'required'      => 0,
					'return_format' => 'array',
					'preview_size'  => 'medium',
					'insert'        => 'append',
					'library'       => 'all',
					'min'           => 0,
					'max'           => 50,
					'min_width'     => 0,
					'min_height'    => 0,
					'min_size'      => 0,
					'max_width'     => 0,
					'max_height'    => 0,
					'max_size'      => 0,
					'mime_types'    => 'jpg,jpeg,png,gif,webp',
					'show_in_rest'  => true,
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'fish',
					),
				),
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'gear',
					),
				),
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'area',
					),
				),
			),
			'menu_order'            => 15,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => true,
			'description'           => __( 'Manage image galleries for fishing posts.', 'fishing-cpt-plugin' ),
		)
	);
}
add_action( 'acf/init', __NAMESPACE__ . '\register_gallery_fields' );
