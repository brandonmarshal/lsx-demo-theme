# Week 51, Day 2 Log 2026-09-01

## Today's Progress

### What have you accomplished today?

---

**LS-2803** — PageSpeed Test and Fix Homepage, Blog and Work Archive Pages `[In Progress]`

-   **Work archive & Blog archive investigated** — both already benefit from LS-2922's conditional CSS fix theme-wide; scored reasonably (Work 80, Blog 78) without further work
-   **Missing image dimensions — fixed:** neither archive page renders a card image, only the sitewide header logo lacked `width`/`height`; added explicit dimensions to both logo `<img>` tags after confirming the SVGs share identical intrinsic size — a sitewide fix that surfaced here since these pages have nothing else competing in the audit
-   **Other findings investigated but not fixed, each with evidence:**
    -   Forced reflow (Blog) — no confirmed theme-code cause; likely tied to WordPress core's own interactivity-router script via `enhancedPagination`, not something to fix on a guess
    -   1 long main-thread task (Work) — no cause found via code search, would need an actual DevTools trace
    -   Non-composited animations — real, but converting them carries real visual-regression risk, same category as an earlier descoped decision on LS-2922; not applied as a quick win
    -   Remaining ~17 KiB unused CSS — confirmed as the `card-shells`/`cta-buttons`/`faq` trio already deliberately left unconditional in LS-2922 to avoid a flash-of-unstyled-content risk; known, accepted trade-off
-   **PR #34 opened** (`fix/logo-image-dimensions`) — verified via `php -l`, `phpcs` (zero errors), escape/security scans, and confirmed correct rendering with no visual distortion across all 4 logo instances
-   **Real bottleneck identified for further gains: plugin-side assets, not theme code** — live network trace showed `ls-plugin` CSS files in the render-blocking list, including a confirmed 404 on `style-linkable-blocks.css`; "Legacy JavaScript" flag traced to third-party GSAP CDN, outside theme scope
-   Theme-side work for these two pages done and in PR #34; plugin-side asset audit identified as separate follow-up work, not yet started

---

**LS-2277** — Build Work Single Template (Simplified, Matching Live) `[Backlog]`

-   Re-scoped with Zared to match current LIVE Work Single design rather than the more ambitious version originally planned
-   Built on local `ls-theme-testing` env, branch `feature/ls-2277-work-single-rebuild`
-   **Built so far:**
    -   `templates/single-project.html` — new dedicated template for the `project` CPT, previously falling back to the generic blog `single.html`
    -   `patterns/template-work-single.php` — hero + `wp:post-content`, post body renders exactly as authored
    -   `patterns/hero/work-single-hero.php` — new hero with breadcrumb, "Case Study" eyebrow, title/excerpt, 2 CTA buttons, a 3-column meta row sourced from existing taxonomies (deliberately not inventing new fields so existing LIVE posts don't ship with blank data), and a bordered featured image panel
    -   `inc/work-single-hero.php` — `render_block` filter resolving the "View site" button's real URL at render time, since a pattern file's PHP runs once at registration with no post context
    -   Verified on frontend at desktop/tablet/mobile — matches the Figma hero direction while the rest matches LIVE
-   **Site Editor crash resolved:** root cause was an invalid `"layout":{"type":"flow"}` value on a `core/group` block — not a real Gutenberg layout type, causing a `.getAlignments()` crash; frontend was unaffected since block themes silently ignore unrecognised layout types there, but the pattern was unusable in the Site Editor until fixed
-   **Other fixes found while narrowing down the crash:**
    -   Meta row/CTA column reverted from an untested fixed-pixel + flex-wrap combination back to the standard percentage-width columns shape already proven throughout the theme
    -   "View site" button was wired to the wrong post meta key (sourced from a different environment) — corrected via WP-CLI to the site's actual key
-   **Design refinements to the hero:**
    -   Refined metadata row spacing, added vertical column dividers, fixed the divider rendering as a full black box on all 4 sides (WordPress core's border-colour behaviour) by zeroing the other 3 sides
    -   Fixed the "View site" button's hover animation overlapping its own text — icon-well transparency and custom padding were both breaking the built-in slide animation's math, reverted to theme defaults
    -   Fixed case-study body content capped at 800px instead of 1370px — `wp:post-content` itself needed `align:"wide"`, not just its children
-   **Drive Botswana's post content fixed via WP-CLI** (data, not theme code) — standardised inconsistent column widths, replaced invalid spacing tokens carried over from a different theme, fixed a `blockGap:"0"` override silently zeroing all child margins, and converted plain-paragraph mini-heading labels using non-existent style classes into real `core/heading` blocks
-   **PR #35 opened** against `develop`, ready for review
-   **Copilot review — 4 findings, all validated and fixed:**
    -   `render_block` filter was removing the "View site" button entirely with no post context (Site Editor canvas) — now returns original content, matching the theme's other filters
    -   Fragile `str_replace()` href swap replaced with `WP_HTML_Tag_Processor`
    -   New SCSS file was missing from `watch:css`
    -   Separately found: featured-image panel rendered an empty bordered box for posts with no image — styling moved from the wrapping group onto `wp:post-featured-image` directly, catching and fixing a follow-on border-colour regression along the way
-   All fixes verified via computed styles/live rendering, replies posted individually on each Copilot comment
-   **Remaining:** block bindings audit across the new patterns, dark/light colour-switcher verification (still blocked on a working toggle in this local env)

---

**Meeting — Team: LightSpeed Flow App (15:00–15:30)**

-   Team shared real usage experience and bugs encountered with the new LightSpeed Flow app
-   Discussed and resolved confusion points on how to use the app
-   Agreed to switch email configuration from personal emails to work email addresses

---

**BugHerd MCP Debrief — Artifact for Richard (Head of Product)**

-   Richard requested a 30-minute call to review BugHerd MCP usage — what's working, what to fix/build next
-   Built a standalone HTML artifact summarising real experience from the LS-2810 implementation, with every point tied to something actually hit while building the Playwright → BugHerd pipeline
-   **Content structured across 6 sections:** current usage, the two AI integration paths (unattended reporter vs interactive MCP, deletion kept human-only), 4 prioritised improvement asks, positive signals, 3 standalone questions for Richard, and a 60-second fallback version
-   **Design pass:** initial utilitarian treatment rebranded to LightSpeed's actual `theme.json`/`styles/dark.json` tokens; dark mode intentionally uses `brand-400` instead of the literal neon `cta-500` token for a more professional read; advised light mode as the boardroom-appropriate default
-   **Content revision pass for external sharing:** reframed the intro to address Richard directly rather than reading as internal notes; dropped a rate-limits ask likely already on BugHerd's roadmap, bringing it to 4 total asks; replaced restated questions with 3 genuinely standalone ones
-   Delivered both as a live shareable artifact link for the call and as a downloadable standalone HTML file for offline use

---

## Time Logs

-   2.40 hrs - Finalised the planning for the meeting with Richard, regarding the Bugherd MCP. (He postponed). I then proceeded with the Work and Blog PageSpeed testing/fixing. PR has been merged.
-   2.0 hrs - Working on LS-2277 building the single-work page.
-   3.50 hrs - Completing LS-2277 single-work page. 

---

## Notes

-
