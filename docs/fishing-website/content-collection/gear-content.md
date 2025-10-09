# **Gear Content Framework**

## *Brandons Fishing Adventures*

*Guidelines for structured, evergreen entries in the Gear Custom Post Type (CPT)*

This framework is designed for the Fishing Website, ensuring that each Gear CPT entry is consistent, informative, AI-friendly, and ready for WordPress template integration.

---

## **0\. Deliverables**

- [ ] Template for featured image, description, fact box, gallery, and usage notes.

- [ ] Taxonomy structure for Gear Type (Rod, Reel, Lure, Accessory).

- [ ] AI-ready prompt fields for content generation.

- [ ] Integration guidelines for theme templates or JSON structures.

---

## **1\. Purpose**

* Ensure uniformity across all Gear CPT entries.

* Provide structured schema usable by both humans and AI systems.

* Support metadata-rich content (images, alt text, categories, usage tips).

* Enable filtering and cross-referencing with Fish Species CPT.

---

## **2\. Base Structure & Fields**

Each entry includes:

* **Title** – Gear name

* **Excerpt** – 25-word summary for previews and archives

* **Featured Image** – File, alt text, short image description

* **Description** – 100–200 words main body about gear and usage

* **Fact Box** – Structured quick-reference details

* **Additional Images** – Optional gallery (1–12 supporting visuals)

* **Videos** – Optional instructional or demo URLs

* **Usage Notes** – Tips on which fish species, conditions, or techniques it’s best suited for

* **Prompt Notes** – Optional AI prompt guidance for regeneration or extension

---

## **3\. Naming Convention**

* Images: gear-\[gear-name\].jpg

* Gallery Images: gear-\[gear-name\]-1.jpg, gear-\[gear-name\]-2.jpg

* Taxonomy Terms: Gear Type (Rod, Reel, Lure, Accessory), Target Species

* Slugs: lowercase with hyphens → gear-\[gear-name\]

---

## **4\. Usage**

* **Excerpt** → Teasers, search results, archive listings

* **Description** → Core narrative body

* **Fact Box** → Quick reference: gear type, species suitability, recommended use

* **Notes** → Adds personality, brand voice

* **Media** → Enhances engagement and credibility

---

## **5\. Responsive Rules**

* Featured image and galleries adapt to all screen sizes

* Fact Box must reflow vertically on mobile

* Video embeds must scale for responsive layouts

---

## **6\. Implementation**

* Map fields into WordPress CPT template (e.g., single-gear.php)

* Use ACF or Gutenberg meta fields for structured data

* Include alt text and aria attributes for accessibility and SEO

* Use taxonomy terms for filtering, cross-referencing Fish species, or related Gear

---

## **7\. Content Strategy for Gear**

Each gear entry should follow this consistent content model:

**Example Entries**

**Spinning Rod 6’6” Medium Action**

* Featured image: gear-spinning-rod.jpg

* Description: Lightweight spinning rod ideal for bass and yellowfish in rivers and dams. Offers fast tip response for topwater and jig presentations.

* Fact Box:

  * Gear Type: Rod

  * Recommended Fish: Bass, Yellowfish

  * Material: Graphite

  * Length: 6’6”

  * Action: Medium

* Usage Notes: “Perfect for morning river sessions targeting small to medium freshwater species.”

**Live Bait Reel 4000**

* Featured image: gear-live-bait-reel.jpg

* Description: Smooth drag reel for live bait fishing in rivers and dams. Reliable line lay ensures minimal tangles.

* Fact Box:

  * Gear Type: Reel

  * Recommended Fish: Tilapia, Yellowfish

  * Drag Max: 8 kg

  * Gear Ratio: 5.2:1

* Usage Notes: “Best paired with light spinning rods; ideal for slow drifting with live bait.”

**Topwater Surface Popper**

* Featured image: gear-surface-popper.jpg

* Description: Floating lure designed for aggressive surface strikes. Great for early morning or late afternoon sessions.

* Fact Box:

  * Gear Type: Lure

  * Recommended Fish: Bass, Yellowfish

  * Color: White / Red

  * Action: Popping / Splashing

* Usage Notes: “Use with quick pops; excites territorial fish in shallow pools.”

---

## **8\. Fact Box Schema (Gear Example)**

| Field | Example Placeholder | Notes |
| ----- | ----- | ----- |
| Gear Type | Rod | Category of gear |
| Recommended Fish | Bass, Yellowfish | Species suitability |
| Material | Graphite | Optional specification |
| Length / Size | 6’6” | Physical dimension |
| Action / Power | Medium | Rod-specific info |
| Drag / Gear Ratio | 8 kg / 5.2:1 | Reel-specific info |
| Color / Pattern | White / Red | Optional |
| Additional Media | gear-spinning-rod-1.jpg | Optional gallery or video |

---

## **9\. Example JSON Partial (Gear Structure)**

| {  "post\_type": "gear",  "title": "Spinning Rod 6'6" Medium Action",  "excerpt": "Lightweight rod ideal for freshwater bass and yellowfish, fast tip response for jigs and topwater lures.",  "featured\_image": {    "file": "gear-spinning-rod.jpg",    "alt": "Spinning rod leaning against a riverbank",    "description": "Graphite medium-action rod ideal for freshwater species"  },  "description": "Designed for responsive casting and smooth action, this rod excels in rivers, dams, and shallow pools.",  "fact\_box": {    "gear\_type": "Rod",    "recommended\_fish": \["Bass", "Yellowfish"\],    "material": "Graphite",    "length": "6'6"",    "action": "Medium"  },  "gallery": \[    {      "file": "gear-spinning-rod-1.jpg",      "alt": "Angler holding spinning rod over river"    }  \],  "videos": \["https://example.com/spinning-rod-demo"\],  "usage\_notes": "Best paired with light spinning reels; great for morning topwater sessions.",  "prompt\_notes": "Generate a detailed gear description highlighting species suitability, usage tips, and key specifications."} |
| :---- |

---

## **10\. Why This Works**

* Repeatable structure for every gear entry

* AI-friendly for content generation

* Aligns with Fish CPT taxonomy for filtering

* Ready for WordPress block templates and JSON import

* Scalable for future gear types, videos, or species associations

---

