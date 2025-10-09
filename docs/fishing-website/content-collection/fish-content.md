# **Fish Species Content Framework**

## *Brandons Fishing Adventures*

Guidelines for structured, evergreen entries in a Custom Post Type

This framework is designed for the **Fishing Website**, ensuring that each entry within the *Fish Species* Custom Post Type (CPT) remains consistent, informative, and reusable.  
 It is optimized for AI content generation, WordPress template integration, and SEO-friendly outputs.

---

[0\. Deliverables](#0.-deliverables)

[1\. Purpose](#1.-purpose)

[2\. Base Structure & Fields](#2.-base-structure-&-fields)

[3\. Naming Convention](#3.-naming-convention)

[4\. Usage](#4.-usage)

[5\. Responsive Rules](#5.-responsive-rules)

[6\. Implementation](#6.-implementation)

[7\. Content Strategy for Fish Species](#7.-content-strategy-for-fish-species)

[8\. Fact Box Schema (Fish Species Example)](#8.-fact-box-schema-\(fish-species-example\))

[9\. Example JSON Partial (Fish Species Structure)](#9.-example-json-partial-\(fish-species-structure\))

[10\. Why This Works](#10.-why-this-works)

---

# **0\. Deliverables** {#0.-deliverables}

- [ ] Template for featured image, description, fact box, gallery, and notes.

- [ ] Clear taxonomy structure for classification.

- [ ] AI-ready prompt fields for species data generation.

- [ ] Scalable format usable for any type of fish species or waterbody entry.

- [ ] Integration guidelines for theme templates or JSON data structures.

---

# **1\. Purpose** {#1.-purpose}

* Ensure uniformity across all *Fish Species* CPT entries.

* Provide a structured schema usable by both humans and AI systems.

* Support metadata-rich content (images, alt text, taxonomies, fact boxes).

* Maintain evergreen, regionally relevant content for archives and single species views.

---

# **2\. Base Structure & Fields** {#2.-base-structure-&-fields}

Each entry includes:

* **Title** – Common species name

* **Excerpt** – 25-word summary for previews and archives

* **Featured Image** – File, alt text, and short image description

* **Description** – 100–200 words main body

* **Fact Box** – Structured quick-reference details

* **Additional Images** – Optional gallery (1–3 supporting visuals)

* **Videos** – Optional URLs for habitat or catch footage

* **Brandon’s Notes** – Contextual, anecdotal insights

* **Prompt Notes** – Optional AI prompt guidance for regeneration or extension

---

# **3\. Naming Convention** {#3.-naming-convention}

* **Images:** `fish-[species-name].jpg`

* **Gallery Images:** `fish-[species-name]-1.jpg`, `fish-[species-name]-2.jpg`

* **Taxonomy Terms:** Category (e.g., Freshwater, Gamefish), Region (e.g., KwaZulu-Natal Rivers)

* **Slugs:** Lowercase with hyphens → `fish-[species-name]`

---

# **4\. Usage** {#4.-usage}

* **Excerpt** → Used for teasers, search results, and archive listings.

* **Description** → Core narrative body, informative and context-driven.

* **Fact Box** → Quick reference with structured fields for habitat, bait, and size.

* **Notes** → Adds personality and authenticity.

* **Media** → Enhances engagement, provides visual credibility.

---

# **5\. Responsive Rules** {#5.-responsive-rules}

* Featured images must adapt to all screen sizes.

* Fact Box must reflow vertically on mobile.

* Galleries must support grid or lightbox layouts.

* Maintain consistent line length and spacing for readability.

---

# **6\. Implementation** {#6.-implementation}

* Map fields into WordPress CPT single template (e.g., `single-fish.php`).

* Use **ACF** or native **Gutenberg** meta fields for structured data.

* Include `alt` text and `aria` attributes for accessibility and SEO.

* Utilize taxonomy terms for filtering and related species suggestions.

---

# **7\. Content Strategy for Fish Species** {#7.-content-strategy-for-fish-species}

Each species entry should follow this consistent content model:

### **Species List**

1. **Smallmouth Bass**  
    **Featured image:** `fish-smallmouth-bass.jpg`  
    **Description:** A spirited sportfish recognized by its bronze hue and vertical bars. Prefers clear, rocky rivers and dams where it hunts smaller baitfish and insects.  
    **Habitat:** Cool, clear rivers and reservoirs.  
    **Season:** Spring through early autumn.  
    **Average size:** 25–45 cm.  
    **Bait/Lure:** Crankbaits, jigs, spinnerbaits.  
    **Conservation:** Common but localized in South Africa.  
    **Brandon’s notes:** “Strong fighter — aggressive surface strikes on light tackle are unmatched.”

2. **Largemouth Bass**  
    **Featured image:** `fish-largemouth-bass.jpg`  
    **Description:** Popular angling species known for explosive top-water strikes and adaptable feeding. Often stocked in dams across KwaZulu-Natal and other provinces.  
    **Habitat:** Dams, lakes, and slow rivers.  
    **Season:** Summer.  
    **Average size:** 30–60 cm.  
    **Bait/Lure:** Soft plastics, spinnerbaits, topwater plugs.  
    **Conservation:** Common and managed.  
    **Brandon’s notes:** “A classic sportfish — patient presentation rewards big hits near structure.”

3. **Smallmouth Yellowfish**  
    **Featured image:** `fish-smallmouth-yellowfish.jpg`  
    **Description:** A strong native freshwater fish, prized for its fight and agility.  
    **Habitat:** Huttenspruit, Tugela, Drakensberg streams.  
    **Season:** Spring to autumn.  
    **Average size:** 30–50 cm.  
    **Bait/Lure:** Nymph flies, small spinners.  
    **Conservation:** Common.  
    **Brandon’s notes:** “A favourite in the Huttenspruit – aggressive and quick, best on fly tackle.”

4. **Largemouth Yellowfish**  
    **Featured image:** `fish-largemouth-yellowfish.jpg`  
    **Description:** Larger cousin of the Smallmouth, known for predatory behaviour.  
    **Habitat:** Deeper pools of KwaZulu-Natal rivers.  
    **Season:** Summer and early autumn.  
    **Average size:** 50–80 cm.  
    **Bait/Lure:** Streamers, crankbaits.  
    **Conservation:** Sensitive – catch and release recommended.  
    **Brandon’s notes:** “Powerful strikes – feels more like bass fishing than typical yellowfish.”

5. **Mozambique Tilapia**  
    **Featured image:** `fish-mozambique-tilapia.jpg`  
    **Description:** Hardy, adaptable species common in warm KZN waters.  
    **Habitat:** Shallow dams, slow rivers.  
    **Season:** Year-round.  
    **Average size:** 20–35 cm.  
    **Bait/Lure:** Worms, small soft plastics.  
    **Conservation:** Common.  
    **Brandon’s notes:** “Often caught when targeting other species – great fun for kids.”

6. **Sharptooth Catfish (Barbel)**  
    **Featured image:** `fish-sharptooth-catfish.jpg`  
    **Description:** Large, whiskered fish capable of reaching huge sizes.  
    **Habitat:** Almost all stillwaters and rivers in KZN.  
    **Season:** Best in summer.  
    **Average size:** 60–120 cm.  
    **Bait/Lure:** Chicken livers, worms, cut bait.  
    **Conservation:** Common.  
    **Brandon’s notes:** “The giants of local waters – slow, heavy fights that test patience.”

7. **Tigerfish**  
    **Featured image:** `fish-tigerfish.jpg`  
    **Description:** Ferocious predator with sharp teeth, iconic African gamefish.  
    **Habitat:** Larger rivers and dams, rare in KZN but present in connected waters.  
    **Season:** Late summer.  
    **Average size:** 40–70 cm.  
    **Bait/Lure:** Spoons, spinners, live bait.  
    **Conservation:** Locally scarce, often protected.  
    **Brandon’s notes:** “Rare encounter in KZN – unforgettable if you hook one.”

8. **Rock Catfish**  
    **Featured image:** `fish-rock-catfish.jpg`  
    **Description:** Bottom-dwelling species with mottled camouflage.  
    **Habitat:** Rocky stretches of rivers.  
    **Season:** Year-round, mostly at night.  
    **Average size:** 30–50 cm.  
    **Bait/Lure:** Worms, insects, bottom rigs.  
    **Conservation:** Protected in some regions.  
    **Brandon’s notes:** “Elusive – I often find them in the quietest rocky pools.”

9. **River Bream (Nembwe)**  
    **Featured image:** `fish-river-bream.jpg`  
    **Description:** Strong, oval-bodied bream known for aggressive feeding.  
    **Habitat:** Slower river stretches, backwaters.  
    **Season:** Summer.  
    **Average size:** 25–40 cm.  
    **Bait/Lure:** Small crankbaits, worms, flies.  
    **Conservation:** Localised.  
    **Brandon’s notes:** “Brilliant fighters for their size – love hitting lures hard.”

10. **Natal Yellowfish**  
     **Featured image:** `fish-natal-yellowfish.jpg`  
     **Description:** Endemic species to KwaZulu-Natal rivers, close relative of smallmouth.  
     **Habitat:** Clean, fast-moving rivers.  
     **Season:** Spring and summer.  
     **Average size:** 25–45 cm.  
     **Bait/Lure:** Flies, small baitfish imitations.  
     **Conservation:** Vulnerable in some catchments.  
     **Brandon’s notes:** “Special to KZN anglers – often overlooked but worth protecting.”

11. **Redbreast Tilapia**  
     **Featured image:** `fish-redbreast-tilapia.jpg`  
     **Description:** Small but colourful tilapia, often found in dams.  
     **Habitat:** Warm stillwaters, streams.  
     **Season:** Year-round.  
     **Average size:** 15–25 cm.  
     **Bait/Lure:** Worms, small flies.  
     **Conservation:** Common.  
     **Brandon’s notes:** “Bright colours make them a joy to catch – often my first fish of the day.”

12. **Longfin Eel**  
     **Featured image:** `fish-longfin-eel.jpg`  
     **Description:** Slender, snake-like species that migrates to the ocean to spawn.  
     **Habitat:** Rivers, dams, hiding under logs.  
     **Season:** Rainy season.  
     **Average size:** 60–100 cm.  
     **Bait/Lure:** Worms, dead bait.  
     **Conservation:** Populations declining, release recommended.  
     **Brandon’s notes:** “Surprising catch – often hooked when targeting catfish at night.”

---

# **8\. Fact Box Schema (Fish Species Example)** {#8.-fact-box-schema-(fish-species-example)}

| Field | Example Placeholder | Notes |
| ----- | ----- | ----- |
| **Habitat** | Huttenspruit River, KZN | Primary environment or location |
| **Season** | Spring to Autumn | Ideal or active season |
| **Average Size** | 30–50 cm | Common range for adults |
| **Bait/Lure** | Worms, small spinners | Typical baits or lures used |
| **Conservation** | Common / Protected / Vulnerable | Conservation status |
| **Region** | KwaZulu-Natal | Optional classification |
| **Additional Media** | `fish-smallmouth-yellowfish-1.jpg` | Supporting visuals or footage |

---

# **9\. Example JSON Partial (Fish Species Structure)** {#9.-example-json-partial-(fish-species-structure)}

{  
  "post\_type": "fish\_species",  
  "title": "Smallmouth Bass",  
  "excerpt": "A spirited sportfish recognized by its bronze hue and aggressive topwater strikes.",  
  "featured\_image": {  
    "file": "fish-smallmouth-bass.jpg",  
    "alt": "Smallmouth Bass in clear river water",  
    "description": "Bronze-colored bass near submerged rocks."  
  },  
  "description": "A strong, energetic freshwater predator preferring clear, rocky waters. Highly sought after for sport due to its powerful runs and aerial displays.",  
  "fact\_box": {  
    "habitat": "Clear rivers and dams",  
    "season": "Spring to Autumn",  
    "average\_size": "25–45 cm",  
    "bait\_or\_lure": "Crankbaits, spinnerbaits",  
    "conservation": "Common, sustainable in managed areas",  
    "region": "KwaZulu-Natal"  
  },  
  "gallery": \[  
    {  
      "file": "fish-smallmouth-bass-1.jpg",  
      "alt": "Angler holding smallmouth bass"  
    },  
    {  
      "file": "fish-smallmouth-bass-2.jpg",  
      "alt": "Smallmouth bass underwater view"  
    }  
  \],  
  "videos": \[  
    "https://example.com/smallmouth-bass-footage"  
  \],  
  "personal\_notes": "Strong fighter with sharp reflexes; ideal for early morning sessions.",  
  "prompt\_notes": "Generate a concise, informative description for Smallmouth Bass emphasizing habitat, behavior, and angling value."  
}

---

# **10\. Why This Works** {#10.-why-this-works}

* Provides a **repeatable, species-specific content structure**.

* Seamlessly integrates with AI and WordPress CPTs.

* Balances **structured data** with narrative context.

* Scalable to additional species, regions, or fishing categories.

* Ensures consistent, SEO-friendly, and accessible documentation.

---

