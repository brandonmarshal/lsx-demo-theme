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
				<ul class="gear-meta" role="list">
					<?php $brand = get_post_meta(get_the_ID(), 'brand', true);
					if ($brand) : ?><li><strong><?php esc_html_e('Brand:', 'fishing-cpt-plugin'); ?></strong> <?php echo esc_html($brand); ?></li><?php endif; ?>
					<?php $type = get_post_meta(get_the_ID(), 'gear_type', true);
					if ($type) : ?><li><strong><?php esc_html_e('Type:', 'fishing-cpt-plugin'); ?></strong> <?php echo esc_html($type); ?></li><?php endif; ?>
					<?php $price = get_post_meta(get_the_ID(), 'price', true);
					if ($price) : ?><li><strong><?php esc_html_e('Price:', 'fishing-cpt-plugin'); ?></strong> <?php echo esc_html($price); ?></li><?php endif; ?>
				</ul>
			</div>
		</article>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>