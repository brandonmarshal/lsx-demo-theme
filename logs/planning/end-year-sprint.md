# End-of-Year Sprint Plan (Dec 3–17)

Detailed day-by-day plan from Dec 3–17, with a 2-hour daily study slot (rotating WordPress/GitHub/Figma), and clear separation between plugin and theme tasks.

---

## What I checked quickly

### Plugin: `fishing-adventures-cpt-suite`

- Has CPT scaffolding, includes, patterns folder, templates folder, SCF vendor present.
- Needs full working templates, block patterns, block bindings across CPTs, meta exposure to REST, and Google Maps integration for Areas with block usage.

### Theme: `lsx-demo-theme`

- Well-structured block theme with parts, patterns, styles, docs, tests.
- There’s a nested `fishing-cpt-plugin` directory with many includes (blocks, block bindings, query variations, Google Maps settings/enqueue, REST API, templates for archives/singles).
- Good signs—but per your request, plugin features must live in the plugin, not the theme.
- The site features that are theme-only should exclude plugin-specific bits.

### Scaffold: `multi-block-plugin-scaffold`

- Complete multi-block scaffold with build tooling (`webpack.config.cjs`, `package.json`, `src/blocks` structure), tests, PHPCS/PHPStan.
- Ideal for your block asset pipeline and block registration patterns.

---

## Gaps identified to include in planning

### Plugin

- Block bindings need to be complete and consistent for Fish, Gear, Area meta.
- Patterns for Fish, Gear, Area with block references to meta fields.
- Templates should render CPT content and meta cleanly; ensure archive/single templates are mapped and loaded by plugin or theme template loader correctly.
- Google Maps: settings page for API key, enqueue scripts, Area meta (coords, zoom), frontend render block and server-side fallback, REST exposure.
- Asset pipeline: JS/SCSS build for blocks; use scaffold conventions.
- Unit tests and quick smoke tests (PHP + block registration).

### Theme

- Sidebar template part and layout; ensure accessible markup.
- Ensure theme uses standard post meta/taxonomies and supports block bindings where applicable; but not duplicating plugin-bound features.
- Design tokens review for consistency, plus small accessibility refinements.
- Basic QA and Playwright a11y test adjustments if needed.

---

## Planning: Dec 3–17 (daily schedule with study blocks)

Each day includes:

- **Build tasks:** plugin-first, with theme tasks scheduled where appropriate.
- **Study (2 hours):** rotate WordPress → GitHub → Figma; one topic per day.

---

### Dec 3 (Wed)

**Focus:** Audit and bootstrap using multi-block-plugin-scaffold (phase 1); create plugin backlog; Areas CPT mapping and Google Maps plan

**Tasks:**

- Audit `fishing-adventures-cpt-suite` includes and templates vs scope; list missing items (templates, patterns, bindings, REST meta, block assets).
- Confirm Stories→Area alignment in plugin: post type args, labels, slugs, taxonomies, meta keys; identify any rename work.
- Draft Google Maps integration plan: settings page (API key), meta (lat, lng, zoom, map type), enqueue strategy, block architecture (editor UI + frontend render).
- Define plugin block list: `fish-card`, `gear-card`, `area-card`, `repeatable-facts`; confirm meta bindings for each.
- Use the `multi-block-plugin-scaffold` today only to bootstrap the plugin's block pipeline (phase 1 setup):

  - Compare scaffold files to the plugin and copy over missing build tooling: `webpack.config.cjs`, `jest.config.js`, `phpcs.xml`, `phpstan.neon`, and prepare `package.json` scripts/devDependencies list.
  - Establish source structure for two initial blocks: `fishing-adventures-cpt-suite/assets/src/blocks/{fish-card,repeatable-facts}` each with `block.json`, `index.js`, `editor.scss`, `style.scss` following scaffold conventions. Create placeholder folders for `gear-card` and `area-card`.
  - Draft npm script additions for the plugin: `build`, `start`, `lint`, `test` (do not run yet). Save notes on any peer dependencies to install.

**Acceptance criteria:**

- Written backlog with gaps and tasks, including DOD for each.
- Google Maps integration plan documented with data model and rendering approach.
- Scaffold phase 1 completed: core tooling files copied, `package.json` script plan drafted, and initial block directories for `fish-card` and `repeatable-facts` created with placeholder files.

