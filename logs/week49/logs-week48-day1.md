# Week 49, Day 1 Log 2026-08-17

## Today's Progress

### What have you accomplished today?

---

**LS-2615** — Phase 2: Rationalize animations.css Contents `[Todo]`

-   Spent significant time working through the right approach for separating genuinely global animation rules from page/pattern-specific CSS that had leaked into `animations.css`, weighing several different structural options before landing on the final approach
-   **Consolidated all leaked page-specific styles** (cards, button variants, home hero, work hero, FAQ) into one dedicated `components.css` bundle, loaded unconditionally alongside `animations.css`
-   Verified via a full manual read of `animations.css` (now 903 lines) that every remaining rule is genuinely global — header, footer, mobile menu, mega menu, and reusable core-block motion — nothing pattern-specific left
-   Removed an interim 5-bundle setup and its content-marker-sniffing PHP conditional-enqueue logic in favour of the single unconditional stylesheet
-   Fixed a dead `wp_enqueue_style()` call left pointing at a now-removed file, and corrected stale doc references across 2 files to point at the new `components.scss` location
-   `lint:json` and `build:css` both pass clean; rebuilt CSS verified byte-identical to staged
-   Went straight to the fix rather than producing the formal audit table the ticket originally called for — net result still satisfies the ticket's underlying goal
-   **Copilot review pass applied on the PR:**
    -   Enabled `settings.spacing.blockGap` in `theme.json` — root cause of 4 flagged patterns with "inert" `blockGap` attributes was WordPress's own default being `null` theme-wide, silently disabling block-gap support for every pattern relying on it, not just the 4 flagged; fixed at the setting level
    -   Replaced a direct palette reference with the correct semantic border token in `components.scss`, per the theme's design-token policy
    -   Fixed a stale comment in `gsap-animations.scss` pointing at a deleted file
    -   Corrected a false `CHANGELOG.md` claim about a class rename that never actually happened
    -   2 other findings flagged but left for separate follow-up
-   **`components.scss` eliminated following the Zared meeting below, split into 8 semantic structural files:**
    -   Deleted `components.scss`/`components.css` entirely; replaced with 8 independent files under `structural/` — `taxonomy-filter`, `work-project-card`, `work-archive-sections`, `card-shells`, `cta-buttons`, `home-hero`, `work-hero`, `faq`
    -   Split separates genuinely Work-archive-only content (template-bound) from multi-page insertable patterns (Card Feature/Services/Solutions, CTA patterns, FAQ)
    -   All 8 still loaded unconditionally for now — this phase is file separation only, not conditional loading; documented the template-bound vs insertable-pattern distinction as groundwork for whoever picks up conditional loading next
    -   Fixed stale path references left behind in 3 files, plus an unrelated pre-existing documentation bug in `card-list-shell.json`
    -   Verified old vs new compiled CSS by comparing selector/declaration pairs as sets — all 450 preserved, zero missing, zero extra; `build:css`, `lint:json`, `php -l` all pass clean

---

**Meeting — Zared Rogers: Theme Architecture & Global Animation CSS Standards**

-   "Work" page confirmed hitting 99% PageSpeed performance despite CSS concerns; dev environment noted as typically slower than live
-   `components.scss` flagged as the same underlying problem this ticket started with — another large, unconditionally-loaded bundle
-   **Agreed direction:**
    -   Eliminate `components.scss` entirely; break it into small semantic files grouped by actual usage context (not block type), housed in a `structural` folder
    -   Long-term goal: styles should only load on pages where they're actually needed — a proper "only where used" conditional loading system, likely via hijacking WordPress block render calls, to be tackled once Warwick is back
    -   Interim priority if conditional loading proves too complex for now: just get the CSS properly separated into individual files so a future batch update to `functions.php` can implement it later
-   AI instructions updated so the agent no longer defaults to placing styles in the global `animations.scss` unless truly global
-   Action items agreed: refactor `components.scss` into the `structural` folder, prioritise Work page pagination styling once architecture cleanup is done, Zared to review Playwright/BugHerd progress the next morning

---

**LS-2335** — Set Up Playwright Testing + Generic Assertion Helpers `[In Progress]`

-   **PR #20 merge readiness:** merged `develop` into the branch locally, no conflicts; confirmed PR is approved and mergeable but CI is unstable — Validate Theme and PHP Code Quality checks failing; branch itself clean and up to date
-   **Standing regression suite planned:** researched standard Playwright test categories for WordPress block themes, refined toward a proper site-discovery-based standing suite rather than more one-off template specs
-   **8 standing specs planned, in priority order:** site-health, runtime-errors, network-errors, accessibility (new `@axe-core/playwright` dependency), internal-links, responsive-overflow, media-integrity, special-routes
-   Confirmed existing 6 assertion helpers stay as-is for feature-specific tests; not a fit for the generic standing suite
-   **BugHerd auto-logging requirement scoped:** custom Playwright reporter to POST failures to BugHerd's REST API, scoped only to the new standing specs directory so existing content specs aren't affected
-   Designed a dedup strategy using a stable failure ID per test+URL as a searchable BugHerd tag, checked before creating any new task, with cross-linking comments for reopened failures
-   BugHerd credentials added to local gitignored `.env` — noted the API key was accidentally pasted in plaintext in chat at one point; rotation recommended but deferred since other sites depend on the current key
-   **Target environment corrected mid-session:** BugHerd is connected to staging, not local — decided all Playwright runs (existing and new) will point at staging via one `BASE_URL`, confirmed staging auto-deploys from `develop` on merge; trigger stays manual for this phase, CI automation deferred
-   **Final 4-phase plan agreed:** Phase 1 site-discovery foundation, Phase 2 the 8 standing specs, Phase 3 BugHerd reporter with dedup, Phase 4 run workflow/docs
-   **All 4 phases built, verified, and committed:**
    -   **Phase 1 (site discovery):** sitemap-first/REST-fallback/crawl-fallback URL discovery built; safety hardening added (fetch timeout, admin/login path exclusions); verified live against staging — 320 URLs discovered, well under the 500 crawl-budget cap; a temporary 10-URL throttle added during verification, still needs raising before merge
    -   **Phase 2 (8 standing specs):** all 8 built and verified individually then together, kept in their own directory for BugHerd path-scoping; caught and fixed a fail-fast bug where a single failing URL was hiding other real failures — switched to soft assertions across 5 specs; refactored internal-links to dedupe and batch checks after hitting timeouts; verified against real staging content and surfaced 4 genuine pre-existing site issues (broken CSS enqueue, a contrast violation, 2 broken internal links, horizontal overflow at several widths)
    -   **Phase 3 (BugHerd reporter):** built with dedup grouped by failure signature rather than URL, so one sitewide bug doesn't spam dozens of tasks; verified against the real BugHerd API with a manually-approved test task, confirmed dedup holds on rerun, confirmed non-standing specs never reach the reporter; fixed a follow-up issue where dedup'd tasks looked visually identical in BugHerd's UI by leading descriptions with the distinguishing failure detail
    -   **Phase 4 (docs):** added a full Testing section to `README.md` and CHANGELOG entries; `AGENTS.md` intentionally left untouched
-   **Still open before merge:** `.env`'s `BASE_URL` needs pointing at staging; `MAX_TEST_URLS` needs raising from 10 to cover the full ~320-page site

---

## Time Logs

-   4.20 hrs - Working on the final parts of the cleanup, but running into the same issues back and fourth, setup a meeting with Zared to finalise these issues and get past it.
-   0.36 hrs - Code review with Copilot and applying the valid fixes to the code. 

---

## Notes

-
