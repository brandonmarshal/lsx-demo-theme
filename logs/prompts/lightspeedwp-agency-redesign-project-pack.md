# LightSpeedWP.Agency Redesign - Combined Project Pack


---

<!-- Source file: README.md -->


# LightSpeedWP.Agency Redesign - Project Pack

- Value: Turn the LightSpeedWP.Agency redesign into a controlled block-theme and block-plugin delivery project, with design-system traceability from Figma to WordPress.
- Risk: Evidence is incomplete for the Figma Make prototype, dev site and published prototype, so final scope and parity checks must be approved before GitHub issues are created.
- Next step: Review `00-complexity-risk-estimates.md`, then approve or revise the PRD and issue drafts.

## Status

Planning pack only. No GitHub issues have been created. No repository files have been changed.

## Source inputs

| Source | URL | Planning use | Status |
|---|---|---|---|
| Blocks plugin repo | https://github.com/lightspeedwp/ls-plugin | Custom blocks, site-specific PHP, non-theme functionality | Reviewed via GitHub connector |
| Theme repo | https://github.com/lightspeedwp/ls-theme | Block theme, theme.json, templates, patterns, global styles | Reviewed via GitHub connector |
| Figma design system | https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System | Variables, pages, components, light/dark mode, prototype inventory | Partially reviewed via Figma connector |
| Figma Make prototype | https://www.figma.com/make/xAYHN3wsPM4TR2JppUr8sp/LightSpeedWP.Agency | Intended visual source for implementation | Connector blocked; needs manual export or node links |
| Dev site | https://ls-agency.lightspeedwp.dev/ | Current build validation | Not machine-readable in this session |
| Published prototype | https://lightspeedwp.figma.site/ | Prototype parity reference | JS-only fetch; visual review needed |
| Current live site | https://lightspeedwp.agency/ | Current IA, content, redirects, migration source | Reviewed via web fetch |

## Pack structure

```text
lightspeedwp-agency-redesign-project-pack/
├── README.md
├── SOURCE-REGISTER.md
├── 00-complexity-risk-estimates.md
├── 01-prd/
│   ├── prd.md
│   ├── assumptions.md
│   └── open-questions.md
├── 02-technical-brief/
│   ├── figma-to-wordpress-brief.md
│   ├── theme-json-token-map.md
│   ├── block-plugin-requirements.md
│   └── template-pattern-requirements.md
├── 03-task-plan/
│   ├── epic-map.md
│   ├── task-breakdown.md
│   ├── dependency-map.md
│   └── implementation-waves.md
├── 04-github-issues/
│   ├── issue-index.md
│   └── issues/
├── 05-qa-and-launch/
│   ├── launch-qa-plan.md
│   ├── acceptance-test-map.md
│   ├── figma-parity-checks.md
│   └── go-no-go-gates.md
└── 06-memory-bank/
    ├── projectbrief.md
    ├── productContext.md
    ├── systemPatterns.md
    ├── techContext.md
    ├── activeContext.md
    ├── progress.md
    └── tasks/_index.md
```

## Approval gates

1. Approve evidence baseline and known gaps.
2. Approve PRD scope, non-goals and success metrics.
3. Approve IA, redirect and content migration approach.
4. Approve design-token mapping before implementation.
5. Approve issue drafts before creating GitHub issues.
6. Approve launch QA plan before final QA begins.
7. Approve go/no-go gate before deployment.

## Specialist follow-up recommended

- Figma parity: `lightspeed-figma-wordpress-parity-auditor`
- Launch QA orchestration: `lightspeed-launch-qa-planner`
- Redirect map: `lightspeed-redirect-map-planner`
- GA4/GTM plan: `lightspeed-ga4-conversion-tracking-planner`
- Schema and AI discoverability: `lightspeed-schema-and-ai-discoverability-planner`
- Claim register: `lightspeed-claim-register-auditor`


---

<!-- Source file: SOURCE-REGISTER.md -->


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


---

<!-- Source file: 00-complexity-risk-estimates.md -->


# 00 - Complexity and Risk Estimates

- Value: This first-pass estimate identifies where delivery risk sits before any issue creation or implementation.
- Risk: Several evidence sources were only partially inspectable, so these estimates should be treated as planning risk, not final delivery estimates.
- Next step: Resolve the high-risk evidence gaps before converting issue drafts into GitHub issues.

## Estimate model

Complexity: XS, S, M, L, XL.  
Risk: Low, Medium, High, Critical.

| Workstream | Complexity | Risk | Why it matters | Risk control |
|---|---:|---:|---|---|
| Evidence alignment and source inventory | M | High | Figma Make, the dev site and the published prototype were not fully machine-readable in this session. | Manual visual review, screenshots, node links and an approved source register. |
| PRD and scope approval | M | Medium | Redesign scope spans IA, brand, block theme, plugin behaviour, content, SEO, analytics and launch. | Lock non-goals and approval gates before implementation. |
| Figma variables to theme.json | L | High | The design system has multiple variable collections, light/dark modes and block/section styles that must map cleanly into WordPress. | Create token map, reject hard-coded values, validate in editor and frontend. |
| Theme foundation | L | High | Header, footer, index/template work and style variations are still open or incomplete in the repo task list. | Build global parts first, then templates and patterns. |
| Pattern library and page templates | XL | High | The Figma file includes desktop, tablet, mobile, light and dark mode sections for many page groups. | Work page-family by page-family with Figma parity checks. |
| Blocks plugin functionality | L | High | Existing functionality includes filters, style switcher, carousel, SCF JSON and permalinks. Changes must not leak theme concerns into the plugin. | Audit current functionality, keep blocks focused, avoid new dependencies unless justified. |
| IA, content and redirects | L | High | Current live IA differs from the new Figma nav model. SEO and redirect risk is material. | Create URL inventory, redirect map and content migration checklist before launch. |
| Claims and proof | M | High | Claims such as 500+ sites, WCAG AA and sub-1s page loads need evidence before publication. | Create claim register and approve wording before final content. |
| Accessibility | L | High | WCAG AA is a visible claim and the design includes dark/light modes, menus, effects and interactive cards. | WCAG 2.1 AA baseline, keyboard testing, contrast checks and reduced-motion support. |
| Performance and motion | M | High | Theme includes animation and GSAP integration, while the design relies on rich visual effects. | Performance budget, conditional scripts, no unnecessary animation payload. |
| Analytics, schema and AI discoverability | M | Medium | Site positioning includes AI-optimised WordPress systems and should be measurable/searchable. | Define GA4/GTM events, schema plan and source-of-truth content register. |
| QA and launch | L | High | Launch touches brand, SEO, forms, redirects, accessibility, analytics and production cutover. | Formal launch checklist, go/no-go gate and post-launch monitoring. |

## Primary launch blockers

1. Figma Make prototype must be exported or reviewed visually.
2. Dev site must be accessible for browser QA.
3. Approved IA and redirect plan are needed before URL changes.
4. Claim register must approve or soften marketing claims.
5. Theme and plugin validation commands must pass on the selected release branch.
6. Accessibility and performance budgets must be agreed before final QA.

