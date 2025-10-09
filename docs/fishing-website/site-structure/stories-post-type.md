# **Stories CPT Template**

## *Brandon’s Fishing Adventures*

**Purpose:** Custom Post Type for fishing stories, experiences, and conservation notes. Each post is a **personal story** linked to Fish or Gear CPT if relevant.

---

## **1\. CPT Overview**

* **Post Type Key (slug):** `story`

* **Singular Label:** Story

* **Plural Label:** Stories

* **Description:** Each post \= one personal or conservation story.

* **Supports:** Title, editor, excerpt, thumbnail, revisions, author

* **Menu Icon:** `dashicons-admin-post`

* **Public:** true

* **Has Archive:** true

* **Archive Slug / Rewrite:** `stories`

* **Show in REST:** true

* **REST Base:** `story`

* **Hierarchical:** false

---

## **2\. Taxonomies**

### **A) Story Type**

* **Label:** Story Type

* **Slug:** `story_type`

* **Description:** Category of story (e.g., Adventure, Conservation, Fishing Tips)

* **Hierarchical:** true

* **Attach to:** Story CPT

### **B) Related Fish / Gear (Optional)**

* Link stories to relevant Fish or Gear CPT entries for context

---

## **3\. SCF Field Group: Story Details**

**Field Group Name:** Story — Details  
 **Location Rule:** Post Type \= Story  
 **Show in REST:** true

### **Admin Layout Tabs**

1. Hero / Intro

2. Main Story

3. Media / Gallery

4. Relations / Admin

---

### **Fields (with meta keys)**

| Field | Meta Key | Type | Notes / Validation |
| ----- | ----- | ----- | ----- |
| Featured Image | n/a | WP Featured Image | Optional hero image |
| Gallery | `story_gallery` | Gallery (max 12\) | Optional images |
| Story Summary | `story_summary` | Text / Textarea | Short teaser; recommended |
| Main Story | `story_main` | WYSIWYG | Full narrative; required |
| Story Type | `story_type` | Taxonomy picker | Required; e.g., Adventure, Conservation |
| Related Fish | `story_related_fish` | Post Object / Relationship | Optional multi-select |
| Related Gear | `story_related_gear` | Post Object / Relationship | Optional multi-select |
| Date of Experience | `story_date` | Date picker | Optional; adds context |
| Location | `story_location` | Text / Taxonomy | Optional; geographic reference |
| Admin Notes | `story_admin_notes` | Textarea / Message | Admin only; hidden from REST |

---

## **4\. Validation & UX Rules**

* Required fields: `story_main`, `story_type`

* Meta keys: `story_<field_name>`

* Tabs: Hero → Main → Media → Relations → Admin

* REST exposure verified

* Alt text for images

---

## **5\. Template Layout (Block Theme)**

### **single-story.html**

1. **Hero Section:** Featured image \+ Post Title (H1)

2. **Intro / Summary:** story\_summary

3. **Main Story Section:** story\_main WYSIWYG

4. **Gallery Section:** story\_gallery (optional)

5. **Relations Section:** Related Fish / Gear links

### **archive-story.html**

* Query Loop: Featured image, title, story type, short excerpt

### **taxonomy-story\_type.html**

* List all stories by type

**Block Bindings Notes:**

* Bind H1 → Post Title

* Bind Image → Featured Image

* Bind Text → story\_summary / story\_main

---

## **6\. QA / Governance Checklist**

* Required fields filled

* Featured image optional but recommended

* Story Type assigned

* Related Fish / Gear verified

* REST exposure verified (`/wp-json/wp/v2/story`)

* Alt text for images

---

## **7\. Sample Entry (Quick Example)**

* **Post Title:** Early Morning Yellowfish Adventure

* **Featured Image:** (ID 6789\)

* **Story Summary:** My first encounter with the Smallmouth Yellowfish in the Tugela River…

* **Main Story:** Detailed narrative of the fishing experience, challenges, and tips…

* **Story Type:** Adventure

* **Related Fish:** Smallmouth Yellowfish

* **Related Gear:** Surface Popper Lure

* **Date of Experience:** 2019-07-15

* **Location:** Tugela River, Huttenspruit

---

