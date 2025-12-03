# Copilot Instructions for AI Block Theme Template

You are working on the LSX Demo Theme, an intern learning project and WordPress block theme built with Full Site Editing (FSE). This - Prefix all functions with `fishing_theme_`

-   Use proper WordPress text domain: `lsx-demo-theme`pository serves as both a practical WordPress block theme and a comprehensive learning environment for WordPress development with integrated AI development tools and extensive Copilot asset library.

## Repository Overview

The LSX Demo Theme is a WordPress block theme that follows modern development practices and serves as an intern learning project:

-   Full Site Editing (FSE) support with comprehensive `theme.json`
-   Block patterns and template parts for rapid development
-   Style variations including dark mode
-   Modern development workflow with WordPress packages (`@wordpress/scripts`, `@wordpress/eslint-plugin`, etc.)
-   End-to-end testing with Playwright
-   AI-powered development features and GitHub Copilot integration
-   Comprehensive library of Copilot assets (instructions, prompts, chat modes, agents)

## Key Principles

1. **WordPress Standards**: Follow WordPress Coding Standards using WordPress packages for PHP, JavaScript, and CSS
2. **Block-First Development**: Prioritize block editor compatibility and avoid legacy patterns
3. **Performance**: Optimize for speed and accessibility using WordPress performance guidelines
4. **Maintainability**: Write clean, documented, and testable code with modern build tools
5. **AI Enhancement**: Leverage AI tools and Copilot assets for improved development efficiency
6. **Package-First**: Use WordPress packages for linting, testing, and build processes

## File Structure

### Theme Files

-   `functions.php` - Theme functions and setup
-   `theme.json` - Theme configuration and design tokens (v2 schema)
-   `style.css` - Main theme stylesheet with theme header
-   `inc/` - Modular PHP includes
-   `parts/` - Template parts (header, footer, etc.)
-   `patterns/` - Block patterns with proper categorization
-   `styles/` - Theme style variations
-   `templates/` - Block templates for FSE
-   `src/` - TypeScript/JavaScript source files
-   `tests/e2e/` - End-to-end Playwright tests

### AI/Copilot Assets

-   `.github/instructions/` - Contextual behavioral guidance (auto-applied)
-   `.github/prompts/` - Single-shot reusable tasks and templates
-   `.github/chatmodes/` - Persistent conversational personas and workflows
-   `.github/agents/` - Specialized AI agents for specific tasks

## Development Commands (WordPress Packages)

### Build & Development

-   `npm run start` - Development server with hot reload (`@wordpress/scripts`)
-   `npm run build` - Development build
-   `npm run build:production` - Optimized production build
-   `npm run dev` - Alias for start command

### Linting & Code Quality

-   `npm run lint` - Run all linters
-   `npm run lint:js` - JavaScript linting with WordPress ESLint rules
-   `npm run lint:css` - CSS linting with WordPress Stylelint config
-   `npm run lint:php` - PHP linting with WordPress coding standards
-   `npm run lint:pkg-json` - Package.json validation
-   `composer run lint` - PHP CodeSniffer with WordPress standards

### Formatting

-   `npm run format` - Format all code
-   `npm run format:js` - Format JavaScript with WordPress Prettier config
-   `npm run format:css` - Fix CSS linting issues

### Testing

-   `npm run test:e2e` - Run Playwright end-to-end tests
-   `npm run test:e2e:headed` - Run tests with browser UI
-   `npm run test:e2e:debug` - Debug tests with Playwright inspector
-   `npm run test:js` - JavaScript unit tests
-   `npm run test` - Run all tests

### Utilities

-   `npm run packages-update` - Update WordPress packages
-   `npm run makepot` - Generate translation files

## Copilot Asset Taxonomy

