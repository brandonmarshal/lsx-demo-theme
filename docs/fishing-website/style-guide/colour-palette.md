# **Colour Palette**

## *Brandon’s Fishing Block Theme*

**Colour choices for recognisable and consistent branding.**  
This palette is designed for a **block theme**, using **semantic tokens aligned with WordPress theme.json**.  
It ensures colour consistency across all layouts and components, supporting light/dark adaptability and accessibility.

The palette evokes the **outdoorsy, natural tone** of Brandon’s Fishing Adventures — inspired by **river waters, wet rocks, weathered wood, and warm sunlight** — creating a balanced aesthetic for showcasing species like *Largemouth Bass* and *Smallmouth Bass*.

---

### **0\. Deliverables**

- [ ] Core semantic colour palette (primary, contrast, neutral, background).

- [ ] Neutral scale for UI, backgrounds, and text contrast.

- [ ] Accent scales for brand identity and call-to-action highlights.

- [ ] `theme.json` partial for WordPress integration.

- [ ] Accessibility and contrast guidance for consistent legibility.

- [ ] Optional future extension: dark mode adaptation.

---

### **1\. Purpose**

The purpose of this palette is to:

* Define a **consistent brand colour system** for all UI and content elements.

* Maintain harmony between **photography, story blocks**, and **species highlights**.

* Reflect the **natural textures and tones** found in fishing environments (river greens, muddy olives, weathered greys, and sunlit oranges).

* Ensure contrast ratios meet **AA/AAA standards** for accessibility.

* Enable predictable scaling across **light and dark backgrounds**.

**Implementation Path:**  
 `theme.json → settings.color.palette → CSS variables → component usage.`

---

### **2\. Core Semantic Palette**

| Token | Name | HEX | Description |
| ----- | ----- | ----- | ----- |
| **Base** | Background | `#FFFFFF` | Clean surface for layouts and text readability. |
| **Contrast** | Text | `#111111` | Primary text colour for clear contrast on light backgrounds. |
| **Primary** | Brand / CTA | `#3A6B68` | Signature River Blue-Green tone symbolising calm waters and reliability. |

*These form the foundation for all UI and brand styling — from hero sections to navigation and CTAs across Brandon’s Fishing Adventures.*

---

### **3\. Neutral Scale (UI, backgrounds, text contrast)**

*(Used for UI structure, backgrounds, and content readability.)*

| Token | HEX | Description |
| ----- | ----- | ----- |
| neutral-0 | `#FFFFFF` | White — pure background. |
| neutral-100 | `#F9FAF9` | Very light warm grey — base surface tone. |
| neutral-200 | `#EAEDE9` | Soft stone — subtle background. |
| neutral-300 | `#D9D3C7` | Sand grey — natural UI divider tone. |
| neutral-400 | `#BFB9AD` | Muted khaki — soft neutral element. |
| neutral-500 | `#9CA3AF` | Standard grey — placeholder text, icons. |
| neutral-600 | `#6B7280` | Charcoal grey — body text. |
| neutral-700 | `#4B5563` | Dark slate — section dividers. |
| neutral-800 | `#1F2937` | Deep charcoal — darker UI backgrounds. |
| neutral-900 | `#111111` | Black — strongest text contrast. |

These neutrals provide a grounded base for the theme — reminiscent of **stone riverbeds, sand, and fishing gear**, ensuring a calm, nature-inspired feel.

---

### **4\. Accent Scale (Brand Hues)**

*(Derived from Brandon’s brand hues — river blue, olive green, burnt orange.)*

#### **Accent Set A — River Blue-Green Band**

Used for **primary branding**, link accents, and interactive states.

| Token | HEX | Description |
| ----- | ----- | ----- |
| accent-100 | `#E6F2F1` | Lightest river tint. |
| accent-200 | `#B3D3D1` | Gentle water reflection tone. |
| accent-300 | `#80B4B0` | Mid tint — hover and subtle emphasis. |
| accent-400 | `#4D9590` | Stronger accent for links/buttons. |
| accent-500 | `#3A6B68` | Core brand colour — “River Blue-Green.” |

#### **Accent Set B — Olive Green Band**

Represents **nature, stability, and environment**, often used for secondary components, borders, or background accents in fish species cards.