## Suggested release confidence target

Do not move to implementation until at least these are true:

- PRD approved.
- Source register approved.
- Figma parity baseline approved.
- Token map approved.
- Issue drafts approved for manual creation.
- Launch QA plan approved.


---

<!-- Source file: 01-prd/prd.md -->


# LightSpeedWP.Agency Redesign PRD

- Value: Rebuild LightSpeedWP.Agency as a design-system-led WordPress block theme and site plugin implementation that is fast, accessible, editor-friendly and useful for sales.
- Risk: The redesign spans brand, IA, content, WordPress architecture, plugin functionality, analytics, redirects and launch QA. Missing evidence must be resolved before final scope approval.
- Next step: Approve the scope, non-goals, success metrics and open questions before GitHub issue creation.

## Executive summary

LightSpeedWP.Agency needs a redesigned website that presents LightSpeed as a specialist WordPress and WooCommerce agency focused on governed, tokenised, AI-ready and maintainable systems. The implementation should use the LightSpeed Figma design system as the source of design intent, the `ls-theme` repository for the block theme, and the `ls-plugin` repository for site-specific blocks and non-theme functionality.

The project should not become a page-builder rebuild, an uncontrolled custom-code rewrite, or a one-off marketing site that breaks the design system. The core delivery outcome is a reusable, maintainable WordPress implementation with clear token mapping, page templates, patterns, editor UX, QA gates and launch controls.

## Project context

### Repositories

- Theme: `lightspeedwp/ls-theme`
- Plugin: `lightspeedwp/ls-plugin`
- Planning baseline branch: `develop`, unless the team approves a separate release branch.

### Design sources

- Figma design system: LightSpeedWP Design System
- Figma Make prototype: needs manual review due connector limitation
- Published prototype: needs browser review because fetch returned a JS shell

### Environments

- Current live site: https://lightspeedwp.agency/
- Dev site: https://ls-agency.lightspeedwp.dev/

## Goals

1. Implement a block-first redesign that maps Figma variables, components and patterns into WordPress theme.json, templates, patterns and custom blocks.
2. Preserve maintainability by keeping global design decisions in the theme and site-specific functionality in the plugin.
3. Improve sales clarity around LightSpeed services, solutions, systems, work, insights and consultation CTAs.
4. Support editorial publishing through reusable templates, patterns, block variations and documentation.
5. Meet accessibility, responsive and performance expectations before launch.
6. Protect SEO value through URL inventory, redirects, metadata, schema and content migration controls.
7. Define measurement for consultation CTAs, lead forms, content engagement and conversion paths.

## Non-goals

- Do not create GitHub issues automatically.
- Do not implement source changes as part of this planning pack.
- Do not introduce a page builder.
- Do not install Tailwind to match Figma-generated reference code.
- Do not move theme responsibilities into the plugin.
- Do not add a large framework, Storybook, Docker, Vite or Playwright unless a later decision proves ROI and maintenance value.
- Do not publish unsupported performance, accessibility or volume claims without a claim register.

## Personas and user journeys

### Agency prospect

Needs to understand what LightSpeed does, whether LightSpeed can solve their WordPress/WooCommerce problem, and how to book a consultation.

Journey:
1. Arrives via search, referral, blog or portfolio.
2. Scans positioning and proof.
3. Reviews services, solutions and work examples.
4. Books consultation or contacts LightSpeed.

### Technical decision-maker

Needs evidence that LightSpeed can deliver maintainable, scalable, accessible WordPress systems.

Journey:
1. Reviews systems, design-system and governance content.
2. Looks for technical credibility, process and tooling.
3. Checks portfolio, case studies and content quality.
4. Requests a scoped discussion.

### Existing client

Needs to find services, support, hosting, security and ongoing improvement options.

Journey:
1. Uses services/support pages.
2. Finds clear CTA or account route.
3. Understands what is included and what needs a quote.

### LightSpeed editor/team member

Needs to create and maintain pages without breaking design, accessibility or performance.

Journey:
1. Uses approved templates and patterns.
2. Adds content within controlled blocks.
3. Follows editor documentation and pre-publication checks.

## Requirements

### Product and content requirements

- New IA must be approved against current live IA before implementation.
- Homepage must communicate the new positioning: structured, governed, AI-optimised WordPress systems.
- Core page families must include: Work, Solutions, Services, Systems, Insights, About and Contact.
- Existing live content must be inventoried before removal or consolidation.
- Consultation CTA must be consistent and measurable.
- Claims must be registered, evidenced and approved before launch.
- Blog and insight content must remain discoverable and migrated safely.

### Design-system requirements

- Map Figma variable collections to theme.json token groups.
- Use semantic tokens over hard-coded values.
- Support light and dark modes where approved.
- Map components to core blocks, block variations, custom blocks or patterns.
- Map page sections to block patterns.
- Map page families to templates or editor-controlled page patterns.
- Document responsive behaviour for desktop, tablet and mobile.
- Document focus, hover, active and reduced-motion states.

### WordPress technical requirements

- Theme repo owns: theme.json, templates, template parts, patterns, global styles, style variations, authored effects CSS and minimal theme PHP.
- Plugin repo owns: custom blocks, site-specific PHP, SCF JSON, filters, style switcher, custom permalink behaviour and non-theme functionality.
- Follow WordPress Coding Standards.
- Escape output, sanitise input and validate permissions/nonces where needed.
- Use `@wordpress/scripts` in the plugin and the existing Sass workflow in the theme.
- Keep CSS and JS conditional where possible.
- Update changelogs for meaningful changes.

### Editor experience requirements

- Editors should be able to create approved page layouts using patterns and block variations.
- Critical page sections should be reusable but not over-abstracted.
- Pattern names should be human-readable and grouped by page family or function.
- Documentation should cover page creation, CTA management, style switching and common publishing checks.

### SEO and migration requirements

- Create current URL inventory from the live site.
- Create new URL map from approved IA.
- Create redirect map for changed, consolidated or retired URLs.
- Preserve important metadata, open graph images and internal links.
- Add schema plan for organisation, services, articles, breadcrumbs and FAQs where approved.
- Run pre- and post-launch crawl checks.

### Measurement requirements

- Define GA4/GTM events for consultation CTA clicks, form submissions, newsletter signup, key navigation, content engagement and outbound/social links where relevant.
- Add baseline reporting before launch.
- Confirm cookie/privacy requirements before tagging changes.

## Success metrics

Draft metrics pending approval:

- Consultation CTA click-through rate improves from current baseline.
- Form submissions are tracked reliably in GA4.
- Core page templates pass accessibility review.
- Core landing pages meet agreed performance budget.
- No high-priority redirect or 404 issues after launch.
- Editors can create a standard page using approved patterns without developer help.
- Key claims are either evidenced or softened before launch.

## Acceptance criteria

