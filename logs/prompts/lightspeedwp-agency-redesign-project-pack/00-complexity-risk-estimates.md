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
