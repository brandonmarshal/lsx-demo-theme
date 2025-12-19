
# First 2 Weeks: Practical follow-up (build + finish + ship)

This plan focuses only on the remaining, actionable work discovered in the corrected audit of `fishing-adventures-cpt-suite` (Dec 19, 2025). It assumes the plugin already contains:

- SCF JSON exports in `scf-json/` and an activation-time SCF import handler.
- PHP meta registration for most keys (`includes/class-cpt-meta.php`).
- CPT & taxonomy registration (`includes/class-cpt-register.php`).
- Patterns in `patterns/` and templates in `templates/`.
- Google Maps settings/meta and conditional enqueue logic.

Primary constraint to resolve: compiled block build artifacts (the `build/` directory) are not present in the repository. PHP block registration expects `build/<block>/block.json` and will bail quietly when missing. The work below centers on producing build artifacts, validating block registration, and finishing packaging and QA.

Goals for the two-week window (concrete):

- Produce compiled `build/` assets for plugin blocks (so blocks register without requiring dev env on install).
- Validate block editor + frontend behavior for critical blocks: `fish-card`, `gear-card`, `area-card`, `repeatable-facts`, `area-map`.
- Ensure SCF import + REST meta exposure remain reliable on fresh installs.
- Add minimal templating loader or clear docs so templates are used as expected on installs.
- Add minimal tests & documentation for developers and package a ZIP for smoke testing.

Week 1 — Build, register, validate (days 1–7)

Day 1 — Environment & Build (setup)
- Tasks:
	- On your dev machine: run `composer install` to ensure SCF vendor is installed (or verify `vendor/secure-custom-fields` exists in your zip workflow).
	- Run `npm ci` (or `npm install`) in the plugin root to install `@wordpress/scripts` and dependencies.
	- Run `npm run build` to generate `build/` artifacts. This must create `build/<block>/block.json` and compiled JS/CSS.
- Acceptance:
	- `build/` exists and contains block metadata for the blocks in `src/`.
	- `register_block_type` calls in PHP find `build/.../block.json` files and no longer bail early.

Day 2 — Quick smoke: Editor + frontend
- Tasks:
	- Activate plugin on a clean WP instance (or reinstall plugin zip built from repo where `build/` exists).
	- Confirm SCF field groups import on activation (search logs or WP Admin -> Custom Fields).
	- Open editor for a `fish` post: confirm `fishing/fish-card` and `fishing/repeatable-facts` appear and insert without console errors.
	- Create a `fish` post and confirm frontend renders (the block server-side render.php is used where present).
- Acceptance:
	- No critical console errors in editor; inserted blocks render on frontend and use registered meta.

Day 3 — Area map sanity check
- Tasks:
	- Add Google Maps API key in plugin settings and enable maps (use key with Maps JS enabled or a test key that returns ZERO_RESULTS but not invalid).
	- Create an `area` post with `latitude`/`longitude` and confirm `area-map` block preview in editor and frontend render with Google Maps script loaded only when needed.
- Acceptance:
	- Map renders for area pages; no maps script on unrelated pages (conditional enqueue working).