| Asset Type      | File Pattern        | Purpose                                                                                        | Scope                                           | Typical Use                                       |
| --------------- | ------------------- | ---------------------------------------------------------------------------------------------- | ----------------------------------------------- | ------------------------------------------------- |
| **Instruction** | `*.instructions.md` | Global or contextual behavioral guidance (security, a11y, performance, WordPress standards)    | Passive, auto-applied based on location/applyTo | Improve baseline behavior in reviews & generation |
| **Prompt**      | `*.prompts.md`      | Single-shot reusable task/template (generate spec, create block pattern, configure theme.json) | Invoked explicitly (`/name`)                    | Consistent task execution                         |
| **Chat Mode**   | `*.chatmodes.md`    | Persistent conversational persona or workflow mode (pattern wizard, accessibility assistant)   | Selected in chat UI                             | Extended multi-step behavior                      |
| **Agent**       | `*.agents.md`       | Specialized AI agents for specific WordPress tasks                                             | Invoked for domain expertise                    | Complex WordPress-specific workflows              |

### When to Create What (WordPress Context)

-   **Instruction**: Use for WordPress coding standards, security practices, accessibility requirements that should always apply
-   **Prompt**: Use for generating WordPress-specific artifacts (block patterns, theme.json configs, Playwright tests)
-   **Chat Mode**: Use for sustained WordPress development workflows (pattern creation, accessibility auditing, performance optimization)
-   **Agent**: Use for specialized WordPress expertise (block theme architecture, WooCommerce integration, performance profiling)

## WordPress Package Integration

This theme leverages the WordPress packages ecosystem:

### Core Packages Used

-   `@wordpress/scripts` - Build tooling and development server
-   `@wordpress/eslint-plugin` - JavaScript linting with WordPress standards
-   `@wordpress/stylelint-config` - CSS linting configuration
-   `@wordpress/prettier-config` - Code formatting rules
-   `@wordpress/babel-preset-default` - JavaScript compilation
-   `@wordpress/dependency-extraction-webpack-plugin` - WordPress dependency handling
-   `@wordpress/e2e-test-utils-playwright` - Playwright testing utilities

### VS Code Integration

-   Configuration in `.vscode/` directory with WordPress-optimized settings
-   Enhanced Copilot integration via `.vscode/agent.json` and `.vscode/configuration.md`
-   Recommended extensions in `.vscode/extensions.json` for WordPress development
-   MCP protocol configuration in `.vscode/mcp.json` for enhanced AI assistance

### Development Workflow

1. Use `@wordpress/scripts` for all build processes
2. Follow WordPress ESLint and Stylelint configurations
3. Leverage WordPress Prettier for consistent formatting
4. Use WordPress-specific Playwright utilities for e2e testing
5. Maintain WordPress coding standards with automated tooling

## AI Development Features

### Copilot Asset Library

-   **Specialized agents** in `.github/agents/` for WordPress expertise
-   **Comprehensive instructions** in `.github/instructions/` covering security, accessibility, performance
-   **Expert chat modes** in `.github/chatmodes/` for sustained development workflows
-   **Reusable prompts** in `.github/prompts/` for common WordPress tasks
-   **Automated workflows** in `.github/workflows/` for testing, deployment, and quality assurance

### AI-Enhanced Development

-   GitHub Copilot integration with WordPress-specific context via `.vscode/agent.json`
-   AI-assisted block pattern creation and optimization
-   Intelligent code suggestions following WordPress standards
-   Automated accessibility and performance auditing
-   Smart theme.json configuration assistance via `.vscode/configuration.md`
-   Comprehensive inline documentation assistance with WordPress standards
-   Interactive learning support for intern development workflow

## Extension Migration Policy

**Plural forms are now canonical:**

-   `*.prompts.md` replaces `*.prompt.md`
-   `*.chatmodes.md` replaces `*.chatmode.md`

**Migration approach:**

1. New assets MUST use plural forms
2. Legacy filenames remain as deprecation stubs with frontmatter
3. Automation recognizes both during transition
4. External consumers should update references

## Quality Standards for WordPress Block Theme

### WordPress Standards Compliance

-   Follow WordPress PHP Coding Standards (enforced via PHPCS)
-   Use WordPress JavaScript coding standards (ESLint configuration)
-   Implement WordPress CSS guidelines (Stylelint configuration)
-   Prefix all functions with `ai_block_theme_`
-   Use proper WordPress text domain: `ai-block-theme-template`

### Block Theme Requirements

-   Full Site Editing (FSE) compatibility
-   theme.json v2 schema compliance
-   Proper block pattern categorization and registration
-   Template part functionality
-   Site Editor compatibility
-   Accessibility standards (WCAG 2.1 AA)

