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
