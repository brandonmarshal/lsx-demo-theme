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

-   Updated personal Linear agent custom instructions to align with the team's standards and preferences, ensure the Linear agent works consistently with how the rest of the team operates

---

**LS-1228** — Build breadcrumb dynamic block `[In Progress]`

-   Reviewed the issue following the Zared meeting
-   Started correcting the implementation — removing the custom `ls-plugin/breadcrumbs` block and replacing with `yoast-seo/breadcrumbs` in `patterns/breadcrumbs.php`

---

## Time Logs

-   1.06 hrs - Catchup meeting with Zared to discuss some of my LS issues.
-   1.0 hrs - Gemini Enterprise Webinar
-   2.50 hrs - Fixed my Claude setup in VS Code, setup Copilot Desktop app and looked into what it can do, and then started working on LS-1228 just before the webinar.

---

## Notes

-
