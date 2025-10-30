<?php if (! defined('ABSPATH')) {
	exit;
}
get_header(); ?>
<main id="primary" class="site-main" role="main">
	<?php while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> aria-labelledby="post-title-<?php the_ID(); ?>">
			<header>
				<h1 id="post-title-<?php the_ID(); ?>"><?php echo esc_html(get_the_title()); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php $facts_json = get_post_meta(get_the_ID(), 'fish_facts', true);
				$facts = json_decode($facts_json, true); ?>
				<?php if (! empty($facts)) : ?>
					<ul class="fish-facts" aria-label="<?php esc_attr_e('Fish facts', 'fishing-cpt-plugin'); ?>" role="list">
						<?php foreach ($facts as $fact) : ?>
							<li><?php echo esc_html($fact); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</article>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>