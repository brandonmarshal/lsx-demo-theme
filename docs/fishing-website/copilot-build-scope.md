Below is a comprehensive, implementation‑ready Scope & Plan of Approach that operationalises ALL the planning documents you supplied. It is structured so you (and AI) can execute in clear, low‑friction increments. It resolves overlaps, flags inconsistencies, sets acceptance criteria, and gives prompt patterns for AI support.

================================================== 0. EXECUTIVE SUMMARY
==================================================
Goal: Ship a lean but professional WordPress block theme (Brandon’s Fishing Adventures) featuring three core CPTs (Fish, Gear, Stories), design tokens (colour, type, spacing), reusable patterns, accessible templates, and seed content — then iterate.

Approach: Phased delivery (Plan → Foundation → System → Content → Enhancement → Launch → Improve) with daily micro‑cycles (Plan → Build → Commit → Wrap) and weekly retros.

Tooling: WordPress (FSE / block theme), ACF or SCF for fields, GitHub for versioning, AI (Copilot) for code stubs, copy drafts, refactors, QA checklists.

Success Criteria (MVP):

-   Theme.json implements finalised brand tokens (colour, type, spacing)
-   All 3 CPTs registered + taxonomies + field groups (REST exposed)
-   Templates + patterns for archive + single of each CPT
-   ≥10 Fish, ≥5 Gear, ≥5 Stories + ≥5 Blog posts (draft quality)
-   Accessibility pass (WCAG AA basics) + SEO checklist baseline
-   Internal linking between CPTs functioning
-   Repo structured, documented, repeatable workflow established

Post‑MVP: Dark mode, advanced schema (FAQ, HowTo), performance tuning, additional patterns, editorial automation.

==================================================

1. # SOURCE FILES MAPPED TO IMPLEMENTATION DOMAINS
    (You asked for a full review; below is how each file maps to actionable work.)

Design System & Brand:

-   style-guide.md, brand-guide.md, colour-palette.md, typography.md, spacing.md, logo-brief.md, taglines.md, voice-and-tone.md
    Content Structure & Modeling:
-   content-model.md, fish-post-type.md, gear-post-type.md, stories-post-type.md, fish-content.md, gear-content.md, stories-content.md, patterns.md, templates.md, website-structure.md, website-brief.md, page-content.md, content-collection.md
    Copy & UX:
-   microcopy.md, blog-posts.md, page-content.md, voice-and-tone.md
    SEO & Governance:
-   seo-checklist.md, website-brief.md
    System & Execution Process:
-   general instructions (daily/weekly flow), logs process embedded in your general instructions.

Each will be “consumed” and converted into:

1. Code (theme.json, CPT registration, pattern JSON/PHP)
2. Content files / Markdown drafts (stored under /docs or /content-collection)
3. Documentation (README, CONTRIBUTING, usage docs)
4. QA checklists (accessibility, SEO, performance)

================================================== 2. IDENTIFIED INCONSISTENCIES (RESOLVE FIRST)
==================================================

1. Typography:

    - Some docs: Montserrat (headings), Lora (body), Open Sans (UI)
    - One doc (website-structure / brief) mentions Playfair Display + Inter (older variant).
      Decision: Use Montserrat + Lora + Open Sans (consistent across majority + theme.json snippet exists). Add a “deprecated choices” note in /docs/decisions/DECISIONS.md.

