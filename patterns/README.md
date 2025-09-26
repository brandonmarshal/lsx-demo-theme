# Block Patterns Documentation

This directory contains all WordPress block patterns for the LSX Demo Theme, including specialized patterns for the Fish Custom Post Type (CPT).

## Pattern Organization

Patterns are organized by functionality and content type:

### Fish CPT Patterns

Specialized patterns for the Fish Custom Post Type following WordPress and LightSpeed guidelines:

- **hero-fish.php** - Hero section with fish image, species name, and CTAs
- **facts-box-fish.php** - Key statistics and information in a grid layout
- **gallery-fish.php** - Responsive image gallery with captions
- **related-fish.php** - Query block for displaying related fish species

### General Patterns

All other patterns for various page types, components, and layouts.

## Pattern Header Specification

All patterns must include a complete PHP header block with the following required fields:

```php
<?php
/**
 * Title: [Human-readable pattern name]
 * Slug: lsx-demo-theme/[pattern-slug]
 * Categories: [comma-separated categories]
 * Keywords: [comma-separated keywords for search]
 * Viewport width: [recommended viewport width for preview]
 * Description: [Detailed description of pattern purpose and usage]
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */
?>
```

### Required Header Fields

1. **Title**: Descriptive name shown in the block inserter
2. **Slug**: Unique identifier following `lsx-demo-theme/pattern-name` convention
3. **Categories**: Pattern categories (register new ones in functions.php if needed)
4. **Keywords**: Search terms for pattern discovery
5. **Viewport width**: Optimal preview width (typically 1400px)
6. **Description**: Clear explanation of pattern purpose and usage

### Optional Header Fields

- **Block Types**: Specific block contexts where pattern appears
- **Post Types**: Limit pattern to specific post types
- **Template Types**: Associate with specific templates
- **Inserter**: Set to "no" to hide from inserter (template patterns only)

## Pattern Development Guidelines

### Content Strategy

- Use realistic placeholder content, not lorem ipsum
- Include meaningful example text that demonstrates the pattern's purpose
- Provide proper context for editors customizing the pattern
- Consider different content scenarios and edge cases

### Accessibility Requirements

- Maintain proper heading hierarchy (h1, h2, h3, etc.)
- Include descriptive alt text for all images using `esc_attr_x()`
- Ensure sufficient color contrast for all text elements
- Use semantic HTML structure with appropriate landmarks
- Test with screen readers and keyboard navigation

### Internationalization (i18n)

All user-facing strings must be translatable using LSX Demo Theme text domain:

```php
<?php echo esc_html_x( 'Display text', 'Context for translators', 'lsx-demo-theme' ); ?>
<?php esc_html_e( 'Display text', 'lsx-demo-theme' ); ?>
<?php echo esc_attr_x( 'Attribute value', 'Context for translators', 'lsx-demo-theme' ); ?>
```

### Styling Guidelines

- **NO inline CSS** - Use only theme.json design tokens
- Reference colors via `var:preset|color|color-slug`
- Use spacing tokens: `var:preset|spacing|size-slug`
- Apply typography tokens: `var:preset|font-size|size-slug`
- Leverage theme font families: `var:preset|font-family|font-slug`

### Image Handling

Use `get_theme_file_uri()` for all image references:

```php
<?php echo esc_url( get_theme_file_uri( '/assets/images/image-name.webp' ) ); ?>
```

### Performance Considerations

- Keep markup clean and minimal
- Avoid unnecessary block nesting
- Use appropriate image sizes and formats
- Test rendering performance across devices
- Consider impact on Core Web Vitals

## Fish CPT Pattern Details

### Hero Fish Pattern
- Full-width cover block with species image
- Species name as H1 with scientific name
- Descriptive text and dual CTAs
- Responsive design with mobile optimization

### Facts Box Pattern  
- Grid layout displaying key fish statistics
- Conservation status and habitat information
- Color-coded sections using theme accent colors
- Responsive columns that stack on mobile

### Gallery Pattern
- 3-column responsive grid layout
- Proper image linking and captions
- Accessibility-focused alt text
- Photography tips section

### Related Fish Pattern
- Query block for Fish CPT posts
- Card-based layout with featured images
- Taxonomy display and read more links
- No results state handling

## Usage in Templates

Patterns can be referenced in HTML templates using:

```html
<!-- wp:pattern {"slug":"lsx-demo-theme/pattern-name"} /-->
```

This is particularly useful for template patterns and reusable components.

## Testing Checklist

Before finalizing any pattern:

- [ ] Pattern appears correctly in block inserter
- [ ] All images load with proper alt text
- [ ] Responsive design works across viewport sizes
- [ ] Color contrast meets WCAG AA standards
- [ ] Text is properly internationalized
- [ ] No inline CSS is used
- [ ] Theme.json tokens are used exclusively
- [ ] PHP header is complete and accurate
- [ ] Pattern works in different contexts (pages, posts, templates)

## Maintenance

- Update patterns when theme.json tokens change
- Test patterns with WordPress updates
- Maintain consistency across pattern designs
- Document any breaking changes in CHANGELOG.md
- Review patterns for accessibility improvements

## Resources

- [WordPress Block Pattern Documentation](https://developer.wordpress.org/themes/patterns/)
- [Block Pattern Development Instructions](.github/instructions/pattern-development.instructions.md)
- [LightSpeed WordPress Guidelines](.github/instructions/wordpress.instructions.md)
- [Theme.json Configuration](.github/instructions/theme-json.instructions.md)