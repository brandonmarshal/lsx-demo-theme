# Week 50, Day 3 Log 2026-08-26

## Today's Progress

### What have you accomplished today?

---

**LS-2801** — Final Menu Polish Pass `[Done]`

-   **Meeting with Zared** reviewing the PR — overall approved, a small set of follow-up changes agreed
-   **Mobile menu row spacing fixed** — Systems and Contact rows had inconsistent spacing vs the accordion rows; root cause was the shared style zeroing out `margin-top`/`margin-bottom`; removed the override so all row types share the same spacing mechanism
-   **CodeRabbit review actioned:**
    -   Fixed `inc/presets.php` PHPCS failures (docblock position/capitalisation, missing trailing newline)
    -   Moved non-motion hover colours out of the motion-only SCSS files into `_mega-menu.scss`, per AGENTS.md's motion-file rule; caught and fixed a regression in the same refactor (dropped neutral hover fallback)
    -   2 findings dismissed as false positives with reasoning — intentional placeholder links (used 146 times sitewide) and a non-tokenisable icon-block width value
-   **Header logo light/dark switching implemented** — replaced `core/site-logo` with two `core/image` blocks switched via a new token pair, reusing the theme's existing per-style-variation pattern; picked the highest-contrast logo variant for each mode
-   **Bugs fixed along the way:** a Site Editor crash caused by an invalid `"layout":{"type":"flow"}` value, corrected to `default`; added a new AGENTS.md rule to always verify a core block's attribute values against a working reference rather than guessing
-   **Header spacing/sizing polish** — logo bumped 120px → 150px via a new token; increased header left/right padding to pull the logo and CTA button in from the edges
-   **Final round before merge:** trimmed the AGENTS.md addition down to a single line per feedback, fixed a real PHPCS failure on `patterns/header.php` (missing `@package` tag), confirmed header size/spacing polish working as expected
-   **PR #28 merged into `develop`** — issue closed
-   **Post-merge DEV troubleshooting (investigation only, no code changes yet):**
    -   Header changes weren't showing on DEV despite mobile menu changes appearing — root-caused via read-only DB audit to a stale DB-customised header template part shadowing the theme file, plus hardcoded local Media Library and Navigation ref IDs not matching DEV's real IDs; DEV header reset and changes now confirmed visible
    -   2 explicitly approved actions taken: uploaded light/dark logo SVGs to DEV's Media Library (IDs 53633/53634); created a new Pricing Principles page on DEV as a child of Pricing, filling the one genuinely missing link target found during the mega-menu audit
    -   **Full mega-menu link audit completed** — cross-referenced every nav item across all 6 dropdowns against DEV's real pages; Solutions/Services/About/Pricing all resolved to real pages; Work and Insights agreed to convert from hardcoded placeholder links to dynamic Query Loops (Work: Featured case studies newest-first, matching the homepage's Featured Work pattern; Insights: real published blog posts)
    -   **Live-site coverage audit (read-only)** — confirmed all 69 live pages and all 19 live case studies have a matching ID on DEV, zero orphaned content; confirmed DEV is a strict superset of live with only pure additions
    -   Plan fully drafted and confirmed internally, currently under review with Zared before implementation begins — no mega-menu code changes made yet

---

**LS-2804** — Audit Link Cursor Behaviour Across Theme Patterns and Templates `[In Review]`

-   **Full audit completed** across `patterns/`, `parts/`, and `templates/` for cards/rows that hover like a link but don't have a full clickable hit area
-   Found 9 genuine cases across 16 files (~150 card/row instances), 6 confirmed non-issues, and 2 patterns already implementing the fix correctly as reference
-   **Fix approach agreed:** real stretched `<a>` link over the full card via `::before { position:absolute; inset:0 }`, including a `:focus-visible` outline for keyboard users; confirmed safe everywhere since no audited card has more than one distinct destination
-   **5-step rollout — all 5 steps now complete:**
    -   **Step 1** — `is-style-card-category` (10 cards across Homepage and Work archive)
    -   **Step 2** — mega menu item rows (~76 rows across 6 header/mobile-menu parts)
    -   **Step 3** — single-link cards: `is-style-card-feature`, `is-style-card-solutions`, `is-style-card-package`
    -   **Step 4** — query-loop cards with duplicate-destination links: `is-style-card-case-study`, `is-style-card-post`
    -   **Step 5** — Blog Hero featured tile (`is-style-card-highlight-dark`), using a `::after`-based variant to avoid colliding with its existing rainbow-border effect
-   **2 unrelated block-validation bugs found and fixed during manual QA:**
    -   `footer.php` — 10 icon SVGs missing `fill="currentColor"` plus a stale `iconColor`/`has-icon-color` class conflict — fixed to match the earlier mega-menu icon fix pattern
    -   `work-discuss-project.php` — a hand-authored inline `--wp--style--block-gap` style that `core/columns` never actually produces, confirmed via WordPress's own recovery diff; removed
-   **Pre-PR code review:** found and fixed duplicate CSS — the mega-menu stretched-link fix duplicated a mechanism the LS-2801 mega-menu redesign had already shipped after merging into `develop` mid-branch; removed the redundant overlay, kept only the genuinely new `:focus-visible` outline; added the missing `CHANGELOG.md` entry
-   **CodeRabbit review caught a real bug the audit missed:** taxonomy links (platform badge, category badge, tag pills) rendering inside the same cards as the stretched read-more link had no `z-index`, so the overlay was silently intercepting clicks meant for those taxonomy links; fixed across all 3 affected cards by giving non-CTA links their own stacking layer above the overlay
-   Also fixed a pre-existing PHPCS failure surfaced by the same review — `patterns/footer.php` missing its `@package` docblock tag
-   **PR #29 opened** against `develop`, fully labelled and assigned — standing by, no further action pending review

---

## Time Logs

-   3.45 hrs - Working on LS-2801 and LS-2804
-   1.40 hrs - Merged PR #28 and continued working on LS-2804
-   2.20 hrs - Working on the Menus again, finalising some changes, I only noticed them on the DEV site. Also completed LS-2804

---

## Notes

-
