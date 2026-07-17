# Week 44 Log and Reflection

## Weekly Reflection

### What I worked on (high-signal summary)

1.  **LS-1206 Design System Audit & Planning**: Ran a 5-stage audit (dev audit → live parity check → gap mapping → phase breakdown → write-up), documented a full gap map and 4-phase Phase 1 plan, and spun off four follow-up issues (LS-1226, LS-1227, LS-1228, LS-1229).
2.  **LS-1227 & LS-1229 (ls-theme/ls-plugin housekeeping)**: Fixed the breadcrumbs filename typo and aligned template-part attributes; discovered and fixed a critical bug where `page.html`/`single.html` had no `wp:post-content` block, meaning content silently failed to render. Built `LS_Plugin_Nav_Ref_Resolver` to auto-resolve header nav refs. Both merged and closed.
3.  **LS-1228 Breadcrumbs**: Built a custom dynamic breadcrumbs block, then caught the mistake after discovering Yoast SEO ships a purpose-built `yoast-seo/breadcrumbs` block for Site Editor templates. Removed the custom block, re-implemented against Yoast, and verified across top-level page, nested page, nested category archive, and single post scenarios.
4.  **LS-1226 Phase 1 Templates**: Rescoped from a dead-end DB-dedupe task (58 "duplicates" turned out to be orphaned retired-theme data) into building/reworking 7 core templates (`front-page`, `index`, `page`, `single`, `archive`, `page-no-title`, `search`) plus Portfolio taxonomies, establishing a 3-tier naming convention, and fixing two site-wide bugs (`footer.php` invalid nested markup; missing `contentSize`/`wideSize` in `theme.json`). PR merged, issue closed.
5.  **Content & form work**: Closed out LS-1223 (blog category consolidation, 11 → 9), LS-1220 (Portfolio taxonomy terms + full dev retagging), and LS-1214 (Website Briefing Form conditional logic overhaul).

### What went well?

-   **Fast course-correction on breadcrumbs**: Caught the custom-block mistake before any PR was opened, so the Yoast swap in LS-1228 cost a day of rework rather than a wasted review cycle.
-   **Turned a dead task into real output**: LS-1226's original DB-dedupe scope was invalidated by Zared's review, but the rescope into Phase 1 template builds became the week's biggest deliverable.
-   **Caught two site-wide bugs during normal verification**: the missing `wp:post-content` block (LS-1227) and the missing `theme.json` content widths (LS-1226) were both breaking rendering/layout across every template — neither would have surfaced without deliberate re-testing after each change.
-   **High close rate**: five issues closed as Done this week (LS-1227, LS-1229, LS-1223, LS-1220, LS-1214) plus LS-1226 fully delivered under its new scope.

### What I learned

-   Check for a purpose-built block before building a custom one — Yoast SEO already ships a first-party breadcrumbs block designed specifically for Site Editor templates, schema markup included.
-   Patterns are static-compiled in WordPress, so PHP that depends on the current post context (e.g. a "related case studies" section) can't work inside a pattern — that requires a custom dynamic block, which is why Single Project/Case Study was dropped from LS-1226's scope.
-   MVP build order should be strict: Parts → Templates → Pages, with patterns created first and then injected into templates.
-   Keep as much styling as possible in `theme.json`; reserve CSS for animations, WooCommerce overrides, and anything JSON genuinely can't express.

### Challenges encountered

-   Spent real effort on a custom `ls-plugin/breadcrumbs` block before discovering Yoast's native equivalent — the detour happened after hitting a real Yoast template-tag bug rather than checking for a purpose-built block first.
-   LS-1226 required a full rescope mid-week after Zared determined the DB "duplicates" were inert rows from a retired theme, not real duplication.
-   Hit a genuine technical wall on the Case Study "related" pattern (static pattern compilation can't reference the current post) and had to drop the scope cleanly rather than force a workaround.
-   Dev DB has 58 pages assigned to a `no-title` slug from a retired theme that doesn't match the new `page-no-title` template name — flagged as a separate migration issue rather than solved inline.

### Key outcomes / achievements

-   Closed **LS-1227**, **LS-1229**, **LS-1223**, **LS-1220**, and **LS-1214** as Done.
-   Delivered **LS-1226** under its rescoped Phase 1 brief: 7 templates built/reworked, Portfolio taxonomies wired, naming convention established, and two site-wide rendering/layout bugs fixed.
-   Corrected **LS-1228** to use Yoast SEO's native breadcrumbs block, verified across all key page-type scenarios.
-   Connected the AI Engine WordPress MCP server so Claude Code (VS Code) can query the local site directly, and moved Linear agent instructions/skills documentation in line with team standards.
