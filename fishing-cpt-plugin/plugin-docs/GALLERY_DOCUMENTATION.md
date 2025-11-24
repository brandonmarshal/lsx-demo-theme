# Fishing Gallery Block - Implementation Guide

## Overview

The Fishing Gallery block provides a complete image gallery solution for Fish, Gear, and Area custom post types. It includes ACF/SCF field integration, a responsive grid layout, and an accessible lightbox with keyboard and touch navigation.

## Features

### Gallery Field
- **Field Type**: ACF/SCF Gallery
- **Field Name**: `fishing_gallery`
- **Post Types**: Fish, Gear, Area
- **Max Images**: 50
- **Supported Formats**: jpg, jpeg, png, gif, webp

### Block Features
- **Columns**: Customizable 1-6 column grid layout
- **Image Sizes**: Thumbnail, Medium, Large, Full
- **Lightbox**: Optional overlay with image zoom
- **Captions**: Toggle image caption display
- **Responsive**: Mobile-first design with touch support
- **Performance**: Lazy loading enabled
- **Accessibility**: Full WCAG 2.2 AA compliance

### Lightbox Features
- Modal dialog with overlay
- Keyboard navigation (Arrow keys, Escape, Home, End)
- Touch/swipe support for mobile
- Previous/Next navigation buttons
- Image counter (current/total)
- Focus trap for accessibility
- ARIA labels and announcements
- Reduced motion support

## Installation

1. **Add Gallery Field**
   The gallery field is automatically registered when the plugin is activated. No manual configuration needed.

2. **Build Blocks**
   ```bash
   cd fishing-cpt-plugin
   npm install
   npm run build
   ```

3. **Activate Plugin**
   Ensure the Fishing CPT Plugin is active in WordPress.

## Usage

### Adding Images

1. Edit a Fish, Gear, or Area post
2. Scroll to the "Fishing Gallery" meta box
3. Click "Add to gallery" to select images from the media library
4. Arrange images by drag and drop
5. Save the post

### Inserting the Block

1. In the block editor, add a new block
2. Search for "Fishing Gallery" or navigate to the Fishing category
3. Insert the block
4. Customize settings in the Inspector panel:
   - **Columns**: Set number of columns (1-6)
   - **Image Size**: Choose display size
   - **Enable Lightbox**: Toggle lightbox functionality
   - **Show Captions**: Toggle caption display

### Block Settings

#### Columns (Default: 3)
Controls the number of columns in the gallery grid. Automatically adjusts for mobile devices:
- Desktop: 1-6 columns as selected
- Tablet: Max 2 columns for 4+ column layouts
- Mobile: Single column for all layouts

#### Image Size (Default: large)
Choose which image size to display:
- **Thumbnail**: Fastest loading, lowest quality
- **Medium**: Good balance of size and quality
- **Large**: High quality, recommended default
- **Full**: Original size, largest file size

#### Enable Lightbox (Default: true)
When enabled, clicking images opens them in a full-screen lightbox overlay with navigation controls.

#### Show Captions (Default: true)
When enabled, displays image captions from the media library below each image.

## Keyboard Navigation

### In Lightbox
- **Left Arrow**: Previous image
- **Right Arrow**: Next image
- **Escape**: Close lightbox
- **Home**: Jump to first image
- **End**: Jump to last image
- **Tab**: Navigate between controls

### Focus Management
- Focus moves to Close button when lightbox opens
- Focus is trapped within lightbox while open
- Focus returns to trigger element on close

## Mobile Support

### Touch Gestures
- **Tap**: Open image in lightbox
- **Swipe Left**: Next image
- **Swipe Right**: Previous image
- **Tap Overlay**: Close lightbox

### Responsive Behavior
- Columns automatically adjust for smaller screens
- Touch targets meet minimum 44px size
- Lightbox controls sized for touch interaction
- Optimized for portrait and landscape orientations

## Accessibility

### WCAG 2.2 AA Compliance
- ✅ Proper ARIA roles and labels
- ✅ Keyboard navigation support
- ✅ Focus management and trap
- ✅ Screen reader announcements
- ✅ Sufficient color contrast
- ✅ Touch target sizing
- ✅ Reduced motion support

