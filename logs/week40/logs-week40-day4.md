# Week 40, Day 4 Log 2026-06-18

## Today's Progress

### What have you accomplished today?

- Continued learning and experimenting with Figma:
   - Explored design workflows and improved familiarity with the interface and tooling.
   - Tested reusable components, variants, and component organisation techniques.
   - Investigated Figma Variables and their role in scalable design systems.
   - Explored the relationship between design tokens, variables, and frontend implementation.
   - Tested different layouts and design patterns to understand reusable UI structures.
- Knowledge gained:
   - Improved understanding of Figma design systems and component architecture.
   - Better understanding of Variables and their role in maintaining consistent designs.
   - Gained practical experience with workflows that bridge design and frontend development.

- Conducted a full audit of 16 LightSpeed DS showcase HTML pages:
   - Confirmed Claude Design is a separate surface from Claude Chat, living at claude.ai/design.
   - Established a 5-pillar, 100-point scoring criteria framework:
      - Containment & Overflow (30pts)
      - Spacing Consistency (25pts)
      - Token & Variable Compliance (20pts)
      - Dark Mode Fidelity (15pts)
      - Accessibility Baseline (10pts)
   - Scored all 16 pages against the criteria:

| Page | Score | Band |
|---|---|---|
| Modal & Dialog | 59 | Full revision |
| Tooltip & Popover | 65 | Full revision |
| Avatar & User | 70 | Fix before publish |
| Card Types | 70 | Fix before publish |
| Alert & Notification | 73 | Fix before publish |
| Empty States & 404 | 74 | Fix before publish |
| Extended Button | 76 | Fix before publish |
| Data Table | 77 | Fix before publish |
| Search & Filter | 79 | Fix before publish |
| Portfolio – Project | 79 | Fix before publish |
| Hero Layouts | 81 | Fix before publish |
| CTA Types | 83 | Fix before publish |
| Loading & Progress | 83 | Fix before publish |
| Navigation | 86 | Fix before publish |
| Form Input | 86 | Fix before publish |
| Phosphor Icons | 90 | Ship-ready |

   - Identified systemic issues across the full set:
      - border-left/border-top accent + border-radius corner artefacts
      - Animation ease fallback missing on all pages
      - Theme toggle hardcoded text causing dark mode flash
      - Missing --fg-link and --accent-soft tokens in local theme blocks
      - transition: all on body (Portfolio)
      - Style block inside body (Extended Button)
      - Small button min-height below 44px accessibility minimum
      - Phosphor Icons filterSection JS hiding footer + deprecated event global
   - Generated two Claude Design prompts to fix all 16 pages:
      - Prompt 1 — Modal & Dialog + Tooltip & Popover (standalone, structural)
      - Prompt 2 — Remaining 14 pages in a single merged prompt

---

## Time Logs

-   4.15 hrs - Watched Youtube Videos on the Figma AI and how it works, then I did my owns testing in the DS as well and logged all reports on Asana
-   1.15 hrs - Auditing & Reviewing the showcases pages on Claude Desing, finding improvements and generated prompts to run. 

---

## Notes

-   Figma AI is not reliable for creating layouts, page structures, or frame hierarchies from scratch and often requires substantial manual refinement.
-   Figma AI is most effective as a design assistant for smaller tasks, such as replacing content, improving spacing, and organising existing frames and components.
