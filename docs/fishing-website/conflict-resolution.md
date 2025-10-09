# AI Conflict Resolution Addendum
Brandon’s Fishing Adventures

Purpose: Provide MACHINE-FIRST rules so any AI agent can reconcile conflicting values across historical planning docs and produce consistent code, content, and assets for an outdoor, rivers & freshwater–focused fishing brand.

Effective Date: 2025-10-08  
Version: 1.0  
Status: Authoritative (override older references)

--------------------------------------------------
1. Canonical Identity
--------------------------------------------------
Brand Name: Brandon’s Fishing Adventures  
Primary Tagline (long): Stories from the river, catches for a lifetime.  
Short Utility Tagline (optional/minimal use): Catch the story.  
If any other tagline appears → mark DEPRECATED and replace with primary unless length constraints (<35 chars) justify short variant.

--------------------------------------------------
2. Canonical Design Tokens (High-Level)
--------------------------------------------------
Use the “River / Olive / Sand / Burnt Orange” system from colour-palette.md (NOT older style-guide primary set).
Mandatory core tokens:
- Base (background): #FFFFFF
- Contrast (text): #111111
- Primary (brand core / river blue-green): #3A6B68
- Olive band: #6B7C3A (deep) + supporting lighter tints (accent-600…accent-800)
- Burnt Orange accent: #E58F5C (primary CTA); #C06028 (strong / hover / emphasis)

If a document lists:
- #1B4F72 (old primary) → Map to accent-400 (#4D9590) or ignore if duplication.
- #D35400 (old orange) → Map to accent-1300 (#C06028) or accent-1200 (#E58F5C) depending on contrast need.
Retain only the palette defined in colour-palette.md (plus neutrals 0–900). Remove duplicates from theme.json.

Typography (final trio):
- Headings: Montserrat
- Body / Narrative: Lora
- UI / Microcopy / Forms: Open Sans
If Playfair Display, Inter, Raleway, Merriweather appear → treat as ALTERNATIVES ONLY; do not implement.
Font Loading: Limit to weights:
- Montserrat 600,700
- Lora 400,400i
- Open Sans 400,600
Use font-display: swap.

Spacing:
Use spacing-10 … spacing-100 scale (4px → 96px) from spacing.md. Ignore any alternate spacing enumerations.

--------------------------------------------------
3. Content Model Authority Order
--------------------------------------------------
When conflicting field, taxonomy, or key definitions appear, apply this precedence:
1. This Addendum (latest explicit override)
2. content-model.md
3. Individual CPT templates (fish-post-type.md, gear-post-type.md, stories-post-type.md)
4. Framework content docs (fish-content.md, gear-content.md, stories-content.md)
5. website-structure.md / website-brief.md
6. style-guide.md (design-only)
7. brand-guide.md / taglines.md (identity supporting)

Do NOT merge older/legacy structures if they differ—choose canonical and log deprecations.

--------------------------------------------------
4. Taxonomy Canonical Set
--------------------------------------------------
Final slugs:
- species (hierarchical) → Fish family/types (Yellowfish, Bass, Tilapia, Catfish, Tigerfish, Other River Fish)
- habitat (hierarchical) → Geographic / environmental locations (Huttenspruit, Tugela River, Drakensberg Streams, Coastal Estuaries)
- season (non-hierarchical) → (Summer, Autumn, Winter, Spring, All-year, Early-season, Late-season)
- gear_type (hierarchical) → Rod, Reel, Line, Lure, Bait, Accessory
- story_category (hierarchical) → Adventure, Conservation, Tips & Tricks, Seasonal (merge “Story Type” / “Story Category” synonyms here)

DEPRECATIONS:
- fish_type (if encountered) → Map to species taxonomy usage or ignore if redundant.
- story_type → Use story_category

If both “Species” and “Fish Type” appear: keep species (slug = species); discard fish_type unless a parent grouping is specifically required (then species parent terms can hold groups).

--------------------------------------------------
5. Field Key Resolution
--------------------------------------------------
Prefix rules:
- Fish meta keys start with fish_
- Gear meta keys start with gear_
- Story meta keys start with story_

Canonical keys (subset—additive expansions allowed if not contradictory):
Fish:
- fish_description
- fish_quick_facts (Repeater/Group)
- fish_gallery
- fish_fishing_season
- fish_average_size
- fish_preferred_bait
- fish_conservation_status
- fish_fun_fact
- fish_personal_story
- fish_related (post object)
- fish_admin_notes (private)

Gear:
- gear_description
- gear_gallery
- gear_specifications (Repeater/Group) (If gear_specs found, rename to gear_specifications)
- gear_usage_tips
- gear_target_fish (post object OR taxonomy mapping—prefer post object; if gear_species key appears, map to gear_target_fish)
- gear_availability
- gear_admin_notes (private)

Story:
- story_summary
- story_main
- story_gallery
- story_related_fish
- story_related_gear
- story_date
- story_location
- story_admin_notes (private)

