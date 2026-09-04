# Week 51 Log and Reflection

## Weekly Reflection

### What I worked on (high-signal summary)

-   **Testing & automation (LS-2810, LS-2936, LS-2936):** completed Playwright-to-BugHerd failure automation with 19 real tasks, 12 noise messages correctly filtered, zero false positives; built single-page URL testing support to isolate local/single-template verification without polluting the shared BugHerd board; cleaned up 25 placeholder links and fixed heading hierarchy issues across the site
-   **Performance optimization (LS-2922, LS-2803):** improved homepage mobile performance from 75 → **89** PageSpeed score via conditional CSS loading, font-display tuning, compressed production builds, and fixed logo dimensions; investigated and documented trade-offs on archive pages (Work 80, Blog 78)
-   **Template & pattern builds (LS-2277, LS-2932, LS-2596, LS-2594):** built 4 new page templates (Work Single, Blog Single, 404, Search Results) with 10+ reusable patterns, leveraging Figma design context and real post data validation; merged all 4 associated PRs into `develop` with conflict resolution
-   **Accessibility & UX fixes (LS-2937, LS-2939):** fixed color-contrast violations (brand-500 → brand-600, 4.5:1 compliance), added descriptive alt text to 12 image-only links, identified footer overflow root causes (content + code), and traced/fixed 1 plugin-side CSS 404 (LS-2935)
-   **WordPress 7.1 research & planning (LS-3113 epic):** audited theme's 50+ SVG icons against WP 7.1 Icons API sanitizer constraints, created a 4-phase migration plan with prerequisite decisions flagged, identified that stroke-based icons (chevron, Work mega-menu) are blocked and require redesign first
-   **Team coordination:** attended GitHub control plane alignment meeting, refined branching/PR/changelog workflows, flagged duplicate tool-building effort for consolidation with team leads

---

### What went well?

-   **Rigorous root-cause analysis before implementation** — every reported issue (PageSpeed findings, BugHerd overflow tasks, accessibility violations) was traced to its actual source code or content location before touching anything; caught 2 real bugs in LS-2922 self-review before shipping, prevented silent regressions
-   **Adversarial safety checks during planning** — caught that gating CSS bundles by template alone would break shared patterns, that the header-search animation fix would break layout, and that individually-insertable patterns could be placed outside their intended templates; all confirmed and fixed ahead of merge
-   **Effective PR review & merge conflict management** — merged 4 open PRs sequentially with zero lost work by diffing all overlaps upfront, planning merge order, resolving conflicts (mostly additive `CHANGELOG.md` entries), and verifying each merge state rigorously with `git merge-tree` before pushing
-   **Real performance improvements shipped & verified** — homepage Performance score confirmed 75 → 89 via actual PageSpeed capture on dev; every improvement tied to measurable metric change (FCP 3.6s → 1.8s, LCP 4.4s → 3.2s, TBT 10ms → 0ms)
-   **Proactive plugin-side issue identification** — traced a "MIME-type mismatch" symptom back to a separate `ls-plugin` repo typo, confirmed zero overlap with theme code, filed a separate fix PR to unblock theme-side work
-   **Fidelity in design-to-code translation** — compared Figma prototypes against LIVE post content before building templates, dropped features (sticky ToC, custom callouts) that didn't match real content, reused existing card/pattern styles instead of inventing new ones, verified responsive rendering at multiple breakpoints

---

### What I learned

-   **WordPress 7.1 Icons API has hard constraints** — the sanitizer only allows `<svg>`, `<path>`, `<polygon>`; no `<circle>`, `<rect>`, `stroke` attributes, or gradients; this is a fixed core limit, not something to work around; colour inheritance requires explicit `fill="currentColor"` on every icon, not automatic
-   **Design system decision-making: when to reuse vs. build** — the 404/Search "useful destinations" sections both reused the existing Card - Category pattern + link-arrow styling; the blog hero reused Work Single hero structure; this compound savings (patterns, tokens, CSS classes) matters more than building one-off components
-   **Testing isolation prevents BugHerd board pollution** — running Playwright against a single page with `SINGLE_PAGE_URL` should be structurally guarded at the reporter level (not just a flag-check), so a forgetful re-run can't accidentally create BugHerd tasks for local/stale content
-   **Performance trade-offs are real and documented** — `font-display: swap` improves FCP/LCP at the cost of a tiny CLS shift (0 → 0.028, still "good" by Google); reverting `card-shells`/`cta-buttons`/`faq` to unconditional loading trades 10 KiB unused CSS for zero FOUC/CLS risk — both are valid, but intentional decisions, not luck
-   **Merge conflict resolution requires verification at every step** — one merge had a silent second-parent discard via `git reset --soft`, causing GitHub to keep showing "conflicting" even though local looked clean; confirming `MERGE_HEAD` state before every subsequent push caught this
-   **Heading hierarchy bugs hide in reusable patterns** — h1→h3 jumps weren't in the top-level template but in patterns with hard-coded `level:3` designed to nest under h2; once found, the fix was simple (promote to h2), but the root cause was pattern-usage-context-dependent, not template-global
-   **Spacing precision in CSS requires per-font measurement** — a font-leading mismatch between eyebrow and heading was causing uneven spacing despite identical margin values; fixed via `text-box-trim`/`text-box-edge` (CSS Logical), letting the browser resolve per-font rather than guessing pixels

