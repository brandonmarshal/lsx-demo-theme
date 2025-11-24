# Fishing CPT Plugin - Smoke Test Matrix

## Pre-Testing Setup

1. **WordPress Environment**: WordPress 5.8+ with Gutenberg enabled
2. **Plugin Installation**: Upload and activate the plugin via WP Admin → Plugins
3. **User Permissions**: Test with Administrator and Editor roles

---

## 1. Custom Post Type (CPT) Registration Tests

### Test 1.1: CPT Menu Presence

-   **Action**: Navigate to WordPress Admin Dashboard
-   **Expected**: Three new menu items appear:
    -   [ ] "Fish" with palmtree icon
    -   [ ] "Gear" with hammer icon
    -   [ ] "Stories" with book icon
-   **Status**: ❌ Pass / ❌ Fail

### Test 1.2: CPT Creation

-   **Action**: Click "Add New" for each CPT
-   **Expected**:
    -   [ ] Fish post editor loads with custom template (heading + columns)
    -   [ ] Gear post editor loads with standard editor
    -   [ ] Stories post editor loads with standard editor
-   **Status**: ❌ Pass / ❌ Fail

### Test 1.3: Archive Pages

-   **Action**: Visit `/fish/`, `/gear/`, `/stories/` URLs
-   **Expected**:
    -   [ ] Archive pages display without 404 errors
    -   [ ] Custom template used for Fish archive
    -   [ ] Standard archive for Gear and Stories
-   **Status**: ❌ Pass / ❌ Fail

---

## 2. Meta Field Registration Tests

### Test 2.1: Meta Fields in Editor

-   **Action**: Create/edit a Fish post
-   **Expected**: Meta fields appear in editor:
    -   [ ] Scientific Name (text)
    -   [ ] Water Type (text)
    -   [ ] Average Size (number)
    -   [ ] Best Bait (text)
-   **Status**: ❌ Pass / ❌ Fail

### Test 2.2: Meta Field Saving

-   **Action**:
    1. Fill in meta fields for a Fish post
    2. Save/publish the post
    3. Reload the editor
-   **Expected**:
    -   [ ] All meta field values are preserved
    -   [ ] Data displays correctly in single post view
-   **Status**: ❌ Pass / ❌ Fail

### Test 2.3: Meta Field Validation

-   **Action**: Enter invalid data (letters in number field)
-   **Expected**:
    -   [ ] Number fields reject non-numeric input
    -   [ ] Text fields properly sanitize HTML/scripts
-   **Status**: ❌ Pass / ❌ Fail

---

## 3. REST API Endpoint Tests

### Test 3.1: CPT REST Endpoints

-   **Action**: Test REST API endpoints:
    -   GET `/wp-json/wp/v2/fish`
    -   GET `/wp-json/wp/v2/gear`
    -   GET `/wp-json/wp/v2/stories`
-   **Expected**:
    -   [ ] All endpoints return valid JSON
    -   [ ] Meta fields included in response (`show_in_rest: true`)
    -   [ ] Proper HTTP status codes (200 for success)
-   **Status**: ❌ Pass / ❌ Fail

### Test 3.2: Meta Fields in REST Response

-   **Action**: GET `/wp-json/wp/v2/fish/{id}` for post with meta
-   **Expected**:
    -   [ ] `scientific_name` field present
    -   [ ] `water_type` field present
    -   [ ] `avg_size_cm` field present
    -   [ ] `best_bait` field present
-   **Status**: ❌ Pass / ❌ Fail

---

## 4. Gutenberg Block Registration Tests

### Test 4.1: Block Availability

-   **Action**: Open block inserter in post editor
-   **Expected**: Four new blocks available:
    -   [ ] "Fish Card" block under Widgets category
    -   [ ] "Gear Card" block under Widgets category
    -   [ ] "Story Card" block under Widgets category
    -   [ ] "Repeatable Facts" block under Widgets category
-   **Status**: ❌ Pass / ❌ Fail

### Test 4.2: Block Functionality

-   **Action**: Insert each block type
-   **Expected**:
    -   [ ] Fish Card displays meta fields from current post
    -   [ ] Gear Card displays gear-specific meta
    -   [ ] Story Card displays story-specific meta
    -   [ ] Repeatable Facts allows adding/removing list items
-   **Status**: ❌ Pass / ❌ Fail

### Test 4.3: Block Patterns

-   **Action**: Check Patterns panel in editor
-   **Expected**:
    -   [ ] Fish patterns available and functional
    -   [ ] Gear patterns available and functional
    -   [ ] Stories patterns available and functional
