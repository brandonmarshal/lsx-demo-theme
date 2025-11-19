<?php
/**
 * Template for displaying single Fish posts.
 *
 * @package FishingCPTPlugin
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="primary" class="site-main" role="main">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> aria-labelledby="post-title-<?php the_ID(); ?>">
			<header class="entry-header">
				<h1 id="post-title-<?php the_ID(); ?>"><?php echo esc_html( get_the_title() ); ?></h1>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
				
				<?php
				// Display structured quick facts if available (new repeater field).
				if ( function_exists( 'Fishing_CPT\display_fish_quick_facts' ) ) {
					Fishing_CPT\display_fish_quick_facts( get_the_ID() );
				}
				
				// Fallback: Display legacy fish facts if no structured facts are available.
				$facts_json = get_post_meta( get_the_ID(), 'fish_facts', true );
				$facts      = json_decode( $facts_json, true );
				
				// Only show legacy facts if new structured facts are not available.
				$has_new_facts    = function_exists( 'get_field' ) && get_field( 'fish_quick_facts', get_the_ID() );
				$has_legacy_facts = ! empty( $facts ) && is_array( $facts );

				if ( ! $has_new_facts && $has_legacy_facts ) :
					?>
					<div class="fish-facts-legacy">
						<h2><?php esc_html_e( 'Facts', 'fishing-cpt-plugin' ); ?></h2>
						<ul class="fish-facts" aria-label="<?php esc_attr_e( 'Fish facts', 'fishing-cpt-plugin' ); ?>" role="list">
							<?php foreach ( $facts as $fact ) : ?>
								<li><?php echo esc_html( $fact ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php
				endif;
				
				// Display basic fish metadata.
				$water_type      = get_post_meta( get_the_ID(), 'water_type', true );
				$average_size    = get_post_meta( get_the_ID(), 'average_size', true );
				$bait_type       = get_post_meta( get_the_ID(), 'bait_type', true );
				$scientific_name = get_post_meta( get_the_ID(), 'scientific_name', true );
				
				if ( $water_type || $average_size || $bait_type || $scientific_name ) :
					?>
					<div class="fish-meta-section">
						<h2><?php esc_html_e( 'Fish Details', 'fishing-cpt-plugin' ); ?></h2>
						<ul class="fish-meta" role="list" aria-label="<?php esc_attr_e( 'Fish basic information', 'fishing-cpt-plugin' ); ?>">
							<?php if ( $scientific_name ) : ?>
								<li>
									<strong><?php esc_html_e( 'Scientific Name:', 'fishing-cpt-plugin' ); ?></strong> 
									<em><?php echo esc_html( $scientific_name ); ?></em>
								</li>
							<?php endif; ?>
							<?php if ( $water_type ) : ?>
								<li>
									<strong><?php esc_html_e( 'Water Type:', 'fishing-cpt-plugin' ); ?></strong> 
									<?php echo esc_html( $water_type ); ?>
								</li>
							<?php endif; ?>
							<?php if ( $average_size ) : ?>
								<li>
									<strong><?php esc_html_e( 'Average Size:', 'fishing-cpt-plugin' ); ?></strong> 
									<?php echo esc_html( $average_size ); ?>
								</li>
							<?php endif; ?>
							<?php if ( $bait_type ) : ?>
								<li>
									<strong><?php esc_html_e( 'Bait Type:', 'fishing-cpt-plugin' ); ?></strong> 
									<?php echo esc_html( $bait_type ); ?>
								</li>
							<?php endif; ?>
						</ul>
					</div>
					<?php
				endif;
				
				// Display related content.
				if ( function_exists( 'get_field' ) ) {
					$related_gear  = get_field( 'related_gear' );
					$related_areas = get_field( 'related_areas' );
					
					if ( ! empty( $related_gear ) && is_array( $related_gear ) ) :
						?>
						<div class="related-gear">
							<h2><?php esc_html_e( 'Related Gear', 'fishing-cpt-plugin' ); ?></h2>
							<ul role="list" aria-label="<?php esc_attr_e( 'Related fishing gear', 'fishing-cpt-plugin' ); ?>">
								<?php foreach ( $related_gear as $gear ) : ?>
									<li>
										<a href="<?php echo esc_url( get_permalink( $gear->ID ) ); ?>">
											<?php echo esc_html( $gear->post_title ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php
					endif;
					
					if ( ! empty( $related_areas ) && is_array( $related_areas ) ) :
						?>
						<div class="related-areas">
							<h2><?php esc_html_e( 'Fishing Areas', 'fishing-cpt-plugin' ); ?></h2>
							<ul role="list" aria-label="<?php esc_attr_e( 'Related fishing areas', 'fishing-cpt-plugin' ); ?>">
								<?php foreach ( $related_areas as $area ) : ?>
									<li>
										<a href="<?php echo esc_url( get_permalink( $area->ID ) ); ?>">
											<?php echo esc_html( $area->post_title ); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php
					endif;
				}
				?>
			</div>
		</article>
		<?php
	endwhile;
	?>
</main>
<?php
get_footer();
