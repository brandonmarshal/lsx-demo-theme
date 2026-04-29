# PRD Assumptions

1. The implementation baseline is the `develop` branch for both `ls-theme` and `ls-plugin` until a release branch is approved.
2. `ls-theme` owns theme.json, global styles, templates, template parts, patterns and theme-level CSS/JS.
3. `ls-plugin` owns site-specific custom blocks, non-theme PHP functionality, SCF JSON, filtering, style switching, custom permalinks and shared site behaviour.
4. The design system is the primary design source, but Figma Make and published prototype parity require manual visual review.
5. The live site remains the source of truth for current IA and migration inventory until a new IA is approved.
6. The dev site will be available for browser QA before implementation begins.
7. Claims such as `500+`, `WCAG AA` and `<1s` require evidence or softened wording before launch.
8. The project should avoid new heavy dependencies unless approved with ROI and maintenance reasoning.
9. Existing animation and GSAP integration should be audited before adding new motion behaviours.
10. Light and dark mode are in scope only where design intent and theme support are confirmed.
