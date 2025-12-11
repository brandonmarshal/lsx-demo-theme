<?php
/**
 * Title: Query loop with right sidebar
 * Slug: fishing-theme/query-loop-with-right-sidebar
 * Categories: Cards
 */
?>
<!-- wp:group {"className":"is-style-default","style":{"spacing":{"padding":{"top":"40px","bottom":"40px","left":"70px","right":"70px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-default" style="padding-top:40px;padding-right:70px;padding-bottom:40px;padding-left:70px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:query {"queryId":9,"query":{"perPage":10,"pages":0,"offset":0,"postType":"fish","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":null}} -->
<!-- wp:group {"metadata":{"name":"post cards"},"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"color":"#c9c9c9","radius":{"topLeft":"17px","topRight":"17px","bottomLeft":"10px","bottomRight":"10px"}},"shadow":"var:preset|shadow|natural"},"backgroundColor":"heading","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-heading-background-color has-background" style="border-color:#c9c9c9;border-top-left-radius:17px;border-top-right-radius:17px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;box-shadow:var(--wp--preset--shadow--natural)"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"4/3","dimRatio":40,"style":{"border":{"radius":{"topLeft":"15px","topRight":"15px"}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group" style="padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px"><!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|background"},":hover":{"color":{"text":"var:preset|color|muted"}}}},"layout":{"selfStretch":"fit","flexSize":null},"typography":{"textDecoration":"underline"}}} /-->

<!-- wp:post-terms {"term":"habitat","className":"is-style-post-terms-1","style":{"elements":{"link":{"color":{"text":"#5e6ff0"},":hover":{"color":{"text":"#0b5cb2"}}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"backgroundColor":"surface","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-surface-background-color has-background"><!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-30","bottom":"var:preset|spacing|spacing-30","left":"var:preset|spacing|spacing-30","right":"var:preset|spacing|spacing-30"}}}} -->
<div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--spacing-30);padding-right:var(--wp--preset--spacing--spacing-30);padding-bottom:var(--wp--preset--spacing--spacing-30);padding-left:var(--wp--preset--spacing--spacing-30)"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:post-date {"isLink":true,"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}},"style":{"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"5px","bottomRight":"5px"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|text"}}}}}} /--></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:post-author-name {"style":{"elements":{"link":{"color":{"text":"var:preset|color|text"}}}},"textColor":"text"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-60","bottom":"var:preset|spacing|spacing-60"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","justifyContent":"center","orientation":"vertical","flexWrap":"wrap"}} -->
<div class="wp-block-buttons" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--spacing-60);padding-bottom:var(--wp--preset--spacing--spacing-60)"><!-- wp:button {"width":50,"style":{"border":{"width":"1px"},"shadow":"var:preset|shadow|natural"},"borderColor":"surface"} -->
<div class="wp-block-button has-custom-width wp-block-button__width-50"><a class="wp-block-button__link has-border-color has-surface-border-color wp-element-button" style="border-width:1px;box-shadow:var(--wp--preset--shadow--natural)">View Fish</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%","style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-20","bottom":"var:preset|spacing|spacing-20","left":"var:preset|spacing|spacing-30","right":"var:preset|spacing|spacing-30"}},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"}}},"backgroundColor":"surface"} -->
<div class="wp-block-column has-surface-background-color has-background" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding-top:var(--wp--preset--spacing--spacing-20);padding-right:var(--wp--preset--spacing--spacing-30);padding-bottom:var(--wp--preset--spacing--spacing-20);padding-left:var(--wp--preset--spacing--spacing-30);flex-basis:33.33%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|spacing-20","bottom":"var:preset|spacing|spacing-20","left":"var:preset|spacing|spacing-20","right":"var:preset|spacing|spacing-20"}},"border":{"radius":{"topLeft":"7px","topRight":"7px","bottomLeft":"7px","bottomRight":"7px"}}},"backgroundColor":"surface","layout":{"type":"default"}} -->
<div class="wp-block-group has-surface-background-color has-background" style="border-top-left-radius:7px;border-top-right-radius:7px;border-bottom-left-radius:7px;border-bottom-right-radius:7px;padding-top:var(--wp--preset--spacing--spacing-20);padding-right:var(--wp--preset--spacing--spacing-20);padding-bottom:var(--wp--preset--spacing--spacing-20);padding-left:var(--wp--preset--spacing--spacing-20)"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|text"}}}},"textColor":"text"} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color"><strong>COMMON HABITATS</strong></h2>
<!-- /wp:heading -->

<!-- wp:separator {"backgroundColor":"text"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-text-background-color has-background"/>
<!-- /wp:separator -->

<!-- wp:terms-query {"termQuery":{"perPage":10,"taxonomy":"habitat","order":"asc","orderBy":"name","include":[],"hideEmpty":true,"showNested":false,"inherit":false}} -->
<div class="wp-block-terms-query"><!-- wp:term-template -->
<!-- wp:group {"backgroundColor":"muted","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-muted-background-color has-background"><!-- wp:term-name {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|text"}}}}}} /-->

<!-- wp:term-count {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"border":{"radius":{"topLeft":"7px","topRight":"7px","bottomLeft":"7px","bottomRight":"7px"}}},"backgroundColor":"muted","textColor":"primary"} /--></div>
<!-- /wp:group -->
<!-- /wp:term-template --></div>
<!-- /wp:terms-query --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|text"}}}},"textColor":"text"} -->
<h2 class="wp-block-heading has-text-align-center has-text-color has-link-color"><strong>TOP RECOMMENDED GEAR</strong></h2>
<!-- /wp:heading -->

<!-- wp:separator {"backgroundColor":"text"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-text-background-color has-background"/>
<!-- /wp:separator -->

<!-- wp:query {"queryId":18,"query":{"perPage":2,"pages":0,"offset":0,"postType":"gear","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","sizeSlug":"full","style":{"border":{"radius":{"topLeft":"30px","bottomRight":"30px"}}}} /-->

<!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|muted"}}}},"typography":{"textDecoration":"underline"}}} /-->

<!-- wp:post-terms {"term":"gear_type","className":"is-style-post-terms-1","style":{"elements":{"link":{"color":{"text":"var:preset|color|text"},":hover":{"color":{"text":"var:preset|color|muted"}}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:separator {"backgroundColor":"text"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-text-background-color has-background"/>
<!-- /wp:separator -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->