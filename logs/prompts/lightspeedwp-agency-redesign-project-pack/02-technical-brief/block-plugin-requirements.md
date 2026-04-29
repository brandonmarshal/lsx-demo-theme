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
