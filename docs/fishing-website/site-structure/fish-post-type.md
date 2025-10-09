# **Fish CPT Template**

## *Brandon’s Fishing Adventures*

**Purpose:** Field-guide style Custom Post Type (CPT) for fish species. Each post represents **one fish species/type** rather than individual catches. Designed for **easy editing, clean UX, performance, and block-theme integration**.

---

## **1\. CPT Overview**

* **Post Type Key (slug):** `fish`

* **Singular Label:** Fish

* **Plural Label:** Fish / Fish Species

* **Description:** One entry \= one fish species/type (field-guide entry).

* **Supports:** Title, editor, excerpt, thumbnail (featured image), revisions, author

* **Menu Icon:** `dashicons-admin-site-alt3` (or choose any dashicon)

* **Public:** true

* **Has Archive:** true

* **Archive Slug / Rewrite:** `fish`

* **Show in REST:** true (required for block themes / headless)

* **REST Base:** `fish`

* **Hierarchical:** false

* **Admin Notes:** Add instructions in the field group reminding editors this is species-level, not catch logs.

**Notes / Trade-offs:**

* Keep fields simple (text, select, number).

* Use taxonomies for locations/habitats to enable archives, filtering, and query loops.

* Optional: custom capabilities if role separation is required.

---

## **2\. Taxonomies**

### **A) Habitat / Locations**

* **Label:** Habitat

* **Slug:** `habitat`

* **Description:** Regions or named locations where a species is usually found (e.g., Huttenspruit, Tugela River, Drakensberg streams).

* **Hierarchical:** true (Parent → Child supported)

* **Show in REST:** true

* **Public:** true

* **Attach to:** Fish CPT

* **Admin UI:** Meta box / sidebar in block editor

* **Initial Terms:** Tugela River, Huttenspruit, Drakensberg Streams, Coastal Estuaries

**Optional Taxonomy:** Fish Type / Group

* Label: Fish Type

* Slug: `fish_type`

* Non-hierarchical, attach to Fish CPT

* Use for “Related Fish” filters

---

## **3\. SCF Field Group: Fish Details**

**Field Group Name:** Fish — Details  
 **Location Rule:** Post Type \= Fish  
 **Show in REST:** true

### **Admin Layout Tabs**

1. Hero

2. Gallery

3. Details

4. Personal / Story

5. Relations / Admin

---

### **Fields (with meta keys)**

| Field | Meta Key | Type | Notes / Validation |
| ----- | ----- | ----- | ----- |
| Featured Image | n/a | WP Featured Image | Required recommended |
| Gallery | `fish_gallery` | Gallery (max 12\) | Optional, multiple images; return array of attachment IDs |
| Description | `fish_description` | WYSIWYG / Textarea | Short species summary; required; min 20 chars |
| Quick Facts | `fish_quick_facts` | Repeater / Group | Key/value pairs; scientific name optional, conservation status recommended |
| Habitat | `fish_habitat` | Taxonomy picker | Multi-select, optional, allow term creation for admins |
| Fishing Season | `fish_fishing_season` | Select / Text | Options: All year, Summer, Autumn, Winter, Spring, Early/Late season |
| Average Size | `fish_average_size` | Number \+ Unit | Option: structured group (value \+ unit cm/kg/in/lb) |
| Preferred Bait / Lure | `fish_preferred_bait` | Text / Select | Short text, e.g., "surface popper, nymphs" |
| Conservation Status | `fish_conservation_status` | Select | Options: Common, Protected, Threatened, Endangered; default \= Common |
| Fun Fact | `fish_fun_fact` | Text | Optional, max 200 chars |
| Personal Story | `fish_personal_story` | WYSIWYG / Textarea | Optional; longer narrative |
| Related Fish | `fish_related` | Post Object / Relationship | Multi-select; manual ordering |
| Admin Notes | `fish_admin_notes` | Message / Textarea | Admin only; hidden from REST |

**Optional Fields:**

* `fish_threats` (Repeater)

* `fish_regulations` (WYSIWYG)

* `fish_measurements` (Repeater, weight/length ranges)

---

## **4\. Validation & UX Rules**

* Required fields: `fish_description`, `fish_conservation_status`

* Meta keys: `fish_<field_name>`

* Use Tabs to keep editor screen compact

* Defaults:

  * `conservation_status` \= Common

  * `size unit` \= cm

* REST exposure verified for all fields

* Accessibility: all images must have alt text; gallery captions supported

---

## **5\. Template Layout (Block Theme)**

### **single-fish.html**

1. **Hero Section:** Featured image \+ Post Title (H1)

2. **Intro Section:** Description \+ Quick Facts box

3. **Gallery Section:** Optional gallery images

4. **Details Section:** Habitat, Season, Average Size, Preferred Bait

5. **Story Section:** Personal story / Brandon’s notes

6. **Related Fish:** Query Loop filtered by taxonomy or related posts

### **archive-fish.html**

* Query Loop: Featured image, title, habitat, short excerpt

### **taxonomy-habitat.html**

* List all fish assigned to habitat term

**Block Bindings Notes (for AI guidance):**

* Bind H1 → Post Title

* Bind Image → Featured Image

* Bind Gallery → fish\_gallery

* Bind Text → fish\_description / fish\_personal\_story

---

## **6\. QA / Governance Checklist**

* Required fields filled

* Featured image present

* Habitat assigned

* Average size numeric \+ unit

* Related fish reviewed (no circular duplicates)

* REST exposure verified (`/wp-json/wp/v2/fish`)

* SEO: excerpt/meta description available

* Alt text for all images

---

## **7\. Sample Entry (Quick Example)**

* **Post Title:** Smallmouth Yellowfish

* **Featured Image:** (ID 1234\)

* **Description:** A robust river species found in rocky rapids…

* **Habitat:** Tugela River, Huttenspruit

* **Fishing Season:** Summer, Autumn

* **Average Size:** 45 cm

* **Preferred Bait:** small surface poppers, nymphs

* **Conservation Status:** Protected

* **Fun Fact:** Known to leap when hooked

* **Personal Story:** Caught my first one in 2018 on a stormy morning…

* **Related Fish:** Tigerfish, Largemouth Bass

---

