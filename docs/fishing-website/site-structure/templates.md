# **Block Theme**

## *\[Theme / Project Name\]*

This document outlines WordPress block theme templates, detailing their purpose, essential and recommended blocks, and notes on best practices. It serves as a practical guide for planning, building, and maintaining consistent, accessible, and performant block-based themes.  
---

[1\. Block Theme Templates](#1.-block-theme-templates)

[2\. General Notes for Templates](#2.-general-notes-for-templates)

[3\. General Cross-Template Guidance](#3.-general-cross-template-guidance)

---

## **How to Use**

This document is a **reference guide for block theme templates**.  
 It is meant to:

* Provide a **generic outline** of common block theme templates.

* Help developers, designers, and clients align on what each template should contain.

* Serve as a **checklist** to ensure consistency, accessibility, and WordPress best practices.

* Work as a **prompt for AI-assisted generation** of template code or documentation.

When using this doc with a client, walk through the relevant templates and confirm which ones are required for their project. For each template, note any customizations, optional recommendations, or content-specific adjustments.

---

# **0\. Deliverables**

- [ ] Decide what templates are needed for the project based on the content model, then document them in one of the tabs

---

# **1\. Front page hierarchy**

1. **When front page displays "Your latest posts":**

   templates/front-page.html

   templates/home.html

   templates/index.html

   

   

2. **When front page displays a static page (Settings → Reading):**

   templates/front-page.html

   templates/page-{slug}.html

   templates/page-{id}.html

   templates/page.html

   templates/index.html Notes: front-page.html takes absolute precedence if present. If a static page is used and no front-page.html exists, the page-specific templates fall back to page.html then index.html.

---

# **2\. Home hierarchy**

1. **Posts index (the page assigned as "Posts page" or default blog listing):**

   templates/home.html

   templates/index.html Notes: home.html is the intended posts-index template in block themes. If the Posts page is a static Page object, page templates can apply when front-page/front-page.html is not present (see Front page rules).

---

# **3\. Singular hierarchy**

1. **Single (custom post types and posts):**

   templates/single-{post\_type}.html

   templates/single.html

   templates/singular.html

   templates/index.html

   

   

2. **Page (static pages):**

   templates/page-{slug}.html

   templates/page-{id}.html

   templates/page.html

   templates/singular.html

   templates/index.html

   

   

3. **Attachment:**

   templates/attachment.html

   templates/single.html

   templates/singular.html

   templates/index.html Notes: Use single-{post\_type}.html for CPT single views (e.g., single-product.html). page-{slug}.html and page-{id}.html are useful for landing or specialized pages.

---

# **4\. Archive hierarchy**

1. **Generic archive (post type archives):**

   templates/archive-{post\_type}.html

   templates/archive.html

   templates/index.html

   

   

2. **Category archive:**

   templates/category-{slug}.html

   templates/category-{id}.html

   templates/category.html

   templates/archive.html

   templates/index.html

   

   

3. **Tag archive:**

   templates/tag-{slug}.html

   templates/tag.html

   templates/archive.html

   templates/index.html

   

   

4. **Custom taxonomy:**

   templates/taxonomy-{taxonomy}-{term}.html

   templates/taxonomy-{taxonomy}.html

   templates/taxonomy.html

   templates/archive.html

   templates/index.html Notes: For CPTs that register has\_archive, use archive-{post\_type}.html. Term-specific templates allow highly tailored term pages.

---

# **5\. Search hierarchy**

* templates/search.html

* templates/index.html Notes: Include a visible search block and accessible heading "Search results for: {query}" in search.html.

---

# **6\. 404 (not found) hierarchy**

1. templates/404.html

2. templates/index.html Notes: Keep 404 helpful: search form, popular links, home link. 404.html is the first file WP will try for not-found responses.

---

# **7\. Embed hierarchy**

1. templates/embed.html

2. templates/index.html Notes: embed.html (if present) wraps oEmbed/embed requests. Fallback to index.html if absent.

---

# **8\. Post Type \+ Taxonomy \+ Single**

**Notes:** Register CPTs and taxonomies with show\_in\_rest \= true if you intend to use Query Loop blocks, REST requests, or headless workflows. Use consistent template naming so WordPress picks the most specific template automatically.

## **Custom Post Type archive**

* templates/archive-{post\_type}.html

* templates/archive.html

* templates/index.html

## **Custom Post Type single**

* templates/single-{post\_type}.html

* templates/single.html

* templates/singular.html  
    
* templates/index.html

## **Custom Taxonomy term archive**

* templates/taxonomy-{taxonomy}-{term}.html

* templates/taxonomy-{taxonomy}.html

* templates/taxonomy.html

* templates/archive.html

* templates/index.html 

---

# **9\. General notes**

* File locations: templates/ for top-level templates, parts/ for reusable Template Part files (header, footer, hero, etc.).  
    
* Use the Template Part block ( ) to include parts in templates instead of duplicating markup.

* theme.json should hold global styles and template-part registrations where appropriate.

* Always provide index.html as the final fallback so the block theme is recognized and has a universal fallback.

---

# 

# **1\. Block Theme Templates** {#1.-block-theme-templates}

A concise outline of the most common block-theme templates and what each should contain.  
These are short, focused checklists you can hand to a theme developer or content designer.  
Based on WordPress Block Theme guidelines.

---

## **1.1 index.html**

**Purpose:**

 Default fallback when no more specific template exists.

**Minimum blocks:**

* Template Part: header

* Query Loop (generic site content)

* Template Part: footer

**Recommended:**

* Site title / tagline in header part

* Optional simple sidebar or utility area

**Notes:**  
 Generic, minimal — used as the final fallback.

---

## **1.2 front-page.html**

**Purpose:**

 Static site landing page (when a static front page is set).

**Minimum blocks:**

* Template Part: header

* Hero/Cover or hero pattern

* Featured content Query Loop or selected patterns

* Template Part: footer

**Recommended:**

* Primary CTA, newsletter or lead capture

* Optimized images and minimal blocking assets

**Notes:**  
 Prioritize clarity and performance.

---

## **1.3 home.html**

**Purpose:**

 Posts index page (when a "Posts page" is set in Settings → Reading).

**Minimum blocks:**

* Template Part: header

* Query Loop filtered to posts

* Pagination

* Template Part: footer

**Recommended:**

* Sidebar with recent posts, categories, search

* Post filters or category pills

**Notes:**  
 Ensure `rel="prev/next"` on pagination and accessible headings.

---

## **1.4 single.html (and single-{post-type}.html)**

**Purpose:**

 Single post or custom post type view.

**Minimum blocks:**

* Template Part: header

* Post Title block (H1)

* Featured Image / Cover

* Post Content

* Post Meta (date, author, taxonomies)

* Template Part: footer

**Recommended:**

* Related posts Query Loop (by taxonomy or manual relation)

* Quick facts/meta band for custom types

* Share and bookmark actions

**Notes:**  
 Title must be H1; include structured data where appropriate.

---

## **1.5 page.html**

**Purpose:**

 Single static pages (About, Contact, etc.).

**Minimum blocks:**

* Template Part: header

* Post Title (optional depending on design)

* Post Content

* Template Part: footer

**Recommended:**

* Page-specific patterns (contact form, CTAs)

* Breadcrumbs for deep structures

**Notes:**  
 Use specialized templates for full-width or landing pages.

---

## **1.6 archive.html (and archive-{post-type}.html)**

**Purpose:**

 Generic archive listing (date, post type archives).

**Minimum blocks:**

* Template Part: header

* Archive title block (dynamic)

* Query Loop for archive items

* Pagination

* Template Part: footer

**Recommended:**

* Filter controls, short term description

* Grid/list toggle

**Notes:**  
 Match accessibility and pagination patterns used site-wide.

---

## **1.7 category.html / tag.html / taxonomy-{taxonomy}.html**

**Purpose:**

 Taxonomy term archive pages.

**Minimum blocks:**

* Template Part: header

* Term title and description

* Query Loop scoped to the current term

* Pagination

* Template Part: footer

**Recommended:**

* Term hero image, related terms links

* Helpful "no results" state with actions

**Notes:**  
 Use taxonomy-specific templates for tailored layouts.

---

## **1.8 search.html**

**Purpose:**

 Display search results and refinement UI.

**Minimum blocks:**

* Template Part: header (with visible search block)

* Heading "Search results for: {query}"

* Query Loop using the search query

* Search form (for refinement)

* Template Part: footer

**Recommended:**

* Suggestion links, fallback CTAs for no results

**Notes:**  
 Announce results count for screen readers.

---

## **1.9 404.html**

**Purpose:**

 Page displayed when requested content can’t be found.

**Minimum blocks:**

* Template Part: header

* H1 "Page not found" (or similar)

* Short explanatory text and actions (search, home link, popular content)

* Template Part: footer

**Recommended:**

* Friendly illustration, navigation shortcuts, recent posts

**Notes:**  
 Keep it helpful and quick to navigate away.

---

## **1.10 attachment.html**

**Purpose:**

 Media attachment display (images, files).

**Minimum blocks:**

* Template Part: header

* Attachment display with caption/alt text

* Attachment metadata and link back to parent post

* Template Part: footer

**Notes:**  
 Ensure alt text and download/access controls.

---

## **1.11 embed.html**

**Purpose:**

 Safe wrapper for embedded content.

**Minimum blocks:**

* Template Part: header

* Responsive Embed block

* Template Part: footer

**Notes:**  
 Lazy-load and sanitize embeds for performance and security.

---

## **1.12 date.html**

**Purpose:**

 Provide a date-based archive (year / month / day).

**Minimum blocks:**

* Template Part: header

* Archive title block (dynamic: "Posts from {Month Year}" / "Posts from {Year}")

* Query Loop filtered by date (post list)

* Pagination

* Template Part: footer

**Notes:**  
 Include accessible headings and rel="prev/next" for paginated sections.

---

## **1.13 author-{nicename}.html / author-{id}.html**

**Purpose:**

 Author-specific archive showing an author profile and posts.

**Minimum blocks:**

* Template Part: header

* Author hero / header (H1 \= Author name)

* Avatar (Profile Image)

* Short bio / user description (from user meta)

* Query Loop scoped to author

* Pagination

* Template Part: footer

**Recommended:**

* Author meta row (total posts, join date)

* Related posts or popular content

**Notes:**  
 Ensure single H1 is the author name; include structured author data.

---

## **1.14 taxonomy.html**

**Purpose:**

 Generic fallback template for custom taxonomy archives.

**Minimum blocks:**

* Template Part: header

* Term title block (dynamic) — H1

* Term description / lead paragraph (if available)

* Query Loop scoped to current term

* Pagination

* Template Part: footer

**Notes:**  
 Encourage term descriptions and representative images.

---

# **2\. Post Format Templates**

## **1\. single-post-standard.html (or single-post.html)**

- Purpose: Default single post view (standard / longform).  
- Minimum blocks:  
  - Template Part: header  
  - Post Title (H1)  
  - Featured Image / Cover (optional)  
  - Post Content  
  - Post Meta (date, author, categories/tags)  
  - Template Part: footer  
- Recommended:  
  - Table of contents or section jump links for long posts  
  - Author bio card (parts/author-card.html)  
  - Related posts Query Loop  
  - Social share actions & accessible print button  
- Notes:  
  - Use Post Title as the H1. Ensure headings in content follow semantic order.  
  - Provide skip-links and fast keyboard access to comments and TOC.

---

## **2\. single-post-aside.html**

- Purpose: Very short content, like a short thought or note (no formal title required).  
- Minimum blocks:  
  - Template Part: header  
  - Post Content (display content inline; may use a small cover or subtle card)  
  - Post Meta (date/time)  
  - Template Part: footer  
- Recommended:  
  - Inline time/reading indicator  
  - Lightweight comments section or reaction buttons  
  - Compact share controls  
- Notes:  
  - Many asides omit the H1; if design hides the post title, ensure the page still has an accessible H1 (e.g., a visually-hidden Post Title).  
  - Keep markup minimal and fast-loading.

---

## **3\. single-post-gallery.html**

- Purpose: Image galleries or visual posts (photography-heavy).  
- Minimum blocks:  
  - Template Part: header  
  - Gallery block or Media & Text/Query Loop for images (prominent)  
  - Post Content (caption/description)  
  - Template Part: footer  
- Recommended:  
  - Full-bleed hero gallery or mosaic grid for images  
  - Lightbox-enabled pattern / Gallery with captions and alt text  
  - Download / license info and metadata band  
  - Related gallery thumbnails (Query Loop)  
- Notes:  
  - Ensure all images have alt text. Use srcset and lazy-loading.  
  - Consider keyboard-accessible lightbox and announce changes via aria-live.

---

## **4\. single-post-link.html**

- Purpose: Short post built around a single outbound link (link post).  
- Minimum blocks:  
  - Template Part: header  
  - Post Title (often the linked headline) or Post Content containing the link  
  - Clear primary link CTA (open in new tab if external; include rel="noopener")  
  - Short excerpt or commentary (why the link matters)  
  - Template Part: footer  
- Recommended:  
  - Favicon/preview card for the linked site (if available)  
  - "Source" metadata and optional affiliate disclosure  
  - Quick share / copy-link button  
- Notes:  
  - Make the primary link clearly labeled and accessible. Indicate external links to users and screen readers.

---

## **5\. single-post-image.html**

- Purpose: Single-image posts where one image is the focus (distinct from gallery).  
- Minimum blocks:  
  - Template Part: header  
  - Large featured image (Cover) with caption  
  - Short caption or description (Post Content)  
  - Post Meta (credit/photographer)  
  - Template Part: footer  
- Recommended:  
  - Toggle for image metadata (camera EXIF, license)  
  - Lightbox view and proper alt text  
- Notes:  
  - Treat the image as meaningful content — provide descriptive alt and caption content.

---

## **6\. single-post-quote.html**

- Purpose: Emphasize a single quoted passage (short citation-style posts).  
- Minimum blocks:  
  - Template Part: header  
  - Blockquote with citation (blockquote element, cite)  
  - Optional short commentary block (author notes)  
  - Post Meta (source link, date)  
  - Template Part: footer  
- Recommended:  
  - Typography-focused layout (large quote, small citation)  
  - Provide schema.org markup (blockquote/quote properties) where feasible  
- Notes:  
  - Ensure semantic markup (blockquote, cite). If quote is the primary content, ensure accessible H1 exists elsewhere or provide an H1 that reflects the quote’s intent.

---

## **7\. single-post-status.html**

- Purpose: Micro-updates or status posts (very short, social-like).  
- Minimum blocks:  
  - Template Part: header  
  - Post Content (short text)  
  - Post Meta (timestamp)  
  - Template Part: footer  
- Recommended:  
  - Inline reactions or simple like/emoji buttons  
  - Link to thread or related conversation  
- Notes:  
  - Use concise markup; avoid heavy assets. Ensure time is machine-readable (datetime attribute).

---

## **8\. single-post-video.html**

- Purpose: Video-first posts (embedded video or hosted).  
- Minimum blocks:  
  - Template Part: header  
  - Responsive Embed / Video block (primary hero)  
  - Transcript or short description (Post Content)  
  - Video metadata (duration, source)  
  - Template Part: footer  
- Recommended:  
  - Captions/subtitles and transcript for accessibility  
  - Player controls and keyboard support  
  - Related videos Query Loop  
- Notes:  
  - Always provide captions/transcript and fallback poster image. Use aria-live region for player announcements if dynamic content updates occur.

---

## **9\. single-post-audio.html**

- Purpose: Audio-first posts (podcasts, music tracks).  
- Minimum blocks:  
  - Template Part: header  
  - Audio block / player (prominent)  
  - Episode notes / show notes (Post Content)  
  - Download link and timestamps / chapters  
  - Template Part: footer  
- Recommended:  
  - Transcript, chapter markers, and download option  
  - Subscription links (RSS/podcast platforms)  
- Notes:  
  - Ensure accessible player controls and keyboard operability. Provide transcript for accessibility and SEO.

---

## **10\. single-post-chat.html**

- Purpose: Conversation or chat transcript posts (dialogue-focused).  
- Minimum blocks:  
  - Template Part: header  
  - Conversation block or structured list (speaker labels \+ messages)  
  - Short intro/context paragraph  
  - Post Meta (participants, date)  
  - Template Part: footer  
- Recommended:  
  - Distinct visual style for speakers; use or  
    markup for semantics  
      
  - Timestamp per message if relevant  
- Notes:  
  - Favor semantic markup for readability and screen reader navigation.

---

## **11\. taxonomy-post\_format / taxonomy-post\_format-post-format-{format}.html**

- Purpose: Archive pages for each post format (e.g., all asides, all galleries).  
- Minimum blocks:  
  - Template Part: header  
  - Archive title (dynamic: the format name)  
  - Lead paragraph explaining the format (optional)  
  - Query Loop scoped to the post\_format term (list/grid of posts)  
  - Pagination  
  - Template Part: footer  
- Recommended:  
  - Format-specific hero (small icon or sample thumbnail)  
  - Filters (date, author) for long archives  
  - "No results" state with actions (create a post, explore other formats)  
- Notes:  
  - Post format archive is a taxonomy archive; name the files to match the taxonomy term for highest specificity if desired.


  

---

## **Notes on naming post format templates**

- Single-format templates (for posts with a specific post\_format) can be provided as: templates/single-post-{format}.html (e.g., single-post-quote.html). If not present, WordPress will fall back to single-post.html → single.html → singular.html → index.html per hierarchy.  
- Post-format archives are taxonomy archives under taxonomy/post\_format. Useful files:  
  - templates/taxonomy-post\_format-post-format-{format}.html (term-specific)  
  - templates/taxonomy-post\_format.html (generic post\_format taxonomy fallback)

---

# **General implementation notes**

* Prefer core blocks (Post Title, Post Content, Featured Image/Cover, Embed, Gallery, Audio, Video, Query Loop) so editors can edit in the Site Editor.  
* Maintain a single visible H1 per page. If a format design omits the visible title, include it as a visually-hidden element for accessibility.  
* Expose any custom fields or metadata used in Query Loops via show\_in\_rest for editor-driven Query Loops or REST/AJAX consumption.  
* On media-heavy templates (gallery, image, video, audio), prioritize responsive images, lazy-loading and accessible fallbacks (captions/transcripts).  
* For short-format templates (aside, status), keep the DOM light and avoid heavy widgets; for long-format templates (standard), provide navigation aids like TOC, anchors, and related content.  
* Consider registering format-specific template parts (e.g., parts/post-hero-video.html, parts/post-quick-meta.html) and register them in theme.json so editors can swap parts per template in the Site Editor.

---

# **3\. Page Templates**

## **Page.html**

## **Page-no-title.hml**

## **Page-with-sidebar.hml**

---

# **4\. Special Templates**

## **1.15 privacy-policy.html**

**Purpose:**

 Static privacy policy page (legal/compliance content).

**Minimum blocks:**

* Template Part: header

* Post Title (H1)

* Post Content block (editable legal content)

* Template Part: footer

**Recommended:**

* Table of Contents for long documents

* Contact details or data-request CTA

**Notes:**  
 Ensure accessible links and plain-language headings.

---

## **1.16 offline/maintenance.html**

**Purpose:**

 Maintenance/offline page served during downtime.

**Minimum blocks:**

* Template Part: header (optional)

* H1 short maintenance message

* Short explanatory text and ETA or status

* Template Part: footer (optional/minimal)

**Notes:**  
 Keep lightweight; avoid heavy assets.

---

## **1.17 feed templates (feed-rss2.php, feed-atom.php, etc.)**

**Purpose:**

 Provide XML feed output for syndication.

**Minimum blocks:**

* N/A (feeds output XML directly)

**Notes:**  
 Ensure correct content-type, proper escaping, and valid feed elements.

---

## **1.18 attachments.html**

**Purpose:**

 Display media attachment pages with metadata.

**Minimum blocks:**

* Template Part: header

* Attachment display block

* Caption / Post Content

* Template Part: footer

**Recommended:**

* Related media Query Loop

* Comments area (if enabled)

**Notes:**  
 Ensure alt text and responsive images.

## **1.18 coming-soon.html**

**Purpose:**

 Display media attachment pages with metadata.

**Minimum blocks:**

* Template Part: header

* Attachment display block

* Caption / Post Content

* Template Part: footer

**Recommended:**

* Related media Query Loop

* Comments area (if enabled)

**Notes:**  
 Ensure alt text and responsive images.

---

# **2\. General Notes for Templates** {#2.-general-notes-for-templates}

**Purpose:**

 Ensure consistent structure and accessibility across templates.

**Minimum blocks (generic):**

* Template Part: header

* Template-specific blocks as listed

* Template Part: footer

**Notes:**

* Maintain a single H1 per page.

* Document templates that require editor assignment.

---

# **3\. General Cross-Template Guidance** {#3.-general-cross-template-guidance}

* Always include Template Part header and footer unless intentionally omitted.

* Use Query Loop for listings; scope by post type/taxonomy.

* **Accessibility:** proper heading order, skip links, aria-live for dynamic content.

* **Performance:** optimize images, lazy-load offscreen media, paginate content.

* **Global styles:** use theme.json for palette, typography, spacing.

* **Editor UX:** favor taxonomy-driven structures and minimal required post meta.

---

