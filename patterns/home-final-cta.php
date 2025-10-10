<?php

/**
 * Title: Final CTA Band
 * Slug: bfa/home-final-cta
 * Categories: call-to-action, featured
 * Keywords: cta, booking
 * Viewport width: 1400
 * Description: Strong closing call to action encouraging booking or inquiry.
 *
 * @package WordPress
 * @subpackage Brandon_Fishing_Adventures
 * @since bfa 1.0
 */
?>
<!-- wp:group {"style":{"color":{"background":"var:preset|color|primary","text":"var:preset|color|neutral-0"},"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-text-color has-background" style="background-color:var(--wp--preset--color--primary);color:var(--wp--preset--color--neutral-0);padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Ready to plan your day on the water?', 'bfa'); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="justify-content:center">
		<!-- wp:button {"backgroundColor":"burnt-cta","textColor":"contrast","className":"is-style-fill"} -->
		<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-contrast-color has-burnt-cta-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url(home_url('/book-now/')); ?>"><?php esc_html_e('Check Availability', 'bfa'); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->