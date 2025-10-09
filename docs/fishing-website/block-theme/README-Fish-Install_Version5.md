# Fish CPT + Secure Custom Fields — Theme Install & Usage Guide

This guide explains how to install the Fish content model in the lsx-demo-theme (theme-level registration; no plugin required). It includes where to place files, how SCF (Secure Custom Fields) integrates, and verification steps.

What is included
- Updated theme functions.php (registers `fish` CPT, `species` and `location` taxonomies, and integrates SCF local JSON/PHP loading)
- Theme local JSON field group: `acf-json/group_fish_details.json`
- PHP fallback field group: `includes/fields-fish.php` (registers the same field group via `acf_add_local_field_group()`)

Recommended approach
- Use the JSON file in `acf-json/` (SCF will auto-detect local JSON). Keep the PHP fallback for environments where you prefer code registration.

Install steps
1. Place files in the theme
   - Copy the updated `functions.php` to your theme root (replacing the existing functions.php if necessary).
   - Create a folder `acf-json/` at the theme root and add `group_fish_details.json`.
   - Create a folder `includes/` at the theme root and add `fields-fish.php`.

   Final structure:
   - wp-content/themes/lsx-demo-theme/functions.php
   - wp-content/themes/lsx-demo-theme/acf-json/group_fish_details.json
   - wp-content/themes/lsx-demo-theme/includes/fields-fish.php

2. Install Secure Custom Fields (SCF)
   - WP Admin → Plugins → Add New → Search "Secure Custom Fields" → Install & Activate
   - Or install via Composer per SCF docs.

3. Activate theme (or re-activate)
   - Switch to the lsx-demo-theme in Appearance → Themes, or if already active, re-activate to ensure rewrite rules and other hooks run.

4. Confirm SCF picks up JSON
   - SCF automatically loads local JSON found in theme `acf-json/`. The theme functions.php adds the theme acf-json path to SCF load/save paths.
   - If you prefer code-managed fields, SCF will use the PHP fallback in `includes/fields-fish.php` (loaded via acf/init).

5. Create initial terms (optional)
   - WP Admin → Species or Locations and add some example terms (e.g., "Yellowfish", "Huttenspruit").

6. Test creating Fish posts
   - WP Admin → Fish Species → Add New
   - Confirm the custom fields appear: Scientific name, Common names repeater, Primary image, Gallery, Description, Quick facts, Size fields, Season, Conservation status, Related species, Personal story, etc.
   - Save a post and verify fields persist.

REST API
- The CPT is registered with show_in_rest = true. Test:
  - GET /wp-json/wp/v2/fish should return published fish posts.

Notes & troubleshooting
- Fields not visible:
  - Ensure SCF plugin is active.
  - Confirm JSON is valid (no trailing commas). If SCF is active, check Custom Fields → Field Groups; the Fish group should be listed.
  - If using PHP fallback, ensure `acf_add_local_field_group` exists and the `includes/fields-fish.php` file is present.

- Permalinks 404:
  - Settings → Permalinks → Save to flush rewrite rules.

- Hiding SCF admin:
  - If you bundle SCF with Composer and hide the admin UI via filters, remember to re-enable it for debugging/importing.

Customization
- If you prefer different taxonomy slugs (e.g., `habitat` instead of `location`) update:
  - functions.php taxonomy registration
  - JSON `taxonomy` references (group_fish_details.json)
  - includes/fields-fish.php taxonomy references

Want me to package this into a zip?
- I can generate a ready-to-install theme zip containing the updated files. Reply: "Build zip" and I'll prepare it for download.

If you want the JSON or PHP field group changed (extra fields, different keys, or REST exposure tweaks), tell me the changes and I'll update the files.