# Week 44, Day 2 Log 2026-07-14

## Today's Progress

### What have you accomplished today?

---

**LS-1227** — ls-theme: Fix breadcrumbs filename typo + align template-part attributes `[Done]`

-   PR #15 approved and merged — issue fully complete

---

**LS-1229** — Build navigation ref auto-resolver for header nav `[Done]`

-   Built `LS_Plugin_Nav_Ref_Resolver` class — looks up `wp_navigation` post by slug and injects resolved ID into any `core/navigation` block with an empty `ref`
-   Dropped original plan to seed a specific menu — `ls-plugin` is for public release; baking one site's nav into it would be wrong
-   Added `suppress_filters => false` so multilingual plugins can resolve the correct language nav post
-   All CodeRabbit and Gemini Code Assist feedback addressed; PR #15 merged; issue moved to Done

---

**LS-1228** — Build breadcrumb dynamic block `[In Progress]`

-   **Part 1 (`ls-plugin`) complete** — custom `ls-plugin/breadcrumbs` dynamic block built; Yoast integration dropped at the time due to indexable caching quirk; all scenarios tested ✅
-   **Part 2 (`ls-theme`) complete:**
    -   `patterns/breadcrumbs.php` updated to wrap the block as single source of truth; template part wired into `page.html`, `single.html`, and `archive.html`
    -   Bug found: CPT archive pages render final crumb as `Archives: <span>Portfolios</span>` — `get_the_archive_title()` returns literal `<span>` tags; fix needed in `ls-plugin`'s `render.php`
    -   `archive.html` confirmed to have no query-loop content at all — pre-existing gap, logged separately against LS-1226
-   **Research & re-plan (today):**
    -   Discovered Yoast SEO ships a first-party Gutenberg block (`yoast-seo/breadcrumbs`) designed specifically for Site Editor templates — insert once, applies automatically everywhere, includes `BreadcrumbList` schema, all behaviour configured via Yoast settings
    -   Confirmed the custom `ls-plugin/breadcrumbs` block was unnecessary — Yoast already provides this natively; the earlier detour happened after hitting a real Yoast template-tag bug rather than checking for a purpose-built block
    -   Audited Part 2 blast radius — custom block dependency is isolated to a single line in `patterns/breadcrumbs.php`; branch has no open PR so safe to correct
    -   **Re-plan agreed:**
        -   Part 1: remove the custom `ls-plugin/breadcrumbs` block entirely
        -   Part 2: swap `patterns/breadcrumbs.php` to reference `yoast-seo/breadcrumbs` instead
        -   Open decision flagged for team lead: whether `ls-theme` should formally declare Yoast SEO as a required plugin dependency
    -   Re-plan posted to LS-1228 — no further implementation until team lead approves

---

**LS-1226** — Template & Template Part Dedupe Pass `[In Progress]`

-   `templates/archive.html` confirmed to have no `<main>`/query-loop content — pre-existing gap, logged here as independent of the breadcrumbs block choice
-   `wp:template-part` attribute consistency (`"theme":"ls-theme"`) inconsistent across templates — to be normalised during dedupe pass

---

## Time Logs

-   3.50 hrs - Working on the tasks mentioned above, reviewing PR's and merging them.
-   2.0 hrs - Working on LS-1229 and LS-1228
-   1.40 hrs - Had to plan a re-approach for LS-1228, waiting for Approval by team lead. Continuing with other work in the meantime.

---

## Notes

-