Migration / Mapping:
- story_body → story_main
- gear_species → gear_target_fish
- gear_specs → gear_specifications
- story_type → story_category taxonomy term assignment
- fish_featured_image / gear_featured_image / story_featured_image are implied by core Featured Image; ignore as separate meta fields.

Reject any keys containing spaces, uppercase, or lacking prefixes. If AI sees unknown key with obvious meaning (e.g., fish_conservation), extend to fish_conservation_status.

--------------------------------------------------
6. Pattern Naming & Slugs
--------------------------------------------------
All pattern slugs must start with bfa/.
Core required slugs:
- bfa/fish-hero
- bfa/gear-single
- bfa/story-single
- bfa/cta-banner
- bfa/card-grid
If variants detected (fish-hero-section, single-fish-hero), normalize to bfa/fish-hero.

--------------------------------------------------
7. Decision Heuristics for Ambiguity
--------------------------------------------------
If multiple candidate values exist:
A) Color chosen = one closest to natural outdoor river palette (greens/blue-green + warm sand neutrals).  
B) Font chosen = Montserrat/Lora/Open Sans trio unless explicit directive to explore alternates for a redesign version.  
C) Tagline conflict → Always use long primary unless a max-length constraint (<35 chars) is explicitly stated (then use short).  
D) Field duplication (fish_average_size vs fish_size) → Prefer the more descriptive key (fish_average_size).  
E) Relationship modeling (taxonomy vs post object) → Choose post object relationship if the purpose is contextual linking rather than classification (related fish, related gear).  
F) If a taxonomy term duplicates a field (e.g., season + fish_fishing_season), keep taxonomy for filtering; field can exist only if it carries extra nuance (e.g., “Early/Late season note”).  
G) If accessibility or SEO guidance conflicts (e.g., multiple H1 suggestions), enforce single visible H1; convert extras into H2+.

--------------------------------------------------
8. Output Consistency Rules for AI
--------------------------------------------------
When generating files:
- theme.json: Include ONLY canonical palette & fonts; remove deprecated color tokens (#1B4F72, #D35400) unless remapped to accent sets.
- CPT registration: show_in_rest = true, rest_base matches slug.
- Taxonomy registration: show_in_rest = true; label names = Title Case; slugs = lowercase-hyphen.
- Patterns: Use semantic block comments or valid block JSON; include placeholder dynamic bindings (e.g., <!-- wp:post-title {"level":1} /-->).
- Alt Text: Must describe subject + context (e.g., “Angler holding Smallmouth Yellowfish at Huttenspruit”).
- Internal Links: For any new fish story or gear item, link to at least one related CPT entry if it exists.

--------------------------------------------------
9. Conflict Logging
--------------------------------------------------
If AI resolves a conflict, append an entry to /docs/decisions/CHANGELOG.md (create if absent):
Format:
YYYY-MM-DD | Type: conflict-resolution | Item: {context} | Chosen: {value} | Replaced: {value(s)} | Rationale

AI SHOULD NOT pause for human confirmation for low-risk normalizations (palette, font, field key spelling) but SHOULD flag high-impact structural changes (removing a taxonomy entirely) in the changelog and optionally in PR description.

--------------------------------------------------
10. Validation Checklist (AI Self-Check Before Output)
--------------------------------------------------
- Palette count matches colour-palette.md (Base + Contrast + Primary + neutrals + accent bands).
- No deprecated font families present.
- All meta keys conform to prefix & snake_case.
- All taxonomy slugs present and no unexpected extras.
- Single tagline used per artifact (unless demonstrating both with explicit labels).
- Patterns use canonical slugs.
- theme.json passes JSON lint & contains version property.
- File names are lowercase, hyphenated (no spaces).

--------------------------------------------------
11. Sample Prompt for AI Applying These Rules
--------------------------------------------------
“Using docs/decisions/AI-conflict-resolution-addendum.md as the authoritative conflict policy, generate theme.json with only the canonical palette (river/olive/neutral/burnt orange) and typography (Montserrat, Lora, Open Sans). Omit legacy colors (#1B4F72, #D35400) or map them according to the addendum. Confirm spacing scale spacing-10..spacing-100 is present.”

--------------------------------------------------
12. Non-Overridable Principles
--------------------------------------------------
- Accessibility (WCAG AA) > stylistic legacy
- Canonical palette > historical palette drafts
- Consistent field keys > incidental variations
- Single H1 per document > multiple decorative headings
- Outdoor fishing brand authenticity > arbitrary aesthetic deviations

--------------------------------------------------
13. Future Extension Notes
--------------------------------------------------
If dark mode introduced, add a dark override table here (version bump → 1.1) instead of scattering guidance in other docs.

--------------------------------------------------
14. Summary
--------------------------------------------------
This addendum unifies previously fragmented decisions. Any pre-existing divergence must resolve to these canonical definitions. All new AI-generated outputs MUST cite or inherit from this file first.

--- END ---