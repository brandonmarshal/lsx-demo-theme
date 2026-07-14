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

-   **Part 1 (`ls-plugin`) complete:**
    -   `ls-plugin/breadcrumbs` dynamic block built — full trail from core WordPress data only; Yoast integration dropped due to indexable caching quirk
    -   All acceptance-criteria scenarios tested on localhost ✅
-   **Part 2 (`ls-theme`) complete:**
    -   `patterns/breadcrumbs.php` updated to wrap `<!-- wp:ls-plugin/breadcrumbs /-->` as single source of truth
    -   `breadcrumbs` template part wired into `page.html`, `single.html`, and `archive.html`
    -   Added `Requires Plugins: ls-plugin` theme header
    -   All scenarios verified on localhost — top-level page, nested pages, single post, nested category archive, portfolio item all ✅
    -   **Bug found:** on CPT archive pages (e.g. `/portfolio/`) final crumb renders as `Archives: <span>Portfolios</span>` — root cause is `get_the_archive_title()` returning literal `<span>` tags; fix belongs in `ls-plugin`'s `render.php`; to be tracked as a separate bug ticket
    -   Only the two PRs (`ls-plugin` #16, `ls-theme` pending) remain to be opened and merged

---

**LS-1226** — Template & Template Part Dedupe Pass `[In Progress]`

-   Finding logged from LS-1228 Part 2 work:
    -   `templates/archive.html` has no `<main>`/query-loop content at all — header, breadcrumbs, footer only; visiting a live category archive confirms no post list renders; pre-existing gap, not introduced by breadcrumbs work
    -   This blocks the "All Archives — confirm 1 canonical" line item until archive content is added
    -   Breadcrumbs duplication between template part and registered pattern now resolved via Part 2 — `patterns/breadcrumbs.php` is the single source of truth
    -   `wp:template-part` attribute consistency (`"theme":"ls-theme"`) inconsistent across templates — worth normalising during this dedupe pass

---

## Time Logs

-   3.50 hrs - Working on the tasks mentioned above, reviewing PR's and merging them.
-   2.0 hrs - Working on LS-1229 and LS-1228

---

## Notes

-
