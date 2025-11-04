# QA Validation Checklist: Stories to Areas CPT Migration

## Pre-Migration Checks

### Database Backup
- [ ] Full database backup completed
- [ ] Backup verified and downloadable
- [ ] Backup date/time recorded: `_______________`

### Code Backup
- [ ] All theme files backed up
- [ ] Plugin files backed up
- [ ] Version control commit created

### Environment
- [ ] Testing on staging environment (not production)
- [ ] WordPress version documented: `_______________`
- [ ] PHP version documented: `_______________`
- [ ] Active plugins documented

## Code Implementation Validation

### Theme Files
- [ ] `inc/cpt-area.php` exists and registers Area CPT
- [ ] `inc/cpt-story.php` removed or deprecated
- [ ] `functions.php` loads `cpt-area.php` instead of `cpt-story.php`
- [ ] `inc/taxonomies.php` registers `area_category` taxonomy
- [ ] No references to `story_category` in taxonomies file

### Plugin Files
- [ ] `fishing-cpt-plugin/includes/cpt-areas.php` exists
- [ ] `fishing-cpt-plugin/includes/meta-fields.php` registers area meta fields
- [ ] `fishing-cpt-plugin/includes/capabilities.php` includes area capabilities
- [ ] `fishing-cpt-plugin/includes/template-loader.php` loads area templates
- [ ] `fishing-cpt-plugin/includes/blocks-query-variations.php` includes area variation
- [ ] `fishing-cpt-plugin/includes/blocks.php` registers area-card block

### Block Files
- [ ] `fishing-cpt-plugin/blocks/area-card/` directory exists
- [ ] `block.json` references `fishing/area-card`
- [ ] `render.php` displays area meta correctly
- [ ] No `story-card` directory remains

### Templates
- [ ] `fishing-cpt-plugin/templates/single-area.php` exists
- [ ] `fishing-cpt-plugin/templates/archive-area.php` exists
- [ ] No `single-stories.php` or `archive-stories.php` files remain
- [ ] Template content updated with area-specific labels

### Documentation
- [ ] `docs/fishing-website/content-model.md` updated with Area CPT
- [ ] Migration guide created
- [ ] QA checklist created (this document)

## Admin Panel Validation

### CPT Registration
- [ ] "Areas" menu visible in WordPress admin sidebar
- [ ] Menu icon is `dashicons-location` (location pin)
- [ ] Menu positioned correctly (around position 22)
- [ ] Clicking "Areas" shows list of areas

### Add New Area
- [ ] "Add New" button works
- [ ] Title field present and functional
- [ ] Content editor loads correctly
- [ ] Excerpt field available
- [ ] Featured image selector works
- [ ] "Area Categories" taxonomy box present
- [ ] "Publish" button functional

### Meta Fields
- [ ] Location field displays in editor
- [ ] Weather Conditions field displays
- [ ] Catch Success field displays
- [ ] All meta fields save correctly
- [ ] Meta fields appear when editing existing area

### Taxonomy Management
- [ ] "Area Categories" sub-menu appears under Areas
- [ ] Can create new area categories
- [ ] Categories display hierarchically
- [ ] Can assign categories to areas
- [ ] Category archive pages accessible

### Capabilities
- [ ] Administrator can edit areas
- [ ] Editor can edit areas
- [ ] Correct capabilities assigned (`edit_area`, `edit_areas`, etc.)
- [ ] Contributors/subscribers cannot edit (if intended)

## Frontend Validation

### Archive Page
- [ ] Archive accessible at `/areas/`
- [ ] Page title displays correctly ("Areas" or custom title)
- [ ] All areas listed
- [ ] Featured images display (if set)
- [ ] Excerpts display correctly
- [ ] Pagination works (if more than posts per page)
- [ ] No PHP errors or warnings

### Single Area Page
- [ ] Single area accessible via permalink
- [ ] Permalink structure: `/areas/[area-slug]/`
- [ ] Title displays correctly
- [ ] Content displays correctly
- [ ] Featured image displays (if set)
- [ ] Meta fields display:
  - [ ] Location
  - [ ] Weather Conditions
  - [ ] Catch Success
- [ ] No PHP errors or warnings

### Category Archive
- [ ] Category archives accessible at `/area-category/[category-slug]/`
- [ ] Only areas in that category display
- [ ] Category name/description displays
- [ ] Pagination works

### Block Display
- [ ] Area card block renders on frontend
- [ ] Block displays area title
- [ ] Block displays meta information
- [ ] Block styles apply correctly
- [ ] Block accessible via block inserter in editor

### Query Loop Variations
- [ ] "Featured Areas" variation appears in block inserter
- [ ] Variation loads area posts correctly
- [ ] Area-card block works within query loop
- [ ] Pagination works in query loop

## Migration Validation (If Data Migrated)

