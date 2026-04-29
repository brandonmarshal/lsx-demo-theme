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
