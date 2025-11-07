<?php
/**
 * Title: Section Style - Gallery
 * Slug: lsx-demo-theme/section-style-gallery
 * Categories: gallery, featured
 * Keywords: gallery, section, fishing, images
 * Viewport width: 1400
 * Description: Gallery section pattern demonstrating the fishing-gallery-section block style with consistent padding and spacing for image layouts.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-85","bottom":"var:preset|spacing|spacing-85","left":"var:preset|spacing|spacing-50","right":"var:preset|spacing|spacing-50"},"blockGap":"var:preset|spacing|spacing-60"}},"backgroundColor":"surface","textColor":"text","layout":{"type":"constrained"},"className":"is-style-fishing-gallery-section"} -->
<div class="wp-block-group alignfull is-style-fishing-gallery-section has-text-color has-surface-background-color has-background" style="padding-top:var(--wp--preset--spacing--spacing-85);padding-right:var(--wp--preset--spacing--spacing-50);padding-bottom:var(--wp--preset--spacing--spacing-85);padding-left:var(--wp--preset--spacing--spacing-50)">
	<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"h2"} -->
	<h2 class="wp-block-heading has-text-align-center has-h-2-font-size"><?php esc_html_e( 'Recent Catches', 'fishing-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php esc_html_e( 'Explore our collection of memorable fishing moments and trophy catches from rivers across KZN.', 'fishing-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:gallery {"columns":3,"linkTo":"none","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|spacing-50","left":"var:preset|spacing|spacing-50"}}}} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped">
		<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img alt="<?php esc_attr_e( 'Largemouth bass catch', 'fishing-theme' ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img alt="<?php esc_attr_e( 'Smallmouth bass catch', 'fishing-theme' ); ?>"/></figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img alt="<?php esc_attr_e( 'Yellowfish catch', 'fishing-theme' ); ?>"/></figure>
		<!-- /wp:image -->
	</figure>
	<!-- /wp:gallery -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|spacing-60"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--spacing-60)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'View Full Gallery', 'fishing-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
