<?php

/**
 * Title: Season Spotlight
 * Slug: bfa/home-season-spotlight
 * Categories: call-to-action, featured
 * Keywords: season, spotlight, banner
 * Viewport width: 1400
 * Description: Highlight for the current seasonal fishing focus.
 *
 * @package WordPress
 * @subpackage Brandon_Fishing_Adventures
 * @since bfa 1.0
 */
?>
<!-- wp:group {"style":{"border":{"width":"1px","color":"var:preset|color|neutral-300","radius":"10px"},"spacing":{"padding":"var:preset|spacing|50","blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border:1px solid var(--wp--preset--color--neutral-300);border-radius:10px;padding:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Autumn Brown Trout Runs', 'bfa'); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php echo esc_html_x('Pre‑spawn browns are active—prime streamer & nymph action Sept–Nov.', 'Season spotlight description', 'bfa'); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons" style="justify-content:center">
		<!-- wp:button {"backgroundColor":"burnt-cta","textColor":"contrast"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-contrast-color has-burnt-cta-background-color has-text-color has-background wp-element-button" href="<?php echo esc_url(home_url('/book-now/')); ?>"><?php esc_html_e('Secure a Fall Date', 'bfa'); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->