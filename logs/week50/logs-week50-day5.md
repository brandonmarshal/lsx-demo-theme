# Week 51, Day 1 Log 2026-08-28

## Today's Progress

### What have you accomplished today?

---

**LS-2801** — Final Menu Polish Pass `[Done]`

-   **Mobile menu link sync — new branch `feature/ls-2801-mobile-menu-links-sync`:**
    -   Found `parts/mobile-menu.html` was never updated when the desktop mega menus were wired to real pages/posts — still showing all original placeholder titles and `href="#"` links across all 6 dropdowns
    -   Replaced every placeholder with the exact same label and real URL already live on the matching desktop menu; cross-checked programmatically against all 6 desktop files afterward — full parity confirmed, zero placeholders remain
    -   Fixed the two footer action buttons — "Start a project" now primary (`/free-consultation/`, matching desktop header CTA), "Explore case studies" now secondary (`/work/`), reusing the homepage hero's existing pairing
    -   Deliberately left desktop's secondary per-dropdown CTAs off mobile — confirmed as a scope decision to avoid duplicating the persistent "Start a project" button already visible in the mobile drawer
    -   PR #31 opened, awaiting Zared's final review; once merged, still needs verification on DEV

---

**LS-2810** — Improve Playwright-to-BugHerd Failure Automation `[Backlog]`

-   **End-to-end testing completed against real BugHerd** — deliberately triggered synthetic failures shaped like real standing-suite output to exercise the actual reporter code, not just unit tests
-   Confirmed tags, description content, and the run-scoped dedup cache all worked correctly on first live run
-   **Grouping bug found and fixed:** 2 fake pages with the identical bug created 2 separate tasks instead of 1 — root cause was Playwright's `"Error: "` prefix not accounted for in the URL-stripping regex; fixed by making the prefix optional, re-verified live
-   **Bigger architectural fix made instead of a patch:** found that even with grouping fixed, a task only ever captured whichever page reported first, silently dropping later pages hitting the same bug — root cause was tasks being created *during* the run rather than after
-   Rearchitected `bugherd-reporter.ts` to collect every failure during the run and only report to BugHerd once the entire suite finishes (via Playwright's `onEnd` hook); every task now built with the complete list of affected pages from the start; this also allowed deleting the now-unneeded in-run locking/dedup-cache code entirely
-   Verified with a mocked-BugHerd test — two pages sharing one bug now correctly produce a single task; a genuinely different bug correctly stays separate
-   **PR #32 opened; 2 more real bugs found via PR review and fixed:**
    -   "No response" grouping broken by an end-of-string anchor silently preventing that case from ever collapsing across pages — same root issue as the earlier `"Error: "` prefix bug; anchor removed
    -   Overflow device tags wrongly assumed the check only runs at 375px (mobile); it actually runs at 5 widths (320/375/768/1024/1440) — tag now derived from the real width in the occurrence messages, omitted entirely if a group spans multiple widths
-   **First full real-world run against dev site (all specs, all 3 browsers):**
    -   Found `.env`'s `BASE_URL` had never actually pointed at dev all session — was still `localhost:8882`; corrected permanently
    -   Grouping fix confirmed working on genuine site content — a contrast violation across 2 pages and 32 placeholder links across 8 pages each correctly landed in one task apiece
    -   Found and fixed missing Firefox/WebKit browser binaries causing ~19 false "browser executable missing" tasks — environment issue, not code, fixed via `npx playwright install`
    -   Found and fixed Firefox-specific console error noise (`{file: ... line: N}`) breaking grouping since it wasn't stripped before signature computation
    -   Also fixed ANSI codes leaking into task titles/descriptions for bare `expect.soft` checks with no custom message — consolidated to one shared stripping step
    -   Manually reviewed and deleted 18 confirmed-duplicate tasks created during this run; verified nothing removed that was genuinely distinct
    -   **Known accepted gap, not fixed:** cross-browser/cross-spec correlation for the same broken resource reported with different wording — deliberately not built, would require guessing at similarity rather than removing pure noise
-   All fixes committed; board now a clean, accurate reflection of real dev-site issues; ready for a final confirmation run

---

## Time Logs

-   3.15 hrs - Working on a bug I noticed with Mobile Menu Dropdown for mobile. And then finishing off LS-2810
-   2.0 hrs - Ran the full suite testing on Dev site and came across a lot more bugs, so I audited those and have been applying fixes and re-testing.

---

## Notes

-
