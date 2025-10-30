<?php if (! defined('ABSPATH')) {
	exit;
}
get_header(); ?>
<main id="primary" class="site-main" role="main">
	<h1><?php post_type_archive_title(); ?></h1>
	<?php if (have_posts()) : ?>
		<ul class="gear-archive-list" role="list" aria-label="<?php echo esc_attr__('Gear archive list', 'fishing-cpt-plugin'); ?>">
			<?php while (have_posts()) : the_post(); ?>
				<li class="gear-card">
					<a href="<?php the_permalink(); ?>" class="gear-card__link">
						<h2 class="gear-card__title"><?php echo esc_html(get_the_title()); ?></h2>
					</a>
					<?php the_excerpt(); ?>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e('No gear found.', 'fishing-cpt-plugin'); ?></p>
	<?php endif; ?>
</main>
<?php get_footer(); ?>