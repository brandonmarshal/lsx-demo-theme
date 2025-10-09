# **Content Model Guide**

## *Brandon’s Fishing Adventures*

This file outlines the content model for Brandon’s Fishing Adventures website, combining Custom Post Types (CPTs), custom fields, taxonomies, relationships, global options, and block theme templates. It is fully optimized for AI-assisted content generation, WordPress implementation, and SEO-friendly outputs.

---

## **How to Use**

This document serves as a reference guide for content models and workflows. It is meant to:

* Provide a clear outline of all CPTs, taxonomies, fields, and relationships.

* Align developers, editors, and stakeholders on content structure.

* Serve as a checklist for implementing fields, templates, and block patterns.

* Assist editors in creating, updating, and reviewing content consistently.

* Serve as a prompt for AI-assisted content generation.

* Keep the project scalable and future-proof by updating this file whenever fields, templates, or relationships change.

---

## **0\. Deliverables**

- [ ] CPT templates and field group definitions.

- [ ] Taxonomy structure and hierarchical organization.

- [ ] Relationships between content types.

- [ ] AI-ready prompt fields for generating content.

- [ ] Template file references and block theme mapping.

- [ ] Editorial workflow and governance guidelines.

- [ ] Global Options fields for site-wide settings (CTAs, social, default images, SEO, branding).

---

## **1\. Custom Post Type Definitions**

| CPT Name | Post Type Key | Singular Label | Plural Label | Menu Icon | Supports | Public | Show in REST | Has Archive |
| ----- | ----- | ----- | ----- | ----- | ----- | ----- | ----- | ----- |
| Fish | `fish` | Fish Species | Fish Species | dashicons-admin-site-alt3 | title, editor, excerpt, thumbnail, revisions, author | true | true | true |
| Gear | `gear` | Gear Item | Gear Items | dashicons-admin-tools | title, editor, excerpt, thumbnail, revisions, author | true | true | true |
| Stories | `story` | Story | Stories | dashicons-format-chat | title, editor, excerpt, thumbnail, revisions, author | true | true | true |

**Notes:**

* All CPTs are exposed to REST for AI-assisted headless integrations or Gutenberg meta blocks.

* Supports include thumbnail/featured image for hero sections.

---

## **2\. Taxonomies**

| Taxonomy | Slug | Hierarchical | Purpose | Example Terms |
| ----- | ----- | ----- | ----- | ----- |
| Species | `species` | true | Classify Fish CPT by family/species type | Yellowfish, Bass, Tilapia |
| Habitat | `habitat` | true | Location or environment for fish | Tugela River, Huttenspruit, Drakensberg Streams |
| Gear Type | `gear_type` | true | Categorize gear by type | Rods, Reels, Baits, Lines |
| Story Category | `story_category` | true | Organize Stories by type | Fishing Trip, Tips & Tricks, Seasonal |
| Fishing Season | `season` | false | Assign fish to active seasons | Summer, Autumn, Winter, Spring |

**Notes:**

* Habitat is secondary to Species for filtering purposes.

* Fishing Season can also be used in filtering archives for Fish CPT.

---

## **3\. Custom Fields & Field Groups**

### **Fish CPT – `fish`**

**Field Group: Fish Details**

| Field | Key | Type | Required | Notes |
| ----- | ----- | ----- | ----- | ----- |
| Featured Image | `fish_featured_image` | Thumbnail | Recommended | Hero display |
| Description | `fish_description` | WYSIWYG | Yes | Species summary |
| Quick Facts | `fish_quick_facts` | Group / Repeater | Recommended | Scientific name, size, conservation, habitat, bait |
| Gallery | `fish_gallery` | Gallery | Optional | Max 12 images |
| Brandon’s Notes | `fish_personal_story` | WYSIWYG | Optional | Anecdotal insights |
| Related Fish | `fish_related` | Post Object / Relationship | Optional | Many-to-many |
| Admin Notes | `fish_admin_notes` | Textarea | Optional | Private, editor-only |

**Gear CPT – `gear`**  
 **Field Group: Gear Details**

| Field | Key | Type | Required | Notes |
| ----- | ----- | ----- | ----- | ----- |
| Featured Image | `gear_featured_image` | Thumbnail | Recommended | Hero or card display |
| Gear Type | `gear_type` | Taxonomy | Yes | Rod, Reel, Bait, Line |
| Compatible Species | `gear_species` | Post Object / Relationship | Optional | Link gear to Fish CPT |
| Specifications | `gear_specs` | Group | Yes | Weight, size, capacity, bait recommended |
| Description | `gear_description` | WYSIWYG | Yes | How to use / tips |
| Gallery | `gear_gallery` | Gallery | Optional | Max 8 images |
| Notes | `gear_notes` | Textarea | Optional | Extra tips |

