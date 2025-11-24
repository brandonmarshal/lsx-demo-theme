# Dependency Management Test Plan

## Overview
This document outlines the testing procedures for the Secure Custom Fields (SCF) / Advanced Custom Fields (ACF) dependency management implementation in the Fishing CPT Plugin.

## Test Environment Requirements
- WordPress 6.8.0 or higher
- PHP 7.4 or higher
- Access to WordPress admin panel
- Ability to install/activate/deactivate plugins

## Test Cases

### Test Case 1: Activation with Dependency Present
**Objective:** Verify the plugin activates successfully when ACF/SCF is already active.

**Prerequisites:**
- Advanced Custom Fields (ACF) or Secure Custom Fields (SCF) is installed and activated

**Steps:**
1. Navigate to WordPress Admin > Plugins
2. Locate "Fishing CPT Plugin"
3. Click "Activate"

**Expected Results:**
- ✓ Plugin activates without errors
- ✓ No admin notices are displayed
- ✓ Plugin functionality is available
- ✓ Custom post types are registered
- ✓ Blocks are available in the editor

---

### Test Case 2: Activation without Dependency
**Objective:** Verify the plugin handles missing dependency gracefully.

**Prerequisites:**
- Advanced Custom Fields (ACF) and Secure Custom Fields (SCF) are NOT installed or are deactivated

**Steps:**
1. Navigate to WordPress Admin > Plugins
2. Locate "Fishing CPT Plugin"
3. Click "Activate"

**Expected Results:**
- ✓ Plugin attempts to activate
- ✓ Error notice is displayed: "Fishing CPT Plugin Error: This plugin requires Secure Custom Fields (SCF) or Advanced Custom Fields (ACF)..."
- ✓ Plugin is automatically deactivated
- ✓ Notice includes a link to install plugins from the WordPress plugin directory
- ✓ No PHP errors or warnings are thrown
- ✓ Plugin does not execute any registration functions

---

### Test Case 3: Deactivation of Dependency
**Objective:** Verify the plugin behavior when the dependency is deactivated after the plugin is already active.

**Prerequisites:**
- Both Fishing CPT Plugin and ACF/SCF are installed and activated

**Steps:**
1. Navigate to WordPress Admin > Plugins
2. Deactivate ACF/SCF plugin
3. Refresh or navigate to another admin page

**Expected Results:**
- ✓ On next page load, Fishing CPT Plugin detects missing dependency
- ✓ Error notice is displayed
- ✓ Fishing CPT Plugin is automatically deactivated
- ✓ No fatal errors occur

---

### Test Case 4: WordPress 6.5+ Dependency Header Recognition
**Objective:** Verify that WordPress core recognizes the plugin dependency header.

**Prerequisites:**
- WordPress 6.5 or higher
- Fishing CPT Plugin is installed but not activated
- ACF/SCF is not installed

**Steps:**
1. Navigate to WordPress Admin > Plugins
2. Locate "Fishing CPT Plugin"
3. Check for any dependency warnings in the plugin card

**Expected Results:**
- ✓ WordPress may display a dependency warning/notice (if supported by the WP version)
- ✓ Plugin header correctly declares the dependency

---

### Test Case 5: Dependency Installation Flow
**Objective:** Verify the complete installation flow as documented in README.

**Prerequisites:**
- Clean WordPress installation with neither plugin installed

**Steps:**
1. Install and activate ACF/SCF first
2. Install and activate Fishing CPT Plugin
3. Verify all functionality works

**Expected Results:**
- ✓ ACF/SCF activates successfully
- ✓ Fishing CPT Plugin activates successfully
- ✓ No errors or warnings
- ✓ All custom post types available
- ✓ All blocks available in editor

---

## Additional Manual Checks

### Code Quality Checks
- [ ] PHP syntax is valid (`php -l fishing-cpt-plugin.php`)
- [ ] All output is properly escaped
- [ ] Internationalization functions used correctly
- [ ] PHPDoc comments are complete and accurate

### Security Checks
- [ ] No direct database queries
- [ ] All user-facing strings use translation functions
- [ ] Admin notices use proper escaping
- [ ] No security vulnerabilities introduced

### Documentation Checks
- [ ] README.md includes dependency information
- [ ] Installation instructions are clear
- [ ] Requirements section is up to date
- [ ] Inline code comments are helpful and accurate

## Test Results Template

| Test Case | Pass/Fail | Notes | Tested By | Date |
|-----------|-----------|-------|-----------|------|
| TC1: Activation with Dependency | | | | |
| TC2: Activation without Dependency | | | | |
| TC3: Deactivation of Dependency | | | | |
| TC4: WP 6.5+ Header Recognition | | | | |
| TC5: Dependency Installation Flow | | | | |

## Known Limitations

1. The `Requires Plugins` header is only fully supported in WordPress 6.5+
2. Older WordPress versions will not show dependency warnings in the plugin interface
3. The runtime checks provide backward compatibility for older WordPress versions

## Rollback Plan

If issues are discovered:
1. Deactivate Fishing CPT Plugin
2. Revert to previous version via Git: `git revert HEAD`
3. Document the issue
4. Fix and retest before redeployment

## Success Criteria

The implementation is considered successful when:
- All test cases pass
- No PHP errors or warnings occur
- User experience is smooth and intuitive
- Documentation is clear and complete
- Code follows WordPress and LightSpeed coding standards
