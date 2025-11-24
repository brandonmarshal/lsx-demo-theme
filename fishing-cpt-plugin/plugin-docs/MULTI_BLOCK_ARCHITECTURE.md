# Multi-Block Plugin Architecture

## Overview

The Fishing CPT Plugin is structured as a **multi-block plugin** following WordPress.org best practices. This architecture allows for efficient management of multiple Gutenberg blocks within a single plugin, with shared dependencies and optimized builds.

## Architecture Benefits

### Centralized Management
- Single plugin manages all fishing-related blocks
- Shared dependencies reduce bundle size
- Consistent coding standards across all blocks
- Single activation/deactivation point

### Efficient Build Process
- One build command compiles all blocks
- Shared webpack configuration
- Optimized asset loading with wp-scripts
- Automatic dependency management

### WordPress.org Compliance
- Follows official WordPress block development guidelines
- Uses standard block.json format
- Compatible with plugin repository requirements
- Proper text domain and internationalization

## Plugin Structure

```
/fishing-cpt-plugin/
├── fishing-cpt-plugin.php          # Main plugin file with headers
├── includes/
│   ├── blocks.php                  # Centralized block registration
│   ├── capabilities.php            # User capabilities
│   ├── meta-fields.php            # Custom post meta
│   ├── patterns.php               # Block patterns
│   ├── relationship-fields.php    # Post relationships
│   ├── repeatable-fields.php      # Repeatable field groups
│   ├── rest-api.php               # REST endpoints
│   └── settings-page.php          # Admin settings
├── blocks/                        # Source blocks (not distributed)
│   ├── area-card/
│   │   ├── block.json            # Block metadata
│   │   ├── index.js              # Block registration & edit
│   │   ├── render.php            # Server-side rendering
│   │   ├── style.css             # Frontend styles
│   │   └── editor.css            # Editor-only styles
│   ├── fish-card/
│   ├── fish-facts/
│   ├── gear-card/
│   ├── gear-specs/
│   └── repeatable-facts/
├── build/                         # Compiled assets (distributed)
│   └── blocks/
│       ├── area-card/
│       │   ├── block.json
│       │   ├── index.js          # Compiled JavaScript
│       │   ├── index.css         # Compiled editor styles
│       │   ├── style-index.css   # Compiled frontend styles
│       │   ├── index.asset.php   # WordPress dependencies
│       │   └── render.php        # Server-side template
│       └── [other blocks...]
├── assets/                        # Static assets
│   ├── css/
│   └── js/
├── patterns/                      # Block patterns (JSON)
├── templates/                     # Custom templates
├── languages/                     # Translation files
├── package.json                  # NPM configuration
├── webpack.config.js             # Build configuration
└── .distignore                   # Distribution exclusions
```

## Block Registration System

### Centralized Registration (`includes/blocks.php`)

```php
namespace FishingCPTPlugin\Blocks;

function register_blocks() {
    // Validate plugin directory constant
    if (!defined('FISHING_CPT_PLUGIN_DIR')) {
        return;
    }
    
    // Register blocks from build directory
    $blocks_dir = FISHING_CPT_PLUGIN_DIR . 'build/blocks/';
    
    // Array of block names to register
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
        
        // Register block type from block.json
        if (file_exists($block_path)) {
            register_block_type($block_path);
        }
    }
}
```

### Block Registration Flow

1. **Plugin Initialization** - Main plugin file loads includes
2. **Block Namespace Init** - `FishingCPTPlugin\Blocks\init()` called
3. **Hook Registration** - Attached to `init` action hook
4. **Block Discovery** - Iterate through defined blocks array
5. **Block Registration** - WordPress reads block.json from build directory
6. **Asset Enqueuing** - WordPress automatically handles JS/CSS based on block.json

## Build Process

### NPM Scripts

```json
{
  "scripts": {
    "dev": "wp-scripts start",    // Development with hot reload
    "build": "wp-scripts build"   // Production build
  }
}
```

### Webpack Configuration

The `webpack.config.js` extends `@wordpress/scripts` default configuration:

