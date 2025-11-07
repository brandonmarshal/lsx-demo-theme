<?php if (! defined('ABSPATH')) {
	exit;
}
$post_id = $context['postId'] ?? \get_the_ID();
$water = \get_post_meta($post_id, 'water_type', true);
$avg   = \get_post_meta($post_id, 'average_size', true);
$bait  = \get_post_meta($post_id, 'bait_type', true);
echo '<div class="fish-card" role="group" aria-label="' . \esc_attr__('Fish card', 'fishing-cpt-plugin') . '">';
echo '<h3 class="fish-card__title">' . \esc_html(\get_the_title($post_id)) . '</h3>';
echo '<ul class="fish-card__meta" role="list">';
if ($water) {
	echo '<li><strong>' . \esc_html__('Water:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($water) . '</li>';
}
if ($avg) {
	echo '<li><strong>' . \esc_html__('Avg Size:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($avg) . '</li>';
}
if ($bait) {
	echo '<li><strong>' . \esc_html__('Bait:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($bait) . '</li>';
}
echo '</ul>';
echo '</div>';
