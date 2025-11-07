# Fishing Theme Changelog

All notable changes to the Fishing Theme are documented in this file.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)  
and the project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

This theme is built following [LightSpeedWP organization standards](https://github.com/lightspeedwp/.github).

## [1.0.0] - 2025-11-07

### Major Release - Complete Theme Rebrand

This release represents a complete rebrand from "LSX Demo Theme" to "Fishing Theme" with removal of all demo/test content and full compliance with LightSpeedWP organization standards.

### Changed
- **Complete Theme Rebrand**: Renamed from "lsx-demo-theme" to "fishing-theme"
- **Theme Identity**: Updated all theme headers, metadata, and branding
- **Function Prefixes**: Changed all function prefixes from `lsx_demo_theme_*` to `fishing_theme_*`
- **Text Domain**: Updated text domain from `lsx-demo-theme` to `fishing-theme` throughout
- **Package Names**: Updated npm and composer package names
- **Organization Compliance**: Added references to [@lightspeedwp/.github](https://github.com/lightspeedwp/.github) standards
- **Documentation**: Updated all documentation to reflect Fishing Theme branding

### Removed
- **Demo Content**: Removed inc/seed-bass-post.php (demo content generator)
- **Test Files**: Removed fishing-cpt-test.php and fishing-block-debug.php
- **Example Files**: Removed tests-examples directory

### Added
- **Organization References**: Added @lightspeedwp/.github references in documentation and code
- **Compliance**: Full adherence to [LightSpeedWP coding standards](https://github.com/lightspeedwp/.github/blob/develop/.github/instructions/coding-standards.instructions.md)

## [Previous Features - Pre-Rebrand]

### Fishing Content Features
- Section Style System with fishing-specific block styles: Hero, Gallery, Archive Grid
- Fishing-specific colors: River Blue (#3A6B68), Burnt Orange (#E58F5C), Olive Deep (#6B7C3A)
- Fish Custom Post Type with species, habitat, and season taxonomies
- Gear Custom Post Type with gear type taxonomy
- Fishing Areas Custom Post Type with area category taxonomy
- Comprehensive block patterns for fishing content
- Full Site Editing (FSE) support with theme.json
- Typography system with Abel and Raleway fonts
- Accessibility compliance (WCAG 2.2 AA)
- Performance optimization for Core Web Vitals

## Contributing

See [CONTRIBUTING.md](./CONTRIBUTING.md) and [DEVELOPMENT.md](./DEVELOPMENT.md) for workflow, coding standards following [LightSpeedWP guidelines](https://github.com/lightspeedwp/.github), and review processes.

## License

GPL-3.0-or-later (see [LICENSE](./LICENSE)).
