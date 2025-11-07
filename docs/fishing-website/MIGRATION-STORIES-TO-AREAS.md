# Migration Guide: Stories CPT to Areas CPT

## Overview

This document provides instructions for migrating existing Stories custom post type data to the new Areas custom post type.

## Important Notes

⚠️ **BACKUP YOUR DATABASE** before running any migration scripts.

⚠️ **Test the migration** on a staging environment first.

## Changes Summary

### Post Type
- **Old:** `story` 
- **New:** `area`
- **Slug:** `stories` → `areas`

### Taxonomy
- **Old:** `story_category`
- **New:** `area_category`
- **Slug:** `story-category` → `area-category`

### Meta Fields
The following meta fields remain the same:
- `location` (unchanged)
- `weather_conditions` (unchanged)
- `catch_success` (unchanged)

### Templates
- `single-stories.php` → `single-area.php`
- `archive-stories.php` → `archive-area.php`
- `taxonomy-story_category.php` → `taxonomy-area_category.php`

### Blocks
- `fishing/story-card` → `fishing/area-card`

## Migration Steps

### Method 1: Manual Database Update (Recommended for Small Sites)

```sql
-- 1. Update post type in wp_posts table
UPDATE wp_posts 
SET post_type = 'area' 
WHERE post_type = 'story';

-- 2. Update taxonomy term relationships
UPDATE wp_term_taxonomy 
SET taxonomy = 'area_category' 
WHERE taxonomy = 'story_category';

-- 3. Verify the changes
SELECT post_type, COUNT(*) as count 
FROM wp_posts 
WHERE post_type = 'area' 
GROUP BY post_type;

SELECT taxonomy, COUNT(*) as count 
FROM wp_term_taxonomy 
WHERE taxonomy = 'area_category' 
GROUP BY taxonomy;
```

### Method 2: WP-CLI Command (For Larger Sites)

```bash
# Count existing story posts
wp post list --post_type=story --format=count

# Update post type
wp db query "UPDATE wp_posts SET post_type = 'area' WHERE post_type = 'story';"

# Update taxonomy
wp db query "UPDATE wp_term_taxonomy SET taxonomy = 'area_category' WHERE taxonomy = 'story_category';"

# Flush rewrite rules
wp rewrite flush --hard

# Verify migration
wp post list --post_type=area --format=count
```

### Method 3: PHP Script (For Programmatic Migration)

Create a temporary PHP file in your theme root:

```php
<?php
/**
 * Migration Script: Stories to Areas
 * 
 * Run this once from WordPress admin or via WP-CLI
 * Delete this file after successful migration
 */

function migrate_stories_to_areas() {
    global $wpdb;
    
    // Start transaction (if using InnoDB)
    $wpdb->query('START TRANSACTION');
    
    try {
        // Update post type
        $posts_updated = $wpdb->update(
            $wpdb->posts,
            array('post_type' => 'area'),
            array('post_type' => 'story'),
            array('%s'),
            array('%s')
        );
        
        // Update taxonomy
        $tax_updated = $wpdb->update(
            $wpdb->term_taxonomy,
            array('taxonomy' => 'area_category'),
            array('taxonomy' => 'story_category'),
            array('%s'),
            array('%s')
        );
        
        // Commit transaction
        $wpdb->query('COMMIT');
        
        // Flush rewrite rules
        flush_rewrite_rules(true);
        
        return array(
            'success' => true,
            'posts_updated' => $posts_updated,
            'taxonomies_updated' => $tax_updated,
            'message' => "Successfully migrated {$posts_updated} posts and {$tax_updated} taxonomy terms."
        );
        
    } catch (Exception $e) {
        // Rollback on error
        $wpdb->query('ROLLBACK');
        
        return array(
            'success' => false,
            'error' => $e->getMessage()
        );
    }
}

// Uncomment to run migration
// add_action('admin_init', function() {
//     if (current_user_can('manage_options') && isset($_GET['run_migration'])) {
//         $result = migrate_stories_to_areas();
//         wp_die(print_r($result, true));
//     }
// });
```

To use this script:
1. Save it as `migrate-stories-to-areas.php` in your theme root
2. Uncomment the `add_action` block
3. Visit: `yoursite.com/wp-admin/?run_migration=1`
4. Delete the file after successful migration

## Post-Migration Tasks

### 1. Flush Permalinks
Navigate to **Settings → Permalinks** and click "Save Changes" to flush rewrite rules.

### 2. Update Menu Links
If you have menu items linking to `/stories/`, update them to `/areas/`:
- Go to **Appearance → Menus**
- Update any custom links
- Or regenerate menu items from the Areas CPT

### 3. Update Block Patterns
Search for any hardcoded references in block patterns:
```bash
# Find patterns using old URLs
grep -r "stories" patterns/
grep -r "story-category" patterns/
```

### 4. Clear Caches
- Clear WordPress object cache
- Clear any page caching plugins
- Clear CDN cache if applicable

### 5. Test Frontend
- Visit area archive page: `/areas/`
- Visit individual area pages
- Test area category pages
- Verify area-card block displays correctly

### 6. Test Admin
- Verify "Areas" menu appears in WordPress admin
- Create a new area to test functionality
- Check area categories work correctly
- Test meta fields display and save correctly

## Rollback Procedure

If you need to rollback the migration:

```sql
-- Rollback post type
UPDATE wp_posts 
SET post_type = 'story' 
WHERE post_type = 'area';

-- Rollback taxonomy
UPDATE wp_term_taxonomy 
SET taxonomy = 'story_category' 
WHERE taxonomy = 'area_category';

-- Flush rewrite rules
-- Visit Settings → Permalinks and save
```

## Verification Checklist

- [ ] All story posts converted to area posts
- [ ] Post counts match (old stories = new areas)
- [ ] Taxonomies updated correctly
- [ ] Meta fields preserved
- [ ] Permalinks working correctly
- [ ] Archive page loads at `/areas/`
- [ ] Single area pages load correctly
- [ ] Admin menu shows "Areas"
- [ ] Category filtering works
- [ ] Block variations display correctly
- [ ] No PHP errors in logs
- [ ] No broken links on frontend

## Support

If you encounter issues during migration:

1. Check WordPress debug log for errors
2. Verify database queries ran successfully
3. Ensure all CPT registration code is active
4. Test in a safe staging environment first

## Additional Resources

- [WordPress Custom Post Types](https://developer.wordpress.org/plugins/post-types/)
- [WP-CLI Post Commands](https://developer.wordpress.org/cli/commands/post/)
- [Database Backup Best Practices](https://wordpress.org/support/article/backing-up-your-database/)
