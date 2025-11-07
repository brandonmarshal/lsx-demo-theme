<?php if (! defined('ABSPATH')) {
	exit;
}
$facts = isset($attributes['facts']) ? (array) $attributes['facts'] : [];
if (empty($facts)) {
	echo '<p class="fish-facts__placeholder">' . \esc_html__('No facts added yet.', 'fishing-cpt-plugin') . '</p>';
	return;
}
echo '<ul class="fish-facts" aria-label="' . \esc_attr__('Fish facts', 'fishing-cpt-plugin') . '" role="list">';
foreach ($facts as $fact) {
	echo '<li>' . \esc_html($fact) . '</li>';
}
echo '</ul>';
