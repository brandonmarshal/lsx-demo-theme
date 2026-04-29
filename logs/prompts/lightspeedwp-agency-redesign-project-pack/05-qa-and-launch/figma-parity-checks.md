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
