<?php
/**
 * Title: main-fish-posts-page
 * Slug: lsx-demo-theme/main-fish-posts-page
 * Categories: fish
 */
?>
<!-- wp:group {"metadata":{"categories":["posts","posts"],"patternName":"bfa/home-recent-reports","name":"Recent Trip Reports"},"style":{"spacing":{"blockGap":"var:preset|spacing|40","padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:group {"style":{"spacing":{"padding":{"right":"10px","left":"10px","top":"10px","bottom":"10px"}},"border":{"radius":"5px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:5px;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px"><!-- wp:query {"queryId":17,"query":{"perPage":20,"postType":"fish","order":"desc","orderBy":"date","inherit":false,"offset":0,"sticky":"","parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"wp-block-group bfa-report-card","layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"style":{"border":{"radius":"5px","width":"1px"},"spacing":{"padding":{"top":"7px","bottom":"7px","left":"7px","right":"7px"}}},"borderColor":"muted","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-muted-border-color" style="border-width:1px;border-radius:5px;padding-top:7px;padding-right:7px;padding-bottom:7px;padding-left:7px"><!-- wp:post-featured-image {"isLink":true,"height":"180px","style":{"border":{"radius":"4px"}}} /-->

<!-- wp:post-title {"level":3,"isLink":true} /-->

<!-- wp:post-excerpt {"moreText":"Read Report","excerptLength":18} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results {"className":"has-text-align-center"} -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"align":"center","className":"has-small-font-size"} -->
<p class="has-text-align-center has-small-font-size"><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">View All Trip Reports →</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->