- PRD, technical brief, issue drafts and implementation waves are approved.
- Figma token map is approved and implemented without uncontrolled hard-coded values.
- Header, footer, homepage and core page templates match approved Figma intent across desktop, tablet and mobile.
- Light/dark mode behaviour is approved and tested.
- Existing plugin functionality is audited and regression tested.
- SEO redirect map is approved and tested.
- GA4/GTM event plan is implemented and validated.
- Accessibility, performance, security and responsive QA pass launch thresholds.
- Go/no-go checklist is signed off before deployment.

## Risks and assumptions

See `assumptions.md`, `open-questions.md` and `00-complexity-risk-estimates.md`.

## Internal LightSpeed notes

- Treat this as a flagship internal project and reusable delivery reference for future design-system-to-WordPress work.
- Keep the implementation modular and commercial. Avoid engineering side quests that do not improve quality, maintainability or sales outcomes.
- Use the project memory bank from the start so issue creation, implementation and QA do not drift.


---

<!-- Source file: 01-prd/assumptions.md -->


# PRD Assumptions

1. The implementation baseline is the `develop` branch for both `ls-theme` and `ls-plugin` until a release branch is approved.
2. `ls-theme` owns theme.json, global styles, templates, template parts, patterns and theme-level CSS/JS.
3. `ls-plugin` owns site-specific custom blocks, non-theme PHP functionality, SCF JSON, filtering, style switching, custom permalinks and shared site behaviour.
4. The design system is the primary design source, but Figma Make and published prototype parity require manual visual review.
5. The live site remains the source of truth for current IA and migration inventory until a new IA is approved.
6. The dev site will be available for browser QA before implementation begins.
7. Claims such as `500+`, `WCAG AA` and `<1s` require evidence or softened wording before launch.
8. The project should avoid new heavy dependencies unless approved with ROI and maintenance reasoning.
9. Existing animation and GSAP integration should be audited before adding new motion behaviours.
10. Light and dark mode are in scope only where design intent and theme support are confirmed.


---

<!-- Source file: 01-prd/open-questions.md -->


# PRD Open Questions

## Evidence and source control

1. What is the approved release branch strategy for `ls-theme` and `ls-plugin`?
2. Can the Figma Make prototype be exported or linked to specific nodes for implementation parity?
3. Is the published Figma site a reference only, or should it define final content and interactions?
4. Why does the theme task list reference a Figma Make checklist path that currently returns 404?
5. Should planning pack files be committed to repo `.github/tasks/` / `.github/reports/`, kept in Asana, or both?

## IA and content

6. What is the final approved top-level IA?
7. Which current live pages must be preserved, redirected, merged or retired?
8. Which pages need new copy before development, and which can start from prototype copy?
9. What case studies and portfolio items should be featured on launch?
10. Are pricing, packages or lead magnets in scope for this launch?

## Design and implementation

11. Is dark mode a launch requirement or a phase-two enhancement?
12. Which Figma components require custom blocks rather than core blocks or patterns?
13. Should style switching persist by cookie/local storage, URL state, user preference, or only system preference?
14. Which animations are essential to the brand experience, and which are optional?
15. What are the approved performance budgets?

## Claims, SEO and measurement

16. What proof supports `500+ sites launched`?
17. Is `WCAG AA` a target, claim or audited certification statement?
18. What evidence supports `<1s page loads`, and for which page/device/network conditions?
19. Which GA4/GTM account and containers should be used?
20. What schema types are approved for launch?


---

<!-- Source file: 02-technical-brief/figma-to-wordpress-brief.md -->


# Figma-to-WordPress Technical Brief

- Value: Translate the LightSpeedWP design system into a maintainable WordPress block theme and site plugin architecture.
- Risk: Figma-generated React/Tailwind output is only a visual reference and must not drive the WordPress implementation directly.
- Next step: Approve the token map and component-to-block strategy before implementation.

## Evidence reviewed

- `ls-theme` README, AGENTS, package.json, theme.json, functions.php, task list, index template, header/footer parts.
- `ls-plugin` README, AGENTS, package.json, bootstrap file and carousel documentation.
- Figma design system inventory: pages, components, patterns, blocks, light mode, dark mode, prototype, foundations and variables.
- Current live site IA and content.

## Build type

Block theme plus site plugin.

- Theme: `lightspeedwp/ls-theme`
- Plugin: `lightspeedwp/ls-plugin`

## Repository assumptions

### Theme responsibilities

- Global design system tokens in `theme.json`.
- Style variations and mode-specific style decisions.
- Header/footer template parts and patterns.
- Page templates and reusable section patterns.
- Theme-level CSS for authored effects and presentation only.
- Minimal PHP for theme support, assets and integrations.

### Plugin responsibilities

- Custom Gutenberg blocks where core blocks/patterns are insufficient.
- Site-specific functionality that must survive theme changes.
- SCF JSON and related validation.
- Search and taxonomy filter behaviour.
- Style switcher behaviour where it is more than theme-only styling.
- Custom permalinks and routing behaviour.

## Figma variables to theme.json

The Figma design system has these relevant variable collections:

- Default primitives - colour
- Tokens - colour, with dark and light modes
- Theme typography
- Theme layout
- Theme spacing
- Theme radius
- Theme border
- Theme shadow
- Styles
- Styles: Blocks
- Styles: Sections

Implementation direction:

1. Start with primitive colour alignment.
2. Map semantic colour tokens into `settings.custom.color` and palette slugs.
3. Map typography to `settings.typography.fontSizes`, `fontFamilies`, line heights and custom typography tokens.
4. Map spacing, radius, border and shadow to `settings.spacing`, `settings.custom` and block styles where WordPress does not support a native token category.
5. Map light/dark modes to global style variations or style-switcher-compatible theme states.
6. Avoid direct component hex values outside token definitions.

## Components to blocks

| Figma item | WordPress implementation | Status | Notes |
|---|---|---|---|
| Header/navigation | Header template part + pattern + Navigation block/custom CSS | Draft | Must support desktop/mobile and keyboard navigation. |
| Logo system | Theme assets + Site Logo or image pattern | Draft | Use LS Agency logo/icon assets from Figma after export. |
| Button variants | Core Button block styles/variations | Draft | Map CTA solid, brand solid and outline states to tokens. |
| Hero section | Page pattern using Group, Heading, Paragraph, Buttons and stats row | Draft | Avoid custom block unless editor UX requires locked structure. |
| Stats/proof cards | Pattern or reusable block variation | Draft | Claims require evidence. |
| Cards | Core Group/Columns patterns or custom card block if data-driven | Draft | Keep editor simple. |
| Carousel | Existing plugin carousel block | Draft | Use only where design requires slider behaviour. |
| Search/filter UI | Existing plugin search/taxonomy filter blocks | Draft | Audit against new IA/content types. |
| Style switcher | Existing plugin style switcher + theme variations | Draft | Confirm persistence and accessibility. |
| Back-to-top | Existing plugin variation | Draft | Confirm need in final UX. |

