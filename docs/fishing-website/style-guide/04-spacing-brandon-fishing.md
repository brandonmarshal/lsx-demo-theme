# Custom Spacing Scale  
_Brandon’s Fishing Block Theme_

---

## Guidelines for Modular Spacing and Visual Hierarchy

This spacing scale is tailored for Brandon’s fishing block theme, designed to feel natural, airy, and outdoorsy, while remaining consistent and predictable for theme.json implementation.

---

## 0. Deliverables

- Base spacing unit and modular scale.
- Named spacing tokens for UI, content, and layout.
- Small, medium, and large spacing use cases.
- Responsive spacing rules for mobile.
- theme.json partial for WordPress implementation.
- Visual examples and suggested mapping to design tools.

---

## 1. Purpose

- Create rhythm and consistency for layouts.
- Ensure a unified spacing system across all UI elements.
- Support predictable scaling across different breakpoints.

---

## 2. Base Unit & Increments

- **Base Unit:** 4px (0.25rem)
- **Increments:** Multiples of 4px, grouped in meaningful steps (8px, 16px, 24px, etc.) for real-world layouts.

---

## 3. Naming Convention

**Format:** `spacing-[token]` → `[value]`

| Token        | rem     | px    | Example Use                  |
|--------------|---------|-------|-----------------------------|
| spacing-10   | 0.25rem | 4px   | Fine adjustments, borders, icon gaps |
| spacing-20   | 0.5rem  | 8px   | Small gaps, inline elements |
| spacing-30   | 0.75rem | 12px  | Button padding, card insets |
| spacing-40   | 1rem    | 16px  | Default paragraph gap, list spacing |
| spacing-50   | 1.5rem  | 24px  | Block gaps, between form fields |
| spacing-60   | 2rem    | 32px  | Section padding, grid gutters |
| spacing-70   | 3rem    | 48px  | Major section padding, image margins |
| spacing-80   | 4rem    | 64px  | Hero sections, homepage blocks |
| spacing-90   | 5rem    | 80px  | Full-page breathing space, dividers |
| spacing-100  | 6rem    | 96px  | Top-level layout rhythm     |

---

## 4. Usage

- **Small spacing:** 4–12px (e.g., buttons, inputs, icons)
- **Medium spacing:** 16–32px (e.g., paragraph gaps, card padding, form fields)
- **Large spacing:** 48–80px (e.g., section dividers, grid gaps, major layout spacing)

---

## 5. Responsive Rules

- Reduce padding/margins on smaller screens for compact layouts.
- **Suggested breakpoints:**
  - Mobile: <768px
  - Tablet: 768–1024px
  - Desktop: >1024px
- Maintain readability while adjusting spacing proportionally.

---

## 6. Implementation

- Add to `theme.json` under `settings.spacing` for theme-wide consistency.
- Map spacing tokens to design tools (e.g., Figma variables).
- Provide fallback values for legacy support.

---

## 7. Spacing Strategy for Brandon’s Fishing Block Theme

- **Base unit:** 4px (0.25rem)
- **Scale progression:** Multiples of 4px, grouped in meaningful steps
- **Use case mapping:**
  - Small paddings/margins → 4–12px
  - Section spacing / grid gaps → 16–32px
  - Major layout spacing → 48–80px

---

## 8. Spacing Scale

| Slug         | Size (rem) | Px Equivalent | Suggested Use                      |
|--------------|------------|--------------|------------------------------------|
| spacing-10   | 0.25rem    | 4px          | Fine adjustments, borders, icon gaps|
| spacing-20   | 0.5rem     | 8px          | Small gaps, inline elements        |
| spacing-30   | 0.75rem    | 12px         | Button padding, card insets        |
| spacing-40   | 1rem       | 16px         | Default paragraph gap, list spacing|
| spacing-50   | 1.5rem     | 24px         | Block gaps, between form fields    |
| spacing-60   | 2rem       | 32px         | Section padding, grid gutters      |
| spacing-70   | 3rem       | 48px         | Major section padding, image margins|
| spacing-80   | 4rem       | 64px         | Hero sections, homepage blocks     |
| spacing-90   | 5rem       | 80px         | Full-page breathing space, dividers|
| spacing-100  | 6rem       | 96px         | Top-level layout rhythm            |

---

## 9. theme.json Partial

```json
{
  "version": 3,
  "settings": {
    "spacing": {
      "spacingScale": {
        "steps": [
          { "slug": "spacing-10", "size": "0.25rem", "name": "4px" },
          { "slug": "spacing-20", "size": "0.5rem",  "name": "8px" },
          { "slug": "spacing-30", "size": "0.75rem", "name": "12px" },
          { "slug": "spacing-40", "size": "1rem",    "name": "16px" },
          { "slug": "spacing-50", "size": "1.5rem",  "name": "24px" },
          { "slug": "spacing-60", "size": "2rem",    "name": "32px" },
          { "slug": "spacing-70", "size": "3rem",    "name": "48px" },
          { "slug": "spacing-80", "size": "4rem",    "name": "64px" },
          { "slug": "spacing-90", "size": "5rem",    "name": "80px" },
          { "slug": "spacing-100","size": "6rem",    "name": "96px" }
        ]
      }
    }
  }
}
```

---

## 10. Why This Works

- Maintains small increments for UI precision (buttons, cards).
- Scales consistently to larger layout spacing for Brandon’s fish images and story-driven templates.
- Easily mapped into design tools → theme.json → CSS variables.
- Preserves a predictable rhythm across all breakpoints.

---
