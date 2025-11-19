<?php
/**
 * Template for displaying single Gear posts.
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
				// Display basic gear metadata.
				$brand = get_post_meta( get_the_ID(), 'brand', true );
				$type  = get_post_meta( get_the_ID(), 'gear_type', true );
				$price = get_post_meta( get_the_ID(), 'price', true );
				
				if ( $brand || $type || $price ) :
					?>
					<div class="gear-meta-section">
						<h2><?php esc_html_e( 'Gear Details', 'fishing-cpt-plugin' ); ?></h2>
						<ul class="gear-meta" role="list" aria-label="<?php esc_attr_e( 'Gear basic information', 'fishing-cpt-plugin' ); ?>">
							<?php if ( $brand ) : ?>
								<li>
									<strong><?php esc_html_e( 'Brand:', 'fishing-cpt-plugin' ); ?></strong> 
									<?php echo esc_html( $brand ); ?>
								</li>
							<?php endif; ?>
							<?php if ( $type ) : ?>
								<li>
									<strong><?php esc_html_e( 'Type:', 'fishing-cpt-plugin' ); ?></strong> 
									<?php echo esc_html( $type ); ?>
								</li>
							<?php endif; ?>
							<?php if ( $price ) : ?>
								<li>
									<strong><?php esc_html_e( 'Price:', 'fishing-cpt-plugin' ); ?></strong> 
									<?php echo esc_html( $price ); ?>
								</li>
							<?php endif; ?>
						</ul>
					</div>
					<?php
				endif;
				
				// Display gear specifications if available.
				if ( function_exists( 'Fishing_CPT\display_gear_specifications' ) ) {
					Fishing_CPT\display_gear_specifications( get_the_ID() );
				}
				
				// Display related content.
				if ( function_exists( 'get_field' ) ) {
					$related_fish  = get_field( 'related_fish' );
					$related_areas = get_field( 'related_areas' );
					
					if ( ! empty( $related_fish ) && is_array( $related_fish ) ) :
						?>
						<div class="related-fish">
							<h2><?php esc_html_e( 'Compatible Fish Species', 'fishing-cpt-plugin' ); ?></h2>
							<ul role="list" aria-label="<?php esc_attr_e( 'Compatible fish species', 'fishing-cpt-plugin' ); ?>">
								<?php foreach ( $related_fish as $fish ) : ?>
									<li>
										<a href="<?php echo esc_url( get_permalink( $fish->ID ) ); ?>">
											<?php echo esc_html( $fish->post_title ); ?>
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
							<h2><?php esc_html_e( 'Recommended Areas', 'fishing-cpt-plugin' ); ?></h2>
							<ul role="list" aria-label="<?php esc_attr_e( 'Recommended fishing areas', 'fishing-cpt-plugin' ); ?>">
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