**Study (2h):** WordPress (Block Bindings API + `register_post_meta` best practices).

---

### Dec 4 (Thu)

**Focus:** Scaffold wiring and first run (phase 2); meta registration and REST exposure; block bindings schema

**Tasks:**

- Complete scaffold integration (phase 2):
  - Wire block entry points (dynamic registration or explicit imports) to match scaffold expectations; add the remaining block folders `gear-card` and `area-card` with initial `block.json`.
  - Add and finalize npm scripts in the plugin `package.json`: `build`, `start`, `lint`, `test`; ensure devDependencies match scaffold.
  - Register blocks in PHP and enqueue built assets from `assets/build` paths; verify asset handles align with scaffold output.
  - Run the pipeline: `npm run build`, `npm run lint`, `npm run test`; fix any immediate issues and document deltas.

- Ensure all custom fields for Fish, Gear, Area are registered via `register_post_meta` with `show_in_rest => true`, sanitizers, `auth_callback`.
- Map block bindings for each block to specific meta keys; document the binding matrix.
- Add unit tests stubs for meta registration arrays (PHPUnit).

**Acceptance criteria:**

- Scaffold integration completed end-to-end (build, lint, test run successfully); `gear-card` and `area-card` folders exist with initial `block.json`.
- All meta keys visible in REST for CPT endpoints.
- Binding matrix complete (which block attribute reads which meta key).
- Tests run green locally.

**Study (2h):** GitHub (branching strategy, PR hygiene, commit message conventions).

---

### Dec 5 (Fri)

**Focus:** Blocks pipeline verification and initial block scaffolds (post-scaffold day)

**Tasks:**

- Verify the plugin’s block pipeline added on Dec 3 by building and loading blocks in editor.
- Flesh out the initial block directories (`fish-card`, `gear-card`, `area-card`, `repeatable-facts`) with minimal `block.json` and placeholder render to confirm insertability.
- Ensure PHP block registration and asset enqueue paths are correct.

**Acceptance criteria:**

- Blocks build successfully and are insertable in editor with no console errors.
- Linting (ESLint/Stylelint) and unit tests (Jest stubs) run via plugin scripts without fatal errors.

**Study (2h):** Figma (component properties, auto layout for card designs).

---

### Dec 6 (Sat)

**Focus:** Repeatable Facts block implementation (using plugin’s established pipeline)

**Tasks:**

- Implement `fishing/repeatable-facts` editor UI (list add/remove/edit) within the plugin block structure (`assets/src/blocks/repeatable-facts`).
- Bind to Fish meta `fish_facts` (JSON array string) with sanitization callback (`fishing_sanitize_json_array`).
- `Frontend render.php` prints accessible `<ul class="fish-facts">` with escaped items, fallback message. Keep dynamic block registration aligned with scaffold conventions (server-side render file colocated or referenced per scaffold approach).

**Acceptance criteria:**

- Editor syncs to meta reliably; frontend renders correctly.
- Unit test: sanitization callback handles malformed JSON safely. Include a Jest test file in `assets/src/blocks/repeatable-facts/__tests__/` following the plugin’s testing setup.

**Study (2h):** WordPress (Dynamic blocks and server-side rendering patterns).

---

### Dec 7 (Sun)

**Focus:** Card blocks (Fish, Gear, Area) with meta bindings

**Tasks:**

- Implement `fish-card`, `gear-card`, `area-card` block UIs that read meta bindings and display structured info within the plugin’s block directories.
- Ensure attributes mapped to REST meta via block bindings or context (depending on approach).
- Accessibility: headings, lists, alt text guidance.

**Acceptance criteria:**

- All cards show meta correctly for each CPT in editor and frontend.
- Basic styles applied; responsive behavior acceptable. Blocks compile; ESLint passes for block sources.

**Study (2h):** GitHub (Actions basics: lint/test workflows).

---

### Dec 8 (Mon)

**Focus:** Patterns for CPTs

**Tasks:**

- Create `/patterns/fish-pattern.json`, `gear-pattern.json`, `area-pattern.json` referencing the plugin’s blocks.
- Pattern categories and titles; ensure they appear in Inserter.
- Write docs for pattern usage and example layouts.

**Acceptance criteria:**