## Sections to patterns

Patterns should be grouped by page family:

- Global: header, footer, consultation CTA, newsletter CTA.
- Homepage: hero, proof stats, solution cards, process overview, featured work, insight cards.
- Solutions: overview hero, solution grid, solution detail sections, related services.
- Services: service landing, discover/create/build/launch/grow/evolve sections.
- Systems: design systems, governance, AI-readiness, technical architecture sections.
- Work: portfolio grid, case study hero, results/proof section.
- Insights: blog landing, category filters, article cards.
- About: story, values, team, credibility and community sections.
- Contact: form intro, consultation CTA, support routes.

## Pages to templates

| Page family | Template/pattern approach | Notes |
|---|---|---|
| Homepage | Static page template or homepage pattern set | Needs strongest Figma parity. |
| Solutions landing | Page template + reusable solution cards | Map old solution URLs to new IA. |
| Service landing pages | Page patterns by service stage | Could use a shared template with different content. |
| Systems | Page pattern set | New IA area; content needs approval. |
| Work/portfolio | Archive or page grid depending on current content model | Confirm CPT or page-based approach. |
| Insights/blog | Core query templates + filter/search support | Preserve blog discoverability. |
| Case studies/posts | Single templates | Schema and internal links required. |
| Contact | Page pattern + form block | Needs conversion tracking. |

## Accessibility and responsive requirements

- WCAG 2.1 AA baseline.
- Semantic headings; one H1 per page.
- Keyboard-accessible navigation, dropdowns, filters, carousel and style switcher.
- Visible focus states and no removed outlines.
- Reduced-motion support for animation/GSAP effects.
- Colour contrast validated for light and dark modes.
- Responsive QA at 1440, 1280, 1024, 768, 640, 390 and 320 widths, aligned to theme breakpoints.

## Editor experience requirements

- Pattern names should be editor-friendly.
- Lock or constrain fragile structures where appropriate.
- Use core blocks first.
- Custom blocks only where behaviour, data binding or editor UX requires them.
- Provide short editor docs for new patterns and block behaviours.

## Build and asset pipeline notes

### Theme

- Use existing Sass build for authored effects.
- Continue `sync:breakpoints` before CSS build.
- Do not add Tailwind to match Figma output.
- Keep functions.php minimal.

### Plugin

- Use `@wordpress/scripts` build pipeline.
- Keep block source in `src/blocks/` and built assets in `build/` or the repo's established output path.
- Register blocks using `block.json` and `register_block_type()`.
- Load expensive frontend assets only when needed.

## Risks and open questions

See `../01-prd/open-questions.md` and `../00-complexity-risk-estimates.md`.


---

<!-- Source file: 02-technical-brief/theme-json-token-map.md -->


# Theme JSON Token Map

## Purpose

Create a controlled map from Figma variables to WordPress `theme.json`, style variations, block styles and custom CSS variables.

## Current baseline

The theme already includes:

- `theme.json` schema version 3.
- Palette groups for base, contrast, neutral, surface, brand, cta, accent, accent-two, accent-three, accent-four and status colours.
- Custom breakpoints from 1440px down to 320px.
- Custom colour groups for text, surface, border, icon, card, links, buttons, focus and effects.
- Custom typography letter spacing and font weights.
- Button spacing, shadow, animation and z-index tokens.

## Figma variable collections to map

| Figma collection | WordPress target | Priority | Notes |
|---|---|---:|---|
| Default Primitives - Colour | `settings.color.palette` | High | Confirm exact hex parity with current theme palette. |
| Tokens - Colour | `settings.custom.color` and style variations | High | Includes Default Dark and Default Light modes. |
| Theme: Typography | `settings.typography.fontFamilies`, `fontSizes`, line heights and custom typography | High | Includes body/heading families and responsive size modes. |
| Theme: Layout | `settings.layout` and `settings.custom.layout` | High | Map content, wide and full widths. |
| Theme: Spacing | `settings.spacing.spacingScale` or custom spacing tokens | High | Preserve responsive min/mid/max intent where possible. |
| Theme: Radius | Custom radius tokens and block styles | Medium | WordPress core has limited native radius token support. |
| Theme: Border | Custom border tokens and block styles | Medium | Use block styles or CSS vars. |
| Theme: Shadow | Custom shadow tokens and block styles | Medium | Keep naming stable and avoid raw values in patterns. |
| Styles: Blocks | Button/card/block-specific custom tokens | High | Drives button variants and reusable block styles. |
| Styles: Sections | Section/card/pattern custom tokens | Medium | Use for pattern styling and section classes. |

## Mapping rules

1. Do not duplicate variables with different names unless required for WordPress support.
2. Prefer semantic token names over primitive names in patterns and CSS.
3. Preserve Figma variable naming in comments or mapping docs, not necessarily in public CSS slugs.
4. Avoid raw colours in template HTML and pattern files.
5. Validate light and dark modes against contrast requirements.
6. Document any token that cannot map cleanly into theme.json.
7. Keep a rejected-token list for unused or duplicated Figma values.

## Deliverable table for implementation

| Figma token | Theme token | Target file | Status | Notes |
|---|---|---|---|---|
| `Theme/base` | `base` | `theme.json` | Existing/review | Confirm value. |
| `Theme/contrast` | `contrast` | `theme.json` | Existing/review | Confirm value. |
| `brand/500` | `brand-500` | `theme.json` | Existing/review | Used for primary brand. |
| `cta/500` | `cta-500` | `theme.json` | Existing/review | Used for primary CTA accent. |
| `Tokens - Colour / text/foreground` | `custom.color.text.default` | `theme.json` | Pending | Map per mode. |
| `button/colours/cta-solid/*` | `custom.color.button.fill/*` or block style | `theme.json` / CSS | Pending | Confirm hover/active/focus states. |
| `Theme: Typography / fontFamilies/heading` | `settings.typography.fontFamilies` | `theme.json` | Pending | Confirm font asset strategy. |
| `Theme: Typography / fontSize/*` | `settings.typography.fontSizes` | `theme.json` | Pending | Use fluid sizes where appropriate. |
| `Theme: Spacing / S-L` | `settings.spacing` or custom spacing | `theme.json` | Pending | Map min/mid/max responsive model. |
| `Theme: Radius / round` | `custom.radius.round` | `theme.json` / CSS | Pending | Needed for pill buttons/nav. |
| `Theme: Shadow / Base-*` | `custom.shadow.*` | `theme.json` | Pending | Confirm browser support for color-mix fallback. |

## QA checks

- `npm run schema:validate`
- `npm run theme:validate`
- Visual token parity check against Figma.
- Light/dark contrast checks.
- Editor style check in Site Editor.
- Frontend check across breakpoint set.


---

<!-- Source file: 02-technical-brief/block-plugin-requirements.md -->


# Block Plugin Requirements

## Purpose

Keep site-specific behaviour in `ls-plugin` while preserving a lean, theme-first architecture.