**Stories CPT – `story`**  
 **Field Group: Story Details**

| Field | Key | Type | Required | Notes |
| ----- | ----- | ----- | ----- | ----- |
| Featured Image | `story_featured_image` | Thumbnail | Recommended | Hero section |
| Category | `story_category` | Taxonomy | Yes | Fishing Trip, Tips & Tricks |
| Related Fish | `story_related_fish` | Post Object / Relationship | Optional | Connect to Fish CPT |
| Related Gear | `story_related_gear` | Post Object / Relationship | Optional | Connect to Gear CPT |
| Story Body | `story_body` | WYSIWYG | Yes | Main content / narrative |
| Media | `story_media` | Gallery | Optional | Photos/videos from trips |
| Author Notes | `story_author_notes` | Textarea | Optional | Behind the scenes or personal tips |

---

## **4\. Post Type Relationships**

| Source CPT | Target CPT | Field Name | Relationship Type | Bidirectional | Notes |
| ----- | ----- | ----- | ----- | ----- | ----- |
| Gear | Fish | `gear_species` | Many-to-many | Yes | Connect gear to species it’s suited for |
| Stories | Fish | `story_related_fish` | Many-to-many | Yes | Links story to fish featured |
| Stories | Gear | `story_related_gear` | Many-to-many | Yes | Links story to gear used |

---

## **5\. Global Options Page**

**Fields:**

* Site-wide CTA text / links (`global_cta_text`, `global_cta_link`)

* Social Media Links (`social_facebook`, `social_instagram`, `social_youtube`, `social_tiktok`)

* Default Hero / Banner Image (`default_hero_image`)

* Default Meta / SEO (`default_meta_title`, `default_meta_description`)

* Branding tokens: colors and fonts (`primary_color`, `secondary_color`, `accent_color`, `font_heading`, `font_body`)

**Notes:**

* Centralizes site-wide content for editors.

* AI can use default values in content generation.

---

## **6\. Template Files & Block Theme Structure**

| Template File | Purpose |
| ----- | ----- |
| `single-fish.php` | Displays single Fish CPT post |
| `archive-fish.php` | Lists all Fish CPT entries |
| `taxonomy-species.php` | Lists Fish filtered by species |
| `taxonomy-habitat.php` | Lists Fish filtered by habitat |
| `single-gear.php` | Displays single Gear CPT post |
| `archive-gear.php` | Lists all Gear CPT entries |
| `taxonomy-gear_type.php` | Lists Gear filtered by type |
| `single-story.php` | Displays single Story CPT post |
| `archive-story.php` | Lists all Stories |
| `taxonomy-story_category.php` | Lists stories filtered by category |
| `parts/content-fish.php` | Reusable Fish content block |
| `parts/content-gear.php` | Reusable Gear content block |
| `parts/content-story.php` | Reusable Story content block |
| `patterns/*` | Hero, feature boxes, CTA sections, grids, galleries |

**Block Bindings:**

* Map each CPT field to blocks (Gutenberg / Site Editor) for visual editing.

* Include hero images, fact boxes, galleries, and related content loops.

* Patterns should support AI-assisted insertion and repeatable layouts.

---

## **7\. Editorial Workflow & Governance**

**Workflow Example:**

1. Add Fish species → assign Species taxonomy and Habitat → fill Quick Facts & Gallery → Personal Notes → Publish.

2. Add Gear → assign Gear Type → link compatible Fish → fill specifications and gallery → Publish.

3. Add Stories → assign Category → link Fish & Gear → Story Body & Media → Publish.

**Governance / QA:**

* Required fields: Fish Description, Gear Type, Story Body.

* Featured images recommended for hero.

* Habitat / Species taxonomies should be correctly applied.

* Related content reviewed for accuracy (Fish ↔ Gear ↔ Stories).

* REST exposure verified for headless / AI usage.

* Alt text and captions enforced for all images.

---

## **8\. Implementation Notes**

* CPTs and taxonomies registered with `show_in_rest: true` for headless / AI integration.

* Use ACF / SCF for field groups and relationship handling.

* Patterns registered in `patterns/` folder for consistent block usage.

* Ensure responsive behavior: hero images scale, fact boxes reflow, galleries support lightbox/grid.

* AI prompts can pull all field values, relationships, and taxonomy terms for content generation.

---

