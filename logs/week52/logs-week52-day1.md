# Week 52, Day 1 Log 2026-09-07

## Today's Progress

### What have you accomplished today?

---

**Meeting — Ash Shaw: Project Review & Alignment**

-   **PR/review workflow:** 10 BugHerd tickets currently blocked on Warwick's review of a dependent PR; a separate PR with Zared expected reviewed this afternoon; agreed to follow up with Warwick first thing Monday to unblock; Ash to arrange an earlier PR review schedule
-   **Stacked PRs adopted going forward** — to avoid future bottlenecks from waiting on one branch's merge before continuing dependent work
-   **BugHerd/Playwright integration:** confirmed working as expected; Ash flagged he must be CC'd on all external partner communications going forward (was left out of the Richard/BugHerd outreach) since he owns the partnership
-   Feedback/planning document compiled from the BugHerd session to be folded directly into the master test documentation, with a tracked task added on the board
-   **PageSpeed:** homepage fixes confirmed complete; Ash stressed consistent use of the custom PageSpeed and other AI agents going forward
-   **Linear board cleanup done** — "In Progress" restricted to active work only, "Tracking" used for the week's structured plan
-   **BugHerd board batching required** — group similar tickets (e.g. consecutive console-error links) and move active batches from Backlog into To Do, planned via Linear
-   **Agent skills specification** — confirmed not yet read; to prioritise reviewing it; any new skill must be planned via OpenSpec and saved under a subfolder in `.github`'s skills root
-   **Testing standards set:** human browser testing on Dev required after every PR merge, tracked in the PR's own testing criteria; ChatGPT agent to be used for drafting human test cases as a baseline before Playwright automation; W3C/CSS/markup validation audits scheduled for this week, not yet run
-   **Mobile menu issues flagged:** parent items like "Work" not opening on tap, "See Solutions" link too small, oversized spacing gaps under Solutions sub-items, "Systems" menu item leads nowhere — Systems to be removed from the menu entirely for now to prioritise launch

---

**Meeting — Warwick Booth: WordPress 7.1 Upgrade & Plugin Alignment**

-   Confirmed the backend target for WordPress 7.1 admin tokens in the Tour Operator settings
-   Architectural decision: move SVG icons into `ls-plugin` using native core blocks, plus a transition to cleaner PHP class namespacing
-   **Sequential task checklist agreed:**
    -   Troubleshoot the JS-based colour switcher via post-click stylesheet reload testing
    -   Fix the light logo image block validation error by stripping the temporary hardcoded height/width attributes
    -   Extract remaining icon styles from Figma once Warwick registers the initial group and hands over the plugin branch
    -   Transition layout files/patterns (e.g. cards) from the third-party Outermost icon block to the native WP 7.1 core block
    -   Update the Linear epic, tasks, and dependencies to reflect the new plugin-centric icon architecture

---

**LS-1598** — Build Services Page `[In Progress]`

-   Reviewed AGENTS.md and existing patterns/styles for reuse before starting
-   Pulled real design context for all 7 Figma frames (hero, 5 content sections, CTA) via Figma MCP; audited all colours/typography against `theme.json`/`styles/dark.json` — everything resolves to existing tokens, no new tokens needed
-   Confirmed the "Ten services" heading actually needs to read "Fourteen services" per client decision
-   Verified all 14 individual `/services/{slug}/` pages already exist on dev — no new pages required (one accidental duplicate created and immediately deleted)
-   **Hero built and validated** (`patterns/hero/services-hero.php`) — breadcrumb, eyebrow, heading, description, CTA buttons, a 14-item service tag row colour-coded by lifecycle phase matching the mega menu convention, each linking to its real service page, plus a decorative preview card reusing the existing glass-card shell
-   **Hero refinements pass:**
    -   Fixed left-alignment drift on the eyebrow badge and description — added explicit `justifyContent:"left"` to override WordPress's default centring
    -   Attempted a decorative "stacked cards" peeking effect behind the lifecycle preview card; reverted to a plain single card after several rounds of CSS specificity/height issues weren't worth the fragility
    -   Increased the lifecycle card's text to the `200` font-size token (16px)
    -   Fixed a real breadcrumb→badge spacing inconsistency — bumped to `spacing|30` (20px) to match the section's rhythm
    -   **Reworked the 14 service tag pills:** neutral dark label text with phase-coloured icons, subtle phase-tinted background/border, increased padding, hover/focus-within states plus a `:focus-visible` outline ring — required a new `src/scss/structural/services-hero.scss` since hover/focus states have no block-supports equivalent
    -   Found and worked around a local testing gotcha — the dev `/services/` test page had blocks statically copied into the database rather than referencing the pattern live; resynced via WP-CLI
