<?php
/**
 * Title: home
 * Slug: fishing-theme/home
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"main-header-light","area":"uncategorized"} /-->

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/blogs-background-1024x683.png","dimRatio":40,"overlayColor":"neutral-900","isUserOverlayColor":true,"minHeight":480,"contentPosition":"center center","sizeSlug":"large","metadata":{"categories":["banner","hero","featured"],"patternName":"bfa/home-hero","name":"Home Hero (Fishing Adventures)"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);min-height:480px"><img class="wp-block-cover__image-background size-large" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/blogs-background-1024x683.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-neutral-900-background-color has-background-dim-40 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"2.7rem"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":"3rem"}}} -->
<h2 class="wp-block-heading has-text-align-center" style="font-size:3rem">Unforgettable Fishing Adventures</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"h3"} -->
<p class="has-text-align-center has-h-3-font-size">Check out some interesting information I gathered about fish species and gear.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"muted","textColor":"text","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-text-color has-muted-background-color has-text-color has-background wp-element-button" href="http://brandonlightspeedwpdev.local/?page_id=209">Fish Species</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="http://brandonlightspeedwpdev.local/?page_id=334">Gear</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"align":"center","fontSize":"lead"} -->
<p class="has-text-align-center has-lead-font-size">Catch &amp; release focused. 6+ prime waters.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"categories":["posts","posts"],"patternName":"bfa/home-recent-reports","name":"Recent Trip Reports"},"style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Recent Catches &amp; Stories</h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":17,"query":{"perPage":3,"postType":"post","order":"desc","orderBy":"date","inherit":false},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"wp-block-group bfa-report-card","layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
<!-- wp:group {"style":{"border":{"radius":"5px","width":"1px"},"spacing":{"padding":{"left":"7px","right":"7px","top":"7px","bottom":"7px"},"margin":{"top":"40px","bottom":"40px"}},"dimensions":{"minHeight":""},"shadow":"var:preset|shadow|natural"},"backgroundColor":"surface","borderColor":"primary","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-primary-border-color has-surface-background-color has-background" style="border-width:1px;border-radius:5px;margin-top:40px;margin-bottom:40px;padding-top:7px;padding-right:7px;padding-bottom:7px;padding-left:7px;box-shadow:var(--wp--preset--shadow--natural)"><!-- wp:post-featured-image {"isLink":true,"height":"180px","style":{"border":{"radius":"5px"}}} /-->

<!-- wp:post-title {"level":3,"isLink":true} /-->

<!-- wp:post-excerpt {"moreText":"Read Report","excerptLength":18} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results {"className":"has-text-align-center"} -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:paragraph {"align":"center","className":"has-small-font-size"} -->
<p class="has-text-align-center has-small-font-size"><a href="http://brandonlightspeedwpdev.local/blog/">View All Trip Reports →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer-main","area":"uncategorized"} /-->