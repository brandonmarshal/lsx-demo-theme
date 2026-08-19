# Week 49, Day 3 Log 2026-08-19

## Today's Progress

### What have you accomplished today?

---

**LS-2436** — General Cleanup: has-text-color, Invalid fontSize Slugs, CTA Token Duplication `[In Review]`

-   **Bug 1 (missing `has-text-color` class)** — added the missing class to every element with an inline text-colour style but no matching class, across 9 pattern files (38 occurrences); verified via schema/escape validation and live render
-   **Bug 2 (non-existent fontSize slugs)** — replaced invalid `x-small`/`small`/`medium` fontSize slugs with real registered slugs across `thank-you-consultation.php` and `template-single.php`; also found and fixed the same issue in 3 additional files not in the original ticket (`template-search.php`, `template-archive.php`, `template-taxonomy.php`), which had an equivalent invalid spacing slug
-   **Bug 3 (CTA on-dark tokens)** — `theme.json` and `styles/dark.json` updated so the relevant surface tokens carry distinct, real light/dark values instead of duplicating the same value in both files; added a new `text.brand-on-dark` token (light and dark values) so on-dark text/icon colour meets WCAG AA contrast — pattern-level styling for this being handled separately outside this ticket
-   Bugs 1 and 2 fully resolved and verified; Bug 3's token work in place
-   **PR opened; AI code review run (CodeRabbit + Copilot)** — validated each recommendation against the actual codebase; 1 rejected as invalid (referenced a non-existent "token contract" rule and would have worsened dark-mode contrast); 4 valid findings applied — missing `has-text-color` class, a contrast-failing dark-mode token, missing `@package` tags, and a missing CHANGELOG entry

---

**LS-1616** — Rebuild Portfolio + Blog Archive Templates `[In Progress]`

-   **Branch housekeeping:** merged `develop` into `feature/ls-1616-blog-archive-page` to catch it up (7 commits + merge commit), resolving conflicts in `CHANGELOG.md`, `theme.json`, and `patterns/hero/work-hero.php`; found and fixed dead references left by the merge — `is-style-hero-dark` and `is-style-card-divider-top/bottom` had been removed theme-wide by `develop`'s is-style cleanup but were still referenced by the blog patterns
-   **Blog Hero section rebuilt** (`blog-hero.php`, `blog-featured-article.php`, `blog-latest-item.php`) to match Figma — full-width eyebrow/heading/paragraph block, Featured Article + Latest row both content-width constrained; Featured Article card with 4-colour top border, pill category badge, date + reading time, hover button; Latest list with accent category label and continuous left rail with per-item divider
-   Added `inc/blog-reading-time.php` for per-post reading time, mirroring the existing category-colour-swap convention
-   **New tokens added:** `text.on-dark-accent`, `surface.on-dark-accent-tint`, `icon.on-dark`, `border.on-dark` (constant across light/dark toggle for the permanently-dark Hero); restored `text.on-light` and the `category.*` family to `theme.json`, which had been wiped during the `develop` merge — re-derived light-mode category values for WCAG AA
-   **Bug fixed:** post title/terms text rendering black in the light "Default" style variation — `isLink` blocks render an `<a>` and the theme's global link-default colour was winning over the inherited heading colour; fixed with `elements.link` overrides pointing at the same constant on-dark tokens
-   Hero section complete and approved; not yet committed/pushed — next up is All Articles, Engagement, and Writing CTA sections
---

## Time Logs

-   1.45 hrs - Working on LS-2436, ran into a blocker but its slowing me down too much, moving on for now as it was Minor "attempt recovery" issue. Opened PR and reviewed with AI.
-   3.15 hrs - Working on LS-1616, the blog-archive template. 

---

## Notes

-