| Token | HEX | Description |
| ----- | ----- | ----- |
| accent-600 | `#E8EDE0` | Light olive tint. |
| accent-700 | `#C5CFAC` | Mossy mid tone. |
| accent-800 | `#A2B178` | Olive highlight. |
| accent-900 | `#6B7C3A` | Deep olive — secondary emphasis. |

#### **Accent Set C — Burnt Orange Band**

Used for **calls to action**, highlights, and warmth.  
 It reflects **evening sunlight over water**, tying into outdoor adventure storytelling.

| Token | HEX | Description |
| ----- | ----- | ----- |
| accent-1000 | `#FBEDE6` | Lightest sunlit tint. |
| accent-1100 | `#F3C6A6` | Warm amber tone. |
| accent-1200 | `#E58F5C` | Strong burnt orange accent — hover/active CTA. |
| accent-1300 | `#C06028` | Deep sunset hue — boldest CTA or brand mark. |

Together, these accent bands evoke the **river-to-shore palette** that defines Brandon’s brand — **calm waters, mossy greens, and golden light**, perfect for immersive visuals of fish species like *Largemouth Bass* and *Smallmouth Bass*.

---

### **5\. Example theme.json Partial** 

| {  "version": 3,  "settings": {    "color": {      "defaultPalette": false,      "palette": \[        { "slug": "base", "name": "Base", "color": "\#FFFFFF" },        { "slug": "contrast", "name": "Contrast", "color": "\#111111" },        { "slug": "primary", "name": "Primary", "color": "\#3A6B68" },        { "slug": "neutral-0", "name": "Neutral 0", "color": "\#FFFFFF" },        { "slug": "neutral-100", "name": "Neutral 100", "color": "\#F9FAF9" },        { "slug": "neutral-200", "name": "Neutral 200", "color": "\#EAEDE9" },        { "slug": "neutral-300", "name": "Neutral 300", "color": "\#D9D3C7" },        { "slug": "neutral-400", "name": "Neutral 400", "color": "\#BFB9AD" },        { "slug": "neutral-500", "name": "Neutral 500", "color": "\#9CA3AF" },        { "slug": "neutral-600", "name": "Neutral 600", "color": "\#6B7280" },        { "slug": "neutral-700", "name": "Neutral 700", "color": "\#4B5563" },        { "slug": "neutral-800", "name": "Neutral 800", "color": "\#1F2937" },        { "slug": "neutral-900", "name": "Neutral 900", "color": "\#111111" },        { "slug": "accent-100", "name": "River 100", "color": "\#E6F2F1" },        { "slug": "accent-200", "name": "River 200", "color": "\#B3D3D1" },        { "slug": "accent-300", "name": "River 300", "color": "\#80B4B0" },        { "slug": "accent-400", "name": "River 400", "color": "\#4D9590" },        { "slug": "accent-500", "name": "River 500", "color": "\#3A6B68" },        { "slug": "accent-600", "name": "Olive 100", "color": "\#E8EDE0" },        { "slug": "accent-700", "name": "Olive 200", "color": "\#C5CFAC" },        { "slug": "accent-800", "name": "Olive 300", "color": "\#A2B178" },        { "slug": "accent-900", "name": "Olive 400", "color": "\#6B7C3A" },        { "slug": "accent-1000", "name": "Orange 100", "color": "\#FBEDE6" },        { "slug": "accent-1100", "name": "Orange 200", "color": "\#F3C6A6" },        { "slug": "accent-1200", "name": "Orange 300", "color": "\#E58F5C" },        { "slug": "accent-1300", "name": "Orange 400", "color": "\#C06028" }      \]    }  }} |
| :---- |

**Optional Future Extension:**  
 Add dark-mode overrides for accessibility on darker backgrounds:

"base-dark": "\#111111",  
"contrast-light": "\#FFFFFF"

These ensure brand balance and maintain readability in night or low-light layouts — such as showcasing *night fishing adventures*.

---

### **6\. Key Points**

* Follows your **100-step token system** and slug naming conventions.

* **Neutrals:** Used for structure, UI surfaces, and background contrast.

* **Accent Sets A/B:** River and olive tones for brand identity.

* **Accent Set C:** Burnt orange for CTAs and key highlights.

* Meets accessibility contrast guidelines (**AA/AAA**).

* Consistent colour logic for imagery, backgrounds, and interactive elements.

* Reflects the **authentic outdoor aesthetic** of Brandon’s Fishing Adventures — calm, natural, and warm.

---

