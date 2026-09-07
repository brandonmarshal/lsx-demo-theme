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
-   Hero passes lint, escape, security, and PHPCS checks cleanly
-   **Hero refinements pass:**
    -   Fixed left-alignment drift on the eyebrow badge and description — WordPress's `constrained` layout centres non-full-width children by default, added explicit `justifyContent:"left"`
    -   Attempted a decorative "stacked cards" peeking effect behind the lifecycle preview card; after several rounds of CSS specificity/height issues, decided it wasn't worth the fragility and reverted to a plain single card, removing all associated plumbing
    -   Increased the lifecycle card's text to the `200` font-size token (16px)
    -   Fixed a real breadcrumb→badge spacing inconsistency — resolving to a cramped 14px despite using the same fluid token elsewhere — bumped to `spacing|30` (20px) to match the section's rhythm
    -   **Reworked the 14 service tag pills:** label text switched to neutral dark text with icons staying phase-coloured; added subtle phase-tinted background/border via colour-mix; increased padding; added hover/focus-within states plus a `:focus-visible` outline ring for keyboard accessibility — required a new `src/scss/structural/services-hero.scss` since hover/focus states have no block-supports equivalent, wired into the build/enqueue system the same way as other hero bundles
    -   Found and worked around a local testing gotcha — the dev `/services/` test page had blocks statically copied into the database rather than referencing the pattern live; resynced via WP-CLI so edits now show correctly
-   All changes validated via lint, escape, security, and PHPCS checks; interactive states verified via real DOM focus/computed-style inspection
-   Nothing committed yet — working tree only

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

---

## Notes

-
