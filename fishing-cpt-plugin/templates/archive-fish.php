<?php if (! defined('ABSPATH')) {
	exit;
}
get_header(); ?>
<main id="primary" class="site-main" role="main">
	<h1><?php post_type_archive_title(); ?></h1>
	<?php if (have_posts()) : ?>
		<ul class="fish-archive-grid" role="list" aria-label="<?php echo esc_attr__('Fish archive grid', 'fishing-cpt-plugin'); ?>">
			<?php while (have_posts()) : the_post(); ?>
				<li class="fish-card">
					<a href="<?php the_permalink(); ?>" class="fish-card__link">
						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('medium');
						} ?>
						<h2 class="fish-card__title"><?php echo esc_html(get_the_title()); ?></h2>
					</a>
					<?php the_excerpt(); ?>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e('No fish found.', 'fishing-cpt-plugin'); ?></p>
	<?php endif; ?>
</main>
<?php get_footer(); ?>