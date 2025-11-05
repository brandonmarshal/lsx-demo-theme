# Custom Gutenberg Blocks for Repeatable Fields

## Overview

This implementation adds custom Gutenberg blocks for displaying repeatable field data from Secure Custom Fields (SCF/ACF) in the Fishing CPT Plugin. All blocks include full WordPress block supports for customization.

## Available Blocks

### 1. Fish Quick Facts (`fishing/fish-facts`)

**Purpose:** Display fish quick facts from the `fish_quick_facts` repeater field.

**Usage:** Add this block to any Fish post template or content area.

**Display Styles:**
- **List** (Default) - Definition list format with label-value pairs
- **Table** - Two-column table with headers
- **Cards** - Grid of cards with each fact in its own card

**Block Supports:**
- Color (background, text, link)
- Typography (fontSize, lineHeight)
- Spacing (margin, padding, blockGap)
- Border (radius, width, style, color)
- Alignment (wide, full)
- Anchor links

**Inspector Controls:**
- Display Style selector (List/Table/Cards)

**Example Usage:**
```html
<!-- wp:fishing/fish-facts {"displayStyle":"table","style":{"spacing":{"padding":"1rem"}}} /-->
```

### 2. Gear Specifications (`fishing/gear-specs`)

**Purpose:** Display gear specifications from the `gear_specs` repeater field.

**Usage:** Add this block to any Gear post template or content area.

**Display Styles:**
- **Table** (Default) - Two-column table with specification name and value
- **List** - Definition list format
- **Cards** - Grid of cards showing each specification

**Block Supports:**
- Color (background, text, link)
- Typography (fontSize, lineHeight)
- Spacing (margin, padding, blockGap)
- Border (radius, width, style, color)
- Alignment (wide, full)
- Anchor links

**Inspector Controls:**
- Display Style selector (Table/List/Cards)

**Example Usage:**
```html
<!-- wp:fishing/gear-specs {"displayStyle":"cards","backgroundColor":"light-gray"} /-->
```

### 3. Fish Card (`fishing/fish-card`)

**Purpose:** Display basic fish meta data (water type, average size, bait type).

**Enhanced with:**
- Full block supports for color, typography, spacing, border
- Category changed to "fishing"
- Improved accessibility

### 4. Gear Card (`fishing/gear-card`)

**Purpose:** Display basic gear meta data (brand, type, price).

**Enhanced with:**
- Full block supports for color, typography, spacing, border
- Category changed to "fishing"
- Improved accessibility

### 5. Area Card (`fishing/area-card`)

**Purpose:** Display fishing area information.

**Enhanced with:**
- Full block supports for color, typography, spacing, border
- Category changed to "fishing"
- Improved accessibility

### 6. Repeatable Facts (Legacy) (`fishing/repeatable-facts`)

**Purpose:** Legacy block for backward compatibility.

**Note:** This block is maintained for backward compatibility. New implementations should use the `fishing/fish-facts` block instead.

## Block Category

All blocks are now registered under the **"fishing"** category in the block inserter for easier discovery.

## Technical Implementation

### Registration

Blocks are registered from the `build/blocks/` directory using `block.json` configuration:

```php
function register_blocks()
{
    $blocks_dir = FISHING_CPT_PLUGIN_DIR . 'build/blocks/';
    
    $blocks = [
        'fish-card',
        'gear-card',
        'area-card',
        'repeatable-facts',
        'fish-facts',
        'gear-specs',
    ];
    
    foreach ($blocks as $block_name) {
        $block_path = $blocks_dir . $block_name;
        if (file_exists($block_path)) {
            register_block_type($block_path);
        }
    }
}
```

### Build Process

The blocks are built using `@wordpress/scripts`:

```bash
cd fishing-cpt-plugin
npm run build
```

This compiles:
- JavaScript (React components)
- CSS (editor and frontend styles)
- Copies `block.json` and `render.php` files to build directory

### Webpack Configuration

Custom webpack config includes CopyPlugin to ensure metadata files are included in build:

```javascript
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
    plugins: [
        new CopyPlugin({
            patterns: [
                { from: 'blocks/*/block.json', to: '[path][name][ext]' },
                { from: 'blocks/*/render.php', to: '[path][name][ext]' },
            ],
        }),
    ],
};
```

## Frontend Rendering

### Fish Quick Facts Rendering

The `render.php` file handles three display styles:

**List Display:**
```html
<dl class="fishing-fish-facts__list">
    <dt class="fishing-fish-facts__label">Scientific Name</dt>
    <dd class="fishing-fish-facts__value">Salmo trutta</dd>
    <!-- ... more facts ... -->
</dl>
```

**Table Display:**
```html
<table class="fishing-fish-facts__table">
    <thead>
        <tr>
            <th>Fact</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Scientific Name</strong></td>
            <td>Salmo trutta</td>
        </tr>
        <!-- ... more rows ... -->
    </tbody>
</table>
```

**Cards Display:**
```html
<div class="fishing-fish-facts__cards">
    <div class="fishing-fish-facts__card">
        <h4>Scientific Name</h4>
        <div>Salmo trutta</div>
    </div>
    <!-- ... more cards ... -->
</div>
```

