<!-- markdownlint-disable MD030 MD036 -->

# Weekly Plan: Figma Finalization & WordPress Implementation

**Weeks 35-36: May 11 - May 22, 2026**

## Goal

**Week 1:** Finalize the Figma prototype by creating all remaining pages, ensuring content accuracy, completing responsive designs, and implementing comprehensive internal linking.
**Week 2:** Begin and make significant progress on building the approved Figma designs in WordPress.

---

## Week 1: Figma Prototype Finalization (May 11 - May 15)

### Monday, May 11

**Goal:** Build all Service/Solution sub-pages and address high-priority backlog items.

-   [ ] Catchup with Zared (Time to be confirmed).
-   [ ] Block Bindings meeting with Warwick (To be scheduled Mon/Tues).
-   [ ] Using the content document, create ALL Service and Solutions sub-pages in the Figma prototype.
-   [ ] As pages are created, begin implementing their internal links.
-   [ ] Document specific aliases and variables for the Accordion block to create its own variant tokens.
-   [ ] Set unique design tokens for breadcrumbs to fix issues with heavy weights and default scaling.
-   [ ] Start reading the Atomic Design book online.

### Tuesday, May 12

**Goal:** Finalize core page content and all responsive views.

-   [ ] Complete the creation of any remaining Service and Solutions sub-pages.
-   [ ] Audit all Phase pages and ensure they have their correct, final content from the content document.
-   [ ] Create the finalized Tablet and Mobile screens for all Phase, Service, and Solution pages.
-   [ ] Re-work the blog post metadata section to include author roles, an icon for reading time, and potentially mono fonts.
-   [ ] If the Warwick meeting hasn't happened, follow up to get it scheduled.

### Wednesday, May 13

**Goal:** Prioritize and build all remaining pages while cleaning up the design system.

-   [ ] Catchup with Zared (Time to be confirmed).
-   [ ] Create a definitive priority list of ALL remaining pages required to complete the prototype.
-   [ ] Begin building the highest-priority pages from the list.
-   [ ] Investigate and begin fixing the "unused properties" in the published Figma library.
-   [ ] Ensure all new text containers are constrained to a maximum width of 800px for readability.

### Thursday, May 14

**Goal:** Complete all page creation and prepare for development handoff.

-   [ ] Power through and complete the build for all remaining priority pages.
-   [ ] As pages are completed, implement all remaining internal linking (deep linking between Phases, Services, and Solutions).
-   [ ] Use the shared AI Content Agent to optimize the four-card case study descriptions on the Services page.
-   [ ] Start marking completed and reviewed components and frames as "Ready for Dev" in Figma.

### Friday, May 15

**Goal:** Finalize the entire prototype, complete all linking, and QA for Week 2.

-   [ ] Finish the comprehensive internal linking audit and implementation for the ENTIRE prototype.
-   [ ] Complete the "Ready for Dev" marking process for all assets.
-   [ ] Conduct a final, thorough review and test of the entire Figma prototype (links, content, responsive views, consistency).
-   [ ] Organize the Figma file and create a clean entry point for the WordPress development phase.

---

## Week 2: WordPress Development Blitz (May 18 - May 22)

**Goal:** Week 36 kickoff. Set up Linear for a clean sprint, run the 81-page validation process, and establish handoff standards + AI templates.

### Monday, May 18

**Goal:** Set up Linear so the validation sprint can run cleanly all week.

-   [ ] Enhance Project Metadata: Fill in short descriptions for initiatives and key tasks in Linear.
-   [ ] Link Resources: Attach the most important Google Docs to their corresponding initiatives in Linear.
-   [ ] Workspace Cleanup: Delete unnecessary “operator” items imported from GitHub and divvy up the team’s work.
-   [ ] Issue Structure: Create a parent issue for “Web Design Refinements” and generate a sub-issue for each page to be reviewed (81 total).
-   [ ] Task Refinement: Rewrite imported tasks into clear, granular instructions (page-level outcomes + definition of done).
-   [ ] Permission Rules: Confirm/define “Read-Only” vs “Write” permissions for every connected app used in the workflow.

### Tuesday, May 19

**Goal:** Begin Linear setup improvements (templates + labels/types) and prep the validation sprint structure.

-   [ ] Import the most relevant GitHub templates into Linear (only what we’ll actually use):

        -   [ ] Create **one** standard Pull Request template (source: `lightspeedwp/.github/.github/PULL_REQUEST_TEMPLATE`).
        -   [ ] Add **5–10** Issue templates (source: `lightspeedwp/.github/.github/ISSUE_TEMPLATE`).
        -   [ ] Add **3–5** questionnaires (add as Linear documents).

-   [ ] Add the above to the correct Linear settings areas:

        -   [ ] Issue templates: <https://linear.app/lightspeedwp/settings/issue-templates>
        -   [ ] Documents (questionnaires): <https://linear.app/lightspeedwp/settings/documents>
        -   [ ] Project templates: <https://linear.app/lightspeedwp/settings/project-templates>

