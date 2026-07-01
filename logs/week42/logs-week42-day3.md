# Week 42, Day 3 Log 2026-07-01

## Today's Progress

### What have you accomplished today?

---

**Meeting — Ash Shaw & Zared Rogers (1hr 10mins)**

-   Reviewed progress on the KWV site and discussed moving to a strict commit and deploy workflow
-   Playwright automated testing initiated — decision made to use screenshot-based visual coverage; Zared to install Playwright locally
-   Zared demonstrated uSpec extract tool — flags raw hex codes needing replacement with DS aliases
-   Discussed using starter patterns in Figma to drop pre-built sections into new pages more efficiently
-   Ash demonstrated AI-assisted Figma layer renaming for logical, descriptive naming
-   WordPress standards confirmed: templates restricted to relevant post types, "Uncategorized" category to be removed from all builds, spacing resolved via JSON not manual overrides
-   African Safaris project scoping discussed — limited budget may require back-engineering from existing code
-   **Brandon's action items:** prepare Linear usage notes for mentor session, research uSpec (CC Component and CC Tokens skills), configure "No Title" template restriction and spacing in JSON

---

**Research — Tools & Skills from Meeting**

-   Created and reviewed 6 Asana tasks to track learning for each resource; documented summaries and how-to notes as task comments

-   **Learn uSpec** `[In Progress]`
    -   Reviewed uSpec docs — AI-powered Figma component documentation tool that generates Markdown specs as a single source of truth per component
    -   Documented summary and how-to usage steps in Asana
    -   Installed and tested uSpec directly against a real button component — hit a broken MCP reference in the setup docs, resolved by swapping to `figma-console-mcp`; `firstrun` setup assumed an Uber-internal template library, skipped; running `create-component-md` required 1 orchestrator + 3 parallel sub-agents + audit gates per component which was impractical
    -   Compared against generating the spec manually via a single Figma MCP prompt — manual approach was significantly faster and required only one approval
    -   All uSpec install changes reverted from the repo (skills, config, MCP entry, cache)
    -   Produced `uspec-button-component.md` manually following uSpec's documented structure, with honest "Known gap" flags where extraction was incomplete

-   **Component Contracts for Figma** `[In Progress]`
    -   Reviewed the repo — skill for building reusable Figma DS components from structured JSON contracts (variants, states, tokens, spacing etc.)
    -   Documented summary and full setup + usage steps with example prompts in Asana
    -   Best used for generating and maintaining a consistent shared component library

-   **Eden Spiekermann Skills** `[Done]`
    -   Reviewed the repo — 3 AI skills for auditing and repairing existing Figma designs against a DS (`audit-design-system`, `fix-design-system-finding`, `apply-design-system`)
    -   Documented summary and full setup + usage steps with example prompts in Asana
    -   Best used for cleaning up imported or prototype screens to properly use shared components, variables, and tokens
    -   Task marked complete

-   **Rad Spacing** `[Done]`
    -   Reviewed the skill — a Figma spacing rulebook for AI using a 4-tier gap system (tight → group → section → page boundaries)
    -   Documented summary and how-to usage steps in Asana
    -   Task marked complete

-   **sync-figma-tokens** `[In Progress]`
    -   Reviewed the skill — keeps design tokens in code and Figma Variables aligned; supports code-to-Figma, Figma-to-code, and bidirectional sync; dry-run required before any changes applied; stale tokens archived by default, not deleted
    -   Documented summary and full setup + usage steps in Asana
    -   Best used when a DS exists in both code and Figma (JSON tokens, CSS variables, Tailwind, Style Dictionary etc.)

-   **Linear Notes for Team** `[In Progress]`
    -   Asana task created to track preparation of Linear usage notes for the mentor session covering planning, status updates, and OpenSpec; not yet started

---

**Slack Call — Ash Shaw (30mins)**

-   Discussed Linear workflows with ChatGPT agents
-   Discussed Linear Skills setup and usage

---

## Time Logs

-  3.55 hrs - Reviewed, organised and went through all links shared with me, created Asana tasks for what I am learning and writing comments for what I have learned so fa, reading all the related documents.
-  1.10 hrs - Meeting with Ash and Zared to discuss Uspec usage and other points
-  3.0 hrs - Installed uSpec myself and tested it, firstly installing the correct Figma mcp to my Claude Code and then running the uSpec commands. I also went through some other skills and logged my learning in Asana.

## Notes

-
