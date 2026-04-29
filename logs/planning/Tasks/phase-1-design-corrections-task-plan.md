# Task Plan: Phase 1 Page Design Corrections

**Created:** 29 April 2026
**Status:** Planning
**Estimated Time:** 3-5 days
**Risk Level:** Medium-High

---

## Overview

**Objective:** Correct Phase 1 page design to align with original Phase page design intent, restore proper colour usage, and standardize card border radius across all components.

**Problem Statement:**

-   Phase 1 design has deviated from approved design direction
-   Colours from original Phase pages need to be restored
-   Card border radius values are inconsistent with design system
-   Some sections need layout adjustments

---

## Epic Map

| Epic | Title                        | Complexity | Risk   | Owner      |
| ---- | ---------------------------- | ---------- | ------ | ---------- |
| E1   | Design Audit & Documentation | S          | Medium | Design/Dev |
| E2   | Colour System Restoration    | M          | High   | Dev        |
| E3   | Card Radius Standardization  | M          | Medium | Dev        |
| E4   | Section Layout Corrections   | L          | High   | Dev        |
| E5   | QA & Validation              | M          | Medium | QA/Dev     |

---

## Task Breakdown

### E1 - Design Audit & Documentation

**Objective:** Document current state and establish correction baseline.

1. **Document current Phase 1 page state**

    - Take screenshots of all Phase 1 pages (desktop/tablet/mobile)
    - Note specific areas that are "off track"
    - Document current colour usage

2. **Document original "good" Phase page colours**

    - Screenshot/export original Phase pages for reference
    - Extract exact colour values (hex/RGB)
    - Map colours to their usage contexts (backgrounds, text, borders, etc.)

3. **Audit all card components for radius values**

    - List all card instances across Phase 1 pages
    - Document current border-radius values
    - Note which cards are inconsistent

4. **List all sections that need layout adjustments**

    - Identify sections with layout issues
    - Document what's wrong vs. what's expected
    - Prioritize by visual impact

5. **Create before/after comparison checklist**
    - Build visual QA checklist
    - Define success criteria for each correction
    - Get stakeholder approval on scope

---

### E2 - Colour System Restoration

**Objective:** Restore Phase 1 colours to match original Phase page design.

1. **Extract colour values from original Phase pages**

    - Use browser DevTools or Figma
    - Document all colours used (primary, secondary, accent, text, backgrounds)
    - Note light/dark mode variants if applicable

2. **Map colours to theme.json tokens**

    - Verify colours exist in theme.json palette
    - Add missing colours as custom tokens if needed
    - Ensure semantic naming (e.g., `phase-primary`, `phase-accent`)

3. **Update Phase 1 page colour usage**

    - Replace hardcoded hex values with theme tokens
    - Update patterns/templates with correct colour classes
    - Apply colours to backgrounds, text, borders, icons

4. **Validate colour contrast (WCAG AA)**

    - Check text/background contrast ratios
    - Ensure minimum 4.5:1 for body text
    - Ensure minimum 3:1 for large text/UI components

5. **Test light/dark mode if applicable**
    - Verify colours work in both modes
    - Adjust colour tokens if contrast fails
    - Update style variations if needed

---

### E3 - Card Radius Standardization

**Objective:** Ensure all cards use consistent border-radius values from design system.

1. **Verify correct radius values from design system**

    - Check theme.json or Figma for canonical radius values
    - Document approved values (e.g., `8px`, `12px`, `16px`)
    - Confirm which radius applies to which card types

2. **Find all card instances across Phase 1 pages**

    - Search patterns for card components
    - Check templates and custom blocks
    - List file paths for each card usage

3. **Update card border-radius to design system values**

    - Replace inline/hardcoded radius values
    - Use theme tokens or CSS custom properties
    - Update both editor and frontend styles

4. **Update theme.json radius tokens if needed**

    - Add missing radius values to `settings.custom.radius`
    - Ensure tokens are available for editor
    - Document token naming convention

