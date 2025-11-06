/**
 * Fishing Gallery Lightbox JavaScript
 *
 * Handles lightbox functionality with keyboard navigation,
 * touch support, and accessibility features.
 *
 * @package Fishing_CPT_Plugin
 * @since 1.0.2
 */

(function () {
	'use strict';

	/**
	 * Initialize lightbox for all galleries on the page.
	 */
	function initLightbox() {
		const galleries = document.querySelectorAll('[data-lightbox="true"]');

		galleries.forEach((gallery) => {
			const galleryId = gallery.getAttribute('data-gallery-id');
			const lightbox = document.getElementById(galleryId + '-lightbox');

			if (!lightbox) return;

			const links = gallery.querySelectorAll('.fishing-gallery__link');
			const image = lightbox.querySelector('.fishing-gallery-lightbox__image');
			const caption = lightbox.querySelector('.fishing-gallery-lightbox__caption');
			const counter = lightbox.querySelector('.fishing-gallery-lightbox__counter');
			const closeBtn = lightbox.querySelector('.fishing-gallery-lightbox__close');
			const prevBtn = lightbox.querySelector('.fishing-gallery-lightbox__prev');
			const nextBtn = lightbox.querySelector('.fishing-gallery-lightbox__next');
			const overlay = lightbox.querySelector('.fishing-gallery-lightbox__overlay');

			let currentIndex = 0;
			let images = [];
			let focusedElementBeforeOpen = null;

			// Build images array from gallery links
			links.forEach((link, index) => {
				const img = link.querySelector('img');
				images.push({
					url: link.getAttribute('href'),
					alt: img ? img.getAttribute('alt') : '',
					caption: link.closest('.fishing-gallery__item')?.querySelector('.fishing-gallery__caption')?.textContent || '',
				});

				// Click handler for each image
				link.addEventListener('click', (e) => {
					e.preventDefault();
					openLightbox(index);
				});
			});

			/**
			 * Open lightbox at specific index.
			 *
			 * @param {number} index Image index to display.
			 */
			function openLightbox(index) {
				focusedElementBeforeOpen = document.activeElement;
				currentIndex = index;
				showImage(currentIndex);
				lightbox.setAttribute('aria-hidden', 'false');
				document.body.style.overflow = 'hidden';
				closeBtn.focus();
			}

			/**
			 * Close lightbox and restore focus.
			 */
			function closeLightbox() {
				lightbox.setAttribute('aria-hidden', 'true');
				document.body.style.overflow = '';
				if (focusedElementBeforeOpen) {
					focusedElementBeforeOpen.focus();
				}
			}

			/**
			 * Show image at current index.
			 *
			 * @param {number} index Image index to display.
			 */
			function showImage(index) {
				if (!images[index]) return;

				const img = images[index];
				image.src = img.url;
				image.alt = img.alt;

				if (caption && img.caption) {
					caption.textContent = img.caption;
					caption.style.display = 'block';
				} else if (caption) {
					caption.style.display = 'none';
				}

				if (counter) {
					counter.textContent = `${index + 1} / ${images.length}`;
				}

				// Update button states
				prevBtn.disabled = index === 0;
				nextBtn.disabled = index === images.length - 1;
			}

			/**
			 * Navigate to previous image.
			 */
			function showPrevious() {
				if (currentIndex > 0) {
					currentIndex--;
					showImage(currentIndex);
				}
			}

			/**
			 * Navigate to next image.
			 */
			function showNext() {
				if (currentIndex < images.length - 1) {
					currentIndex++;
					showImage(currentIndex);
				}
			}

			// Event listeners
			closeBtn.addEventListener('click', closeLightbox);
			overlay.addEventListener('click', closeLightbox);
			prevBtn.addEventListener('click', showPrevious);
			nextBtn.addEventListener('click', showNext);

			// Keyboard navigation
			lightbox.addEventListener('keydown', (e) => {
				switch (e.key) {
					case 'Escape':
						closeLightbox();
						break;
					case 'ArrowLeft':
						e.preventDefault();
						showPrevious();
						break;
					case 'ArrowRight':
						e.preventDefault();
						showNext();
						break;
					case 'Home':
						e.preventDefault();
						currentIndex = 0;
						showImage(currentIndex);
						break;
					case 'End':
						e.preventDefault();
						currentIndex = images.length - 1;
						showImage(currentIndex);
						break;
				}
			});

			// Touch support for mobile
			let touchStartX = 0;
			let touchEndX = 0;

			lightbox.addEventListener('touchstart', (e) => {
				touchStartX = e.changedTouches[0].screenX;
			});

			lightbox.addEventListener('touchend', (e) => {
				touchEndX = e.changedTouches[0].screenX;
				handleSwipe();
			});

			/**
			 * Handle swipe gestures.
			 */
			function handleSwipe() {
				const swipeThreshold = 50;
				const diff = touchStartX - touchEndX;

				if (Math.abs(diff) > swipeThreshold) {
					if (diff > 0) {
						// Swiped left - next image
						showNext();
					} else {
						// Swiped right - previous image
						showPrevious();
					}
				}
			}

			// Trap focus within lightbox when open
			// Improved selector: exclude disabled and aria-hidden elements, and filter for visibility
			const focusableSelector = [
				'button:not(:disabled):not([aria-hidden="true"])',
				'[href]:not([disabled]):not([aria-hidden="true"])',
				'input:not(:disabled):not([aria-hidden="true"])',
				'select:not(:disabled):not([aria-hidden="true"])',
				'textarea:not(:disabled):not([aria-hidden="true"])',
				'[tabindex]:not([tabindex="-1"]):not(:disabled):not([aria-hidden="true"])'
			].join(', ');

			const allFocusable = Array.from(lightbox.querySelectorAll(focusableSelector));

			// Helper to check if element is visible and not aria-hidden (including ancestors)
			function isVisibleAndAccessible(el) {
				if (!el.offsetParent || el.hasAttribute('aria-hidden')) return false;
				let ancestor = el.parentElement;
				while (ancestor && ancestor !== lightbox) {
					if (ancestor.hasAttribute('aria-hidden') && ancestor.getAttribute('aria-hidden') === 'true') {
						return false;
					}
					ancestor = ancestor.parentElement;
				}
				return true;
			}

			const focusableElements = allFocusable.filter(isVisibleAndAccessible);
			const firstFocusable = focusableElements[0];
			const lastFocusable = focusableElements[focusableElements.length - 1];

			lightbox.addEventListener('keydown', (e) => {
				if (e.key === 'Tab') {
					if (e.shiftKey) {
						// Shift + Tab
						if (document.activeElement === firstFocusable) {
							lastFocusable.focus();
							e.preventDefault();
						}
					} else {
						// Tab
						if (document.activeElement === lastFocusable) {
							firstFocusable.focus();
							e.preventDefault();
						}
					}
				}
			});
		});
	}

	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initLightbox);
	} else {
		initLightbox();
	}
})();
