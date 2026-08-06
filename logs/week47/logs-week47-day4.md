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
-   First pass installed Playwright with a hand-rolled config (custom `playwright.config.ts`, `tsconfig.json`, `test:e2e` script, hardcoded/env-var `baseURL`) — worked, but wasn't grounded in any standard
-   Caught the setup drifting into a pile of ad hoc workarounds (forced serial execution, `baseURL` defaulting to dev — which tests already-merged code, not the PR under review — and an invented env-var scheme) — flagged as backwards and paused for a proper redo
-   **Redone from Playwright's actual official defaults:** ran the real unmodified installer (`npm init playwright@latest`) in a scratch directory and compared line-by-line against the repo setup
-   Found and corrected real gaps: official default runs all 3 browser projects (was Chromium-only), official reporter is `'html'` (was `'list'`), official `baseURL` is left commented with a gitignored `.env` (was hardcoded), and the official scaffold uses neither a `tsconfig.json` nor a `test:e2e` script (both removed)
-   Deliberately did not adopt the official CI workflow file — no environment currently exists that can test a PR's own unmerged branch code; flagged as a separate future infrastructure project, not something to bolt on here
-   Final setup landed: `@playwright/test`, `dotenv`, `@types/node` as dev dependencies; config matching verified official defaults with 2 named intentional exceptions (existing `testDir` convention, and `import.meta.dirname` instead of `__dirname` due to this repo's ESM `package.json`)
-   Real spec `tests/specs/work-archive.spec.ts` written using all 6 helpers against the live Work Archive template
-   Committed and pushed — testing is manual (`npx playwright test`) by design for now

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
-   2.0 hrs - Re-visited the implementation for playwright testing as I noticed AI did a custom install, not the standard install, this has now been fixed and the standard installation process has been followed. 

---

## Notes

-