```javascript
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const CopyPlugin = require('copy-webpack-plugin');

module.exports = {
    ...defaultConfig,
    entry: {
        'blocks/fish-card/index': './blocks/fish-card/index.js',
        'blocks/gear-card/index': './blocks/gear-card/index.js',
        'blocks/area-card/index': './blocks/area-card/index.js',
        'blocks/repeatable-facts/index': './blocks/repeatable-facts/index.js',
        'blocks/fish-facts/index': './blocks/fish-facts/index.js',
        'blocks/gear-specs/index': './blocks/gear-specs/index.js',
    },
    plugins: [
        ...defaultConfig.plugins,
        new CopyPlugin({
            patterns: [
                { from: 'blocks/*/block.json', to: '[path][name][ext]' },
                { from: 'blocks/*/render.php', to: '[path][name][ext]' },
            ],
        }),
    ],
};
```

### Build Output

For each block, the build process generates:

- `index.js` - Compiled JavaScript bundle
- `index.css` - Compiled editor styles
- `style-index.css` - Compiled frontend styles
- `index.asset.php` - WordPress dependency manifest
- `block.json` - Block metadata (copied from source)
- `render.php` - Server-side render template (copied from source)

## Block Anatomy

### block.json (Metadata)

```json
{
    "apiVersion": 3,
    "name": "fishing/fish-card",
    "title": "Fish Card",
    "category": "fishing",
    "icon": "palmtree",
    "description": "Display fish information card",
    "keywords": ["fishing", "fish", "card"],
    "textdomain": "fishing-cpt-plugin",
    "usesContext": ["postId", "postType"],
    "supports": {
        "color": { "background": true, "text": true },
        "typography": { "fontSize": true },
        "spacing": { "margin": true, "padding": true },
        "border": { "radius": true }
    },
    "editorScript": "file:./index.js",
    "editorStyle": "file:./index.css",
    "style": "file:./style-index.css",
    "render": "file:./render.php"
}
```

### index.js (Block Registration)

```javascript
import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import './style.css';
import './editor.css';

export default function Edit({ context }) {
    const blockProps = useBlockProps();
    // Editor component logic
    return <div {...blockProps}>Block content</div>;
}
```

### render.php (Server-Side Rendering)

```php
<?php
if (!defined('ABSPATH')) {
    exit;
}

$post_id = $context['postId'] ?? get_the_ID();
// Render block markup
echo '<div class="fish-card">';
// Block content
echo '</div>';
```

## Registered Blocks

### 1. Fish Card (`fishing/fish-card`)
- **Purpose**: Display fish metadata (water type, average size, bait)
- **Context**: Fish post type
- **Rendering**: Dynamic (render.php)

### 2. Gear Card (`fishing/gear-card`)
- **Purpose**: Display gear metadata (brand, type, price)
- **Context**: Gear post type
- **Rendering**: Dynamic (render.php)

### 3. Area Card (`fishing/area-card`)
- **Purpose**: Display fishing area information
- **Context**: Area post type
- **Rendering**: Dynamic (render.php)

### 4. Fish Quick Facts (`fishing/fish-facts`)
- **Purpose**: Display repeatable fish facts with style variations
- **Context**: Fish post type
- **Attributes**: displayStyle (list, table, cards)
- **Rendering**: Dynamic (render.php)

### 5. Gear Specifications (`fishing/gear-specs`)
- **Purpose**: Display repeatable gear specs with style variations
- **Context**: Gear post type
- **Attributes**: displayStyle (table, list, cards)
- **Rendering**: Dynamic (render.php)

### 6. Repeatable Facts (`fishing/repeatable-facts`)
- **Purpose**: Legacy block for backward compatibility
- **Status**: Maintained but not recommended for new implementations

## Development Workflow

### Adding a New Block

1. **Create Block Directory**
   ```bash
   mkdir blocks/new-block
   ```

2. **Create block.json**
   ```json
   {
       "apiVersion": 3,
       "name": "fishing/new-block",
       "title": "New Block",
       // ... configuration
   }
   ```

3. **Create index.js**
   ```javascript
   import Edit from './edit';
   // Block registration
   ```

4. **Create render.php** (if dynamic)
   ```php
   <?php
   // Server-side rendering
   ```

5. **Add to webpack.config.js**
   ```javascript
   entry: {
       'blocks/new-block/index': './blocks/new-block/index.js',
   }
   ```

