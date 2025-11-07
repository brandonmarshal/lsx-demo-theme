<?php
/**
 * Title: Written by
 * Slug: fishing-theme/hidden-written-by
 * Inserter: no
 *
 * @package    WordPress
 * @subpackage Twenty_Twenty_Five
 * @since      lsx-demo-theme 1.0
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"0.2em","margin":{"bottom":"var:preset|spacing|60"}}},"textColor":"accent-4","fontSize":"small","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group has-accent-4-color has-text-color has-link-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Written by ', 'fishing-theme' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:post-author-name {"isLink":true} /-->
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'in', 'fishing-theme' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:post-terms {"term":"category","style":{"typography":{"fontWeight":"300"}}} /-->
</div>
<!-- /wp:group -->
