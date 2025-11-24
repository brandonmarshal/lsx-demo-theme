# Post Relationships Documentation

## Overview

The Fishing CPT Plugin implements a comprehensive bidirectional relationship system between Fish, Gear, and Area custom post types using Advanced Custom Fields (ACF) or Secure Custom Fields (SCF).

## Relationship Structure

### Available Relationships

| Source CPT | Target CPT | Field Name | Description |
|------------|-----------|------------|-------------|
| Fish | Gear | `related_gear` | Gear items that work well with this fish species |
| Fish | Area | `related_areas` | Fishing areas where this species can be found |
| Gear | Fish | `related_fish` | Fish species this gear is suited for |
| Gear | Area | `related_areas` | Fishing areas where this gear is recommended |
| Area | Fish | `related_fish` | Fish species that can be found in this area |
| Area | Gear | `related_gear` | Gear that works well in this fishing area |

## How Bidirectional Relationships Work

When you create a relationship from one post to another, the system automatically creates the reverse relationship. For example:

1. When editing a Fish post, you select "Rod X" in the Related Gear field
2. The system automatically adds this Fish to the "Compatible Fish Species" field on the Rod X Gear post
3. If you remove the relationship from either side, it's removed from both

## Using Relationships in the Admin

### Adding Relationships

1. Edit a Fish, Gear, or Area post
2. Scroll to the relationship field group (e.g., "Fish Relationships")
3. Click the relationship field (e.g., "Related Gear")
4. Search for or select posts from the dropdown
5. You can select multiple posts for each relationship
6. Save the post - reciprocal relationships are updated automatically

### Viewing Relationships

Relationships appear in several places:
- In the post edit screen within their respective field groups
- In the REST API responses for each post
- Available for query loops and block patterns

## Technical Implementation

### Field Groups

The plugin registers three ACF/SCF field groups:

1. **Fish Relationships** (`group_fish_relationships`)
   - Related Gear (`related_gear`)
   - Fishing Areas (`related_areas`)

2. **Gear Relationships** (`group_gear_relationships`)
   - Compatible Fish Species (`related_fish`)
   - Recommended Areas (`related_areas`)

3. **Area Relationships** (`group_area_relationships`)
   - Fish Species Found Here (`related_fish`)
   - Recommended Gear (`related_gear`)

### Synchronization Hooks

The plugin uses ACF's `acf/save_post` action with priority 20 to synchronize relationships:

```php
add_action( 'acf/save_post', 'Fishing_CPT\sync_fish_relationships', 20 );
add_action( 'acf/save_post', 'Fishing_CPT\sync_gear_relationships', 20 );
add_action( 'acf/save_post', 'Fishing_CPT\sync_area_relationships', 20 );
```

### Data Integrity

The relationship system includes several safeguards:

- **Autosave Protection**: Relationships aren't synced during autosaves
- **Revision Protection**: Relationships aren't synced for post revisions
- **Capability Checks**: Users must have `edit_post` capability
- **Stale Relationship Cleanup**: Removes relationships when posts are unlinked
- **Loop Prevention**: Actions are temporarily removed during sync to prevent infinite loops

## Developer Usage

### Getting Related Posts

Use the helper function to retrieve all related posts:

```php
// Get all related posts for a Fish
$related = Fishing_CPT\get_all_related_posts( $fish_id );

// Get only related gear
$gear = Fishing_CPT\get_all_related_posts( $fish_id, 'gear' );

// Get only related areas
$areas = Fishing_CPT\get_all_related_posts( $fish_id, 'area' );
```

### Using ACF get_field()

You can also use standard ACF functions:

```php
// Get related gear for a fish
$related_gear = get_field( 'related_gear', $fish_id );

// Get related fish for an area
$related_fish = get_field( 'related_fish', $area_id );
```

### Template Usage

Display related posts in your templates:

```php
<?php
// In single-fish.php
$related_gear = get_field( 'related_gear' );
if ( $related_gear ) : ?>
    <h3><?php esc_html_e( 'Recommended Gear', 'fishing-cpt-plugin' ); ?></h3>
    <ul class="related-gear">
        <?php foreach ( $related_gear as $gear_post ) : ?>
            <li>
                <a href="<?php echo esc_url( get_permalink( $gear_post->ID ) ); ?>">
                    <?php echo esc_html( $gear_post->post_title ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
```

## REST API

All relationship fields are available via the WordPress REST API:

```
GET /wp-json/wp/v2/fish/{id}
GET /wp-json/wp/v2/gear/{id}
GET /wp-json/wp/v2/area/{id}
```

The response includes relationship fields with post IDs or full post objects depending on ACF settings.

## Troubleshooting

### Relationships Not Syncing

1. **Check ACF/SCF is Active**: The plugin requires ACF or SCF to be installed and activated
2. **Check User Permissions**: User must have `edit_post` capability for both posts
3. **Clear Caches**: Clear any caching plugins that might be storing old data
4. **Check for Conflicts**: Deactivate other plugins to identify conflicts

### Performance Considerations

The relationship sync runs on every post save, which includes:
- Retrieving all posts of the target type
- Checking and updating relationships
- Multiple database queries

For sites with large numbers of posts, consider:
- Using object caching (Redis, Memcached)
- Implementing pagination for relationship fields
- Monitoring query performance with Query Monitor

## Best Practices

1. **Use Relationships Thoughtfully**: Don't create too many relationships that could confuse content editors
2. **Document Your Relationships**: Make it clear what each relationship means in your site's content strategy
3. **Test Before Production**: Test relationship functionality with sample data before going live
4. **Monitor Performance**: Keep an eye on database performance with many related posts
5. **Regular Backups**: Always maintain regular backups before making bulk relationship changes

## Migration and Data Management

### Importing Relationships

When importing posts with relationships:
1. Import all posts first (Fish, Gear, Areas)
2. Map old post IDs to new post IDs
3. Update relationship fields with new IDs
4. Save each post to trigger bidirectional sync

### Cleaning Up Old Data

If you need to remove all relationships:

```php
// Remove all relationships for a specific post
delete_field( 'related_gear', $post_id );
delete_field( 'related_areas', $post_id );
delete_field( 'related_fish', $post_id );
```

## Future Enhancements

Potential future improvements:
- Bulk relationship management tools in admin
- Visual relationship diagram/graph
- Relationship strength/weighting system
- Automatic relationship suggestions based on taxonomies
- Relationship statistics and reporting

## Support

For issues or questions:
1. Check this documentation
2. Review the code in `includes/relationship-fields.php` and `includes/relationship-helpers.php`
3. Open an issue in the GitHub repository
4. Contact the development team

## Version History

- **1.0.2**: Initial relationship system implementation with bidirectional sync
- Legacy Stories CPT references removed
