# **Custom Spacing Scale**

## *Brandon’s Fishing Block Theme*

**Guidelines for modular spacing and visual hierarchy**  
This spacing scale is tailored for **Brandon’s Fishing Block Theme**, designed to feel **natural, airy, and outdoorsy**, while remaining consistent and predictable for **theme.json** implementation. It ensures that spacing across pages—especially those highlighting fish species such as *Largemouth Bass*, *Smallmouth Bass*, and other featured catches—feels balanced and rhythmically aligned with the visual tone of the brand.

---

### **0\. Deliverables**

- [ ] Base spacing unit and modular scale.

- [ ] Named spacing tokens for UI, content, and layout.

- [ ] Small, medium, and large spacing use cases.

- [ ] Responsive spacing rules for mobile.

- [ ] `theme.json` partial for WordPress implementation.

- [ ] Visual examples and suggested mapping to design tools.

---

### **1\. Purpose**

The purpose of this custom spacing system is to:

* Create rhythm and consistency for all layouts.

* Ensure a unified spacing system across all UI elements.

* Support predictable scaling across different breakpoints.

* Enhance the natural, open layout style that matches Brandon’s fishing stories and imagery—especially the visual rhythm between fish species like *Largemouth Bass*, *Smallmouth Bass*, and *Tigerfish* photography sections.

---

### **2\. Base Unit & Increments**

**Base Unit:** 4px (0.25rem)  
**Increments:** Multiples of 4px, grouped in meaningful steps (8px, 16px, 24px, etc.) for real-world layouts.

This scale provides precise control for UI components while maintaining natural proportions for image-heavy layouts, such as fish guides and story sections.

---

### **3\. Naming Convention**

**Format:** `spacing-[token] → [value]`

**Examples:**

* spacing-10 → 0.25rem / 4px

* spacing-20 → 0.5rem / 8px

* spacing-30 → 0.75rem / 12px

* spacing-40 → 1rem / 16px

* spacing-50 → 1.5rem / 24px

* spacing-60 → 2rem / 32px

* spacing-70 → 3rem / 48px

* spacing-80 → 4rem / 64px

* spacing-90 → 5rem / 80px

* spacing-100 → 6rem / 96px

This naming convention aligns seamlessly with **theme.json** for WordPress and can be referenced directly in CSS variables or design tokens.

---

### **4\. Usage**

**Small Spacing:** 4–12px  
 Use for micro-interactions—buttons, input padding, or inline elements such as icons beside species names (*e.g.*, “Largemouth Bass 🎣”).

**Medium Spacing:** 16–32px  
 Use for paragraph gaps, card padding, or spacing between fish profile components in the CPT layout.

**Large Spacing:** 48–80px  
 Use for full section dividers, image blocks, or spacious layout zones around major visuals (like *Smallmouth Bass* hero images or gallery sections).

---

### **5\. Responsive Rules**

Spacing adapts proportionally to maintain usability across devices.  
 **Suggested Breakpoints:**

* **Mobile:** \<768px

* **Tablet:** 768–1024px

* **Desktop:** \>1024px

**Guidelines:**

* Reduce padding/margins on mobile for compact layouts.

* Maintain visual balance between fish images and story text.

* Preserve breathing space around highlighted species (e.g., Bass or Tigerfish) for clear focus on visuals.

---

### **6\. Implementation**

* Add the scale to **theme.json** under `settings.spacing` for global consistency.

* Map spacing tokens to design tools (e.g., **Figma variables**) for cross-platform parity.

* Provide fallback values for legacy support in non-JSON themes.

* Use consistent spacing classes in template parts such as header, gallery, and fish species blocks.

---

### **7\. Spacing Strategy for Brandon’s Fishing Block Theme**

**Base Unit:** 4px (0.25rem)  
 **Scale Progression:** Multiples of 4px, grouped in meaningful steps

**Use Case Mapping:**

* Small paddings/margins → 4–12px

* Section spacing / grid gaps → 16–32px

* Major layout spacing → 48–80px

This strategy ensures consistency across all theme sections—blog posts, gallery blocks, and species guides—while maintaining a visual rhythm inspired by the movement and flow of rivers where *Largemouth Bass* and *Smallmouth Bass* thrive.

---

### **8\. Spacing Scale**

| Slug | Size (rem) | Px Equivalent | Suggested Use |
| ----- | ----- | ----- | ----- |
| spacing-10 | 0.25rem | 4px | Fine adjustments, borders, icon gaps |
| spacing-20 | 0.5rem | 8px | Small gaps, inline elements |
| spacing-30 | 0.75rem | 12px | Button padding, card insets |
| spacing-40 | 1rem | 16px | Default paragraph gap, list spacing |
| spacing-50 | 1.5rem | 24px | Block gaps, between form fields |
| spacing-60 | 2rem | 32px | Section padding, grid gutters |
| spacing-70 | 3rem | 48px | Major section padding, image margins |
| spacing-80 | 4rem | 64px | Hero sections, homepage blocks |
| spacing-90 | 5rem | 80px | Full-page breathing space, dividers |
| spacing-100 | 6rem | 96px | Top-level layout rhythm |

---

### **9\. theme.json Partial**

| {  "version": 3,  "settings": {    "spacing": {      "spacingScale": {        "steps": \[          { "slug": "spacing-10",  "size": "0.25rem", "name": "4px" },          { "slug": "spacing-20",  "size": "0.5rem",  "name": "8px" },          { "slug": "spacing-30",  "size": "0.75rem", "name": "12px" },          { "slug": "spacing-40",  "size": "1rem",    "name": "16px" },          { "slug": "spacing-50",  "size": "1.5rem",  "name": "24px" },          { "slug": "spacing-60",  "size": "2rem",    "name": "32px" },          { "slug": "spacing-70",  "size": "3rem",    "name": "48px" },          { "slug": "spacing-80",  "size": "4rem",    "name": "64px" },          { "slug": "spacing-90",  "size": "5rem",    "name": "80px" },          { "slug": "spacing-100", "size": "6rem",    "name": "96px" }        \]      }    }  }} |
| :---- |

---

### **10\. Why This Works**

* Maintains small increments for UI precision (buttons, cards).

* Scales consistently to larger layout spacing for Brandon’s fish images and story-driven templates.

* Supports natural rhythm and flow—mirroring the aesthetic of river environments and featured fish like *Largemouth Bass* and *Smallmouth Bass*.

* Easily mapped into design tools → `theme.json` → CSS variables.

* Preserves predictable rhythm across all breakpoints and devices.

---

