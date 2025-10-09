# **Pattern Guide**

## *Brandons Fishing Adventures*

Guidelines for submitting pattern definitions and requirements  
This guide defines reusable block layouts (patterns) for the WordPress block theme of Brandon’s Fishing Adventures. It ensures design consistency, accurate fish/gear content, AI-friendly placeholders, and responsive behavior across devices.

---

## **0\. Deliverables**

- [ ] Complete set of patterns for Fish, Gear, and Stories CPTs

- [ ] Pattern categories and metadata for WordPress registration

- [ ] JSON examples for plug-and-play implementation

- [ ] Responsive behavior rules and fallback guidance

- [ ] Placeholder content and real examples (species-specific)

---

## **1\. Purpose**

* Standardize reusable layouts for content blocks

* Maintain design consistency for single CPT entries, archives, and home page sections

* Enable AI content generation with structured prompts

* Support responsive and accessible front-end implementation

---

## **2\. How to Use This Guide**

**For content editors / AI:**

* Use placeholders or real data to generate new entries

* Follow field prompts for Fish, Gear, and Story content

**For developers:**

* Convert JSON / metadata into `patterns/*.php` or `patterns/*.json`

* Register patterns using `register_block_pattern()` in WordPress

* Test responsive behavior and fallback rules

---

## **3\. Pattern Definition Fields**

| Field | Description / Prompt | Notes / Examples |
| ----- | ----- | ----- |
| Title | Human-readable name | e.g., “Fish Hero Section” |
| Slug | Unique identifier | e.g., `bfa/fish-hero` |
| Categories | Pattern categories | hero, media, call-to-action, section, fish, gear, story |
| Keywords / Tags | Search terms | fish, species, gear, story, quick facts |
| Description | Short summary | 1–2 sentences |
| Viewport Width | Editor preview width (px) | 1200 |
| Markup / Content Structure | HTML / inner blocks | Use placeholder labels or real fish/gear examples |
| Default Settings | Presets for spacing, layout, colors | Tailwind / theme defaults |
| Variation / Alternate Layouts | Optional variations | reversed columns, compact grid |
| Responsive Rules | Behavior on mobile, tablet, desktop | Stack columns, hide optional blocks, collapse margins |
| Fallbacks / Simplified Version | Simplified version for unsupported CSS | image-only fallback, single-column stack |
| Image / Media Requirements | Aspect ratio, alt text | 16:9 or square images; alt text per species/gear |
| Placeholder Text / Content | Sample headings and paragraphs | “Heading goes here”, “Describe species …” |
| Notes / Design Guidance | Alignment, spacing, max width | e.g., 2rem padding, H1 max-width 700px |

---

## **4\. Pattern Strategy & Hierarchy**

* **Atomic / Small Patterns:** Buttons, separators, headings

* **Component Patterns:** Fact boxes, gallery cards, species summaries

* **Section Patterns:** Hero banners, feature blocks, single CPT layouts

* Encourage modular design: combine small and component patterns for flexibility

---

## **5\. Naming & File Conventions**

* Store pattern files in `patterns/` directory

* Filenames \= slugs, e.g., `patterns/fish-hero.php` or `.json`

* Metadata header required for each pattern

* Use PSR-style formatting (PHP) or tidy JSON

---

## **6\. Pattern Categories (Website-specific)**

| Category | Usage |
| ----- | ----- |
| hero | Large image/header sections |
| media | Galleries, videos, content grids |
| call-to-action | Buttons, promo blocks, links |
| feature | Quick facts, species/gear cards |
| fish | Fish CPT single/archives |
| gear | Gear CPT single/archives |
| story | Story CPT single/archives |

---

## **7\. Usage Examples & Inspiration**

* Fish hero section: featured image \+ title \+ fact box

* Fish gallery pattern: responsive 3-column grid with lightbox

* Gear single pattern: image \+ details \+ recommended fish \+ bait \+ line \+ rod

* Story single pattern: featured image \+ excerpt \+ story content \+ related fish

---

## **8\. Responsive Behavior & Fallbacks**

* Stack columns vertically on screens \<768px

* Hide optional decorative elements if space is tight

* Use image-only fallback for galleries on narrow screens

* Ensure all alt text is provided for accessibility

* Fact boxes reflow vertically on mobile

---

## **9\. Registration Metadata Example (JSON)**

**Fish Hero Section**

| {  "title": "Fish Hero Section",  "slug": "bfa/fish-hero",  "categories": \["hero","fish"\],  "keywords": \["fish","species","hero","featured image"\],  "description": "Displays a featured fish species with image, title, and fact box.",  "viewportWidth": 1200,  "content": "\<\!-- Featured Image Block \--\>\\n\<\!-- H1: Species Name \--\>\\n\<\!-- Fact Box: Habitat, Season, Average Size, Bait \--\>"} |
| :---- |

**Gear Single Pattern**

| {  "title": "Single Gear Layout",  "slug": "bfa/gear-single",  "categories": \["gear","feature","media"\],  "keywords": \["gear","rod","reel","bait","line","species-recommendation"\],  "description": "Displays a single gear item with images, specifications, and species-specific usage tips.",  "viewportWidth": 1200,  "content": "\<\!-- Featured Image \--\>\\n\<\!-- Title \--\>\\n\<\!-- Gear Details: rod, reel, line, bait \--\>\\n\<\!-- Recommended Fish Species \--\>\\n\<\!-- Related Gear / CTA \--\>"} |
| :---- |

**Story Single Pattern**

| {  "title": "Single Story Layout",  "slug": "bfa/story-single",  "categories": \["story","media"\],  "keywords": \["story","fishing","personal","adventure"\],  "description": "Displays a fishing story with featured image, body content, related species, and optional gallery.",  "viewportWidth": 1200,  "content": "\<\!-- Featured Image \--\>\\n\<\!-- H1: Story Title \--\>\\n\<\!-- Excerpt \--\>\\n\<\!-- Main Content / Story Blocks \--\>\\n\<\!-- Related Fish / CTA \--\>"} |
| :---- |

---

## **10\. Example Fish-Specific Gear Usage (Placeholders)**

| Fish Species | Recommended Rod | Reel | Line | Bait/Lure |
| ----- | ----- | ----- | ----- | ----- |
| Smallmouth Bass | 6’6” Medium Light | Spinning 2500 | 6–8 lb | Small crankbaits, spinnerbaits |
| Largemouth Bass | 7’ Medium | Baitcasting 200 | 10–12 lb | Soft plastics, topwater plugs |
| Tigerfish | 7’ Heavy | Spinning 4000 | 20–30 lb | Live bait, spoons |
| Smallmouth Yellowfish | 6’6” Medium | Spinning 3000 | 8–10 lb | Nymph flies, small spinners |
| Largemouth Yellowfish | 7’ Medium Heavy | Baitcasting 300 | 12–15 lb | Streamers, crankbaits |

Note: Gear recommendations are fully fish-specific, matching habitat, seasonal behavior, and size.

---

## **11\. How to Use This Template**

1. Duplicate the JSON template per pattern.

2. Replace placeholder content with real species, gear, or story info.

3. Register in WordPress via `register_block_pattern()` or load JSON into theme.

4. Test responsiveness across mobile, tablet, desktop.

5. Confirm accessibility: alt text, readable font sizes, logical headings.

---

## **12\. Why This Works**

* Fully integrates with AI content generation, WordPress CPTs, and Gutenberg blocks.

* Fish/gear data is accurate and species-specific.

* Responsive and fallback-ready across all devices.

* Scales for new species, gear items, and stories.

* Maintains visual consistency and editor-friendly workflows.

---

