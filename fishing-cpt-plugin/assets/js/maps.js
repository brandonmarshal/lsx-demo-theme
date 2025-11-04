/**
 * Google Maps initialization for Fishing CPT Area posts.
 *
 * @since 1.0.1
 * @package FishingCPTPlugin
 */

(function () {
	'use strict';

	/**
	 * Initialize Google Map for an area.
	 *
	 * @since 1.0.1
	 *
	 * @return {void}
	 */
	function initAreaMap() {
		const mapContainer = document.getElementById('fishing-area-map');

		if (!mapContainer) {
			return;
		}

		// Get map data from container data attributes
		const latitudeAttr = mapContainer.dataset.latitude;
		const longitudeAttr = mapContainer.dataset.longitude;
		const areaName = mapContainer.dataset.areaName || '';
		const address = mapContainer.dataset.address || '';
		const zoom = parseInt(mapContainer.dataset.zoom, 10) || 12;
		const mapType = mapContainer.dataset.mapType || 'roadmap';

		// Check for missing coordinate attributes
		if (typeof latitudeAttr === 'undefined') {
			mapContainer.innerHTML =
				'<div class="fishing-map-error" role="alert">' +
				'<p>Map latitude coordinate is missing for this location.</p>' +
				'</div>';
			return;
		}
		if (typeof longitudeAttr === 'undefined') {
			mapContainer.innerHTML =
				'<div class="fishing-map-error" role="alert">' +
				'<p>Map longitude coordinate is missing for this location.</p>' +
				'</div>';
			return;
		}

		const latitude = parseFloat(latitudeAttr);
		const longitude = parseFloat(longitudeAttr);

		// Validate coordinates are valid numbers
		if (isNaN(latitude) || isNaN(longitude)) {
			mapContainer.innerHTML =
				'<div class="fishing-map-error" role="alert">' +
				'<p>Map coordinates are not available for this location.</p>' +
				'</div>';
			return;
		}

		// Validate coordinate ranges
		if (latitude < -90 || latitude > 90 || longitude < -180 || longitude > 180) {
			mapContainer.innerHTML =
				'<div class="fishing-map-error" role="alert">' +
				'<p>Invalid map coordinates. Please check the latitude and longitude values.</p>' +
				'</div>';
			return;
		}

		// Check if Google Maps API is loaded
		if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
			mapContainer.innerHTML =
				'<div class="fishing-map-error" role="alert">' +
				'<p>Google Maps failed to load. Please check your API key configuration.</p>' +
				'</div>';
			return;
		}

		try {
			// Create map center position
			const center = { lat: latitude, lng: longitude };

			// Initialize map
			const map = new google.maps.Map(mapContainer, {
				center: center,
				zoom: zoom,
				mapTypeId: mapType,
				mapTypeControl: true,
				streetViewControl: true,
				fullscreenControl: true,
				zoomControl: true,
			});

			// Create marker
			const marker = new google.maps.Marker({
				position: center,
				map: map,
				title: areaName,
				animation: google.maps.Animation.DROP,
			});

			// Create info window content
			let infoContent = '<div class="fishing-map-info-window">';
			if (areaName) {
				infoContent += '<h3>' + escapeHtml(areaName) + '</h3>';
			}
			if (address) {
				infoContent += '<p>' + escapeHtml(address) + '</p>';
			}
			infoContent += '</div>';

			// Create and attach info window
			const infoWindow = new google.maps.InfoWindow({
				content: infoContent,
			});

			// Show info window on marker click
			marker.addListener('click', function () {
				infoWindow.open(map, marker);
			});

			// Open info window by default
			infoWindow.open(map, marker);
		} catch (error) {
			console.error('Error initializing Google Map:', error);
			mapContainer.innerHTML =
				'<div class="fishing-map-error" role="alert">' +
				'<p>An error occurred while loading the map. Please try again later.</p>' +
				'</div>';
		}
	}

	/**
	 * Escape HTML to prevent XSS in info windows.
	 *
	 * @since 1.0.1
	 *
	 * @param {string} text - Text to escape.
	 * @return {string} Escaped text.
	 */
	function escapeHtml(text) {
		const div = document.createElement('div');
		div.textContent = text;
		return div.innerHTML;
	}

	// Initialize map when Google Maps API is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initAreaMap);
	} else {
		initAreaMap();
	}
})();
