# Section Style System Documentation

## Overview

The Section Style System provides a set of reusable block styles and patterns for creating consistent, accessible, and customizable section layouts throughout the LSX Demo Theme. This system is specifically designed to support fishing-related content sections with proper spacing, typography, and color schemes.

## Features

- **Three predefined section styles**: Hero, Gallery, and Archive Grid
- **Fishing-specific color palette**: River Blue, Burnt Orange, Olive Deep
- **Responsive design**: Mobile-first approach with fluid spacing
- **Accessibility compliant**: WCAG 2.2 AA contrast ratios
- **Customizable**: All styles support WordPress block customization

## Block Styles

### 1. Fishing Hero Section (`fishing-hero`)

**Applied to:** `core/group` block

**Use case:** Large hero/banner sections for introducing pages or highlighting key content.

**Styling:**
- Background: River Blue (#3A6B68)
- Text color: White (#FFFFFF)
- Padding: Extra large (64px top/bottom, 32px left/right)
- Typography: Lead font size

**Contrast ratio:** 6.03:1 (WCAG AA Pass)

**Pattern:** `section-style-hero.php`

### 2. Gallery Section (`fishing-gallery-section`)

**Applied to:** `core/group` block

**Use case:** Image galleries, photo collections, or visual content sections.

**Styling:**
- Background: Surface Brown (#3f290d)
- Text color: Body Text Light (#ebf2f4)
- Padding: Large (48px top/bottom, 24px left/right)
- Block gap: 32px

**Pattern:** `section-style-gallery.php`

### 3. Archive Grid Layout (`fishing-archive-grid`)

**Applied to:** `core/columns` block

**Use case:** Archive pages, blog post grids, fish species listings.

**Styling:**
- Block gap: 32px vertical, 24px horizontal
- Padding: Large (48px top/bottom)

**Pattern:** `section-style-archive.php`

## Color Palette

### New Fishing-Specific Colors

| Color Name | Hex Code | Slug | Usage | Contrast (on white) |
|------------|----------|------|-------|---------------------|
| River Blue | #3A6B68 | `river-blue` | Hero backgrounds | 6.03:1 ✓ |
| Burnt Orange | #E58F5C | `burnt-orange` | CTA buttons (use dark text) | 2.50:1 ✗ |
| Olive Deep | #6B7C3A | `olive-deep` | Accent sections | 4.60:1 ✓ |

### Accessibility Notes

- **River Blue** meets WCAG AA for all text sizes with white text
- **Burnt Orange** requires dark text (use Background Brown #231809) for contrast ratio of 6.98:1
- **Olive Deep** meets WCAG AA for all text sizes with white text

## Spacing System

The section styles leverage the existing spacing scale:

| Token | Size | Usage in Sections |
|-------|------|-------------------|
| `spacing-50` | 24px | Gallery padding, grid gaps |
| `spacing-60` | 32px | Hero padding (left/right), gallery block gaps |
| `spacing-70` | 48px | Archive padding |
| `spacing-85` | 48px | Gallery padding (top/bottom) |
| `spacing-95` | 64px | Hero padding (top/bottom) |

## Usage

### In the Block Editor

1. Add a Group or Columns block
2. In the block settings sidebar, find "Styles"
3. Select one of the fishing section styles:
   - Fishing Hero Section
   - Gallery Section
   - Archive Grid Layout

### In Code (Patterns)

```php
<!-- wp:group {"className":"is-style-fishing-hero"} -->
<div class="wp-block-group is-style-fishing-hero">
    <!-- Content here -->
</div>
<!-- /wp:group -->
```

### Programmatic Registration

Block styles are registered in `inc/block-styles.php`:

```php
register_block_style(
    'core/group',
    array(
        'name'  => 'fishing-hero',
        'label' => __( 'Fishing Hero Section', 'lsx-demo-theme' ),
    )
);
```

## Patterns

Three demonstration patterns are included:

### section-style-hero.php
- Full-width hero section with River Blue background
- Centered heading, paragraph, and button group
- Demonstrates proper use of Burnt Orange CTA with accessible contrast

### section-style-gallery.php
- Gallery section with 3-column image grid
- Surface Brown background with proper spacing
- Includes heading, description, and view all button

### section-style-archive.php
- 3-column archive grid layout
- Card-based design with borders and padding
- Demonstrates fish species display with Learn More links

## Customization

All section styles can be further customized using WordPress block settings:

- **Spacing**: Override padding/margins in block settings
- **Colors**: Change background and text colors
- **Typography**: Adjust font sizes, line heights
- **Layout**: Modify width settings (content, wide, full)

## Responsive Behavior

Section styles are mobile-first and responsive:

- **Desktop (>1200px)**: Full padding and spacing as defined
- **Tablet (768-1200px)**: Maintains padding, may reduce some spacing
- **Mobile (<768px)**: Reduced padding for better mobile experience

All typography uses fluid sizing where appropriate to scale smoothly across viewport sizes.

## Browser Support

Compatible with all modern browsers that support:
- CSS Custom Properties (CSS Variables)
- CSS Grid and Flexbox
- WordPress 6.8+

## File Structure

```
lsx-demo-theme/
├── inc/
│   └── block-styles.php         # Block style registrations
├── patterns/
│   ├── section-style-hero.php   # Hero section pattern
│   ├── section-style-gallery.php # Gallery section pattern
│   └── section-style-archive.php # Archive grid pattern
└── theme.json                    # Color palette and style variations
```

## Theme.json Configuration

Block variations are defined in `theme.json` under `styles.blocks`:

```json
{
  "styles": {
    "blocks": {
      "core/group": {
        "variations": {
          "fishing-hero": {
            "color": {
              "background": "var(--wp--preset--color--river-blue)",
              "text": "#ffffff"
            },
            "spacing": {
              "padding": {
                "top": "var(--wp--preset--spacing--spacing-95)",
                "bottom": "var(--wp--preset--spacing--spacing-95)"
              }
            }
          }
        }
      }
    }
  }
}
```

## Best Practices

1. **Use semantic HTML**: Patterns use proper heading hierarchy (h1-h3)
2. **Maintain contrast**: Always verify color combinations meet WCAG AA
3. **Test responsively**: Check layouts on mobile, tablet, and desktop
4. **Consistent spacing**: Use the predefined spacing tokens
5. **Translatable strings**: All text uses WordPress i18n functions

## Future Enhancements

Potential additions to the section style system:

- Additional color variations for each style
- Testimonial section style
- Call-to-action banner style
- Statistics/metrics section style
- Video hero section variation

## Support

For issues, questions, or feature requests related to the Section Style System:

- Review the WordPress Block Editor Handbook
- Check the LSX Demo Theme documentation
- Review the Fishing CPT Plugin integration docs

## Changelog

### Version 1.0.0
- Initial release of Section Style System
- Added three block styles: fishing-hero, fishing-gallery-section, fishing-archive-grid
- Added three fishing-specific colors to theme palette
- Created three demonstration patterns
- Full WCAG 2.2 AA accessibility compliance
