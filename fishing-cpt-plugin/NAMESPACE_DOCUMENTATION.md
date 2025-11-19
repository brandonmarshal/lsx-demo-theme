# Current Namespaces Documentation

## Files with Fishing_CPT namespace:
- includes/capabilities.php
- includes/cpt-areas.php
- includes/cpt-fish.php
- includes/cpt-gear.php
- includes/meta-fields.php
- includes/relationship-fields.php
- includes/repeatable-fields.php
- includes/repeatable-fields-enqueue.php
- includes/relationship-helpers.php
- includes/gallery-fields.php
- includes/gallery-enqueue.php
- includes/rest-api.php
- includes/settings-page.php
- includes/blocks-query-variations.php
- includes/patterns.php
- includes/template-loader.php
- includes/block-bindings.php
- includes/block-templates.php

## Files with Fishing_CPT\GoogleMaps sub-namespace:
- includes/google-maps-settings.php
- includes/google-maps-enqueue.php

## Files with FishingCPTPlugin\Blocks namespace:
- includes/blocks.php

## Files with no namespace (main plugin file):
- fishing-cpt-plugin.php (uses fishing_cpt_ prefix for functions)

## Files with Fishing_CPT\Tests namespace:
- tests/test-repeatable-fields.php

## Files with no namespace:
- uninstall.php

## Cross-file calls:
- Main file calls: FishingCPTPlugin\Blocks\init() and Fishing_CPT\add_caps()
- Need to update these to use consistent namespace</content>
<parameter name="filePath">/Users/brandonmarshall/Studio/brandonlightspeedwpdev/wp-content/themes/lsx-demo-theme/fishing-cpt-plugin/NAMESPACE_DOCUMENTATION.md