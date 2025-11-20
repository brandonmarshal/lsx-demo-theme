# Fishing CPT Plugin Testing Checklist

## Pre-Test Setup

-   [ ] Fresh WordPress installation with Twenty Twenty-Five theme
-   [ ] Advanced Custom Fields (ACF) plugin installed and activated
-   [ ] Plugin files copied to `/wp-content/plugins/fishing-cpt-plugin/`
-   [ ] Plugin activated in WordPress admin

## Test 1: Plugin Activation

-   [ ] Plugin activates without errors
-   [ ] No PHP errors in debug logs
-   [ ] Admin notice appears if ACF not installed (test both scenarios)

## Test 2: CPT Registration

-   [ ] "Fish" menu appears in admin sidebar
-   [ ] "Gear" menu appears in admin sidebar
-   [ ] "Areas" menu appears in admin sidebar
-   [ ] All CPTs have proper labels and icons

## Test 3: ACF Field Groups

-   [ ] Fish posts show "Fish Details" field group (scientific_name, water_type, average_size, bait_type)
-   [ ] Gear posts show "Gear Details" field group (brand, gear_type, price)
-   [ ] Area posts show "Area Details" field group (location, weather_conditions, catch_success)

## Test 4: Basic Functionality

-   [ ] Can create new Fish post
-   [ ] Can create new Gear post
-   [ ] Can create new Area post
-   [ ] Posts save without errors
-   [ ] ACF fields save data correctly

## Test 5: Advanced Features

-   [ ] Relationship fields work (Fish ↔ Gear, Fish ↔ Areas, Gear ↔ Areas)
-   [ ] Repeatable fields work (fish facts, gear specs)
-   [ ] Gallery fields work
-   [ ] Google Maps integration (if API key configured)

## Test 6: Blocks

-   [ ] Fish Card block available in editor
-   [ ] Gear Card block available in editor
-   [ ] Area Card block available in editor
-   [ ] Repeatable Facts block available in editor
-   [ ] Gallery block available in editor

## Test 7: Frontend Display

-   [ ] CPT archive pages work (/fish/, /gear/, /areas/)
-   [ ] Single CPT pages work
-   [ ] Blocks display correctly on frontend
-   [ ] No PHP errors on frontend

## Test 8: REST API

-   [ ] REST endpoints work: `/wp-json/fishing/v1/fish/{id}/facts`
-   [ ] Returns proper JSON response

## Test 9: Settings

-   [ ] Settings page accessible: Fish > Settings
-   [ ] Google Maps settings page accessible: Fish > Maps Settings
-   [ ] Settings save correctly

## Test 10: Performance

-   [ ] No excessive database queries
-   [ ] Assets load efficiently
-   [ ] No JavaScript errors in console

## Success Criteria

-   [ ] All CPTs appear in admin menu
-   [ ] ACF field groups display correctly
-   [ ] Can create and save posts with custom fields
-   [ ] No PHP errors or warnings
-   [ ] Plugin works independently of theme
-   [ ] All blocks and features functional

## Notes

-   Test on fresh WordPress installation
-   Test with and without ACF to verify dependency handling
-   Document any issues found
-   Verify plugin works on different themes
