<?php
/**
 * Fishing Gallery Block - Frontend Render Template
 *
 * Displays image gallery with optional lightbox functionality.
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block content.
 * @var WP_Block $block      Block instance.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get post ID from context or current post.
$post_id = $block->context['postId'] ?? get_the_ID();

// Bail early if no post ID.
if ( ! $post_id ) {
	return;
}

// Get gallery from ACF field.
$gallery = get_field( 'fishing_gallery', $post_id );

// Bail if no images.
if ( ! $gallery || ! is_array( $gallery ) || empty( $gallery ) ) {
	return;
}

// Get block attributes with defaults.
$columns    = $attributes['columns'] ?? 3;
$lightbox   = $attributes['lightbox'] ?? true;
$captions   = $attributes['captions'] ?? true;
$image_size = $attributes['imageSize'] ?? 'large';

// Generate unique ID for this gallery instance.
$gallery_id = 'fishing-gallery-' . $post_id . '-' . uniqid();

// Build wrapper attributes.
$wrapper_attributes = get_block_wrapper_attributes(
	array(
		'class'           => 'fishing-gallery fishing-gallery--columns-' . absint( $columns ),
		'data-gallery-id' => esc_attr( $gallery_id ),
		'data-lightbox'   => $lightbox ? 'true' : 'false',
	)
);
?>

<div <?php echo $wrapper_attributes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="fishing-gallery__grid" style="grid-template-columns: repeat(<?php echo absint( $columns ); ?>, 1fr);">
		<?php foreach ( $gallery as $index => $image ) : ?>
			<?php
			if ( ! $image || ! isset( $image['ID'] ) ) {
				continue;
			}

			$image_id  = $image['ID'];
			$image_url = wp_get_attachment_image_url( $image_id, $image_size );
			$full_url  = wp_get_attachment_image_url( $image_id, 'full' );
			$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			$caption   = wp_get_attachment_caption( $image_id );
			?>

			<figure class="fishing-gallery__item">
				<?php if ( $lightbox ) : ?>
					<a
						href="<?php echo esc_url( $full_url ); ?>"
						class="fishing-gallery__link"
						data-lightbox="<?php echo esc_attr( $gallery_id ); ?>"
						data-index="<?php echo absint( $index ); ?>"
						aria-label="<?php echo esc_attr( sprintf( __( 'View image %d in lightbox', 'fishing-cpt-plugin' ), $index + 1 ) ); ?>"
					>
						<img
							src="<?php echo esc_url( $image_url ); ?>"
							alt="<?php echo esc_attr( $image_alt ); ?>"
							class="fishing-gallery__image"
							loading="lazy"
						/>
					</a>
				<?php else : ?>
					<img
						src="<?php echo esc_url( $image_url ); ?>"
						alt="<?php echo esc_attr( $image_alt ); ?>"
						class="fishing-gallery__image"
						loading="lazy"
					/>
				<?php endif; ?>

				<?php if ( $captions && $caption ) : ?>
					<figcaption class="fishing-gallery__caption">
						<?php echo wp_kses_post( $caption ); ?>
					</figcaption>
				<?php endif; ?>
			</figure>
		<?php endforeach; ?>
	</div>
</div>

<?php if ( $lightbox ) : ?>
	<!-- Lightbox Modal Structure -->
	<div id="<?php echo esc_attr( $gallery_id ); ?>-lightbox" class="fishing-gallery-lightbox" role="dialog" aria-modal="true" aria-hidden="true" aria-label="<?php esc_attr_e( 'Image gallery lightbox', 'fishing-cpt-plugin' ); ?>">
		<div class="fishing-gallery-lightbox__overlay" tabindex="-1"></div>
		<div class="fishing-gallery-lightbox__content">
			<button
				type="button"
				class="fishing-gallery-lightbox__close"
				aria-label="<?php esc_attr_e( 'Close lightbox', 'fishing-cpt-plugin' ); ?>"
			>
				<span aria-hidden="true">&times;</span>
			</button>

			<button
				type="button"
				class="fishing-gallery-lightbox__prev"
				aria-label="<?php esc_attr_e( 'Previous image', 'fishing-cpt-plugin' ); ?>"
			>
				<span aria-hidden="true">&#8249;</span>
			</button>

			<button
				type="button"
				class="fishing-gallery-lightbox__next"
				aria-label="<?php esc_attr_e( 'Next image', 'fishing-cpt-plugin' ); ?>"
			>
				<span aria-hidden="true">&#8250;</span>
			</button>

			<div class="fishing-gallery-lightbox__image-container">
				<img
					src=""
					alt=""
					class="fishing-gallery-lightbox__image"
				/>
			</div>

			<?php if ( $captions ) : ?>
				<div class="fishing-gallery-lightbox__caption"></div>
			<?php endif; ?>

			<div class="fishing-gallery-lightbox__counter" aria-live="polite" aria-atomic="true"></div>
		</div>
	</div>
<?php endif; ?>
