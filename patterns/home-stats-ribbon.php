<?php

/**
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
	<div class="wp-block-group">
 * Categories: featured, columns
 * Keywords: stats, metrics, highlights
 * Viewport width: 1400
 * Description: Four quick fishing metrics displayed in a responsive horizontal ribbon.
 *
 * @package WordPress
 * @subpackage Brandon_Fishing_Adventures
 * @since bfa 1.0
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|50"},"border":{"top":{"width":"1px"},"bottom":{"width":"1px"},"color":"var:preset|color|neutral-300"}},"layout":{"type":"flex","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--neutral-300);border-top-width:1px;border-bottom-color:var(--wp--preset--color--neutral-300);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}}} -->
	<div class="wp-block-group">
		<div class="wp-block-group"><strong><?php echo esc_html( get_theme_mod( 'bfa_stats_waters_fished', '12' ) ); ?></strong><br><small><?php esc_html_e('Waters Fished', 'bfa'); ?></small></div>
		<div class="wp-block-group"><strong><?php echo esc_html( get_theme_mod( 'bfa_stats_species', '20+' ) ); ?></strong><br><small><?php esc_html_e('Species', 'bfa'); ?></small></div>
		<div class="wp-block-group"><strong><?php echo esc_html( get_theme_mod( 'bfa_stats_return_guests', '85%' ) ); ?></strong><br><small><?php esc_html_e('Return Guests', 'bfa'); ?></small></div>
		<div class="wp-block-group"><strong><?php echo esc_html( get_theme_mod( 'bfa_stats_season_label', __( 'Year‑Round', 'bfa' ) ) ); ?></strong><br><small><?php esc_html_e('Seasons', 'bfa'); ?></small></div>
	</div>
</div>
<!-- /wp:group -->