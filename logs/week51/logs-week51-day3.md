# Week 51, Day 3 Log 2026-09-02

## Today's Progress

### What have you accomplished today?

---

**LS-2277** — Build Work Single Template (Simplified, Matching Live) `[Backlog]`

-   **Copilot review replied to on GitHub itself** — individually responded to all 3 inline comments on PR #35 with the fix applied to each, plus a general PR comment covering the featured-image bug and border-colour regression found and fixed separately
-   **Confirmed safe after PR #36 and #37 merged to `develop`:**
    -   #36 (single-page Playwright test support) and #37 (header-to-content gap + brand contrast fixes) both confirmed zero overlap with this branch via diff comparison and an actual `git merge-tree` three-way merge simulation
    -   One real gap found — `patterns/template-work-single.php` (new in this branch) was missing the same `margin-top:0` fix #37 applied everywhere else, since this file didn't exist when #37 was written; fixed and pushed
-   **Standing Playwright suite run against the real Drive Botswana page** using the new `SINGLE_PAGE_URL` support — confirmed the guard works exactly as designed, zero BugHerd tasks created
-   First full run surfaced Firefox/WebKit weren't installed locally — installed, Chromium-only re-run in progress
-   Confirmed from the Chromium run that a pre-existing, unrelated colour-contrast issue exists on the 404 page's "Back to homepage" button — out of scope for this ticket, not something #37 touched
-   **Still pending:** the Chromium-only run's actual pass/fail result on the Drive Botswana page, block bindings audit, dark/light colour-switcher verification

---

