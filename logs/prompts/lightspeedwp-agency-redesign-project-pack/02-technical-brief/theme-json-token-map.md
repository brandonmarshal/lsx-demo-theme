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
