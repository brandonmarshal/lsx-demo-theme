<?php
/**
 * Title: Section Style - Hero
 * Slug: lsx-demo-theme/section-style-hero
 * Categories: banner, hero, featured
 * Keywords: hero, section, fishing, river
 * Viewport width: 1400
 * Description: Hero section pattern demonstrating the fishing-hero block style with River Blue background, large padding, and centered content layout.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-95","bottom":"var:preset|spacing|spacing-95","left":"var:preset|spacing|spacing-60","right":"var:preset|spacing|spacing-60"}}},"backgroundColor":"river-blue","textColor":"heading","layout":{"type":"constrained"},"className":"is-style-fishing-hero"} -->
<div class="wp-block-group alignfull is-style-fishing-hero has-heading-color has-river-blue-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--spacing-95);padding-right:var(--wp--preset--spacing--spacing-60);padding-bottom:var(--wp--preset--spacing--spacing-95);padding-left:var(--wp--preset--spacing--spacing-60)">
	<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"h1"} -->
	<h1 class="wp-block-heading has-text-align-center has-h-1-font-size"><?php esc_html_e( 'Explore River Fishing Adventures', 'lsx-demo-theme' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","fontSize":"lead"} -->
	<p class="has-text-align-center has-lead-font-size"><?php esc_html_e( 'Discover pristine waters, abundant fish species, and unforgettable experiences across KwaZulu-Natal\'s premier fishing destinations.', 'lsx-demo-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|spacing-60"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--spacing-60)">
		<!-- wp:button {"backgroundColor":"burnt-orange","textColor":"heading"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-heading-color has-burnt-orange-background-color has-text-color has-background wp-element-button"><?php esc_html_e( 'Book Your Trip', 'lsx-demo-theme' ); ?></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"className":"is-style-outline"} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button"><?php esc_html_e( 'View Fishing Reports', 'lsx-demo-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
