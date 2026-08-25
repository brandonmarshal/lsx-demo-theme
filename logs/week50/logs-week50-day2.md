# Week 50, Day 2 Log 2026-08-25

## Today's Progress

### What have you accomplished today?

---

**LS-2801** — Final Menu Polish Pass `[Backlog]`

-   Picked up desktop mega menus (Work/Solutions/Pricing/Insights/About + Services), following yesterday's mobile dropdown finalisation
-   **Bug found and fixed:** icon colours stuck in light-mode blue in dark mode — a leftover `iconColor` preset attribute alongside a correct semantic override was silently winning due to WordPress auto-generating a `!important` rule for named presets; removed the conflicting attribute from all 31 icon instances across the 5 non-Services menus; also replaced hardcoded 36px icon sizing with a new reusable `icon.size` token scale
-   **Header hierarchy pass (Work/Solutions/Pricing/Insights/About):** demoted the large label to a small eyebrow, promoted the description to the dominant heading, redesigned icon wells, adjusted title weight/description colour, moved panel background to a cooler surface token; ran a follow-up polish pass tuning heading size, icon opacity, spacing, and contrast per feedback; applied equivalent fixes to Services separately since it has different panel markup
-   **Services desktop redesign:** reworked to match the supplied prototype — eyebrow/heading hierarchy fix, monospace phase labels, colour-matched halo rings on dot icons, arrows recoloured per-phase instead of flat grey, reduced service-link visual weight, extra column padding, cooler panel surface; also fixed a pre-existing unrelated bug where the panel was hardcoded to wrap into 2 columns instead of showing all 6 phases in one row
-   **Root-cause fix — mega menus opening off-centre:** found WordPress's core Navigation submenu positions itself against its own trigger word rather than the full nav bar, pushing wider panels off-balance near the screen edge; fixed in a new scoped structural SCSS file, limited to the site header since no footer navigation block currently exists — flagged for revisiting if one is added later
-   **Bug fixed:** "Block contains unexpected or invalid content" error on every mega-menu icon — several icons carried a `has-icon-color` class with no matching `iconColor` attribute set; removed the stray class, left it correctly in place on Services' icons
-   **Dark-mode contrast bug fixed across all 6 desktop mega menus:** title links and taglines had no explicit text colour so they fell back to WordPress core's default nav-link rule, going invisible against the panel background; tried pinning to a permanently-dark token first, reverted after that killed the light/dark distinction entirely; landed on reusing the same `surface.card` + `text.default` pairing already used elsewhere in the codebase, plus `color:inherit` on title links
-   **Services icon colour bug found twice more (same root cause):** phase dot icons and connector arrows rendering black regardless of intended colour — missing `fill="currentColor"` on the raw SVG paths; fixed across all 6 dots and 5 arrows
-   **Services mobile accordion column gap fixed** — short single-word links sitting in equal-width grid columns left an oversized visual gap; fixed by sizing columns to content instead of stretching
-   **Header search/CTA alignment fixed** — "Start a project" button was shorter than the search icon button, padding corrected; also found the `44px` touch-target size hardcoded identically in 3 places (search button, mobile-menu close, footer social icons) and extracted it into a new shared `tap-target-min` token
-   **Full structured 7-angle code review run across the whole branch** — 10 findings survived verification against live files, all fixed:
    -   Missing `has-text-color` class on 14 blocks in `services-mega-menu.html`
    -   Stale colour-token mismatch in `work-mega-menu.html`'s CTA row
    -   Mobile phase dots missing the same icon-colour and SVG-fill fixes already applied to desktop — ported over
    -   Service item links falling back to core's default link colour — fixed at the shared style level
    -   Simplified an overly specific stretched-link selector
    -   Removed a duplicate block-style registration colliding with a pre-existing hardcoded one, which was triggering a `_doing_it_wrong()` warning
    -   Restored a dropped border-radius on Service row hover/focus states
    -   Fixed desktop hover accent rail not honouring per-phase colour
    -   Converted the 5 mobile submenu grids to WordPress's native Group grid layout, matching existing theme precedent; deliberately left Services' 2 custom grids as-is with reasoning documented
    -   Deduped `inc/presets.php`'s 2 hooks that were each independently re-parsing the same JSON files
    -   Bonus fix found while testing: mega-menu panels bleeding white through their rounded corners due to the Ollie Menu Designer plugin's own hardcoded wrapper background — overridden to transparent
-   Branch now committed in stages (4 commits so far) rather than sitting fully uncommitted; all fixes tested and confirmed working

---

## Time Logs

-   3.20 hrs - Working on the Mobile menu as well as Mega Menu's.
-   4.20 hrs - Working on Header, and Mega Menu's. Had some bugs to solve and test, then did a full self code review on the branch before creating a PR. 

---

## Notes

-
