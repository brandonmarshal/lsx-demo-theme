# Google Maps Integration for Area CPT

## Overview

This feature adds Google Maps integration to the Area custom post type, allowing you to display interactive maps showing fishing location coordinates on single Area post pages.

## Features

- **Dynamic Map Display**: Interactive Google Maps on single Area posts
- **Flexible Location Input**: Support for latitude/longitude coordinates or text address
- **Configurable Settings**: Admin page for API key, zoom level, and map type
- **Responsive Design**: Mobile-friendly maps with touch controls
- **Accessible**: WCAG 2.2 AA compliant with ARIA labels and keyboard navigation
- **Error Handling**: Graceful fallbacks for missing API keys or invalid coordinates
- **Security**: API key validation and coordinate sanitization

## Setup Instructions

### 1. Get Google Maps API Key

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select an existing one
3. Enable the "Maps JavaScript API"
4. Create credentials (API key)
5. **IMPORTANT: Restrict your API key:**
   - **Application restrictions**: Set HTTP referrer restrictions
     - Add your domain(s): `yourdomain.com/*`, `*.yourdomain.com/*`
     - This prevents unauthorized use from other websites
   - **API restrictions**: Limit to "Maps JavaScript API" only
   - **Set quotas**: Configure usage limits to control costs
   - **Enable billing alerts**: Get notified of unusual activity

**Security Note**: The Google Maps JavaScript API requires the API key to be visible in the page source. This is standard and documented by Google. Protect your key by implementing the restrictions above. The API key is not stored in version control.