- Patterns selectable; card blocks present within layouts; no hard-coded content. Pattern JSON references match plugin block names and attributes.

**Study (2h):** Figma (pattern layout grids and responsiveness thinking).

---

### Dec 9 (Tue)

**Focus:** Templates for CPTs

**Tasks:**

- Implement plugin-controlled templates or theme template loader mapping: `single-fish.php`, `archive-fish.php`, `single-gear.php`, `archive-gear.php`, `single-area.php`, `archive-area.php`. Ensure template areas where blocks render include the compiled plugin block assets and do not duplicate bundling.
- Ensure global header/footer parts are used or theme-compatible wrappers; don’t duplicate theme parts in plugin.
- Include meta fields in template output (escaped), ensuring block regions present.

**Acceptance criteria:**

- Visiting CPT singles/archives shows correct template; meta renders properly with scaffold-built block assets present.
- Permalinks flushed; pagination/archives work.

**Study (2h):** WordPress (Template hierarchy vs plugin template loader best practices).

---

### Dec 10 (Wed)

**Focus:** Google Maps integration for Areas CPT

**Tasks:**

- Settings page: store API key securely (`get_option`/`update_option` with nonce).
- Area meta fields: lat, lng, zoom, map type; register with REST.
- Enqueue Google Maps script conditionally; implement `fishing/area-map` block using the plugin’s build system with editor map preview and frontend rendering.
- Provide graceful fallback if API key missing.

**Acceptance criteria:**

- Map renders for Area posts with saved coords; editor shows preview. The `area-map` block compiles and loads via scaffold output.
- Fallback message and no fatal errors if key absent.

**Study (2h):** GitHub (Semantic versioning, changelog automation).

---

### Dec 11 (Thu)

**Focus:** Plugin QA, polish, and performance

**Tasks:**

- Implement `blocks-query-variations.php` registering variations for Fish, Gear, Area (e.g., `fishing-fish-grid`) and ensure any editor-side variation UI code lives in the plugin `assets/src/` and builds correctly.
- Perform QA sweep: editor console, frontend rendering, responsive behavior, block insertion flows.
- Fix layout issues, minor a11y enhancements (focus states, color contrast).
- Validate REST responses for CPT endpoints include expected meta.
- Defer non-critical JS in plugin blocks; ensure Maps only loads when needed. Confirm webpack optimizations (code splitting, asset filenames) are respected.
- Provide fallbacks for missing meta/content; avoid N+1 queries.
- Basic Lighthouse run locally for representative pages.

**Acceptance criteria:**

- Variations appear and filter correctly in editor; render expected post types.
- No major console errors; a11y basics pass; meta present in REST.
- JS loads efficiently; map conditional; lighthouse shows no critical blockers. Scaffold lint/test scripts pass.

**Study (2h):** Figma (design tokens and exports; mapping to `theme.json`).

---

### Dec 12 (Fri)

**Focus:** Plugin documentation, tests, and wrap-up

**Tasks:**

- Update plugin README with features, setup, block asset pipeline, Google Maps usage, patterns.
- Add unit tests for CPT registration arrays and meta exposure; minimal Playwright smoke test for frontend templates if available. Include notes on running `npm run test` for block-level tests.
- Document block bindings matrix and API notes.
- Seed a few example Fish, Gear, Area posts to validate blocks and patterns end-to-end.
- Adjust patterns for practical editorial usage; refine labels and descriptions. Ensure any pattern changes align with scaffold block attribute schemas.
- Final plugin doc updates; changelog v0.1.x for plugin; summarize work done.
- Package plugin ZIP; confirm install steps; quick smoke tests.
- Write next-steps backlog (post-MVP enhancements).

**Acceptance criteria:**

- README comprehensive; tests run green; bindings documented. Plugin scripts (`build`, `start`, `lint`, `test`) are documented and verified.
- Editors can compose pages with patterns easily; blocks show real content correctly.
- Zip-ready plugin; installation guide clear; scope items done or explicitly deferred with reasons.

**Study (2h):** WordPress (`theme.json` advanced options, style variations).

---

### Dec 13 (Sat)

**Focus:** Theme sidebar and block usability

**Tasks:**

- In `lsx-demo-theme`, add a Sidebar template part with accessible markup; integrate into relevant templates.
- Ensure theme supports post meta and taxonomies display using core blocks and styles; avoid implementing plugin-specific logic.
- Verify theme’s design tokens match current brand decisions; minor refinements for contrast.

