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
-   **Next:** remaining Work archive sections (Selected Projects grid, Across Every Engagement stats, CTA, Where to go next), each following the same Figma spec → token mapping → proposal → build → live verification process
-   **Action item carried forward:** go back over all patterns built so far and verify mobile/tablet breakpoints are genuinely correct at real widths, not just assumed from the fluid type scale

---

## Time Logs

-   3.10 hrs - Working on LS-1616, completed the main components and completed new Hero section design.

---

## Notes

-
