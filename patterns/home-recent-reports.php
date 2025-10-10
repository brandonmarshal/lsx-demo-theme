<?php

/**
 * Title: Recent Trip Reports
 * Slug: bfa/home-recent-reports
 * Categories: query, posts
 * Keywords: recent posts, reports, stories
 * Viewport width: 1400
 * Description: A three‑post query loop showing latest trip reports.
 *
 * @package WordPress
 * @subpackage Brandon_Fishing_Adventures
 * @since bfa 1.0
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center"><?php esc_html_e('Recent Catches & Stories', 'bfa'); ?></h2>
	<!-- /wp:heading -->
	<!-- wp:query {"queryId":17,"query":{"perPage":3,"postType":"post","order":"desc","orderBy":"date","inherit":false},"displayLayout":{"type":"flex","columns":3}} -->
	<div class="wp-block-query">
		<!-- wp:post-template -->
		<div class="wp-block-group bfa-report-card" style="padding:var(--wp--preset--spacing--30)">
			<!-- wp:post-featured-image {"isLink":true,"height":"180px","style":{"border":{"radius":"4px"}}} /-->
			<!-- wp:post-title {"level":3,"isLink":true} /-->
			<!-- wp:post-excerpt {"moreText":"Read Report","excerptLength":18} /-->
		</div>
		<!-- /wp:post-template -->
		<!-- wp:query-no-results -->
		<p class="has-text-align-center"><?php esc_html_e('No reports yet.', 'bfa'); ?></p>
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->
	<!-- wp:paragraph {"align":"center","className":"has-small-font-size"} -->
	<p class="has-text-align-center has-small-font-size"><a href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('View All Trip Reports →', 'bfa'); ?></a></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->