<?php

/**
 * Title: Experiences Grid
 * Slug: bfa/home-experiences-grid
 * Categories: featured, columns, about
 * Keywords: trips, experiences, cards
 * Viewport width: 1400
 * Description: Three-card grid highlighting different guided fishing experience types.
 *
 * @package WordPress
 * @subpackage Brandon_Fishing_Adventures
 * @since bfa 1.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|40"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php esc_html_e('Half-Day River Drift', 'bfa'); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html_x('Learn fundamentals & cover productive water.', 'Experience description', 'bfa'); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><a href="<?php echo esc_url(home_url('/half-day-drift/')); ?>"><?php esc_html_e('Learn More →', 'bfa'); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php esc_html_e('Backcountry Trek', 'bfa'); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html_x('Remote wild settings with eager trout.', 'Experience description', 'bfa'); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><a href="<?php echo esc_url(home_url('/backcountry-trek/')); ?>"><?php esc_html_e('Learn More →', 'bfa'); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":3} -->
			<h3 class="wp-block-heading"><?php esc_html_e('Trophy Hunt', 'bfa'); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html_x('Advanced tactics chasing lifetime fish.', 'Experience description', 'bfa'); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><a href="<?php echo esc_url(home_url('/trophy-hunt/')); ?>"><?php esc_html_e('Learn More →', 'bfa'); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->