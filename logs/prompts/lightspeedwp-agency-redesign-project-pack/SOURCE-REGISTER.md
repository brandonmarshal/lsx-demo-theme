# Source Register

## Reviewed sources

| Source | Evidence captured | Use in pack | Confidence |
|---|---|---|---|
| `lightspeedwp/ls-plugin` README and AGENTS | Plugin purpose, repo structure, requirements, block rules and validation commands. | Defines plugin responsibilities and quality gates. | High |
| `lightspeedwp/ls-plugin` package and bootstrap | Build scripts, Node version, includes, existing classes and enqueued block/variation assets. | Defines implementation constraints and plugin audit tasks. | High |
| `lightspeedwp/ls-plugin` carousel docs | Existing block pattern using Swiper, parent/child blocks and asset loading approach. | Informs block/plugin requirements and QA. | Medium-high |
| `lightspeedwp/ls-theme` README and AGENTS | Theme purpose, repo structure, theme-first approach, validation commands and accessibility expectations. | Defines theme responsibilities and coding standards. | High |
| `lightspeedwp/ls-theme` theme.json | Current palette, custom tokens, breakpoints, shadows, animation, z-index and template parts. | Baseline for design-token mapping. | High |
| `lightspeedwp/ls-theme` task list | Open setup, development and QA tasks. | Informs implementation waves and risk. | Medium-high |
| `lightspeedwp/ls-theme` templates and parts | Basic index template and header/footer pattern references. | Informs theme foundation tasks. | High |
| Figma design system | Pages, component areas, variables, light/dark mode, typography, spacing, radius, shadow and blocks inventory. | Informs Figma-to-WordPress mapping. | Medium-high |
| Current live site | Existing IA, services, solutions, portfolio, blog and consultation CTA. | Informs migration, redirects, content and SEO. | Medium-high |

## Sources needing follow-up

| Source | Issue | Required action |
|---|---|---|
| Figma Make prototype | Connector access was blocked. | Provide screenshots, export, or direct node links for the key screens. |
| Published Figma site | Fetch returned a JS-only shell. | Review visually in browser and capture screenshots for parity QA. |
| Dev site | Fetch failed in this session. | Confirm access, staging auth, or provide screenshots/browser QA access. |
| Theme task reference to Figma Make checklist | Referenced file path returned 404 via connector. | Confirm correct path or recreate the checklist in `.github/tasks/`. |
| `styles/light.json` | README says light and dark variations exist, but direct fetch of `styles/light.json` failed. | Audit style variation files before finalising token tasks. |

## Evidence rules for this project

- Do not treat Figma-generated React/Tailwind output as implementation code.
- Convert design intent into WordPress blocks, patterns, templates and theme.json tokens.
- Keep theme concerns in `ls-theme` and site functionality in `ls-plugin`.
- Do not create GitHub issues until the issue drafts are approved.
