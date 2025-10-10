<?php

/**
 * Title: Home Hero (Fishing Adventures)
 * Slug: bfa/home-hero
 * Categories: banner, hero, featured
 * Keywords: hero, fishing, banner, intro
 * Viewport width: 1400
 * Description: Large cover hero introducing Brandon’s Fishing Adventures with CTA buttons.
 *
 * @package WordPress
 * @subpackage Brandon_Fishing_Adventures
 * @since bfa 1.0
 */
?>
<!-- wp:cover {"dimRatio":40,"overlayColor":"primary","minHeight":480,"contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);min-height:480px">
	<span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-40"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-group">
			<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e("Brandon’s Fishing Adventures", 'bfa'); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"><?php echo esc_html_x('Guided river & lake experiences for every angler level.', 'Hero subheading', 'bfa'); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"burnt-cta","textColor":"contrast","className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-contrast-color has-burnt-cta-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url(home_url('/book-now/')); ?>"><?php esc_html_e('Book a Trip', 'bfa'); ?></a></div>
				<!-- /wp:button -->
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('Trip Reports', 'bfa'); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
			<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size"><?php echo esc_html_x('Catch & release focused. 12+ prime waters.', 'Hero micro line', 'bfa'); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->