---

### Challenges encountered

-   **Multi-step performance trade-offs require adversarial review** — the initial LS-2922 approach (gate bundles by template) looked good until a safety check confirmed it would silently break shared patterns in unexpected contexts; the final fix (render_block filter + wp_footer fallback) was more complex but correct
-   **Spacing measurement errors consumed debugging time** — on LS-2594's "Useful destinations" section, I mismeasured gaps against a broken viewport, insisted the numbers were right when they weren't, and shipped a hardcoded pixel hack before landing on the real `text-box-trim` fix; acknowledged as self-caused delay, not problem difficulty
-   **Plugin-side 404s aren't detected by theme-side tests** — the `style-linkable-blocks.css` 404 (actually a typo in `ls-plugin`) showed up as a network symptom in PageSpeed audits but required a separate repo audit to locate; theme-side testing can't catch plugin bugs, leading to false "unsolved" findings until cross-repo investigation happens
-   **Locally-built patterns can diverge from production** — the Drive Botswana post had invalid spacing tokens, hard-coded column widths, and non-existent CSS classes carried over from a different theme; this required WP-CLI fixes to the post content, not just the pattern code, adding a data-cleanup step that isn't always obvious
-   **Heading level compliance requires context across many files** — found 14 flagged pages with h1→h3 jumps in BugHerd, but they surfaced in 4 different patterns with independent hard-coded heading levels; fixing one pattern didn't fix all pages; required tracking which patterns are used where
-   **Stroke-based SVG icons are blocked from WordPress 7.1 Icons API migration** — the WP Icons sanitizer strips `stroke` and `circle` elements; migrating the chevron icon (32 occurrences) and Work mega-menu icons (6 unique) requires a separate design decision/redesign first, blocking 2 of the 4 planned migration phases

---

### Key outcomes / achievements

-   **Performance:** Real PageSpeed improvements shipped and verified — homepage Performance 75 → 89, FCP 3.6s → 1.8s, LCP 4.4s → 3.2s, TBT 10ms → 0ms; archive pages scored well without further work (Work 80, Blog 78)
-   **Testing automation:** LS-2810 fully closed with 19 real BugHerd tasks, 12 noise messages correctly filtered, zero false positives; LS-2936 added single-page Playwright support for isolated testing without board pollution
-   **Templates built:** 4 new page templates delivered (Work Single, Blog Single, 404, Search Results) with 10+ reusable patterns, all verified with Playwright against real content; merged all 4 PRs into `develop` with zero lost work
-   **Accessibility:** 4 BugHerd tasks under LS-2937 accounted for — 1 code fix (color-contrast, brand-600 compliance), 1 content fix (12 image alt texts), 1 resolved (cache-caught violation, no action needed), 1 closed as out-of-scope (YouTube iframe ARIA); PR #41 merged with full validation
-   **Bug fixes:** Responsive overflow (LS-2939) traced to 3 independent causes and fixed (content + footer layout + logo switcher); placeholder links (LS-2936, 25 links cleaned); heading hierarchy (LS-2938, h1→h3 jumps fixed); plugin CSS 404 identified in separate repo with fix PR #19 awaiting merge
-   **Design system:** New tokens added (effect.watermark.brand, 1000/"Display" fluid font-size); AGENTS.md updated with "Core WordPress blocks first" rule; 404 template reused existing Card - Category pattern + link-arrow styling, zero new CSS created
-   **Planning & coordination:** WordPress 7.1 SVG Icons migration audited (50+ theme icons inventoried); LS-3113 epic + 5 sub-issues created with prerequisites flagged; GitHub control plane alignment meeting attended; team communication improved to prevent duplicate tool-building effort
-   **Time on task:** 11.56 total hours across 5 days; work distributed across testing (2.4 hrs), performance (1.36 + 2.5 hrs), templates (7.7 hrs), accessibility (1 hr), research (1.3 hrs), meetings (0.4 hrs), planning/tooling (0.5 hrs)
