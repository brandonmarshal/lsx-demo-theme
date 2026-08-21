# Week 49, Day 5 Log 2026-08-21

## Today's Progress

### What have you accomplished today?

---

**LS-1597** — Build Home Page `[Backlog]`

-   **Final 2 sections built:**
    -   **Where to Fit** — 3-card package row (Foundation/Growth/Enterprise); middle "Growth" card pre-styled as the featured option with permanent border/shadow, the other two only gain that treatment on hover; all 3 share equal height with a slight hover lift
    -   **Homepage CTA** — closing section mirroring `blog-writing-cta.php`'s structure — eyebrow, heading, copy, two buttons, and a "What you'll leave with" info panel
    -   Both wired into `templates/front-page.html`; removed a leftover default `front-page-latest-posts` section still showing on the homepage
-   **Featured Work cards rebuilt** — dropped the original custom "list view" card with fabricated stat numbers in favour of reusing the Work archive's existing case-study card in a real Query Loop filtered to a "Featured" tag, so editors can swap featured case studies without touching code
-   **Bugs found and fixed along the way:** `wp:pattern` slug references don't forward Query Loop context to nested dynamic blocks — card markup had to be inlined directly instead; flex children silently shrink-wrap instead of stretching without explicit cross-axis alignment, causing 2 separate alignment bugs traced to the same root cause; custom button colours must live on the inner link element, not the wrapping div; a stale pattern-registration cache hid 2 new pattern files until cleared manually
-   **Full responsive/visual QA pass across the homepage:**
    -   Stats Bar — fixed horizontal centering, rebuilt the mobile divider approach as a 2×2 CSS Grid with container-level divider lines instead of fragile per-item borders; correct stacking breakpoint empirically verified at 1020px
    -   Homepage CTA — fixed the section touching viewport edges on mobile by wrapping it in a proper `align:full` + constrained layout group
    -   Unified the card-row stacking breakpoint across Where to Start, Where to Fit, and Featured Work to 800px; gave What We Build its own tiered treatment (2-per-row 601–800px, 1-per-row below 600px) using CSS Grid
    -   New shared bundle `homepage-card-rows.scss` added to the build pipeline
    -   Documented 2 recurring CSS gotchas for future reference: WordPress core forces `flex-wrap: nowrap` on `.wp-block-columns` above 782px regardless of custom breakpoints, requiring an explicit override; subtracting half the block-gap via `calc()` is fragile since the gap is a viewport-relative `clamp()` — CSS Grid sidesteps this and is now the preferred approach for 2-per-row layouts
-   **PR #27 opened** — "Build Home page (LS-1597)," `feature/ls-1597-build-home-page` → `develop`
-   **CodeRabbit review — 8 findings validated against actual code:**
    -   6 confirmed and fixed: missing `aria-hidden` on the Hero prompt-row icon, inconsistent consultation link URL, Featured Work's hardcoded `project-tag` term ID, missing `aria-hidden` on decorative icons across 5 patterns, non-semantic checklist markup on Why LightSpeed, missing reduced-motion override on Featured Work's arrow animation
    -   2 rejected as false positives with evidence — a shadow token CodeRabbit didn't check the theme's JSON partials for, and Stylelint findings that don't apply since this repo has no Stylelint config
-   **Featured Work hardcoded term ID — investigated and fixed properly:** confirmed on DEV the "Featured" tag exists with a different numeric ID and a misspelled slug; fixed the DEV data (corrected slug, reassigned to the right 3 case studies) and removed the hardcoded ID from code entirely in favour of a new `inc/featured-work-query.php` filter resolving the tag by slug at render time — works identically across any environment
-   **Second audit pass against AGENTS.md and token conventions:**
    -   Extracted a proper `card-package.json` JSON block style for Where to Fit's 3 cards, replacing hand-duplicated inline styling
    -   Replaced a literal `font-weight: 700` with the theme's font-weight token
    -   Swapped hardcoded `blockGap`/`maxWidth` values for the correct spacing/content-size tokens
    -   Confirmed the new glass/border tokens correctly have no dark-mode override, matching existing constant-token precedent — no fix needed
-   All changes validated via `php -l`, phpcs, schema validation, security scan, and `build:css` after every change, `animations.css` confirmed untouched throughout
-   **Still outstanding:** copy finalisation pass, SEO metadata; consultation CTA link now consistent site-wide and Featured Work confirmed environment-safe

---

**Meeting — Zared Rogers: Homepage PR Review**

-   Reviewed the PR together in full — confirmed homepage setup closely mirrors the Blog Archive's patterns/CSS approach; extensive CSS comments confirmed as safe, stripped out at compile time
-   Mobile list scroll behaviour (localised vertical scroll to avoid an endless page stack) approved as-is
-   Diagnosed a layout icon issue caused by a block reverting from grid to list view on refresh — to be manually switched back in the editor
-   Zared holding final PR review until the 4 flagged items below are addressed, then plan to deploy the branch to Dev
-   **Items flagged for update before merge:**
    -   **Hero chatbot UI** — backend not ready yet; a second, chatbot-free Hero variant to be built as the temporary homepage design
    -   **Header-to-Hero spacing gap** — caused by WordPress default spacing; to be fixed with `margin-top: 0` in section styles/editor rather than touching `theme.json` globally
    -   **Four-column block width constraint** — currently capped at 1200px, creating unwanted side space; constraining classes to be removed so columns stretch full width while still collapsing cleanly on mobile
    -   **Portfolio button hover bug** — rounded button style shows a square background flash behind the icon on hover; to be fixed properly, or reverted to the original button style if too difficult
-   Plan to start on these fixes after lunch

---

## Time Logs

-   6.40 hrs - Working on and completing the homepage, doing testing on all device sizes, with Dark and Light mode, ran audits and AI reviews, validated all the recommendations from AI, then applied them to the code.
-   0.20 hrs - Meeting with Zared to go over my PR for the Homepage.

---

## Notes

-
