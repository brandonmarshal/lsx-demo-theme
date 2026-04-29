# System Patterns

## Architecture patterns

- Theme owns visual system, templates, patterns and global styles.
- Plugin owns site-specific functionality and custom blocks.
- Figma variables map to theme.json tokens.
- Core blocks and patterns are preferred before custom blocks.
- Scripts and styles load conditionally where practical.

## WordPress patterns

- Header/footer as template parts backed by patterns.
- Page-family patterns for repeatable content sections.
- Query templates for insights/blog/work if content model requires.
- Block variations for button/back-to-top/style-specific behaviour where appropriate.

## Quality patterns

- Small diffs.
- Changelog updates for meaningful changes.
- Repo validation before PR review.
- QA mapped to acceptance criteria.
