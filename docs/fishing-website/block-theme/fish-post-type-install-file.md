# Fish CPT + Secure Custom Fields — Install & Use Guide

This document explains how to install and use the Fish custom post type plugin and Secure Custom Fields (SCF) field group JSON. It describes two deployment options (recommended), how the files should be placed, verification steps, troubleshooting, and next steps.

---

## What you get
- A small plugin that registers:
  - CPT `fish`
  - Taxonomies: `habitat`, `region`, `fish_type`, `conservation_status`
  - Optional filter so SCF loads local JSON from the plugin `acf-json/` folder
- An SCF/ACF-style JSON field group file: `group_fish_details.json` (field keys use the `fish_` prefix)
- Optional PHP local field group alternative (acf_add_local_field_group) if you prefer code-managed fields

---

## Quick answer: do you need JSON files?
- No, not strictly:
  - You can create the field group manually in SCF admin.
  - Or register the field group in PHP using `acf_add_local_field_group()` (code-based).
- Yes, recommended:
  - Using SCF local JSON (saved in `acf-json/`) is the easiest, repeatable, version-controllable approach and is recommended for staging/production workflows.

---

## Option A — Recommended: Plugin drop-in with local JSON (no manual import)
1. Create plugin folder:
   - `wp-content/plugins/lsw-fish-species/`

2. Add plugin PHP (register CPT & taxonomies and add SCF JSON load paths)
   - File: `wp-content/plugins/lsw-fish-species/lsw-fish-species.php`
   - Purpose: registers `fish` CPT, taxonomies, and adds `acf-json` folder to SCF load/save paths.

3. Add JSON field group(s)
   - Create folder: `wp-content/plugins/lsw-fish-species/acf-json/`
   - Put `group_fish_details.json` into this folder.

4. Install and activate Secure Custom Fields (SCF)
   - Admin → Plugins → Add New → Search “Secure Custom Fields” → Install & Activate
   - Or upload SCF plugin zip and activate
   - Alternatively, install SCF via Composer if you manage dependencies that way.

5. Activate the Fish plugin
   - Admin → Plugins → Activate “LSW Fish Species”
   - The plugin registers CPT/taxonomies. SCF auto-loads the JSON field group from the plugin `acf-json/` folder.

6. Create initial taxonomy terms and test:
   - Admin → Habitats / Regions → Add sample terms
   - Admin → Fish → Add New → confirm SCF fields appear

Notes:
- If SCF isn’t active when activating the plugin, fields will appear once SCF is installed and detects the JSON.
- The plugin can flush rewrite rules on activation so permalinks work.

---

## Option B — Manual import or PHP local field groups
- Manual JSON import:
  1. Activate SCF.
  2. Admin → Secure Custom Fields → Tools → Import JSON → Upload `group_fish_details.json`.
  3. Activate Fish plugin (or register CPT by code separately).

- PHP local field group:
  - Place a PHP file (uses `acf_add_local_field_group`) in your plugin or theme and include it on `acf/init`.
  - This registers the field group in code (edits via admin are disabled by default and JSON import is not required).

When to choose PHP vs JSON:
- JSON: best for editors and version control; fields can be edited by admin and exported again.
- PHP: best for developer-controlled projects where fields should not be changed in admin.

---

## Files you should have (example structure)
- lsw-fish-species/
  - lsw-fish-species.php
  - acf-json/
    - group_fish_details.json
  - includes/ (optional)
    - fields-fish.php (PHP local group alternative)

Place the plugin folder under `wp-content/plugins/` and activate via WP admin.

---

## How to generate the JSON (if not provided)
1. Create the field group in SCF admin (Custom Fields → Add New).
2. Configure fields and location rules (Post Type == fish).
3. Save the field group.
4. Export JSON:
   - SCF → Field Groups → select the group → Tools or Export → Download JSON.
5. Save JSON in plugin `acf-json/` (or theme `acf-json/`) so SCF auto-loads it.

I can also generate the JSON for you if you'd like — say “Generate JSON now” and I will produce the field-group JSON file.

---

## Verification checklist
- CPT & taxonomies
  - Fish post type shows in WP Admin menu
  - Taxonomy menus: Habitats, Regions, Fish Types, Conservation Status exist
- Fields appear
  - Edit a Fish post → SCF field group visible with fields like `fish_description`, `fish_gallery`, `fish_primary_image`, etc.
- REST API
  - Visit: `https://your-site/wp-json/wp/v2/fish` — data should return (CPT `show_in_rest: true`)
- Permalinks
  - If custom slugs return 404, go to Settings → Permalinks → Save to flush rules (activation already does this).
- Images & gallery
  - Add image(s) and save; confirm attachments are stored and postmeta present (`get_post_meta()`).
- Block theme templates (optional)
  - If using block theme, place `single-fish.html` and `archive-fish.html` in the theme root and bind blocks to post meta if using block bindings.

---

## Troubleshooting
- Fields not appearing:
  - Ensure SCF plugin active.
  - JSON valid? (no trailing commas). Use the SCF import UI to validate.
  - If using PHP local group: ensure `acf_add_local_field_group()` runs on `acf/init`.
- CPT archive 404:
  - Flush permalinks (Settings → Permalinks → Save).
- REST missing custom fields:
  - Confirm `show_in_rest` is true on CPT and SCF field group `show_in_rest` is enabled.
  - Check SCF rest helpers or expose postmeta in REST responses if needed.
- Admin menu not visible for SCF (if hidden):
  - Plugin may be hiding SCF admin menu via `acf/settings/show_admin` filter — remove that filter to reveal SCF UI.

---

## Security & governance tips
- Capabilities: leave default caps or define custom caps if you need granular role access to Fish content.
- Validation: use SCF's validation (required, min/max, regex) for numeric and text fields.
- Limit post_object pickers: limit search results and set sensible limits for performance.
- When bundling SCF into a plugin/theme and hiding the SCF admin, remember you are responsible for updates.

---

## Quick add-ons & next steps I can help with
- Generate the `group_fish_details.json` file for you now.
- Package everything as a zip plugin ready for WP install.
- Produce the PHP `acf_add_local_field_group()` file instead of JSON.
- Create a CSV import script to bulk-import fish entries and images.
- Provide sample `single-fish.html` and `archive-fish.html` block templates with Block Bindings notes.

---

If you'd like me to generate the JSON file and plugin zip now, reply:
- “Generate JSON” — I will output the JSON file contents.
- “Build plugin zip” — I will prepare the plugin files and give you instructions to zip and install.