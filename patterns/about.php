<?php
/**
 * Title: about
 * Slug: lsx-demo-theme/about
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","align":"wide","className":"about-page","layout":{"type":"constrained"}} -->
<main id="main" class="wp-block-group about-page" role="main">
    <!-- hero -->
    <!-- wp:group {"className":"about-hero","layout":{"type":"constrained"}} -->
    <div class="wp-block-group about-hero">
        <!-- wp:heading {"textAlign":"center","level":1,"className":"about-hero__title"} -->
        <h1 class="about-hero__title">
            About Brandon — River Stories & The Art of Fishing
        </h1>
        <!-- /wp:heading -->
        <!-- wp:paragraph {"align":"center","className":"about-hero__lead"} -->
        <p class="about-hero__lead">
            I fish for moments — the quiet before the cast, the tug on the line,
            and the friends I meet on every riverbank. Here's how this all
            began.
        </p>
        <!-- /wp:paragraph -->
    </div>
    <!-- /wp:group -->

    <!-- alternating sections -->
    <!-- section 1 -->
    <!-- wp:group {"className":"about-section about-section\u002d\u002dalt","layout":{"type":"constrained"}} -->
    <section class="wp-block-group about-section about-section--alt">
        <!-- wp:media-text {"mediaPosition":"left","mediaType":"image","align":"wide","className":"about-section__media-text"} -->
        <div
            class="wp-block-media-text alignwide about-section__media-text is-stacked-on-mobile"
        >
            <figure class="wp-block-media-text__media about-section__figure">
                <img
                    src="/wp-content/themes/lsx-demo-theme/assets/images/about/river-kayak.jpg"
                    alt="Paddling a river"
                    class="about-section__img"
                />
            </figure>
            <div class="wp-block-media-text__content about-section__content">
                <h2>My first cast</h2>
                <p>
                    I remember the smell of coffee and wet grass, the nervous
                    excitement of casting for the first time. That first small
                    tug changed everything — I was hooked for life.
                </p>
            </div>
        </div>
        <!-- /wp:media-text -->
    </section>
    <!-- /wp:group -->

    <!-- section 2 (reversed) -->
    <!-- wp:group {"className":"about-section","layout":{"type":"constrained"}} -->
    <section class="wp-block-group about-section">
        <!-- wp:media-text {"mediaPosition":"right","mediaType":"image","align":"wide","className":"about-section__media-text"} -->
        <div
            class="wp-block-media-text alignwide about-section__media-text is-stacked-on-mobile"
        >
            <div class="wp-block-media-text__content about-section__content">
                <h2>Learning the rivers</h2>
                <p>
                    Over the years I learned to read the water: the seams, the
                    eddies, where the bass hide. Each trip taught me a new
                    little lesson about patience, gear, and gratitude.
                </p>
                <p>
                    My gear changed, my casts improved, but the heart of the
                    practice stayed the same — being present in the moment.
                </p>
            </div>
            <figure class="wp-block-media-text__media about-section__figure">
                <img
                    src="<?php echo esc_url( get_theme_file_uri( 'assets/images/about/learning-river.jpg' ) ); ?>"
                    alt="Casting on a river"
                    class="about-section__img"
                />
            </figure>
        </div>
        <!-- /wp:media-text -->
    </section>
    <!-- /wp:group -->

    <!-- section 3 -->
    <!-- wp:group {"className":"about-section about-section\u002d\u002dalt","layout":{"type":"constrained"}} -->
    <section class="wp-block-group about-section about-section--alt">
        <!-- wp:media-text {"mediaPosition":"left","mediaType":"image","align":"wide","className":"about-section__media-text"} -->
        <div
            class="wp-block-media-text alignwide about-section__media-text is-stacked-on-mobile"
        >
            <figure class="wp-block-media-text__media about-section__figure">
                <img
                    src="<?php echo get_theme_file_uri('assets/images/about/competition.jpg'); ?>"
                    alt="Fishing competition"
                    class="about-section__img"
                />
            </figure>
            <div class="wp-block-media-text__content about-section__content">
                <h2>Community & competitions</h2>
                <p>
                    Fishing brought me community. From early morning meet-ups to
                    weekend competitions, I met people who became friends — and
                    teachers in their own right.
                </p>
            </div>
        </div>
        <!-- /wp:media-text -->
    </section>
    <!-- /wp:group -->

    <!-- call to action -->
    <!-- wp:group {"className":"about-cta","layout":{"type":"constrained"}} -->
    <div class="wp-block-group about-cta">
        <!-- wp:paragraph {"align":"center"} -->
        <p class="about-cta__text">
            Want to see the latest catches? Peek into the
            <a href="/portfolio">portfolio</a> or read my
            <a href="/areas">fishing areas</a>.
        </p>
        <!-- /wp:paragraph -->
        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button {"className":"is-style-cta"} -->
            <div class="wp-block-button is-style-cta">
                <a class="wp-block-button__link">Explore the Gallery</a>
            </div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->
