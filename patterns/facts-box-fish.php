<?php
/**
 * Title: Fish Facts Box
 * Slug: lsx-demo-theme/facts-box-fish
 * Categories: lsx_demo_theme_fish
 * Keywords: fish, facts, statistics, information, cpt
 * Viewport width: 1400
 * Description: A facts box displaying key information about a fish species in a grid layout with icons and statistics.
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */

?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|60"},"border":{"radius":"12px"}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-light-background-color has-background" style="border-radius:12px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"base","fontSize":"large","fontFamily":"manrope"} -->
	<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-manrope-font-family has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo esc_html_x( 'Key Facts', 'Fish facts section heading', 'lsx-demo-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","color":"var:preset|color|neutral","width":"1px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-base-background-color has-background" style="border-color:var(--wp--preset--color--neutral);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"}},"textColor":"accent-2","fontFamily":"manrope"} -->
				<h3 class="wp-block-heading has-text-align-center has-accent-2-color has-text-color has-manrope-font-family" style="font-size:2rem;font-weight:700"><?php echo esc_html_x( '15-30cm', 'Sample fish size', 'lsx-demo-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600"}},"textColor":"light","fontSize":"small"} -->
				<p class="has-text-align-center has-light-color has-text-color has-small-font-size" style="font-weight:600"><?php echo esc_html_x( 'Average Size', 'Fish size label', 'lsx-demo-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","color":"var:preset|color|neutral","width":"1px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-base-background-color has-background" style="border-color:var(--wp--preset--color--neutral);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"}},"textColor":"accent-1","fontFamily":"manrope"} -->
				<h3 class="wp-block-heading has-text-align-center has-accent-1-color has-text-color has-manrope-font-family" style="font-size:2rem;font-weight:700"><?php echo esc_html_x( 'Apr-Sep', 'Sample fishing season', 'lsx-demo-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600"}},"textColor":"light","fontSize":"small"} -->
				<p class="has-text-align-center has-light-color has-text-color has-small-font-size" style="font-weight:600"><?php echo esc_html_x( 'Best Season', 'Fishing season label', 'lsx-demo-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","color":"var:preset|color|neutral","width":"1px"}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-border-color has-base-background-color has-background" style="border-color:var(--wp--preset--color--neutral);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)">
				<!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"fontSize":"2rem","fontWeight":"700"}},"textColor":"accent-3","fontFamily":"manrope"} -->
				<h3 class="wp-block-heading has-text-align-center has-accent-3-color has-text-color has-manrope-font-family" style="font-size:2rem;font-weight:700"><?php echo esc_html_x( 'Rivers', 'Sample habitat type', 'lsx-demo-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontWeight":"600"}},"textColor":"light","fontSize":"small"} -->
				<p class="has-text-align-center has-light-color has-text-color has-small-font-size" style="font-weight:600"><?php echo esc_html_x( 'Habitat', 'Fish habitat label', 'lsx-demo-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
	<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}},"textColor":"base","fontSize":"medium","fontFamily":"manrope"} -->
				<h4 class="wp-block-heading has-base-color has-text-color has-manrope-font-family has-medium-font-size" style="font-weight:700"><?php echo esc_html_x( 'Conservation Status', 'Conservation section heading', 'lsx-demo-theme' ); ?></h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"neutral","fontSize":"x-small"} -->
				<p class="has-neutral-color has-text-color has-x-small-font-size" style="font-weight:500"><?php echo esc_html_x( 'Near Threatened - Population declining due to habitat loss', 'Sample conservation status', 'lsx-demo-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}},"textColor":"base","fontSize":"medium","fontFamily":"manrope"} -->
				<h4 class="wp-block-heading has-base-color has-text-color has-manrope-font-family has-medium-font-size" style="font-weight:700"><?php echo esc_html_x( 'Best Bait', 'Best bait section heading', 'lsx-demo-theme' ); ?></h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"neutral","fontSize":"x-small"} -->
				<p class="has-neutral-color has-text-color has-x-small-font-size" style="font-weight:500"><?php echo esc_html_x( 'Spinners, flies, worms, and small crustaceans work best', 'Sample bait recommendations', 'lsx-demo-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->