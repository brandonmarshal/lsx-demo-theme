<?php
/**
 * Title: Fishing FAQs
 * Slug: lsx-demo-theme/text-fishing-faqs
 * Categories: text, about, lsx_demo_theme_fish
 * Keywords: faq, about, frequently asked questions, fishing, contact
 * Viewport width: 1400
 * Description: A FAQs section with fishing-specific questions and answers for the contact page.
 *
 * @package    WordPress
 * @subpackage Twenty_Twenty_Five
 * @since      lsx-demo-theme 1.0
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
		<!-- wp:heading {"fontSize":"x-large"} -->
		<h2 class="wp-block-heading has-x-large-font-size"><?php echo esc_html_x( 'Frequently Asked Questions', 'Heading of the fishing FAQs pattern.', 'fishing-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-columns">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--accent-6);border-top-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php echo esc_html_x( 'How can I learn more about the fish you catch?', 'FAQ question about fish guide', 'fishing-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php echo esc_html_x( 'Check out the Fish Guide for detailed profiles of each species, including habitat information, best fishing techniques, and conservation status.', 'FAQ answer about fish guide', 'fishing-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--accent-6);border-top-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php echo esc_html_x( 'What\'s the best time to fish in KwaZulu-Natal?', 'FAQ question about fishing times', 'fishing-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php echo esc_html_x( 'Early morning and late afternoon are generally the most productive times. Spring and early summer offer the best action for most species, especially yellowfish. Water temperature and weather conditions play a big role in fish activity.', 'FAQ answer about fishing times', 'fishing-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--accent-6);border-top-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php echo esc_html_x( 'Do you offer guided fishing trips?', 'FAQ question about guided trips', 'fishing-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php echo esc_html_x( 'Not yet, but I\'m happy to share tips for your next adventure. Feel free to contact me with specific questions about fishing locations, techniques, or gear recommendations.', 'FAQ answer about guided trips', 'fishing-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"style":{"border":{"top":{"color":"var:preset|color|accent-6","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--accent-6);border-top-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
					<!-- wp:heading {"level":3} -->
					<h3 class="wp-block-heading"><?php echo esc_html_x( 'Are yellowfish protected species?', 'FAQ question about conservation', 'fishing-theme' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph -->
					<p><?php echo esc_html_x( 'Yes, all yellowfish species are protected in South Africa. They must be released immediately after being caught. This helps preserve these magnificent native fish for future generations.', 'FAQ answer about conservation', 'fishing-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->