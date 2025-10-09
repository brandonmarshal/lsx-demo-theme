# **Brandon’s Fishing Adventures – Style Guide**

**How to use:** Replace bracketed or optional fields (e.g., logo upload) as needed. This guide covers colours, typography, layout, logo, dark theme, and voice & tone.

---

## **0\. Deliverables**

**Fields to fill**

- [ ] **Brand:** Brandon’s Fishing Adventures

- [ ] **Tagline:** *“Catch the story. Relive the moment.”*

- [ ] **Point of contact:** Brandon

- [ ] **Version:** V1.0 — 2025‑10‑03

- [ ] **Repository/Folder link:** \[URL\] (optional)

**Prompts**

* “List all output assets required for Brandon’s Fishing Adventures across print, web, and app, with file formats and min sizes. Include a checklist and acceptance criteria.”

* “Write logo usage rules (clear space, min logo size in px/mm, incorrect usage examples) for a minimalist outdoor brand.”

---

## **1\. Colours**

| Role | Name | HEX | RGB | CMYK | Use | Contrast/Notes |
| ----- | ----- | ----- | ----- | ----- | ----- | ----- |
| Primary | River/Water | \#1B4F72 | 27,79,114 | 76,31,0,55 | Headings, key accents | AA vs white |
| Secondary | Rocks/Sand | \#C2B280 | 194,178,128 | 0,8,34,24 | Backgrounds, dividers | AA vs black |
| Accent | Vegetation | \#556B2F | 85,107,47 | 20,0,56,58 | Secondary accents, hover states | AA vs white |
| Highlight | Sunset/Adventure | \#D35400 | 211,84,0 | 0,60,100,17 | CTA buttons, notifications | AAA vs white |
| Neutral Scale | N0–N900 | \#FFFFFF → \#1A1A1A | — | — | Backgrounds, text, UI | Use for tonal hierarchy |

**Optional Gradients:**

* River Gradient: \#1B4F72 → \#5DADE2

* Sunset Gradient: \#D35400 → \#F39C12

**Tokens for code:**

\--color-primary: \#1B4F72;  
\--color-secondary: \#C2B280;  
\--color-accent: \#556B2F;  
\--color-highlight: \#D35400;  
\--color-neutral-0: \#FFFFFF;  
\--color-neutral-900: \#1A1A1A;

**How to gather inputs:**

* Derived from Huttenspruit/KZN environment: rivers, rocks, vegetation, sunsets.

* WCAG contrast validated: ≥ 4.5:1 for body text.

**Prompts:**

* “From these image refs \[attach\], propose a 4‑colour palette \+ neutrals. Return HEX, RGB, CMYK, names, and usage notes.”

* “Suggest hover/focus states for primary and CTA colours with 10% and 20% luminance shifts.”

---

## **2\. Typography**

| Role | Font | Weight | Style/Use | Fallback Stack |
| ----- | ----- | ----- | ----- | ----- |
| Headings | Montserrat | 700 Bold / 600 Semi-Bold | Clean, geometric, modern; H1–H3 | "Montserrat", system-ui, sans-serif |
| Body | Lora | 400 Regular / Italic | Humanist serif; comfortable long-form reading | "Lora", Georgia, serif |
| Quotes/Accents | Lora Italic | 400 Italic | Storytelling, species names, anecdotes | "Lora", Georgia, serif |
| UI / Buttons / Captions | Open Sans | 400 Regular / 600 Medium | Menus, forms, microcopy | "Open Sans", system-ui, sans-serif |

**Type Scale (fluid clamp):**

* Base: 16px

* H1: clamp(2.25rem, 5vw, 3rem)

* H2: clamp(1.5rem, 3.5vw, 2rem)

* H3: clamp(1.25rem, 3vw, 1.5rem)

* Paragraph: clamp(1rem, 2.5vw, 1.125rem)

* Small / caption: clamp(0.875rem, 2vw, 1rem)

**Line lengths:** 60–75 characters  
 **Line height:** 1.6 (body), 1.3 (headings)

**Prompts:**

* “Recommend two font families for an outdoor brand that feels adventurous and warm. Include reasons, licensing notes, and CSS fallback stacks.”

* “Generate a modular type scale at base 16 px with ratio 1.25. Output H1–H6, paragraph, small, with rem values.”

---

