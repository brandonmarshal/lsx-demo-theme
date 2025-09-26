<?php
/**
 * Title: Fish Gallery
 * Slug: lsx-demo-theme/gallery-fish
 * Categories: lsx_demo_theme_fish, gallery
 * Keywords: fish, gallery, images, habitat, photos
 * Viewport width: 1400
 * Description: A responsive image gallery showcasing fish in their natural habitat with proper captions and accessibility.
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */

?>

<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--50)">
	<!-- wp:heading {"textAlign":"center","level":2,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"textColor":"base","fontSize":"large","fontFamily":"manrope"} -->
	<h2 class="wp-block-heading has-text-align-center has-base-color has-text-color has-manrope-font-family has-large-font-size" style="margin-bottom:var(--wp--preset--spacing--50)"><?php echo esc_html_x( 'Gallery', 'Fish gallery section heading', 'lsx-demo-theme' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"neutral","fontSize":"x-small"} -->
	<p class="has-text-align-center has-neutral-color has-text-color has-x-small-font-size" style="margin-bottom:var(--wp--preset--spacing--60)"><?php echo esc_html_x( 'View images of this species in their natural habitat and various environments', 'Fish gallery description', 'lsx-demo-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:gallery {"columns":3,"linkTo":"media","sizeSlug":"large","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
	<figure class="wp-block-gallery alignwide has-nested-images columns-3 is-cropped">
		<!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
		<figure class="wp-block-image size-large">
			<a href="<?php echo esc_url( get_theme_file_uri( '/assets/images/dallas-creek-square.webp' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/dallas-creek-square.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Smallmouth Yellowfish swimming in clear river water showing distinctive golden coloration', 'Alt text for fish gallery image 1', 'lsx-demo-theme' ); ?>"/>
			</a>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Adult in natural river habitat', 'Caption for fish gallery image 1', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
		<figure class="wp-block-image size-large">
			<a href="<?php echo esc_url( get_theme_file_uri( '/assets/images/coral-square.webp' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/coral-square.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Close-up view of Smallmouth Yellowfish head showing detailed features and markings', 'Alt text for fish gallery image 2', 'lsx-demo-theme' ); ?>"/>
			</a>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Detailed view of head and markings', 'Caption for fish gallery image 2', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
		<figure class="wp-block-image size-large">
			<a href="<?php echo esc_url( get_theme_file_uri( '/assets/images/flower-meadow-square.webp' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/flower-meadow-square.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Juvenile Smallmouth Yellowfish in shallow water showing different coloration patterns', 'Alt text for fish gallery image 3', 'lsx-demo-theme' ); ?>"/>
			</a>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Juvenile specimen in shallow waters', 'Caption for fish gallery image 3', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
		<figure class="wp-block-image size-large">
			<a href="<?php echo esc_url( get_theme_file_uri( '/assets/images/marshland-birds-square.webp' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/marshland-birds-square.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Rocky river habitat where Smallmouth Yellowfish are commonly found', 'Alt text for fish gallery image 4', 'lsx-demo-theme' ); ?>"/>	
			</a>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Typical rocky river habitat', 'Caption for fish gallery image 4', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
		<figure class="wp-block-image size-large">
			<a href="<?php echo esc_url( get_theme_file_uri( '/assets/images/parthenon-square.webp' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/parthenon-square.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'School of Smallmouth Yellowfish swimming together in their natural environment', 'Alt text for fish gallery image 5', 'lsx-demo-theme' ); ?>"/>
			</a>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'School behavior in natural environment', 'Caption for fish gallery image 5', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->

		<!-- wp:image {"sizeSlug":"large","linkDestination":"media"} -->
		<figure class="wp-block-image size-large">
			<a href="<?php echo esc_url( get_theme_file_uri( '/assets/images/vash-gon-square.webp' ) ); ?>">
				<img src="<?php echo esc_url( get_theme_file_uri( '/assets/images/vash-gon-square.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'Angler holding a caught Smallmouth Yellowfish demonstrating proper catch and release technique', 'Alt text for fish gallery image 6', 'lsx-demo-theme' ); ?>"/>
			</a>
			<figcaption class="wp-element-caption"><?php echo esc_html_x( 'Proper catch and release technique', 'Caption for fish gallery image 6', 'lsx-demo-theme' ); ?></figcaption>
		</figure>
		<!-- /wp:image -->
	</figure>
	<!-- /wp:gallery -->

	<!-- wp:spacer {"height":"var:preset|spacing|50"} -->
	<div style="height:var(--wp--preset--spacing--50)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30"},"border":{"radius":"8px","color":"var:preset|color|accent-2","width":"1px"}},"backgroundColor":"light","layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-border-color has-light-background-color has-background" style="border-color:var(--wp--preset--color--accent-2);border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
		<!-- wp:heading {"level":4,"style":{"typography":{"fontWeight":"700"}},"textColor":"base","fontSize":"medium","fontFamily":"manrope"} -->
		<h4 class="wp-block-heading has-base-color has-text-color has-manrope-font-family has-medium-font-size" style="font-weight:700"><?php echo esc_html_x( 'Photography Tips', 'Photography tips section heading', 'lsx-demo-theme' ); ?></h4>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontWeight":"400"}},"textColor":"neutral","fontSize":"x-small"} -->
		<p class="has-neutral-color has-text-color has-x-small-font-size" style="font-weight:400"><?php echo esc_html_x( 'Best photographed in shallow, clear water during early morning or late afternoon. Use polarizing filters to reduce glare and capture the golden coloration. Always practice ethical photography and minimize disturbance to the fish and their habitat.', 'Photography tips text', 'lsx-demo-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->