**Learn more**: [Google Maps API Security Best Practices](https://developers.google.com/maps/api-security-best-practices)

### 2. Configure Plugin Settings

1. Go to **Fish > Maps Settings** in WordPress admin
2. Enter your Google Maps API key
3. Configure default settings:
   - **Zoom Level**: 1-20 (default: 12)
   - **Map Type**: Roadmap, Satellite, Hybrid, or Terrain

### 3. Add Location Data to Area Posts

For each Area post, add location data using one of these methods:

#### Method 1: Latitude and Longitude (Recommended)
1. Edit an Area post
2. Scroll to the custom fields section
3. Add fields:
   - `area_latitude`: e.g., `-28.7719`
   - `area_longitude`: e.g., `29.0031`
   - `area_address` (optional): e.g., "Drakensberg, South Africa"

#### Method 2: Using Advanced Custom Fields
If using ACF/SCF, create field groups for:
- Field Name: `area_latitude` (Number field)
- Field Name: `area_longitude` (Number field)
- Field Name: `area_address` (Text field)

**Coordinate Tips**:
- Latitude range: -90 to 90
- Longitude range: -180 to 180
- Use decimal format (e.g., -28.7719, not degrees/minutes/seconds)
- Get coordinates from Google Maps by right-clicking a location

## Usage

### Frontend Display

Maps automatically appear on single Area posts when:
1. API key is configured
2. Area post has valid latitude and longitude values

The map displays:
- Interactive marker at the location
- Info window with area name and address
- Map controls (zoom, map type, street view, fullscreen)

### Template Integration

The map is automatically added to `single-area.php` template. To manually add it elsewhere:

```php
<?php
if (function_exists('Fishing_CPT\GoogleMaps\render_area_map')) {
    Fishing_CPT\GoogleMaps\render_area_map(get_the_ID());
}
?>
```

### Getting Map Data Programmatically

```php
<?php
use function Fishing_CPT\GoogleMaps\get_area_map_data;

$map_data = get_area_map_data($post_id);
if ($map_data) {
    echo 'Latitude: ' . $map_data['latitude'];
    echo 'Longitude: ' . $map_data['longitude'];
    echo 'Zoom: ' . $map_data['zoom'];
}
?>
```

## Files Structure

```
fishing-cpt-plugin/
├── includes/
│   ├── google-maps-settings.php   # Settings page registration
│   ├── google-maps-enqueue.php    # Asset loading and rendering
│   └── meta-fields.php            # Location meta field registration
├── assets/
│   ├── js/
│   │   └── maps.js                # Map initialization JavaScript
│   └── css/
│       └── maps.css               # Map styling
└── templates/
    └── single-area.php            # Updated template with map
```

## Customization

### Styling

Customize map appearance by editing `assets/css/maps.css`:

```css
#fishing-area-map {
    height: 450px; /* Adjust map height */
    border-radius: 8px; /* Adjust border radius */
}
```

### JavaScript Behavior

Modify map behavior in `assets/js/maps.js`:

```javascript
// Example: Change marker animation
const marker = new google.maps.Marker({
    position: center,
    map: map,
    animation: google.maps.Animation.BOUNCE, // Change animation
});
```

### Default Settings

Modify defaults in `includes/google-maps-settings.php`:

```php
// Change default zoom
$output['default_zoom'] = 14; // Instead of 12

// Change default map type
$output['map_type'] = 'terrain'; // Instead of 'roadmap'
```

## Troubleshooting

### Map Not Displaying

1. **Check API Key**: Verify key is correctly entered in Maps Settings
2. **Check Coordinates**: Ensure latitude and longitude are valid numbers
3. **Console Errors**: Open browser console (F12) for error messages
4. **API Restrictions**: Check Google Cloud Console for API restrictions
5. **Browser Cache**: Clear browser cache and hard refresh (Ctrl+Shift+R)

### Invalid Coordinates Error

- Latitude must be between -90 and 90
- Longitude must be between -180 and 180
- Use decimal format (e.g., -28.7719)
- No spaces or special characters

### API Key Errors

Common Google Maps API errors:
- `RefererNotAllowedMapError`: Add your domain to API key restrictions
- `ApiNotActivatedMapError`: Enable Maps JavaScript API in Google Cloud Console
- `InvalidKeyMapError`: Check API key is correct

## Security Considerations

1. **API Key Protection**:
   - **Visible in Source**: The Google Maps JavaScript API requires the API key to be in the script URL. This is standard practice and documented by Google.
   - **Protection Methods**:
     - Set HTTP referrer restrictions in Google Cloud Console (e.g., `yourdomain.com/*`)
     - Limit API key to Maps JavaScript API only
     - Configure usage quotas and billing alerts
     - Monitor usage regularly in Google Cloud Console
   - **Not a Secret**: Unlike backend API keys, browser API keys are meant to be visible but restricted by domain
   - **Never in Version Control**: The key is stored in WordPress database, not in code

2. **Input Validation**:
   - Latitude validated with `sanitize_latitude()` function (range: -90 to 90)
   - Longitude validated with `sanitize_longitude()` function (range: -180 to 180)
   - Address data sanitized with `sanitize_text_field()`
   - XSS prevention in info window content with `escapeHtml()` function

3. **Permission Checks**:
   - Only users with `manage_options` capability can configure settings
   - Meta fields require `edit_posts` capability

4. **Best Practices**:
   - Regular monitoring of API usage
   - Quick rotation of key if compromised
   - Documentation of all restrictions applied
   - Testing with production domain restrictions before launch

**Reference**: [Google Maps API Security Best Practices](https://developers.google.com/maps/api-security-best-practices)

## Performance

- Maps only load on single Area posts with location data
- Google Maps API loaded from CDN (cached by browsers)
- CSS and JS minified and versioned for cache busting
- Conditional loading prevents unnecessary API calls
- Single database query per page load for settings

## Accessibility

- ARIA labels on map container
- Keyboard navigation support
- Screen reader friendly error messages
- High contrast mode support
- Reduced motion preference respected
- Focus indicators on interactive elements

## Browser Support

- Chrome/Edge (latest 2 versions)
- Firefox (latest 2 versions)
- Safari (latest 2 versions)
- Mobile browsers (iOS Safari, Chrome Android)

## Changelog

### Version 1.0.1
- Initial Google Maps integration
- Settings page for API key and display options
- Responsive map display with accessibility support
- Error handling and validation

## Support

For issues or questions:
1. Check this documentation
2. Review browser console errors
3. Verify Google Cloud Console settings
4. Check WordPress debug log
5. Contact support with error details

## Resources

- [Google Maps JavaScript API Documentation](https://developers.google.com/maps/documentation/javascript)
- [Getting Started with Google Maps API](https://developers.google.com/maps/get-started)
- [Maps API Key Best Practices](https://developers.google.com/maps/api-security-best-practices)
- [WCAG 2.2 Guidelines](https://www.w3.org/WAI/WCAG22/quickref/)
