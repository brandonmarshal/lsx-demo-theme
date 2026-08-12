# Week 48, Day 3 Log 2026-08-12

## Today's Progress

### What have you accomplished today?

---

**LS-2340** — Phase 3: Move Structural CSS into JSON/Block Supports `[In Progress]`

-   **Group 2 complete (`_card-motion.scss` + WooCommerce lockstep):**
    -   All 6 sub-groups done: icon-shell, glass-card + card-feature, card-category + card-services, icon-frame-glow + card-solutions, card-link-row + stat-segment, WooCommerce lockstep
    -   File cut from 690 → 450 lines
    -   2 new confirmed JSON `css`-field limitations found and documented for all remaining groups: `@supports` gets silently stripped just like `@media`; a selector with `&` embedded or trailing (not leading) breaks and applies unconditionally instead of scoped
    -   Caught the `&`-position bug before shipping — would have silently removed every stat-segment's divider instead of just the last one's
    -   Settled on a new verification method — throwaway WP-CLI test pages, checked against actual rendered `<style>` output, then deleted — since patterns and unused style variations don't reliably show up in a live page's compiled CSS
    -   Found and fixed a real conflict: `card-feature.json`'s hover-lift value was silently dead (`:where()` issue) and didn't match the actually-rendering SCSS value; added new `settings.custom.animation.lift.{sm,md,lg}` tokens and wired every hover-lift in the file to them
    -   Promoted `.ls-card__icon-shell` from a plain shared className to a proper JSON style
-   **Group 2 manual QA — all checks passed:**
    -   All 9 checklist items confirmed working (rest-state look, hover/focus animations, icon shell centering, card services gradient bar, parent-triggered glow on Card Solutions, Card Link Row click/keyboard behaviour, Stat Segment divider logic, reduced-motion behaviour, WooCommerce badge/banner tinting)
    -   2 real bugs found and fixed: `position: relative`/`overflow: hidden` missing from 4 JSON files (Card Services' gradient bar rendering past the card's rounded corners); WooCommerce card variant showing no styling, fixed by moving the classname swap to `render_block_data` at priority 9, before core's variation-detection filter runs
    -   Also added a missing hover treatment for `is-style-card-case-study`, reusing `card-category`'s exact pattern for family consistency
    -   16 files changed, ready to commit
-   **Groups 3 & 4 complete:**
    -   **Group 3 (footer + menu motion):** `_menu-motion.scss` left untouched — effectively all of it hits a confirmed limitation, not worth splitting; `_footer-motion.scss` trimmed, rest-state CSS moved into existing JSON files, pseudo-elements and hover states kept in SCSS
    -   Manual QA on Group 3 caught 2 out-of-scope mobile bugs, fixed in the same pass: footer proof-stat cards stacking full-width on mobile (fixed via native `isStackedOnMobile: false` attribute); footer nav categories 1-per-row on mobile (fixed with a scoped grid for 2-per-row)
    -   **Group 4 (buttons):** rest-state structural CSS moved into `core-button.json`, `glass-button.json`, `button-arrow-compact.json`; 4 CTA-consultation patterns' on-dark styling inlined since it's single-use
    -   `is-style-button-glow-accent` confirmed 0 consumers — left untouched, tracked on LS-2341
    -   **Bug caught post-QA:** new JSON css fields used unnecessary extra nesting on `&`, silently dropping `position: relative` and letting a button's hover reveal escape its container; fixed by using `&` directly against the block's actual registered root selector
    -   **New bug found, not fixed here:** CTA consultation patterns render dark in light mode — pre-existing token issue; logged as Bug 3 on LS-2436
-   **Phase 3 fully complete — all 9 groups done, code-reviewed:**
    -   Final numbers: `assets/css/animations.css` 2,003 → 1,444 lines (~28% reduction); confirmed the audit's own structural-line ratio barely moving is expected, not a sign of incomplete work — remaining lines are hover/focus-state colour swaps WordPress itself blocks from JSON, plus stripped `@media`/`@supports` blocks; ~303 remaining lines are dead code deliberately deferred to LS-2341
    -   **Mixin teardown:** 3 of 5 files under `src/scss/abstracts/mixins/` deleted outright (`_mq.scss`, `_breakpoints-theme.scss`, `_glass.scss`), `sync:breakpoints` tooling removed; `_motion.scss`/`_surface.scss` left alone per LS-2341's scope
    -   **Duplicate sweep:** consolidated 3 groups of byte-identical hover/motion rules (icon-button hover, mega-menu-item hover, glass `@supports` blur) into a new `_shared-hover.scss` partial
    -   **Group 8 (enqueue gating):** investigated, no change needed — every front-end template needs `animations.css` unconditionally via header+footer parts, confirmed no further gating opportunity
    -   **Full code review pass:** caught and fixed 1 real bug — the hover-duplicate consolidation had silently normalized `:focus-visible` and `:focus-within` down to one pseudo-class across 4 selectors; fixed by splitting the merged rule back into its two original pseudo-classes
    -   **Group 9:** final rebuild, `CHANGELOG.md` entry added, all acceptance criteria checked off
-   PR #23 opened — now reviewing before merge

---

**LS-2436** — Fix Missing `has-text-color` Class on Colour-Styled Blocks `[Backlog]`

-   Added Bug 3 (CTA consultation patterns rendering dark in light mode, found during LS-2340 Group 4 work) to the issue — no implementation work started yet

---

## Time Logs

-   2.20 hrs - Working on LS-2340, everything is logged on the ticket.
-   0.35 hrs - Completed the manual checks and applied improvements/fixes where needed
-   2.40 hrs - Working on Phase 3 Group 3 and 4, of LS-2340.
-   3.0 hrs - Completed LS-2340, opened the PR and started reviewing. 

---

## Notes

-
