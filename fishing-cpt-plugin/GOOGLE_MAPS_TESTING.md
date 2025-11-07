# Google Maps Integration - Testing Guide

## Manual Testing Checklist

### Prerequisites
- WordPress installation with Fishing CPT Plugin active
- Advanced Custom Fields or Secure Custom Fields plugin active
- Access to WordPress admin panel
- Google Maps API key (from Google Cloud Console)

### Test Case 1: Configure Google Maps Settings

**Steps:**
1. Log in to WordPress admin
2. Navigate to **Fish > Maps Settings**
3. Verify settings page loads without errors
4. Enter a valid Google Maps API key
5. Set zoom level to 12
6. Select map type as "Roadmap"
7. Click "Save Changes"

**Expected Result:**
- Settings page displays correctly
- Success message appears after saving
- API key is stored securely (not visible in page source)
- Zoom level and map type are saved

### Test Case 2: Add Location Data to Area Post

**Steps:**
1. Navigate to **Areas > Add New** (or edit existing Area post)
2. Enter Area title (e.g., "Tugela River Fishing Spot")
3. Add content to the post body
4. Add custom field `area_latitude` with value: `-28.7719`
5. Add custom field `area_longitude` with value: `29.0031`
6. Add custom field `area_address` with value: "Drakensberg, South Africa"
7. Publish or update the post
8. Click "View Post" to see the frontend

**Expected Result:**
- Post saves successfully
- Custom fields are stored
- Viewing the post shows an interactive Google Map
- Map marker appears at correct coordinates
- Info window shows area name and address

### Test Case 3: Test Without API Key

**Steps:**
1. Navigate to **Fish > Maps Settings**
2. Clear the API key field
3. Save settings
4. View an Area post with location data

**Expected Result:**
- For admins: Notice appears suggesting to configure API key
- For non-admins: Map section not displayed
- No JavaScript errors in console
- Page loads normally

### Test Case 4: Test With Invalid Coordinates

**Steps:**
1. Edit an Area post
2. Set `area_latitude` to `999` (invalid)
3. Set `area_longitude` to `-200` (invalid)
4. Update post
5. View the post on frontend

**Expected Result:**
- Error message displays: "Invalid map coordinates"
- No map renders
- No JavaScript console errors
- Page remains functional

### Test Case 5: Test With Missing Coordinates

**Steps:**
1. Create new Area post
2. Don't add any location custom fields
3. Publish post
4. View post on frontend

**Expected Result:**
- No map section displays
- No errors shown
- Page content displays normally
- Scripts don't load unnecessarily

### Test Case 6: Test Responsive Behavior

**Steps:**
1. View Area post with valid location data
2. Resize browser window to mobile size (375px)
3. Test touch gestures (pinch to zoom, drag)
4. Resize to tablet size (768px)
5. Resize to desktop size (1200px)

**Expected Result:**
- Map adjusts height appropriately:
  - Mobile: 300px height
  - Tablet: 350px height
  - Desktop: 450px height
- Touch controls work on mobile
- Map remains interactive at all sizes

### Test Case 7: Test Map Interactions

**Steps:**
1. View Area post with map
2. Click on map marker
3. Click zoom in/out buttons
4. Change map type (roadmap/satellite)
5. Click fullscreen button
6. Enable street view

**Expected Result:**
- Marker click opens info window
- Info window shows area name and address
- Zoom controls work correctly
- Map type changes apply
- Fullscreen mode works
- Street view is accessible

### Test Case 8: Test Multiple Area Posts

**Steps:**
1. Create 3 different Area posts with different coordinates:
   - Area A: Latitude `-28.7719`, Longitude `29.0031`
   - Area B: Latitude `-26.2041`, Longitude `28.0473`
   - Area C: Latitude `-33.9249`, Longitude `18.4241`
2. View each post individually
3. Verify each shows correct location

**Expected Result:**
- Each Area shows different map location
- Markers appear at correct coordinates
- No conflicts between different posts
- Maps load independently

### Test Case 9: Test Accessibility

**Steps:**
1. Use keyboard only to navigate page
2. Tab to map container
3. Use screen reader to read map content
4. Check ARIA labels are present
5. Test focus indicators

**Expected Result:**
- Map container is focusable
- ARIA label describes map purpose
- Screen reader announces map information
- Focus indicators are visible
- Keyboard navigation works

### Test Case 10: Test Error Handling

**Steps:**
1. Enter invalid API key in settings
2. View Area post
3. Check browser console for errors
4. Disconnect internet (optional)
5. Try to load map

**Expected Result:**
- User-friendly error message displays
- Console shows appropriate error (not crash)
- Page remains functional
- Graceful degradation occurs

## Browser Compatibility Testing

Test on the following browsers:
- [ ] Chrome (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Edge (latest)
- [ ] Mobile Safari (iOS)
- [ ] Chrome Android

## Performance Testing

**Metrics to Check:**
1. Page load time with map vs without map
2. Google Maps API load time
3. JavaScript console for warnings
4. Network tab for API calls
5. Memory usage with multiple maps

**Expected Performance:**
- Map loads within 2 seconds
- No memory leaks
- Single API key load per page
- Conditional loading works

## Security Testing

**Checks:**
1. Verify API key not exposed in page source
2. Check coordinate sanitization prevents SQL injection
3. Test XSS prevention in info window
4. Verify permission checks on settings page
5. Check nonce validation on form submission

## Common Issues and Resolutions

### Issue: Map Not Displaying
**Possible Causes:**
1. Missing API key
2. Invalid coordinates
3. API key restrictions in Google Cloud
4. JavaScript errors

**Resolution Steps:**
1. Check browser console for errors
2. Verify API key in settings
3. Check coordinate values are valid
4. Review Google Cloud Console settings

### Issue: "RefererNotAllowedMapError"
**Cause:** Domain not whitelisted in API restrictions

**Resolution:**
1. Go to Google Cloud Console
2. Navigate to API & Services > Credentials
3. Edit API key restrictions
4. Add your domain to HTTP referrers

### Issue: Map Loads But Wrong Location
**Cause:** Incorrect latitude/longitude values

**Resolution:**
1. Verify coordinate values
2. Check latitude is between -90 and 90
3. Check longitude is between -180 and 180
4. Use decimal format (not degrees/minutes)

## Automated Testing (Future)

Consider adding these automated tests:
- PHPUnit tests for coordinate sanitization
- JavaScript unit tests for map initialization
- Integration tests for settings page
- E2E tests with Playwright

## Test Results Template

```
Test Date: _____________
Tester: _____________
Environment: _____________

| Test Case | Status | Notes |
|-----------|--------|-------|
| Configure Settings | ☐ Pass ☐ Fail | |
| Add Location Data | ☐ Pass ☐ Fail | |
| Without API Key | ☐ Pass ☐ Fail | |
| Invalid Coordinates | ☐ Pass ☐ Fail | |
| Missing Coordinates | ☐ Pass ☐ Fail | |
| Responsive Behavior | ☐ Pass ☐ Fail | |
| Map Interactions | ☐ Pass ☐ Fail | |
| Multiple Posts | ☐ Pass ☐ Fail | |
| Accessibility | ☐ Pass ☐ Fail | |
| Error Handling | ☐ Pass ☐ Fail | |

Overall Status: ☐ Pass ☐ Fail
```

## Sign-off

- [ ] All test cases passed
- [ ] No critical bugs found
- [ ] Performance acceptable
- [ ] Accessibility validated
- [ ] Documentation complete
- [ ] Ready for production

**Tester Signature:** _____________
**Date:** _____________
