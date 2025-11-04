# Plugin Dependency Management - Technical Implementation

## Overview
This document provides technical details about the Secure Custom Fields (SCF) / Advanced Custom Fields (ACF) dependency management implementation in the Fishing CPT Plugin.

## WordPress 6.5+ Plugin Dependencies API

### Header Declaration
WordPress 6.5 introduced native plugin dependency support through the `Requires Plugins` header field.

```php
/**
 * Plugin Name: Fishing CPT Plugin
 * Requires Plugins: advanced-custom-fields
 */
```

**Benefits:**
- WordPress core can detect and warn about missing dependencies
- Better user experience in the plugins admin interface
- Standardized way to declare plugin dependencies

**Slug Used:** `advanced-custom-fields`
- This is the official ACF plugin slug in the WordPress.org repository
- Compatible with both ACF and SCF (Secure Custom Fields)
- SCF is typically ACF-compatible or uses the same function names

## Runtime Dependency Checking

### Hook Priority Strategy
```php
add_action('plugins_loaded', 'fishing_cpt_check_dependencies', 5);
```

**Why Priority 5?**
- Runs early in the `plugins_loaded` hook
- Executes before other plugin initialization code
- Allows dependency check to complete before any functionality is loaded
- Prevents errors from missing functions/classes

### Detection Methods

The implementation uses multiple detection methods for maximum compatibility:

```php
if (! function_exists('acf') && ! function_exists('get_field') && ! class_exists('ACF'))
```

1. **`function_exists('acf')`** - Core ACF/SCF initialization function
2. **`function_exists('get_field')`** - Most commonly used ACF/SCF API function
3. **`class_exists('ACF')`** - Main ACF class check

**Logic:** All three checks must fail for the dependency to be considered missing. This provides:
- Compatibility with different ACF/SCF versions
- Tolerance for plugins that may load functions/classes in different orders
- Fallback detection if one method fails

## Graceful Deactivation

### Deactivation Process
```php
deactivate_plugins(plugin_basename(__FILE__));
```

**Implementation Details:**
- Uses WordPress core `deactivate_plugins()` function
- `plugin_basename(__FILE__)` provides the correct plugin path
- Automatically handles deactivation without user intervention
- Prevents partial plugin loading that could cause errors

### Admin Notice Display
```php
add_action('admin_notices', 'fishing_cpt_dependency_notice');
```

**User Experience Features:**
1. **Clear Error Identification**
   - Bold plugin name prefix for quick recognition
   - Explains which dependency is missing

2. **Actionable Guidance**
   - Provides direct link to plugin installation page
   - Uses `admin_url('plugin-install.php')` for correct URL

3. **Proper Internationalization**
   - All strings wrapped in `esc_html__()` for translation
   - Text domain: `fishing-cpt-plugin`
   - Translators comment for context

4. **Dismissible Notice**
   - Uses `is-dismissible` class for better UX
   - Users can dismiss if they acknowledge the error

### Activation Notice Suppression
```php
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if (isset($_GET['activate'])) {
    unset($_GET['activate']);
}
```

**Purpose:**
- Removes the default "Plugin activated" notice
- Prevents confusion (plugin is being deactivated, not activated)
- Provides clearer user feedback

**Security Note:**
- Only reads and unsets a GET parameter
- No form data processing
- No database modifications
- PHPCS ignore comments explain the safe usage

## Security Considerations

### Output Escaping
All output is properly escaped:
- `esc_html__()` - Escapes and translates text
- `esc_url()` - Sanitizes URLs
- `esc_html()` - Escapes HTML output

### No User Input Processing
- No form submissions
- No POST/GET data processing beyond checking existence
- No database queries based on user input

### Safe Function Usage
- `deactivate_plugins()` - WordPress core function, sanitizes internally
- `plugin_basename()` - Returns sanitized plugin path
- `admin_url()` - Returns properly formed admin URL

## Code Quality

### WordPress Coding Standards
✓ Function prefixes: `fishing_cpt_`
✓ Proper indentation (tabs)
✓ Braces on separate lines
✓ PHPDoc for all functions
✓ Proper hook usage

### PHPDoc Documentation
Each function includes:
- Description of purpose
- `@since` tag for version tracking
- `@return` type annotation
- Additional context in description

### Return Type Declarations
```php
function fishing_cpt_check_dependencies(): void
```

Uses PHP 7.4+ return type declarations for better type safety.

## Backward Compatibility

### WordPress < 6.5
- The `Requires Plugins` header is ignored (harmless)
- Runtime checks provide full functionality
- Users still get admin notices and graceful deactivation

### PHP 7.4+
- Return type declarations require PHP 7.4 minimum
- Aligns with plugin's stated PHP requirement
- Modern, type-safe code

## Testing Recommendations

### Unit Testing (Future Enhancement)
```php
// Pseudo-code for potential unit tests
test_dependency_detection_when_acf_present()
test_dependency_detection_when_acf_missing()
test_admin_notice_displayed()
test_plugin_deactivation()
```

### Integration Testing
See `DEPENDENCY_TEST_PLAN.md` for comprehensive test cases.

### Manual Testing Checklist
- [ ] Activate with ACF present → Success
- [ ] Activate without ACF → Graceful error
- [ ] Deactivate ACF while plugin active → Auto-deactivate
- [ ] Check admin notice appearance and links
- [ ] Verify no PHP errors in debug log

## Performance Impact

### Minimal Overhead
- Single hook on `plugins_loaded` (priority 5)
- Runs only once per page load
- Three simple function checks (cached by PHP)
- No database queries
- No external API calls

### Load Time Impact
- Negligible (~0.001 seconds)
- Executes before main plugin loading
- Prevents loading unnecessary code if dependency missing

## Future Enhancements

### Potential Improvements
1. **Version Checking**
   - Could check for minimum ACF/SCF version
   - Example: `version_compare(ACF_VERSION, '5.0.0', '>=')`

2. **Multiple Dependencies**
   - Could extend to check other dependencies
   - Array-based dependency configuration

3. **Soft Dependencies**
   - Distinguish between required and optional dependencies
   - Graceful degradation if optional dependency missing

4. **Dependency Installation Helper**
   - Direct link to install specific plugin
   - One-click dependency installation (if permissions allow)

## References

- [WordPress Plugin Dependencies API](https://make.wordpress.org/core/2024/03/05/introducing-plugin-dependencies-in-wordpress-6-5/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- [Plugin Header Requirements](https://developer.wordpress.org/plugins/plugin-basics/header-requirements/)
- [WordPress Hooks Reference](https://developer.wordpress.org/reference/hooks/plugins_loaded/)

## Changelog

### Version 1.0.1
- Added WordPress 6.5+ `Requires Plugins` header
- Implemented runtime dependency checking
- Added graceful deactivation on missing dependency
- Added user-friendly admin error notices
- Updated documentation with dependency requirements

---

**Author:** Brandon Marshall - LightSpeed WP  
**Date:** November 2025  
**License:** GPL-2.0-or-later
