# Changelog

All notable changes to the Fishing CPT Plugin will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

-   Gallery field for Fish, Gear, and Area post types via ACF/SCF
-   `fishing/gallery` Gutenberg block with lightbox functionality
-   Responsive image gallery with 1-6 column support
-   Lightbox overlay with keyboard navigation (Arrow keys, Escape, Home, End)
-   Touch/swipe support for mobile devices
-   Image caption display toggle
-   Multiple image size options (thumbnail, medium, large, full)
-   Lazy loading for gallery images
-   ARIA labels and focus management for accessibility
-   Reduced motion support for animations
-   Gallery lightbox JavaScript asset (`fishing-gallery-lightbox.js`)
-   Gallery asset enqueue system
-   Meta boxes and taxonomies for Fishing CPT Plugin

### Changed

-   Updated BLOCKS_DOCUMENTATION.md with gallery block documentation
-   Enhanced block registration to include fishing-gallery block
-   Update @wordpress/scripts dependency to version 31.0.0 in package.json
-   Refactor repeatable fields and templates for improved readability and consistency
-   Improve code formatting and consistency in block bindings file
-   Re-organized my plugin folder

### Plugin Work since last release (2025-11-05):

-   **Rebranded plugin for organization compliance** – Refactored text, variable names, and branding to "Fishing Theme" throughout blocks, patterns, documentation, and asset structure.
-   **Comprehensive documentation update** – Added `REBRAND_SUMMARY.md`, extended all major guides for new naming and plugin handling.
-   **Finalized pattern and block updates** – Standardized slugs, categories, and all references. Ensured all parts/blocks/templates use consistent domain/title.
-   **Accessibility and code review improvements** – Completed semantic revision, improved ARIA usage, and fixed focus management across custom blocks (notably gallery/facts).
-   **Dependency management optimization** – Plugin now more robustly handles missing dependencies, including secure error notices and auto-deactivation if ACF/SCF is not installed.
-   **Internal build/process enhancements**:
    -   Gallery asset enqueue is conditional for frontend (only loads if block exists).
    -   Block registration scripts refactored for performance and maintainability.
    -   Package, multi-block verification, and automated packaging scripts improved.

### Fixed

-   Documentation, README, and meta file links/branding now up to date with all changes from the develop branch as of this morning.
-   Fix namespacing inconsistencies to use FishingCPTPlugin root namespace

## [1.0.2] - 2025-11-05

### Added

-   Comprehensive multi-block plugin architecture documentation (`MULTI_BLOCK_ARCHITECTURE.md`)
-   Implementation completion summary (`IMPLEMENTATION_COMPLETE.md`)
-   Automated verification script (`verify-multi-block.sh`) to validate plugin structure
-   Automated packaging script (`package-test.sh`) for creating distribution packages
-   Distribution exclusions file (`.distignore`) for WordPress.org compatibility
-   Testing scaffolding: `phpcs.xml.dist` for code standards and `phpunit.xml.dist` for unit testing
-   Enhanced README with multi-block architecture section and documentation links
-   Pattern-based exclusions in `.distignore` for better maintainability
-   rsync availability check in packaging script
-   Comprehensive block verification in packaging script (all 6 blocks)

### Changed

-   Improved `.distignore` to use pattern-based file exclusions instead of per-file listings
-   Updated README.md with detailed multi-block architecture section
-   Enhanced package verification to check all blocks, not just fish-card

### Fixed

-   Removed committed ZIP artifact from repository
-   Added ZIP files to `.gitignore` to prevent future commits
-   Corrected documentation file references in `.distignore`
-   Fixed block counting logic in verification script

## [1.0.1] - Previous Release

### Added

-   Google Maps integration for Area posts
-   Bidirectional relationship fields between Fish, Gear, and Areas
-   Repeatable field groups (fish facts, gear specs)
-   Six custom Gutenberg blocks (fish-card, gear-card, area-card, fish-facts, gear-specs, repeatable-facts)
-   REST API endpoints for fish facts
-   Settings page for CPT configuration
-   Query loop variations for custom post types

### Changed

-   Refactored to use Secure Custom Fields (SCF) / Advanced Custom Fields (ACF)
-   Improved block registration system
-   Enhanced documentation structure

## [1.0.0] - Initial Release

### Added

-   Custom Post Types: Fish, Gear, Areas
-   Basic meta fields for each CPT
-   Block patterns for content layouts
-   Initial Gutenberg blocks
-   Translation support with POT file
-   WordPress 6.8.0+ compatibility

[1.0.2]: https://github.com/brandonmarshal/lsx-demo-theme/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/brandonmarshal/lsx-demo-theme/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/brandonmarshal/lsx-demo-theme/releases/tag/v1.0.0
