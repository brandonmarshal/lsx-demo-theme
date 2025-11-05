# Fishing CPT Plugin

Registers Fish, Gear, and Areas custom post types with meta fields, repeatable fish facts, Gutenberg blocks (fish-card, gear-card, area-card, repeatable-facts), query loop variations, patterns, REST API endpoint, settings page, Google Maps integration for Areas, and custom capabilities.

## Requirements

**Required Plugin Dependency:**
- **Secure Custom Fields (SCF)** or **Advanced Custom Fields (ACF)** - This plugin uses custom fields for managing post metadata. You must have either SCF or ACF installed and activated.

**WordPress Requirements:**
- WordPress 6.8.0 or higher
- PHP 7.4 or higher

### Installing Dependencies

1. Navigate to **Plugins > Add New** in your WordPress admin
2. Search for "Advanced Custom Fields" or "Secure Custom Fields"
3. Click **Install Now** and then **Activate**
4. Once activated, you can activate the Fishing CPT Plugin

If the dependency is not met, the plugin will:
- Display an admin error notice with installation instructions
- Automatically deactivate to prevent errors
- Require you to install the dependency before reactivating

## Features

### Custom Post Types

**Architecture Note:** This plugin enhances existing Custom Post Types (Fish, Gear, Areas) that are registered by the theme. The plugin adds meta fields, relationships, blocks, and functionality to these CPTs rather than registering them directly. This architectural decision ensures proper separation of concerns and allows the theme to maintain control over core CPT configuration.

- **Fish** - Fish species with detailed metadata and relationship fields
- **Gear** - Fishing equipment and gear with compatibility relationships
- **Areas** - Fishing locations with Google Maps integration and related content

### Post Relationships
The plugin provides bidirectional relationships between all CPTs:
- **Fish ↔ Gear**: Link fish species to compatible gear and vice versa
- **Fish ↔ Areas**: Connect fish to areas where they can be found
- **Gear ↔ Areas**: Associate gear with recommended fishing areas

All relationships are:
- **Bidirectional**: Updating one side automatically updates the other
- **Repeatable**: Select multiple related items per relationship
- **Validated**: Prevents circular references and maintains data integrity

### Google Maps Integration
Display interactive maps on Area posts showing fishing location coordinates. See [GOOGLE_MAPS_INTEGRATION.md](./GOOGLE_MAPS_INTEGRATION.md) for detailed setup and usage instructions.

**Quick Setup:**
1. Get a Google Maps API key from Google Cloud Console
2. Navigate to **Fish > Maps Settings** in WordPress admin
3. Enter your API key and configure display settings
4. Add latitude/longitude coordinates to Area posts

## Blocks

-   Fish Card (`fishing/fish-card`)
-   Gear Card (`fishing/gear-card`)
-   Area Card (`fishing/area-card`)
-   Repeatable Facts (`fishing/repeatable-facts`)

## Query Loop Variations

-   Fish Grid (fishing-fish-grid)
-   Gear List (fishing-gear-list)
-   Featured Areas (fishing-areas-featured)

## Patterns

Located in `patterns/` providing grids, heroes, lists and highlight sections for each CPT.

## REST API

`/wp-json/fishing/v1/fish/{id}/facts` – returns JSON array of fish facts.

## Settings

- **Admin > Fish > Settings** – Enable CPTs & posts per page
- **Admin > Fish > Maps Settings** – Configure Google Maps API and display options

## Multi-Block Plugin Architecture

This plugin is structured as a **multi-block plugin** following WordPress.org best practices. It efficiently manages 6 Gutenberg blocks with centralized registration and optimized builds.

**Architecture Features:**
- Centralized block registration system
- Single build process for all blocks
- Shared dependencies for optimized loading
- WordPress.org compliant structure

For detailed information, see [MULTI_BLOCK_ARCHITECTURE.md](./MULTI_BLOCK_ARCHITECTURE.md)

## Block Asset Pipeline

Run:

```bash
npm install
npm run build
```

Generates production assets for block scripts/styles. The build process:
- Compiles all 6 blocks with a single command
- Uses `@wordpress/scripts` for standardized builds
- Automatically handles dependencies via webpack
- Copies block.json and render.php to build directory

For development with hot reload:
```bash
npm run dev
```

To verify the multi-block setup:
```bash
./verify-multi-block.sh
```

Accessibility and security were considered but further manual testing (axe, screen reader) is recommended.

## Internationalization

Text domain `fishing-cpt-plugin`; POT file in `languages/`.

## Documentation

- [Multi-Block Architecture](./MULTI_BLOCK_ARCHITECTURE.md) - Complete guide to the plugin's multi-block structure
- [Blocks Documentation](./BLOCKS_DOCUMENTATION.md) - Detailed documentation for all available blocks
- [Relationships Guide](./RELATIONSHIPS.md) - Complete guide to using and understanding post relationships
- [Google Maps Integration Guide](./GOOGLE_MAPS_INTEGRATION.md) - Comprehensive setup and usage documentation
- [Dependency Implementation](./DEPENDENCY_IMPLEMENTATION.md) - Technical implementation details
- [Packaging Guide](./PACKAGING_GUIDE.md) - Instructions for creating distribution packages
- [Testing Matrix](./TESTING_MATRIX.md) - Test coverage and validation

## License

GPL-2.0-or-later
