# Week 50, Day 1 Log 2026-08-24

## Today's Progress

### What have you accomplished today?

---

**LS-1597** — Build Home Page `[Backlog]`

-   **Post-review QA fixes on PR #27, following Zared's approval:**
    -   Fixed editor crashes on Why LightSpeed, Featured Work, What We Build, Where to Start, and the mobile menu part — `"layout":{"type":"flow"}` isn't a valid Gutenberg layout type, correct value is `"default"`
    -   Fixed a block validation error on Where to Fit's "Growth" card — shadow style referenced a non-existent theme.json preset, pointed to the real token instead
    -   Fixed a block validation error on the homepage CTA button caused by a missing `has-custom-font-size` class
    -   Shortened the hero badge text so it doesn't wrap awkwardly at narrow mobile widths
    -   Accessibility improvement — converted the homepage CTA's "What you'll leave with" panel to proper `dl`/`dt`/`dd` semantics per a CodeRabbit suggestion
    -   Validated and rejected a second CodeRabbit suggestion (changing Featured Work's post type) as a false positive after confirming against the live site
    -   All fixes backend/markup only, `CHANGELOG.md` updated, PR comment posted summarising for reviewers

---

**Meeting — Ash Shaw & Zared Rogers: Sync Issues, Project Status & Playwright/BugHerd Docs**

-   **GitHub/Linear two-way sync issue:** confirmed the automated sync has been creating unwanted issues in the Tour Operator project since last Wednesday, specifically during plugin-related PRs; Ash disabled two-way sync on both sides as an interim fix; Zared following up with Linear support
-   Action item: close out the duplicate Tour Operator issues via GitHub's main Issues page (bulk close, since single-issue view doesn't support it easily)
-   **Project status:** on track for early September; homepage nearing completion, with reused CSS/patterns expected to speed up remaining pages
-   **Mobile menu bug found:** mobile navigation completely non-functional on Ash's phone — menu was reset during development and links haven't been re-added yet
-   **Testing gap identified:** testing had been done exclusively via Chrome's desktop emulator, which doesn't accurately represent real mobile behaviour; agreed physical device testing is now a requirement going forward
-   **Playwright/BugHerd documentation review:**
    -   Draft doc title flagged as misleading — to be renamed to reference MCP/BugHerd integration rather than just "Playwright Testing Guide"
    -   Confirmed current generic specs check viewport sizing, pattern fitting, colour contrast, and accessibility across every page
    -   Flagged use of "Site Health" terminology as a naming collision with WordPress's own native Site Health feature — to be renamed
    -   Deduplication and CSS-bug grouping in the BugHerd integration confirmed working as intended
    -   Action item: configure default global BugHerd tags (type, area, phase, device) — currently only default priorities are set, no tags

---

**LS-2801** — Final Menu Polish Pass `[Backlog]`

-   **Investigation:** confirmed the mobile menu already uses the core Navigation block, no structural change needed; audited actual style consumer counts before touching anything — found `mega-menu-panel-services` was genuinely single-consumer and folded it into the existing multi-consumer panel style, while `mega-menu-item-service` stayed registered since it's genuinely reused across 6 menus
-   **Generic dropdown redesign (Work/Solutions/Pricing/Insights/About) — first pass:** iterated through several design directions, landed on one bounding card per accordion body with a left accent rail + soft tint on hover/focus; fixed a CTA row padding misalignment and a mis-styled "Design Systems" item
-   **Root-cause bugs found and fixed:**
    -   Dark-mode token not resolving — traced to a stale cached "Custom Styles" DB record shadowing the theme file; patched directly and flushed cache
    -   **Bigger structural bug found:** `/styles/blocks/**.json` and `/styles/sections/**.json` were never actually being loaded into WordPress at all — only `/styles/presets/` was wired up; fixed by extending `inc/presets.php` to properly merge and register both folders, benefiting every style variation in those folders, not just this menu
    -   Attempted an accent-tag accordion indicator using the newly-fixed pipeline — reverted after it still didn't render correctly, flagged to revisit later
-   **Services dropdown — several iterations before landing on the final design:**
    -   First pass (bounded card + chip-badge phase labels) rejected as visually inconsistent with the actual prototype reference
    -   Reverted to original design, then rebuilt properly from a supplied prototype: each lifecycle group full-width and stacked vertically, heading on its own row, links underneath in a real 2-column CSS Grid
    -   Found and fixed the real root cause of a staggered-column bug — WordPress was injecting its own sibling margin onto the grid children, fighting the grid; fixed with an explicit margin reset
    -   Added softened separators between lifecycle groups, corrected link indentation to align under heading text, tightened spacing throughout, and upgraded "See all services" to match the other dropdowns' footer-link CTA treatment
    -   Recovered from an accidental `git checkout` that wiped uncommitted work on the other dropdowns — caught immediately, fully restored, nothing lost
-   **Simple dropdowns (Work/Solutions/Pricing/Insights/About) — redesigned to a new "simple submenu" pattern:**
    -   Removed the bounded/card look entirely, deleted the now-unused style — dropdowns now sit flush against the menu background
    -   Rebuilt as a real 2-column CSS Grid using the same margin-reset alignment fix as Services
    -   Refactored the grid CSS so Services and the simple dropdowns share one base rule set, avoiding duplicated CSS
    -   Each "See all X" footer CTA now matches Services' consistent divider + arrow-accent treatment
    -   Confirmed via diff that accordion behaviour, URLs, menu hierarchy, and keyboard/focus handling were untouched by either pattern's styling work
-   Not yet committed — pending visual review of both patterns together

---

## Time Logs

-   3.0 hrs - Working on Homepage build cleanup, final review. Also had a meeting with Ash & Zared to go over the playwright setup.
-   3.0 hrs - Finalising the Mobile Menu design, working on a new design that is more accessible.
-   2.0 hrs - Working on the Menus dropdowns and meeting with Ash to go over things to get done for the LS Site and PageSpeed testing. Bugherds. 

---

## Notes

-
