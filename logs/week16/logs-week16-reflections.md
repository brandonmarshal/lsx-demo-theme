# Week 16 Reflections

## Weekly Reflection

### Summary of the week

Week 16 was focused on feature development and polish for the custom plugin and theme patterns. Major workstreams were the gear listing (cards and sidebar filters), block and pattern development for the homepage and static pages, mobile/layout fixes, and an audit/plan for the next sprint.

### Day-by-day highlights

-   Day 1 (2025-12-15): Focused on the gear page — fixed metadata not displaying on existing posts, finished the gear sidebar and filters, updated the plugin on staging, added an extra filter block, and fixed mobile view for gear cards.
-   Day 2 (2025-12-16): Public holiday (tracked as 8.0 hrs).
-   Day 3 (2025-12-17): Created wireframes for the Area page and for About/Homepage; built the first query loop block with cards, created the Hero pattern and a connected-info block (had display issues to resolve), and continued homepage patterns.
-   Day 4 (2025-12-18): Finalised the homepage layout, completed the about page (needs more posts to look its best), and completed the contact page (two forms planned).
-   Day 5 (2025-12-19): Generated content/images for Gear, Area, and Fish posts, updated mobile navigation, adjusted header/footer colours for accessibility, fixed featured images on homepage CPT cards, aligned fish query cards on mobile, and audited the plugin vs end-of-year sprint to plan the next two weeks.

### Total time

-   Total recorded time across Day 1–5: 40.0 hrs
    -   Day 1: 8.0 hrs
    -   Day 2: 8.0 hrs
    -   Day 3: 8.0 hrs
    -   Day 4: 9.5 hrs
    -   Day 5: 6.5 hrs

### What went well

-   Substantial progress on the gear page: metadata fixes, working filters, and a responsive card layout. The sidebar filter block and extra filter improved the UX for the gear listing.
-   Strong headway on homepage and static pages: wireframes, hero pattern, connected blocks, and several patterns assembled.
-   Mobile-first fixes: multiple card and navigation fixes improved the mobile experience.
-   Good iteration flow between plugin updates and staging deployment — changes were tested on staging.
-   Proactive content and accessibility adjustments (images for hero sections, header/footer color contrast changes) to improve perceived accessibility.
-   Time was tracked consistently which helped produce a clear plan for the next sprint.

### What can be improved

-   Content volume: Several blocks (especially layout-heavy patterns) need more real posts/content to show their intended design. Create or seed more sample posts for testing and demos.
-   Metadata migration: When adding/updating custom fields the values didn’t show on existing posts — consider a migration script or a shortcode to re-save posts programmatically so new fields propagate.
-   Connected-info block display issues need a focused debugging pass (rendering context or CSS/markup differences between editor and front-end could be causing problems).
-   Testing & QA: Add automated and manual test steps for mobile layouts, block display across breakpoints, and accessibility checks (contrast, keyboard navigation, aria attributes).

### What I learned

-   Building query loop blocks and patterns speeds up page construction but requires realistic content samples to evaluate properly.
-   SCSS is helping rapid styling iterations and made mobile fixes and theme tweaks easier to manage.
-   Publishing updates to staging and re-testing on staging is important for catching integration issues early (plugin updates affecting existing CPT output).
-   Small visual/accessibility changes (header/footer colour contrast, featured image placement) have a big impact on perceived quality and accessibility.

### Next actions (prioritised)

1. Seed or create additional sample content (Gear, Area, Fish) so blocks/patterns can be validated with realistic data.
2. Implement a migration/resave routine to propagate new custom field values to existing posts (or document a manual re-save process) so metadata shows correctly.
3. Debug and fix the connected-info block display issue; test both editor and front-end rendering.
4. Finalise the single-archive template for plugin posts that was started and ensure it works for all CPT entries.
5. Add a short QA checklist: mobile breakpoints, keyboard navigation, color contrast checks, and a smoke test on staging after plugin updates.
6. Complete the 2-week plan created during Day 5: break down tasks into tracked tickets and milestones for January work.

---

### Notes

This reflection was produced by synthesizing the Day 1–5 log entries; accessibility and mobile responsiveness were recurring themes and should remain a focus going forward.