### Gear Specifications Rendering

Similar to Fish Facts, with appropriate field mapping:
- `spec_name` → Specification name
- `spec_value` → Value
- `spec_unit` → Optional unit (appended to value)

## Styling

### Responsive Design

All blocks include mobile-first responsive CSS:

```css
/* Desktop: Grid layout for cards */
.fishing-fish-facts__cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 1rem;
}

/* Mobile: Single column for list display */
@media (max-width: 768px) {
    .fishing-fish-facts__list {
        grid-template-columns: 1fr;
    }
}
```

### Accessibility

- Semantic HTML elements (`<dl>`, `<table>`, `<h4>`)
- ARIA labels on interactive elements
- Proper heading hierarchy
- High contrast text
- Keyboard navigation support
- Screen reader friendly markup

## Customization Examples

### Custom Colors and Spacing

```html
<!-- wp:fishing/fish-facts {
    "displayStyle":"cards",
    "style":{
        "spacing":{"padding":"2rem"},
        "color":{"background":"#f0f0f0","text":"#333"}
    }
} /-->
```

### Custom Typography

```html
<!-- wp:fishing/gear-specs {
    "displayStyle":"table",
    "style":{
        "typography":{"fontSize":"1.1rem","lineHeight":"1.6"}
    }
} /-->
```

### Custom Border

```html
<!-- wp:fishing/fish-facts {
    "style":{
        "border":{"radius":"8px","width":"2px","style":"solid","color":"#007cba"}
    }
} /-->
```

## ACF/SCF Field Structure

### Fish Quick Facts

Field Group: `group_fish_quick_facts`
Field Name: `fish_quick_facts`
Type: Repeater

Sub-fields:
- `fact_label` (text, required) - e.g., "Scientific Name", "Habitat"
- `fact_value` (textarea, required) - The fact details

### Gear Specifications

Field Group: `group_gear_specifications`
Field Name: `gear_specs`
Type: Repeater

Sub-fields:
- `spec_name` (text, required) - e.g., "Length", "Weight"
- `spec_value` (text, required) - The specification value
- `spec_unit` (select, optional) - Unit of measurement (mm, cm, m, ft, in, g, kg, lbs, oz)

## Testing Checklist

### Block Editor Testing

- [ ] Blocks appear in "fishing" category
- [ ] Inspector controls work correctly
- [ ] Display style changes preview properly
- [ ] Block supports (color, typography, spacing, border) function correctly
- [ ] Blocks can be added to Fish/Gear posts
- [ ] Warning messages show when blocks used in wrong post type

### Frontend Testing

- [ ] Fish Quick Facts display correctly with actual data
- [ ] Gear Specifications display correctly with actual data
- [ ] All three display styles (table, list, cards) render properly
- [ ] Responsive design works on mobile devices
- [ ] Empty state messages display when no data exists
- [ ] ACF/SCF dependency check works correctly

### Accessibility Testing

- [ ] Screen reader navigation works correctly
- [ ] Keyboard navigation functions properly
- [ ] Color contrast meets WCAG 2.2 AA standards
- [ ] Semantic HTML structure is correct
- [ ] ARIA labels are present and accurate

## Troubleshooting

### Blocks Not Appearing in Editor

1. Verify ACF/SCF is installed and activated
2. Check that blocks are built: `npm run build` in plugin directory
3. Verify `build/blocks/` directory contains all block files
4. Check browser console for JavaScript errors

### No Data Displaying on Frontend

1. Verify ACF fields are configured correctly
2. Check that repeater data exists for the post
3. Verify field names match: `fish_quick_facts` and `gear_specs`
4. Check browser console for PHP errors

### Styling Issues

1. Clear browser cache
2. Verify CSS files are enqueued correctly
3. Check for theme CSS conflicts
4. Test with Twenty Twenty-Four theme

## Browser Support

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile browsers (iOS Safari, Chrome Mobile)
- WordPress 6.8+ Block Editor

## Performance Considerations

- CSS and JavaScript files are loaded only in block editor
- Frontend CSS is optimized and minimal (~2KB per block)
- No JavaScript dependencies on frontend
- Efficient rendering with minimal DOM manipulation

## Future Enhancements

Potential improvements for future versions:

1. **Block Variations**
   - Pre-configured style variations for common use cases
   - One-click templates for different fact types

2. **Advanced Filters**
   - Filter facts by category or type
   - Show/hide specific facts based on criteria

3. **Data Visualization**
   - Charts and graphs for numeric specifications
   - Visual comparison tools

4. **Import/Export**
   - Import facts from CSV
   - Export to various formats

5. **Block Patterns**
   - Pre-designed patterns combining multiple blocks
   - Templates for common fish/gear page layouts

## Support

For issues or questions:
1. Check this documentation
2. Review WordPress Block Editor documentation
3. Check ACF/SCF documentation
4. Open an issue in the repository

## License

GPL-2.0-or-later - Same as WordPress
