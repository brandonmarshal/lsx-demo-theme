# Fishing CPT Plugin

Registers Fish, Gear, and Stories custom post types with meta fields, repeatable fish facts, Gutenberg blocks (fish-card, gear-card, story-card, repeatable-facts), query loop variations, patterns, REST API endpoint, settings page, and custom capabilities.

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

## Blocks

-   Fish Card (`fishing/fish-card`)
-   Gear Card (`fishing/gear-card`)
-   Story Card (`fishing/story-card`)
-   Repeatable Facts (`fishing/repeatable-facts`)

## Query Loop Variations

-   Fish Grid (fishing-fish-grid)
-   Gear List (fishing-gear-list)
-   Featured Stories (fishing-stories-featured)

## Patterns

Located in `patterns/` providing grids, heroes, lists and highlight sections for each CPT.

## REST API

`/wp-json/fishing/v1/fish/{id}/facts` – returns JSON array of fish facts.

## Settings

Admin > Settings > Fishing CPT Settings – enable CPTs & posts per page.

## Block Asset Pipeline

Run:

```bash
npm install
npm run build
```

Generates production assets for block scripts/styles. SCSS can be introduced later; current setup uses direct CSS for simplicity. Accessibility and security were considered but further manual testing (axe, screen reader) is recommended.

## Internationalization

Text domain `fishing-cpt-plugin`; POT file in `languages/`.

## License

GPL-2.0-or-later
