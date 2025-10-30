<?php if (! defined('ABSPATH')) {
	exit;
}
get_header(); ?>
<main id="primary" class="site-main" role="main">
	<h1><?php post_type_archive_title(); ?></h1>
	<?php if (have_posts()) : ?>
		<div class="stories-feature-grid" role="list" aria-label="<?php echo esc_attr__('Stories feature list', 'fishing-cpt-plugin'); ?>">
			<?php while (have_posts()) : the_post(); ?>
				<article class="story-card" role="listitem">
					<a href="<?php the_permalink(); ?>" class="story-card__link">
						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('large');
						} ?>
						<h2 class="story-card__title"><?php echo esc_html(get_the_title()); ?></h2>
					</a>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
		</div>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e('No stories found.', 'fishing-cpt-plugin'); ?></p>
	<?php endif; ?>
</main>
<?php get_footer(); ?>