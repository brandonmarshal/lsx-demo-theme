# 🎣 Fishing Theme

A modern WordPress block theme built with Full Site Editing (FSE) capabilities for fishing and outdoor adventure websites. This theme provides comprehensive features for managing fish species, gear, fishing areas, and adventure content, built following [LightSpeedWP organization standards](https://github.com/lightspeedwp/.github).

[![WordPress](https://img.shields.io/badge/WordPress-6.8+-blue.svg)](https://wordpress.org/)
[![Block Theme](https://img.shields.io/badge/Block%20Theme-FSE-green.svg)](https://developer.wordpress.org/themes/block-themes/)
[![Node.js](https://img.shields.io/badge/Node.js-18+-green.svg)](https://nodejs.org/)
[![Testing](https://img.shields.io/badge/Testing-Playwright-red.svg)](https://playwright.dev/)

<!--
README.md Inline Documentation
--------------------------------
This README provides a comprehensive overview of the Fishing Theme, including setup, architecture, contributor recognition, and key documentation references. All content follows LightSpeedWP organization standards as outlined in @lightspeedwp/.github.
-->

## 🚀 Quick Start

```bash
# Clone the repository
git clone https://github.com/lightspeedwp/fishing-theme.git
cd fishing-theme

# Install dependencies
npm install
composer install  # Optional, for PHP linting

# Start development
npm start

# Run tests
npm test
```

**[📖 Full Development Setup Guide →](./DEVELOPMENT.md)**

<!--
Reference: Key documentation files follow LightSpeedWP organization standards. See each file for details on security, contributing, code of conduct, changelog, license, and support. All standards reference @lightspeedwp/.github.
-->

## 🤝 Contributing & Support

<!--
This section covers contributor recognition, support channels, and links to key documentation following LightSpeedWP organization standards.
-->

### Built for Fishing & Outdoor Adventure Websites

**Full Site Editing (FSE)** with comprehensive `theme.json` configuration
**Custom Post Types** for Fish Species, Gear, and Fishing Areas
**Block patterns and template parts** for rapid fishing content development
**Comprehensive testing** with Playwright and accessibility checks
**WordPress coding standards** enforcement via automated linting
**Performance optimized** for Core Web Vitals
**SEO & Accessibility Optimized** - WCAG 2.2 AA compliant

### 🎣 Key Features

This theme is specifically designed for fishing and outdoor adventure websites featuring:

-   **Fish Species Management**: Custom post type with detailed species profiles, habitats, and seasonal information
-   **Fishing Gear Catalog**: Organize and showcase fishing equipment and accessories
-   **Fishing Areas**: Document and share information about fishing locations and areas
-   **Blog Integration**: Share fishing stories, tips, and educational content
-   **Taxonomy System**: Species, habitats, seasons, gear types, and area categories
-   **Responsive Design**: Mobile-first design optimized for field use

### ✨ Technical Highlights

-   **🔍 SEO Excellence**: Comprehensive meta tags, structured data
-   **♿ Accessibility**: WCAG 2.2 AA compliant with zero axe-core violations
-   **⚡ Performance**: Core Web Vitals optimized with lazy loading
-   **🧪 Testing**: Automated accessibility and performance testing with Playwright
-   **📱 Responsive**: Mobile-first design with progressive enhancement
-   **🛠️ Developer-Friendly**: Built following [LightSpeedWP coding standards](https://github.com/lightspeedwp/.github)

### Based on WordPress Twenty Twenty-Five

This theme extends the WordPress [Twenty Twenty-Five](https://make.wordpress.org/core/2024/08/15/introducing-twenty-twenty-five/) theme with:

**Fishing-specific features** and custom post types
**Custom color palette** and typography optimized for outdoor/adventure content
**Accessibility-first** approach (WCAG 2.2 AA compliance)
**Performance optimization** and modern build tools
**Organization compliance** with [LightSpeedWP standards](https://github.com/lightspeedwp/.github)

## 🛠️ Technology Stack

### Core Technologies

**WordPress 6.8+** with Full Site Editing (FSE)
**Node.js 18+** and npm for build tooling
**@wordpress/scripts** for development workflow
**Sass/SCSS** for stylesheets with PostCSS processing
**Playwright** for end-to-end and accessibility testing

### Development Tools

**[VS Code](https://code.visualstudio.com/)** with WordPress-optimized configuration
**[WordPress Studio](https://developer.wordpress.com/studio/)** or [LocalWP](https://localwp.com/) for local development
**[GitHub](https://github.com/)** for version control and collaboration
**Compliance with** [LightSpeedWP standards](https://github.com/lightspeedwp/.github)

### Development Best Practices

**Coding Standards** - Following [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/) and [LightSpeedWP guidelines](https://github.com/lightspeedwp/.github/blob/develop/.github/instructions/coding-standards.instructions.md)
**Automated Testing** - Playwright for E2E and accessibility validation
**Code Quality** - PHPCS, ESLint, and Stylelint enforcement
**Documentation** - Comprehensive inline docs and README files per [LightSpeedWP docs standards](https://github.com/lightspeedwp/.github)

## 🏗️ Theme Architecture

```text
├── 📁 .github/              # GitHub workflows and organization compliance
│   ├── agents/             # Specialized development agents
│   ├── chatmodes/          # Extended development workflows
│   ├── instructions/       # Coding standards & best practices
│   ├── prompts/            # Reusable development templates
│   └── workflows/          # CI/CD automation
├── 📁 .vscode/              # VS Code configuration
│   ├── extensions.json     # WordPress development extensions
│   └── settings.json       # WordPress-optimized editor settings
├── 📁 inc/                 # Theme includes
│   ├── cpt-fish.php        # Fish species custom post type
│   ├── cpt-gear.php        # Gear custom post type
│   ├── cpt-area.php        # Fishing areas custom post type
│   ├── taxonomies.php      # Custom taxonomies
│   └── block-styles.php    # Custom block styles
├── 📁 patterns/            # Block patterns for content creation
├── 📁 parts/               # Template parts (header, footer, etc.)
├── 📁 templates/           # Block templates for FSE
├── 📁 styles/              # Theme style variations
├── 📁 e2e/                 # Playwright end-to-end tests
├── 📁 src/                 # Source files (SCSS, JS)
├── SECURITY.md             # Security policy and reporting
├── CONTRIBUTING.md         # Contribution guidelines per LightSpeedWP standards
├── CODE_OF_CONDUCT.md      # Community standards
├── CHANGELOG.md            # Release history
├── LICENSE                 # GPL-3.0 license
└── SUPPORT.md              # Support policy
```

<!--
Reference: Key documentation files are listed above. See each file for details on security, contributing, code of conduct, changelog, license, and support.
-->

## 📝 Changelog

See [CHANGELOG.md](./CHANGELOG.md) for a complete release history and notable changes.

<!--
CHANGELOG.md documents all notable changes using Keep a Changelog format and semantic versioning. Review this file for release notes and upgrade guidance.
-->

## 🤝 Contributing & Support

<!--
This section covers contributor recognition, support channels, and links to key documentation. See .all-contributorsrc for contributor config and badges.
-->

### Contributors

This project is maintained by the LightSpeedWP organization and follows all [organizational standards](https://github.com/lightspeedwp/.github).

#### Current Contributors

[![Contributors](https://img.shields.io/badge/Contributors-LightSpeedWP%20Org-blue)](https://github.com/lightspeedwp/fishing-theme/graphs/contributors)

-   **LightSpeedWP** ([organization](https://github.com/lightspeedwp))
-   **Ashley Shaw (LightSpeed)** ([profile](https://lightspeedwp.agency))

### For Contributors

1. **Fork the repository** and create a feature branch
2. **Follow WordPress and LightSpeedWP coding standards** (automated linting enforced)
   - Reference: [Coding Standards](https://github.com/lightspeedwp/.github/blob/develop/.github/instructions/coding-standards.instructions.md)
   - Reference: [Custom Instructions](https://github.com/lightspeedwp/.github/blob/develop/.github/custom-instructions.md)
3. **Write tests** for new functionality (Playwright for E2E, PHPUnit for PHP)
4. **Update documentation** for any new features or changes
5. **Submit a pull request** with clear description and issue references following [LightSpeedWP PR guidelines](https://github.com/lightspeedwp/.github)

### Getting Help

-   **📖 Documentation**: Check [DEVELOPMENT.md](./DEVELOPMENT.md) for technical setup
-   **📋 Issues**: Create GitHub issues for bugs or feature requests
-   **💬 Community**: WordPress.org forums and Slack communities
-   **🏢 Organization**: Follow [LightSpeedWP standards](https://github.com/lightspeedwp/.github)

### Issue Templates

Use the provided issue templates in `.github/ISSUE_TEMPLATE/`:

-   **🐛 Bug Report** - Report functionality issues
-   **✨ Feature Request** - Suggest new features
-   **📖 Documentation** - Request or improve documentation
-   **⚡ Performance** - Report performance issues
-   **♿ Accessibility** - Report accessibility concerns

### Key Documentation & Policies

All documentation follows [LightSpeedWP organization standards](https://github.com/lightspeedwp/.github):

-   [Security Policy](./SECURITY.md)
-   [Contributing Guide](./CONTRIBUTING.md) - References [LightSpeedWP Contributing Guidelines](https://github.com/lightspeedwp/.github/blob/develop/.github/instructions/coding-standards.instructions.md)
-   [Code of Conduct](./CODE_OF_CONDUCT.md)
-   [Changelog](./CHANGELOG.md)
-   [License](./LICENSE) - GPL-3.0-or-later
-   [Support Policy](./SUPPORT.md)

<!--
Each documentation file above provides detailed guidance on its topic. Review these for security, contribution, community standards, release history, licensing, and support.
-->

## 📄 License & Credits

-   **License**: GPL-3.0-or-later (see [LICENSE](./LICENSE))
-   **Base Theme**: Twenty Twenty-Five by WordPress.org
-   **Organization**: Built following [LightSpeedWP standards](https://github.com/lightspeedwp/.github)
-   **Typography**: [Abel](https://fonts.google.com/specimen/Abel) and [Raleway](https://fonts.google.com/specimen/Raleway) from Google Fonts
-   **Testing**: Powered by [Playwright](https://playwright.dev/)

**Built with ❤️ for the WordPress fishing and outdoor adventure community**

<!--
License is GPL-3.0-or-later, following WordPress and LightSpeedWP standards. See LICENSE for full terms and @lightspeedwp/.github for organization guidelines.
-->