### Screen Reader Support
- Gallery announces image count
- Lightbox identified as modal dialog
- Navigation controls clearly labeled
- Current image position announced
- Caption content read when present

### Reduced Motion
Users who prefer reduced motion will experience:
- No transition animations
- Instant lightbox open/close
- Static hover effects

## Customization

### CSS Variables
The gallery respects WordPress color presets:
```css
--wp--preset--color--primary
--wp--preset--color--contrast
--wp--preset--color--base
```

### Custom Styles
Add custom styles in your theme:
```css
.fishing-gallery {
    /* Gallery container */
}

.fishing-gallery__grid {
    /* Grid layout */
}

.fishing-gallery__item {
    /* Individual items */
}

.fishing-gallery-lightbox {
    /* Lightbox overlay */
}
```

### Block Supports
The block includes standard WordPress block supports:
- Color (background, text)
- Spacing (margin, padding, blockGap)
- Border (radius)
- Alignment (wide, full)

## Performance

### Optimization Features
- Lazy loading enabled by default
- Responsive image srcset
- Conditional asset loading (only when block is present)
- Minified CSS and JavaScript in production

### Loading Strategy
1. Gallery CSS loaded with block
2. Lightbox JavaScript loaded only when lightbox is enabled
3. Images loaded with native lazy loading
4. Large images loaded only in lightbox

## Troubleshooting

### Gallery Not Appearing
1. Check that ACF/SCF plugin is active
2. Verify images are added to the gallery field
3. Confirm post type is Fish, Gear, or Area
4. Check browser console for JavaScript errors

### Lightbox Not Working
1. Verify lightbox is enabled in block settings
2. Check that `fishing-gallery-lightbox.js` is enqueued
3. Look for JavaScript errors in console
4. Confirm `data-lightbox="true"` attribute is present

### Images Not Loading
1. Check that image files exist in media library
2. Verify selected image size is generated
3. Review image permissions
4. Check for broken media library links

### Styling Issues
1. Clear WordPress and browser caches
2. Rebuild blocks: `npm run build`
3. Check for CSS conflicts with theme
4. Verify block supports are not overridden

## Development

### File Structure
```
fishing-cpt-plugin/
├── blocks/
│   └── fishing-gallery/
│       ├── block.json          # Block configuration
│       ├── index.js            # Editor component
│       ├── render.php          # Frontend template
│       ├── style.css           # Frontend styles
│       └── editor.css          # Editor styles
├── includes/
│   ├── gallery-fields.php      # ACF field registration
│   └── gallery-enqueue.php     # Asset enqueue
└── assets/
    └── js/
        └── fishing-gallery-lightbox.js  # Lightbox functionality
```

### Build Process
```bash
# Development watch mode
npm run dev

# Production build
npm run build
```

### Testing Checklist
- [ ] Gallery field appears in admin
- [ ] Images can be added/removed
- [ ] Block inserts without errors
- [ ] Grid displays correctly at different column counts
- [ ] Images load with correct size
- [ ] Lightbox opens on click
- [ ] Keyboard navigation works
- [ ] Touch gestures work on mobile
- [ ] Captions display when enabled
- [ ] Focus trap works in lightbox
- [ ] Screen reader announces properly
- [ ] Reduced motion respected

## Browser Support

### Tested Browsers
- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Mobile Safari (iOS 14+)
- Chrome Mobile (Android 10+)

### Required Features
- CSS Grid Layout
- CSS Custom Properties
- ES6 JavaScript
- Touch Events API
- Intersection Observer (for lazy loading)

## License

GPL-2.0-or-later - Same as WordPress

## Support

For issues or questions:
1. Check this documentation
2. Review plugin CHANGELOG.md
3. Check BLOCKS_DOCUMENTATION.md
4. Open issue on GitHub repository

## Credits

Developed by Brandon Marshall - LightSpeed WP
Following WordPress and LightSpeed coding standards
Built with accessibility and performance in mind
