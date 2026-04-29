# Launch QA Plan

- Value: Provide a controlled launch gate for a redesign that affects design, content, SEO, analytics and site behaviour.
- Risk: Launch risk is high until dev site access, Figma parity evidence and redirect mapping are complete.
- Next step: Convert this plan into executable QA scripts once implementation issues are approved.

## QA phases

### 1. Repository validation

Theme:
- `npm install`
- `composer install`
- `npm run schema:validate`
- `npm run theme:validate`
- `npm run patterns:escape`
- `npm run security:scan`
- `npm run lint`
- `composer run phpcs`
- `composer run lint:php`

Plugin:
- `npm install`
- `composer install`
- `npm run plugin:validate`
- `npm run schema:validate`
- `npm run security:scan`
- `npm run lint`
- `composer run phpcs`
- `composer run phplint`

### 2. Figma parity QA

- Homepage desktop/tablet/mobile.
- Header and navigation states.
- Footer and global CTAs.
- Page-family patterns.
- Button states.
- Light/dark modes.
- Motion and hover states.

### 3. Accessibility QA

- Keyboard navigation.
- Focus states.
- Contrast in light and dark modes.
- Heading structure.
- Landmark structure.
- Alt text and decorative images.
- Form labels and validation.
- Carousel controls if used.
- Reduced motion.

### 4. Responsive QA

Check widths aligned to theme breakpoints:

- 1440px
- 1280px
- 1024px
- 768px
- 640px
- 390px
- 320px

### 5. Performance QA

- Homepage performance budget.
- Core landing pages.
- Blog/insights archive.
- Contact page.
- Script loading audit.
- Carousel/Swiper conditional loading.
- GSAP/effects payload audit.
- Image dimensions and lazy loading.

### 6. Content and SEO QA

- Current URL inventory reconciled.
- Redirect map loaded and tested.
- Metadata and open graph checked.
- Internal links checked.
- Sitemap and robots checked.
- Schema output checked.
- 404 page checked.

### 7. Forms, analytics and conversion QA

- Consultation CTA clicks tracked.
- Contact form submission tracked.
- Newsletter signup tracked if included.
- GA4 realtime/debug validation.
- GTM preview validation.
- Thank-you or conversion path confirmed.

### 8. Launch-day checks

- Backups confirmed.
- DNS/hosting/cache plan confirmed.
- Redirects deployed.
- Cache purged.
- Forms tested in production.
- Analytics tested in production.
- Search Console inspection submitted for key pages.
- Post-launch monitoring started.