-   **Section 2 built** (`patterns/sections/services-service-clusters.php`) — "Five ways the work groups together": eyebrow/heading/description row plus 5 service-cluster cards in an asymmetric 3+2 bento layout, each with an icon well, index number, heading, description, and a footer row of tag links to the individual service pages
    -   No existing card shell fit, so created a new shared style `styles/sections/cards/card-cluster.json` after confirming the gap
    -   Applied lessons from the hero's earlier whole-pill-click bug — built the tag links' clickable overlay correctly from the start this time, no rework needed
    -   Used a local closure for per-card render logic instead of a top-level named function, avoiding a redeclaration risk since pattern files can be included more than once per request
    -   **Follow-up fixes from review:** equal card heights via `dimensions.minHeight: 100%`; footer tags pinned to bottom via `margin-top: auto`; fixed a real bug where the second card row's `blockGap` was nested outside `spacing`, silently falling back to WordPress's default gap; distinguished Section 2's background from Section 1's using the existing `surface.card` token, matching the established alternating-section convention
-   All changes validated via lint, escape, security, schema, and PHPCS checks; verified live via computed styles and `get_page_text` against the local test page
-   Nothing committed yet — working tree only

---

**LS-3113** — WordPress 7.1 Icons API Migration `[In Progress]`

-   **Replanned after a context shift** — icon registration moved from `ls-theme` to `ls-plugin`, which already has a working `lightspeed` icon collection (auto-registers any SVG dropped into `assets/icons/lightspeed/`, ~90 icons already added by Warwick under LS-3224/PR #20); the old theme-side registration plan no longer applied
-   **Linear restructured:** cancelled the 4 obsolete sub-issues (LS-3115–3118) with explanatory comments on each; retitled the epic to reflect the new scope (supply icon inventory to `ls-plugin` + migrate `ls-theme` to the Core Icon block); created 4 new sub-issues — LS-3227 (inventory), LS-3228 (source/convert missing icons), LS-3229 (replace `outermost/icon-block` with Core Icon block), LS-3230 (QA)
-   **LS-3227 completed:** scanned all 35 theme files using the old Icon Block plugin; found 57 unique icon shapes, matched 16 exactly against Warwick's existing `lightspeed/*` icons; visually identified the remaining 41 via rendered comparison; findings logged and issue moved to Done
-   **Decisions confirmed:** both "circle dot" icons kept as distinct named icons (genuinely needed as bullet markers, no non-icon WP alternative); duplicate cart icon (fill + stroke) consolidated into one; a per-icon → pattern/file mapping to be retained to fix theme usages afterward; new icons added directly onto Warwick's existing branch, same location as his 90
-   **LS-3228 approach finalised, not yet started:** 40 icons to source/convert in Phosphor regular-weight fill style, added directly to `feature/ls-3224-register-a-set-of-phosphor-svg-icons` — awaiting approval once set up in the `ls-plugin` repo

---

**Issues created today (no work done yet):**
-   LS-3222 — Fix Mobile Menu (non-clickable links, remove Systems item)
-   LS-3223 — Plan New Skills via OpenSpec

---

## Time Logs

-   0.40 hrs - Meeting with Ash regarding LS-site
-   0.40 hrs - Meeting with Warwick regarding the new WordPress 7.1 imporvements to be made.
-   1.15 hrs - Planning work this morning after meeting with Ash. There were a few new task I had to track. Update my weeks planning to align with the new tasks and general morning admin.
-   1.30 hrs - Setup the planning for the full page build and all patterns for LS-1598 service page build. AI agent got context from Figma frames etc. Hero pattern has been built.
-   1.35 hrs - Continued working on LS-1598 testing the Hero pattern and fixing all mismatch areas.
-   1.30 hrs - Continued working on LS-1598, built new section patterns, and testing Dark/Light, Mobile/tablet etc.

---

## Notes

-
