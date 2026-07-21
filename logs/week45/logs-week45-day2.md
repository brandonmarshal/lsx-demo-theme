# Week 45, Day 2 Log 2026-07-21

## Today's Progress

### What have you accomplished today?

---

**Meetings & Planning**

-   Catchup with Zared and Ash to discuss the LightSpeed website and update the approach plan
-   Reviewed everything discussed, researched `ls-plugin` to check current taxonomy slugs, and created new issues based on the revised plan
-   Follow-up meeting with Ash to review all new issues — Ash approved or adjusted several tasks to lock in a final approved task set

---

**LS-1507** — Project-Type-Conditional Form Logic — Free Consultation + Website Brief `[Done]`

-   **Phase B complete** — Free Consultation "Website Type" field renamed to Project Type; choices replaced with the 6 current taxonomy terms; no "Other" option (multi-select covers unsure visitors); email confirmation double-entry removed to reduce friction
-   **Phase C complete** — Website Brief "Website Type" renamed to Project Type with all 6 terms + "Other"/"Please specify"; 4 new Tour Operator-specific questions added, conditionally gated on Project Type; questions grounded in the actual LSX Tour Operator plugin's data model
-   Existing conditional logic confirmed intact and unaffected; both forms done — issue closed

---

**LS-1608** — Dev Site: open_basedir Warning from object-cache.php `[Done]`

-   Flagged to Chris — warning traced to a LiteSpeed Cache drop-in file being blocked by server-level `open_basedir` config
-   Chris fixed and verified — added missing Redis paths to `open_basedir`, reloaded PHP-FPM pool; confirmed no more warnings and Redis caching working correctly
-   Identified as a fleet-wide gap affecting potentially ~213 sites from the same rollout — flagged to Chris for a proactive sweep
-   Confirmed fixed; issue closed

---

**LS-1609** — Align Portfolio Taxonomy Slugs with Live `[In Review]`

-   Decision agreed with boss: CPT stays as-is; `project_type` and `service` taxonomy slugs renamed; Industry and Software merged into one new combined taxonomy (`industry-and-software`)
-   Full migration task list scoped: slug renames, new taxonomy creation, term migration, post re-tagging
-   Flagged as a blocker for LS-1616 (Portfolio archive template rework)

---

**Issues created today (no work done yet):**
-   LS-1615 — Templates, Menus and Block Bindings Cleanup (epic)
-   LS-1616 — Rebuild Portfolio & Blog Archive Templates
-   LS-1617 — Implement Block Bindings
-   LS-1618 — Fix Mega Menus (Header/Footer)

---

**Learning — WordPress Block Bindings**

-   Learned how Block Bindings let a normal Core block (paragraph, image, button) pull its value live from a data source instead of static content — no custom React block needed for simple dynamic data
-   Covered key distinctions: synced patterns vs synced patterns with overrides vs `core/post-meta` bindings inside a Query Loop
-   Learned bindings aren't a separate saved item — they're JSON metadata attached directly to a block's markup wherever it sits
-   Covered the 4 built-in Core sources and confirmed unlimited custom sources can be registered
-   Learned the security gate on post-meta — field must have `show_in_rest => true`; underscore-prefixed keys always blocked
-   Learned custom sources aren't DB-bound — a binding source is just a PHP function that can return a DB read, API call, or pure computed value
-   Covered the PHP/JS registration split — PHP powers front-end output, JS powers editor UI/preview
-   Built 2 hands-on tutorials: a simple UI-only binding, and a complex custom source with PHP callback + JS registration for auto-calculated reading time

---

## Time Logs

-   1.0 hrs - Meeting with Zared and Ash
-   5.40 hrs - Working on the rest of the LS issues mentioned above, full work logs on the issues.
-   1.50 hrs - Learning about block bindings get grasps the concept before meeting Warwick tomorrow.

## Notes

-   Got a bit delayed on logs today, only doing my first update now, but everything is logged.