-   [ ] Adapt my existing GitHub project template documentation for Linear (starting point):

        -   <https://docs.google.com/document/d/1HSJL5i-kWfzlg2IOtNo3XgPyEW-NdGzDvgQKizy2_8Q/edit?tab=t.hbs98vk4as7m>

-   [ ] Check existing issues in Linear and confirm **service pages** content files are ordered into the correct phases.
-   [ ] Do the first update on the **Linear** project (high-level housekeeping + current status).
-   [ ] Review Linear AI triage settings and note what we can improve next:

        -   <https://linear.app/lightspeedwp/settings/ai/triage>

-   [ ] Start improving issue **labels** and **issue types** using the standard list I defined.
-   [ ] Don’t add everything at once—introduce a small, useful subset first.

### Wednesday, May 20

**Goal:** Finalize the initial Linear template system and validate issue structure for service pages.

-   [ ] Review the templates imported on Tuesday and tighten.
-   [ ] Remove duplicates / merge overlaps.
-   [ ] Ensure naming is consistent and easy to scan.
-   [ ] Confirm templates map to the workflows we actually run.
-   [ ] Create/confirm a small starter set of **issue types** and **labels** (based on the standard list).
-   [ ] Add only the labels/types we’ll use immediately.
-   [ ] Note what should be added later (backlog).
-   [ ] Re-check Linear issues and ensure service page content files are grouped/ordered correctly by phase.
-   [ ] Continue improving the Linear project setup (second pass).
-   [ ] Ensure templates are linked/visible where the team will find them.
-   [ ] Add brief guidance notes so others know when to use each template.

### Thursday, May 21

**Goal:** Continue the sprint and build the reusable templates/schemas needed for consistency.

-   [ ] Single-Page Scrutiny: Review pages 33–48 with screenshots + missing-elements audit.
-   [ ] Source Verification: Confirm content accuracy for pages 33–48.
-   [ ] Strategic Briefing: Write revised briefs for pages 33–48 (Objective, Conversion Goal, User Journey).
-   [ ] Documentation & Linking: Add links + reasoning for pages 33–48.
-   [ ] Template Brainstorming: Use the “Website Content Intake and Planning” agent to generate improved revision files.
-   [ ] Memory & Schema Management: Create YAML schema files + markdown formatting skills so agent outputs remain consistent.
-   [ ] Linear AI Skill Challenge: Create at least one custom AI skill in Linear to automate a personal workflow (e.g., generating task descriptions).

### Friday, May 22

**Goal:** Finish the week’s pages, package uploads, and lock in standards for next week.

-   [ ] Single-Page Scrutiny: Review pages 49–81 with screenshots + missing-elements audit.
-   [ ] Source Verification: Confirm content accuracy for pages 49–81.
-   [ ] Strategic Briefing: Write revised briefs for pages 49–81 (Objective, Conversion Goal, User Journey).
-   [ ] Documentation & Linking: Add links + reasoning for pages 49–81.
-   [ ] Standardize Uploads: Create a single Zip file containing all page contents and briefs (prompt files remain separate).
-   [ ] The “Three-File” Standard: Ensure every page handoff has (1) Design Brief (2) Content (3) Implementation Prompt.
-   [ ] Maintenance: Review and prune anything accidentally saved to agent memory that’s one-off.

### Week 36 Roll-up Checklist

-   [ ] Linear is cleaned up, initiatives/tasks have short descriptions, and key docs are linked.
-   [ ] “Web Design Refinements” parent issue exists with 81 page sub-issues and refined instructions.
-   [ ] All connected apps have explicit read/write permission rules.
-   [ ] All 81 pages reviewed (screenshots logged), source-verified, and re-briefed (Objective, Conversion Goal, User Journey).
-   [ ] Each page has documentation links to GitHub templates/patterns, Figma components, and live/prototype references with reasoning.
-   [ ] Three-file handoff standard is in use; uploads are standardized (one zip + separate prompts).
-   [ ] Team is following chat hygiene (new Claude chat per task).
-   [ ] At least one Linear AI skill exists to automate a personal workflow.
-   [ ] Templates + YAML schemas exist for consistent agent output formatting.

---

## General Task Checklist

### Documentation

-   [ ] Document specific aliases and variables for the Accordion block to ensure it has its own variant tokens.

### Tokens

-   [ ] Set unique design tokens for breadcrumbs to fix the current issues with heavy weights and default scaling.

### Figma Cleanup

-   [ ] Investigate and fix "unused properties" in the published Figma library (currently 314 assets detected).

### Layout

-   [ ] Ensure all text containers are constrained to a maximum width of 800px to maintain readability.

### Workflow

-   [ ] Mark components and frames as "Ready for Dev" in Figma to facilitate the Code Connect integration.

### Content

-   [ ] Use the shared AI Content Agent to optimize the four-card case study descriptions on the Services page.

### Education

-   [ ] Read the Atomic Design book online to better understand the approach to building component systems.

### Redesign

-   [ ] Re-work the blog post metadata section to include author roles, an icon for reading time, and potentially mono fonts.

<!-- markdownlint-enable MD030 MD036 -->
