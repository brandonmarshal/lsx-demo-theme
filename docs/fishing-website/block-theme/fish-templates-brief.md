# Fish — Content Model (Brandon)

This document describes the content model (no PHP) for Brandon’s Fish species Custom Post Type (CPT). It covers: CPT configuration, suggested taxonomy, and Secure Custom Fields (SCF) field group definitions (field names / types / validation / admin placement / REST notes). All meta keys follow the pattern: fish_<field_name>.

Rationale summary
- Purpose: A compact field‑guide style CPT where each post represents a fish species/type (not each catch).  
- UX goal: quick-to-edit, readable single entries with optional personal story.  
- Performance: keep many fields simple (select/text/number). Use taxonomies for shared/location terms to enable archives and filters.

────────────────────────────────────────
A) Custom Post Type (logical config)
────────────────────────────────────────

- Post type key (slug): fish
- Singular label: Fish
- Plural label: Fish (or Fish Species)
- Description: One entry = one fish species/type (field‑guide entry).
- Supports: title, editor, excerpt, thumbnail (featured image), revisions, author
- Menu icon: dashicons-admin-site-alt3 (suggestion) — choose any dashicon
- Public: true
- Has archive: true
- Archive slug / rewrite: fish
- show_in_rest: true (important for block themes / headless usage)
- REST base: fish
- Capability_type: post (default) — optional custom caps if you require role separation
- Hierarchical: false
- Admin help text: Add concise instructions in the field group to remind editors this is species-level (not catch logs).

Notes / trade-offs:
- Keep it simple: no complex nested repeaters unless Brandon wants to store many measurement records.
- Use taxonomy for locations/habitats so they can be used in archive pages and admin filters.

────────────────────────────────────────
B) Taxonomy: Habitat / Locations
────────────────────────────────────────

- Taxonomy label: Habitat
- Taxonomy slug: habitat
- Description: Regions or named locations where a species is usually found (e.g., Huttenspruit, Tugela River, Drakensberg streams).
- Hierarchical: true (allows parent > child e.g., Country > River > Pool)
- Show in REST: true
- Public: true
- Rewrite slug: habitat
- Attach to: fish (can optionally attach to other CPTs later)
- Admin UI: show as meta box / sidebar in block editor
- Initial terms (examples): Tugela River, Huttenspruit, Drakensberg Streams, Coastal Estuaries
- Translations: Mark taxonomy as translatable in WPML/Polylang if site is multilingual.

Rationale:
- Using a taxonomy allows archive pages and filtering (Query Loop) by habitat and helps editors reuse location terms instead of freeform text.

Optional Taxonomy: Fish Type / Group
- If you want to group by ecological type (river fish, lake fish, saltwater predator), add a non‑hierarchical taxonomy `fish_type` (slug fish_type). Attach to fish. This can power "Related fish" filters.

────────────────────────────────────────
C) SCF Field Group: Fish Details (field definitions)
────────────────────────────────────────

Field group name: Fish — Details  
Location rule: Post Type is equal to fish  
Show in REST: true (enable per-field REST exposure where supported)

Admin layout suggestion (use Tabs):
- Tab: Hero
- Tab: Gallery
- Tab: Details
- Tab: Personal / Story
- Tab: Relations / Admin

Field naming convention: fish_<snake_case_name>

Fields (ordered and with technical details)

1) Featured Image
- Label: Featured Image (post thumbnail)
- Storage: Use WP Featured Image (thumbnail); not a meta field.
- Required: recommended yes (for hero display)
- Notes: enforce in editorial QA (SCF can't force featured image unless using validation).

2) fish_gallery
- Label: Gallery
- Key / meta: fish_gallery
- Field type: Gallery (SCF image gallery)
- Instructions: Optional — multiple images (habitat photos, angles)
- Return format: array of attachment IDs (or objects if preferred)
- Required: no
- Validation: max 12 images (optional)
- show_in_rest: true

3) fish_description
- Label: Description
- Key: fish_description
- Field type: WYSIWYG (or textarea if you prefer plain text)
- Instructions: Short species summary — identification, distinguishing features
- Required: yes (recommended)
- Default: empty
- show_in_rest: true
- Validation: recommend min 20 characters

