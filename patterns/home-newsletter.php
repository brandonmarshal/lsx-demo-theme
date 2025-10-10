<?php

/**
 * Title: Newsletter Signup
 * Slug: bfa/home-newsletter
 * Categories: call-to-action, forms
 * Keywords: newsletter, signup, email
 * Viewport width: 1400
 * Description: Simple newsletter signup form placeholder section.
 *
 * @package WordPress
 * @subpackage Brandon_Fishing_Adventures
 * @since bfa 1.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Get River Updates & Gear Tips', 'bfa'); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php echo esc_html_x('One concise monthly email. No spam. Unsubscribe anytime.', 'Newsletter intro', 'bfa'); ?></p>
	<!-- /wp:paragraph -->
	<!-- Replace the shortcode below with your newsletter plugin's form shortcode, e.g. [newsletter_form], [mailpoet_form id="1"], [wpforms id="123"], etc. -->
	<?php echo do_shortcode('[newsletter_form]'); ?>
</div>
<!-- /wp:group -->