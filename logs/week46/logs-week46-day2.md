# Week 46, Day 2 Log 2026-07-28

## Today's Progress

### What have you accomplished today?

---

**LS-1616** — Rebuild Portfolio + Blog Archive Templates `[Backlog]`

-   **Built the Hero section** (`patterns/hero/work-hero.php`) — breadcrumb trail, eyebrow badge, H1, description, two CTA buttons, and a new Work Capability List card component
-   Added new section/block styles and 3 tinted icon-well styles; one new token added (`icon.commerce`) after being flagged and approved — justified as no orange-family scale exists in the palette
-   Responsive layout uses `core/columns` (auto-stacks on mobile) and the existing fluid font-size scale for the H1
-   **Scaffolded the actual template** — `templates/page-work-archive.html` + `patterns/template-work-archive.php` registered as a custom page template for iterative testing; will become the real Portfolio archive template as scope progresses
-   **Bugs found and fixed via live DOM inspection:**
    -   800px-squash bug — content defaulting to `contentSize` without explicit `alignwide`/`alignfull`; fixed generally and specifically for Yoast breadcrumbs (which doesn't support the `align` attribute at all)
    -   Icons rendering empty — `outermost/icon-block` needs the SVG embedded directly, not just an icon name reference; fetched real SVGs from the official Phosphor package and embedded properly across 3 components
    -   Duplicate arrow on "Book a consultation" button — removed redundant manual arrow, button style already generates one via CSS
    -   Invisible badge dot — SVG viewBox mismatch causing sub-pixel rendering at small size; fixed by resizing the viewBox
-   **Work Categories section built** (`patterns/sections/work-categories.php`) — eyebrow, heading, intro row, 3 category cards; new compact card style built instead of reusing an ill-fitting existing one
    -   Caught and fixed two "resolve the actual value" bugs — icon wells were using the wrong colour convention, and card headings were using the theme's default H3 size instead of the correct smaller size from Figma
-   **CPT/taxonomy realignment — real blocker resolved:** `ls-plugin` PR #18 renamed the Portfolio CPT/taxonomies to match live, but its data-migration commit was reverted before merge, leaving local test data orphaned under the old post type/taxonomy names; migrated all 5 test posts and re-attached correct new taxonomy terms via MCP — confirmed live
-   **Selected Projects section built** (`patterns/sections/work-selected-projects.php`) — eyebrow/heading/intro, a working platform filter using the existing taxonomy-filter block, and a 3-column Query Loop rendering the project card; rewired card bindings from the old dead taxonomy names to the real ones
-   New per-platform card colour tokens added (WordPress/WooCommerce) with a PHP hook to swap card styling per-post inside the Query Loop
-   **Known open bugs, fixing next:** card permalinks resolving to the old rewrite slug instead of the new one; per-category card colouring not visually differentiating on the live page; WooCommerce card rendering visually broken (missing banner/chip zone)
-   **Remaining:** Blog template still not started; portfolio archive template rename not yet done — still building out the working scaffold

---

## Time Logs

-   3.10 hrs - Working on LS-1616, completed the main components and completed new Hero section design.
-   3.0 hrs - Continued working on work-archive sections on WordPress

---

## Notes

-