-   **Status**: ❌ Pass / ❌ Fail

---

## 5. Settings Page Tests

### Test 5.1: Settings Page Access

-   **Action**: Navigate to Fish → Settings
-   **Expected**:
    -   [ ] Settings page loads without errors
    -   [ ] "Plugin Settings" section visible
    -   [ ] "Default Template Lock" dropdown available
-   **Status**: ❌ Pass / ❌ Fail

### Test 5.2: Settings Functionality

-   **Action**:
    1. Change "Default Template Lock" setting
    2. Save settings
    3. Reload page
-   **Expected**:
    -   [ ] Settings save successfully
    -   [ ] Selected option persists after reload
    -   [ ] Setting affects new Fish posts appropriately
-   **Status**: ❌ Pass / ❌ Fail

---

## 6. Security & Accessibility Tests

### Test 6.1: Input Sanitization

-   **Action**: Attempt to save XSS payloads in meta fields
-   **Expected**:
    -   [ ] Script tags are stripped/escaped
    -   [ ] HTML entities properly encoded
    -   [ ] No JavaScript execution in admin or frontend
-   **Status**: ❌ Pass / ❌ Fail

### Test 6.2: Permission Checks

-   **Action**: Test with Editor role vs Administrator
-   **Expected**:
    -   [ ] Editor can create/edit Fish, Gear, Stories
    -   [ ] Only Administrator can access plugin settings
    -   [ ] Proper capability checks enforced
-   **Status**: ❌ Pass / ❌ Fail

### Test 6.3: Accessibility Features

-   **Action**: Navigate with keyboard and screen reader
-   **Expected**:
    -   [ ] Focus outlines visible on card blocks
    -   [ ] Proper ARIA labels on archive lists
    -   [ ] Semantic heading structure maintained
    -   [ ] Forms properly labeled
-   **Status**: ❌ Pass / ❌ Fail

---

## 7. Frontend Display Tests

### Test 7.1: Single Post Templates

-   **Action**: View single Fish post on frontend
-   **Expected**:
    -   [ ] Custom template displays meta fields properly
    -   [ ] Scientific name in italics
    -   [ ] Meta list shows water type, size, bait
    -   [ ] Proper HTML escaping applied
-   **Status**: ❌ Pass / ❌ Fail

### Test 7.2: Archive Templates

-   **Action**: View Fish archive page
-   **Expected**:
    -   [ ] Lists all Fish posts
    -   [ ] Pagination works if >10 posts
    -   [ ] Proper page title displayed
    -   [ ] Excerpts shown appropriately
-   **Status**: ❌ Pass / ❌ Fail

---

## 8. Performance & Compatibility Tests

### Test 8.1: Plugin Activation/Deactivation

-   **Action**:
    1. Deactivate plugin
    2. Check frontend (should not break)
    3. Reactivate plugin
-   **Expected**:
    -   [ ] No PHP errors on activation
    -   [ ] Rewrite rules flush properly
    -   [ ] No database errors
    -   [ ] Frontend gracefully handles missing CPTs
-   **Status**: ❌ Pass / ❌ Fail

### Test 8.2: Build Assets Loading

-   **Action**: Inspect browser Network tab while editing
-   **Expected**:
    -   [ ] Block JavaScript files load correctly
    -   [ ] Block CSS files apply styling
    -   [ ] No 404 errors for assets
    -   [ ] Assets properly minified in production
-   **Status**: ❌ Pass / ❌ Fail

---

## Testing Summary

**Total Tests**: 24 test scenarios
**Passed**: ** / 24
**Failed**: ** / 24
**Overall Status**: ❌ Pass / ❌ Fail

### Critical Issues Found:

1.
2.
3.

### Recommendations:

1.
2.
3.

---

## Quick Test Commands

### REST API Testing (via Terminal/cURL):

```bash
# Test Fish endpoint
curl -X GET "https://your-site.com/wp-json/wp/v2/fish" \
  -H "Authorization: Bearer YOUR_TOKEN"

# Test specific Fish post with meta
curl -X GET "https://your-site.com/wp-json/wp/v2/fish/123" \
  -H "Authorization: Bearer YOUR_TOKEN"
```

### Database Check (via wp-cli if available):

```bash
# Check CPT registration
wp post-type list

# Check meta registration
wp post meta list 123 --post_type=fish
```

---

_Test completed by: ******\_\_\_\_******_
_Date: ******\_\_\_\_******_
_WordPress Version: ******\_\_\_\_******_
_Plugin Version: 1.0.0_
