# Weekly Plan: Templates, Menus & Block Bindings Cleanup

**Week of July 27–31, 2026**
**Source:** [LS-1615](https://linear.app/lightspeedwp/issue/LS-1615) (Epic: Templates, Menus & Block Bindings Cleanup)

## Goal

Close out the LS-1615 epic entirely this week. Two of its four sub-issues are already Done (LS-1609 taxonomy alignment, LS-1618 mega menu/header/footer rebuild), so this week is about finishing the last piece — LS-1616/1617 combined — and then handling the real-world content gap that finishing the menus/footer has exposed: none of those links have pages to land on yet in dev.

---

## In Progress — Finish First

**[LS-1616](https://linear.app/lightspeedwp/issue/LS-1616) — Rebuild Portfolio + Blog archive templates**
Being tackled together with LS-1617, since block bindings naturally come up while rebuilding these templates. Scope:

-   Rename `template-taxonomy.php` → `template-portfolio.php` and rework it to match the real live portfolio card layout (currently a basic placeholder loop, not the actual design)
-   Build a brand-new Blog template from scratch (doesn't exist in `ls-theme` yet), matching the current live Blog page structure
-   Important: queries for both templates must be built against LS-1609's **final, actual** taxonomy structure — CPT is `project` (not `ls_plugin_portfolio` as originally planned), taxonomies are `project-type`, `project-tag`, and the merged `project-group` (not the `industry-and-software` name discussed earlier — the final approach diverged from that conversation, so double check field references match what actually shipped in PR #18)
-   Verify no existing template/part slug breaks as a result of the rename
-   Design QA against live/Figma

**[LS-1617](https://linear.app/lightspeedwp/issue/LS-1617) — Implement Block Bindings**

-   Audit the new Portfolio/Blog templates (and any other existing patterns) for legacy/hardcoded elements that should use block bindings instead
-   Identify custom fields needed to support bound values
-   Implement block bindings across identified patterns
-   QA that rendered output matches expected values against real content — not just placeholder text

---

## Priority 1 — Real Content Gap, No Issue Yet

Now that LS-1618 rebuilt the mega menus, header, and footer against Figma, every link in those navigations needs somewhere to actually land — right now several will be pointing at pages that don't exist yet on dev.

-   **Mega menu landing pages** — go through every link in the rebuilt mega menu structure and create a matching page on dev for each one. Content can be a placeholder/empty page for now — the point is no broken links, not finished copy.
-   **Footer navigation landing pages** — same exercise for every link in the footer nav. Cross-check against LS-1224 (legal pages: Privacy Policy, T&Cs, Policies & Principles) and LS-1605 (Contact + those same legal pages) to confirm which of these already have real content ready vs. which still need a placeholder.

## Priority 2 — Bug Investigation

**Colour switcher bug in `ls-plugin`**
There's a Claude Code session from earlier this week with a handoff prompt that already has a working theory on where the problem lives — pull that up first rather than starting the investigation cold. This was flagged separately from LS-1618 (which fixed the _header_ colour switcher button specifically) — this is the underlying `ls-plugin` mechanism itself.

## Priority 3 — Quick Admin Check

-   Check for a reply from Linear Support on the email you sent them — no action needed beyond reading/responding once it's in.

---

## Week Roll-up Checklist

-   [ ] LS-1616 — Portfolio + Blog archive templates rebuilt, matching live layouts
-   [ ] LS-1617 — Block bindings implemented across Portfolio/Blog templates (and any other flagged patterns)
-   [ ] LS-1615 — epic fully closed (all 4 sub-issues Done: 1609 ✅, 1618 ✅, 1616/1617 this week)
-   [ ] Every mega menu link has a real (even if placeholder) landing page on dev
-   [ ] Every footer nav link has a real (even if placeholder) landing page on dev
-   [ ] Colour switcher bug in `ls-plugin` root-caused, fix started or shipped
-   [ ] Linear Support reply checked and actioned if needed

## Ad-hoc / On-Demand

-   Set aside dedicated capacity for incoming requests, hotfixes, and unexpected team alignments.