### Data Integrity
- [ ] Post count matches (old stories = new areas)
- [ ] All story posts converted to area posts
- [ ] Post titles preserved
- [ ] Post content preserved
- [ ] Excerpts preserved
- [ ] Featured images preserved
- [ ] Publication dates preserved
- [ ] Author attribution preserved

### Taxonomy Migration
- [ ] Story categories converted to area categories
- [ ] Category names preserved
- [ ] Category slugs updated
- [ ] Category hierarchies preserved
- [ ] Term counts accurate

### Meta Field Migration
- [ ] Location meta preserved
- [ ] Weather Conditions meta preserved
- [ ] Catch Success meta preserved
- [ ] No meta data lost

### URL Structure
- [ ] Old `/stories/` URLs redirect to `/areas/`
- [ ] Individual post URLs updated
- [ ] Category URLs updated
- [ ] No 404 errors on old URLs

## Performance & Optimization

### Database
- [ ] Post queries performant
- [ ] Taxonomy queries optimized
- [ ] Meta queries indexed appropriately
- [ ] No slow query warnings

### Frontend Performance
- [ ] Archive page loads quickly
- [ ] Single pages load quickly
- [ ] No excessive database queries
- [ ] Images optimized

### Caching
- [ ] Object cache cleared
- [ ] Page cache cleared
- [ ] CDN cache purged (if applicable)
- [ ] Permalinks flushed

## Accessibility Testing

### WCAG Compliance
- [ ] Archive page heading structure valid (H1, H2, etc.)
- [ ] Single page heading structure valid
- [ ] ARIA labels appropriate
- [ ] Keyboard navigation functional
- [ ] Screen reader tested (basic check)
- [ ] Color contrast acceptable
- [ ] Focus indicators visible

### Semantic HTML
- [ ] Proper use of `<article>` tags
- [ ] Lists use `<ul>` or `<ol>`
- [ ] Navigation landmarks appropriate
- [ ] Main content in `<main>`

## SEO Validation

### Meta Tags
- [ ] Page titles appropriate
- [ ] Meta descriptions present (if plugin used)
- [ ] Canonical URLs correct
- [ ] Open Graph tags present (if applicable)

### Structured Data
- [ ] Schema markup appropriate (if used)
- [ ] Breadcrumbs functional (if applicable)

### Sitemap
- [ ] Areas included in XML sitemap
- [ ] Old stories URLs removed
- [ ] Sitemap regenerated

## Cross-Browser Testing

### Desktop Browsers
- [ ] Chrome/Edge - Archive page
- [ ] Chrome/Edge - Single page
- [ ] Firefox - Archive page
- [ ] Firefox - Single page
- [ ] Safari - Archive page (if available)
- [ ] Safari - Single page (if available)

### Mobile Testing
- [ ] Responsive on mobile devices
- [ ] Touch interactions work
- [ ] Meta fields readable on mobile

## Error Checking

### PHP Errors
- [ ] No fatal errors in error log
- [ ] No warnings in error log
- [ ] No deprecation notices
- [ ] Debug log reviewed

### JavaScript Errors
- [ ] No console errors on archive page
- [ ] No console errors on single page
- [ ] Block editor loads without errors

### Database Errors
- [ ] No database query errors
- [ ] All queries complete successfully

## Plugin Compatibility

### Common Plugins
- [ ] Yoast SEO / Rank Math compatible (if used)
- [ ] ACF/SCF fields display correctly
- [ ] Caching plugins work correctly
- [ ] Backup plugins function
- [ ] Security plugins don't block

## Final Checks

### Cleanup
- [ ] Old code removed (not just commented)
- [ ] No unused files remain
- [ ] Migration scripts removed (if temporary)
- [ ] Test data cleaned up

### Documentation
- [ ] Content model updated
- [ ] Migration guide complete
- [ ] Comments added to complex code
- [ ] README updated if needed

### Version Control
- [ ] All changes committed
- [ ] Commit messages clear
- [ ] Branch ready for merge
- [ ] Pull request created

## Sign-Off

### QA Tester
- Name: `_______________`
- Date: `_______________`
- Signature: `_______________`

### Technical Lead
- Name: `_______________`
- Date: `_______________`
- Signature: `_______________`

### Notes/Issues Found
```
[Document any issues discovered during QA]






```

### Resolution Status
- [ ] All critical issues resolved
- [ ] All major issues resolved
- [ ] Minor issues documented for future sprint
- [ ] Ready for production deployment

---

## Emergency Rollback Plan

If critical issues discovered:

1. **Stop deployment immediately**
2. **Restore database backup**
3. **Revert code changes**
4. **Clear all caches**
5. **Verify rollback successful**
6. **Document issue for resolution**

Emergency Contact: `_______________`
Rollback Window: `_______________`
