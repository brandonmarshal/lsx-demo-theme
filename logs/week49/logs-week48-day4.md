# Week 49, Day 4 Log 2026-08-20

## Today's Progress

### What have you accomplished today?

---

**LS-1616** — Rebuild Portfolio + Blog Archive Templates `[In Review]`

-   **AGENTS.md compliance audit** on all 30 changed files — checked SCSS commenting, `theme.json`/`dark.json` token parity, `animations.css` isolation, PHP escaping/security, and CHANGELOG conventions; ran full validation suite; found largely compliant, fixed one stale CHANGELOG line incorrectly claiming an "Outline On Dark" button variant that doesn't exist
-   **Copilot suppressed-comments triage** — reviewed 12 findings, sorted real bugs from noise; 4 confirmed and fixed:
    -   `border.on-dark` contrast failure — remapped from `neutral-800` to `neutral-500` in both `theme.json` and `dark.json`, now passing at 5.07:1 / 4.14:1
    -   `has-border-color` class with no backing colour on the Writing CTA block — added the missing `border.on-dark` token
    -   Hover-lift effect bleeding from Blog post cards onto Engagement's static stat cards — scoped the selector properly
    -   `search-pill.json`'s border/radius silently self-cancelling — fixed
    -   3 findings (RTL, multibyte word count, "search doesn't filter") rejected as false positives/out of scope, with reasoning
-   **Second Copilot round:** fixed raw preset colours in the Blog Hero aurora glow (added proper `effect.hero.violet`/`cyan` tokens), literal black/white in `color-mix()` (added 2 new precisely-computed palette presets), and stale doc comments referencing a removed sparkline
-   Confirmed via WP core source (not assumption) that `core/search` cannot filter a nested Query Loop even with `enhancedPagination` — accepted as a known limitation, corrected pattern/style docs and "no results" copy accordingly
-   **Search pill bug fixed** — Blog All Articles search box was rendering nearly invisible and square instead of pill-shaped; root cause traced to `core/search`'s odd `selectors.border` mapping being overridden by the pattern's own CSS reset; fixed by moving border/radius/background onto the root element directly
-   **Blog Hero background glow — root cause found and fixed properly:**
    -   Discovered the real bug first — an inline gradient style from a block attribute was silently overriding any CSS background-image, meaning the original two radial glows from the initial PR had never actually rendered
    -   Fixed by moving the base gradient into the CSS file and removing the inline attribute
    -   Several manual attempts at matching the glow shape/colour/position from screenshots missed the mark
    -   Once Figma MCP became available, pulled exact design data directly from the real node and decoded the SVG gradient math into precise CSS values — landed the final accurate 3-colour aurora glow, reusing existing palette presets rather than inventing new tokens
-   **Section spacing consistency** — all 4 Blog Archive sections now share the same top/bottom padding; removed inconsistent block-gap/extra padding stacking unevenly; restored a single bottom padding specifically for Writing CTA since it's a bordered floating card needing external room before the footer
-   **Reading time swapped to WordPress core** — replaced the custom paragraph + `render_block` filter approach with core's native `core/post-time-to-read` block across all 3 blog card patterns, per senior's suggestion to prefer an existing block over custom code; confirmed Yoast's reading-time block isn't actually installed/available; deleted the now-redundant `inc/blog-reading-time.php`
-   **Breadcrumbs added** to the Blog Hero, matching the existing Work Hero pattern, with on-dark text/link handling since this section stays permanently dark; added a site-wide separator filter swapping Yoast's default "»" for "/"

---

**Blog Homepage Template — Blocker Resolved**