5. **Validate editor vs frontend consistency**
    - Check card appearance in block editor
    - Compare with frontend rendering
    - Fix any editor style mismatches

---

### E4 - Section Layout Corrections

**Objective:** Fix section layouts that have deviated from design intent.

1. **Identify which sections are "off track"**

    - List specific section names/IDs
    - Document what's wrong (spacing, alignment, grid, etc.)
    - Screenshot current vs. expected state

2. **Define correct layout requirements per section**

    - Specify spacing values (padding, margin, gap)
    - Define grid/flex layout structure
    - Document responsive breakpoint behaviour

3. **Update section patterns/templates**

    - Edit pattern files in `patterns/` directory
    - Update template files if needed
    - Use theme tokens for spacing/layout values

4. **Fix spacing/alignment issues**

    - Apply correct padding/margin values
    - Fix flexbox/grid alignment
    - Ensure consistent section rhythm

5. **Ensure responsive behaviour maintained**
    - Test at all theme breakpoints (1440, 1280, 1024, 768, 640, 390, 320px)
    - Verify mobile layouts work correctly
    - Check tablet/portrait orientations

---

### E5 - QA & Validation

**Objective:** Validate all corrections meet quality and design standards.

1. **Visual QA against design system**

    - Compare Phase 1 pages to original Phase page design
    - Use before/after screenshots for validation
    - Get design approval

2. **Responsive testing**

    - Test at all breakpoints (desktop/tablet/mobile)
    - Check orientation changes (portrait/landscape)
    - Verify touch targets on mobile (min 44x44px)

3. **Cross-browser validation**

    - Test in Chrome, Firefox, Safari, Edge
    - Check for CSS inconsistencies
    - Validate fallbacks for modern CSS features

4. **Editor experience check**

    - Open pages in block editor
    - Verify patterns/blocks render correctly
    - Ensure editor styles match frontend

5. **Run theme validation commands**
    - `npm run theme:validate`
    - `npm run schema:validate`
    - `npm run lint`
    - Fix any reported issues

---

## Dependency Map

```
E1 (Design Audit & Documentation)
  ↓
  ├─→ E2 (Colour System Restoration)
  ├─→ E3 (Card Radius Standardization)
  └─→ E4 (Section Layout Corrections)
       ↓
       E5 (QA & Validation)
```

### Critical Dependencies

| Depends On                  | Needed Before    | Reason                                              |
| --------------------------- | ---------------- | --------------------------------------------------- |
| E1 complete                 | E2, E3, E4 start | Must understand current state before making changes |
| Original Phase page access  | E2 start         | Need colour reference source                        |
| Design system documentation | E3 start         | Need canonical radius values                        |
| E2, E3, E4 complete         | E5 start         | Can't QA until changes are implemented              |
| Stakeholder approval        | Deployment       | Design changes require sign-off                     |

---

## Implementation Waves

### Wave 1: Discovery & Planning

**Duration:** 1 day
**Focus:** E1 - Design Audit & Documentation

**Tasks:**

-   Complete design audit
-   Document current vs. desired state
-   Extract colour values from original Phase pages
-   List all cards and sections needing fixes
-   Get approval on scope

**Exit Gate:**

-   ✅ Clear list of what to fix with references
-   ✅ Stakeholder approval on scope
-   ✅ Access to all needed design assets

---

### Wave 2: Token & System Fixes

**Duration:** 1-2 days
**Focus:** E2 + E3 (can run in parallel)

**Tasks:**

-   Restore Phase page colours
-   Update theme.json colour tokens
-   Standardize card border radius
-   Update theme.json radius tokens
-   Apply token changes to patterns

**Exit Gate:**

-   ✅ Design tokens correct in theme.json
-   ✅ Schema validation passes
-   ✅ No hardcoded colour/radius values remain

---

### Wave 3: Section Updates

**Duration:** 1-2 days
**Focus:** E4 - Section Layout Corrections

**Tasks:**

-   Fix section layouts
-   Apply corrected colours/radius to sections
-   Update patterns/templates
-   Fix spacing/alignment issues
-   Ensure responsive behaviour

