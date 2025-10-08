# **Brand Guide (One‑Pager)**

## *Brandon’s Fishing Adventures*

**Use:** Copy this into your AI tool, replace placeholders in {{ALL\_CAPS}} only if necessary, and run. Prioritise clarity, accessibility (WCAG 2.2 AA), and consistency across design, development, and content.

---

## **Instruction Block (keep in the prompt)**

You are a brand designer and content strategist. Produce a **one-page brand guide** for **Brandon’s Fishing Adventures** that anyone can follow. Use **en‑GB / ZA English**.  
 Constraints:

* Length: \~1 printed page (tight bullets, no fluff).

* Include concrete, testable rules (not opinions).

* Provide values as tokens where noted (for theme.json / CSS variables).

* If an input is missing: propose 2–3 sensible options and label clearly.

---

## **Inputs (filled for AI)**

* Brand: Brandon’s Fishing Adventures

* One‑liner / Value prop: “Stories from the river, catches for a lifetime.”

* Industry / Category: Fishing / Outdoor Adventure

* Primary Audience(s): Hobbyist anglers, adventure seekers, local KZN visitors

* Brand Personality (3–5 adjectives): Friendly, warm, adventurous, authentic, human

* Competitive references: Shimano, Rapala, local KZN fishing guides

* Existing assets: Logo concepts, colours, typography (from content above)

* Language & locale: en‑GB, ZA

* Platforms / Touchpoints: Website (block theme)

* Accessibility target: WCAG 2.2 AA

* File export needs: SVG, PNG, PDF, ICO, Apple Touch Icon

---

## **0\. Deliverables**

- [ ] Full logo set: primary, secondary, icon

- [ ] Tagline \+ usage rules

- [ ] Colour palette with HEX/HSL/CMYK \+ contrast notes

- [ ] Typography hierarchy \+ scale (rem) \+ fallbacks

- [ ] Imagery & style direction \+ do/don’t

- [ ] Voice, tone, and microcopy patterns

- [ ] SEO basics checklist for ZA English variant

- [ ] Token pack: theme.json keys and CSS variables

---

## **1\. Logos**

* **Primary Logo:** Wordmark \+ fish illustration \+ tagline

* **Secondary Logo:** Wordmark \+ fish illustration (no tagline)

* **Icon / Mark:** Fish illustration only (favicon/social)

* **Tagline:** “Stories from the river, catches for a lifetime.”

**Usage Rules:**

* Clear space \= height of the “B” in Brandon’s

* Minimum size: 24px (web) / 15mm (print)

* Don’t stretch, skew, or place over busy backgrounds

* Ensure contrast ≥ 4.5:1

**File Exports:**

* Light / Dark variants × with & without tagline

* Icon-only variant

* Favicon: 16/32px \+ Apple Touch 180px

---

## **2\. Colours**

**Nature-inspired palette (Huttenspruit / KZN):**

| Role | Colour | HEX | Use |
| ----- | ----- | ----- | ----- |
| Primary | River Blue/Green | \#3A6B68 | Headings, accents |
| Secondary | Olive Green | \#6B7C3A | Buttons, hover states |
| Neutral | Warm Grey/Sand | \#D9D3C7 | Backgrounds |
| Accent | Burnt Orange | \#C06028 | CTAs, highlights |
| White | Neutral | \#FFFFFF | Text backgrounds, clarity |

**Accessibility & Usage:**

* Primary on white: contrast ≥ 7:1 (body), ≥ 4.5:1 (UI)

* Button states: Default / Hover / Active / Disabled (define tokens)

**Tokens (examples):**

| :root {  \--color\-primary: \#3A6B68;  \--color\-secondary: \#6B7C3A;  \--color\-accent: \#C06028;  \--color\-neutral: \#D9D3C7;  \--color\-white: \#FFFFFF;}// theme.json (WP){  "settings": {    "color": {      "palette": \[        { "slug": "brand-primary", "color": "\#3A6B68", "name": "Primary" },        { "slug": "brand-secondary", "color": "\#6B7C3A", "name": "Secondary" },        { "slug": "brand-accent", "color": "\#C06028", "name": "Accent" },        { "slug": "brand-neutral", "color": "\#D9D3C7", "name": "Neutral" }      \]    }  }} |
| :---- |

---

## **3\. Typography**

* **Headings:** Bold sans-serif – Montserrat / Inter

* **Body Copy:** Warm serif – Lora / Merriweather

* **Accent / Notes:** Light sans-serif – Open Sans

**Scale & Rules:**

* H1 3rem / H2 2.25rem / H3 1.75rem / Body 1rem / Small 0.875rem

* Line-height: 1.3–1.6, Paragraph spacing: 0.5–1em

* Headlines: value \+ verb, no filler

* Body: short, plain sentences (8–18 words)

**Tokens:**

:root {  
  \--font-headings: "Montserrat, Inter, sans-serif";  
  \--font-body: "Lora, Merriweather, serif";  
  \--size-h1: 3rem;  
  \--size-body: 1rem;  
}

---

## **4\. Imagery & Style**

* **Photography:** Real fishing shots, rivers, fish close-ups, KZN landscapes

* **Tone:** Natural, adventurous, human

* **Layout:** Clean grids, white/neutral backdrops, 12px rounded corners on cards

* **Icons:** Simple line icons (fish, hooks, maps, pins)

**Do / Don’t:**

* Do: keep consistent colour palette, use white space, focus on subject

* Don’t: use stock images of generic fishing, cluttered backgrounds, low-res images

**Rights:** Confirm licensing & attribution (in-house or stock)

---

## **5\. Voice & Tone**

* **Voice:** Friendly, personal, human, warm

* **Tone by Page:**

  * Homepage: energetic, passionate

  * About: personal storytelling, reflective

  * Fish pages: informative, visual, guide-like

  * Blog: conversational, story-driven

  * Contact: simple, approachable

**Style Rules:**

* Oxford comma: yes

* Contractions: allowed

* Reading level: Year 8–9

---

## **6\. Microcopy Patterns**

* **Forms:** “Enter your email”, “Send your message”

* **Validation:** “Email is missing ‘@’. Add it to continue.”

* **Success:** “Thanks\! Brandon will get back to you soon.”

* **Empty states:** “No items yet — add your first {{ITEM}}.”

* **CTAs:** “Get started”, “Book a demo”, “See pricing”

---

## **7\. SEO Basics (for ZA English)**

* Human-first writing

* Descriptive slugs: /fish/smallmouth-yellowfish/

* Title: 50–60 chars; meta description: 140–160 chars

* Alt text for every image (describe what & why)

* Internal linking: Blog ↔ Fish pages; use descriptive anchor text

* Headings: one H1 per page; logical H2–H3 hierarchy

* Performance: image compression, lazy-load, WebP, core vitals tracked

---

## **Handoff Checklist**

* Asset pack: logos, colour tokens, type tokens

* theme.json snippet for colours & typography (WordPress)

* CSS variables list

* Favicon & touch icons

* Accessibility note with contrast table

* Version & date: v1.0 – {{YYYY‑MM‑DD}}

---

