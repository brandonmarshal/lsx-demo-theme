<?php if (! defined('ABSPATH')) {
	exit;
}
$post_id = $context['postId'] ?? \get_the_ID();
$loc = \get_post_meta($post_id, 'location', true);
$weather = \get_post_meta($post_id, 'weather_conditions', true);
$success = \get_post_meta($post_id, 'catch_success', true);
echo '<div class="story-card" role="group" aria-label="' . \esc_attr__('Story card', 'fishing-cpt-plugin') . '">';
echo '<h3 class="story-card__title">' . \esc_html(\get_the_title($post_id)) . '</h3>';
echo '<ul class="story-card__meta" role="list">';
if ($loc) {
	echo '<li><strong>' . \esc_html__('Location:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($loc) . '</li>';
}
if ($weather) {
	echo '<li><strong>' . \esc_html__('Weather:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($weather) . '</li>';
}
if ($success) {
	echo '<li><strong>' . \esc_html__('Catch Success:', 'fishing-cpt-plugin') . '</strong> ' . \esc_html($success) . '</li>';
}
echo '</ul>';
echo '</div>';
