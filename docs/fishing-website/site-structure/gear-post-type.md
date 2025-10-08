# **Gear CPT Template**

## *Brandon’s Fishing Adventures*

**Purpose:** Custom Post Type for fishing gear. Each post represents a **gear item or category**, including bait, rods, reels, or accessories. Designed for **quick editing, clear UX, and block-theme integration**.

---

## **1\. CPT Overview**

* **Post Type Key (slug):** `gear`

* **Singular Label:** Gear

* **Plural Label:** Gear / Gear Items

* **Description:** Each entry \= one gear item or category.

* **Supports:** Title, editor, excerpt, thumbnail (featured image), revisions, author

* **Menu Icon:** `dashicons-admin-generic`

* **Public:** true

* **Has Archive:** true

* **Archive Slug / Rewrite:** `gear`

* **Show in REST:** true

* **REST Base:** `gear`

* **Hierarchical:** false

* **Admin Notes:** Remind editors to add specifications, usage tips, and recommended species.

---

## **2\. Taxonomies**

### **A) Gear Type**

* **Label:** Gear Type

* **Slug:** `gear_type`

* **Description:** Category of gear (e.g., Rod, Reel, Line, Lure, Bait, Accessory)

* **Hierarchical:** true (Parent → Child supported)

* **Show in REST:** true

* **Attach to:** Gear CPT

### **B) Target Fish (Optional)**

* **Label:** Target Fish

* **Slug:** `target_fish`

* **Description:** Fish species suitable for this gear item

* **Hierarchical:** false

* **Attach to:** Gear CPT

---

## **3\. SCF Field Group: Gear Details**

**Field Group Name:** Gear — Details  
 **Location Rule:** Post Type \= Gear  
 **Show in REST:** true

### **Admin Layout Tabs**

1. Hero

2. Specifications

3. Usage / Tips

4. Media / Gallery

5. Relations / Admin

---

### **Fields (with meta keys)**

| Field | Meta Key | Type | Notes / Validation |
| ----- | ----- | ----- | ----- |
| Featured Image | n/a | WP Featured Image | Required for hero display |
| Gallery | `gear_gallery` | Gallery (max 12\) | Optional; multiple images; return array of attachment IDs |
| Description | `gear_description` | WYSIWYG / Textarea | Overview of gear, purpose, and features; required |
| Gear Type | `gear_type` | Taxonomy picker | Required; e.g., Rod, Reel, Line, Lure, Accessory |
| Specifications | `gear_specifications` | Repeater / Group | Key/value pairs: e.g., Weight, Length, Material, Line Weight |
| Preferred Fish | `gear_target_fish` | Taxonomy / Post Object | Optional; multi-select to link to Fish CPT |
| Usage Tips | `gear_usage_tips` | WYSIWYG / Textarea | Optional; advice on when/how to use |
| Availability / Source | `gear_availability` | Text / URL | Optional; link to purchase or local suppliers |
| Admin Notes | `gear_admin_notes` | Textarea / Message | Admin only; hidden from REST |

---

## **4\. Validation & UX Rules**

* Required fields: `gear_description`, `gear_type`

* Meta keys: `gear_<field_name>`

* Tabs: organize Hero → Specs → Usage → Media → Relations

* REST exposure verified

* Accessibility: all images must have alt text; gallery captions supported

---

## **5\. Template Layout (Block Theme)**

### **single-gear.html**

1. **Hero Section:** Featured image \+ Post Title (H1)

2. **Intro Section:** Description \+ Key Specifications in highlighted box

3. **Gallery Section:** Optional media images

4. **Usage Section:** Tips and guidance

5. **Relations / Links:** Target Fish (linked via taxonomy or post object)

### **archive-gear.html**

* Query Loop: Featured image, title, gear type, short description

### **taxonomy-gear\_type.html**

* List all gear items assigned to the gear type

**Block Bindings Notes:**

* Bind H1 → Post Title

* Bind Image → Featured Image

* Bind Gallery → gear\_gallery

* Bind Text → gear\_description / gear\_usage\_tips

---

## **6\. QA / Governance Checklist**

* Required fields filled

* Featured image present

* Gear Type assigned

* Key specifications complete

* Target fish reviewed for correctness

* REST exposure verified (`/wp-json/wp/v2/gear`)

* Alt text for images

---

## **7\. Sample Entry (Quick Example)**

* **Post Title:** Surface Popper Lure

* **Featured Image:** (ID 5678\)

* **Description:** Ideal floating lure for topwater strikes targeting Yellowfish and Bass.

* **Gear Type:** Lure

* **Specifications:** Weight: 12g; Length: 6cm; Material: Plastic

* **Target Fish:** Smallmouth Yellowfish, Largemouth Bass

* **Usage Tips:** Best during early morning or late evening; cast near rocky pools.

* **Availability / Source:** \[Local tackle shop link\]

---

