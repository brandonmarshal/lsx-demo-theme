# **Brandon’s Fishing Adventures**

##  *Typography Guide*

Google Fonts typography breakdown tailored for Brandon’s Fishing Adventures site. It balances friendliness, readability, and a natural, outdoors-inspired vibe.

---

## **0\. Deliverables**

- [ ] **Primary heading font (Google Font):** Montserrat

- [ ] **Body text font (Google Font):** Lora

- [ ] **UI/Caption font (Google Font):** Open Sans

**Font weights & responsive scale:**

- [ ] Montserrat: 600 (Semi-Bold), 700 (Bold)

- [ ] Lora: 400 (Regular), 400 Italic

- [ ] Open Sans: 400 (Regular), 600 (Semi-Bold)

- [ ] Scale method: Fluid clamp scale

**Line-height rules:**

- [ ] Body: 1.6

- [ ] Headings: 1.3

**theme.json typography setup:** see Section 6

---

## **1\. Headings (H1–H3)**

* **Font:** Montserrat (Bold 700 / Semi-Bold 600\)

* **Tone/feel:** Clean, geometric, approachable, adventurous

* **Best for:** Headlines like *“Smallmouth Yellowfish”* or *“Fishing Adventures in KZN”*

* **Brand fit:** Adds professionalism while keeping the outdoor adventure feel

* **Alternative:** Raleway (slightly more elegant, softer personality)

* **System fallback stack:** `"Montserrat", system-ui, sans-serif`

---

## **2\. Body Text (Paragraphs, Blog Content)**

* **Font:** Lora (Regular 400 / Italic 400\)

* **Tone/feel:** Warm, humanist, storytelling, natural

* **Best for:** Blog articles, fishing stories, longer content

* **Italics usage:** Anecdotes, fish species names, quotes

* **Alternative:** Merriweather (darker tone, very readable on screen)

* **System fallback stack:** `"Lora", Georgia, serif`

---

## **3\. Navigation, Captions, Microcopy**

* **Font:** Open Sans (Regular 400 / Medium 600\)

* **Use in:** Menus, buttons, forms, labels, captions

* **Why:** Neutral and highly legible, balances Montserrat and Lora

* **Alternative:** Work Sans (friendlier, slightly more rounded)

* **System fallback stack:** `"Open Sans", system-ui, sans-serif`

---

## **4\. Hierarchy in Use**

* **H1:** Montserrat Bold, clamp(2.25rem → 3rem), line-height 1.3

* **H2/H3:** Montserrat Semi-Bold, clamp(1.5rem → 2rem), line-height 1.3

* **Body:** Lora Regular, clamp(1rem → 1.125rem), line-height 1.6

* **Captions/Buttons/Forms:** Open Sans Medium, clamp(0.875rem → 1rem), transform: UPPERCASE

**Responsive notes:**

* Headings scale fluidly with clamp() between 320px and 1440px

* Slightly reduce letter-spacing at larger sizes

* Maintain minimum tap target size (44px) for buttons and inputs

---

## **5\. Pairing Justification**

* **Montserrat** gives confident, adventurous headlines

* **Lora** ensures warmth and readability for fishing stories and blogs

* **Open Sans** keeps UI clean, consistent, and accessible

* **Performance:** Load 2–3 weights per family, use `display=swap`, Latin subset only

---

## **6\. theme.json – Typography Section**

| {  "$schema": "https://schemas.wp.org/wp/6.8/block.json",  "version": 3,  "settings": {    "typography": {      "fontFamilies": \[        {          "fontFamily": "'Montserrat', sans-serif",          "slug": "montserrat",          "name": "Montserrat"        },        {          "fontFamily": "'Lora', serif",          "slug": "lora",          "name": "Lora"        },        {          "fontFamily": "'Open Sans', sans-serif",          "slug": "open-sans",          "name": "Open Sans"        }      \],      "fontSizes": \[        { "slug": "font-size-100", "size": "clamp(0.75rem, 0.7rem \+ 0.25vw, 0.875rem)", "name": "Tiny" },        { "slug": "font-size-200", "size": "clamp(1rem, 0.95rem \+ 0.25vw, 1.125rem)",  "name": "Base" },        { "slug": "font-size-300", "size": "clamp(1.25rem, 1.15rem \+ 0.35vw, 1.5rem)", "name": "Small" },        { "slug": "font-size-400", "size": "clamp(1.5rem, 1.4rem \+ 0.5vw, 2rem)",      "name": "Medium" },        { "slug": "font-size-500", "size": "clamp(2rem, 1.8rem \+ 0.6vw, 2.5rem)",      "name": "Large" },        { "slug": "font-size-600", "size": "clamp(2.5rem, 2.3rem \+ 0.7vw, 3rem)",      "name": "X-Large" },        { "slug": "font-size-700", "size": "clamp(3rem, 2.6rem \+ 0.9vw, 3.5rem)",      "name": "Huge" },        { "slug": "font-size-800", "size": "clamp(4rem, 3.2rem \+ 1vw, 4.5rem)",        "name": "Gigantic" },        { "slug": "font-size-900", "size": "clamp(5rem, 4rem \+ 1.5vw, 6rem)",          "name": "Colossal" }      \],      "lineHeight": true,      "dropCap": false    },    "styles": {      "typography": {        "fontFamily": "var(--wp--preset--font-family--lora)",        "fontSize": "var(--wp--preset--font-size--font-size-200)",        "lineHeight": "1.6"      },      "elements": {        "heading": {          "typography": {            "fontFamily": "var(--wp--preset--font-family--montserrat)",            "fontWeight": "700",            "lineHeight": "1.3"          }        },        "button": {          "typography": {            "fontFamily": "var(--wp--preset--font-family--open-sans)",            "fontWeight": "600",            "textTransform": "uppercase",            "fontSize": "var(--wp--preset--font-size--font-size-200)"          }        },        "caption": {          "typography": {            "fontFamily": "var(--wp--preset--font-family--open-sans)",            "fontSize": "var(--wp--preset--font-size--font-size-100)"          }        }      }    }  }} |
| :---- |

---

## **7\. Key Points**

* **Fonts:** Montserrat (headings), Lora (body), Open Sans (UI)

* **Font sizes:** fluid numeric scale 100–900

* **Defaults:** Body \= Lora, base \= 1rem (16px)

* **Headings:** Montserrat Bold, line-height 1.3

* **Buttons/Captions:** Open Sans Medium, compact and clear

* **Accessibility:** Maintain AA contrast, min tap targets, clear focus styles

---

## **8\. Typography Specimen Sheet Example**

* **H1 – Montserrat Bold** → “Fishing Adventures in KZN”

* **H2 – Montserrat Semi-Bold** → “Smallmouth Yellowfish”

* **Body – Lora Regular** → “Brandon shares his fishing experiences across rivers and coasts…”

* **Caption/Button – Open Sans Medium (uppercase)** → “Book Now”

---

