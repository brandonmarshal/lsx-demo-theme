# Weekly Plan: Week 47

**Week of August 3–7, 2026**

## Goal

Next 2-3 days: close out the header/nav/menu audit from the Zared sync, finalize Work Archive, and rebuild Work Single's Hero (keeping the content block structure intact). Remainder of week: carry on with Blog Archive fixes/template and Blog Single, plus Week 46 carry-overs.

---

## Priority 1 — Header, Nav & Menu Audit (from Zared sync, next 2-3 days)

**Logo Fix**
- Change header logo from hard-coded image to a proper "side logo" so it persists through header resets

**Menu Audit**
- Use Site Editor > Navigation to delete all unused/broken draft menus
- Rename the active primary menu to "Main Navigation"

**Header Cleanup**
- Fix/adjust "Start Project" button if too prominent/intrusive
- Block recovery pass — scan patterns/templates for recurring paragraph block errors

**Mega Menu & Layout**
- Refine mega menu spacing, implement 2x2 column layout for Discover/Create/Build/Launch
- Apply nested column technique to Work Engagement sections (4 col desktop → 2 col tablet → 1 col mobile)
- Standardize block spacing (Small/Tiny) across all rows/stacks
- Use DB-first workflow: adjust in editor first, then copy final code into theme files

**PR**
- Combine header cleanup + nav audit + logo fix into a single PR

## Priority 2 — Work Archive + Work Single

**Work Archive**
- Finalize template, ensure all blocks recovered, merge into theme

**Work Single**
- Revisit Hero design first (per meeting decision) — modernize with new styles, gradients, custom taxonomies
- Keep existing content block structure as-is for V1 (avoids manual rebuild of all existing projects)
- Build in Claude Design → Figma with variables → WordPress
- Block bindings required (confirmed in planning brief)
- Target: ready for review by Tuesday or Wednesday

## Priority 3 — Close Out Week 46 Carry-overs

**UI Fixes Branch**
- PR → Zared review → merge → dev verification

**Blog Archive Fixes — LS-1616**
- Engagement section alignment
- Eyebrow badge fix (duplicated "Project Categories" label)
- Hero + CTA dark treatment
- Two design-decision items (category label tint, CTA button-vs-link styling)

## Priority 4 — Remaining Builds

**Blog Archive Template — LS-1616**
- Still doesn't exist — build after fixes are done

**Blog Single Page**
- Build after Blog Archive template is complete

## Priority 5 — Carry Over If Time Allows

- **LS-1605** — Contact + Legal pages (content ready, just needs wiring)
- **LS-1617** — Block Bindings checklist cleanup
- **Colour switcher investigation** in `ls-plugin` (no issue yet)

---

## Week Roll-up Checklist

- [ ] Logo fixed (side logo, persists through resets)
- [ ] Menu audit complete, primary menu renamed to "Main Navigation"
- [ ] Header/nav/menu PR merged
- [ ] Work Archive finalized and merged
- [ ] Work Single Hero rebuilt, content block kept, block bindings wired
- [ ] UI Fixes branch merged and verified on dev
- [ ] Blog Archive bugs fixed (all 4 items)
- [ ] Blog Archive template built
- [ ] Blog Single page built
- [ ] LS-1605 wired (if time allows)
- [ ] LS-1617 checklist closed off (if time allows)
- [ ] Colour switcher root-caused (if time allows)

## Ad-hoc / On-Demand

- Set aside capacity for incoming requests, hotfixes, and unexpected team alignments.
