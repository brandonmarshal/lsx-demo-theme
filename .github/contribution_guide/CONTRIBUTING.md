# Contributing

Thank you for your interest in contributing to LightSpeed! Please follow this workflow to help us maintain a high-quality, consistent codebase and community.

---

## Ideal Contribution Workflow

### 1. Start with the GitHub Issue
- Use the appropriate [issue template](../../issues/new/choose) for bug reports, enhancements, or questions.
- Clearly describe the problem, feature, or task. Include as much detail as possible (steps to reproduce, expected behavior, environment, etc.).
- Discuss your intended approach in the issue before starting work, if needed.

### 2. Create a Branch
- Use a descriptive branch name, such as `feature/short-description`, `bugfix/short-description`, or `chore/short-description`.

### 3. Develop Your Solution
Follow the coding standards and style guides used in this repository. This project uses the following linters and formatters:
  - **ESLint** (v8.x) with configuration in `.eslintrc.js`
  - **Prettier** (v3.x) with configuration in `.prettierrc`
  - **PHPCS** (v3.x) with configuration in `phpcs.xml`
To reproduce checks locally before submitting:
  1. Install dependencies: `npm install`
  2. Run linters/formatters:
     - JavaScript/TypeScript: `npm run lint` (ESLint)
     - Formatting: `npm run format` (Prettier)
     - PHP: `npm run phpcs` (PHPCS)
  3. Optionally, use pre-commit hooks (via Husky) by running `npm run prepare` to enable automatic checks on commit.
  4. Config files are located at the project root: `.eslintrc.js`, `.prettierrc`, `phpcs.xml`.
Ensure your code passes all checks before submitting your PR.
- Use **[CodeRabbit.ai](https://coderabbit.ai/)** alongside your local tools to perform automated code reviews and identify issues early.
- Write clear, concise commit messages (e.g., Conventional Commits: feat:, fix:, docs:, chore:, refactor:).
- Open a PR from your branch to the appropriate base branch (e.g., `main` or `release/2.1`).
- **All PRs must have a description.** Make sure the description is accurate and updated if changes are made.
- **All PRs must include a link to the related GitHub Issue in the description.** If a ticket does not exist, please create one.
- **All PRs must contain screenshot(s) of any UI changes.** Add screenshots in the PR details and update them as needed in comments.
- **Tests should not be skipped!** If you must skip a test, provide your justification.
- **PRs with module version bumps should have a link to the release notes and a summary of notable changes.**
- **Any PR that doesn't meet the criteria in this list should be converted to a draft PR until it is ready to go.**

- **No new failing or flaky tests.** If a test must be skipped, document the reason and linked issue, and add an unblock date.
- **Do not commit or paste secrets.** Run secret scanning locally before opening a PR.

- PRs will be reviewed by **maintainers**. Automated tools (e.g., **CodeRabbit.ai**, Copilot) may assist with feedback, but human maintainers provide approvals.
  **CodeRabbit.ai** runs pre‑review automated checks for quality, performance, and best practices.
- Be responsive to feedback and make requested changes as needed.
- Only maintainers can approve and merge PRs.

---
## Additional Guidelines

- **Use [Saved Replies](../SAVED_REPLIES.md) for common responses.** Reviewers and maintainers are encouraged to use or adapt the saved replies for consistent and efficient communication.
- All PRs must pass automated tests and checks (including **CodeRabbit.ai analysis**) before being merged. Please review any CI failures and address them promptly.

---

Thank you for helping us make LightSpeed better!
