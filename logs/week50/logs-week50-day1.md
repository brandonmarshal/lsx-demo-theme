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
-   **Generic dropdown redesign (Work/Solutions/Pricing/Insights/About):** iterated through several design directions using real reference patterns, landed on one bounding card per accordion body with a left accent rail + soft tint on hover/focus; fixed a CTA row padding misalignment and a mis-styled "Design Systems" item
-   **Root-cause bugs found and fixed:**
    -   Dark-mode token not resolving — traced to a stale cached "Custom Styles" DB record shadowing the theme file; patched directly and flushed cache
    -   **Bigger structural bug found:** `/styles/blocks/**.json` and `/styles/sections/**.json` were never actually being loaded into WordPress at all — only `/styles/presets/` was wired up; fixed by extending `inc/presets.php` to properly merge and register both folders, benefiting every style variation in those folders, not just this menu
    -   Attempted an accent-tag accordion indicator using the newly-fixed pipeline — reverted after it still didn't render correctly, flagged to revisit later
-   **Services dropdown:** preserved its unique phase-colour design throughout; reworked the 2-column phase grid into colour-coded chip badges per phase label with plain rows underneath; bounding-card treatment matching the other dropdowns deferred as the next step
-   Not yet committed — implementation continues

---

## Time Logs

-   3.0 hrs - Working on Homepage build cleanup, final review. Also had a meeting with Ash & Zared to go over the playwright setup.
-   3.0 hrs - Finalising the Mobile Menu design, working on a new design that is more accessible. 

---

## Notes

-