## Existing plugin responsibilities to preserve

- Custom Gutenberg blocks.
- Search filter behaviour.
- Taxonomy filter behaviour.
- Style switcher behaviour.
- Carousel block behaviour.
- SCF JSON paths and validation.
- Custom permalink handling.
- Button icon and back-to-top block variations/assets.

## Required audit before new work

| Area | Audit question | Output |
|---|---|---|
| Search filter | Does the new IA require filtering posts, insights, work or services? | Keep, modify or remove recommendation. |
| Taxonomy filter | Which taxonomies are used after IA approval? | Taxonomy map. |
| Style switcher | Is dark mode required at launch? How is preference stored? | Style switcher decision note. |
| Carousel | Which pages need a carousel, and is Swiper justified? | Usage and performance decision. |
| SCF JSON | Which custom fields/content types are active? | Field group inventory. |
| Permalinks | Which URLs/content types need custom rules? | Permalink and redirect map. |
| Button/back-to-top variations | Are variations still used in new design? | Variation usage matrix. |

## Custom block decision rule

Create a custom block only when at least one is true:

- Core blocks and patterns cannot express the required behaviour.
- The section is data-driven and needs repeatable structured attributes.
- The editor experience would be unsafe or too fragile with free-form core blocks.
- Frontend behaviour requires controlled assets or scripts.
- The block must integrate with site-specific PHP, SCF data or custom queries.

## Plugin QA commands

- `npm run plugin:validate`
- `npm run schema:validate`
- `npm run security:scan`
- `npm run lint`
- `composer run phpcs`
- `composer run phplint`

## Risks

- Moving design-only concerns into the plugin.
- Loading Swiper or other scripts globally.
- Breaking existing filters/permalinks while changing IA.
- Overbuilding custom blocks that could be patterns.
- Missing editor parity between frontend and editor.


---

<!-- Source file: 02-technical-brief/template-pattern-requirements.md -->


# Template and Pattern Requirements

## Global parts

| Part | Implementation | Acceptance criteria |
|---|---|---|
| Header | `parts/header.html` calling `ls-theme/header` pattern or direct template part markup | Desktop and mobile navigation, keyboard accessible, tokenised colours, logo variants, optional search/style switcher. |
| Footer | `parts/footer.html` calling `ls-theme/footer` pattern or direct markup | Current links mapped to new IA, legal/trust links, social/contact, responsive layout. |
| Consultation CTA | Pattern | Reusable across service, solution and insight pages; tracked CTA. |
| Newsletter CTA | Pattern | Optional launch item; tracked signup if included. |

## Page families

| Page family | Template/pattern scope | Risk |
|---|---|---:|
| Homepage | Hero, stats, service/solution pathways, featured work, insight cards, CTA | High |
| Work | Work landing, case study cards, single case study pattern | Medium-high |
| Solutions | Solutions landing and detail pages | High |
| Services | Discover, Create, Build, Launch, Grow, Evolve page families | High |
| Systems | Design systems, governance, AI-readiness and technical process content | Medium-high |
| Insights | Blog/archive/search/filter/card patterns | High |
| About | Story, credibility, community and team sections | Medium |
| Contact | Form, consultation route, support route | Medium-high |

## Pattern naming convention

Use a predictable naming scheme:

- `ls-theme/header`
- `ls-theme/footer`
- `ls-theme/cta-consultation`
- `ls-theme/home-hero`
- `ls-theme/home-proof-stats`
- `ls-theme/card-service`
- `ls-theme/card-solution`
- `ls-theme/card-insight`
- `ls-theme/section-featured-work`
- `ls-theme/section-process`

## Acceptance criteria

- Patterns use tokens, not raw visual values.
- Patterns work in editor and frontend.
- Patterns have clear names and descriptions.
- Patterns have sensible default content only where helpful.
- Fragile layout patterns have documentation or locking guidance.
- Patterns pass responsive and accessibility checks.


---

<!-- Source file: 03-task-plan/epic-map.md -->


# Epic Map

| Epic | Title | Summary | Complexity | Risk | Primary repo |
|---|---|---|---:|---:|---|
| E0 | Evidence, scope and approvals | Confirm sources, gaps, IA and approval gates before issue creation. | M | High | Cross |
| E1 | IA, content and migration | Map live IA/content to new IA, redirects and content requirements. | L | High | Cross |
| E2 | Design-system token mapping | Map Figma variables to theme.json, style variations and block styles. | L | High | ls-theme |
| E3 | Theme foundation | Build global parts, base templates, style variations and editor support. | L | High | ls-theme |
| E4 | Templates and patterns | Implement page family templates and reusable patterns. | XL | High | ls-theme |
| E5 | Plugin functionality | Audit and adapt site plugin blocks/functionality for new IA/design. | L | High | ls-plugin |
| E6 | Content and proof | Populate content, approve claims and prepare editor documentation. | M | High | Cross |
| E7 | SEO, redirects, analytics and schema | Protect search value and create measurement baseline. | L | High | Cross |
| E8 | QA and launch readiness | Validate accessibility, performance, security, responsive and launch controls. | L | High | Cross |
| E9 | Post-launch monitoring | Monitor 404s, analytics, forms, performance and editorial issues. | M | Medium | Cross |


---

<!-- Source file: 03-task-plan/task-breakdown.md -->


# Task Breakdown

## E0 - Evidence, scope and approvals

1. Confirm accessible sources and resolve evidence gaps.
2. Approve PRD and non-goals.
3. Approve complexity/risk estimates.
4. Approve issue creation plan.

## E1 - IA, content and migration

1. Crawl/export current live URL inventory.
2. Map current nav and footer links to approved new IA.
3. Define content ownership for each page family.
4. Draft redirect map.
5. Draft internal linking plan.

## E2 - Design-system token mapping

1. Export or inspect Figma variables for approved pages/components.
2. Map colour primitives and semantic tokens.
3. Map typography, layout, spacing, radius, border and shadow tokens.
4. Define light/dark mode implementation.
5. Update and validate theme.json in implementation phase.

## E3 - Theme foundation

1. Build header and footer patterns/template parts.
2. Replace basic index template with approved baseline templates.
3. Implement style variations and tokenised CSS hooks.
4. Audit functions.php and asset enqueues.
5. Add editor-facing documentation.

## E4 - Templates and patterns

1. Homepage patterns and template.
2. Solutions pages and cards.
3. Services page family patterns.
4. Systems page family patterns.
5. Work/case study patterns.
6. Insights archive and article templates.
7. About and contact patterns.
8. Responsive/editor QA per page family.

## E5 - Plugin functionality

1. Audit current plugin block/functionality inventory.
2. Validate search and taxonomy filters against new IA.
3. Validate style switcher integration.
4. Validate carousel need and performance.
5. Validate SCF JSON and permalink behaviour.
6. Update docs where behaviour changes.

## E6 - Content and proof

1. Create page content matrix.
2. Create claim register.
3. Approve proof/stat wording.
4. Populate core content.
5. Add editor pre-publication checklist.

