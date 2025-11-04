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
- **Fish** - Fish species with detailed metadata
- **Gear** - Fishing equipment and gear
- **Areas** - Fishing locations with Google Maps integration

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

## Block Asset Pipeline

Run:

```bash
npm install
npm run build
```

Generates production assets for block scripts/styles. SCSS can be introduced later; current setup uses direct CSS for simplicity. Accessibility and security were considered but further manual testing (axe, screen reader) is recommended.

## Internationalization

Text domain `fishing-cpt-plugin`; POT file in `languages/`.

## Documentation

- [Google Maps Integration Guide](./GOOGLE_MAPS_INTEGRATION.md) - Comprehensive setup and usage documentation
- [Dependency Implementation](./DEPENDENCY_IMPLEMENTATION.md) - Technical implementation details
- [Testing Matrix](./TESTING_MATRIX.md) - Test coverage and validation

## License

GPL-2.0-or-later
