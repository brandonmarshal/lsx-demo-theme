# Week 51, Day 1 Log 2026-08-31

## Today's Progress

### What have you accomplished today?

---

**LS-2810** — Improve Playwright-to-BugHerd Failure Automation `[Done]`

-   **Final report and closeout — PR #32 merged:**
    -   `bugherd-reporter.ts` — batches reporting to `onEnd()` instead of per-test so no page hitting a shared bug gets silently dropped; descriptions rewritten to plain-text headings with one bullet per page; route tags now require every title in a group to agree; stopped uppercasing labels (was mangling case-sensitive filenames)
    -   `failure-signature.ts` — approved-tags-only tagging, ANSI stripping run first, URL-normalisation now tolerates Playwright's `"Error: "` prefix, static-resource grouping by asset URL, generalised noise-filter to catch the same timeout surfacing through different call names
    -   `site.ts` — `MAX_TEST_URLS` raised 10 → 30 (confirmed against a live sitemap count of 326 real URLs) with its own 120s setup timeout
    -   `playwright.config.ts` — added a 60s top-level timeout safety net, capped local workers at 4
    -   `bugherd-client.ts` — added retry-with-backoff on HTTP 429s
    -   Added custom failure messages to 4 previously bare assertions in `special-routes.spec.ts`; added scaled per-page timeouts to all 8 standing specs looping over site URLs
-   **Verification:** 5 full delete-all-and-rerun cycles against the live dev site; final run — 19 real tasks, 12 noise messages correctly filtered, zero false positives, zero "unknown page" bullets; 18 unit-verified noise-pattern cases
-   **PR #32 review addressed** — 8 comments: 3 fixed this pass (multi-title route tagging, label casing, noise-pattern scope), 3 already resolved, 2 documentation-only
-   PR #32 merged — issue closed
-   **Follow-ups intentionally left open:** `MAX_TEST_URLS` staying at 30 until more site pages are finalised; a couple of low-severity setup items parked as known-acceptable; cross-browser/cross-spec correlation deliberately deprioritised as out of scope

---

**LS-2922** — PageSpeed: Fix Mobile Performance on Homepage `[In Progress]`

-   Sub-issue of LS-2803, scoped to the homepage only (mobile Performance score 75, others strong)
-   **Root cause investigation done against actual theme code, not just the PageSpeed report:** ~20 structural CSS bundles loading unconditionally sitewide, no compressed production CSS build, all 17 `fontFace` entries missing `font-display`, no resource hints for the LCP path
-   **Adversarial safety check before implementing** — caught that gating CSS bundles by template alone would have broken several bundles genuinely shared across multiple pages (e.g. `work-archive-sections`'s icon-well classes also used on 3 homepage sections); caught that the proposed header-search animation fix would have broken layout alignment and dropped it from scope
-   **Approved scope:** gate CSS bundles by verified real usage rather than assumed template ownership, add `font-display: swap` everywhere, add a compressed production CSS build; JS minification and the header animation explicitly descoped
-   **Implementation:** added `condition` callbacks to 19 of 20 bundles in `inc/animations.php`, each verified against real pattern usage; added `font-display: swap` to all 17 fontFace entries; added a `build:css:prod` compressed build script and ran it across all 22 bundles
-   **Self-review caught 2 real bugs before shipping:** `is_page_template()` checks were including a `.html` extension WordPress never actually stores, which would have silently broken all Blog archive styling; pattern-usage detection was checking for expanded CSS classes that don't exist when a pattern is inserted normally via the block inserter (only a slug reference is stored) — fixed both, re-verified live
-   **User-reported bug fixed:** Featured Work cards broken on homepage — same class of gating mistake missed on a sibling bundle, condition corrected and swept for any other instances
-   **User-reported bug fixed (unrelated):** Featured Work card grid invisible in light mode — traced to a shared colour token also driving glass-card/button sheen elsewhere; fixed by pointing the grid line at a different, already-adaptive token instead of touching the shared one, avoiding a regression on the glass effects
-   Covers render-blocking requests, unused CSS, CSS minification, and font-display from the original findings; legacy JS and the one non-composited animation candidate explicitly descoped; forced reflow/long-task profiling and LCP preload hint flagged as follow-up, not yet done
-   **PR #33 opened; review (Copilot + self) surfaced a deeper root cause — all 8 comments validated as genuine bugs:**
    -   Every gated pattern is individually insertable via the block inserter, so an editor can place any of them somewhere the template-based conditions never anticipated — confirmed this was already live-breaking something: the mobile menu's 2 CTA buttons were unstyled on every page except homepage/Work archive/404, since template-part content never appears in a page's `post_content`
    -   Fixed with a `render_block`-based safety net alongside the existing head-time conditions — detects a bundle wherever it actually renders (post content, pattern reference, template part, synced pattern) and prints anything missed via a `wp_footer` fallback, with WordPress's own dedup preventing any bundle being printed twice
    -   `card-shells`, `cta-buttons`, and `faq` now rely entirely on this safety net; `button-secondary` keeps its fast-path conditions and drops its unreliable fallback
    -   Also fixed `package.json`'s `build:css` to produce the compressed output that actually ships, instead of expanded — removing the risk of someone reverting all 22 CSS files by running the "default" build command
    -   Verified by directly reproducing the previously-broken mobile-menu scenario and confirming the fix catches it; re-ran the full page-type matrix (Homepage, Work archive, Blog archive, Search, 404, plain page) with identical correct results
    -   Design decision confirmed with Brandon beforehand — chose the footer-fallback approach over a full page-buffering rewrite, accepting a narrow-scope FOUC risk on off-template insertions rather than a much larger architectural change
-   All changes implemented and verified on branch, pushed but not yet committed — working tree left for review

---

**Claude Code — Post-Implementation Report Template**

-   Built a global `/report` slash command (`~/.claude/commands/report.md`) so Claude Code produces consistent, evidence-backed reports after implementations/fixes — one file per block, mandatory reasoning + evidence per change, required verification step, follow-ups only when genuinely unresolved
-   Deployed globally rather than per-project so it's available everywhere without reinstalling; command file itself excludes usage guidance meant only for the user, not for Claude
-   Confirmed slash commands are Claude Code-only and don't carry over to claude.ai chat — noted a claude.ai Project with the template in custom instructions as the equivalent option there if needed
-   `/report` confirmed live and working

---

## Time Logs

-   3.40 hrs - Completed LS-2810 and started working on LS-2922 for the PageSpeed fixes and improvements.
-   1.23 hrs - Opened the PR and reviewed with Copilot and Linear agents, then applied some fixes and now currently testing those fixes before committing.

---

## Notes

-
