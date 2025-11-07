<?php if (! defined('ABSPATH')) {
	exit;
}
$post_id = $context['postId'] ?? \get_the_ID();
$brand = \get_post_meta($post_id, 'brand', true);
$type  = \get_post_meta($post_id, 'gear_type', true);
$price = \get_post_meta($post_id, 'price', true);
echo '<div class="gear-card" role="group" aria-label="' . \esc_attr__('Gear card', 'fishing-cpt-plugin') . '">';
echo '<h3 class="gear-card__title">' . \esc_html(\get_the_title($post_id)) . '</h3>';
echo '<ul class="gear-card__meta" role="list">';
if ($brand) {
	echo '<li><strong>' . \esc_html__('Brand:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($brand) . '</li>';
}
if ($type) {
	echo '<li><strong>' . \esc_html__('Type:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($type) . '</li>';
}
if ($price) {
	echo '<li><strong>' . \esc_html__('Price:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($price) . '</li>';
}
echo '</ul>';
echo '</div>';