6. **Add to blocks.php registration**
   ```php
   $blocks = [
       // ... existing blocks
       'new-block',
   ];
   ```

7. **Build and Test**
   ```bash
   npm run build
   ```

### Development Commands

```bash
# Install dependencies
npm install

# Development mode (hot reload)
npm run dev

# Production build
npm run build

# Watch for changes
npm run start
```

## WordPress.org Plugin Guidelines Compliance

### ✅ Block Registration
- Uses `register_block_type()` with block.json
- Follows official WordPress block API
- Proper namespacing (`fishing/block-name`)

### ✅ Asset Management
- WordPress handles asset enqueuing via block.json
- Proper dependency management with .asset.php
- Follows WordPress script/style handle conventions

### ✅ Internationalization
- Text domain: `fishing-cpt-plugin`
- Uses `__()`, `_e()`, `esc_html__()` functions
- POT file ready for translations

### ✅ Security
- All output escaped (`esc_html`, `esc_attr`, `esc_url`)
- Input sanitization on all meta fields
- Nonce verification for form submissions
- Capability checks before operations

### ✅ Accessibility
- Semantic HTML in all render templates
- ARIA labels where appropriate
- Keyboard navigation support
- Screen reader friendly markup

### ✅ Performance
- Shared dependencies across blocks
- Minimized bundle sizes
- Conditional script loading
- No unnecessary database queries

## Distribution Package

### Included Files
- ✅ Main plugin file (`fishing-cpt-plugin.php`)
- ✅ All `/includes/` PHP files
- ✅ All `/build/` compiled assets
- ✅ All `/templates/` files
- ✅ All `/patterns/` JSON files
- ✅ `README.md`, `uninstall.php`
- ✅ Translation files (`/languages/`)

### Excluded Files (.distignore)
- ❌ `/node_modules/`
- ❌ Source block files (`blocks/**/*.js`, `blocks/**/*.css`)
- ❌ Build configuration (`webpack.config.js`, `package.json`)
- ❌ Development docs and testing files
- ❌ Git configuration files

### Package Creation

```bash
# Build production assets
npm run build

# Create distribution ZIP
zip -r fishing-cpt-plugin-v1.0.0.zip . \
  -x@.distignore

# Or use WordPress.org SVN deploy
# (Respects .distignore automatically)
```

## Testing Multi-Block Architecture

### Build Verification
```bash
cd fishing-cpt-plugin
npm install
npm run build
ls -la build/blocks/  # Should show 6 block directories
```

### Block Registration Verification
1. Activate plugin in WordPress
2. Open Block Editor
3. Search for "fishing" in block inserter
4. Verify all 6 blocks appear
5. Test each block in appropriate post type context

### Asset Loading Verification
1. Insert a fishing block in editor
2. Check browser DevTools Network tab
3. Verify block assets load from `/build/blocks/` directory
4. Confirm no 404 errors for scripts/styles

## Performance Optimization

### Shared Dependencies
- WordPress handles script deduplication
- Common dependencies loaded once
- Block-specific code split appropriately

### Lazy Loading
- Editor scripts only loaded in admin
- Frontend styles only on pages using blocks
- Dynamic blocks render server-side (no JS required)

### Caching Strategy
- Built assets have content hashes
- Browser caching enabled
- WordPress handles asset versioning

## Troubleshooting

### Build Fails
```bash
# Clear node_modules and reinstall
rm -rf node_modules package-lock.json
npm install
npm run build
```

### Blocks Not Appearing
1. Check block registration in `/includes/blocks.php`
2. Verify build directory exists and contains blocks
3. Ensure block.json files copied to build directory
4. Check WordPress admin for JavaScript errors

### Asset 404 Errors
1. Verify build ran successfully
2. Check file paths in block.json
3. Ensure CopyPlugin copied block.json and render.php
4. Rebuild: `npm run build`

## References

- [WordPress Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [@wordpress/scripts Documentation](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/)
- [Block Registration Reference](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/)
- [block.json Metadata](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/)

## Version History

- **1.0.2** - Current multi-block implementation
  - 6 registered blocks
  - Centralized registration system
  - wp-scripts build configuration
  - Full WordPress.org compliance

---

*Last Updated: 2025-11-05*
*Plugin Version: 1.0.2*
*WordPress Compatibility: 6.8.0+*