2. Colour Palette:

    - colour-palette.md: Primary #3A6B68 (River Blue-Green)
    - style-guide.md: Primary #1B4F72 + others (#D35400 highlight, etc.)
      Decision: Pick a single palette. Recommendation: Adopt colour-palette.md (river + olive + burnt orange system) as canonical. Map legacy colours (e.g. #1B4F72) to accent-400 or a secondary “legacy-blue” if needed. Document rationale.

3. Tagline Variants:

    - brand-guide.md and taglines.md: “Stories from the river, catches for a lifetime.”
    - style-guide.md: “Catch the story. Relive the moment.”
      Decision: Choose ONE primary (long form) + ONE short variant.
      Primary: “Stories from the river, catches for a lifetime.”
      Short (utility): “Catch the story.”
      Document both in branding.

4. Taxonomy naming overlaps:

    - content-model.md proposes Species + Habitat + Gear Type + Story Category + Season.
    - fish-post-type.md suggests Habitat + optional Fish Type.
    - website-structure adds “Species taxonomy archive” (wording slightly differs).
      Decision: Final Taxonomies:
      Fish: species (hierarchical? NO, use fish_type for groups) + habitat (hierarchical) + season (flat)
      Gear: gear_type (hierarchical) + target_fish (post relationships preferred over taxonomy to avoid duplication)
      Stories: story_category (hierarchical) + (optional tags if needed)
      Document in taxonomy spec file.

5. Field Key Differences:
   Minor variant naming (fish*description vs fish_quick_facts group). Standardise meta key prefixes: fish*, gear*, story*.
   Decision: Add /docs/spec/field-naming.md.

6. Brand Font Fallbacks: Ensure consistent system fallback stacks.

Create /docs/decisions/DECISIONS.md capturing all above before coding begins.

================================================== 3. PHASED IMPLEMENTATION PLAN
==================================================
Phase 0 – Alignment & Decision Finalisation (0.5–1 day)

-   Create /docs/decisions/DECISIONS.md summarising resolutions above.
-   Confirm MVP scope (list Must Have).
-   Create baseline README + CONTRIBUTING referencing daily/weekly log practices.
    Deliverables: DECISIONS.md, updated README, initial issue backlog (manually or via AI prompts).

Phase 1 – Repository & Environment Setup (Day 1–2)

-   Folder structure (see Section 5).
-   Add theme skeleton: style.css header, theme.json stub, functions.php.
-   Install PHPCS, WP Coding Standards, EditorConfig, .gitignore.
-   Add GitHub Actions (optional) for linting (post-MVP if time).
    Deliverables: Running blank theme activated in local WP.

Phase 2 – Design Tokens (Day 2–3)

-   Implement canonical colour palette + typography + spacing scale in theme.json.
-   Add CSS variables mirror (if needed) in /assets/css/base.css for non-block contexts.
-   Validate generated custom properties in editor.
    Deliverables: theme.json (colours, typography, spacing, fontSizes, palette).
    DOD: Matches decisions; passes basic block editor preview; tokens documented in /docs/design-tokens.md.

Phase 3 – CPT & Taxonomy Registration (Day 3–4)

-   Register fish, gear, story CPTs (show_in_rest true).
-   Register taxonomies (habitat, fish_type, season, gear_type, story_category).
-   Use inc/cpt/\*.php includes loaded via functions.php.
    Deliverables: CPTs appear in admin, rest endpoints working (/wp-json/wp/v2/fish).
    DOD: Labels, slugs, has_archive, rest_base correct; permalinks flushed; code passes PHPCS.

Phase 4 – Field Groups (ACF / SCF) (Day 4–5)

-   Define JSON export (acf-json/) or simple custom fields if using SCF.
-   Ensure meta keys EXACTLY match spec (fish_average_size, story_main, gear_specifications etc.).
-   Add a /docs/spec/fields.md summarising final schema.
    Deliverables: Fields visible in editor with required validation where noted.
    DOD: Required fields enforced; post save serialized meta previewed; no naming drift.

Phase 5 – Template & Pattern Foundations (Day 5–7)

-   Templates: index.html, archive.html, single.html, search.html, 404.html.
-   Specific: archive-fish.html, single-fish.html, archive-gear.html, single-gear.html, archive-story.html, single-story.html, taxonomy-habitat.html, taxonomy-gear_type.html, taxonomy-story_category.html.
-   Pattern category registration + initial patterns: fish hero, fact box, gear single, story single layout, CTA banner, card grid.
    Deliverables: /patterns/_.php or _.json files with block markup placeholders.
    DOD: Patterns selectable in site editor; templates resolve correctly (test front end navigation).

Phase 6 – Block Bindings & Dynamic Bits (Day 7–8)

-   Map custom fields into Template Parts (if using block bindings API or PHP render wrappers).
-   Related content loops (Query Loop filtered by taxonomy / meta).
    Deliverables: Single templates show dynamic Quick Facts / Relations areas.
    DOD: No hard-coded sample text remains; using dynamic blocks or placeholders.

Phase 7 – Content Seeding (Day 8–10)

-   Add Fish (≥10), Gear (≥5), Stories (≥5) using frameworks (fish-content.md, gear-content.md, stories-content.md).
-   Add 5 Blog posts (use blog-posts.md template).
-   Use AI prompts (see Section 10) ensuring each passes SEO + microcopy guidelines.
    Deliverables: Draft content entries with excerpts, alt text, internal links.
    DOD: Each post: proper title hierarchy, alt text added, excerpt set, internal links (≥2), taxonomy applied.

Phase 8 – SEO & Accessibility Pass (Day 10–11)

-   Run through seo-checklist.md.
-   Add meta descriptions (Yoast or core fields).
-   Check heading order, link text clarity, colour contrast (use tooling).
-   Add FAQ block on at least one page (About or Fish archive).
    Deliverables: SEO audit doc /docs/reports/seo-initial.md + accessibility checklist /docs/reports/a11y.md.
    DOD: No critical contrast failures; single H1 per template; sitemap generated.

Phase 9 – Performance & Quality (Day 11–12)

-   Image compression; enable lazy loading (core).
-   Remove unused patterns; measure with Lighthouse.
-   Ensure minimal blocking assets (defer custom JS).
    Deliverables: /docs/reports/performance.md (baseline metrics).
    DOD: LCP < 3s local, minimal console errors.

Phase 10 – Documentation & Governance (Day 12)

-   Finalise README (usage), CONTRIBUTING (branch naming, commit style), DECISIONS, editorial workflow doc referencing logs.
-   Add evaluation rubric mapping (link to /docs/evaluation).
    Deliverables: Document set in repo root + /docs.
    DOD: A new contributor can on-board with zero verbal guidance.

Phase 11 – Launch Prep (Day 13)

-   Final visual sweep; ensure brand consistency (colours, fonts, tagline).
-   Tag release v0.1.0.
-   Create post-launch backlog (Phase 12 tasks).

Phase 12 – Post-MVP Enhancements (iterative)

-   Dark mode tokens.
-   Schema markup expansion (FAQ, Article, Breadcrumb).
-   Pattern library expansion (galleries, comparison tables).
-   Automated link checker script.
-   Global Options “Settings” page (site-wide CTAs, default images).

================================================== 4. PRIORITISED BACKLOG (MOSCOW)
==================================================
Must (MVP):

-   Decide canonical tokens (DECISIONS.md)
-   theme.json tokens (colour, typography, spacing)
-   Register CPTs + taxonomies
-   Field Groups for all CPTs
-   Core templates + single + archives
-   Patterns: fish hero, gear single layout, story single layout, CTA banner
-   Seed content (Fish 10 / Gear 5 / Stories 5 / Blog 5)
-   Basic SEO + accessibility pass
-   Internal linking + related loops

Should (Phase 2):

-   Additional patterns (gallery, multi-column story timeline)
-   Dark theme variant
-   Global Options page
-   Structured data enrichment (FAQ schema, Article JSON-LD)
-   Performance optimisation (code splitting, critical CSS)

Could (Later):

-   Automated test suite (PHPUnit for CPT registration)
-   Content linting script (style/tone checks)
-   Search facets (custom filters)
-   Newsletter integration
-   Multi-language readiness

Won’t (Now):

-   Headless front end
-   Custom JS-heavy interactions
-   User submission workflows beyond basic forms

================================================== 5. RECOMMENDED REPO STRUCTURE
==================================================
/ (root)
README.md
CONTRIBUTING.md
/theme (or /wp-content/themes/bfa if monorepo)
style.css
theme.json
functions.php
/inc
cpt-fish.php
cpt-gear.php
cpt-story.php
taxonomies.php
field-groups.php (if programmatic) or /acf-json/
helpers-related.php
/templates
index.html
archive-fish.html
single-fish.html
archive-gear.html
single-gear.html
archive-story.html
single-story.html
search.html
404.html
/parts
header.html
footer.html
sidebar.html
related-fish.html
related-gear.html
related-stories.html
/patterns
fish-hero.json
gear-single.json
story-single.json
cta-banner.json
card-grid.json
/assets
/css (base.css, utilities.css)
/js (minimal enhancements)
/images (logo, placeholders)
/docs
decisions/DECISIONS.md
design-tokens.md
spec/fields.md
spec/taxonomies.md
reports/seo-initial.md
reports/a11y.md
reports/performance.md
planning/
(original planning markdown copies or references)
/content-collection (draft copy if kept separate)
/logs
weekX/
.editorconfig
.gitignore
phpcs.xml

================================================== 6. ACCEPTANCE CRITERIA BY DOMAIN
==================================================
Design Tokens:

-   All palette slugs present; no unused “legacy” tokens.
-   Font families load with font-display: swap.
-   Spacing scale matches spacing.md (4px base multiples).

CPTs:

-   REST endpoints return expected keys (meta, taxonomy).
-   Admin UI: only relevant supports enabled.
-   Archive pages list correct post type entries.

Fields:

-   Required validations prevent empty save.
-   Field keys match spec exactly.
-   Admin “Notes” fields excluded from REST.

Templates / Patterns:

-   One H1 per page.
-   Patterns have meaningful titles/slugs (namespace prefix bfa/).
-   Mobile view: columns stack; fact boxes reflow.

Content:

-   Each Fish: description 100–200 words, Quick Facts present.
-   Each Gear: specs list + usage tips.
-   Each Story: 200–500 word narrative + linked Fish/Gear.
-   Alt text present for all featured images.

SEO:

-   Unique meta description (if using Yoast, no duplicates flagged).
-   Clean slugs, no uppercase or spaces.
-   Internal links: each content item links to ≥1 other CPT.

Accessibility:

-   Colour contrast AA for text.
-   Images have descriptive alt; decorative images use empty alt.
-   Headings logical (no skipping from H1 to H3).

Performance:

-   Images compressed (web-friendly sizes).
-   No blocking custom JS before first paint.
-   Lighthouse Performance ≥70 (local placeholder baseline).

Governance:

-   Commit messages: type(scope): action (e.g., feat(cpt): add fish registration).
-   Daily log created & updated.
-   Weekly reflection exists by Friday.

================================================== 7. RISK REGISTER & MITIGATIONS
==================================================

1. Inconsistent tokens → DECISIONS.md upfront; enforce via review checklist.
2. Scope creep with extra patterns → MOSCOW gating; only add after MVP.
3. Incomplete alt text → Add “ALT MISSING” pre-commit grep guard (optional).
4. SEO dilution (duplicate terms) → Central taxonomy spec file; review weekly.
5. Performance regression from large images → Add image size guidance & compression step in content workflow.
6. Field drift (renaming) breaks templates → Lock field names after Phase 4; log any changes in DECISIONS.md with version bump.
7. Over-reliance on AI generating inconsistent tone → Use voice-and-tone.md as mandatory prompt reference.

================================================== 8. VERSIONING & RELEASE STRATEGY
==================================================

-   v0.1.0: MVP (tokens + CPTs + base templates + initial content)
-   v0.2.0: Dark mode + expanded patterns + schema markup
-   v0.3.0: Performance tuning + automation scripts
-   v1.0.0: Public launch (complete docs, >80% planned species/gear coverage)

Tag each release; maintain CHANGELOG.md summarising features & fixes.

================================================== 9. DAILY & WEEKLY CADENCE (MAPPED TO PHASES)
==================================================
Example Week 1:
Day 1: Decisions + Repo scaffold
Day 2: theme.json tokens
Day 3: CPT + taxonomies
Day 4: Field groups
Day 5: Core templates + first pattern + daily log wrap

Weekly Friday: Reflection, evaluate against rubric (/docs/evaluation/), plan next sprint.

Daily Log Inputs:

-   Goals (tie to phase)
-   Files touched (paths)
-   Commits/PR links
-   Learned / blockers
-   Tomorrow plan

================================================== 10. AI PROMPT PLAYBOOK (COPY/PASTE TEMPLATES)
==================================================
Design Tokens Implementation:
“Using /docs/decisions/DECISIONS.md and colour-palette.md, generate theme.json colour + typography sections. Keep only final palette tokens.”

CPT Registration:
“Generate PHP for registering `fish` CPT with supports (title, editor, excerpt, thumbnail, revisions, author), show_in_rest true, has_archive true, rest_base ‘fish’. Place in /theme/inc/cpt-fish.php with namespace and action hook.”

Field Groups (ACF):
“Create ACF JSON for fish fields based on /docs/spec/fields.md: include fish_description, fish_quick_facts repeater (label + value), fish_conservation_status (select), etc.”

Pattern:
“Generate a WordPress block pattern JSON for a Fish Hero section (slug bfa/fish-hero) with placeholders: Featured Image block, H1 dynamic Post Title, two-column fact box (Habitat, Season, Average Size, Bait).”

Content (Fish Entry):
“Draft a Fish CPT entry for ‘Sharptooth Catfish’ using fish-content.md schema. 120-word description, fact box, Brandon’s note, alt text, internal links placeholder.”

Story:
“Using stories-content.md framework, draft a 350-word story about an early morning Smallmouth Yellowfish session in Huttenspruit. Include gear: Surface Popper Lure + Spinning Rod, embed alt text prompts.”

SEO Audit:
“Review current Fish CPT entries vs seo-checklist.md. Output missing meta descriptions, alt text gaps, weak internal link opportunities.”

Accessibility Sweep:
“Evaluate single-fish.html markup (provided) for WCAG 2.2 AA issues: heading order, contrast tokens, link text clarity. Suggest fixes only.”

Refactor Phase:
“Refactor cpt-gear.php to ensure PHPCS compliance and add inline comments describing filter choices.”

================================================== 11. METRICS & QUALITY GATES
==================================================
Quantitative:

-   Fish entries completeness ≥90% required fields
-   Gear + Stories cross-link ratio: ≥1 related fish + ≥1 related gear (where logical)
-   Average internal links per blog post: ≥3
-   Alt text coverage: 100% of non-decorative images
-   Lighthouse Accessibility score: ≥90
-   Yoast basic (or manual) green signals: ≥70% of pages

Qualitative:

-   Brand tone adherence (sample review weekly)
-   Consistent taxonomy usage
-   Pattern reuse vs ad hoc block duplication

================================================== 12. HANDOVER & MAINTENANCE CHECKLIST
==================================================
Before tagging v0.1.0:

-   All DECISIONS resolved + documented
-   theme.json validated (no syntax errors)
-   CPT REST endpoints tested (curl or browser)
-   Patterns appear in Editor pattern inserter
-   Content seeds created & internally linked
-   SEO + accessibility initial reports stored
-   README instructs fresh install steps
-   Commit history clean (no large binary noise)

================================================== 13. NEXT EVOLUTION IDEAS (POST MVP)
==================================================

-   Add a “Compare Fish” custom pattern.
-   Implement automatic related content via taxonomy weighting.
-   Add inline glossary (tooltips) for species terms.
-   CLI script: “php bin/generate-fish.php ‘Tigerfish’” to scaffold content placeholders.
-   Unit tests verifying CPT + taxonomy registration arrays.
-   Add JSON-LD (Article, BreadcrumbList, FAQ) server-side.

================================================== 14. IMMEDIATE FIRST ACTIONS (DO NOW)
==================================================

1. Create /docs/decisions/DECISIONS.md with resolutions (Section 2).
2. Scaffold theme folder + minimal theme.json.
3. Register fish CPT first (fast win) and confirm REST endpoint.
4. Log Day 1: goals + decisions tasks.
5. Draft initial Fish entry via AI to validate workflow.

================================================== 15. SAMPLE DECISIONS.MD STARTER (YOU CAN COPY)
==================================================
Decision Log (excerpt):

-   Typography: Montserrat (headings), Lora (body), Open Sans (UI) — deprecated: Playfair, Inter.
-   Colour: Adopt colour-palette.md; style-guide.md legacy colours mapped to accent variants.
-   Tagline: Primary “Stories from the river, catches for a lifetime.” Short: “Catch the story.”
-   Taxonomies: fish_type (non-hier), habitat (hier), season (flat), gear_type (hier), story_category (hier).
-   Meta prefixes: fish*, gear*, story\_ only.
-   Related content uses post relationships, not extra taxonomies.
    (…continue)

==================================================
CONCLUSION
==================================================
