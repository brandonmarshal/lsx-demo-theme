# 🎯 Fishing CPT Plugin Scope (AI-Optimized & LightSpeed-Ready)

> **AI Agent Guidance**
>
> 1. Read this entire scope before starting.
> 2. Follow all instructions **exactly and in order**. Do not omit or merge steps.
> 3. All code, files, and workflows **must** comply with [LightSpeed org-wide instructions](https://github.com/lightspeedwp/.github/blob/develop/.github/custom-instructions.md) and [coding standards](https://github.com/lightspeedwp/.github/blob/develop/.github/instructions/coding-standards.instructions.md).
> 4. Use namespacing, escaping, accessibility, and security practices as described.
> 5. Do **not** remove or alter prior requirements - all extended scope is append-only.
> 6. Reference issues and PRs in commits and documentation.
> 7. Append, do not overwrite, existing README and doc sections.
> 8. If any requirement is unclear, **ask for clarification before proceeding**.
>
> ---
>
> **For full org context, see:**  
> - [custom-instructions.md](https://github.com/lightspeedwp/.github/blob/develop/.github/custom-instructions.md)  
> - [AGENTS.md](https://github.com/lightspeedwp/.github/blob/develop/AGENTS.md)

---

## 1. Plugin Goal

Create a **WordPress plugin** named `Fishing CPT Plugin` that registers and manages multiple custom post types for a fishing website.

---

## 2. Required Features

- Register **custom post types** (CPTs) via PHP includes.
- Register secure **custom fields** (meta fields) for each CPT.
- Add **Gutenberg block bindings** and **patterns**.
- Provide a **settings page** for plugin options.
- Structure plugin for ZIP deployment and auto-deploy.

---

## 3. Folder and File Structure

> **All files MUST match these names and locations.**

```
fishing-cpt-plugin/
├── fishing-cpt-plugin.php
├── includes/
│   ├── cpt-fish.php
│   ├── cpt-gear.php
│   ├── cpt-stories.php
│   ├── meta-fields.php
│   ├── blocks.php
│   └── settings-page.php
├── patterns/
│   ├── fish-pattern.json
│   ├── gear-pattern.json
│   └── stories-pattern.json
└── README.md
```

---

## 4. Main Plugin File

- File: `fishing-cpt-plugin.php`
- Add standard WordPress plugin header with metadata.
- Include all `/includes` and `/patterns` files.
- Add activation/deactivation hooks if needed.
- Use `add_action('init', ...)` for CPT and meta registration.

---

## 5. Custom Post Types

- Register 3 CPTs, **each in its own include file**:
  1. `fish`
     - Supports: `title`, `editor`, `thumbnail`, `custom-fields`
     - Archive: `true`
     - Menu icon: `dashicons-palmtree`
  2. `gear`
     - Same supports as above
     - Menu icon: `dashicons-hammer`
  3. `stories`
     - Same supports as above
     - Menu icon: `dashicons-book`
- **Use `fishing_` prefix for all functions/fields.**

---

## 6. Custom Fields / Meta

- Register meta fields with `register_post_meta()` for each CPT.
- Examples (per CPT):
  - `fish`: `water_type`, `average_size`, `bait_type`
  - `gear`: `brand`, `gear_type`, `price`
  - `stories`: `location`, `weather_conditions`, `catch_success`
- Add sanitization and `auth_callback` for each field.
- `show_in_rest => true` for Gutenberg integration.
- **Follow [WordPress inline documentation standards](https://developer.wordpress.org/coding-standards/inline-documentation-standards/).**

---

## 7. Block Bindings & Patterns

- File: `includes/blocks.php`
- Register blocks for Fish, Gear, and Stories (`fishing/fish-card`, etc).
- Bind blocks to CPT meta fields.
- Add block patterns in `/patterns/` referencing these blocks.
- Each pattern demonstrates layouts for each CPT.

---

## 8. Settings Page

- File: `includes/settings-page.php`
- Add a “Fishing CPT Settings” page under “Settings” menu.
- Use `add_options_page()`.
- Example options: enable/disable CPTs, default posts per page.
- Store options with `update_option()` and `get_option()`.

---

## 9. Security, Accessibility, and Coding Standards

- Escape output with `esc_html()`, `sanitize_text_field()`, etc.
- Use `wp_verify_nonce()` for settings/actions.
- **Namespace all code:** `fishing_` (PHP), `fishing/` (JS/blocks).
- **Accessibility:** Use semantic HTML, correct headings, ARIA where needed.
- **Comply with:**  
  - [LightSpeed coding standards](https://github.com/lightspeedwp/.github/blob/develop/.github/instructions/coding-standards.instructions.md)  
  - [LightSpeed accessibility](https://github.com/lightspeedwp/.github/blob/develop/.github/instructions/accessibility.instructions.md)  
  - [OWASP Top 10](https://owasp.org/www-project-top-ten/)

---

## 10. Deployment Requirements

- Plugin must be self-contained and functional when zipped.
- Use only relative includes (with `plugin_dir_path(__FILE__)`).
- Chris (team member) will handle staging deployment.

---

## 11. Deliverables

1. A functional `fishing-cpt-plugin` folder with all required files.
2. Zip-ready, uploadable plugin.
3. On activation, WordPress admin shows:
   - “Fish”, “Gear”, “Stories” CPT menus.
   - “Fishing CPT Settings” page.
   - Custom fields in block editor.
   - Block patterns in “Patterns” menu.

---

## 12. Optional Enhancements

- REST API endpoints for each CPT.
- Template parts for single CPTs (e.g., `/templates/single-fish.php`).
- Localization using `__()` and `load_plugin_textdomain()`.

---

## 13. Testing & Documentation

- **Write tests** for blocks and PHP (see [playwright-tests.instructions.md](https://github.com/lightspeedwp/.github/blob/develop/.github/instructions/playwright-tests.instructions.md)).
- Document in `README.md`:
  - Feature list, setup, testing, build, and deploy steps.
- Reference issues and PRs for new features in changelogs.

---

## 14. Extended Scope Additions (Append-Only)

> **Do NOT alter or remove prior requirements. All sections below are additive.**

### 14.1. Repeatable Field Block

- Implement a dynamic block for a repeatable meta field `fish_facts` (JSON array of strings) for Fish CPT.
- Register meta with correct sanitization:
  ```php
  register_post_meta( 'fish', 'fish_facts', [
      'single' => true,
      'type' => 'string',
      'show_in_rest' => true,
      'sanitize_callback' => 'fishing_sanitize_json_array',
  ] );
  ```
- Block: `fishing/repeatable-facts`
- Editor: List of editable facts, “Add Fact” button, remove/edit per item, auto-sync to meta.
- Frontend: Render as `<ul class="fish-facts">` with escaped items.
- Fallback: “No facts added yet.”
- Files:
  ```
  fishing-cpt-plugin/
  └── blocks/
      ├── repeatable-facts/
      │   ├── block.json
      │   ├── edit.js
      │   └── render.php
  ```

### 14.2. Multi-Block Expansion

- Register blocks: `fish-card`, `gear-card`, `story-card`, `repeatable-facts`.
- Each block gets: `block.json`, `edit.js` (React), optional `render.php`.
- Central registration: `includes/blocks.php` uses `register_block_type` for all.
- Example meta bindings:
  - `fish-card` → `water_type`, `average_size`, `bait_type`
  - `gear-card` → `brand`, `gear_type`, `price`
  - `story-card` → `location`, `weather_conditions`, `catch_success`
- New folders:
  ```
  fishing-cpt-plugin/
  └── blocks/
      ├── fish-card/
      ├── gear-card/
      ├── story-card/
      ├── repeatable-facts/
  ```

### 14.3. Query Loop Block Variations

- File: `includes/blocks-query-variations.php`
- Register core Query Loop block variations for each CPT (e.g. `fishing-fish-grid`).
- Each variation has preset CPT/filter/layout.

### 14.4. Implementation Notes for Agents

- Generate all new block directories and files.
- Do **not** alter existing includes—add only.
- Preserve all prior CPT/meta logic.
- Prefix all new code with `fishing_` or `fishing/`.
- Escape all output.
- Append new documentation to README.

### 14.5. Additional Deliverables (Append-Only)

- Repeatable Facts block (editor + frontend)
- Card blocks for Fish, Gear, Stories with meta binding
- Query Loop variations for Fish, Gear, Stories
- Updated README with all new blocks and patterns

---

## 15. Multi-Block Build & Asset Pipeline Reference (Append-Only)

- Use a build system for JS/SCSS-based Gutenberg blocks.
- Asset structure:
  ```
  fishing-cpt-plugin/
  └── blocks/
      ├── fish-card/
      │   ├── block.json
      │   ├── index.js
      │   ├── editor.scss
      │   └── style.scss
      ├── gear-card/
      ├── story-card/
      ├── repeatable-facts/
  ```
- Include:
  - `package.json` with `@wordpress/scripts`
  - `webpack.config.js` if needed
  - `/build/` for compiled assets
- Register assets in PHP using `wp_register_script()` and `wp_register_style()` as shown.
- Append this to README:
  ```
  ## Block Asset Pipeline
  This plugin includes a build process for JavaScript and SCSS-based Gutenberg blocks located in /blocks.  
  Run:
  npm install
  npm run build
  to generate production assets in /build before zipping for deployment.
  ```
- Ensure all output is escaped and markup is accessible.
- Use React best practices for event handling in `index.js`.
- Deliver all source (`index.js`, `editor.scss`, `style.scss`), build assets, and README updates.

---

**END OF SCOPE.  
All instructions are cumulative and atomic.  
Do NOT skip, merge, or rewrite prior sections.  
When in doubt, ask for clarification.**
