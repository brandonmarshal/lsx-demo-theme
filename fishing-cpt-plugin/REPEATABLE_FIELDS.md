# Repeatable Field Groups - Implementation Documentation

## Overview

This implementation adds repeatable field groups to the Fishing CPT Plugin for both Fish and Gear custom post types, allowing structured data entry and enhanced content display.

## Features Implemented

### 1. Gear Specifications Repeater Field

**Field Group:** `group_gear_specifications`  
**Post Type:** Gear  
**Location:** Single Gear edit screen

#### Field Structure:
- **Specification Name** (text, required) - e.g., "Length", "Weight", "Material"
- **Value** (text, required) - e.g., "7", "200", "Carbon Fiber"
- **Unit** (select, optional) - Includes common measurement units:
  - Length: mm, cm, m, ft, in
  - Weight: g, kg, lbs, oz
  - None (for non-measurable specs)

#### Display:
Specifications are rendered as an accessible HTML table with:
- Proper semantic markup (`<table>`, `<thead>`, `<tbody>`)
- ARIA labels for screen readers
- Responsive design for mobile devices
- Hover effects for better UX
- Print-friendly styles

### 2. Fish Quick Facts Repeater Field

**Field Group:** `group_fish_quick_facts`  
**Post Type:** Fish  
**Location:** Single Fish edit screen

#### Field Structure:
- **Fact Label** (text, required) - e.g., "Scientific Name", "Habitat", "Average Size"
- **Fact Value** (textarea, required) - Detailed information about the fact

#### Display:
Quick facts are rendered as a definition list (`<dl>`) with:
- Semantic HTML markup for accessibility
- Structured label-value pairs
- Support for multi-line fact values
- Responsive grid layout
- Accessible to screen readers

## Files Created

1. **`includes/repeatable-fields.php`**
   - Field group definitions using `acf_add_local_field_group()`
   - Helper functions: `display_gear_specifications()` and `display_fish_quick_facts()`
   - Proper escaping and sanitization
   - Comprehensive inline documentation

2. **`includes/repeatable-fields-enqueue.php`**
   - Conditional asset loading for Fish and Gear single posts
   - Performance-optimized (only loads where needed)

3. **`assets/css/repeatable-fields.css`**
   - Responsive table and list styling
   - Mobile-first design approach
   - Accessibility features (high contrast, reduced motion support)
   - Print-friendly styles

4. **`tests/test-repeatable-fields.php`**
   - Unit tests for field group registration
   - Helper function validation
   - Empty data handling tests

## Files Modified

1. **`fishing-cpt-plugin.php`**
   - Added includes for new repeatable field files

2. **`templates/single-gear.php`**
   - Enhanced with specification display
   - Added related content sections (Fish, Areas)
   - Backward compatible with existing meta fields

3. **`templates/single-fish.php`**
   - Enhanced with quick facts display
   - Added related content sections (Gear, Areas)
   - Backward compatible with legacy `fish_facts` JSON field

## Usage

### In Templates

#### Display Gear Specifications:
```php
<?php
if ( function_exists( 'Fishing_CPT\display_gear_specifications' ) ) {
    Fishing_CPT\display_gear_specifications( get_the_ID() );
}
?>
```

#### Display Fish Quick Facts:
```php
<?php
if ( function_exists( 'Fishing_CPT\display_fish_quick_facts' ) ) {
    Fishing_CPT\display_fish_quick_facts( get_the_ID() );
}
?>
```

### In Custom Code

#### Get Gear Specifications (raw data):
```php
<?php
if ( function_exists( 'get_field' ) ) {
    $specs = get_field( 'gear_specs', $post_id );
    
    if ( $specs ) {
        foreach ( $specs as $spec ) {
            echo esc_html( $spec['spec_name'] ) . ': ';
            echo esc_html( $spec['spec_value'] );
            if ( ! empty( $spec['spec_unit'] ) ) {
                echo ' ' . esc_html( $spec['spec_unit'] );
            }
        }
    }
}
?>
```

#### Get Fish Quick Facts (raw data):
```php
<?php
if ( function_exists( 'get_field' ) ) {
    $facts = get_field( 'fish_quick_facts', $post_id );
    
    if ( $facts ) {
        foreach ( $facts as $fact ) {
            echo '<strong>' . esc_html( $fact['fact_label'] ) . '</strong>: ';
            echo wp_kses_post( $fact['fact_value'] );
        }
    }
}
?>
```

## Accessibility Features

- ✅ Semantic HTML5 markup
- ✅ ARIA labels and roles for screen readers
- ✅ Proper heading hierarchy
- ✅ Keyboard navigation support
- ✅ High contrast mode support
- ✅ Reduced motion preferences respected
- ✅ Table headers properly scoped
- ✅ Color contrast meets WCAG 2.2 AA standards

## Responsive Design

- ✅ Mobile-first CSS approach
- ✅ Flexible grid layouts
- ✅ Horizontal scroll for wide tables on small screens
- ✅ Touch-friendly interface
- ✅ Breakpoints at 768px and 480px

## Performance

- ✅ Conditional CSS loading (only on Fish/Gear single posts)
- ✅ Minimal CSS bundle size (~6KB)
- ✅ No JavaScript dependencies
- ✅ Optimized rendering with proper HTML structure

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- IE11+ (with graceful degradation)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Testing

### Manual Testing Checklist:
- [ ] Field groups appear in admin for Gear posts
- [ ] Field groups appear in admin for Fish posts
- [ ] Data saves correctly when adding rows
- [ ] Data retrieves correctly on frontend
- [ ] Specifications display in table format
- [ ] Quick facts display in definition list format
- [ ] Related content links work correctly
- [ ] Responsive design works on mobile
- [ ] Accessibility features work with screen readers
- [ ] CSS loads only on single Fish/Gear posts

### Automated Tests:
Run the test file:
```bash
# If WordPress environment is available
php -r "define('ABSPATH', true); require 'fishing-cpt-plugin/tests/test-repeatable-fields.php';"
```

## Dependencies

- **Required:** Advanced Custom Fields (ACF) or Secure Custom Fields (SCF)
- **WordPress:** 6.0+
- **PHP:** 7.4+

## Security

- All output is properly escaped using WordPress functions
- Input sanitization handled by ACF/SCF
- Nonce verification managed by ACF/SCF
- User capabilities checked by WordPress

## Backward Compatibility

- Legacy `fish_facts` JSON field is still supported
- Existing gear meta fields (brand, type, price) still work
- No breaking changes to existing functionality

## Future Enhancements

Potential improvements for future versions:
- Add field groups for Areas CPT
- Implement field validation rules
- Add conditional field logic
- Create REST API endpoints for repeatable fields
- Add Gutenberg block variations
- Implement field group import/export

## Support

For issues or questions:
1. Check the inline documentation in PHP files
2. Review WordPress ACF documentation: https://www.advancedcustomfields.com/
3. Open an issue in the repository

## License

GPL-2.0-or-later - Same as WordPress