### Build Process Standards

-   Use WordPress packages for all tooling
-   Maintain TypeScript compatibility where applicable
-   Ensure Playwright e2e test coverage
-   Follow WordPress asset enqueuing best practices
-   Optimize for performance and Core Web Vitals

### Security & Performance

-   Implement proper sanitization and escaping
-   Use WordPress nonces for form security
-   Follow WordPress security best practices
-   Optimize for performance with WordPress caching
-   Minimize HTTP requests and optimize assets

## WordPress Inline Documentation Standards

This project follows strict WordPress inline documentation standards:

### PHP Documentation (PHPDoc)

-   All functions must have complete PHPDoc blocks
-   Include `@since` tags with version numbers
-   Document all parameters with types and descriptions
-   Document return values with types
-   Use WordPress function prefixes (`fishing_theme_`)
-   Follow [WordPress PHP Documentation Standards](https://github.com/WordPress/wpcs-docs/blob/master/inline-documentation-standards/php.md)

### JavaScript Documentation (JSDoc)

-   All functions must have complete JSDoc blocks
-   Include `@since` tags with version numbers
-   Document parameters with proper types
-   Document return values and types
-   Follow [WordPress JavaScript Documentation Standards](https://github.com/WordPress/wpcs-docs/blob/master/inline-documentation-standards/javascript.md)

### General Documentation Guidelines

-   [WordPress Inline Documentation Standards](https://github.com/WordPress/wpcs-docs/blob/master/inline-documentation-standards.md)
-   [WordPress Style Guide](https://github.com/WordPress/wpcs-docs/blob/master/styleguide.md)

### Available Documentation Assets

-   **Instructions**: `.github/instructions/inline-documentation-php.instructions.md` and `.github/instructions/inline-documentation-js.instructions.md`
-   **Chat Mode**: `.github/chatmodes/documentation-assistant.chatmodes.md` for interactive documentation help
-   **Prompt**: `.github/prompts/generate-inline-documentation.prompts.md` for automated documentation generation

When contributing to this repository, always leverage the available Copilot assets and maintain WordPress standards through the integrated tooling ecosystem.

## Prompt file guide

**Only apply to files that end in `.prompts.md`**

-   [ ] The prompt has markdown front matter.
-   [ ] The prompt has a `mode` field specified of either `agent` or `ask`.
-   [ ] The prompt has a `description` field.
-   [ ] The `description` field is not empty.
-   [ ] The `description` field value is wrapped in single quotes.
-   [ ] The file name is lower case, with words separated by hyphens.
-   [ ] Encourage the use of `tools`, but it's not required.
-   [ ] Strongly encourage the use of `model` to specify the model that the prompt is optimised for.

## Instruction file guide

**Only apply to files that end in `.instructions.md`**

-   [ ] The instruction has markdown front matter.
-   [ ] The instruction has a `description` field.
-   [ ] The `description` field is not empty.
-   [ ] The `description` field value is wrapped in single quotes.
-   [ ] The file name is lower case, with words separated by hyphens.
-   [ ] The instruction has an `applyTo` field that specifies the file or files to which the instructions apply. If they wish to specify multiple file paths they should formated like `'**.js, **.ts'`.

## Chat Mode file guide

**Only apply to files that end in `.chatmodes.md`**

-   [ ] The chat mode has markdown front matter.
-   [ ] The chat mode has a `description` field.
-   [ ] The `description` field is not empty.
-   [ ] The `description` field value is wrapped in single quotes.
-   [ ] The file name is lower case, with words separated by hyphens.
-   [ ] Encourage the use of `tools`, but it's not required.
-   [ ] Strongly encourage the use of `model` to specify the model that the chat mode is optimised for.

## Agent file guide

**Only apply to files that end in `.agents.md`**

-   [ ] The agent has markdown front matter.
-   [ ] The agent has a `description` field.
-   [ ] The `description` field is not empty.
-   [ ] The `description` field value is wrapped in single quotes.
-   [ ] The file name is lower case, with words separated by hyphens.
-   [ ] Encourage the use of `tools`, but it's not required.
-   [ ] Strongly encourage the use of `model` to specify the model that the agent is optimised for.
-   [ ] Clearly defines domain expertise and capabilities.
