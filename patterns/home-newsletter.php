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
	<form action="#" method="post" class="newsletter-signup" style="display:flex;flex-wrap:wrap;justify-content:center;gap:.75rem">
		<label class="screen-reader-text" for="nl-email"><?php echo esc_html_x('Email address', 'Newsletter field label', 'bfa'); ?></label>
		<input id="nl-email" name="email" type="email" required placeholder="<?php echo esc_attr_x('you@example.com', 'Email placeholder', 'bfa'); ?>" style="padding:.75rem 1rem;min-width:250px;" />
		<button type="submit" style="padding:.75rem 1.25rem;background:var(--wp--preset--color--burnt-cta);color:var(--wp--preset--color--contrast);border:none;border-radius:4px;"><?php esc_html_e('Sign Up', 'bfa'); ?></button>
	</form>
</div>
<!-- /wp:group -->