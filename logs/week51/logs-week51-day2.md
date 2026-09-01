# Week 51, Day 2 Log 2026-09-01

## Today's Progress

### What have you accomplished today?

---

**LS-2803** — PageSpeed Test and Fix Homepage, Blog and Work Archive Pages `[In Progress]`

-   **Work archive & Blog archive investigated** — both already benefit from LS-2922's conditional CSS fix theme-wide; scored reasonably (Work 80, Blog 78) without further work
-   **Missing image dimensions — fixed:** neither archive page renders a card image, only the sitewide header logo lacked `width`/`height`; added explicit dimensions to both logo `<img>` tags after confirming the SVGs share identical intrinsic size — a sitewide fix that surfaced here since these pages have nothing else competing in the audit
-   **Other findings investigated but not fixed, each with evidence:**
    -   Forced reflow (Blog) — no confirmed theme-code cause; likely tied to WordPress core's own interactivity-router script via `enhancedPagination`, not something to fix on a guess
    -   1 long main-thread task (Work) — no cause found via code search, would need an actual DevTools trace
    -   Non-composited animations — real, but converting them carries real visual-regression risk, same category as an earlier descoped decision on LS-2922; not applied as a quick win
    -   Remaining ~17 KiB unused CSS — confirmed as the `card-shells`/`cta-buttons`/`faq` trio already deliberately left unconditional in LS-2922 to avoid a flash-of-unstyled-content risk; known, accepted trade-off
-   **PR #34 opened** (`fix/logo-image-dimensions`) — verified via `php -l`, `phpcs` (zero errors), escape/security scans, and confirmed correct rendering with no visual distortion across all 4 logo instances
-   **Real bottleneck identified for further gains: plugin-side assets, not theme code** — live network trace showed `ls-plugin` CSS files in the render-blocking list, including a confirmed 404 on `style-linkable-blocks.css`; "Legacy JavaScript" flag traced to third-party GSAP CDN, outside theme scope
-   Theme-side work for these two pages done and in PR #34; plugin-side asset audit identified as separate follow-up work, not yet started

---

**BugHerd MCP Debrief — Artifact for Richard (Head of Product)**

-   Richard requested a 30-minute call to review BugHerd MCP usage — what's working, what to fix/build next
-   Built a standalone HTML artifact summarising real experience from the LS-2810 implementation, with every point tied to something actually hit while building the Playwright → BugHerd pipeline
-   **Content structured across 6 sections:** current usage, the two AI integration paths (unattended reporter vs interactive MCP, deletion kept human-only), 4 prioritised improvement asks, positive signals, 3 standalone questions for Richard, and a 60-second fallback version
-   **Design pass:** initial utilitarian treatment rebranded to LightSpeed's actual `theme.json`/`styles/dark.json` tokens; dark mode intentionally uses `brand-400` instead of the literal neon `cta-500` token for a more professional read; advised light mode as the boardroom-appropriate default
-   **Content revision pass for external sharing:** reframed the intro to address Richard directly rather than reading as internal notes; dropped a rate-limits ask likely already on BugHerd's roadmap, bringing it to 4 total asks; replaced restated questions with 3 genuinely standalone ones
-   Delivered both as a live shareable artifact link for the call and as a downloadable standalone HTML file for offline use

---

## Time Logs

-   2.40 hrs - Finalised the planning for the meeting with Richard, regarding the Bugherd MCP. (He postponed). I then proceeded with the Work and Blog PageSpeed testing/fixing. PR has been merged.

---

## Notes

-
