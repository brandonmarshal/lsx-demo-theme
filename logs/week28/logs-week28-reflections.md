# Week 28 Log and Reflection

## Weekly Reflection

### Courses, Learning, and Key Activities

-   Dedicated significant time to the Lightspeed (LS) Design System, deeply analyzing the Figma Make repo and codebase to guide design system architecture locally using IDE and AI tools.
-   Iterated heavily on Figma variables, updating spacing (shifting to a 10-point scaling system), primitive colors, and semantic tokens for accurate Dark and Light mode toggling.
-   Built comprehensive documentation for the LS Design System, mapping out and documenting Block Styles (Buttons, Cards, Badges, Forms/Inputs), Section Styles, Patterns, Parts, and Templates complete with local file paths.
-   Held multiple high-value catchups with Ash and Zared to refine prompt architecture, documentation structure, and the proper utilization of Figma variables/presets/components.
-   Conducted deep learning sessions focused on WordPress Patterns, Parts, and Full Site Editing (FSE) via Ollie Block Theme Academy, utilizing AI to clarify PHP headers within pattern files.

### What went well?

-   Successfully engineered and tested a "Deep Research" AI prompt capable of scanning the codebase to generate robust guidelines and documentation, significantly speeding up the documentation phases.
-   Effectively transitioned the LS prototype pages into a unified Design File while proactively spotting and diagnosing rendering errors (e.g., scroll-triggered animations and Hero section breaks).
-   Nailed the integration of dynamic shadow tokens within the Figma variables, allowing shadows to seamlessly flip between Light and Dark mode.
-   Made remarkable headway on resolving incorrect variable "presets" by aligning Figma values exactly with the underlying codebase syntax.

### What have you learned?

-   In Figma: discovered that scroll-triggered animations must be actively triggered _before_ attempting to copy design layouts, otherwise the copied components lose their intended state.
-   In WordPress: Gained a firm grasp on the distinction and interaction between Patterns and Parts, particularly how patterns are injected into parts, and parts into reusable templates.
-   Deepened my WordPress PHP knowledge by mapping out exactly what parameters exist inside a pattern's PHP header block and how WordPress interprets them during FSE.
-   Realized the importance of matching spatial syntax (like a 10-point scale compared to an 8-point scale) directly to the design system documentation to ensure engineering parity.
