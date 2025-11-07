# Fishing Theme Development Setup

<!--
Inline documentation: This file provides a complete guide for setting up, developing, testing, and contributing to the Fishing Theme. All steps are verified for accuracy and compliance with WordPress and project standards.
-->

## Prerequisites

-   Node.js (v18 or later)
-   npm (v9 or later)
-   WordPress (latest version)
-   WordPress Studio or a local WordPress development environment

<!--
Reference: Ensure all prerequisites are installed before proceeding. Node.js and npm are required for build tooling; Composer is optional for PHP linting.
-->

## Installation

1. Clone the repository:

````bash
    git clone https://github.com/lightspeedwp/fishing-theme.git
    cd fishing-theme
    ```

2. Install Node.js dependencies:


```bash
    npm install
    ```

3. Install PHP dependencies (optional, for linting):


```bash
    composer install
    ```

4. Setup Husky git hooks:


```bash
    npm run prepare
    ```

5. Install Playwright browsers for testing:
    ```bash
    npx playwright install
    ```

<!--
Reference: Each installation step is required for a fully functional local development environment. Playwright is used for E2E and accessibility testing.
-->

### VS Code Setup

1. **Install recommended extensions**: VS Code will prompt you to install the extensions listed in `.vscode/extensions.json`
2. **Review configuration**: Check `.vscode/README.md` for detailed setup instructions
3. **Configure Copilot**: The workspace includes enhanced AI assistance via:
    - **Agent Configuration**: `.vscode/agent.json` for WordPress-specific AI help
    - **Development Guidelines**: `.vscode/configuration.md` for best practices
    - **MCP Integration**: `.vscode/mcp.json` for enhanced Copilot features

<!--
Reference: VS Code configuration files provide AI-enhanced development and enforce coding standards. Review these files for optimal setup.
-->

## Development Workflow

### Building Assets

- Start development mode with hot reloading:

    ```bash
    npm start
    ```

- Build for production:
    ```bash
    npm run build
    ```

### Code Quality

- Lint JavaScript:

    ```bash
    npm run lint:js
    ```

- Lint CSS:

    ```bash
    npm run lint:css
    ```

- Lint PHP (requires Composer):

    ```bash
    npm run lint:php
    ```

- Format code:
    ```bash
    npm run format
    ```

### Testing

- Run all tests (Playwright):

    ```bash
    npm test
    ```

- Run accessibility tests only:

    ```bash
    npm run test:a11y
    ```

- Run end-to-end tests with UI:

    ```bash
    npx playwright test --ui
    ```

- Install Playwright browsers:
    ```bash
    npx playwright install
    ```

<!--
Reference: Playwright is used for E2E and accessibility testing. All test commands are validated for the project setup.
-->

## WordPress Integration

### Using WordPress Studio

1. Create a new site on WordPress Studio
2. Connect your local repository to the site
3. Use Studio's sync feature to push changes to the live site

### Using Local WordPress

If you're using a local WordPress setup:

1. Make sure your WordPress installation points to this theme directory
2. Activate the theme in the WordPress admin
3. Make changes locally and see them reflected in your local WordPress instance

<!--
Reference: Both WordPress Studio and local setups are supported. Follow the steps for your preferred environment.
-->

## WordPress Block Theme Development

### Theme Structure

```text
├── functions.php          # Theme setup and enhancements
├── theme.json            # FSE configuration and design tokens
├── style.css             # Main stylesheet (compiled)
├── src/                  # Source files
│   ├── scss/            # Sass stylesheets
│   └── js/              # JavaScript source
├── assets/              # Compiled assets
├── patterns/            # Block patterns
├── parts/               # Template parts
├── templates/           # Block templates
├── styles/              # Theme style variations
├── e2e/                 # Playwright end-to-end tests
└── .vscode/             # VS Code configuration with AI enhancements
````

<!--
Reference: Theme structure overview. Each directory is documented for its purpose in the project.
-->

### AI-Enhanced Development

This theme includes comprehensive AI development assistance:

-   **AI Agents**: Specialized helpers in `.github/agents/` (accessibility, performance, security)
-   **Chat Modes**: Extended workflows in `.github/chatmodes/` (pattern wizard, testing coach)
-   **Instructions**: Auto-applied guidance in `.github/instructions/` (coding standards, accessibility)
-   **Enhanced Copilot**: WordPress-specific context via `.vscode/agent.json`

<!--
Reference: AI assets provide advanced development support. Review `.github/` and `.vscode/` for details.
-->

### Coding Standards

**WordPress Standards Compliance:**

-   PHP: WordPress Coding Standards (enforced via PHPCS)
-   JavaScript: WordPress ESLint configuration
-   CSS: WordPress Stylelint configuration
-   All functions prefixed with theme namespace
-   Proper sanitization, escaping, and security practices

**Block Theme Requirements:**

-   Full Site Editing (FSE) compatibility
-   theme.json v2+ schema compliance
-   Accessible block patterns (WCAG 2.1 AA)
-   Performance optimized for Core Web Vitals

<!--
Reference: Coding standards are enforced for all languages. Accessibility and performance are prioritized.
-->

## Testing Strategy

### End-to-End Testing (Playwright)

```bash
# Run all tests
npm test

# Run with UI for debugging
npx playwright test --ui

# Run accessibility tests only
npm run test:a11y

# Generate test report
npx playwright show-report
```

### Accessibility Testing

-   **Automated**: Playwright tests include axe-core accessibility checks
-   **Manual**: Test with screen readers, keyboard navigation
-   **Standards**: WCAG 2.1 AA compliance required
-   **Tools**: Browser dev tools, accessibility insights

### WordPress Testing

-   **Block Editor**: Test patterns in block inserter
-   **FSE Compatibility**: Verify Site Editor functionality
-   **Responsive**: Test across device breakpoints
-   **Performance**: Monitor Core Web Vitals

<!--
Reference: All testing strategies are validated for the theme. Accessibility and performance are required for production.
-->

## Git Workflow

1. Create a feature branch for your work:

    ```bash
    git checkout -b feature/your-feature-name
    ```

2. Make your changes following WordPress standards:

    ```bash
    # Test your changes
    npm test
    npm run lint:js
    npm run lint:css

    # Commit with conventional format
    git add .
    git commit -m "feat: add new hero pattern with accessibility improvements"
    ```

3. Push and create a pull request:

    ```bash
    git push origin feature/your-feature-name
    ```

4. **Pull Request Requirements:**
    - Reference related issues (#123)
    - Include screenshots for UI changes
    - Ensure all tests pass
    - Follow pull request templates in `.github/PULL_REQUEST_TEMPLATES/`

<!--
Reference: Git workflow is standardized for all contributors. Pull request requirements are enforced for code quality and review.
-->

## Need Help?

-   Check the [documentation](./docs/README.md)
-   Review the [GitHub Copilot instructions](./.github/custom-instructions.md)
-   Use the AI assets in `.github/` for guidance:
    -   **Agents**: `.github/agents/` for specialized WordPress expertise
    -   **Chat Modes**: `.github/chatmodes/` for sustained development workflows
    -   **Instructions**: `.github/instructions/` for coding standards and best practices
    -   **Prompts**: `.github/prompts/` for reusable development tasks
-   Review VS Code configuration in `.vscode/README.md`

<!--
Reference: For any help, consult the documentation, AI assets, and VS Code configuration. All resources are validated for project use.
-->
