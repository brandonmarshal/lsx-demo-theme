# Template and Pattern Requirements

## Global parts

| Part | Implementation | Acceptance criteria |
|---|---|---|
| Header | `parts/header.html` calling `ls-theme/header` pattern or direct template part markup | Desktop and mobile navigation, keyboard accessible, tokenised colours, logo variants, optional search/style switcher. |
| Footer | `parts/footer.html` calling `ls-theme/footer` pattern or direct markup | Current links mapped to new IA, legal/trust links, social/contact, responsive layout. |
| Consultation CTA | Pattern | Reusable across service, solution and insight pages; tracked CTA. |
| Newsletter CTA | Pattern | Optional launch item; tracked signup if included. |

## Page families

| Page family | Template/pattern scope | Risk |
|---|---|---:|
| Homepage | Hero, stats, service/solution pathways, featured work, insight cards, CTA | High |
| Work | Work landing, case study cards, single case study pattern | Medium-high |
| Solutions | Solutions landing and detail pages | High |
| Services | Discover, Create, Build, Launch, Grow, Evolve page families | High |
| Systems | Design systems, governance, AI-readiness and technical process content | Medium-high |
| Insights | Blog/archive/search/filter/card patterns | High |
| About | Story, credibility, community and team sections | Medium |
| Contact | Form, consultation route, support route | Medium-high |

## Pattern naming convention

Use a predictable naming scheme:

- `ls-theme/header`
- `ls-theme/footer`
- `ls-theme/cta-consultation`
- `ls-theme/home-hero`
- `ls-theme/home-proof-stats`
- `ls-theme/card-service`
- `ls-theme/card-solution`
- `ls-theme/card-insight`
- `ls-theme/section-featured-work`
- `ls-theme/section-process`

## Acceptance criteria

- Patterns use tokens, not raw visual values.
- Patterns work in editor and frontend.
- Patterns have clear names and descriptions.
- Patterns have sensible default content only where helpful.
- Fragile layout patterns have documentation or locking guidance.
- Patterns pass responsive and accessibility checks.
