# Week 49, Day 4 Log 2026-08-20

## Today's Progress

### What have you accomplished today?

---

**LS-1616** — Rebuild Portfolio + Blog Archive Templates `[In Review]`

-   **AGENTS.md compliance audit** on all 30 changed files — checked SCSS commenting, `theme.json`/`dark.json` token parity, `animations.css` isolation, PHP escaping/security, and CHANGELOG conventions; ran full validation suite (`schema:validate`, `theme:validate`, `patterns:escape`, `security:scan`); found largely compliant, fixed one stale CHANGELOG line incorrectly claiming an "Outline On Dark" button variant that doesn't exist
-   **Copilot suppressed-comments triage** — reviewed 12 findings, sorted real bugs from noise; 4 confirmed and fixed:
    -   `border.on-dark` contrast failure — remapped from `neutral-800` to `neutral-500` in both `theme.json` and `dark.json`, now passing at 5.07:1 / 4.14:1
    -   `has-border-color` class with no backing colour on the Writing CTA block — added the missing `border.on-dark` token
    -   Hover-lift effect bleeding from Blog post cards onto Engagement's static stat cards — scoped the selector properly
    -   3 findings (RTL, multibyte word count, "search doesn't filter") rejected as false positives/out of scope, with reasoning
-   **Search pill bug fixed** — Blog All Articles search box was rendering nearly invisible and square instead of pill-shaped; root cause traced to `core/search`'s odd `selectors.border` mapping being overridden by the pattern's own CSS reset; fixed by moving border/radius/background onto the root element directly
-   **Blog Hero background glow — root cause found and fixed properly:**
    -   Discovered the real bug first — an inline gradient style from a block attribute was silently overriding any CSS background-image, meaning the original two radial glows from the initial PR had never actually rendered
    -   Fixed by moving the base gradient into the CSS file and removing the inline attribute
    -   Several manual attempts at matching the glow shape/colour/position from screenshots missed the mark
    -   Once Figma MCP became available, pulled exact design data directly from the real node and decoded the SVG gradient math into precise CSS values — landed the final accurate 3-colour aurora glow, reusing existing palette presets rather than inventing new tokens

---

## Time Logs

-   2.0 hrs - Working on the final touches on blog-archive template.

---

## Notes

-