-   Hit a blocker where "Blog" (set as the site's Posts page) refused to apply any custom template via Page Attributes — confirmed as expected WordPress behaviour, not a bug: a Posts page always renders through the theme's "Home" template regardless of what's picked in Quick Edit
-   Fixed by creating the actual "Home" template (labelled "Blog Home" on this site) via the Site Editor, built from the same 3 pieces as the existing Blog Archive template — Header, `Template: Blog Archive` pattern, Footer
-   Confirmed working — "Blog Home" is now the template WordPress actually uses for the Blog page
-   Flagged to the team: the original `Blog Archive` custom Page template is now redundant for its original purpose — decision needed on whether to keep it for a future non-Posts-page use case or remove it

---

**LS-1597** — Build Home Page `[Backlog]`

-   Started bespoke build from Figma on `feature/ls-1597-build-home-page` (branch renamed to match ticket convention), beginning with 3 sections rather than the full page at once
-   **Hero rebuilt** (`home-hero.php`) — eyebrow badge, headline with accent span, intro copy, decorative AI-planner prompt row (no functionality yet, scoped as future work), 6 suggestion pills, consultation link; kept the existing GSAP animated-network background, flagged for a decision since Figma shows a static gradient with no moving canvas
-   **Stats Bar built** (`section-stats-bar.php`, new) — 4-figure stat strip beneath the Hero
-   **Where to Start section built** (`homepage-where-to-start.php`, new) — reused the Work archive's `is-style-card-category` styling rather than duplicating a new card style, so both pages now share one improved treatment
-   All 3 wired into `templates/front-page.html`
-   Added 4 new mode-invariant colour tokens (`surface.glass`, `surface.glass-lighter`, `surface.glass-subtle`, `border.glass`) for the Hero's translucent badge/border treatment
-   Confirmed no new `is-style` variants introduced, consistent with the LS-2341 cleanup
-   **Visual QA round against Figma:**
    -   Fixed Hero background rendering light (and text unreadable) in light mode — pinned to a fixed dark value independent of the site's style variation, same for gradient tint colours
    -   Added the rainbow gradient bar at the Hero's bottom edge, missing from the original build
    -   Tuned spacing, subtitle width/size, bumped undersized 12px text to 16px, recoloured the prompt button's icon for contrast, added backdrop blur so the prompt row stays legible over the GSAP animation
    -   Stats Bar — widened item padding, removed default WordPress section gap so it sits flush against the Hero
    -   Where to Start — fixed intro text alignment/width, resolved a couple of margin-collapse issues where sibling block margins were silently overriding gap changes
-   **3 more sections built:**
    -   **What We Build** — eyebrow, heading, 4-card row (WordPress platforms/WooCommerce/Design systems/Migrations) reusing the shared card-category shell, "All services" CTA
    -   **Why LightSpeed** — two-column positioning section with two CTA buttons and a 5-item checklist card
    -   **Featured Work** — a genuinely new horizontal "list view" case-study card (thumbnail, heading/description, 3-figure stat row, trailing arrow), with its own dedicated SCSS since nothing existing matched this shape
    -   All wired into `templates/front-page.html` after Where to Start; no new colour tokens needed; all pill CTAs use native `core/button`
-   **Further visual QA on the new sections:**
    -   What We Build's background overridden to a lighter dark surface token for just this instance, without touching the shared content-band style
    -   Increased the shared card-category padding site-wide — benefits Work Categories, Where to Start, and What We Build together
    -   Swapped CTA buttons from square outline to the theme's existing pill-shaped secondary/outline styles
    -   Added a hover-reveal arrow icon to 3 of 4 buttons, scoped to a new marker class so shared button styles elsewhere aren't affected
    -   Fixed a low-contrast accessibility issue on the arrow's circular hover well
-   Full validation suite run clean on all new/changed files
-   **Remaining:** additional homepage sections, content/copy finalisation, Free Consultation CTA wiring, further design QA against Figma, SEO metadata, responsive check

---

## Time Logs

-   2.0 hrs - Working on the final touches on blog-archive template.
-   3.30 hrs - Merged the PR eventually and then tried to setup the blog template on DEV, had some struggle but managed. Then I started with the first 3 patterns on the Homepage with bot template.
-   3.20 hrs - Working on LS-1597 and building up the patterns for the Hompage, testing as I go. 

---

## Notes

-
