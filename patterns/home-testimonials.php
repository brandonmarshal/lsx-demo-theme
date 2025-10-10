<?php

/**
 * Title: Single Testimonial Highlight
 * Slug: bfa/home-testimonial
 * Categories: testimonials
 * Keywords: testimonial, quote
 * Viewport width: 1400
 * Description: A simple highlighted testimonial section.
 *
 * @package WordPress
 * @subpackage Brandon_Fishing_Adventures
 * @since bfa 1.0
 */
?>
<!-- wp:group {"style":{"color":{"background":"var:preset|color|primary","text":"var:preset|color|neutral-0"},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-text-color has-background" style="background-color:var(--wp--preset--color--primary);color:var(--wp--preset--color--neutral-0);padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"align":"center","fontSize":"large"} -->
	<p class="has-text-align-center has-large-font-size"><em><?php echo esc_html_x('“Best guided trip—patient teaching and unforgettable water.”', 'Sample testimonial', 'bfa'); ?></em></p>
	<!-- /wp:paragraph -->
	<!-- wp:paragraph {"align":"center","className":"has-small-font-size"} -->
	<p class="has-text-align-center has-small-font-size">— <?php esc_html_e('Alex R.', 'bfa'); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->