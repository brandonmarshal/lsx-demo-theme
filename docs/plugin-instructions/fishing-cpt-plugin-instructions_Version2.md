## 🧩 **Final Copilot Prompt / Scope for “Fishing CPT Plugin”**

> ### 🎯 **Goal**
>
> Create a **WordPress plugin** named **“Fishing CPT Plugin”** that registers and manages multiple custom post types for a fishing website.
> The plugin should contain:
>
> * All PHP functionality for registering **custom post types**
> * Secure **custom fields (meta fields)**
> * **Block bindings** and **patterns** for the block editor
> * A **settings page** for plugin configuration
> * A clean, organized folder structure ready for ZIP deployment and auto-deploy.
>
> ---
>
> ### 📁 **Folder Structure**
>
> ```
> fishing-cpt-plugin/
> ├── fishing-cpt-plugin.php
> ├── includes/
> │   ├── cpt-fish.php
> │   ├── cpt-gear.php
> │   ├── cpt-stories.php
> │   ├── meta-fields.php
> │   ├── blocks.php
> │   └── settings-page.php
> ├── patterns/
> │   ├── fish-pattern.json
> │   ├── gear-pattern.json
> │   └── stories-pattern.json
> └── README.md
> ```
>
> ---
>
> ### 🧱 **Main Plugin File: `fishing-cpt-plugin.php`**
>
> * Plugin header with metadata:
>
>   ```php
>   /**
>    * Plugin Name: Fishing CPT Plugin
>    * Description: Registers custom post types, blocks, patterns, and custom fields for the fishing website.
>    * Version: 1.0.0
>    * Author: [Your Name]
>    */
>   ```
> * Include all files from `/includes` and `/patterns`
> * Add activation/deactivation hooks if necessary
> * Use `add_action('init', ...)` for CPT and meta registration
>
> ---
>
> ### 🐟 **Custom Post Types**
>
> Create three CPTs:
>
> 1. **Fish**
>
>    * Slug: `fish`
>    * Supports: `title`, `editor`, `thumbnail`, `custom-fields`
>    * Has archive: `true`
>    * Menu icon: `dashicons-palmtree`
> 2. **Gear**
>
>    * Slug: `gear`
>    * Supports: same as above
>    * Menu icon: `dashicons-hammer`
> 3. **Stories**
>
>    * Slug: `stories`
>    * Supports: same as above
>    * Menu icon: `dashicons-book`
>
> Each CPT should be registered in its own PHP file under `/includes`.
>
> ---
>
> ### 🔐 **Custom Fields / Meta**
>
> * Register meta fields using `register_post_meta()` for each CPT.
> * Include basic examples:
>
>   * **Fish**: water_type, average_size, bait_type
>   * **Gear**: brand, gear_type, price
>   * **Stories**: location, weather_conditions, catch_success
> * Add sanitization and `auth_callback` for each field.
> * Use `show_in_rest => true` for Gutenberg/block editor integration.
>
> ---
>
> ### 🧩 **Block Bindings & Patterns**
>
> * Add a `blocks.php` file that registers any reusable blocks for displaying Fish, Gear, or Stories data.
> * Example block names:
>
>   * `fishing/fish-card`
>   * `fishing/gear-card`
>   * `fishing/story-card`
> * Each block should be bindable to meta fields (e.g., display fish name, bait type, or size).
> * Add block patterns in `/patterns/*.json` that reference these blocks.
> * Patterns should include layout examples for each CPT (e.g., grid of fish cards).
>
> ---
>
> ### ⚙️ **Settings Page**
>
> * Add a top-level **“Fishing CPT Settings”** page under “Settings” in the admin dashboard.
> * Use `add_options_page()`
> * Include example fields (e.g., enable/disable CPTs, default number of posts per page)
> * Store options with `update_option()` / `get_option()`
>
> ---
>
> ### 🧱 **Security & Standards**
>
> * Use `esc_html()`, `sanitize_text_field()`, and `wp_verify_nonce()` where appropriate.
> * All CPTs, fields, and blocks must be **namespaced** with `fishing_` or `fishing/` prefixes.
> * Code must comply with **WordPress Coding Standards (WPCS)**.
>
> ---
>
> ### 📦 **Deployment**
>
> * The plugin should be fully self-contained and functional when zipped.
> * Chris (the team member) will handle deployment via auto-deploy to the staging site.
> * Ensure all includes and paths are relative using `plugin_dir_path(__FILE__)`.
>
> ---
>
> ### ✅ **Deliverables**
>
> 1. A functional plugin folder `fishing-cpt-plugin` with all required files.
> 2. Ready to zip and upload to WordPress.
> 3. When activated, the WordPress admin should show:
>
>    * “Fish”, “Gear”, and “Stories” menus.
>    * “Fishing CPT Settings” under Settings.
>    * Custom fields available in block editor.
>    * Example block patterns visible in “Patterns”.
>
> ---
>
> ### 🧠 Optional Enhancements
>
> * Add REST API endpoints for each CPT.
> * Add template parts (`single-fish.php`, etc.) inside `/templates/`.
> * Include localized strings using `__()` and `load_plugin_textdomain()` for translations.
>
> ---
>
> ### 💬 Tip
>
> Once you paste this prompt into Copilot Chat (or VS Code’s inline AI), tell it:
>
> > “Generate all plugin files and code based on the above structure.”
>
> Then you can review and test everything locally by zipping and uploading it to your WordPress site.
>
> ---
+---
+## ➕ Extended Scope Additions (Do NOT remove or alter prior sections)
+
+The following enhancements are ADDED to the existing scope. All original instructions remain unchanged. Copilot should incorporate these extra features while preserving everything above.
+
+### 1. Repeatable Field Block
+Implement a custom dynamic block that surfaces a repeatable (multi-value) meta field for a CPT (start with Fish).  
+Details:
+* Meta storage: single post meta key `fish_facts` containing a JSON array of fact strings (e.g. `["Lives near reefs","Nocturnal","Migratory"]`).
+* Register meta with `register_post_meta( 'fish', 'fish_facts', [ 'single' => true, 'type' => 'string', 'show_in_rest' => true, 'sanitize_callback' => 'fishing_sanitize_json_array', ... ] )`.
+* Provide a sanitization helper that:
+  * `json_decode` → ensure array of strings → re-`json_encode`.
+  * Strips tags and trims each item.
+* Block name: `fishing/repeatable-facts`.
+* UI behavior:
+  * Editor displays a list with “Add Fact” button.
+  * Each fact editable in an input, removable.
+  * On change → update block attribute → sync to meta via block binding.
+* Block binding:
+  * Use block bindings API (`block.json` `"usesContext": ["postId"]`) and register a binding to the `fish_facts` meta.
+  * Front-end render callback decodes JSON and outputs `<ul class="fish-facts">` list with `esc_html` each item.
+* Fallback: If meta empty, show placeholder “No facts added yet.”
+
+Folder additions (append, do not modify original structure snippet):
+```
+fishing-cpt-plugin/
+└── blocks/
+    ├── repeatable-facts/
+    │   ├── block.json
+    │   ├── edit.js
+    │   └── render.php
+```
+
+### 2. Multi-Block Plugin Expansion
+Ensure the plugin registers multiple block types beyond the original cards:
+* Blocks directory for each:
+  * `fish-card`, `gear-card`, `story-card`, `repeatable-facts`, plus future extensibility.
+* Each block has:
+  * `block.json` (name, title, icon, category `widgets` or `design`, `supports`, `attributes`).
+  * `edit.js` using React and `@wordpress/components` for inspector controls (e.g. toggle showing meta).
+  * Optional `render.php` for server-side rendering when meta values are dynamic.
+* Meta bindings examples:
+  * `fish-card` can bind to `water_type`, `average_size`, `bait_type`.
+  * `gear-card` binds to `brand`, `gear_type`, `price`.
+  * `story-card` binds to `location`, `weather_conditions`, `catch_success`.
+* Use a central `includes/blocks.php` to:
+  * Register all blocks using `register_block_type( path_to_block_folder )`.
+  * Register block bindings via `register_block_bindings_source`.
+
+Additional folders:
+```
+fishing-cpt-plugin/
+└── blocks/
+    ├── fish-card/
+    │   ├── block.json
+    │   ├── edit.js
+    │   └── render.php
+    ├── gear-card/
+    ├── story-card/
+```
+
+### 3. Query Loop Block Variation
+Provide custom variations of the core Query Loop block for each CPT to streamline content insertion.
+* Use `register_block_variation( 'core/query', ... )` in `includes/blocks-query-variations.php`.
+* Variations:
+  * `fishing-fish-grid` (Fish post type, 6 per page, grid layout with image + title).
+  * `fishing-gear-list` (Gear post type, list layout, shows price meta via nested `fishing/gear-card`).
+  * `fishing-stories-featured` (Stories post type, limit to 3, ordered by date DESC, large featured images).
+* Each variation sets:
+  * `title`, `description`, `icon` (dashicons).
+  * `attributes`: query param object (`postType`, `perPage`, `order`, `orderBy`).
+  * Pre-filled inner blocks (cards or headings).
+* Add category grouping if desired: a custom block pattern category `fishing` for patterns and variations synergy.
+
+Folder additions:
+```
+fishing-cpt-plugin/
+└── includes/
+    ├── blocks-query-variations.php
+```
+
+### 4. Implementation Notes for Copilot
+Copilot should:
+* Generate the new `blocks/` directory with subfolders and proper `block.json` files.
+* Add new include files WITHOUT altering existing ones (append includes in main plugin bootstrap).
+* Preserve existing CPT/meta logic and layer new meta key (`fish_facts`) and any additional meta needed for cards.
+* Keep naming conventions: prefix everything with `fishing_` (PHP) or `fishing/` (blocks).
+* Ensure all output escape functions are used (`esc_html`, `esc_attr`, `wp_kses_post` where needed).
+* Provide README additions (append-only) describing new blocks and variations.
+
+### 5. Deliverable Additions (Append-Only)
+In addition to original deliverables, Copilot should now also output:
+* Repeatable Facts block (editor + front-end).
+* Card blocks for Fish, Gear, Stories with meta bindings.
+* Query Loop variations for Fish, Gear, Stories.
+* Updated README section documenting usage of new blocks and variations (without removing existing content).
+
+---
+END OF ADDED SCOPE (All prior content must remain verbatim)
+
+---
+## 6. Multi-Block Build & Asset Pipeline Reference (Append-Only)
+
+To support richer React-based editing experiences and compiled assets, incorporate a build system pattern inspired by a typical multi-block plugin structure. This does NOT replace earlier folder structures; it augments them. Do not delete or alter any previously defined folders. Add the following guidance for Copilot:
+
+### 6.1 Development-Oriented Block Asset Structure
+Introduce a development layer for blocks:
+```
+fishing-cpt-plugin/
+└── blocks/
+    ├── fish-card/
+    │   ├── block.json
+    │   ├── index.js          // Block registration & edit component
+    │   ├── editor.scss       // Editor-only styles
+    │   └── style.scss        // Front-end + editor shared styles
+    ├── gear-card/
+    │   ├── block.json
+    │   ├── index.js
+    │   ├── editor.scss
+    │   └── style.scss
+    ├── story-card/
+    │   ├── block.json
+    │   ├── index.js
+    │   ├── editor.scss
+    │   └── style.scss
+    ├── repeatable-facts/
+    │   ├── block.json
+    │   ├── index.js
+    │   ├── editor.scss
+    │   └── style.scss
+```
+If using a build tool, add:
+```
+fishing-cpt-plugin/
+├── package.json
+├── webpack.config.js
+├── build/                // Auto-generated compiled JS/CSS assets
+```
+Notes:
+* `index.js` imports SCSS so webpack builds both JS and CSS bundles.
+* Output assets placed into `build/` and referenced automatically via `register_block_type` (WordPress will read `block.json` `editorScript`, `script`, `style`, `editorStyle` handles).
+* Maintain prefixing convention (`fishing-` for handles) when enqueueing.
+
+### 6.2 Asset Registration Rules
+* Use `register_block_type( __DIR__ . '/blocks/fish-card' );` etc. — WordPress auto-registers scripts/styles defined in `block.json`.
+* If manual registration is needed:
+  * Use `wp_register_script( 'fishing-fish-card-editor', plugins_url( 'build/fish-card.js', __FILE__ ), [ 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor' ], '1.0.0', true );`
+  * Use `wp_register_style( 'fishing-fish-card-editor', plugins_url( 'build/fish-card-editor.css', __FILE__ ), [], '1.0.0' );`
+  * Use `wp_register_style( 'fishing-fish-card', plugins_url( 'build/fish-card.css', __FILE__ ), [], '1.0.0' );`
+* Ensure production build script (e.g. `npm run build`) creates minified assets; a `npm run dev` watch task can be included in `package.json`.
+
+### 6.3 Example `package.json` (Append Only)
+Copilot should generate an example (not mandatory for activation) similar to:
+```json
+{
+  "name": "fishing-cpt-plugin-blocks",
+  "version": "1.0.0",
+  "private": true,
+  "scripts": {
+    "dev": "wp-scripts start",
+    "build": "wp-scripts build"
+  },
+  "devDependencies": {
+    "@wordpress/scripts": "^28.0.0"
+  }
+}
+```
+(Version numbers may update; Copilot should pick stable current values.)
+
+### 6.4 Webpack / Build Tooling
+If using `@wordpress/scripts`, a custom `webpack.config.js` is optional. Only add if needed for advanced configuration (e.g., aliasing or additional loaders). Keep configuration minimal to avoid complexity.
+
+### 6.5 Integration With Existing PHP
+* Do NOT modify earlier PHP include list removals — only append includes if necessary (e.g. an additional `includes/blocks-build-loader.php` to abstract registration).
+* Preserve all previously defined functionality (CPTs, meta, settings, patterns).
+* Block variation file (`blocks-query-variations.php`) remains separate; build tooling does not replace it.
+
+### 6.6 README Append-Only Guidance
+Copilot must append to README a section:
+```
+## Block Asset Pipeline
+This plugin includes a build process for JavaScript and SCSS-based Gutenberg blocks located in /blocks. Run:
+npm install
+npm run build
+to generate production assets in /build before zipping for deployment.
+```
+
+### 6.7 Accessibility & Security Enforcement
+* Ensure all dynamic front-end markup from render callbacks escapes data.
+* Provide accessible markup: lists for repeatable facts, headings hierarchy preserved, ARIA only where necessary.
+* Avoid inline event handlers; rely on React standard patterns in `index.js`.
+
+### 6.8 Deliverable Confirmation (Append Only)
+Copilot should now include:
+* Development-oriented block source files (`index.js`, `editor.scss`, `style.scss`).
+* Build assets (simulated or actual) within `build/`.
+* Updated README with asset pipeline usage.
+* Package and scripts prepared for local development.
+
+---
+END OF MULTI-BLOCK BUILD & ASSET PIPELINE ADDITION (All prior content must remain verbatim)