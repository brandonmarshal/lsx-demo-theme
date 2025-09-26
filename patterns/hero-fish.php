<?php
/**
 * Title: Fish Hero Section
 * Slug: lsx-demo-theme/hero-fish
 * Categories: lsx_demo_theme_fish, banner
 * Keywords: fish, hero, banner, cpt, species
 * Viewport width: 1400
 * Description: A hero section designed for Fish CPT pages with large featured image, species name, and call-to-action.
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */

?>

<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( '/assets/images/dallas-creek-square.webp' ) ); ?>","alt":"<?php echo esc_attr_x( 'Beautiful fish swimming in clear water', 'Alt text for fish hero image', 'lsx-demo-theme' ); ?>","dimRatio":30,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.3},"minHeight":600,"minHeightUnit":"px","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"textColor":"light","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull has-light-color has-text-color has-custom-content-position is-position-center-center" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50);min-height:600px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-30 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="<?php echo esc_attr_x( 'Beautiful fish swimming in clear water', 'Alt text for fish hero image', 'lsx-demo-theme' ); ?>" src="<?php echo esc_url( get_theme_file_uri( '/assets/images/dallas-creek-square.webp' ) ); ?>" style="object-position:50% 30%" data-object-fit="cover" data-object-position="50% 30%"/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"align":"wide","layout":{"type":"constrained","justifyContent":"center"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"large","fontFamily":"manrope"} -->
			<h1 class="wp-block-heading has-text-align-center has-manrope-font-family has-large-font-size"><?php echo esc_html_x( 'Smallmouth Yellowfish', 'Sample fish species name', 'lsx-demo-theme' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.25rem"}},"textColor":"light"} -->
			<p class="has-text-align-center has-light-color has-text-color" style="font-size:1.25rem"><?php echo esc_html_x( 'Labeobarbus aeneus', 'Sample scientific name', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
			<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.1rem","lineHeight":"1.6"}},"textColor":"light"} -->
			<p class="has-text-align-center has-light-color has-text-color" style="font-size:1.1rem;line-height:1.6"><?php echo esc_html_x( 'A resilient endemic species found in the fast-flowing rivers of South Africa. Known for their distinctive golden coloration and fighting spirit when hooked.', 'Sample fish description', 'lsx-demo-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
			<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"accent-2","textColor":"base","style":{"border":{"radius":"6px"},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-accent-2-background-color has-text-color has-background wp-element-button" style="border-radius:6px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e( 'View Fish Details', 'lsx-demo-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"backgroundColor":"transparent","textColor":"light","style":{"border":{"color":"var:preset|color|light","width":"2px","radius":"6px"},"spacing":{"padding":{"left":"var:preset|spacing|60","right":"var:preset|spacing|60","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}}} -->
				<div class="wp-block-button"><a class="wp-block-button__link has-light-color has-transparent-background-color has-text-color has-background has-border-color wp-element-button" style="border-color:var(--wp--preset--color--light);border-width:2px;border-radius:6px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--60)"><?php esc_html_e( 'Back to Fish Archive', 'lsx-demo-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->