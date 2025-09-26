<?php
/**
 * Title: Related Fish Species
 * Slug: lsx-demo-theme/related-fish
 * Categories: lsx_demo_theme_fish
 * Keywords: fish, related, query, species, cpt
 * Viewport width: 1400
 * Description: A query block displaying related fish species with featured images, titles, and excerpts in a grid layout.
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */

?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|60"}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-light-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"textColor":"base","fontSize":"large","fontFamily":"manrope"} -->
	<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-manrope-font-family has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html_x( 'Related Species', 'Related fish section heading', 'lsx-demo-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"neutral","fontSize":"x-small"} -->
	<p class="has-text-align-center has-neutral-color has-text-color has-x-small-font-size" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo esc_html_x( 'Discover other fish species you might encounter in similar habitats', 'Related fish description', 'lsx-demo-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"fish","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide"} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"grid","columnCount":3}} -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"border":{"radius":"12px","color":"var:preset|color|neutral","width":"1px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-base-background-color has-background" style="border-color:var(--wp--preset--color--neutral);border-width:1px;border-radius:12px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:post-featured-image {"aspectRatio":"16/9","style":{"border":{"radius":{"topLeft":"12px","topRight":"12px","bottomLeft":"0px","bottomRight":"0px"}}}} /-->

				<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
					<!-- wp:post-title {"level":3,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|30"}},"typography":{"fontWeight":"700","lineHeight":"1.3"}},"textColor":"light","fontSize":"medium","fontFamily":"manrope"} /-->

					<!-- wp:post-excerpt {"excerptLength":15,"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|40"}}},"textColor":"neutral","fontSize":"x-small"} /-->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30","margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
					<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
						<!-- wp:post-terms {"term":"species_group","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-2"}}}},"textColor":"accent-2","fontSize":"tiny"} /-->

						<!-- wp:read-more {"content":"<?php echo esc_html_x( 'Learn More', 'Read more link text for related fish', 'lsx-demo-theme' ); ?>","style":{"elements":{"link":{"color":{"text":"var:preset|color|accent-1"}}},"typography":{"fontSize":"0.875rem","fontWeight":"600","textDecoration":"underline"}},"textColor":"accent-1"} /-->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:query-no-results -->
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|40"},"border":{"radius":"8px","color":"var:preset|color|neutral","width":"1px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-base-background-color has-background" style="border-color:var(--wp--preset--color--neutral);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontWeight":"600"}},"textColor":"neutral","fontSize":"medium","fontFamily":"manrope"} -->
				<h3 class="wp-block-heading has-text-align-center has-neutral-color has-text-color has-manrope-font-family has-medium-font-size" style="font-weight:600"><?php echo esc_html_x( 'No Related Species Found', 'No results heading', 'lsx-demo-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","textColor":"neutral","fontSize":"x-small"} -->
				<p class="has-text-align-center has-neutral-color has-text-color has-x-small-font-size"><?php echo esc_html_x( 'Check back later as we continue to add more fish species to our database.', 'No results message', 'lsx-demo-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		<!-- /wp:query-no-results -->
	</div>
	<!-- /wp:query -->

	<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
	<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"accent-1","textColor":"light","style":{"border":{"radius":"6px"},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-light-color has-accent-1-background-color has-text-color has-background wp-element-button" href="/fish/" style="border-radius:6px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e( 'View All Fish Species', 'lsx-demo-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->