## E7 - SEO, redirects, analytics and schema

1. Create redirect map and launch-day redirect checklist.
2. Define metadata and open graph requirements.
3. Define schema plan.
4. Define GA4/GTM events and conversion paths.
5. Validate tracking in staging.

## E8 - QA and launch readiness

1. Run repo validation commands.
2. Run Figma parity checks.
3. Run accessibility QA.
4. Run responsive QA.
5. Run performance QA.
6. Run SEO/redirect QA.
7. Run forms/conversion/analytics QA.
8. Approve go/no-go gate.

## E9 - Post-launch monitoring

1. Monitor 404s and redirects.
2. Monitor forms and conversion events.
3. Monitor performance and Core Web Vitals indicators.
4. Log editorial issues.
5. Prepare release/handoff notes.


---

<!-- Source file: 03-task-plan/dependency-map.md -->


# Dependency Map

```text
Evidence baseline
  -> PRD approval
    -> IA/content approval
      -> Redirect and schema planning
    -> Token map approval
      -> Theme foundation
        -> Templates and patterns
          -> Content population
            -> Figma parity QA
    -> Plugin audit
      -> Plugin changes/regression QA
    -> Measurement plan
      -> GTM/GA4 implementation QA
  -> Launch QA plan approval
    -> Final QA
      -> Go/no-go
        -> Launch
          -> Post-launch monitoring
```

## Critical dependencies

| Depends on | Needed before | Reason |
|---|---|---|
| Figma Make/source screenshots | Figma parity implementation | Missing visual evidence can cause rework. |
| IA approval | Redirect map and template planning | URLs and page families drive scope. |
| Token map approval | Theme implementation | Prevents hard-coded design drift. |
| Claim register | Final copy | Avoids unsupported marketing claims. |
| Dev site access | Launch QA | Browser checks require environment access. |
| Plugin audit | Template integration | Templates may depend on filters, style switching, carousel or SCF data. |


---

<!-- Source file: 03-task-plan/implementation-waves.md -->


# Implementation Waves

## Wave 0 - Evidence and approval

- Confirm source access.
- Approve PRD, non-goals and complexity/risk estimates.
- Approve issue drafts for manual creation.

Exit gate: Issues are ready to create manually, with approved labels and milestones.

## Wave 1 - IA, content and migration baseline

- Current URL inventory.
- New IA approval.
- Content matrix.
- Claim register.
- Redirect plan draft.

Exit gate: Page families and migration risk are understood.

## Wave 2 - Design-system and theme tokens

- Figma variable export/review.
- theme.json token map.
- Light/dark mode decision.
- Typography, spacing, radius, shadow and breakpoint mapping.

Exit gate: Token map approved and validation plan ready.

## Wave 3 - Theme foundation

- Header/footer/template parts.
- Base templates.
- Style variations.
- Editor styles.
- Motion/effects audit.

Exit gate: Core shell works in editor and frontend.

## Wave 4 - Patterns and page families

- Homepage.
- Solutions/services/systems.
- Work/case studies.
- Insights/blog.
- About/contact.

Exit gate: Core pages built and ready for content QA.

## Wave 5 - Plugin integration

- Search/filter integration.
- Style switcher integration.
- Carousel audit/usage.
- SCF JSON/permalink checks.
- Button/back-to-top variation checks.

Exit gate: Plugin behaviour regression-tested.

## Wave 6 - Content, SEO and measurement

- Content population.
- Metadata and schema.
- Redirects.
- GA4/GTM events.
- Internal links.

Exit gate: Launch content and measurement ready.

## Wave 7 - Final QA and launch

- Figma parity QA.
- Accessibility QA.
- Responsive QA.
- Performance QA.
- Security/code QA.
- Forms and analytics QA.
- Go/no-go approval.

Exit gate: Launch approved.

## Wave 8 - Post-launch monitoring

- 404 and redirect monitoring.
- Form and analytics monitoring.
- Performance checks.
- Editorial bug triage.
- Handoff/release notes.


---

<!-- Source file: 04-github-issues/issue-index.md -->


# GitHub Issue Draft Index

No GitHub issues have been created. These are review-ready Markdown drafts for manual creation after approval.

| ID | Title | Repo | Epic | Complexity | Risk | Draft file |
|---|---|---|---|---:|---:|---|
| 001 | Confirm scope, evidence gaps and IA baseline | Cross | E0 | M | High | issues/001-confirm-scope-evidence-and-ia.md |
| 002 | Approve PRD and acceptance criteria | Cross | E0 | S | Medium | issues/002-approve-prd-and-acceptance.md |
| 003 | Map Figma variables to theme.json | ls-theme | E2 | L | High | issues/003-map-figma-variables-to-theme-json.md |
| 004 | Complete typography, spacing, radius and shadow tokens | ls-theme | E2 | M | High | issues/004-complete-theme-token-groups.md |
| 005 | Audit and repair light/dark style variations | ls-theme | E2 | M | High | issues/005-audit-light-dark-style-variations.md |
| 006 | Build global header and navigation pattern | ls-theme | E3 | M | High | issues/006-build-header-navigation.md |
| 007 | Build footer and global CTA patterns | ls-theme | E3 | M | Medium | issues/007-build-footer-global-cta.md |
| 008 | Build homepage template and hero/proof patterns | ls-theme | E4 | L | High | issues/008-build-homepage-template.md |
| 009 | Build Solutions and Services page templates | ls-theme | E4 | L | High | issues/009-build-solutions-services-templates.md |
| 010 | Build Systems, Work, Insights and About templates | ls-theme | E4 | L | High | issues/010-build-systems-work-insights-about.md |
| 011 | Create reusable section and card patterns | ls-theme | E4 | L | Medium-high | issues/011-create-section-card-patterns.md |
| 012 | Implement responsive breakpoint rules and editor previews | ls-theme | E4 | M | High | issues/012-responsive-editor-parity.md |
| 013 | Implement motion/effects with reduced-motion fallback | ls-theme | E3 | M | High | issues/013-motion-effects-reduced-motion.md |
| 014 | Audit existing plugin functionality and block inventory | ls-plugin | E5 | M | High | issues/014-plugin-functionality-audit.md |
| 015 | Validate search, taxonomy filter and permalink behaviour | ls-plugin | E5 | M | High | issues/015-validate-search-taxonomy-permalinks.md |
| 016 | Validate style switcher and light/dark integration | ls-plugin | E5 | M | High | issues/016-style-switcher-integration.md |
| 017 | Validate carousel usage and performance budget | ls-plugin | E5 | S | Medium-high | issues/017-carousel-usage-performance.md |
| 018 | Create content migration matrix and claim register | Cross | E6 | M | High | issues/018-content-migration-claims.md |
| 019 | Create redirect, SEO, schema and analytics plan | Cross | E7 | L | High | issues/019-redirect-seo-schema-analytics.md |
| 020 | Run end-to-end QA and launch readiness | Cross | E8 | L | High | issues/020-end-to-end-qa-launch-readiness.md |

