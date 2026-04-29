# LightSpeedWP.Agency Redesign - Project Pack

- Value: Turn the LightSpeedWP.Agency redesign into a controlled block-theme and block-plugin delivery project, with design-system traceability from Figma to WordPress.
- Risk: Evidence is incomplete for the Figma Make prototype, dev site and published prototype, so final scope and parity checks must be approved before GitHub issues are created.
- Next step: Review `00-complexity-risk-estimates.md`, then approve or revise the PRD and issue drafts.

## Status

Planning pack only. No GitHub issues have been created. No repository files have been changed.

## Source inputs

| Source | URL | Planning use | Status |
|---|---|---|---|
| Blocks plugin repo | https://github.com/lightspeedwp/ls-plugin | Custom blocks, site-specific PHP, non-theme functionality | Reviewed via GitHub connector |
| Theme repo | https://github.com/lightspeedwp/ls-theme | Block theme, theme.json, templates, patterns, global styles | Reviewed via GitHub connector |
| Figma design system | https://www.figma.com/design/OTqchq3sRBzUy6TICruzc3/LightSpeedWP-Design-System | Variables, pages, components, light/dark mode, prototype inventory | Partially reviewed via Figma connector |
| Figma Make prototype | https://www.figma.com/make/xAYHN3wsPM4TR2JppUr8sp/LightSpeedWP.Agency | Intended visual source for implementation | Connector blocked; needs manual export or node links |
| Dev site | https://ls-agency.lightspeedwp.dev/ | Current build validation | Not machine-readable in this session |
| Published prototype | https://lightspeedwp.figma.site/ | Prototype parity reference | JS-only fetch; visual review needed |
| Current live site | https://lightspeedwp.agency/ | Current IA, content, redirects, migration source | Reviewed via web fetch |

## Pack structure

```text
lightspeedwp-agency-redesign-project-pack/
├── README.md
├── SOURCE-REGISTER.md
├── 00-complexity-risk-estimates.md
├── 01-prd/
│   ├── prd.md
│   ├── assumptions.md
│   └── open-questions.md
├── 02-technical-brief/
│   ├── figma-to-wordpress-brief.md
│   ├── theme-json-token-map.md
│   ├── block-plugin-requirements.md
│   └── template-pattern-requirements.md
├── 03-task-plan/
│   ├── epic-map.md
│   ├── task-breakdown.md
│   ├── dependency-map.md
│   └── implementation-waves.md
├── 04-github-issues/
│   ├── issue-index.md
│   └── issues/
├── 05-qa-and-launch/
│   ├── launch-qa-plan.md
│   ├── acceptance-test-map.md
│   ├── figma-parity-checks.md
│   └── go-no-go-gates.md
└── 06-memory-bank/
    ├── projectbrief.md
    ├── productContext.md
    ├── systemPatterns.md
    ├── techContext.md
    ├── activeContext.md
    ├── progress.md
    └── tasks/_index.md
```

## Approval gates

1. Approve evidence baseline and known gaps.
2. Approve PRD scope, non-goals and success metrics.
3. Approve IA, redirect and content migration approach.
4. Approve design-token mapping before implementation.
5. Approve issue drafts before creating GitHub issues.
6. Approve launch QA plan before final QA begins.
7. Approve go/no-go gate before deployment.

## Specialist follow-up recommended

- Figma parity: `lightspeed-figma-wordpress-parity-auditor`
- Launch QA orchestration: `lightspeed-launch-qa-planner`
- Redirect map: `lightspeed-redirect-map-planner`
- GA4/GTM plan: `lightspeed-ga4-conversion-tracking-planner`
- Schema and AI discoverability: `lightspeed-schema-and-ai-discoverability-planner`
- Claim register: `lightspeed-claim-register-auditor`
