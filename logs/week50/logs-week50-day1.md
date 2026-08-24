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

## Time Logs

-   3.0 hrs - Working on Homepage build cleanup, final review. Also had a meeting with Ash & Zared to go over the playwright setup.

---

## Notes

-
