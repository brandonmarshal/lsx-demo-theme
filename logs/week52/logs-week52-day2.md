# Week 52, Day 2 Log 2026-09-08

## Today's Progress

### What have you accomplished today?

---

**LS-2954** — PR #43 Review Fixes (Search Template) `[Done]`

-   Applied all 4 valid review findings flagged on PR #43 (2 from Copilot, 2 from Brandon):
    -   Added render-marker fallback entries for `search-hero`/`search-results` so their CSS still loads if reused outside a search page
    -   Added `is_search()` to `work-archive-sections`'s head-time condition — Useful destinations was only getting its card styles via the footer fallback, causing a flash of unstyled content
    -   Moved the search-result stretched-link's focus outline to its `::before` overlay — it was previously on the collapsed `font-size:0` link itself, invisible for keyboard users
    -   Gated the optical-leading `transform` behind `@supports not (text-box-trim: trim-both)` so it doesn't double-apply/over-shift in browsers that already support the native trim
-   Replied inline on each PR thread explaining what was fixed
-   Not committed/pushed yet — pending final go-ahead

---

**Meeting — Dev Team (30 min): Workflow Standardisation**

-   **Stacked PRs adopted team-wide** for smaller, easier-to-review changes — page builds and patterns to be separated, styles/structure/tests isolated where appropriate; Warwick to further study the process and finalise branch/PR creation sequence
-   **Linear/GitHub integration:** labels imported from GitHub, issue/PR templates being added to Linear pending validation by Ash; action item for Brandon to send Zared the direct email used to contact Linear support for two-way linking limitations
-   **Issue title structure and templates** discussed — type/scope/description format with skills to auto-assign the right template
-   **PR governance:** Warwick to review Ash's refined GitHub materials and ensure Chris submits LS Flow PRs for human review going forward
-   **WordPress design tokens clarified:** `--wpds-*`/admin dashboard tokens confirmed separate from front-end styling, which stays fully `theme.json`-driven
-   **Scaffolds project agreed** — Warwick to lead a combined starter theme/plugin project standardising build processes, package choices, and design tokens across LS and future Tour Operator themes
-   **Action item for Brandon:** replace the Gmail address currently used for project communication with his work account
-   **Client/project status covered:** Southern Destinations progressing well but flagged for being shown from a local clone rather than proper staging — Ash to escalate this as a workflow risk going forward; ATI final session confirmed rescheduled to Thursday 11am; Go Africa confirmed live with one open review-task ownership issue

---

**Meeting — Richard (Head of Product, BugHerd), 1hr 10min**

-   Full session covering all planning points prepared in advance, plus questions Richard raised that were answered live
-   **Current usage walkthrough:** demonstrated the automated Playwright → BugHerd pipeline — genuine defects (broken links, accessibility violations, layout overflow, broken assets, console errors) turned directly into de-duplicated, correctly-tagged tasks with no human reading raw test output first
-   **AI integration explained:** the two distinct paths — the unattended custom reporter talking directly to the BugHerd API with no human in the loop, versus interactive MCP use in-session for triage/verification/cleanup, with task deletion deliberately kept as a human-only action throughout
-   **4 improvement asks raised, in priority order:**
    -   Markdown/real formatting support in the description field — biggest ask, currently faking headings/bullets in plain text for multi-page findings
    -   A queryable endpoint/MCP tool for the approved tag list, instead of hardcoding it by hand
    -   Bulk operations exposed through the MCP (delete/re-tag/archive by filter) instead of one task at a time
    -   The `done` vs `closed_at` API contract gap — a task moved to done still reports `closed_at: null`, which silently broke the dedup logic and let an already-tracked bug resurface as new
-   **Positive signals shared:** the approved-tags-only constraint confirmed as the right design, not a limitation; BugHerd's own duplicate-detection AI used more than once as an independent check on the pipeline's own grouping logic; MCP tool coverage confirmed close to complete for agentic triage already
-   **3 standalone questions asked and discussed:** whether human-only task deletion is BugHerd's expected design stance for agent/MCP use generally; whether other agencies are automating at this kind of volume; how to keep feeding feedback long-term rather than only via occasional calls
-   Two-way value confirmed — learned some BugHerd settings not previously known, and surfaced a few genuine gaps/inconveniences Richard wasn't aware of on his side

---

**LS-3228** — Source/Convert Missing Icons for the lightspeed Collection `[In Review]`

-   **Research & verification before sourcing anything:**
    -   Confirmed Phosphor's entire icon set lives in one source repo (`phosphor-icons/core`), so no risk of checking the wrong repo
    -   Cross-referenced every icon in the LS-3227 inventory against the full 1,512-icon Phosphor `regular` set and the ~90 already in `lightspeed`, using exact SVG path-string matching rather than name guessing
    -   Ran a full visual side-by-side comparison for every non-exact match, scored by accuracy %, flagging anything under 85% for manual review
    -   Caught and corrected 2 wrong identifications from the original LS-3227 pass before anything was sourced — one guessed as "shopping-cart" was actually `airplane-tilt` (100% exact match, used for Tour Operators), another guessed as "trophy" was actually `paint-brush` (100% exact match, used for Design)
    -   Checked 2 other in-flight, unmerged `ls-theme` branches for icon usage the original inventory might have missed — found 2 additional icons (`sparkle`, `question`) in the Services page work
    -   Worked through every ambiguous icon directly with Brandon to confirm correct names/usage before finalising
-   **Result:** 42 total icon needs identified → 5 reused from the existing collection → 3 pairs collapsed to one shared file each → 35 new files added (34 sourced from Phosphor `core`, 1 custom solid-fill `dot.svg` for section-badge bullet markers)
-   PR #21 opened — stacked on Warwick's #20, diff limited to the 35 new files, blocked from merging until his lands
-   **Review fix applied:** PR review flagged `fill="currentColor"` incorrectly placed on the `<svg>` root instead of the `<path>` — the WP 7.1 icon sanitiser strips root-level `fill`, so icons were rendering solid black; checked all 35 new files and found the same issue across all 34 Phosphor-sourced icons (not just the 2 originally flagged), plus `dot.svg` had no `fill` at all — fixed all 35 to match the collection's documented convention
-   Not yet committed/pushed — handling manually
-   **Next:** once PR #21 is reviewed/merged, the icon → theme-pattern mapping feeds directly into LS-3229's block-migration work

---

## Time Logs

-   0.40 hrs - Reviewing and attending to AI reviews on PR #43. Applied changes and reviewed it again.
-   0.30 hrs - Meeting with the team, discussing PR workflows
-   1.30 hrs - Final preperations for meeting with Richard, then attended the actual meeting.
-   2.20 hrs - Sourced, verified, and fixed 35 Phosphor-based SVG icons for the `ls-plugin` `lightspeed` icon collection (WP 7.1 Icons API).

---

## Notes

-   The meeting with Richard was very beneficial. He has already activated markdown formatting for our Lightspeed project, he mentioned it was already part of the BETA but they were still testing. It is now active on LS project ONLY.
-   Richard will add me to his email group of other people providing feedback. From there they will share features and I can give feedback on those as I test them.
-   I showed him exactly how our setup currently works and things I would like to improve.
