# Week 47, Day 3 Log 2026-08-05

## Today's Progress

### What have you accomplished today?

---

**Learning — Codecademy: Learn Sass Best Practices (Sustainable SCSS)**

-   Covered core best practices for keeping Sass codebases clean and maintainable at scale:
    -   **Partials** — splitting a stylesheet into dedicated `_`-prefixed files (variables, animations, placeholders) instead of one bloated stylesheet
    -   **`@import`** — pulling partials into a main stylesheet; always placed at the top of the file; stays a Sass import for `.scss` partials, falls back to native CSS import behaviour for `url()`, `.css`, `http(s)://`, or media-query-attached paths
    -   **Mixins vs Placeholders** — mixins (`@mixin`/`@include`) for parameterised reusable blocks; placeholders (`%name`/`@extend`) for shared styles never applied directly via an HTML class, especially with no parameters involved
-   **Project (Animated Company Logo refactor):**
    -   Moved all `@import` statements to the top of `main.scss`
    -   Extracted variables into `helper/_variables.scss` and keyframe animations into `helper/_animations.scss`
    -   Identified a misused mixin (no parameters, never applied via HTML class) and converted it to a placeholder in `helper/_placeholders.scss`
    -   Replaced the mixin include with `@extend %slide-left;`
-   Quiz (Sustainable SCSS) scored 100% — covering `@import` behaviour, mixin vs `@extend` usage, and variable/placeholder scope across imported files

---

## Time Logs

-   1.10 hrs - Learn Sass: Best Practices.

---

## Notes

-
