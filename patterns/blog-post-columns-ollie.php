<?php
/**
 * Title: Blog Post Columns (Ollie)
 * Slug: fishing-theme/blog-post-columns-ollie
 * Categories: Posts
 */
?>
<!-- wp:group {"metadata":{"name":"Blog Post Columns"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","bottom":"var:preset|spacing|xx-large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"margin":{"top":"0px","bottom":"0px"},"blockGap":"var:preset|spacing|x-large"}},"backgroundColor":"tertiary","layout":{"inherit":true,"type":"constrained"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="margin-top:0px;margin-bottom:0px;padding-top:var(--wp--preset--spacing--xx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xx-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Titles"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"}}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-primary-color has-text-color has-small-font-size" style="font-style:normal;font-weight:500">Latest and Greatest</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Read our latest blog articles</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Learn the latest and greatest in WordPress site building. We&#039;re offering tutorials, tips and tricks, and video walkthroughs on our blog.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":1,"query":{"perPage":"2","pages":"2","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|large"}},"layout":{"type":"grid","columnCount":2}} -->
<!-- wp:group {"metadata":{"name":"Blog Post Card"},"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"}},"border":{"radius":"5px"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between","justifyContent":"stretch"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:5px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:group {"metadata":{"name":"Post Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"height":"300px","style":{"border":{"radius":"5px"},"spacing":{"margin":{"bottom":"25px"}}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px"},"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary","fontSize":"small","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"left","verticalAlignment":"center"}} -->
<div class="wp-block-group has-secondary-color has-text-color has-link-color has-small-font-size"><!-- wp:post-author {"showAvatar":false} /-->

<!-- wp:paragraph -->
<p>·</p>
<!-- /wp:paragraph -->

<!-- wp:post-date /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"style":{"typography":{"textDecoration":"none","fontStyle":"normal","fontWeight":"600","lineHeight":"1.3"}},"fontSize":"medium"} /-->

<!-- wp:post-excerpt {"moreText":"","showMoreOnNewLine":false,"className":"is-style-excerpt-truncate-3","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Post Meta"},"style":{"spacing":{"blockGap":"1px"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->
