# Changelog

All notable changes to the Fishing CPT Plugin will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.2] - 2025-11-05

### Added
- Comprehensive multi-block plugin architecture documentation (`MULTI_BLOCK_ARCHITECTURE.md`)
- Implementation completion summary (`IMPLEMENTATION_COMPLETE.md`)
- Automated verification script (`verify-multi-block.sh`) to validate plugin structure
- Automated packaging script (`package-test.sh`) for creating distribution packages
- Distribution exclusions file (`.distignore`) for WordPress.org compatibility
- Testing scaffolding: `phpcs.xml.dist` for code standards and `phpunit.xml.dist` for unit testing
- Enhanced README with multi-block architecture section and documentation links
- Pattern-based exclusions in `.distignore` for better maintainability
- rsync availability check in packaging script
- Comprehensive block verification in packaging script (all 6 blocks)

### Changed
- Improved `.distignore` to use pattern-based file exclusions instead of per-file listings
- Updated README.md with detailed multi-block architecture section
- Enhanced package verification to check all blocks, not just fish-card

### Fixed
- Removed committed ZIP artifact from repository
- Added ZIP files to `.gitignore` to prevent future commits
- Corrected documentation file references in `.distignore`
- Fixed block counting logic in verification script

## [1.0.1] - Previous Release

### Added
- Google Maps integration for Area posts
- Bidirectional relationship fields between Fish, Gear, and Areas
- Repeatable field groups (fish facts, gear specs)
- Six custom Gutenberg blocks (fish-card, gear-card, area-card, fish-facts, gear-specs, repeatable-facts)
- REST API endpoints for fish facts
- Settings page for CPT configuration
- Query loop variations for custom post types

### Changed
- Refactored to use Secure Custom Fields (SCF) / Advanced Custom Fields (ACF)
- Improved block registration system
- Enhanced documentation structure

## [1.0.0] - Initial Release

### Added
- Custom Post Types: Fish, Gear, Areas
- Basic meta fields for each CPT
- Block patterns for content layouts
- Initial Gutenberg blocks
- Translation support with POT file
- WordPress 6.8.0+ compatibility

[1.0.2]: https://github.com/brandonmarshal/lsx-demo-theme/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/brandonmarshal/lsx-demo-theme/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/brandonmarshal/lsx-demo-theme/releases/tag/v1.0.0
