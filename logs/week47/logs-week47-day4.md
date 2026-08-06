# Week 47, Day 4 Log 2026-08-06

## Today's Progress

### What have you accomplished today?

---

**LS-2244** — Work Archive Template: Audit & Fix `[In Review]`

-   **Final polish pass completed:**
    -   Added hover/focus state (border, shadow, lift) to Selected Projects cards, matching the existing card-motion treatment used elsewhere
    -   Added new `surface.canvas-alt` design token (light + dark values, WCAG AA 2.2 verified) and `content-band-alt` style variation for alternating section backgrounds on Selected Projects and Discuss Project sections; 16px radius added to the CTA frame
    -   Fixed a pre-existing `text.brand` contrast gap (`brand-500` → `brand-600`) so it clears 4.5:1 AA everywhere it's used
-   **CodeRabbit + Copilot automated review addressed line by line:**
    -   8 valid findings fixed — removed 5 hardcoded icon colours in favour of the `icon.background` token, fixed a stale block-gap attribute mismatch, a Playwright helper contract bug, 2 Stylelint issues, and an RTL logical-property fix
    -   3 other suggestions declined and documented — each would have reintroduced an already-verified bug or wasn't achievable given the current token/mixin setup
-   **PR #19 open on `develop`, currently under review**

---

**LS-2335** — Set Up Playwright Testing + Generic Assertion Helpers `[In Progress]`

-   All 6 generic assertion helpers planned: `expectSectionOrder`, `expectElementCount`, `expectCardParts`, `expectLinkHref`, `expectGridColumnsAtViewport`, `expectComputedStyle` — fully parameterised, reusable across future templates
-   Installed `@playwright/test` + Chromium binary; added `playwright.config.ts` (serial execution, env-var overridable base URL/path) and `tsconfig.json`
-   Added `test:e2e` npm script
-   Wrote real spec `tests/specs/work-archive.spec.ts` using all 6 helpers against the live Work Archive template
-   All 6 tests pass locally; dev environment confirmed reachable (200 response)
-   Not yet committed — pending final local re-confirmation before commit, push, and PR against `develop`

---

**Learning — Sass: Operators, Colour Functions & Control Directives**

-   **Operators & Math:**
    -   Division with `/` — computing derived values (`$width/6`, chained `$width/6/2`); Sass treats `/` as division when at least one operand is a variable or the result of another operation
    -   Addition with colour values (`color + blue`) — arithmetic operations on colours
    -   Modulo (`%`) — checking even/odd (`$i % 2 == 0`) for alternating styles
-   **Built-in Colour Functions:**
    -   `fade-out()` — reducing opacity of a colour
    -   `adjust-hue()` — rotating a colour around the colour wheel by a given degree, used to build a rainbow effect
-   **Control Directives:**
    -   `@each` loops — iterating over a Sass list to dynamically generate class names/styles via interpolation
    -   `@for` loops — generating repeated, incrementally varied styles (e.g. targeting `:nth-child(#{$i})`)
    -   `if()` function — inline conditional logic for property values without a full `@if/@else` block
-   **Interpolation:** `#{}` syntax for injecting Sass variables into selector names and property values
-   **Applied project:** built a CSS "colour wheel"/rainbow effect combining `@for`, `adjust-hue()`, modulo-based conditionals, and interpolation
-   Core takeaway: moving from static Sass values to computed ones — using math, colour functions, and loops to generate dynamic, DRY stylesheets instead of hardcoding every value

---

## Time Logs

-   1.0 hrs - Learn Sass: Functions & Operations
-   1.40 hrs - Working on the final polishes on archive-template and opened PR for review.
-   1.25 hrs - Working on LS-2335 for the playwright tests. 

---

## Notes

-
