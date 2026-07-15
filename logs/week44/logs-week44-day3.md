# Week 44, Day 3 Log 2026-07-15

## Today's Progress

### What have you accomplished today?

---

**Meetings**

-   **Zared Rogers — WordPress Theme Architecture & MVP Strategy**
    -   Reviewed breadcrumbs implementation — confirmed mistake in building a custom block; new plan is to remove it and use `yoast-seo/breadcrumbs` directly in theme templates; Yoast SEO now a formal theme dependency
    -   LS-1226 (slug deduplication) reviewed — Zared determined the 58 duplicates reported by the AI were orphaned DB/retired theme data, not active repo duplicates; zero real duplicates in the current repo; task to be repurposed to focus on building missing templates instead
    -   Agreed on strict MVP Phase 1 order of operations: Parts → Templates → Pages
    -   Template vs pattern strategy confirmed — patterns created first, then injected into templates
    -   Styling philosophy confirmed — keep as much as possible in `theme.json`; CSS reserved for animations, WooCommerce overrides, and elements JSON can't handle; lazy-loaded per page
    -   Zared recommended moving from Claude Desktop to VS Code integration for better repo context
    -   OpenSpec on Linear discussed for providing structured context to AI agents
    -   Visual priority for this week: Header, Footer, and core templates finalised to start building actual pages on dev
    -   `KWV` theme confirmed as primary reference for naming conventions and pattern architecture

-   **Gemini Enterprise Webinar (1hr)**
    -   Overview of Gemini Enterprise features, demonstrations, connector setup, migration processes, security and restrictions, and NotebookLM Enterprise

---

**Linear Agent — Custom Instructions Update**

-   Updated personal Linear agent custom instructions to align with the team's standards and preferences
-   Ensures the Linear agent works consistently with how the rest of the team operates

---

**LS-1228** — Build breadcrumb dynamic block `[In Progress]`

-   Reviewed the issue following the Zared meeting; started correcting implementation
-   **Part 2 (`ls-theme`) — Yoast re-approach in progress:**
    -   Swapped `patterns/breadcrumbs.php` to reference `yoast-seo/breadcrumbs` instead of the custom block; same wrapper/padding kept
    -   `style.css` `Requires Plugins` updated from `ls-plugin` to `wordpress-seo`
    -   `CHANGELOG.md` reworded to reflect Yoast block adoption
    -   `page.html`, `single.html`, `archive.html` confirmed — no changes needed, already wired to the generic `breadcrumbs` template-part slug
    -   Yoast settings configured on local test site — breadcrumbs for Posts set to Categories; Portfolios left at None intentionally; breadcrumbs enabled
    -   Ran `wp yoast index --reindex` after creating nested test content and after settings change — normal one-time step on a fresh Yoast install
    -   Top-level page, nested/child page, nested category archive, and single post in nested category all render correct trail ✅
    -   Connected AI Engine WordPress MCP server so Claude Code (VS Code) can query the local site directly going forward
    -   **Still to do:** Portfolio CPT item/archive, search results, and 404 pages; final debug.log check

---

## Time Logs

-   1.06 hrs - Catchup meeting with Zared to discuss some of my LS issues.
-   1.0 hrs - Gemini Enterprise Webinar
-   2.50 hrs - Fixed my Claude setup in VS Code, setup Copilot Desktop app and looked into what it can do, and then started working on LS-1228 just before the webinar.
-   2.0 hrs - Working on LS-1228 and removing my mistakes previously made. Then I tested the Yoast breadcrumb block on my local testing site to ensure its working well. 

---

## Notes

-