**Exit Gate:**

-   ✅ All sections match design requirements
-   ✅ Responsive behaviour validated
-   ✅ Editor styles match frontend

---

### Wave 4: QA & Sign-off

**Duration:** 1 day
**Focus:** E5 - QA & Validation

**Tasks:**

-   Full visual QA
-   Responsive testing across breakpoints
-   Cross-browser validation
-   Editor experience check
-   Run validation commands
-   Get stakeholder approval

**Exit Gate:**

-   ✅ All QA checks pass
-   ✅ Design approved by stakeholder
-   ✅ Changes ready to deploy

---

## Quick Action Checklist

**Pre-Implementation:**

-   [ ] Screenshot current Phase 1 pages (desktop/tablet/mobile)
-   [ ] Screenshot original Phase pages (reference)
-   [ ] Extract correct colour values from originals
-   [ ] List all cards and their current radius values
-   [ ] List sections that need layout fixes
-   [ ] Get stakeholder approval on scope

**Implementation:**

-   [ ] Update theme.json with correct colour tokens
-   [ ] Update theme.json with correct radius tokens
-   [ ] Update Phase 1 colours to match originals
-   [ ] Update all card radius values
-   [ ] Fix section spacing/alignment
-   [ ] Fix section layouts
-   [ ] Apply token-based styling throughout

**Validation:**

-   [ ] Run `npm run theme:validate`
-   [ ] Run `npm run schema:validate`
-   [ ] Run `npm run lint`
-   [ ] Visual QA against original Phase pages
-   [ ] Responsive testing (all breakpoints)
-   [ ] Cross-browser testing
-   [ ] Editor experience check
-   [ ] Get final stakeholder approval

---

## Files Likely to Change

### Theme Files:

-   `theme.json` - Colour and radius token updates
-   `patterns/*.php` - Phase 1 page patterns
-   `templates/*.html` - Page templates if used
-   `assets/css/*.scss` - Custom styles (if any)
-   `inc/block-styles.php` - Block style registrations (if any)

### Documentation:

-   `CHANGELOG.md` - Document design corrections
-   Pattern documentation (if exists)

---

## Risk Assessment

### High Risk Areas:

1. **Colour changes affecting other pages**

    - Mitigation: Use Phase-specific colour tokens, not global ones
    - Test all pages, not just Phase 1

2. **Section layout changes breaking responsive behaviour**

    - Mitigation: Test at all breakpoints before/after changes
    - Use established spacing tokens from theme.json

3. **Radius changes affecting UI components beyond cards**
    - Mitigation: Audit all radius usages before standardizing
    - Use specific card-radius tokens, not global ones

### Medium Risk Areas:

1. **Editor/frontend style parity issues**

    - Mitigation: Test editor experience after each change
    - Update editor styles alongside frontend

2. **Theme.json schema validation failures**
    - Mitigation: Run validation after every token change
    - Keep schema documentation handy

---

## Success Criteria

**Design:**

-   ✅ Phase 1 colours match original Phase page design
-   ✅ All cards use consistent border radius from design system
-   ✅ Section layouts match design intent
-   ✅ Visual design approved by stakeholder

**Technical:**

-   ✅ No hardcoded colour or radius values
-   ✅ All changes use theme.json tokens
-   ✅ Schema validation passes
-   ✅ Lint checks pass
-   ✅ WCAG AA contrast requirements met

**Quality:**

-   ✅ Responsive behaviour works at all breakpoints
-   ✅ Cross-browser compatibility validated
-   ✅ Editor experience matches frontend
-   ✅ No regressions on other pages

---

## Next Steps

1. Review this task plan with stakeholder
2. Get approval to proceed
3. Begin Wave 1 (Design Audit)
4. Update this document with progress
5. Track any scope changes or blockers

---

## Notes

-   Keep before/after screenshots for documentation
-   Document any design system tokens added
-   Update CHANGELOG.md with design corrections
-   Consider creating a design correction guide for future reference
