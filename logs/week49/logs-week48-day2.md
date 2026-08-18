# Week 49, Day 2 Log 2026-08-18

## Today's Progress

### What have you accomplished today?

---

**LS-2335** — Set Up Playwright Testing + Generic Assertion Helpers `[In Progress]`

-   Renamed PR #20 to reflect full scope: "Add Playwright testing: generic assertions, standing regression suite, and BugHerd auto-logging"
-   **CodeRabbit + Copilot review triage** — went through all 13 review comments, checked each against current code before acting:
    -   Several already fixed in earlier commits
    -   3 genuinely valid, fixed: crawl fallback matching non-nav `href` attributes and resolving relative links incorrectly; overflow detection comparing against requested viewport instead of actual measured width; main navigation's own intentional 404 response being flagged as a broken resource
    -   1 (the `MAX_TEST_URLS` throttle) confirmed as an already-known, deliberate rollout decision
-   **Incident — accidental live BugHerd task creation:** a verification run used the real reporter instead of an override, creating 6 unintended tasks; also surfaced a genuine race condition where 2 tests sharing a failure signature could both create a task simultaneously — fixed with a per-`external_id` lock serializing same-key report attempts, verified via an offline race simulation
-   **BugHerd task metadata improved:** automatic priority mapping (critical/important/normal based on failure type) and automatic requester attribution via `git config user.email`
-   Found and resolved a separate BugHerd-side issue — its own AI auto-title feature was occasionally generating titles in French; fixed via a BugHerd settings change, not code
-   **External review from a GPT-based Playwright Testing Agent** — sent full context on the existing setup per a request from Brandon's manager for additional coverage review; got back 11 structured test-case recommendations with a traceability matrix
-   Reviewed and triaged the recommendations: 6 accepted for immediate implementation (8 items once split out), 2 deferred with `.skip` (FAQ accordion not live yet, 404 page has no real content yet), 2 dropped entirely (browser zoom/reflow, visual regression screenshots)
-   **Sourced real test fixtures from dev via read-only MCP** instead of guessing — a search term with exactly 1 confirmed match, and 2 real paginated archive/taxonomy examples (News category, Development tag)
-   **Built the next batch of specs:** `header-search.spec.ts`, `navigation.spec.ts`, `archive-pagination.spec.ts`, `keyboard-navigation.spec.ts`, `reduced-motion.spec.ts`; added `faq-accordion.spec.ts` but skipped (FAQ block not live yet); extended `special-routes.spec.ts` and `internal-links.spec.ts`; added new standing spec `page-structure.spec.ts`
-   Found and fixed 3 test-authoring mistakes during verification, plus 1 new real site bug: a zero-size, keyboard-reachable mega-menu link sitting inside a closed dropdown panel
-   **First code-review validation pass — CodeRabbit, 23 findings:** checked every claim against real code; 6 genuinely valid and fixed (a listener leak, a config crash on missing `BASE_URL` moved into a new `global-setup.ts`, a missing network-errors allowlist, a crawl-budget mismatch, 2 mislabeled tests); rest already known/tracked or already disproven
-   **Second code-review validation pass — Copilot, 10 findings + 1 flagged "High" severity:** 8 valid and fixed (relative-link resolution, a body-fallback gap, hardcoded DB-specific content replaced with a dynamic REST lookup, a wrong-property assertion, an OS path-separator bug in the dedup hashing, an iframe-scoping gap, a missing README install step, and a heading-hierarchy check that went inert — fixing it immediately caught a real, previously-hidden h1→h3 skip on a live page); 1 rejected with direct evidence; the "High" severity flag (git-email sent to BugHerd) investigated and confirmed intentional/low-risk, documented in the README rather than changed
-   **Removed 3 page-specific feature specs** (`work-archive.spec.ts`, `work-single.spec.ts`, `archive-pagination.spec.ts`) — decided the suite should only contain genuinely page-agnostic specs; all 3 recoverable from git history
-   **Final pre-commit review** — found and fixed 2 remaining stale references, added a proper CHANGELOG `### Removed` entry, re-confirmed every modified file loads clean
-   **Planned but not yet built:** a comprehensive Google Doc explaining the whole Playwright/BugHerd setup for the rest of the team, structured with a linked outline standing in for tabs
-   All code changes committed; only pre-merge items remain open (`.env` `BASE_URL` → staging, `MAX_TEST_URLS` → full site) plus the planned doc

---

## Time Logs

-   2.20 hrs - Working on the Playwright branch, adding more features and reviewing recommendations from AI reviews.
-   3.10 hrs - Completed the additional Playwright setup, found bugs to fix and completed the review on the PR, and planned the document to build for this implementation of Playwright.

---

## Notes

-