## Suggested milestones

- M0 - Evidence and approval
- M1 - Design system and architecture
- M2 - Theme foundation
- M3 - Templates and content
- M4 - QA and launch

## Suggested labels

`type:feature`, `type:qa`, `type:content`, `type:design-system`, `type:block-theme`, `type:block-plugin`, `area:theme-json`, `area:patterns`, `area:accessibility`, `area:performance`, `priority:high`, `priority:medium`.


---

<!-- Source file: 05-qa-and-launch/launch-qa-plan.md -->


# Launch QA Plan

- Value: Provide a controlled launch gate for a redesign that affects design, content, SEO, analytics and site behaviour.
- Risk: Launch risk is high until dev site access, Figma parity evidence and redirect mapping are complete.
- Next step: Convert this plan into executable QA scripts once implementation issues are approved.

## QA phases

### 1. Repository validation

Theme:
- `npm install`
- `composer install`
- `npm run schema:validate`
- `npm run theme:validate`
- `npm run patterns:escape`
- `npm run security:scan`
- `npm run lint`
- `composer run phpcs`
- `composer run lint:php`

Plugin:
- `npm install`
- `composer install`
- `npm run plugin:validate`
- `npm run schema:validate`
- `npm run security:scan`
- `npm run lint`
- `composer run phpcs`
- `composer run phplint`

### 2. Figma parity QA

- Homepage desktop/tablet/mobile.
- Header and navigation states.
- Footer and global CTAs.
- Page-family patterns.
- Button states.
- Light/dark modes.
- Motion and hover states.

### 3. Accessibility QA

- Keyboard navigation.
- Focus states.
- Contrast in light and dark modes.
- Heading structure.
- Landmark structure.
- Alt text and decorative images.
- Form labels and validation.
- Carousel controls if used.
- Reduced motion.

### 4. Responsive QA

Check widths aligned to theme breakpoints:

- 1440px
- 1280px
- 1024px
- 768px
- 640px
- 390px
- 320px

### 5. Performance QA

- Homepage performance budget.
- Core landing pages.
- Blog/insights archive.
- Contact page.
- Script loading audit.
- Carousel/Swiper conditional loading.
- GSAP/effects payload audit.
- Image dimensions and lazy loading.

### 6. Content and SEO QA

- Current URL inventory reconciled.
- Redirect map loaded and tested.
- Metadata and open graph checked.
- Internal links checked.
- Sitemap and robots checked.
- Schema output checked.
- 404 page checked.

### 7. Forms, analytics and conversion QA

- Consultation CTA clicks tracked.
- Contact form submission tracked.
- Newsletter signup tracked if included.
- GA4 realtime/debug validation.
- GTM preview validation.
- Thank-you or conversion path confirmed.

### 8. Launch-day checks

- Backups confirmed.
- DNS/hosting/cache plan confirmed.
- Redirects deployed.
- Cache purged.
- Forms tested in production.
- Analytics tested in production.
- Search Console inspection submitted for key pages.
- Post-launch monitoring started.


---

<!-- Source file: 05-qa-and-launch/acceptance-test-map.md -->


# Acceptance Test Map

| Requirement | Test | Owner role | Status |
|---|---|---|---|
| PRD approved | PRD reviewed and sign-off recorded | Product lead | Pending |
| Token map approved | Figma tokens mapped to theme.json and reviewed | Design/dev lead | Pending |
| Header navigation | Desktop/mobile/keyboard/menu states tested | QA | Pending |
| Footer | Link groups, legal/trust and CTA routes tested | QA | Pending |
| Homepage | Figma parity, CTA, stats and responsive checks complete | QA | Pending |
| Page families | Solutions, Services, Systems, Work, Insights, About and Contact tested | QA | Pending |
| Plugin functionality | Search, taxonomy filters, style switcher, carousel, SCF and permalinks regression tested | Developer/QA | Pending |
| Accessibility | WCAG 2.1 AA baseline checks complete | QA | Pending |
| Performance | Approved performance budgets met | Developer/QA | Pending |
| SEO | Redirects, metadata, sitemap and schema checked | SEO/QA | Pending |
| Analytics | GA4/GTM events validated | Analytics/QA | Pending |
| Launch gate | Go/no-go checklist approved | Product lead | Pending |


---

<!-- Source file: 05-qa-and-launch/figma-parity-checks.md -->


# Figma Parity Checks

## Required evidence before parity QA

- Approved Figma pages or screenshots for each page family.
- Figma Make prototype screenshots or node-level exports.
- Approved token map.
- Approved component-to-block map.

## Parity checklist

| Area | Checks |
|---|---|
| Layout | Widths, spacing, alignment, section rhythm, grid behaviour. |
| Colour | Light/dark mode, surfaces, text, borders, status and CTA colours. |
| Typography | Font family, size, weight, line height and heading hierarchy. |
| Components | Buttons, cards, nav, CTAs, filters, carousel, forms. |
| States | Hover, focus, active, disabled, current nav, open menu. |
| Responsive | Desktop, tablet, mobile and compact layouts. |
| Editor | Editor preview broadly matches frontend and avoids confusing layout drift. |
| Accessibility | Contrast, focus, keyboard, semantic headings and reduced motion. |

## Known parity risks

- Figma-generated code uses React/Tailwind and must be translated to WordPress patterns/theme tokens.
- Prototype pages include many sections across light/dark modes; scope must be locked.
- Motion and visual effects can drift if not tokenised or documented.
- Marketing claims in the design must be evidence-approved.


---

<!-- Source file: 05-qa-and-launch/go-no-go-gates.md -->


# Go/No-Go Gates

## Gate 1 - Planning approval

Go when:
- PRD approved.
- Open questions either answered or assigned.
- Complexity/risk accepted.
- Issue drafts approved for manual creation.

## Gate 2 - Architecture approval

Go when:
- Token map approved.
- Component-to-block map approved.
- Theme/plugin responsibility split approved.
- Branch strategy approved.

## Gate 3 - Content and migration approval

Go when:
- IA approved.
- Content matrix approved.
- Claim register approved.
- Redirect map approved.

## Gate 4 - QA entry

Go when:
- All planned implementation issues complete or explicitly deferred.
- Theme/plugin validation commands pass.
- Dev site is accessible for QA.
- Analytics and redirects are staged.

## Gate 5 - Launch approval

Go when:
- No critical accessibility failures.
- No critical SEO/redirect failures.
- No critical form/analytics failures.
- Performance is within approved budget or exceptions are signed off.
- Product lead approves launch.

## Gate 6 - Post-launch handoff

Go when:
- 404/redirect checks complete.
- Forms and analytics verified in production.
- Known issues logged and triaged.
- Release notes and support handoff complete.


---

<!-- Source file: 06-memory-bank/projectbrief.md -->


# Project Brief

## Project

LightSpeedWP.Agency redesign.

## Goal

