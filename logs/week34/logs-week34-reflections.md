# Week 34 Log and Reflection

## Weekly Reflection

### Courses, Learning, and Key Activities

-   **Design System & Figma:**
    -   Created new designs for 'Hosting' WebGL, 'Service Selector', 'How solutions differ', and 'Featured Solutions Highlights'.
    -   Made typography adjustments, brightened background glows, and tested different font weights.
    -   Renamed Figma frames for clarity and removed unnecessary capitalization from headers.
    -   Fixed layout issues in 'Featured case study' sections by resizing images and rebuilding graphics.
    -   Organized components and patterns within the Design System.
    -   Designed and built the 'Free consultation' page (light and dark modes).
    -   Built 5 'Thank You' page variants (Subscription, etc.) and created a component set.
    -   Designed the 'Portfolio' page with a new section for case studies.
-   **Page Creation & Implementation:**
    -   Built and implemented the 'Solutions Landing' page into the desktop prototype.
    -   Built and implemented the 'Services Landing' page.
    -   Created Tablet and Mobile responsive versions for: Phases page, Solutions Landing, Free Consultation, all 5 Thank You pages, Service Landing page, Solutions-WordPress, and Services-hosting.
    -   Implemented all new pages into the prototype and updated the Table of Contents (TOC).
-   **WordPress & Plugin Development:**
    -   Reviewed `ls_plugin` SCF setup to understand taxonomies and group fields with Copilot's assistance.
    -   Created a new Portfolio group field ('Client Name') and two new taxonomies ('Software', 'Project Type').
    -   Exported and imported the new SCF JSON into the `ls-plugin` feature branch.
-   **Internal Linking & Prototyping:**
    -   Audited and implemented internal linking across all desktop pages in the Figma prototype.
    -   Tested new pages in the prototype and fixed inconsistencies.
-   **Collaboration & Admin:**
    -   Regular catchup meetings with Ash and Zared to discuss designs, progress, and next steps.
    -   Reviewed the parity document and made comments based on research in the `lsx-theme` workspace.
    -   Set up a Claude account and reviewed the design system.

### What went well?

-   **Rapid Prototyping:** Successfully designed and implemented multiple new pages (Solutions Landing, Services Landing, Free Consultation, Thank You pages, Portfolio) into the Figma prototype in a single week.
-   **Component and Pattern Reusability:** Effectively reused existing patterns (like 'related services') and created new, flexible components that could be adapted across different pages and layouts.
-   **Responsive Design Implementation:** Efficiently created and tested tablet and mobile versions for numerous new pages, ensuring patterns scaled correctly and identifying areas needing min/max width constraints.
-   **Cross-Workspace Learning:** Quickly learned how SCF taxonomies and group fields work in the `ls-plugin` workspace and successfully created and implemented new ones.
-   **Design Tool Workflow:** Effectively used Stitch to generate initial design ideas (like for WebGL sections) and then refined them in Figma, demonstrating a productive workflow.
-   **Collaboration and Feedback Loop:** Meetings with Ash and Zared provided clear direction and facilitated quick progress on design improvements and strategic tasks.
-   **Internal Linking:** Completed a comprehensive pass of all desktop pages to add internal links, significantly improving the prototype's interactivity and user flow.

### What have you learned?

-   **SCF Customization:** Learned how to create, export, and import custom group fields and taxonomies for the portfolio post type within the `ls-plugin` environment.
-   **Advanced Figma Prototyping:** Gained more experience in building out a large, interconnected prototype, including adding extensive internal linking and ensuring navigational consistency.
-   **Responsive Pattern Design:** Learned that some complex sections require separate patterns for mobile views when layout constraints for desktop/tablet (e.g., a 450px breakpoint) are not suitable for smaller screens.
-   **Content-First Design:** Realized the importance of having landing pages (like Solutions and Services) in place before implementing a full internal linking strategy.
-   **Design System Organization:** Understood the necessity of organizing components and patterns within the design system as the project scales to avoid clutter and maintain usability.
-   **AI-Assisted Research:** Learned to leverage Copilot to analyze a codebase (`lsx-theme`'s `theme.json`) to effectively research and comment on technical documentation (the parity document).

### Challenges Encountered

-   **Missing Pages for Linking:** The initial goal of completing internal linking was blocked by the absence of key landing pages (Services, Solutions), requiring a pivot to create these pages first.
-   **Responsive Breakpoints:** A new section designed for the Portfolio page worked for desktop and tablet but broke on mobile, highlighting the need to create device-specific patterns for certain layouts.
-   **Content-Design Mismatch:** Some new page sections required entirely new designs because the content from planning documents did not fit existing patterns, necessitating the use of Stitch for new ideas.
-   **Figma Organization:** The design system was becoming cluttered, which required taking time to organize components and patterns before continuing with new page builds.

### Key Achievements This Week

-   ✅ Completed and implemented the **Solutions Landing Page** into the prototype.
-   ✅ Completed and implemented the **Services Landing Page** into the prototype.
-   ✅ Designed, built, and implemented the **Free Consultation Page**.
-   ✅ Created 5 distinct **Thank You Pages** and implemented them into the prototype.
-   ✅ Designed and implemented the **Portfolio Page** for desktop and tablet.
-   ✅ Successfully added a new **Portfolio group field** and two **new taxonomies** to the `ls-plugin`.
-   ✅ Created responsive **Tablet and Mobile** versions for 9+ new pages/sections.
-   ✅ Completed a full **internal linking** pass on all desktop pages in the prototype.
-   ✅ Reviewed the parity document using Copilot for analysis and provided feedback.
-   ✅ Fixed multiple design inconsistencies, including squashed logos and text cutoff issues in case study components.