4) fish_quick_facts (grouped subfields or single repeatable list)
- Label: Quick Facts (presented in a highlighted box)
- Key: fish_quick_facts
- Field type: Group (or Repeater if you want flexible key/value pairs)
- Subfields (if Group):
  - fish_common_name (Text) — optional additional common names (comma-separated) OR use a Repeater field of name/value
  - fish_scientific_name (Text) — optional
  - fish_conservation_status (Select) — see below
  - fish_average_size_value (Number) — numeric
  - fish_average_size_unit (Select) — options: cm, kg, in, lb
- Required: scientific_name optional; conservation status recommended
- show_in_rest: true

5) fish_habitat (taxonomy picker)
- Label: Habitat / Locations
- Key: fish_habitat
- Field type: Taxonomy field (select / multi-select) — taxonomy = habitat
- Return format: Term IDs (or Term objects)
- Multiple: yes
- Required: no
- show_in_rest: true
- Admin UX: allow creation of new terms from editor (optional — may limit to admins to avoid duplicates)

6) fish_fishing_season
- Label: Fishing Season
- Key: fish_fishing_season
- Field type: Select (or Text with seasonal notes)
- Options: Custom list — allow editor to pick one or multiple:
  - All year
  - Summer (Dec–Feb) — example
  - Autumn
  - Winter
  - Spring
  - Early season / Late season (or allow custom)
- Multiple: allow multiple selections (use select with multiple)
- Instructions: Use ranges if specific months are important
- Required: no
- show_in_rest: true

7) fish_average_size (group)
- Label: Average Size
- Key: fish_average_size (group)
- Option A (preferred for structured data): Group with:
  - fish_average_size_value (Number)
    - min: 0
    - step: 0.1
    - validation: numeric only
  - fish_average_size_unit (Select): options cm, kg, in, lb
- Option B (simple): Single text field "Average Size" if structured numbers aren’t needed
- Required: no
- show_in_rest: true

8) fish_preferred_bait
- Label: Preferred Bait / Lure
- Key: fish_preferred_bait
- Field type: Text (single line) or Select for common options + custom
- Instructions: Keep it short (e.g., "surface popper, live bait")
- Required: no
- show_in_rest: true

9) fish_conservation_status
- Label: Conservation Status
- Key: fish_conservation_status
- Field type: Select (single select)
- Options (slugs / labels):
  - common (Common)
  - protected (Protected)
  - threatened (Threatened)
  - endangered (Endangered)
- Default: common
- Required: yes (recommended)
- show_in_rest: true
- Rationale: kept as select for simplicity; if you need rich term metadata or cross-CPT filters, consider making this a taxonomy `conservation_status`.

10) fish_fun_fact
- Label: Fun Fact
- Key: fish_fun_fact
- Field type: Text (single line) — short, optional
- Max length: 200 chars (validation)
- Required: no
- show_in_rest: true

11) fish_personal_story
- Label: Brandon’s Note / Personal Story
- Key: fish_personal_story
- Field type: WYSIWYG (or Textarea)
- Instructions: Personal anecdotes, typical behaviour, tips — optional but encouraged
- Required: no
- show_in_rest: true
- Presentation: Appears below the main details as longer-form narrative

12) fish_related (relationship)
- Label: Related Fish
- Key: fish_related
- Field type: Post Object / Relationship
- Post types allowed: fish
- Return format: Post IDs (recommended)
- Multiple: yes (many‑to‑many)
- Ordering: allow manual ordering
- Required: no
- show_in_rest: true
- Notes: Consider implementing bidirectional syncing if you want reverse references automatically updated (SCF can support bidirectional relationships via helper functions/plugins). If not, keep single-direction editorial control for simplicity.

13) admin_notes (hidden)
- Label: Admin Notes
- Key: fish_admin_notes
- Field type: Message or Textarea (private)
- Location: admin only (use field group option to hide from REST)
- Purpose: internal editorial reminders, sourcing references
- show_in_rest: false

Optional fields (if needed later)
- fish_threats (Repeater): list of threats with severity
- fish_regulations (WYSIWYG): notes about protected seasons/permits
- fish_measurements (Repeater): if Brandon wants to log typical weight/length ranges with source

────────────────────────────────────────
D) Validation & UX details
────────────────────────────────────────

