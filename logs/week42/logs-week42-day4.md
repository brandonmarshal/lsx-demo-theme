# Week 42, Day 4 Log 2026-07-02

## Today's Progress

### What have you accomplished today?

---

**uSpec — Further Review**

-   Went back through uSpec from scratch to build a clearer understanding of how it works and where it fits in the workflow

---

**Linear Workflow — Source of Truth Document**

-   Scanned through Linear issues since first use to review how issues are created, tracked, and managed
-   Produced a personal workflow source of truth document and used it to prepare notes for the upcoming Linear workflows meeting

---

**Meetings**

-   **Ash Shaw** — Established phased development strategy and finalised initial scope for the website rebuild
    -   MVP limited to replicating current site structure with new theme — top-level pages only; subpages, Solutions, and Mailchimp deferred
    -   WCAG 2.2 A compliance required; dark and light mode confirmed
    -   Starter and synced patterns defined and scoped
    -   Action items captured across MVP documentation, site mapping, Gravity Forms, About page, design plan, and component definitions

-   **Team Meeting — Warwick** — Advanced WordPress debugging session
    -   Warwick walked through advanced debugging steps for WordPress development
    -   Demonstrated Dev Tools features useful for diagnosing issues during builds

---

**LS-1203 + Sub-issues — Website Rebuild Phase 1 Planning `[Backlog]`**

-   Searched Shared Drive and read 6 relevant planning documents before drafting anything
-   Consolidated 14 meeting action items into 1 parent epic + 4 sub-issues in Linear — all assigned, labelled, and prioritised High
-   **LS-1203** — Parent epic created; links all sub-issues and related Shared Drive documents
-   **LS-1204** — MVP Definition & Content Scope — Phase 1 scope, must-ship vs deferred tables, MVP Launch Gate, and open 8-categories decision documented; PRD "Project Plan Phases" tab confirmed as authoritative source and used to rewrite the issue body mid-session
-   **LS-1205** — Site Structure & Taxonomy Audit — connected dev and live MCP connectors (read-only); ran full audit of both sites and compared directly:
    -   Posts (151), portfolio items (19), and blog categories (11) all match between live and dev
    -   `project-type` portfolio taxonomy confirmed missing on dev (5 terms, 19 items affected) — logged as a launch blocker
    -   3 new findings added via comment: potential broken homepage CTA (Popup Maker plugin inactive), stale WooCommerce nav items, and canonical duplicate pages requiring a decision before page list can be finalised
-   **LS-1206** — Design System, Templates & Patterns Plan — scoped and created; no implementation work yet
-   **LS-1207** — Content & Functional Build Prep — Gravity Forms deep dive completed via MCP read-only DB query:
    -   Real entry counts pulled for all forms — Free Consultation (6,359) confirmed as primary lead form over Request a Quote Form (2 entries)
    -   Discovered 3 near-duplicate "briefing" landing pages each embedding a different form with very different performance
    -   Request a Quote Form found to have no notifications or confirmation configured — submissions may not be routing anywhere
    -   Recommended retiring Request a Quote Form and redirecting `/briefing/request-a-quote/` — not yet actioned
    -   About Page Content Collection forms confirmed built but 0 entries — intended use to be confirmed before About page work begins
    -   2 optional Free Consultation enrichment fields proposed — pending approval from Brandon's boss before any changes made
    -   All findings logged as 3 separate discovery comments per the issue body/comment convention


---

## Time Logs

-   1.40 hrs - Meeting with Ash
-   2.20 hrs - Reading through uSpec docs again and reviewing my linear workflows into a doc.
-   3.45 hrs - Meeting with Warwick and team, and then continue working on my tasks from the meeting with Ash. Doing PRD research for the LS Dev site.

---

## Notes

-
