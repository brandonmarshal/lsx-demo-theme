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
    -   Found and fixed missing Firefox/WebKit browser binaries causing ~19 false "browser executable missing" tasks — environment issue, not code
    -   Found and fixed Firefox-specific console error noise breaking grouping, plus ANSI codes leaking into task titles/descriptions for bare `expect.soft` checks
    -   Manually reviewed and deleted 18 confirmed-duplicate tasks created during this run
-   **First "final" confirmation run — all 4 improvements verified at scale:**
    -   Discovered the earlier Firefox fix had actually never worked — tested against a hand-typed approximation rather than the real captured bytes (real message uses an escaped quote the original regex never matched); fixed properly this time against real content
    -   Recognised every signature-algorithm change was making previously-created tasks stale, causing repeat duplicates on every re-run — did a full clean sweep, deleting all 44 same-day backlog tasks and running fresh
    -   31 tasks created from a clean slate — grouping proven at real scale (30 pages with placeholder links → 1 task, 20 pages with a 404'd CSS resource → 1 task, etc.)
    -   Programmatic re-verification confirmed zero ANSI bytes, zero non-approved tags, zero description-length violations, only 1 remaining (already-accepted) duplicate cluster
-   **Reopened same day after a readability request surfaced a much bigger issue:**
    -   Restructured `buildDescription()` to use plain-text pseudo-headings and per-page bullets with extracted category-specific detail, instead of repeating identical diff boilerplate per occurrence that was crowding out real content within the character cap
    -   **Major finding:** `MAX_TEST_URLS = 10` — a forgotten temporary rollout throttle — meant every "test every discovered page" standing spec had silently only ever tested the first 10 of the site's real ~326 pages this entire ticket; raised to 30 as a deliberate middle ground
    -   **Timeout bug found and fixed suite-wide:** several specs looping over all discovered pages were hitting Playwright's bare 30s default and getting killed mid-request, producing misleading `net::ERR_ABORTED`/`Request context disposed` errors that were being wrongly filed as real site bugs; added scaled `testInfo.setTimeout()` to all 8 affected specs, gave the `siteUrls` fixture its own 120s setup timeout, added a 60s top-level config safety net, capped local workers at 4, and extended noise-filtering for both misleading error phrasings
    -   Added retry-with-backoff on BugHerd HTTP 429s (previously silently dropped) plus a small delay between sequential group-report calls to reduce rate-limit hits
    -   Fixed 4 message-less assertions in `special-routes.spec.ts` causing "unknown page" bullets and false-looking duplicates; fixed a broken-link summary bug accidentally grabbing Jest's own boilerplate instead of the real HTTP status
    -   Verified via 2 full delete-all-and-rerun cycles — second run: 20 real tasks, only 1 correctly-filtered timeout (down from 5), real URLs throughout
-   **Not yet committed** — recommended one more clean run before calling this genuinely done; more testing planned for a future session

---

## Time Logs

-   3.15 hrs - Working on a bug I noticed with Mobile Menu Dropdown for mobile. And then finishing off LS-2810
-   2.0 hrs - Ran the full suite testing on Dev site and came across a lot more bugs, so I audited those and have been applying fixes and re-testing.
-   3.20 hrs - Working on LS-2810, still more testing and bugs to resolve. 

---

## Notes

-
