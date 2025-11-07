<?php
/**
 * Title: Section Style - Archive Grid
 * Slug: lsx-demo-theme/section-style-archive
 * Categories: posts, columns
 * Keywords: archive, grid, section, fishing
 * Viewport width: 1400
 * Description: Archive grid section pattern demonstrating the fishing-archive-grid block style with column layout for displaying fish species or blog posts.
 *
 * @package lsx-demo-theme
 * @since 1.0.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-70","bottom":"var:preset|spacing|spacing-70","left":"var:preset|spacing|spacing-50","right":"var:preset|spacing|spacing-50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--spacing-70);padding-right:var(--wp--preset--spacing--spacing-50);padding-bottom:var(--wp--preset--spacing--spacing-70);padding-left:var(--wp--preset--spacing--spacing-50)">
	<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"h2"} -->
	<h2 class="wp-block-heading has-text-align-center has-h-2-font-size"><?php esc_html_e( 'Featured Fish Species', 'fishing-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|spacing-60"}}}} -->
	<p class="has-text-align-center" style="margin-bottom:var(--wp--preset--spacing--spacing-60)"><?php esc_html_e( 'Discover the diverse species found in KwaZulu-Natal\'s waters.', 'fishing-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|spacing-60","left":"var:preset|spacing|spacing-50"}}},"className":"is-style-fishing-archive-grid"} -->
	<div class="wp-block-columns alignwide is-style-fishing-archive-grid">
		<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-50","bottom":"var:preset|spacing|spacing-50","left":"var:preset|spacing|spacing-40","right":"var:preset|spacing|spacing-40"}},"border":{"width":"1px","color":"var:preset|color|muted","radius":"8px"}}} -->
		<div class="wp-block-column" style="border-color:var(--wp--preset--color--muted);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--spacing-50);padding-right:var(--wp--preset--spacing--spacing-40);padding-bottom:var(--wp--preset--spacing--spacing-50);padding-left:var(--wp--preset--spacing--spacing-40)">
			<!-- wp:heading {"level":3,"fontSize":"h3"} -->
			<h3 class="wp-block-heading has-h-3-font-size"><?php esc_html_e( 'Largemouth Bass', 'fishing-theme' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"body"} -->
			<p class="has-body-font-size"><?php esc_html_e( 'Popular sport fish known for aggressive strikes and fighting spirit.', 'fishing-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><a href="#"><?php esc_html_e( 'Learn More →', 'fishing-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-50","bottom":"var:preset|spacing|spacing-50","left":"var:preset|spacing|spacing-40","right":"var:preset|spacing|spacing-40"}},"border":{"width":"1px","color":"var:preset|color|muted","radius":"8px"}}} -->
		<div class="wp-block-column" style="border-color:var(--wp--preset--color--muted);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--spacing-50);padding-right:var(--wp--preset--spacing--spacing-40);padding-bottom:var(--wp--preset--spacing--spacing-50);padding-left:var(--wp--preset--spacing--spacing-40)">
			<!-- wp:heading {"level":3,"fontSize":"h3"} -->
			<h3 class="wp-block-heading has-h-3-font-size"><?php esc_html_e( 'Smallmouth Yellowfish', 'fishing-theme' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"body"} -->
			<p class="has-body-font-size"><?php esc_html_e( 'Native species prized for their strength and beauty in river systems.', 'fishing-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><a href="#"><?php esc_html_e( 'Learn More →', 'fishing-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-50","bottom":"var:preset|spacing|spacing-50","left":"var:preset|spacing|spacing-40","right":"var:preset|spacing|spacing-40"}},"border":{"width":"1px","color":"var:preset|color|muted","radius":"8px"}}} -->
		<div class="wp-block-column" style="border-color:var(--wp--preset--color--muted);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--spacing-50);padding-right:var(--wp--preset--spacing--spacing-40);padding-bottom:var(--wp--preset--spacing--spacing-50);padding-left:var(--wp--preset--spacing--spacing-40)">
			<!-- wp:heading {"level":3,"fontSize":"h3"} -->
			<h3 class="wp-block-heading has-h-3-font-size"><?php esc_html_e( 'Tigerfish', 'fishing-theme' ); ?></h3>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"body"} -->
			<p class="has-body-font-size"><?php esc_html_e( 'Fierce predator offering thrilling battles for experienced anglers.', 'fishing-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><a href="#"><?php esc_html_e( 'Learn More →', 'fishing-theme' ); ?></a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
