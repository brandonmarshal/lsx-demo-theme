# Week 24 Log and Reflection

## Weekly Reflection

### Courses, Learning, and Key Activities

-   **Sixcats Design System Updates**: Spent the majority of the week on the Sixcats Design System, specifically the Funky Redesign colour palette. I completed the colour variables and applied them to components for buttons, navigation, borders, and hover states. I also merged the Figma branch to utilize the full palette.
-   **Prototype Development**: Worked extensively on updating and creating components for the Mobile prototype (Homepage, Shop, Bundles), ensuring seamless switching between Light and Dark modes. Created variants for card components (Sale, Out of Stock, etc.) and updated page layouts to match new designs.
-   **Theme Development & Troubleshooting**: Set up a local WordPress environment to test the Scclub patterns and theme. Troubleshooted critical crashes caused by `theme.json` configuration issues, isolating problems within the Typography and Border settings.
-   **AI Workflow**: Utilized an AI agent to assist with reporting and troubleshooting, establishing a README for consistent output.

### What went well?

-   **Variable Implementation**: Successfully completed and merged the colour variables for the Funky Redesign, allowing for full implementation across components.
-   **Component auditing**: The process of auditing and ensuring every element is a component with assigned variables is tedious but proving effective for a robust prototype.
-   **Troubleshooting Process**: Effectively used a backup and incremental addition strategy to isolate the `theme.json` errors to specific sections.

### What have you learned?

-   **`theme.json` Configuration**: Learned the importance of correct nesting for `typography` and `border` settings within the `settings` level of `theme.json` to prevent crashes or ignored styles.
-   **Component-First Approach**: Reinforced the necessity of creating components for everything before building out prototype pages to ensure consistency and efficiency.
-   **Design Token Management**: Gained experience in identifying missing variables during implementation and the process of creating primitives and token sets to ensure 100% coverage.
