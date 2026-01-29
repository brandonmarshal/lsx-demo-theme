# Week 20, Day 4 Log 2026-01-29

## Today's Progress

### What have you accomplished today?

-   Working on the components and patterns for Cultivation page.
-   I have been doing planning with AI to help me gather all the information I need to build a quality agent skill prompt.
-   Continued research for setting up the agent skills. (See notes for more info)
-   Building agent skills to extract colours from images and do accessibility checks, then building a colour palette. The idea for this is to help me extract the correct light mode colours so I can create the tokens for the dark and light mode. 

## Time Logs

-   2.5 hrs – Working on components
-   0.5 hrs - Catchup with Zared
-   1.0 hrs - Started planning the Agent skill I want to build for extracting Figma designs to JSON.
-   1.0 hrs - Continued getting information for the Agent skills.
-   1.5 hrs - Building 3 skills, "visual-colour-palette-extraction", "wcag-contrast-accessibility-check", "Colour Clustering Heuristics".
-   1.5 hrs - Working on the components in Sixcats

---

## Notes

-   I will setup a meet today with Zared before his leave.
-   In the meeting with Zared we discussed the following: 
    - JSON Extraction Skill: Prototype nearly complete for extracting theme variables into JSON for MCP integration, enhancing automation and reducing manual input.
    - Token Strategy for Modes: Light/dark mode switching will use variable tokens, preventing component duplication and improving maintainability and efficiency.
    - Naming Conventions: Descriptive naming of tokens will enhance reusability, with a focus on keeping the system manageable and reducing custom tokens.
    - Prototyping Importance: Prototyping will validate mode switching and component functionality; thorough page-by-page reviews are recommended for visual accuracy.

-  While plannig the agent skills for extracting JSON Code from the Figma Design system, I realised that the Figma MCP cannot directly retrieve the variables from the variables page. So a workaround for that would be to possible create a Token page in the design system, on that page we create a large frame that will contain our variables. Then we can use that frame link and the #get_variables_def tool from the figma mcp to extract the variables into a theme.json. 
