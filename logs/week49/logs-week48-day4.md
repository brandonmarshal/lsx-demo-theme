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

-   Started bespoke build from Figma on `feature/ls-1616-homepage-build`, beginning with 3 sections rather than the full page at once
-   **Hero rebuilt** (`home-hero.php`) — eyebrow badge, headline with accent span, intro copy, decorative AI-planner prompt row (no functionality yet, scoped as future work), 6 suggestion pills, consultation link; kept the existing GSAP animated-network background, flagged for a decision since Figma shows a static gradient with no moving canvas
-   **Stats Bar built** (`section-stats-bar.php`, new) — 4-figure stat strip beneath the Hero
-   **Where to Start section built** (`homepage-where-to-start.php`, new) — reused the Work archive's `is-style-card-category` styling rather than duplicating a new card style, so both pages now share one improved treatment
-   All 3 wired into `templates/front-page.html`
-   Added 4 new mode-invariant colour tokens (`surface.glass`, `surface.glass-lighter`, `surface.glass-subtle`, `border.glass`) for the Hero's translucent badge/border treatment
-   Confirmed no new `is-style` variants introduced, consistent with the LS-2341 cleanup
-   Full validation suite run clean on all new/changed files
-   **Remaining:** additional homepage sections, content/copy finalisation, Free Consultation CTA wiring, design QA against Figma, SEO metadata, responsive check

---

## Time Logs

-   2.0 hrs - Working on the final touches on blog-archive template.
-   3.30 hrs - Merged the PR eventually and then tried to setup the blog template on DEV, had some struggle but managed. Then I started with the first 3 patterns on the Homepage with bot template. 

---

## Notes

-
