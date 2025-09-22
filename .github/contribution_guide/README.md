# LightSpeed Contribution Guide

Welcome to the LightSpeed contribution guide! This directory contains all the resources and documentation you need to contribute effectively and respectfully to the LightSpeed project.

Contribution Workflow
---------------------

- Start with an Issue: Use the appropriate [issue template](../../issues/new/choose) for bug reports, enhancements, or questions. Clearly describe your problem or idea.
- Branch Naming: Create a descriptive branch name using kebab-case (e.g., `feature/user-authentication`, `bugfix/login-validation-error`, `chore/update-dependencies`).
- Development Standards: Follow our coding standards and style guides. Use tools like ESLint, Prettier, PHPCS, and CodeRabbit.ai for automated checks.- Pull Requests: Open a PR to the correct base branch. Every PR must:
  - Link to a related GitHub Issue
  - Include a clear description and screenshots for UI changes
  - Pass all tests and automated checks
  - Avoid skipped tests unless justified
  - Not commit secrets

See the [PULL_REQUEST_TEMPLATE.md](./PULL_REQUEST_TEMPLATE.md) for the required PR format.

Code of Conduct
---------------

We are committed to a welcoming, inclusive, and harassment-free environment. Please read our [CODE_OF_CONDUCT.md](./CODE_OF_CONDUCT.md) before participating.

Saved Replies
-------------

For maintainers and reviewers, use our [SAVED_REPLIES.md](./SAVED_REPLIES.md) for consistent, efficient communication on issues and PRs.

Automated Workflows
-------------------

Our repository uses automated tools to welcome new contributors and review submissions. See [config.yml](./config.yml) for message templates and workflow configuration.

Additional Guidelines
---------------------

- All PRs must pass automated tests and CodeRabbit.ai analysis before merging.
- Be responsive to feedback and make requested changes promptly.
- Only maintainers can approve and merge PRs.

Thank you for helping us make LightSpeed better!
For questions or support, please open an issue or contact the maintainers.
