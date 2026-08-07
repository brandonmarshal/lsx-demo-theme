# Weekly Plan: Week 48 (Tue–Fri, Aug 11–14)

**Note:** Monday Aug 10 is a public holiday.

## Goal

Finish LS-2337's remaining phases (1, 3, 4), validate the cleanup with a fresh extraction test, re-test existing menus/pages for regressions, then return to LS-2277 (Work Single template) — paused since the audit surfaced the JSON-first drift.

---

## Priority 1 — LS-2339, Phase 1 (in progress, finish first)

-   Self-review the committed/pushed work
-   Open PR
-   AI review (CodeRabbit/Copilot), address findings
-   Zared review
-   Merge to develop

## Priority 2 — LS-2340, Phase 3 (animations.css cleanup)

-   Same PR flow: build → self-review → PR → AI review → Zared review → merge

## Priority 3 — LS-2341, Phase 4 (is-style layer rationalisation)

-   Same PR flow: build → self-review → PR → AI review → Zared review → merge

## Priority 4 — Post-cleanup Validation

-   Create a fresh test branch
-   Run the extraction agent again to confirm the fully cleaned-up repo produces compliant output end-to-end
-   Re-test existing menus and pages built earlier (LS-2243 nav/menu work, LS-1616 Work/Blog archives) to confirm no regressions from the Phase 1/3/4 changes

## Priority 5 — LS-2277, Work Single Template

-   Resume once validation is clean — paused since the audit surfaced JSON-first drift
-   Re-plan/simplify design to match live (already scoped)
-   Build section patterns, block bindings wherever possible
-   Test mobile/tablet, colour switcher

---

## Week Roll-up Checklist

-   [ ] LS-2339 merged
-   [ ] LS-2340 merged
-   [ ] LS-2341 merged
-   [ ] Fresh extraction test confirms clean repo output
-   [ ] Menus/pages re-tested, no regressions
-   [ ] LS-2277 resumed

## Ad-hoc / On-Demand

-   Set aside capacity for incoming requests, hotfixes, and unexpected team alignments.
