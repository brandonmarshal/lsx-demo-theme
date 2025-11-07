<?php
/**
 * Title: 404
 * Slug: fishing-theme/hidden-404
 * Inserter: no
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Five
 * @since Fishing Theme 1.0
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:0;padding-left:0">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:image {"scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/404-image.webp" alt="<?php echo esc_attr_x( 'Small totara tree on ridge above Long Point', 'image description', 'fishing-theme' ); ?>" style="object-fit:cover"/>
			</figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"bottom"} -->
		<div class="wp-block-column is-vertically-aligned-bottom">
			<!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"level":1} -->
				<h1 class="wp-block-heading">
					<?php echo esc_html_x( 'Page not found', '404 error message', 'fishing-theme' ); ?>
				</h1>
				<!-- /wp:heading -->
				<!-- wp:paragraph -->
				<p><?php echo esc_html_x( 'The page you are looking for doesn\'t exist, or it has been moved. Please try searching using the form below.', '404 error message', 'fishing-theme' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:pattern {"slug":"fishing-theme/hidden-search"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
