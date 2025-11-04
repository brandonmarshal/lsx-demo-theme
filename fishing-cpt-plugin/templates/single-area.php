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
<ul class="area-meta" role="list">
<?php $loc = get_post_meta(get_the_ID(), 'location', true);
if ($loc) : ?><li><strong><?php esc_html_e('Location:', 'fishing-cpt-plugin'); ?></strong> <?php echo esc_html($loc); ?></li><?php endif; ?>
<?php $weather = get_post_meta(get_the_ID(), 'weather_conditions', true);
if ($weather) : ?><li><strong><?php esc_html_e('Weather:', 'fishing-cpt-plugin'); ?></strong> <?php echo esc_html($weather); ?></li><?php endif; ?>
<?php $success = get_post_meta(get_the_ID(), 'catch_success', true);
if ($success) : ?><li><strong><?php esc_html_e('Catch Success:', 'fishing-cpt-plugin'); ?></strong> <?php echo esc_html($success); ?></li><?php endif; ?>
</ul>
</div>
</article>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
