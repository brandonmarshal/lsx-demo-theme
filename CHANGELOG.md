# LSX Demo Theme Changelog

All notable changes to the LSX Demo Theme are documented in this file.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)  
and the project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.0-rc.1] - 2025-10-27
Release Candidate 1 consolidates design system evolution, Fish CPT full site editing support, expanded block patterns, styling, accessibility/performance optimization, and extensive documentation/log updates.

### Added
- Fish Custom Post Type (CPT) full site editing support: patterns, templates, demo content (#44, #45, #46, #47)
- Fish section patterns: hero, facts, gallery, related; archive & single integrations (#44, #45, #46)
- Homepage section pattern templates (experiences and structured sections) (#65)
- New style variations, enhanced color palettes, and font pairings (Lexend & Manrope) (#75)
- Custom block styles for brand flexibility (#68, #75)
- Additional template parts & block templates (about, headers/footers/navigation refinements) (#72, #77)
- Performance & SEO optimization assets (#48)
- Accessibility improvement assets (semantic revisions, contrast, focus) (#48)
- Pattern category organization expansion (#65, #47)
- Iterative content and educational documentation (weekly logs and reflections) (#52, #53, #31, #33, #70, #71, #73, #74)
- Version groundwork for pre-release (CHANGELOG bump) (#49)

### Changed
- Global header, footer, and about page styling refinements (#68, #72, #75)
- Consolidated Fish CPT patterns/templates for standards compliance (#46, #47)
- Evolved pattern & template architecture for modularity (#65, #72, #77)
- Style variation reorganizations to reflect new brand identity (#75)
- Broader template coverage improvements (#77)
- Aggregated structural adjustments via develop→main merges (#64, #67, #69, #76, #78)

### Fixed
- Formatting/syntax corrections in core theme code (functions.php) (#50)
- Additional syntax & code quality polish guided by automated review (#51)

### Performance
- Core Web Vitals-oriented layout/template refinements (#48)
- CSS/JS footprint reduction through styling consolidation (#68, #75, #77)
- Early pattern optimization minimizing layout shift (#46, #47)

### Accessibility
- Improved heading hierarchy & semantic structure (#48)
- Navigation and focus ordering enhancements (#68, #72)
- Color contrast adherence with updated palette (#75, #48)

### Documentation
- Extensive recurring weekly logs & reflections (#52, #53, #31, #33, #70, #71, #73, #74)
- Changelog versioning adjustments (#49)
- Ongoing educational support via structured logging workflow (#52, #53)

### Refactoring / Code Quality
- Style / structural cleanup across templates & patterns (#68, #72, #77)
- Fish CPT polishing for WordPress standards (#46, #47)
- Formatting consistency passes (#50, #51)

### Security
- (No new explicit security PRs in RC scope; continuing adherence to sanitization/escaping baseline established in earlier work.)

### Removed
- No removals recorded in retrieved PR metadata.

### Internal / Meta
- Develop branch merges staging cumulative improvements (#64, #67, #69, #76, #78)
- QA and polish cycles for Fish CPT and global theme assets (#46, #48)

### Exclusions
- Closed but unmerged drafts (#10 “testing copilot”, #12 WIP test task) not included.
- Closed without merge PR #43 (initial Fish CPT section patterns) superseded by merged follow-ups.

## [0.1.0] - 2025-09-25
### Initial Release
Foundation for the LSX Demo Theme block-based architecture.

#### Added
- Exported base block theme scaffold (Create Block Theme) (#14)
- Large initial content & structural build-out (Brandon work) (#13)
- Journal adjustments / early documentation enhancement (#11)
- Early logs and template setup for learning workflow (#27)
- Initial theme.json configuration enabling Full Site Editing (FSE)
- Base block patterns and template parts (header, footer, navigation)
- Variable typography integration (Lexend, Manrope)
- Core color palette (Jet Black, Safety Orange, Neon Green)
- Foundational documentation & educational logging system (README, early logs)

#### Notes
- Draft/unmerged exploratory PR (#10) excluded from released features.

---

## Usage Guidance for Release Candidates
- Tag this version: `git tag v1.0.0-rc.1 && git push origin v1.0.0-rc.1`
- Create a GitHub Release using the RC section above as the description.
- Provide compare links once tags are in place:
  - Diff since previous release: `https://github.com/brandonmarshal/lsx-demo-theme/compare/v0.1.0...v1.0.0-rc.1`
- Update any internal documentation references from “beta” to “rc.1” where applicable.

## Future Improvements (Post-RC)
- Additional automated accessibility test coverage (axe-core + Playwright scenarios)
- Visual regression baseline snapshots
- Extended dynamic patterns (query-based / CPT-driven)
- Potential WooCommerce compatibility layer
- Internationalization (i18n) expansion

## Contributing
See CONTRIBUTING.md and DEVELOPMENT.md for workflow, coding standards, and review processes.

## License
GPL-2.0-or-later (see LICENSE).