Day 4 — Minimal `build/` fallback (if full build is not possible)
- Tasks (choose if you can't build with Node locally):
	- Create minimal `build/<block>/block.json` stubs for critical blocks pointing to server-side `render.php` and simple asset handles so PHP will register them. (This is a stop-gap only — full JS editor UIs still require building.)
	- Confirm PHP registration now finds `build/` and blocks are available in editor (editor UIs may be minimal/no JS interactivity).
- Acceptance:
	- Blocks register and can be inserted; server-side render output appears on frontend.

Day 5 — Patterns & templates check
- Tasks:
	- Confirm patterns from `patterns/` are registered in Inserter.
	- Verify plugin template usage: if your theme does not automatically load plugin templates, decide whether to implement a lightweight plugin template loader or document theme integration steps.
	- If implementing loader: add a small class (hooks into `template_include` / `single_template`) that will prefer plugin templates for `single-fish.php`, `archive-fish.php`, etc., unless theme overrides explicitly exist.
- Acceptance:
	- Patterns available in inserter; single/archive pages render with plugin-provided templates or documented theme steps exist.

Day 6 — Tests & docs
- Tasks:
	- Add minimal PHPUnit test stubs for CPT registration/meta exposure (one test ensures `post_type_exists('fish')` and `get_post_meta` schema via REST endpoint or `register_post_meta` availability).
	- Add minimal Jest test for sanitization helper for repeatable facts if you have JS sanitizers, otherwise add a PHP unit test for server-side sanitizer function.
	- Update README with developer quickstart: steps to run `composer install`, `npm ci`, `npm run build`, and how to package plugin zip including `build/`.
- Acceptance:
	- Tests run (or at least are present) and README includes exact commands.

Day 7 — Package & smoke test
- Tasks:
	- Package a plugin ZIP that includes `vendor/` (or instruct Composer install during install), `build/`, and `scf-json/`.
	- Install on a clean WP site, activate, verify SCF import ran, CPTs exist, blocks available in editor, and maps behave as expected.
- Acceptance:
	- Plugin activates and the core smoke checklist passes (CPTs exist, SCF groups import, blocks register, map conditional enqueue works).

Week 2 — Polish, tests, and handoff (days 8–14)

Day 8 — Fixes from smoke
- Tasks:
	- Address any console errors, missing asset paths, or template mismatches discovered in Week 1 smoke tests.
	- If blocks have missing editor JS, run full JS build and re-test.
- Acceptance:
	- Editor console issues resolved; blocks functionally usable.

Day 9 — Accessibility & performance sweep
- Tasks:
	- Check color contrast and heading structure in `templates/parts/fish-details.php` and block render output.
	- Ensure Google Maps script is deferred or async where possible; ensure initialization is gated by DOMContentLoaded and non-blocking.
	- Look for N+1 queries in template parts (caution where template iterates relationship fields; add caching or `get_posts` with post__in order matching to avoid multiple queries).
- Acceptance:
	- Small a11y fixes applied; map script non-blocking; no obvious N+1 query hotspots in key templates.

Day 10 — Add template loader or docs (finish)
- Tasks:
	- If you opted for a plugin template loader, finalize tests and edge-case fallbacks (child-theme overrides, template priorities).
	- Otherwise finalize README with clear theme integration instructions and examples for using plugin templates.
- Acceptance:
	- Template loading behavior documented or implemented and tested.

Day 11 — Tests & CI notes
- Tasks:
	- Ensure PHPUnit tests are runnable locally; add a README subsection explaining how to run them (phpunit config or vendor/bin/phpunit).
	- Add notes describing how to run JS tests (if you added Jest tests) with `npm run test`.
- Acceptance:
	- Tests documented; CI-ready notes added for future GitHub Actions.

Day 12 — Seed content and editorial docs
- Tasks:
	- Create a small content seed: 2 fish, 1 gear, 1 area (with coords), and example pages that use patterns and blocks. You can place example content as an export or instructions for manual creation.
	- Add short editor docs showing how to use patterns and blocks to compose a fish detail page.
- Acceptance:
	- Editors can follow the seed or docs to reproduce example pages locally.

Day 13 — Final QA & Lighthouse
- Tasks:
	- Run a Lighthouse pass for a fish detail page, home page with patterns, and an area page with map. Address any critical performance/accessibility issues.
- Acceptance:
	- No critical Lighthouse issues blocking release.

Day 14 — Package final ZIP and release notes
- Tasks:
	- Create final plugin ZIP with `build/`, `scf-json/`, and `vendor/` as appropriate; prepare a changelog and README notes for release.
	- Optionally tag a release in your git repo and push a release artifact to GitHub.
- Acceptance:
	- Plugin ZIP installed cleanly on a fresh WP site; acceptance test (activation, SCF import, blocks register, maps) passes.

Appendix — Quick commands & notes

Developer quick-start (local machine):
```bash
# Install Composer deps (SCF vendor)
composer install

# Install node deps and build assets
npm ci
npm run build

# Run tests (if configured)
npm run test
vendor/bin/phpunit
```

Packaging notes
- If you ship the plugin as a ZIP for easier install, include either the `vendor/` directory (SCF vendored) or instruct users to run `composer install` on the host. Prefer bundling `build/` so editors don't require a local JS build step.

Decision point (pick one)
- Option A (recommended): run full Node build locally and commit `build/` into the release branch/zip — this gives editors the full block experience on install.
- Option B (stop-gap): add minimal `build/` block.json stubs so server-side render blocks register and templates render; follow up with a full JS build later.

# First 2 Weeks: Practical follow-up (build + finish + ship)

This plan focuses only on the remaining, actionable work discovered in the corrected audit of `fishing-adventures-cpt-suite` (Dec 19, 2025). It assumes the plugin already contains:

- SCF JSON exports in `scf-json/` and an activation-time SCF import handler.
- PHP meta registration for most keys (`includes/class-cpt-meta.php`).
- CPT & taxonomy registration (`includes/class-cpt-register.php`).
- Patterns in `patterns/` and templates in `templates/`.
- Google Maps settings/meta and conditional enqueue logic.

Primary constraint to resolve: compiled block build artifacts (the `build/` directory) are not present in the repository. PHP block registration expects `build/<block>/block.json` and will bail quietly when missing. The work below centers on producing build artifacts, validating block registration, and finishing packaging and QA.

Goals for the two-week window (concrete):

- Produce compiled `build/` assets for plugin blocks (so blocks register without requiring dev env on install).
- Validate block editor + frontend behavior for critical blocks: `fish-card`, `gear-card`, `area-card`, `repeatable-facts`, `area-map`.
- Ensure SCF import + REST meta exposure remain reliable on fresh installs.
- Add minimal templating loader or clear docs so templates are used as expected on installs.
- Add minimal tests & documentation for developers and package a ZIP for smoke testing.

## Week 1 — Build, register, validate (days 1–7)

### Day 1 — Environment & Build (setup)

Tasks:

- On your dev machine: run `composer install` to ensure SCF vendor is installed (or verify `vendor/secure-custom-fields` exists in your zip workflow).
- Run `npm ci` (or `npm install`) in the plugin root to install `@wordpress/scripts` and dependencies.
- Run `npm run build` to generate `build/` artifacts. This must create `build/<block>/block.json` and compiled JS/CSS.

Acceptance:

- `build/` exists and contains block metadata for the blocks in `src/`.
- `register_block_type` calls in PHP find `build/.../block.json` files and no longer bail early.

### Day 2 — Quick smoke: Editor + frontend

Tasks:

- Activate plugin on a clean WP instance (or reinstall plugin zip built from repo where `build/` exists).
- Confirm SCF field groups import on activation (search logs or WP Admin -> Custom Fields).
- Open editor for a `fish` post: confirm `fishing/fish-card` and `fishing/repeatable-facts` appear and insert without console errors.
- Create a `fish` post and confirm frontend renders (the block server-side render.php is used where present).

Acceptance:

- No critical console errors in editor; inserted blocks render on frontend and use registered meta.

### Day 3 — Area map sanity check

Tasks:

- Add Google Maps API key in plugin settings and enable maps (use key with Maps JS enabled or a test key that returns ZERO_RESULTS but not invalid).
- Create an `area` post with `latitude`/`longitude` and confirm `area-map` block preview in editor and frontend render with Google Maps script loaded only when needed.

Acceptance:

- Map renders for area pages; no maps script on unrelated pages (conditional enqueue working).

### Day 4 — Minimal `build/` fallback (if full build is not possible)

Tasks (choose if you can't build with Node locally):

- Create minimal `build/<block>/block.json` stubs for critical blocks pointing to server-side `render.php` and simple asset handles so PHP will register them. (This is a stop-gap only — full JS editor UIs still require building.)
- Confirm PHP registration now finds `build/` and blocks are available in editor (editor UIs may be minimal/no JS interactivity).

Acceptance:

- Blocks register and can be inserted; server-side render output appears on frontend.

### Day 5 — Patterns & templates check

Tasks:

- Confirm patterns from `patterns/` are registered in Inserter.
- Verify plugin template usage: if your theme does not automatically load plugin templates, decide whether to implement a lightweight plugin template loader or document theme integration steps.
- If implementing loader: add a small class (hooks into `template_include` / `single_template`) that will prefer plugin templates for `single-fish.php`, `archive-fish.php`, etc., unless theme overrides explicitly exist.

Acceptance:

- Patterns available in inserter; single/archive pages render with plugin-provided templates or documented theme steps exist.

### Day 6 — Tests & docs

Tasks:

- Add minimal PHPUnit test stubs for CPT registration/meta exposure (one test ensures `post_type_exists('fish')` and `get_post_meta` schema via REST endpoint or `register_post_meta` availability).
- Add minimal Jest test for sanitization helper for repeatable facts if you have JS sanitizers, otherwise add a PHP unit test for server-side sanitizer function.
- Update README with developer quickstart: steps to run `composer install`, `npm ci`, `npm run build`, and how to package plugin zip including `build/`.

Acceptance:

- Tests run (or at least are present) and README includes exact commands.

### Day 7 — Package & smoke test

Tasks:

- Package a plugin ZIP that includes `vendor/` (or instruct Composer install during install), `build/`, and `scf-json/`.
- Install on a clean WP site, activate, verify SCF import ran, CPTs exist, blocks available in editor, and maps behave as expected.

Acceptance:

- Plugin activates and the core smoke checklist passes (CPTs exist, SCF groups import, blocks register, map conditional enqueue works).

## Week 2 — Polish, tests, and handoff (days 8–14)

### Day 8 — Fixes from smoke

Tasks:

- Address any console errors, missing asset paths, or template mismatches discovered in Week 1 smoke tests.
- If blocks have missing editor JS, run full JS build and re-test.

Acceptance:

- Editor console issues resolved; blocks functionally usable.

### Day 9 — Accessibility & performance sweep

Tasks:

- Check color contrast and heading structure in `templates/parts/fish-details.php` and block render output.
- Ensure Google Maps script is deferred or async where possible; ensure initialization is gated by DOMContentLoaded and non-blocking.
- Look for N+1 queries in template parts (caution where template iterates relationship fields; add caching or `get_posts` with post__in order matching to avoid multiple queries).

Acceptance:

- Small a11y fixes applied; map script non-blocking; no obvious N+1 query hotspots in key templates.

### Day 10 — Add template loader or docs (finish)

Tasks:

- If you opted for a plugin template loader, finalize tests and edge-case fallbacks (child-theme overrides, template priorities).
- Otherwise finalize README with clear theme integration instructions and examples for using plugin templates.

Acceptance:

- Template loading behavior documented or implemented and tested.

### Day 11 — Tests & CI notes

Tasks:

- Ensure PHPUnit tests are runnable locally; add a README subsection explaining how to run them (phpunit config or vendor/bin/phpunit).
- Add notes describing how to run JS tests (if you added Jest tests) with `npm run test`.

Acceptance:

- Tests documented; CI-ready notes added for future GitHub Actions.

### Day 12 — Seed content and editorial docs

Tasks:

- Create a small content seed: 2 fish, 1 gear, 1 area (with coords), and example pages that use patterns and blocks. You can place example content as an export or instructions for manual creation.
- Add short editor docs showing how to use patterns and blocks to compose a fish detail page.

Acceptance:

- Editors can follow the seed or docs to reproduce example pages locally.

### Day 13 — Final QA & Lighthouse

Tasks:

- Run a Lighthouse pass for a fish detail page, home page with patterns, and an area page with map. Address any critical performance/accessibility issues.

Acceptance:

- No critical Lighthouse issues blocking release.

### Day 14 — Package final ZIP and release notes

Tasks:

- Create final plugin ZIP with `build/`, `scf-json/`, and `vendor/` as appropriate; prepare a changelog and README notes for release.
- Optionally tag a release in your git repo and push a release artifact to GitHub.

Acceptance:

- Plugin ZIP installed cleanly on a fresh WP site; acceptance test (activation, SCF import, blocks register, maps) passes.

## Appendix — Quick commands & notes

Developer quick-start (local machine):

```bash
# Install Composer deps (SCF vendor)
composer install

# Install node deps and build assets
npm ci
npm run build

# Run tests (if configured)
npm run test
vendor/bin/phpunit
```

Packaging notes

- If you ship the plugin as a ZIP for easier install, include either the `vendor/` directory (SCF vendored) or instruct users to run `composer install` on the host. Prefer bundling `build/` so editors don't require a local JS build step.

Decision point (pick one)

- Option A (recommended): run full Node build locally and commit `build/` into the release branch/zip — this gives editors the full block experience on install.
- Option B (stop-gap): add minimal `build/` block.json stubs so server-side render blocks register and templates render; follow up with a full JS build later.

If you want, I can implement the following next (pick any):

- Create minimal README update with quick-start build/pack commands.
- Add minimal `build/` block.json stubs for `fish-card` and `repeatable-facts` so blocks register immediately (stop-gap).
- Add a lightweight plugin template loader that prefers plugin templates for `fish`, `gear`, and `area`.

---

End of plan.

