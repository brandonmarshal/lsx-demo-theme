# Week 27 Log and Reflection

## Weekly Reflection

### Courses, Learning, and Key Activities

-   Conducted extensive QA, testing, and troubleshooting across multiple Figma prototypes (Tour Operator Plugin, Impact Travel, Organic Tours, LSX Design System, Rooi Rose, Handcraft Wine).
-   Set up and heavily utilized BugHerd to systematically log, track, and batch-fix visual, layout, and loading errors across all the prototypes.
-   Applied BEM methodology and fixed visual inconsistencies (spacing, alignment, card layouts) to ensure pages load and render correctly.
-   Created and populated a comprehensive Google Document to catalog all internal and client Figma Make sites we are working on.
-   Developed, tested, and iteratively refined a complex AI "scanning prompt" system for codebase analysis, evolving it into a multi-prompt orchestration system.

### What went well?

-   Successfully stabilized page loading across multiple prototypes; verified that all pages on the TO Plugin and Impact Travel sites are now effectively loading and functioning.
-   Efficiently streamlined the QA process by relying on sitemaps to navigate and using BugHerd to track issues methodically.
-   The advanced prompt engineering work proved successful—by transitioning from a monolithic prompt to a multi-file orchestrator, I improved accuracy significantly, reaching ~85% accuracy by the second testing phase.
-   Solidified layout consistency quickly, such as bulk-fixing all squished card layouts on the Impact Travel site in one go.

### What have you learned?

-   The value of prompt modularity: learned that breaking down a massive, complex prompt into a specialized orchestrator system with smaller, focused specialist prompts yields substantially better and more accurate AI outputs.
-   Effective iterative prompt engineering requires a structured feedback loop—running tests, comparing results against target requirements, and prompting the AI to analyze its own shortcomings to generate the next version.
-   Utilizing sitemaps is critical for thoroughly auditing large prototype deployments and guaranteeing no pages are left untested or broken.
