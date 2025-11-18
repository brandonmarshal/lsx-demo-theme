# Chatmodes Library

This folder contains a collection of custom chatmodes designed to enhance productivity, streamline workflows, and provide specialized assistance for various tasks. Each chatmode is tailored to a specific purpose, ensuring that users can leverage GitHub Copilot effectively for their unique needs.

## Available Chatmodes

Below is a list of all the chatmodes available in this folder, along with a brief description of what each does:

| Chatmode File                                                                    | Description                                                                                                                                    |
| -------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
| [`a11y-assistant.chatmodes.md`](./a11y-assistant.chatmodes.md)                   | Performs targeted accessibility reviews and fixes, producing issue lists, fixes, and tests for provided URLs or pattern snippets.              |
| [`accessibility.chatmode.md`](./accessibility.chatmode.md)                       | Accessibility mode: Ensures all code meets WCAG 2.1 standards, with reminders for HTML, CSS, and JS accessibility best practices.              |
| [`address-comments.chatmode.md`](./address-comments.chatmode.md)                 | Universal PR Comment Addresser: Helps address pull request comments, guides on making changes, running tests, and committing updates.          |
| [`critical-thinking.chatmode.md`](./critical-thinking.chatmode.md)               | Challenges assumptions and encourages critical thinking, helping engineers explore alternative solutions and avoid overlooked details.         |
| [`implementation-plan.chatmode.md`](./implementation-plan.chatmode.md)           | Generates fully structured, executable implementation plans for new features or refactoring, with deterministic, machine-parseable steps.      |
| [`mentor.chatmode.md`](./mentor.chatmode.md)                                     | Mentor mode: Provides guidance and support, challenges assumptions, and encourages optimal solutions without making code edits.                |
| [`pattern-wizard.chatmodes.md`](./pattern-wizard.chatmodes.md)                   | Assists authors in creating and iterating Block Editor patterns with accessibility by default, proposing structure, tokens, and variations.    |
| [`playwright-tester.chatmode.md`](./playwright-tester.chatmode.md)               | Playwright testing mode: Explores websites, generates and improves Playwright tests, runs and refines tests, and documents coverage.           |
| [`pr-copilot.chatmodes.md`](./pr-copilot.chatmodes.md)                           | Drafts high-quality pull request descriptions and review checklists, asking for before/after, risks, and validation steps.                     |
| [`prompt-builder.chatmode.md`](./prompt-builder.chatmode.md)                     | Expert prompt engineering and validation system: Creates and tests high-quality prompts using best practices and research-driven improvements. |
| [`refine-issue.chatmode.md`](./refine-issue.chatmode.md)                         | Refines requirements/issues by adding acceptance criteria, technical considerations, edge cases, and non-functional requirements.              |
| [`release-copilot.chatmodes.md`](./release-copilot.chatmodes.md)                 | Generates changelogs and release notes from merged PRs, grouping changes and highlighting key updates.                                         |
| [`research-technical-spike.chatmode.md`](./research-technical-spike.chatmode.md) | Systematically researches and validates technical spike documents through exhaustive investigation and experimentation.                        |
| [`task-planner.chatmode.md`](./task-planner.chatmode.md)                         | Task planner: Creates actionable implementation plans, checklists, and prompts based on validated research.                                    |
| [`test-coach.chatmodes.md`](./test-coach.chatmodes.md)                           | Guides developers to write robust unit, integration, and E2E tests, suggesting coverage plans and example assertions.                          |

## How to Use Chatmodes

1. **Activate a Chatmode**: Open the desired `.chatmode.md` file in your editor or use the `/filename` command in GitHub Copilot Chat to activate the chatmode.
2. **Follow the Instructions**: Each chatmode includes detailed instructions on how to use it effectively. Read the file to understand its purpose and workflow.
3. **Customize as Needed**: Some chatmodes allow customization based on your project requirements. Update the file or provide specific inputs to tailor the chatmode to your needs.
4. **Leverage Tools**: Many chatmodes integrate with tools like `search`, `fetch`, `runCommands`, and `editFiles`. Ensure you have the necessary permissions and tools configured in your environment.
5. **Iterate and Improve**: Use the chatmodes iteratively to refine your tasks, plans, or code. Many chatmodes are designed to work in cycles, ensuring high-quality outputs.

## Creating New Chatmodes

If you want to create a new chatmode for this directory, follow these guidelines:

1. **Use Clear Filenames**: Name the file descriptively with the `.chatmode.md` extension.
2. **Include Frontmatter**: Add a YAML frontmatter section with `description`, `tools`, and other relevant metadata.
3. **Define Purpose and Workflow**: Clearly explain the chatmode's purpose and provide step-by-step instructions for users.
4. **Test Thoroughly**: Validate the chatmode to ensure it works as intended and aligns with project standards.
5. **Update This README**: Add the new chatmode to the table above with a brief description.

## Maintaining Chatmodes

To ensure the chatmodes remain effective and relevant:

1. **Review Regularly**: Periodically review chatmodes to ensure they align with current project needs and standards.
2. **Test Updates**: Test any changes to chatmodes before committing them.
3. **Document Changes**: Clearly document any updates in the commit message and, if necessary, in the chatmode file itself.
4. **Seek Feedback**: Encourage users to provide feedback on the chatmodes to identify areas for improvement.

---

By using these chatmodes, you can streamline your workflows, improve code quality, and enhance collaboration within your projects. If you encounter any issues or have suggestions for new chatmodes, feel free to contribute!
