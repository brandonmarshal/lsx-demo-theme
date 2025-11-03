# Week 10, Day 1 Log 2025-11-03

## Today's Progress

### What have you accomplished today?

-   Managed and updated GitHub issues under parent Asana task (significant iteration with Copilot prompts to shape issue content) – sub‑task of parent task ([Asana Parent Task](https://app.asana.com/1/1152726221312/project/1211170302971594/task/1211818738567236?focus=true))
-   Prompting research for a Docker-based local WP dev environment using the official WordPress image ([Docker Hub – wordpress](https://hub.docker.com/_/wordpress))
-   Block Editor study session (1h30) – covered block file structure, block.json purpose, registration flow (PHP + JS), block wrapper utilities, editor React component model, markup (HTML comment) storage format, static vs dynamic rendering, and JS/build tooling approach
-   Weekly plan alignment & adjustments (30 min) incorporating Ash's recommendations (see planning doc) to refine focus and sequencing ([Week 10 Planning](https://github.com/brandonmarshal/lsx-demo-theme/blob/main/logs/planning/week10-planning.md))

### How do you feel about today's progress?

Mixed: the GitHub issue refinement took longer than planned due to iterative prompting, but the effort produced clearer, actionable issues. The Docker research clarified next steps for a containerised workflow, and the focused Block Editor study deepened my conceptual model (structure, lifecycle, rendering). Overall a productive foundational day setting up smoother implementation work for the rest of the week.

---

## Time Logs

-   4.0 hrs – GitHub issue updates & refinement (prompt iterations)
-   1.0 hrs – Docker-based WP environment research (official image)
-   1.5 hrs – Block Editor structured study session
-   0.5 hrs – Weekly planning alignment & adjustments (Ash recommendations)

---

## Notes

-   Issue refinement: Learned constraints in guiding Copilot toward concise, standards-aligned issue descriptions; may script a template to speed future iterations.
-   Docker research: Consider using a docker-compose setup with separate db (MariaDB) + wp service; verify volume mounts for wp-content and custom theme for rapid iteration.
-   Block architecture insights: - File structure: `src` (authoring ESNext/JSX) → build assets for runtime. - `block.json`: central metadata + script/style linkage + attribute schema to keep registration declarative. - Registration: dual (PHP + JS) enables dynamic rendering + editor experience; optional pure-PHP blocks for simple server-rendered output. - Wrapper helpers: `useBlockProps()` / `useBlockProps.save()` and `get_block_wrapper_attributes()` streamline consistent classes & supports. - Storage format: HTML comments delimit block boundaries enabling reliable parsing and attribute persistence. - Rendering modes: choose static for stable markup; dynamic when data must be generated at request time.
-   JS approach: Build tooling (wp-scripts) simplifies transpilation; fallback global `wp.*` pattern trades DX for buildless simplicity.
-   Next considerations: prototype a minimal custom block (static) then a dynamic variant to cement concepts; draft docker-compose.yml baseline.
-   Planning alignment: Incorporated Ash's guidance to tighten scope for week (prioritising environment setup + first custom block) to avoid context switching mid‑week.
