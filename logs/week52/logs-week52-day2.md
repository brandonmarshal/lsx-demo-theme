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

**LS-3229** — Replace outermost/icon-block Usage with Core Icon Block Across ls-theme `[Backlog]`

-   **Scope discovery:** re-scanned both `feature/ls-2594-search-template` (35 files) and `feature/ls-1598-build-services-page` (same 35 + 3 unique) — confirmed 38 unique files total, verified directly against both branches
-   **Batching approach:** one 38-file PR ruled out as unreviewable — split into 5 stacked branches chaining sequentially (Batches 1–4 off each other, Batch 5 stacked separately on the unmerged `ls-1598` branch, same pattern as LS-3228 on Warwick's branch)
-   **Final structure written into the issue:** Batch 1 Navigation/mega-menus (8 files, off `develop`), Batch 2 Homepage (8 files), Batch 3 Work section (8 files), Batch 4 Blog/cards/misc (11 files), Batch 5 Services (3 files, off `ls-1598`)
-   Removed 2 prerequisite blockers from the issue description once no longer needed (icon collection already merged, markup check moved to implementation)
-   **Handoff to a new session** — wrote a proper handoff prompt flagging the 2 real open items; new session correctly refused to proceed until both were resolved
-   **Mapping document produced and corrected:** initial `icon-migration-mapping.md` undercounted real instances by grouping per unique icon rather than per literal occurrence (Batch 1 has 81 real instances, not ~42) — resolved by mechanically extracting every `<svg>` in Batch 1 and exact-path-matching each against the real `lightspeed` collection files, producing a verified 81-instance per-file table
-   2 reconciliation flags confirmed: `trend-up`/`trending-up` are byte-identical but intentionally distinct slugs, kept separate; a mapping doc mis-attribution on `solutions-mega-menu.html` corrected — the per-occurrence table is now the source of truth
-   **Core Icon block markup independently verified live** (insert → serialize → save → inspect via WP-CLI → render via curl) after first fixing a stale local plugin version blocking the test:
    -   Confirmed `core/icon` is fully dynamic/server-rendered, saved as a self-closing comment with no inline SVG in source
    -   Documented the real rendered markup and 4 favourable differences from the old `outermost/icon-block` output (single wrapper, inline styles direct on the `<svg>`, no rotation boilerplate unless set, automatic `aria-hidden` on decorative icons)
    -   Noted a harmless lowercase `viewbox` attribute quirk so it isn't mistaken for a bug in review
    -   Confirmed no conflict between the block-wide default CSS width fallback and per-instance explicit widths
-   **2 open decision points before implementation:** confirming none of the 32 chevron occurrences need `flipHorizontal`/rotation attributes (none currently do); checking whether existing `.has-text-color`/wrapper-scoped CSS selectors still resolve now that those classes land directly on the `<svg>`
-   No implementation started yet — next step is Batch 1 on `feature/ls-3229-icon-block-navigation`

---

**Meeting — Jose Abreu: Playwright Setup Alignment**

-   Jose described his current AI-directed manual checks for front-end pages, templates, patterns, and editor errors; discussed converting these into formal Playwright specs
-   Walked through the existing Playwright configuration, generic navigation tests, and documentation — suite covers broken CSS, runtime/network errors, accessibility, internal links, responsive overflow, media integrity, special routes, and page structure
-   Agreed single-page tests are more appropriate during active development, while full-site scans + BugHerd reporting suit stable/deployed sites rather than local work
-   Identified missing Firefox dependencies as the cause of 23 false BugHerd reports, separate from actual test accuracy — flagged as something to investigate and prevent going forward
-   Reviewed the crawler and URL-limit files controlling full-site discovery
-   **Action items:** share the Playwright setup document with Jose; Jose to review the shared document, Studio documentation, and repo configuration, and confirm access; Jose to evaluate converting his AI-directed checks into formal specs; add Jose's block-recovery checks to the generic Playwright suite; investigate and fix the missing Firefox dependency issue

---

## Time Logs

-   0.40 hrs - Reviewing and attending to AI reviews on PR #43. Applied changes and reviewed it again.
-   0.30 hrs - Meeting with the team, discussing PR workflows
-   1.30 hrs - Final preperations for meeting with Richard, then attended the actual meeting.
-   2.20 hrs - Sourced, verified, and fixed 35 Phosphor-based SVG icons for the `ls-plugin` `lightspeed` icon collection (WP 7.1 Icons API).
-   2.20 hrs - Working on LS-3229, this is now replacing the "outermost/icon-block" in all the patterns, with the new WordPress Core block for icons
-   0.30 hrs - Had a meeting with Jose regarding my playwright setup in ls-theme and showed him how it works so he can implement it for his projects as well. 

---

## Notes

-   The meeting with Richard was very beneficial. He has already activated markdown formatting for our Lightspeed project, he mentioned it was already part of the BETA but they were still testing. It is now active on LS project ONLY.
-   Richard will add me to his email group of other people providing feedback. From there they will share features and I can give feedback on those as I test them.
-   I showed him exactly how our setup currently works and things I would like to improve.
