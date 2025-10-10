<?php

/**
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
		<?php
		$stats = [
			[
				'key' => 'bfa_stats_waters_fished',
				'default' => '12',
				'label' => __('Waters Fished', 'bfa'),
			],
			[
				'key' => 'bfa_stats_species',
				'default' => '20+',
				'label' => __('Species', 'bfa'),
			],
			[
				'key' => 'bfa_stats_return_guests',
				'default' => '85%',
				'label' => __('Return Guests', 'bfa'),
			],
			[
				'key' => 'bfa_stats_season_label',
				'default' => __('Year‑Round', 'bfa'),
				'label' => __('Seasons', 'bfa'),
			],
		];
		foreach ( $stats as $stat ) : ?>
			<div class="wp-block-group">
				<strong><?php echo esc_html( get_theme_mod( $stat['key'], $stat['default'] ) ); ?></strong><br>
				<small><?php echo esc_html( $stat['label'] ); ?></small>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- /wp:group -->