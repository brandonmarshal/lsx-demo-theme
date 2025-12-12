# Week 15 Log and Reflection

## Weekly Reflection

### Courses, Learning, and Key Activities

-   Focused heavily on **Plugin Development**, specifically fixing and refining custom blocks (Fish-card, Google Maps, Query Loop).
-   Implemented **Google Maps integration** requiring API key validation and handling longitude/latitude custom fields.
-   Transitioned to using the **Vendor method for SCF (Secure Custom Fields)** to resolve import issues.
-   Conducted a comprehensive **CodeRabbit review**, addressing security vulnerabilities and validation improvements.
-   Deployed the plugin to the staging site, handling zip file creation and size optimization (removing node_modules).
-   Designed and styled **Single Post Templates** and **Query Loop Blocks** for Custom Post Types (Fish, Gear, Area).

**Total Learning & Development Time:** ~25 hrs (across plugin development, debugging, deployment, and reviews)

### What went well?

-   **Google Maps Integration**: Successfully got the block to read the API key and display correctly after initial struggles with registration.
-   **Visual Design**: The single post blocks and fish cards are looking very professional with great SCSS styling.
-   **Problem Solving**: Successfully resolved the SCF import issue by switching to the vendor method.
-   **Deployment**: Managed to zip and deploy the plugin to the live/staging environment and verify CPTs are loading.
-   **Sidebar & Query Blocks**: Completed the design and functionality of the query loop block and sidebar components.

### What can be improved?

-   **Review Timing**: Leaving the CodeRabbit review until the end created stress due to the volume of security/validation suggestions. Frequent, smaller reviews would be better.
-   **Testing Workflow**: Blocks that worked locally broke upon deployment to the site. Need a more robust testing process before final deployment.
-   **Plugin Architecture**: Initial setup of the multi-block plugin was incorrect, causing registration headaches.

### What have you learned?

-   **Vendor Management**: How to implement and configure the Vendor method for plugins like SCF when standard imports fail.
-   **Security & Validation**: Learned a lot about securing WordPress plugins through the CodeRabbit feedback loop.
-   **Deployment Optimization**: Importance of excluding development dependencies (node_modules) when packaging a plugin for WordPress.
-   **Block Registration**: Deeper understanding of registering blocks correctly in a multi-block plugin structure.

### What are your next actions?

-   Push the final plugin updates (with fixed blocks) to the staging site.
-   Continue populating content for Fish, Gear, and Area post types.
-   Refine the site design using the newly created blocks.
-   Monitor the plugin for any further issues on the live site.