## **3\. Style & Layout**

**Imagery:**

* Full-width, high-quality fishing/adventure photos.

* Mix action shots (Brandon fishing) \+ close-ups (fish species).

* Subtle contrast, natural tones.

**Shapes:** subtle rounded corners (8–12px), avoid hard tech-like lines.

**Grid:** 12 columns; gutter 16–24px; max width 1200–1440px

**Spacing scale:** 4 / 8 / 12 / 16 / 24 / 32 / 48 / 64

**Icons:** line-based; 1.5px stroke; themes: fish, waves, location markers

**Cards (Species/Content):** photo, short description, location; meta tags; CTA: View details

**CTAs:** primary style: filled highlight (\#D35400); hover/focus: \+10–15% luminance

**Prompts:**

* “Define a responsive grid and spacing system for an outdoor brand website. Include max widths, gutters, breakpoints, and example CSS variables.”

* “Write component guidelines for a Species card with accessibility notes.”

---

## **4\. Logo & Branding**

* **Primary logo:** \[Symbol \+ Wordmark\]

* **Secondary logo:** \[Symbol only\]

* **Tagline lockup:** “Catch the story. Relive the moment.” (below or right of logo)

* **Monochrome/Reverse:** Yes

* **Clear space:** X \= cap height

* **Min size:** screen: 32px; print: 10mm

* **Incorrect usage:** no stretching, no drop shadows, no colour swaps

**Prompts:**

* “Draft logo usage rules for Brandon’s Fishing Adventures with clear space, min sizes, and misuse examples.”

---

## **5\. Dark Theme Version**

| Element | Colour | HEX | Notes |
| ----- | ----- | ----- | ----- |
| Background | Deep navy | \#0B1A2B | Footers, cards |
| Text | Warm beige | \#F5F5DC | Contrast AA/AAA vs background |
| Illustration/Accent | Vegetation | \#556B2F | Highlighted elements |
| CTA/Tagline | Burnt orange | \#D35400 | Buttons, notifications |
| Logo (dark) | Inverted/light version | \[PATH\] | For dark backgrounds |

**Prompts:**

* “Create dark theme colour tokens from this light palette. Ensure contrast passes for body/small text and propose hover/focus states.”

---

## **6\. Voice & Tone**

* **Audience:** anglers, travellers, conservationists

* **Personality:** friendly, warm, grounded, adventurous

* **Regional cues:** Huttenspruit / KwaZulu-Natal outdoors

* **Do:** plain language, active verbs, sensory details

* **Don’t:** jargon, over-selling, hype

**Sample Microcopy:**

* Buttons: *Explore the river*, *View species*

* Empty states: *No species found…*

**Prompts:**

* “Write a voice & tone guide for Brandon’s Fishing Adventures that is friendly, grounded in KwaZulu-Natal, and adventure-driven. Include do/don’t and example microcopy.”

* “Generate 10 tagline options that evoke adventurous warmth without clichés; limit to 5 words each.”

---

## **Optional: WordPress / Theme Mapping**

{  
  "version": 2,  
  "settings": {  
    "color": {  
      "palette": \[  
        {"name": "Primary", "slug": "primary", "color": "\#1B4F72"},  
        {"name": "Accent", "slug": "accent", "color": "\#556B2F"},  
        {"name": "Highlight", "slug": "highlight", "color": "\#D35400"}  
      \]  
    },  
    "typography": {  
      "fontFamilies": \[  
        {"fontFamily": "Montserrat, system-ui, sans-serif", "slug": "heading"},  
        {"fontFamily": "Lora, Georgia, serif", "slug": "body"},  
        {"fontFamily": "Open Sans, system-ui, sans-serif", "slug": "ui"}  
      \],  
      "fontSizes": \[  
        {"slug": "base", "size": "16px"},  
        {"slug": "h1", "size": "clamp(2.25rem,5vw,3rem)"}  
      \]  
    }  
  }  
}

---

## **Acceptance Criteria (for sign‑off)**

* Palette documented with HEX/RGB/CMYK and WCAG contrast notes

* Font families chosen with licenses \+ fallbacks; scale defined

* Grid, spacing, and core components documented

* Logo variants exported and usage rules finalized

* Dark theme tokens \+ logo variant validated for contrast

* Voice & tone with examples and taglines approved

---