- Meta key naming:
  - Use fish_<field_name> (snake_case). Example: fish_preferred_bait
- Required fields:
  - fish_description (recommended)
  - fish_conservation_status (recommended)
- Validation rules:
  - Numbers: min 0, reasonable max (for size) set by project
  - Text lengths: describe max lengths for short fields (e.g., fun fact 200 chars)
- Field grouping:
  - Use Tabs to keep the edit screen compact
  - Place critical fields (description, conservation status, habitat) in the top tab
- Defaults:
  - conservation_status default "common"
  - size unit default "cm"
- REST and Headless:
  - Ensure show_in_rest is true for CPT and fields (or explicit SCF setting to expose postmeta)
  - Return formats: use IDs for relationships and attachment objects for images if front-end needs sizes

────────────────────────────────────────
E) Block theme & templates (where fields surface)
────────────────────────────────────────

Template suggestions (block-theme friendly):
- single-fish.html
  - Hero: Post Featured Image block + Post Title (H1)
  - Intro: dynamic blocks or Post Custom Field blocks for fish_description or bound block (if using Block Bindings)
  - Quick Facts pattern: small list pattern pulling fish_quick_facts subfields
  - Gallery: Gallery block (bind to fish_gallery)
  - Details grid: taxonomy list (Habitat), fishing season, average size, preferred bait
  - Story: render fish_personal_story WYSIWYG
  - Related: Query Loop block filtered by selected fish_related or taxonomy
- archive-fish.html
  - Query Loop showing featured image, title, habitat terms, short excerpt or fish_description excerpt
- taxonomy-habitat.html
  - Shows list of species assigned to habitat term

Block binding notes:
- If you use Block Bindings (experimental), bind H1 to post title, Image to featured image, Gallery to fish_gallery, and text blocks to fish_description / fish_personal_story to allow editing in the Site Editor.

────────────────────────────────────────
F) Governance & QA (short checklist)
────────────────────────────────────────

- Required fields filled: description, conservation status
- Featured image present for hero display
- Habitat assigned where known (encourage editors to reuse terms)
- Average size uses numeric value + unit
- Related fish reviewed for correctness (no circular duplicates)
- REST exposure verified (fetch a sample post via /wp-json/wp/v2/fish)
- Accessibility: all images have alt text (encourage editor to add via Media Library); gallery captions supported
- SEO: ensure excerpt or meta description provided when needed (could add an options page field for default meta templates)

────────────────────────────────────────
G) Migration / Backfill notes
────────────────────────────────────────

- If converting from an existing list of fish (spreadsheet or posts):
  - Map existing columns to fish_* meta keys
  - Habitat values → create taxonomy terms and attach post terms
  - Images → import into Media Library and set featured image/media IDs
- Export / import: SCF local JSON or create-content-model JSON can be used to export the field group definitions for deployment

────────────────────────────────────────
H) Quick example values (sample for one species)
────────────────────────────────────────
- Post title: Smallmouth Yellowfish
- Featured image: (attachment ID 1234)
- fish_description: "A robust river species found in rocky rapids..."
- fish_habitat: [Tugela River, Huttenspruit]
- fish_fishing_season: ["Summer", "Autumn"]
- fish_average_size_value: 45
- fish_average_size_unit: cm
- fish_preferred_bait: "small surface poppers, nymphs"
- fish_conservation_status: protected
- fish_fun_fact: "Known to leap when hooked"
- fish_personal_story: "Caught my first one in 2018 on a stormy morning..."

────────────────────────────────────────
I) Final thoughts / Trade-offs & optional improvements
────────────────────────────────────────
- Conservation Status: select field is quick; switch to taxonomy if you want term pages or programmatic management.
- Habitat: taxonomy is recommended to support archive/filter UX.
- Related fish: Post Object gives editorial control but adds manual work — you can also auto-suggest via shared taxonomies.
- If Brandon likes writing inline (blocks), consider Block Bindings for more visual editing — otherwise keep SCF groups for a tidy meta experience.

If you want, I can:
- produce a concise CSV or JSON mapping (field label → meta_key → field type → validation) for import,
- or convert this into SCF JSON (local field group export) for deployment — you said no PHP, but I can prepare SCF JSON if helpful.