**Single-Page Playwright Testing — Built and Merged (PR #36)**

-   **Problem:** needed to run the standing Playwright suite against one specific page — including local WP installs — without flooding BugHerd with tasks for local/dark-mode/stale content irrelevant to the real dev/staging board
-   **`tests/fixtures/site.ts`** — added `SINGLE_PAGE_URL` env var support; when set, the `siteUrls` fixture short-circuits the full sitemap crawl and returns just that one URL; added same-origin validation against `BASE_URL` so a typo'd or wrong-site URL throws a clear error instead of silently misbehaving
-   **`tests/reporters/bugherd-reporter.ts`** — added a structural guard in `onTestEnd()` so a failure is never added to the collected list when `SINGLE_PAGE_URL` is set, making it physically impossible for a single-page run to create a BugHerd task, rather than relying on a flag that has to be remembered
-   **Design decision:** suppressed all BugHerd creation for single-page runs entirely rather than just skipping the link-checking spec, since local runs (different content, different default mode) should never generate tasks meant for the real site — confirmed local WP defaults to dark mode unlike staging's light default, which reinforced this decision
-   **Verified with a worst-case test** — ran a live single-page run without `--reporter=list` and confirmed the BugHerd board task count was unchanged before and after (31 → 31)
-   Copilot flagged a gap in off-origin URL handling before merge — fixed as part of the same-origin check above
-   PR #36 merged — full multi-page runs still create BugHerd tasks as normal, any single-page run never does; this is what enabled safely investigating the contrast and header-gap bugs directly against local afterward without polluting the board

---

**LS-2932** — Build Single Blog Template `[In Review]`

-   **Research & planning:** compared the prototype design against LIVE's real blog post content to confirm the rebuild will still correctly hold existing LIVE post data — treated as critical before any build work started; copied the prototype into Figma using the html-to-design plugin
-   **Context gathering:** re-confirmed AGENTS.md's theme-first/core-blocks-first/token/a11y/security rules before building; pulled all 4 Figma frames via Dev Mode MCP and cross-checked against two real live blog posts
-   Flagged and agreed with Brandon that Figma's "Content" frame (sticky ToC, custom blockquote/callout) doesn't match real post content — dropped in favour of styling `post-content` only, no forced structure
-   Used the in-progress Work Single template (LS-2277) as a structural reference for the hero
-   **Built:**
    -   `patterns/hero/blog-single-hero.php` — new hero with breadcrumb, dot-icon category eyebrow, title/excerpt, bordered meta strip (author/date/read-time/tags), full-wide featured image capped to `21/9`
    -   `inc/blog-single-related-query.php` — render-time filter scoping "Related Reading" to the post's own category, returning zero results (not unfiltered posts) when the post has no category
    -   `patterns/template-single.php` rewired — hero → post content (800px) → share row → wide Related Reading grid (reused `blog-post-card`) → wide `blog-writing-cta` (reused instead of building an unwired newsletter form)
    -   `templates/single.html` — removed the duplicate shared breadcrumbs part reference since the hero now renders its own
    -   Added a "Core WordPress blocks first" rule to `AGENTS.md` per request, plus a `CHANGELOG.md` entry
-   **Iteration based on visual review:** fixed duplicate breadcrumbs, a badge that had inherited card-chip border styling from a reused class name, unconstrained featured image height, and incorrect width constraints
-   **Real bug found and fixed:** a `constrained`-layout parent silently re-narrows any unmarked child back to 800px — `align:wide` needs setting on each direct child, not just the wrapping group; affected Related Reading
-   **Testing:** ran the standing Playwright suite via `SINGLE_PAGE_URL` against a live local post — accessibility, heading hierarchy, image alt text, and responsive overflow all pass; remaining failures traced to pre-existing site-wide gaps unrelated to this template, not LS-2932 regressions
-   All lint/escape/security/schema checks clean on every touched file
-   **PR #38 opened; review fixes applied:** breadcrumb links inheriting the wrong accent colour, hero missing a tags display entirely, Related Reading falling back to unfiltered posts on category-less posts — all fixed
-   **Open/still to do:** design QA against Figma on staging, SEO metadata verification, manual responsive check, and 3 unrelated site-wide issues flagged for their own follow-up tickets rather than fixed here

---

**LS-2936** — Clean Up Placeholder and Broken Links `[In Review]`

-   **25 placeholder `href="#"` links fixed** across `patterns/footer.php` (Services, Solutions, Systems, Company, Studio, legal-bar links), `patterns/header.php` ("Start a project →" CTA), and `patterns/sections/work-related-routes.php` (6 card links) — all pointed to their real live destinations
-   **`/contact-us/` 404 root-caused** — confirmed not a theme issue, no such link exists in theme source; traced via DB query to hardcoded links in the content of 2 blog posts; both updated on dev to point to `/contact/`, verified via a follow-up query confirming zero remaining references
-   PR #39 opened (bundled with LS-2938 since both were small, template-level fixes) — Playwright standing suite re-run planned to confirm

---

**LS-2938** — Fix Heading Hierarchy (h1 → h3 Skip) `[In Review]`

-   **Root cause found:** not the top-level template shell, but reusable patterns whose lead heading is hard-coded at `level: 3`, designed to sit under an existing h2 — but used standalone in several places, producing a direct h1→h3 jump
-   **Fixed:** CTA consultation inline/strip pattern headings promoted from h3 to h2 for standalone use; Thank You Consultation page's "While you wait" intro converted from a plain paragraph to a proper h2 to bridge the gap to its h3 cards
-   **Deliberately left as h3:** the 3 grid-card patterns already correctly nested under an existing h2 elsewhere — changing them would have been wrong
-   Bundled into PR #39 alongside LS-2936 — Playwright standing suite re-run planned to confirm all 14 flagged pages pass

---

**Linear — Kanban Board Cleanup**

-   Started sorting and tidying the personal Kanban board for easier day-to-day work tracking
-   Not fully complete — remaining tidy-up planned for this evening

---

## Time Logs

-   1.0 hrs - Completing final changes required to the Blog and Work archive templates, and got those PR's ready to merge, after being reviewed by Zared, I merged them
-   1.20 hrs - Made sure there were no merge conflicts on this single-work branch, after merging the others and then began using the Single page playwright test for the Single-Work template, but had some issues I had to resolve first and then re-ran the test.
-   1.0 hrs - Cleaning up Linear workspace a bit, closing off old issues not related anymore, cleaning up the Kanban board so I can work with it on a daily basis correctly.
-   2.0 hrs - Working on Blog-single. Firstly I could not find the design on the prototype, then AI found it for me. I had to then compare it against the LIVE site current blog-single to ensure the content will still work on the new designed page. Then I setup a planned approach for the Blog-single template build.
-   2.20 hrs - Completed the Blog-single template build as well as playwright testing, created PR and reviewed with AI and applied all recommended fixes after validating them.
-   1.0 hrs - Working on the Bugherds created by the Playwright tests. 

---

## Notes

-