Rebuild the LightSpeed agency website using the LightSpeedWP Figma design system, `ls-theme` block theme and `ls-plugin` site plugin.

## Key sources

- Theme repo: https://github.com/lightspeedwp/ls-theme
- Plugin repo: https://github.com/lightspeedwp/ls-plugin
- Figma design system: https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System
- Current live site: https://lightspeedwp.agency/
- Dev site: https://ls-agency.lightspeedwp.dev/

## Constraints

- No GitHub issues created until approved.
- Block-first implementation.
- theme.json-first design system.
- Minimal dependencies.
- UK English.
- Accessibility and performance are launch gates.


---

<!-- Source file: 06-memory-bank/productContext.md -->


# Product Context

## Audience

- Prospective WordPress/WooCommerce clients.
- Technical decision-makers.
- Existing clients needing support/services.
- LightSpeed editors and developers.

## Value proposition

LightSpeed designs and builds governed, scalable, accessible WordPress systems with design-system discipline and measurable outcomes.

## Core journeys

1. Prospect discovers LightSpeed and books a consultation.
2. Technical decision-maker reviews systems/work evidence.
3. Existing client finds support, hosting or improvement services.
4. Editor publishes pages using approved patterns.

## Success indicators

- Improved consultation CTA performance.
- Cleaner editorial workflow.
- Stronger technical positioning.
- Reduced design drift.
- Safer launch with redirects, analytics and QA controls.


---

<!-- Source file: 06-memory-bank/systemPatterns.md -->


# System Patterns

## Architecture patterns

- Theme owns visual system, templates, patterns and global styles.
- Plugin owns site-specific functionality and custom blocks.
- Figma variables map to theme.json tokens.
- Core blocks and patterns are preferred before custom blocks.
- Scripts and styles load conditionally where practical.

## WordPress patterns

- Header/footer as template parts backed by patterns.
- Page-family patterns for repeatable content sections.
- Query templates for insights/blog/work if content model requires.
- Block variations for button/back-to-top/style-specific behaviour where appropriate.

## Quality patterns

- Small diffs.
- Changelog updates for meaningful changes.
- Repo validation before PR review.
- QA mapped to acceptance criteria.


---

<!-- Source file: 06-memory-bank/techContext.md -->


# Tech Context

## Repositories

- `lightspeedwp/ls-theme` - WordPress block theme.
- `lightspeedwp/ls-plugin` - LightSpeed site plugin.

## Theme tooling

- PHP 8.1+
- WordPress 6.4+
- Node.js 20+
- Composer 2.x
- Sass build for authored effects CSS
- theme.json schema validation

## Plugin tooling

- PHP 8.0+
- WordPress 6.4+
- Node.js 20+
- Composer
- `@wordpress/scripts`
- block.json-based custom block registration

## Quality commands

Theme:
- `npm run schema:validate`
- `npm run theme:validate`
- `npm run patterns:escape`
- `npm run security:scan`
- `composer run phpcs`

Plugin:
- `npm run plugin:validate`
- `npm run schema:validate`
- `npm run security:scan`
- `npm run lint`
- `composer run phpcs`


---

<!-- Source file: 06-memory-bank/activeContext.md -->


# Active Context

## Current focus

Planning and approval before issue creation.

## Active decisions

- Use complexity/risk estimates first.
- Keep GitHub issues as drafts only.
- Treat `develop` as the planning baseline unless release branch is approved.
- Use Figma design system as source of design intent.

## Blockers

- Figma Make prototype access blocked.
- Dev site fetch unavailable.
- Published Figma site fetch is JS-only.
- Some theme task references need verification.

## Next actions

1. Review complexity/risk estimates.
2. Resolve evidence gaps.
3. Approve PRD.
4. Approve issue drafts for manual creation.


---

<!-- Source file: 06-memory-bank/progress.md -->


# Progress

## Completed in planning

- Skill loaded and project pack structure applied.
- Repo metadata and key files reviewed.
- Figma design system inventory reviewed.
- Live site IA/content baseline reviewed.
- Complexity/risk estimates drafted.
- PRD, technical brief, task plan, issue drafts, QA plan and memory bank drafted.

## Pending

- Figma Make visual evidence.
- Dev site browser QA access.
- Approved IA and content matrix.
- Approved token map.
- Approved issue creation.
- Implementation.
- Final launch QA.


---

<!-- Source file: 06-memory-bank/tasks/_index.md -->


# Task Index

| ID | Title | Epic | Repo | Status |
|---|---|---|---|---|
| 001 | Confirm scope, evidence gaps and IA baseline | E0 | Cross | Draft |
| 002 | Approve PRD and acceptance criteria | E0 | Cross | Draft |
| 003 | Map Figma variables to theme.json | E2 | ls-theme | Draft |
| 004 | Complete typography, spacing, radius and shadow tokens | E2 | ls-theme | Draft |
| 005 | Audit and repair light/dark style variations | E2 | ls-theme | Draft |
| 006 | Build global header and navigation pattern | E3 | ls-theme | Draft |
| 007 | Build footer and global CTA patterns | E3 | ls-theme | Draft |
| 008 | Build homepage template and hero/proof patterns | E4 | ls-theme | Draft |
| 009 | Build Solutions and Services page templates | E4 | ls-theme | Draft |
| 010 | Build Systems, Work, Insights and About templates | E4 | ls-theme | Draft |
| 011 | Create reusable section and card patterns | E4 | ls-theme | Draft |
| 012 | Implement responsive breakpoint rules and editor previews | E4 | ls-theme | Draft |
| 013 | Implement motion/effects with reduced-motion fallback | E3 | ls-theme | Draft |
| 014 | Audit existing plugin functionality and block inventory | E5 | ls-plugin | Draft |
| 015 | Validate search, taxonomy filter and permalink behaviour | E5 | ls-plugin | Draft |
| 016 | Validate style switcher and light/dark integration | E5 | ls-plugin | Draft |
| 017 | Validate carousel usage and performance budget | E5 | ls-plugin | Draft |
| 018 | Create content migration matrix and claim register | E6 | Cross | Draft |
| 019 | Create redirect, SEO, schema and analytics plan | E7 | Cross | Draft |
| 020 | Run end-to-end QA and launch readiness | E8 | Cross | Draft |


---

<!-- Source file: GITHUB-ISSUE-CREATION-GATE.md -->


# GitHub Issue Creation Gate

No issues should be created until all checklist items below are complete.

- [ ] PRD approved by Ash.
- [ ] Complexity/risk estimates reviewed.
- [ ] Source register approved.
- [ ] IA/content scope approved.
- [ ] Token map scope approved.
- [ ] Issue draft list approved.
- [ ] Labels/milestones confirmed in the target repos.
- [ ] Branch strategy confirmed.
- [ ] Any issue that depends on blocked evidence is either deferred or rewritten.

## Creation rule

Create issues manually from `04-github-issues/issues/` only after approval. Preserve issue IDs in the issue title or body so project memory remains traceable.
