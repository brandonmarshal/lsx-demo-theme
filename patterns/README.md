# Block Patterns Directory

This directory contains WordPress block patterns for the LSX Demo Theme, following LightSpeed and WordPress development standards.

## Pattern Categories

### Fish Patterns (`lsx_demo_theme_fish`)

A collection of patterns specifically designed for fish species and fishing content:

- **Fish Hero Section** (`fish-hero.php`) - Hero section with full-width image, species name, description, and CTA
- **Fish Facts Box** (`fish-facts-box.php`) - Grid layout displaying key species information (size, habitat, bait, season)
- **Fish Gallery** (`fish-gallery.php`) - Responsive image gallery showcasing multiple fish species
- **Related Fish Species** (`fish-related.php`) - Query block displaying related fish posts with featured images

### Section Style Patterns

Demonstration patterns for the Section Style System with fishing-specific layouts:

- **Section Style - Hero** (`section-style-hero.php`) - Hero section with River Blue background, large padding, and centered content
- **Section Style - Gallery** (`section-style-gallery.php`) - Gallery section with Surface Brown background and consistent spacing
- **Section Style - Archive Grid** (`section-style-archive.php`) - Three-column archive grid for fish species or blog posts

See [Section Style System Documentation](../docs/SECTION_STYLE_SYSTEM.md) for detailed usage and customization options.

## Pattern Header Specification

All patterns must include a complete PHP header block with the following required fields:

```php
<?php
/**
 * Title: Pattern Display Name
 * Slug: lsx-demo-theme/pattern-slug
 * Categories: category1, category2
 * Keywords: keyword1, keyword2, keyword3
 * Description: Brief description of the pattern's purpose and content.
 * Viewport width: 1400
 *
 * @package WordPress
 * @subpackage LSX_Demo_Theme
 * @since lsx-demo-theme 1.0
 */
?>
```

### Header Field Guidelines

- **Title**: Human-readable name displayed in the pattern inserter
- **Slug**: Unique identifier with theme prefix (`lsx-demo-theme/`)
- **Categories**: One or more pattern categories (use custom `lsx_demo_theme_` categories when appropriate)
- **Keywords**: Searchable terms for pattern discovery (3-5 relevant keywords)
- **Description**: Clear explanation of pattern purpose and content (1-2 sentences)
- **Viewport width**: Recommended width for pattern preview (typically 1400px)

### Optional Header Fields

- **Block Types**: Restrict pattern to specific block contexts (e.g., `core/post-content`)
- **Post Types**: Limit pattern availability to specific post types
- **Template Types**: Associate with specific template types
- **Inserter**: Set to `no` to hide from inserter (template patterns only)

## Development Standards

### Internationalization (i18n)

All user-facing strings must use proper translation functions:

```php
// For simple text
<?php esc_html_e( 'Text string', 'lsx-demo-theme' ); ?>

// For text with context
<?php echo esc_html_x( 'Text string', 'Context for translators', 'lsx-demo-theme' ); ?>

// For HTML content (use with caution)
<?php echo wp_kses_post( _x( 'HTML content', 'Context', 'lsx-demo-theme' ) ); ?>
```

### Theme Integration

- Use `get_theme_file_uri()` for image references instead of hardcoded paths
- Reference theme.json design tokens via CSS custom properties
- Follow `var:preset|type|slug` format for spacing, colors, and typography
- No inline CSS - all styling must use theme.json tokens

### Accessibility Requirements

- Maintain proper heading hierarchy (h1 → h2 → h3)
- Provide meaningful alt text for all images using translation functions
- Use semantic HTML elements and proper ARIA labels where needed
- Ensure sufficient color contrast and keyboard navigation support

### Content Guidelines

- Use realistic placeholder content instead of lorem ipsum
- Provide contextual examples relevant to the pattern's purpose
- Keep content length appropriate for the pattern's design
- Include helpful comments for complex pattern sections

## Pattern Testing

Before committing new patterns:

1. **Editor Testing**: Verify pattern appears correctly in the block inserter
2. **Frontend Rendering**: Confirm pattern displays properly on the frontend
3. **Responsive Design**: Test across different viewport sizes
4. **Accessibility**: Validate heading structure, alt text, and keyboard navigation
5. **Translation**: Ensure all strings are properly internationalized

## Future Enhancements

Patterns planned for future releases:

- Fish comparison tables
- Fishing trip planning layouts
- Species identification guides
- Equipment recommendation sections
- Location-based fishing patterns

## Contributing

When adding new patterns:

1. Follow the established naming convention (`fish-*`, `event-*`, etc.)
2. Include complete header documentation
3. Test thoroughly across different contexts
4. Update this README with new pattern descriptions
5. Ensure patterns work independently and don't require specific plugins

For questions or suggestions, refer to the LightSpeed WordPress development guidelines or create an issue in the project repository.