**Acceptance criteria:**

- Sidebar part usable across templates; passes basic a11y checks.
- Taxonomies/terms display cleanly via core blocks; no plugin duplication.

**Study (2h):** GitHub (PR reviews, code owners, conventional commits).

---

### Dec 14 (Sun)

**Focus:** Website QA and polish using completed plugin

**Tasks:**

- Perform QA sweep: editor console, frontend rendering, responsive behavior, block insertion flows across the website using the plugin.
- Fix layout issues, minor a11y enhancements (focus states, color contrast).
- Validate REST responses for CPT endpoints include expected meta in the theme context.

**Acceptance criteria:**

- No major console errors; a11y basics pass; meta present in REST in the live site.
- Website pages using plugin blocks render correctly and are visually consistent.

**Study (2h):** Figma (handoff best practices; tokens to dev docs).

---

### Dec 15 (Mon)

**Focus:** Website performance and fallback handling

**Tasks:**

- Defer non-critical JS in theme where appropriate; ensure Maps and heavy assets only load when needed on the website.
- Provide fallbacks for missing meta/content in theme templates; avoid N+1 queries in real pages.
- Basic Lighthouse run locally for representative website pages that use plugin features.

**Acceptance criteria:**

- JS loads efficiently on key pages; map and heavy assets are conditional.
- Lighthouse shows no critical blockers for the website experience.

**Study (2h):** WordPress (Performance in block themes/plugins).

---

### Dec 16 (Tue)

**Focus:** Content and patterns validation in the website

**Tasks:**

- Seed a few example Fish, Gear, Area posts to validate blocks and patterns end-to-end across the full website.
- Adjust patterns for practical editorial usage in real site contexts; refine labels and descriptions where needed.
- Ensure editors can compose landing pages and detail pages using the completed plugin and theme.

**Acceptance criteria:**

- Editors can compose pages with patterns easily; blocks show real content correctly across the site.
- Patterns feel natural and efficient for real editorial workflows.

**Study (2h):** GitHub (Release workflow, tags, GitHub Releases).

---

### Dec 17 (Wed)

**Focus:** Wrap, release, and next steps for site and plugin

**Tasks:**

- Final doc updates for both plugin and theme integration; changelog v0.1.x for plugin; summarize work done across site.
- Package plugin ZIP; confirm install steps; quick smoke tests on a clean site if possible.
- Write next-steps backlog (post-MVP enhancements) for both plugin and website.

**Acceptance criteria:**

- Zip-ready plugin; installation guide clear; scope items done or explicitly deferred with reasons.
- Clear backlog of next steps for enhancing the site now that the plugin is in place.

---

## Acceptance criteria and quality gates (global)

## Build

- Blocks compile.
- PHP has no syntax errors.
- Plugin activates cleanly.

## Lint/Typecheck

- PHPCS/PHPStan for PHP.
- ESLint/Stylelint for assets.
- Fix critical issues.

## Tests

- PHP unit stubs pass.
- Optional Playwright smoke passes for core templates.

## Smoke

- Insert blocks in editor without console errors.
- Frontend renders as expected.

**Requirements coverage:**

- Plugin templates, patterns, block bindings, REST meta: scheduled Dec 4–9; cross-checked Dec 11–12; Done.
- Google Maps in Areas: settings, meta, block, enqueue: Dec 10; Done.
- Multi-block scaffold integration: Dec 5; Done.
- Theme sidebar and non-plugin features: Dec 13; Done.
- Daily study slots: scheduled every day with rotating topics; Done.

---

## Risks and mitigations

- **Binding mismatches:** Maintain a binding matrix doc and test with sample posts.
- **Google Maps API issues:** Fallback UI; conditional enqueue; settings validation.
- **Scope creep into theme:** Explicit split; plugin owns CPT features; theme focuses on layout and accessibility.
- **Build complexity:** Use scaffold’s stable pipeline; keep asset structure standard.

---

## Handy next steps after Dec 17

- Advanced schema (FAQ, Article, Breadcrumb) in theme.
- More block variations and patterns (galleries, compare layouts).
- Additional tests (PHPUnit for taxonomies, Playwright for editor flows).
- Content seeding and editorial workflow tuning.
